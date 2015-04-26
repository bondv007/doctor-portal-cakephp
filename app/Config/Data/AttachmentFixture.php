<?php
/**
 * AttachmentFixture
 *
 */
class AttachmentFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'class' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'foreign_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index'),
		'message_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'filename' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'dir' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'mimetype' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'filesize' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'height' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'width' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'thumb' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'foreign_id' => array('column' => 'foreign_id', 'unique' => 0), 'class' => array('column' => 'class', 'unique' => 0)),
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
			'created' => '2012-03-09 07:07:21',
			'modified' => '2012-03-09 07:07:21',
			'class' => 'UserAvatar',
			'foreign_id' => '0',
			'message_id' => NULL,
			'filename' => 'default_avatar.png',
			'dir' => 'UserAvatar/0',
			'mimetype' => 'image/png',
			'filesize' => '4428',
			'height' => '110',
			'width' => '110',
			'thumb' => 0,
			'description' => NULL
		),
	);
}
