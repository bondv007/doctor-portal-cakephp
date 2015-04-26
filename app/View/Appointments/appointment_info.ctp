<?php /* SVN: $Id: $ */ ?>
<div class="appointments form">
    <h2><?php echo __l('Book Your Appointment');?></h2>
    <div class="grid_13 step1">
        <ul class="stage clearfix">
        	<li class="step1 active"><?php echo __l('Appt Info');?></li>
        	<li class="step2"><?php echo __l('Patient Info');?></li>
        	<li class="step3"><?php echo __l('Details');?></li>
        	<li class="step4"><?php echo __l('Finish');?></li>
        </ul>
        <?php echo $this->Form->create('Appointment', array('class' => 'normal','action' => 'patient_info'));?>
        <div class="appointment-before-info">
    		   	<h3><?php echo __l('Have you visited this doctor before?');?></h3>
    			<?php $options=array('0'=>'I\'m a new patient.', '1'=>'I\'m an existing patient of this practice.'); ?>
    			<?php
                    $attributes=array('div'=>'js-radio-select',"class" => "js-patient-seen-before", 'default'=>__l('0'), 'separator' => '<br/>', 'legend'=>false);
    				echo $this->Form->radio('is_seen_before', $options, $attributes);
    			?>
            <div class="appointment-before2">
    			<h3><?php echo __l('What\'s the reason for your visit?');?></h3>
    			<?php echo $this->Form->input('SpecialtyDisease', array('escape'=> false,'type'=>'select','label' => false,'options' => $specialtyDiseases));?>
    			<div class="insurance-info js-use-insurance">
    				<h3><?php echo __l('Will you use insurance?');?></h3>
    				<?php echo $this->Form->input('InsuranceCompany', array('escape'=> false,'type'=>'select','label' => false,'options' => $insurances));?>
    			</div>
    		</div>
            <div class="submit-block clearfix">
                <?php echo $this->Form->submit(__l('Book Now'));?>
            </div>
    	 </div>
        <?php echo $this->Form->end();?>
    </div>
	<div class="appointment-doctor-details">
	 	<?php echo $this->element('doctor-details', array('user' => $user,'config' => 'sec')); ?>
	</div>
</div>