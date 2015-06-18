<?php
class SpecialtyDiseasesUser extends AppModel {

	var $name = 'SpecialtyDiseasesUser';
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'user_id',
								'conditions' => '',
								'fields' => '',
								'order' => '',
			),
			'SpecialtyDisease' => array('className' => 'SpecialtyDisease',
								'foreignKey' => 'specialty_disease_id',
								'conditions' => '',
								'fields' => '',
								'order' => '',
			)
	);


	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'user_id' => array('rule' => 'numeric', 
			 'allowEmpty' => false, 
			  'message' => __l('Required')
		),
			'specialty_disease_id' => array('rule' => 'numeric', 
			 'allowEmpty' => false, 
			  'message' => __l('Required')
		)
		);

	}
}
?>