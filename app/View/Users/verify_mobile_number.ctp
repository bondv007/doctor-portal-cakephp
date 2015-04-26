<div class="users form js-responses">
<h2><?php echo __l('Register with '); ?><?php echo Configure::read('site.name');?></h2>
<ul class="stage clearfix">
	<li class="step1"><?php echo __l('Create a Profile');?></li>
	<li class="step2"><?php echo __l('Enter Your Phone Number');?></li>
	<li class="step3 active"><?php echo __l('Verify Your Phone Number');?></li>
</ul>
<h3><?php echo __l('Verify Your Phone Number');?></h3>
<div class="form-box">
        <div class="form-box-inner">
<?php echo $this->Form->create('User', array('action' => 'verify_mobile_number', 'class' => 'normal vertical')); ?>
  	<h4><?php echo __l('Did you get the code on your phone?');?></h4>
    <div class="if-yes">
        <fieldset>
        	<p><span><?php echo __l('Enter the 3-digit code that we gave you on the phone.');?></span></p>
        	<?php
        		echo $this->Form->input('User.mobile_one_time_password', array('label' => false));
        		echo $this->Form->input('User.id',array('type'=>'hidden', 'value' => $user_id));
        	  ?>
          	<div class="submit-block clearfix">
                <?php echo $this->Form->submit(__l('Submit')); ?>
            </div>
    	</fieldset>
    </div>
    <div class="if-no">
        <p><?php echo sprintf(__l('That\'s OK.'));?></p>
        <p><?php echo sprintf(__l('Let\'s %s '),$this->Html->link('go back and try again', array('controller' => 'users', 'action' => 'enter_mobile_number',$user_id)));?></p>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</div>
</div>