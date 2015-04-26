<?php
	echo $this->requestAction(array('controller' => 'users', 'action' => 'doctor_slots', 'current_week' =>$current_week, 'users' => $user_ids,'admin' => false));
?>