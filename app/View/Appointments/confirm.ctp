<?php /* SVN: $Id: $ */ ?>
<div class="appointments form js-response js-responses">
    <div class="grid_13">
        <h2><?php echo __l('Book Your Appointment');?></h2>
        <ul class="stage clearfix">
        	<li class="step1 active"><?php echo __l('Appt Info');?></li>
        	<li class="step2 active"><?php echo __l('Patient Info');?></li>
        	<li class="step3 active"><?php echo __l('Details');?></li>
        	<li class="step4 active"><?php echo __l('Finished');?></li>
        </ul>
        <div class="appointment-patient-details">
		<dl class="list">
			<?php if(!empty($appointment['Appointment']['is_guest_appointment'])) { ?>
				<dt><?php echo __('Name'); ?>:</dt>
					<dd>
						<?php $name = ucfirst($appointment['Appointment']['guest_first_name'] .' ' . $appointment['Appointment']['guest_last_name']);
							 echo $this->Html->cText($name);
						?>
					</dd>
				<dt><?php echo __('Gender'); ?></dt>
					<dd>
						<?php echo $this->Html->cText($appointment['Gender']['name']); ?>
					</dd>
				<dt><?php echo __('Telephone'); ?></dt>
					<dd>
						<?php echo $this->Html->cText($appointment['Appointment']['phone']); ?>
					</dd>
				<dt><?php echo __('Zip'); ?></dt>
					<dd>
						<?php echo $this->Html->cText($appointment['Appointment']['guest_zip_code']); ?>
					</dd>
				
				
			<?php } else { ?>
				<dt><?php echo __('Name'); ?>:</dt>
					<dd>
						<?php $name = ucfirst($appointment['Appointment']['first_name'] .' ' . $appointment['Appointment']['last_name']);
							 echo $this->Html->cText($name);
						?>
					</dd>
				<dt><?php echo __('Gender'); ?></dt>
					<dd>
						<?php echo $this->Html->cText($appointment['Gender']['name']); ?>
					</dd>
				<dt><?php echo __('Email'); ?>:</dt>
					<dd>
						<?php echo $this->Html->cText($appointment['User']['email']); ?>
					</dd>
				<dt><?php echo __('Telephone'); ?></dt>
					<dd>
						<?php echo $this->Html->cText($appointment['Appointment']['phone']); ?>
					</dd>
				<dt><?php echo __('Zip'); ?></dt>
					<dd>
						<?php echo $this->Html->cText($appointment['Appointment']['zip_code']); ?>
					</dd>
					
			<?php } ?>			
		</dl> 
        </div>
        <div class="add-button"><?php echo $this->Html->link(__l('View your appointments'), array('controller' => 'appointments', 'action' => 'browse', 'admin' => false), array( 'title' => __l('View your appointments'))); ?></div>
    </div>
	<div class="appointment-doctor-details">
	 	<?php echo $this->element('doctor-details', array('user' => $user,'config' => 'sec')); ?> 
	</div>
</div>