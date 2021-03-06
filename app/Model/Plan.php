<?php
class Plan extends AppModel {

	public $name = 'Plan';
	public $displayField = 'name';
	public $actsAs = array(
		'Sluggable' => array(
			'label' => array(
				'name'
			)
		),
	);
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $hasMany = array(
		'PlanUser' => array(
			'className' => 'PlanUser',
			'foreignKey' => 'plan_id',
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
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'name' => array(
				'rule' => 'notempty', 
				'allowEmpty' => false, 
				'message' => __l('Required')
			),
			'amount' => array(
				'rule' => 'numeric', 
				'allowEmpty' => false, 
				'message' => __l('Required')
			),
			'duration' => array(
				'rule' => 'numeric', 
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
	}
}
?>