<?php /* SVN: $Id: $ */ ?>
<div class="ips index">
    <div class="clearfix">
        <div class="grid_left">
            <?php echo $this->element('paging_counter');?>
        </div>
        <div class="grid_left">
            <?php echo $this->Form->create('Ip', array('type' => 'get', 'class' => 'normal search-form', 'action'=>'index')); ?>
            <?php echo $this->Form->input('q', array('label' => __l('Keyword'))); ?>
            <?php echo $this->Form->submit(__l('Search'));?>
            <?php echo $this->Form->end();
            ?>
        </div>
    </div>
<?php
	echo $this->Form->create('Ip', array('class' => 'normal clearfix', 'action'=>'update'));
	 ?>
	 <?php echo $this->Form->input('r', array('type' => 'hidden', 'value' => $this->request->url)); ?>
<table class="list">
    <tr>
        <th rowspan="2" class="select"><?php echo __l('Select');?></th>
        <th rowspan="2" class="actions"><?php echo __l('Actions');?></th>
        <th rowspan="2" class="dc"><?php echo $this->Paginator->sort('created',__l('Created'));?></th>
        <th rowspan="2" class="dl"><?php echo $this->Paginator->sort('ip',__l('IP'));?></th>
		<th colspan="5" class="dc"><?php echo __l('Auto detected'); ?></th>
	</tr>
	<tr>
        <th class="dl"><?php echo $this->Paginator->sort('City.name',__l('City'));?></th>
        <th class="dl"><?php echo $this->Paginator->sort('State.name',__l('State'));?></th>
        <th class="dl"><?php echo $this->Paginator->sort('Country.name',__l('Country'));?></th>
        <th class="dc"><?php echo $this->Paginator->sort('latitude',__l('Latitude'));?></th>
        <th class="dc"><?php echo $this->Paginator->sort('longitude',__l('Longitude'));?></th>
    </tr>
<?php
if (!empty($ips)):

$i = 0;
foreach ($ips as $ip):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	
		$status_class = 'js-checkbox-deactiveusers';

?>
	<tr<?php echo $class;?>>
       <td><?php echo $this->Form->input('Ip.'.$ip['Ip']['id'].'.id', array('type' => 'checkbox', 'id' => "admin_checkbox_".$ip['Ip']['id'], 'label' => false, 'class' => $status_class.' js-checkbox-list')); ?></td>
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
							<li><?php echo $this->Html->link(__l('Delete'), array('action' => 'delete', $ip['Ip']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?>
                              <?php echo $this->Layout->adminRowActions($ip['Ip']['id']);?>
                            </li>
						</ul>
					</div>
					<div class="action-bottom-block"></div>
				</div>
			</div>
		 </td>
		<td class="dc"><?php echo $this->Html->cDateTime($ip['Ip']['created']);?></td>
		<td class="dl"><?php echo  $this->Html->link($ip['Ip']['ip'], array('controller' => 'users', 'action' => 'whois', $ip['Ip']['ip'], 'admin' => false), array('target' => '_blank', 'title' => 'whois '.$ip['Ip']['ip'], 'escape' => false));?></td>
		<td class="dl"><?php echo $this->Html->cText($ip['City']['name']);?></td>
		<td class="dl"><?php echo $this->Html->cText($ip['State']['name']);?></td>
		<td class="dl"><?php echo $this->Html->cText($ip['Country']['name']);?></td>
		<td class="dc"><?php echo $this->Html->cFloat($ip['Ip']['latitude']);?></td>
		<td class="dc"><?php echo $this->Html->cFloat($ip['Ip']['longitude']);?></td>
	</tr>
<?php
    endforeach;
else:
?>
	<tr>
		<td colspan="11" class="notice"><?php echo __l('No Ips available');?></td>
	</tr>
<?php
endif;
?>
</table>


<?php
if (!empty($ips)) {
  ?>
    <div class="clearfix">
        <div class="admin-select-block grid_left">
            <div>
                <?php echo __l('Select:'); ?>
                <?php echo $this->Html->link(__l('All'), '#', array('class' => 'js-admin-select-all','title' => __l('All'))); ?>
                <?php echo $this->Html->link(__l('None'), '#', array('class' => 'js-admin-select-none','title' => __l('None'))); ?>
            </div>
            <div class="admin-checkbox-button">
                <?php echo $this->Form->input('more_action_id', array('options' => $moreActions,'class' => 'js-admin-index-autosubmit', 'label' => false, 'empty' => __l('-- More actions --'))); ?>
            </div>
        </div>
        <div class="grid_right">
             <?php  echo $this->element('paging_links'); ?>
        </div>
    </div>
    
<?php
}
 echo $this->Form->end();
?>
</div>