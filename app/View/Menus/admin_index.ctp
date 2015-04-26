<div class="menus index">
    <div class="clearfix">
	<div class="grid_right">
    	<?php echo $this->Html->link(__l('New Menu'), array('action' => 'add'), array('class' => 'add','title'=>__l('New Menu'))); ?>
	</div>
    <div class="grid_left">
    	<?php echo $this->element('paging_counter');?>
    </div>
    </div>
	<table class="list">
		<tr>
			<th><?php echo __l('Actions'); ?></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('title', __l('Title')); ?></div></th>
			<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('link_count', __l('Link Count')); ?></div></th>
		</tr>
    <?php
		$i = 0;
        foreach ($menus AS $menu) {
			$i=0;
			if ($i++ % 2 == 0):
			$class = "altrow";
			endif; ?>
			<tr class="<?php echo $class;?>">
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
									<li><?php echo $this->Html->link(__l('View links'), array('controller' => 'links', 'action'=>'index', $menu['Menu']['id']), array('class' => 'view', 'title' => __l('View links')));?>
									</li>
									<!--<li><?php echo $this->Html->link(__l('Edit'), array('controller' => 'menus', 'action'=>'edit', $menu['Menu']['id']), array('class' => 'edit', 'title' => __l('Edit')));?>
									</li>
									<li><?php echo $this->Html->link(__l('Delete'), array('controller' => 'menus', 'action'=>'delete', $menu['Menu']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?>
									</li>-->
								</ul>
							</div>
							<div class="action-bottom-block"></div>
						</div>
					</div>
				</td>
				<td><?php echo $this->Html->link($menu['Menu']['title'], array('controller' => 'links', 'action'=>'index',$menu['Menu']['id']), array('title' =>$menu['Menu']['title']));?></td>
				<td class="dc"><?php echo $menu['Menu']['link_count'];?></td>
			</tr>
			<?php
        }
    ?>
    </table>
</div>


