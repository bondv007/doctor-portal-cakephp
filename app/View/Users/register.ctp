<div class="users form js-responses">
<?php 
	if(!empty($type) && $type == 'patient'){
		$action = "patient_register";
	} elseif(!empty($type) && $type == 'doctor'){
		$action = "doctor_register";
	} else{
		$action = "register";
		$type = '';
	}
	
?>
<?php if(!empty($type) && $type != 'doctor') { ?>
<ul class="stage clearfix">
	<li class="step1 active"><?php echo __l('Create a Profile');?></li>
	<li class="step2"><?php echo __l('Enter Your Phone Number');?></li>
	<li class="step3"><?php echo __l('Verify Your Phone Number');?></li>
</ul>
<?php } ?>

<div class="clearfix  title-block">
<?php if(!empty($type) && $type == 'doctor') { ?>
<h3 class="grid_11"><?php echo __l('Let\'s get started with '); ?><?php echo Configure::read('site.name');?> <?php echo __l(' on for doctor register'); ?></h3>
<?php } else { ?>
<h3 class="grid_11"><?php echo __l('Let\'s get started with '); ?><?php echo Configure::read('site.name');?> <?php echo __l(' on for patient register'); ?></h3>
<?php } ?>
<div class="grid_7 grid_right click-here">
    <?php if(!empty($type) && $type == 'doctor') { ?>
    <p><?php echo $this->Html->link(__l('Not a Doctor? Click here'), array('controller' => 'users', 'action' => 'register'), array('title' => __l('Not a Doctor? Click here')));?></p>
    <?php } else { ?>
    <p><?php echo $this->Html->link(__l('Not a Patient? Click here'), array('controller' => 'doctor', 'action' => 'user', 'register'), array('title' => __l('Not a Patient? Click here')));?></p>
    <?php } ?>
</div>
</div>
<div class="form-box">
        <div class="form-box-inner">
<?php echo $this->Form->create('User', array('action' => 'register', 'class' => 'normal')); ?>
<fieldset>
<?php if(!empty($type) && $type == 'patient') { ?>	 	
<h4><?php echo __l('Who will be making the appointments?');?></h4>
<?php } ?>
	<?php
		echo $this->Form->input('UserProfile.first_name', array('label' => __l('First Name')));
		echo $this->Form->input('UserProfile.last_name', array('label' => __l('Last Name')));
	  ?>
	  <?php if(!empty($type) && $type == 'patient') { 
		echo $this->Form->input('UserProfile.gender_id', array('label' => __l('Gender'),'options' => $genders,'empty' => __l('-- Select --'))); ?>
		<div class="input required date-time end-date-time-block clearfix">
			<div class="js-datetime">
				<?php echo $this->Form->input('UserProfile.dob', array('label' => __l('DOB'),'empty' => __l('Please Select'), 'div' => false, 'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'orderYear' => 'asc')); ?>
			</div>
        </div>
	 <?php } ?>
<?php if(!empty($type) && $type == 'patient') { ?>	 
<h4><?php echo __l('Create a login to manage your appointments.');?></h4>		
<?php } ?>
		<?php 
		echo $this->Form->input('username', array('label' => __l('Username')));
		echo $this->Form->input('email', array('label' => __l('Email')));
		
		if (!empty($this->request->data['User']['fb_user_id'])):
			echo $this->Form->input('fb_user_id', array('type' => 'hidden', 'value' => $this->request->data['User']['fb_user_id']));
			echo $this->Form->input('is_facebook_register', array('type' => 'hidden', 'value' => $this->request->data['User']['is_facebook_register']));
		endif;
		?>
		<?php 	echo $this->Form->input('UserProfile.phone'); 
		
		if(empty($this->request->data['User']['fb_user_id'])):
			echo $this->Form->input('passwd', array('label' => __l('Password')));
		endif;
		?>

		<?php if(!empty($type) && $type == 'doctor') { 
				echo $this->Form->input('UserProfile.zip');
				echo $this->Form->input('UserProfile.specialty_id', array('options' => $specialties,'empty' => __l('-- Select --'))); 
			//echo $this->Form->input('User.is_partner', array('label' => 'I want to be a partner' ));		
			 }		
		?>
		<?php 
		echo $this->Form->input('UserProfile.country_iso_code', array('type' => 'hidden'));
		echo $this->Form->input('State.name', array('type' => 'hidden'));
		echo $this->Form->input('City.name', array('type' => 'hidden'));
		echo $this->Form->input('user_type', array('type' => 'hidden','value' => $type));
		echo $this->Form->input('is_agree_terms_conditions', array('label' => sprintf(__l('I have read and accept %s %s'), Configure::read('site.name'),$this->Html->link(__l('Terms of Use'), array('controller' => 'nodes', 'action' => 'view', 'type'=>'page', 'slug'=>'terms'), array('target' => '_blank'))))); ?>
	</fieldset>
	<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Submit')); ?>
    </div>
      <?php echo $this->Form->end(); ?>
</div>
</div>
</div>