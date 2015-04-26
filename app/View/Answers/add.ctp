<?php /* SVN: $Id: $ */ ?>
<div class="answers form">
 <h2><?php echo __l('Answer a Question');?></h2>
  <div class="clearfix">
        <div class="side1">
            <div class="form-box">
                <div class="form-box-inner">
			 <div class="list-style clearfix"><?php echo $this->Html->cText($question['Question']['question']);?></div>
<?php echo $this->Form->create('Answer', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('answer', array('label' => __l('Answer')));
		echo $this->Form->input('user_id', array('type' => 'hidden'));
		echo $this->Form->input('question_id', array('type' => 'hidden'));
	?>
 <div class="submit-block clearfix">
	<?php
		echo $this->Form->submit(__l('Submit Answer'));
	?>
 </div>
            </div>
        </div>
		</div>
    </div>
</div>