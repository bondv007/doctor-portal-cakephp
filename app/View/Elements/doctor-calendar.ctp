<?php
    echo $this->requestAction(array('controller' => 'doctor_availabilities', 'action' => 'doctor_calender', $type,$user_id,$clinic_id), array('return'));
?>