<?php /* SVN: $Id: $ */ ?>
<div class="doctorAvailabilities view">
<h2><?php echo __l('Doctor Availability');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($doctorAvailability['DoctorAvailability']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Created');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($doctorAvailability['DoctorAvailability']['created']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Modified');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($doctorAvailability['DoctorAvailability']['modified']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Clinic');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($doctorAvailability['Clinic']['name']), array('controller' => 'clinics', 'action' => 'view', $doctorAvailability['Clinic']['slug']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($doctorAvailability['User']['username']), array('controller' => 'users', 'action' => 'view', $doctorAvailability['User']['username']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Appointment Date');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($doctorAvailability['DoctorAvailability']['appointment_date']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Appointment Time');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($doctorAvailability['DoctorAvailability']['appointment_time']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Is With Assistant');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cBool($doctorAvailability['DoctorAvailability']['is_with_assistant']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Assistant Info');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($doctorAvailability['DoctorAvailability']['assistant_info']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Consultation Fees');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cFloat($doctorAvailability['DoctorAvailability']['consultation_fees']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Status');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($doctorAvailability['DoctorAvailability']['status']);?></dd>
	</dl>
</div>

