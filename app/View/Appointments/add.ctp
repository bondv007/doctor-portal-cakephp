<?php /* SVN: $Id: $ */ ?>
<div class="appointments form">
<h2><?php echo __l('Book Your Appointment');?>
<ul class="stage clearfix">
	<li class="step1 active"><?php echo __l('Appt Info');?></li>
	<li class="step2 active"><?php echo __l('Patient Info');?></li>
	<li class="step3 active"><?php echo __l('Details');?></li>
	<li class="step4"><?php echo __l('Finish');?></li>
</ul>
<?php echo $this->Form->create('Appointment', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Appointments'), array('action' => 'index'));?> &raquo; <?php echo __l('Add Appointment');?></legend>
	<?php
		//echo $this->Form->input('clinic_id');
		//echo $this->Form->input('user_id');
		//echo $this->Form->input('date_time');
		//echo $this->Form->input('disease');
		echo $this->Form->input('doctor_note');
		echo $this->Form->input('consultation_fees');
		echo $this->Form->input('is_guest_appointment');
		//echo $this->Form->input('specialty_id');
		//echo $this->Form->input('specialty_disease_id');
		echo $this->Form->input('is_seen_before');
		//echo $this->Form->input('is_pay_through_insurance');
		//echo $this->Form->input('paid_amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Add'));?>




</div>
