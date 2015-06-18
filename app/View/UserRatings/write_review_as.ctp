<div class="doctorAvailabilities form clearfix">
<div class="form-box">
                <div class="form-box-inner">
                    <h3 class="title"><?php echo __l('Write Review as');?>: </h3>
                     <div class="ReviewAs">
                       <?php echo $this->Html->link(__l('Guest User'), array('controller' => 'user_ratings', 'action' => 'write_review_as','Guest User'), array('title' => __l('Guest User'))); ?>
                       &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <?php echo $this->Html->link(__l('Registered User'), array('controller' => 'user_ratings', 'action' => 'write_review_as','Registered User'), array('title' => __l('Guest User')));?>
                    </div>
                    	
        </div>
 </div>
 </div>