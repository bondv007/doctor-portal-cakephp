<div class="payment-radio-block">
<?php
	echo $this->Form->input($model.'.payment_gateway_id', array('legend' => false, 'type' => 'radio', 'options' => $gateway_types, 'class' => 'js-gateway-type')); 
?>
</div>
<div class="submit">
<?php
	$hide_class = '';
	foreach($gateway_types as $key =>$payments_gateway) {
		$i = 0;
		$hide_class = '';
		if ($this->request->data[$model]['payment_gateway_id'] != $key) {
			$hide_class = 'hide';
		}
		if ($key == ConstPaymentGateways::PayPalStandard) {
			echo $this->Form->submit(__l('Pay with Paypal Standard'), array('name' => 'data[Payment][standard_connect]','div'=>false, 'class' => 'paypal-block js-paypal-standard-block ' . $hide_class));
		}
	}
?>
</div>