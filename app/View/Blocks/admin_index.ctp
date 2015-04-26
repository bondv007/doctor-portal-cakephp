<div class="blocks index">
    <div class="clearfix">
        <div class="grid_left">
    	<?php echo $this->element('paging_counter');?>
        </div>
    </div>
    <?php echo $this->Form->create('Block', array('class' => 'normal','url' => array('controller' => 'blocks','action' => 'update'))); ?>
	<?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
	 <table class="list">
		<tr>
			<th class="select"><?php echo __l('Select'); ?></th>
			<th><div class="js-pagination"><?php echo $this->Paginator->sort('title', __l('Title')); ?></div></th>
			<th><div class="js-pagination"><?php echo $this->Paginator->sort('Region.title', __l('Region')); ?></div></th>
			<th><div class="js-pagination"><?php echo $this->Paginator->sort('status', __l('Status')); ?></div></th>
		</tr>
    <?php
        $rows = array();
		$i = 0;
        foreach ($blocks AS $block) {
			$i=0;
			if ($i++ % 2 == 0):
			$class = "altrow";
			endif; ?>
			<tr class="<?php echo $class;?>">
				<td class="select"><?php echo $this->Form->input('Block.'.$block['Block']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$block['Block']['id'], 'label' => false,'class' => 'js-checkbox-list')); ?></td>
				<td><?php echo $this->Html->cText($block['Block']['title']);?></td>
				<td><?php echo $block['Region']['title'];?></td>
				<td class="<?php echo (!empty($block['Block']['status'])) ? 'admin-status-1' : 'admin-status-0'; ?>"><?php echo $this->Html->link($this->Layout->status($block['Block']['status']), array('controller' => 'blocks', 'action'=>'update_status', $block['Block']['id'],'status'=>($block['Block']['status'] ==1)? 'inactive': 'active'), array('title' =>$block['Block']['title'], 'escape' => false));?></td>
			</tr>
			<?php
        }
    ?>
    </table>
    <div class="clearfix">
        <div class="grid_left admin-select-block">
        	<div>
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

