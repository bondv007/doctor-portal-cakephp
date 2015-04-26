<?php
	echo $this->requestAction(array('controller' => 'user_reviews', 'action' => 'index', $patient_id, $doctor_id,$appointment_id,'admin' => false));
?>
