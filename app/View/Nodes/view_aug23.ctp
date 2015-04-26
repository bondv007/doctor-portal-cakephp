<?php if($this->request->params['named']['slug'] != 'affiliates') { ?>
<div class="static-blocks clearfix">
    <div class="grid_5 alpha">
        <ul class="static-menu clearfix">
    		<?php $class = ($this->request->params['named']['slug'] == 'about') ? ' class="active"' : null; ?>
            <li <?php echo $class;?>><?php  echo $this->Html->link(__l('About'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'about'), array('title' => __l('About')));?></li>
    		<?php $class = ($this->request->params['named']['slug'] == 'press') ? ' class="active"' : null; ?>
    		<li <?php echo $class;?>><?php  echo $this->Html->link(__l('Press'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'press'), array('title' => __l('Press')));?></li>
            <?php $class = ($this->request->params['named']['slug'] == 'careers') ? ' class="active"' : null; ?>
    		<li <?php echo $class;?>><?php  echo $this->Html->link(__l('Careers'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'careers'), array('title' => __l('Careers')));?></li>
    	    <?php $class = ($this->request->params['named']['slug'] == 'labs') ? ' class="active"' : null; ?>
    	    <li <?php echo $class;?>><?php  echo $this->Html->link(__l('Labs'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'labs'), array('title' => __l('Labs')));?></li>
			<?php $class = ($this->request->params['controller'] == 'contacts') ? ' class="active"' : null; ?>
            <?php $class = ($this->request->params['named']['slug'] == 'privacy-policy') ? ' class="active"' : null; ?>
    	    <li <?php echo $class;?>><?php  echo $this->Html->link(__l('Privacy Policy'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'privacy-policy'), array('title' => __l('Privacy Policy')));?></li>
            <?php $class = ($this->request->params['named']['slug'] == 'terms') ? ' class="active"' : null; ?>
    	    <li <?php echo $class;?>><?php  echo $this->Html->link(__l('Terms of Use'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'terms'), array('title' => __l('Terms of Use')));?></li>
            <li <?php echo $class;?>><?php  echo $this->Html->link(__l('Contact'), array('controller' => 'contacts', 'action' => 'add'), array('title' => __l('Contact')));?></li>
            <li class="green"><?php echo $this->Html->link(__l('Are you a top doctor? Join').' '.Configure::read('site.name'), array('controller' => 'users', 'action' => 'login_user', 'admin' => false), array('title' => __l('Are you a top doctor? Join').' '.Configure::read('site.name')));?>
			</li>
        </ul>
    </div>
    <?php $this->Layout->setNode($node); ?>
    <div id="node-<?php echo $this->Layout->node('id'); ?>" class="node grid_18 grid_right omega node-type-<?php echo $this->Layout->node('type'); ?>">
        <h2><?php echo $this->Layout->node('title'); ?></h2>
        <?php
            echo $this->Layout->nodeInfo();
            echo $this->Layout->nodeBody();
        ?>
    </div>
</div>
<?php } else { ?>
 <?php $this->Layout->setNode($node); ?>
    <div id="node-<?php echo $this->Layout->node('id'); ?>" class="node grid_8 grid_right omega node-type-<?php echo $this->Layout->node('type'); ?>">
        <h2><?php echo $this->Layout->node('title'); ?></h2>
<div class="form-box affiliate-form-box clearfix">
        <div class="form-box-inner">
        <?php
            echo $this->Layout->nodeInfo();
            echo $this->Layout->nodeBody();
        ?>
		</div>
		</div>


    </div>
	
<?php } ?>
 