<?php /* SVN: $Id: $ */ ?>
<div class="userRatings form">
<?php echo $this->Form->create('UserRating', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('User Ratings'), array('action' => 'index'));?> &raquo; <?php echo __l('Edit User Rating');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_review_id');
		echo $this->Form->input('user_rating_category_id');
		echo $this->Form->input('rating');
		echo $this->Form->input('ip_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Update'));?>
</div>
