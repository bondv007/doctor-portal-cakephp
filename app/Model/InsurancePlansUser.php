<?php
class InsurancePlansUser extends AppModel {

	var $name = 'InsurancePlansUser';
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'InsurancePlan' => array('className' => 'InsurancePlan',
								'foreignKey' => 'insurance_plan_id',
								'conditions' => '',
								'fields' => '',
								'order' => '',
			),
			'User' => array('className' => 'User',
								'foreignKey' => 'user_id',
								'conditions' => '',
								'fields' => '',
								'order' => '',
			)
	);


	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'insurance_plan_id' => array('rule' => 'numeric', 
			 'allowEmpty' => false, 
			  'message' => __l('Required')
		),
			'user_id' => array('rule' => 'numeric', 
			 'allowEmpty' => false, 
			  'message' => __l('Required')
		)
		);

	}
}
?>