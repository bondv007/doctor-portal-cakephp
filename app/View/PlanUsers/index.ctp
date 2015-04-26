<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="planUsers index">
<h2><?php echo __l('Plan Users');?></h2>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($planUsers)):

$i = 0;
foreach ($planUsers as $planUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($planUser['PlanUser']['id']);?></p>
		<p><?php echo $this->Html->cDateTime($planUser['PlanUser']['created']);?></p>
		<p><?php echo $this->Html->cDateTime($planUser['PlanUser']['modified']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($planUser['User']['username']), array('controller'=> 'users', 'action' => 'view', $planUser['User']['username']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($planUser['Plan']['name']), array('controller'=> 'plans', 'action' => 'view', $planUser['Plan']['slug']), array('escape' => false));?></p>
		<p><?php echo $this->Html->cDate($planUser['PlanUser']['expiry_date']);?></p>
		<p><?php echo $this->Html->cInt($planUser['PlanUser']['duration']);?></p>
		<p><?php echo $this->Html->cInt($planUser['PlanUser']['status']);?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $planUser['PlanUser']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $planUser['PlanUser']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Plan Users available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($planUsers)) {
    echo $this->element('paging_links');
}
?>
</div>
