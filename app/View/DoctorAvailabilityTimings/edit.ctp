<div class="doctorAvailabilityTimings form">
  <div class="form-box">
    <div class="form-box-inner">
	<h3><?php echo $this->Html->cText($this->request->data['DoctorAvailabilityTiming']['availability_date']);?></h3>
<?php echo $this->Form->create('DoctorAvailabilityTiming');?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('timings', array('label' => 'Update Available Timings','class' => 'js-choosen-select','type' =>'select','multiple' => true, 'value' => $settimings,'options' => $timeslots));
	?>
<?php echo $this->Form->end(__('Submit'));?>
		</div>
	</div>
</div>