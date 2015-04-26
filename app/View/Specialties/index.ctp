<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="specialties index">
    <div class="grid_17 alpha">
        <h2><?php echo __l('Find Doctors by Condition');?></h2>
		<?php 
		 $letter = '';
		 if(!empty($this->request->params['named']['letter'])) 
	 	 {
	  		 if($this->request->params['named']['letter'] == 'recent') {
			 	$letter = $this->request->params['named']['letter']; 
		 	 } else {
		 		$letter = strtoupper($this->request->params['named']['letter']); 
			 }
	  	 }
 		?>
        <ul class="letter-links clearfix">
    		<li>
        			<?php echo $this->Html->link(__l('Recent'), array('controller' => 'specialties', 'action' => 'index','letter' => 'recent', 'admin' => false), array('class' => ($letter=='recent')? 'active': '','title' => __l('Recent'))); ?>
        	</li>
		<?php for ($i = 65; $i < 91; $i++) { ?>
		<li>
			<?php echo $this->Html->link(__l(chr($i)), array('controller' => 'specialties', 'action' => 'index','letter' => strtolower(chr($i)), 'admin' => false), array('class' => ($letter==chr($i))? 'active': '','title' => __l(chr($i)), 'rel'=> '#'.chr($i))); ?>
		</li>
	    <?php }?>
        </ul>
		   <ol class="list dentist-list clearfix">
			<?php
				if (!empty($specialties)):
					foreach ($specialties as $specialty):
			?>
					  <li>
					  <?php echo $this->Html->link($this->Html->cText($specialty['Specialty']['name']), array('controller'=> 'users', 'action' => 'search', 'doctor_specialty_id' =>$specialty['Specialty']['id']), array('title' => __l($specialty['Specialty']['name']),'escape' => false));?>
					  </li>
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
		 </ol>
          </div>
		  
		  <div class="grid_7 omega">
		  	<div class="blue-tl">
            <div class="blue-tr">
                <div class="blue-tm"></div>
            </div>
        </div>
        <div class="blue-left">
            <div class="blue-right">
                <div class="blue-inner find-doc-block clearfix">
               		 <h3><?php echo __l('Find a Doctor Near You');?> </h3>
					 <div class="button-green"><?php echo $this->Html->link(__l('Search'), array('controller' => 'appointments', 'action' => 'update_status'), array( 'title' => __l('Search'))); ?></div>
      			</div>
            </div>
        </div>
        <div class="blue-bl">
            <div class="blue-br">
                <div class="blue-bm"></div>
            </div>
        </div>
		
            
            <div class="find-doctor-block">
          <div class="side2-tl">
            <div class="side2-tr">
              <div class="side2-tm">
                <h3><?php echo __l('Find Doctors by...');?></h3>
                </div>
            </div>
          </div>
          <div class="side2-inner find-doctor-inner clearfix">
				<div class="find-by-city down-arrow"><?php echo __l('City');?> </div>
				<div class="findby-open-city">
					<ul class="specialty-list">
					  <?php if(!empty($cities)) {
								foreach($cities as $city) {
								$city_name = $city['City']['name'].', '.$city['State']['code'];
						?>
						  <li>
							 <?php echo $this->Html->link($this->Html->cText($city_name), array('controller'=> 'users', 'action' => 'search','city'=> $city['City']['slug']), array('title' => __l($city_name),'escape' => false));?>
						  </li>
						<?php }
						  }
						?>
					</ul>
				</div>
          </div>
          <div class="side2-bl">
            <div class="side2-br">
              <div class="side2-bm"> </div>
            </div>
          </div>

        <div class="find-doctor-block">
          <div class="side2-tl">
            <div class="side2-tr">
              <div class="side2-tm">
                <h3>What is abs?</h3>
              </div>
            </div>
          </div>
          <div class="side2-inner find-doctor-inner clearfix">
            <p>abs is a free service for finding a doctor and making an appointment online, instantly.</p>
            <p>Give it a try right now. It doesn't hurt a bit, we promise!</p>
            <div class="green-outer">
                <div class="button-green"> <a href="#" title="Find Doctors">Find Doctors</a> </div>
            </div>
          </div>
          <div class="side2-bl">
            <div class="side2-br">
              <div class="side2-bm"> </div>
            </div>
          </div>
        </div>
      </div>
          </div>
</div>