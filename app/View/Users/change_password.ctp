<?php if (empty($this->request->params['prefix'])): ?>
<h2 class="title"><?php echo __l('Change Password'); ?></h2>
<?php endif; ?>
<div class="clearix">
    <div class="side1">
        <div class="form-box">
            <div class="form-box-inner">
                <?php
                	echo $this->Form->create('User', array('action' => 'change_password' ,'class' => 'normal'));
                	if($this->Auth->user('role_id') == ConstUserTypes::Admin) :
                    	echo $this->Form->input('user_id', array('empty' => 'Select'));
                    endif;
                    if($this->Auth->user('role_id') != ConstUserTypes::Admin) :
                        echo $this->Form->input('user_id', array('type' => 'hidden'));
                    	echo $this->Form->input('old_password', array('type' => 'password','label' => __l('Old Password') ,'id' => 'old-password'));
                    endif;
                    echo $this->Form->input('passwd', array('type' => 'password','label' => __l('New Password') , 'id' => 'new-password'));
                	echo $this->Form->input('confirm_password', array('type' => 'password', 'label' => __l('Confirm Password')));
                ?>
                <div class="submit-block clearfix">
                    <?php
                	echo $this->Form->submit(__l('Change password'));
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