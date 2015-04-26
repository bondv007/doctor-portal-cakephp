<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="specialtiesUsers index">
<h2><?php echo __l('Specialties Users');?></h2>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($specialtiesUsers)):

$i = 0;
foreach ($specialtiesUsers as $specialtiesUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($specialtiesUser['SpecialtiesUser']['id']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($specialtiesUser['User']['username']), array('controller'=> 'users', 'action' => 'view', $specialtiesUser['User']['username']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($specialtiesUser['Specialty']['name']), array('controller'=> 'specialties', 'action' => 'view', $specialtiesUser['Specialty']['slug']), array('escape' => false));?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $specialtiesUser['SpecialtiesUser']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $specialtiesUser['SpecialtiesUser']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Specialties Users available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($specialtiesUsers)) {
    echo $this->element('paging_links');
}
?>
</div>
