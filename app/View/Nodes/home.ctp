<div class="appointment-block">
  <div class="appointment-block-out">
    <div class="appointment-block-in">
      <div class="appointment-block-inner container_24 clearfix"> <?php //echo $this->element('search-doctors', array('cache' => array('config' => 'sec'))); ?>

        <h3><?php echo __l('Find Doctor..');?></h3>
  <div class="find-tl">
    <div class="find-tr">
      <div class="find-tm"> </div>
    </div>
  </div>
  <form id="mainSearchForm" name="mainSearchForm" method="get" action="<?php echo $this->webroot; ?>users/globalSearch">
  <div class="find-cl">
    <div class="find-cr">
      <div class="find-cm clearfix">
        <ul class="finddoctor-list grid_left clearfix">
          <li class="city"> <?php echo $this->Html->link(__l('City'), '#', array('title' => __l('City'), 'class' => "js-city-toggle-show sltoggle") );  ?>
          	<input type="hidden" id="search_city" name="city"/>
          	<input type="hidden" id="search_speciality" name="spc_id"/>
          	<input type="hidden" id="search_hospital" name="hid"/>
            <div class="js-cities sltoggle hide">
              <?php if(!empty($drop_cities)) {
					foreach($drop_cities as $drop_city) {
						$city_name = $drop_city['City']['name'];
		?>
              <p><a href="javascript://" class="cityvalues" cityid="<?php echo $drop_city['City']['id']; ?>"><?php echo $city_name; ?></a></p>
              <?php }
		  }
		?>
            </div>
          </li>
          <li class="specialty"> <?php echo $this->Html->link(__l('Specialty'), '#', array('title' => __l('Specialty'), 'class' => "js-specialty-toggle-show sltoggle"));  ?>
            <div class="js-specialties sltoggle hide">
            	
              <?php
						if (!empty($drop_specialties)):
							foreach ($drop_specialties as $specialty):
					?>
              <p> <a href="javascript://" class="spcvalues" spcid="<?php echo $specialty['Specialty']['id']; ?>"><?php echo $specialty['Specialty']['name']; ?></a></p>
              <?php
						endforeach;
					endif;
					?>
            </div>
          </li>
          
           <li class="insurance"> <?php echo $this->Html->link(__l('Hospital'), '#', array('title' => __l('Hospital'), 'class' => "js-insurances-toggle-show sltoggle"));  ?>
            <div class="js-insurances hide">
             
              <?php
						if (!empty($drop_hospitals)):
							foreach ($drop_hospitals as $hid=>$hospital):
					?>
              <p> <a href="javascript://" class="hvalues" hid="<?php echo $hid; ?>"><?php echo $hospital; ?></a></p>
              <?php
						endforeach;
					endif;
					?>
            </div>
          </li>
          
          
        </ul>
        <div class="search-title"><h4><button type="button" name="" onclick="return check_search();" title="Doctor Name" style="width:100px;height: 40px; "">Search</button></h4>
        	
        	<p class="search-by grid_left">
        		<span style="font-weight: bold;">Or Search by</span>
        <a title="Doctor Name" href="<?php echo $this->webroot; ?>directory">Doctor Name</a>, <a title="Practice Name" href="<?php echo $this->webroot; ?>specialties">Practice Name</a>, <a title="Procedure" href="<?php echo $this->webroot; ?>specialties">Procedure</a></p>
        </div>
      </div>
    </div>
  </div>
  <div class="find-bl">
    <div class="find-br">
      <div class="find-bm"> </div>
    </div>
  </div>
        <div class="appointment-title clearfix">
          <div class="grid_14">
            <h2><?php echo __l('Find a Doctor Appointment and Book Online Instantly..')?></h2>
            <p><?php echo __l('Doctor can connect with new people and expand their practice now.');?></p>
          </div>
          <span class="free-band"><span><?php echo __l('It\'s Free!');?></span></span> </div>
      </div>
    </div>
  </div>
</div>
<div class="find-doctor-block container_24">

  <div class="intro-list-block">

    <div class="intro-tl">
    <div class="intro-tr">
    <div class="intro-tm">
    </div>
    </div>
    </div>
    
  <div class="intro-cl">
    <div class="intro-cr">
    <div class="intro-inner">
   <ul class="intro-list clearfix">
    <li class="doctor">
      
      <div class="intro-list-inner">
        <div class="list-info-block clearfix">
          <h4><?php echo __l('Are You a Doctor?')?></h4>
          <p><?php echo __l('The best way to connect with new people and expand your practice. Please Join');?> <?php echo Configure::read('site.name');?> <?php echo __l('and let more pets come to you!');?></p>
          <div class="but"><?php echo $this->Html->link(__l('Join Now'), array('controller' => 'users', 'action' => 'login_user', 'admin' => false), array('title' => __l('Join Now')));?></div>
        </div>
      </div>
      
    </li>
    <li class="zocdoc">
      
      <div class="intro-list-inner">
         <div class="list-info-block clearfix">
          <h4><?php echo __l('Find clinic in your city.');?> </h4>
          <p><?php echo __l('we\'re bringing better healthcare of pets to the Live Capital of the World!');?></p>
          <div class="but"><?php echo $this->Html->link(__l('find an Doctor today'), array('controller'=> 'users', 'action' => 'search', 'city' => 'los-angeles'), array('title' => __l('find an doctor today'),'escape' => false));?></div>
        </div>
      </div>
      
    </li>
    <li class="bestplace">
      
      <div class="intro-list-inner">
        <div class="list-info-block clearfix">
          <h4><?php echo __l('What is ');?><?php echo Configure::read('site.name');?>?</h4>
          <p><?php echo __l('Bridging Doctor and People');?></p>

          <div class="but">
          <?php echo $this->Html->link(__l('See an Doctor'), array('controller'=> 'users', 'action' => 'search', 'city' => 'new-york'), array('title' => __l('See an Doctor'),'escape' => false));?>
           
          </div>
        </div>
      </div>
      
    </li>
  </ul>
</div>
    </div>
    </div>
<div class="intro-bl">
    <div class="intro-br">
    <div class="intro-bm">
    </div>
    </div>
    </div>
  
    </div>
  
  

</div>
