<?php /* SVN: $Id: $ */ ?>
<div class="specialtyDiseasesUsers form">
<?php echo $this->Form->create('SpecialtyDiseasesUser', array('class' => 'normal'));?>
	<fieldset>
 		<legend><?php echo $this->Html->link(__l('Specialty Diseases Users'), array('action' => 'index'));?> &raquo; <?php echo __l('Add Specialty Diseases User');?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('specialty_disease_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__l('Add'));?>
</div>
