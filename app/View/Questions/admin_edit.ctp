<?php /* SVN: $Id: $ */ ?>
<div class="questions form">
<?php echo $this->Form->create('Question', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('question');
		echo $this->Form->input('is_active');
	?>
<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Update'));?>
    </div>
 <?php echo $this->Form->end();?>
</div>
