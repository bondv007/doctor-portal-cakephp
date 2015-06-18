<?php
class User extends AppModel {

	public $name = 'User';	
	public $displayField = 'username';
	public $belongsTo = array(
		'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
        ),
		'LastLoginIp' => array(
            'className' => 'Ip',
            'foreignKey' => 'last_login_ip_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
		'Ip' => array(
            'className' => 'Ip',
            'foreignKey' => 'ip_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
		'LastLoginIp' => array(
            'className' => 'Ip',
            'foreignKey' => 'last_login_ip_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
	);
	public $hasMany = array(
        'PaypalTransactionLog' => array(
            'className' => 'PaypalTransactionLog',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ) ,
	    'UserEducation' => array(
            'className' => 'UserEducation',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ) ,    
		'Photo' => array(
            'className' => 'Photo',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ) ,
		'UserLogin' => array(
            'className' => 'UserLogin',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ) ,
        'MyBlockedUser' => array(
            'className' => 'BlockedUser',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ) ,
        'BlockedUser' => array(
            'className' => 'BlockedUser',
            'foreignKey' => 'blocked_user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ) ,
        'UserView' => array(
            'className' => 'UserView',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ) ,        
        'CkSession' => array(
            'className' => 'CkSession',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
		'Transaction' => array(
            'className' => 'Transaction',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
		'Question' => array(
            'className' => 'Question',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
		'Affiliate' => array(
            'className' => 'Affiliate',
            'foreignKey' => 'affliate_user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ) ,
        'AffiliateCashWithdrawal' => array(
            'className' => 'AffiliateCashWithdrawal',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        ) , 
		'AffiliateRequest' => array(
            'className' => 'AffiliateRequest',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => '',
        )  
    );
    public $hasOne = array(
		'UserProfile' => array(
            'className' => 'UserProfile',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ) ,        
        'UserAvatar' => array(
            'className' => 'UserAvatar',
            'foreignKey' => 'foreign_id',
            'dependent' => true,
            'conditions' => array(
                'UserAvatar.class' => 'UserAvatar',
            ) ,
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
		'DoctorAvailability' => array(
            'className' => 'DoctorAvailability',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
		'Answer' => array(
            'className' => 'Answer',
            'foreignKey' => 'user_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )  
    );
	public $hasAndBelongsToMany = array(
		'Language' => array(
			'className' => 'Language',
			'joinTable' => 'languages_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'language_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Specialty' => array(
			'className' => 'Specialty',
			'joinTable' => 'specialties_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'specialty_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
			'Clinic' => array(
			'className' => 'Clinic',
			'joinTable' => 'clinics_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'clinic_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'SpecialtyDisease' => array(
			'className' => 'SpecialtyDisease',
			'joinTable' => 'specialty_diseases_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'specialty_disease_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'InsuranceCompany' => array(
			'className' => 'InsuranceCompany',
			'joinTable' => 'insurance_companies_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'insurance_company_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'InsurancePlan' => array(
			'className' => 'InsurancePlan',
			'joinTable' => 'insurance_plans_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'insurance_plan_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
     public function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'user_id' => array(
                'rule1' => array(
                    'rule' => 'numeric',
                    'message' => __l('Required')
                )
            ) ,
            'username' => array(
                'rule5' => array(
                    'rule' => array(
                        'between',
                        3,
                        30
                    ) ,
                    'message' => __l('Must be between of 3 to 30 characters')
                ) ,
                'rule4' => array(
                    'rule' => 'alphaNumeric',
                    'message' => __l('Must be a valid character')
                ) ,
                'rule3' => array(
                    'rule' => 'isUnique',
                    'message' => __l('Username is already exist')
                ) ,
                'rule2' => array(
                    'rule' => array(
                        'custom',
                        '/^[a-zA-Z]/'
                    ) ,
                    'message' => __l('Must be start with an alphabets')
                ) ,
                'rule1' => array(
                    'rule' => 'notempty',
                    'message' => __l('Required')
                )
            ) ,
            'email' => array(
                'rule1' => array(
                    'rule' => 'isUnique',
                    'on' => 'create',
                    'message' => __l('Email address is already exist')
                )
            ) ,
            'passwd' => array(
                'rule2' => array(
                    'rule' => array(
                        'minLength',
                        6
                    ) ,
                    'message' => __l('Must be at least 6 characters')
                ) ,
                'rule1' => array(
                    'rule' => 'notempty',
                    'message' => __l('Required')
                )
            ) ,
            'old_password' => array(
                'rule3' => array(
                    'rule' => array(
                        '_checkOldPassword',
                        'old_password'
                    ) ,
                    'message' => __l('Your old password is incorrect, please try again')
                ) ,
                'rule2' => array(
                    'rule' => array(
                        'minLength',
                        6
                    ) ,
                    'message' => __l('Must be at least 6 characters')
                ) ,
                'rule1' => array(
                    'rule' => 'notempty',
                    'message' => __l('Required')
                )
            ) ,
            'confirm_password' => array(
                'rule3' => array(
                    'rule' => array(
                        '_isPasswordSame',
                        'passwd',
                        'confirm_password'
                    ) ,
                    'message' => __l('New and confirm password field must match, please try again')
                ) ,
                'rule2' => array(
                    'rule' => array(
                        'minLength',
                        6
                    ) ,
                    'message' => __l('Must be at least 6 characters')
                ) ,
                'rule1' => array(
                    'rule' => 'notempty',
                    'message' => __l('Required')
                )
            ) ,
            'captcha' => array(
                'rule2' => array(
                    'rule' => '_isValidCaptcha',
                    'message' => __l('Please enter valid captcha')
                ) ,
                'rule1' => array(
                    'rule' => 'notempty',
                    'message' => __l('Required')
                )
            ) ,
            'is_agree_terms_conditions' => array(
                'rule' => array(
                    'equalTo',
                    '1'
                ) ,
                'message' => __l('You must agree to the terms and conditions')
            ) ,
            'message' => array(
                'rule' => 'notempty',
                'message' => __l('Required') ,
                'allowEmpty' => false
            ) ,
            'subject' => array(
                'rule' => 'notempty',
                'message' => __l('Required') ,
                'allowEmpty' => false
            ) ,
            'send_to' => array(
                'rule1' => array(
                    'rule' => 'checkMultipleEmail',
                    'message' => __l('Must be a valid email') ,
                    'allowEmpty' => true
                )
            ),
			'specialty_id' => array(
                'rule' => 'notempty',
                'message' => __l('Required') ,
                'allowEmpty' => false
            ),
			'mobile_one_time_password' => array(
                'rule' => 'notempty',
                'message' => __l('Required') ,
                'allowEmpty' => false
            )
        );
        // filter options in admin index
        $this->isFilterOptions = array(
            ConstMoreAction::Inactive => __l('Inactive') ,
            ConstMoreAction::Active => __l('Active')
        );
        $this->moreActions = array(
            ConstMoreAction::Inactive => __l('Inactive') ,
            ConstMoreAction::Active => __l('Active') ,
            ConstMoreAction::Delete => __l('Delete') ,
            ConstMoreAction::Export => __l('Export')
        );
        $this->bulkMailOptions = array(
            1 => __l('All Users') ,
            2 => __l('Inactive Users') ,
            3 => __l('Active Users'),
            4 => __l('Male Users'),
            5 => __l('Female Users'),
            6 => __l('Facebook Users'),
            7 => __l('Gmail Users'),
            8 => __l('TwitterUsers'),
            9 => __l('Yahoo Users'),
            10 => __l('OpenID Users'),
        );
    }
    // check the new and confirm password
    public function _isPasswordSame($field1 = array() , $field2 = null, $field3 = null)
    {
        if ($this->data[$this->name][$field2] == $this->data[$this->name][$field3]) {
            return true;
        }
        return false;
    }
    // check the old password field with database
    public function _checkOldPassword($field1 = array() , $field2 = null)
    {
        $user = $this->find('first', array(
            'conditions' => array(
                'User.id' => $_SESSION['Auth']['User']['id']
            ) ,
            'recursive' => -1
        ));
        if (AuthComponent::password($this->data[$this->name][$field2]) == $user['User']['password']) {
            return true;
        }
        return false;
    }
	// generate random number
    public function getVerificationCode()
    {
          return rand(20000, 50000);
    }
    // hash for forgot password mail
    public function getResetPasswordHash($user_id = null)
    {
        return md5($user_id . '-' . date('y-m-d') . Configure::read('Security.salt'));
    }
    // check the forgot password hash
    public function isValidResetPasswordHash($user_id = null, $hash = null)
    {
        return (md5($user_id . '-' . date('y-m-d') . Configure::read('Security.salt')) == $hash);
    }
    // hash for activate mail
    public function getActivateHash($user_id = null)
    {
          return md5($user_id . '-' . Configure::read('Security.salt'));
    }
	// hash for resend activate mail
    function getResendActivateHash($user_id = null) 
    {
        return md5(Configure::read('Security.salt') . '-' . $user_id);
    }
    // check the activate mail
    public function isValidActivateHash($user_id = null, $hash = null)
    {
        return (md5($user_id . '-' . Configure::read('Security.salt')) == $hash);
    }        
    public function checkMultipleEmail()
    {
        $multipleEmails = explode(',', $this->data['User']['send_to']);
        foreach($multipleEmails as $key => $singleEmail) {
            if (!Validation::email(trim($singleEmail))) {
                return false;
            }
        }
        return true;
    }
    public function getUserIdHash($user_ids = null)
    {
        return md5($user_ids . Configure::read('Security.salt'));
    }
    public function isValidUserIdHash($user_ids = null, $hash = null)
    {
        return (md5($user_ids . Configure::read('Security.salt')) == $hash);
    }
    public function checkUsernameAvailable($username)
    {
		$username = str_replace(' ', '', $username);
		$username = str_replace('.', '_', $username);
        $user = $this->find('count', array(
            'conditions' => array(
                'User.username' => $username
            ) ,
            'recursive' => - 1
        ));
        if (!empty($user)) {
            return false;
        }
        return $username;
    }

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        $data = $this->data;
        if (empty($this->data)) {
            $data = $this->read();
        }
    }

    public function afterSave($created) {
		$user_id = $this->id;
		// Saving notifications during registerations //
        $notify = array();
         
    }
	public function getReceiverdata($foreign_id,$transaction_type,$payee_account)
    {
		$return['receiverEmail'] = array(
			$payee_account
		);
		$return['amount'] = array(
			Configure::read('user.signup_fee')
		);
		$return['pre_approval_key'] = '';
		$return['senderEmail'] = '';
		$return['receiverPrimaryArray'] = array();
		$return['receiverInvoiceIdArray'] = array(
			md5('SignupFee_' . date('YmdHis'))
		);
        return $return;
    }
}
?>