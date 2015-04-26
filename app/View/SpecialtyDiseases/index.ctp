<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="specialtyDiseases index">
<h2><?php echo __l('Specialty Diseases');?></h2>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($specialtyDiseases)):

$i = 0;
foreach ($specialtyDiseases as $specialtyDisease):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($specialtyDisease['SpecialtyDisease']['id']);?></p>
		<p><?php echo $this->Html->cDateTime($specialtyDisease['SpecialtyDisease']['created']);?></p>
		<p><?php echo $this->Html->cDateTime($specialtyDisease['SpecialtyDisease']['modified']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($specialtyDisease['User']['username']), array('controller'=> 'users', 'action' => 'view', $specialtyDisease['User']['username']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($specialtyDisease['Specialty']['name']), array('controller'=> 'specialties', 'action' => 'view', $specialtyDisease['Specialty']['slug']), array('escape' => false));?></p>
		<p><?php echo $this->Html->cText($specialtyDisease['SpecialtyDisease']['name']);?></p>
		<p><?php echo $this->Html->cText($specialtyDisease['SpecialtyDisease']['slug']);?></p>
		<p><?php echo $this->Html->cInt($specialtyDisease['SpecialtyDisease']['user_count']);?></p>
		<p><?php echo $this->Html->cBool($specialtyDisease['SpecialtyDisease']['is_active']);?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $specialtyDisease['SpecialtyDisease']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $specialtyDisease['SpecialtyDisease']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Specialty Diseases available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($specialtyDiseases)) {
    echo $this->element('paging_links');
}
?>
</div>
