<?php echo $this->Form->create('User', array('class' => 'form-appointment clearfix','type' => 'get', 'action'=>'search'));?>
<div class="grid_left">
    <div class="app-specialty">
    	<div class="input select">
    		<label for="FindDoctor"><?php echo __l('Find a Doctors');?></label>
			<?php echo $this->Form->input('doctor_specialty_id', array('label' => false,'options' => $specialties,'empty' => __l('All Specialty')));  ?>
    	</div>
    </div>
	<div class="app-city">
    	<div class="input text">
    		<label for="ZipCode"><?php echo __l('in your zip code (or) City');?></label>
			<?php echo $this->Form->input('zip_code',array('label' =>false, 'class' => 'zipCodeCity', 'id' => 'ZipCode')); ?>
    	</div>
    </div>
	<div class="app-insurance">
    	<div class="input select">
    		<label for="WhoAccepts"><?php echo __l('Who accepts');?></label>
        	<?php echo $this->Form->input('insurance_id',array('label' =>false,'options' => $insurances)); ?>
    	</div>
    </div>
</div>
<?php echo $this->Form->submit(__l('View Appointments'));?>
<?php echo $this->Form->end();?>