<div class="links index">
    <div class="clearfix">
		<div class="grid_right">
    	<?php echo $this->Html->link(__l('New Link'), array('controller' => 'links', 'action' => 'add',$menu['Menu']['id']), array('class' => 'add','title'=>__l('New Link'))); ?>
		</div>
	</div>
    <?php echo $this->Form->create('Link', array('class'=>'normal','url' => array('controller' => 'links','action' => 'update'))); ?>
	<?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
    <table class="list">
		<tr>
			<th><?php echo __l('Select'); ?></th>
			<th><?php echo __l('Actions'); ?></th>
			<th><?php echo __l('Title'); ?></th>
			<th><?php echo __l('Status'); ?></th>
		</tr>
    <?php
        $rows = array();
		$i = 0;
	     foreach ($linksStatus AS $linksStatuses){
       			$i=0;
			if ($i++ % 2 == 0):
			$class = "altrow";
			endif; ?>
			<tr class="<?php echo $class;?>">
				<td class="select"><?php echo $this->Form->input('Link.'.$linksStatuses['Link']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$linksStatuses['Link']['id'], 'label' => false,'class' => 'js-checkbox-list')); ?></td>
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
									<li><?php echo $this->Html->link(__l('Move up'), array('controller' => 'links', 'action'=>'moveup', $linksStatuses['Link']['id']), array('class' => 'move-up', 'title' => __l('Move up')));?>
									</li>
									<li><?php echo $this->Html->link(__l('Move down'), array('controller' => 'links', 'action'=>'movedown', $linksStatuses['Link']['id']), array('class' => 'move-down', 'title' => __l('Move down')));?>
									</li>
									<li><?php echo $this->Html->link(__l('Edit'), array('controller' => 'links', 'action'=>'edit', $linksStatuses['Link']['id']), array('class' => 'edit', 'title' => __l('Edit')));?>
									</li>
									<li><?php echo $this->Html->link(__l('Delete'), array('controller' => 'links', 'action'=>'delete', $linksStatuses['Link']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?>
									</li>
								</ul>
							</div>
							<div class="action-bottom-block"></div>
						</div>
					</div>
				</td>
				<td><?php echo $this->Html->cText($linksStatuses['Link']['title']);?></td>
				<td class="<?php echo (!empty($linksStatuses['Link']['status'])) ? 'admin-status-1' : 'admin-status-0'; ?>"><?php echo $this->Html->link($this->Layout->status($linksStatuses['Link']['status']), array('controller' => 'links', 'action'=>'update_status', $linksStatuses['Link']['id'],'status'=>($linksStatuses['Link']['status'] ==1)? 'inactive': 'active','menu_id'=>$linksStatuses['Link']['menu_id']), array('title' =>$linksStatuses['Link']['title'], 'escape' => false));?></td>
					</tr>
			<?php
			}
           ?>
    </table>

<div class="clearfix">
    <div class="grid_left admin-select-block">
    	<div class="js-pagination">
    		<?php echo __l('Select:'); ?>
    		<?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all', 'title' => __l('All'))); ?>
    		<?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none', 'title' => __l('None'))); ?>
    	</div>
    	<div class="admin-checkbox-button"><?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?></div>
    </div>
    </div>
    <div class="hide">
	    <?php echo $this->Form->submit('Submit'); ?>
    </div>
	<?php 
	echo $this->Form->end(); ?>
</div>
