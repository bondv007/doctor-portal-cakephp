<?php
App::uses('Helper', 'View');
/**
 * Application helper
 *
 * This file is the base helper of all other helpers
 *
 * PHP version 5
 *
 * @category Helpers
 * @package  Cms
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.cms.org
 */
class AppHelper extends Helper
{
    public function assetUrl($path, $options = array())
    {
        $cdn_path = '';
        if ($options['pathPrefix'] == IMAGES_URL) {
            $cdn_path = Configure::read('cdn.images');
        } elseif ($options['pathPrefix'] == JS_URL) {
            $cdn_path = Configure::read('cdn.js');
        } elseif ($options['pathPrefix'] == CSS_URL) {
            $cdn_path = Configure::read('cdn.css');
        }
        return parent::assetUrl($path, $options, $cdn_path);
    }
    /**
     * Url helper function
     *
     * @param string $url
     * @param bool $full
     * @return mixed
     * @access public
     */
    public function url($url = null, $full = false)
    {
        if (!isset($url['locale']) && isset($this->request->params['locale'])) {
            $url['locale'] = $this->request->params['locale'];
        }
        return parent::url($url, $full);
    }
    public function getUserLink($user_details)
    {
         if ((!empty($user_details['role_id'])&& $user_details['role_id'] == ConstUserTypes::Admin)|| (!empty($user_details['role_id'])&&$user_details['role_id'] == ConstUserTypes::User)) {
            return $this->link($this->cText($user_details['username'], false) , array(
                'controller' => 'users',
                'action' => 'view',
                $user_details['username'],
                'admin' => false
            ) , array(
                'title' => $this->cText($user_details['username'], false) ,
                'escape' => false
            ));
        }
    }
    public function getCurrUserInfo($id)
    {
        App::uses('User', 'Model');
        $this->User = new User();
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.id' => $id,
            ) ,
            'fields' => array(
                'User.id',
                'User.username',
                'User.available_wallet_amount',
            ) ,
            'recursive' => -1
        ));
        return $user;
    }
    function getUserAvatarLink($user_details, $dimension = 'medium_thumb', $is_link = true)
    {
        if (!empty($user_details['is_facebook_register'])) {
            $width = Configure::read('thumb_size.' . $dimension . '.width');
            $height = Configure::read('thumb_size.' . $dimension . '.height');
            $user_image = $this->getFacebookAvatar($user_details['fb_user_id'], $height, $width);
        } elseif (!empty($user_details['twitter_avatar_url'])) {
            $width = Configure::read('thumb_size.' . $dimension . '.width');
            $height = Configure::read('thumb_size.' . $dimension . '.height');
            $user_image = $this->image($useruser_details['twitter_avatar_url'], array(
                'title' => $this->cText($user_details['username'], false) ,
                'width' => $width,
                'height' => $height
            ));
        } else { 
			if (empty($user_details['UserAvatar'])) {
				if (!empty($user_details['id'])) {
					App::uses('User', 'Model');
					$this->User = new User();
					$user = $this->User->find('first', array(
						'conditions' => array(
							'User.id' => $user_details['id'],
						) ,
						'contain' => array(
							'UserAvatar'
						),
						'recursive' => 0
					));
					if(!empty($user['UserAvatar']['id'])) {
						$user_details['UserAvatar'] = $user['UserAvatar'];
					}
				}
			}
			$user_details['username']=!empty($user_details['username']) ? $user_details['username'] : '';
			$user_image = $this->showImage('UserAvatar', (!empty($user_details['UserAvatar'])) ? $user_details['UserAvatar'] : '', array(
				'dimension' => $dimension,
				'alt' => sprintf('[Image: %s]', $user_details['username']) ,
				'title' => $user_details['username']
			));
		}
        //return image to user
        return (!$is_link) ? $user_image : $this->link($user_image, array(
            'controller' => 'users',
            'action' => 'view',
            $user_details['username'],
            'admin' => false
        ) , array(
            'title' => $this->cText($user_details['username'], false) ,
            'escape' => false
        ));
    }
    public function isWalletEnabled()
    {
        App::uses('PaymentGateway', 'Model');
        $this->PaymentGateway = new PaymentGateway();
        $PaymentGateway = $this->PaymentGateway->find('first', array(
            'conditions' => array(
                'PaymentGateway.id' => ConstPaymentGateways::Wallet
            ) ,
            'recursive' => -1
        ));
        if (!empty($PaymentGateway['PaymentGateway']['is_active'])) {
            return true;
        }
        return false;
    }
    public function getUserAvatar($user_id)
    {
        App::import('Model', 'User');
        $modelObj = new User();
        $user = $modelObj->find('first', array(
            'conditions' => array(
                'User.id' => $user_id,
            ) ,
            'fields' => array(
                'UserAvatar.id',
                'UserAvatar.dir',
                'UserAvatar.filename'
            ) ,
            'recursive' => 0
        ));
        return $user['UserAvatar'];
    }
    public function siteCurrencyFormat($amount, $wrap = 'span')
    {
        if (Configure::read('site.currency_symbol_place') == 'left') {
            return Configure::read('site.currency') . $this->cCurrency($amount, $wrap);
        } else {
            return $this->cCurrency($amount, $wrap) . Configure::read('site.currency');
        }
    }
    public function getLanguage()
    {
        App::import('Model', 'Translation.Translation');
        $this->Translation = new Translation();
        $languages = $this->Translation->find('all', array(
            'conditions' => array(
                'Language.id !=' => 0
            ) ,
            'fields' => array(
                'DISTINCT(Translation.language_id)',
                'Language.name',
                'Language.iso2'
            ) ,
            'order' => array(
                'Language.name' => 'ASC'
            )
        ));
        $languageList = array();
        if (!empty($languages)) {
            foreach($languages as $language) {
                $languageList[$language['Language']['iso2']] = $language['Language']['name'];
            }
        }
        return $languageList;
    }
    public function transactionDescription($transaction,$is_admin = 0)
    {
        App::import('Model', 'Transaction');
        $this->Transaction = new Transaction();
        $transactionReplace = array(
            '##USER##' => $this->link($transaction['User']['username'], array(
                'controller' => 'users',
                'action' => 'view',
                $transaction['User']['username'],
                'admin' => false
            )) ,
            '##CONTEST##' => !empty($transaction['Contest']) ? $this->link($transaction['Contest']['name'], array(
                'controller' => 'contests',
                'action' => 'view',
                $transaction['Contest']['slug'],
                'admin' => false
            )) : '',
            '##CONTEST_AMOUNT##' => !empty($transaction['Contest']) ? ((!empty($transaction['Contest']['contest_status_id']) && $transaction['Transaction']['transaction_type_id'] == ConstTransactionTypes::PrizeAmountForCompletedContest) ? $this->siteCurrencyFormat($transaction['Contest']['creation_cost']) : $this->siteCurrencyFormat($transaction['Contest']['prize'])) : '',
            '##SECOND_USER##' => !empty($transaction['SecondUser']['username']) ? $this->link($transaction['SecondUser']['username'], array(
                'controller' => 'users',
                'action' => 'view',
                $transaction['SecondUser']['username'],
                'admin' => false
            )) : '',
        );
		if($is_admin){
			return strtr($transaction['TransactionType']['message_for_admin'], $transactionReplace);
		}
		else{
			return strtr($transaction['TransactionType']['message'], $transactionReplace);
		}
    }
    public function getFacebookAvatar($fbuser_id, $height = 35, $width = 35)
    {
        return $this->image("http://graph.facebook.com/{$fbuser_id}/picture", array(
            'height' => $height,
            'width' => $width
        ));
    }
    public function displayActivities($message)
    {
        if (!empty($message['ContestStatus']['message'])) {
          $activity_message = $message['ContestStatus']['message'];
         } elseif ($message['Message']['contest_status_id'] == ConstContestStatus::NewEntry) {
            $activity_message = ConstActivityMessage::NewEntry;
        } elseif ($message['Message']['contest_status_id'] == ConstContestStatus::Rated) {
            $activity_message = ConstActivityMessage::Rated;
        }
        $FindReplace = array();
        $FindReplace['##CONTEST##'] = $this->link($message['Contest']['name'], array(
            'controller' => 'contests',
            'action' => 'view',
            $message['Contest']['slug']
        ));
		$FindReplace['##CONTEST_AMOUNT##'] = $this->siteCurrencyFormat($message['Contest']['prize']);
        $FindReplace['##HOLDER_NAME##'] = $this->showImage('UserAvatar', (!empty($message['Contest']['User']['UserAvatar'])) ? $message['Contest']['User']['UserAvatar'] : '', array(
            'dimension' => 'micro_thumb',
            'alt' => sprintf('[Image: %s]', $message['Contest']['User']['username']) ,
            'title' => $message['Contest']['User']['username']
        )) . $this->link($message['Contest']['User']['username'], array(
            'controller' => 'users',
            'action' => 'view',
            $message['Contest']['User']['username']
        ));
        if (!empty($message['Contest']['WinnerUser']['id'])) {
            $FindReplace['##WINNER_USER##'] = $this->showImage('UserAvatar', (!empty($message['Contest']['WinnerUser']['UserAvatar'])) ? $message['Contest']['WinnerUser']['UserAvatar'] : '', array(
                'dimension' => 'micro_thumb',
                'alt' => sprintf('[Image: %s]', $message['Contest']['WinnerUser']['username']) ,
                'title' => $message['Contest']['WinnerUser']['username']
            )) . $this->link($message['Contest']['WinnerUser']['username'], array(
                'controller' => 'users',
                'action' => 'view',
                $message['Contest']['WinnerUser']['username']
            ));
        }
        if (!empty($message['ContestUser']['id'])) {
            $FindReplace['##ENTRY_NO##'] = $this->link('#' . $message['ContestUser']['entry_no'], array(
                'controller' => 'contest_users',
                'action' => 'view',
                $message['Contest']['slug'],
                'entry' => $message['ContestUser']['entry_no']
            ));
            $FindReplace['##CONTEST_USER##'] = $this->showImage('UserAvatar', (!empty($message['ContestUser']['User']['UserAvatar'])) ? $message['ContestUser']['User']['UserAvatar'] : '', array(
                'dimension' => 'micro_thumb',
                'alt' => sprintf('[Image: %s]', $message['ContestUser']['User']['username']) ,
                'title' => $message['ContestUser']['User']['username']
            )) . $this->link($message['ContestUser']['User']['username'], array(
                'controller' => 'users',
                'action' => 'view',
                $message['ContestUser']['User']['username']
            ));
        }
        if (!empty($message['ContestUserRating']['id'])) {
            $FindReplace['##RATING##'] = $this->get_star_rating(round($message['ContestUserRating']['rating'], 2));
            $FindReplace['##RATED_USER##'] = $this->showImage('UserAvatar', (!empty($message['ContestUserRating']['User']['UserAvatar'])) ? $message['ContestUserRating']['User']['UserAvatar'] : '', array(
                'dimension' => 'micro_thumb',
                'alt' => sprintf('[Image: %s]', $message['ContestUserRating']['User']['username']) ,
                'title' => $message['ContestUserRating']['User']['username']
            )) . $this->link($message['ContestUserRating']['User']['username'], array(
                'controller' => 'users',
                'action' => 'view',
                $message['ContestUserRating']['User']['username']
            ));
        }
        $activity_messages = strtr($activity_message, $FindReplace);
        $activity_message='<span>'.$activity_messages.'</span>';
        return $activity_message;
    }
    public function get_star_rating($current_rating)
    {
        $current_rating_percentage = $current_rating*20;
        $rating = '<ul class="star-rating"><li class="current-rating" style="width:' . $current_rating_percentage . '%;" title="' . $current_rating . __l('Stars') . '">' . $current_rating .  __l('Stars') . '</li></ul>';
        return $rating;
    }
	public function formGooglemap($userdetails = array() , $size = '320x320')
	{
		if ((!(is_array($userdetails))) || empty($userdetails)) {
			return false;
		}
		$mapurl = 'http://maps.google.com/maps/api/staticmap?center=';
		$mapcenter[] = str_replace(' ', '+', $userdetails['latitude']) . ',' . $userdetails['longitude'];
		$mapcenter[] = 'zoom=' . (!empty($userdetails['zoom_level']) ? $userdetails['zoom_level'] : 8);
		$mapcenter[] = 'size=' . $size;
		$mapcenter[] = 'markers=color:blue|label:M|' . $userdetails['latitude'] . ',' . $userdetails['longitude'];
		$mapcenter[] = 'sensor=false';
		return $mapurl . implode('&amp;', $mapcenter);
	}
	function getDoctorAvatarImage($user, $dimension = 'normal_thumb', $is_link = true)
    {
		App::uses('User', 'Model');
		$this->User = new User();
		if($user['default_thumbnail_id'] == 0) {
			$userphotos = $this->User->Photo->find('all', array(
            'conditions' => array(
                'Photo.user_id = ' => $user['id']
            ) ,
           'contain' => array(
                'Attachment' => array(
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
			if(!empty($userphotos)) {
				$default_thumbnail_id = $userphotos[0]['Attachment']['id'];	
			} else {
				$default_thumbnail_id = 1;	
			}	
		} else {
			$default_thumbnail_id = $user['default_thumbnail_id'];
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
		$user_image = $this->showImage('Photo', (!empty($default_photo['Attachment'])) ? $default_photo['Attachment'] : '', array(
			'dimension' => $dimension,
			'alt' => sprintf('[Image: %s]', $user['username']) ,
			'title' => $user['username']
		));
        //return image to user
        return (!$is_link) ? $user_image : $this->link($user_image, array(
            'controller' => 'users',
            'action' => 'view',
            $user['username'],
            'admin' => false
        ) , array(
            'title' => $this->cText($user['username'], false) ,
            'escape' => false
        ));
    }
	function getDoctorDetailInfo($user_id = null)
	{
		App::uses('User', 'Model');
		$this->User = new User();
		$user = $this->User->find('first', array(
            'conditions' => array(
                'User.role_id = ' => ConstUserTypes::Doctor,
				'User.id = ' => $user_id
            ) ,
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
				'UserEducation',
				'UserProfile' => array(
                    'fields' => array(
                        'UserProfile.first_name',
                        'UserProfile.last_name',
                        'UserProfile.middle_name',
                        'UserProfile.about_me',
                        'UserProfile.address',
                        'UserProfile.zip_code',
                        'UserProfile.specialty_id',
						'UserProfile.latitude',
						'UserProfile.longitude',
						'UserProfile.title',
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
				'User.bedside_avg_rating',
				'User.timing_avg_rating',
				'User.overall_avg_rating',
            ) ,
            'recursive' => 3
        ));
		return $user;
	}
	function getDoctorImageUrl($id = null)
	{
		App::uses('User', 'Model');
		$this->User = new User();
		$default_photo = $this->User->Photo->Attachment->find('first', array(
             'conditions' => array(
                'Attachment.id = ' => $id
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
		return $default_photo['Attachment']['id'];
	}	
	function getDoctorSlots($setup_date = '', $appointment_data = array())
	{
		$split_time = '';
		if(!empty($appointment_data['DoctorAvailability']['DoctorAvailabilityTiming'])) {
			foreach($appointment_data['DoctorAvailability']['DoctorAvailabilityTiming'] as $timings) {
				if($timings['availability_date'] == $setup_date) {
					$time_data = $timings['timings'];
					$split_time = explode(',', $time_data);
				}
			}
		}
		return $split_time;
	}
	function getAppointSearchTimingsID($setup_date = '', $appointment_data = array())
	{
		$time_id = '';
		if(!empty($appointment_data['DoctorAvailability']['DoctorAvailabilityTiming'])) {
			foreach($appointment_data['DoctorAvailability']['DoctorAvailabilityTiming'] as $timings) {
				if($timings['availability_date'] == $setup_date) {
					$time_id = $timings['id'];
				}
			}
		}
		return $time_id;
	}
	function getAlreadyExistAppointmentDetails($setup_date = '', $time = '', $user_id = '')
	{
		App::uses('Appointment', 'Model');
		$this->Appointment = new Appointment();
		$timings = $this->Appointment->find('first', array(
            'conditions' => array(
				'Appointment.doctor_user_id' => $user_id,
				'Appointment.appointment_date' => $setup_date,
				'Appointment.appointment_time' => $time ,
			),
            'recursive' => -1,
        ));
		return $timings; 
	}
	function getImageUrl($model, $attachment, $options, $path = 'absolute')
    {
        $default_options = array(
            'dimension' => 'original',
            'class' => '',
            'alt' => 'alt',
            'title' => 'title',
            'type' => 'jpg'
        );
		$options['dimension']='original';
        $options = array_merge($default_options, $options);
        $image_hash = $options['dimension'] . '/' . $model . '/' . $attachment['id'] . '.' . md5(Configure::read('Security.salt') . $model . $attachment['id'] . $options['type'] . $options['dimension'] . Configure::read('site.name')) . '.' . $options['type'];
        if ($path == 'absolute') return Cache::read('site_url_for_shell', 'long') . 'img/' . $image_hash;
        else return 'img/' . $image_hash;
    }
}
?>