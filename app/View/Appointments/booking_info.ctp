<?php /* SVN: $Id: $ */ ?>
<div class="appointments form js-response js-responses">
    <div class="grid_13 step3">
        <h2><?php echo __l('Book Your Appointment');?></h2>
        <ul class="stage clearfix">
        	<li class="step1 active"><?php echo __l('Appt Info');?></li>
        	<li class="step2 active"><?php echo __l('Patient Info');?></li>
        	<li class="step3 active"><?php echo __l('Details');?></li>
        	<li class="step4 active"><?php echo __l('Finish');?></li>
        </ul>
		<?php 
		if(!empty($user['Patient']['UserProfile']['phone_id'])) {
				if($user['Patient']['UserProfile']['phone_id'] == ConstPreferredPhone::Cell) {
					$phone = $user['Patient']['UserProfile']['cell_number'];
				} else if($user['Patient']['UserProfile']['phone_id'] == ConstPreferredPhone::Home) {
					$phone = $user['Patient']['UserProfile']['home_number'];
				} else {
					$phone = $user['Patient']['UserProfile']['work_number'];
				}
			}
		?>	
        <div class="appointment-bookings-details">
            <?php echo $this->Form->create('Appointment', array('class' => 'normal','action' => 'booking_info'));?>
    		 <h3><?php echo __l('Phone number where the doctor can contact you');?></h3>
			 <?php echo $this->Form->input('phone', array('label' => false , 'value' => $phone));?>
    		 <h3><?php echo __l('Any note\'s for the doctor\'s office?');?></h3>
    		 <?php echo $this->Form->input('patient_note' , array('label' => false ));?>
    		 <?php echo $this->Form->input('appointment_id' , array('type' => 'hidden' , 'value' => $appointment_id));?>
    		 <h3>Reminder Notification</h3>
    		 <span>
    		 	
    		 <label for="reminder_sms"><?php echo __l('I want reminder SMS for appointment.');?></label>
    		 <input id="reminder_sms" type="checkbox" name="data[Appointment][reminder_sms]" value="1" onclick="check_reminder();"/>
    		 </span>
    		 
    		 <div id="reminder_time" style="display: none;">
    		 	<label for="reminder_time_val">Send me reminder prior to appointment</label>
    		 	<select id="reminder_time_val" name="data[Appointment][reminder_time]">
    		 		<option value="15">15 Minutes</option>
    		 		<option value="30">30 Minutes</option>
    		 		<option value="45">45 Minutes</option>
    		 		<option value="60">1 Hour</option>
    		 		<option value="90">1 Hour 30 Minutes</option>
    		 		<option value="120">2 Hours</option>
    		 		<option value="180">3 Hours</option>
    		 		<option value="240">4 Hours</option>
    		 		<option value="300">5 Hours</option>
    		 	</select>
    		 </div>	
            <div class="submit-block clearfix">
                <?php echo $this->Form->submit(__l('Book Appointment'));?>
            </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
	<div class="appointment-doctor-details">
	 	<?php echo $this->element('doctor-details', array('user' => $user,'config' => 'sec')); ?>
	</div>
</div>
</div>


