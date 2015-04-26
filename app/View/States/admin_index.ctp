<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="states index js-response">
	<ul class="filter-list-block clearfix">
     	<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Active) ? 'active-filter' : null; ?>
       	<li class="green <?php echo $class; ?>" title="<?php echo __l('Approved');?>"><?php echo $this->Html->link($this->Html->cInt($active, false).'<span>' . __l('Approved').'</span>', array('controller' => 'states', 'action' => 'index', 'filter_id' => ConstMoreAction::Active),array('escape' => false)); ?></li>
       	<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) ? 'active-filter' : null; ?>
      	<li class="gray <?php echo $class; ?>" title="<?php echo __l('Disapproved');?>"><?php echo $this->Html->link($this->Html->cInt($inactive, false). '<span>' . __l('Disapproved').'</span>', array('controller' => 'states', 'action' => 'index', 'filter_id' => ConstMoreAction::Inactive),array('escape' => false)) ?></li>
       	<?php $class = (empty($this->request->params['named']['filter_id'])) ? ' active-filter' : null; ?>
       	<li class="black <?php echo $class; ?>" title="<?php echo __l('All');?>"><?php echo $this->Html->link($this->Html->cInt($active + $inactive, false). '<span>'.__l('All').'</span> ', array('controller' => 'states', 'action' => 'index'),array('escape' => false)) ?></li>
	</ul>
	<div class="clearfix">
    	<div class="grid_left">
        	<?php echo $this->element('paging_counter');?>
        </div>
        <div class="grid_left">
            <?php echo $this->Form->create('State', array('type' => 'get', 'class' => 'normal search-form', 'action'=>'index')); ?>
            <?php echo $this->Form->input('filter_id',array('empty' => __l('Please Select'))); ?>
            <?php echo $this->Form->input('q', array('label' => 'Keyword')); ?>
            <?php echo $this->Form->submit(__l('Search'));?>
        	<?php echo $this->Form->end(); ?>
        </div>
        <div class="grid_right add-block">
            <?php echo $this->Html->link(__l('Add'), array('controller' => 'states', 'action' => 'add'), array('title' => __l('Add New State'), 'class' => 'add'));?>
        </div>
    </div>
        <?php
        echo $this->Form->create('State' , array('action' => 'update','class'=>'normal'));?>
        <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
        <table class="list">
            <tr>
                <th class="select"><?php echo __l('Select');?></th>
                <th class="actions"><?php echo __l('Actions');?></th>
                <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('Country.name',__l('Country'));?></div></th>
                <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('name');?></div></th>
            </tr>
            <?php
                if (!empty($states)):
                $i = 0;
                    foreach ($states as $state):
                        $class = null;
						$active_class='';
                        if ($i++ % 2 == 0) :
                            $class = "altrow";
                        endif;
                        if($state['State']['is_approved'])  :
                            $status_class = 'js-checkbox-active';
                        else:
							$active_class = ' inactive-record';
                            $status_class = 'js-checkbox-inactive';
                        endif;
                        ?>
                        <tr class="<?php echo $class.$active_class;?>">
                            <td>
                                <?php
                                    echo $this->Form->input('State.'.$state['State']['id'].'.id',array('type' => 'checkbox', 'id' => "admin_checkbox_".$state['State']['id'],'label' => false , 'class' => $status_class.' js-checkbox-list'));
                                ?>
                            </td>
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
													<li><?php
													echo $this->Html->link(__l('Edit'), array('action' => 'edit', $state['State']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?>
													</li>
													<li><?php echo $this->Html->link(__l('Delete'), array('action' => 'delete', $state['State']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));
													?><?php echo $this->Layout->adminRowActions($state['State']['id']);?>
													</li>
													<li>
                        							<?php echo $this->Html->link(($state['State']['is_approved'] ==1)? 'Disapproved': 'Approved', array('controller' => 'states', 'action'=>'update_status', $state['State']['id'],'status'=>($state['State']['is_approved'] ==1)? 'disapproved': 'approved'), array('class' => ($state['State']['is_approved'] ==1)? 'js-delete reject': 'js-delete active-link', 'title' => ($state['State']['is_approved'] ==1)? 'Disapproved': 'Approved', 'escape' => false));?>
                                                     </li>
													
											</ul>
										</div>
										<div class="action-bottom-block"></div>
									</div>
								</div>
							 </td>
                            <td class="dl"><?php echo $this->Html->cText($state['Country']['name']);?></td>
                            <td class="dl"><?php echo $this->Html->cText($state['State']['name']);?></td>
                        </tr>
                        <?php
                    endforeach;
            else:
                ?>
                <tr>
                    <td class="notice" colspan="6"><?php echo __l('No states available');?></td>
                </tr>
                <?php
            endif;
            ?>
        </table>
        <?php
         if (!empty($states)) : ?>
            <div class="clearfix">
                <div class="grid_left admin-select-block">
                    <div>
                        <?php echo __l('Select:'); ?>
                        <?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all','title'=>__l('All'))); ?>
                        <?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none','title'=>__l('None'))); ?>
                        <?php echo $this->Html->link(__l('Unapproved'), '#', array('class' => 'js-admin-select-pending','title'=>__l('Unapproved'))); ?>
                        <?php echo $this->Html->link(__l('Approved'), '#', array('class' => 'js-admin-select-approved','title'=>__l('Approved'))); ?>
                    </div>
                    <div>
                         <?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?>
                    </div>
                </div>
                <div class="js-pagination grid_right">
                    <?php  echo $this->element('paging_links'); ?>
                </div>
            </div>
            <div class="hide">
                <?php echo $this->Form->submit('Submit');  ?>
            </div>
            <?php
         endif; ?>
        <?php echo $this->Form->end();?>

</div>