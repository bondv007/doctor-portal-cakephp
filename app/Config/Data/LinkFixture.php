<?php
/**
 * LinkFixture
 *
 */
class LinkFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'menu_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'class' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'link' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'target' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'rel' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'visibility_roles' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'params' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '5',
			'parent_id' => NULL,
			'menu_id' => '4',
			'title' => 'FAQ',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:faq',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '3',
			'rght' => '4',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-03-21 05:37:14',
			'created' => '2009-08-19 12:23:33'
		),
		array(
			'id' => '6',
			'parent_id' => NULL,
			'menu_id' => '7',
			'title' => 'Contact Us',
			'class' => '',
			'description' => '',
			'link' => 'controller:contacts/action:add',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '5',
			'rght' => '6',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-03-21 10:51:03',
			'created' => '2009-08-19 12:34:56'
		),
		array(
			'id' => '7',
			'parent_id' => NULL,
			'menu_id' => '3',
			'title' => 'Home',
			'class' => '',
			'description' => '',
			'link' => '/',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '5',
			'rght' => '6',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 21:17:06',
			'created' => '2009-09-06 21:32:54'
		),
		array(
			'id' => '8',
			'parent_id' => NULL,
			'menu_id' => '3',
			'title' => 'About',
			'class' => '',
			'description' => '',
			'link' => '/about',
			'target' => '',
			'rel' => '',
			'status' => 1,
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
			'status' => 0,
			'lft' => '8',
			'rght' => '9',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-06 23:13:06',
			'created' => '2009-09-12 03:52:23'
		),
		array(
			'id' => '10',
			'parent_id' => NULL,
			'menu_id' => '5',
			'title' => 'Site Admin',
			'class' => '',
			'description' => '',
			'link' => '/admin',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '1',
			'rght' => '2',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-12 06:34:09',
			'created' => '2009-09-12 06:34:09'
		),
		array(
			'id' => '11',
			'parent_id' => NULL,
			'menu_id' => '5',
			'title' => 'Log out',
			'class' => '',
			'description' => '',
			'link' => '/users/logout',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '7',
			'rght' => '8',
			'visibility_roles' => '["1","2"]',
			'params' => '',
			'updated' => '2009-09-12 06:35:22',
			'created' => '2009-09-12 06:34:41'
		),
		array(
			'id' => '12',
			'parent_id' => NULL,
			'menu_id' => '6',
			'title' => 'Croogo',
			'class' => '',
			'description' => '',
			'link' => 'http://www.croogo.org',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '3',
			'rght' => '4',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-12 23:31:59',
			'created' => '2009-09-12 23:31:59'
		),
		array(
			'id' => '14',
			'parent_id' => NULL,
			'menu_id' => '6',
			'title' => 'CakePHP',
			'class' => '',
			'description' => '',
			'link' => 'http://www.cakephp.org',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '1',
			'rght' => '2',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-07 03:25:25',
			'created' => '2009-09-12 23:38:43'
		),
		array(
			'id' => '15',
			'parent_id' => NULL,
			'menu_id' => '3',
			'title' => 'Contact',
			'class' => '',
			'description' => '',
			'link' => '/controller:contacts/action:view/contact',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '11',
			'rght' => '12',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-09-16 07:54:13',
			'created' => '2009-09-16 07:53:33'
		),
		array(
			'id' => '16',
			'parent_id' => NULL,
			'menu_id' => '5',
			'title' => 'Entries (RSS)',
			'class' => '',
			'description' => '',
			'link' => '/nodes/promoted.rss',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '3',
			'rght' => '4',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-27 17:46:22',
			'created' => '2009-10-27 17:46:22'
		),
		array(
			'id' => '17',
			'parent_id' => NULL,
			'menu_id' => '5',
			'title' => 'Comments (RSS)',
			'class' => '',
			'description' => '',
			'link' => '/comments.rss',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '5',
			'rght' => '6',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2009-10-27 17:46:54',
			'created' => '2009-10-27 17:46:54'
		),
		array(
			'id' => '18',
			'parent_id' => NULL,
			'menu_id' => '7',
			'title' => 'About Us',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:about',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '7',
			'rght' => '8',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-03-21 11:03:11',
			'created' => '2012-03-21 11:03:11'
		),
		array(
			'id' => '19',
			'parent_id' => NULL,
			'menu_id' => '4',
			'title' => 'How To Buy me?',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:how-to-buy-me',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '9',
			'rght' => '10',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-03-21 11:04:11',
			'created' => '2012-03-21 11:04:11'
		),
		array(
			'id' => '20',
			'parent_id' => NULL,
			'menu_id' => '4',
			'title' => 'Whats In Me?',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:whats-in-me',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '11',
			'rght' => '12',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-04-17 09:48:13',
			'created' => '2012-03-21 11:04:58'
		),
		array(
			'id' => '21',
			'parent_id' => NULL,
			'menu_id' => '7',
			'title' => 'Terms and Conditions',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:terms',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '13',
			'rght' => '14',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-04-17 09:49:11',
			'created' => '2012-03-21 11:05:29'
		),
		array(
			'id' => '22',
			'parent_id' => NULL,
			'menu_id' => '4',
			'title' => 'How Do I Work?',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:how-do-i-work',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '15',
			'rght' => '16',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-04-17 09:48:25',
			'created' => '2012-03-21 11:06:42'
		),
		array(
			'id' => '23',
			'parent_id' => NULL,
			'menu_id' => '7',
			'title' => 'Privacy Policy',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:privacy',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '17',
			'rght' => '18',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-03-21 11:07:11',
			'created' => '2012-03-21 11:07:11'
		),
		array(
			'id' => '24',
			'parent_id' => NULL,
			'menu_id' => '4',
			'title' => 'Product Safety Information',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:safety',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '19',
			'rght' => '20',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-03-21 11:07:48',
			'created' => '2012-03-21 11:07:48'
		),
		array(
			'id' => '25',
			'parent_id' => NULL,
			'menu_id' => '7',
			'title' => 'Disclaimer',
			'class' => '',
			'description' => '',
			'link' => 'controller:nodes/action:view/type:page/slug:disclaimer',
			'target' => '',
			'rel' => '',
			'status' => 1,
			'lft' => '21',
			'rght' => '22',
			'visibility_roles' => '',
			'params' => '',
			'updated' => '2012-03-21 11:08:23',
			'created' => '2012-03-21 11:08:23'
		),
	);
}
