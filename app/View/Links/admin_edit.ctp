<div class="links form">
    <?php echo $this->Form->create('Link', array('class'=>'normal','url' => array('controller' => 'links', 'action' => 'edit', 'menu' => $menuId)));?>
     
            <div class="js-tabs">
               <ul class="tab-menu clearfix">
                    <li><em>&nbsp;</em><a href="#link-basic"><span><?php echo __l('Link'); ?></span></a></li>
                    <li><em>&nbsp;</em><a href="#link-misc"><span><?php echo __l('Misc.'); ?></span></a></li>
                    <?php echo $this->Layout->adminTabs(); ?>
                </ul>

                <div id="link-basic">
                    <?php
                        echo $this->Form->input('id');
                        echo $this->Form->input('menu_id');
                        echo $this->Form->input('title');
                        echo $this->Form->input('status');
                    ?>
                </div>


                <div id="link-misc">
                    <?php
                        echo $this->Form->input('class', array('class' => 'class'));
                        echo $this->Form->input('description');
                        echo $this->Form->input('rel');
                        echo $this->Form->input('target');
                        echo $this->Form->input('params');
                    ?>
                </div>
                <?php echo $this->Layout->adminTabs(); ?>
            </div>
    
        <div class="submit-block clearfix">
        <?php
            echo $this->Form->submit(__l('Save'));
            ?>
            <div class="cancel-block">
                <?php
                echo $this->Html->link(__l('Cancel'), array(
                    'action' => 'index',
                    $menuId,
                ), array(
                    'class' => '',
                ));
            ?>
        </div>
        </div>
          <?php  echo $this->Form->end(); ?>
</div>