<?php
class Question extends AppModel
{
	public $name = 'Question';
	public $actsAs = array(
		'Sluggable' => array(
			'label' => array(
				'question'
			)
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'Specialty' => array(
            'className' => 'Specialty',
            'foreignKey' => 'specialty_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ) 
	);
	public $hasOne = array(
		'Answer' => array(
			'className' => 'Answer',
			'foreignKey' => 'question_id',
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
			'question' => array(
				'rule' => 'notempty', 
				'allowEmpty' => false, 
				'message' => __l('Required')
			),
			'specialty_id' => array(
                'rule1' => array(
                    'rule' => 'notempty',
                    'message' => __l('Required')
                )
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