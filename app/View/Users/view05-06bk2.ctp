<div class="profile-block">
    <div class="clearfix">
        <div class="doctor-photo-block">
            <div class="default-big-photo">
        	   <?php 
		   $org_image1 = Router::url('/',true).$this->Html->getImageUrl('Photo', $default_photo['Attachment'], array('dimension' => 'original')); 
    			?>
			<img src='<?php echo $org_image1;?>' width="160px" height="160px" alt="<?php echo $default_photo['Attachment']['filename']; ?>" title="<?php echo $default_photo['Attachment']['filename']; ?>">
		  
            </div>
        	<div class="users-small-photos">
			<div id="gallery">
        	  <?php if(!empty($userphotos)) {?>
    				<ul>
					<?php
    				foreach($userphotos as $userphoto) {
				if($userphoto['Attachment'][id]){
							$org_image = Router::url('/',true).$this->Html->getImageUrl('Photo', $userphoto['Attachment'], array('dimension' => 'original')); 
    			    ?>
    					<li><a href="<?php echo $org_image;?>"><img src='<?php echo $org_image;?>' width="30px" height="30px" alt="<?php echo $userphoto['Attachment']['filename']; ?>" title="<?php echo $userphoto['Attachment']['filename']; ?>"></a>
    					</li>
    				<?php
    				}}
    				?>
    				</ul>
    			<?php } ?>
            </div>
			</div>
			<div class="green-outer">
                <?php if ( $user['User']['is_partner'] == 1) { ?>
                <div class="button-green js-book-online">
    	       		<?php echo $this->Html->link(__l('Book Online'), '#Appointment_Box', array('title' => __l('Book Online')));?>
        		</div>
        		<?php } ?>
            </div>
            <div class="green-outer" style="margin-top: 10px;">
            <div class="book-l">
    			 	<a href="<?php echo $this->webroot.'user_ratings/add_ratings/'.$user['User']['username']; ?>">Write Review</a>
                    </div>
    			 </div>
        </div>
        
    		<?php
    			$usermarkerimg = '';
    			if(!empty($default_photo['Attachment'])) {
    				$usermarkerimg = 'small_thumb/Photo/' . $default_photo['Attachment']['id'] . '.' . md5(Configure::read('Security.salt') . 'Photo' . $default_photo['Attachment']['id'] . 'jpg' . 'small_thumb' . Configure::read('site.name')) . '.' . 'jpg';
    			}
    		?>
		<div class='hide'>
			<span id='js-view-latitude'><?php echo $user['UserProfile']['latitude'];?></span>
			<span id='js-view-longitude'><?php echo $user['UserProfile']['longitude'];?></span>
			<span id='js-view-zoom'><?php echo !empty($user['UserProfile']['zoom_level']) ? $user['UserProfile']['zoom_level'] : '15';?></span>
			<span id='js-view-address'><?php echo $user['UserProfile']['address'];?>,<?php echo $user['UserProfile']['City']['name'];?>,<?php echo $user['UserProfile']['State']['name'];?>,<?php echo $user['UserProfile']['zip_code'];?></span>
			<span id='js-view-image'><?php echo $usermarkerimg;?></span>
			<span id='js-view-username'><?php echo $user['User']['username'];?></span>
		</div>
    	<div class="js-view-doctor-location-map">
    		<div class="show-map">
    			<div id="js-map-view-container"></div>
    		</div>
    	   <div class="address-info clearfix">
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
				
		  </address>
		  </div>
    	</div>
        <div class="doctor-profile-middle">
        	<div class="user-title">
                <h2>
                    <?php echo __l('Dr. ');?><?php echo ucfirst($user['UserProfile']['practice_name']);?>
                    <?php if(!empty($user['UserProfile']['title'])){ ?>
                    <span><?php echo $user['UserProfile']['title'];?></span>
                    <?php } ?>
                </h2>
    			 <?php if(!empty($user['UserProfile']['Specialty']['name'])) { ?>
    					<p><?php echo $user['UserProfile']['Specialty']['name'];?></p>
    			 <?php } ?>
    			 
    			 
            </div>
            <div class="doctor-profile-block">
            <div class="clearfix">
                <div class="doctor-profile-left">
                    <div class="doctor-review-rating">
            			 <h3 class="user-title"><?php echo __l('Average Rating ');?></h3>
            			 <?php             
						    $overallRating=(round(($user['UserRating']['0']['UserRating']['0']['AvgHyRating']),1) + round(($user['UserRating']['0']['UserRating']['0']['AvgDocRating']),1) + round(($user['UserRating']['0']['UserRating']['0']['AvgStRating']),1))/3;
						     $overallRating=$overallRating;	
                                                    $overall_rating_percentage = $overallRating*20;
                                                        
                                                        
						?>
						 <ul class="star-rating">
							<li class="current-rating" style="width: <?php echo $overall_rating_percentage;?>%;"><?php echo __l('Currently');?> <?php echo $overallRating ;?> <?php echo __l('Stars.');?></li>
                        </ul>
    				    <div>
                            <?php echo $this->Html->link(__l('Read Reviews'), '#Profile_ReviewsBox', array('title' => __l('Read Reviews')));?>
                        </div>
            		</div>
                </div>
                <div class="doctor-profile-right">
            		<div class="practice-info">
            		  <h3 class="user-title"><?php echo __l('Practice Name');?></h3>
            		  <?php if(!empty($user['UserProfile']['practice_name'])){?>
            				<p><?php echo $user['UserProfile']['practice_name'];?></p>
            		  <?php } else {?>
					  		<p><?php echo __l('Not yet updated');?></p>	
					  <?php } ?>
            	  </div>
                </div>
             </div>
            <div class="clearfix">
                <div class="doctor-profile-left">
                    <div class="specialty-info js-user-specialty">
            			  <h3 class="user-title"><?php echo __l('Specialty');?></h3>
            			 <ul class="profile-list">
            			 <?php if(!empty($specialties)) { ?>
            				  <?php foreach($specialties as $specialty){ ?>
            						<li><?php echo $specialty['Specialty']['name'];?></li>
            				  <?php } ?>
            			 <?php } else { ?>
            			 		<li><?php echo $user['UserProfile']['Specialty']['name'];?></li>
            			 <?php } ?>
            			 </ul>
            		</div>
               </div>
                <!-- <div class="doctor-profile-right">
                    <div class="professional-statement-info">
                        <h3 class="user-title"><?php echo __l('Professional Statement');?></h3>
            			 <?php if(!empty($user['UserProfile']['about_me'])){?>
            				 <div class="js-truncate">	<?php echo $user['UserProfile']['about_me'];?></div>
            			 <?php } else {?>
					  		 <div><?php echo __l('Not yet updated');?></div>	
					  	<?php } ?>
                    </div>
                </div> -->
		<div class="doctor-profile-right">
                    <div class="professional-statement-info">
                        <h3 class="user-title"><?php echo __l('Hospitals');?></h3>
            			 <ul class="profile-list">
            			 <?php if(!empty($clinics)) { ?>
            				  <?php foreach($clinics as $clinic){ ?>
            						<li><?php echo $this->Html->link(__l($clinic['Clinic']['name']), array('controller' => 'users', 'action' => 'view', $user['User']['username'],'clinic_id'=>$clinic['Clinic']['id']),array('title' => __l($clinic['Clinic']['name']))); ?></li>
            				  <?php } ?>
            			 <?php } else { ?>
            			 		<li><?php echo $user['UserProfile']['Clinic']['name'];?></li>
            			 <?php } ?>
            			 </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
    <?php if(isset($clinic_id)){ ?>
    <div style="padding:10px;float:left;border:3px solid #18c6ff;background:white;margin-top:10px;margin-left:4px;">
    <?php echo $this->Html->link(__l('All'), array('controller' => 'users', 'action' => 'view', $user['User']['username']), array('title' => __l('All')));?>
        		
    </div>
    <?php } else { ?>
	<div style="padding:10px;float:left;border:3px solid #18c6ff;background:#C2DDE4;margin-top:10px;margin-left:4px;">
    <?php echo $this->Html->link(__l('All'), array('controller' => 'users', 'action' => 'view', $user['User']['username']), array('title' => __l('All')));?>
        		
    </div>
    <?php } ?>
    <?php if(!empty($clinics)) { ?>
            				  <?php foreach($clinics as $clinic){ ?>
					  <?php if($clinic['Clinic']['id']==$clinic_id) { ?> 
					  <div style="padding:10px;float:left;border:3px solid #18c6ff;background:#C2DDE4;margin-top:10px;margin-left:4px;">
					 <?php } else { ?>
					   <div style="padding:10px;float:left;border:3px solid #18c6ff;background:white;margin-top:10px;margin-left:4px;">
					 <?php } ?>

            						<?php echo $this->Html->link(__l($clinic['Clinic']['name']), array('controller' => 'users', 'action' => 'view', $user['User']['username'],'clinic_id'=>$clinic['Clinic']['id']),array('title' => __l($clinic['Clinic']['name']),'class'=>'show')); ?>
					</div>
            				  <?php } ?>
            			 <?php } ?>
    </div>
    <div class="doc-app-block" id="Appointment_Box">
        <div class="doc-app-tl">
            <div class="doc-app-tr">
                <div class="doc-app-tm"></div>
            </div>
        </div>
        <div class="doc-app-left">
            <div class="doc-app-right">
                <div class="doc-app-inner">
                    <span class="docapp-bg">&nbsp;</span>
                    <div class="docapp-inner-tl">
                        <div class="docapp-inner-tr">
                            <div class="docapp-inner-tm"></div>
                        </div>
                    </div>
                    <div class="docapp-inner">
            		  <div class="calendar-info">
            			
						<div class="js-calendar-responses cal-table-block">
            					<?php echo $this->element('doctor-calendar', array('type' => 'doctor-profile', 'user_id' => $user['User']['id'],'clinic_id'=>$clinic_id,'config' => 'sec')); ?>
            					</div>
            					
            			 
            		  </div>
                    </div>
                    <div class="docapp-inner-bl">
                        <div class="docapp-inner-br">
                            <div class="docapp-inner-bm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="doc-app-bl">
            <div class="doc-app-br">
                <div class="doc-app-bm"></div>
            </div>
        </div>
    </div>
    <div class="doctor-profile-block clearfix">
        <div class="doctor-detail-profile">
    		 <div class="education-info">
    			  <h3 class="user-title"><?php echo __l('Education');?></h3>
    			 <ul class="profile-list">
    			 <?php if(!empty($user['UserEducation'])){?>
    			  <?php foreach($user['UserEducation'] as $education){?>
    					<li><?php echo $education['education'];?> , <?php echo $education['organization'];?>, <?php echo $education['location'];?></li>
    			  <?php } ?>
    			 <?php } else {?>
						<li><?php echo __l('Not yet updated');?></li>	
				 <?php } ?>
    			 </ul>
    		</div>
    		<div class="languages-info js-user-language">
    			  <h3 class="user-title"><?php echo __l('Languages Spoken');?></h3>
    			 <ul class="profile-list">
    			 <?php if(!empty($user['Language'])){?>
    			  <?php foreach($user['Language'] as $language){?>
    					<li><?php echo $language['name'];?></li>
    			  <?php } ?>
    			 <?php } else {?>
						<li><?php echo __l('Not yet updated');?></li>	
				 <?php } ?>
    			 </ul>
    		</div>
    		<?php if(!empty($user['UserProfile']['board_certifications'])){?>
    			<div class="board-info">
    				  <h3 class="user-title"><?php echo __l('Board Certifications');?></h3>
    				 <ul class="profile-list">
    						<li><?php echo $user['UserProfile']['board_certifications'];?></li>
    				 </ul>
    			</div>
    		<?php } ?>
    		<?php if(!empty($user['UserProfile']['memberships'])){?>
    			<div class="board-info">
    				  <h3 class="user-title"><?php echo __l('Professional Memberships');?></h3>
    				 <ul class="profile-list">
    						<li><?php echo $user['UserProfile']['memberships'];?></li>
    				 </ul>
    			</div>
    		<?php } ?>
    		<?php if(!empty($user['UserProfile']['awards'])){?>
    			<div class="board-info">
    				  <h3 class="user-title"><?php echo __l('Awards and Publications');?></h3>
    				 <ul class="profile-list">
    						<li><?php echo $user['UserProfile']['awards'];?></li>
    				 </ul>
    			</div>
    		<?php } ?>
    		<div class="js-insurance-company">
    			  <h3 class="user-title"><?php echo __l('Insurance Accepted');?></h3>
    			 <ul class="profile-list">
    			 <?php if(!empty($user['InsuranceCompany'])){?>
    			  <?php foreach($user['InsuranceCompany'] as $insurance_company){?>
    					<li><?php echo $insurance_company['name'];?></li>
    			  <?php } ?>
    			 <?php } else {?>
						<li><?php echo __l('Not yet updated');?></li>	
				 <?php } ?>
    			 </ul>
    		</div>
		</div>
		<div id="Profile_ReviewsBox">
			<?php
				echo $this->element('patient-reviews', array('doctor_user_id' => $user['User']['id'],'cache' => array('config' => 'sec')));
			?>
		</div>
	 </div>
 </div>
