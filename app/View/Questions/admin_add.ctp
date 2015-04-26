<?php /* SVN: $Id: $ */ ?>
<div class="questions form">
<?php echo $this->Form->create('Question', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('question', array('label' => __l('Add a Question')));
		echo $this->Form->input('specialty_id', array('options' => $specialties,'empty' => __l('-- Select --')));
		echo $this->Form->input('description', array('label' => __l('More Details')));
		echo $this->Form->input('is_active');
	?>
<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Add'));?>
    </div>
<?php echo $this->Form->end();?>
</div>
