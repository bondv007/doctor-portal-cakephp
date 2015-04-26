<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="questions index-all">
    <h2 class="answers-title"><?php echo __l('Get');?> <span><?php echo __l('real');?></span> <?php echo __l('answers to your health questions from <span>real</span> doctors.');?></h2>
   <?php echo $this->Form->create('Question', array('type' => 'get', 'class' => 'practice-search qa-search clearfix', 'action'=>'index')); ?>
		<?php echo $this->Form->input('q', array('label' => 'What do you want to know?')); ?>
		<?php echo $this->Form->submit(__l('Search Question'));?>
	 <?php echo $this->Form->end(); ?>	
    <div class="qa-block clearfix">
        <div class="qa-block-left grid_15 alpha">
		  <?php if(!empty($questions)) { ?> 
		   <?php if(empty($specity_slug)) { ?>
			   <h3><?php echo __l('Index');?></h3>
		   <?php } else {?>
			   <h3><?php echo __l('Questions and Answers regarding:'.ucwords($specity_slug));?></h3> 
		   <?php } ?>
		  <?php } else { ?>
		  		<h3><?php echo __l('Index');?></h3>
		  <?php } ?> 
            
			<ol class="answers-list small-icon">
                <?php if(empty($specity_slug)) { 
						 if(!empty($questions)) { 
							foreach($questions as $question) { 
								$specialty_question = __l('Questions and Answers regarding').' '.$question['Specialty']['name']; 
				?>
						<li><?php echo $this->Html->link($this->Html->cText($specialty_question), array('controller'=> 'questions', 'action' => 'index',$question['Specialty']['slug']), array('title' => __l($specialty_question),'escape' => false));?>
						</li>
					<?php }
						} else { ?>
							<li><?php echo __l('No results avaliable');?></li>
						<?php } ?>	
						<?php 		
						 
					  }	else {
				  		if(!empty($questions)) { 
							foreach($questions as $question) { 
				?>
					<li>
						<?php echo $this->Html->link($this->Html->cText($question['Question']['question']), array('controller'=> 'questions', 'action' => 'view',$question['Question']['slug']), array('title' => __l($question['Question']['question']),'escape' => false));?>
						</li>
					<?php }
					}
					?>
					</li>
				<?php } ?>
            </ol>
        </div>
        <div class="qa-block-right grid_right grid_8 omega">
             <h3><?php echo __l('Can\'t Find What You\'re Looking For?');?></h3>
            <div class="find-button-l"> 
			<?php echo $this->Html->link(__l('Ask a Question (It\'s Free!)'), array('controller'=> 'questions', 'action' => 'add'), array('title' => __l('Ask a Question (It\'s Free!)'),'escape' => false));?>
			</div>
        </div>
    </div>
</div>