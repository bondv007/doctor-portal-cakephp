<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="insurancePlansUsers index">
<h2><?php echo __l('Insurance Plans Users');?></h2>
<?php echo $this->element('paging_counter');?>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($insurancePlansUsers)):

$i = 0;
foreach ($insurancePlansUsers as $insurancePlansUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($insurancePlansUser['InsurancePlansUser']['id']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($insurancePlansUser['InsurancePlan']['name']), array('controller'=> 'insurance_plans', 'action' => 'view', $insurancePlansUser['InsurancePlan']['slug']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($insurancePlansUser['User']['username']), array('controller'=> 'users', 'action' => 'view', $insurancePlansUser['User']['username']), array('escape' => false));?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $insurancePlansUser['InsurancePlansUser']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $insurancePlansUser['InsurancePlansUser']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Insurance Plans Users available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($insurancePlansUsers)) {
    echo $this->element('paging_links');
}
?>
</div>
