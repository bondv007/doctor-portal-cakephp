<?php /* SVN: $Id: $ */ ?>
<div class="specialtyDiseases form">
<?php echo $this->Form->create('SpecialtyDisease', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('specialty_id');
		echo $this->Form->input('name');
		echo $this->Form->input('is_active');
	?>
	<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Update'));?>
    </div>
 <?php echo $this->Form->end();?>
</div>
