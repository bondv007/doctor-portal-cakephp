<div class="doctorAvailabilityTimings view">
<h2><?php  echo __('Doctor Availability Timing');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($doctorAvailabilityTiming['DoctorAvailabilityTiming']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Doctor Availability'); ?></dt>
		<dd>
			<?php echo $this->Html->link($doctorAvailabilityTiming['DoctorAvailability']['id'], array('controller' => 'doctor_availabilities', 'action' => 'view', $doctorAvailabilityTiming['DoctorAvailability']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Availability Date'); ?></dt>
		<dd>
			<?php echo h($doctorAvailabilityTiming['DoctorAvailabilityTiming']['availability_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timings'); ?></dt>
		<dd>
			<?php echo h($doctorAvailabilityTiming['DoctorAvailabilityTiming']['timings']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Doctor Availability Timing'), array('action' => 'edit', $doctorAvailabilityTiming['DoctorAvailabilityTiming']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Doctor Availability Timing'), array('action' => 'delete', $doctorAvailabilityTiming['DoctorAvailabilityTiming']['id']), null, __('Are you sure you want to delete # %s?', $doctorAvailabilityTiming['DoctorAvailabilityTiming']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Availability Timings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Availability Timing'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Doctor Availabilities'), array('controller' => 'doctor_availabilities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Availability'), array('controller' => 'doctor_availabilities', 'action' => 'add')); ?> </li>
	</ul>
</div>
