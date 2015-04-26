<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="planUsers index js-response">
<div class="clearfix">
    <div class="grid_left">
        <?php echo $this->element('paging_counter'); ?>
    </div>
</div>
<?php
	echo $this->Form->create('PlanUser' , array('class' => 'normal','action' => 'update'));
?>
<?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>

<table class="list">
	<tr>
		<th class="Select"><?php echo __l('Select'); ?></th>
		<th class="dc"><?php echo __l('Actions'); ?></th>
		<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('User.username', __l('User')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('Plan.name',__l('Plan')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('PlanUser.expiry_date',__l('Expiry Date')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('PlanUser.duration',__l('Days')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('PlanUser.paid',__l('Paid?')); ?></div></th>	
	</tr>
<?php
if (!empty($planUsers)):
$i = 0;
foreach ($planUsers as $planUser):
	$class = null;
	if ($i++ % 2 == 0):
		$class = "altrow";
	endif;
?>
	<tr class="<?php echo $class;?>">
		<td class="select"><?php echo $this->Form->input('PlanUser.'.$planUser['PlanUser']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$planUser['PlanUser']['id'], 'label' => false, 'class' => 'js-checkbox-list')); ?></td>
		<td  class="actions">
							<div class="action-block">
								<span class="action-information-block">
									<span class="action-left-block">&nbsp;
									</span>
									<span class="action-center-block">
										<span class="action-info">
											<?php echo __l('Action');?>
										</span>
									</span>
								</span>
								<div class="action-inner-block">
									<div class="action-inner-left-block">
										<ul class="action-link clearfix">										
										<li><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $planUser['PlanUser']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></li>
										</ul>
									</div>
									<div class="action-bottom-block"></div>
								</div>
							</div>
						 </td>
					<td class="dl"><?php echo $this->Html->cText($planUser['User']['username']);?></td>						 
					<td class="dl"><?php echo $this->Html->cText($planUser['Plan']['name']);?></td> 
					<td class="dl"><?php echo $this->Html->cDate($planUser['PlanUser']['expiry_date']);?></td> 			
					<td class="dl"><?php echo $this->Html->cInt($planUser['PlanUser']['duration']);?></td> 					
					<td class="dl"><?php echo $this->Html->cBool($planUser['PlanUser']['is_paid']);?></td>	
		</tr>
<?php
    endforeach;
else:
?>
	<tr>
		<td colspan="15" class="notice"><?php echo __l('No Plan Users available');?></td>
	</tr>
<?php
endif;
?>
</table>

<?php
if (!empty($planUsers)):
?>
    <div class="clearfix">
    <div class="grid_left admin-select-block">
    	<div>
    		<?php echo __l('Select:'); ?>
    		<?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all', 'title' => __l('All'))); ?>
    		<?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none', 'title' => __l('None'))); ?>
    	</div>
    	<div class="admin-checkbox-button"><?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?></div>
    </div>
    <div class="js-pagination grid_right">
        <?php echo $this->element('paging_links'); ?>
    </div>
    </div>
    <div class="hide">
	    <?php echo $this->Form->submit('Submit'); ?>
    </div>
<?php
endif;
echo $this->Form->end();
?>
</div>
