<?php /* SVN: $Id: $ */ ?>
<div class="clinicsUsers form">
<?php echo $this->Form->create('ClinicsUser', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Clinics Users'), array('action' => 'index'));?> &raquo; <?php echo __l('Edit Clinics User');?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('clinic_id');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Update'));?>
</div>
