<?php /* SVN: $Id: admin_refunds.ctp 1675 2009-03-19 15:15:18Z shankar_92ag08 $ */
?>
<div class="home-page-block">

<div class="paypalTransactionLogs index">
<?php echo $this->element('paging_counter');?>
<div class="overflow-block">
<table class="list">
    <tr>
        <th><?php echo __l('Actions');?></th>
        <th><?php echo $this->Paginator->sort('created', __l('Date'));?></th>
        <th><?php echo $this->Paginator->sort('User.username', __l('User'));?></th>
        <th><?php echo $this->Paginator->sort('txn_id', __l('Transaction ID'));?></th>
        <th><?php echo $this->Paginator->sort('payer_email', __l('User email'));?></th>
        <th><?php echo $this->Paginator->sort('mc_gross', __l('Amount'));?></th>
        <th><?php echo $this->Paginator->sort('mc_fee', __l('Fees'));?></th>
	</tr>
    </tr>
<?php
if (!empty($paypalTransactionLogs)):

$i = 0;
foreach ($paypalTransactionLogs as $paypalTransactionLog):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
		<div class="action-block">
            <span class="action-information-block">
                <span class="action-left-block">&nbsp;
                </span>
                    <span class="action-center-block">
                        <span class="action-info">
                            <?php echo __l('Action');?>
                         </span>
                    </span>
                </span>
                <div class="action-inner-block">
                <div class="action-inner-left-block">
                    <ul class="action-link clearfix">
                    	<li><?php echo $this->Html->link(__l('View'), array('controller' => 'paypal_transaction_logs', 'action' => 'view', $paypalTransactionLog['PaypalTransactionLog']['id']), array('class' => 'view', 'title' => __l('View')));?></li>
					</ul>
				   </div>
					<div class="action-bottom-block"></div>
				  </div>
			 </div>
		
        </td>
	 <td>
			<?php echo $this->Html->cDateTime($paypalTransactionLog['PaypalTransactionLog']['created']) ;?>
		</td>
       
		<td><?php echo ($paypalTransactionLog['User']['username']) ? $this->Html->link($this->Html->cText($paypalTransactionLog['User']['username'], false), array('controller' => 'users', 'action' => 'view', $paypalTransactionLog['User']['username'], 'admin' => false), array('title' => $this->Html->cText($paypalTransactionLog['User']['username'], false))) : __l('New User');?></td>
		<td><?php echo $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['txn_id']);?></td>
		<td><?php echo $this->Html->cText($paypalTransactionLog['PaypalTransactionLog']['payer_email']);?></td>
		<td><?php echo $this->Html->cFloat($paypalTransactionLog['PaypalTransactionLog']['mc_gross']);?></td>
		<td><?php echo $this->Html->cFloat($paypalTransactionLog['PaypalTransactionLog']['mc_fee']);?></td>
	</tr>
<?php
    endforeach;
else:
?>
	<tr>
		<td colspan="17" class="notice"><?php echo __l('No Paypal Transaction Logs available');?></td>
	</tr>
<?php
endif;
?>
</table>
</div>
<?php
if (!empty($paypalTransactionLogs)) {
    echo $this->element('paging_links', array('cache' => 0));
}
?>
</div>
</div>
