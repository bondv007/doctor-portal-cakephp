<?php
class PlanUser extends AppModel {

	var $name = 'PlanUser';
	//$validate set in __construct for multi-language support
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'User' => array('className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		),
		'Plan' => array('className' => 'Plan',
			'foreignKey' => 'plan_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		)
	);


	function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'user_id' => array('rule' => 'numeric', 
			 'allowEmpty' => false, 
			  'message' => __l('Required')
		),
			'duration' => array('rule' => 'numeric', 
			 'allowEmpty' => false, 
			  'message' => __l('Required')
		),
			'status' => array('rule' => 'numeric', 
			 'allowEmpty' => false, 
			  'message' => __l('Required')
		)
		);
		$this->moreActions = array(
            ConstMoreAction::Delete => __l('Delete')
        );
	}
	
	function update_plan_status() 
	{
		$conditions['PlanUser.is_expired '] = 0;
		$plan_users = $this->find('all', array(
            'conditions' => $conditions,
			'contain' => array(
				'User' => array(
					'fields' => array(
						'User.username',
						'User.email'
					)
				),
				'Plan',
			),
            'recursive' => 1,
        ));
		foreach($plan_users as $plan_user) {
			$this->updateAll(array(
					'PlanUser.is_expired' => 1
				) , array(
					'TO_DAYS(NOW()) - TO_DAYS(PlanUser.expiry_date) >=' => $plan_user['PlanUser']['duration']
			 ));
			 $emailFindReplace = array(
                    '##PLAN_NAME##' => $plan_user['Plan']['name'],
                    '##USERNAME##' => $plan_user['User']['username'],
                );
            $this->PlanUser->_sendEmail('Plan Expiry alert mail to User', $emailFindReplace, $plan_user['User']['email']);
		}
	}
}
?>