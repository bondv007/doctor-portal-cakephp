<?php /* SVN: $Id: $ */ ?>
<div class="insurancePlansUsers form">
<?php echo $this->Form->create('InsurancePlansUser', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Insurance Plans Users'), array('action' => 'index'));?> &raquo; <?php echo __l('Add Insurance Plans User');?></legend>
	<?php
		echo $this->Form->input('insurance_plan_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Add'));?>
</div>
