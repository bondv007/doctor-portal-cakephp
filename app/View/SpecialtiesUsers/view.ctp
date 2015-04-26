<?php /* SVN: $Id: $ */ ?>
<div class="specialtiesUsers view">
<h2><?php echo __l('Specialties User');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($specialtiesUser['SpecialtiesUser']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($specialtiesUser['User']['username']), array('controller' => 'users', 'action' => 'view', $specialtiesUser['User']['username']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Specialty');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($specialtiesUser['Specialty']['name']), array('controller' => 'specialties', 'action' => 'view', $specialtiesUser['Specialty']['slug']), array('escape' => false));?></dd>
	</dl>
</div>

