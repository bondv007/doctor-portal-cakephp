<?php /* SVN: $Id: $ */ ?>
<div class="insurancePlansUsers view">
<h2><?php echo __l('Insurance Plans User');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($insurancePlansUser['InsurancePlansUser']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Insurance Plan');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($insurancePlansUser['InsurancePlan']['name']), array('controller' => 'insurance_plans', 'action' => 'view', $insurancePlansUser['InsurancePlan']['slug']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($insurancePlansUser['User']['username']), array('controller' => 'users', 'action' => 'view', $insurancePlansUser['User']['username']), array('escape' => false));?></dd>
	</dl>
</div>

