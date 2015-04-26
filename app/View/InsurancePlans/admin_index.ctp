<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="insurancePlans index js-response">
	<ul class="filter-list-block clearfix">
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Active) ? 'active-filter' : null; ?>
		<li class="green <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($approved, false). '<span>' . __l('Active') . '</span>', array('controller' => 'insurance_plans', 'action' => 'index', 'filter_id' => ConstMoreAction::Active), array('title' => __l('Active'),'escape' => false)); ?></li>
        <?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) ? 'active-filter' : null; ?>
		<li class="gray <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending, false). '<span>' . __l('Inactive') . '</span>', array('controller' => 'insurance_plans', 'action' => 'index', 'filter_id' => ConstMoreAction::Inactive), array('title' => __l('Inactive'),'escape' => false)); ?></li>
		<?php $class = (empty($this->request->params['named']['filter_id']) && empty($this->request->params['named']['main_filter_id'])) ? 'active-filter' : null; ?>
		<li class="black <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending + $approved, false). '<span>' . __l('Total') . '</span>', array('controller' => 'insurance_plans', 'action' => 'index'), array('title' => __l('Total'),'escape' => false)); ?></li>
	</ul>
	<div class="clearfix">
            <div class="grid_left"><?php echo $this->element('paging_counter');?></div>
            <div class="grid_right">
                <?php echo $this->Html->link(__l('Add'), array('controller' => 'insurance_plans', 'action' => 'add'), array('class' => 'add','title' => __l('Add'))); ?>
            </div>
        </div>
    <?php echo $this->Form->create('InsurancePlan' , array('class' => 'normal','action' => 'update')); ?>
    <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
     <table class="list">
        <tr>
            <th class="select"><?php echo __l('Select'); ?></th>
            <th class="actions"><?php echo __l('Actions');?></th>
            <th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('created', __l('Added on'));?></div></th>
            <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('InsurancePlan.name', __l('Insurance Plan'));?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('InsuranceCompany.name', __l('Insurance Company'));?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('InsurancePlan.user_count', __l('User Count'));?></div></th>
        </tr>
        <?php
        if (!empty($insurancePlans)):
        $i = 0;
        foreach ($insurancePlans as $insurancePlan):
        	$class = null;
        	if ($i++ % 2 == 0) :
        		$class = ' class="altrow"';
            endif;
        ?>
        	<tr<?php echo $class;?>>
                <td class="select"><?php echo $this->Form->input('InsurancePlan.'.$insurancePlan['InsurancePlan']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$insurancePlan['InsurancePlan']['id'], 'label' => false, 'class' => 'js-checkbox-list')); ?></td>
        		<td class="actions">
        		  <div class="action-block">
                    <span class="action-information-block">
                        <span class="action-left-block">&nbsp;&nbsp;</span>
                            <span class="action-center-block">
                                <span class="action-info">
                                    <?php echo __l('Action');?>
                                 </span>
                            </span>
                        </span>
                        <div class="action-inner-block">
                        <div class="action-inner-left-block">
                            <ul class="action-link clearfix">
                                 <li><?php echo $this->Html->link(__l('Edit'), array('action' => 'edit', $insurancePlan['InsurancePlan']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?></li>
								<li><?php echo $this->Html->link(__l('Delete'), array('action' => 'delete', $insurancePlan['InsurancePlan']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?>
                                  <?php echo $this->Layout->adminRowActions($insurancePlan['InsurancePlan']['id']);?>
                                </li>
                                <li><?php echo $this->Html->link(($insurancePlan['InsurancePlan']['is_active'] ==1)? 'Inactive': 'Active', array('controller' => 'insurance_companies', 'action'=>'update_status', $insurancePlan['InsurancePlan']['id'],'status'=>($insurancePlan['InsurancePlan']['is_active'] ==1)? 'inactive': 'active'), array('class' => ($insurancePlan['InsurancePlan']['is_active'] ==1)? 'js-delete reject': 'js-delete active-link', 'title' => ($insurancePlan['InsurancePlan']['is_active'] ==1)? 'Inactive': 'Active', 'escape' => false));?>
								</li>
							</ul>
        					</div>
        					<div class="action-bottom-block"></div>
        				  </div>
                          </div>
                  
                </td>
        		<td class="dc"><?php echo $this->Html->cDateTimeHighlight($insurancePlan['InsurancePlan']['created']);?></td>
                <td class="dl">
                    <?php echo $this->Html->cText($insurancePlan['InsurancePlan']['name']);?>
                </td>
				 <td class="dl">
                    <?php echo $this->Html->cText($insurancePlan['InsuranceCompany']['name']);?>
                </td>
                <td class="dl">
					 <?php echo $this->Html->cInt($insurancePlan['InsurancePlan']['user_count']);?>
                </td>
        	</tr>
        <?php
            endforeach;
        else:
        ?>
        	<tr>
        		<td colspan="7"><p class="notice"><?php echo __l('No Insurance Plans available');?></p></td>
        	</tr>
        <?php
        endif;
        ?>
    </table>
 
<?php
if (!empty($insurancePlans)) :
	?>
        <div class="admin-select-bot clearfix">
        <div class="admin-select-block">
            <div class="grid_left">
                <?php echo __l('Select:'); ?>
                <?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all','title' => __l('All'))); ?>
                <?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none','title' => __l('None'))); ?>
            </div>
            <div class="admin-checkbox-button grid_left">
                <?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?>
            </div>
            <div class="hide">
                    <?php echo $this->Form->submit('Submit');  ?>
              </div>
        </div>
        <div class="js-pagination grid_right">
            <?php echo $this->element('paging_links'); ?>
        </div>
        </div>
        <?php
    endif; ?>
 <?php echo $this->Form->end(); ?>
</div>