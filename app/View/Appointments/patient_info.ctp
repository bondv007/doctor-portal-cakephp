<?php /* SVN: $Id: $ */ ?>
<div class="appointments form js-response js-responses">
    <h2><?php echo __l('Book Your Appointment');?></h2>
    <div class="grid_13">
        <ul class="stage clearfix">
        	<li class="step1 active"><?php echo __l('Appt Info');?></li>
        	<li class="step2 active"><?php echo __l('Patient Info');?></li>
        	<li class="step3"><?php echo __l('Details');?></li>
        	<li class="step4"><?php echo __l('Finish');?></li>
        </ul>
        <?php echo $this->Form->create('Appointment', array('class' => 'normal','action' => 'add'));?>
        <div class="appointment-before-info">
    	   	<h3><?php echo __l('Who will be seeing the doctor?');?></h3>
    		<div class="visitor-block clearfix">
                <div class="visitor-input">
                <?php
        			if(!empty($user['Patient']['UserProfile']['first_name']) and !empty($user['Patient']['UserProfile']['last_name'])) {
        				$name = ucfirst($user['Patient']['UserProfile']['first_name']. ' ' .$user['Patient']['UserProfile']['last_name']);
        			} else {
        				$name = ucfirst($user['Patient']['User']['username']);
        			}
        			$options=array('0' =>$name);
        			$attributes=array("class" => "js-patient-me", 'legend'=>false, 'checked' =>'checked');
        			echo $this->Form->radio('patient_id', $options, $attributes);
        			echo __l(' (Me)');
        		?>
        		</div>
        		<div class="js-guest-patient">
                    <?php echo $this->Html->link(__l('Add a new patient'), '#', array('class' => 'add js-add-patient','title' => __l('Add a new patient')));?>
                </div>
            </div>
    		<div class="js-existing-patient-info">
    			<?php
    				echo $this->Form->input('first_name', array('value' => $user['Patient']['UserProfile']['first_name']));
    				echo $this->Form->input('last_name', array('value' => $user['Patient']['UserProfile']['last_name']));
    				echo $this->Form->input('zip_code', array('value' => $user['Patient']['UserProfile']['zip_code']));
    				echo $this->Form->input('gender_id', array('label' => 'Sex','value' => $user['Patient']['UserProfile']['gender_id']));
    			?>
    			<!-- <div class="input select required date-time end-date-time-block clearfix">
    				<div class="js-datetime">
    				<?php echo $this->Form->input('dob', array('label' => __l('Date of Birth'),'empty' => __l('Please Select'), 'div' => false, 'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'orderYear' => 'asc'));  echo $user['Patient']['UserProfile']['dob']; ?>
        	        </div> -->
               </div>
    		</div>

    			<div class="patient-info js-add-patient-hide-info hide">
    				<?php
    					echo $this->Form->input('guest_first_name');
    					echo $this->Form->input('guest_last_name');
    					echo $this->Form->input('guest_email');
    				?>
    			
			  <?php echo $this->Form->input('guest_gender_id', array('empty' => __l('Please Select'), 'options' => $genders));
			  ?>
			</div>
            <?php
        	  echo $this->Form->input('patient_id', array('type' => 'hidden', 'value' => $user['Patient']['User']['id']));
        	  echo $this->Form->input('doctor_user_id', array('type' => 'hidden', 'value' => $user['Doctor']['User']['id']));
        	  echo $this->Form->input('is_seen_before', array('type' => 'hidden', 'value' => $data['Appointment']['is_seen_before']));
        	  echo $this->Form->input('specialty_disease_id', array('type' => 'hidden', 'value' => $data['Appointment']['SpecialtyDisease']));
        	  echo $this->Form->input('insurance_company_id', array('type' => 'hidden', 'value' => $data['Appointment']['InsuranceCompany']));
            ?>
            <div class="submit-block clearfix">
                <?php echo $this->Form->submit(__l('Continue'));?>
            </div>
            <?php echo $this->Form->end();?>
        </div>
    </div>
    <div class="appointment-doctor-details">
     	<?php echo $this->element('doctor-details', array('user' => $user,'config' => 'sec')); ?>
    </div>
</div>
