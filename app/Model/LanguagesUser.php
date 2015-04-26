<?php
class LanguagesUser extends AppModel {

	var $name = 'LanguagesUser';
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'User' => array('className' => 'User',
								'foreignKey' => 'user_id',
								'conditions' => '',
								'fields' => '',
								'order' => '',
			),
			'Language' => array('className' => 'Language',
								'foreignKey' => 'language_id',
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
			'language_id' => array('rule' => 'numeric', 
			 'allowEmpty' => false, 
			  'message' => __l('Required')
		)
		);

	}
}
?>