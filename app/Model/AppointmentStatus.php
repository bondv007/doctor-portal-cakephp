<?php
class AppointmentStatus extends AppModel {

	public $name = 'AppointmentStatus';
	public $displayField = 'name';
	
	public $hasMany = array(
        'Appointment' => array(
            'className' => 'Appointment',
            'foreignKey' => 'appointment_status_id',
            'dependent' => false,
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
	 function __construct($id = false, $table = null, $ds = null) 
    {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'name' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
            )
        );
    }
}?>
