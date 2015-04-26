<?php
    $this->Html->script(array('nodes'), false);
?>
<div class="nodes index">
    <div class="clearfix">
	<div class="grid_left">
    	<?php echo $this->element('paging_counter');?>
        </div>
		<div class="grid_left">
			<?php echo $this->element('admin/nodes_filter'); ?>
		</div>
			<div class="grid_right add-block">
    	  	 <?php echo $this->Html->link(__l('Create content'), array('controller' => 'nodes', 'action' => 'create'), array('class' => 'add','title'=>__l('Create content'))); ?>
		</div>
	</div>
    <?php echo $this->Form->create('Node', array('class'=>'normal','url' => array('controller' => 'nodes','action' => 'update'))); ?>
	<?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
    <table class="list">
		<tr>
			<th><?php echo __l('Select'); ?></th>
			<th><?php echo __l('Actions'); ?></th>
			<th><div class="js-pagination"><?php echo $this->Paginator->sort('title', __l('Title')); ?></div></th>
			<th><div class="js-pagination"><?php echo $this->Paginator->sort('type', __l('Type')); ?></div></th>
			<th><div class="js-pagination"><?php echo $this->Paginator->sort('status', __l('Status')); ?></div></th>
		</tr>
    <?php
        $rows = array();
		$i = 0;
        foreach ($nodes AS $node) {
         	$i=0;
			if ($i++ % 2 == 0):
			$class = "altrow";
			endif; ?>
			<tr class="<?php echo $class;?>">
				<td class="select"><?php echo $this->Form->input('Node.'.$node['Node']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$node['Node']['id'], 'label' => false,'class' => 'js-checkbox-list')); ?></td>
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
									<li><?php echo $this->Html->link(__l('Edit'), array('controller' => 'nodes', 'action'=>'edit', $node['Node']['id']), array('class' => 'edit', 'title' => __l('Edit')));?>
									</li>
									<li><?php echo $this->Html->link(__l('Delete'), array('controller' => 'nodes', 'action'=>'delete', $node['Node']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?>
									</li>
								</ul>
							</div>
							<div class="action-bottom-block"></div>
						</div>
					</div>
				</td>
				<td><?php echo $this->Html->link($node['Node']['title'], array('controller' => 'nodes', 'action'=>'view', 'type'=>$node['Node']['type'],'slug'=>$node['Node']['slug'],'admin' => false), array('title' =>$node['Node']['title']));?></td>
				<td><?php echo $node['Node']['type'];?></td>
			    <td class="dc <?php echo (!empty($node['Node']['status'])) ? 'admin-status-1' : 'admin-status-0'; ?>">
                <?php echo $this->Html->link($this->Layout->status($node['Node']['status']), array('controller' => 'nodes', 'action'=>'update_status', $node['Node']['id'],'status'=>($node['Node']['status'] ==1)? 'inactive': 'active'), array('title' =>$node['Node']['title'], 'escape' => false));?></td>
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
	 <div class="js-pagination grid_right">
        <?php echo $this->element('paging_links'); ?>
    </div>
    </div>
    <div class="hide">
	    <?php echo $this->Form->submit('Submit'); ?>
    </div>
	<?php
	echo $this->Form->end(); ?>
</div>

