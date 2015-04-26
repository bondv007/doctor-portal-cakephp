<?php /* SVN: $Id: $ */ ?>
<div class="doctorAvailabilities form js-doctor_availability-over-block">
    <h2><?php echo __l('Add Available Info');?></h2>
    <div class="clearfix">
        <div class="side1">
            <div class="form-box">
                <div class="form-box-inner">
					<?php 
						if(!empty($user['UserProfile']['first_name']) and !empty($user['UserProfile']['last_name']))
						{
							$doctor_name = $user['UserProfile']['first_name'].' '.$user['UserProfile']['last_name'];
						} else {
							$doctor_name = $user['User']['username'];
						}	
					?>
                    <h3><?php echo __l('Doctor');?>: <?php echo $this->Html->cText($doctor_name);?></h3>
					<?php if(!empty($user['Clinic']['name'])) { ?>
	                    <div><?php echo __l('Clinic');?>: <?php echo $this->Html->cText($user['Clinic']['name']);?></div>
					<?php } ?>	
					
					<?php echo $this->Form->create('DoctorAvailability', array('class' => 'normal'));?>
                    	
						<?php
                    		echo $this->Form->input('user_id',array('type' => 'hidden'));
							echo $this->Form->input('is_with_assistant');
                    	  ?>
                    	  <div class="js-select-assistant">
							  <?php
								echo $this->Form->input('assistant_info');
							  ?>
                    	  </div>
                    	  <?php
                    		echo $this->Form->input('consultation_fees');
                    	   ?>
                    <div class="submit-block clearfix">
                    	<?php
                    		echo $this->Form->submit(__l('Setup Available'));
                    	?>
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