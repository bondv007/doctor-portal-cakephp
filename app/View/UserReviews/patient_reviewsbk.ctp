<?php  //echo '<pre/>'; print_r($userReviews); die;?><div class="patient-review-block">
            <h3 class="user-title"><?php echo __l('Patient Reviews');?></h3>
<div class="js-patient-reviews">
            <ul class="review-list">
<?php if(!empty($userReviews)) {
		foreach($userReviews as $userReview) {
		
			$patient_name = $userReview['User']['UserProfile']['first_name'].' '. $userReview['User']['UserProfile']['last_name'];
?>
			    <li>
                    <h4><?php echo $this->Html->cDate($userReview['UserReview']['created']);?> <?php echo __l('by');?> <?php echo !empty($patient_name)? ucwords($patient_name): '';?><?php echo __l('(Verified Patient)');?></h4>
                    <ul class="clearfix">
						<?php
							$hy_rating_percentage = $userReview['UserRating']['0']['rate_1']*20;
							// $userReview['UserRating']['0']['rate_1']=$userReview['UserRating']['0']['rate_1']-1;
						?>
                        <li>
                            <ul class="star-rating">
							 <li style="width: <?php echo $hy_rating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $userReview['UserRating']['0']['rate_1'];?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Hygeine Rating</span>
                        </li>
						 <?php
						     
							$docRating_percentage = $userReview['UserRating']['0']['rate_2']*20;
						?>
                        <li>
                            <ul class="star-rating">
                                 <li style="width: <?php echo $docRating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $userReview['UserRating']['0']['rate_2'];?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Doctor Rating</span>
                        </li>
                        <li>
						<?php
							$staffRating_percentage = $userReview['UserRating']['0']['rate_3']*20;;
						?>
                            <ul class="star-rating">
                                <li style="width: <?php echo $staffRating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $userReview['UserRating']['0']['rate_3'];?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Staff Hospitality</span>
                        </li>
                        	<?php
						$overall=($userReview['UserRating']['0']['rate_1'] + $userReview['UserRating']['0']['rate_2'] + $userReview['UserRating']['0']['rate_3'])/3;
						 $overall=ceil($overall);	
                                                $overall_rating_percentage = $overall*20;
						?>
                        <li>
                          <ul class="star-rating">
							 <li style="width: <?php echo $overall_rating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $overall;?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Overall Rating</span>
                        </li>
                    </ul>
                    <p><?php echo $this->Html->cText($userReview['UserReview']['review']);?></p>
                </li>
	<?php } 
		} else {
	?>			
		<li><?php echo __l('Not yet posted');?></li>	
	<?php } ?>
            </ul>
		</div>	
        </div>