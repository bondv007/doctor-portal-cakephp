<?php /* SVN: $Id: admin_index.ctp 4534 2010-05-06 02:45:43Z vidhya_112act10 $ */ ?>
<div class="languages index">
    <div class="grid_17 alpha">
        <h2><?php echo __l('Find Doctors by Language');?></h2>
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
        			<?php echo $this->Html->link(__l('Recent'), array('controller' => 'languages', 'action' => 'index','letter' => 'recent', 'admin' => false), array('class' => ($letter=='recent')? 'active': '','title' => __l('Recent'))); ?>
        	</li>
    	<?php for ($i = 65; $i < 91; $i++) { ?>
		<li>
			<?php echo $this->Html->link(__l(chr($i)), array('controller' => 'languages', 'action' => 'index','letter' => strtolower(chr($i)), 'admin' => false), array('class' => ($letter==chr($i))? 'active': '','title' => __l(chr($i)), 'rel'=> '#'.chr($i))); ?>
		</li>
	    <?php }?>
        </ul>
        <ol class="list language-list clearfix">
    		<?php
    		if (!empty($languages)):
    			foreach ($languages as $language):
    		?>
            <li>
                <?php echo $this->Html->link($this->Html->cText($language['Language']['name']), array('controller'=> 'users', 'action' => 'search', 'language_id'=>$language['Language']['id']), array('title' => __l($language['Language']['name']),'escape' => false));?>
            </li>
				<?php
			endforeach;
		else:
		?>
			<li>
				<p class="notice"><?php echo __l('No Languages available');?></p>
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
				<div class="findby-open-city hide">
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
				<div class="find-by-speciality down-arrow"><?php echo __l('Speciality');?> </div>

				<div class="findby-open-speciality hide">
					<ul class="specialty-list">
						<?php if(!empty($specialties)) {
								foreach($specialties as $specialty) {
						?>
						  <li>
							  <?php echo $this->Html->link($this->Html->cText($specialty['Specialty']['name']), array('controller'=> 'users', 'action' => 'search','doctor_specialty_id'=> $specialty['Specialty']['slug']), array('title' => __l($specialty['Specialty']['name']),'escape' => false));?>

							  
						  </li>
						<?php }
						  }
						?>
						<li>
							  <?php echo $this->Html->link(__l('More...'), array('controller'=> 'specialties', 'action' => 'index'), array('title' => __l('More...'),'escape' => false));?>
						  </li>
					</ul>
				</div>
				<div class="findby-open-topsearches hide">
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