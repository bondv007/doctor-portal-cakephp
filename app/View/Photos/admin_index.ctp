<?php /* SVN: $Id: admin_index.ctp 1232 2011-04-26 10:03:33Z boopathi_026ac09 $ */ ?>
<?php 
		if(!empty($this->request->params['isAjax'])):
			echo $this->element('flash_message');
		endif;
	?>
<div class="photos index js-response js-responses">
	<div class="page-count-block clearfix">
		<div class="grid_left">
			<?php echo $this->element('paging_counter'); ?>
		</div>
		<div class="grid_left">
			<?php echo $this->Form->create('Photo' , array('type' => 'get', 'class' => 'normal search-form clearfix','action' => 'index')); ?>
			<?php echo $this->Form->input('q', array('label' => __l('Keyword'))); ?>
			<?php echo $this->Form->submit(__l('Search'));?>
			<?php echo $this->Form->end(); ?>
		</div>
		<div class="clearfix grid_right add-block1">
			<?php echo $this->Html->link(__l('Add'),array('controller'=>'photos','action'=>'add'),array('class' => 'add admin-add', 'title' => __l('Add Photo')));?>
		</div>
	</div>
	<?php echo $this->Form->create('Photo' , array('class' => 'normal js-ajax-form','action' => 'update')); ?>
    <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
    <table class="list">
        <tr>
            <th><?php echo __l('Select'); ?></th>
            <th><?php echo __l('Actions'); ?></th>
            <th><?php echo __l('Photo'); ?></th>
            <th><div class="js-pagination"><?php echo $this->Paginator->sort(__l('Author'), 'User.username'); ?></div></th>
            <th><div class="js-pagination"><?php echo $this->Paginator->sort(__l('Album'), 'PhotoAlbum.name'); ?></div></th>
            <th><div class="js-pagination"><?php echo $this->Paginator->sort(__l('Last Modified'), 'Photo.created'); ?></div></th>
        </tr>
        <?php
        if (!empty($photos)):
            $i = 0;
            foreach ($photos as $photo):
                $class = null;
                if ($i++ % 2 == 0):
                    $class = ' class="altrow"';
                endif;
                ?>
                <tr<?php echo $class;?>>
					<td class="select">
			<?php echo $this->Form->input('Photo.'.$photo['Photo']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$photo['Photo']['id'], 'label' => false, 'class' => 'js-checkbox-list')); ?>
					</td>
					<td class="actions">
			<div class="action-block">
				<span class="action-information-block">
					<span class="action-left-block">&nbsp;</span>
					<span class="action-center-block">
						<span class="action-info">
							<?php echo __l('Action');?>
						 </span>
					</span>
				</span>
				<div class="action-inner-block">
					<div class="action-inner-left-block">
						<ul class="action-link clearfix">
							<li> <?php echo $this->Html->link(__l('Edit'), array('controller' => 'photos', 'action'=>'edit', $photo['Photo']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?></li>
							<li><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $photo['Photo']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></li>
							<li><?php 
								if(!empty($photo['Photo']['is_active'])) {	
								 echo $this->Html->link(__l('Active'), array('action'=>'update_status', $photo['Photo']['id'], 'active'), array('class' => 'icon-active', 'title' => __l('Active')));		
								 } else {
								 echo $this->Html->link(__l('In-active'), array('action'=>'update_status', $photo['Photo']['id'], 'inactive'), array('class' => 'icon-active', 'title' => __l('In-active')));
								 }
							?></li>
						</ul>
					</div>
					<div class="action-bottom-block"></div>
				</div>
			</div>
		</td>
                    <td class="dl">
		    <?php 
		   $org_image1 = Router::url('/',true).$this->Html->getImageUrl('Photo', $photo['Attachment'], array('dimension' => 'original')); 
    			
			$str='<img src="'.$org_image1.'" width="160px" height="160px" alt="'.$photo['Photo']['title'].'" title="'.$photo['Photo']['title'].'">';

			 echo $this->Html->link($str, array('controller' => 'photos', 'action' => 'view', $photo['Photo']['slug'], 'admin' => false), array('escape' => false));?>


                        <span><?php echo $this->Html->link($this->Html->cText($photo['Photo']['title']), array('controller' => 'photos', 'action' => 'view', $photo['Photo']['slug'], 'admin' => false), array('escape' => false));?></span>
                        <span><?php echo $this->Html->truncate($photo['Photo']['description']);?></span>
                    </td>
                    <td class="dl"><?php echo $this->Html->link($this->Html->cText($photo['User']['username']), array('controller'=> 'users', 'action' => 'view', $photo['User']['username'], 'admin' => false), array('escape' => false));?>
						<span><?php echo $this->Html->link(sprintf(__l('All photos uploaded by %s '),$photo['User']['username']), array('controller' => 'photos', 'action' => 'index', 'username' => $photo['User']['username']), array('title' => sprintf(__l('Show all photos uploaded by %s '),$photo['User']['username']), 'escape' => false));?></span>
					</td>
                        <td class="dl"><?php echo ($photo['PhotoAlbum']['title']) ? $this->Html->link($this->Html->cText($photo['PhotoAlbum']['title']), array('controller'=> 'photos', 'action' => 'index', 'album' => $photo['PhotoAlbum']['slug']), array('escape' => false)) : __l(' - '); ?></td>
                    <td class="dl"><?php echo $this->Html->cDateTimeHighlight($photo['Photo']['modified']);?></td>
                </tr>
            <?php
            endforeach;
        else:
            ?>
            <tr>
            <td colspan="6" class="notice"><?php echo __l('No photos available');?></td>
            </tr>
            <?php
        endif;
        ?>
    </table>
    <?php
    if (!empty($photos)):
        ?>
		<div class="admin-select-block">
        <div>
            <?php echo __l('Select:'); ?>
            <?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all','title' => __l('All'))); ?>
            <?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none','title' => __l('None'))); ?>
        </div>
         <div class="admin-checkbox-button">
            <?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?>
        </div>
        </div>
		
        <div class="js-pagination">
            <?php echo $this->element('paging_links'); ?>
        </div>
        <div class=hide>
            <?php echo $this->Form->submit('Submit');  ?>
        </div>
        <?php
    endif;
    echo $this->Form->end();
    ?>
</div>