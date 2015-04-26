<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="answers index-all">
    <h2 class="answers-title">Get <span>real</span> answers to your health questions from <span>real</span> doctors.</h2>
	<?php echo $this->Form->create('Question', array('type' => 'get', 'class' => 'practice-search qa-search clearfix', 'action'=>'index')); ?>
		<?php echo $this->Form->input('q', array('label' => 'What do you want to know?')); ?>
		<?php echo $this->Form->submit(__l('Ask a Question'));?>
	 <?php echo $this->Form->end(); ?>	
    <div class="qa-block clearfix">
        <div class="qa-block-left grid_15 alpha">
            <h3><?php echo __l('Index');?></h3>
            <ol class="answers-list small-icon">
                <li><a href="#" title="Questions and Answers regarding Allergist (Immunologist)">Questions and Answers regarding Allergist (Immunologist)</a></li>
            </ol>
        </div>
        <div class="qa-block-right grid_right grid_8 omega">
            <h3><?php echo __l('Can\'t Find What You\'re Looking For?');?></h3>
            <div class="find-button-l"> <a href="#" title="Ask a Question (It&acute;s Free!)">Ask a Question (It&acute;s Free!)</a></div>
        </div>
    </div>
</div>
