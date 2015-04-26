<?php /* SVN: $Id: $ */ ?>
<div class="planUsers form">
<?php echo $this->Form->create('PlanUser', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Plan Users'), array('action' => 'index'));?> &raquo; <?php echo __l('Add Plan User');?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('plan_id');
		echo $this->Form->input('expiry_date');
		echo $this->Form->input('duration');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Add'));?>
</div>
