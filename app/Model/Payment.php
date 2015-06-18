<?php
class Payment extends AppModel
{
    public $useTable = false;
	public function __construct($id = false, $table = null, $ds = null)
	{
		parent::__construct($id, $table, $ds);
	}
	public function processUserSignupPayment($user_id, $payment_gateway_id = null)
	{
		App::import('Model', 'User');
		$this->User = new User();
		$user = $this->User->find('first', array(
            'conditions' => array(
                'User.id = ' => $user_id,
            ) ,
            'recursive' => - 1,
        ));
		//Update Transaction
		if (empty($user['User']['is_paid'])) {
			$_Data['User']['id'] = $user['User']['id'];
			$_Data['User']['is_paid'] = 1; // waiting for confirmation
			$_Data['User']['is_active'] = (Configure::read('user.is_admin_activate_after_register')) ? 0 : 1;
			$this->User->save($_Data);
			if (Configure::read('user.is_email_verification_for_register')) {
				$this->_sendActivationMail($user['User']['email'], $user['User']['id'], $this->User->getActivateHash($user['User']['id']));
			}
        }
	}
	public function processUserPlanPayment($user_id, $plan_id, $payment_gateway_id = null)
	{
		$this->log('inside processUserPlanPayment');
		App::import('Model', 'PlanUser');
		$this->PlanUser = new PlanUser();
		App::import('Model', 'Plan');
		$this->Plan = new Plan();
		$planuser = $this->PlanUser->find('first', array(
            'conditions' => array(
                'PlanUser.user_id = ' => $user_id,
				'PlanUser.plan_id = ' => $plan_id
            ) ,
            'recursive' => - 1,
        ));
		$this->log('planuser');
		$this->log($planuser);
		$plan = $this->Plan->find('first', array(
            'conditions' => array(
				'Plan.id = ' => $plan_id
            ) ,
            'recursive' => - 1,
        ));
		$this->log('plan');
		$this->log($plan);
		// Create Transaction
		if(empty($planuser)){
			$this->log('add planuser start');
			$this->PlanUser->create();
			$current_date = date("Y-m-d");// current date
			$_Data['PlanUser']['user_id'] = $user_id;
			$_Data['PlanUser']['plan_id'] = $plan_id;
			$_Data['PlanUser']['is_paid'] = 1; // waiting for confirmation
			$duration = "+".$plan['Plan']['duration'].' '."days";
			$this->log('duration');
			$this->log($duration);
			$expiry_date = date('Y-m-d', strtotime("$duration", strtotime($current_date)));
			$this->log('expiry_date');
			$this->log($expiry_date);
			$_Data['PlanUser']['expiry_date'] = $expiry_date;
			$_Data['PlanUser']['duration'] = $plan['Plan']['duration'];
			$this->PlanUser->save($_Data);
			$this->log('add planuser end');
		}
	}
	public function _sendActivationMail($user_email, $user_id, $hash)
    {
       App::import('Model', 'User');
		$this->User = new User();
        $user = $this->User->find('first', array(
            'conditions' => array(
                'User.email' => $user_email
            ) ,
            'recursive' => -1
        ));
        $emailFindReplace = array(
            '##USERNAME##' => $user['User']['username'],
            '##ACTIVATION_URL##' => Router::url(array(
                'controller' => 'users',
                'action' => 'activation',
                $user_id,
                $hash
            ) , true) ,
        );
        $this->_sendEmail('Activation Request', $emailFindReplace, $user_email);
         }
}
?>