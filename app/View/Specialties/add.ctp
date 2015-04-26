<?php /* SVN: $Id: $ */ ?>
<div class="specialties form">
<?php echo $this->Form->create('Specialty', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Specialties'), array('action' => 'index'));?> &raquo; <?php echo __l('Add Specialty');?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('speciality_disease_count');
		echo $this->Form->input('user_count');
		echo $this->Form->input('is_active');
		echo $this->Form->input('User');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Add'));?>
</div>
