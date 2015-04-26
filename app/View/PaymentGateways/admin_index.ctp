<?php /* SVN: $Id: $ */ ?>
<div class="home-page-block">
	<div class = "js-payment-slider">
		<div class="page-info js-wallet payment-info hide">
			<?php echo __l('Site cannot work with "Wallet" option alone. You need payment gateway such as PayPal Standard.');?>
		</div>
		<div class="page-info payment-info  js-payment-all hide">
			<?php echo __l('Read the warning carefully and enable appropriate options for your website.');?>
		</div>
		<div class="page-info payment-info js-paypal-standard hide">
			<?php echo __l('Read the warning carefully. PayPal Standard option needs "Wallet" option to aggregate amounts.');?>
		</div>
		<div class="page-info payment-info js-paypal-adaptive hide">
			<?php echo __l('Read the warning carefully. This is recommended by PayPal, but read the caveats and understand clearly');?>
		</div>
	</div>
	<div><?php echo $this->element('paging_counter');?></div>
	<table class="list">
		<tr>
			<th rowspan="3" class="actions"><?php echo __l('Actions');?></th>
			<th rowspan="3"><?php echo $this->Paginator->sort(__l('display_name'));?></th>
			<th colspan="6"><?php echo __l('Settings');?></th>
		</tr>
		<tr>  
			<th rowspan="2"><?php echo __l('Active');?></th>
			<th rowspan="2"><?php echo __l('Live Mode');?></th>
			<th colspan="4"><?php echo __l('Where to use?');?></th>
		</tr>
		<tr>       
			<th><?php echo __l('Payout');?></th>		
		</tr>
		<?php
			if (!empty($paymentGateways)):
				$i = 0;
				foreach ($paymentGateways as $paymentGateway):
					$class = null;
					$status_class = null;
					if ($i++ % 2 == 0) :
						$class = ' class="altrow"';
					endif;
		?>
		<tr<?php echo $class;?>>
			<td class="actions">
				<div class="action-block">
					<span class="action-information-block">
						<span class="action-left-block">&nbsp;&nbsp;</span>
						<span class="action-center-block">
							<span class="action-info"><?php echo __l('Actions'); ?></span>
						</span>
					</span>
					<div class="action-inner-block">
						<div class="action-inner-left-block">
							<ul class="action-link clearfix">
								<li>
									<span><?php echo $this->Html->link(__l('Edit'), array('action' => 'edit', $paymentGateway['PaymentGateway']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?></span>
									<?php echo $this->Layout->adminRowActions($paymentGateway['PaymentGateway']['id']);?>
								</li>
							</ul>
						</div>
						<div class="action-bottom-block"></div>
					</div>
				</div>
			</td>
			<td class="dl">
				<?php echo $this->Html->cText($paymentGateway['PaymentGateway']['display_name']);?>
					<span class="info"><?php echo $this->Html->cText($paymentGateway['PaymentGateway']['description']);?></span>
			</td>
			<?php 
				$status_str = 0;
				$plugins = explode(',', Configure::read('Hook.bootstraps'));				
				$plugin_name = Inflector::camelize(strtolower($paymentGateway['PaymentGateway']['name']));
				if(in_array($plugin_name,$plugins)) {
					$status_str = 1;
				}
			?>
			<td class="dc <?php echo "admin-status-".$status_str; ?> <?php echo ($paymentGateway['PaymentGateway']['is_active'] ==1 && isPluginEnabled($paymentGateway['PaymentGateway']['display_name']))? 'js-active-gateways': 'js-deactive-gateways'; ?> payment-<?php echo $paymentGateway['PaymentGateway']['id'];?>"><?php echo $this->Html->link(($paymentGateway['PaymentGateway']['is_active'] ==1)? "Yes": "No", array('action'=>'update', $paymentGateway['PaymentGateway']['id'], ConstMoreAction::Active, ($paymentGateway['PaymentGateway']['is_active'] ==1)? 0: 1),array('class'=>'js-admin-update-status'));?></td>
			<?php $test_class = ($paymentGateway['PaymentGateway']['is_test_mode'] ==1)?"admin-status-0":"admin-status-1";?>
			<td class="dc <?php echo $test_class;?>"><?php echo $this->Html->link(($paymentGateway['PaymentGateway']['is_test_mode'] ==1)? "No": "Yes", array('action'=>'update', $paymentGateway['PaymentGateway']['id'], ConstMoreAction::TestMode, ($paymentGateway['PaymentGateway']['is_test_mode'] ==1)? 0: 1),array('class'=>'js-admin-update-status')); ?></td>
			<td class="dc <?php echo "admin-status-".$this->Html->cInt($paymentGateway['PaymentGateway']['is_mass_pay_enabled'],false)?>">
				<?php if ($paymentGateway['PaymentGateway']['id'] == ConstPaymentGateways::PayPal) { ?>
					<span id="tip2" class="js-helptip" title="<?php echo __l('Handled with preapproval & chained payment.'); ?>"><?php echo __l('n/a'); ?></span>
				<?php } elseif (isset($paymentGateway['PaymentGateway']['is_mass_pay_enabled']) and $paymentGateway['PaymentGateway']['is_active'] == 1) { ?>
					<?php echo $this->Html->link(($paymentGateway['PaymentGateway']['is_mass_pay_enabled'] ==1)? "Yes": "No", array('action'=>'update', $paymentGateway['PaymentGateway']['id'], ConstMoreAction::MassPay, ($paymentGateway['PaymentGateway']['is_mass_pay_enabled'] ==1)? 0: 1),array('class'=>'js-admin-update-status')); ?>
				<?php } else { ?>
					<?php echo '--'; ?>
				<?php } ?>
			</td>
			<?php
				$i=1;
				foreach($paymentGateway['PaymentGatewaySetting'] as $paymentGatewaySetting):
					if($paymentGatewaySetting['key'] == 'is_enable_for_signup'):
					$i++;
			?>
					<td class="<?php echo "admin-status-".$paymentGatewaySetting['test_mode_value']?>"><?php echo $this->Html->link(($paymentGatewaySetting['test_mode_value'] ==1)? "Yes": "No", array('action'=>'update', $paymentGateway['PaymentGateway']['id'], ConstMoreAction::Signup, ($paymentGatewaySetting['test_mode_value'] ==1)? 0: 1),array('class'=>'js-admin-update-status'));?></td>
				<?php endif; ?>
			<?php endforeach; ?>
			 
		</tr>
<?php
	endforeach;
else:
?>
	<tr>
		<td colspan="9" class="notice"><?php echo __l('No Payment Gateways available');?></td>
	</tr>
<?php
endif;
?>
</table>
<?php if (!empty($paymentGateways)): ?>
	<div class="clearfix">
		<div class="grid_right"><?php echo $this->element('paging_links'); ?></div>
	</div>
<?php endif; ?>
</div>