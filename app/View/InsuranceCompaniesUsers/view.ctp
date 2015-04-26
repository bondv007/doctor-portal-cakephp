<?php /* SVN: $Id: $ */ ?>
<div class="insuranceCompaniesUsers view">
<h2><?php echo __l('Insurance Companies User');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($insuranceCompaniesUser['InsuranceCompaniesUser']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Insurance Company');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($insuranceCompaniesUser['InsuranceCompany']['name']), array('controller' => 'insurance_companies', 'action' => 'view', $insuranceCompaniesUser['InsuranceCompany']['slug']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($insuranceCompaniesUser['User']['username']), array('controller' => 'users', 'action' => 'view', $insuranceCompaniesUser['User']['username']), array('escape' => false));?></dd>
	</dl>
</div>

