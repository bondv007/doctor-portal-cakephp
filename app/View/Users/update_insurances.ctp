<?php /* SVN: $Id: $ */ ?>
<div class="insuranceCompanies form">
 <div class="form-box">
  <div class="form-box-inner">
<h3><?php echo $this->Html->cText($insurance_company['InsuranceCompany']['name']);?></h3>
<?php echo $this->Form->create('InsuranceCompany', array('class' => 'normal'));?>
	<div class="clearfix">
		<?php
			if(!empty($insurance_plans)) { ?>
            <div class="frame-block2 clearfix">
			<?php echo $this->Form->input('InsurancePlan', array('escape'=> false,'type'=>'select','multiple'=>'checkbox','label' => false,'options' => $insurance_plans)); ?>
            </div>
		<?php } else {
				echo __l('No Insurance Plans found');
			}
		?>
    </div>
 <?php if(!empty($insurance_plans)) { ?>	
  <div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Update')); ?>
  </div>
 <?php echo $this->Form->end(); ?>
 <?php } ?>
	</div>
  </div>
</div>