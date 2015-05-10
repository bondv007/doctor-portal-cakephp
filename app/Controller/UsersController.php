<?php
class UsersController extends AppController
{
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Users';
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $components = array(
        'Email',
		'RequestHandler'
    );
    public $uses = array(
        'User',
        'EmailTemplate',
    );
    public $helpers = array(
        'Csv',
		'Calendar'
		
    );
	
    public function beforeFilter()
    {
        parent::beforeFilter();

		if(in_array($this->request->action,array("search"))){
			$this->Security->validatePost = false;
		}
	    
	    if ($this->request->is('post') && in_array($this->request->params['action'], array(
            'admin_login',
            'login'
        ))) {
            $field = 'username';
            if (!empty($this->request->data) && empty($this->request->data['User'][$field])) {
                //$this->redirect(array('action' => $this->request->params['action']));

            }
            if(!empty($this->request->data['User'][$field])){
            $cacheName = 'auth_failed_' . $this->request->data['User'][$field];
            
            if (Cache::read($cacheName, 'users_login') >= Configure::read('User.failed_login_limit')) {
                $this->Session->setFlash(__l('You have reached maximum limit for failed login attempts. Please try again after a few minutes.') , 'default', array(
                    'class' => 'error'
                ));
                //$this->redirect(array('action' => $this->request->params['action']));

            }
            }
        }
    }
    public function beforeRender()
    {
        parent::beforeRender();
        if (in_array($this->request->params['action'], array(
            'admin_login',
            'login'
        ))) {
            if (!empty($this->request->data)) {
                $field = $this->Auth->fields['username'];
                $cacheName = 'auth_failed_' . (!empty($this->request->data['User'][$field]) ? $this->request->data['User'][$field] : '');
                $cacheValue = Cache::read($cacheName, 'users_login');
                Cache::write($cacheName, (int)$cacheValue+1, 'users_login');
            }
        }
    }
    public function admin_index()
    {
        $this->_redirectGET2Named(array(
            'q',
        ));
        $this->set('title_for_layout', __l('Users', true));
        $conditions = array();
        $this->pageTitle = __l('Users');
        if (!empty($this->request->params['named']['main_filter_id'])) {
			if ($this->request->params['named']['main_filter_id'] == ConstMoreAction::Facebook) {
                $conditions['User.is_facebook_register'] = 1;
                $this->pageTitle.= __l(' - Registered through Facebook ');
            } else if ($this->request->params['named']['main_filter_id'] == ConstMoreAction::Patient) {
                $conditions['User.role_id'] = ConstUserTypes::User;
                $this->pageTitle.= __l(' - Patient ');
            }  else if ($this->request->params['named']['main_filter_id'] == ConstMoreAction::Doctor) {
                $conditions['User.role_id'] = ConstUserTypes::Doctor;
                $this->pageTitle.= __l(' - Doctor ');
            }  else if ($this->request->params['named']['main_filter_id'] == ConstMoreAction::Clinic) {
                $conditions['User.role_id'] = ConstUserTypes::Clinic;
                $this->pageTitle.= __l(' - Clinic ');
            } 
        }
        if (!empty($this->request->params['named']['filter_id'])) {
            if ($this->request->params['named']['filter_id'] == ConstMoreAction::Active) {
                $conditions['User.is_active'] = 1;
                $this->pageTitle.= __l(' - Active ');
            } else if ($this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) {
                $conditions['User.is_active'] = 0;
                $this->pageTitle.= __l(' - Inactive ');
            } 
        }
		if (!empty($this->request->params['named']['clinic_id'])) {
			 $conditions['User.clinic_id'] = $this->request->params['named']['clinic_id'];
		}
        if (isset($this->request->params['named']['q'])) {
			$conditions[] = array(
                'OR' => array(
                    array(
                        'User.username LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
                )
            );
            $this->request->data['User']['q'] = $this->request->params['named']['q'];
            $this->pageTitle.= sprintf(__l(' - Search - %s') , $this->request->params['named']['q']);
        }		
		if ($this->RequestHandler->prefers('csv')) {
			Configure::write('debug', 0);
            $this->set('user', $this);
            $this->set('conditions', $conditions);
            if (isset($this->request->data['User']['q'])) {
                $this->set('q', $this->request->data['User']['q']);
            }
            //$this->set('contain', $contain);
		} else {
			$this->paginate = array(
				'conditions' =>$conditions,
				'contain' => array(
					'UserProfile' => array(
						'fields' => array(
							'UserProfile.created',
							'UserProfile.first_name',
							'UserProfile.last_name',
							'UserProfile.middle_name',
							'UserProfile.about_me',
							'UserProfile.dob',
							'UserProfile.address',
							'UserProfile.zip_code',
							'UserProfile.paypal_account',
						) ,
						'Gender' => array(
							'fields' => array(
								'Gender.name'
							)
						) ,
						'City' => array(
							'fields' => array(
								'City.name'
							)
						) ,
						'Language' => array(
							'fields' => array(
								'Language.id',
								'Language.name',
							)
						) ,
						'State' => array(
							'fields' => array(
								'State.name'
							)
						) ,
						'Country' => array(
							'fields' => array(
								'Country.name',
								'Country.iso2'
							)
						)
					) ,
					'UserAvatar' => array(
						'fields' => array(
							'UserAvatar.id',
							'UserAvatar.dir',
							'UserAvatar.filename',
							'UserAvatar.width',
							'UserAvatar.height'
						)
					)
				) ,
				'order' => array(
					'User.id' => 'desc'
				),
				'recursive' => 2
			);
			
			
			if (isset($this->request->params['named']['q'])) {
			$this->paginate = array_merge($this->paginate, array(
				'search' => $this->request->params['named']['q']
			));
			}
			$this->set('users', $this->paginate());
			// total approved users list
			$this->set('active', $this->User->find('count', array(
			'conditions' => array(
				'User.is_active' => 1,
			) ,
			'recursive' => -1
			)));
			// total approved users list
			$this->set('inactive', $this->User->find('count', array(
			'conditions' => array(
				'User.is_active' => 0,
			) ,
			'recursive' => -1
			)));
			// total facebook users list
			$this->set('facebook', $this->User->find('count', array(
			'conditions' => array(
				'User.is_facebook_register' => 1,
			) ,
			'recursive' => -1
			)));
			// total patient users list
			$this->set('patient', $this->User->find('count', array(
			'conditions' => array(
				'User.role_id' => ConstUserTypes::User,
			) ,
			'recursive' => -1
			)));
			// total doctor users list
			$this->set('doctor', $this->User->find('count', array(
			'conditions' => array(
				'User.role_id' => ConstUserTypes::Doctor,
			) ,
			'recursive' => -1
			)));
			// total clinic users list
			$this->set('clinic', $this->User->find('count', array(
			'conditions' => array(
				'User.role_id' => ConstUserTypes::Clinic,
			) ,
			'recursive' => -1
			)));
			$moreActions = $this->User->moreActions;
			$this->set(compact('moreActions'));
		}
    }
    public function admin_edit($id = null)
    {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__l('Invalid User', true) , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        if (!empty($this->request->data)) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__l('The User has been saved', true) , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('The User could not be saved. Please, try again.', true) , 'default', array(
                    'class' => 'error'
                ));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->User->read(null, $id);
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }   
    public function admin_reset_password($id = null)
    {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__l('Invalid User', true) , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        if (!empty($this->request->data)) {
            $user = $this->User->findById($id);
            if ($user['User']['password'] == Security::hash($this->request->data['User']['current_password'], null, true)) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__l('Password has been reset.', true) , 'default', array(
                        'class' => 'success'
                    ));
                    $this->redirect(array(
                        'action' => 'index'
                    ));
                } else {
                    $this->Session->setFlash(__l('Password could not be reset. Please, try again.', true) , 'default', array(
                        'class' => 'error'
                    ));
                }
            } else {
                $this->Session->setFlash(__l('Current password did not match. Please, try again.', true) , 'default', array(
                    'class' => 'error'
                ));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->User->read(null, $id);
        }
    }
    public function dashboard()
    {
        $this->pageTitle = __l('Dashboard');
    }
    public function admin_login()
    {
        $this->setAction('login');
    }
    public function admin_logout()
    {
        $this->setAction('logout');
    }
    public function admin_stats()
    {
        $this->pageTitle = __l('Snapshot');
    }
    public function index()
    {
      	$this->pageTitle = __l('Find Doctors by Name');
       	$this->_redirectGET2Named(array(
            'q',
        ));
        $conditions = array();
		$search_title = '';
		$conditions['User.role_id ='] = ConstUserTypes::Doctor;
        if (!empty($this->request->params['named']['letter']) and $this->request->params['named']['letter'] != 'recent') {
            $conditions['User.username like '] = $this->request->params['named']['letter'] . '%'; 
			$search_title = sprintf(__l('Doctors Starting with - %s') , strtoupper($this->request->params['named']['letter']));
        }
        if (isset($this->request->params['named']['q'])) {
			$conditions[] = array(
                'OR' => array(
                    array(
                        'User.username LIKE ' => '%' . $this->request->params['named']['q'] . '%'
                    ) ,
                )
            );
            $this->request->data['User']['q'] = $this->request->params['named']['q'];
            $search_title = sprintf(__l('Doctor Search Results for - %s') , $this->request->params['named']['q']);
        }		
		$this->paginate = array(
			'conditions' =>$conditions,
			'contain' => array(
				'UserProfile' => array(
					'fields' => array(
						'UserProfile.created',
						'UserProfile.first_name',
						'UserProfile.last_name',
						'UserProfile.middle_name',
						'UserProfile.address',
						'UserProfile.zip_code',
					) ,
					'City' => array(
						'fields' => array(
							'City.name'
						)
					) ,
					'State' => array(
						'fields' => array(
							'State.name',
							'State.code'
						)
					) ,
					'Country' => array(
						'fields' => array(
							'Country.name',
							'Country.iso2'
						)
					)
				) ,
			) ,
			'fields' => array(
				'User.id',
				'User.username',
				'User.is_partner'
			),
			'order' => array(
				'User.id' => 'desc'
			),
			'recursive' => 1
		);
		if (isset($this->request->params['named']['q'])) {
			$this->paginate = array_merge($this->paginate, array(
				'search' => $this->request->params['named']['q']
			));
		}
		$this->set('users', $this->paginate());
		$this->set('search_title', $search_title);
		$specialties = $this->User->Specialty->find('all', array(
            'conditions' => array(
                'Specialty.is_active' => 1
            ),
			'limit' => 9,
			'fields'=>array(
				'Specialty.id',
				'Specialty.name',
				'Specialty.slug'
			),
        ));
		$cities = $this->User->UserProfile->City->find('all', array(
            'conditions' => array(
                'City.is_approved' => 1
            ),
			'contain' => array(
				'State' => array(
					'fields' => array(
						'State.code'
					)
				),
			),
			'fields'=>array(
				'City.id',
				'City.name',
				'City.slug'
			),
        ));
		$this->set(compact('specialties','cities'));
	}
	public function add($user_id = null)
    {
        $this->pageTitle = __l('Add New Doctor');
        if (!empty($this->request->data)) {
            $this->request->data['User']['role_id'] = ConstUserTypes::Doctor;
			$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['passwd']);
            $this->request->data['User']['is_agree_terms_conditions'] = '1';
            $this->request->data['User']['is_email_confirmed'] = 1;
            $this->request->data['User']['is_active'] = 1;
            $this->request->data['User']['signup_ip_id'] = $this->User->toSaveIp();
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->request->data['UserProfile']['user_id'] = $this->User->getLastInsertId();
				$this->User->UserProfile->set($this->request->data);
				$this->User->UserProfile->create();
				$this->User->UserProfile->save($this->request->data);
				//Add Specialty to doctor
				$specialty_data['SpecialtiesUser']['user_id'] = $this->User->getLastInsertId();
				$specialty_data['SpecialtiesUser']['specialty_id'] = $this->request->data['UserProfile']['specialty_id'];
				$this->User->SpecialtiesUser->set($specialty_data);
				$this->User->SpecialtiesUser->create();
				$this->User->SpecialtiesUser->save($specialty_data);
				$clinic = $this->User->Clinic->find('first', array(
						'conditions' => array(
							'Clinic.id' => $this->request->data['User']['clinic_id']
						),
						'fields' => array(
							'Clinic.name'
						),
						'recursive' => -1,
				));
				// Send mail to user to activate the account and send account details
                $emailFindReplace = array(
                    '##USERNAME##' => $this->request->data['User']['username'],
					'##CLINIC_NAME##' => $clinc['Clinic']['name'],
                    '##LOGINLABEL##' => ucfirst(Configure::read('user.using_to_login')) ,
                    '##USEDTOLOGIN##' => $this->request->data['User'][Configure::read('user.using_to_login') ],
                    '##PASSWORD##' => $this->request->data['User']['passwd']
                );
                $this->User->_sendEmail('Clinic Doctor Add', $emailFindReplace, $this->request->data['User']['email']);
                $this->Session->setFlash(__l('Doctor has been added') , 'default', null, 'success');
                $this->redirect(array(
                    'controller' => 'clinics',
					'action' => 'my_doctors',
					$this->request->data['User']['clinic_id']
                ));
            } else {
                unset($this->request->data['User']['passwd']);
                $this->Session->setFlash(__l('User could not be added. Please, try again.') , 'default', null, 'error');
            }
        }
		if($user_id == $this->Auth->user('id')) {
			$clinics = $this->User->Clinic->find('list', array(
				'conditions' => array(
					'Clinic.user_id' => $user_id
				),
				'fields'=>array(
					'Clinic.id',
					'Clinic.name',
				),
			));
			$this->set(compact('clinics'));
		} else {
			 throw new NotFoundException(__l('Invalid request'));
		}	
		$specialties = $this->User->Specialty->find('list');
		$this->set(compact('specialties'));
    }
    public function activate($username = null, $key = null)
    {
        if ($username == null || $key == null) {
            $this->redirect(array(
                'action' => 'login'
            ));
        }
        if ($this->User->hasAny(array(
            'User.username' => $username,
            'User.activation_key' => $key,
            'User.status' => 0,
        ))) {
            $user = $this->User->findByUsername($username);
            $this->User->id = $user['User']['id'];
            $this->User->saveField('status', 1);
            $this->User->saveField('activation_key', md5(uniqid()));
            $this->Session->setFlash(__l('Account activated successfully.', true) , 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__l('An error occurred.', true) , 'default', array(
                'class' => 'error'
            ));
        }
        $this->redirect(array(
            'action' => 'login'
        ));
    }
    public function edit()
    {
    }
    public function reset($user_id = null, $hash = null)
    {
        $this->pageTitle = __l('Reset Password');
        if (!empty($this->request->data)) {
            if ($this->User->isValidResetPasswordHash($this->request->data['User']['user_id'], $this->request->data['User']['hash'])) {
                $this->User->set($this->request->data);
                if ($this->User->validates()) {
                    $this->User->updateAll(array(
                        'User.password' => '\'' . $this->Auth->password($this->request->data['User']['passwd']) . '\'',
                    ) , array(
                        'User.id' => $this->request->data['User']['user_id']
                    ));
                    $this->Session->setFlash(__l('Your password has been changed successfully, Please login now') , 'default', null, 'success');
                    $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'login'
                    ));
                }
                $this->request->data['User']['passwd'] = '';
                $this->request->data['User']['confirm_password'] = '';
            } else {
                $this->Session->setFlash(__l('Invalid change password request'));
                $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'login'
                ));
            }
        } else {
            if (is_null($user_id) or is_null($hash)) {
                throw new NotFoundException(__l('Invalid request'));
            }
            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $user_id,
                    'User.is_active' => 1,
                ) ,
                'recursive' => -1
            ));
            if (empty($user)) {
                $this->Session->setFlash(__l('User cannot be found in server or admin deactivated your account, please register again'));
                $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'register'
                ));
            }
            if (!$this->User->isValidResetPasswordHash($user_id, $hash)) {
                $this->Session->setFlash(__l('Invalid change password request'));
                $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'login'
                ));
            }
            $this->request->data['User']['user_id'] = $user_id;
            $this->request->data['User']['hash'] = $hash;
        }
    }
    public function register($type = null)
    {
        // When already logged user trying to access the registration page we are redirecting to site home page
        if ($this->Auth->user()) {
            $this->redirect('/');
        }
        $this->pageTitle = __l('User Registration');
        // Facebook login after comes from _facebook_login
        $fbuser = $this->Session->read('fbuser');
        if (Configure::read('facebook.is_enabled_facebook_connect') && !$this->Auth->user() && !empty($fbuser)) {
            $this->_facebook_login();
        }
		/*// Weibo modified registration: Comes for registration from oauth //
        $doctor_fbuser = $this->Session->read('doctor_fbuser');
        if (empty($this->request->data)) {
            if (!empty($doctor_fbuser)) {
                $this->request->data['UserProfile']['first_name'] = $doctor_fbuser['UserProfile']['first_name'];
				$this->request->data['UserProfile']['last_name'] = $doctor_fbuser['UserProfile']['last_name'];
                $this->request->data['User']['email'] = $doctor_fbuser['User']['email'];
                $this->request->data['User']['fb_user_id'] = $doctor_fbuser['User']['fb_user_id'];
	            $this->request->data['User']['fb_access_token'] = $doctor_fbuser['User']['fb_access_token'];
				$this->request->data['User']['is_facebook_register'] = 1;
				$this->request->data['User']['role_id'] = ConstUserTypes::Doctor;
                if (Configure::read('invite.is_referral_system_enabled')) {
                    //user id will be set in cookie
                    $cookie_value = $this->Cookie->read('referrer');
                    if (!empty($cookie_value)) {
                        $this->request->data['User']['referred_by_user_id'] = $cookie_value['refer_id'];
                    }
                }
                $this->Session->delete('doctor_fbuser');
            }
        }*/
        // Twitter login after comes from oauth_callback
        $twuser = $this->Session->read('twuser');
        if (empty($this->request->data) && !empty($twuser)) {
            $this->request->data['User']['username'] = $twuser['username'];
            $this->request->data['User']['email'] = '';
            $this->request->data['User']['is_twitter_register'] = 1;
            $this->request->data['User']['twitter_user_id'] = $twuser['twitter_user_id'];
            $this->request->data['User']['twitter_access_token'] = $twuser['twitter_access_token'];
            $this->request->data['User']['twitter_access_key'] = $twuser['twitter_access_key'];
            $this->Session->delete('twuser');
        }
        //open id component included
        App::import('Core', 'ComponentCollection');
        $collection = new ComponentCollection();
        App::import('Component', 'Openid');
     /*   $this->Openid = new OpenidComponent($collection);
        $openid = $this->Session->read('openid');
        if (!empty($openid['openid_url'])) {
             if (isset($openid['email'])) {
                $this->request->data['User']['email'] = $openid['email'];
                $this->request->data['User']['username'] = $openid['username'];
                $this->request->data['User']['openid_url'] = $openid['openid_url'];
                if (!empty($openid['is_gmail_register'])) {
                    $this->request->data['User']['is_gmail_register'] = $openid['is_gmail_register'];
                }
                if (!empty($openid['is_yahoo_register'])) {
                    $this->request->data['User']['is_yahoo_register'] = $openid['is_yahoo_register'];
                }
               $this->Session->delete('openid');
            }
        }*/
        // send to openid public function with open id url and redirect page
        if (!empty($this->request->data['User']['openid']) && preg_match('/^http?:\/\/+[a-z]/', $this->request->data['User']['openid'])) {
            $this->User->set($this->request->data);
            unset($this->User->validate[Configure::read('user.using_to_login') ]);
            unset($this->User->validate['passwd']);
            unset($this->User->validate['email']);
            if ($this->User->validates()) {
                $this->request->data['User']['redirect_page'] = 'register';
                $this->_openid();
            } else {
                $this->Session->setFlash(__l('Your registration process is not completed. Please, try again.') , 'default', null, 'error');
            }
        } else {
            if (!empty($this->request->data)) {
                $this->User->set($this->request->data);
                if ($this->User->validates()) {
                	
					//for admin notification
					$this->request->data['User']['is_admin_notification'] = 1;
					
                    $this->User->create();
                    if (!empty($this->request->data['User']['fb_user_id'])) {
                        $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['email'] . Configure::read('Security.salt'));
                        //For open id register no need for email confirm, this will override is_email_verification_for_register setting
                        $this->request->data['User']['is_agree_terms_conditions'] = 1;
                        $this->request->data['User']['is_email_confirmed'] = 1;
                       if (empty($this->request->data['User']['fb_user_id']) && empty($this->request->data['User']['is_gmail_register']) && empty($this->request->data['User']['is_yahoo_register'])&& empty($this->request->data['User']['twitter_user_id'])) {
                            $this->request->data['User']['is_openid_register'] = 1;
                        }
                    } elseif (!empty($this->request->data['User']['twitter_user_id'])) {
                        $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['twitter_user_id'] . Configure::read('Security.salt'));
                        $this->request->data['User']['is_email_confirmed'] = 1;
                    } else {
                        $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['passwd']);
                        $this->request->data['User']['is_email_confirmed'] = (Configure::read('user.is_email_verification_for_register')) ? 0 : 1;
                    }
                    if (!Configure::read('user.signup_fee')) {
                        //$this->request->data['User']['is_active'] = (Configure::read('user.is_admin_activate_after_register')) ? 0 : 1;
                    }
                    if($this->request->data['User']['user_type'] == 'doctor') {
						$this->request->data['User']['role_id'] = ConstUserTypes::Doctor;
						$this->request->data['User']['is_active']=0;
					} else {
						$this->request->data['User']['role_id'] = ConstUserTypes::User;
						$this->request->data['User']['is_active']=1;
					}
                    $this->request->data['User']['signup_ip_id'] = $this->User->toSaveIp();
                    if ($this->User->save($this->request->data, false)) {
                        if (!empty($this->request->data['City']['name'])) {
                            $this->request->data['UserProfile']['city_id'] = !empty($this->request->data['City']['id']) ? $this->request->data['City']['id'] : $this->User->UserProfile->City->findOrSaveAndGetId($this->request->data['City']['name']);
                        }
                        if (!empty($this->request->data['State']['name'])) {
                            $this->request->data['UserProfile']['state_id'] = !empty($this->request->data['State']['id']) ? $this->request->data['State']['id'] : $this->User->UserProfile->State->findOrSaveAndGetId($this->request->data['State']['name']);
                        }
                        if (!empty($this->request->data['User']['country_iso_code'])) {
                            $this->request->data['UserProfile']['country_id'] = $this->User->UserProfile->Country->findCountryIdFromIso2($this->request->data['User']['country_iso_code']);
                            if (empty($this->request->data['UserProfile']['country_id'])) {
                                unset($this->request->data['UserProfile']['country_id']);
                            }
                        }
                        $this->request->data['UserProfile']['user_id'] = $this->User->getLastInsertId();
                        $this->User->UserProfile->set($this->request->data);
                        $this->User->UserProfile->create();
                        $this->User->UserProfile->save($this->request->data);
						//Add Specialty to doctor
						if($this->request->data['User']['user_type'] == 'doctor') {
							$specialty_data['SpecialtiesUser']['user_id'] = $this->User->getLastInsertId();
							$specialty_data['SpecialtiesUser']['specialty_id'] = $this->request->data['UserProfile']['specialty_id'];
							$this->User->SpecialtiesUser->set($specialty_data);
							$this->User->SpecialtiesUser->create();
							$this->User->SpecialtiesUser->save($specialty_data);
						 }						
                        // send to admin mail if is_admin_mail_after_register is true
                        if (Configure::read('user.is_admin_mail_after_register')) {
                            $emailFindReplace = array(
                                '##USERNAME##' => $this->request->data['User']['username'],
                            );
                             // Send e-mail to users
                            $this->User->_sendEmail('New User Join', $emailFindReplace, Configure::read('EmailTemplate.admin_email'));
                                }
                        //$this->Session->setFlash(__l('You have successfully registered with our site.') , 'default', null, 'success');
                        if (!empty($this->request->data['User']['openid_url']) || !empty($this->request->data['User']['fb_user_id']) || !empty($this->request->data['User']['twitter_user_id'])) {
                            // send welcome mail to user if is_welcome_mail_after_register is true
                            if (Configure::read('user.is_welcome_mail_after_register')) {
                                $this->_sendWelcomeMail($this->User->id, $this->request->data['User']['email'], $this->request->data['User']['username']);
                            }
                            if (Configure::read('user.signup_fee')) {
                               $this->_sendMembershipMail($this->User->id, $this->User->getActivateHash($this->User->id));
                               $this->Session->setFlash(__l('You have successfully registered with our site after paying membership fee only you can login to site.') , 'default', null, 'success');
                               $this->redirect(array(
                                    'controller' => 'payments',
                                    'action' => 'membership_pay_now',
                                    $this->User->id,
                                    $this->User->getActivateHash($this->User->id)
                                ));
                            }
                            if ($this->Auth->login()) {
                                $this->User->UserLogin->insertUserLogin($this->Auth->user('id'));
                                $this->redirect(array(
                                    'controller' => 'user_profiles',
                                    'action' => 'edit'
                                ));
                            }
                        } else {
                                if (Configure::read('user.signup_fee')) {
                                  $this->_sendMembershipMail($this->User->id, $this->User->getActivateHash($this->User->id));
                                  $this->Session->setFlash(__l('You have successfully registered with our site after paying membership fee only you can login to site.') , 'default', null, 'success');
                                  $this->redirect(array(
                                    'controller' => 'payments',
                                    'action' => 'membership_pay_now',
                                    $this->User->id,
                                    $this->User->getActivateHash($this->User->id)
                                ));
                             }
                            //For openid register no need to send the activation mail, so this code placed in the else
                            if (Configure::read('user.is_email_verification_for_register')) {
                                if($this->request->data['User']['user_type'] == 'doctor') {
									// Affiliate Changes ( //
									$cookie_value = $this->Cookie->read('referrer');
									if (!empty($cookie_value) && (!Configure::read('affiliate.is_enabled'))) {
										$this->Cookie->delete('referrer'); // Delete referer cookie
	
									}
                                	// Affiliate Changes ) //
									$this->Session->setFlash(__l('You have successfully registered with our site and your activation mail has been sent to your mail inbox.') , 'default', null, 'success');
									$this->_sendActivationMail($this->request->data['User']['email'], $this->User->id, $this->User->getActivateHash($this->User->id));
									$this->redirect(array(
										'controller' => 'users',
										'action' => 'confirmation'
									));
								} else {
									$this->redirect(array(
										'controller' => 'users',
										'action' => 'enter_mobile_number',
										$this->User->id,
									));
								}	
                            }
                          }
                        // send welcome mail to user if is_welcome_mail_after_register is true
                        if (!Configure::read('user.is_email_verification_for_register') and !Configure::read('user.is_admin_activate_after_register') and Configure::read('user.is_welcome_mail_after_register')) {
                            $this->_sendWelcomeMail($this->User->id, $this->request->data['User']['email'], $this->request->data['User']['username']);
                        }
						if($this->request->data['User']['user_type'] == 'doctor') {
						$this->_sendWelcomeMail($this->User->id, $this->request->data['User']['email'], $this->request->data['User']['username']);
					} 
                        if (!Configure::read('user.is_email_verification_for_register') and Configure::read('user.is_auto_login_after_register')) {
                            $this->Session->setFlash(__l('You have successfully registered with our site.') , 'default', null, 'success');
                            if ($this->Auth->login()) {
								// Affiliate Changes ( //
                                $cookie_value = $this->Cookie->read('referrer');
                                if (!empty($cookie_value) && (!Configure::read('affiliate.is_enabled'))) {
                                    $this->Cookie->delete('referrer'); // Delete referer cookie

                                }
                                // Affiliate Changes ) //
                                $this->User->UserLogin->insertUserLogin($this->Auth->user('id'));
                                $this->redirect(array(
                                    'controller' => 'user_profiles',
                                    'action' => 'edit'
                                ));
                            }
                        }
                        $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'login'
                        ));
                    }
                } else {
                       $this->Session->setFlash(__l('Your registration process is not completed. Please, try again.') , 'default', null, 'error');
					   $type = $this->request->data['User']['user_type'] ;
					   $this->redirect(array(
                            'controller' => $type,
                            'action' => 'user',
							'register'
                        ));
                }
            }
        }
        unset($this->request->data['User']['passwd']);
        // geocode variables
        if (!empty($_COOKIE['_geo']) && empty($this->request->data['UserProfile']['country_iso_code'])) {
            $_geo = explode('|', $_COOKIE['_geo']);
            $this->request->data['UserProfile']['country_iso_code'] = $_geo[0];
            $this->request->data['State']['name'] = $_geo[1];
            $this->request->data['City']['name'] = $_geo[2];
        }
		$this->set('type', $type);
		$genders = $this->User->UserProfile->Gender->find('list');
		$specialties = $this->User->Specialty->find('list');
		$this->set(compact('genders','specialties'));
    }
    public function _openid()
    {
       //open id component included
        App::import('Core', 'ComponentCollection');
        $collection = new ComponentCollection();
        App::import('Component', 'Openid');
   /*     $this->Openid = new OpenidComponent($collection);
        $returnTo = Router::url(array(
            'controller' => 'users',
            'action' => $this->request->data['User']['redirect_page']
        ) , true);
        $siteURL = Router::url('/', true);
        // send openid url and fields return to our server from openid
        if (!empty($this->request->data)) {
            try {
                 $this->Openid->authenticate($this->request->data['User']['openid'], $returnTo, $siteURL, array(
                    'email',
                    'nickname'
                ) , array());
                      }
            catch(InvalidArgumentException $e) {
              $this->Session->setFlash(__l('Invalid OpenID') , 'default', null, 'error');
            }
            catch(Exception $e) {
                 $this->Session->setFlash(__l($e->getMessage()));
            }
        }*/
    }
    public function _sendActivationMail($user_email, $user_id, $hash)
    {
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.email' => $user_email
            ) ,
            'recursive' => -1
        ));
        $emailFindReplace = array(
            '##USERNAME##' => $user['User']['username'],
            '##ACTIVATION_URL##' => Router::url(array(
                'controller' => 'users',
                'action' => 'activation',
                $user_id,
                $hash
            ) , true) ,
        );
        $this->User->_sendEmail('Activation Request', $emailFindReplace, $user_email);
		return true;
    }
    public function _sendMembershipMail($user_id, $hash)
    {
       //send membership mail to users
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $user_id
            ) ,
            'recursive' => -1
        ));
         $emailFindReplace = array(
            '##USERNAME##' => $user['User']['username'],
            '##MEMBERSHIP_URL##' => Router::url(array(
                'controller' => 'payments',
                'action' => 'membership_pay_now',
                $user['User']['id'],
                $hash,
                'admin' => false,
            ) , true) ,
        );
        $this->User->_sendEmail('Membership Fee', $emailFindReplace, $user['User']['email']);
    }
    public function _sendWelcomeMail($user_id, $user_email, $username)
    {
        $emailFindReplace = array(
            '##USERNAME##' => $username,
            '##CONTACT_MAIL##' => Configure::read('EmailTemplate.admin_email')
        );
        $this->User->_sendEmail('Welcome Email', $emailFindReplace, $user_email);
    }
    public function activation($user_id = null, $hash = null)
    {
        $this->pageTitle = __l('Activate your account');
        if (is_null($user_id) or is_null($hash)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $user_id,
                'User.is_email_confirmed' => 0
            ) ,
            'recursive' => -1
        ));
        if (empty($user)) {
            $this->Session->setFlash(__l('Invalid activation request, please register again'));
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'register'
            ));
        }
        if (!$this->User->isValidActivateHash($user_id, $hash)) {
            $hash = $this->User->getResendActivateHash($user_id);
            $this->Session->setFlash(__l('Invalid activation request'));
            $this->set('show_resend', 1);
            $resend_url = Router::url(array(
                'controller' => 'users',
                'action' => 'resend_activation',
                $user_id,
                $hash
            ) , true);
            $this->set('resend_url', $resend_url);
        } else {
            $this->request->data['User']['id'] = $user_id;
            $this->request->data['User']['is_email_confirmed'] = 1;
            // admin will activate the user condition check
            if (!Configure::read('user.signup_fee')) {
                $this->request->data['User']['is_active'] = (Configure::read('user.is_admin_activate_after_register')) ? 0 : 1;
            }
            $this->User->save($this->request->data);
            // active is false means redirect to home page with message
            if (!$user['User']['is_active']) {
                if ((Configure::read('user.signup_fee') && $user['User']['is_paid'] == 0) || !Configure::read('user.is_admin_activate_after_register')) {
                    $this->Session->setFlash(__l('You have successfully activated your account. But you can login after pay the membership fee.') , 'default', null, 'success');
                    $this->redirect(array(
                        'controller' => 'payments',
                        'action' => 'membership_pay_now',
                        $user['User']['id'],
                        $this->User->getActivateHash($user['User']['id'])
                    ));
                } else {
                    $this->Session->setFlash(__l('You have successfully activated your account. But you can login after admin activate your account.') , 'default', null, 'success');
                }
                $this->redirect(Router::url('/', true));
            }
            // send welcome mail to user if is_welcome_mail_after_register is true
            if (Configure::read('user.is_welcome_mail_after_register')) {
                $this->_sendWelcomeMail($user['User']['id'], $user['User']['email'], $user['User']['username']);
            }
            // after the user activation check script check the auto login value. it is true then automatically logged in
            if (Configure::read('user.is_auto_login_after_register')) {
                $this->Session->setFlash(__l('You have successfully activated and logged in to your account.') , 'default', null, 'success');
                $this->request->data['User']['email'] = $user['User']['email'];
                $this->request->data['User']['username'] = $user['User']['username'];
                $this->request->data['User']['password'] = $user['User']['password'];
                if ($this->Auth->login()) {
                    $this->User->UserLogin->insertUserLogin($this->Auth->user('id'));
                    $this->redirect(array(
                        'controller' => 'user_profiles',
                        'action' => 'edit'
                    ));
                }
            }
            // user is active but auto login is false then the user will redirect to login page with message
            $this->Session->setFlash(sprintf(__l('You have successfully activated your account. Now you can login with your %s.') , Configure::read('user.using_to_login')) , 'default', null, 'success');
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'login'
            ));
        }
    }
    public function resend_activation($user_id = null, $hash = null)
    {
        if (is_null($user_id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        $hash = $this->User->getActivateHash($user_id);
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $user_id
            ) ,
            'recursive' => -1
        ));		
        if ($this->_sendActivationMail($user['User']['email'], $user_id, $hash)) {
            if ($this->Auth->user('role_id') == ConstUserTypes::Admin) {
                $this->Session->setFlash(__l('Activation mail has been resent.') , 'default', null, 'success');
            } else {
                $this->Session->setFlash(__l('A Mail for activating your account has been sent.') , 'default', null, 'success');
            }
        } else {
            $this->Session->setFlash(__l('Try some time later as mail could not be dispatched due to some error in the server') , 'default', null, 'error');
        }
        if ($this->Auth->user('role_id') == ConstUserTypes::Admin) {
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'index',
                'admin' => true
            ));
        } else {
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'login'
            ));
        }
    }
    public function oauth_facebook()
    {
        App::import('Vendor', 'facebook/facebook');
        $this->facebook = new Facebook(array(
            'appId' => Configure::read('facebook.fb_app_id') ,
            'secret' => Configure::read('facebook.fb_secrect_key') ,
            'cookie' => true
        ));
        $this->autoRender = false;
        if (!empty($_REQUEST['code'])) {
            $tokens = $this->facebook->setAccessToken(array(
                'redirect_uri' => Router::url(array(
                    'controller' => 'users',
                    'action' => 'oauth_facebook',
                    'admin' => false
                ) , true) ,
                'code' => $_REQUEST['code']
            ));
            $fbuser = $this->Session->read('fbuser');
            $fb_return_url = $this->Session->read('fb_return_url');
            $this->redirect($fb_return_url);
        } else {
            $this->Session->setFlash(__l('Invalid Facebook Connection. Please try again') , 'default', null, 'error');
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'login'
            ));
        }
    }
    public function _facebook_login()
    {
        if ($this->Auth->user()) {
            $this->redirect(Router::url('/', true));
        }
        $me = $this->Session->read('fbuser');
        if (empty($me)) {
            $this->Session->setFlash(__l('Problem in Facebook connect. Please try again') , 'default', null, 'error');
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'login'
            ));
        }
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.fb_user_id' => $me['id']
            ) ,
            'fields' => array(
                'User.id',
                'User.email',
                'User.username',
                'User.password',
                'User.fb_user_id',
                'User.is_active',
            ) ,
            'recursive' => -1
        ));
       //$this->Auth->fields['username'] = 'username';
        if (empty($user)) {
			$checkFacebookEmail = $this->User->find('first', array(
                'conditions' => array(
                    'User.email' => $me['email']
                ) ,
                'fields' => array(
                    'User.id',
                    'User.email',
                    'User.username',
                    'User.password',
                    'User.fb_user_id',
                    'User.is_active',
                ) ,
                'recursive' => -1
            ));
            if (!empty($checkFacebookEmail)) {
                $this->Session->delete('fbuser');
                if (empty($checkFacebookEmail['User']['is_active'])) {
                    $this->Session->setFlash($this->Auth->loginError, 'default', null, 'error');
                    $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'login',
                        'admin' => false
                    ));
                }
                $_data['User']['username'] = $checkFacebookEmail['User']['username'];
                $_data['User']['email'] = $checkFacebookEmail['User']['email'];
                $_data['User']['password'] = $checkFacebookEmail['User']['password'];
                if ($this->Auth->login($_data)) {
                    $this->User->UserLogin->insertUserLogin($this->Auth->user('id'));
                    if ($redirectUrl = $this->Session->read('Auth.redirectUrl')) {
                        $this->Session->delete('Auth.redirectUrl');
                        $this->redirect(Router::url('/', true) . $redirectUrl);
                    } else {
                        $this->redirect(array(
                            'controller' => 'appointments',
                            'action' => 'browse',
                        ));
                    }
                }
            }
			/*$temp['UserProfile']['first_name'] = !empty($me['first_name']) ? $me['first_name'] : '';
            $temp['UserProfile']['middle_name'] = !empty($me['middle_name']) ? $me['middle_name'] : '';
            $temp['UserProfile']['last_name'] = !empty($me['last_name']) ? $me['last_name'] : '';
            $temp['UserProfile']['about_me'] = !empty($me['about_me']) ? $me['about_me'] : '';
			$temp['User']['email'] = !empty($me['email']) ? $me['email'] : '';
			$temp['User']['fb_user_id'] = $me['id'];
            $temp['User']['fb_access_token'] = $me['access_token'];
			$temp['User']['role_id'] = ConstUserTypes::Doctor;
			$this->Session->write('doctor_fbuser', $temp);
			$this->redirect(array(
				'controller' => 'users',
				'action' => 'register'
			 ));*/
            $this->User->create();
            $this->request->data['UserProfile']['first_name'] = !empty($me['first_name']) ? $me['first_name'] : '';
            $this->request->data['UserProfile']['middle_name'] = !empty($me['middle_name']) ? $me['middle_name'] : '';
            $this->request->data['UserProfile']['last_name'] = !empty($me['last_name']) ? $me['last_name'] : '';
            $this->request->data['UserProfile']['about_me'] = !empty($me['about_me']) ? $me['about_me'] : '';
            if (empty($this->request->data['User']['username']) && strlen($me['first_name']) > 2) {
                $this->request->data['User']['username'] = $this->User->checkUsernameAvailable(strtolower($me['first_name']));
            }
            if (empty($this->request->data['User']['username']) && strlen($me['first_name'] . $me['last_name']) > 2) {
                $this->request->data['User']['username'] = $this->User->checkUsernameAvailable(strtolower($me['first_name'] . $me['last_name']));
            }
            if (empty($this->request->data['User']['username']) && !empty($me['middle_name']) && strlen($me['first_name'] . $me['middle_name'] . $me['last_name']) > 2) {
                $this->request->data['User']['username'] = $this->User->checkUsernameAvailable(strtolower($me['first_name'] . $me['middle_name'] . $me['last_name']));
            }
            $this->request->data['User']['email'] = !empty($me['email']) ? $me['email'] : '';
            $this->request->data['User']['email'] = !empty($me['email']) ? $me['email'] : '';
            if (!empty($this->request->data['User']['email'])) {
                $check_user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.email' => $this->request->data['User']['email']
                    ) ,
                    'recursive' => -1
                ));
                $this->request->data['User']['id'] = $check_user['User']['id'];
            }
            $this->request->data['User']['fb_user_id'] = $me['id'];
            $this->request->data['User']['fb_access_token'] = $me['access_token'];
            $this->request->data['User']['password'] = $this->Auth->password($me['id'] . Configure::read('Security.salt'));
            $this->request->data['User']['is_agree_terms_conditions'] = '1';
            $this->request->data['User']['is_email_confirmed'] = 0;
            if (!Configure::read('user.signup_fee')) {
                $this->request->data['User']['is_active'] = 1;
            }
            $this->request->data['User']['is_facebook_register'] = 1;
            $this->request->data['User']['role_id'] = ConstUserTypes::Doctor;
            $this->request->data['User']['signup_ip_id'] = $this->User->toSaveIp();
            $this->User->save($this->request->data, false);
            $this->request->data['UserProfile']['user_id'] = $this->User->id;
            $this->User->UserProfile->save($this->request->data);
			if (Configure::read('user.signup_fee')) {
				$this->_sendMembershipMail($this->User->id, $this->User->getActivateHash($this->User->id));
				$this->Session->delete('fbuser');
				$this->Session->setFlash(__l('You have successfully registered with our site after paying membership fee only you can login to site.') , 'default', null, 'success');
				$this->redirect(array(
					'controller' => 'payments',
					'action' => 'membership_pay_now',
					$this->User->id,
					$this->User->getActivateHash($this->User->id)
				));
			}
            if ($this->Auth->login()) {
                if (Configure::read('user.is_admin_mail_after_register') && empty($this->request->data['User']['id'])) {
                    // Affiliate Changes ( //
					$cookie_value = $this->Cookie->read('referrer');
					if (!empty($cookie_value) && (!Configure::read('affiliate.is_enabled'))) {
						$this->Cookie->delete('referrer'); // Delete referer cookie
	
					}
	                // Affiliate Changes ) //
					$emailFindReplace = array(
                        '##USERNAME##' => $this->request->data['User']['username'],
                        '##USEREMAIL##' => $this->request->data['User']['email'],
                        '##SIGNUPIP##' => $this->RequestHandler->getClientIP() ,
                    );
                    // Send e-mail to users
                    $this->User->_sendEmail('New User Join', $emailFindReplace, Configure::read('EmailTemplate.admin_email'));
                }
				// send welcome mail to user if is_welcome_mail_after_register is true
				if (Configure::read('user.is_welcome_mail_after_register')) {
					$this->_sendWelcomeMail($this->User->id, $this->request->data['User']['email'], $this->request->data['User']['username']);
				}
                $this->Session->setFlash(__l('You have successfully registered with our site.') , 'default', null, 'success');
                if ($redirectUrl = $this->Session->read('Auth.redirectUrl')) {
                    $this->Session->delete('Auth.redirectUrl');
                    $this->redirect(Router::url('/', true) . $redirectUrl);
                } else {
                    $this->redirect(Router::url('/', true));
                }
            }
        } else {
              if (!$user['User']['is_active']) {
                $this->Session->setFlash(__l('Sorry, login failed.  Your account has been blocked') , 'default', null, 'error');
                $this->redirect(Router::url('/', true));
            }
            $this->request->data['User']['fb_user_id'] = $me['id'];
            $this->User->updateAll(array(
                'User.fb_access_token' => '\'' . $me['access_token'] . '\'',
                'User.fb_user_id' => '\'' . $me['id'] . '\'',
            ) , array(
                'User.id' => $user['User']['id']
            ));
            $this->request->data['User']['email'] = $user['User']['email'];
            $this->request->data['User']['username'] = $user['User']['username'];
            $this->request->data['User']['password'] = $user['User']['password'];
           if ($this->Auth->login()) {
                    $this->User->UserLogin->insertUserLogin($this->Auth->user('id'));
                if ($redirectUrl = $this->Session->read('Auth.redirectUrl')) {
                    $this->Session->delete('Auth.redirectUrl');
                    $this->redirect(Router::url('/', true) . $redirectUrl);
                } else {
                    $this->redirect(Router::url('/', true));
                }
            }
        }
    }
    public function oauth_callback()
    {
        App::import('Core', 'ComponentCollection');
        $collection = new ComponentCollection();
        App::import('Component', 'OauthConsumer');
        $this->OauthConsumer = new OauthConsumerComponent($collection);
        App::import('Xml');
        $this->autoRender = false;
        $requestToken = $this->Session->read('requestToken');
        $requestToken = unserialize($requestToken);
        $accessToken = $this->OauthConsumer->getAccessToken('Twitter', 'https://api.twitter.com/oauth/access_token', $requestToken);
        $this->Session->write('accessToken', $accessToken);
        $oauth_xml = $this->OauthConsumer->get('Twitter', $accessToken->key, $accessToken->secret, 'https://twitter.com/account/verify_credentials.xml');
        $this->request->data['User']['twitter_access_token'] = (isset($accessToken->key)) ? $accessToken->key : '';
        $this->request->data['User']['twitter_access_key'] = (isset($accessToken->secret)) ? $accessToken->secret : '';
        $data = Xml::toArray(Xml::build($oauth_xml['body']));
        // Modifying array index for existing code //
        $data['User'] = $data['user'];
        unset($data['user']);
        // So this to check whether it is  admin login to get its twiiter acces tocken
        if ($this->Auth->user('id') and $this->Auth->user('role_id') == ConstUserTypes::Admin) {
            App::import('Model', 'Setting');
            $setting = new Setting;
            $setting->updateAll(array(
                'Setting.value' => "'" . $this->request->data['User']['twitter_access_token'] . "'",
            ) , array(
                'Setting.name' => 'twitter.site_user_access_token'
            ));
            $setting->updateAll(array(
                'Setting.value' => "'" . $this->request->data['User']['twitter_access_key'] . "'"
            ) , array(
                'Setting.name' => 'twitter.site_user_access_key'
            ));
            $this->Session->setFlash(__l('Your twitter credentials are updated') , 'default', null, 'success');
            $this->redirect(array(
                'controller' => 'settings',
                'admin' => true
            ));
        }
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.twitter_user_id =' => $data['User']['id']
            ) ,
            'fields' => array(
                'User.id',
                'UserProfile.id',
                'User.role_id',
                'User.username',
                'User.email',
            ) ,
            'recursive' => 0
        ));
        if (empty($user)) {
            $temp['first_name'] = empty($data['User']['name']) ? $data['User']['name'] : '';
            $temp['last_name'] = empty($data['User']['name']) ? $data['User']['name'] : '';
            if (empty($temp['username']) && strlen($data['User']['name']) > 2) {
                $temp['username'] = $this->User->checkUsernameAvailable(strtolower($data['User']['name']));
            }
            if (empty($temp['username']) && strlen($data['User']['name'] . $data['User']['screen_name']) < 2) {
                $temp['username'] = $this->User->checkUsernameAvailable(strtolower($data['User']['name'] . $data['User']['screen_name']));
            }
            $temp['twitter_user_id'] = !empty($data['User']['id']) ? $data['User']['id'] : '';
            $temp['twitter_access_token'] = (!empty($accessToken->key)) ? $accessToken->key : '';
            $temp['twitter_access_key'] = (!empty($accessToken->secret)) ? $accessToken->secret : '';
            $this->Session->write('twuser', $temp);
            $this->redirect(array(
                'controller' => 'users',
                'action' => 'register'
            ));
        } else {
            $this->request->data['User']['id'] = $user['User']['id'];
            $this->request->data['User']['username'] = $user['User']['username'];
        }
        unset($this->User->validate['username']['rule2']);
        unset($this->User->validate['username']['rule3']);
        $this->request->data['User']['password'] = $this->Auth->password($data['User']['id'] . Configure::read('Security.salt'));
        $this->request->data['User']['avatar_url'] = $data['User']['profile_image_url'];
        $this->request->data['User']['twitter_url'] = (!empty($data['User']['url'])) ? $data['User']['url'] : '';
        $this->request->data['User']['description'] = (!empty($data['User']['description'])) ? $data['User']['description'] : '';
        $this->request->data['User']['location'] = (!empty($data['User']['location'])) ? $data['User']['location'] : '';
        if ($this->User->save($this->request->data, false)) {
            //$this->_postJoinedStatus($this->User->id);
            if ($this->Auth->login()) {
                $this->User->UserLogin->insertUserLogin($this->Auth->user('id'));
                $this->redirect(Router::url('/', true));
            }
        }
        if (!empty($this->request->data['User']['f'])) {
            $this->redirect(Router::url('/', true) . $this->request->data['User']['f']);
        }
        $this->redirect(Router::url('/', true));
    }
    public function forgot_password()
    {
        $this->pageTitle = __l('Forgot Password');
        if ($this->Auth->user('id')) {
            $this->redirect('/');
        }
        if (!empty($this->request->data)) {
            $this->User->set($this->request->data);
            //Important: For forgot password unique email id check validation not necessary.
            unset($this->User->validate['email']['rule3']);
            if ($this->User->validates()) {
                $user = $this->User->find('first', array(
                    'conditions' => array(
                        'User.email =' => $this->request->data['User']['email'],
                        'User.is_active' => 1
                    ) ,
                    'fields' => array(
                        'User.id',
                        'User.email'
                    ) ,
                    'recursive' => -1
                ));
                if (!empty($user['User']['email'])) {
                    $user = $this->User->find('first', array(
                        'conditions' => array(
                            'User.email' => $user['User']['email']
                        ) ,
                        'recursive' => -1
                    ));
                    $emailFindReplace = array(
                        '##FIRST_NAME##' => (!empty($user['User']['first_name'])) ? $user['User']['first_name'] : '',
                        '##LAST_NAME##' => (!empty($user['User']['last_name'])) ? $user['User']['last_name'] : '',
                        '##RESET_URL##' => Router::url(array(
                            'controller' => 'users',
                            'action' => 'reset',
                            $user['User']['id'],
                            $this->User->getResetPasswordHash($user['User']['id'])
                        ) , true)
                    );
                    $this->User->_sendEmail('Forgot Password', $emailFindReplace, $user['User']['email']);
                    $this->Session->setFlash(__l('An email has been sent with a link where you can change your password') , 'default', null, 'success');
                    $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'login'
                    ));
                } else {
                    $this->Session->setFlash(sprintf(__l('There is no user registered with the email %s or admin deactivated your account. If you spelled the address incorrectly or entered the wrong address, please try again.') , $this->request->data['User']['email']) , 'default', null, 'error');
                }
            }
        }
    }
    public function change_password($user_id = null)
    {
        $this->pageTitle = __l('Change Password');
        if (!empty($this->request->data)) {
            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                if ($this->User->updateAll(array(
                    'User.password' => '\'' . $this->Auth->password($this->request->data['User']['passwd']) . '\'',
                ) , array(
                    'User.id' => $this->request->data['User']['user_id']
                ))) {
                    if ($this->Auth->user('role_id') != ConstUserTypes::Admin && Configure::read('user.is_logout_after_change_password')) {
                        $this->Auth->logout();
                        $this->Session->setFlash(__l('Your password has been changed successfully. Please login now') , 'default', null, 'success');
                        $this->redirect(array(
                            'action' => 'login'
                        ));
                    } elseif ($this->Auth->user('role_id') == ConstUserTypes::Admin && $this->Auth->user('id') != $this->request->data['User']['user_id']) {
                        $user = $this->User->find('first', array(
                            'conditions' => array(
                                'User.id' => $this->request->data['User']['user_id']
                            ) ,
                            'fields' => array(
                                'User.username',
                                'User.email'
                            ) ,
                            'recursive' => -1
                        ));
                        $emailFindReplace = array(
                            '##PASSWORD##' => $this->request->data['User']['passwd'],
                            '##USERNAME##' => $user['User']['username'],
                        );
                       // Send e-mail to users
                       $this->User->_sendEmail('Admin Change Password', $emailFindReplace, $user['User']['email']);
                    }
                    $this->Session->setFlash(__l('Your password has been changed successfully') , 'default', null, 'success');
                } else {
                    $this->Session->setFlash(__l('Password could not be changed') , 'default', null, 'error');
                }
            } else {
                $this->Session->setFlash(__l('Password could not be changed') , 'default', null, 'error');
            }
            unset($this->request->data['User']['old_password']);
            unset($this->request->data['User']['passwd']);
            unset($this->request->data['User']['confirm_password']);
            if ($this->Auth->user('role_id') == ConstUserTypes::Admin) {
                $this->redirect(array(
                    'action' => 'index',
                    'admin' => true
                ));
            }
        } else {
            if (empty($user_id)) {
                $user_id = $this->Auth->user('id');
            }
        }
        if ($this->Auth->user('role_id') == ConstUserTypes::Admin) {
            $users = $this->User->find('list');
            $this->set(compact('users'));
        }
        $this->request->data['User']['user_id'] = (!empty($this->request->data['User']['user_id'])) ? $this->request->data['User']['user_id'] : $user_id;
    }
    public function login()
    {
        App::import('Core', 'ComponentCollection');
        $collection = new ComponentCollection();
        App::import('Component', 'OauthConsumer');
        $this->OauthConsumer = new OauthConsumerComponent($collection);
        unset($this->User->validate['email']['rule3']);
        unset($this->User->validate['email']['rule4']);
        unset($this->User->validate['username']['rule3']);
        $fb_sess_check = $this->Session->read('fbuser');
        if (empty($this->request->data) and Configure::read('facebook.is_enabled_facebook_connect') && !$this->Auth->user() && !empty($fb_sess_check) && !$this->Session->check('is_fab_session_cleared')) {
            $this->_facebook_login();
        }
        $this->pageTitle = __l('Login');
        // Twitter Login //
        if (!empty($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'twitter' && Configure::read('twitter.is_enabled_twitter_connect')) {
            $twitter_return_url = Router::url(array(
                'controller' => 'users',
                'action' => 'oauth_callback',
                'admin' => false
            ) , true);
            $requestToken = $this->OauthConsumer->getRequestToken('Twitter', 'https://api.twitter.com/oauth/request_token', $twitter_return_url);
            $this->Session->write('requestToken', serialize($requestToken));
            if ($this->Auth->user('role_id') == ConstUserTypes::Admin) {
                $this->redirect('http://twitter.com/oauth/authorize?oauth_token=' . $requestToken->key);
            } else {
                $this->set('redirect_url', 'http://twitter.com/oauth/authorize?oauth_token=' . $requestToken->key);
                $this->set('authorize_name', 'twitter');
                $this->layout = 'redirection';
                $this->pageTitle.= ' - ' . __l('Twitter');
                $this->render('authorize');
            }
        }
        // Facebook Login //
        if (!empty($this->params['named']['type']) && $this->params['named']['type'] == 'facebook') {
            $fb_return_url = Router::url(array(
                'controller' => 'users',
                'action' => 'register',
                'admin' => false
            ) , true);
            $this->Session->write('fb_return_url', $fb_return_url);
            $redirect_url = $this->facebook->getLoginUrl(array(
                'redirect_uri' => Router::url(array(
                    'controller' => 'users',
                    'action' => 'oauth_facebook',
                    'admin' => false
                ) , true) ,
                'scope' => 'email,publish_stream'
            ));
            $this->set('redirect_url', $redirect_url);
            $this->set('authorize_name', 'facebook');
            $this->layout = 'redirection';
            $this->pageTitle.= ' - ' . __l('Facebook');
            $this->render('authorize');
        }
        // yahoo Login //
        if (!empty($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'yahoo') {
            $this->request->data['User']['email'] = '';
            $this->request->data['User']['password'] = '';
            $this->request->data['User']['redirect_page'] = 'login';
            $this->request->data['User']['openid'] = 'http://yahoo.com/';
            $this->_openid();
                 }
        // gmail Login //
        if (!empty($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'gmail') {
            $this->request->data['User']['email'] = '';
            $this->request->data['User']['password'] = '';
            $this->request->data['User']['redirect_page'] = 'login';
            $this->request->data['User']['openid'] = 'https://www.google.com/accounts/o8/id';
            $this->_openid();
        }
        //open id component included
        App::import('Core', 'ComponentCollection');
        $collection = new ComponentCollection();
        App::import('Component', 'Openid');
      /*  $this->Openid = new OpenidComponent($collection);
         // handle the fields return from openid
        if (!empty($_GET['openid_identity'])) {
            $returnTo = Router::url(array(
                'controller' => 'users',
                'action' => 'login'
            ) , true);
            $response = $this->Openid->getResponse($returnTo);
            if ($response->status == Auth_OpenID_SUCCESS) {
                  // Required Fields
                if ($user = $this->User->UserOpenid->find('first', array(
                    'conditions' => array(
                        'UserOpenid.openid' => $response->identity_url
                    ) ,
                    'recursive' => -1
                ))) {
                    //Already existing user need to do auto login
                    $this->request->data['User']['email'] = !empty($user['User']['email']) ? $user['User']['email'] : '';
                    $this->request->data['User']['username'] = !empty($user['User']['username']) ? $user['User']['username'] : '';
                    $this->request->data['User']['password'] = $this->Auth->password(!empty($user['User']['password']) ? $user['User']['password'] : '');
                        if ($this->Auth->login()) {
                        $this->User->UserLogin->insertUserLogin($this->Auth->user('id'));
                        if ($redirectUrl = $this->Session->read('Auth.redirectUrl')) {
                            $this->Session->delete('Auth.redirectUrl');
                            $this->redirect(Router::url('/', true) . $redirectUrl);
                        } else {
                            if ($this->RequestHandler->isAjax()) {
                                echo 'success';
                                exit;
                            } else {
                                $this->redirect(array(
                                    'controller' => 'user_profiles',
                                    'action' => 'edit'
                                ));
                            }
                        }
                    } else {
                        $this->Session->setFlash($this->Auth->loginError, 'default', null, 'error');
                        $this->redirect(array(
                            'controller' => 'users',
                            'action' => 'login'
                        ));
                    }
                } else {
                    $sregResponse = Auth_OpenID_SRegResponse::fromSuccessResponse($response);
                    $sreg = $sregResponse->contents();
                    $temp['username'] = isset($sreg['nickname']) ? $sreg['nickname'] : '';
                    $temp['email'] = isset($sreg['email']) ? $sreg['email'] : '';
                    $temp['openid_url'] = $response->identity_url;
                    $respone_url = $response->identity_url;
                    $respone_url = parse_url($respone_url);
                    if (!empty($respone_url['host']) && $respone_url['host'] == 'www.google.com') {
                        $temp['is_gmail_register'] = 1;
                    } elseif (!empty($respone_url['host']) && $respone_url['host'] == 'me.yahoo.com') {
                        $temp['is_yahoo_register'] = 1;
                    }
                    $this->Session->write('openid', $temp);
                    $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'register'
                    ));
                }
            } else {
                $this->Session->setFlash(__l('Authenticated failed or you may not have profile in your OpenID account'));
            }
        }*/
        // check open id is given or not
        if (!empty($this->request->data['User']['openid']) && preg_match('/^(http|https)?:\/\/+[a-z]/', $this->request->data['User']['openid'])) {
            // Fix for given both email and openid url in login page....
            $this->Auth->logout();
            $this->request->data['User']['email'] = '';
            $this->request->data['User']['password'] = '';
            $this->request->data['User']['redirect_page'] = 'login';
            $this->_openid();
        } else {
            // remember me for user
            if (!empty($this->request->data) && empty($this->request->data['User']['openid'])) {
                $this->request->data['User'][Configure::read('user.using_to_login') ] = trim($this->request->data['User'][Configure::read('user.using_to_login') ]);
                //Important: For login unique username or email check validation not necessary. Also in login method authentication done before validation.
                unset($this->User->validate[Configure::read('user.using_to_login') ]['rule3']);
                $this->User->set($this->request->data);
                if ($this->User->validates()) {
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['passwd']);
                    if ($this->Auth->login()) {
                        $this->User->UserLogin->insertUserLogin($this->Auth->user('id'));
                        if ($this->Auth->user()) {
                            if (!empty($this->request->data['User']['is_remember']) and $this->request->data['User']['is_remember'] == 1) {
                                $this->Cookie->delete('User');
                                $cookie = array();
                                $remember_hash = md5($this->request->data['User'][Configure::read('user.using_to_login') ] . $this->request->data['User']['password'] . Configure::read('Security.salt'));
                                $cookie['cookie_hash'] = $remember_hash;
                                $this->Cookie->write('User', $cookie, true, $this->cookieTerm);
                                $this->User->updateAll(array(
                                    'User.cookie_hash' => '\'' . md5($remember_hash) . '\'',
                                    'User.cookie_time_modified' => '\'' . date('Y-m-d h:i:s') . '\'',
                                ) , array(
                                    'User.id' => $this->Auth->user('id')
                                ));
                            } else {
                                $this->Cookie->delete('User');
                            }
                            if ($this->Auth->user('role_id') == ConstUserTypes::Admin) {
                                $this->redirect(array(
                                    'controller' => 'users',
                                    'action' => 'index',
                                    'prefix' => 'admin',
                                    'admin' => true
                                ));
                            } elseif (!empty($this->request->data['User']['f']) and !$this->RequestHandler->isAjax()) {
                                $this->redirect(Router::url('/', true) . $this->request->data['User']['f']);
                            } else {
                                if ($this->Auth->user('role_id') == ConstUserTypes::User) {
									$this->redirect(array(
										'controller' => 'appointments',
										'action' => 'browse',
										'admin' => false
									));
								} else if ($this->Auth->user('role_id') == ConstUserTypes::Doctor) {
									$this->redirect(array(
										'controller' => 'appointments',
										'action' => 'index',
										'admin' => false
									));
								} else  {
									$this->redirect(array(
										'controller' => 'clinics',
										'action' => 'index',
										'admin' => false
									));
								}		
                            }
                        }
                    } else {
                        $this->User->validationErrors['passwd'] = __l('Sorry, login failed. Your ') . Configure::read('user.using_to_login') . __l(' or password are incorrect');
                        if (!empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {
                            $this->Session->setFlash(sprintf(__l('Sorry, login failed.  Your %s or password are incorrect') , Configure::read('user.using_to_login')) , 'default', null, 'error');
                        } else {
                            $this->Session->setFlash($this->Auth->loginError, 'default', null, 'error');
                        }
                    }
                } else {
                    $this->Session->setFlash($this->Auth->loginError, 'default', null, 'error');
                }
            }
        }
        //When already logged user trying to access the login page we are redirecting to site home page
        if ($this->Auth->user()) {
            if ($this->RequestHandler->isAjax()) {
                echo 'success';
                exit;
            } else {
                $this->redirect(array(
                    'controller' => 'appointments',
                    'action' => 'browse',
                    'admin' => false
                ));
            }
        }
        if (!empty($this->request->data['User']['type']) && $this->request->data['User']['type'] == 'openid') {
            $this->request->params['named']['type'] = 'openid';
        }
        if (!empty($this->request->params['named']['type']) and $this->request->params['named']['type'] == 'openid') {
            if (!empty($this->request->data) && (empty($this->request->data['User']['openid']) || $this->request->data['User']['openid'] == "Click to Sign In")) {
                $this->User->validationErrors['openid'] = __l('Required');
                $this->Session->setFlash(__l('Invalid OpenID entered. Please enter valid OpenID') , 'default', null, 'error');
            }
            $this->render('login_ajax_openid');
        }
        $this->request->data['User']['passwd'] = '';
    }
    public function logout()
    {
        if ($this->Auth->user('fb_user_id')) {
            // Quick fix for facebook redirect loop issue.
            $this->Session->delete('fbuser');
            $this->Session->write('is_fab_session_cleared', 1);
        }
        $this->Auth->logout();
        $this->Cookie->delete('User');
        $this->Cookie->delete('user_language');
        $this->Session->setFlash(__l('You are now logged out of the site.') , 'default', null, 'success');
        $this->redirect(array(
            'controller' => 'users',
            'action' => 'login'
        ));
    }
    public function view($username,$clinic_id=null)
    {
		if(!empty($this->request->params['named']['clinic_id'])) {
				$this->set('clinic_id', $this->request->params['named']['clinic_id']);
				$clinic_id = $this->request->params['named']['clinic_id'];
			}
		$user = $this->User->find('first', array(
            'conditions' => array(
                'User.username = ' => $username
            ) ,
            'contain' => array(
				'InsuranceCompany' => array(
					'fields' => array(
							'InsuranceCompany.id',
							'InsuranceCompany.name',
						) 
				 ),		
				'Photo' => array(
					'Attachment' => array(
						'fields' => array(
							'Attachment.id',
							'Attachment.filename',
							'Attachment.dir',
							'Attachment.width',
							'Attachment.height',
						)	
					)
				), 
				'UserEducation',
			 	'Language' => array(
					'fields' => array(
						'Language.id',
						'Language.name',
                    )
                ) ,
				'UserProfile' => array(
                    'fields' => array(
                        'UserProfile.created',
                        'UserProfile.first_name',
                        'UserProfile.last_name',
                        'UserProfile.middle_name',
                        'UserProfile.about_me',
                        'UserProfile.dob',
                        'UserProfile.address',
                        'UserProfile.zip_code',
                        'UserProfile.specialty_id',
						'UserProfile.latitude',
						'UserProfile.longitude',
						'UserProfile.board_certifications',
						'UserProfile.memberships',
						'UserProfile.awards',
						'UserProfile.title',
						'UserProfile.phone',
						'UserProfile.practice_name',
                    ) ,
					'Specialty' => array(
                        'fields' => array(
                            'Specialty.name'
                        )
                    ) ,
					'Clinic' => array(
                        'fields' => array(
                            'Clinic.name',
							'Clinic.address'
                        )
                    ) ,
                    'Gender' => array(
                        'fields' => array(
                            'Gender.name'
                        )
                    ) ,
                    'City' => array(
                        'fields' => array(
                            'City.name'
                        )
                    ) ,
                    'State' => array(
                        'fields' => array(
                            'State.name',
							'State.code'
                        )
                    ) ,
                    'Country' => array(
                        'fields' => array(
                            'Country.name',
                            'Country.iso2'
                        )
                    )
                ) ,
                'UserAvatar' => array(
                    'fields' => array(
                        'UserAvatar.id',
                        'UserAvatar.dir',
                        'UserAvatar.filename',
                        'UserAvatar.width',
                        'UserAvatar.height'
                    )
                )
            ) ,
			'fields' => array(
				'User.username',
				'User.email',
				'User.created',
				'User.default_thumbnail_id',
				'User.overall_rating_count', 
				'User.overall_avg_rating',
				'User.is_active',
				'User.is_partner'
            ) ,
            'recursive' => 3
        ));
		
		if($user['User']['default_thumbnail_id'] == 0) {
			$default_thumbnail_id = 1;		
		} else {
			$default_thumbnail_id = $user['User']['default_thumbnail_id'];
		}
		$default_photo = $this->User->Photo->Attachment->find('first', array(
             'conditions' => array(
                'Attachment.id = ' => $default_thumbnail_id
            ) ,
            'fields' => array(
                'Attachment.id',
                'Attachment.filename',
                'Attachment.dir',
                'Attachment.width',
                'Attachment.height'
            ) ,
            'recursive' => 0,
        ));
		$userphotos = $this->User->Photo->find('all', array(
            'conditions' => array(
                'Photo.user_id = ' => $user['User']['id']
            ) ,
           'contain' => array(
                'Attachment' => array(
                     'conditions' => array(
               			 'Attachment.id != ' => $user['User']['default_thumbnail_id']
			         ) ,
					'fields' => array(
                        'Attachment.id',
                        'Attachment.filename',
                        'Attachment.dir',
                        'Attachment.width',
                        'Attachment.height'
                    )
                ) 
            ) ,		
            'recursive' => 0,
        ));
		/*echo '<pre>';
		print_r($userphotos);die;
		if(!empty($userphotos)) {
			foreach($userphotos as $userphoto) {
				$image_options = array(
					'dimension' => 'big_thumb',
					'class' => '',
					'alt' => $event['Event']['title'],
					'title' => $event['Event']['title'],
					'type' => 'png',
					'full_url' => true,
            	);
				$post_data['image_url'] = Router::url('/', true) . getImageUrl('Event', $event['Attachment'], $image_options);
			}
		}*/
		$specialtyUsers = $this->User->SpecialtiesUser->find('all', array(
			'conditions' => array(
				'SpecialtiesUser.user_id' => $user['User']['id'],
			) ,
			'recursive' => -1
        ));
		$user_specialty_ids = array();
		foreach($specialtyUsers as $specialtyUser) {
			$user_specialty_ids[] = $specialtyUser['SpecialtiesUser']['specialty_id'];
		}
		$conditions['Specialty.id'] = $user_specialty_ids;
		$conditions['Specialty.is_active'] = 1;
		$specialties = $this->User->Specialty->find('all', array(
	            'conditions' =>$conditions,
				'fields' => array(
					'Specialty.name',
					'Specialty.slug'
				),
				'order' => array(
					'Specialty.name' => 'asc'
				),
				'recursive' => -1
        ));
		
		$clinicUsers = $this->User->ClinicsUser->find('all', array(
			'conditions' => array(
				'ClinicsUser.user_id' => $user['User']['id'],
			) ,
			'recursive' => -1
        ));
		$user_clinic_ids = array();
		foreach($clinicUsers as $clinicUser) {
			$user_clinic_ids[] = $clinicUser['ClinicsUser']['clinic_id'];
		}
		$conditions=array();
		$conditions['Clinic.id'] = $user_clinic_ids;
		$conditions['Clinic.is_active'] = 1;
		$clinics = $this->User->Clinic->find('all', array(
	            'conditions' =>$conditions,
				'fields' => array(
					'Clinic.name',
					'Clinic.id',
					'Clinic.slug'
				),
				'order' => array(
					'Clinic.name' => 'asc'
				),
				'recursive' => -1
        ));

        if (!isset($user['User']['id'])) {
            $this->Session->setFlash(__l('Invalid User.', true) , 'default', array(
                'class' => 'error'
            ));
            $this->redirect('/');
        }       
        $this->set('title_for_layout', $user['User']['username']);
        $this->User->UserView->create();
        $this->request->data['UserView']['user_id'] = $user['User']['id'];
        $this->request->data['UserView']['viewing_user_id'] = $this->Auth->user('id');
        $this->request->data['UserView']['ip_id'] = $this->User->UserView->toSaveIp();
        $this->User->UserView->save($this->request->data);
		$this->pageTitle = __l('Dr. ').$username.' - '. $user['UserProfile']['title'] .' - '. $user['UserProfile']['Specialty']['name'].' - '.'Reviews & Appointments';
        $this->set(compact('user','default_photo','userphotos','specialties','clinics'));
    }   
    public function admin_send_mail()
    {
        $this->pageTitle = __l('Email to users');
        if (!empty($this->request->data)) {
            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                $conditions = $emails = array();
                $notSendCount = $sendCount = 0;
                if (!empty($this->request->data['User']['send_to'])) {
                    $sendTo = explode(',', $this->request->data['User']['send_to']);
                    foreach($sendTo as $email) {
                        $email = trim($email);
                        if (!empty($email)) {
                            if ($this->User->find('count', array(
                                'conditions' => array(
                                    'User.email' => $email
                                )
                            ))) {
                                $emails[] = $email;
                                $sendCount++;
                            } else {
                                $notSendCount++;
                            }
                        }
                    }
                }
                if (!empty($this->request->data['User']['bulk_mail_option_id'])) {
                    if ($this->request->data['User']['bulk_mail_option_id'] == 2) {
                        $conditions['User.is_active'] = 0;
                    }
                    if ($this->request->data['User']['bulk_mail_option_id'] == 3) {
                        $conditions['User.is_active'] = 1;
                    }
                    if ($this->request->data['User']['bulk_mail_option_id'] == 4) {
                        $conditions['UserProfile.gender_id'] = ConstGenders::Male;
                    }
                    if ($this->request->data['User']['bulk_mail_option_id'] == 5) {
                        $conditions['UserProfile.gender_id'] = ConstGenders::Female;
                    }
                    if ($this->request->data['User']['bulk_mail_option_id'] == 6) {
                        $conditions['User.is_facebook_register !='] = 0;
                        $conditions['User.role_id = '] = ConstUserTypes::User;
                    }
                    if ($this->request->data['User']['bulk_mail_option_id'] == 7) {
                        $conditions['User.is_gmail_register !='] = 0;
                        $conditions['User.role_id = '] = ConstUserTypes::User;
                    }
                    if ($this->request->data['User']['bulk_mail_option_id'] == 8) {
                        $conditions['User.is_twitter_register !='] = 0;
                        $conditions['User.role_id = '] = ConstUserTypes::User;
                    }
                    if ($this->request->data['User']['bulk_mail_option_id'] == 9) {
                        $conditions['User.is_openid_register !='] = 0;
                        $conditions['User.role_id = '] = ConstUserTypes::User;
                    }
                    if ($this->request->data['User']['bulk_mail_option_id'] == 10) {
                        $conditions['User.is_gmail_register !='] = 0;
                        $conditions['User.role_id = '] = ConstUserTypes::User;
                    }
                    $users = $this->User->find('all', array(
                        'conditions' => $conditions,
                        'fields' => array(
                            'User.email'
                        ) ,
                        'recursive' => -1
                    ));
                    if (!empty($users)) {
                        $sendCount++;
                        foreach($users as $user) {
                            $emails[] = $user['User']['email'];
                        }
                    }
                }
                if (!empty($emails)) {
                    foreach($emails as $email) {
                        if (!empty($email)) {
                            $this->Email->from = Configure::read('site.noreply_email');
                            $this->Email->to = trim($email);
                            $this->Email->subject = $this->request->data['User']['subject'];
                            $this->Email->send($this->request->data['User']['message']);
                             }
                    }
                }
                if ($sendCount && !$notSendCount) {
                    $this->Session->setFlash(__l('Email sent successfully') , 'default', null, 'success');
                } elseif ($sendCount && $notSendCount) {
                    $this->Session->setFlash(__l('Email sent successfully. Some emails are not sent') , 'default', null, 'success');
                } else {
                    $this->Session->setFlash(__l('No email send') , 'default', null, 'success');
                }
            }
        }
        $bulkMailOptions = $this->User->bulkMailOptions;
        $this->set(compact('bulkMailOptions'));
    }
    public function admin_change_password($user_id = null)
    {
        $this->setAction('change_password', $user_id);
    }
    public function _sendAdminActionMail($user_id, $email_template)
    {
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $user_id
            ) ,
            'fields' => array(
                'User.username',
                'User.email'
            ) ,
            'recursive' => -1
        ));
        $emailFindReplace = array(
           '##USERNAME##' => $user['User']['username'],
        );
       $this->User->_sendEmail($email_template, $emailFindReplace, $user['User']['email']);
    }
    public function admin_add()
    {
        $this->pageTitle = __l('Add New User/Admin');
        if (!empty($this->request->data)) {
            $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['passwd']);
            $this->request->data['User']['is_agree_terms_conditions'] = '1';
            $this->request->data['User']['is_email_confirmed'] = 1;
            $this->request->data['User']['is_active'] = 1;
            $this->request->data['User']['signup_ip_id'] = $this->User->toSaveIp();
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                // Send mail to user to activate the account and send account details
                $emailFindReplace = array(
                    '##USERNAME##' => $this->request->data['User']['username'],
                    '##LOGINLABEL##' => ucfirst(Configure::read('user.using_to_login')) ,
                    '##USEDTOLOGIN##' => $this->request->data['User'][Configure::read('user.using_to_login') ],
                    '##PASSWORD##' => $this->request->data['User']['passwd']
                );
                $this->User->_sendEmail('Admin User Add', $emailFindReplace, $this->request->data['User']['email']);
                $this->Session->setFlash(__l('User has been added') , 'default', null, 'success');
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                unset($this->request->data['User']['passwd']);
                $this->Session->setFlash(__l('User could not be added. Please, try again.') , 'default', null, 'error');
            }
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
        if (!empty($this->request->data['User']['role_id'])) {
            $this->request->data['User']['role_id'] = ConstUserTypes::User;
        }
    }
     public function admin_export($hash = null)
    {
     Configure::write('debug', 0);
        $conditions = array();
        if (isset($this->request->params['named']['from_date']) || isset($this->request->params['named']['to_date'])) {
            $conditions['DATE(User.created) BETWEEN ? AND ? '] = array(
                _formatDate('Y-m-d H:i:s', $this->request->params['named']['from_date'], true) ,
                _formatDate('Y-m-d H:i:s', $this->request->params['named']['to_date'], true)
            );
        }
        if (!empty($this->request->params['named']['main_filter_id'])) {
            if ($this->request->params['named']['main_filter_id'] == ConstMoreAction::FaceBook) {
                $conditions['User.fb_user_id != '] = NULL;
                $this->pageTitle.= __l(' - Registered through FaceBook ');
            } else if ($this->request->params['named']['main_filter_id'] == ConstUserTypes::User) {
                $conditions['User.role_id'] = ConstUserTypes::User;
                $conditions['User.fb_user_id = '] = NULL;
                $conditions['User.is_openid_register'] = 0;
            } else if ($this->request->params['named']['main_filter_id'] == ConstUserTypes::Admin) {
                $conditions['User.role_id'] = ConstUserTypes::Admin;
                $this->pageTitle.= __l(' - Admin ');
            } else if ($this->request->params['named']['main_filter_id'] == ConstUserTypes::Doctor) {
                $conditions['User.role_id'] = ConstUserTypes::Doctor;
                $this->pageTitle.= __l(' - Admin ');
            } else if ($this->request->params['named']['main_filter_id'] == ConstUserTypes::Clinic) {
                $conditions['User.role_id'] = ConstUserTypes::Clinic;
                $this->pageTitle.= __l(' - Admin ');
            } else if ($this->request->params['named']['main_filter_id'] == 'all') {
                $conditions['User.role_id != '] = ConstUserTypes::Admin;
                $this->pageTitle.= __l(' - All ');
            }
            $count_conditions = $conditions;
        }
        if (!empty($this->request->params['named']['filter_id'])) {
            if ($this->request->params['named']['filter_id'] == ConstMoreAction::Active) {
                $conditions['User.is_active'] = 1;
                $this->pageTitle.= __l(' - Active ');
            } else if ($this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) {
                $conditions['User.is_active'] = 0;
                $this->pageTitle.= __l(' - Inactive ');
            }
        }
        if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'day') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(User.created) <= '] = 0;
            $this->pageTitle.= __l(' - Registered today');
        }
        if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'week') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(User.created) <= '] = 7;
            $this->pageTitle.= __l(' - Registered in this week');
        }
        if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'month') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(User.created) <= '] = 30;
            $this->pageTitle.= __l(' - Registered in this month');
        }
          if (!empty($hash) && isset($_SESSION['user_export'][$hash])) {
             $user_ids = implode(',', $_SESSION['user_export'][$hash]);
           if ($this->User->isValidUserIdHash($user_ids, $hash)) {
                $conditions['User.id'] = $_SESSION['user_export'][$hash];
            } else {
                throw new NotFoundException(__l('Invalid request'));
            }
        }
        if (isset($this->request->params['named']['q']) && !empty($this->request->params['named']['q'])) {
            $conditions['User.username like'] = '%' . $this->request->params['named']['q'] . '%';
        }
        $users = $this->User->find('all', array(
            'conditions' => $conditions,
            'contain' => array(
                'RefferalUser',
				'Ip'
            ) ,
            'recursive' => 1
        ));
         if (!empty($users)) {
        foreach($users as $key =>$user) {
               $data[]['User'] = array(
            __l('Username') => $user['User']['username'],
            __l('Email') => $user['User']['email'],
            __l('Login count') => $user['User']['user_login_count']
          	);
  		if (isPluginEnabled('Contests')) {
			   	$contest = array(
					 __l('Created Contests') => $user['User']['contest_count'],
					 __l('Entries Posted') => $user['User']['contest_user_count'],
					 __l('Earned Amount') => $user['User']['participant_total_earned_amount'],
				);
			$data[$key]['User'] = array_merge($data[$key]['User'],$contest);
		}
           }
        }
        $this->set('data', $data);
    }
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__l('User has neen deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
    public function admin_diagnostics()
    {
        $this->pageTitle = __l('Diagnostics');
        $this->set('pageTitle', $this->pageTitle);
    }
    public function admin_recent_users()
    {
        //recently registered users
        $recentUsers = $this->User->find('all', array(
            'conditions' => array(
                'User.is_active' => 1,
                'User.role_id != ' => ConstUserTypes::Admin
            ) ,
            'fields' => array(
                'User.role_id',
                'User.username',
                'User.id',
            ) ,
            'recursive' => -1,
            'limit' => 10,
            'order' => array(
                'User.id' => 'desc'
            )
        ));
        $this->set(compact('recentUsers'));
    }
    public function admin_online_users()
    {
        //online users
        $onlineUsers = $this->User->CkSession->find('all', array(
            'conditions' => array(
                'CkSession.user_id != ' => 0,
                'User.is_active' => 1,
                'User.role_id !=' => ConstUserTypes::Admin
            ) ,
            'contain' => array(
                'User' => array(
                    'fields' => array(
                        'User.username'
                    )
                )
            ) ,
            'recursive' => 1,
            'limit' => 10,
            'order' => array(
                'User.last_logged_in_time' => 'desc'
            )
        ));
        $this->set(compact('onlineUsers'));
    }
    public function whois($ip = null)
    {
        if (!empty($ip)) {
              $this->redirect(Configure::read('site.look_up_url') . $ip);
        }
    }
	public function login_user()
	{
		$this->pageTitle = __l('Join Now');	
	}
	public function patient_register()
    {
     	$this->setAction('register', 'patient');
    }
	public function doctor_register()
    {
        $this->setAction('register', 'doctor');
    }
	function confirmation()
	{
	   $this->pageTitle = __l('Thank You');
	}
	function enter_mobile_number($user_id = null)
	{
	   $this->pageTitle = __l('Enter Your Mobile Number');
	   App::import('Model', 'User');
	   $this->User = new User();
       if (!empty($this->request->data['User']['id'])) {
           $user_id = $this->request->data['User']['id'];
       }
       if (is_null($user_id)) {
           throw new NotFoundException(__l('Invalid request'));
       }
	   $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.id = ' => $user_id,
                      ) ,
                'recursive' => - 1,
       ));
	   if (!empty($this->request->data)) { 
			//Verification mobile number
			$otp = $this->User->getVerificationCode();
			$is_send_otp = $this->_isSMSVerifyMobilenumber($otp,$this->request->data['UserProfile']['phone']);
		  	if($is_send_otp)
			{
				$this->User->updateAll(array(
						'User.mobile_one_time_password' => $otp,
						'User.is_send_text_message' => '\'' . $this->request->data['User']['is_send_text_message'] . '\'',
                    ) , array(
                        'User.id' => $user_id
                ));
				$this->User->UserProfile->updateAll(array(
						'UserProfile.phone' => '\'' . $this->request->data['UserProfile']['phone'] . '\'',
						'UserProfile.cell_number' => '\'' . $this->request->data['UserProfile']['phone'] . '\'',
                    ) , array(
                        'UserProfile.user_id' => $user_id
                ));
				$this->redirect(array(
					'controller' => 'users',
					'action' => 'verify_mobile_number',
					$user_id
				));		
			} else {
				$this->Session->setFlash(__l('SMS server failed or Invalid number. Please try again later.') , 'default', null, 'error');
				$this->redirect(array(
					'controller' => 'users',
					'action' => 'enter_mobile_number',
					$user_id
				));		
			}
	   } else {
		  	$this->request->data = $user;
	   }	  
	  
	}
	public function _isSMSVerifyMobilenumber($otp = null, $phone = null)
	{
		$smsinfo=array();
		$smsinfo['mobile'] = $phone;
		$smsinfo['message'] = sprintf(__l('Your One-Time Password(OTP) is %s for Registering in %s website. Please do not share this password with anyone - %s') , $otp, Configure::read('site.name'),Configure::read('site.name'));
		$this->log($smsinfo);
		//Send SMS
		$smsdata = $this->User->sendSMS($smsinfo);
		$this->log($smsdata);
		if($smsdata['err'] == 0){
			return true;	
		}
		return false;
	}
	public function verify_mobile_number($user_id = null)
	{
	   $this->pageTitle = __l('Verify Your Mobile Number');
	   App::import('Model', 'User');
	   $this->User = new User();
       if (!empty($this->request->data['User']['id'])) {
           $user_id = $this->request->data['User']['id'];
       }
       if (is_null($user_id)) {
           throw new NotFoundException(__l('Invalid request'));
       }
	   $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.id = ' => $user_id,
                      ) ,
                'recursive' => - 1,
       ));
	   if (!empty($this->request->data)) { 
			//Verification mobile number
		  	if($user['User']['mobile_one_time_password'] == $this->request->data['User']['mobile_one_time_password']) {
				$this->User->updateAll(array(
						'User.is_verity_mobile_number' => 1,
						'User.mobile_one_time_password' => '\'' . $this->request->data['User']['mobile_one_time_password'] . '\'',
					) , array(
						'User.id' => $user_id
				));
				$this->Session->setFlash(__l('You have successfully registered with our site and your activation mail has been sent to your mail inbox.') , 'default', null, 'success');
				$this->_sendActivationMail($user['User']['email'], $user_id, $this->User->getActivateHash($user_id));
				$this->redirect(array(
					'controller' => 'users',
					'action' => 'login'
				));		
			 } else {
			 	$this->Session->setFlash(__l('Invalid OTP entered. Please enter valid OTP') , 'default', null, 'error');
				$this->redirect(array(
					'controller' => 'users',
					'action' => 'verify_mobile_number',
					$user['User']['id']
				));	
			 }	
	   } else {
		  	$this->set('user_id',$user_id);
	   }	  
	}
	public function manage_languages($user_id = null)
	{
		$this->pageTitle = __l('My Languages');
		if (!empty($this->request->data)) {
            $this->request->data['LanguagesUser']['user_id'] = $this->Auth->user('id')  ;
			if (!empty($this->request->data['Language']['Language'])) {
				// Deleting previous inserted records //
                $this->User->LanguagesUser->deleteAll(array(
                       'LanguagesUser.user_id' => $this->request->data['LanguagesUser']['user_id']
                ));
                // Inserting new records //
                $languagesuser = array();
				if(!empty($this->request->data['Language']['Language']))
				{
					foreach($this->request->data['Language']['Language'] as $key => $value)
					{
						$this->User->LanguagesUser->create();
						$languagesuser['LanguagesUser']['user_id'] = $this->request->data['LanguagesUser']['user_id'];
						$languagesuser['LanguagesUser']['language_id'] = $value;
					   $this->User->LanguagesUser->save($languagesuser);
					}
					$this->Session->setFlash(__l('Languages has been updated'), 'default', null, 'success');		
				} else {	
					$this->Session->setFlash(__l('Languages could not updated. Please try again'), 'default', null, 'error');		
				}	
			}
		} else {
			if ($this->Auth->user('role_id') != ConstUserTypes::Admin || empty($user_id)) {
                $user_id = $this->Auth->user('id');
            }
			$this->request->data = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $user_id
                ) ,
                'contain' => array(
                    'Language' => array(
						 'fields' => array(
                            'Language.id',
                            'Language.name',
                        )	
					)	
                ) ,
				'fields' => array(
					'User.id',
					'User.username'
				),
                'recursive' => 2
            ));
		}
		$languages = $this->User->Language->find('list', array(
            'conditions' => array(
                'Language.is_active' => 1
            ),
			'fields'=>array(
				'Language.id',
				'Language.name'
			),
        ));
		$this->set(compact('languages'));	
	}
	public function manage_clinics()
	{
		$this->pageTitle = __l('My Clinics');
		if (!empty($this->request->data)) {
			 
            $this->request->data['ClinicsUser']['user_id'] = $this->Auth->user('id')  ;
			if (!empty($this->request->data['Clinic']['Clinic'])) {
				// Deleting previous inserted records //
                $this->User->ClinicsUser->deleteAll(array(
                       'ClinicsUser.user_id' => $this->request->data['ClinicsUser']['user_id']
                ));
                // Inserting new records //
                $clinicsuser = array();
				if(!empty($this->request->data['Clinic']['Clinic']))
				{
					foreach($this->request->data['Clinic']['Clinic'] as $key => $value)
					{
						$this->User->ClinicsUser->create();
						$clinicsuser['ClinicsUser']['user_id'] = $this->request->data['ClinicsUser']['user_id'];
						$clinicsuser['ClinicsUser']['clinic_id'] = $value;
					   $this->User->ClinicsUser->save($clinicsuser);
					}
					$this->Session->setFlash(__l('Clinics has been updated'), 'default', null, 'success');	
					}
					else {	
					$this->Session->setFlash(__l('Clinics could not updated. Please try again'), 'default', null, 'error');		
				}	
			}
		} else {
			if ($this->Auth->user('role_id') != ConstUserTypes::Admin || empty($user_id)) {
                $user_id = $this->Auth->user('id');
            }
			$this->request->data = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $user_id
                ) ,
                'contain' => array(
                    'Clinic' => array(
						 'fields' => array(
                            'Clinic.id',
                            'Clinic.name',
                        )	
					)	
                ) ,
				'fields' => array(
					'User.id',
					'User.username'
				),
                'recursive' => 2
            ));
		}
		$clinics = $this->User->Clinic->find('list', array(
            'conditions' => array(
                'Clinic.is_active' => 1
            ),
			'fields'=>array(
				'Clinic.id',
				'Clinic.name'
			),
        ));
		$this->set(compact('clinics'));	
	}
	public function my_clinics($username = null)
	{
		$this->pageTitle = __l('My Clinics');
		$user_id = $this->Auth->user('id');
		$clinicUsers = $this->User->ClinicsUser->find('all', array(
			'conditions' => array(
				'ClinicsUser.user_id' => $user_id,
			) ,
			'recursive' => -1
        ));
		$user_clinic_ids = array();
		foreach($clinicUsers as $clinicUser) {
			$user_clinic_ids[] = $clinicUser['ClinicsUser']['clinic_id'];
		}
		$conditions['Clinic.id'] = $user_clinic_ids;
		$conditions['Clinic.is_active'] = 1;
		$clinics = $this->User->Clinic->find('all', array(
            'conditions' =>$conditions,
			'contain' => array(
				'City' => array(
                        'fields' => array(
                            'City.name'
                        )
                    ) ,
				'State' => array(
					'fields' => array(
						'State.name',
						'State.code'
					)
				) ,
				'Country' => array(
					'fields' => array(
						'Country.name',
						'Country.iso2'
			    )
              ),
			),
			'recursive' => 1
        ));
		$this->set(compact('clinics'));	
	}	
	public function my_insurances($username = null)
	{
		$this->pageTitle = __l('My Insurances');
		$username = $this->User->find('first', array(
            'conditions' => array(
                'User.username' => $username
            ),
			'fields'=>array(
				'User.id',
				'User.username'
			),
			'recursive' => -1
        ));		
		if (empty($username)) {
			throw new NotFoundException(__l('Invalid request'));
		}	
		$user_id = $username['User']['id'];
		$insurance_companies = $this->User->InsuranceCompany->find('list', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 1
            ),
			'fields'=>array(
				'InsuranceCompany.id',
				'InsuranceCompany.name'
			),
        ));
		$insurance_company_users = $this->User->InsuranceCompaniesUser->find('all', array(
            'conditions' => array(
                'InsuranceCompaniesUser.user_id' => $user_id
            ),
			'fields'=>array(
				'InsuranceCompaniesUser.insurance_company_id'
			),
        ));
		if (!empty($insurance_company_users)) {
			$all_selected_ids = array();
			foreach($insurance_company_users as $insurance_company_user) {
				$all_selected_ids[$insurance_company_user['InsuranceCompaniesUser']['insurance_company_id']] = $insurance_company_user['InsuranceCompaniesUser']['insurance_company_id'];
        	}
		}
		$find_plan = array();
		
		foreach($insurance_companies as $key => $insurance_company){
			if(in_array($key,$all_selected_ids))
			{
				$user_insurance_companies[$key][] = $insurance_company;
				$find_plan = $this->_getInsurancePlan($key,$user_id);
				if(!empty($find_plan)){
					$i = 1;
					foreach($find_plan as $id => $insurance_plan){
						$user_insurance_companies[$key][$i] = $insurance_plan;
						$i++;
					}	
				}	
			} 
		}
		$this->set(compact('user_insurance_companies'));	
	}
	public function _getInsurancePlan($insurance_company_id, $user_id)
	{
		$insurance_plans = $this->User->InsuranceCompany->InsurancePlan->find('list', array(
            'conditions' => array(
                'InsurancePlan.is_active' => 1,
				'InsurancePlan.insurance_company_id' => $insurance_company_id
            ),
			'fields'=>array(
				'InsurancePlan.id',
				'InsurancePlan.name'
			),
        ));
		$insurance_plans_users  = $this->User->InsurancePlansUser->find('all', array(
			'conditions' => array(
				'InsurancePlansUser.user_id = ' => $user_id
			),
			'fields' => array(
				'InsurancePlansUser.insurance_plan_id',
			),
			'recursive' => 0,
		));
		if (!empty($insurance_plans_users)) {
			$all_selected_ids = array();
			foreach($insurance_plans_users as $insurance_plans_user) {
				$all_selected_ids[$insurance_plans_user['InsurancePlansUser']['insurance_plan_id']] = $insurance_plans_user['InsurancePlansUser']['insurance_plan_id'];
        	}
		}
		$selected_insurance_plans = array();
		foreach($insurance_plans as $key => $insurance_plan){
			if(in_array($key,$all_selected_ids))
			{
				$selected_insurance_plans[$key] = $insurance_plan; 
			}		
		}
		return 	$selected_insurance_plans;
	}
	public function manage_insurances($user_id = null)
	{
		$this->pageTitle = __l('My Insurances');
		if (!empty($this->request->data)) {
            $this->request->data['InsuranceCompaniesUser']['user_id'] = $this->Auth->user('id');
			if (!empty($this->request->data['InsuranceCompany']['InsuranceCompany'])) {
				// Deleting previous inserted records //
                $this->User->InsuranceCompaniesUser->deleteAll(array(
                       'InsuranceCompaniesUser.user_id' => $this->request->data['InsuranceCompaniesUser']['user_id']
                ));
                // Inserting new records //
                $insurancecompaniesuser = array();
				if(!empty($this->request->data['InsuranceCompany']['InsuranceCompany']))
				{
					foreach($this->request->data['InsuranceCompany']['InsuranceCompany'] as $key => $value)
					{
						$this->User->InsuranceCompaniesUser->create();
						$insurancecompaniesuser['InsuranceCompaniesUser']['user_id'] = $this->request->data['InsuranceCompaniesUser']['user_id'];
						$insurancecompaniesuser['InsuranceCompaniesUser']['insurance_company_id'] = $value;
					   $this->User->InsuranceCompaniesUser->save($insurancecompaniesuser);
					}
					$this->Session->setFlash(__l('Insurance Company has been updated'), 'default', null, 'success');
					$this->redirect( array(
						'controller' => 'users',
						'action' => 'manage_insurances'
					));			
				} else {	
					$this->Session->setFlash(__l('Insurance Company  could not updated. Please try again'), 'default', null, 'error');		
				}	
			}
		} else {
			if ($this->Auth->user('role_id') != ConstUserTypes::Admin || empty($user_id)) {
                $user_id = $this->Auth->user('id');
            }
			$this->request->data = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $user_id
                ) ,
                'contain' => array(
                    'InsuranceCompany' => array(
						 'fields' => array(
                            'InsuranceCompany.id',
                            'InsuranceCompany.name',
                        )	
					)	
                ) ,
				'fields' => array(
					'User.id',
					'User.username'
				),
                'recursive' => 2
            ));
		}
		$insurance_companies = $this->User->InsuranceCompany->find('list', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 1
            ),
			'fields'=>array(
				'InsuranceCompany.id',
				'InsuranceCompany.name'
			),
        ));
		$insurance_company_users = $this->User->InsuranceCompaniesUser->find('all', array(
            'conditions' => array(
                'InsuranceCompaniesUser.user_id' => $user_id
            ),
			'fields'=>array(
				'InsuranceCompaniesUser.insurance_company_id'
			),
        ));
		if (!empty($insurance_company_users)) {
			$all_selected_ids = array();
			foreach($insurance_company_users as $insurance_company_user) {
				$all_selected_ids[$insurance_company_user['InsuranceCompaniesUser']['insurance_company_id']] = $insurance_company_user['InsuranceCompaniesUser']['insurance_company_id'];
        	}
		}
		foreach($insurance_companies as $key => $insurance_company){
			if(in_array($key,$all_selected_ids))
			{
				$edit_url = Router::url(array('controller' => 'users','action' => 'update_insurances', $key,'admin' => false) , true);
				$view_url = Router::url(array('controller' => 'users','action' => 'view_insurances', $key, 'admin' => false) , true);
				$insurance_companies[$key] = $insurance_company . ' <a href="'.$edit_url.'" class=js-thickbox edit>Manage</a>';
			} else {
				$insurance_companies[$key] = $insurance_company;
			}		
		}
		$this->set(compact('insurance_companies'));	
	}
	public function update_insurances($id = null) {
		$this->pageTitle = __l('Update Insurances');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			$this->request->data['InsurancePlansUser']['user_id'] = $this->Auth->user('id');
			if (!empty($this->request->data['InsuranceCompany']['InsurancePlan'])) {
				// Deleting previous inserted records //
                foreach($this->request->data['InsuranceCompany']['InsurancePlan'] as $key => $value) {
					$this->User->InsurancePlansUser->deleteAll(array(
						   'InsurancePlansUser.insurance_plan_id' => $value,
						   'InsurancePlansUser.user_id' => $this->request->data['InsurancePlansUser']['user_id']
					));
				}	
                // Inserting new records //
                $insuranceplansuser = array();
				if(!empty($this->request->data['InsuranceCompany']['InsurancePlan']))
				{
					foreach($this->request->data['InsuranceCompany']['InsurancePlan'] as $key => $value)
					{
					   $this->User->InsurancePlansUser->create();
					   $insuranceplansuser['InsurancePlansUser']['user_id'] = $this->request->data['InsurancePlansUser']['user_id'];
					   $insuranceplansuser['InsurancePlansUser']['insurance_plan_id'] = $value;
					   $this->User->InsurancePlansUser->save($insuranceplansuser);
					}
					$this->Session->setFlash(__l('Insurance Plan has been updated'), 'default', null, 'success');
					$this->redirect( array(
						'controller' => 'users',
						'action' => 'manage_insurances'
					));			
				} else {	
					$this->Session->setFlash(__l('Insurance Plan could not updated. Please try again'), 'default', null, 'error');		
				}	
			}
		} else {
			$this->request->data = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $this->Auth->user('id')
                ) ,
                'contain' => array(
                    'InsurancePlan' => array(
						 'fields' => array(
                            'InsurancePlan.id',
                            'InsurancePlan.name',
                        )	
					)	
                ) ,
				'fields' => array(
					'User.id',
					'User.username'
				),
                'recursive' => 2
            ));
		}
		$insurance_plans = $this->User->InsuranceCompany->InsurancePlan->find('list', array(
            'conditions' => array(
                'InsurancePlan.is_active' => 1,
				'InsurancePlan.insurance_company_id' => $id
            ),
			'fields'=>array(
				'InsurancePlan.id',
				'InsurancePlan.name'
			),
        ));
		$insurance_company = $this->User->InsuranceCompany->find('first', array(
			'conditions' => array(
				'InsuranceCompany.id = ' => $id
			),
			'fields' => array(
				'InsuranceCompany.id',
				'InsuranceCompany.name',
			),
			'recursive' => 0,
		));
		$this->set(compact('insurance_plans','insurance_company')); 
	}
	public function view_insurances($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$insurance_plans_users  = $this->User->InsurancePlansUser->find('all', array(
			'conditions' => array(
				'InsurancePlansUser.user_id = ' => $this->Auth->user('id')
			),
			'fields' => array(
				'InsurancePlansUser.insurance_plan_id',
			),
			'recursive' => 0,
		));
		$insurance_plans = $this->User->InsuranceCompany->InsurancePlan->find('list', array(
            'conditions' => array(
                'InsurancePlan.is_active' => 1,
				'InsurancePlan.insurance_company_id' => $id
            ),
			'fields'=>array(
				'InsurancePlan.id',
				'InsurancePlan.name'
			),
        ));
		$insurance_company = $this->User->InsuranceCompany->find('first', array(
			'conditions' => array(
				'InsuranceCompany.id = ' => $id
			),
			'fields' => array(
				'InsuranceCompany.id',
				'InsuranceCompany.name',
			),
			'recursive' => 0,
		));
		if (!empty($insurance_plans_users)) {
			$all_selected_ids = array();
			foreach($insurance_plans_users as $insurance_plans_user) {
				$all_selected_ids[$insurance_plans_user['InsurancePlansUser']['insurance_plan_id']] = $insurance_plans_user['InsurancePlansUser']['insurance_plan_id'];
        	}
		}
		$selected_insurance_plans = array();
		foreach($insurance_plans as $key => $insurance_plan){
			if(in_array($key,$all_selected_ids))
			{
				$selected_insurance_plans[$key] = $insurance_plan; 
			}		
		}
		$this->set(compact('selected_insurance_plans','insurance_company')); 
	}
	public function manage_specialties($user_id = null)
	{
		$this->pageTitle = __l('My Specialties');
		if (!empty($this->request->data)) {
            $this->request->data['SpecialtiesUser']['user_id'] = $this->Auth->user('id')  ;
			if (!empty($this->request->data['Specialty']['Specialty'])) {
				// Deleting previous inserted records //
                $this->User->SpecialtiesUser->deleteAll(array(
                       'SpecialtiesUser.user_id' => $this->request->data['SpecialtiesUser']['user_id']
                ));
                // Inserting new records //
                $specialtiesuser = array();
				if(!empty($this->request->data['Specialty']['Specialty']))
				{
					foreach($this->request->data['Specialty']['Specialty'] as $key => $value)
					{
					   $this->User->SpecialtiesUser->create();
					   $specialtiesuser['SpecialtiesUser']['user_id'] = $this->request->data['SpecialtiesUser']['user_id'];
					   $specialtiesuser['SpecialtiesUser']['specialty_id'] = $value;
					   $this->User->SpecialtiesUser->save($specialtiesuser);
					}
					$this->Session->setFlash(__l('Specialty has been updated'), 'default', null, 'success');
					$this->redirect( array(
						'controller' => 'users',
						'action' => 'manage_specialties'
					));			
				} else {	
					$this->Session->setFlash(__l('Specialty could not updated. Please try again'), 'default', null, 'error');		
				}	
			}
		} else {
			if ($this->Auth->user('role_id') != ConstUserTypes::Admin || empty($user_id)) {
                $user_id = $this->Auth->user('id');
            }
			$this->request->data = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $user_id
                ) ,
                'contain' => array(
                    'Specialty' => array(
						 'fields' => array(
                            'Specialty.id',
                            'Specialty.name',
                        )	
					)	
                ) ,
				'fields' => array(
					'User.id',
					'User.username'
				),
                'recursive' => 2
            ));
		}
		$specialty = $this->User->Specialty->find('list', array(
            'conditions' => array(
                'Specialty.is_active' => 1
            ),
			'fields'=>array(
				'Specialty.id',
				'Specialty.name'
			),
        ));
		$specialty_users = $this->User->SpecialtiesUser->find('all', array(
            'conditions' => array(
                'SpecialtiesUser.user_id' => $user_id
            ),
			'fields'=>array(
				'SpecialtiesUser.specialty_id'
			),
        ));
		if (!empty($specialty_users)) {
			$all_selected_ids = array();
			foreach($specialty_users as $specialty_user) {
				$all_selected_ids[$specialty_user['SpecialtiesUser']['specialty_id']] = $specialty_user['SpecialtiesUser']['specialty_id'];
        	}
		}
		foreach($specialty as $key => $specialtie){
			if(in_array($key,$all_selected_ids))
			{
				$edit_url = Router::url(array('controller' => 'users','action' => 'update_diseases', $key,'admin' => false) , true);
				$view_url = Router::url(array('controller' => 'users','action' => 'view_diseases', $key, 'admin' => false) , true);
				$specialties[$key] = $specialtie . ' <a href="'.$edit_url.'" class=js-thickbox edit title=Manage>Manage</a>';
			} else {
				$specialties[$key] = $specialtie;
			}		
		}
		$this->set(compact('specialties'));	
	}
	public function update_diseases($id = null) {
		$this->pageTitle = __l('Edit Specialty');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			$this->request->data['SpecialtyDiseasesUser']['user_id'] = $this->Auth->user('id');
			if (!empty($this->request->data['Specialty']['SpecialtyDisease'])) {
				// Deleting previous inserted records //
                $this->User->SpecialtyDiseasesUser->deleteAll(array(
                       'SpecialtyDiseasesUser.user_id' => $this->request->data['SpecialtyDiseasesUser']['user_id']
                ));
                // Inserting new records //
                $specialtydiseasesuser = array();
				if(!empty($this->request->data['Specialty']['SpecialtyDisease']))
				{
					foreach($this->request->data['Specialty']['SpecialtyDisease'] as $key => $value)
					{
					   $this->User->SpecialtyDiseasesUser->create();
					   $specialtydiseasesuser['SpecialtyDiseasesUser']['user_id'] = $this->request->data['SpecialtyDiseasesUser']['user_id'];
					   $specialtydiseasesuser['SpecialtyDiseasesUser']['specialty_disease_id'] = $value;
					   $this->User->SpecialtyDiseasesUser->save($specialtydiseasesuser);
					}
					$this->Session->setFlash(__l('SpecialtyDisease has been updated'), 'default', null, 'success');
					$this->redirect( array(
						'controller' => 'users',
						'action' => 'manage_specialties'
					));			
				} else {	
					$this->Session->setFlash(__l('SpecialtyDisease could not updated. Please try again'), 'default', null, 'error');		
				}	
			}
		} else {
			$this->request->data = $this->User->find('first', array(
                'conditions' => array(
                    'User.id' => $this->Auth->user('id')
                ) ,
                'contain' => array(
                    'SpecialtyDisease' => array(
						 'fields' => array(
                            'SpecialtyDisease.id',
                            'SpecialtyDisease.name',
                        )	
					)	
                ) ,
				'fields' => array(
					'User.id',
					'User.username'
				),
                'recursive' => 2
            ));
		}
		$specialty_diseases = $this->User->Specialty->SpecialtyDisease->find('list', array(
            'conditions' => array(
                'SpecialtyDisease.is_active' => 1,
				'SpecialtyDisease.specialty_id' => $id
            ),
			'fields'=>array(
				'SpecialtyDisease.id',
				'SpecialtyDisease.name'
			),
        ));
		$specialty = $this->User->Specialty->find('first', array(
			'conditions' => array(
				'Specialty.id = ' => $id
			),
			'fields' => array(
				'Specialty.id',
				'Specialty.name',
			),
			'recursive' => 0,
		));
		$this->set(compact('specialty_diseases','specialty')); 
	}
	public function view_diseases($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$specialty_diseases_users = $this->User->SpecialtyDiseasesUser->find('all', array(
			'conditions' => array(
				'SpecialtyDiseasesUser.user_id = ' => $this->Auth->user('id')
			),
			'fields' => array(
				'SpecialtyDiseasesUser.specialty_disease_id',
			),
			'recursive' => 0,
		));
		$specialty_diseases = $this->User->Specialty->SpecialtyDisease->find('list', array(
            'conditions' => array(
                'SpecialtyDisease.is_active' => 1,
				'SpecialtyDisease.specialty_id' => $id
            ),
			'fields'=>array(
				'SpecialtyDisease.id',
				'SpecialtyDisease.name'
			),
        ));
		$specialty = $this->User->Specialty->find('first', array(
			'conditions' => array(
				'Specialty.id = ' => $id
			),
			'fields' => array(
				'Specialty.id',
				'Specialty.name',
			),
			'recursive' => 0,
		));
		if (!empty($specialty_diseases_users)) {
			$all_selected_ids = array();
			foreach($specialty_diseases_users as $specialty_diseases_user) {
				$all_selected_ids[$specialty_diseases_user['SpecialtyDiseasesUser']['specialty_disease_id']] = $specialty_diseases_user['SpecialtyDiseasesUser']['specialty_disease_id'];
        	}
		}
		$selected_specialty_diseases = array();
		foreach($specialty_diseases as $key => $specialty_disease){
			if(in_array($key,$all_selected_ids))
			{
				$selected_specialty_diseases[$key] = $specialty_disease; 
			}		
		}
		$this->set(compact('selected_specialty_diseases','specialty')); 
	}
	public function search($year = null, $month = null, $day = null)
	{
		$this->_redirectGET2Named(array(
				'zip_code',
				'doctor_specialty_id',
				'insurance_id',
				'insurance_plan_id',
				'specialty_disease_id',
				'doctor_name',
				'language_id',
				'gender_id'
		));
		$this->pageTitle = __l('Reviews & Ratings');
		$conditions = array();
		$insuracne_conditions = array();
		$zipcode_conditions = array();
		$doctor_insurance_id = '';
		$conditions['User.role_id'] = ConstUserTypes::Doctor;

		if(!empty($this->request->params['named']['city'])) {
				$city = $this->request->params['named']['city'];
				$city_id = $this->User->UserProfile->City->find('first', array(
				'conditions' => array(
					'City.slug' => $city
				) ,
				'fields' => array(
					'City.id'
				) ,
				'recursive' => - 1
			    ));


				$zipcode_conditions['UserProfile.city_id'] = $city_id['City']['id'];
			
			$zipcodes = $this->User->UserProfile->find('all', array(
				'conditions' => $zipcode_conditions,
				'fields'=>array(
					'UserProfile.user_id',
				),
			));
			if(!empty($zipcodes)) {
				$i=1;
				foreach($zipcodes as $zipcode) {
							
								$user_ids[] = $zipcode['UserProfile']['user_id'];
							
						}
				
				
			}
			$conditions['User.id'] = $user_ids;
		}else{


		
		if(!empty($this->request->params['named']['doctor_specialty_id'])) {
			$doctor_specialty_id = $this->request->params['named']['doctor_specialty_id'];
		 
		$specialties_users = $this->User->SpecialtiesUser->find('all', array(
			'conditions' => array(
				'SpecialtiesUser.specialty_id' => $doctor_specialty_id
			) ,
			'recursive' => -1
		));	
		$specialty_user_ids = array();
		foreach($specialties_users as $specialties_user) {
			$specialty_user_ids[] = $specialties_user['SpecialtiesUser']['user_id'];
		}
		$conditions['User.id'] = $specialty_user_ids;
		$specialty_diseases = $this->User->Specialty->SpecialtyDisease->find('list', array(
            'conditions' => array(
                'SpecialtyDisease.is_active' => 1,
				'SpecialtyDisease.specialty_id' => $doctor_specialty_id
            ),
			'fields'=>array(
				'SpecialtyDisease.id',
				'SpecialtyDisease.name'
			),
			'recursive' => -1
        ));
		if(empty($specialty_diseases)) {
			$specialties = $this->User->Specialty->find('list', array(
				'conditions' => array(
					'Specialty.is_active' => 1,
					'Specialty.id' => $doctor_specialty_id
				),
        	));
			$specialty_diseases = array(
				$doctor_specialty_id => $specialties[$doctor_specialty_id]
			);
		}
		$this->set('doctor_specialty_id',$doctor_specialty_id);
		}
		//print_r($conditions);
		 					
		

		// Search for Practice name
		if(!empty($this->request->params['named']['doctor_name']) and $this->request->params['named']['doctor_name'] !='Enter doctor or practice name') {
			$doctor_name_conditions[] = array(
                'OR' => array(
                    array(
                        'UserProfile.first_name LIKE ' => '%' . $this->request->params['named']['doctor_name'] . '%'
                    ) ,
					array(
                        'UserProfile.last_name LIKE ' => '%' . $this->request->params['named']['doctor_name'] . '%'
                    ) ,
					array(
                        'UserProfile.practice_name LIKE ' => '%' . $this->request->params['named']['doctor_name'] . '%'
                    ) ,
                )
            );
			$doctornames = $this->User->UserProfile->find('all', array(
				'conditions' => $doctor_name_conditions,
				'fields'=>array(
					'UserProfile.user_id',
				),
			));	
			
			if(!empty($doctornames)) {
				if(!empty($specialty_user_ids)) {
					foreach($specialty_user_ids as $key => $value) {
						foreach($doctornames as $doctorname) {
							if($doctorname['UserProfile']['user_id'] == $value) {
								$user_ids[] = $value;
							}
						}
					}		
				}
			}
			$conditions['User.id'] = $user_ids;
		}
		//unset($this->request->params['named']['language_id']);				 
		// Search for Language  code edited by aakash
		if(!empty($this->request->params['named']['language_id'])) {
			$doctor_language_id = $this->request->params['named']['language_id'];
		
		
			if(!empty($specialty_user_ids)) {
				$language_conditions['LanguagesUser.language_id'] = $doctor_language_id;
				$language_conditions['LanguagesUser.user_id'] = $specialty_user_ids;
			} else {
				$language_conditions['LanguagesUser.language_id'] = $doctor_language_id;
			}
			$language_users = $this->User->LanguagesUser->find('all', array(
				'conditions' => $language_conditions,
				'fields'=>array(
					'LanguagesUser.user_id'
				),
       		));
			$language_user_ids = array();
			foreach($language_users as $language_user) {
				$language_user_ids[] = $language_user['LanguagesUser']['user_id'];
			}	
			$conditions['User.id'] = $language_user_ids;
			$this->set('language_id',$doctor_language_id);
		}
		
		// Search for Gender
		if(!empty($this->request->params['named']['gender_id']) and $this->request->params['named']['gender_id'] !='-1') {
			$user_ids = array();
			$gender_id = $this->request->params['named']['gender_id'];
			$gender_conditions['UserProfile.gender_id'] = $gender_id;	
			
			$genders = $this->User->UserProfile->find('all', array(
				'conditions' => $gender_conditions,
				'fields'=>array(
					'UserProfile.user_id',
				),
			));	
			if(!empty($genders)) {
				if(!empty($specialty_user_ids)) {
					foreach($specialty_user_ids as $key => $value) {
						foreach($genders as $gender) {
							if($gender['UserProfile']['user_id'] == $value) {
								$user_ids[] = $value;
							}
						}
					}		
				}
			}
			$conditions['User.id'] = $user_ids;
		}
		if(!empty($this->request->params['named']['insurance_id']) and $this->request->params['named']['insurance_id'] !='-1' and $this->request->params['named']['insurance_id'] !='-2') {
			$doctor_insurance_id = $this->request->params['named']['insurance_id'];
		} else if(!empty($this->request->params['named']['doctor_insurance_id'])) {
			$doctor_insurance_id = $this->request->params['named']['doctor_insurance_id'];
		}  
		$this->set('doctor_insurance_id',$doctor_insurance_id);
		// Search for Insurance Company
		if((!empty($this->request->params['named']['insurance_id']) and $this->request->params['named']['insurance_id'] !='-1' and $this->request->params['named']['insurance_id'] !='-2')) {
			if(!empty($specialty_user_ids)) {
				$insuracne_conditions['InsuranceCompaniesUser.insurance_company_id'] = $doctor_insurance_id;
				$insuracne_conditions['InsuranceCompaniesUser.user_id'] = $specialty_user_ids;
			} else {
				$insuracne_conditions['InsuranceCompaniesUser.insurance_company_id'] = $doctor_insurance_id;
			}
			$insurance_company_users = $this->User->InsuranceCompaniesUser->find('all', array(
				'conditions' => $insuracne_conditions,
				'fields'=>array(
					'InsuranceCompaniesUser.user_id'
				),
       		));
			$insuracne_user_ids = array();
			foreach($insurance_company_users as $insurance_company_user) {
				$insuracne_user_ids[] = $insurance_company_user['InsuranceCompaniesUser']['user_id'];
			}	
			$conditions['User.id'] = $insuracne_user_ids;
			$insuranceplans = $this->User->InsuranceCompany->InsurancePlan->find('list', array(
					'conditions' => array(
						'InsurancePlan.is_active' => 1,
						'InsurancePlan.insurance_company_id' => $doctor_insurance_id,
					),
					'fields'=>array(
						'InsurancePlan.id',
						'InsurancePlan.name'
					),
			));
		} else {
			$doctor_insurance_id ='';
			$insurance_plans = $this->User->InsuranceCompany->InsurancePlan->find('list', array(
				'conditions' => array(
					'InsurancePlan.is_active' => 1,
				),
				'fields'=>array(
					'InsurancePlan.id',
					'InsurancePlan.name'
				),
			));
			$search_options = $this->User->InsurancePlan->searchOptions;
			$insuranceplans = $search_options + $insurance_plans;
			$this->set('doctor_insurance_id',$doctor_insurance_id);
		}
		}
		//print_r($conditions);
 		$this->paginate = array(
			'conditions' =>$conditions,
			'contain' => array(
				'Photo' => array(
					'Attachment' => array(
						'fields' => array(
							'Attachment.id',
							'Attachment.filename',
							'Attachment.dir',
							'Attachment.width',
							'Attachment.height',
						)	
					)
				), 
				'DoctorAvailability' => array(
				  'fields' => array(
                        'DoctorAvailability.consultation_fees'
                       )
				),
				'UserProfile' => array(
                    'fields' => array(
                        'UserProfile.first_name',
                        'UserProfile.last_name',
                        'UserProfile.middle_name',
                        'UserProfile.address',
                        'UserProfile.zip_code',
                        'UserProfile.specialty_id',
						'UserProfile.latitude',
						'UserProfile.longitude',
						'UserProfile.title',
						'UserProfile.practice_name',
                    ) ,
					'Specialty' => array(
                        'fields' => array(
                            'Specialty.name'
                        )
                    ) ,
                    'Gender' => array(
                        'fields' => array(
                            'Gender.name'
                        )
                    ) ,
                    'City' => array(
                        'fields' => array(
                            'City.name'
                        )
                    ) ,
                    'State' => array(
                        'fields' => array(
                            'State.name',
							'State.code'
                        )
                    ) ,
                    'Country' => array(
                        'fields' => array(
                            'Country.name',
                            'Country.iso2'
                        )
                    )
                ) ,
            ) ,
			'fields' => array(
				'User.username',
				'User.email',
				'User.created',
				'User.default_thumbnail_id',
				'User.overall_rating_count', 
				'User.overall_avg_rating'
            ) ,
            'recursive' => 3
        );
		$this->set('users',$this->paginate());
		$specialties = $this->User->Specialty->find('list', array(
            'conditions' => array(
                'Specialty.is_active' => 1
            ),
			'order' => array(
				'Specialty.name' => 'asc'
			),
        ));
		$insurance_companies = $this->User->InsuranceCompany->find('list', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 1
            )
        ));
		$search_options = $this->User->InsuranceCompany->searchOptions;
		$insurances = $search_options + $insurance_companies;
		
		$languages = $this->User->Language->find('list', array(
				'conditions' => array(
					'Language.is_active' => 1
				),
				'fields'=>array(
					'Language.id',
					'Language.name'
				),
		));
			
		$gender_option = array(
			'-1' => __l('No Preference')
		);
		$genders = $this->User->UserProfile->Gender->find('list');
		$gender_lists = $gender_option + $genders;
		$search_specialties = $this->User->Specialty->find('all', array(
            'conditions' => array(
                'Specialty.is_active' => 1,
				'Specialty.speciality_disease_count != ' => 0
            ),
			'order' => array(
				'Specialty.name' => 'asc'
			),
			'limit' => 16
        ));
		$cities = $this->User->UserProfile->City->find('all', array(
            'conditions' => array(
                'City.is_approved' => 1
            ),
			'contain' => array(
				'State' => array(
					'fields' => array(
						'State.code'
					)
				),
			),
			'fields'=>array(
				'City.id',
				'City.name',
				'City.slug'
			),
			'limit' => 16
        ));
		$search_insurance_companies = $this->User->InsuranceCompany->find('all', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 1
            ),
			'order' => array(
				'InsuranceCompany.name' => 'asc'
			),
			'limit' => 9,
			'recursive' => '-1'
        ));
		$search_specialty_name = $this->User->Specialty->find('first', array(
				'conditions' => array(
					'Specialty.is_active' => 1,
					'Specialty.id' => $doctor_specialty_id
				),
        	));
		$this->set('specialty_name',$search_specialty_name['Specialty']['name']);
		$search_insurance_name = $this->User->InsuranceCompany->find('first', array(
				'conditions' => array(
					'InsuranceCompany.is_active' => 1,
					'InsuranceCompany.id' => $doctor_insurance_id
				),
        	));
		$this->set('insurance_name',$search_insurance_name['InsuranceCompany']['name']);
		$search_users = $this->paginate();
		$search_user_ids = array();
		foreach($search_users as $search_user) {
			$search_user_ids[] =  $search_user['User']['id'];
			$user_ids = implode(',', $search_user_ids);
		}
		$this->set('user_ids', $user_ids);
		$current_week = date('d').'-'.date('m').'-'.date('Y');
		$this->set('current_week', $current_week);
		$this->set(compact('specialties','insuranceplans','insurances','specialty_diseases','languages','gender_lists','search_specialties','cities','search_insurance_companies'));
	}
	public function doctor_slots($year = '', $month = '', $day = '')
	{
		if(!empty($this->request->params['named']['current_week'])){
			$current_day = explode('-',$this->request->params['named']['current_week']);
			$this->set('day',$current_day[0]);
			$this->set('month',$current_day[1]);
			$this->set('year',$current_day[2]);
		} else {
			$this->set('day',$day);
			$this->set('month',$month);
			$this->set('year',$year);	
		}
		if(!empty($this->request->params['named']['users'])){
			$search_users = explode(',',$this->request->params['named']['users']); 
			$conditions['User.id'] = $search_users;
			$users = $this->User->find('all', array(
			'conditions' =>$conditions,
			'contain' => array(
				'DoctorAvailability' => array(
					'fields' => array(
						'DoctorAvailability.id',
						'DoctorAvailability.user_id'
					),
					'DoctorAvailabilityTiming' => array(
						'fields' => array(
							'DoctorAvailabilityTiming.id',
							'DoctorAvailabilityTiming.doctor_availability_id',
							'DoctorAvailabilityTiming.availability_date',
							'DoctorAvailabilityTiming.timings',
						) 
					)
				),
            ) ,
			'fields' => array(
				'User.username',
				'User.id'
            ) ,
            'recursive' => 2
       	 ));
		$this->set('users', $users);
		$this->set('userids', $this->request->params['named']['users']);
		}
		$this->render('doctor_slots');
	}
	public function marker()
	{
		$this->autoRender = false;
		if (!empty($this->request->params['named']['user_id'])) {
            $user_id = $this->request->params['named']['user_id'];
			$user = $this->User->getMarkerInfoView($user_id); 
			if($user['User']['default_thumbnail_id'] == 0) {
				if(!empty($user['Photos'])) {
					$attachment = $user['Photos'][0]['Attachment']['id'];	
				} else {
					$attachment = $user['DefaultPhoto']['Attachment']['id'];	
				}	
			} else {
				$attachment = $user['DefaultPhoto']['Attachment']['id'];
			}
			echo $user['User']['username'];
			//$image_hash = 'small_thumb/Photo/' . $attachment . '.' . md5(Configure::read('Security.salt') . 'Photo' . $attachment . 'jpg' . 'small_thumb' . Configure::read('site.name')) . '.' . 'jpg';	
			//echo '<div style="float:left; margin: -8px 0 0 -12px;"><img src =' . Cache::read('site_url_for_shell', 'long') . '/112med/img/' . $image_hash . " /></div>";	
        }
		
	}
	public function select_insurance_plans()
	{
		if(!empty($this->request->params['named']['insurance_company_id'])){
			$insurance_plans = $this->User->InsuranceCompany->InsurancePlan->find('list', array(
				'conditions' => array(
					'InsurancePlan.is_active' => 1,
					'InsurancePlan.insurance_company_id' => $this->request->params['named']['insurance_company_id']
				),
				'fields'=>array(
					'InsurancePlan.id',
					'InsurancePlan.name'
				),
			));
		}  
		$search_options = $this->User->InsurancePlan->searchOptions;
		$insuranceplans = $search_options + $insurance_plans;
		$this->set('insurance_plans', $insuranceplans);
	}
	public function select_specialty_diseases()
	{
	  if(!empty($this->request->params['named']['specialty_id'])){
		$specialty_diseases = $this->User->Specialty->SpecialtyDisease->find('list', array(
			'conditions' => array(
				'SpecialtyDisease.is_active' => 1,
				'SpecialtyDisease.specialty_id' => $this->params['named']['specialty_id']
			),
			'fields'=>array(
				'SpecialtyDisease.id',
				'SpecialtyDisease.name'
			),
				'recursive' => -1
		));
		if(empty($specialty_diseases)) {
			$doctor_specialty_id = $this->params['named']['specialty_id'];
			$specialties = $this->User->Specialty->find('list', array(
				'conditions' => array(
					'Specialty.is_active' => 1,
					'Specialty.id' => $doctor_specialty_id
				),
        	));
			$specialty_diseases = array(
				$doctor_specialty_id => $specialties[$doctor_specialty_id]
			);
		}
		$this->set(compact('specialty_diseases'));
	  }
	} 
	public function my_answers()
	{
		$this->pageTitle = __l('My Answers');
		$conditions = array();
		//Take special_id for users
		$users = $this->User->UserProfile->find('first', array(
            'conditions' => array(
                'UserProfile.user_id' => $this->Auth->user('id')
            ),
			'contain' => array(
				'Specialty' => array(
					'fields' => array(
						'Specialty.name'
					)	
				),
			),
			'fields'=>array(
				'UserProfile.id',
				'UserProfile.specialty_id'
			),
        ));
		if(!empty($users)) {
			$specialty_id =  $users['UserProfile']['specialty_id'];
			$this->set('specialty_name', $users['Specialty']['name']);
			 if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'answerme') {
			 	$conditions['Question.is_answered'] = 0;	
			 } else {
			 	$conditions['Question.is_answered'] = 1;
			 }
			$conditions['Question.specialty_id'] = $specialty_id;
			//Take questions for users
			$questions = $this->User->Question->find('all', array(
				'conditions' =>  $conditions,
				'contain' => array(
					'Answer' => array(
						'fields' => array(
							'Answer.user_id',
							'Answer.question_id',
							'Answer.answer',
						),
					),
				),
				'fields'=>array(
					'Question.id',
					'Question.specialty_id',
					'Question.slug',
					'Question.question',
					'Question.description'
				),
				'recursive' => 1
			));
			if (!isset($this->request->params['named']['stat'])) {
				$this->request->params['named']['stat'] = 'answerme';
			}
			$this->set(compact('questions'));
		}	
	}

	//global search function for home page search
	public function globalSearch() {
		
		$city_id = $this->request->query['city'];
		$doctor_specialty_id = $this->request->query['spc_id'];
		$hospital_id = $this->request->query['hid'];
		
		
		$this->_redirectGET2Named(array(
				'zip_code',
				'doctor_specialty_id',
				'insurance_id',
				'insurance_plan_id',
				'specialty_disease_id',
				'doctor_name',
				'language_id',
				'gender_id'
		));
		$this->pageTitle = __l('Reviews & Ratings');
		$conditions = array();
		$insuracne_conditions = array();
		$zipcode_conditions = array();
		$doctor_insurance_id = '';
		$conditions['User.role_id'] = ConstUserTypes::Doctor;

		if(!empty($city_id)) {
				
				
				$zipcode_conditions['UserProfile.city_id'] = $city_id;
			
			$zipcodes = $this->User->UserProfile->find('all', array(
				'conditions' => $zipcode_conditions,
				'fields'=>array(
					'UserProfile.user_id',
				),
			));
			if(!empty($zipcodes)) {
				$i=1;
				foreach($zipcodes as $zipcode) {
							
								$user_ids[] = $zipcode['UserProfile']['user_id'];
							
						}
				
				
			}
			$conditions['User.id'] = $user_ids;
		}else{


		
		if(!empty($doctor_specialty_id)) {
			
		 
		$specialties_users = $this->User->SpecialtiesUser->find('all', array(
			'conditions' => array(
				'SpecialtiesUser.specialty_id' => $doctor_specialty_id
			) ,
			'recursive' => -1
		));	
		$specialty_user_ids = array();
		foreach($specialties_users as $specialties_user) {
			$specialty_user_ids[] = $specialties_user['SpecialtiesUser']['user_id'];
		}
		$conditions['User.id'] = $specialty_user_ids;
		$specialty_diseases = $this->User->Specialty->SpecialtyDisease->find('list', array(
            'conditions' => array(
                'SpecialtyDisease.is_active' => 1,
				'SpecialtyDisease.specialty_id' => $doctor_specialty_id
            ),
			'fields'=>array(
				'SpecialtyDisease.id',
				'SpecialtyDisease.name'
			),
			'recursive' => -1
        ));
		if(empty($specialty_diseases)) {
			$specialties = $this->User->Specialty->find('list', array(
				'conditions' => array(
					'Specialty.is_active' => 1,
					'Specialty.id' => $doctor_specialty_id
				),
        	));
			$specialty_diseases = array(
				$doctor_specialty_id => $specialties[$doctor_specialty_id]
			);
		}
		$this->set('doctor_specialty_id',$doctor_specialty_id);
		}
		//print_r($conditions);
		 					
				
		// Search for Insurance Company
		if(!empty($hospital_id)) {
			
			$clinic_conditions['ClinicsUser.clinic_id'] = $hospital_id;
				
			
			$clinic_users = $this->User->ClinicsUser->find('all', array(
				'conditions' => $clinic_conditions,
				'fields'=>array(
					'ClinicsUser.user_id'
				),
       		));
			$clinic_user_ids = array();
			foreach($clinic_users as $clinic_user) {
				$clinic_user_ids[] = $clinic_user['ClinicsUser']['user_id'];
			}	
			$conditions['User.id'] = $clinic_user_ids;
			
		} else {
			$doctor_insurance_id ='';
			$insurance_plans = $this->User->InsuranceCompany->InsurancePlan->find('list', array(
				'conditions' => array(
					'InsurancePlan.is_active' => 1,
				),
				'fields'=>array(
					'InsurancePlan.id',
					'InsurancePlan.name'
				),
			));
			$search_options = $this->User->InsurancePlan->searchOptions;
			$insuranceplans = $search_options + $insurance_plans;
			$this->set('doctor_insurance_id',$doctor_insurance_id);
		}
		}
		//print_r($conditions);
 		$this->paginate = array(
			'conditions' =>$conditions,
			'contain' => array(
				'Photo' => array(
					'Attachment' => array(
						'fields' => array(
							'Attachment.id',
							'Attachment.filename',
							'Attachment.dir',
							'Attachment.width',
							'Attachment.height',
						)	
					)
				), 
				'DoctorAvailability' => array(
				  'fields' => array(
                        'DoctorAvailability.consultation_fees'
                       )
				),
				'UserProfile' => array(
                    'fields' => array(
                        'UserProfile.first_name',
                        'UserProfile.last_name',
                        'UserProfile.middle_name',
                        'UserProfile.address',
                        'UserProfile.zip_code',
                        'UserProfile.specialty_id',
						'UserProfile.latitude',
						'UserProfile.longitude',
						'UserProfile.title',
						'UserProfile.practice_name',
                    ) ,
					'Specialty' => array(
                        'fields' => array(
                            'Specialty.name'
                        )
                    ) ,
                    'Gender' => array(
                        'fields' => array(
                            'Gender.name'
                        )
                    ) ,
                    'City' => array(
                        'fields' => array(
                            'City.name'
                        )
                    ) ,
                    'State' => array(
                        'fields' => array(
                            'State.name',
							'State.code'
                        )
                    ) ,
                    'Country' => array(
                        'fields' => array(
                            'Country.name',
                            'Country.iso2'
                        )
                    )
                ) ,
            ) ,
			'fields' => array(
				'User.username',
				'User.email',
				'User.created',
				'User.default_thumbnail_id',
				'User.overall_rating_count', 
				'User.overall_avg_rating',
				'User.is_active',
				'User.is_partner'
            ) ,
            'recursive' => 3
        );
		
		$this->set('users',$this->paginate());
		$specialties = $this->User->Specialty->find('list', array(
            'conditions' => array(
                'Specialty.is_active' => 1
            ),
			'order' => array(
				'Specialty.name' => 'asc'
			),
        ));
		$insurance_companies = $this->User->InsuranceCompany->find('list', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 1
            )
        ));
		$search_options = $this->User->InsuranceCompany->searchOptions;
		$insurances = $search_options + $insurance_companies;
		
		$languages = $this->User->Language->find('list', array(
				'conditions' => array(
					'Language.is_active' => 1
				),
				'fields'=>array(
					'Language.id',
					'Language.name'
				),
		));
			
		$gender_option = array(
			'-1' => __l('No Preference')
		);
		$genders = $this->User->UserProfile->Gender->find('list');
		$gender_lists = $gender_option + $genders;
		$search_specialties = $this->User->Specialty->find('all', array(
            'conditions' => array(
                'Specialty.is_active' => 1,
				'Specialty.speciality_disease_count != ' => 0
            ),
			'order' => array(
				'Specialty.name' => 'asc'
			),
			'limit' => 16
        ));
		$cities = $this->User->UserProfile->City->find('all', array(
            'conditions' => array(
                'City.is_approved' => 1
            ),
			'contain' => array(
				'State' => array(
					'fields' => array(
						'State.code'
					)
				),
			),
			'fields'=>array(
				'City.id',
				'City.name',
				'City.slug'
			),
			'limit' => 16
        ));
		$search_insurance_companies = $this->User->InsuranceCompany->find('all', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 1
            ),
			'order' => array(
				'InsuranceCompany.name' => 'asc'
			),
			'limit' => 9,
			'recursive' => '-1'
        ));
		$search_specialty_name = $this->User->Specialty->find('first', array(
				'conditions' => array(
					'Specialty.is_active' => 1,
					'Specialty.id' => $doctor_specialty_id
				),
        	));
		$this->set('specialty_name',$search_specialty_name['Specialty']['name']);
		$search_insurance_name = $this->User->InsuranceCompany->find('first', array(
				'conditions' => array(
					'InsuranceCompany.is_active' => 1,
					'InsuranceCompany.id' => $doctor_insurance_id
				),
        	));
		$this->set('insurance_name',$search_insurance_name['InsuranceCompany']['name']);
		$search_users = $this->paginate();
		$search_user_ids = array();
		foreach($search_users as $search_user) {
			$search_user_ids[] =  $search_user['User']['id'];
			$user_ids = implode(',', $search_user_ids);
		}
		$this->set('user_ids', $user_ids);
		$current_week = date('d').'-'.date('m').'-'.date('Y');
		$this->set('current_week', $current_week);
		$this->set(compact('specialties','insuranceplans','insurances','specialty_diseases','languages','gender_lists','search_specialties','cities','search_insurance_companies'));
	
		$this->render('search');		
	}
	
	public function get_specialities($city_id="") {
		if ( !empty($city_id) ) {
			
			$this->loadModel('UserProfile');
			$this->loadModel('City');
			$this->loadModel('SpecialtiesUser');
			
			$this->UserProfile->recursive = -1;
			$data = $this->UserProfile->find('all', array(
										'fields' => array('DISTINCT Specialty.id','Specialty.name'), 
										'joins' => array(											
											array(
												'table' => 'specialties',
												'alias' => 'Specialty',
												'type' => 'inner',
												'conditions' => array('UserProfile.specialty_id = Specialty.id')												
											)
										),
										'conditions' => array('UserProfile.city_id' => $city_id),
										'order' => array('Specialty.name' => 'ASC')
									));
			echo json_encode($data); 						
		
		}
		die;
	}
	
	public function get_hospitals($city_id="", $spc_id="") {
		if ( !empty($city_id) && !empty($spc_id) ) {
			
			
			$this->loadModel('UserProfile');
			$this->loadModel('Clinic');
						
			$this->UserProfile->recursive = -1;
			$data = $this->UserProfile->find('all', array(
										'fields' => array('DISTINCT Clinic.id','Clinic.name'), 
										'joins' => array(						
											array(
												'table' => 'clinics_users',
												'alias' => 'ClinicUser',
												'type' => 'left',
												'conditions' => array('UserProfile.user_id = ClinicUser.user_id')												
											),
											array(
												'table' => 'clinics',
												'alias' => 'Clinic',
												'type' => 'inner',
												'conditions' => array('ClinicUser.clinic_id = Clinic.id')												
											)
										),
										'conditions' => array('UserProfile.specialty_id' => $spc_id),
										'order' => array('Clinic.name' => 'ASC')
									));
									
			$this->Clinic->recursive = -1;						
			$clinics = $this->Clinic->find('all', array(
										'conditions' => array(
											'Clinic.city_id' => $city_id
										),
										'order' => array(
											'Clinic.name' => 'asc'
										)
									));						
			
			$allclinics = array();
			$already  = array();
			foreach($data as $dat) {
				if ( !in_array($dat['Clinic']['id'], $already) )
					$allclinics[] = $dat;
			}
			
			foreach($clinics as $cl) {
				if ( !in_array($cl['Clinic']['id'], $already) )
					$allclinics[] = $cl;
			}
			
			if(!empty($allclinics)) {
				echo json_encode($allclinics); 	
			}				
								
		
		}
		die;
	}

	public function admin_get_new_data(){
		
		$this->loadModel('User');
		$this->loadModel('Appointment');
		
		$count_user = $this->User->find('count', array(
										'conditions' => array(
											'User.is_admin_notification' => 1
										)
									));
									
		$count_app = $this->Appointment->find('count', array(
										'conditions' => array(
											'Appointment.is_admin_notification' => 1
										)
									));							
		$count = array('user' => $count_user, 'appointment' => $count_app);
		
		echo json_encode($count); die;
		
	}
	
	public function admin_clear_notification() {
		$id = $this->request->data['id'];
		$type = $this->request->data['type'];
		
		if(!empty($id) && !empty($type)){
			if($type == 1) {
				$this->loadModel('User');
				$this->User->id = $id;
				$this->User->save(array('is_admin_notification' => 0));
			}else{
				$this->loadModel('Appointment');
				$this->Appointment->id = $id;
				$this->Appointment->save(array('is_admin_notification' => 0));
			}
		}
		
		die;
		
	}
	
}
?>