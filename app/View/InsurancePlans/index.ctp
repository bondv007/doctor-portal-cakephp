<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="insurancePlans index">
<h2><?php echo __l('Insurance Plans');?></h2>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($insurancePlans)):

$i = 0;
foreach ($insurancePlans as $insurancePlan):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($insurancePlan['InsurancePlan']['id']);?></p>
		<p><?php echo $this->Html->cDateTime($insurancePlan['InsurancePlan']['created']);?></p>
		<p><?php echo $this->Html->cDateTime($insurancePlan['InsurancePlan']['modified']);?></p>
		<p><?php echo $this->Html->cText($insurancePlan['InsurancePlan']['name']);?></p>
		<p><?php echo $this->Html->cText($insurancePlan['InsurancePlan']['slug']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($insurancePlan['InsuranceCompany']['name']), array('controller'=> 'insurance_companies', 'action' => 'view', $insurancePlan['InsuranceCompany']['slug']), array('escape' => false));?></p>
		<p><?php echo $this->Html->cInt($insurancePlan['InsurancePlan']['user_count']);?></p>
		<p><?php echo $this->Html->cBool($insurancePlan['InsurancePlan']['is_active']);?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $insurancePlan['InsurancePlan']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $insurancePlan['InsurancePlan']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Insurance Plans available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($insurancePlans)) {
    echo $this->element('paging_links');
}
?>
</div>
