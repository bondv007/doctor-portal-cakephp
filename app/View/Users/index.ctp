<div class="users index">
    <h2><?php echo $this->pageTitle;?></h2>
 </div>
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
<div class="grid_17 alpha">
<div class="sponsor-tl">
    <div class="sponsor-tr">
    <div class="sponsor-tm">
    </div>
    </div>
    </div>
<div class="sponsor-cl">
    <div class="sponsor-cr">
    <div class="sponsor-cm">
        <ul class="letter-links clearfix">
				<li>
        			<?php echo $this->Html->link(__l('Recent'), array('controller' => 'users', 'action' => 'index','letter' => 'recent', 'admin' => false), array('class' => ($letter=='recent')? 'active': '','title' => __l('Recent'))); ?>
        		</li>
        	<?php for ($i = 65; $i < 91; $i++) { ?>
        		<li>
        			<?php echo $this->Html->link(__l(chr($i)), array('controller' => 'users', 'action' => 'index','letter' => strtolower(chr($i)), 'admin' => false), array('class' => ($letter==chr($i))? 'active': '','title' => __l(chr($i)), 'rel'=> '#'.chr($i))); ?>
        		</li>
        	<?php
        		}
        	 ?>
        </ul>
        <?php if(!empty($search_title)) { ?>
        	<h3 class="blue-title"><?php echo $search_title;?></h3>
        <?php } ?>
    	   <ol class="practice-list clearfix">
		  <?php
				if (!empty($users)):
					foreach ($users as $user):
		  ?>
		   <li>
			   <h5><?php echo $this->Html->link(ucfirst($user['User']['username']), array('controller' => 'users', 'action' => 'view', $user['User']['username']),array('title' => $user['User']['username'])); ?></h5>
			   <address>
			  		 <span>
						 <?php if(!empty($user['UserProfile']['address'])) { ?>
							<?php echo $this->Html->cText($user['UserProfile']['address']);?>
						 <?php } ?>
						 <?php if(!empty($user['UserProfile']['City']['name'])) { ?>
							<?php echo $this->Html->cText($user['UserProfile']['City']['name']);?>,
						 <?php } ?>
					 </span>
					 <span>
					 <?php if(!empty($user['UserProfile']['State']['code'])) { ?>
						 <?php echo $this->Html->cText($user['UserProfile']['State']['code']);?>
					 <?php } ?>
					 <?php if(!empty($user['UserProfile']['zip_code'])) { ?>
						 <?php echo $this->Html->cText($user['UserProfile']['zip_code']);?>
					 <?php } ?>
					  </span>
			   </address>
		   </li>
	   <?php
    endforeach;
else:
?>
	<li class="notice"><?php echo __l('No Results found');?></li>
<?php
endif;
?>
</ol>
         <?php if (!empty($users)) {
         	  echo $this->element('paging_links');
          }
        ?>


</div></div></div>
      <div class="sponsor-bl">
    <div class="sponsor-br">
    <div class="sponsor-bm">
    </div>
    </div>
    </div>
      </div>

    <div class="grid_7 omega">
        <div class="blue-tl">
            <div class="blue-tr">
                <div class="blue-tm"></div>
            </div>
        </div>
        <div class="blue-left">
            <div class="blue-right">
                <div class="blue-inner">
               		<?php echo $this->Form->create('User', array('type' => 'get', 'class' => 'normal practice-search clearfix', 'action'=>'index')); ?>
        			<?php echo $this->Form->input('q', array('label' => 'Search by name', 'class' =>'searchDoctor')); ?>
        			<div class="submit-block clearfix"><?php echo $this->Form->submit(__l('Search'));?></div>
        			<?php echo $this->Form->end(); ?>
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