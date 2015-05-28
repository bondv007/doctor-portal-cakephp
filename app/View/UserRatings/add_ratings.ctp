<?php 
/*
 * 1. Hospital (hygiene)
2. Doctor
3. Staff Hospitality
 * */
//echo $this->Html->script(array('libs/jquery.rateyo'));
?>
<div class="userRatings form">
<?php echo $this->Form->create('UserRating', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('User Ratings'), array('action' => 'index'));?> &raquo; <?php echo __l('Add User Rating');?></legend>
	
	<div class="form-group">
		<div id="rateYo"></div>
	</div>
	<?php
		echo $this->Form->input('user_review_id');
		echo $this->Form->input('user_rating_category_id');
		echo $this->Form->input('rating');
		echo $this->Form->input('ip_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Add'));?>
</div>

