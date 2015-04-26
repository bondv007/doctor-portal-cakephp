<?php /* SVN: $Id: $ */ ?>
<div class="userLanguages form">
    <h2 class="title"><?php echo __l('My Languages'); ?></h2>
    <div class="clearfix">
        <div class="side1">
             <div class="form-box">
                <div class="form-box-inner">
                    <?php echo $this->Form->create('User', array('action' => 'manage_languages', 'class' => 'normal', 'enctype' => 'multipart/form-data'));?>
                    <div class="frame-block clearfix">
                        <?php
                    	   echo $this->Form->input('Language', array('type'=>'select','multiple'=>'checkbox',  'label' => false,'options' => $languages));
                        ?>
                    </div>
                    <div class="submit-block clearfix">
                        <?php echo $this->Form->submit(__l('Update')); ?>
                    </div>
                    <?php echo $this->Form->end(); ?>
                </div>
            </div>
        </div>
        <div class="side2">
            <?php
            	echo $this->element('sidebar', array('config' => 'sec'));
            ?>
        </div>
    </div>
</div>