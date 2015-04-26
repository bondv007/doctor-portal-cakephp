<div class="extensions-themes">
	<?php
        echo $this->Form->create('Theme', array(
            'url' => array(
                'controller' => 'extensions_themes',
                'action' => 'add',
            ),
            'type' => 'file',
            'class' => 'normal'
        ));
    ?>
    <?php
        echo $this->Form->input('Theme.file', array('label' => __l('Upload'), 'type' => 'file',));
    ?>
    <div class="submit-block clearfix">
        <?php  echo $this->Form->submit(__l('Upload')); ?>
    <div class="cancel-block">
        <?php
            echo $this->Html->link(__l('Cancel'), array(
                'action' => 'index',
            ), array(
                'class' => '',
            ));
        ?>
    </div>
    </div>
      <?php echo $this->Form->end();?>
</div>