<h2 class="title"><?php echo __l('Check Available');?></h2>
<div class="clearfix">
    <div class="side1">
        <div class="filtertop-block">
            <?php echo $this->Form->create('DoctorAvailability', array('action' => 'timeslot','class' => 'normal'));?>
            <div class="clearfix">
                <div class="setup-available-time-input">
				   <?php echo $this->Form->input('months', array('type' => 'select', 'legend' =>false, 'value'=>$select_month,'class' => 'js-repeat-until-select')); ?>
				   <?php echo $this->Form->input('years', array('type' => 'select', 'legend' =>false, 'value' =>$select_year,'class' => 'js-repeat-until-select')); ?>
                </div>

                <?php
                    echo $this->Form->submit(__l('Check'));
                ?>
		</div>
                <div class="">
                    <?php if(!empty($doctorAvailability)) { ?>
            			 <?php if(!empty($clinics)) { ?>
            				  <?php foreach($clinics as $clinic){ ?>

							<?php echo $this->Html->link(__l('Setup Available Time for '.$clinic['Clinic']['name']), array('controller' => 'doctors', 'action' => 'setup_time','user_id' =>$user_id,'clinic_id'=>$clinic['Clinic']['id'], 'admin' => false), array( 'title' => __l('Setup Available Time'), 'class' => 'add')); ?>
            				  <?php } ?>
            			 <?php } else { ?>
            			 		<?php echo $this->Html->link(__l('Firstly Add Clinics'), array('controller' => 'users', 'action' => 'manage_clinics', 'admin' => false), array('title' => 'Firstly Add Clinics')); ?>
            			 <?php } ?>
            			 
                    
                    <?php } else {?>
                    <?php echo $this->Html->link(__l('Add Available info'), array('controller' => 'doctor_availabilities', 'action' => 'add',$user_id, 'admin' => false), array( 'title' => __l('Add Available info'), 'class' => 'add')); ?>
                    <?php } ?>
                </div>
            

            <?php echo $this->Form->end();?>
        </div>
	    <div class="clearfix">
	    <?php if(isset($clinic_id)){ ?>
	    <div style="padding:10px;float:left;border:3px solid #18c6ff;background:white;margin-top:10px;margin-left:4px;">
	     <?php echo $this->Html->link(__l('All'), array('controller' => 'doctors', 'action' => 'timeslot', $this->Auth->user('username')), array('title' => __l('All')));?>
	    </div>
	    <?php } else { ?>
		<div style="padding:10px;float:left;border:3px solid #18c6ff;background:#C2DDE4;margin-top:10px;margin-left:4px;">
	     <?php echo $this->Html->link(__l('All'), array('controller' => 'doctors', 'action' => 'timeslot', $this->Auth->user('username')), array('title' => __l('All')));?>
	    </div>
	    <?php } ?>
	    <?php if(!empty($clinics)) { ?>
						  <?php foreach($clinics as $clinic){ ?>
						  <?php if($clinic['Clinic']['id']==$clinic_id) { ?> 
						  <div style="padding:10px;float:left;border:3px solid #18c6ff;background:#C2DDE4;margin-top:10px;margin-left:4px;">
						 <?php } else { ?>
						   <div style="padding:10px;float:left;border:3px solid #18c6ff;background:white;margin-top:10px;margin-left:4px;">
						 <?php } ?>

								<?php echo $this->Html->link(__l($clinic['Clinic']['name']), array('controller' => 'doctors', 'action' => 'timeslot', $this->Auth->user('username'),'clinic_id'=>$clinic['Clinic']['id']),array('title' => __l($clinic['Clinic']['name']),'class'=>'show')); ?>
						</div>
						  <?php } ?>
					 <?php } ?>
	    </div>
	<div class="form-box">
            <div class="form-box-inner">
                <div class="js-calendar-timeslot-responses cal-table-block">
	               <?php
                    if (!empty($this->request->params['named']['show']) && $this->request->params['named']['show'] == 'monthly'):
        			echo $this->Calendar->timeslot($year, $month, $day, $data);
                    endif; ?>
                </div>
            </div>
        </div>
        <div class="side2">
            <?php echo $this->element('sidebar', array('config' => 'sec'));?>
        </div>
    </div>
</div>