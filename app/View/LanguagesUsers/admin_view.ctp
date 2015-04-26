<?php /* SVN: $Id: $ */ ?>
<div class="languagesUsers view">
<h2><?php echo __l('Languages User');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($languagesUser['LanguagesUser']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($languagesUser['User']['username']), array('controller' => 'users', 'action' => 'view', $languagesUser['User']['username']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Language');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($languagesUser['Language']['name']), array('controller' => 'languages', 'action' => 'view', $languagesUser['Language']['id']), array('escape' => false));?></dd>
	</dl>
</div>

