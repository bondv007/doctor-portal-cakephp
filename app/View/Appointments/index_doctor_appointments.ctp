<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
	<h2><?php echo __l('Appointments'); ?></h2>
	<div class="appointments index">
<div class="clearfix">
        <div class="side1">
		<div class="calender-block clearfix">
    	<ul class="calendar-menu clearfix">
    		<!-- <li class="<?php echo ($this->request->params['named']['stat'] == 'all') ? 'active' : ''; ?>"><?php echo $this->Html->link(__l('All'), array('controller' => 'appointments', 'action' => 'index', 'stat' => 'all'), array('title' => __l('All'))); ?></li>
    		<li class="<?php echo ($this->request->params['named']['stat'] == 'today') ? 'active' : ''; ?>"><?php echo $this->Html->link(__l('Today'), array('controller' => 'appointments', 'action' => 'index', 'stat' => 'today'), array('title' => __l('Today'))); ?></li>
    		<li class="<?php echo ($this->request->params['named']['stat'] == 'week') ? 'active' : ''; ?>"><?php echo $this->Html->link(__l('This Week'), array('controller' => 'appointments', 'action' => 'index', 'stat' => 'week'), array('title' => __l('by month'))); ?></li>
			<li class="<?php echo ($this->request->params['named']['stat'] == 'month') ? 'active' : ''; ?>"><?php echo $this->Html->link(__l('This Month'), array('controller' => 'appointments', 'action' => 'index', 'stat' => 'month'), array('title' => __l('This Month'))); ?></li> -->
				
				<li class="<?php echo ($this->request->params['named']['status'] == 'all') ? 'active' : ''; ?>"><em>&nbsp;</em><?php echo $this->Html->link(__l('All'), array('controller' => 'appointments', 'action' => 'index','status'=>'all', 'admin' => false), array('data-target' => '#contest-all','title' => __l('All')));?></li>
				<li class="<?php echo ($this->request->params['named']['status'] == 'pendingapproval') ? 'active' : ''; ?>"><em>&nbsp;</em><?php echo $this->Html->link(__l('PendingApproval'), array('controller' => 'appointments', 'action' => 'index','status'=>'pendingapproval', 'admin' => false), array('data-target' => '#contest-pendingapproval','title' => __l('PendingApproval')));?></li>
        			<li class="<?php echo ($this->request->params['named']['status'] == 'approved') ? 'active' : ''; ?>"><em>&nbsp;</em><?php echo $this->Html->link(__l('Approved'), array('controller' => 'appointments', 'action' => 'index','status'=>'approved', 'admin' => false), array('data-target' => '#contest-approved','title' => __l('Approved')));?></li>
        			<li class="<?php echo ($this->request->params['named']['status'] == 'cancelled') ? 'active' : ''; ?>"><em>&nbsp;</em><?php echo $this->Html->link(__l('Cancelled'), array('controller' => 'appointments', 'action' => 'index','status'=>'cancelled', 'admin' => false), array('data-target' => '#contest-cancelled','title' => __l('Cancelled')));?></li>
        			<li class="<?php echo ($this->request->params['named']['status'] == 'rejected') ? 'active' : ''; ?>"><em>&nbsp;</em><?php echo $this->Html->link(__l('Rejected'), array('controller' => 'appointments', 'action' => 'index','status'=>'rejected', 'admin' => false), array('data-target' => '#contest-rejected','title' => __l('Rejected')));?></li>
        			

       	</ul>
    </div>
            <div class="form-box">
                <div class="form-box-inner">
		<table class="list list2">
                    	<tr>
                    		<th class="dc"><div><?php echo __l('Appointment Info'); ?></div></th>
							<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('user_id',__l('Patient\'s Name')); ?></div></th>
							<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('email',__l('Doctor\'s Name')); ?></div></th>
                    		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('appointment_date',__l('Appointment Date')); ?></div></th>
							<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('appointment_time',__l('Appointment time')); ?></div></th>
                    		<th class="dc"><?php echo __l('Status'); ?></th>
                    	</tr>
                     <?php
                        if (!empty($appointments)):
                        $i = 0;
                        foreach ($appointments as $appointment):
                        	$class = null;
                        	if ($i++ % 2 == 0) :
                        		$class = ' class="altrow"';
                            endif;
                        ?>
                        	<tr<?php echo $class;?>>
                        		<td class="dc"><?php echo $this->Html->link($this->Html->cText(__l('Details')), array('controller'=> 'appointments', 'action' => 'view', $appointment['Appointment']['id']), array('escape' => false));?></td>
                				<td class="dl"><?php echo $this->Html->cText(ucfirst($appointment['Appointment']['first_name']. ' ' . $appointment['Appointment']['last_name']));?></td>
								<td class="dl"><?php echo $this->Html->cText($appointment['DoctorUser']['username']);?></td>
								<td class="dl"><?php echo $this->Html->cText($appointment['Appointment']['appointment_date']);?></td>
								<td class="dl"><?php echo $this->Html->cText($appointment['Appointment']['appointment_time']);?></td>
								<td class="dl"><?php echo $this->Html->cText($appointment['AppointmentStatus']['name']);?></td>
                        	</tr>
                        <?php
                            endforeach;
                        else:
                        ?>
                        	<tr>
                        		<td colspan="7"><p class="notice"><?php echo __l('No upcoming appointments...');?></p></td>
                        	</tr>
                        <?php
                        endif;
                        ?>
                    </table>
		 <?php
    if (!empty($appointments)) {
        ?>
            <div class="js-pagination">
                <?php echo $this->element('paging_links'); ?>
            </div>
        <?php
    }
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
