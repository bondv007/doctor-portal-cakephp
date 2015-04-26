<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="clinics index">
    <h2 class="title"><?php echo $clinic_users['Clinic']['name'];?></h2>
    <div class="clearfix">
        <div class="side1">
        	<div class="form-box">
                <div class="form-box-inner">
                    <div class="clearfix">
                      <?php if ($this->Auth->sessionValid()): ?>
                		  <div class="grid_right button">
                		  <?php echo $this->Html->link(__l('Add Doctor'), array('controller' => 'users', 'action' => 'add', $this->Auth->user('id'),'admin' => false), array( 'title' => __l('Add Doctor'))); ?>
                		  </div>
                      <?php endif;  ?>
                    </div>
                   <table class="list">
                    <tr>
                		 <th><?php echo __l('Date'); ?></th>
	               		 <th><?php echo __l('Doctor'); ?></th>
                		 <th><?php echo __l('Specialy'); ?></th>
						 <th><?php echo __l('Contact Number'); ?></th>
						 <th><?php echo __l('Details'); ?></th>
						 <th><?php echo __l('Schedules'); ?></th>
						 <th><?php echo __l('Appointments'); ?></th>
                    </tr>
                    <?php
                    if (!empty($clinic_users['User'])):

                    $i = 0;
                    foreach ($clinic_users['User'] as $clinic_user):
                    	$class = null;
                    	if ($i++ % 2 == 0) {
                    		$class = ' class="altrow"';
                    	}
						if(!empty($clinic_user['UserProfile']['first_name']) and !empty($clinic_user['UserProfile']['first_name'])) {
							$doctor_name = $clinic_user['UserProfile']['first_name'].' '.$clinic_user['UserProfile']['last_name'];
						} else {	
							$doctor_name = $clinic_user['username'];
						}
                    ?>
                    	<tr<?php echo $class;?>>
                                <td><?php echo $this->Html->cDateTime($clinic_user['created']);?></td>
								<td><?php echo $this->Html->cText($doctor_name);?></td>
								<td><?php echo $this->Html->cText($clinic_user['UserProfile']['Specialty']['name']);?></td>
								<td><?php echo $this->Html->cText($clinic_user['UserProfile']['phone']);?></td>
                    			<td><?php echo $this->Html->link(__l('View Profile'), array('controller' => 'user','action'=>'view', $clinic_user['username']), array('title' => __l('View Profile')));?>
								</td>
								<td><?php echo $this->Html->link(__l('Add'), array('controller' => 'doctors','action'=>'timeslot','username'=>$clinic_user['username']), array('title' => __l('Add')));?>
								</td>
								<td><?php echo $this->Html->link(__l('View Details'), array('controller' => 'appointments','action'=>'index','clinic_id' => $clinic_users['Clinic']['id'],'user_id'=>$clinic_user['id']), array('title' => __l('View Details')));?>
								</td>
                    	</tr>
                    <?php
                        endforeach;
                    else:
                    ?>
                    	<tr>
                    		<td colspan="8" class="notice"><?php echo __l('No Clinic Users available');?></td>
                    	</tr>
                    <?php
                    endif;
                    ?>
                    </table>
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