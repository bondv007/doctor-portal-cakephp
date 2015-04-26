<div class="doctorAvailabilityTimings index">
	<h2><?php echo __('Doctor Availability Timings');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('doctor_availability_id');?></th>
			<th><?php echo $this->Paginator->sort('availability_date');?></th>
			<th><?php echo $this->Paginator->sort('timings');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($doctorAvailabilityTimings as $doctorAvailabilityTiming): ?>
	<tr>
		<td><?php echo h($doctorAvailabilityTiming['DoctorAvailabilityTiming']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($doctorAvailabilityTiming['DoctorAvailability']['id'], array('controller' => 'doctor_availabilities', 'action' => 'view', $doctorAvailabilityTiming['DoctorAvailability']['id'])); ?>
		</td>
		<td><?php echo h($doctorAvailabilityTiming['DoctorAvailabilityTiming']['availability_date']); ?>&nbsp;</td>
		<td><?php echo h($doctorAvailabilityTiming['DoctorAvailabilityTiming']['timings']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $doctorAvailabilityTiming['DoctorAvailabilityTiming']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $doctorAvailabilityTiming['DoctorAvailabilityTiming']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $doctorAvailabilityTiming['DoctorAvailabilityTiming']['id']), null, __('Are you sure you want to delete # %s?', $doctorAvailabilityTiming['DoctorAvailabilityTiming']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Doctor Availability Timing'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Doctor Availabilities'), array('controller' => 'doctor_availabilities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Doctor Availability'), array('controller' => 'doctor_availabilities', 'action' => 'add')); ?> </li>
	</ul>
</div>
