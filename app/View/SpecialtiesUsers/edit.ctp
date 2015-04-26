<?php /* SVN: $Id: $ */ ?>
<div class="specialtiesUsers form">
<?php echo $this->Form->create('SpecialtiesUser', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Specialties Users'), array('action' => 'index'));?> &raquo; <?php echo __l('Edit Specialties User');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('specialty_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Update'));?>
</div>
