<div class="users stats js-response js-responses clearfix">
	<div class="grid_19 omega alpha">
    	            <?php //echo $this->element('admin-charts-stats', array('cache' => array('config' => 'sec'))); ?>
        
       </div>
	<div class="grid_5 dashboard-side2 omega alpha grid_right">
	<div class="admin-chart-block">
    	<div class="page-title-info">
                <h3><?php echo __l('Timings'); ?></h3>
        </div>
       	<div class="admin-center-block">
            <ul class="admin-dashboard-links">
                <li>
                	<?php $title = ' title="' . strftime(Configure::read('site.datetime.tooltip') , strtotime('now')) . ' ' . Configure::read('site.timezone_offset') . '"'; ?>
                    <?php echo __l('Current time: '); ?><span <?php echo $title; ?>><?php echo strftime(Configure::read('site.datetime.format')); ?></span>
                </li>
                <li>
                    <?php echo __l('Last login: '); ?><?php echo $this->Html->cDateTimeHighlight($this->Auth->user('last_logged_in_time')); ?>
                </li>
            </ul>
		</div>
	</div>
    <div class="js-cache-load  admin-chart-block js-cache-load-recent-users {'data_url':'admin/users/recent_users', 'data_load':'js-cache-load-recent-users'}">
		<?php echo $this->element('users-admin_recent_users', array('cache' => array('config' => 'site_element_cache_5_hours'))); ?>
	</div>
	<div class="js-cache-load admin-chart-block  js-cache-load-online-users {'data_url':'admin/users/online_users', 'data_load':'js-cache-load-online-users'}">
		<?php echo $this->element('users-admin_online_users', array('cache' => array('config' => 'site_element_cache_5_hours'))); ?>
	</div>
	<div class="admin-chart-block ">
        <div class="page-title-info">
             <h3><?php echo __l('abs'); ?></h3>
        </div>
    	<div class="admin-center-block stats-section clearfix">
            <ul class="admin-dashboard-links">
                <li class="version-info">
                    <?php echo __l('Version').' ' ?>
					<span>
					<?php echo Configure::read('site.version'); ?>
					</span>
                </li>
               
            </ul>
		</div>
    </div>
	</div>
	</div>