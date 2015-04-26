<div class="clearfix">
	<h1 class="grid_5 mega alpha">
		<?php echo $this->Html->link((Configure::read('site.name') . ' <span>Admin</span>'), array('controller' => 'users', 'action' => 'index', 'admin' => true), array('escape' => false, 'title' => (Configure::read('site.name').' '.'Admin')));?>
	</h1>
	<ul class="admin-menu grid_right clearfix">
	   <li class="view-site"> <?php echo $this->Html->link(__l('Visit website'), Router::url('/', true)); ?></li>
	    <?php
        $class = (($this->request->params['controller'] == 'nodes') && ($this->request->params['action'] == 'admin_tools')) ? 'view-site' : null;?>
		<li class="<?php echo $class;?>"> <?php  echo $this->Html->link(__l('Tools'), array('controller' => 'nodes', 'action' => 'tools', 'admin' => true),array('title' => __l('Tools')));?> </li>
		<?php $class = (($this->request->params['controller'] == 'users') && ($this->request->params['action'] == 'admin_diagnostics')) ? 'view-site' : null;?>
		<li class="<?php echo $class;?>"> <?php  echo $this->Html->link(__l('Diagnostics'), array('controller' => 'users', 'action' => 'diagnostics', 'admin' => true),array('title' => __l('Diagnostics')));?> </li>
		<?php $class = (($this->request->params['controller'] == 'user_profiles') && ($this->request->params['action'] == 'edit')) ? 'view-site' : null;?>
		<li class="<?php echo $class;?>"> <?php  echo $this->Html->link(__l('My Account'), array('controller' => 'user_profiles', 'action' => 'edit', $this->Auth->user('id'), 'admin' => true),array('title' => __l('Diagnostics')));?> </li>
		<?php $class = (($this->request->params['controller'] == 'users') && ($this->request->params['action'] == 'change_password')) ? 'view-site' : null;?>
		<li class="<?php echo $class;?>"> <?php  echo $this->Html->link(__l('Change Password'), array('controller' => 'users', 'action' => 'change_password', 'admin' => true),array('title' => __l('Diagnostics')));?> </li>
		<?php $class = (($this->request->params['controller'] == 'users') && ($this->request->params['action'] == 'logout')) ? 'view-site' : null;?>
		<li class="<?php echo $class;?>"> <?php echo $this->Html->link(__l('Log out'), array('controller' => 'users', 'action' => 'logout'));?></li>
	</ul>
</div>