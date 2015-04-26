<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="cities index js-response">
       <ul class="filter-list-block clearfix">
        	<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Active) ? 'active-filter' : null; ?>
        	<li class="green <?php echo $class; ?>" title="<?php echo __l('Approved');?>"><?php echo $this->Html->link($this->Html->cInt($active, false).'<span>' . __l('Approved').'</span>', array('controller' => 'cities', 'action' => 'index', 'filter_id' => ConstMoreAction::Active),array('escape' => false)); ?></li>

        	<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) ? 'active-filter' : null; ?>
        	<li class="gray <?php echo $class; ?>" title="<?php echo __l('Disapproved');?>"><?php echo $this->Html->link($this->Html->cInt($inactive, false). '<span>' . __l('Disapproved').'</span>', array('controller' => 'cities', 'action' => 'index', 'filter_id' => ConstMoreAction::Inactive),array('escape' => false)) ?></li>

        	<?php $class = (empty($this->request->params['named']['filter_id'])) ? ' active-filter' : null; ?>
        	<li class="black <?php echo $class; ?>" title="<?php echo __l('All');?>"><?php echo $this->Html->link($this->Html->cInt($active + $inactive, false). '<span>'.__l('All').'</span> ', array('controller' => 'cities', 'action' => 'index'),array('escape' => false)) ?></li>
    </ul>
	<div>
	<div class="clearfix">
    	<div class="grid_left">
    	   <?php echo $this->element('paging_counter');?>
        </div>
        <div class="grid_left">
            <?php echo $this->Form->create('City', array('type' => 'get', 'class' => 'normal search-form', 'action'=>'index')); ?>
            <?php echo $this->Form->input('q', array('label' => __l('Keyword'))); ?>
        	<?php echo $this->Form->submit(__l('Search'));?>
        	<?php echo $this->Form->end(); ?>
        </div>
        <div class="grid_right add-block">
    		<?php echo $this->Html->link(__l('Add'), array('controller' => 'cities', 'action' => 'add'), array('title' => __l('Add New City'), 'class' => 'add')); ?>
    	</div>
	</div>
		<?php
		echo $this->Form->create('City', array('action' => 'update','class'=>'normal')); ?>
		<?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>

		<table class="list">
			<tr>
				<th class="select"><?php echo __l('Select');?></th>
				<th class="actions"><?php echo __l('Actions');?></th>
				<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('name');?></div></th>
				<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('Country.name',__l('Country'), array('url'=>array('controller'=>'cities', 'action'=>'index')));?></div></th>
				<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('State.name',__l('State'), array('url'=>array('controller'=>'cities', 'action'=>'index')));?></div></th>
			</tr>
			<?php
			if (!empty($cities)):
				$i = 0;
				foreach ($cities as $city):
					$class = null;
					$active_class = '';
					if ($i++ % 2 == 0) :
						$class = "altrow";
					endif;
					if($city['City']['is_approved'])  :
						$status_class = 'js-checkbox-active';
					else:
						$active_class = ' inactive-record';
						$status_class = 'js-checkbox-inactive';
					endif;
				?>
					<tr class="<?php echo $class.$active_class;?>">
						<td>
							<?php
							echo $this->Form->input('City.'.$city['City']['id'].'.id',array('type' => 'checkbox', 'id' => "admin_checkbox_".$city['City']['id'],'label' => false , 'class' => $status_class.' js-checkbox-list'));
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
											echo $this->Html->link(__l('Edit'), array('action'=>'edit', $city['City']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?>
                                          
										</li>
										<li>
										  <?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $city['City']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));
										?>
										</li>
										<li>
            							<?php echo $this->Html->link(($city['City']['is_approved'] ==1)? 'Disapproved': 'Approved', array('controller' => 'cities', 'action'=>'update_status', $city['City']['id'],'status'=>($city['City']['is_approved'] ==1)? 'disapproved': 'approved'), array('class' => ($city['City']['is_approved'] ==1)? 'js-delete reject': 'js-delete active-link', 'title' => ($city['City']['is_approved'] ==1)? 'Disapproved': 'Approved', 'escape' => false));?>
                                         </li>
										</ul>
									</div>
									<div class="action-bottom-block"></div>
								</div>
							</div>
					 </td>
						<td class="dl"><?php echo $this->Html->cText($city['City']['name'], false);?></td>
						<td class="dl"><?php echo $this->Html->cText($city['Country']['name'], false);?></td>
						<td class="dl"><?php echo $this->Html->cText($city['State']['name'], false);?></td>
					</tr>
				<?php
				endforeach;
				else:
				?>
				<tr>
					<td class="notice" colspan="10"><?php echo __l('No cities available');?></td>
				</tr>
				<?php
				endif;
				?>
		</table>
		<?php
			if (!empty($cities)) :
				?>
				<div class="clearfix">
    				<div class="admin-select-block grid_left">
        				<div>
        					<?php echo __l('Select:'); ?>
        					<?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all','title' => __l('All'))); ?>
        					<?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none','title' => __l('None'))); ?>
        					<?php echo $this->Html->link(__l('Unapproved'), '#', array('class' => 'js-admin-select-pending','title' => __l('Unapproved'))); ?>
        					<?php echo $this->Html->link(__l('Approved'), '#', array('class' => 'js-admin-select-approved','title' => __l('Approved'))); ?>
        				</div>
        			    <div class="admin-checkbox-button">
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
			endif;
		?>
	<?
	echo $this->Form->end();
	?>
	</div>
</div>