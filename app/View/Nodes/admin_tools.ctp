<?php $this->pageTitle = __l('Tools'); ?>
<div class="page-tools" id="js-confirm-message-block">
	<div class="info-details"><?php echo __l('When cron is not working, you may trigger it by clicking below link. For the processes that happen during a cron run, refer the ');?></div>
    <div class="manually-trigger"><?php echo $this->Html->link(__l('Manually trigger cron to update contest status'), array('controller' => 'crons', 'action' => 'main', 'admin' => false), array('class' => 'js-confirm-mess tools', 'title' => __l('You can use this to update contest status. This will be used in the scenario where cron is not working.'))); ?></div>
</div>