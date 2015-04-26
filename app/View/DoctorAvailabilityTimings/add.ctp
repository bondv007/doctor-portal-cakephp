<div class="doctorAvailabilityTimings form">
<?php echo $this->Form->create('DoctorAvailabilityTiming');?>
	<fieldset>
		<legend><?php echo __('Add Doctor Availability Timing'); ?></legend>
	<?php
		echo $this->Form->input('doctor_availability_id');
		echo $this->Form->input('availability_date');
		echo $this->Form->input('timings');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Doctor Availability Timings'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Doctor Availabilities'), array('controller' => 'doctor_availabilities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Availability'), array('controller' => 'doctor_availabilities', 'action' => 'add')); ?> </li>
	</ul>
</div>
