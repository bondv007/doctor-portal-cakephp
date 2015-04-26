<?php /* SVN: $Id: $ */ ?>
<div class="specialtyDiseasesUsers view">
<h2><?php echo __l('Specialty Diseases User');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($specialtyDiseasesUser['SpecialtyDiseasesUser']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($specialtyDiseasesUser['User']['username']), array('controller' => 'users', 'action' => 'view', $specialtyDiseasesUser['User']['username']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Specialty Disease');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($specialtyDiseasesUser['SpecialtyDisease']['name']), array('controller' => 'specialty_diseases', 'action' => 'view', $specialtyDiseasesUser['SpecialtyDisease']['slug']), array('escape' => false));?></dd>
	</dl>
</div>

