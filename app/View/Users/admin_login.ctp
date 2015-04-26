<div class="users form">
    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login')));?>
        <fieldset>
        <?php
			echo $this->Form->input(Configure::read('user.using_to_login'));
            echo $this->Form->input('passwd');
        ?>
        </fieldset>
    <?php
        echo $this->Html->link(__l('Forgot password?'), array(
            'admin' => false,
            'controller' => 'users',
            'action' => 'forgot_password',
        ), array(
            'class' => 'forgot',
        ));
        echo $this->Form->end(__l('Log In'));
    ?>
</div>