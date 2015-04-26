<div class="menus form">
    <?php echo $this->Form->create('Menu', array('url' => array('controller' => 'menus', 'action' => 'add','admin' => true),'class' => 'normal')); ?>
    <fieldset>
        <div class="js-tabs">
             <ul class="tab-menu clearfix">
                <li><em>&nbsp;</em><a href="#menu-basic"><span><?php echo __l('Menu'); ?></span></a></li>
            </ul>

            <div id="menu-basic">
                <?php
                    echo $this->Form->input('title');
                    echo $this->Form->input('alias');
                ?>
            </div>
            <div class="submit-block clearfix">
        <?php
            echo $this->Form->submit(__l('Add'));
        	if(!empty($this->request->params['requested'])) {
		    	echo $this->Form->submit(__l('Cancel'),array('class' => 'js-toggle-div {"divClass":"js-show-user-type-add"}'));
			}
			else {
		?>	
        		<div class="cancel-block">
                	<?php echo $this->Html->link(__l('Cancel'), array('controller' => 'menus', 'action' => 'index'), array('title' => __l('Cancel'), 'escape' => false)); ?>
                </div>
        <?php } ?>
    </div>
        </div>
    </fieldset>
</div>