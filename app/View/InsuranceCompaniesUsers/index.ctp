<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="insuranceCompaniesUsers index">
<h2><?php echo __l('Insurance Companies Users');?></h2>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($insuranceCompaniesUsers)):

$i = 0;
foreach ($insuranceCompaniesUsers as $insuranceCompaniesUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($insuranceCompaniesUser['InsuranceCompaniesUser']['id']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($insuranceCompaniesUser['InsuranceCompany']['name']), array('controller'=> 'insurance_companies', 'action' => 'view', $insuranceCompaniesUser['InsuranceCompany']['slug']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($insuranceCompaniesUser['User']['username']), array('controller'=> 'users', 'action' => 'view', $insuranceCompaniesUser['User']['username']), array('escape' => false));?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $insuranceCompaniesUser['InsuranceCompaniesUser']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $insuranceCompaniesUser['InsuranceCompaniesUser']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Insurance Companies Users available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($insuranceCompaniesUsers)) {
    echo $this->element('paging_links');
}
?>
</div>
