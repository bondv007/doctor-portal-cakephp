<?php /* SVN: $Id: admin_index.ctp 2077 2010-04-20 10:42:36Z josephine_065at09 $ */ ?>
<div class="transactions index js-response js-responses">
  	   <?php echo $this->element('paging_counter'); ?>
  	     <div class="page-count-block clearfix">
           <div class="grid_left">
             
            	<?php echo $this->Form->create('Transaction' , array('action' => 'admin_index', 'type' => 'post', 'class' => 'normal search-form')); ?>
                     <?php
                		echo $this->Form->autocomplete('User.username', array('label' => __l('User'), 'acFieldKey' => 'Transaction.user_id', 'acFields' => array('User.username'), 'acSearchFieldNames' => array('User.username'), 'maxlength' => '255'));
                	 ?>
                 <div class="clearfix admin-date-time-block">
            		<div class="input date-time">
            			<div class="js-datetime">
            				<?php echo $this->Form->input('from_date', array('orderYear' => 'asc', 'type' => 'date', 'minYear' => date('Y')-5, 'maxYear' => date('Y') + 10, 'div' => false, 'empty' => __l('Please Select'))); ?>
            			</div>
            		</div>
            		<div class="input date-time today-date-block">
            			<div class="js-datetime">
            				<?php echo $this->Form->input('to_date', array('orderYear' => 'asc', 'type' => 'date', 'minYear' => date('Y')-5, 'maxYear' => date('Y') + 10, 'div' => false, 'empty' => __l('Please Select'))); ?>
            			</div>
            		</div>
            	</div>
            	<?php echo $this->Form->submit(__l('Filter')); ?>
                <?php echo $this->Form->end(); ?>
        </div>
        <?php if(!empty($transactions)) {?>
       		<div class="add-block grid_right">
			<?php
        	echo $this->Html->link(__l('Export'), array_merge(array('controller' => 'transactions', 'action' => 'index', 'ext' => 'csv', 'admin' => true), $this->request->params['named']), array('title' => __l('Export'), 'class' => 'export')); ?>       
            </div>
        <?php } ?>
    	
	</div>
    <table class="list">
        <tr>
            <th class="dc"><?php echo $this->Paginator->sort('Transaction.created', __l('Date'));?></th>
            <th class="dl"><?php echo $this->Paginator->sort('User.username', __l('User'));?></th>
            <th class="dl"><?php echo $this->Paginator->sort('TransactionType.name', __l('Description'));?></th>
            <?php if(!empty($credit)){ ?>
                <th class="dr"><?php echo $this->Paginator->sort('Transaction.amount', __l('Credit') . ' (' . Configure::read('site.currency') . ')');?></th>
            <?php } ?>
            <?php if(!empty($debit)){?>
                <th class="dr"><?php echo $this->Paginator->sort('Transaction.amount', __l('Debit') . ' (' . Configure::read('site.currency') . ')');?></th>
            <?php } ?>
        </tr>
    <?php 
    if (!empty($transactions)):
    
    $i = 0;
    foreach ($transactions as $transaction):
        $class = null;
        if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
        }
    ?>
        <tr<?php echo $class;?>>
                <td class="dc"><?php echo $this->Html->cDateTimeHighlight($transaction['Transaction']['created']);?></td>
                <td class="dl">
                <?php
					echo $this->Html->getUserAvatarLink($transaction['User'], 'micro_thumb',true);
				echo $this->Html->getUserLink($transaction['User']);
					
				?>
				</td>
                <td class="dl">
                    <?php
						$is_admin=0;
                        $class = $transaction['Transaction']['class'];
						if($this->Auth->sessionValid() && $this->Auth->user('role_id') == ConstUserTypes::Admin){
							$is_admin=1;
						}
						echo $this->Html->transactionDescription($transaction,$is_admin);
                    ?>
                </td>
                <?php if(!empty($credit)) {?>
                    <td class="dr">
                        <?php
                            if($transaction['TransactionType']['is_credit']):
                                echo $this->Html->cCurrency($transaction['Transaction']['amount']);
								$credit_total_amt = $credit_total_amt + $transaction['Transaction']['amount']; 
                            else:
                                echo '--';
                            endif;
                         ?>
                    </td>
                <?php } ?>
                <?php if(!empty($debit)) {?>
                    <td class="dr">
                        <?php
                            if($transaction['TransactionType']['is_credit']):
                                echo '--';
                            else:
							    $debit_total_amt = $debit_total_amt + $transaction['Transaction']['amount'];
                                echo $this->Html->cCurrency($transaction['Transaction']['amount']);
                            endif;
                         ?>
                    </td>
                <?php } ?>
            </tr>
    <?php
        endforeach;
	?>
	<tr class="total-block">
		<td colspan="3" class="dr"><?php echo __l('Total');?></td>
		 <?php if(!empty($credit)) {?>
		<td class="dr"><?php echo $this->Html->siteCurrencyFormat($credit_total_amt);?></td>
		 <?php } if(!empty($debit)) {?>
		<td class="dr"><?php echo $this->Html->siteCurrencyFormat($debit_total_amt);?></td>
		<?php } ?>
	</tr>
	<?php
    else:
    ?>
        <tr>
            <td colspan="11" class="notice"><?php echo __l('No Transactions available');?></td>
        </tr>
    <?php
    endif;
    ?>
    </table>
 
    <?php
    if (!empty($transactions)) {
        ?>
            <div class="js-pagination">
                <?php echo $this->element('paging_links'); ?>
            </div>
        <?php
    }
    ?>
</div>