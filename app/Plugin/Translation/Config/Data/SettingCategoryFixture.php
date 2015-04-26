<?php
/**
 * SettingCategoryFixture
 *
 */
class SettingCategoryFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 20),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 200, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'name' => array('column' => 'name', 'unique' => 0)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '50',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '15',
			'name' => 'Google Translations',
			'description' => '<p>We use this service for quick translation to support new languages in ##TRANSLATIONADD##.</p> <p>Note that Google Translate API is now a <a href="http://code.google.com/apis/language/translate/v2/pricing.html" target="_blank">paid service</a>.</p>'
		),
	);
}
