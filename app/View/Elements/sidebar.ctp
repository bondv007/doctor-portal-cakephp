<?php if($this->Auth->sessionValid() && $this->Auth->user('role_id') == ConstUserTypes::Doctor){ ?>	
<div class="side2-outer-block">
	<div class="side2-tl">
        <div class="side2-tr">
            <div class="side2-tm clearfix">
                <h3><?php echo __l('Calender');?></h3>
            </div>
 
        </div>
    </div>
	 <div class="side2-inner clearfix">
			<?php echo $this->element('doctor-calendar', array('type' => 'doctor', 'user_id'=>$this->Auth->user('id'), 'config' => 'sec')); ?>    	 
    </div>
    <div class="side2-bl">
        <div class="side2-br">
            <div class="side2-bm clearfix">
            </div>
        </div>
    </div>
    </div>
<?php }?>

<?php
if(
	($this->request->params['controller'] == 'user_profiles' && $this->request->params['action'] == 'edit') ||
	($this->request->params['controller'] == 'appointments' && $this->request->params['action'] == 'index') ||
	($this->request->params['controller'] == 'appointments' && $this->request->params['action'] == 'browse') ||
	($this->request->params['controller'] == 'appointments' && $this->request->params['action'] == 'view') ||
	($this->request->params['controller'] == 'doctor_availabilities' && $this->request->params['action'] == 'index') ||
	($this->request->params['controller'] == 'doctor_availabilities' && $this->request->params['action'] == 'index' && $this->request->params['named']['type'] == 'calendar') ||
	($this->request->params['controller'] == 'doctor_availabilities' && $this->request->params['action'] == 'add') ||
	($this->request->params['controller'] == 'doctor_availabilities' && $this->request->params['action'] == 'setup_time') ||
	($this->request->params['controller'] == 'doctor_availabilities' && $this->request->params['action'] == 'timeslot') ||
	($this->request->params['controller'] == 'photos' && $this->request->params['action'] == 'index') ||
	($this->request->params['controller'] == 'photos' && $this->request->params['action'] == 'add') ||
	($this->request->params['controller'] == 'plans' && $this->request->params['action'] == 'index') ||
	($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'my_clinics') ||
	($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'manage_clinics') ||
	($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'manage_insurances') ||
	($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'manage_specialties') ||
	($this->request->params['controller'] == 'questions' && $this->request->params['action'] == 'add') ||
	($this->request->params['controller'] == 'user_educations' && $this->request->params['action'] == 'index') ||
	($this->request->params['controller'] == 'user_educations' && $this->request->params['action'] == 'add') ||
	($this->request->params['controller'] == 'user_educations' && $this->request->params['action'] == 'edit') ||
	($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'manage_languages') ||
	($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'my_answers') ||
	($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'change_password')||
	($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'add') ||
	($this->request->params['controller'] == 'clinics' && $this->request->params['action'] == 'index') ||
	($this->request->params['controller'] == 'clinics' && $this->request->params['action'] == 'add') ||
	($this->request->params['controller'] == 'clinics' && $this->request->params['action'] == 'edit') ||
	($this->request->params['controller'] == 'clinics' && $this->request->params['action'] == 'view') || 
	($this->request->params['controller'] == 'clinics' && $this->request->params['action'] == 'my_doctors')
):
?>
<div class="side2-outer-block">
    <div class="side2-tl">
        <div class="side2-tr">
            <div class="side2-tm">
                <div class="doc-img">
                <h3><?php echo $this->Auth->user('username');?></h3>
    				<?php if($this->Auth->sessionValid() && $this->Auth->user('role_id') == ConstUserTypes::Doctor){ ?>
	   	       			<?php echo $this->Html->link(__l('View Profile'), array('controller' => 'users', 'action' => 'view', $this->Auth->user('username')),array('title' => __l('View Profile'))); ?>
	       			<?php } ?>
  				</div>
            </div>
 
        </div>
    </div>
    <div class="side2-inner clearfix">
    	<ul class="admin-links users-links">
    		<?php if($this->Auth->sessionValid() && $this->Auth->user('role_id') == ConstUserTypes::Doctor){ ?>	
			<?php $class = ($this->request->params['controller'] == 'doctor_availabilities' && $this->request->params['action'] == 'index' && empty($this->request->params['named']['type'])) ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('Synopsis'), array('controller' => 'appointments', 'action' => 'index', 'status' => 'all','admin' => false), array('title' => 'Setup Availability')); ?></li>
			<?php $class = ($this->request->params['controller'] == 'doctor_availabilities' && $this->request->params['action'] == 'index'  && !empty($this->request->params['named']['type'])) ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('Appointment'), array('controller' => 'doctors', 'action' => 'appointment','admin' => false), array('title' => 'Setup Availability')); ?></li>
			<?php $class = ($this->request->params['controller'] == 'doctor_availabilities' && $this->request->params['action'] == 'timeslot') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('Setup Available Timing'), array('controller' => 'doctors', 'action' => 'timeslot','admin' => false), array('title' => 'Setup Availability')); ?></li>
			<!-- <?php $class = ($this->request->params['controller'] == 'doctors' && $this->request->params['action'] == 'setup_time') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('Setup Available Time'), array('controller' => 'doctors', 'action' => 'setup_time','user_id' =>$user_id, 'admin' => false), array( 'title' => 'Setup Available Time')); ?></li>                   -->
			<?php } ?>
			<?php if($this->Auth->sessionValid() && ($this->Auth->user('role_id') == ConstUserTypes::User || $this->Auth->user('role_id') == ConstUserTypes::Doctor || $this->Auth->user('role_id') == ConstUserTypes::Clinic)){ ?>	
			<?php $class = ($this->request->params['controller'] == 'user_profiles' && $this->request->params['action'] == 'edit') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('Edit Profile'), array('controller' => 'user_profiles', 'action' => 'edit'), array('title' => __l('Edit profile')));?></li>
			<?php $class = ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'change_password') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php  echo $this->Html->link(__l('Change Password'),array('controller'=> 'users', 'action'=>'change_password'),array('title' => 'Change Password')); ?></li>
			<?php } ?>
			<?php if($this->Auth->sessionValid() && $this->Auth->user('role_id') == ConstUserTypes::Doctor){ ?>	
			<?php $class = ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'my_answers') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Answers'), array('controller' => 'users', 'action' => 'my_answers','admin' => false), array('title' => 'My Answers')); ?></li>
			<?php $class = ($this->request->params['controller'] == 'plans' && $this->request->params['action'] == 'index') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Plans'), array('controller' => 'plans', 'action' => 'index','admin' => false), array('title' => 'My Plans')); ?></li>
			<?php $class = ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'manage_specialties') ? ' class="active"' : null; ?>	
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Specialties'), array('controller' => 'users', 'action' => 'manage_specialties', 'admin' => false), array('title' => 'My Specialties')); ?></li>
			<?php $class = ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'manage_clinics') ? ' class="active"' : null; ?>	
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Hospitals'), array('controller' => 'users', 'action' => 'manage_clinics', 'admin' => false), array('title' => 'My Hospitals')); ?></li>
			<?php $class = ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'manage_insurances') ? ' class="active"' : null; ?>	
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Insurances'), array('controller' => 'users', 'action' => 'manage_insurances','admin' => false), array('title' => 'My Insurances')); ?></li>
			<?php $class = ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'manage_languages') ? ' class="active"' : null; ?>					
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Languages'), array('controller' => 'users', 'action' => 'manage_languages', 'admin' => false), array('title' => 'My Languages')); ?></li>
			 
			<?php $class = ($this->request->params['controller'] == 'photos' && $this->request->params['action'] == 'index') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Photos'), array('controller' => 'photos', 'action' => 'index','admin' => false), array('title' => 'My Photos')); ?></li>
			<?php $class = ($this->request->params['controller'] == 'user_educations' && $this->request->params['action'] == 'index') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Educations'), array('controller' => 'user_educations', 'action' => 'index','admin' => false), array('title' => 'My Educations')); ?></li>
			<?php } ?>
			<?php if($this->Auth->sessionValid() && $this->Auth->user('role_id') == ConstUserTypes::User){ ?>	
			<?php $class = ($this->request->params['controller'] == 'appointments' && $this->request->params['action'] == 'index') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Appointments'), array('controller' => 'appointments', 'action' => 'browse','admin' => false), array('title' => 'My Appointments')); ?></li>
			<?php $class = ($this->request->params['controller'] == 'appointments' && $this->request->params['action'] == 'index') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('Book a new appointment'), '/',array('title' => __l('Book a new appointment'),'escape' => false)); ?></li>	
			<?php } ?>
			<?php if($this->Auth->sessionValid() && $this->Auth->user('role_id') == ConstUserTypes::Clinic){ ?>	
			<?php $class = ($this->request->params['controller'] == 'clinics' && $this->request->params['action'] == 'index') ? ' class="active"' : null; ?>
			<li <?php echo $class;?>><?php echo $this->Html->link(__l('My Clinics & Doctors'), array('controller' => 'clinics', 'action' => 'index'), array('title' => __l('My Clinics & Doctors')));?></li>
			<?php } ?>
			<li><?php echo $this->Html->link(__l('Logout'), array('controller' => 'users', 'action' => 'logout'), array('title' => __l('Logout')));?></li>
    	</ul>
    </div>
    <div class="side2-bl">
        <div class="side2-br">
            <div class="side2-bm">
            </div>
        </div>
    </div>
    </div>
<?php endif; ?>