<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="languagesUsers index">
<h2><?php echo __l('Languages Users');?></h2>
<?php echo $this->element('paging_counter');?>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($languagesUsers)):

$i = 0;
foreach ($languagesUsers as $languagesUser):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($languagesUser['LanguagesUser']['id']);?></p>
		<p><?php echo $this->Html->link($this->Html->cText($languagesUser['User']['username']), array('controller'=> 'users', 'action' => 'view', $languagesUser['User']['username']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($languagesUser['Language']['name']), array('controller'=> 'languages', 'action' => 'view', $languagesUser['Language']['id']), array('escape' => false));?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $languagesUser['LanguagesUser']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $languagesUser['LanguagesUser']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No Languages Users available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($languagesUsers)) {
    echo $this->element('paging_links');
}
?>
</div>
