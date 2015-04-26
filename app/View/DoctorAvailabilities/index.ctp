<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<?php if(empty($this->params['named']['stat']) && !isset($this->data['DoctorAvailability']['tab_check']) && !$isAjax): ?>
	<h2><?php echo __l('Appointments'); ?></h2>
	<div class="doctor-availability-category clearfix">
	<?php echo $this->Form->create('DoctorAvailability', array('action' => 'index' ,'class' => 'normal js-ajax-form {"container":"js-responses","doctorAvailability":"true"}')); ?>
			<?php echo $this->Form->input('filter', array('default'=>__l('all'),'type' => 'radio','options'=>$filter,'legend'=>false,'class' =>'js-doctor-vailability-filter')); ?>
		<div class="js-filter-window hide clearfix">
			<div class="clearfix transection-date-time-block grid_left">
				<div class="input date-time grid_left clearfix">
					<div class="js-datetime">
						<?php echo $this->Form->input('from_date', array('label' => __l('From'), 'type' => 'date', 'orderYear' => 'asc', 'minYear' => date('Y')-10, 'maxYear' => date('Y'), 'div' => false, 'empty' => __l('Please Select'))); ?>
					</div>
				</div>
				<div class="input date-time grid_left end-date-time-block clearfix">
					<div class="js-datetime">
						<?php echo $this->Form->input('to_date', array('label' => __l('To '),  'type' => 'date', 'orderYear' => 'asc', 'minYear' => date('Y')-10, 'maxYear' => date('Y'), 'div' => false, 'empty' => __l('Please Select'))); ?>
					</div>
				</div>
			</div>
			<?php
				echo $this->Form->input('tab_check', array('type' => 'hidden','value' => 'tab_check')); ?>
            <div class="submit-block clearfix">
            <?php
				echo $this->Form->submit(__l('Filter'));
			?>
			</div>
		</div>
    	<?php echo $this->Form->end(); ?>
	</div>

	<div class="doctorAvailabilities index js-response js-responses">
<?php endif; ?>
<div class="clearfix">
        <div class="side1">
            <div class="form-box">
                <div class="form-box-inner">
		<table class="list transactions-list">
			 <tr>
			<th class="dl"><?php echo $this->Paginator->sort('User.username', __l('Patient'));?></th>
			<th class="dl"><?php echo $this->Paginator->sort('User.email', __l('Email'));?></th>
            <th class="dl"><?php echo $this->Paginator->sort('DoctorAvailability.created', __l('Date'));?></th>
			<th class="dl"><?php echo __l('Details');?></th>
            <th class="dl"><?php echo __l('Status');?></th>
        </tr>
    <?php 
    if (!empty($doctorAvailabilities)):
    
    $i = 0;
    foreach ($doctorAvailabilities as $doctorAvailability):
        $class = null;
        if ($i++ % 2 == 0) {
            $class = ' class="altrow"';
        }
    ?>
        <tr<?php echo $class;?>>
                <td class="dc"><?php echo $this->Html->cText($doctorAvailability['User']['username']);?></td>
				<td class="dc"><?php echo $this->Html->cText($doctorAvailability['User']['email']);?></td>
				<td class="dc"><?php echo $this->Html->cDateTimeHighlight($doctorAvailability['DoctorAvailability']['created']);?></td>
				<td class="dc"><?php echo $this->Html->cText($doctorAvailability['User']['username']);?></td>
				<td class="dc"><?php echo $this->Html->cText($doctorAvailability['User']['username']);?></td>
            </tr>
    <?php
        endforeach;
	?>
	<?php
    else:
    ?>
        <tr>
            <td colspan="11" class="notice"><?php echo __l('No Appointments available');?></td>
        </tr>
    <?php
    endif;
    ?>
		</table>
		 <?php
    if (!empty($doctorAvailabilities)) {
        ?>
            <div class="js-pagination">
                <?php echo $this->element('paging_links'); ?>
            </div>
        <?php
    }
    ?>
            </div>
        </div>
	</div>
	 <div class="side2">
        <?php
            echo $this->element('sidebar', array('config' => 'sec'));
        ?>
     </div>
<?php if(empty($this->params['named']['stat']) && !isset($this->data['DoctorAvailability']['tab_check']) && !$isAjax): ?>
</div>		
   </div>	
<?php endif; ?>