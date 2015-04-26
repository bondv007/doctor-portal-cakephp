<div class="users form js-responses">
    <h2><?php echo __l('Register with '); ?><?php echo Configure::read('site.name');?></h2>
    <ul class="stage clearfix">
    	<li class="step1"><?php echo __l('Create a Profile');?></li>
    	<li class="step2 active"><?php echo __l('Enter Your Phone Number');?></li>
    	<li class="step3"><?php echo __l('Verify Your Phone Number');?></li>
    </ul>
    <h3><?php echo __l('Enter Your Mobile Number');?></h3>
    <div class="form-box">
        <div class="form-box-inner">
            <?php echo $this->Form->create('User', array('action' => 'enter_mobile_number', 'class' => 'normal vertical')); ?>
            <fieldset>
                <h4><?php echo __l('The doctors, professionals need your phone number to verify your appointments.');?></h4>
                <?php
            		echo $this->Form->input('UserProfile.phone', array('label' => __l('Mobile')));
            	?>
                <h4><?php echo __l('We need to call you right now to verify the number');?></h4>
            	<div class="insteat-message">
                   <?php
                    	echo $this->Form->input('is_send_text_message', array('label' => __l('Send me a text message instead.')));
                    	echo $this->Form->input('User.id',array('type'=>'hidden'));
                	?>
                </div>
            </fieldset>
        	<div class="submit-block clearfix">
                <?php echo $this->Form->submit(__l('Submit')); ?>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>