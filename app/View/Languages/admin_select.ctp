<div class="languages">
    <h2><?php echo $title_for_layout; ?></h2>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__l('New Language'), array('action'=>'add')); ?></li>
        </ul>
    </div>

    <?php
        foreach ($languages AS $language) {
            $title = $language['Language']['title'] . ' (' . $language['Language']['native'] . ')';
            $link = $this->Html->link($title, array(3/19/2012
                'controller' => 'translate',
                'action' => 'edit',
                $id,
                $modelAlias,
                'locale' => $language['Language']['alias'],
            ));
            echo '<h3>' . $link . '</h3>';
        }
    ?>
</div>