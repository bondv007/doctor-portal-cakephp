<?php /* SVN: $Id: $ */ ?>
<div class="userReviews view">
<h2><?php echo __l('User Review');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($userReview['UserReview']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Created');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($userReview['UserReview']['created']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Modified');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($userReview['UserReview']['modified']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($userReview['User']['username']), array('controller' => 'users', 'action' => 'view', $userReview['User']['username']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Review');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($userReview['UserReview']['review']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User Rating Count');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($userReview['UserReview']['user_rating_count']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Bedside Avg Rating');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($userReview['UserReview']['bedside_avg_rating']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Timing Avg Rating');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($userReview['UserReview']['timing_avg_rating']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Overall Avg Rating');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($userReview['UserReview']['overall_avg_rating']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Ip');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cInt($userReview['Ip']['id']), array('controller' => 'ips', 'action' => 'view', $userReview['Ip']['id']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Is Active');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cBool($userReview['UserReview']['is_active']);?></dd>
	</dl>
</div>

