<?php /* SVN: $Id: $ */ ?>
<div class="clinics view">
<h2><?php echo __l('Clinic');?></h2>
	<dl class="list"><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Id');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($clinic['Clinic']['id']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Created');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($clinic['Clinic']['created']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Modified');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cDateTime($clinic['Clinic']['modified']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Name');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($clinic['Clinic']['name']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($clinic['User']['username']), array('controller' => 'users', 'action' => 'view', $clinic['User']['username']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Slug');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($clinic['Clinic']['slug']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Description');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($clinic['Clinic']['description']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Address');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($clinic['Clinic']['address']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Address2');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($clinic['Clinic']['address2']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Phone');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($clinic['Clinic']['phone']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('City');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($clinic['City']['name']), array('controller' => 'cities', 'action' => 'view', $clinic['City']['slug']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('State');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($clinic['State']['name']), array('controller' => 'states', 'action' => 'view', $clinic['State']['id']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Country');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->link($this->Html->cText($clinic['Country']['name']), array('controller' => 'countries', 'action' => 'view', $clinic['Country']['slug']), array('escape' => false));?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Zip');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cText($clinic['Clinic']['zip']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Latitude');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cFloat($clinic['Clinic']['latitude']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Longitude');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cFloat($clinic['Clinic']['longitude']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('User Count');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cInt($clinic['Clinic']['user_count']);?></dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __l('Is Active');?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>><?php echo $this->Html->cBool($clinic['Clinic']['is_active']);?></dd>
	</dl>
</div>

