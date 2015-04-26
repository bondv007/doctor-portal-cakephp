<?php /* SVN: $Id: $ */ ?>
<div class="userReviews form">
<?php echo $this->Form->create('UserReview', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('User Reviews'), array('action' => 'index'));?> &raquo; <?php echo __l('Add User Review');?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('review');
		echo $this->Form->input('user_rating_count');
		echo $this->Form->input('bedside_avg_rating');
		echo $this->Form->input('timing_avg_rating');
		echo $this->Form->input('overall_avg_rating');
		echo $this->Form->input('ip_id');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Add'));?>
</div>
