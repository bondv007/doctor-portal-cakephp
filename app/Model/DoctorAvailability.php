<?php
class DoctorAvailability extends AppModel {

	public $name = 'DoctorAvailability';
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);
	public $hasMany = array(
		'DoctorAvailabilityTiming' => array(
            'className' => 'DoctorAvailabilityTiming',
            'foreignKey' => 'doctor_availability_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ) 
    );
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'clinic_id' => array(
				'rule' => 'numeric', 
				'allowEmpty' => false, 
				'message' => __l('Required')
			),
			'assistant_info' => array(
				'rule' => 'notempty', 
				'allowEmpty' => false, 
				'message' => __l('Required')
			)
		);
		$this->monthLists = array(
				'01' => __l('January') ,
				'02' => __l('February') ,
				'03' => __l('March'),
				'04' => __l('April'),
				'05' => __l('May'),
				'06' => __l('June'),
				'07' => __l('July'),
				'08' => __l('August'),
				'09' => __l('September'),
				'10' => __l('October'),
				'11' => __l('November'),
				'12' => __l('December')
		);
		$this->yearLists = array(
				'2014' => __l('2014') ,
				'2015' => __l('2015'),
				'2015' => __l('2015') 
		);		
	}
	/*function _isValidAppointmentEndStartDate()
    {
        // Verify equal dates
        // Verify appointment exp time > appointment start date
	   if (date('Y-m-d', strtotime($this->request->data['DoctorAvailability']['appointment_start_time'])) == date('Y-m-d', strtotime($this->request->data['DoctorAvailability']['appointment_end_time']))) {
			if (date('Y-m-d', strtotime($this->request->data['DoctorAvailability']['appointment_start_time'])) >= date('Y-m-d', strtotime($this->request->data['DoctorAvailability']['start_date']))) {
				return true;
			}
		}
      return false;
    }
	function _isValidDoctorEndStartDate()
    {
        if (strtotime($this->request->data[$this->name]['appointment_start_time']) > strtotime($this->request->data[$this->name]['start_date'])) {
            return true;
        }
        return false;
    }
	function _isValidExpiryStartDate()
    {
        if (strtotime($this->data[$this->name]['appointment_end_time']) > strtotime($this->data[$this->name]['appointment_start_time'])) {
            return true;
        }
        return false;
    }
	function _isValidStartDate()
    {
		if (strtotime($this->request->data[$this->name]['start_date']) >= strtotime(date('Y-m-d H:i:s'))) {
			return true;
		}
        return false;
    }
	function _isValidEndDate()
    {
        if (strtotime($this->request->data[$this->name]['end_date']) > strtotime($this->request->data[$this->name]['start_date'])) {
            return true;
        }
        return false;
    }*/
}
?>