<div class="user-big-photo clearfix">
    <div class="img-block">
		<?php echo $this->Html->getDoctorAvatarImage($user['Doctor']['User'], 'normal_thumb',true); ?>
    </div>
    <div class="content-block">
		<h3>
		<?php echo __l('Dr. ');?><?php echo ucfirst($user['Doctor']['User']['username']);?>
		<?php if(!empty($user['Doctor']['UserProfile']['title'])){ ?>
				<span><?php echo $user['Doctor']['UserProfile']['title'];?></span>
		<?php } ?> 
		</h3>
		<?php if(!empty($user['Doctor']['UserProfile']['Specialty']['name'])) { ?>
			<p class="qualification"><?php echo $user['Doctor']['UserProfile']['Specialty']['name'];?></p>
		<?php } ?>
		<?php
			$overall_rating_percentage = $user['Doctor']['User']['overall_avg_rating']*20;
		?>
        <ul class="star-rating">
            <li style="width: 60%;" class="current-rating">Currently 3/5 Stars.</li>
			 <li style="width: <?php echo $overall_rating_percentage;?>%;" class="current-rating" title="<?php echo __l('Currently');?> <?php echo $user['Doctor']['User']['overall_avg_rating'];?> <?php echo __l('Stars');?>"><?php echo __l('Currently');?> <?php echo $user['Doctor']['User']['overall_avg_rating'];?> <?php echo __l('Stars.');?></li>
        </ul>
		<address id="address"><?php echo $user['Doctor']['UserProfile']['address'];?> <?php echo $user['Doctor']['UserProfile']['City']['name'];?>,<?php echo $user['Doctor']['UserProfile']['State']['code'];?> <?php echo $user['Doctor']['UserProfile']['zip_code'];?></address>
    </div>
</div>
<?php
	if(!empty($user['Patient']['UserProfile']['first_name']) and !empty($user['Patient']['UserProfile']['last_name'])) {
		$name = ucfirst($user['Patient']['UserProfile']['first_name']. ' ' .$user['Patient']['UserProfile']['last_name']);
	} else {
		$name = ucfirst($user['Patient']['User']['username']);
	}
?>					
<div class="appointment-booking-info">
	<p class="app-day"><?php echo date("D, M j, Y",strtotime($user['Patient']['Appointment']['appointment_date']));?></p>
	<p class="app-time"><?php echo $this->Html->cText($user['Patient']['Appointment']['appointment_time']);?></p>
    <h4><?php echo __l('Patient');?></h4>
    <p><?php echo $this->Html->cText($name);?></p>
    <h4><?php echo __l('Reason for Visit');?></h4>
    <?php if(!empty($user['Patient']['Appointment']['disease'])) { ?>
		<p><?php echo $this->Html->cText($user['Patient']['Appointment']['disease']);?></p>
	<?php }  else { ?>
		<p><?php echo __l('Yet to select');?></p>
	<?php } ?>	
</div>
 