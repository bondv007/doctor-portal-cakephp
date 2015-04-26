<div id="footer" class="clearfix">
	<div class="clearfix footer-inner">
		<p>&copy;<?php echo date('Y');?> <?php echo $this->Html->link(Configure::read('site.name'), Router::url('/',true), array('title' => Configure::read('site.name'), 'escape' => false));?>. <?php echo __l('All rights reserved');?>.</p>
        	</div>
</div>