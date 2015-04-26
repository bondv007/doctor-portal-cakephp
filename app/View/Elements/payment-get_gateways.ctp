<?php
echo $this->requestAction(array('controller' => 'payments','action' => 'get_gateways'), array('named' =>array('model'=>$model,'type'=>$type,'is_enable_wallet'=>$is_enable_wallet),'return'));
?>