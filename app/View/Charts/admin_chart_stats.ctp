<?php if (isPluginEnabled('Contests')) { ?>
<div class="js-cache-load js-cache-load-admin-charts {'data_url':'admin/contest_charts/chart_transactions/is_ajax_load:1', 'data_load':'js-cache-load-admin-charts-transactions'}">
<?php //echo $this->element('chart-admin_chart_transactions', array('cache' => array('config' => 'sec'))); ?>
<?php echo $this->Layout->blocks('chart'); ?>
</div>
<?php }?>
<?php echo $this->element('chart-admin_chart_users', array('role_id'=> ConstUserTypes::User, 'cache' => array('config' => 'sec'))); ?>
<?php echo $this->element('chart-admin_chart_user_logins', array('role_id'=> ConstUserTypes::User, 'cache' => array('config' => 'sec'))); ?>
<?php //echo $this->Layout->blocks('chart'); ?>
