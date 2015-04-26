
<div class="appointment-block">
  <div class="appointment-block-out">
    <div class="appointment-block-in">
      <div class="appointment-block-inner container_24 clearfix"> <?php echo $this->element('search-doctors', array('cache' => array('config' => 'sec'))); ?>
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
  <h3><?php echo __l('Find Doctor..');?></h3>
  <div class="find-tl">
    <div class="find-tr">
      <div class="find-tm"> </div>
    </div>
  </div>
  <div class="find-cl">
    <div class="find-cr">
      <div class="find-cm clearfix">
        <ul class="finddoctor-list grid_left clearfix">
          <li class="city"> <?php echo $this->Html->link(__l('City'), '#', array('title' => __l('City'), 'class' => "js-city-toggle-show"));  ?>
            <div class="js-cities hide">
              <?php if(!empty($drop_cities)) {
					foreach($drop_cities as $drop_city) {
						$city_name = $drop_city['City']['name'].', '.$drop_city['State']['code'];
		?>
              <p><?php echo $this->Html->link($this->Html->cText($city_name), array('controller'=> 'users', 'action' => 'search', 'city' => $drop_city['City']['slug']), array('title' => __l($city_name),'escape' => false));?></p>
              <?php }
		  }
		?>
            </div>
          </li>
          <li class="specialty"> <?php echo $this->Html->link(__l('Specialty'), '#', array('title' => __l('Specialty'), 'class' => "js-specialty-toggle-show"));  ?>
            <div class="js-specialties hide">
              <?php
						if (!empty($drop_specialties)):
							foreach ($drop_specialties as $specialty):
					?>
              <p> <?php echo $this->Html->link($this->Html->cText($specialty['Specialty']['name']), array('controller'=> 'users', 'action' => 'search', 'doctor_specialty_id' =>$specialty['Specialty']['id']), array('title' => __l($specialty['Specialty']['name']),'escape' => false));?></p>
              <?php
						endforeach;
					endif;
					?>
            </div>
          </li>
          <li class="insurance"> <?php echo $this->Html->link(__l('Insurance'), '#', array('title' => __l('Insurance'), 'class' => "js-insurances-toggle-show"));  ?>
            <div class="js-insurances hide">
              <?php
						if (!empty($drop_insurance_companies)):
							foreach ($drop_insurance_companies as $insurance_company):
					?>
              <p> <?php echo $this->Html->link($this->Html->cText($insurance_company['InsuranceCompany']['name']), array('controller'=> 'users', 'action' => 'search', 'doctor_insurance_id' =>$insurance_company['InsuranceCompany']['id']), array('title' => __l($insurance_company['InsuranceCompany']['name']),'escape' => false));?></p>
              <?php
						endforeach;
					endif;
					?>
            </div>
          </li>
        </ul>
        <div class="search-title"><h4><?php echo __l('Or Search by');?></h4>
        <p class="search-by grid_left">
        <?php echo $this->Html->link(__l('Doctor Name'), array('controller' => 'directory'), array('title' => __l('Doctor Name')));?>, <?php echo $this->Html->link(__l('Practice Name'), array('controller' => 'specialties', 'action' => 'index'), array('title' => __l('Practice Name')));?>, <?php echo $this->Html->link(__l('Procedure'), array('controller' => 'specialties', 'action' => 'index'), array('title' => __l('Procedure')));?>, or <?php echo $this->Html->link(__l('Language'), array('controller' => 'languages', 'action' => 'index'), array('title' => __l('Language')));?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="find-bl">
    <div class="find-br">
      <div class="find-bm"> </div>
    </div>
  </div>
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
            <?/*php  echo $this->Html->link(Configure::read('site.name').' '.__l('See an Doctor'), array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'careers'), array('title' => Configure::read('site.name').' '.__l('See an Doctor'))); */?>
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
  
  <!-- <div class="sponsor-logo">
    <h3>As been Featured in:</h3>
    <div class="sponsor-tl">
    <div class="sponsor-tr">
    <div class="sponsor-tm">
    </div>
    </div>
    </div>
    <div class="sponsor-cl">
    <div class="sponsor-cr">
    <div class="sponsor-cm">
    
    <ul class="sponsor-list clearfix">
      <li><?php echo $this->Html->image('times-logo.gif'); ?></li>
      <li><?php echo $this->Html->image('cnn-logo.gif'); ?></li>
      <li><?php echo $this->Html->image('nbc-logo.gif'); ?></li>
      <li><?php echo $this->Html->image('fox-logo.gif'); ?></li>
      <li><?php echo $this->Html->image('forbes-logo.gif'); ?></li>
      <li><?php echo $this->Html->image('chronicale-logo.gif'); ?></li>
    </ul>
    </div>
    </div>
    </div>
    <div class="sponsor-bl">
    <div class="sponsor-br">
    <div class="sponsor-bm">
    </div>
    </div>
    </div>
  </div> -->

</div>
