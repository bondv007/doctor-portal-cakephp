<?php /* SVN: $Id: $ */ ?>
<div class="clinics form clearfix">
<h2 class="title"><?php echo __l('Edit Clinic');?></h2>
<div class="clearfix">
        <div class="side1">
        	<div class="form-box">
                <div class="form-box-inner">
<?php echo $this->Form->create('Clinic', array('class' => 'normal js-clinic-map','enctype' => 'multipart/form-data')); ?>
	<h3 class="genral"><?php echo __l('Account'); ?></h3>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('label' => __l('Clinic Name')));
		echo $this->Form->input('phone');
    	echo $this->Form->input('description', array('label' => __l('Clinic Info'), 'type' => 'textarea'));
	?>
	<?php echo $this->Form->input('is_active',array('label' =>__l('Active?')));?>
	<h3 class="genral"><?php echo __l('Address'); ?></h3>
    <?php 
			echo $this->Form->input('address',array('label' => __l('Address1')));
			echo $this->Form->input('address2',array('label' => __l('Address2')));
			echo $this->Form->input('country_id',array('label' => __l('Country'),'empty' => __l('Please Select')));
			echo $this->Form->autocomplete('State.name', array('label' => __l('State'), 'acFieldKey' => 'State.id', 'acFields' => array('State.name'), 'acSearchFieldNames' => array('State.name'), 'maxlength' => '255'));
			echo $this->Form->autocomplete('City.name', array('label' => __l('City'), 'id' =>'ClinicCityName','acFieldKey' => 'City.id', 'acFields' => array('City.name'), 'acSearchFieldNames' => array('City.name'), 'maxlength' => '255'));		
			echo $this->Form->input('zip',array('label' => __l('Zip')));	
	?>
	<h3 class="genral"><?php echo __l('Locate yourself on google maps'); ?></h3>
			<div id="js-map-container"></div>
	<?php
				echo $this->Form->input('latitude',array('type' => 'hidden', 'id'=>'latitude'));
				echo $this->Form->input('longitude',array('type' => 'hidden', 'id'=>'longitude'));
				echo $this->Form->input('map_zoom_level',array('value' => '15','type' => 'hidden','id'=>'zoomlevel'));
			?>		
	<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Update'));?>
    </div>
 <?php echo $this->Form->end();?>
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
