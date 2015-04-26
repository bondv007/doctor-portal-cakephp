<?php /* SVN: $Id: $ */ ?>
<div class="paypalTransactionLogs view">
	<dl class="list clearfix"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['id']) ? $this->Html->cInt($paypalTransactionLog['PaypalTransactionLog']['id']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Created');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['created']) ? $this->Html->cDateTime($paypalTransactionLog['PaypalTransactionLog']['created']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Modified');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['modified']) ? $this->Html->cDateTime($paypalTransactionLog['PaypalTransactionLog']['modified']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['username']) ? $this->Html->link($this->Html->cText($paypalTransactionLog['User']['username']), array('controller' => 'users', 'action' => 'view', $paypalTransactionLog['User']['username']), array('escape' => false)) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Transaction');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['Transaction']['id']) ? $this->Html->link($this->Html->cInt($paypalTransactionLog['Transaction']['id']), array('controller' => 'transactions', 'action' => 'view', $paypalTransactionLog['Transaction']['id']), array('escape' => false)) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Ip');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['Ip']['ip']) ? $this->Html->cText($paypalTransactionLog['Ip']['ip']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Currency Type');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['currency_type']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['currency_type']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Txn Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['txn_id']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['txn_id']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Payer Email');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['payer_email']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['payer_email']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Payment Date');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['payment_date']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['payment_date']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Email');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['email']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['email']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('To Digicurrency');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['to_digicurrency']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['to_digicurrency']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('To Account No');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['to_account_no']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['to_account_no']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('To Account Name');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['to_account_name']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['to_account_name']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Fees Paid By');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['fees_paid_by']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['fees_paid_by']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Mc Gross');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['mc_gross']) ? $this->Html->cFloat($paypalTransactionLog['PaypalTransactionLog']['mc_gross']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Mc Fee');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['mc_fee']) ? $this->Html->cFloat($paypalTransactionLog['PaypalTransactionLog']['mc_fee']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Mc Currency');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['mc_currency']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['mc_currency']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Payment Status');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $Pay_sts; ?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Pending Reason');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['pending_reason']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['pending_reason']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Receiver Email');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['receiver_email']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['receiver_email']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Paypal Response');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['paypal_response']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['paypal_response']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Error No');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $error_no;?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Error Message');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['error_message']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['error_message']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Memo');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['memo']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['memo']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Paypal Post Vars');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['paypal_post_vars']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['paypal_post_vars']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Is Mass Pay');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo isset($paypalTransactionLog['PaypalTransactionLog']['is_mass_pay']) ? $this->Html->cBool($paypalTransactionLog['PaypalTransactionLog']['is_mass_pay']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Mass Pay Status');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['mass_pay_status']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['mass_pay_status']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Masspay Response');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['masspay_response']) ? $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['masspay_response']) : '-';?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User Cash Withdrawal Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo !empty($paypalTransactionLog['PaypalTransactionLog']['user_cash_withdrawal_id']) ? $this->Html->cInt($paypalTransactionLog['PaypalTransactionLog']['user_cash_withdrawal_id']) : '-';?></dd>
	</dl>
</div>