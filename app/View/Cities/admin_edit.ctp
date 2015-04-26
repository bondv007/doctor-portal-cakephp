<?php /* SVN: $Id: $ */ ?>
<?php echo $this->Form->create('City', array('class' => 'normal','action'=>'edit'));?>
<?php
    echo $this->Form->input('id');
    echo $this->Form->input('country_id', array('empty' => __l('Please Select')));
    echo $this->Form->input('state_id', array('empty' => __l('Please Select')));
    echo $this->Form->input('name', array('label' => __l('Name')));
    echo $this->Form->input('is_approved', array('label' => __l('Approved?')));
?>
<div class="submit-block clearfix">
    <?php echo $this->Form->submit(__l('Update'));?>
</div>
<?php echo $this->Form->end();?>