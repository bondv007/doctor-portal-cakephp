<?php /* SVN: $Id: $ */ ?>
<div class="appointments view">
<h2><?php echo __l('Appointment');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($appointment['Appointment']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Created');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($appointment['Appointment']['created']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Modified');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($appointment['Appointment']['modified']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Clinic');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($appointment['Clinic']['name']), array('controller' => 'clinics', 'action' => 'view', $appointment['Clinic']['slug']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($appointment['User']['username']), array('controller' => 'users', 'action' => 'view', $appointment['User']['username']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Date Time');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($appointment['Appointment']['date_time']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Disease');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($appointment['Appointment']['disease']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Doctor Note');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($appointment['Appointment']['doctor_note']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Consultation Fees');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cFloat($appointment['Appointment']['consultation_fees']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Is Guest Appointment');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cBool($appointment['Appointment']['is_guest_appointment']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Specialty');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($appointment['Specialty']['name']), array('controller' => 'specialties', 'action' => 'view', $appointment['Specialty']['slug']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Specialty Disease');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($appointment['SpecialtyDisease']['name']), array('controller' => 'specialty_diseases', 'action' => 'view', $appointment['SpecialtyDisease']['slug']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Is Seen Before');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cBool($appointment['Appointment']['is_seen_before']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Is Pay Through Insurance');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cBool($appointment['Appointment']['is_pay_through_insurance']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Paid Amount');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cFloat($appointment['Appointment']['paid_amount']);?></dd>
	</dl>
</div>

