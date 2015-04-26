<?php /* SVN: $Id: index.ctp 32471 2010-11-08 11:23:30Z aravindan_111act10 $ */ ?>
<?php if(empty($this->params['named']['stat']) && !isset($this->data['Transaction']['tab_check']) && !$isAjax): ?>
	<h2><?php echo __l('My Transactions'); ?></h2>
	<?php echo $this->Form->create('Transaction', array('action' => 'index' ,'class' => 'normal js-ajax-form {"container":"js-responses","transaction":"true"}')); ?>
	<div class="transaction-category clearfix">
			<?php echo $this->Form->input('filter', array('default'=>__l('all'),'type' => 'radio','options'=>$filter,'legend'=>false,'class' =>'js-transaction-filter ')); ?>
		<div class="js-filter-window hide clearfix">
			<div class="clearfix transection-date-time-block grid_left">
				<div class="input date-time grid_left clearfix">
					<div class="js-datetime">
						<?php echo $this->Form->input('from_date', array('label' => __l('From'), 'type' => 'date', 'orderYear' => 'asc', 'minYear' => date('Y')-10, 'maxYear' => date('Y'), 'div' => false, 'empty' => __l('Please Select'))); ?>
					</div>
				</div>
				<div class="input date-time grid_left end-date-time-block clearfix">
					<div class="js-datetime">
						<?php echo $this->Form->input('to_date', array('label' => __l('To '),  'type' => 'date', 'orderYear' => 'asc', 'minYear' => date('Y')-10, 'maxYear' => date('Y'), 'div' => false, 'empty' => __l('Please Select'))); ?>
					</div>
				</div>
			</div>
			<?php
				echo $this->Form->input('tab_check', array('type' => 'hidden','value' => 'tab_check')); ?>
            <div class="submit-block clearfix">
            <?php
				echo $this->Form->submit(__l('Filter'));
			?>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
	<div class="transactions index js-response js-responses">
<?php endif; ?>
				<table class="list transactions-list">
			<tr>
				<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('created', __l('Date'));?></div></th>
				<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('transaction_type_id', __l('Description'));?></div></th>
				<th class="dr"><div class="js-pagination credit round-3"><?php echo $this->Paginator->sort('amount', __l('Credit') . ' (' . Configure::read('site.currency') . ')');?></div></th>
				<th class="dr"><div class="js-pagination debit round-3"><?php echo $this->Paginator->sort('amount', __l('Debit') . ' (' . Configure::read('site.currency') . ')');?></div></th>
			</tr>
			<?php
				if (!empty($transactions)):
					$i = 0;
					$j = 1;
					$total_credit=0;
					$total_debit=0;
					foreach ($transactions as $transaction):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="altrow"';
						}
							$to= $this->Html->cDate($duration_to);
							$from=$this->Html->cDate($duration_from);
			?>
			<tr<?php echo $class;?>>
				<td><?php echo $this->Html->cDateTime($transaction['Transaction']['created']);?></td>
				<td class="dl"><?php echo $this->Html->transactionDescription($transaction);?></td>
				<td class="dr">
					<?php
						if($transaction['TransactionType']['is_credit']):
						$total_credit=$total_credit+$transaction['Transaction']['amount'];
							echo $this->Html->cCurrency($transaction['Transaction']['amount']);
						else:
							echo '--';
						endif;
					 ?>
				</td>
				<td class="dr">
					<?php
						if($transaction['TransactionType']['is_credit']):
							echo '--';
						else:
							$total_debit=$total_debit+$transaction['Transaction']['amount'];
							echo $this->Html->cCurrency($transaction['Transaction']['amount']);
						endif;
					 ?>
				</td>
			</tr>
			<?php
					$j++;
				endforeach;
			?>
			<tr class="total-block">
				<td class="total" colspan="2"><span class="total-info1"><?php echo __l('Total ');?></span><span class="duration"><?php echo $from . ' ' . __l('to') . ' ' . $to; ?></span></td>
				<td class="dr credit-total"><?php echo $this->Html->cCurrency($total_credit_amount);?></td>
				<td class="dr debit-total"><?php echo $this->Html->cCurrency($total_debit_amount);?></td>
			</tr>
			<?php
				else:
			?>
			<tr class="">
				<td colspan="11" class="notice"><?php echo __l('No Transactions available');?></td>
			</tr>
			<?php
				endif;
			?>
		</table>
		<?php if (!empty($transactions)) { ?>
			<div class="js-pagination">
				<?php echo $this->element('paging_links'); ?>
			</div>
		<?php } ?>
<?php if(empty($this->params['named']['stat']) && !isset($this->data['Transaction']['tab_check']) && !$isAjax): ?>
	</div>
<?php endif; ?>