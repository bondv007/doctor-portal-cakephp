<?php /* SVN: $Id: $ */ ?>
<div class="userAnwers form">
    <h2 class="title"><?php echo __l('My Specialty related questions'); ?></h2>
    <div class="clearfix">
        <div class="side1">
		<div class="calender-block clearfix">
    	<ul class="calendar-menu clearfix">
    		<li class="<?php echo ($this->request->params['named']['stat'] == 'answerme') ? 'active' : ''; ?>"><?php echo $this->Html->link(__l('Answer me'), array('controller' => 'users', 'action' => 'my_answers', 'stat' => 'answerme'), array('title' => __l('Answer me'))); ?></li>
    		<li class="<?php echo ($this->request->params['named']['stat'] == 'answered') ? 'active' : ''; ?>"><?php echo $this->Html->link(__l('Answered'), array('controller' => 'users', 'action' => 'my_answers', 'stat' => 'answered'), array('title' => __l('Answered'))); ?></li>
    		 
       	</ul>
    </div>
            <div class="form-box">
                <div class="form-box-inner">
					<div class="clearfix">
			 		 	<div class="manage-clinics">
						</div> 
					</div>
						<ol class="answers-list2">
						  <?php if(!empty($questions)) { 
									foreach($questions as $question) {  ?>
							   <li>
							   <div class="list-style clearfix">
                                   <div class="ans-des">
                                       <?php echo $this->Html->cText($question['Question']['question']);?>
                                       <p class="specialty-name">Specialty: <?php echo $this->Html->cText($specialty_name);?></p>
                                   </div>
            					   <?php if(!empty($question['Answer']['answer'])) { ?>
    									<div class="book-l2">
    										<?php echo $this->Html->link(__l('Answered'), array('controller'=> 'questions', 'action' => 'view',$question['Question']['slug']), array('title' => __l('Answered'),'escape' => false));?>
    									</div>
    								<?php
    								} else {?>
    									<div class="book-l">
    										<?php echo $this->Html->link(__l('Answer Me'), array('controller'=> 'answers', 'action' => 'add',$question['Question']['id']), array('class' =>'js-thickbox','title' => __l('Answer Me'),'escape' => false));?>
    									</div>
    								<?php } ?>
                                </div>
                               </li>

								
						  <?php } 
						  } else {
						  ?>
						   <li><?php echo __l('No questions available');?></li>
						  <?php } ?>
						 </ol>            
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