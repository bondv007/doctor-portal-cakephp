<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="appointments index js-response">
<div class="clearfix">
	<ul class="filter-list-block clearfix">
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstAppointmentStatus::PendingApproval) ? 'active-filter' : null; ?>
		<li class="green <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending_approval, false). '<span>' . __l('PendingApproval') . '</span>', array('controller' => 'appointments', 'action' => 'index', 'filter_id' => ConstAppointmentStatus::PendingApproval), array('title' => __l('PendingApproval'),'escape' => false)); ?></li>
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstAppointmentStatus::Approved) ? 'active-filter' : null; ?>
		<li class="gray <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($approved, false). '<span>' . __l('Approved') . '</span>', array('controller' => 'appointments', 'action' => 'index', 'filter_id' => ConstAppointmentStatus::Approved), array('title' => __l('Approved'),'escape' => false)); ?></li>
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstAppointmentStatus::Cancelled) ? 'active-filter' : null; ?>
		<li class="gray <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($cancelled, false). '<span>' . __l('Cancelled') . '</span>', array('controller' => 'appointments', 'action' => 'index', 'filter_id' => ConstAppointmentStatus::Cancelled), array('title' => __l('Cancelled'),'escape' => false)); ?></li>
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstAppointmentStatus::Rejected) ? 'active-filter' : null; ?>
		<li class="gray <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($rejected, false). '<span>' . __l('Rejected') . '</span>', array('controller' => 'appointments', 'action' => 'index', 'filter_id' => ConstAppointmentStatus::Rejected), array('title' => __l('Rejected'),'escape' => false)); ?></li>
		<?php $class = (empty($this->request->params['named']['filter_id']) && empty($this->request->params['named']['main_filter_id'])) ? 'active-filter' : null; ?>
		<li class="black <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending_approval + $approved + $cancelled + $rejected, false). '<span>' . __l('All') . '</span>', array('controller' => 'appointments', 'action' => 'index'), array('title' => __l('All'),'escape' => false)); ?></li>
	</ul>
</div>
<div class="clearfix">
    <div class="grid_left">
        <?php echo $this->element('paging_counter'); ?>
    </div>
</div>
<?php
	echo $this->Form->create('Appointment' , array('class' => 'normal','action' => 'update'));
?>
<?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>

<table class="list">
	<tr>
		<th class="Select"><?php echo __l('Select'); ?></th>
		<th class="dc"><?php echo __l('Actions'); ?></th>
		<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('User.username', __l('Patient')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('DoctorUser.username',__l('Doctor')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('appointment_date',__l('Appointment Date')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('appointment_time',__l('Appointment Time')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('phone',__l('Phone')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('SpecialtyDisease.name',__l('Reason for visit')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('InsuranceCompany.name',__l('Insurance')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('appointment_status_id',__l('Status')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('created',__l('Notification Action')); ?></div></th>
	</tr>
<?php
if (!empty($appointments)):
$i = 0;
foreach ($appointments as $appointment):
	$class = null;
	if ($i++ % 2 == 0):
		$class = "altrow";
	endif;
?>

	<tr class="<?php echo $class;?>">
		<td class="select" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Form->input('Appointment.'.$appointment['Appointment']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$appointment['Appointment']['id'], 'label' => false, 'class' => 'js-checkbox-list')); ?></td>
		<td  class="actions" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>>
							<div class="action-block">
								<span class="action-information-block">
									<span class="action-left-block">&nbsp;
									</span>
									<span class="action-center-block">
										<span class="action-info">
											<?php echo __l('Action');?>
										</span>
									</span>
								</span>
								<div class="action-inner-block">
									<div class="action-inner-left-block">
										<ul class="action-link clearfix">	
										<li><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $appointment['Appointment']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></li>
										</ul>
									</div>
									<div class="action-bottom-block"></div>
								</div>
							</div>
						 </td>
					<td class="dl" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->link($this->Html->cText($appointment['User']['username']), array('controller'=> 'users', 'action'=>'view', $appointment['User']['username'], 'admin' => false), array('escape' => false));?></td>
					<td class="dl" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->link($this->Html->cText($appointment['DoctorUser']['username']), array('controller'=> 'users', 'action'=>'view', $appointment['DoctorUser']['username'], 'admin' => false), array('escape' => false));?></td>
					<td class="dl" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->cDateTime($appointment['Appointment']['appointment_date']);?></td>	
					<td class="dl" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->cTime($appointment['Appointment']['appointment_time']);?></td>			
					<td class="dl" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->cText($appointment['Appointment']['phone']);?></td>
					<td class="dl" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->cText($appointment['SpecialtyDisease']['name']);?></td>		
					<td class="dl" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->cText($appointment['InsuranceCompany']['name']);?></td>						 
					<td class="dl" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->cText($appointment['AppointmentStatus']['name']);?></td>		
					<td class="dl" <?php if($appointment['Appointment']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php 		if($appointment['Appointment']['is_admin_notification'] == 1){ ?>
		<a href="javascript://" class="a_<?php echo $appointment['Appointment']['id'];  ?>" onclick="remove_notif('<?php echo $appointment['Appointment']['id']; ?>',2)">Clear</a>
			<?php }else{ echo '-'; } ?></td>				 
		</tr>
<?php
    endforeach;
else:
?>
	<tr>
		<td colspan="15" class="notice"><?php echo __l('No Appointments available');?></td>
	</tr>
<?php
endif;
?>
</table>

<?php
if (!empty($appointments)):
?>
    <div class="clearfix">
    <div class="grid_left admin-select-block">
    	<div>
    		<?php echo __l('Select:'); ?>
    		<?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all', 'title' => __l('All'))); ?>
    		<?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none', 'title' => __l('None'))); ?>
    	</div>
    	<div class="admin-checkbox-button"><?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?></div>
    </div>
    <div class="js-pagination grid_right">
        <?php echo $this->element('paging_links'); ?>
    </div>
    </div>
    <div class="hide">
	    <?php echo $this->Form->submit('Submit'); ?>
    </div>
<?php
endif;
echo $this->Form->end();
?>
</div>