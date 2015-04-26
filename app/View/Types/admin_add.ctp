<div class="types form">
    <h2><?php echo $title_for_layout; ?></h2>
    <?php echo $this->Form->create('Type');?>
    <fieldset>
        <div class="tabs">
            <ul>
                <li><a href="#type"><?php echo __l('Type'); ?></a></li>
                <li><a href="#type-taxonomy"><?php echo __l('Taxonomy'); ?></a></li>
                <li><a href="#type-format"><?php echo __l('Format'); ?></a></li>
                <li><a href="#type-comments"><?php echo __l('Comments'); ?></a></li>
                <li><a href="#type-params"><?php echo __l('Params'); ?></a></li>
                <?php echo $this->Layout->adminTabs(); ?>
            </ul>

            <div id="type">
            <?php
                echo $this->Form->input('title');
                echo $this->Form->input('alias');
                echo $this->Form->input('description');
            ?>
            </div>

            <div id="type-taxonomy">
            <?php
                echo $this->Form->input('Vocabulary.Vocabulary');
            ?>
            </div>

            <div id="type-format">
            <?php
                echo $this->Form->input('format_show_author', array(
                    'label' => __l('Show author\'s name'),
                ));
                echo $this->Form->input('format_show_date', array(
                    'label' => __l('Show date'),
                ));
            ?>
            </div>

            <div id="type-comments">
            <?php
                $options = array(
                    '0' => __l('Disabled'),
                    '1' => __l('Read only'),
                    '2' => __l('Read/Write'),
                );
                echo $this->Form->input('comment_status', array(
                    'type' => 'radio',
                    'div' => array('class' => 'radio'),
                    'options' => $options,
                    'value' => 2,
                ));
                echo $this->Form->input('comment_approve', array(
                    'label' => 'Auto approve comments',
                ));
                echo $this->Form->input('comment_spam_protection', array(
                    'label' => __l('Spam protection (requires Akismet API key)'),
                ));
                echo $this->Form->input('comment_captcha', array(
                    'label' => __l('Use captcha? (requires Recaptcha API key)'),
                ));
            ?>

                <p>
                <?php
                    echo $this->Html->link(__l('You can manage your API keys here.'), array(
                        'controller' => 'settings',
                        'action' => 'prefix',
                        'Service',
                    ));
                ?>
                </p>
            </div>

            <div id="type-params">
            <?php
                echo $this->Form->input('Type.params');
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