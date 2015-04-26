<div class="js-response">
<div class="info-details"><?php echo __l('Diagnostics are for developer purpose only.'); ?></div>
	<ul class="setting-links   clearfix">
    <?php if(isPluginEnabled('PaypalStandard')):?>
			<li class="grid_12 omega alpha">
    			<div class="setting-details-info setting-details-info1 payment-transaction-log">
                    <h3><?php echo $this->Html->link(__l('Payment Transaction Log'), array('controller' => 'paypal_transaction_logs', 'action' => 'index', 'type' => 'normal'),array('title' => __l('Payment Transaction Log'))); ?></h3>
                    <p><?php echo __l('View the transaction details done via Normal PayPal'); ?></p>
                </div>
            </li>
            <?php endif;?>
            <?php if(isPluginEnabled('Paypal')):?>
			<li class="grid_12 omega alpha">
    			<div class="setting-details-info setting-details-info1 payment-transaction-log">
                    <h3><?php echo $this->Html->link(__l('Adaptive Payment Transaction Log'), array('controller' => 'adaptive_transaction_logs', 'action' => 'index'), array('title' => __l('Adaptive Payment Transaction Log'))); ?></h3>
                    <p><?php echo __l('View the transaction details done via PayPal Adaptive Payment'); ?></p>
                </div>
            </li>
            <?php endif;?>
              <?php if(isPluginEnabled('PaypalStandard') && isPluginEnabled('Wallet') && isPluginEnabled('Withdrawals')):?>
                  <li class="grid_12 omega alpha">
    			<div class="setting-details-info setting-details-info1 mass-payment">
                    <h3><?php echo $this->Html->link(__l('Mass Payment Transaction Log'), array('controller' => 'paypal_transaction_logs', 'action' => 'index', 'type' => 'mass'),array('title' => __l('Mass Payment Transaction Log'))); ?></h3>
                    <p><?php echo __l('View the transaction details done via Mass PayPal'); ?></p>
                </div>
            </li>
            <?php endif;?>
			<li class="grid_12 omega alpha">
    			<div class="setting-details-info setting-details-info1 debug-error">
                    <h3><?php echo $this->Html->link(__l('Debug & Error Log'), array('controller' => 'devs', 'action' => 'logs'),array('title' => __l('Debug & Error Log'))); ?></h3>
                    <p><?php echo __l('View debug, error log, used cache memory and used log memory'); ?></p>
                </div>
            </li>
    </ul>
</div>