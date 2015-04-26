<?php /* SVN: $Id: $ */ ?>
<div class="appointments view">
<h2><?php echo __l('Appointment Details');?></h2>
<div class="clearfix">
 <div class="side1">
<div class="form-box">
   <div class="form-box-inner clearfix">
	<dl class="list appointments-list clearfix">
		<dt><?php echo __l('The appointment is sceduled for:');?></dt>
			<dd><?php echo $this->Html->cDate($appointment['Appointment']['appointment_date']);?>, <?php echo $this->Html->cTime($appointment['Appointment']['appointment_time']);?></dd>
		<dt><?php echo __l('Appointment Status');?></dt>
			<dd><?php echo $this->Html->cText($appointment['AppointmentStatus']['name']);?></dd>
		<dt><?php echo __l('Doctor');?></dt>
			<dd><?php echo $this->Html->link($this->Html->cText($appointment['DoctorUser']['username']), array('controller'=> 'users', 'action'=>'view', $appointment['DoctorUser']['username'], 'admin' => false), array('escape' => false));?></dd>
		<dt><?php echo __l('Name');?></dt>
			<?php if(!empty($appointment['Appointment']['is_guest_appointment'])) {	?>
				<?php $patient_name = ucfirst($appointment['Appointment']['guest_first_name']. ' '. $appointment['Appointment']['guest_last_name']);?>
				<dd><?php echo $this->Html->cText($patient_name);?></dd>
			<?php } else { ?>
				<?php $patient_name = ucfirst($appointment['Appointment']['first_name']. ' '. $appointment['Appointment']['last_name']);?>	
				<dd><?php echo $this->Html->cText($patient_name);?></dd>
			<?php } ?>
		<dt><?php echo __l('Email');?></dt>
			<dd><?php echo $this->Html->cText($appointment['User']['email']);?></dd>	
		<dt><?php echo __l('Telephone');?></dt>
			<dd><?php echo $this->Html->cText($appointment['Appointment']['phone']);?></dd>
		<dt><?php echo __l('Zipcode');?></dt>
			<dd><?php echo $this->Html->cText($appointment['Appointment']['zip_code']);?></dd>
		<dt><?php echo __l('Date of birth');?></dt>
			<dd><?php echo $this->Html->cText($appointment['Appointment']['dob']);?></dd>		
		<dt><?php echo __l('Gender');?></dt>
			<dd><?php echo $this->Html->cText($appointment['Gender']['name']);?></dd>								
		<dt><?php echo __l('Patient\s Status');?></dt>
			<?php if(!empty($appointment['Appointment']['is_seen_before'])) {	?>
				<dd><?php echo __l('Old Member');?></dd>
			<?php } else { ?>
				<dd><?php echo __l('New Member');?></dd>
			<?php } ?>	
		<dt><?php echo __l('Reason for visit');?></dt>
			<dd><?php echo $this->Html->cText($appointment['SpecialtyDisease']['name']);?></dd>			
		<dt><?php echo __l('Insurance');?></dt>
			<dd>
			<?php if(!empty($appointment['InsuranceCompany']['name'])) { ?>	
				<?php echo $this->Html->cText($appointment['InsuranceCompany']['name']);?>
			<?php } else { ?>
				<?php echo __l('I\'ll choose my insurance later');?>
			<?php } ?>	
			</dd>			
				
		<dt><?php echo __l('Patient Note');?></dt>
			<dd><?php echo $this->Html->cText($appointment['Appointment']['patient_note']);?></dd>
	</dl>

	<?php if($this->Auth->sessionValid() && $this->Auth->user('role_id') == ConstUserTypes::Doctor){ ?>		 
		 <?php if($appointment['Appointment']['appointment_status_id'] == ConstAppointmentStatus::PendingApproval) { ?>
		  <div class="button-block clearfix">
		 <div class="add-button"><?php echo $this->Html->link(__l('Confirm Appointment'), array('controller' => 'appointments', 'action' => 'update_status', $appointment['Appointment']['id'],'status' => 'approve','admin' => false), array('class' => 'js-delete', 'title' => __l('Confirm appointments'))); ?></div>
		 <div class="add-button"><?php echo $this->Html->link(__l('Decline Appointment'), array('controller' => 'appointments', 'action' => 'update_status', $appointment['Appointment']['id'],'status' => 'decline','admin' => false), array('class' => 'js-delete', 'title' => __l('Decline appointments'))); ?></div>
		 </div>
		 <?php } ?>
	<?php } else { ?>
				<?php if($appointment['Appointment']['appointment_status_id'] == ConstAppointmentStatus::PendingApproval) { ?>
					<div class="button-block clearfix">
					 <div class="add-button"><?php echo $this->Html->link(__l('Cancel Appointment'), array('controller' => 'appointments', 'action' => 'update_status', $appointment['Appointment']['id'],'status' => 'cancel','admin' => false), array('class' => 'js-delete','title' => __l('Cancel appointments'))); ?></div>
					 </div>
				<?php } ?>			
	<?php } ?>	 
	
	<?php if($appointment['Appointment']['appointment_status_id'] == ConstAppointmentStatus::Closed) { ?>
		<div class="review-block">
				<?php
    				echo $this->element('review-index', array('patient_id' => $appointment['Appointment']['user_id'], 'doctor_id' => $appointment['Appointment']['doctor_user_id'],'appointment_id'=>$appointment['Appointment']['id'],'cache' => array('config' => 'sec')));
			    ?>
		</div>
	 <?php } ?>	
   </div>
 </div>	
</div>
<div class="side2">
    <?php
    	echo $this->element('sidebar', array('config' => 'sec'));
    ?>
</div>
</div>
</div>