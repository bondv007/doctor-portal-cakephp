<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="userReviews index js-response js-responses">
	<div class="clearfix">
		<div class="grid_left">
			<?php echo $this->element('paging_counter'); ?>
		</div>
		<?php if (!empty($this->request->params['named']['filter_id']) || !empty($this->request->params['named']['q']) || !empty($this->request->params['named']['username'])) { ?>
			<div class="grid_left">
				<?php
					echo $this->Form->create('UserReview', array('type' => 'get', 'class' => 'normal search-form', 'action' => 'index'));
					echo $this->Form->autocomplete('UserReview.username', array('label' => __l('User') , 'acFieldKey' => 'UserReview.user_id', 'acFields' => array('UserReview.username'), 'acSearchFieldNames' => array('User.username'), 'maxlength' => '255'));
					echo $this->Form->input('q', array('label' => 'Keyword'));
					echo $this->Form->submit(__l('Search'));
					echo $this->Form->end();
				?>
			</div>
		<?php } ?>
	</div>
	<?php
		echo $this->Form->create('UserReview', array('action' => 'update', 'class' => 'normal'));
		echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url));
	?>
	<table class="list pictures {'minHeight':120, 'maxHeight':150, 'maxWidth':150}" start="">
		<tr>
			<th class="select"><?php echo __l('Select'); ?></th>
			<th class="actions"><?php echo __l('Actions'); ?></th>
			<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('created', __l('Created')); ?></div></th>
			<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('DoctorUser.username', __l('Doctor')); ?></div></th>
			<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('User.username', __l('Patient')); ?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('UserReview.bedside_rate', __l('Bedside Average Rating')); ?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('UserReview.waittime_rate', __l('Timing Average Rating')); ?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo __l('Overall Rate'); ?></div></th>
			<th class="dc"><div class="js-pagination"><?php echo __l('Review'); ?></div></th>
			<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('ip_id', __l('IP'));?></div></th>
		</tr>
		<?php
			if (!empty($userReviews)):
				$i = 0;
				foreach($userReviews as $userReview):
					$class = null;
					$active_class = '';
					if ($i++ % 2 == 0) {
						$class = "altrow";
					}
		?>
		<tr class="<?php echo $class; ?>">
			<td class="select"><?php echo $this->Form->input('UserReview.' . $userReview['UserReview']['id'] . '.id', array('type' => 'checkbox', 'id' => "admin_checkbox_" . $userReview['UserReview']['id'], 'label' => false, 'class' => 'js-checkbox-list')); ?></td>
			<td class="actions">
				<div class="action-block">
					<span class="action-information-block">
						<span class="action-left-block">&nbsp;</span>
						<span class="action-center-block">
							<span class="action-info"><?php echo __l('Action'); ?></span>
						</span>
					</span>
					<div class="action-inner-block">
						<div class="action-inner-left-block">
							<ul class="action-link clearfix">
								<li><?php echo $this->Html->link(__l('Delete') , array('action' => 'delete', $userReview['UserReview']['id']) , array('class' => 'delete js-delete', 'title' => __l('Delete'))); ?><?php echo $this->Layout->adminRowActions($userReview['UserReview']['id']); ?></li>
							</ul>
						</div>
						<div class="action-bottom-block"></div>
					</div>
				</div>
			</td>			
			<td class="dc"><?php echo $this->Html->cDateTimeHighlight($userReview['UserReview']['created']); ?></td>
			<td class="dc"><?php echo $this->Html->cText($userReview['DoctorUser']['username']); ?></td>
			<td class="dc"><?php echo $this->Html->cText($userReview['User']['username']); ?></td>
			<td class="dc">
					<?php $bedside_rating = $this->Html->get_star_rating($userReview['UserReview']['bedside_rate']); ?>
					<?php echo $this->Html->cHtml($bedside_rating); ?>
			</td>
			<td class="dc">
					<?php $waittime_rating = $this->Html->get_star_rating($userReview['UserReview']['waittime_rate']); ?>
					<?php echo $this->Html->cHtml($waittime_rating); ?>
			</td>
			<td class="dc">
					<?php 
						$average = ($userReview['UserReview']['bedside_rate'] + $userReview['UserReview']['waittime_rate']) / 2;
						$overall_rating = $this->Html->get_star_rating($average); 
						echo $this->Html->cHtml($overall_rating); ?>
			</td>
			<td class="dl"><div class="js-truncate"><?php echo $this->Html->cText($userReview['UserReview']['review'],false); ?></div></td> 
			<td class="dl">
					<?php if(!empty($userReview['Ip']['ip'])): ?>							  
                            <?php echo  $this->Html->link($userReview['Ip']['ip'], array('controller' => 'users', 'action' => 'whois', $userReview['Ip']['ip'], 'admin' => false), array('target' => '_blank', 'title' => 'whois '.$userReview['Ip']['ip'], 'escape' => false));								
							?>
							<p>
							<?php 					
                            if(!empty($userReview['Ip']['Country'])):
                                ?>
                                <span class="flags flag-<?php echo strtolower($userReview['Ip']['Country']['iso2']); ?>" title ="<?php echo $userReview['Ip']['Country']['name']; ?>">
									<?php echo $userReview['Ip']['Country']['name']; ?>
								</span>
                                <?php
                            endif; 
							 if(!empty($userReview['Ip']['City'])):
                            ?>             
                            <span> 	<?php echo $userReview['Ip']['City']['name']; ?>    </span>
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
	<tr><td colspan="11" class="notice"><?php echo __l('No reviews available'); ?></td></tr>
	<?php
	endif;
	?>
	</table>
	<?php
			if (!empty($userReviews)):
	?>
		<div class="clearfix">
			<div class="admin-select-block grid_left">
				<div>
					<?php echo __l('Select:'); ?>
					<?php echo $this->Html->link(__l('All') , '#', array('class' => 'js-admin-select-all', 'title' => __l('All'))); ?>
					<?php echo $this->Html->link(__l('None') , '#', array('class' => 'js-admin-select-none', 'title' => __l('None'))); ?>
				</div>
				<div class="admin-checkbox-button"><?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?></div>
			</div>
		</div>
		<div class="hide"><?php echo $this->Form->submit('Submit'); ?> </div>
	<?php
			endif;
		 
	?>
	<?php if (!empty($userReviews)): ?>
		<div class="clearfix">
			<div class="grid_right js-pagination">
				<?php echo $this->element('paging_links'); ?>
			</div>
		</div>
	<?php endif; ?>
	<?php echo $this->Form->end(); ?>
</div>