<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="userRatingCategories index js-response">
     <ul class="filter-list-block clearfix">
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Active) ? 'active-filter' : null; ?>
		<li class="green <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($approved, false). '<span>' . __l('Active') . '</span>', array('controller' => 'user_rating_categories', 'action' => 'index', 'filter_id' => ConstMoreAction::Active), array('title' => __l('Active'),'escape' => false)); ?></li>
        <?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) ? 'active-filter' : null; ?>
		<li class="gray <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending, false). '<span>' . __l('Inactive') . '</span>', array('controller' => 'user_rating_categories', 'action' => 'index', 'filter_id' => ConstMoreAction::Inactive), array('title' => __l('Inactive'),'escape' => false)); ?></li>
		<?php $class = (empty($this->request->params['named']['filter_id']) && empty($this->request->params['named']['main_filter_id'])) ? 'active-filter' : null; ?>
		<li class="black <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending + $approved, false). '<span>' . __l('Total') . '</span>', array('controller' => 'user_rating_categories', 'action' => 'index'), array('title' => __l('Total'),'escape' => false)); ?></li>
	</ul>
        <div class="clearfix">
            <div class="grid_left"><?php echo $this->element('paging_counter');?></div>
            <div class="grid_right">
                <?php echo $this->Html->link(__l('Add'), array('controller' => 'user_rating_categories', 'action' => 'add'), array('class' => 'add','title' => __l('Add'))); ?>
            </div>
        </div>
        <?php echo $this->Form->create('UserRatingCategory' , array('class' => 'normal','action' => 'update')); ?>
    <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
    <table class="list">
        <tr>
            <th class="select"><?php echo __l('Select'); ?></th>
            <th class="actions"><?php echo __l('Actions');?></th>
            <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('name');?></div></th>
            <th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('user_rating_count', __l('User Rating Count'));?></div></th>
        </tr>
        <?php
        if (!empty($userRatingCategories)):

            $i = 0;
            foreach ($userRatingCategories as $userRatingCategory):
                $class = null;
                $active_class = '';
                if ($i++ % 2 == 0) :
                   $class = 'altrow';
                endif;
                if($userRatingCategory['UserRatingCategory']['is_active']):
            		$status_class = 'js-checkbox-active';
            	else:
                   $active_class = ' inactive-record';
            		$status_class = 'js-checkbox-inactive';
            	endif;
                ?>
             <tr class="<?php echo $class.$active_class;?>">
                    <td class="select"><?php echo $this->Form->input('UserRatingCategory.'.$userRatingCategory['UserRatingCategory']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$userRatingCategory['UserRatingCategory']['id'], 'label' => false, 'class' => $status_class.' js-checkbox-list')); ?></td>
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
                                            <li><?php echo $this->Html->link(__l('Edit'), array('action' => 'edit', $userRatingCategory['UserRatingCategory']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?></li>
                                            <li><?php echo $this->Html->link(__l('Delete'), array('action' => 'delete', $userRatingCategory['UserRatingCategory']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></li>
                                            <li><?php echo $this->Html->link(($userRatingCategory['UserRatingCategory']['is_active'] ==1)? 'Inactive': 'Active', array('controller' => 'user_rating_categories', 'action'=>'update_status', $userRatingCategory['UserRatingCategory']['id'],'status'=>($userRatingCategory['UserRatingCategory']['is_active'] ==1)? 'inactive': 'active'), array('class' => ($userRatingCategory['UserRatingCategory']['is_active'] ==1)? 'js-delete reject': 'js-delete active-link', 'title' => ($userRatingCategory['UserRatingCategory']['is_active'] ==1)? 'Inactive': 'Active', 'escape' => false));?></li>
                   					   </ul>
                    				</div>
                    					<div class="action-bottom-block"></div>
                    				  </div>
                          </div>
                    </td>
                    <td class="dl"><?php echo $this->Html->cText($userRatingCategory['UserRatingCategory']['name']);?></td>
                    <td class="dc"><?php echo $this->Html->link($this->Html->cInt($userRatingCategory['UserRatingCategory']['user_rating_count'], false), array('controller' => 'user_ratings', 'action' => 'index', 'category' => $userRatingCategory['UserRatingCategory']['id']));?></td>
                </tr>
                <?php
            endforeach;
        else:
            ?>
            <tr>
                <td colspan="4"><p class="notice"><?php echo __l('No User Rating Categories available');?></p></td>
            </tr>
            <?php
        endif;
        ?>
    </table>
    <?php
    if (!empty($userRatingCategories)) :
        ?>
        <div class="clearfix select-block-bot">
            	 <div class="admin-select-block grid_left">
                    <div>
                		<?php echo __l('Select:'); ?>
                		<?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all','title' => __l('All'))); ?>
                		<?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none','title' => __l('None'))); ?>
                		<?php echo $this->Html->link(__l('Inactive'), '#', array('class' => 'js-admin-select-pending','title' => __l('Inactive'))); ?>
                		<?php echo $this->Html->link(__l('Active'), '#', array('class' => 'js-admin-select-approved','title' => __l('Active'))); ?>
                	</div>
                	<div class="admin-checkbox-button">
                        <?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?>
                    </div>
                </div>
            	<div class="js-pagination">
                    <?php echo $this->element('paging_links'); ?>
                </div>
        </div>
        <div class="hide">
            <div class="submit-block clearfix">
                <?php echo $this->Form->submit('Submit');  ?>
            </div>
        </div>
        <?php
    endif;
    echo $this->Form->end();
    ?>
 
</div>
</div>
