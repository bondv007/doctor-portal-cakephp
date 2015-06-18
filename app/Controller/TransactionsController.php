<?php
class TransactionsController extends AppController
{
    public $name = 'Transactions';
    public $uses = array(
        'Transaction',
    );
	public $helpers = array(
        'Csv'
    );
    public function beforeFilter()
    {
        $this->Security->disabledFields = array(
            'Transaction.from_date',
            'Transaction.to_date',
            'Transaction.user_id',
            'User.username',
        );
        parent::beforeFilter();
    }
    public function index()
    {
        $this->pageTitle = __l('My Transactions');
        $conditions['Transaction.user_id'] = $this->Auth->user('id');
        $blocked_conditions['UserCashWithdrawal.user_id'] = $this->Auth->user('id');
        if (isset($this->request->data['Transaction']['from_date']) and isset($this->request->data['Transaction']['to_date'])) {
            $from_date = $this->request->data['Transaction']['from_date']['year'] . '-' . $this->request->data['Transaction']['from_date']['month'] . '-' . $this->request->data['Transaction']['from_date']['day'] . ' 00:00:00';
            $to_date = $this->request->data['Transaction']['to_date']['year'] . '-' . $this->request->data['Transaction']['to_date']['month'] . '-' . $this->request->data['Transaction']['to_date']['day'] . ' 23:59:59';
        }
        if (!empty($this->request->data)) {
            if ($from_date < $to_date) {
                $blocked_conditions['UserCashWithdrawal.created >='] = $conditions['Transaction.created >='] = $from_date;
                $blocked_conditions['UserCashWithdrawal.created <='] = $conditions['Transaction.created <='] = $to_date;
            } else {
                $this->Session->setFlash(__l('From date should greater than To date. Please, try again.') , 'default', null, 'error');
            }
        }
        if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'day') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(Transaction.created) <= '] = 0;
            $blocked_conditions['TO_DAYS(NOW()) - TO_DAYS(UserCashWithdrawal.created) <= '] = 0;
            $this->pageTitle.= __l(' - Amount Earned today');
            $this->request->data['Transaction']['from_date'] = array(
                'year' => date('Y', strtotime('today')) ,
                'month' => date('m', strtotime('today')) ,
                'day' => date('d', strtotime('today'))
            );
            $this->request->data['Transaction']['to_date'] = array(
                'year' => date('Y', strtotime('today')) ,
                'month' => date('m', strtotime('today')) ,
                'day' => date('d', strtotime('today'))
            );
        }
        if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'week') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(Transaction.created) <= '] = 7;
            $blocked_conditions['TO_DAYS(NOW()) - TO_DAYS(UserCashWithdrawal.created) <= '] = 7;
            $this->pageTitle.= __l(' - Amount Earned in this week');
            $this->request->data['Transaction']['from_date'] = array(
                'year' => date('Y', strtotime('last week')) ,
                'month' => date('m', strtotime('last week')) ,
                'day' => date('d', strtotime('last week'))
            );
            $this->request->data['Transaction']['to_date'] = array(
                'year' => date('Y', strtotime('this week')) ,
                'month' => date('m', strtotime('this week')) ,
                'day' => date('d', strtotime('this week'))
            );
        }
        if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'month') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(Transaction.created) <= '] = 30;
            $blocked_conditions['TO_DAYS(NOW()) - TO_DAYS(UserCashWithdrawal.created) <= '] = 30;
            $this->pageTitle.= __l(' - Amount Earned in this month');
            $this->request->data['Transaction']['from_date'] = array(
                'year' => date('Y', (strtotime('last month', strtotime(date('m/01/y'))))) ,
                'month' => date('m', (strtotime('last month', strtotime(date('m/01/y'))))) ,
                'day' => date('d', (strtotime('last month', strtotime(date('m/01/y')))))
            );
            $this->request->data['Transaction']['to_date'] = array(
                'year' => date('Y', (strtotime('this month', strtotime(date('m/01/y'))))) ,
                'month' => date('m', (strtotime('this month', strtotime(date('m/01/y'))))) ,
                'day' => date('d', (strtotime('this month', strtotime(date('m/01/y')))))
            );
        }
        $this->paginate = array(
            'conditions' => $conditions,
            'contain' => array(
                'TransactionType',
                'User'
            ) ,
            'order' => array(
                'Transaction.id' => 'desc'
            ) ,
            'recursive' => 2
        );
        $transactions = $this->paginate();
        $this->set('transactions', $transactions);
        // To get commission percentage
        $credit = $this->Transaction->find('first', array(
            'conditions' => array(
                $conditions,
                'TransactionType.is_credit' => 1
            ) ,
            'fields' => array(
                'SUM(Transaction.amount) as total_amount'
            ) ,
            'group' => array(
                'Transaction.user_id'
            ) ,
            'recursive' => 0
        ));
        $this->set('total_credit_amount', !empty($credit[0]['total_amount']) ? $credit[0]['total_amount'] : 0);
        $debit = $this->Transaction->find('first', array(
            'conditions' => array(
                $conditions,
                'TransactionType.is_credit' => 0
            ) ,
            'fields' => array(
                'SUM(Transaction.amount) as total_amount'
            ) ,
            'group' => array(
                'Transaction.user_id'
            ) ,
            'recursive' => 0
        ));
        $from = $this->Transaction->find('first', array(
            'conditions' => $conditions,
            'fields' => array(
                'Transaction.created'
            ) ,
            'limit' => 1,
            'recursive' => -1
        ));
        $to = $this->Transaction->find('first', array(
            'conditions' => $conditions,
            'fields' => array(
                'Transaction.created'
            ) ,
            'limit' => 1,
            'order' => array(
                'Transaction.id desc'
            ) ,
            'recursive' => -1
        ));
        $this->set('duration_from', $from['Transaction']['created']);
        $this->set('duration_to', $to['Transaction']['created']);
        $this->set('total_debit_amount', !empty($debit[0]['total_amount']) ? $debit[0]['total_amount'] : 0);
        $filter = array(
            'all' => __l('All') ,
            'day' => __l('Today') ,
            'week' => __l('This Week') ,
            'month' => __l('This Month') ,
            'custom' => __l('Custom') ,
        );
        if ($this->RequestHandler->isAjax()) {
            $this->set('isAjax', true);
        } else {
            $this->set('isAjax', false);
        }
        $this->set('filter', $filter);
    }
    public function admin_index()
    {      
			$this->pageTitle = __l('Transactions');
            $conditions = array();
            $post = 1;
            if (!empty($this->request->data['Transaction']['user_id'])) {
                $this->request->params['named']['user_id'] = $this->request->data['Transaction']['user_id'];
            }
            if (!empty($this->request->data['Transaction']['from_date']['year']) && !empty($this->request->data['Transaction']['from_date']['month']) && !empty($this->request->data['Transaction']['from_date']['day'])) {
                $this->request->params['named']['from_date'] = $this->request->data['Transaction']['from_date']['year'] . '-' . $this->request->data['Transaction']['from_date']['month'] . '-' . $this->request->data['Transaction']['from_date']['day'] . ' 00:00:00';
            }
            if (!empty($this->request->data['Transaction']['to_date']['year']) && !empty($this->request->data['Transaction']['to_date']['month']) && !empty($this->request->data['Transaction']['to_date']['day'])) {
                $this->request->params['named']['to_date'] = $this->request->data['Transaction']['to_date']['year'] . '-' . $this->request->data['Transaction']['to_date']['month'] . '-' . $this->request->data['Transaction']['to_date']['day'] . ' 23:59:59';
            }
            $param_string = "";
            $param_string.= !empty($this->request->params['named']['user_id']) ? '/user_id:' . $this->request->params['named']['user_id'] : $param_string;
            if (!empty($this->request->params['named']['user_id'])) {
                $conditions['Transaction.user_id'] = $this->request->params['named']['user_id'];
                $this->request->data['Transaction']['user_id'] = $this->request->params['named']['user_id'];
            }
            if (!empty($this->request->data['User']['username'])) {
                $get_user_id = $this->Transaction->User->find('list', array(
                    'conditions' => array(
                        'User.username' => $this->request->data['User']['username'],
                    ) ,
                    'fields' => array(
                        'User.id',
                    ) ,
                    'recursive' => -1
                ));
                if (!empty($get_user_id)) {
                    $conditions['Transaction.user_id'] = $get_user_id;
                }
            }
            if (!empty($this->request->params['named']['type'])) {
                $conditions['Transaction.transaction_type_id'] = $this->request->params['named']['type'];
            }
            if (!empty($this->request->params['named']['stat'])) {
                if (!empty($this->request->params['named']['stat'])) {
                    if ($this->request->params['named']['stat'] == 'day') {
                        $conditions['TO_DAYS(NOW()) - TO_DAYS(Transaction.created) <='] = 0;
                        $this->pageTitle = __l('Transactions - Today');
                        $this->set('transaction_filter', __l('- Today'));
                        $days = 0;
                    } else if ($this->request->params['named']['stat'] == 'week') {
                        $conditions['TO_DAYS(NOW()) - TO_DAYS(Transaction.created) <='] = 7;
                        $this->pageTitle = __l('Transactions - This Week');
                        $this->set('transaction_filter', __l('- This Week'));
                        $days = 7;
                    } else if ($this->request->params['named']['stat'] == 'month') {
                        $conditions['TO_DAYS(NOW()) - TO_DAYS(Transaction.created) <='] = 30;
                        $this->pageTitle = __l('Transactions - This Month');
                        $this->set('transaction_filter', __l('- This Month'));
                        $days = 30;
                    } else {
                        $this->pageTitle = __l('Transactions - Total');
                        $this->set('transaction_filter', __l('- Total'));
                    }
                }
            }
            if (empty($this->request->data)) {
                if (isset($days)) {
                    $this->request->data['Transaction']['from_date'] = array(
                        'year' => date('Y', strtotime("-$days days")) ,
                        'month' => date('m', strtotime("-$days days")) ,
                        'day' => date('d', strtotime("-$days days"))
                    );
                } else {
                    $this->request->data['Transaction']['from_date'] = array(
                        'year' => date('Y', strtotime('today')) ,
                        'month' => date('m', strtotime('today')) ,
                        'day' => date('d', strtotime('today'))
                    );
                }
                $this->request->data['Transaction']['to_date'] = array(
                    'year' => date('Y', strtotime('today')) ,
                    'month' => date('m', strtotime('today')) ,
                    'day' => date('d', strtotime('today'))
                );
                $post = 0;
            }
            if (!empty($this->request->params['named']['from_date']) && !empty($this->request->params['named']['to_date'])) {
                if ($this->request->params['named']['from_date'] < $this->request->params['named']['to_date']) {
                    $conditions['Transaction.created >='] = $this->request->params['named']['from_date'];
                    $conditions['Transaction.created <='] = $this->request->params['named']['to_date'];
                } else {
                    $this->Session->setFlash(__l('From date should greater than To date. Please, try again.') , 'default', null, 'error');
                }
            }
		// csv export code
		if ($this->RequestHandler->prefers('csv')) {
			Configure::write('debug', 0);
			$this->set('transactions', $this);
			$this->set('conditions', $conditions);			
		} else {
			$this->paginate = array(
				'conditions' => $conditions,
				'contain' => array(
					'TransactionType',
					'User',
				) ,
				'order' => array(
					'Transaction.id' => 'desc'
				) ,
				'recursive' => 3
			);
			$users = $this->Transaction->User->find('list', array(
				'conditions' => array(
					'User.role_id !=' => ConstUserTypes::Admin
				) ,
				'order' => array(
					'User.username' => 'asc'
				) ,
			));
			$export_transactions = $this->Transaction->find('all', array(
				'conditions' => $conditions,
				'fields' => array(
					'Transaction.id'
				) ,
				'recursive' => -1
			));
			$this->set('users', $this->paginate());
			if (!empty($export_transactions)) {
				$ids = array();
				foreach($export_transactions as $transactions) {
					$ids[] = $transactions['Transaction']['id'];
				}
				$hash = $this->Transaction->getIdHash(implode(',', $ids));
				$_SESSION['transaction_export'][$hash] = $ids;
				$this->set('export_hash', $hash);
				if (!empty($this->request->data) && $post) {
					$_SESSION['transaction_export_filter'][$hash] = $this->request->data;
				} else {
					if (!empty($_SESSION['transaction_export_filter'][$hash])) {
						unset($_SESSION['transaction_export_filter'][$hash]);
					}
				}
			}
			$this->Transaction->validate = array();
			$this->Transaction->User->validate = array();
			$this->set('users', $users);
			$this->set('transactions', $this->paginate());
			$this->set('param_string', $param_string);
			
		}		
    }    
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->Transaction->delete($id)) {
            $this->Session->setFlash(__l('Transaction deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }   
}
?>