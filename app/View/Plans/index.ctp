<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="plans index">
    <h2 class="title"><?php echo __l('Upgrade Your Plan');?></h2>
    <div class="clearfix">
        <div class="side1">
            <div class="form-box">
            	<div class="form-box-inner">
            	<?php echo $this->Form->create('Plan' , array('action' => 'update_plans','class' => 'normal'));?>
            	<div class="current-plan">
					<p><?php echo __l('My Current Plan');?>: 
						<?php if(!empty($current_plan)) { ?> 
							<span><?php echo $this->Html->cText($current_plan['Plan']['name']);?></span>
						<?php } else { ?>
							<span><?php echo __l('Not yet update any plans');?></span>
						<?php } ?>	
					</p>
					<?php if(!empty($current_plan)) { ?> 
						<p><?php echo __l('Expiry Date');?>: 
							<span><?php echo $this->Html->cDate($current_plan['PlanUser']['expiry_date']);?></span>
						</p>	
					<?php } ?>	
				</div>
				<ol class="plan-list">
        			<li class="title clearfix">
                        <div class="plan-type"><?php echo __l('Plan Type');?></div>
                        <div class="plan-amount"><?php echo __l('Plan Price');?></div>
                        <div class="plan-duration"><?php echo __l('Plan Duration');?></div>
                    </li>
            <?php
            if (!empty($plans)):?>
            <?php $i = 0;
            foreach ($plans as $plan):
            	$class = null;
            	if ($i++ % 2 == 0) :
            		$class = ' class="altrow"';
            	endif;
            	$new_options=array();
            	$new_options[$plan['Plan']['id']] = $plan['Plan']['name'];
            ?>

            <li class="clearfix">
                <div class="plan-type"><?php echo $this->Form->input('Plan.id',array('type' => 'radio','options'=>$new_options,'value'=>$plan['Plan']['id']));?></div>
                <div class="plan-amount"><?php echo Configure::read('site.currency').$this->Html->cCurrency($plan['Plan']['amount']);?></div>
                <div class="plan-duration"><?php echo $this->Html->cInt($plan['Plan']['duration']);?>&nbsp;<?php echo __l(' Days');?></div>
            </li>
            <?php
                endforeach;
            else:
            ?>
            	<li>
            		<p class="notice"><?php echo __l('No Plans available');?></p>
            	</li>
            <?php
            endif;
            ?>
            </ol>
            <div class="plans-submit-block clearfix">
                <?php echo $this->Form->submit(__l('Upgrade Plan')); ?>
                </div>
                 <?php echo $this->Form->end(); ?>
            	</div>
            </div>
        </div>
        <div class="side2">
            <?php
            	echo $this->element('sidebar', array('config' => 'sec'));
            ?>
        </div>
    </div>
</div>
