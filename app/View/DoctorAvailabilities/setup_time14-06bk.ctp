<div class="doctorAvailabilitiesSetuptime form clearfix js-responses js-response">
    <h2><?php echo __l('Set Aavailble times for this week');?></h2>
    <div class="clearfix">
        <div class="side1">
		  <div class="form-box">
            <div class="form-box-inner">
                <div class="button-place vlearfix">
                    <div class="button">
                        <?php echo $this->Html->link(__l('Update Consultation Fees'), array('controller' => 'doctor_availabilities', 'action' => 'edit',$doctorAvailability['DoctorAvailability']['id']), array('class' => 'add js-thickbox', 'title' => __l('Add'))); ?>
                    </div>
                </div>
                <?php echo $this->Calendar->setup_time($year, $month, $day, $data, $user_id, $clinic_id); ?>
            </div>
        </div>
    </div>
    <div class="side2">
        <?php echo $this->element('sidebar', array('config' => 'sec'));?>
    </div>
    </div>
</div>

