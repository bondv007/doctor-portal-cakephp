<div class="extensions-plugins">
     <?php
        echo $this->Form->create('Plugin', array(
            'class' => 'normal',
            'url' => array(
                'controller' => 'extensions_plugins',
                'action' => 'add',
            ),
            'type' => 'file',
        ));
    ?>
    <fieldset>
    <?php
        echo $this->Form->input('Plugin.file', array('label' => __l('Upload'), 'type' => 'file',));
    ?>
    </fieldset>

    <div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Upload')); ?>
        <div class="cancel-block clearfix">
                <?php
                echo $this->Html->link(__l('Cancel'), array(
                    'action' => 'index',
                ), array(
                    'class' => '',
                ));
                ?>
        </div>
    </div>
       <?php echo $this->Form->end(); ?>
</div>