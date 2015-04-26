<div class="nodes form">
    <?php echo $this->Form->create('Node', array('url' => array('controller' => 'nodes', 'action' => 'add','admin' => true, $typeAlias),'class' => 'normal'));?>
        <fieldset>
            <div class="js-tabs">
                 <ul class="tab-menu clearfix">
                    <li><em>&nbsp;</em><a href="#node-main"><span><?php echo __l($type['Type']['title']); ?></span></a></li>
                    <li><em>&nbsp;</em><a href="#node-publishing"><span><?php echo __l('Publishing'); ?></span></a></li>
                    <?php echo $this->Layout->adminTabs(); ?>
                </ul>

                <div id="node-main">
                <?php
                    echo $this->Form->input('parent_id', array('type' => 'select', 'options' => $nodes, 'empty' => true));
                    echo $this->Form->input('title');
                    echo $this->Form->input('slug', array('class' => 'slug'));
                    echo $this->Form->input('excerpt');
                    echo $this->Form->input('body', array('class' => 'content'));
                ?>
                </div>
                <div id="node-publishing">
                <?php
                    echo $this->Form->input('status', array(
                        'label' => __l('Published'),
                        'checked' => 'checked',
                    ));
                ?>
                 <div class="input date-time end-date-time-block clearfix">
						<div class="js-datetime">
						<?php echo $this->Form->input('created', array('orderYear' => 'asc', 'maxYear' => date('Y') + 10, 'minYear' => date('Y'), 'div' => false, 'empty' => __l('Please Select'))); ?>
          		        </div>
                  </div>
                </div>
                <?php echo $this->Layout->adminTabs(); ?>
                <div class="clear">&nbsp;</div>
    <div class="submit-block clearfix">
    <?php
        echo $this->Form->submit(__l('Apply'), array('name' => 'apply'));
        echo $this->Form->end(__l('Save'));
    ?>
	<div class="cancel-block">
                	<?php echo $this->Html->link(__l('Cancel'), array('controller' => 'nodes', 'action' => 'index'), array('class' => 'cancel-link','title' => __l('Cancel'), 'escape' => false)); ?>
    </div>
            </div>
        </fieldset>
</div>