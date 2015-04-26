<?php
$i = 0;
do {  
	$transactions->paginate = array(
		'conditions' => $conditions,
		'offset' => $i,
		'order' => array(
			'Transaction.id' => 'desc'
		) ,
		'recursive' => 2
	);				
	$Transactions = $transactions->paginate();
	if ($Transactions) {
		$data = array();
		foreach($Transactions as $transaction) {
			if ($transaction['TransactionType']['is_credit']) {
				$credit = $transaction['Transaction']['amount'];
				$debit = '--';
			} else {
				$credit = '--';
				$debit = $transaction['Transaction']['amount'];
			}
			$data[]['Transaction'] = array(
				'Date' => $transaction['Transaction']['created'],
				'User' => $transaction['User']['username'],
				'Description' => $transaction['TransactionType']['name'],
				'Credit (' . Configure::read('site.currency') . ')' => $credit,
				'Debit (' . Configure::read('site.currency') . ')' => $debit,
				'Gateway Fees (' . Configure::read('site.currency') . ')' => $transaction['Transaction']['gateway_fees'],
			);
		}
		if (!$i) {
			$this->Csv->addGrid($data);
		} else {
			$this->Csv->addGrid($data, false);
		}
	}
	$i+= 20;    
}
while (empty($Transactions));
echo $this->Csv->render(true);
?>