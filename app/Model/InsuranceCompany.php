<?php
class InsuranceCompany extends AppModel
{
	public $name = 'InsuranceCompany';
	public $displayField = 'name';
	public $actsAs = array(
		'Sluggable' => array(
			'label' => array(
				'name'
			)
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasMany = array(
		'InsurancePlan' => array(
			'className' => 'InsurancePlan',
			'foreignKey' => 'insurance_company_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Appointment' => array(
			'className' => 'Appointment',
			'foreignKey' => 'insurance_company_id',
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
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'insurance_companies_users',
			'foreignKey' => 'insurance_company_id',
			'associationForeignKey' => 'user_id',
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
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'name' => array(
				'rule' => 'notempty', 
				'allowEmpty' => false, 
				'message' => __l('Required')
			),
			'is_active' => array(
				'rule' => 'numeric', 
			    'allowEmpty' => false, 
			    'message' => __l('Required')
			)
		);
		$this->moreActions = array(
            ConstMoreAction::Inactive => __l('Inactive') ,
            ConstMoreAction::Active => __l('Active') ,
            ConstMoreAction::Delete => __l('Delete')
        );
        $this->isFilterOptions = array(
            ConstMoreAction::Inactive => __l('Inactive') ,
            ConstMoreAction::Active => __l('Active')
        );
		$this->searchOptions = array(
            '-1' => __l('I\'ll choose my insurance later') ,
            '-2' => __l('I\'m paying for myself')
        );
	}
}
?>