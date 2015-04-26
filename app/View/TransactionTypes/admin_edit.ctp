<?php /* SVN: $Id: $ */ ?>
<div class="transactionTypes this->Form">
<?php echo $this->Form->create('TransactionType', array('class' => 'normal'));?>
	<fieldset>
	<?php
		echo $this->Form->input('id');?>
		<h3><?php echo $this->request->data['TransactionType']['name'];?></h3>
	<?php
		echo $this->Form->input('message',array('label'=>__l('Message'),'info' => $this->Html->cText($this->request->data['TransactionType']['transaction_variables'])));
	?>
	</fieldset>
	<div class="submit-block clearfix">
		<?php echo $this->Form->submit(__l('Update'));?>
		<div class="cancel-block">
			<?php echo $this->Html->link(__l('Cancel') , array('action' => 'index'));?>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
