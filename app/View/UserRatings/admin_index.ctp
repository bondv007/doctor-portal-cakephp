<?php /* SVN: $Id: index_list.ctp 99 2008-07-09 09:33:42Z rajesh_04ag02 $ */ ?>
<div class="userRatings index">
<h2><?php echo __l('User Ratings');?></h2>
<?php echo $this->element('paging_counter');?>
<ol class="list" start="<?php echo $this->Paginator->counter(array(
    'format' => '%start%'
));?>">
<?php
if (!empty($userRatings)):

$i = 0;
foreach ($userRatings as $userRating):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<li<?php echo $class;?>>
		<p><?php echo $this->Html->cInt($userRating['UserRating']['id']);?></p>
		<p><?php echo $this->Html->cDateTime($userRating['UserRating']['created']);?></p>
		<p><?php echo $this->Html->cDateTime($userRating['UserRating']['modified']);?></p>
		<p><?php echo $this->Html->link($this->Html->cInt($userRating['UserReview']['id']), array('controller'=> 'user_reviews', 'action' => 'view', $userRating['UserReview']['id']), array('escape' => false));?></p>
		<p><?php echo $this->Html->link($this->Html->cText($userRating['UserRatingCategory']['name']), array('controller'=> 'user_rating_categories', 'action' => 'view', $userRating['UserRatingCategory']['id']), array('escape' => false));?></p>
		<p><?php echo $this->Html->cInt($userRating['UserRating']['rating']);?></p>
		<p><?php echo $this->Html->link($this->Html->cInt($userRating['Ip']['id']), array('controller'=> 'ips', 'action' => 'view', $userRating['Ip']['id']), array('escape' => false));?></p>
		<div class="actions"><?php echo $this->Html->link(__l('Edit'), array('action'=>'edit', $userRating['UserRating']['id']), array('class' => 'edit js-edit', 'title' => __l('Edit')));?><?php echo $this->Html->link(__l('Delete'), array('action'=>'delete', $userRating['UserRating']['id']), array('class' => 'delete js-delete', 'title' => __l('Delete')));?></div>
	</li>
<?php
    endforeach;
else:
?>
	<li>
		<p class="notice"><?php echo __l('No User Ratings available');?></p>
	</li>
<?php
endif;
?>
</ol>

<?php
if (!empty($userRatings)) {
    echo $this->element('paging_links');
}
?>
</div>
