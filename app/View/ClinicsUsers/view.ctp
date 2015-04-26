<?php /* SVN: $Id: $ */ ?>
<div class="clinicsUsers view">
<h2><?php echo __l('Clinics User');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($clinicsUser['ClinicsUser']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Clinic');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($clinicsUser['Clinic']['name']), array('controller' => 'clinics', 'action' => 'view', $clinicsUser['Clinic']['slug']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($clinicsUser['User']['username']), array('controller' => 'users', 'action' => 'view', $clinicsUser['User']['username']), array('escape' => false));?></dd>
	</dl>
</div>

