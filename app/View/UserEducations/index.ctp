<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="userEducations index">
    <h2 class="title"><?php echo __l('My Educations');?></h2>
    <div class="clearfix">
        <div class="side1">
        	<div class="form-box">
                <div class="form-box-inner">
                    <div class="clearfix">
                      <?php if ($this->Auth->sessionValid()): ?>
                		  <div class="grid_right button">
                		  <?php echo $this->Html->link(__l('Add Educations'), array('controller' => 'user_educations', 'action' => 'add', 'admin' => false), array( 'title' => __l('Add Education'))); ?>
                		  </div>
                      <?php endif;  ?>
                    </div>
                   <table class="list">
                    <tr>
                		 <th><?php echo __l('Education'); ?></th>
                		 <th><?php echo __l('Location'); ?></th>
                		 <th><?php echo __l('Organization'); ?></th>
                		 <th><?php echo __l('Date'); ?></th>
                		 <th><?php echo __l('Edit'); ?></th>
                 		 <th><?php echo __l('Remove'); ?></th>
                    </tr>
                    <?php
                    if (!empty($userEducations)):

                    $i = 0;
                    foreach ($userEducations as $userEducation):
                    	$class = null;
                    	if ($i++ % 2 == 0) {
                    		$class = ' class="altrow"';
                    	}
                    ?>
                    	<tr<?php echo $class;?>>
                                <td><?php echo $this->Html->cText($userEducation['UserEducation']['education']);?></td>
                    			<td><?php echo $this->Html->cText($userEducation['UserEducation']['location']);?></td>
                    			<td><?php echo $this->Html->cText($userEducation['UserEducation']['organization']);?></td>
                    			<td><?php echo $this->Html->cText($userEducation['UserEducation']['date']);?></td>
                    			<td><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $userEducation['UserEducation']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?></td>
                    			<td><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $userEducation['UserEducation']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></td>
                    	</tr>
                    <?php
                        endforeach;
                    else:
                    ?>
                    	<tr>
                    		<td colspan="8" class="notice"><?php echo __l('No Educations available');?></td>
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