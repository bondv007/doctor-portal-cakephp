<?php /* SVN: $Id: $ */ ?>
<div class="userRatingCategories form">
<?php echo $this->Form->create('UserRatingCategory', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('is_active');
	?>
	<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Update'));?>
    </div>
     <?php echo $this->Form->end();?>
</div>
