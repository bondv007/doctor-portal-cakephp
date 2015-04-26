<?php /* SVN: $Id: do_payment.ctp 44816 2011-02-19 12:02:30Z aravindan_111act10 $ */ ?>
<h2 class="paypal-title"><?php echo __l('Redirecting you to PayPal');?></h2>
<div class="payment-info-block clearfix">
    <p class="grid_left">
    <?php echo __l('If your browser doesn\'t redirect you please '); ?>
    </p>
    <div class="grid_left">
    <?php
    		$this->Gateway->$action($gateway_options);
    ?>
    </div>
    <div class="grid_left">
    	<?php echo __l('to continue '); ?>
    </div>
</div>