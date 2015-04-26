<?php /* SVN: $Id: $ */ ?>
<div class="userClinics form">
    <h2 class="title"><?php echo __l('My Clinics'); ?></h2>
    <div class="clearfix">
        <div class="side1">
            <div class="form-box">
                <div class="form-box-inner">
					<div class="clearfix">
			 		 	<div class="manage-clinics">
				 			<?php echo $this->Html->link(__l('Manage Clinics'), array('controller' => 'users', 'action' => 'manage_clinics', 'admin' => false), array( 'title' => __l('Manage Clinics'), 'class' => 'add js-thickbox')); ?>
						</div> 
					</div>
						<ol class="practice-list clearfix">
							  <?php if(!empty($clinics)) { 
							  		foreach($clinics as $clinic) {
							  	?> 
							   <li>
								   <h5><?php echo $this->Html->link(__l($clinic['Clinic']['name']), array('controller' => 'clinics', 'action' => 'view'), array('title'=>__l($clinic['Clinic']['name']))); ?>
									</h5>
								   <address>
								   <span><?php echo $this->Html->cText($clinic['Clinic']['address']);?>, <?php echo $this->Html->cText($clinic['Clinic']['address2']);?></span> <span><?php echo $this->Html->cText($clinic['City']['name']);?>,</span> <span> <?php echo $this->Html->cText($clinic['State']['code']);?> <?php echo $this->Html->cText($clinic['Clinic']['zip']);?> </span>
								   </address>
							   </li>
							   <?php } 
							   }
							   ?>
							   
						 </ol>            
                </div>
            </div>
        </div>
        <div class="side2">
            <?php
            	echo $this->element('sidebar', array('config' => 'sec'));
            ?>
        </div>
    </div>
</div>