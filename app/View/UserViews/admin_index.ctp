<?php /* SVN: $Id: admin_index.ctp 1279 2011-05-26 05:07:26Z siva_063at09 $ */ ?>
<div class="userViews index js-response">
     <div class="clearfix">
    <div class="grid_left">
        <?php echo $this->element('paging_counter');?>
    </div>
    <div class="grid_left">
        <?php echo $this->Form->create('UserView' , array('type' => 'get', 'class' => 'normal search-form','action' => 'index')); ?>
        <?php echo $this->Form->input('q', array('label' => 'Keyword')); ?>
    	<?php echo $this->Form->submit(__l('Search'));?>
    	<?php echo $this->Form->end(); ?>
    </div>
    </div>
    <?php echo $this->Form->create('UserView' , array('class' => 'normal','action' => 'update')); ?>
    <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
    <table class="list">
        <tr>
			<th class="select"><?php echo __l('Select'); ?></th>
            <th class="actions"><?php echo __l('Actions');?></th>
            <th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('created',__l('Viewed Time'));?></div></th>
            <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('User.username',__l('Username'));?></div></th>
            <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('ViewingUser.username',__l('Viewed User'));?></div></th>
            <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('Ip.ip',__l('IP'));?></div></th>
        </tr>
        <?php
        if (!empty($userViews)):
            $i = 0;
            foreach ($userViews as $userView):
                $class = null;
                if ($i++ % 2 == 0) :
                    $class = ' class="altrow"';
                endif;
                ?>
                <tr<?php echo $class;?>>
					<td class="select"><?php echo $this->Form->input('UserView.'.$userView['UserView']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$userView['UserView']['id'], 'label' => false, 'class' => 'js-checkbox-list')); ?></td>
                    <td class="actions">
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
                                	<li><?php echo $this->Html->link(__l('Delete'), array('action' => 'delete', $userView['UserView']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?>
                                     <?php echo $this->Layout->adminRowActions($userView['UserView']['id']);?>
                                    </li>
                                	
        						</ul>
        					   </div>
        						<div class="action-bottom-block"></div>
							  </div>
						 </div>
					</td>
                    <td class="dc"><?php echo $this->Html->cDateTimeHighlight($userView['UserView']['created']);?></td>
                    <td class="dl">
						<?php 
							if(!empty($userView['User'])){
								echo $this->Html->getUserAvatarLink($userView['User'], 'micro_thumb',true);
								echo $this->Html->getUserLink($userView['User']);
							}
							else{
								echo __l('Guest');
							}
						?>
					</td>
					<td class="dl">
						<?php 
							if(!empty($userView['User'])){
								if(!empty($userView['ViewingUser']['username'])):
									echo $this->Html->getUserAvatarLink($userView['ViewingUser'], 'micro_thumb',true);
									echo $this->Html->getUserLink($userView['ViewingUser']);
								else:
									echo __l('Guest');
								endif;
						}
					
						?>
					</td>
					  <td class="dl">
						<?php
                             if(!empty($userView['Ip'])): ?>
                            <?php
                               echo  $this->Html->link($userView['Ip']['ip'], array('controller' => 'users', 'action' => 'whois', $userView['Ip']['ip'], 'admin' => false), array('target' => '_blank', 'title' => 'whois '.$userView['Ip']['ip'], 'escape' => false)); ?>
							<p>
							<?php
                            if(!empty($userView['Ip']['Country'])):
                                ?>
                                <span class="flags flag-<?php echo strtolower($userView['Ip']['Country']['iso2']); ?>" title ="<?php echo $userView['Ip']['Country']['name']; ?>">
									<?php echo $userView['Ip']['Country']['name']; ?>
								</span>
                                <?php
                            endif;
							 if(!empty($userView['Ip']['City'])):
                            ?>
                            <span> 	<?php echo $userView['Ip']['City']['name']; ?>    </span>
                            <?php endif; ?>
                            </p>
                        <?php else: ?>
							<?php echo __l('N/A'); ?>
						<?php endif; ?>
				</td>
                </tr>
                <?php
            endforeach;
        else:
            ?>
            <tr>
                <td colspan="7" class="notice"><?php echo __l('No User Views available');?></td>
            </tr>
            <?php
        endif;
        ?>
    </table>

    <?php
    if (!empty($userViews)) :
        ?>
        <div class="clearfix">
        <div class="admin-select-block grid_left">
            <div>
                <?php echo __l('Select:'); ?>
                <?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all','title' => __l('All'))); ?>
                <?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none','title' => __l('None'))); ?>
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