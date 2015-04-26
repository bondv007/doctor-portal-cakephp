 <h2 class="title"><?php echo __l('Appointment');?></h2>
<div class="side1">
    <div class="calender-block clearfix">
    	<ul class="calendar-menu clearfix">
    		<li class="<?php echo ($this->request->params['named']['show'] == 'daily') ? 'active' : ''; ?>"><?php echo $this->Html->link(__l('by day'), array('controller' => 'doctor_availabilities', 'action' => 'index', $year, $month, $day, 'type' => 'calendar', 'show' => 'daily'), array('title' => __l('by day'))); ?></li>
    		<li class="<?php echo ($this->request->params['named']['show'] == 'weekly') ? 'active' : ''; ?>"><?php echo $this->Html->link(__l('by week'), array('controller' => 'doctor_availabilities', 'action' => 'index', $year, $month, $day, 'type' => 'calendar', 'show' => 'weekly'), array('title' => __l('by week'))); ?></li>
    		<li class="<?php echo ($this->request->params['named']['show'] == 'monthly') ? 'active' : ''; ?>"><?php echo $this->Html->link(__l('by month'), array('controller' => 'doctor_availabilities', 'action' => 'index', $year, $month, $day, 'type' => 'calendar', 'show' => 'monthly'), array('title' => __l('by month'))); ?></li>
       	</ul>
       	<div class="app-approved-block clearfix">
            <span class="app-rejected"><?php echo __l('Rejected') ?></span>
            <span class="app-cancelled"><?php echo __l('Cancelled') ?></span>
            <span class="app-approved"><?php echo __l('Approved') ?></span>
            <span class="app-pending"><?php echo __l('Pending Approval') ?></span>
        </div>
    </div>
	<div class="form-box">
          <div class="form-box-inner">
            <div class="js-calendar-responses cal-table-block">
            	<?php
            		if (!empty($this->request->params['named']['show']) && $this->request->params['named']['show'] == 'weekly'):
            			echo $this->Calendar->week($year, $month, $day, $data);
            		elseif (!empty($this->request->params['named']['show']) && $this->request->params['named']['show'] == 'daily'):
            			echo $this->Calendar->daily($year, $month, $day, $data);
            		else:
            			echo $this->Calendar->month($year, $month, $day, $data);
            		endif;
            	?>
            </div>
        </div>
    </div>
</div>
<div class="side2">
    <?php
        echo $this->element('sidebar', array('config' => 'sec'));
    ?>
</div>