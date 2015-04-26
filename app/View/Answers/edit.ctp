<?php /* SVN: $Id: $ */ ?>
<div class="answers form">
<?php echo $this->Form->create('Answer', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Answers'), array('action' => 'index'));?> &raquo; <?php echo __l('Edit Answer');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('question_id');
		echo $this->Form->input('answer');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Update'));?>
</div>
