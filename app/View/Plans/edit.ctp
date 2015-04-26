<?php /* SVN: $Id: $ */ ?>
<div class="plans form">
<?php echo $form->create('Plan', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $html->link(__l('Plans'), array('action' => 'index'));?> &raquo; <?php echo __l('Edit Plan');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('plan_user_count');
		echo $form->input('amount');
		echo $form->input('duration');
		echo $form->input('is_active');
	?>
	</fieldset>
<?php echo $form->end(__l('Update'));?>
</div>
