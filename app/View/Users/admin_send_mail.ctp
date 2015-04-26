<h2><?php echo __l('Email to users');?></h2>
<div>
    <?php
    	echo $this->Form->create('User', array('action' => 'send_mail', 'class' => 'normal'));
    	echo $this->Form->input('bulk_mail_option_id', array('empty' => 'Select'));
    	echo $this->Form->autocomplete('send_to', array('id' => 'message-to', 'acFieldKey' => 'User.send_to_user_id',
                        				    'acFields' => array('User.email'),
    				                        'acSearchFieldNames' => array('User.email'),
                                            'maxlength' => '100', 'acMultiple' => true
                                           ));
        echo $this->Form->input('subject');
      	echo $this->Form->input('message', array('type' => 'textarea'));
    	echo $this->Form->end(__l('Send'));
    ?>
</div>