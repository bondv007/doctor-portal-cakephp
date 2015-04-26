<?php /* SVN: $Id: $ */ ?>
<div class="languagesUsers form">
<?php echo $this->Form->create('LanguagesUser', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Languages Users'), array('action' => 'index'));?> &raquo; <?php echo __l('Add Languages User');?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('language_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Add'));?>
</div>
