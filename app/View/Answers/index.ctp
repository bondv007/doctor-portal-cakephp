<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="answers index">
    <h2 class="answers-title"><?php echo __l('Get');?> <span><?php echo __l('real');?></span> <?php echo __l('answers to your health questions from <span>real</span> doctors.');?></h2>
    <div class="find-tl">
    <div class="find-tr">
      <div class="find-tm"> </div>
    </div>
  </div>
  <div class="find-cl">
    <div class="find-cr">
      <div class="find-cm clearfix">
    <?php echo $this->Form->create('Answer', array('type' => 'get', 'class' => 'practice-search qa-search clearfix', 'action'=>'index')); ?>
		<?php echo $this->Form->input('q', array('label' => __l('What do you want to know?'))); ?>
		<?php echo $this->Form->submit(__l('Search Answer'));?>
	 <?php echo $this->Form->end(); ?>
    </div>
    </div>
  </div>
  <div class="find-bl">
    <div class="find-br">
      <div class="find-bm"> </div>
    </div>
  </div>

    <div class="qa-block">
        <h3><?php echo __l('Recent Answers');?></h3>
        <ol class="answers-list">
            <?php if(!empty($answers)) { 
					foreach($answers as $answer) { ?>
			<li>
                <?php echo $this->Html->link($this->Html->cText($answer['Question']['question']), array('controller'=> 'questions', 'action' => 'view',$answer['Question']['slug']), array('title' => __l($answer['Question']['question']),'escape' => false));?>
                <p><?php echo $this->Html->cText($answer['Answer']['answer']);?></p>
            </li>
            <?php } 
			} else { ?>
				<p><?php echo __l('No results available');?></p>
			<?php } ?>
        </ol>
        <div class="browse-link">
		<?php echo $this->Html->link(__l('Or browse by specialty ...'), array('controller'=> 'questions', 'action' => 'index'), array('title' => __l('Or browse by specialty ...'),'escape' => false));?>
		</div>
    </div>
</div>
