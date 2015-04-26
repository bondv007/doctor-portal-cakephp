<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="clinicsUsers index">
<h2><?php echo __l('Clinics Users');?></h2>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($clinicsUsers)):

$i = 0;
foreach ($clinicsUsers as $clinicsUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($clinicsUser['ClinicsUser']['id']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($clinicsUser['Clinic']['name']), array('controller'=> 'clinics', 'action' => 'view', $clinicsUser['Clinic']['slug']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($clinicsUser['User']['username']), array('controller'=> 'users', 'action' => 'view', $clinicsUser['User']['username']), array('escape' => false));?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $clinicsUser['ClinicsUser']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $clinicsUser['ClinicsUser']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Clinics Users available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($clinicsUsers)) {
    echo $this->element('paging_links');
}
?>
</div>
