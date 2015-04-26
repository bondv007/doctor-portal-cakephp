<div class="users form">
    <h2><?php echo __l('Sign Up'); ?></h2>
    <div class="form-box">
        <div class="form-box-inner">
            <div class="patient-block">
                <p><?php echo __l('Looking to make an appointment with Doctors in your area? ');?>
                    <div class="clearfix">
                        <div class="button">
            		      <?php echo $this->Html->link(__l('I\'m looking for a Doctor'), array('controller' => 'users', 'action' => 'register'), array('title' => __l('I\'m looking for a Doctor')));?>
                		</div>
                    </div>
                </div>
                <div class="doctor-block">
        		  <p><?php echo __l('Looking to become a member of network of practioners? Sign up to start taking appointments.');?>
            		<div class="clearfix">
                		<div class="button-green">
                            <?php echo $this->Html->link(__l('I am a Doctor'), array('controller' => 'doctor', 'action' => 'user', 'register'), array('title' => __l('I am a Doctor')));?> 
						</div>
						<!-- <?php echo __l('(or)');?> 
						 <?php if(Configure::read('facebook.is_enabled_facebook_connect')):  ?>
    						<?php echo $this->Html->link(__l('Sign in with Facebook'), array('controller' => 'users', 'action' => 'login','type'=>'facebook', 'admin'=>false), array('title' => __l('Sign in with Facebook'), 'escape' => false)); ?>
		    			 <?php endif; ?> -->
                    </div>
                </div>
        </div>
    </div>
</div>