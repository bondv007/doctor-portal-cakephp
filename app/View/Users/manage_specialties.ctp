<?php /* SVN: $Id: $ */ ?>
<div class="manageSpecialty form">
<h2 class="title"><?php echo __l('My Specialties'); ?></h2>
    <div class="clearfix">
        <div class="side1">
             <div class="form-box">
                <div class="form-box-inner">
                    <?php echo $this->Form->create('User', array('action' => 'manage_specialties', 'class' => 'normal'));?>
                    <div class="frame-block clearfix">
						<?php
                        	echo $this->Form->input('Specialty', array('escape'=> false,'type'=>'select','multiple'=>'checkbox','label' => false,'options' => $specialties));
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