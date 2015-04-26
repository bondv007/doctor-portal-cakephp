<?php /* SVN: $Id: $ */ ?>
<div class="transactionTypes index js-response">
<?php echo $this->element('paging_counter');?>
<table class="list">
    <tr>
        <th class="actions"><?php echo __l('Actions');?></th>
        <th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('name',__l('Name'));?></div></th>
        <th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('message',__l('Message'));?></div></th>
		<th class="dc"><?php echo $this->Paginator->sort('is_credit',__l('Credit'));?></th>
    </tr>
<?php
if (!empty($transactionTypes)):

$i = 0;
foreach ($transactionTypes as $transactionType):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td  class="actions">
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
							<li><?php echo $this->Html->link(__l('Edit'), array('action' => 'edit', $transactionType['TransactionType']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?>
                              <?php echo $this->Layout->adminRowActions($transactionType['TransactionType']['id']);?>
                            </li>
						</ul>
					</div>
					<div class="action-bottom-block"></div>
				</div>
			</div>
		 </td>
		<td><?php echo $this->Html->cText($transactionType['TransactionType']['name']);?></td>
		<td><?php echo $this->Html->cText($transactionType['TransactionType']['message']);?></td>
		<td><?php echo $this->Html->cBool($transactionType['TransactionType']['is_credit']);?></td>
	</tr>
<?php
    endforeach;
else:
?>
	<tr>
		<td colspan="7" class="notice"><?php echo __l('No Transaction Types available');?></td>
	</tr>
<?php
endif;
?>
</table>
<div class="clearfix">
   <div class="js-pagination grid_right">
<?php
if (!empty($transactionTypes)) {
    echo $this->element('paging_links');
}
?>
   </div>
</div>
</div>
