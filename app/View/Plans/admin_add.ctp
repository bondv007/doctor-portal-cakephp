<?php /* SVN: $Id: $ */ ?>
<div class="plans form">
<?php echo $this->Form->create('Plan', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('amount');
		echo $this->Form->input('duration');
		echo $this->Form->input('is_active');
	?>
	<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Add'));?>
    </div>
<?php echo $this->Form->end();?>
</div>
