<div class="appointments index">
    <h2><?php echo __l('My Appointments') ?></h2>
    <div class="clearfix">
        <div class="side1">
        	<div class="clearfix js-tabs ">
        		<ul class="clearfix tab-menu">
        			<li><em>&nbsp;</em><?php echo $this->Html->link(__l('PendingApproval'), array('controller' => 'appointments', 'action' => 'index','status'=>'pendingapproval', 'admin' => false), array('data-target' => '#contest-pendingapproval','title' => __l('PendingApproval')));?></li>
        			<li><em>&nbsp;</em><?php echo $this->Html->link(__l('Approved'), array('controller' => 'appointments', 'action' => 'index','status'=>'approved', 'admin' => false), array('data-target' => '#contest-approved','title' => __l('Approved')));?></li>
        			<li><em>&nbsp;</em><?php echo $this->Html->link(__l('Cancelled'), array('controller' => 'appointments', 'action' => 'index','status'=>'cancelled', 'admin' => false), array('data-target' => '#contest-cancelled','title' => __l('Cancelled')));?></li>
        			<li><em>&nbsp;</em><?php echo $this->Html->link(__l('Rejected'), array('controller' => 'appointments', 'action' => 'index','status'=>'rejected', 'admin' => false), array('data-target' => '#contest-rejected','title' => __l('Rejected')));?></li>
        			<li><em>&nbsp;</em><?php echo $this->Html->link(__l('All'), array('controller' => 'appointments', 'action' => 'index','status'=>'all', 'admin' => false), array('data-target' => '#contest-all','title' => __l('All')));?></li>
        		</ul>
        		<div class='panel-container'>
        			<div id="contest-pendingapproval"></div>
        			<div id="contest-approved"></div>
        			<div id="contest-cancelled"></div>
        			<div id="contest-rejected"></div>
        			<div id="contest-all"></div>
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