<div class="attachments form">
    <h2><?php echo $title_for_layout; ?></h2>

    <div class="tabs">
        <ul>
            <li><a href="#attachment-main">Attachment</a></li>
            <?php echo $this->Layout->adminTabs(); ?>
        </ul>

        <div id="attachment-main">
        <?php
            $this->FormUrl = array('controller' => 'attachments', 'action' => 'add');
            if (isset($this->request->params['named']['editor'])) {
                $this->FormUrl['editor'] = 1;
            }
            echo $this->Form->create('Node', array('url' => $this->FormUrl, 'type' => 'file'));
        ?>
            <fieldset>
            <?php
                echo $this->Form->input('Node.file', array('label' => __l('Upload'), 'type' => 'file',));
            ?>
            </fieldset>
        </div>

        <?php echo $this->Layout->adminTabs(); ?>
        </div>
    </div>

    <div class="buttons">
    <?php
        echo $this->Form->end(__l('Save'));
        echo $this->Html->link(__l('Cancel'), array(
            'action' => 'index',
        ), array(
            'class' => 'cancel',
        ));
    ?>
    </div>
</div>