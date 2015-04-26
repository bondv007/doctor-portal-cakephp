<div class="page-title-info">
        <h3><?php echo __l('Recently Registered Users'); ?></h3>
</div>
<div class="admin-center-block">
<?php
	if (!empty($recentUsers)):
		$users = '';
		foreach ($recentUsers as $user):
			$users .= sprintf('%s, ',$this->Html->link($this->Html->cText($user['User']['username'], false), array('controller'=> 'users', 'action' => 'view', $user['User']['username'], 'admin' => false)));
		endforeach;
		echo substr($users, 0, -2);
	else:
?>
	<p class="notice"><?php echo __l('Recently no users registered');?></p>
<?php
	endif;
?>
</div>