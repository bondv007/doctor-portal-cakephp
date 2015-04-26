<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="userReviews index">
<?php if(!empty($userReview)) { ?>
<div class="comment-block">
    <h3 class="user-title"><?php echo __l('Patient Reviews');?></h3>
    <ul class="review-list">
        <li>
            <h4><?php echo $this->Html->cDate($userReview['UserReview']['created']);?> <?php echo __l('by (Verified Patient)');?></h4>
			<?php
				$overall_rating_percentage = $userReview['DoctorUser']['overall_avg_rating']*20;
			?>
            <ul class="clearfix">
                <li>
                    <ul class="star-rating">
                        <li style="width: <?php echo $overall_rating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $userReview['DoctorUser']['overall_avg_rating'];?> <?php echo __l('Stars.');?></li>
                    </ul>
                    <span class="rating-cat"><?php echo __l('Overall Rating');?></span>
                </li>
                <?php
					$bedside_rating_percentage = $userReview['DoctorUser']['bedside_avg_rating']*20;
				?>
				<li>
                    <ul class="star-rating">
                        <li style="width: <?php echo $bedside_rating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $userReview['DoctorUser']['bedside_avg_rating'];?> <?php echo __l('Stars.');?></li>
                    </ul>
                    <span class="rating-cat"><?php echo __l('Bedside Manner') ;?></span>
                </li>
				<?php
					$waititme_rating_percentage = $userReview['DoctorUser']['timing_avg_rating']*20;
				?>
                <li>
                    <ul class="star-rating">
                        <li style="width: <?php echo $waititme_rating_percentage;?>%;" class="current-rating"><?php echo __l('Currently');?> <?php echo $userReview['DoctorUser']['timing_avg_rating'];?> <?php echo __l('Stars.');?></li>
                         
                    </ul>
                    <span class="rating-cat"><?php echo __l('Wait Time');?></span>
                </li>
            </ul>
            <p><?php echo $this->Html->cText($userReview['UserReview']['review']);?></p>
        </li>
    </ul>
</div>
<?php } else { ?>
	<p class="mgs-style"><?php echo __l('No reviews available. Please add review for this doctor'); ?></p>
	<div class="comment-block">
		<?php
			if($this->Auth->sessionValid()):
				echo $this->element('reviews-add', array($user_id, $doctor_user_id,$appointment_id,'cache' => array('config' => 'sec')));
			endif;
		?>
		</div>
<?php }?>
</div>
