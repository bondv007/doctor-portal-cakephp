<div class="blocks form">
    <h2><?php echo __l('Add Block'); ?></h2>
    <?php echo $this->Form->create('Block',array('class' =>'normal'));?>
    <fieldset>
        <div class="js-tabs">
            <ul class="tab-menu clearfix">
                <li><em>&nbsp;</em><a href="#block-basic"><span><?php echo __l('Block'); ?></span></a></li>
                <li><em>&nbsp;</em><a href="#block-visibilities"><span><?php echo __l('Visibilities'); ?></span></a></li>
                <li><em>&nbsp;</em><a href="#block-params"><?php echo __l('Params'); ?></a></li>
                <?php echo $this->Layout->adminTabs(); ?>
            </ul>

            <div id="block-basic">
                <?php
                    echo $this->Form->input('title');
                    echo $this->Form->input('show_title');
                    echo $this->Form->input('alias', array('rel' => __l('unique name for your block')));
                    echo $this->Form->input('region_id', array('rel' => __l('if you are not sure, choose \'none\'')));
                    echo $this->Form->input('body');
                    echo $this->Form->input('class');
                    echo $this->Form->input('element');
                    echo $this->Form->input('status');
                ?>
            </div>
            <div id="block-visibilities">
                <?php
                    echo $this->Form->input('Block.visibility_paths', array(
                        'class' => 'wide',
                        'rel' => __l('Enter one URL per line. Leave blank if you want this Block to appear in all pages.')
                    ));
                    /*echo $this->Form->input('Block.visibility_php', array(
                        'class' => 'wide',
                        'rel' => __l('Block will be shown if the PHP code returns true. If unsure, leave blank.')
                    ));*/
                ?>
            </div>
            <div id="block-params">
            <?php
                echo $this->Form->input('Block.params');
            ?>
            <?php echo $this->Layout->adminTabs(); ?>
        </div>
    </fieldset>
    
    <div class="submit-block clearfix">
    <?php
        echo $this->Form->submit(__l('Apply'), array('name' => 'apply'));
        echo $this->Form->submit(__l('Save'));
        echo $this->Html->link(__l('Cancel'), array(
            'action' => 'index',
        ), array(
            'class' => 'cancel',
        ));
          echo $this->Form->end();
    ?>
    </div>
</div>