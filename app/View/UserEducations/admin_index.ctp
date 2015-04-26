<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="userEducations index js-response">
    <?php if (!(isset($this->request->params['isAjax']) && $this->request->params['isAjax'] == 1)): ?>
    <div class="clearfix">
      <div class="grid_left">
         <?php echo $this->element('paging_counter');?>
      </div>
        <div class="grid_left">
            <?php echo $this->Form->create('UserEducation' , array('type' => 'get', 'class' => 'normal search-form','action' => 'index')); ?>
            <?php echo $this->Form->input('q', array('label' => 'Keyword')); ?>
            <?php echo $this->Form->submit(__l('Search'));?>
            <?php echo $this->Form->end(); ?>
      </div>
  </div>
   <?php endif; ?>
   <?php echo $this->Form->create('UserEducation' , array('class' => 'normal','action' => 'update')); ?>
   <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
	<table class="list">
        <tr>
            <th class="select"><?php echo __l('Select'); ?></th>
            <th class="actions"><?php echo __l('Actions');?></th>
			<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('created', __l('Posted on'));?></div></th>
            <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('User.username', __l('Username'));?></div></th>
            <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('UserEducation.education', __l('Education'));?></div></th>
            <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('UserEducation.location', __l('Location'));?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('UserEducation.organization', __l('Organization'));?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('UserEducation.date', __l('Year'));?></div></th>
        </tr>
        <?php
        if (!empty($userEducations)):
            $i = 0;
            foreach ($userEducations as $userEducation):
                $class = null;
                if ($i++ % 2 == 0) :
                    $class = ' class="altrow"';
                endif;
                ?>
                <tr<?php echo $class;?>>
                    <td class="select"><?php echo $this->Form->input('UserEducation.'.$userEducation['UserEducation']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$userEducation['UserEducation']['id'], 'label' => false, 'class' => 'js-checkbox-list')); ?></td>
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
                                <li><?php echo $this->Html->link(__l('Delete'), array('action' => 'delete', $userEducation['UserEducation']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></li>
       					 </ul>
        					</div>
        					<div class="action-bottom-block"></div>
                     </div>
                     </div>
                    </td>
					<td class="dc"><?php echo $this->Html->cDateTimeHighlight($userEducation['UserEducation']['created']);?></td>
                    <td class="dl">
                        <?php echo $this->Html->link($this->Html->cText($userEducation['User']['username']), array('controller'=> 'users', 'action'=>'view', $userEducation['User']['username'], 'admin' => false), array('escape' => false));?>
                    </td>
                    <td class="dl"><?php echo $this->Html->cText($userEducation['UserEducation']['education']);?></td>
	                <td class="dl"><?php echo $this->Html->cText($userEducation['UserEducation']['location']);?></td>
					<td class="dl"><?php echo $this->Html->cText($userEducation['UserEducation']['organization']);?></td>
                    <td class="dc"><?php echo $this->Html->cDateTimeHighlight($userEducation['UserEducation']['date']);?></td>
                </tr>
                <?php
            endforeach;
        else:
            ?>
            <tr>
                <td colspan="9"><p class="notice"><?php echo __l('No User Educations available');?></p></td>
            </tr>
            <?php
        endif;
        ?>
    </table>
    <?php
    if (!empty($userEducations)) :
        ?>
        <div class="clearfix select-block-bot">
        <div class="admin-select-block grid_left">
            <div class="grid_left">
                <?php echo __l('Select:'); ?>
                <?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all','title' => __l('All'))); ?>
                <?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none','title' => __l('None'))); ?>
            </div>
            <div class="admin-checkbox-button grid_left">
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
    echo $this->Form->end();
    ?>

  </div>