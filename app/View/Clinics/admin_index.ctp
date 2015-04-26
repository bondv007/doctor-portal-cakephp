<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="clinics index js-response">
<div class="clearfix">
	<ul class="filter-list-block clearfix">
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Active) ? 'active-filter' : null; ?>
		<li class="green <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($active, false). '<span>' . __l('Active Clinics') . '</span>', array('controller' => 'clinics', 'action' => 'index', 'filter_id' => ConstMoreAction::Active), array('title' => __l('Active Clinics'),'escape' => false)); ?></li>
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) ? 'active-filter' : null; ?>
		<li class="gray <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($inactive, false). '<span>' . __l('Inactive Clinics') . '</span>', array('controller' => 'clinics', 'action' => 'index', 'filter_id' => ConstMoreAction::Inactive), array('title' => __l('Inactive Clinics'),'escape' => false)); ?></li>
		<?php $class = (empty($this->request->params['named']['filter_id']) && empty($this->request->params['named']['main_filter_id'])) ? 'active-filter' : null; ?>
		<li class="black <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($active + $inactive, false). '<span>' . __l('Total Clinics') . '</span>', array('controller' => 'clinics', 'action' => 'index'), array('title' => __l('Total Clinics'),'escape' => false)); ?></li>
	</ul>
</div>
<div class="clearfix">
    <div class="grid_left">
        <?php echo $this->element('paging_counter'); ?>
    </div>
    <div class="grid_left">
        <?php echo $this->Form->create('Clinic', array('type' => 'get', 'class' => 'normal search-form clearfix', 'action'=>'index')); ?>
        <?php echo $this->Form->input('q', array('label' => 'Keyword')); ?>
        <?php echo $this->Form->submit(__l('Search'));?>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="grid_right add-block">
    	<?php echo $this->Html->link(__l('Add'), array('controller' => 'clinics', 'action' => 'add'), array('class' => 'add','title'=>__l('Add'))); ?>
    </div>
</div>
<?php
	echo $this->Form->create('Clinic' , array('class' => 'normal','action' => 'update'));
?>
<?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>

<table class="list">
	<tr>
		<th class="Select"><?php echo __l('Select'); ?></th>
		<th class="dc"><?php echo __l('Actions'); ?></th>
		<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('Clinic.name', __l('Clinic(Hospital Name)')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('Clinic.user_count',__l('Doctors')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('Country',__l('Country')); ?></div></th>	
	</tr>
<?php
if (!empty($clinics)):
$i = 0;
foreach ($clinics as $clinic):
	$class = null;
	if ($i++ % 2 == 0):
		$class = "altrow";
	endif;
?>
	<tr class="<?php echo $class;?>">
		<td class="select"><?php echo $this->Form->input('Clinic.'.$clinic['Clinic']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$clinic['Clinic']['id'], 'label' => false, 'class' => 'js-checkbox-list')); ?></td>
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
										<li><?php echo $this->Html->link(__l('Edit'), array('controller' => 'clinics', 'action'=>'edit', $clinic['Clinic']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?></li>
										<li><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $clinic['Clinic']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></li>
										</ul>
									</div>
									<div class="action-bottom-block"></div>
								</div>
							</div>
						 </td>
					<td class="dl"><?php echo $this->Html->cText($clinic['Clinic']['name']);?></td>						 
					<td class="dl"><?php echo $this->Html->link($this->Html->cInt($clinic['Clinic']['user_count'], false), array('controller' => 'users', 'action' => 'index', 'clinic_id' => $clinic['Clinic']['id']));?></td>						
					<td class="dl"><?php echo $clinic['Country']['name']; ?></td>	
		</tr>
<?php
    endforeach;
else:
?>
	<tr>
		<td colspan="15" class="notice"><?php echo __l('No Clinics available');?></td>
	</tr>
<?php
endif;
?>
</table>

<?php
if (!empty($clinics)):
?>
    <div class="clearfix">
    <div class="grid_left admin-select-block">
    	<div>
    		<?php echo __l('Select:'); ?>
    		<?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all', 'title' => __l('All'))); ?>
    		<?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none', 'title' => __l('None'))); ?>
    		<?php echo $this->Html->link(__l('Inactive'), '#', array('class' => 'js-admin-select-pending', 'title' => __l('Inactive'))); ?>
    		<?php echo $this->Html->link(__l('Active'), '#', array('class' => 'js-admin-select-approved', 'title' => __l('Active'))); ?>
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