<div class="install">
    <h2><?php echo $title_for_layout; ?></h2>

    <?php
        echo $this->Html->link(__l('Click here to build your database'), array(
            'controller' => 'install',
            'action' => 'data',
            'run' => 1,
        ));
    ?>
</div>