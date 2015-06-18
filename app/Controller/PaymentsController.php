<?php
class PaymentsController extends AppController
{
    public $name = 'Payments';
    public $uses = array(
        'Payment',
        'PaypalAccount',
        'PaymentGateway'
    );
    public function beforeFilter()
    {
        $this->Security->disabledFields = array(
            'Payment.connect',
            'Payment.standard_connect',
            'Payment.normal',
            'Payment.payment_type',
            'Payment.payment_gateway_id',
        );
        parent::beforeFilter();
    }
    public function get_gateways()
    {
        if (!empty($this->request->params['named']['type'])) {
            $type = $this->request->params['named']['type'];
            $gateway_types = $this->Payment->getGatewayTypes($type);
        } else {
            $gateway_types = $this->Payment->getGatewayTypes();
        }
		if (isPluginEnabled('PaypalStandard') && !empty($gateway_types[ConstPaymentGateways::PayPalStandard])) {
			$this->request->data[$this->request->params['named']['model']]['payment_gateway_id'] = ConstPaymentGateways::PayPalStandard;
		} 
		$this->set('model', $this->request->params['named']['model']);
        $this->set('gateway_types', $gateway_types);
		if ($this->Auth->user('id')) {
			$this->loadModel('User');
			$user = $this->User->find('first', array(
				'conditions' => array(
					'User.id' => $this->Auth->user('id')
				) ,
				'recursive' => -1
			));
			$this->set('user', $user);
		}
    }
    public function membership_pay_now($user_id = null, $hash = null)
    {
      $this->pageTitle = __l('Pay Now');
         App::import('Model', 'User');
         $this->User = new User();
        if (!empty($this->request->data['User']['id'])) {
            $user_id = $this->request->data['User']['id'];
        }
        if (is_null($user_id) or is_null($hash)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->User->isValidActivateHash($user_id, $hash)) {
              $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.id = ' => $user_id,
                      ) ,
                'recursive' => - 1,
            ));
           if (!empty($user['User']['is_paid'])) {
           $this->Session->setFlash(__l('You have already paid the membership fee') , 'default', null, 'success');
           $this->redirect(array(
                        'controller' => 'users',
                        'action' => 'login'
                    ));
            }
            $this->pageTitle = __l('Pay Membership Fee - ') . $user['User']['username'];
            $total_amount = Configure::read('user.signup_fee');
            $total_amount = round($total_amount, 2);
            if (!empty($this->request->data)) {
				if(empty($this->request->data['User']['payment_gateway_id'])){
					$this->Session->setFlash(__l('Please select the payment type') , 'default', null, 'error');
				}
				else{
                 $PaymentGateway = $this->PaymentGateway->find('first', array(
                    'conditions' => array(
                        'PaymentGateway.id' => $this->request->data['User']['payment_gateway_id']
                    ) ,
                    'recursive' => - 1
                ));
                if ($PaymentGateway['PaymentGateway']['id'] == ConstPaymentGateways::PayPal) {
					$return = $this->requestAction(array(
						'controller' => strtolower($PaymentGateway['PaymentGateway']['name']) . 's',
						'action' => 'process_payment',
						$this->request->data['User']['id'],
                        ConstPaymentType::PlanFee
					));
				} elseif ($PaymentGateway['PaymentGateway']['id'] == ConstPaymentGateways::PayPalStandard) {
					$this->response->body($this->requestAction(array(
						'controller' => strtolower(Inflector::slug($PaymentGateway['PaymentGateway']['name'])) . 's',
						'action' => 'do_payment',
						$this->request->data['User']['id'],
                        $total_amount,
                        ConstPaymentType::PlanFee
					) , array(
						'return',
						'bare' => false
					)));
					$this->response->send();
					$this->_stop();
				} else {
						$return = $this->requestAction(array(
						'plugin' => Inflector::camelize($PaymentGateway['PaymentGateway']['name']) ,
						'controller' => strtolower($PaymentGateway['PaymentGateway']['name']) . 's',
						'action' => 'process_payment',
						$this->request->data['User']['id'],
                        $total_amount,
                        ConstPaymentType::PlanFee,
						'admin' => false
					));
				}
               if (!empty($return['error'])) {
                    $return['error_message'].= '. ';
                    $this->Session->setFlash($return['error_message'] . __l('Your payment could not be completed.') , 'default', null, 'error');
                }
			}
            } else {
                $this->request->data = $user;
            }
            $this->set('total_amount', $total_amount);
            $this->set('user', $user);
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
	public function upgrade_plan_pay_now($user_id = null,$plan_id = null)
    {
		$this->pageTitle = __l('Pay Now');
        App::import('Model', 'User');
        $this->User = new User();
		App::import('Model', 'Plan');
        $this->Plan = new Plan();
		App::import('Model', 'PlanUser');
        $this->PlanUser = new PlanUser();
		if (!empty($this->request->data['User']['id'])) {
            $user_id = $this->request->data['User']['id'];
        }
		if (is_null($user_id) or is_null($plan_id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if (!empty($user_id) and !empty($plan_id)) {
           $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.id = ' => $user_id,
                      ) ,
                'recursive' => - 1,
           ));
		   $plan = $this->Plan->find('first', array(
					'conditions' => array(
						'Plan.id = ' => $plan_id,
						  ) ,
					'recursive' => - 1,
		   ));
		   $planuser = $this->PlanUser->find('first', array(
					'conditions' => array(
						'PlanUser.plan_id = ' => $plan_id,
						'PlanUser.user_id = ' => $user_id
						  ) ,
					'recursive' => - 1,
		   ));
           if (!empty($planuser['PlanUser']['is_paid'])) {
			   $this->Session->setFlash(__l('You have already update that plan. If you want upgrade the plan, you can continue the payment.') , 'default', null, 'success');
            }
            $this->pageTitle = __l('Pay Plan for - ') . $plan['Plan']['name'] . ' Plan';
            $total_amount = $plan['Plan']['amount'];
            $total_amount = round($total_amount, 2);
            if (!empty($this->request->data)) {
				if(empty($this->request->data['User']['payment_gateway_id'])){
					$this->Session->setFlash(__l('Please select the payment type') , 'default', null, 'error');
				}
				else{
                 $PaymentGateway = $this->PaymentGateway->find('first', array(
                    'conditions' => array(
                        'PaymentGateway.id' => $this->request->data['User']['payment_gateway_id']
                    ) ,
                    'recursive' => - 1
                ));
                if ($PaymentGateway['PaymentGateway']['id'] == ConstPaymentGateways::PayPalStandard) {
					$this->response->body($this->requestAction(array(
						'controller' => strtolower(Inflector::slug($PaymentGateway['PaymentGateway']['name'])) . 's',
						'action' => 'do_payment',
						$this->request->data['User']['id'],
                        $plan_id,
						$total_amount,
						ConstPaymentType::PlanFee,
					) , array(
						'return',
						'bare' => false
					)));
					$this->response->send();
					$this->_stop();
				} else {
						$return = $this->requestAction(array(
						'plugin' => Inflector::camelize($PaymentGateway['PaymentGateway']['name']) ,
						'controller' => strtolower($PaymentGateway['PaymentGateway']['name']) . 's',
						'action' => 'process_payment',
						$this->request->data['User']['id'],
                        $total_amount,
						ConstPaymentType::PlanFee,
						'admin' => false
					));
				}
               if (!empty($return['error'])) {
                    $return['error_message'].= '. ';
                    $this->Session->setFlash($return['error_message'] . __l('Your payment could not be completed.') , 'default', null, 'error');
                }
			}
            } else {
                $this->request->data = $user;
            }
            $this->set('total_amount', $total_amount);
            $this->set('user', $user);
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
}
?>