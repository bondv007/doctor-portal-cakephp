<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="countries index js-response">
    <div class="clearfix">
        <div class="grid_left">
        	<?php echo $this->element('paging_counter');?>
        </div>
        <div class="grid_left">
            <?php echo $this->Form->create('Country', array('type' => 'get', 'class' => 'normal search-form','action'=>'index'));?>
            <?php echo $this->Form->input('q', array('label' => 'Keyword')); ?>
            <?php echo $this->Form->submit(__l('Filter')); ?>
             <?php echo $this->Form->end(); ?>
        </div>
      	<div class="grid_right">
    		<?php echo $this->Html->link(__l('Add'), array('controller' => 'countries', 'action' => 'add'), array('title' => __l('Add New Country'), 'class' => 'add'));?>
    	</div>
	</div>

		<?php echo $this->Form->create('Country' , array('action' => 'update','class'=>'normal'));?>
		<?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
		<table class="list">
			<tr>
				<th rowspan="2"></th>
				<th rowspan="2"><?php echo __l('Actions');?></th>
				<th rowspan="2" class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('name');?></div></th>
				<th rowspan="2" class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('fips104');?></div></th>
				<th rowspan="2" class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('iso2');?></div></th>
				<th rowspan="2" class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('iso3');?></div></th>
				<th rowspan="2" class="dc"><div class="js-pagination"><?php echo $this->Paginator->sort('ison');?></div></th>
				<th rowspan="2" class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('internet');?></div></th>
				<th rowspan="2" class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('capital');?></div></th>
				<th rowspan="2" class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('map_reference');?></div></th>
				<th colspan="2"><?php echo __l('Nationality');?></th>
				<th colspan="2"><?php echo __l('Currency');?></th>
			</tr>
			<tr>
				<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('nationality_singular',__l('Singular'));?></div></th>
				<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('nationality_plural',__l('Plural'));?></div></th>
				<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('currency',__l('Name'));?></div></th>
				<th class="dl"><div class="js-pagination"><?php echo $this->Paginator->sort('currency_code',__l('Code'));?></div></th>

			</tr>
			<?php
			if (!empty($countries)):
				$i = 0;
				foreach ($countries as $country):
					$class = null;
					if ($i++ % 2 == 0) :
						$class = ' class="altrow"';
					endif;
					?>
					<tr<?php echo $class;?>>
						<td><?php
							echo $this->Form->input('Country.'.$country['Country']['id'].'.id',array('type' => 'checkbox', 'id' => "admin_checkbox_".$country['Country']['id'],'label' => false , 'class' => 'js-checkbox-list'));
							?>
						</td>
						<td  class="actions">
							<div class="action-block">
								<span class="action-information-block">
									<span class="action-left-block">&nbsp;
									</span>
									<span class="action-center-block">
										<span class="action-info">
											<?php echo __l('Action');?>
										</span>
									</span>
								</span>
								<div class="action-inner-block">
									<div class="action-inner-left-block">
										<ul class="action-link clearfix">
											<li><?php
												echo $this->Html->link(__l('Edit'), array('action'=>'edit', $country['Country']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?>
                                        </li>
                                        <li>
                                        <?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $country['Country']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?>
                                        <?php echo $this->Layout->adminRowActions($country['Country']['id']);?>
                                        </li>
										</ul>
									</div>
									<div class="action-bottom-block"></div>
								</div>
							</div>
						 </td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['name']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['fips104']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['iso2']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['iso3']);?></td>
						<td class="dc"><?php echo $this->Html->cText($country['Country']['ison']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['internet']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['capital']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['map_reference']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['nationality_singular']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['nationality_plural']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['currency']);?></td>
						<td class="dl"><?php echo $this->Html->cText($country['Country']['currency_code']);?></td>
					</tr>
					<?php
				endforeach;
			else:
				?>
				<tr>
					<td class="notice" colspan="19"><?php echo __l('No countries available');?></td>
				</tr>
				<?php
			endif;
			?>
		</table>
		<?php if (!empty($countries)): ?>
            <div class="clearfix">
                <div class="admin-select-block grid_left">
                    <div>
        				<?php echo __l('Select:'); ?>
        				<?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all','title' => __l('All'))); ?>
        				<?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none','title' => __l('None'))); ?>
        			</div>
        			<div>
        				<?php echo $this->Form->input('more_action_id', array('class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?>
        			</div>
    			</div>
    			<div class="js-pagination grid_right">
			     	<?php echo $this->element('paging_links');  ?>
			 </div>
			</div>
			<div class="hide">
				<?php echo $this->Form->submit('Submit');  ?>
			</div>
			<?
		endif;
		echo $this->Form->end();
		?>

</div>