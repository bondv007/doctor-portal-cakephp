<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="clinics index">
    <h2 class="title"><?php echo __l('My Clinics');?></h2>
    <div class="clearfix">
        <div class="side1">
        	<div class="form-box">
                <div class="form-box-inner">
                    <div class="clearfix">
                      <?php if ($this->Auth->sessionValid()): ?>
                		  <div class="grid_right button">
                		  <?php echo $this->Html->link(__l('Add Clinic'), array('controller' => 'clinics', 'action' => 'add', 'admin' => false), array( 'title' => __l('Add Clinic'))); ?>
                		  </div>
                      <?php endif;  ?>
                    </div>
                   <table class="list">
                    <tr>
                		 <th><?php echo __l('Date'); ?></th>
						 <th><?php echo __l('Clinic'); ?></th>
                		 <th><?php echo __l('Location'); ?></th>
                		 <th><?php echo __l('Details'); ?></th>
						 <th><?php echo __l('Doctors'); ?></th>
                    </tr>
                    <?php
                    if (!empty($clinics)):

                    $i = 0;
                    foreach ($clinics as $clinic):
                    	$class = null;
                    	if ($i++ % 2 == 0) {
                    		$class = ' class="altrow"';
                    	}
                    ?>
                    	<tr<?php echo $class;?>>
                                <td><?php echo $this->Html->cDateTime($clinic['Clinic']['created']);?></td>
								<td><?php echo $this->Html->cText($clinic['Clinic']['name']);?></td>
                    			<td><?php echo $this->Html->cText($clinic['City']['name']);?></td>
                    			<td><?php echo $this->Html->link(__l('Details'), array('controller' => 'clinics','action'=>'view', $clinic['Clinic']['slug']), array('title' => __l('Details')));?>							</td>								
								<td><?php echo $this->Html->link(__l('View Doctors'), array('controller' => 'clinics','action'=>'my_doctors', $clinic['Clinic']['id']), array('title' => __l('View Doctors')));?>
								</td>
                    	</tr>
                    <?php
                        endforeach;
                    else:
                    ?>
                    	<tr>
                    		<td colspan="8" class="notice"><?php echo __l('No Clinics available');?></td>
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