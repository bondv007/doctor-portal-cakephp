
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
    	    <li <?php echo $class;?>><?php  echo $this->Html->link(__l('Contact'), array('controller' => 'contacts', 'action' => 'add'), array('title' => __l('Contact')));?></li>
            <?php $class = ($this->request->params['named']['slug'] == 'privacy-policy') ? ' class="active"' : null; ?>
    	    <li <?php echo $class;?>><?php  echo $this->Html->link(__l('Privacy Policy'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'privacy-policy'), array('title' => __l('Privacy Policy')));?></li>
            <?php $class = ($this->request->params['named']['slug'] == 'terms-of-use') ? ' class="active"' : null; ?>
    	    <li <?php echo $class;?>><?php  echo $this->Html->link(__l('Terms of Use'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'terms-of-use'), array('title' => __l('Terms of Use')));?></li>
            <li class="green"><a href="#" title="Are you a top doctor? Join abs"><span>Are you a top doctor?</span> Join abs</a></li>
        </ul>
    </div>
    <div class="grid_19 grid_right omega">
<?php if(isset($success)) : ?>
    <div class="success-msg">
        <?php echo __l('Thank you, we received your message and will get back to you as soon as possible.'); ?>
    </div>
<?php else: ?>
    <h2><?php echo __l('Contact Us'); ?></h2>
	 
    <?php
        echo $this->Form->create('Contact', array('class' => 'normal')); ?>
  	<?php
        echo $this->Form->input('first_name', array('label' => __l('First Name')));
        echo $this->Form->input('last_name', array('label' => __l('Last Name')));
        echo $this->Form->input('email', array('label' => __l('Email')));
        echo $this->Form->input('phone', array('label' => __l('Telephone')));
        echo $this->Form->input('title', array('label' => __l('Subject')));
        echo $this->Form->input('body', array('label' => __l('Message')));
    ?>
	<div class="submit-block clearfix">
		<?php
        echo $this->Form->submit(__l('Send'));
    ?>
	</div>
			<?php
        echo $this->Form->end();
    ?>
<?php endif; ?>
    </div>
</div>