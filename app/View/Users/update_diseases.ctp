<?php /* SVN: $Id: $ */ ?>
<div class="specialties form">
 <div class="form-box">
    <div class="form-box-inner">
    <h3><?php echo $this->Html->cText($specialty['Specialty']['name']);?></h3>
<?php echo $this->Form->create('Specialty', array('class' => 'normal'));?>
	<div class="clearfix">
		<?php
			if(!empty($specialty_diseases)) {
				echo $this->Form->input('SpecialtyDisease', array('escape'=> false,'type'=>'select','multiple'=>'checkbox','label' => false,'options' => $specialty_diseases));
			} else {
				echo __l('No Diseases found');
			}
		?>
    </div>
 <?php if(!empty($specialty_diseases)) { ?>	
  <div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Update')); ?>
  </div>
 <?php echo $this->Form->end(); ?>
 <?php } ?>
	</div>
  </div>
</div>