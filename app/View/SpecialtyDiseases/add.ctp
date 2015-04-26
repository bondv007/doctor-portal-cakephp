<?php /* SVN: $Id: $ */ ?>
<div class="specialtyDiseases form">
<?php echo $this->Form->create('SpecialtyDisease', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Specialty Diseases'), array('action' => 'index'));?> &raquo; <?php echo __l('Add Specialty Disease');?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('specialty_id');
		echo $this->Form->input('name');
		echo $this->Form->input('user_count');
		echo $this->Form->input('is_active');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Add'));?>
</div>
