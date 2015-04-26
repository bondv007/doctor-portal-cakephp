<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="insuranceCompanies index">
<h2><?php echo __l('Insurance Companies');?></h2>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($insuranceCompanies)):

$i = 0;
foreach ($insuranceCompanies as $insuranceCompany):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($insuranceCompany['InsuranceCompany']['id']);?></p>
		<p><?php echo $this->Html->cDateTime($insuranceCompany['InsuranceCompany']['created']);?></p>
		<p><?php echo $this->Html->cDateTime($insuranceCompany['InsuranceCompany']['modified']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($insuranceCompany['User']['username']), array('controller'=> 'users', 'action' => 'view', $insuranceCompany['User']['username']), array('escape' => false));?></p>
		<p><?php echo $this->Html->cText($insuranceCompany['InsuranceCompany']['name']);?></p>
		<p><?php echo $this->Html->cText($insuranceCompany['InsuranceCompany']['description']);?></p>
		<p><?php echo $this->Html->cText($insuranceCompany['InsuranceCompany']['slug']);?></p>
		<p><?php echo $this->Html->cInt($insuranceCompany['InsuranceCompany']['user_count']);?></p>
		<p><?php echo $this->Html->cInt($insuranceCompany['InsuranceCompany']['insurance_plan_count']);?></p>
		<p><?php echo $this->Html->cBool($insuranceCompany['InsuranceCompany']['is_active']);?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $insuranceCompany['InsuranceCompany']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $insuranceCompany['InsuranceCompany']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Insurance Companies available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($insuranceCompanies)) {
    echo $this->element('paging_links');
}
?>
</div>
