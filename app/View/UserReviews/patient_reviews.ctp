<?php  //echo '<pre/>'; print_r($userReviews); die;?><div class="patient-review-block">
            <h3 class="user-title"><?php echo __l('Patient Reviews');?></h3>
<div class="js-patient-reviews">
            <ul class="review-list">
<?php if(!empty($userReviews)) {
		foreach($userReviews as $userReview) {
		
			$patient_name = $userReview['User']['UserProfile']['first_name'].' '. $userReview['User']['UserProfile']['last_name'];
			/*-----All ratings (Hygeine, Staff Hospitality, doctor)-----*/
			$hyRating='0' ; $docRating='0'; $staffRating='0';
						$total = count($userReview['UserRating']); 
					//echo '<pre/>';	print_r($userReview['UserRating']['0']['rate_1']); die;
							
								if($userReview['UserRating']['0']['rate_1']){
									$hyRating=$userReview['UserRating']['0']['rate_1'];
									
								}
								if($userReview['UserRating']['0']['rate_2']){
									$docRating=$userReview['UserRating']['0']['rate_2'];
									
								}
								if($userReview['UserRating']['0']['rate_3']){
									$staffRating=$userReview['UserRating']['0']['rate_3'];
									
								}
							
						
						$overallRating=($hyRating + $docRating + $staffRating )/3;
						
						//$hyRating = $this->Html->get_star_rating($hyRating);
						//$hyRating = $this->Html->cHtml($hyRating);
?>
			    <li>
                    <h4><?php echo $this->Html->cDate($userReview['UserReview']['created']);?> <?php echo __l('by');?> <?php echo !empty($patient_name)? ucwords($patient_name): '';?><?php echo __l('(Verified Patient)');?></h4>
                    <ul class="clearfix">
						<?php
							$hy_rating_percentage =($hyRating-1)*20;
							// $userReview['UserRating']['0']['rate_1']=$userReview['UserRating']['0']['rate_1']-1;
						?>
                        <li>
                            <ul class="star-rating">
							 <li style="width: <?php echo $hy_rating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $hyRating; ?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Hygeine Rating</span>
                        </li>
						 <?php
						     
							$docRating_percentage =($docRating-1) *20;
						?>
                        <li>
                            <ul class="star-rating">
                                 <li style="width: <?php echo $docRating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo  $docRating ;?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Doctor Rating</span>
                        </li>
                        <li>
						<?php
							$staffRating_percentage = ($staffRating-1)*20;
						?>
                            <ul class="star-rating">
                                <li style="width: <?php echo $staffRating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $staffRating;?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Staff Hospitality</span>
                        </li>
                       <?php //print_r($overallRating); die;
					   $allRating = $this->Html->get_star_rating($overallRating);
					   $allRating1 = $this->Html->cHtml($allRating);
					   $overall_rating_percentage=($overallRating-.8)*20;
					   ?>
                        <li>
                          <ul class="star-rating">
							 <li class="current-rating" style="width:<?php echo $overall_rating_percentage ; ?>%"><?php echo $allRating1;?></li>
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