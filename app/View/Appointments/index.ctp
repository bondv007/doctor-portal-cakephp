<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
             <div class="form-box">
                <div class="form-box-inner">
                    <table class="list list2">
                    	<tr>
                    		<th class="dc"><div><?php echo __l('Appointment Info'); ?></div></th>
							<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('user_id',__l('Patient\'s Name')); ?></div></th>
							<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('doctor_user_id',__l('Doctor\'s Name')); ?></div></th>
                    		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('appointment_date',__l('Appointment Date')); ?></div></th>
							<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('appointment_time',__l('Appointment time')); ?></div></th>
                    		<th class="dc"><?php echo __l('Status'); ?></th>
                    	</tr>
                     <?php
                        if (!empty($appointments)):
                        $i = 0;
                        foreach ($appointments as $appointment):
                        	$class = null;
                        	if ($i++ % 2 == 0) :
                        		$class = ' class="altrow"';
                            endif;
                        ?>
                        	<tr<?php echo $class;?>>
                        		<td class="dc"><?php echo $this->Html->link($this->Html->cText(__l('Details')), array('controller'=> 'appointments', 'action' => 'view', $appointment['Appointment']['id']), array('escape' => false));?></td>
                				<td class="dl"><?php echo $this->Html->cText(ucfirst($appointment['Appointment']['first_name']. ' ' . $appointment['Appointment']['last_name']));?></td>
								<td class="dl"><?php echo $this->Html->cText($appointment['DoctorUser']['username']);?></td>
								<td class="dl"><?php echo $this->Html->cText($appointment['Appointment']['appointment_date']);?></td>
								<td class="dl"><?php echo $this->Html->cText($appointment['Appointment']['appointment_time']);?></td>
								<td class="dl">  
								<?php echo $this->Html->cText($appointment['AppointmentStatus']['name']);?>
								<?php if($appointment['AppointmentStatus']['id'] == ConstAppointmentStatus::PendingApproval) { ?>
								<?php echo $this->Html->link(__l('Cancel'), array('controller'=> 'appointments', 'action' => 'view', $appointment['Appointment']['id']), array('class' => 'js-delete','escape' => false));?>
								<?php }  ?>
								 </td>
                        	</tr>
                        <?php
                            endforeach;
                        else:
                        ?>
                        	<tr>
                        		<td colspan="7"><p class="notice"><?php echo __l('No upcoming appointments...');?></p></td>
                        	</tr>
                        <?php
                        endif;
                        ?>
                    </table>
                    <?php
                    if (!empty($appointments)) {
                        echo $this->element('paging_links');
                    }
                    ?>
 </div> </div>