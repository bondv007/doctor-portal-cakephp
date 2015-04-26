<?php /* SVN: $Id: pay_now.ctp 1960 2010-05-21 14:46:46Z jayashree_028ac09 $ */ ?>
<div class="payments membership">
    <h2><?php echo __l('Pay Plan Fee');?></h2>
    <div class="form-box">
    	<div class="form-box-inner">
            <?php echo $this->Form->create('Payment', array('url' => array('controller' => 'payments', 'action' => 'upgrade_plan_pay_now', $user['User']['id'], $this->request->params['pass'][1]), 'class' => 'normal clearfix'));
             echo $this->Form->input('User.id',array('type'=>'hidden'));
             ?>
            <div class="current-plan">
            	<p><?php echo __l('Plan Fee');?>
                    <span><?php echo Configure::read('site.currency').$this->Html->cCurrency($total_amount);?></span>
                </p>
            </div>
            <fieldset class="form-block">
            	<ol class="plan-list">
                    <li class="title"><div><?php echo __l('Select Payment Type');?></div></li>
                    <li class="clearfix">
                        <?php echo $this->element('payment-get_gateways', array('model' => 'User', 'type' => 'is_enable_for_plan', 'is_enable_wallet'=>0, 'cache' => array('config' => 'sec')));?>
                    </li>
                </ol>
            </fieldset>
            <?php echo $this->Form->end();?>
        </div>
    </div>
</div>