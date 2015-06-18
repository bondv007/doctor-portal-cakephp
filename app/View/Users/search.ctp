<div class="doctor-search-block">
        <h2 class="illness-link"><?php echo __l('Reviews &amp; Appointments');?></h2>
        <div class="clearfix">
          <div class="search-block-left grid_left">
			<?php echo $this->Form->create('User', array('class' => 'form-mapsearch map-search clearfix js-search-map', 'type' => 'get','action'=>'search','id' => 'doctorsearch'));?>
              <div class="clearfix">
                <div class="map-specialty">
                  <div class="input select">
					<?php echo $this->Form->input('User.doctor_specialty_id', array('value' => $doctor_specialty_id ,'label' => false,'options' => $specialties ,'class' => 'js-selection-specialty_diseases'));  ?>
                  </div>
                </div>
                <div class="input text">
                  <label for="ZipCode"><?php echo __l('In');?></label>
				  <?php 
				  echo $this->Form->input('User.zip_code',array('label' =>false, 'class' => 'zipCodeCity', 'id' => 'ZipCode')); ?>
                </div>
               <div id="Insurance_Box">
					<div class="input select">
					  <label for="WhoAccepts"><?php echo __l('who accepts');?></label>
						 <?php echo $this->Form->input('User.insurance_id',array('value' => $doctor_insurance_id ,'label' =>false,'options' => $insurances,'class' => 'js-selection-insurance-plan')); ?>
					</div>
				</div>	
				<div class="js-plan-selected">
					<div class="input select">
						 <?php 
						 $disabled = '';
						 if(empty($doctor_insurance_id)) {
						 	$disabled = 'disabled=>disabled';
						 }
						 echo $this->Form->input('insurance_plan_id',array('label' =>false,'options' => $insuranceplans, $disabled)); ?>
					</div>
				</div>
				<div class="js-disease-selected">
					<div class="input select">
					  <label for="VisitReson"><?php echo __l('reson for visit');?></label>
					  <?php echo $this->Form->input('specialty_disease_id', array('label' => false,'options' => $specialty_diseases));  ?>
					</div>
				</div>	
			  </div>
			  <div>
				  <p class="search-by search-by2">
						<?php echo $this->Html->link(__l('Search By Name, Language or Gender'), '#', array('class' => 'js-search-by','title' => __l('Search By Name, Language or Gender')));?>
				  </p>
			  </div>
			  <div class="js-search-prac-lang-sex hide">
			  		<?php echo $this->Form->input('UserProfile.doctor_name',array('label' =>false, 'class' => 'doctorPracticeName', 'id' => 'DoctorName')); ?>
			  		<div class="short-box clearfix">
                        <?php echo $this->Form->input('UserProfile.language_id', array('default' => 42,'label' => __l('Speaks'),'options' => $languages));?>
                        <?php echo $this->Form->input('UserProfile.gender_id', array('label' => __l('Gender'),'options' => $gender_lists));?>
                    </div>
			  </div>	
			        <?php echo $this->Form->submit(__l('Refine Search'));?>
			<?php echo $this->Form->end();?>
          </div>
          <div class="search-block-right grid_right"> 
		  		
		 

    <div class="clearfix">
       
        
        <div class="slider-content-block clearfix">





        <div class="week-slider-block clearfix">
          <div class="grid_7 omega alpha">
            <h4><?php echo $this->Html->cText($specialty_name);?></h4>
          </div>
          
        </div>
        
		<ol class="doctor-list">
         <?php	 //echo '<pre/>'; print_r($users); die;
		 if(!empty($users)) { 
		 			$i = 1;
		      		foreach($users as $user) {
						$lat = $user['UserProfile']['latitude'];
						$lng = $user['UserProfile']['longitude'];
						$name = $user['User']['username'];
						$id = $user['User']['id'];
						if($user['User']['default_thumbnail_id'] == 0) {
							if(!empty($user['Photo'])) {
								$attachment = $user['Photo'][0]['Attachment']['id'];	
							} else {
								$attachment = $this->Html->getDoctorImageUrl($user['User']['default_thumbnail_id']);	
							}	
						} else {
								$attachment = $this->Html->getDoctorImageUrl($user['User']['default_thumbnail_id']);
						}
						if(empty($attachment)) {
							$attachment = 1;
						}
						$userimg = 'doctor_small_thumb/Photo/' . $attachment . '.' . md5(Configure::read('Security.salt') . 'Photo' . $attachment . 'jpg' . 'doctor_small_thumb' . Configure::read('site.name')) . '.' . 'jpg';
						$hyRating='0' ; $docRating='0'; $staffRating='0';
						$total = '0'; $avg_rate_1='0' ; $avg_rate_2='0' ; $avg_rate_3='0';
						foreach($user['UserRating'] as $ur){
							if($ur['status']=='1'){
								if($ur['rate_1']){
									$hyRating=$hyRating + $ur['rate_1'];
									
								}
								if($ur['rate_2']){
									$docRating=$docRating + $ur['rate_2'];
									
								}
								if($ur['rate_3']){
									$staffRating=$staffRating + $ur['rate_3'];
									
								}
								$total++;
							}
							
						}
						if($total !='0'){
							$avg_rate_1 = round(($hyRating/$total),1);
							$avg_rate_2 = round(($docRating/$total),1);
							$avg_rate_3 = round(($staffRating/$total),1); 
						
						}
						$overallRating=($avg_rate_1 + $avg_rate_2 + $avg_rate_3 )/3;
						$rating1 = $this->Html->get_star_rating($overallRating);
						$rating = $this->Html->cHtml($rating1);
						?>
						<?php 
							if(!empty($user['UserProfile']['first_name']) and !empty($user['UserProfile']['last_name'])) {
								$doctor_name = ucwords($user['UserProfile']['first_name']. ' ' . $user['UserProfile']['last_name']);
							} else {
								$doctor_name = ucfirst($user['User']['username']);	
							}
						?>
						<?php 
							$dr_title = '';
							if(!empty($user['UserProfile']['title'])){ 
							   $dr_title = $user['UserProfile']['title'];
							} 
							$username = __l('Dr.').' '. $doctor_name . ' ' . $dr_title; 
						?>	 
						<?php 
							$address = '';
							if(!empty($user['UserProfile']['address'])){ 
								$address = $user['UserProfile']['address'];
							 } 
						?>
						<?php
						 $address1 = '';
						 if(!empty($user['UserProfile']['City']['name'])){ 
						 	$address1.= $user['UserProfile']['City']['name'].','; 
						 } 
						 if(!empty($user['UserProfile']['State']['code'])){
						 	$address1.= $user['UserProfile']['State']['code'].' ';
						 } 
						 if(!empty($user['UserProfile']['zip_code'])){
					        $address1.= $user['UserProfile']['zip_code'];
						 }
						 ?>
						<!-- <div id="user-rating-<?php  echo $i;?>" class="hide"><?php echo $rating;?></div>
						<div class="hide">
						<?php 
						echo $this->Html->link($this->Html->cText($user['User']['username'], false), array('controller' => 'users', 'action' => 'view', $user['User']['username'], 'admin' => false), array('id'=>"js-map-side-$id",'class'=>"js-user-map js-map-data {'lat':'$lat','lng':'$lng', 'name':'$name','id':'$id','userimg':'$userimg', 'usertitle':'$username', 'address':'$address','address1':'$address1'}",'title'=>$this->Html->cText($user['User']['username'], false),'escape' => false));
					?>
					</div> -->
		  <li class="clearfix" style="float:left;">
            <div class="grid_7 omega alpha">
              <h5>
			  		<?php if(empty($this->request->params['named']['doctor_specialty_id'])) {if(!empty($user['UserProfile']['Specialty']['name'])) 
			  			{ 
    						echo $this->Html->cText($user['UserProfile']['Specialty']['name']);
		    			}} 
					 ?>
			  </h5> 
			  
              <span class="serial-no"><?php echo $i; ?></span>
              <div class="img-block"> <?php echo $this->Html->getDoctorAvatarImage($user['User'], 'doctor_small_thumb',true); ?> </div>
              <div class="doctor-info-block">
			 
				<?php $hover_class = 'js-username-hover {\'user_id\':\''. $user['User']['id'] .'\'}'; ?>
               
				<h6><?php echo $this->Html->link($username, array('controller' => 'users', 'action' => 'view', $user['User']['username']),array('class' => $hover_class,'title' => __l($username))); ?></h6>
				
				
                <dl class="avg-rating clearfix">
                  <dt><?php echo __l('Avg Rec:');?></dt>
				   <?php
						$overall_rating_percentage = $rating;
					?>
                  <dd>
                    <ul class="star-rating">
                      <li class="current-rating"><?php echo $rating;?></li>
                    </ul>
                  </dd>
                </dl>
				<address>
					<?php if(!empty($user['UserProfile']['address'])){?>
					<span><?php echo $user['UserProfile']['address'];?></span> 
					<?php } ?>
					<span>
					<?php if(!empty($user['UserProfile']['City']['name'])){?>
					<?php echo $user['UserProfile']['City']['name'];?> ,
					<?php } ?>
					<?php if(!empty($user['UserProfile']['State']['code'])){?>
						<?php echo $user['UserProfile']['State']['code'];?>
					<?php } ?>
					</span>
					<?php if(!empty($user['UserProfile']['zip_code'])){?>
					<span><?php echo $user['UserProfile']['zip_code'];?></span>
					<?php } ?>

					
					<span><?php echo "<br/><b>Fees: ".Configure::read('site.currency')."&nbsp;".$user['DoctorAvailability']['consultation_fees'];?></b></span>
					
					<?php if($user['User']['is_partner'] == 0){
							if(!empty($user['UserProfile']['phone']))
								$phone = $user['UserProfile']['phone'];
							else
								$phone = 'N/A';
						 ?>
					<span><?php echo "<br/><b>Phone: &nbsp;".$phone;?></b></span>
					<?php } ?>
					
			    </address>
			    <?php
			    
			     if($user['User']['is_partner'] == 1) {  ?>
                <div class="book-l"><?php echo $this->Html->link(__l('Book Online'), array('controller' => 'users', 'action' => 'view', $user['User']['username']),array('class' => 'book-l','title' => __l('Book Online'))); ?>
				
				<?php }else{ ?>
				
					<div class="book-l"><?php echo $this->Html->link(__l('Show Details'), array('controller' => 'users', 'action' => 'view', $user['User']['username']),array('class' => 'book-l','title' => __l('Show Details'))); ?>
				
				<?php } ?>	
				</div>


              </div>
            </div>
            <!-- <div class="block-2">
			 <?php 	
	              if(empty($doctor_insurance_id)) { ?>
			   
			  <p><?php echo $this->Html->link(__l('Please enter your insurance at the top of the page.'), '#Insurance_Box', array('title' => __l('Please enter your insurance at the top of the page.')));?></p>
			  <?php } else { ?>
			  	<p><span><?php echo __l('in network');?></span>
				<?php echo $this->Html->cText($insurance_name);?></p>
			  <?php } ?>
            </div> -->
           
		    <!-- <div class="appointment-time"></div>
 -->			
          </li>
		  <?php 
		  	$i++;
		  		} 
		  	} else {   
		  ?>
			<div class="js-user-map js-map-data {'lat':'50.083333','lng':'14.416667'}"></div>		  
		  	<li class="no-results">
              <h3><?php echo __l('No Results Available');?></h3>
              <p><?php echo __l('We\'re adding new doctors every day so try your search again soon!');?></p>
            </li>
		  <?php } ?>
        </ol>

    <!-- <div class="slider-right-content clearfix">
		<?php echo $this->element('doctor-slots', array('current_week' =>$current_week, 'users' => $user_ids,'config' => 'sec')); ?>	
    </div> -->
	  <?php echo $this->element('paging_links'); ?>
      </div>
      </div>
	   
	   
	   </div>

		  
        </div>
      </div>
	  <div class="more-link-block">
        
        <div class="find-tl">
    <div class="find-tr">
      <div class="find-tm"> </div>
    </div>
  </div>
  <div class="find-cl">
    <div class="find-cr">
      <div class="find-cm clearfix">
              <div class="clearfix">
                <div class="link-sessions">
                  <h3><?php echo __l('Nearby Areas with Doctor');?></h3>
                  <ul class="more-links clearfix">
                    <?php if(!empty($cities)) {
								foreach($cities as $city) {
								$city_name = $city['City']['name'];
						?>
						  <li>
							 <?php echo $this->Html->link($this->Html->cText($city_name), array('controller'=> 'users', 'action' => 'search', 'city' => $city['City']['slug']), array('title' => __l($city_name),'escape' => false));?>
						  </li>
						<?php }
						  }
						?>
                  </ul>
                </div>
                <div class="link-sessions">
                  <h3><?php echo __l('Related Specialties');?></h3>
                  <ul class="more-links clearfix">
                    <?php
						if (!empty($search_specialties)):
							foreach ($search_specialties as $specialty):
					?>
					<li> <?php echo $this->Html->link($this->Html->cText($specialty['Specialty']['name']), array('controller'=> 'users', 'action' => 'search', 'doctor_specialty_id' =>$specialty['Specialty']['id']), array('title' => __l($specialty['Specialty']['name']),'escape' => false));?></li>
					<?php
						endforeach;
					else:
					?>
					<li>
						<p><?php echo __l('No Specialties available');?></p>
					</li>
					<?php
					endif;
					?>
                    <li class="more"><?php echo $this->Html->link(__l('More...'), array('controller' => 'specialties', 'action' => 'index'), array('title' => __l('More...')));?></li>
                  </ul>
                </div>
                <div class="link-sessions">
                  <h3><?php echo __l('Popular Insurances accepted by Doctors');?> </h3>
                  <ul class="more-links more-links2 clearfix">
                    <?php
						if (!empty($search_insurance_companies)):
							foreach ($search_insurance_companies as $search_insurance_company):
					?>
					<li><?php echo $this->Html->link($this->Html->cText($search_insurance_company['InsuranceCompany']['name']), array('controller'=> 'users', 'action' => 'search', 'doctor_insurance_id' =>$search_insurance_company['InsuranceCompany']['id']), array('title' => __l($search_insurance_company['InsuranceCompany']['name']),'escape' => false));?>
					</li>
					<?php
						endforeach;
					else:
					?>
					<li>
						<p><?php echo __l('No Insurance Companies available');?></p>
					</li>
					<?php
					endif;
					?>
					<li class="more"> <?php echo $this->Html->link(__l('More...'), array('controller'=> 'users', 'action' => 'search'), array('title' => __l('More...'),'escape' => false));?></li>
                  </ul>
                </div>
              </div>
              <?php /*?><div class="more-link-bottom clearfix"> <a class="show-more" href="#" title="Show more Doctors"><span>Show more Doctors</span></a> </div><?php */?>
            </div>
    </div>
  </div>
  <div class="find-bl">
    <div class="find-br">
      <div class="find-bm"> </div>
    </div>
  </div>
      </div>
	  	  
