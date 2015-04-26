<?php /* SVN: $Id: $ */ ?>
<div class="insurancePlans form">
 <div class="form-box">
  <div class="form-box-inner">
    <?php
	 	if(!empty($user_insurance_companies)): 
			foreach($user_insurance_companies as $user_insurance_company) :
	?>
		<h3><?php echo $this->Html->cText($user_insurance_company[0]);?></h3>
			<ul class="sub-plans">
			  <?php 
			  foreach($user_insurance_company as $id => $insurance_plan): ?>
			  <?php if($id != 0) { ?>
				  <li><?php echo $this->Html->cText($insurance_plan);?></li>		
			  <?php } ?>	  
				 <?php
				    endforeach;
				?>  
			 </ul> 
		  <?php
		    endforeach;
		endif;
	?>
	</div>
  </div>
</div>