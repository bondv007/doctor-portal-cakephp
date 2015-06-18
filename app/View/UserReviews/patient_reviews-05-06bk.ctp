<div class="patient-review-block">
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
							$overall_rating_percentage = $userReview['DoctorUser']['overall_avg_rating']*20;
						?>
                        <li>
                            <ul class="star-rating">
							 <li style="width: <?php echo $overall_rating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $userReview['DoctorUser']['overall_avg_rating'];?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Overall Rating</span>
                        </li>
						 <?php
							$bedside_rating_percentage = $userReview['DoctorUser']['bedside_avg_rating']*20;
						?>
                        <li>
                            <ul class="star-rating">
                                 <li style="width: <?php echo $bedside_rating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $userReview['DoctorUser']['bedside_avg_rating'];?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Bedside Manner</span>
                        </li>
                        <li>
						<?php
							$waititme_rating_percentage = $userReview['DoctorUser']['timing_avg_rating']*20;
						?>
                            <ul class="star-rating">
                                <li style="width: <?php echo $waititme_rating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $userReview['DoctorUser']['timing_avg_rating'];?> <?php echo __l('Stars.');?></li>
                            </ul>
                            <span class="rating-cat">Wait Time</span>
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