<?php /* SVN: $Id: $ */ ?>
<h2><?php echo __l('Add Amount to Wallet');?></h2>
<div class="payments order add-wallet  js-responses js-main-order-block">
	<div class="current-balance">
	       <?php echo __l('Your Current Available Balance:').' '. Configure::read('site.currency').$this->Html->cCurrency($user_info['User']['available_wallet_amount']);?>
	</div>
		<?php 
		
		echo $this->Form->create('Payment', array('controller' => 'payments', 'action' => 'add_to_wallet', 'id' => 'PaymentAddToWallet', 'class' => 'normal'));			
		if (!Configure::read('wallet.max_wallet_amount')):
			$max_amount = 'No limit';
		else:
			$max_amount = Configure::read('site.currency').$this->Html->cCurrency(Configure::read('wallet.max_wallet_amount'));
		endif;
		echo $this->Form->input('UserAddWalletAmount.amount', array('label' => __l('Amount'),'after' => Configure::read('site.currency') . '<span class="info">' . sprintf(__l('Minimum Amount: %s%s <br/> Maximum Amount: %s'),Configure::read('site.currency'),$this->Html->cCurrency(Configure::read('wallet.min_wallet_amount')), $max_amount) . '</span>'));
                    	
	   ?>
	   	<?php       echo $this->element('payment-get_gateways', array('type'=>'is_enable_for_add_to_wallet','is_enable_wallet'=>0,'config' => 'sec'));?>

	<?php echo $this->Form->end();?>		
</div>