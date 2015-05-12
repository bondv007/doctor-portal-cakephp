<?php
App::uses('Model', 'Model');
/**
 * Application model
 *
 * This file is the base model of all other models
 *
 * PHP version 5
 *
 * @category Models
 * @package  Cms
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.cms.org
 */
class AppModel extends Model
{
    public $actsAs = array(
        'Containable'
    );
    /**
     * use Caching
     *
     * @var string
     */
    public $useCache = true;
    /**
     * Constructor
     *
     * @param mixed  $id    Set this ID for this model on startup, can also be an array of options, see above.
     * @param string $table Name of database table to use.
     * @param string $ds    DataSource connection name.
     */
    public function __construct($id = false, $table = null, $ds = null)
    {
        Cms::applyHookProperties('Hook.model_properties');
        parent::__construct($id, $table, $ds);
    }
    /**
     * Override find function to use caching
     *
     * Caching can be done either by unique names,
     * or prefixes where a hashed value of $options array is appended to the name
     *
     * @param mixed $type
     * @param array $options
     * @return mixed
     * @access public
     */
    public function find($type, $options = array())
    {
        if ($this->useCache) {
            $cachedResults = $this->_findCached($type, $options);
            if ($cachedResults) {
                return $cachedResults;
            }
        }
        $args = func_get_args();
        $results = call_user_func_array(array(
            'parent',
            'find'
        ) , $args);
        if ($this->useCache) {
            if (isset($options['cache']['name']) && isset($options['cache']['config'])) {
                $cacheName = $options['cache']['name'];
            } elseif (isset($options['cache']['prefix']) && isset($options['cache']['config'])) {
                $cacheName = $options['cache']['prefix'] . md5(serialize($options));
            }
            if (isset($cacheName)) {
                $cacheName.= '_' . Configure::read('Config.language');
                Cache::write($cacheName, $results, $options['cache']['config']);
            }
        }
        return $results;
    }
    /**
     * Check if find() was already cached
     *
     * @param mixed $type
     * @param array $options
     * @return void
     * @access private
     */
    function _findCached($type, $options)
    {
        if (isset($options['cache']['name']) && isset($options['cache']['config'])) {
            $cacheName = $options['cache']['name'];
        } elseif (isset($options['cache']['prefix']) && isset($options['cache']['config'])) {
            $cacheName = $options['cache']['prefix'] . md5(serialize($options));
        } else {
            return false;
        }
        $cacheName.= '_' . Configure::read('Config.language');
        $results = Cache::read($cacheName, $options['cache']['config']);
        if ($results) {
            return $results;
        }
        return false;
    }
    /**
     * Updates multiple model records based on a set of conditions.
     *
     * call afterSave() callback after successful update.
     *
     * @param array $fields     Set of fields and values, indexed by fields.
     *                          Fields are treated as SQL snippets, to insert literal values manually escape your data.
     * @param mixed $conditions Conditions to match, true for all records
     * @return boolean True on success, false on failure
     * @access public
     */
    public function updateAll($fields, $conditions = true)
    {
        $args = func_get_args();
        $output = call_user_func_array(array(
            'parent',
            'updateAll'
        ) , $args);
        if ($output) {
            $created = false;
            $options = array();
            $this->Behaviors->trigger('afterSave', array(
                &$this,
                $created,
                $options,
            ));
            $this->afterSave($created);
            $this->_clearCache();
            return true;
        }
        return false;
    }
    /**
     * Fix to the Model::invalidate() method to display localized validate messages
     *
     * @param string $field The name of the field to invalidate
     * @param mixed $value Name of validation rule that was not failed, or validation message to
     *    be returned. If no validation key is provided, defaults to true.
     * @access public
     */
    public function invalidate($field, $value = true)
    {
        return parent::invalidate($field, __l($value));
    }
    function getGatewayTypes($field = null)
    {
        App::uses('PaymentGateway', 'Model');
        $this->PaymentGateway = new PaymentGateway();
        $paymentGateways = $this->PaymentGateway->find('all', array(
            'conditions' => array(
                'PaymentGateway.is_active' => 1
            ) ,
            'contain' => array(
                'PaymentGatewaySetting' => array(
                    'conditions' => array(
                        'PaymentGatewaySetting.key' => $field,
                        'PaymentGatewaySetting.test_mode_value' => 1
                    ) ,
                ) ,
            ) ,
            'order' => array(
                'PaymentGateway.display_name' => 'asc'
            ) ,
            'recursive' => 1
        ));
        $payment_gateway_types = array();
        foreach($paymentGateways as $paymentGateway) {
            if (!empty($paymentGateway['PaymentGatewaySetting'])) {
                $payment_gateway_types[$paymentGateway['PaymentGateway']['id']] = $paymentGateway['PaymentGateway']['display_name'];
            }
        }
        return $payment_gateway_types;
    }
    public function toSaveIp()
    {
        App::import('Model', 'Ip');
        $this->Ip = new Ip();
        $this->data['Ip']['ip'] = RequestHandlerComponent::getClientIP();
        $this->data['Ip']['host'] = RequestHandlerComponent::getReferer();
        $ip = $this->Ip->find('first', array(
            'conditions' => array(
                'Ip.ip' => $this->data['Ip']['ip']
            ) ,
            'fields' => array(
                'Ip.id'
            ) ,
            'recursive' => -1
        ));
        if (empty($ip)) {
            if (!empty($_COOKIE['_geo'])) {
                $_geo = explode('|', $_COOKIE['_geo']);
                $country = $this->Ip->Country->find('first', array(
                    'conditions' => array(
                        'Country.iso2' => $_geo[0]
                    ) ,
                    'fields' => array(
                        'Country.id'
                    ) ,
                    'recursive' => -1
                ));
                if (empty($country)) {
                    $this->data['Ip']['country_id'] = 0;
                } else {
                    $this->data['Ip']['country_id'] = $country['Country']['id'];
                }
                $state = $this->Ip->State->find('first', array(
                    'conditions' => array(
                        'State.name' => $_geo[1]
                    ) ,
                    'fields' => array(
                        'State.id'
                    ) ,
                    'recursive' => -1
                ));
                if (empty($state)) {
                    $this->data['State']['name'] = $_geo[1];
                    $this->Ip->State->create();
                    $this->Ip->State->save($this->data['State']);
                    $this->data['Ip']['state_id'] = $this->Ip->getLastInsertId();
                } else {
                    $this->data['Ip']['state_id'] = $state['State']['id'];
                }
                $city = $this->Ip->City->find('first', array(
                    'conditions' => array(
                        'City.name' => $_geo[2]
                    ) ,
                    'fields' => array(
                        'City.id'
                    ) ,
                    'recursive' => -1
                ));
                if (empty($city)) {
                    $this->data['City']['name'] = $_geo[2];
                    $this->Ip->City->create();
                    $this->Ip->City->save($this->data['City']);
                    $this->data['Ip']['city_id'] = $this->Ip->City->getLastInsertId();
                } else {
                    $this->data['Ip']['city_id'] = $city['City']['id'];
                }
                $this->data['Ip']['latitude'] = $_geo[3];
                $this->data['Ip']['longitude'] = $_geo[4];
            }
            $this->Ip->create();
            $this->Ip->save($this->data['Ip']);
            return $this->Ip->getLastInsertId();
        } else {
            return $ip['Ip']['id'];
        }
    }
    public function findOrSaveAndGetId($data)
    {
        $findExist = $this->find('first', array(
            'conditions' => array(
                'name' => $data
            ) ,
            'fields' => array(
                'id'
            ) ,
            'recursive' => -1
        ));
        if (!empty($findExist)) {
            return $findExist[$this->name]['id'];
        } else {
            $this->data[$this->name]['name'] = $data;
            $this->create();
            $this->save($this->data[$this->name]);
            return $this->id;
        }
    }
	function findOrSaveCityAndGetId($name, $state_id, $country_id)
    {
        $findExist = $this->find('first', array(
            'conditions' => array(
                'name' => $name
            ) ,
            'fields' => array(
                'id'
            ) ,
            'recursive' => - 1
        ));
        if (!empty($findExist)) {
            return $findExist[$this->name]['id'];
        } else {
            $data['City']['name'] = $name;
            $data['City']['state_id'] = $state_id;
            $data['City']['country_id'] = $country_id;
            $this->create();
            $this->set($data['City']);
            $this->save($data['City']);
            return $this->getLastInsertId();;
        }
    }
    public function getIdHash($ids = null)
    {
        return md5($ids . Configure::read('Security.salt'));
    }
    public function siteCurrencyFormat($amount)
    {
        if (Configure::read('site.currency_symbol_place') == 'left') {
            return Configure::read('site.currency') . $amount;
        } else {
            return $amount . Configure::read('site.currency');
        }
    }
    public function changeFromEmail($from_address = null)
    {
        if (!empty($from_address)) {
            if (preg_match('|<(.*)>|', $from_address, $matches)) {
                return $matches[1];
            } else {
                return $from_address;
            }
        }
    }
    public function formatToAddress($user = null)
    {
        if (!empty($user['UserProfile']['first_name']) && !empty($user['UserProfile']['last_name'])) {
            return $user['UserProfile']['first_name'] . ' ' . $user['UserProfile']['first_name'] . ' <' . $user['User']['email'] . '>';
        } elseif (!empty($user['UserProfile']['first_name'])) {
            return $user['UserProfile']['first_name'] . ' <' . $user['User']['email'] . '>';
        } else {
            return $user['User']['email'];
        }
    }
    public function _isValidCaptcha()
    {
        include_once VENDORS . DS . 'securimage' . DS . 'securimage.php';
        $img = new Securimage();
        return $img->check($this->data[$this->name]['captcha']);
    }
    public function _sendEmail($template, $replace_content, $to, $from = null)
    {
        App::import('Model', 'EmailTemplate');
        $this->EmailTemplate = new EmailTemplate();
        App::uses('CakeEmail', 'Network/Email');
        $this->Email = new CakeEmail();
        $default_content = array(
            '##SITE_NAME##' => Configure::read('site.name') ,
            '##SITE_URL##' => Router::url('/', true) ,
        );
        $emailFindReplace = array_merge($default_content, $replace_content);
        $template = $this->EmailTemplate->selectTemplate($template);
        $message = strtr($template['email_content'], $emailFindReplace);
        $subject = strtr($template['subject'], $emailFindReplace);
        // Send e-mail
        if (!empty($from)) {
            $this->Email->from($from);
        } else {
            $this->Email->from(Configure::read('EmailTemplate.from_email'));
        }
        $reply_to_email = (!empty($template['reply_to']) && $template['reply_to'] == '##REPLY_TO_EMAIL##') ? Configure::read('EmailTemplate.reply_to_email') : $template['reply_to'];
        if (!empty($reply_to_email)) {
            $this->Email->replyTo($reply_to_email);
        }
        $this->Email->to($to);
        $this->Email->subject($subject);
        $this->Email->send($message);
    }
    function getConversionCurrency()
    {
        if (Configure::read('paypal.is_supported') == 0) {
            $_paypal_conversion_currency = Cache::read('site_paypal_conversion_currency');
            $_paypal_conversion_currency['supported_currency'] = Configure::read('paypal.is_supported');
            $_paypal_conversion_currency['conv_currency_code'] = Configure::read('paypal.conversion_currency_code');
            $_paypal_conversion_currency['currency_code'] = Configure::read('paypal.currency_code');
            $_paypal_conversion_currency['conv_currency_symbol'] = Configure::read('paypal.conversion_currency_symbol');
        } else {
            $_currencies = Cache::read('site_currencies');
            $_paypal_actual_currency = $_currencies[Configure::read('site.currency_id') ]['Currency'];
            $_paypal_conversion_currency['CurrencyConversion']['currency_id'] = $_paypal_actual_currency['id'];
            $_paypal_conversion_currency['CurrencyConversion']['converted_currency_id'] = $_paypal_actual_currency['id'];
            $_paypal_conversion_currency['CurrencyConversion']['rate'] = '0';
            $_paypal_conversion_currency['supported_currency'] = Configure::read('paypal.is_supported');
            $_paypal_conversion_currency['conv_currency_code'] = $_paypal_actual_currency['code'];
            $_paypal_conversion_currency['currency_code'] = $_paypal_actual_currency['code'];
            $_paypal_conversion_currency['conv_currency_symbol'] = $_paypal_actual_currency['symbol'];
        }
        return $_paypal_conversion_currency;
    }
    function _convertAmount($amount)
    {
        $converted = array();
        $_paypal_conversion_currency = Cache::read('site_paypal_conversion_currency');
        $is_supported = Configure::read('paypal.is_supported');
        if (isset($is_supported) && empty($is_supported)) {
            $converted['amount'] = $amount*$_paypal_conversion_currency['CurrencyConversion']['rate'];
            $converted['currency_code'] = Configure::read('paypal.conversion_currency_code');
        } else {
            $converted['amount'] = $amount;
            $converted['currency_code'] = Configure::read('paypal.currency_code');
        }
        return $converted;
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
	public function getTimeSlots()
	{
		 $time = '00:00'; // start
		 $times = array();
		 for ($i = 0; $i <= 287; $i++)
		 {
			 $prev = date('H:i', strtotime($time)); // format the start time
			 $next = strtotime('+5mins', strtotime($time)); // add 30 mins
			 $time = date('H:i', $next); // format the next time
			 $times[$prev] = $prev;
		 }
		 return $times;
	} 
	public function getDoctorAndPatientInfo($user_id = null, $doctor_user_id = null) 
	{
		App::uses('User', 'Model');
        $this->User = new User();
		$user['Patient'] = $this->User->find('first', array(
            'conditions' => array(
                'User.id = ' => $user_id
            ) ,
            'contain' => array(
				'UserProfile' => array(
                    'fields' => array(
                        'UserProfile.first_name',
                        'UserProfile.last_name',
                        'UserProfile.middle_name',
                        'UserProfile.gender_id',
						'UserProfile.dob',
                        'UserProfile.zip_code',
						'UserProfile.phone_id',
						'UserProfile.cell_number',
						'UserProfile.home_number',
						'UserProfile.work_number',
                    ) ,
                    'Gender' => array(
                        'fields' => array(
                            'Gender.name'
                        )
                    ) ,
                ) ,
            ) ,
			'fields' => array(
				'User.id',
				'User.username',
				'User.email',
				'User.created',
				'User.default_thumbnail_id'
            ) ,
            'recursive' => 3
        ));
		$user['Doctor'] = $this->User->find('first', array(
            'conditions' => array(
                'User.id = ' => $doctor_user_id
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
				'UserProfile' => array(
                    'fields' => array(
                        'UserProfile.first_name',
                        'UserProfile.last_name',
                        'UserProfile.middle_name',
						'UserProfile.specialty_id',
                        'UserProfile.dob',
                        'UserProfile.address',
                        'UserProfile.zip_code',
                        'UserProfile.specialty_id',
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
				'User.id',
				'User.username',
				'User.email',
				'User.created',
				'User.default_thumbnail_id',
				'User.overall_rating_count', 
				'User.overall_avg_rating', 
				'User.user_rating_count' 
            ) ,
            'recursive' => 3
        ));
		return $user; 
	}
	public function getDoctorInfo($user_id = null) 
	{
		App::uses('User', 'Model');
        $this->User = new User();
		$user = $this->User->find('first', array(
            'conditions' => array(
                'User.id = ' => $user_id
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
						'UserProfile.practice_name',
						'UserProfile.phone_id',
						'UserProfile.cell_number',
						'UserProfile.home_number',
						'UserProfile.work_number',
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
				'User.default_thumbnail_id'
            ) ,
            'recursive' => 3
        ));
		return $user; 
	}
	public function getMarkerInfoView($user_id = null) 
	{
		App::uses('User', 'Model');
        $this->User = new User();
		$user = $this->User->find('first', array(
            'conditions' => array(
                'User.id = ' => $user_id
            ) ,
            'contain' => array(
				'UserProfile' => array(
                    'fields' => array(
                        'UserProfile.created',
                        'UserProfile.first_name',
                        'UserProfile.last_name',
                        'UserProfile.middle_name',
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
				'User.email',
				'User.created',
				'User.default_thumbnail_id'
            ) ,
            'recursive' => 3
        ));
		if($user['User']['default_thumbnail_id'] == 0) {
			$default_thumbnail_id = 1;		
		} else {
			$default_thumbnail_id = $user['User']['default_thumbnail_id'];
		}
		$user['DefaultPhoto'] = $this->User->Photo->Attachment->find('first', array(
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
		$user['Photos'] = $this->User->Photo->find('all', array(
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
		return $user; 
	}
	public function getAppointmentInfo($id = null) 
	{
		App::uses('Appointment', 'Model');
        $this->Appointment = new Appointment();
		$appointment = $this->Appointment->find('first', array(
			'conditions' => array(
				'Appointment.id' => $id,
			) ,
			'contain' => array(
				'User' => array(
					'UserProfile' => array(
						'fields' => array(
							'UserProfile.first_name',	
							'UserProfile.last_name',	
							'UserProfile.cell_number',
							'UserProfile.phone',
						)
					),
					'fields' => array(
						'User.username',
						'User.email',								
					) 
				) ,
				'DoctorUser' => array(
					'UserProfile' => array(
						'fields' => array(
							'UserProfile.first_name',	
							'UserProfile.last_name',
							'UserProfile.phone',	
						)
					),
					'fields' => array(
						'DoctorUser.username',	
						'DoctorUser.email',							
					) 
				)
			) ,
			'recursive' => 2,
		));
		return $appointment;
	}	
	public function sendSMS($smsinfo)
	{
			//Code using curl

			//Change your configurations here.
			//---------------------------------
			$username="Tatkalcare";
			$api_password="4123drb53rl6c4200";
			$sender="TTKLCR";
			$domain="sms1.bcozindia.in";
			$priority="11";// 1 - Normal , 2 - Priority , 4 - Promotional , 8 - Transaction , 11 - Enterprise
			$method="0";
			

				$mobile=$smsinfo['mobile'];

				$message=$smsinfo['message'];

				$username=urlencode($username);
				$password=urlencode($password);
				$sender=urlencode($sender);
				$message=urlencode($message);

				$parameters="username=$username&api_password=$api_password&sender=$sender&to=$mobile&message=$message&priority=$priority";

				$url="http://$domain/pushsms.php";

				$ch = curl_init($url);
				//echo $parameters; die;
				if($method=="POST")
				{
					curl_setopt($ch, CURLOPT_POST,1);
					curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
				}
				else
				{
					$get_url=$url."?".$parameters;

					curl_setopt($ch, CURLOPT_POST,0);
					curl_setopt($ch, CURLOPT_URL, $get_url);
				}

				curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
				curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
				$return_val = curl_exec($ch);


				if($return_val=="")
				return false ;
				else
				return $return_val.$parameters;

			
	}
}?>
