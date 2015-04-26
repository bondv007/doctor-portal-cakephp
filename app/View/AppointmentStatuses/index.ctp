<div class="appointmentStatuses index">
	<h2><?php echo __('Appointment Statuses');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('appointment_count');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($appointmentStatuses as $appointmentStatus): ?>
	<tr>
		<td><?php echo h($appointmentStatus['AppointmentStatus']['id']); ?>&nbsp;</td>
		<td><?php echo h($appointmentStatus['AppointmentStatus']['created']); ?>&nbsp;</td>
		<td><?php echo h($appointmentStatus['AppointmentStatus']['modified']); ?>&nbsp;</td>
		<td><?php echo h($appointmentStatus['AppointmentStatus']['name']); ?>&nbsp;</td>
		<td><?php echo h($appointmentStatus['AppointmentStatus']['appointment_count']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $appointmentStatus['AppointmentStatus']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $appointmentStatus['AppointmentStatus']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $appointmentStatus['AppointmentStatus']['id']), null, __('Are you sure you want to delete # %s?', $appointmentStatus['AppointmentStatus']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Appointment Status'), array('action' => 'add')); ?></li>
	</ul>
</div>
