<div class="attachments form">
    <h2><?php echo $title_for_layout; ?></h2>

    <?php echo $this->Form->create('Node', array('url' => array('controller' => 'attachments', 'action' => 'edit')));?>
    <fieldset>
        <div class="tabs">
            <ul>
                <li><a href="#node-basic"><span><?php echo __l('Attachment'); ?></span></a></li>
                <li><a href="#node-info"><span><?php echo __l('Info'); ?></span></a></li>
                <?php echo $this->Layout->adminTabs(); ?>
            </ul>

            <div id="node-basic">
                <div class="thumbnail">
                    <?php
                        $fileType = explode('/', $this->request->data['Node']['mime_type']);
                        $fileType = $fileType['0'];
                        if ($fileType == 'image') {
                            echo $this->Image->resize('/uploads/'.$this->request->data['Node']['slug'], 200, 300);
                        } else {
                            echo $this->Html->image('/img/icons/' . $this->Filemanager->mimeTypeToImage($this->request->data['Node']['mime_type'])) . ' ' . $this->request->data['Node']['mime_type'];
                        }
                    ?>
                </div>

                <?php
                    echo $this->Form->input('id');
                    echo $this->Form->input('title');
                    echo $this->Form->input('excerpt', array('label' => __l('Caption')));
                    //echo $this->Form->input('body', array('label' => __l('Description')));
                ?>
            </div>

            <div id="node-info">
                <?php
                    echo $this->Form->input('file_url', array('label' => __l('File URL'), 'value' => Router::url($this->request->data['Node']['path']), 'readonly' => 'readonly'));
                    echo $this->Form->input('file_type', array('label' => __l('Mime Type'), 'value' => $this->request->data['Node']['mime_type'], 'readonly' => 'readonly'));
                ?>
            </div>
            <?php echo $this->Layout->adminTabs(); ?>
        </div>
    </fieldset>
    
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