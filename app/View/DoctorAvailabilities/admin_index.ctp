<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="doctorAvailabilities index">
<h2><?php echo __l('Doctor Availabilities');?></h2>
<?php echo $this->element('paging_counter');?>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($doctorAvailabilities)):

$i = 0;
foreach ($doctorAvailabilities as $doctorAvailability):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($doctorAvailability['DoctorAvailability']['id']);?></p>
		<p><?php echo $this->Html->cDateTime($doctorAvailability['DoctorAvailability']['created']);?></p>
		<p><?php echo $this->Html->cDateTime($doctorAvailability['DoctorAvailability']['modified']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($doctorAvailability['Clinic']['name']), array('controller'=> 'clinics', 'action' => 'view', $doctorAvailability['Clinic']['slug']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($doctorAvailability['User']['username']), array('controller'=> 'users', 'action' => 'view', $doctorAvailability['User']['username']), array('escape' => false));?></p>
		<p><?php echo $this->Html->cDateTime($doctorAvailability['DoctorAvailability']['appointment_date']);?></p>
		<p><?php echo $this->Html->cText($doctorAvailability['DoctorAvailability']['appointment_time']);?></p>
		<p><?php echo $this->Html->cBool($doctorAvailability['DoctorAvailability']['is_with_assistant']);?></p>
		<p><?php echo $this->Html->cText($doctorAvailability['DoctorAvailability']['assistant_info']);?></p>
		<p><?php echo $this->Html->cFloat($doctorAvailability['DoctorAvailability']['consultation_fees']);?></p>
		<p><?php echo $this->Html->cInt($doctorAvailability['DoctorAvailability']['status']);?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $doctorAvailability['DoctorAvailability']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $doctorAvailability['DoctorAvailability']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Doctor Availabilities available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($doctorAvailabilities)) {
    echo $this->element('paging_links');
}
?>
</div>
