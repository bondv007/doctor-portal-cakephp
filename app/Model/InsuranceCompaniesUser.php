<?php
class InsuranceCompaniesUser extends AppModel {

	public $name = 'InsuranceCompaniesUser';
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
		'InsuranceCompany' => array(
			'className' => 'InsuranceCompany',
			'foreignKey' => 'insurance_company_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'insurance_company_id' => array('rule' => 'numeric', 
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