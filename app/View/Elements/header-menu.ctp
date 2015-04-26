
<ul class="menu clearfix">
	<?php
	if(!$this->Auth->sessionValid()) { ?>
		<li><?php echo $this->Html->link(__l('Sign in'), array('controller' => 'users', 'action' => 'login'), array('title' => __l('Sign in')));?></li>
		<li><?php echo $this->Html->link(__l('Join Now'), array('controller' => 'users', 'action' => 'login_user', 'admin' => false), array('title' => __l('Join Now')));?></li>
	<?php } else {
		?>
		<li class="dropdown balance-menu-block">
        <?php if($this->Auth->sessionValid() and $this->Auth->user('role_id') == ConstUserTypes::Doctor)  {
				 $action = 'index';
			  } else {
		  		 $action = 'browse';
		  	  }
		  ?>
		<?php echo __l('Hi,');?> <?php echo $this->Html->link(ucfirst($this->Auth->user('username')), array('controller' => 'appointments', 'action' => $action),array('title' => $this->Auth->user('username'))); ?>
        <div class="sub-menu-block balance-menu-block">

                <div class="submenu-c">
                   <div class="menu-head">
            	   	</div>
            	   	<div class="balance-menu-inner-block">
                     <ul class="sub-menu clearfix">
                        <li class="clearfix">
                           <ul class="omega alpha clearfix">
                    		<?php if($this->Auth->user('role_id') != ConstUserTypes::Clinic) { ?>
							<li><?php echo $this->Html->link(__l('View appointments'), array('controller' => 'appointments', 'action' => $action), array('title' => __l('View appointments')));?></li>
							<?php } ?>

							<li><?php echo $this->Html->link(__l('Edit Profile'), array('controller' => 'user_profiles', 'action' => 'edit'), array('title' => __l('My Account')));?></li>
                   		  </ul>
                		</li>
            		</ul>
                     <div class="logout-block">
                     	<?php echo $this->Html->link(__l('Sign out'), array('controller' => 'users', 'action' => 'logout'), array('title' => __l('Logout')));?>
                     </div>
                    </div>
                </div>

            <div class="submenu-bl">
                <div class="submenu-br">
                    <div class="submenu-bc">
                    </div>
                </div>
            </div>
        </div>
		</li>
	<?php } ?>
</ul>