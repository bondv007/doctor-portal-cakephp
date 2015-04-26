<?php /* SVN: $Id: $ */ ?>
<div class="doctorAvailabilities form">
<?php echo $this->Form->create('DoctorAvailability', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Doctor Availabilities'), array('action' => 'index'));?> &raquo; <?php echo __l('Edit Doctor Availability');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('clinic_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('appointment_date');
		echo $this->Form->input('appointment_time');
		echo $this->Form->input('is_with_assistant');
		echo $this->Form->input('assistant_info');
		echo $this->Form->input('consultation_fees');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Update'));?>
</div>
