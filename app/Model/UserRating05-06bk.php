<?php
class UserRating extends AppModel
{

	public $name = 'UserRating';
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
		'UserReview' => array(
			'className' => 'UserReview',
				'foreignKey' => 'user_review_id',
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'counterCache' => true
			),
		'UserRatingCategory' => array(
			'className' => 'UserRatingCategory',
			'foreignKey' => 'user_rating_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		),
		'Ip' => array(
			'className' => 'Ip',
			'foreignKey' => 'ip_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);
	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
	}
}
?>