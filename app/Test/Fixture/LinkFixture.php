<?php
/* Link Fixture generated on: 2010-05-20 22:05:39 : 1274393799 */
class LinkFixture extends CakeTestFixture {
	var $name = 'Link';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'menu_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'class' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'description' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'link' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'target' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'rel' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'visibility_roles' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'params' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 5,
			'parent_id' => NULL,
			'menu_id' => 4,
			'title' => 'About',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:about',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 3,
			'rght' => 4,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 23:14:21',
			'created' => '2009-08-19 12:23:33'
		),
		array(
			'id' => 6,
			'parent_id' => NULL,
			'menu_id' => 4,
			'title' => 'Contact',
			'description' => '',
			'link' => 'controller:contacts/action:view/contact',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 5,
			'rght' => 6,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 23:14:45',
			'created' => '2009-08-19 12:34:56'
		),
		array(
			'id' => 7,
			'parent_id' => NULL,
			'menu_id' => 3,
			'title' => 'Home',
			'description' => '',
			'link' => '/',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 5,
			'rght' => 6,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 21:17:06',
			'created' => '2009-09-06 21:32:54'
		),
		array(
			'id' => 8,
			'parent_id' => NULL,
			'menu_id' => 3,
			'title' => 'About',
			'description' => '',
			'link' => '/about',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 7,
			'rght' => 10,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-12 03:45:53',
			'created' => '2009-09-06 21:34:57'
		),
		array(
			'id' => 9,
			'parent_id' => 8,
			'menu_id' => 3,
			'title' => 'Child link',
			'description' => '',
			'link' => '#',
			'target' => '',
			'rel' => '',
			'status' => 0,
			'lft' => 8,
			'rght' => 9,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 23:13:06',
			'created' => '2009-09-12 03:52:23'
		),
		array(
			'id' => 10,
			'parent_id' => NULL,
			'menu_id' => 5,
			'title' => 'Site Admin',
			'description' => '',
			'link' => '/admin',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 1,
			'rght' => 2,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-12 06:34:09',
			'created' => '2009-09-12 06:34:09'
		),
		array(
			'id' => 11,
			'parent_id' => NULL,
			'menu_id' => 5,
			'title' => 'Log out',
			'description' => '',
			'link' => '/users/logout',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 7,
			'rght' => 8,
			'visibility_roles' => '[\"1\",\"2\"]',
			'params' => '',
			'updated' => '2009-09-12 06:35:22',
			'created' => '2009-09-12 06:34:41'
		),
		array(
			'id' => 12,
			'parent_id' => NULL,
			'menu_id' => 6,
			'title' => 'Cms',
			'description' => '',
			'link' => 'http://www.cms.org',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 3,
			'rght' => 4,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-12 23:31:59',
			'created' => '2009-09-12 23:31:59'
		),
		array(
			'id' => 14,
			'parent_id' => NULL,
			'menu_id' => 6,
			'title' => 'CakePHP',
			'description' => '',
			'link' => 'http://www.cakephp.org',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 1,
			'rght' => 2,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-07 03:25:25',
			'created' => '2009-09-12 23:38:43'
		),
		array(
			'id' => 15,
			'parent_id' => NULL,
			'menu_id' => 3,
			'title' => 'Contact',
			'description' => '',
			'link' => '/controller:contacts/action:view/contact',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 11,
			'rght' => 12,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-16 07:54:13',
			'created' => '2009-09-16 07:53:33'
		),
		array(
			'id' => 16,
			'parent_id' => NULL,
			'menu_id' => 5,
			'title' => 'Entries (RSS)',
			'description' => '',
			'link' => '/nodes/promoted.rss',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 3,
			'rght' => 4,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-27 17:46:22',
			'created' => '2009-10-27 17:46:22'
		),
		array(
			'id' => 17,
			'parent_id' => NULL,
			'menu_id' => 5,
			'title' => 'Comments (RSS)',
			'description' => '',
			'link' => '/comments.rss',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => 5,
			'rght' => 6,
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-27 17:46:54',
			'created' => '2009-10-27 17:46:54'
		),
	);
}
