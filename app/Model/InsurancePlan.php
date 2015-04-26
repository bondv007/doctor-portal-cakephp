<?php
class InsurancePlan extends AppModel
{
	public $name = 'InsurancePlan';
	public $displayField = 'name';
	public $actsAs = array(
		'Sluggable' => array(
			'label' => array(
				'name'
			)
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
		'InsuranceCompany' => array(
			'className' => 'InsuranceCompany',
			'foreignKey' => 'insurance_company_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		)
	);
	public $hasAndBelongsToMany = array(
		'User' => array(
		    'className' => 'User',
			'joinTable' => 'insurance_plans_users',
			'foreignKey' => 'insurance_plan_id',
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
            '-1' => __l('I\'ll choose my plan later')
        );
	}
}
?>