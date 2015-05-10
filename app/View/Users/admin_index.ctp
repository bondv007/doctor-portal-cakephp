<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="users index js-response">
<div class="clearfix">
	<ul class="filter-list-block clearfix">
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Active) ? 'active-filter' : null; ?>
		<li class="green <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($active, false). '<span>' . __l('Active') . '</span>', array('controller' => 'users', 'action' => 'index', 'filter_id' => ConstMoreAction::Active), array('title' => __l('Active'),'escape' => false)); ?></li>
		<?php $class = (!empty($this->request->params['named']['filter_id']) && $this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) ? 'active-filter' : null; ?>
		<li class="gray <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($inactive, false). '<span>' . __l('Inactive') . '</span>', array('controller' => 'users', 'action' => 'index', 'filter_id' => ConstMoreAction::Inactive), array('title' => __l('Inactive'),'escape' => false)); ?></li>
		<?php $class = (!empty($this->request->params['named']['main_filter_id']) && $this->request->params['named']['main_filter_id'] == ConstMoreAction::Facebook) ? 'active-filter' : null; ?>
		<li class="light-blue <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($patient, false). '<span>' . __l('Patients') . '</span>', array('controller' => 'users', 'action' => 'index', 'main_filter_id' => ConstMoreAction::Patient), array('title' => __l('Patients'),'escape' => false)); ?></li>
		<li class="light-blue <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($doctor, false). '<span>' . __l('Doctors') . '</span>', array('controller' => 'users', 'action' => 'index', 'main_filter_id' => ConstMoreAction::Doctor), array('title' => __l('Doctors'),'escape' => false)); ?></li>
		<li class="light-blue <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($clinic, false). '<span>' . __l('Clinic Users') . '</span>', array('controller' => 'users', 'action' => 'index', 'main_filter_id' => ConstMoreAction::Clinic), array('title' => __l('Clinic Users'),'escape' => false)); ?></li>
		<li class="light-blue <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($facebook, false). '<span>' . __l('Facebook') . '</span>', array('controller' => 'users', 'action' => 'index', 'main_filter_id' => ConstMoreAction::Facebook), array('title' => __l('Facebook'),'escape' => false)); ?></li>
		<?php $class = (empty($this->request->params['named']['filter_id']) && empty($this->request->params['named']['main_filter_id'])) ? 'active-filter' : null; ?>
		<li class="black <?php echo $class; ?>"><?php echo $this->Html->link($this->Html->cInt($active + $inactive, false). '<span>' . __l('Total') . '</span>', array('controller' => 'users', 'action' => 'index'), array('title' => __l('Total'),'escape' => false)); ?></li>
	</ul>
</div>
<div class="clearfix">
    <div class="grid_left">
        <?php echo $this->element('paging_counter'); ?>
    </div>
    <div class="grid_left">
        <?php echo $this->Form->create('User', array('type' => 'get', 'class' => 'normal search-form clearfix', 'action'=>'index')); ?>
        <?php echo $this->Form->input('q', array('label' => 'Keyword')); ?>
        <?php echo $this->Form->submit(__l('Search'));?>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="grid_right add-block">
    	<?php echo $this->Html->link(__l('Add'), array('controller' => 'users', 'action' => 'add'), array('class' => 'add','title'=>__l('Add'))); ?>
        <?php
        	echo $this->Html->link(__l('Export'), array_merge(array('controller' => 'users', 'action' => 'index', 'ext' => 'csv', 'admin' => true), $this->request->params['named']), array('title' => __l('Export'), 'class' => 'export')); ?>
    </div>
</div>
<?php
	echo $this->Form->create('User' , array('class' => 'normal','action' => 'update'));
?>
<?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>

<table class="list">
	<tr>
		<th rowspan="2" class="Select"><?php echo __l('Select'); ?></th>
		<th rowspan="2" class="dc"><?php echo __l('Actions'); ?></th>
		<th rowspan="2" class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('username', __l('User')); ?></div></th>
		<th colspan="3" class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('User.user_login_count',__l('Logins')); ?></div></th>	
		<th rowspan="2" class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('created',__l('Registered on')); ?></div></th>
		<?php if (Configure::read('user.signup_fee')){?>
        <th rowspan="2" class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('is_paid',__l('Paid Memebrship fee')); ?></div></th>
        <?php }?>
        <th rowspan="2" class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('created',__l('Notification Action')); ?></div></th>
		</tr>
	<tr>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('user_login_count',__l('Count')); ?></div></th>
		<th class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('last_logged_in_time',__l('Time')); ?></div></th>	
        <th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('LastLoginIp.ip',__l('IP')); ?></div></th>
      
	</tr>
