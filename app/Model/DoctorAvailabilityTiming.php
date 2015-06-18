<?php
class DoctorAvailabilityTiming extends AppModel {

	public $belongsTo = array(
		'DoctorAvailability' => array(
			'className' => 'DoctorAvailability',
			'foreignKey' => 'doctor_availability_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public $hasMany = array(
		'Appointment' => array(
            'className' => 'Appointment',
            'foreignKey' => 'doctor_availability_timing_id',
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
	}	
}
