<?php
class PaypalStandardsController extends AppController
{
    public $helpers = array(
        'PaypalStandard.Gateway',
    );
	public $components = array(
        'Paypal',
    );
    public function do_payment($foreign_id, $plan_id,$amount, $transaction_type)
    {
		$this->pageTitle = __l('Redirecting to PayPal');
        App::uses('PaymentGateway', 'Model');
        $this->PaymentGateway = new PaymentGateway();
        $paymentGateway = $this->PaymentGateway->find('first', array(
            'conditions' => array(
                'PaymentGateway.id' => ConstPaymentGateways::PayPalStandard,
            ) ,
            'contain' => array(
                'PaymentGatewaySetting' => array(
                    'fields' => array(
                        'PaymentGatewaySetting.key',
                        'PaymentGatewaySetting.test_mode_value',
                        'PaymentGatewaySetting.live_mode_value',
                    ) ,
                ) ,
            ) ,
            'recursive' => 1
        ));
        if (!empty($paymentGateway['PaymentGatewaySetting'])) {
            foreach($paymentGateway['PaymentGatewaySetting'] as $paymentGatewaySetting) {
                $gateway_settings[$paymentGatewaySetting['key']] = $paymentGateway['PaymentGateway']['is_test_mode'] ? $paymentGatewaySetting['test_mode_value'] : $paymentGatewaySetting['live_mode_value'];
            }
        }
		if ($transaction_type == ConstPaymentType::PlanFee) {
			$item_name = __l('Upgrade Plan');
		}  
        Configure::write('paypal.account', $gateway_settings['payee_account']);
       /* App::import('Model', 'Paypal.Paypal');
        $this->Paypal = new Paypal();
		if (!empty($gateway_settings['receiver_emails'])) {
            $this->Paypal->paypal_receiver_emails = $paymentGateway['PaymentGateway']['is_test_mode'] ? $gateway_settings['receiver_emails']['test_mode_value'] : $gateway_settings['receiver_emails']['live_mode_value'];
        }*/
        Configure::write('paypal.is_testmode', $paymentGateway['PaymentGateway']['is_test_mode']);
        $cmd = '_xclick';
        $gateway_options = array(
            'cmd' => $cmd,
            'notify_url' => Router::url('/', true) . 'paypal_standards/process_payment/' . $transaction_type,
            'cancel_return' => Router::url('/', true) . 'paypal_standards/cancel_payment/' . $foreign_id . '/' . $transaction_type,
            'return' => Router::url('/', true) . 'paypal_standards/success_payment/' . $transaction_type,
            'item_name' => $item_name,
            'currency_code' => Configure::read('paypal.currency_code') ,
            'amount' => $amount,
            'user_defined' => array(
                'user_id' => $foreign_id ,
                'plan_id' => $plan_id,
                'transaction_type' => $transaction_type,
                'ip' => $this->RequestHandler->getClientIP()
            )
        );
		$this->log('Gateway Options');
		$this->log($gateway_options);
        $action = strtolower(str_replace(' ', '', $paymentGateway['PaymentGateway']['name']));
        $this->set('action', $action);
        $this->set('gateway_options', $gateway_options);
    }
    public function process_payment($transaction_type)
    {
		App::import('Model', 'PaymentGateway');
        $this->PaymentGateway = new PaymentGateway();
        $paymentGateway = $this->PaymentGateway->find('first', array(
            'conditions' => array(
                'PaymentGateway.id' => ConstPaymentGateways::PayPalStandard
            ) ,
            'contain' => array(
                'PaymentGatewaySetting' => array(
                    'fields' => array(
                        'PaymentGatewaySetting.key',
                        'PaymentGatewaySetting.test_mode_value',
                        'PaymentGatewaySetting.live_mode_value',
                    )
                )
            ) ,
            'recursive' => 1
        ));
        $this->Paypal->initialize($this);
        if (!empty($paymentGateway['PaymentGatewaySetting'])) {
            foreach($paymentGateway['PaymentGatewaySetting'] as $paymentGatewaySetting) {
                if ($paymentGatewaySetting['key'] == 'payee_account') {
                    $this->Paypal->payee_account = $paymentGateway['PaymentGateway']['is_test_mode'] ? $paymentGatewaySetting['test_mode_value'] : $paymentGatewaySetting['live_mode_value'];
                }
                if ($paymentGatewaySetting['key'] == 'receiver_emails') {
                    $this->Paypal->paypal_receiver_emails = $paymentGateway['PaymentGateway']['is_test_mode'] ? $paymentGatewaySetting['test_mode_value'] : $paymentGatewaySetting['live_mode_value'];
                }
            }
        }
        $this->Paypal->sanitizeServerVars($_POST);
		$this->log('Payment Response values');
		$this->log($_POST);
		$this->log('Transaction Type');
		$this->log($transaction_type);
		$this->Paypal->is_test_mode = $paymentGateway['PaymentGateway']['is_test_mode'];
		$this->Paypal->amount_for_item = !empty($this->Paypal->paypal_post_arr['amount']) ? $this->Paypal->paypal_post_arr['amount'] : 0;
		$this->Paypal->logPaypalTransactions();
		$this->log('paypal_post_arr');
		$this->log($this->Paypal->paypal_post_arr);
		//if ($this->Paypal->process()) {
			switch ($transaction_type) {
				case ConstPaymentType::PlanFee:
					$this->loadModel('Payment');
					$this->log('inside planfee');
					$this->Payment->processUserPlanPayment($this->Paypal->paypal_post_arr['user_id'],$this->Paypal->paypal_post_arr['plan_id'], ConstPaymentGateways::PayPalStandard);
					break;
			}
		//}
		$this->autoRender = false;
    }
    public function cancel_payment($foreign_id, $transaction_type)
    {
        $this->Session->setFlash(__l('Payment failed. Please, try again') , 'default', null, 'error');
		switch ($transaction_type) {
            case ConstPaymentType::PlanFee:
                $redirect = Router::url(array(
                    'controller' => 'plans',
                    'action' => 'index',
                ) , true);
                break;

            default:
                $redirect = Router::url('/');
                break;
        }
        $this->redirect($redirect);
    }
    public function success_payment($transaction_type)
    {
        $this->Session->setFlash(__l('Payment has been successfully completed.'), 'default', null, 'success');
        $this->log('Transaction Type');
		$this->log($transaction_type);
		switch ($transaction_type) {
            case ConstPaymentType::PlanFee:
                $redirect = Router::url(array(
                    'controller' => 'plans',
                    'action' => 'index',
                    'admin' => false
                ) , true);
				break;
            default:
                $redirect = Router::url('/');
                break;
        }
        $this->redirect($redirect);
    }
}
?>