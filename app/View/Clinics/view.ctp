<?php /* SVN: $Id: $ */ ?>
<div class="clinics view">
<h2><?php echo __l('Clinic Details');?></h2>
<div class="clearfix">
 <div class="side1">
<div class="form-box">
   <div class="form-box-inner clearfix">
   <h3 class="genral"><?php echo __l('Account'); ?></h3>
	<dl class="list appointments-list clearfix">
		<dt><?php echo __l('Name');?></dt>
			<dd><?php echo $this->Html->cText($clinic['Clinic']['name']);?></dd>
		<dt><?php echo __l('Telephone');?></dt>
			<dd><?php echo $this->Html->cText($clinic['Clinic']['phone']);?></dd>
		<dt><?php echo __l('Active');?></dt>
			<dd><?php echo $this->Html->cBool($clinic['Clinic']['is_active']);?></dd>
	 </dl>
	<h3 class="genral"><?php echo __l('Address'); ?></h3>
	<dl class="list appointments-list clearfix"> 		
		<dt><?php echo __l('Address');?></dt>
			<dd><?php echo $this->Html->cText($clinic['Clinic']['address']);?></dd>
		<dt><?php echo __l('City');?></dt>
			<dd><?php echo $this->Html->cText($clinic['City']['name']);?></dd>
		<dt><?php echo __l('State');?></dt>
			<dd><?php echo $this->Html->cText($clinic['State']['name']);?></dd>					
		<dt><?php echo __l('Zipcode');?></dt>
			<dd><?php echo $this->Html->cText($clinic['Clinic']['zip']);?></dd>
	</dl>
	<h3 class="genral"><?php echo __l('About Clinic'); ?></h3>
	<dl class="list appointments-list clearfix"> 		 		
		<dt><?php echo __l('Clinic Info');?></dt>
			<dd><?php echo $this->Html->cText($clinic['Clinic']['description']);?></dd>
	</dl>
	<div class="hide">
			<span id='js-view-clinic'><?php echo 'clinic';?></span>
			<span id='js-view-latitude'><?php echo $clinic['Clinic']['latitude'];?></span>
			<span id='js-view-longitude'><?php echo $clinic['Clinic']['longitude'];?></span>
			<span id='js-view-zoom'><?php echo !empty($clinic['Clinic']['zoom_level']) ? $clinic['Clinic']['zoom_level'] : '15';?></span>
			<span id='js-view-address'><?php echo $clinic['Clinic']['address'];?>,<?php echo $clinic['City']['name'];?>,<?php echo $clinic['State']['name'];?>,<?php echo $user['Clinic']['zip'];?></span>
		</div>
	<h3 class="genral"><?php echo __l('Locate yourself on google maps'); ?></h3>		
		<div class="clearfix">
			<div class="js-view-doctor-location-map">
 				<div id="js-map-view-container"></div>
		   	</div>
	   	</div>
		  <div class="submitblock clearfix">
			 <div class="grid_right button">
       		  <?php echo $this->Html->link(__l('Edit'), array('controller' => 'clinics', 'action' => 'edit', $clinic['Clinic']['id'],'admin' => false), array( 'title' => __l('Edit'))); ?>
             </div>
		 </div>
   </div>
 </div>	
</div>
<div class="side2">
    <?php
    	echo $this->element('sidebar', array('config' => 'sec'));
    ?>
</div>
</div>
</div>