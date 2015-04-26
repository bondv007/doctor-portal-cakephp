<?php
	echo $this->requestAction(array('controller' => 'user_reviews', 'action' => 'add', $user_id, $doctor_user_id,$appointment_id,'admin' => false));
?>