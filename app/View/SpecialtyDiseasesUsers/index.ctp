<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="specialtyDiseasesUsers index">
<h2><?php echo __l('Specialty Diseases Users');?></h2>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($specialtyDiseasesUsers)):

$i = 0;
foreach ($specialtyDiseasesUsers as $specialtyDiseasesUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($specialtyDiseasesUser['SpecialtyDiseasesUser']['id']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($specialtyDiseasesUser['User']['username']), array('controller'=> 'users', 'action' => 'view', $specialtyDiseasesUser['User']['username']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($specialtyDiseasesUser['SpecialtyDisease']['name']), array('controller'=> 'specialty_diseases', 'action' => 'view', $specialtyDiseasesUser['SpecialtyDisease']['slug']), array('escape' => false));?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $specialtyDiseasesUser['SpecialtyDiseasesUser']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $specialtyDiseasesUser['SpecialtyDiseasesUser']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Specialty Diseases Users available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($specialtyDiseasesUsers)) {
    echo $this->element('paging_links');
}
?>
</div>
