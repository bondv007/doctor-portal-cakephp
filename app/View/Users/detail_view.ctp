 		<div class="popup-top"></div>
   		<div class="popup-mid">
           <div class="clearfix">
                <?php $user = $this->Html->getDoctorDetailInfo($doctor_user_id);?>
                <div class="default-big-photo">
            	  <?php echo $this->Html->getDoctorAvatarImage($user['User'], 'doctor_small_thumb',true); ?>
                </div>
                <div class="doc-left-info">
                	<div class="user-title">
                        <h2>
                            <?php echo __l('Dr. ');?><?php echo ucfirst($user['User']['username']);?>
                            <?php if(!empty($user['UserProfile']['title'])){ ?>
                            <span><?php echo $user['UserProfile']['title'];?></span>
                            <?php } ?>
                        </h2>
            			 <?php if(!empty($user['UserProfile']['Specialty']['name'])) { ?>
            					<p><?php echo $user['UserProfile']['Specialty']['name'];?></p>

            			 <?php } ?>
                   </div>
            	   <address>
            		  <?php if(!empty($user['UserProfile']['Country']['name'])){?>
        				<span><?php echo $user['UserProfile']['Country']['name'];?></span>
        				<?php } ?>
        				<?php if(!empty($user['UserProfile']['address'])){?>
        				<span><?php echo $user['UserProfile']['address'];?></span>,
        				<?php } ?>
        				<?php if(!empty($user['UserProfile']['City']['name'])){?>
        				<span><?php echo $user['UserProfile']['City']['name'];?></span>,
        				<?php } ?>
        				<?php if(!empty($user['UserProfile']['State']['code'])){?>
        				<span><?php echo $user['UserProfile']['State']['code'];?></span>,
        				<?php } ?>
        				<?php if(!empty($user['UserProfile']['zip_code'])){?>
        				<span><?php echo $user['UserProfile']['zip_code'];?></span>,
        				<?php } ?>
        				<?php if(!empty($user['UserProfile']['phone'])){?>
        				<span><?php echo $user['UserProfile']['phone'];?></span>.
        				<?php } ?>
        		  </address>
                </div>

                <div class="doctor-review-rating">
                    <div class="clearfix">
                        <?php $overall_rating_percentage = $user['User']['overall_avg_rating']*20; ?>
                        <ul class="star-rating">
    					   <li class="current-rating" style="width: <?php echo $overall_rating_percentage;?>%;">
                               <?php echo __l('Currently');?> <?php echo $user['User']['overall_avg_rating'];?> <?php echo __l('Stars.');?>
                           </li>
                        </ul>
                        <h4><?php echo __l('Overll Rating ');?></h4>
                    </div>
                    <div class="clearfix">
            			 <?php $bedside_rating_percentage = $user['User']['bedside_avg_rating']*20; ?>
        				 <ul class="star-rating">
        					<li class="current-rating" style="width: <?php echo $bedside_rating_percentage;?>%;"><?php echo __l('Currently');?> <?php echo $user['User']['bedside_avg_rating'];?> <?php echo __l('Stars.');?></li>
                        </ul>
        				<h4><?php echo __l('Average Bedside Manner');?></h4>
                    </div>
                    <div class="clearfix">
            			<?php $waititme_rating_percentage = $user['User']['timing_avg_rating']*20; ?>
        				 <ul class="star-rating">
        					<li class="current-rating" style="width: <?php echo $waititme_rating_percentage;?>%;"><?php echo __l('Currently');?> <?php echo $user['User']['timing_avg_rating'];?> <?php echo __l('Stars.');?></li>
                        </ul>
        				<h4><?php echo __l('Average Wait Time');?></h4>
                    </div>
    			    <div>
    					<?php  echo $this->Html->link(__l('Read what other patients had to say...'),array('controller'=> 'users', 'action'=>'view',$user['User']['username']),array('title' => 'Read what other patients had to say...')); ?>
                    </div>
                </div>
            </div>

            <div class="doctor-brief-profile">
        		 <div class="education-info">
        			  <h3 class="user-title"><?php echo __l('Education');?></h3>
        			 <ul class="profile-list">
        			 <?php if(!empty($user['UserEducation'])){?>
        			  <?php foreach($user['UserEducation'] as $education){?>
        					<li><?php echo $education['education'];?> , <?php echo $education['organization'];?>, <?php echo $education['location'];?></li>
        			  <?php } ?>
        			 <?php } ?>
        			 </ul>
        		</div>
    		</div>
   		</div>
   		<div class="popup-bottom"></div>

