<div class="users form">
    <h2><?php echo __l('Reset password'); ?>: <?php echo $this->request->data['User']['username']; ?></h2>
    <?php echo $this->Form->create('User', array('url' => array('action' => 'reset_password')));?>
    <fieldset>
    <?php
        echo $this->Form->input('id');
        echo $this->Form->input('username', array('type' => 'hidden'));
        echo $this->Form->input('current_password', array('label' => __l('Current Password'), 'type' => 'password', 'value' => ''));
        echo $this->Form->input('password', array('label' => __l('New Password'), 'value' => ''));
    ?>
    </fieldset>

    <div class="buttons">
    <?php
        echo $this->Form->end(__l('Reset'));
        echo $this->Html->link(__l('Cancel'), array(
            'action' => 'index',
        ), array(
            'class' => 'cancel',
        ));
    ?>
    </div>
</div>