<?php /* SVN: $Id: $ */ ?>
<div class="questions form">
 <h2><?php echo __l('Ask a Question - It\'s free');?></h2>
  <div class="clearfix">
        <div class="side1">
            <div class="form-box">
                <div class="form-box-inner">
<?php echo $this->Form->create('Question', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('question', array('label' => __l('Add a Question')));
		echo $this->Form->input('specialty_id', array('options' => $specialties,'empty' => __l('-- Select --')));
		echo $this->Form->input('description', array('label' => __l('More Details')));
	?>
 <div class="submit-block clearfix">
	<?php
		echo $this->Form->submit(__l('Submit Question'));
	?>
 </div>
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