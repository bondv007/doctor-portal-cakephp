<?php /* SVN: $Id: $ */ ?>
<div class="insurancePlans form">
<?php echo $this->Form->create('InsurancePlan', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('insurance_company_id');
		echo $this->Form->input('is_active');
	?>
	<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Add'));?>
    </div>
<?php echo $this->Form->end();?>
</div>
