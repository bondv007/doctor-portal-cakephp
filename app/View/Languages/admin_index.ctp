<?php /* SVN: $Id: admin_index.ctp 4534 2010-05-06 02:45:43Z vidhya_112act10 $ */ ?>
<div class="languages index js-response">
 <div class="js-response js-response js-responses js-search-responses">
      <div class="clearfix">
		<ul class="filter-list-block clearfix">
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Active) ? 'active-filter' : null; ?>
		<li class="green <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($approved, false). '<span>' . __l('Active Records') . '</span>', array('controller' => 'languages', 'action' => 'index', 'filter_id' => ConstMoreAction::Active), array('title' => __l('Active Records'),'escape' => false)); ?></li>
        <?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) ? 'active-filter' : null; ?>
		<li class="gray <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending, false). '<span>' . __l('Inactive Records') . '</span>', array('controller' => 'languages', 'action' => 'index', 'filter_id' => ConstMoreAction::Inactive), array('title' => __l('Disapproved Records'),'escape' => false)); ?></li>
		<?php $class = (empty($this->request->params['named']['filter_id']) && empty($this->request->params['named']['main_filter_id'])) ? 'active-filter' : null; ?>
		<li class="black <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($pending + $approved, false). '<span>' . __l('Total Records') . '</span>', array('controller' => 'languages', 'action' => 'index'), array('title' => __l('Total Records'),'escape' => false)); ?></li>
	</ul>
    </div>
        <div class="page-count-block clearfix">
   	<div class="grid_left">
        <?php echo $this->element('paging_counter');?>
       </div>
     	<div class="grid_left">
        <?php       echo $this->Form->create('Language', array('type' => 'post', 'class' => 'normal search-form clearfix js-ajax-form {"container" : "js-search-responses"}', 'action'=>'index'));
                      echo $this->Form->input('q', array('label' => __l('Keyword')));
                      echo $this->Form->input('filter_id', array('type' => 'hidden', 'value' => !empty($this->request->params['named']['filter_id'])?$this->request->params['named']['filter_id']:''));
                      echo $this->Form->submit(__l('Search'));
                      echo $this->Form->end();
                ?>
        </div>
		<div class="clearfix grid_right add-block1">
    		<?php echo $this->Html->link(__l('Add'), array('controller' => 'languages', 'action' => 'add'), array('class' => 'add', 'title' => __l('Add'), 'escape' => false)); ?>
         </div>
      </div>
    <?php echo $this->Form->create('Language' , array('class' => 'normal','action' => 'update')); ?>
    <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
      <table class="list">
        <tr>
            <th class="select"></th>
            <th class="actions"><?php echo __l('Actions'); ?></th>
            <th><div class="js-pagination"><?php echo $this->Paginator->sort('Language.name', __l('Name'));?></div></th>
            <th><div class="js-pagination"><?php echo $this->Paginator->sort('Language.iso2', __l('ISO2'));?></div></th>
            <th><div class="js-pagination"><?php echo $this->Paginator->sort('Language.iso3', __l('ISO3'));?></div></th>
         </tr>
        <?php
        if (!empty($languages)):
            $i = 0;
            foreach ($languages as $language):
              	 $active_class = '';
                    $class = null;
					if ($i++ % 2 == 0):
					$class = "altrow";
					endif;
					if($language['Language']['is_active']):
						$status_class = 'js-checkbox-active';
					else:
                        $active_class = ' inactive-record';
						$status_class = 'js-checkbox-inactive';
					endif;
                ?>
          <tr class="<?php echo $class.$active_class;?>">
           <td class="select">
                    	 <?php echo $this->Form->input('Language.'.$language['Language']['id'].'.id',array('type' => 'checkbox', 'id' => "admin_checkbox_".$language['Language']['id'],'label' => false , 'class' => $status_class.' js-checkbox-list'));?>
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
                                	 <li> <?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $language['Language']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?></li>
        						</ul>
        					   </div>
        						<div class="action-bottom-block"></div>
							  </div>
						 </div>
                    </td>
                    <td class="dl"><?php echo $this->Html->cText($language['Language']['name']);?></td>
                    <td><?php echo $this->Html->cText($language['Language']['iso2']);?></td>
                    <td><?php echo $this->Html->cText($language['Language']['iso3']);?></td>
				           </tr>
                <?php
            endforeach;
        else:
            ?>
            <tr>
                <td colspan="6" class="notice"><?php echo __l('No Languages available');?></td>
            </tr>
            <?php
        endif;
        ?>
    </table>
    <?php
    if (!empty($languages)) :
        ?>
        <div class="clearfix">
    	 <div class="admin-select-block grid_left">
                <div>
            		<?php echo __l('Select:'); ?>
            		<?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all', 'title' => __l('All'))); ?>
            		<?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none', 'title' => __l('None'))); ?>
        			<?php
        				if(!empty($this->request->params['named']['filter_id'])):
        					if($this->request->params['named']['filter_id'] == ConstMoreAction::Active):
        						echo $this->Html->link(__l('Inactive'), '#', array('class' => 'js-admin-select-pending', 'title' => __l('Inactive')));
        					elseif($this->request->params['named']['filter_id'] == ConstMoreAction::Inactive):
        						echo $this->Html->link(__l('Active'), '#', array('class' => 'js-admin-select-approved', 'title' => __l('Active')));
        					endif;
        				else:
        					echo $this->Html->link(__l('Active '), '#', array('class' => 'js-admin-select-approved', 'title' => __l('Active')));
        					echo $this->Html->link(__l('Inactive '), '#', array('class' => 'js-admin-select-pending', 'title' => __l('Inactive')));
        				endif;
        				?>
            	</div>
                <div class="admin-checkbox-button">
                     <?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?>
                </div>
            </div>
            <div class="js-pagination grid_right">
                <?php echo $this->element('paging_links'); ?>
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
</div>