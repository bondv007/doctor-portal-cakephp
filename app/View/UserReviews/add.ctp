<?php /* SVN: $Id: $ */ ?>
<div class="userReviews form js-ajax-form-container">
	<h3><?php echo __l('Submit a Review');?></h3>
<?php echo $this->Form->create('UserReview', array('action' => 'add', 'class' => "normal comment-form js-comment-form {container:'js-ajax-form-container',responsecontainer:'js-responses'}"));?>
	<dl class="list appointments-list clearfix">
        <dt><?php echo __l('Bedside Manner');?></dt>
        <dd>
        	<div class="js-bed-stars" id="bedratings">
        		<?php $options=array('0.5'=>'0.5', '1'=>'1','1.5'=>'1.5','2'=>'2','2.5'=>'2.5','3'=>'3','3.5'=>'3.5','4'=>'4','4.5'=>'4.5','5'=>'5'); ?>
            			<?php
                            $attributes=array('div'=>'js-rate',"class" => "js-rateing", 'legend'=>false);
            				echo $this->Form->radio('bedside_rate', $options, $attributes);
            			?>
        			<div id ="js-rating-wrapper1"></div>
        	</div>
        </dd>
    	<dt><?php echo __l('Wait Time');?></dt>
    	<dd>
        	<div class="js-wait-time-stars" id="waitratings">
        		<?php $options=array('0.5'=>'0.5', '1'=>'1','1.5'=>'1.5','2'=>'2','2.5'=>'2.5','3'=>'3','3.5'=>'3.5','4'=>'4','4.5'=>'4.5','5'=>'5'); ?>
            			<?php
                            $attributes=array('div'=>'js-rate',"class" => "js-rateing", 'legend'=>false);
            				echo $this->Form->radio('waittime_rate', $options, $attributes);
            			?>
        			<div id ="js-rating-wrapper2"></div>
        	</div>
        </dd>
      	<dt><?php echo __l('Review');?></dt>
      	<dd>
    	<?php
    		echo $this->Form->input('doctor_user_id', array('type' => 'hidden', 'value' => $doctor_user_id));
            echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $this->Auth->user('id')));
    		echo $this->Form->input('appointment_id', array('type' => 'hidden', 'value' => $appointment_id));
    		echo $this->Form->input('review');
    	?>
    	</dd>
    </dl>
    <div class="clearfix">
        <?php echo $this->Form->submit(__l('Add'));?>
    </div>
    <?php echo $this->Form->end();?>
</div>