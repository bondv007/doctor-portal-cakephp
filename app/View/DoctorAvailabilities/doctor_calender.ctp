<div class="js-calendar-response js-guestcalender-load-block">
<?php if(!empty($type)) { 
	if($type == 'doctor') { ?>
			<?php echo $this->Calendar->doctor_calendar_month($year, $month, $data,$user_id,$clinic_id); ?>
	<?php } else { ?>
			<?php echo $this->Calendar->doctor_profile_calendar($year, $month, $day, $data, $user_id,$clinic_id); ?>
	<?php } 
	 }
	?>		
</div>	
