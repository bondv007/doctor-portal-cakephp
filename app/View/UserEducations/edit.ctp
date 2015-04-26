<?php /* SVN: $Id: $ */ ?>
<div class="userEducations form">
<h2 class="title"><?php echo __l('Edit Education');?></h2>
	<div class="clearfix">
    <div class="side1">
		<div class="form-box">
        <div class="form-box-inner">
       	<?php echo $this->Form->create('UserEducation', array('class' => 'normal'));
			echo $this->Form->input('id');
			echo $this->Form->input('education');
			echo $this->Form->input('location');
			echo $this->Form->input('organization');
		 ?>
		  <div class="input select required date-time end-date-time-block clearfix">
				<div class="js-datetime">
					<?php echo $this->Form->input('date', array('label' => __l('Date'),'empty' => __l('Please Select'), 'div' => false, 'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'orderYear' => 'asc')); ?>
				</div>
            </div>
		 <div class="submit-block clearfix">
			<?php 
				echo $this->Form->submit(__l('Update'));
			?>
		</div>
		<?php
			echo $this->Form->end();
		?>
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