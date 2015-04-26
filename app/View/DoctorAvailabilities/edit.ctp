<?php /* SVN: $Id: $ */ ?>
<div class="doctorAvailabilities form clearfix">
<div class="form-box">
                <div class="form-box-inner">
                    <h3 class="title"><?php echo __l('Doctor');?>: </h3>
                    <?php echo $this->Form->create('DoctorAvailability', array('class' => 'normal'));?>
                    	<?php
							echo $this->Form->input('id');
                    		echo $this->Form->input('is_with_assistant');
                    	  ?>
                    	  <div class="js-select-assistant hide">
							  <?php
								echo $this->Form->input('assistant_info');
							  ?>
                    	  </div>
                    	  <?php
                    		echo $this->Form->input('consultation_fees');
                    	   ?>
                    <div class="submit-block clearfix">
                    	<?php
                    		echo $this->Form->submit(__l('Update'));
                    	?>
                    </div>
                    <?php echo $this->Form->end();?>
        </div>
 </div>
 </div>