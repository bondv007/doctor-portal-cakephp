<div class="terms form">
    <h2><?php echo $title_for_layout; ?></h2>

    <?php 
        echo $this->Form->create('Term', array(
            'url' => array(
                'controller' => 'terms',
                'action' => 'add',
                $vocabulary['Vocabulary']['id'],
            ),
        ));
    ?>
    <fieldset>
        <div class="tabs">
            <ul>
                <li><span><a href="#term-basic"><?php echo __l('Term'); ?></a></span></li>
                <?php echo $this->Layout->adminTabs(); ?>
            </ul>

            <div id="term-basic">
            <?php
                echo $this->Form->input('Taxonomy.parent_id', array(
                    'options' => $parentTree,
                    'empty' => true,
                ));
                echo $this->Form->input('title');
                echo $this->Form->input('slug', array('class' => 'slug'));
                echo $this->Form->input('description');
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
            $vocabularyId,
        ), array(
            'class' => 'cancel',
        ));
    ?>
    </div>
</div>