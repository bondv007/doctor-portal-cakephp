<?php 
/*
 * 1. Hospital (hygiene)
2. Doctor
3. Staff Hospitality
 * */

?>
<style>
.rating{ margin-left: 161px; display:inline-block; width:110px;}
.rating_avg{display: inline;  width: 113px;}
.rate_val{ background: none repeat scroll 0 0 #000; border-radius: 22%;  color: #fff;   font-weight: bold; padding: 3px;}
.topSection{ text-align:center;}
#UserRatingAddRatingsForm .submit{ margin-left:175px;}
.rev_list li{ margin-bottom:10px;}
.average .input{ margin-left: 200px;}
.average .input label{ display: inline-block;  width: 150px; font-weight:bold;}
</style>
<div class="users form js-responses">
	<div class="clearfix  title-block">
		<h3 class="grid_11">Review/Rating</h3>
	</div>
	<div class="form-box">
        
		<div class="userRatings form form-box-inner">
			<div class="leftSection">
				
			<div class="topSection">
				<h3><?php echo $user['UserProfile']['first_name'].' '.$user['UserProfile']['last_name']; ?></h3>
				
				<span><?php //echo $user['UserProfile']['address']; ?></span>
			</div>
			<hr/>	
            <fieldset>
			<form id="UserRatingAddRatingsForm" class="normal" accept-charset="utf-8"  method="post" action="<?php echo $this->webroot.'user_ratings/add_ratings/'.$this->params->pass['0']; ?>">
		<?php //echo $this->Form->create('UserRating', array('class' => 'normal'));
			echo $this->Form->input('UserRating.user_id', array('type' => 'hidden', 'value' => $user['User']['id']));
		?>
			<input type="hidden" name="data[UserRating][rate_1]" id="rate_1_val" value="0"/>
			<input type="hidden" name="data[UserRating][rate_2]" id="rate_2_val" value="0"/>
			<input type="hidden" name="data[UserRating][rate_3]" id="rate_3_val" value="0"/>
			<fieldset>
		 		
			<div class="input">
				<label>Hospitality (hygiene): </label>
				<div id="rate_1" class="rating"></div>
				<!--<span class="rate_val">0</span>-->
			</div>
			<div class="input">
				<label>Doctor: </label>
				<div id="rate_2" class="rating"></div>
				<!--<span class="rate_val">0</span>-->
			</div>
			<div class="input">
				<label>Staff Hospitality: </label>
				<div id="rate_3" class="rating"></div>
				<!--<span class="rate_val">0</span>-->
			</div>
			<?php
				echo $this->Form->input('UserRating.name', array('label' => 'Name: ', 'placeholder' => 'Enter your name','required' => 'required', 'maxlength' => 100,'value' => $loggedInUser['UserProfile']['first_name'].' '.$loggedInUser['UserProfile']['last_name']));
				echo $this->Form->input('UserRating.email', array('label' => 'Email: ', 'placeholder' => 'Enter your email', 'required' => 'required', 'maxlength' => 150,'value' => $this->Auth->user('email')));
				echo $this->Form->input('UserRating.phone', array('label' => 'Phone No: ', 'placeholder' => 'Enter your phone no', 'required' => 'required', 'maxlength' => 150,'value' => $loggedInUser['UserProfile']['phone'])); ?>
				<div class="input select required date-time end-date-time-block clearfix">
        						<div class="js-datetime">
        							<?php echo $this->Form->input('UserRating.last_ckup_date', array('label' => __l('Last Checkup date'),'empty' => __l('Please Select'), 'div' => false, 'minYear' => date('Y') - 100, 'maxYear' => date('Y'), 'orderYear' => 'asc')); ?>
        													
					          </div>
                          </div>

				<?php echo $this->Form->input('UserRating.review',array('label' => 'Review: ', 'maxlength' => 200, 'type' => 'textarea'));
			?>
			<?php echo $this->Form->submit('Submit');
				echo $this->Form->end();
			?>
			</fieldset>
			</div>
			<hr/>
			
			<div class="reviews">
				<h3>Reviews</h3>
				<div class="average">
					<div class="input">
						<label>Hospitality (hygiene): </label>
						<div class="rating_avg" data-rating="<?php echo $avg_rate_1; ?>"></div>
						<span class="">(<?php echo $avg_rate_1; ?>)</span>
					</div>
					<div class="input">
						<label>Doctor: </label>
						<div class="rating_avg" data-rating="<?php echo $avg_rate_2; ?>"></div>
						<span class="">(<?php echo $avg_rate_2; ?>)</span>
					</div>
					<div class="input">
						<label>Staff Hospitality: </label>
						<div class="rating_avg" data-rating="<?php echo $avg_rate_3; ?>"></div>
						<span class="">(<?php echo $avg_rate_3; ?>)</span>
					</div>
				</div>
				<ul class="rev_list">
				<?php if(!empty($reviews)){
					$i = 1; 
						foreach($reviews as $rev){
					 ?>
						<li><?php echo '<strong>'.$i.').</strong>'.$rev['UserRating']['review']; ?><br/><strong> - <?php echo $rev['UserRating']['name']; ?></strong></li>
				<?php $i++; }}else{ echo '<br>No reviews posted'; } ?>	
				</ul>
			</div>	
		</div>
			
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
		$('.rating').raty({
		 starOff : '<?php echo $this->webroot.'img/star-off.png'; ?>',
 		 starOn  : '<?php echo $this->webroot.'img/star-on.png'; ?>',
 		 starHalf : '<?php echo $this->webroot.'img/star-half.png'; ?>', 		  
 		 score: function() {
	        return $(this).attr('data-rating');
	    },
	    click: function(score, evt) {
	    	var num = score;
	    	var attri = $(this).attr('id');	    	
	    	$(this).parent().find('.rate_val').html(num);
	    	$('#'+attri+'_val').val(num);
	    }
	});
	
	$('.rating_avg').raty({
		
		 starOff : '<?php echo $this->webroot.'img/star-off.png'; ?>',
 		 starOn  : '<?php echo $this->webroot.'img/star-on.png'; ?>',
 		 starHalf : '<?php echo $this->webroot.'img/star-half.png'; ?>', 		  
 		 score: function() {
	        return $(this).attr('data-rating');
	    },
	    readOnly: true
	});
});
	
</script>