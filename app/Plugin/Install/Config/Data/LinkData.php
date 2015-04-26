<?php
class LinkData {

	public $table = 'links';

	public $records = array(
		array(
			'id' => '5',
			'parent_id' => '',
			'menu_id' => '4',
			'title' => 'About',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:about',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '3',
			'rght' => '4',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 23:14:21',
			'created' => '2009-08-19 12:23:33'
		),
		array(
			'id' => '6',
			'parent_id' => '',
			'menu_id' => '4',
			'title' => 'Contact',
			'class' => '',
			'description' => '',
			'link' => 'controller:contacts/action:view/contact',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '5',
			'rght' => '6',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 23:14:45',
			'created' => '2009-08-19 12:34:56'
		),
		array(
			'id' => '7',
			'parent_id' => '',
			'menu_id' => '3',
			'title' => 'Home',
			'class' => '',
			'description' => '',
			'link' => '/',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '5',
			'rght' => '6',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 21:17:06',
			'created' => '2009-09-06 21:32:54'
		),
		array(
			'id' => '8',
			'parent_id' => '',
			'menu_id' => '3',
			'title' => 'About',
			'class' => '',
			'description' => '',
			'link' => '/about',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '7',
			'rght' => '10',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-12 03:45:53',
			'created' => '2009-09-06 21:34:57'
		),
		array(
			'id' => '9',
			'parent_id' => '8',
			'menu_id' => '3',
			'title' => 'Child link',
			'class' => '',
			'description' => '',
			'link' => '#',
			'target' => '',
			'rel' => '',
			'status' => '0',
			'lft' => '8',
			'rght' => '9',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 23:13:06',
			'created' => '2009-09-12 03:52:23'
		),
		array(
			'id' => '10',
			'parent_id' => '',
			'menu_id' => '5',
			'title' => 'Site Admin',
			'class' => '',
			'description' => '',
			'link' => '/admin',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '1',
			'rght' => '2',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-12 06:34:09',
			'created' => '2009-09-12 06:34:09'
		),
		array(
			'id' => '11',
			'parent_id' => '',
			'menu_id' => '5',
			'title' => 'Log out',
			'class' => '',
			'description' => '',
			'link' => '/users/logout',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '7',
			'rght' => '8',
			'visibility_roles' => '["1","2"]',
			'params' => '',
			'updated' => '2009-09-12 06:35:22',
			'created' => '2009-09-12 06:34:41'
		),
		array(
			'id' => '12',
			'parent_id' => '',
			'menu_id' => '6',
			'title' => 'Cms',
			'class' => '',
			'description' => '',
			'link' => 'http://www.cms.org',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '3',
			'rght' => '4',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-12 23:31:59',
			'created' => '2009-09-12 23:31:59'
		),
		array(
			'id' => '14',
			'parent_id' => '',
			'menu_id' => '6',
			'title' => 'CakePHP',
			'class' => '',
			'description' => '',
			'link' => 'http://www.cakephp.org',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '1',
			'rght' => '2',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-07 03:25:25',
			'created' => '2009-09-12 23:38:43'
		),
		array(
			'id' => '15',
			'parent_id' => '',
			'menu_id' => '3',
			'title' => 'Contact',
			'class' => '',
			'description' => '',
			'link' => '/controller:contacts/action:view/contact',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '11',
			'rght' => '12',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-16 07:54:13',
			'created' => '2009-09-16 07:53:33'
		),
		array(
			'id' => '16',
			'parent_id' => '',
			'menu_id' => '5',
			'title' => 'Entries (RSS)',
			'class' => '',
			'description' => '',
			'link' => '/nodes/promoted.rss',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '3',
			'rght' => '4',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-27 17:46:22',
			'created' => '2009-10-27 17:46:22'
		),
		array(
			'id' => '17',
			'parent_id' => '',
			'menu_id' => '5',
			'title' => 'Comments (RSS)',
			'class' => '',
			'description' => '',
			'link' => '/comments.rss',
			'target' => '',
			'rel' => '',
			'status' => '1',
			'lft' => '5',
			'rght' => '6',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-27 17:46:54',
			'created' => '2009-10-27 17:46:54'
		),
	);

}
?>
