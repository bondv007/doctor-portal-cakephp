<?php 
	$disabled = '';
	if(count($insurance_plans) == 1) {
		$disabled = 'disabled=>disabled';		
	}
?>
<div class="input select">
 <?php echo $this->Form->input('InsurancePlan.insurance_plan_id',array('label' => false,'options' => $insurance_plans, $disabled)); ?>
</div>