<?php /* SVN: $Id: $ */ ?>
<div class="insuranceCompanies form">
<?php echo $this->Form->create('InsuranceCompany', array('class' => 'normal'));?>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<div class="submit-block clearfix">
        <?php echo $this->Form->submit(__l('Update'));?>
    </div>
 <?php echo $this->Form->end();?>
</div>
