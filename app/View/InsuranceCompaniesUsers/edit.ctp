<?php /* SVN: $Id: $ */ ?>
<div class="insuranceCompaniesUsers form">
<?php echo $this->Form->create('InsuranceCompaniesUser', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Insurance Companies Users'), array('action' => 'index'));?> &raquo; <?php echo __l('Edit Insurance Companies User');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('insurance_company_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Update'));?>
</div>
