<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="answers view">
    <div class="qa-block clearfix">
        <div class="qa-block-left grid_15 alpha">
            <h3 class="question"><?php echo $this->Html->cText($question['Question']['question']);?></h3>
            <div class="answer-block">
                <p><?php echo $this->Html->cText($question['Question']['description']);?></p>
                <?php if(!empty($question['Answer']['answer'])) { ?>
				<p><?php echo $this->Html->cText($question['Answer']['answer']);?></p>
				<?php } ?>
            </div>
                
        </div>
        <div class="qa-block-right grid_right grid_7 omega">
            <!-- <div class="share-block">
                <h3><?php echo __l('Share This Answer');?></h3>
                <ul class="share-list clearfix">
                    <li class="mail"><?php echo $this->Html->link(__l('Quick! Email a friend!'), 'mailto:?body='.__l('Check out the great question on ').Configure::read('site.name').' - '.Router::url('/', true).'/question/'.$question['Question']['slug'].'&amp;subject='.__l('Question in ').Configure::read('site.name').__l(': ').$question['Question']['question'], array('target' => 'blank', 'title' => __l('Send a mail to friend about this question'), 'class' => 'quick'));?>
					</li>
                    <li class="tweet"><a href="https://twitter.com/share?url=<?php echo Router::url('/', true).'/question/'.$question['Question']['slug'];?>&amp;lang=en&amp;via=<?php echo Configure::read('site.name'); ?>" class="twitter-share-button" data-lang="en" data-count="none" class="twitter-share-button"><?php echo __l('Tweet!');?></a>
					</li>
                    <li class="flike"><fb:like href="<?php echo Router::url('/', true).'/question/'.$question['Question']['slug'];?>" layout="button_count" font="tahoma"></fb:like></li>
                </ul>
            </div> -->
            <div class="related-qns">
                <h3><?php echo __l('Related Questions');?></h3>
                <ul class="city-list">
                   <?php if(!empty($related_questions)) { 
							foreach($related_questions as $related_question) { ?>
					    <li><?php echo $this->Html->link($this->Html->cText($related_question['Question']['question']), array('controller'=> 'questions', 'action' => 'view',$related_question['Question']['slug']), array('title' => __l($related_question['Question']['question']),'escape' => false));?></li>
					<?php } 
						} else {
					?>
						<li><?php echo __l('No related questions available');?></li>					
					<?php } ?>
                </ul>
            </div>
            <div class="need-more">
                <h3><?php echo __l('Need More Info?');?></h3>
                <div class="find-button-l"> 
				 	<?php echo $this->Html->link(__l('See a Doctor Today'), '/',array('title' => __l('See a Doctor Today'),'escape' => false)); ?>
				</div>
            </div>
        </div>
    </div>
    
</div>