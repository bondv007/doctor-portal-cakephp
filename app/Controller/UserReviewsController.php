<?php
class UserReviewsController extends AppController
{
	public $name = 'UserReviews';
	public $components = array(
        'RequestHandler'
    );
    public function beforeFilter()
    {
        parent::beforeFilter();
    }
	public function index($user_id = null, $doctor_user_id = null , $appointment_id = null)
	{
		$this->pageTitle = __l('Reviews');
		if (is_null($user_id) and is_null($doctor_user_id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$conditions['UserReview.user_id'] = $user_id;
		$conditions['UserReview.doctor_user_id'] = $doctor_user_id; 
		$userReview = $this->UserReview->find('first', array(
            'conditions' =>$conditions,
			 'contain' => array(
                'DoctorUser' => array(
                    'fields' => array(
                        'DoctorUser.id',
						'DoctorUser.username',
						'DoctorUser.bedside_rating_count',
						'DoctorUser.bedside_avg_rating',
						'DoctorUser.timing_rating_count',
						'DoctorUser.timing_avg_rating',
						'DoctorUser.overall_rating_count', 
						'DoctorUser.overall_avg_rating', 
						'DoctorUser.user_rating_count', 
                    )
                ) ,
            ) ,
			'recursive' => 1
        ));
		$this->set(compact('user_id','doctor_user_id','appointment_id'));
		$this->set('userReview', $userReview);
		$this->render('index');
	}
	public function view($id = null)
	{
		$this->pageTitle = __l('User Review');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$userReview = $this->UserReview->find('first', array(
			'conditions' => array(
				'UserReview.id = ' => $id
			),
			'fields' => array(
				'UserReview.id',
				'UserReview.created',
				'UserReview.modified',
				'UserReview.user_id',
				'UserReview.review',
				'UserReview.user_rating_count',
				'UserReview.bedside_avg_rating',
				'UserReview.timing_avg_rating',
				'UserReview.overall_avg_rating',
				'UserReview.ip_id',
				'UserReview.is_active',
				'User.id',
				'User.created',
				'User.modified',
				'User.role_id',
				'User.username',
				'User.email',
				'User.password',
				'User.fb_user_id',
				'User.fb_access_token',
				'User.twitter_user_id',
				'User.twitter_access_key',
				'User.twitter_access_token',
				'User.user_openid_count',
				'User.user_login_count',
				'User.user_view_count',
				'User.photo_count',
				'User.photo_album_count',
				'User.photo_total_ratings',
				'User.photo_rating_count',
				'User.photo_favorite_count',
				'User.photo_upload_quota',
				'User.video_count',
				'User.video_view_count',
				'User.video_comment_count',
				'User.video_rating_count',
				'User.video_total_ratings',
				'User.video_favorite_count',
				'User.video_download_count',
				'User.video_flag_count',
				'User.video_upload_quota',
				'User.forum_count',
				'User.cookie_hash',
				'User.cookie_time_modified',
				'User.is_openid_register',
				'User.is_facebook_register',
				'User.is_twitter_register',
				'User.is_gmail_register',
				'User.is_yahoo_register',
				'User.is_agree_terms_conditions',
				'User.is_active',
				'User.is_email_confirmed',
				'User.signup_ip_id',
				'User.last_login_ip_id',
				'User.last_logged_in_time',
				'Ip.id',
				'Ip.created',
				'Ip.modified',
				'Ip.ip',
				'Ip.city_id',
				'Ip.state_id',
				'Ip.country_id',
				'Ip.timezone_id',
				'Ip.latitude',
				'Ip.longitude',
			),
			'recursive' => 0,
		));
		if (empty($userReview)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $userReview['UserReview']['id'];
		$this->set('userReview', $userReview);
	}
	public function add($user_id= null, $doctor_user_id = null, $appointment_id = null)
    {
        $this->pageTitle = __l('Add Patient Review');
        if ($this->request->is('post')) {
            $this->request->data['UserReview']['user_id'] = $this->Auth->user('id');
            $this->request->data['UserReview']['ip_id'] = $this->UserReview->toSaveIp();
			$this->UserReview->create();
            if ($this->UserReview->save($this->request->data)) {
				//Update User rating count
				$this->UserReview->User->updateAll(array(
					'User.user_rating_count' => 'User.user_rating_count'+1
				) , array(
					'User.id' => $this->request->data['UserReview']['doctor_user_id']
				));
				$user = $this->UserReview->User->find('first', array(
                    'conditions' => array(
                        'User.id' => $this->request->data['UserReview']['doctor_user_id'],
                    ) ,
					'fields' => array(
						'User.id',
						'User.username',
						'User.bedside_rating_count',
						'User.bedside_avg_rating',
						'User.timing_rating_count',
						'User.timing_avg_rating',
						'User.overall_rating_count', 
						'User.overall_avg_rating', 
						'User.user_rating_count', 
                    ) ,
                    'recursive' => -1
                ));
				// Bedside manner ave rating
				$bedside_rate = $user['User']['bedside_rating_count'] + $this->request->data['UserReview']['bedside_rate'];
				$bedside_avg_rate = round(($bedside_rate / $user['User']['user_rating_count']),1);
				// Waittime ave rating
				$waittime_rate = $user['User']['timing_rating_count'] + $this->request->data['UserReview']['waittime_rate'];
				$waittime_avg_rate = round(($waittime_rate / $user['User']['user_rating_count']),1);
				// Overall ave rating
				$overall_rate = $user['User']['overall_rating_count'] + $bedside_rate + $waittime_rate;
				$average = ($user['User']['user_rating_count'] * 2);
				$overall_avg_rate = round(($overall_rate / $average),1);
				//Update User rating 
				$this->UserReview->User->updateAll(array(
					'User.bedside_rating_count' => $bedside_rate,
					'User.bedside_avg_rating' => $bedside_avg_rate,
					'User.timing_rating_count' => $waittime_rate,
					'User.timing_avg_rating' => $waittime_avg_rate ,
					'User.overall_rating_count' => $overall_rate, 
					'User.overall_avg_rating' => $overall_avg_rate, 
				) , array(
					'User.id' => $user['User']['id']
				));
				$this->Session->setFlash(__l('Review has been added') , 'default', null, 'success');
				if (!$this->RequestHandler->isAjax()) {
                    $this->redirect(array(
                        'controller' => 'appointments',
                        'action' => 'view',
                        $this->request->data['UserReview']['appointment_id']
                    ));
                } else {
                    // Ajax: return added answer
                    $this->setAction('view', $this->UserReview->getLastInsertId() , 'view_ajax');
                }
            } else {
                $this->Session->setFlash(__l('Review could not be added. Please, try again.') , 'default', null, 'error');
            }
        }
		$bedsiderates = $this->UserReview->BedsideMannerRate;
		$waittimerates = $this->UserReview->WaitTimeRate;
        $this->set('doctor_user_id', $doctor_user_id);
		$this->set('appointment_id', $appointment_id);
		$this->set(compact('bedsiderates', 'waittimerates'));
		$this->render('add');
    }
	public function edit($id = null)
	{
		$this->pageTitle = __l('Edit User Review');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->UserReview->save($this->request->data)) {
				$this->Session->setFlash(__l('User Review has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('User Review could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->UserReview->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['UserReview']['id'];
		$users = $this->UserReview->User->find('list');
		$ips = $this->UserReview->Ip->find('list');
		$this->set(compact('users','ips'));
	}
	public function delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->UserReview->delete($id)) {
			$this->Session->setFlash(__l('User Review deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	public function patient_reviews($doctor_user_id = null) 
	{
		$this->pageTitle = __l('Patient Reviews');
		if (is_null($doctor_user_id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$conditions['UserReview.doctor_user_id'] = $doctor_user_id; 
                $conditions['UserReview.is_active'] = '1';
		$userReviews = $this->UserReview->find('all', array(
            'conditions' =>$conditions,
			 'contain' => array(
                'User' => array(
                    'UserProfile' => array(
						'fields' => array(
							'UserProfile.first_name',
							'UserProfile.last_name'
						)
					),
					'fields' => array(
                        'User.id',
						'User.username',
                    )
                ) ,
				'UserRating' => array(
                   
						'fields' => array(
							 'UserRating.rate_1','UserRating.rate_2','UserRating.rate_3','UserRating.status'
						)
					),
				'DoctorUser' => array(
                    'fields' => array(
                        'DoctorUser.id',
						'DoctorUser.username',
						'DoctorUser.bedside_rating_count',
						'DoctorUser.bedside_avg_rating',
						'DoctorUser.timing_rating_count',
						'DoctorUser.timing_avg_rating',
						'DoctorUser.overall_rating_count', 
						'DoctorUser.overall_avg_rating', 
						'DoctorUser.user_rating_count', 
                    )
                ) ,
            ) ,
			'recursive' => 2
        ));
		$this->set('userReviews', $userReviews);
		$this->render('patient_reviews');
	}
	public function admin_index()
	{ 		$this->UserReview->recursive='2';

		$this->pageTitle = __l('User Reviews');
		$this->_redirectGET2Named(array(
            'username',
            'q',
            'filter_id'
        ));
		$conditions = array();
        if (!empty($this->request->data['UserReview']['user_id'])) {
            $this->request->params['named']['user_id'] = $this->request->data['UserReview']['user_id'];
        }
        $param_string = "";
        $param_string.= !empty($this->request->params['named']['user_id']) ? '/user_id:' . $this->request->params['named']['user_id'] : $param_string;
        if (!empty($this->request->params['named']['username'])) {
            $get_user_id = $this->UserReview->User->find('list', array(
                'conditions' => array(
                    'User.username' => $this->request->params['named']['username'],
                ) ,
                'fields' => array(
                    'User.id',
                ) ,
                'recursive' => -1
            ));
            $conditions['OR']['UserReview.user_id'] = $get_user_id;
            $conditions['OR']['UserReview.doctor_user_id'] = $get_user_id;
            $this->request->data['UserReview']['user_id'] = $get_user_id;
        }
		if (!empty($this->request->params['named']['slug'])) {
            $review = $this->UserReview->find('first', array(
                'conditions' => array(
                    'UserReview.slug' => $this->request->params['named']['slug'],
                ) ,
                'recursive' => 1
            ));
            $conditions['UserReview.id'] = $review['UserReview']['id'];
        }
		if (!empty($this->request->params['named']['review_id'])) {
            $conditions['UserReview.id'] = $this->request->params['named']['review_id'];
        }
		$this->paginate = array(
                'conditions' => array(
                    $conditions,
                ) ,
                'contain' => array(
					'User' => array(
						'fields' => array(
							'User.username',								
						) 
					) ,
					'UserRating' => array(
						'fields' => array(
							'UserRating.*',								
						) 
					),
					'DoctorUser' => array(
						'fields' => array(
							'DoctorUser.username',								
						) 
					) ,
					'Ip' => array(
						'fields' => array(
							'Ip.ip',
						) 
					  ) 
                ) ,
                'order' => array(
                    'UserReview.id' => 'desc'
                ) ,
                'recursive' => 1,
        );
		$this->set('userReviews', $this->paginate());
		$moreActions = $this->UserReview->moreActions;
		$this->set(compact('moreActions'));
	}
	public function admin_delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->UserReview->delete($id)) {
			$this->Session->setFlash(__l('User Review deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	
	
	public function admin_change_status($reviewId=null, $status=null){
		
		$this->loadModel('UserRating');
		if (is_null($reviewId)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		
		
		$this->UserReview->id=$reviewId;
		$rating=$this->UserRating->findByUserReviewId($reviewId);
		$this->UserRating->id=$rating['UserRating']['id'];
		
		if ($this->UserReview->saveField('is_active',$status) && $this->UserRating->saveField('status',$status)) {
			$this->Session->setFlash(__l('Review status changed successfully'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
		
	}

}
?>