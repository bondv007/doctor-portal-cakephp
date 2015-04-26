<?php
/* Block Fixture generated on: 2010-05-20 22:05:30 : 1274393790 */
class BlockFixture extends CakeTestFixture {
	var $name = 'Block';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'region_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'key' => 'unique'),
		'body' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'show_title' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'class' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'element' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'visibility_roles' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'visibility_paths' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'visibility_php' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'params' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'alias' => array('column' => 'alias', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 3,
			'region_id' => 4,
			'title' => 'About',
			'alias' => 'about',
			'body' => 'This is the content of your block. Can be modified in admin panel.',
			'show_title' => 1,
			'class' => '',
			'status' => 1,
			'weight' => 2,
			'element' => '',
			'visibility_roles' => '',
			'visibility_paths' => '',
			'visibility_php' => '',
			'params' => '',
			'updated' => '2009-12-20 03:07:39',
			'created' => '2009-07-26 17:13:14'
		),
		array(
			'id' => 8,
			'region_id' => 4,
			'title' => 'Search',
			'alias' => 'search',
			'body' => '',
			'show_title' => 0,
			'class' => '',
			'status' => 1,
			'weight' => 1,
			'element' => 'search',
			'visibility_roles' => '',
			'visibility_paths' => '',
			'visibility_php' => '',
			'params' => '',
			'updated' => '2009-12-20 03:07:39',
			'created' => '2009-12-20 03:07:27'
		),
		array(
			'id' => 5,
			'region_id' => 4,
			'title' => 'Meta',
			'alias' => 'meta',
			'body' => '[menu:meta]',
			'show_title' => 1,
			'class' => '',
			'status' => 1,
			'weight' => 6,
			'element' => '',
			'visibility_roles' => '',
			'visibility_paths' => '',
			'visibility_php' => '',
			'params' => '',
			'updated' => '2009-12-22 05:17:39',
			'created' => '2009-09-12 06:36:22'
		),
		array(
			'id' => 6,
			'region_id' => 4,
			'title' => 'Blogroll',
			'alias' => 'blogroll',
			'body' => '[menu:blogroll]',
			'show_title' => 1,
			'class' => '',
			'status' => 1,
			'weight' => 4,
			'element' => '',
			'visibility_roles' => '',
			'visibility_paths' => '',
			'visibility_php' => '',
			'params' => '',
			'updated' => '2009-12-20 03:07:33',
			'created' => '2009-09-12 23:33:27'
		),
		array(
			'id' => 7,
			'region_id' => 4,
			'title' => 'Categories',
			'alias' => 'categories',
			'body' => '[vocabulary:categories type=\"blog\"]',
			'show_title' => 1,
			'class' => '',
			'status' => 1,
			'weight' => 3,
			'element' => '',
			'visibility_roles' => '',
			'visibility_paths' => '',
			'visibility_php' => '',
			'params' => '',
			'updated' => '2009-12-20 03:07:36',
			'created' => '2009-10-03 16:52:50'
		),
		array(
			'id' => 9,
			'region_id' => 4,
			'title' => 'Recent Posts',
			'alias' => 'recent_posts',
			'body' => '[node:recent_posts conditions=\"Node.type:blog\" order=\"Node.id DESC\" limit=\"5\"]',
			'show_title' => 1,
			'class' => '',
			'status' => 1,
			'weight' => 5,
			'element' => '',
			'visibility_roles' => '',
			'visibility_paths' => '',
			'visibility_php' => '',
			'params' => '',
			'updated' => '2010-04-08 21:09:31',
			'created' => '2009-12-22 05:17:32'
		),
	);
}
