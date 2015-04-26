<?php
class Specialty extends AppModel
{
	public $name = 'Specialty';
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
		'SpecialtyDisease' => array(
			'className' => 'SpecialtyDisease',
			'foreignKey' => 'specialty_id',
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
			'joinTable' => 'specialties_users',
			'foreignKey' => 'specialty_id',
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