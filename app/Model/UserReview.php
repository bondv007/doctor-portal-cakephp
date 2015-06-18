<?php
class UserReview extends AppModel 
{
	public $name = 'UserReview';
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'DoctorUser' => array(
			'className' => 'User',
			'foreignKey' => 'doctor_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),	
		'Ip' => array(
			'className' => 'Ip',
			'foreignKey' => 'ip_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);
	public $hasMany = array(
	    'UserRating' => array(
            'className' => 'UserRating',
            'foreignKey' => 'user_review_id',
            'dependent' => true,
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
		$this->BedsideMannerRate = array(
            '0' => '0' ,
            '1' => '1' ,
			'2' => '2' ,
			'3' => '3' ,
			'4' => '4' ,
			'5' => '5'  
        );
		$this->WaitTimeRate = array(
            '0' => '0' ,
            '1' => '1' ,
			'2' => '2' ,
			'3' => '3' ,
			'4' => '4' ,
			'5' => '5'  
        );
		$this->moreActions = array(
            ConstMoreAction::Delete => __l('Delete')
        );
	}
}
?>