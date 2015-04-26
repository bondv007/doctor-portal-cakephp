<div class="users form">
    <h2><?php echo __l('Sign In'); ?></h2>
    <div class="form-box">
        <div class="form-box-inner">
		<h3><?php echo __l('Enter your e-mail and password to sign in.');?></h3>
        <?php
    	    echo $this->Form->create('User', array('action' => 'login', 'class' => 'normal')); ?>
            <div class="clearfix">
            <div class="login-block-l grid_left"><?php
    		echo $this->Form->input(Configure::read('user.using_to_login'), array('label' => __l(Configure::read('user.using_to_login')))); ?>
    	    <?php echo $this->Form->input('passwd', array('label' => __l('Password')));
    	?>

        <?php
    		echo $this->Form->input('User.is_remember', array('type' => 'checkbox', 'label' => __l('Remember me on this computer.')));
        ?>

        <?php
            $f = (!empty($_GET['f'])) ? $_GET['f'] : (!empty($this->request->data['User']['f']) ? $this->request->data['User']['f'] : (($this->request->url != 'admin/users/login' && $this->request->url != 'users/login') ? $this->request->url : ''));

        	if(!empty($f)) :
                echo $this->Form->input('f', array('type' => 'hidden', 'value' => $f));
            endif; ?>
            <div class="submit-block clearfix">
                <?php
            	echo $this->Form->submit(__l('Login'));
        	    ?>
    	   </div>
        </div>

        <div class="login-block-r grid_left">
    	
    	   <div class="forgot-password">
        	<?php if(!(!empty($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin')):	?>
        	<?php
        			echo $this->Html->link(__l('Create a new user account') , array('controller' => 'users',	'action' => 'register'),array('title' => __l('Signup')));
        		endif;
        	?>
			<?php
                echo $this->Html->link(__l('Forgot your password?') , array('controller' => 'users', 'action' => 'forgot_password', 'admin' => false),array('title' => __l('Forgot your password?')));
        	?>
        </div>
    	   </div>
    	   </div>
    	    <?php
            	echo $this->Form->end();
        	    ?>
		   
    	    
         </div>
    </div>
</div>