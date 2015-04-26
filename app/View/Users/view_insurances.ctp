<?php /* SVN: $Id: $ */ ?>
<div class="insurancePlans form">
 <div class="form-box">
  <div class="form-box-inner">
    <h3><?php echo $this->Html->cText($insurance_company['InsuranceCompany']['name']);?></h3>
	<div class="clearfix">
		<ul class="sub-plans">
		<?php
			if(!empty($selected_insurance_plans)) :
				foreach($selected_insurance_plans as $selected_insurance_plan) :
		  ?>
		  <li><?php	echo $this->Html->cText($selected_insurance_plan);?>	
		  </li>		
		  <?php
			    endforeach;
		else:
		?>
	<li>
		<?php echo __l('No Insurance Plans available');?>
	</li>
		<?php
	endif;
	?>
	</ul>
    </div>
	</div>
  </div>
</div>