<?php
if (!empty($users)):
$i = 0;
	
foreach ($users as $user):
	$class = null;
	$active_class = '';
	$email_active_class = ' email-not-comfirmed';
	if($user['User']['is_email_confirmed']):
		$email_active_class = ' email-comfirmed';
	endif;
	if ($i++ % 2 == 0):
		$class = "altrow";
	endif;
	if($user['User']['is_active']):
		$status_class = 'js-checkbox-active';
	else:
		$active_class = ' inactive-record';
		$status_class = 'js-checkbox-inactive';
	endif;
	$online_class = 'offline';
	if (!empty($user['CkSession']['user_id'])) {
		$online_class = 'online';
	}
	
	
?>



	<tr class="<?php echo $class.$active_class;?>">
		<td class="select" <?php if($user['User']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Form->input('User.'.$user['User']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$user['User']['id'], 'label' => false, 'class' => $status_class.' js-checkbox-list')); ?></td>
		<td  class="actions" <?php if($user['User']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>>
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
											<?php if(Configure::read('user.is_email_verification_for_register') && !$user['User']['is_email_confirmed']):?>
                                            <li>
                                            <?php echo $this->Html->link(__l('Resend Activation'), array('controller' => 'users', 'action'=>'resend_activation', $user['User']['id'], 'admin' => false),array('class' => 'resend-activation','title' => __l('Resend Activation')));?>
                                            </li>
                                            <?php endif; ?>
											<li><?php echo $this->Html->link(__l('Edit'), array('controller' => 'user_profiles', 'action'=>'edit', $user['User']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?></li>
											<?php if($user['User']['role_id'] != ConstUserTypes::Admin) { ?>
											<li><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $user['User']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></li>
											<?php } ?>
											<li><?php echo $this->Html->link(__l('Change password'), array('controller' => 'users', 'action'=>'admin_change_password', $user['User']['id']), array('class' => 'password', 'title' => __l('Change password')));?></li>
										</ul>
									</div>
									<div class="action-bottom-block"></div>
								</div>
							</div>
						 </td>
					<td class="dl" <?php if($user['User']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>>
                        <div class="clearfix user-info-block">
                        <p class="user-img-left grid_left">
                            <?php
                               echo $this->Html->getUserAvatarLink($user['User'], 'micro_thumb',false);
								if($user['User']['role_id'] == ConstUserTypes::User)
								{
								 echo $this->Html->link($this->Html->cText($user['User']['username'], false), array('controller' => 'appointments', 'action' => 'index', 'user_id' => $user['User']['id'],'admin' => false),array('target' => '_blank'));
								}elseif($user['User']['role_id'] == ConstUserTypes::Doctor)
								{
								echo $this->Html->link($this->Html->cText($user['User']['username'], false), array('controller' => 'users', 'action' => 'view',$user['User']['username'],'admin' => false),array('target' => '_blank'));
								}elseif($user['User']['role_id'] == ConstUserTypes::Clinic)
								{
								echo $this->Html->cText($user['User']['username']);
								}
                            ?>
                            </p>
                              <p class="user-img-right clearfix grid_right">
						  <?php if($user['User']['role_id'] == ConstUserTypes::Admin):?>
								<span class="admin round-5"> <?php echo __l('Admin'); ?> </span>
						  <?php elseif($user['User']['role_id'] == ConstUserTypes::User):?>			
						   		<span class="admin round-5"> <?php echo __l('Patient'); ?> </span>
						  <?php elseif($user['User']['role_id'] == ConstUserTypes::Doctor):?>			
						   		<span class="admin round-5"> <?php echo __l('Doctor'); ?> </span>					
						  <?php elseif($user['User']['role_id'] == ConstUserTypes::Clinic):?>			
						   		<span class="admin round-5"> <?php echo __l('Clinic'); ?> </span>
						  <?php endif; ?>
						</p>
                        </div>
                        <div class="clearfix user-status-block user-info-block">
                        <?php 					
							if(!empty($user['UserProfile']['Country'])):
								?>
                                <span class="flags flag-<?php echo strtolower($user['UserProfile']['Country']['iso2']); ?>" title ="<?php echo $user['UserProfile']['Country']['name']; ?>">
									<?php echo $user['UserProfile']['Country']['name']; ?>
								</span>
                                <?php
	                        endif; 
						?>    
                        <?php if(!empty($user['User']['email'])):?>
								<span class="email <?php echo $email_active_class; ?>" title="<?php echo $user['User']['email']; ?>">
								<?php 
								if(strlen($user['User']['email'])>20) :
									echo '..' . substr($user['User']['email'], strlen($user['User']['email'])-15, strlen($user['User']['email'])); 
								else:
									echo $user['User']['email']; 
								endif; 
								?> 
                                </span>
						<?php endif; ?>
						</div>
                        </td>	
        <td class="dc" <?php if($user['User']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->link($this->Html->cInt($user['User']['user_login_count'], false), array('controller' => 'user_logins', 'action' => 'index', 'username' => $user['User']['username']));?></td>
        <td class="dc" <?php if($user['User']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>>
				<?php if($user['User']['last_logged_in_time'] == '0000-00-00 00:00:00' || empty($user['User']['last_logged_in_time'])){
					echo '-';
				}else{
					echo $this->Html->cDateTimeHighlight($user['User']['last_logged_in_time']);
				}?>
			</td>
			<td <?php if($user['User']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php if(!empty($user['LastLoginIp']['ip'])): ?>							  
				<?php echo  $this->Html->link($user['LastLoginIp']['ip'], array('controller' => 'users', 'action' => 'whois', $user['LastLoginIp']['ip'], 'admin' => false), array('target' => '_blank', 'title' => 'whois '.$user['User']['username'], 'escape' => false));								
				?>
				<p>
				<?php 					
				if(!empty($user['LastLoginIp']['Country'])):
					?>
					<span class="flags flag-<?php echo strtolower($user['LastLoginIp']['Country']['iso2']); ?>" title ="<?php echo $user['LastLoginIp']['Country']['name']; ?>">
						<?php echo $user['LastLoginIp']['Country']['name']; ?>
					</span>
					<?php
				endif; 
				 if(!empty($user['LastLoginIp']['City'])):
				?>             
				<span> 	<?php echo $user['LastLoginIp']['City']['name']; ?>    </span>
				<?php endif; ?>
				</p>
			<?php else: ?>
				<?php echo __l('N/A'); ?>
						<?php endif; ?>   </td>
		<td class="dc" <?php if($user['User']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->cDateTimeHighlight($user['User']['created']);?></td>
			<?php if (Configure::read('user.signup_fee')){?>
		<td class="dc" <?php if($user['User']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php echo $this->Html->cBool($user['User']['is_paid']);?></td>
		<?php }?>
		<td class="dc" <?php if($user['User']['is_admin_notification'] == 1){ echo 'style="background:#ffffaf"'; } ?>><?php 		if($user['User']['is_admin_notification'] == 1){ ?>
		<a href="javascript://" class="a_<?php echo $user['User']['id'];  ?>" onclick="remove_notif('<?php echo $user['User']['id']; ?>',1)">Clear</a>
			<?php }else{ echo '-'; } ?></td>
	</tr>
<?php
    endforeach;
else:
?>
	<tr>
		<td colspan="15" class="notice"><?php echo __l('No users available');?></td>
	</tr>
<?php
endif;
?>
</table>
<?php
if (!empty($users)):
?>
    <div class="clearfix">
    <div class="grid_left admin-select-block">
    	<div>
    		<?php echo __l('Select:'); ?>
    		<?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all', 'title' => __l('All'))); ?>
    		<?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none', 'title' => __l('None'))); ?>
    		<?php echo $this->Html->link(__l('Inactive'), '#', array('class' => 'js-admin-select-pending', 'title' => __l('Inactive'))); ?>
    		<?php echo $this->Html->link(__l('Active'), '#', array('class' => 'js-admin-select-approved', 'title' => __l('Active'))); ?>
    		
    		
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
endif;
echo $this->Form->end();
?>
</div>