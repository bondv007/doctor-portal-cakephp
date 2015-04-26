<?php
class PaypalsController extends AppController
{
    public function process_payment($foreign_id,$transaction_type)
    {
		$return = $this->Paypal->processPayment($foreign_id,$transaction_type);
		if (!empty($return)) {
			return $return;
		}
		$this->autoRender = false;
    }
    function process_connect($foreign_id, $amount, $transaction_type = null)
    {
        $PaypalPlatform = $this->Paypal->_getPaypalPlatformObject();
        $currencyCode = Configure::read('site.currency_code');
        $startingDate = date('c');
        $endingDate = date('c', strtotime('+1 year'));
        $maxTotalAmountOfAllPayments = $amount;
        $senderEmail = '';
        $maxNumberOfPayments = 2;
        $paymentPeriod = '';
        $dateOfMonth = '';
        $dayOfWeek = '';
        $maxAmountPerPayment = '';
        $maxNumberOfPaymentsPerPeriod = '';
        $pinType = '';
        $cancelUrl = Router::url('/', true) . 'paypals/cancel_payment/' . $foreign_id . '/' . $transaction_type;
        $returnUrl = Router::url('/', true) . 'paypals/success_payment/' . $foreign_id . '/' . $transaction_type;
        $ipnNotificationUrl = Router::url('/', true) . 'paypals/process_ipn/' . $foreign_id . '/' . $transaction_type;
        $resArray = $PaypalPlatform->CallPreapproval($returnUrl, $cancelUrl, $currencyCode, $startingDate, $endingDate, $maxTotalAmountOfAllPayments, $senderEmail, $maxNumberOfPayments, $paymentPeriod, $dateOfMonth, $dayOfWeek, $maxAmountPerPayment, $maxNumberOfPaymentsPerPeriod, $pinType, $ipnNotificationUrl);
        $ack = strtoupper($resArray['responseEnvelope.ack']);
        if ($ack == 'SUCCESS') {
            App::import('Model','Contests.Contest');
            $obj = new Contest();
			$data['pre_approval_key'] = $resArray["preapprovalKey"];
			$data['id'] = $foreign_id;
			$obj->save($data, false);
            $cmd = 'cmd=_ap-preapproval&preapprovalkey=' . urldecode($resArray['preapprovalKey']);
            $this->Paypal->CustomizePaymentPage($resArray['preapprovalKey']);
            $PaypalPlatform->RedirectToPayPal($cmd, false);
            $return['success'] = 1;
        } else {
            //Display a user friendly Error on the page using any of the following error information returned by PayPal
            //TODO - There can be more than 1 error, so check for 'error(1).errorId', then 'error(2).errorId', and so on until you find no more errors.
            $ErrorCode = urldecode($resArray['error(0).errorId']);
            $ErrorMsg = urldecode($resArray['error(0).message']);
            $ErrorDomain = urldecode($resArray['error(0).domain']);
            $ErrorSeverity = urldecode($resArray['error(0).severity']);
            $ErrorCategory = urldecode($resArray['error(0).category']);
            $return['error_message'] = $ErrorMsg;
            $return['error'] = 1;
        }
         return $return;
    }
	public function process_ipn($foreign_id, $transaction_type)
	{
        $this->_processPayment($foreign_id, $transaction_type);
		$this->autoRender = false;
	}
    public function success_payment($foreign_id, $transaction_type)
    {
        $redirect = $this->_processPayment($foreign_id, $transaction_type);
        $this->redirect($redirect);
    }
	public function _processPayment($foreign_id, $transaction_type)
	{
		switch ($transaction_type) {
            case ConstPaymentType::ContestFee:
                App::import('Model','Contests.Contest');
				$this->Contest = new Contest();
				$contest = $this->Contest->find('first', array(
					'conditions'=>array(
						'Contest.id' => $foreign_id
					) ,
					'recursive' => -1
				));
				$PaypalPlatform = $this->Paypal->_getPaypalPlatformObject();
				$preApproval = $PaypalPlatform->CallPreapprovalDetails($contest['Contest']['pre_approval_key']);
				if (!empty($preApproval['approved']) && $preApproval['approved'] == 'true' && strtoupper($preApproval['status']) == 'ACTIVE') {
					$return = $this->process_payment($foreign_id, $transaction_type);
					if (!empty($return['success'])) {
						if (Configure::read('contest.is_auto_approve')) {
							$this->Session->setFlash(__l('You have paid contest fee successfully. Now your contest has been opened') , 'default', null, 'success');
							$this->Contest->updateStatus(ConstContestStatus::Open, $foreign_id, ConstPaymentGateways::PayPal);
						} else {
							$this->Session->setFlash(__l('You have paid contest fee successfully. Your contest will be opened after admin approval'), 'default', null, 'success');
							$this->Contest->updateStatus(ConstContestStatus::PendingApproval, $foreign_id, ConstPaymentGateways::PayPal);
						}
					}
				} elseif (!empty($preApproval['approved']) && $preApproval['approved'] == 'true' && (strtoupper($preApproval['status']) == 'CANCELED' || strtoupper($preApproval['status']) == 'REFUNDED') && $contest['Contest']['contest_status_id'] != ConstContestStatus::CanceledByAdmin && $contest['Contest']['contest_status_id'] != ConstContestStatus::Rejected) {
					$this->Contest->updateStatus(ConstContestStatus::CanceledByAdmin, $foreign_id);
				}
                $redirect = Router::url(array(
                    'controller' => 'contests',
                    'action' => 'browse',
                    'admin' => false,
                ) , true);
                break;
            case ConstPaymentType::SignupFee:
				$this->Paypal->_saveIPNLog();
				$this->loadModel('Payment');
				$this->loadModel('User');
				$user = $this->User->find('first', array(
					'conditions' => array(
						'User.id' => $foreign_id,
					) ,
					'recursive' => - 1,
				));
				$paymentDetails = $this->Paypal->getPaymentDetails($user['User']['pay_key']);
				if (!empty($paymentDetails['status']) && $paymentDetails['status'] == 'COMPLETED') {
					if ($this->Payment->processUserSignupPayment($foreign_id, ConstPaymentGateways::PayPal)) {
						if (Configure::read('user.is_admin_activate_after_register')) {
							$this->Session->setFlash(__l('You have paid membership fee successfully, will be activated once administrator approved') , 'default', null, 'success');
						} else {
							$this->Session->setFlash(sprintf(__l('You have paid membership fee successfully. Now you can login with your %s after verified your email') , Configure::read('user.using_to_login')) , 'default', null, 'success');
						}
						$this->Paypal->_savePaidLog($foreign_id, $paymentDetails, 'User', 1);
					}
				}
                $redirect = Router::url(array(
                    'controller' => 'users',
                    'action' => 'login',
                    'admin' => false
                ) , true);
                break;
        }
		return $redirect;
	}
    public function cancel_payment($contest_id, $transaction_type)
    {
        $this->Session->setFlash(__l('Payment Failed. Please, try again') , 'default', null, 'error');
        switch ($transaction_type) {
            case 'contest_fee':
                $redirect = Router::url(array(
                    'controller' => 'contests',
                    'action' => 'contest_payment',
                    $contest_id
                ) , true);
                break;

            case 'signup_fee':
                $redirect = Router::url(array(
                    'controller' => 'users',
                    'action' => 'register',
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