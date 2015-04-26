<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="questions index js-response">
	<ul class="filter-list-block clearfix">
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Active) ? 'active-filter' : null; ?>
		<li class="green <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($approved, false). '<span>' . __l('Active') . '</span>', array('controller' => 'questions', 'action' => 'index', 'filter_id' => ConstMoreAction::Active), array('title' => __l('Active'),'escape' => false)); ?></li>
        <?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) ? 'active-filter' : null; ?>
		<li class="gray <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending, false). '<span>' . __l('Inactive') . '</span>', array('controller' => 'questions', 'action' => 'index', 'filter_id' => ConstMoreAction::Inactive), array('title' => __l('Inactive'),'escape' => false)); ?></li>
		<?php $class = (empty($this->request->params['named']['filter_id']) && empty($this->request->params['named']['main_filter_id'])) ? 'active-filter' : null; ?>
		<li class="black <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending + $approved, false). '<span>' . __l('Total') . '</span>', array('controller' => 'questions', 'action' => 'index'), array('title' => __l('Total'),'escape' => false)); ?></li>
	</ul>
	<div class="clearfix">
            <div class="grid_left"><?php echo $this->element('paging_counter');?></div>
            <div class="grid_right">
                <?php echo $this->Html->link(__l('Add'), array('controller' => 'questions', 'action' => 'add'), array('class' => 'add','title' => __l('Add'))); ?>
            </div>
        </div>
    <?php echo $this->Form->create('Question' , array('class' => 'normal','action' => 'update')); ?>
    <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
     <table class="list">
        <tr>
            <th class="select"><?php echo __l('Select'); ?></th>
            <th class="actions"><?php echo __l('Actions');?></th>
            <th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('created', __l('Added on'));?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('User.name', __l('User'));?></div></th>
            <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('question', __l('Question'));?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('Specialty.name', __l('Specialty'));?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('question', __l('Answer'));?></div></th>
        </tr>
        <?php
        if (!empty($questions)):
        $i = 0;
        foreach ($questions as $question):
        	$class = null;
        	if ($i++ % 2 == 0) :
        		$class = ' class="altrow"';
            endif;
        ?>
        	<tr<?php echo $class;?>>
                <td class="select"><?php echo $this->Form->input('Question.'.$question['Question']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$question['Question']['id'], 'label' => false, 'class' => 'js-checkbox-list')); ?></td>
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
                                 <li><?php echo $this->Html->link(__l('Edit'), array('action' => 'edit', $question['Question']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?></li>
								<li><?php echo $this->Html->link(__l('Delete'), array('action' => 'delete', $question['Question']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?>
                                  <?php echo $this->Layout->adminRowActions($question['Question']['id']);?>
                                </li>
                                <li><?php echo $this->Html->link(($question['Question']['is_active'] ==1)? 'Inactive': 'Active', array('controller' => 'questions', 'action'=>'update_status', $question['Question']['id'],'status'=>($question['Question']['is_active'] ==1)? 'inactive': 'active'), array('class' => ($question['Question']['is_active'] ==1)? 'js-delete reject': 'js-delete active-link', 'title' => ($question['Question']['is_active'] ==1)? 'Inactive': 'Active', 'escape' => false));?>
								</li>
							</ul>
        					</div>
        					<div class="action-bottom-block"></div>
        				  </div>
                          </div>
                  
                </td>
        		<td class="dc"><?php echo $this->Html->cDateTimeHighlight($question['Question']['created']);?></td>
                <td class="dl">
					 <?php echo $this->Html->link($this->Html->cText($question['User']['username']), array('controller'=> 'users', 'action'=>'view', $question['User']['username'], 'admin' => false), array('escape' => false));?>
                </td>
				 <td class="dl">
                    <?php echo $this->Html->cText($question['Question']['question']);?>
                </td>
				 <td class="dl">
                    <?php echo $this->Html->cText($question['Specialty']['name']);?>
                </td>
				<td class="dl">
				<?php if(!empty($question['Answer']['answer'])) { ?>
					 	<?php echo $this->Html->cText($question['Answer']['answer']);?>
					<?php } else { ?>
						<?php echo $this->Html->link(__l('Add Answer'), array('controller'=> 'answers', 'action'=>'add', $question['Question']['id'],'admin' => false), array('escape' => false));?>
					<?php } ?>
				</td>	
        	</tr>
        <?php
            endforeach;
        else:
        ?>
        	<tr>
        		<td colspan="7"><p class="notice"><?php echo __l('No Questions available');?></p></td>
        	</tr>
        <?php
        endif;
        ?>
    </table>
 
<?php
if (!empty($questions)) :
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