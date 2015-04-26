<?php /* SVN: $Id: $ */ ?>
<div class="specialties form">
 <div class="form-box">
    <div class="form-box-inner">
    <h3><?php echo $this->Html->cText($specialty['Specialty']['name']);?></h3>
	<div class="clearfix">
		<ul class="sub-plans">
		<?php
			if(!empty($selected_specialty_diseases)) :
				foreach($selected_specialty_diseases as $selected_specialty_disease) :
		  ?>
		  <li><?php	echo $this->Html->cText($selected_specialty_disease);?>	
		  </li>		
		  <?php
			    endforeach;
		else:
		?>
	<li>
		<?php echo __l('No Specialty Diseases available');?>
	</li>
		<?php
	endif;
	?>
	</ul>
    </div>
	</div>
  </div>
</div>