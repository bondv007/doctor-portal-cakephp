<?php
class Appointment extends AppModel {

	var $name = 'Appointment';
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		 ),
		 'DoctorUser' => array(
			'className' => 'User',
			'foreignKey' => 'doctor_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		 ),
		'SpecialtyDisease' => array(
			'className' => 'SpecialtyDisease',
			'foreignKey' => 'specialty_disease_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'InsuranceCompany' => array(
			'className' => 'InsuranceCompany',
			'foreignKey' => 'insurance_company_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'Gender' => array(
			'className' => 'Gender',
			'foreignKey' => 'gender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        ) ,
		'GuestGender' => array(
			'className' => 'Gender',
			'foreignKey' => 'guest_gender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
        ) ,
		'AppointmentStatus' => array(
            'className' => 'AppointmentStatus',
            'foreignKey' => 'appointment_status_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => true
        ) ,
		'DoctorAvailabilityTiming' => array(
            'className' => 'DoctorAvailabilityTiming',
            'foreignKey' => 'doctor_availability_timing_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ) ,
	);


	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'first_name' => array(
				'rule4' => array(
					'rule' => array(
						'between',
						3,
						30
					) ,
					'message' => __l('Must be between of 3 to 30 characters')
				) ,
				'rule3' => array(
					'rule' => 'alphaNumeric',
					'message' => __l('Must be a valid character')
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
			'last_name' => array(
				'rule4' => array(
					'rule' => array(
						'between',
						3,
						30
					) ,
					'message' => __l('Must be between of 3 to 30 characters')
				) ,
				'rule3' => array(
					'rule' => 'alphaNumeric',
					'message' => __l('Must be a valid character')
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
			'dob' => array(
				'rule3' => array(
					'rule' => '_isValidDob',
					'message' => __l('Must be a valid date')
				) ,
				'rule2' => array(
					'rule' => 'date',
					'message' => __l('Must be a valid date')
				) ,
				'rule1' => array(
					'rule' => 'notempty',
					'message' => __l('Required')
				)
			 ),
			 'email' => array(
                'rule3' => array(
                    'rule' => 'isUnique',
                    'on' => 'create',
                    'message' => __l('Email address is already exist')
                ) ,
                'rule2' => array(
                    'rule' => 'email',
                    'message' => __l('Must be a valid email')
                ) ,
                'rule1' => array(
                    'rule' => 'notempty',
                    'message' => __l('Required')
                )
            ),
			'gender_id' => array(
                'rule1' => array(
                    'rule' => 'notempty',
                    'message' => __l('Required')
                )
            )   
		);
		$this->moreActions = array(
            ConstMoreAction::Delete => __l('Delete')
        );
	}
	public function _isValidDob()
    {
        return Date('Y') . '-' . Date('m') . '-' . Date('d') >= $this->data[$this->name]['dob'];
    }
}
?>