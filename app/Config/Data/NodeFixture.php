<?php
/**
 * NodeFixture
 *
 */
class NodeFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 20),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'body' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'excerpt' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'status' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'mime_type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'comment_status' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 1),
		'comment_count' => array('type' => 'integer', 'null' => true, 'default' => '0'),
		'promote' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'path' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'terms' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'sticky' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'lft' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'rght' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'visibility_roles' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'type' => array('type' => 'string', 'null' => false, 'default' => 'node', 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'id' => '1',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Hello World',
			'slug' => 'hello-world',
			'body' => '<p>Welcome to Croogo. This is your first post. You can edit or delete it from the admin panel.</p>',
			'excerpt' => '',
			'status' => 1,
			'mime_type' => '',
			'comment_status' => '2',
			'comment_count' => '1',
			'promote' => 1,
			'path' => '/blog/hello-world',
			'terms' => '{"1":"uncategorized"}',
			'sticky' => 0,
			'lft' => '1',
			'rght' => '2',
			'visibility_roles' => '',
			'type' => 'blog',
			'updated' => '2009-12-25 11:00:00',
			'created' => '2009-12-25 11:00:00'
		),
		array(
			'id' => '2',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'About us',
			'slug' => 'about',
			'body' => '<p>This is an example of a Croogo page, you could edit this to put information about yourself or your site.</p>',
			'excerpt' => '',
			'status' => 1,
			'mime_type' => '',
			'comment_status' => '0',
			'comment_count' => '0',
			'promote' => 0,
			'path' => '/node/type:page/slug:about',
			'terms' => '',
			'sticky' => 0,
			'lft' => '1',
			'rght' => '2',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 10:32:34',
			'created' => '2009-12-25 22:00:00'
		),
		array(
			'id' => '3',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'FAQ',
			'slug' => 'faq',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 0,
			'path' => '/node/type:page/slug:faq',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '3',
			'rght' => '4',
			'visibility_roles' => '["2"]',
			'type' => 'page',
			'updated' => '2012-03-21 05:40:10',
			'created' => '2012-03-21 05:21:00'
		),
		array(
			'id' => '4',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'How to buy me?',
			'slug' => 'how-to-buy-me',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:how-to-but-me',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '5',
			'rght' => '6',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 10:35:15',
			'created' => '2012-03-21 10:34:00'
		),
		array(
			'id' => '5',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Terms and conditions',
			'slug' => 'terms',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:terms',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '7',
			'rght' => '8',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 10:46:17',
			'created' => '2012-03-21 10:45:00'
		),
		array(
			'id' => '6',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'How Do I Work',
			'slug' => 'how-do-i-work',
			'body' => 'coming soon
',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:how-do-i-work',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '9',
			'rght' => '10',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 10:47:28',
			'created' => '2012-03-21 10:46:00'
		),
		array(
			'id' => '7',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Privacy and Policy',
			'slug' => 'privacy',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:privacy',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '11',
			'rght' => '12',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 10:48:29',
			'created' => '2012-03-21 10:47:00'
		),
		array(
			'id' => '8',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Product Safety Information',
			'slug' => 'safety',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:safety',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '13',
			'rght' => '14',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 10:49:15',
			'created' => '2012-03-21 10:48:00'
		),
		array(
			'id' => '9',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Disclaimer',
			'slug' => 'disclaimer',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:disclaimer',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '15',
			'rght' => '16',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 10:49:46',
			'created' => '2012-03-21 10:49:00'
		),
		array(
			'id' => '10',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Whats in me?',
			'slug' => 'whats-in-me',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:whats-in-me',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '17',
			'rght' => '18',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 11:01:43',
			'created' => '2012-03-21 11:00:00'
		),
		array(
			'id' => '11',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'How it Work',
			'slug' => 'how-it-works',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:how-it-work',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '19',
			'rght' => '20',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 11:01:43',
			'created' => '2012-03-21 11:00:00'
		),
		array(
			'id' => '12',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Step 1',
			'slug' => 'step1',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:step1',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '19',
			'rght' => '20',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 11:01:43',
			'created' => '2012-03-21 11:00:00'
		),
		array(
			'id' => '13',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Step 2',
			'slug' => 'step2',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:step2',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '19',
			'rght' => '20',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 11:01:43',
			'created' => '2012-03-21 11:00:00'
		),
		array(
			'id' => '14',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Step 3',
			'slug' => 'step3',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:step3',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '19',
			'rght' => '20',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 11:01:43',
			'created' => '2012-03-21 11:00:00'
		),
		array(
			'id' => '15',
			'parent_id' => NULL,
			'user_id' => '1',
			'title' => 'Step 4',
			'slug' => 'step4',
			'body' => 'coming soon',
			'excerpt' => 'coming soon',
			'status' => 1,
			'mime_type' => NULL,
			'comment_status' => '1',
			'comment_count' => '0',
			'promote' => 1,
			'path' => '/node/type:page/slug:step4',
			'terms' => NULL,
			'sticky' => 0,
			'lft' => '19',
			'rght' => '20',
			'visibility_roles' => '',
			'type' => 'page',
			'updated' => '2012-03-21 11:01:43',
			'created' => '2012-03-21 11:00:00'
		),
	);
}
