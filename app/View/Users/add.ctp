<?php /* SVN: $Id: $ */ ?>
<div class="users form clearfix">
<h2 class="title"><?php echo __l('Add Doctor');?></h2>
<div class="clearfix">
        <div class="side1">
        	<div class="form-box">
                <div class="form-box-inner">
<?php echo $this->Form->create('User', array('class' => 'normal')); ?>
	<?php
		echo $this->Form->input('clinic_id',array('options'=>$clinics));
		echo $this->Form->input('UserProfile.first_name');
		echo $this->Form->input('UserProfile.last_name');
		echo $this->Form->input('UserProfile.phone');
		echo $this->Form->input('email');
		echo $this->Form->input('UserProfile.specialty_id', array('options' => $specialties,'empty' => __l('-- Select --'))); 
		echo $this->Form->input('username');
		echo $this->Form->input('passwd', array('label' => __l('Password')));
	?>
	<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Add'));?>
    </div>
 <?php echo $this->Form->end();?>
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