<?php /* SVN: $Id: $ */ ?>
<div class="answers form">
<?php echo $this->Form->create('Answer', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('question_id');
		echo $this->Form->input('answer');
		echo $this->Form->input('is_active');
	?>
	<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Add'));?>
    </div>
<?php echo $this->Form->end();?>
</div>
