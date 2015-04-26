<?php
/**
 * TranslationFixture
 *
 */
class TranslationFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'language_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'index'),
		'key' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'lang_text' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'is_translated' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'is_google_translate' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'is_verified' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'language_id' => array('column' => 'language_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Dashboard',
			'lang_text' => 'Dashboard',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '2',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Snapshot',
			'lang_text' => 'Snapshot',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '3',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Users',
			'lang_text' => 'Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '4',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Activities',
			'lang_text' => 'Activities',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '5',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'User Logins',
			'lang_text' => 'User Logins',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '6',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'User Views',
			'lang_text' => 'User Views',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '7',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'User Favorites',
			'lang_text' => 'User Favorites',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '8',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages',
			'lang_text' => 'Messages',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '9',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Settings',
			'lang_text' => 'Settings',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '10',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Payments',
			'lang_text' => 'Payments',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '11',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Transactions',
			'lang_text' => 'Transactions',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '12',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Payment Gateways',
			'lang_text' => 'Payment Gateways',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '13',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Masters',
			'lang_text' => 'Masters',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '14',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Regional',
			'lang_text' => 'Regional',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '15',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Banned Ips',
			'lang_text' => 'Banned Ips',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '16',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Cities',
			'lang_text' => 'Cities',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '17',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Countries',
			'lang_text' => 'Countries',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '18',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'States',
			'lang_text' => 'States',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '19',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Email',
			'lang_text' => 'Email',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '20',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Email Templates',
			'lang_text' => 'Email Templates',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '21',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Others',
			'lang_text' => 'Others',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '22',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'IPs',
			'lang_text' => 'IPs',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '23',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Transaction Types',
			'lang_text' => 'Transaction Types',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '24',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'User Flag Categories',
			'lang_text' => 'User Flag Categories',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '25',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Site Builder',
			'lang_text' => 'Site Builder',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '26',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Cms Utilities',
			'lang_text' => 'Cms Utilities',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '27',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Adaptive Transaction Logs',
			'lang_text' => 'Adaptive Transaction Logs',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '28',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Adaptive Transaction Log',
			'lang_text' => 'Adaptive Transaction Log',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '29',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Maintenance Mode',
			'lang_text' => 'Maintenance Mode',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '30',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid request',
			'lang_text' => 'Invalid request',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '31',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Attachments',
			'lang_text' => 'Attachments',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '32',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add Attachment',
			'lang_text' => 'Add Attachment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '33',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Attachment has been saved',
			'lang_text' => 'The Attachment has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '34',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Attachment could not be saved. Please, try again.',
			'lang_text' => 'The Attachment could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '35',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit Attachment',
			'lang_text' => 'Edit Attachment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '36',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid Attachment',
			'lang_text' => 'Invalid Attachment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '37',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid id for Attachment',
			'lang_text' => 'Invalid id for Attachment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '38',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Attachment deleted',
			'lang_text' => 'Attachment deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '39',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Banned IPs',
			'lang_text' => 'Banned IPs',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '40',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add Banned IP',
			'lang_text' => 'Add Banned IP',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '41',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Must be a valid URL',
			'lang_text' => 'Must be a valid URL',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '42',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Banned IP has been added',
			'lang_text' => 'Banned IP has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '43',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Banned IP could not be added. Please, try again',
			'lang_text' => 'Banned IP could not be added. Please, try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '44',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'You cannot add your IP address. Please, try again',
			'lang_text' => 'You cannot add your IP address. Please, try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '45',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'You cannot add your own domain. Please, try again',
			'lang_text' => 'You cannot add your own domain. Please, try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '46',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Banned IP deleted',
			'lang_text' => 'Banned IP deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '47',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Blocks',
			'lang_text' => 'Blocks',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '48',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add Block',
			'lang_text' => 'Add Block',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '49',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Block has been saved',
			'lang_text' => 'The Block has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '50',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Block could not be saved. Please, try again.',
			'lang_text' => 'The Block could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '51',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit Block',
			'lang_text' => 'Edit Block',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '52',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid Block',
			'lang_text' => 'Invalid Block',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '53',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Block deleted',
			'lang_text' => 'Block deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '54',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Moved up successfully',
			'lang_text' => 'Moved up successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '55',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Could not move up',
			'lang_text' => 'Could not move up',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '56',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Moved down successfully',
			'lang_text' => 'Moved down successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '57',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Could not move down',
			'lang_text' => 'Could not move down',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '58',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'No items selected.',
			'lang_text' => 'No items selected.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '59',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Blocks deleted.',
			'lang_text' => 'Blocks deleted.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '60',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Blocks published',
			'lang_text' => 'Blocks published',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '61',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Blocks unpublished',
			'lang_text' => 'Blocks unpublished',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '62',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'An error occurred.',
			'lang_text' => 'An error occurred.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '63',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Last 7 days',
			'lang_text' => 'Last 7 days',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '64',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Last 4 weeks',
			'lang_text' => 'Last 4 weeks',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '65',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Last 3 months',
			'lang_text' => 'Last 3 months',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '66',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Last 3 years',
			'lang_text' => 'Last 3 years',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '67',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Site Earned Amount',
			'lang_text' => 'Site Earned Amount',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '68',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Deposited',
			'lang_text' => 'Deposited',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '69',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Withdrawn Amount',
			'lang_text' => 'Withdrawn Amount',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '70',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Pending Withdraw Request',
			'lang_text' => 'Pending Withdraw Request',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '71',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'All',
			'lang_text' => 'All',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '72',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Contests',
			'lang_text' => 'Contests',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '73',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Normal',
			'lang_text' => 'Normal',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '74',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Twitter',
			'lang_text' => 'Twitter',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '75',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Facebook',
			'lang_text' => 'Facebook',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '76',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'OpenID',
			'lang_text' => 'OpenID',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '77',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Gmail',
			'lang_text' => 'Gmail',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '78',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Yahoo',
			'lang_text' => 'Yahoo',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '79',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Affiliate',
			'lang_text' => 'Affiliate',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '80',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Not Mentioned',
			'lang_text' => 'Not Mentioned',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '81',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => '18 - 34 Yrs',
			'lang_text' => '18 - 34 Yrs',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '82',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => '35 - 44 Yrs',
			'lang_text' => '35 - 44 Yrs',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '83',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => '45 - 54 Yrs',
			'lang_text' => '45 - 54 Yrs',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '84',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => '55+ Yrs',
			'lang_text' => '55+ Yrs',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '85',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' - Approved',
			'lang_text' => ' - Approved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '86',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' - Unapproved',
			'lang_text' => ' - Unapproved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '87',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' - Search - %s',
			'lang_text' => ' - Search - %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '88',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit City',
			'lang_text' => 'Edit City',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '89',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'City has been updated',
			'lang_text' => 'City has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '90',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'City could not be updated. Please, try again.',
			'lang_text' => 'City could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '91',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add City',
			'lang_text' => 'Add City',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '92',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' City has been added',
			'lang_text' => ' City has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '93',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' City could not be added. Please, try again.',
			'lang_text' => ' City could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '94',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'City deleted',
			'lang_text' => 'City deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '95',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Comments',
			'lang_text' => 'Comments',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '96',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Comments: Published',
			'lang_text' => 'Comments: Published',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '97',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Comments: Approval',
			'lang_text' => 'Comments: Approval',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '98',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit Comment',
			'lang_text' => 'Edit Comment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '99',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid Comment',
			'lang_text' => 'Invalid Comment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '100',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Comment has been saved',
			'lang_text' => 'The Comment has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '101',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Comment could not be saved. Please, try again.',
			'lang_text' => 'The Comment could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '102',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Comment deleted',
			'lang_text' => 'Comment deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '103',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Comments deleted.',
			'lang_text' => 'Comments deleted.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '104',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Comments published',
			'lang_text' => 'Comments published',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '105',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Comments unpublished',
			'lang_text' => 'Comments unpublished',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '106',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid Node',
			'lang_text' => 'Invalid Node',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '107',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Maximum level reached. You cannot reply to that comment.',
			'lang_text' => 'Maximum level reached. You cannot reply to that comment.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '108',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Your comment has been added successfully.',
			'lang_text' => 'Your comment has been added successfully.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '109',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Your comment will appear after moderation.',
			'lang_text' => 'Your comment will appear after moderation.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '110',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'New comment posted under',
			'lang_text' => 'New comment posted under',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '111',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Sorry, the comment appears to be spam.',
			'lang_text' => 'Sorry, the comment appears to be spam.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '112',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid captcha entry',
			'lang_text' => 'Invalid captcha entry',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '113',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Thank you, we received your message and will get back to you as soon as possible.',
			'lang_text' => 'Thank you, we received your message and will get back to you as soon as possible.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '114',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Contact Us',
			'lang_text' => 'Contact Us',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '115',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add Country',
			'lang_text' => 'Add Country',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '116',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Country has been added',
			'lang_text' => 'Country has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '117',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Country could not be updated. Please, try again',
			'lang_text' => 'Country could not be updated. Please, try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '118',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit Country',
			'lang_text' => 'Edit Country',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '119',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Country has been updated',
			'lang_text' => 'Country has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '120',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Country could not be updated. Please, try again.',
			'lang_text' => 'Country could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '121',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Country deleted',
			'lang_text' => 'Country deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '122',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Contest status updated successfully',
			'lang_text' => 'Contest status updated successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '123',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit Email Template',
			'lang_text' => 'Edit Email Template',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '124',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Email Template has been updated',
			'lang_text' => 'Email Template has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '125',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Email Template could not be updated. Please, try again.',
			'lang_text' => 'Email Template could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '126',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'File Manager',
			'lang_text' => 'File Manager',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '127',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit file: %s',
			'lang_text' => 'Edit file: %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '128',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'File saved successfully',
			'lang_text' => 'File saved successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '129',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Upload',
			'lang_text' => 'Upload',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '130',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'File uploaded successfully.',
			'lang_text' => 'File uploaded successfully.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '131',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'File deleted',
			'lang_text' => 'File deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '132',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'An error occured',
			'lang_text' => 'An error occured',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '133',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Directory deleted',
			'lang_text' => 'Directory deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '134',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'New Directory',
			'lang_text' => 'New Directory',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '135',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Directory created successfully.',
			'lang_text' => 'Directory created successfully.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '136',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'New File',
			'lang_text' => 'New File',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '137',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'File created successfully.',
			'lang_text' => 'File created successfully.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '138',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'IP deleted',
			'lang_text' => 'IP deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '139',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add Label',
			'lang_text' => 'Add Label',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '140',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' Label has been added',
			'lang_text' => ' Label has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '141',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' Label could not be added. Please, try again',
			'lang_text' => ' Label could not be added. Please, try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '142',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Labels Users',
			'lang_text' => 'Labels Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '143',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add Labels User',
			'lang_text' => 'Add Labels User',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '144',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => '\\"%s\\" Labels User has been added',
			'lang_text' => '\\"%s\\" Labels User has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '145',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => '\\"%s\\" Labels User could not be added. Please, try again.',
			'lang_text' => '\\"%s\\" Labels User could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '146',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit Labels User',
			'lang_text' => 'Edit Labels User',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '147',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' Labels User has been updated',
			'lang_text' => ' Labels User has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '148',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' Labels User could not be updated. Please, try again.',
			'lang_text' => ' Labels User could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '149',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' Labels already exist.',
			'lang_text' => ' Labels already exist.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '150',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Labels User deleted',
			'lang_text' => 'Labels User deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '151',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Languages',
			'lang_text' => 'Languages',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '152',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' - Active ',
			'lang_text' => ' - Active ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '153',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => ' - Inactive ',
			'lang_text' => ' - Inactive ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '154',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add Language',
			'lang_text' => 'Add Language',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '155',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Language has been added',
			'lang_text' => 'Language has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '156',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Language could not be added. Please, try again.',
			'lang_text' => 'Language could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '157',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit Language',
			'lang_text' => 'Edit Language',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '158',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Language  has been updated',
			'lang_text' => 'Language  has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '159',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Language  could not be updated. Please, try again.',
			'lang_text' => 'Language  could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '160',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Links: %s',
			'lang_text' => 'Links: %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '161',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add Link',
			'lang_text' => 'Add Link',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '162',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Link has been saved',
			'lang_text' => 'The Link has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '163',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Link could not be saved. Please, try again.',
			'lang_text' => 'The Link could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '164',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit link',
			'lang_text' => 'Edit link',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '165',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit Link',
			'lang_text' => 'Edit Link',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '166',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid Link',
			'lang_text' => 'Invalid Link',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '167',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid id for Link',
			'lang_text' => 'Invalid id for Link',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '168',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Link deleted',
			'lang_text' => 'Link deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '169',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Links deleted.',
			'lang_text' => 'Links deleted.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '170',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Links published',
			'lang_text' => 'Links published',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '171',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Links unpublished',
			'lang_text' => 'Links unpublished',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '172',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Menus',
			'lang_text' => 'Menus',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '173',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add Menu',
			'lang_text' => 'Add Menu',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '174',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Menu has been saved',
			'lang_text' => 'The Menu has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '175',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'The Menu could not be saved. Please, try again.',
			'lang_text' => 'The Menu could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '176',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Edit Menu',
			'lang_text' => 'Edit Menu',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '177',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Invalid Menu',
			'lang_text' => 'Invalid Menu',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '178',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Menu deleted',
			'lang_text' => 'Menu deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '179',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages - Inbox',
			'lang_text' => 'Messages - Inbox',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '180',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages - Sent Mail',
			'lang_text' => 'Messages - Sent Mail',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '181',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages - Drafts',
			'lang_text' => 'Messages - Drafts',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '182',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages - Spam',
			'lang_text' => 'Messages - Spam',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '183',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages - Trash',
			'lang_text' => 'Messages - Trash',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '184',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages - All',
			'lang_text' => 'Messages - All',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '185',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages - %s',
			'lang_text' => 'Messages - %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '186',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Message Board',
			'lang_text' => 'Message Board',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '187',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Message Board - ',
			'lang_text' => 'Message Board - ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '188',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages - Starred',
			'lang_text' => 'Messages - Starred',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '189',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Message',
			'lang_text' => 'Message',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '190',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'All mails',
			'lang_text' => 'All mails',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '191',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Message deleted',
			'lang_text' => 'Message deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '192',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Messages - Compose',
			'lang_text' => 'Messages - Compose',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '193',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Compose',
			'lang_text' => 'Compose',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '194',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Message send is temporarily stopped. Please try again later.',
			'lang_text' => 'Message send is temporarily stopped. Please try again later.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '195',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Message has been saved successfully',
			'lang_text' => 'Message has been saved successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '196',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Problem in saving message',
			'lang_text' => 'Problem in saving message',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '197',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Message has been sent successfully',
			'lang_text' => 'Message has been sent successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '198',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Message saved successfully',
			'lang_text' => 'Message saved successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '199',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Problem in sending message. You can send message only to your friends network',
			'lang_text' => 'Problem in sending message. You can send message only to your friends network',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '200',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Please specify coreect recipient',
			'lang_text' => 'Please specify coreect recipient',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '201',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Please specify atleast one recipient',
			'lang_text' => 'Please specify atleast one recipient',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '202',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Problem in sending message.',
			'lang_text' => 'Problem in sending message.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '203',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Re:',
			'lang_text' => 'Re:',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '204',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Fwd:',
			'lang_text' => 'Fwd:',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '205',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Public',
			'lang_text' => 'Public',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '206',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Post to all',
			'lang_text' => 'Post to all',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '207',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Private to %s',
			'lang_text' => 'Private to %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '208',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Selecte a',
			'lang_text' => 'Selecte a',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '209',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Search Results',
			'lang_text' => 'Search Results',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '210',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => '---- More actions ----',
			'lang_text' => '---- More actions ----',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '211',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Mark as read',
			'lang_text' => 'Mark as read',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '212',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Mark as unread',
			'lang_text' => 'Mark as unread',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '213',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Add star',
			'lang_text' => 'Add star',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '214',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => 'Remove star',
			'lang_text' => 'Remove star',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '215',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => '----Apply label----',
			'lang_text' => '----Apply label----',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '216',
			'created' => '2012-04-17 02:29:47',
			'modified' => '2012-04-17 02:29:47',
			'language_id' => '42',
			'key' => '----Remove label----',
			'lang_text' => '----Remove label----',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '217',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Message Settings has been updated',
			'lang_text' => 'Message Settings has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '218',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Message Settings could not be updated',
			'lang_text' => 'Message Settings could not be updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '219',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Suspend ',
			'lang_text' => ' - Suspend ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '220',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Flagged ',
			'lang_text' => ' - Flagged ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '221',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Added today',
			'lang_text' => ' - Added today',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '222',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Added in this week',
			'lang_text' => ' - Added in this week',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '223',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Added in this month',
			'lang_text' => ' - Added in this month',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '224',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Message has been flagged',
			'lang_text' => 'Message has been flagged',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '225',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Message has been Unflagged',
			'lang_text' => 'Message has been Unflagged',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '226',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Message has been suspend',
			'lang_text' => 'Message has been suspend',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '227',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Message has been unsuspend',
			'lang_text' => 'Message has been unsuspend',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '228',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked messages has been deleted',
			'lang_text' => 'Checked messages has been deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '229',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked messages has been Suspended',
			'lang_text' => 'Checked messages has been Suspended',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '230',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked messages has been Unsuspended',
			'lang_text' => 'Checked messages has been Unsuspended',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '231',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked messages has been Flagged',
			'lang_text' => 'Checked messages has been Flagged',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '232',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked messages has been Unflagged',
			'lang_text' => 'Checked messages has been Unflagged',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '233',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Activities',
			'lang_text' => 'Contest Activities',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '234',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Content',
			'lang_text' => 'Content',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '235',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Create content',
			'lang_text' => 'Create content',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '236',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Content type does not exist.',
			'lang_text' => 'Content type does not exist.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '237',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Create content: %s',
			'lang_text' => 'Create content: %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '238',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '%s has been saved',
			'lang_text' => '%s has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '239',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '%s could not be saved. Please, try again.',
			'lang_text' => '%s could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '240',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid content',
			'lang_text' => 'Invalid content',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '241',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Node',
			'lang_text' => 'Edit Node',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '242',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit content: %s',
			'lang_text' => 'Edit content: %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '243',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Paths updated.',
			'lang_text' => 'Paths updated.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '244',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Node deleted',
			'lang_text' => 'Node deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '245',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Nodes deleted.',
			'lang_text' => 'Nodes deleted.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '246',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Nodes published',
			'lang_text' => 'Nodes published',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '247',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Nodes unpublished',
			'lang_text' => 'Nodes unpublished',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '248',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Nodes promoted',
			'lang_text' => 'Nodes promoted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '249',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Nodes unpromoted',
			'lang_text' => 'Nodes unpromoted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '250',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid content type.',
			'lang_text' => 'Invalid content type.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '251',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Term.',
			'lang_text' => 'Invalid Term.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '252',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Nodes',
			'lang_text' => 'Nodes',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '253',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Search Results: %s',
			'lang_text' => 'Search Results: %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '254',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Tools',
			'lang_text' => 'Tools',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '255',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Home',
			'lang_text' => 'Home',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '256',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Payment Gateway Setting',
			'lang_text' => 'Add Payment Gateway Setting',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '257',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment Gateway Setting has been added',
			'lang_text' => 'Payment Gateway Setting has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '258',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment Gateway Setting could not be added. Please, try again.',
			'lang_text' => 'Payment Gateway Setting could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '259',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Payment Gateway Setting',
			'lang_text' => 'Edit Payment Gateway Setting',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '260',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment gateway settings updated.',
			'lang_text' => 'Payment gateway settings updated.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '261',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment Gateway Setting deleted',
			'lang_text' => 'Payment Gateway Setting deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '262',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Test Mode ',
			'lang_text' => ' - Test Mode ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '263',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Live Mode ',
			'lang_text' => ' - Live Mode ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '264',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Payment Gateway',
			'lang_text' => 'Add Payment Gateway',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '265',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment Gateway has been added',
			'lang_text' => 'Payment Gateway has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '266',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment Gateway could not be added. Please, try again.',
			'lang_text' => 'Payment Gateway could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '267',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Payment Gateway',
			'lang_text' => 'Edit Payment Gateway',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '268',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment Gateway has been updated',
			'lang_text' => 'Payment Gateway has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '269',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment Gateway could not be updated. Please, try again.',
			'lang_text' => 'Payment Gateway could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '270',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment Gateway deleted',
			'lang_text' => 'Payment Gateway deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '271',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment updated successfully.',
			'lang_text' => 'Payment updated successfully.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '272',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked payment gateways has been changed to active',
			'lang_text' => 'Checked payment gateways has been changed to active',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '273',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked payment gateways has been changed to inactive',
			'lang_text' => 'Checked payment gateways has been changed to inactive',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '274',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked payment gateways has been changed to test mode',
			'lang_text' => 'Checked payment gateways has been changed to test mode',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '275',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked payment gateways has been changed to live mode',
			'lang_text' => 'Checked payment gateways has been changed to live mode',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '276',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked payment gateways has been deleted',
			'lang_text' => 'Checked payment gateways has been deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '277',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Pay Now',
			'lang_text' => 'Pay Now',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '278',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Pay Membership Fee - ',
			'lang_text' => 'Pay Membership Fee - ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '279',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your payment could not be completed.',
			'lang_text' => 'Your payment could not be completed.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '280',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Region',
			'lang_text' => 'Region',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '281',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Region',
			'lang_text' => 'Add Region',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '282',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Region has been saved',
			'lang_text' => 'The Region has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '283',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Region could not be saved. Please, try again.',
			'lang_text' => 'The Region could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '284',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Region',
			'lang_text' => 'Edit Region',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '285',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Region',
			'lang_text' => 'Invalid Region',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '286',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Region deleted',
			'lang_text' => 'Region deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '287',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Settings could not be updated. Please try again.',
			'lang_text' => 'Settings could not be updated. Please try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '288',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'This is image base URL should not trailing slash',
			'lang_text' => 'This is image base URL should not trailing slash',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '289',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'This is css base URL should have trailing slash',
			'lang_text' => 'This is css base URL should have trailing slash',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '290',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'This is JS base URL should have trailing slash',
			'lang_text' => 'This is JS base URL should have trailing slash',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '291',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The file uploaded is too big, only files less than %s permitted',
			'lang_text' => 'The file uploaded is too big, only files less than %s permitted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '292',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Watermark image is not uploaded. Please try again ',
			'lang_text' => 'Watermark image is not uploaded. Please try again ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '293',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Settings updated successfully.',
			'lang_text' => 'Settings updated successfully.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '294',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Sorry. You Cannot Update the Settings in Demo Mode',
			'lang_text' => 'Sorry. You Cannot Update the Settings in Demo Mode',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '295',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' Settings',
			'lang_text' => ' Settings',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '296',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Update Facebook',
			'lang_text' => 'Update Facebook',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '297',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Update Twitter',
			'lang_text' => 'Update Twitter',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '298',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Facebook credentials updated',
			'lang_text' => 'Facebook credentials updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '299',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Facebook credentials could not be updated. Please, try again.',
			'lang_text' => 'Facebook credentials could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '300',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'PNG images crushed successfully',
			'lang_text' => 'PNG images crushed successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '301',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add State',
			'lang_text' => 'Add State',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '302',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'State has been added',
			'lang_text' => 'State has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '303',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'State could not be added. Please, try again.',
			'lang_text' => 'State could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '304',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit State',
			'lang_text' => 'Edit State',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '305',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'State has been updated',
			'lang_text' => 'State has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '306',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'State could not be updated. Please, try again.',
			'lang_text' => 'State could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '307',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'State deleted',
			'lang_text' => 'State deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '308',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Vocabulary ID.',
			'lang_text' => 'Invalid Vocabulary ID.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '309',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Vocabulary: %s',
			'lang_text' => 'Vocabulary: %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '310',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '%s: Add Term',
			'lang_text' => '%s: Add Term',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '311',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Term with same slug already exists in the vocabulary.',
			'lang_text' => 'Term with same slug already exists in the vocabulary.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '312',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Term saved successfuly.',
			'lang_text' => 'Term saved successfuly.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '313',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Term could not be added to the vocabulary. Please try again.',
			'lang_text' => 'Term could not be added to the vocabulary. Please try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '314',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Term could not be saved. Please try again.',
			'lang_text' => 'Term could not be saved. Please try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '315',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '%s: Edit Term',
			'lang_text' => '%s: Edit Term',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '316',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid id for Term',
			'lang_text' => 'Invalid id for Term',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '317',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Term deleted',
			'lang_text' => 'Term deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '318',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Term could not be deleted. Please, try again.',
			'lang_text' => 'Term could not be deleted. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '319',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Transaction Type',
			'lang_text' => 'Edit Transaction Type',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '320',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Transaction Type has been updated',
			'lang_text' => 'Transaction Type has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '321',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Transaction Type could not be updated. Please, try again.',
			'lang_text' => 'Transaction Type could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '322',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'My Transactions',
			'lang_text' => 'My Transactions',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '323',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'From date should greater than To date. Please, try again.',
			'lang_text' => 'From date should greater than To date. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '324',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Amount Earned today',
			'lang_text' => ' - Amount Earned today',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '325',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Amount Earned in this week',
			'lang_text' => ' - Amount Earned in this week',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '326',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Amount Earned in this month',
			'lang_text' => ' - Amount Earned in this month',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '327',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Today',
			'lang_text' => 'Today',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '328',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'This Week',
			'lang_text' => 'This Week',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '329',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'This Month',
			'lang_text' => 'This Month',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '330',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Custom',
			'lang_text' => 'Custom',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '331',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Transactions - Today',
			'lang_text' => 'Transactions - Today',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '332',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '- Today',
			'lang_text' => '- Today',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '333',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Transactions - This Week',
			'lang_text' => 'Transactions - This Week',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '334',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '- This Week',
			'lang_text' => '- This Week',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '335',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Transactions - This Month',
			'lang_text' => 'Transactions - This Month',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '336',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '- This Month',
			'lang_text' => '- This Month',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '337',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Transactions - Total',
			'lang_text' => 'Transactions - Total',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '338',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '- Total',
			'lang_text' => '- Total',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '339',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Transaction deleted',
			'lang_text' => 'Transaction deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '340',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Type',
			'lang_text' => 'Type',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '341',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Type',
			'lang_text' => 'Add Type',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '342',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Type has been saved',
			'lang_text' => 'The Type has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '343',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Type could not be saved. Please, try again.',
			'lang_text' => 'The Type could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '344',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Type',
			'lang_text' => 'Edit Type',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '345',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Type',
			'lang_text' => 'Invalid Type',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '346',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Type deleted',
			'lang_text' => 'Type deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '347',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Add Wallet Amounts',
			'lang_text' => 'User Add Wallet Amounts',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '348',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User has been added as favorite',
			'lang_text' => 'User has been added as favorite',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '349',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User could not be added as favorite. Please, try again',
			'lang_text' => 'User could not be added as favorite. Please, try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '350',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have already added this user as favorite',
			'lang_text' => 'You have already added this user as favorite',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '351',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Favorite deleted',
			'lang_text' => 'User Favorite deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '352',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - User - %s',
			'lang_text' => ' - User - %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '353',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add User Flag Category',
			'lang_text' => 'Add User Flag Category',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '354',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Flag Category has been added',
			'lang_text' => 'User Flag Category has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '355',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Flag Category could not be added. Please, try again.',
			'lang_text' => 'User Flag Category could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '356',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit User Flag Category',
			'lang_text' => 'Edit User Flag Category',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '357',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Flag Category has been updated',
			'lang_text' => 'User Flag Category has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '358',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Flag Category could not be updated. Please, try again.',
			'lang_text' => 'User Flag Category could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '359',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Flag Category deleted',
			'lang_text' => 'User Flag Category deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '360',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Flag has been added',
			'lang_text' => 'User Flag has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '361',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Flag could not be added. Please, try again.',
			'lang_text' => 'User Flag could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '362',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have already reported this user.',
			'lang_text' => 'You have already reported this user.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '363',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Flags',
			'lang_text' => 'User Flags',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '364',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Category - %s',
			'lang_text' => ' - Category - %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '365',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Flag has been deleted',
			'lang_text' => 'User Flag has been deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '366',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - today',
			'lang_text' => ' - today',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '367',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '- in this week',
			'lang_text' => '- in this week',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '368',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - in this month',
			'lang_text' => ' - in this month',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '369',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Login through OpenID ',
			'lang_text' => ' - Login through OpenID ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '370',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Login through Twitter ',
			'lang_text' => ' - Login through Twitter ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '371',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Login through Facebook ',
			'lang_text' => ' - Login through Facebook ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '372',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Login through Gmail ',
			'lang_text' => ' - Login through Gmail ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '373',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Login through Yahoo ',
			'lang_text' => ' - Login through Yahoo ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '374',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Normal Users ',
			'lang_text' => ' - Normal Users ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '375',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Login deleted',
			'lang_text' => 'User Login deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '376',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Notification Settings',
			'lang_text' => 'Notification Settings',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '377',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Notification settings has been updated',
			'lang_text' => 'Notification settings has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '378',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Notification settings could not be updated. Please, try again.',
			'lang_text' => 'Notification settings could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '379',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Openids',
			'lang_text' => 'User Openids',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '380',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add New Openid',
			'lang_text' => 'Add New Openid',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '381',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Authenticated failed or you may not have profile in your OpenID account',
			'lang_text' => 'Authenticated failed or you may not have profile in your OpenID account',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '382',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Openid has been added',
			'lang_text' => 'User Openid has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '383',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Openid could not be added. Please, try again.',
			'lang_text' => 'User Openid could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '384',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid OpenID',
			'lang_text' => 'Invalid OpenID',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '385',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Openid deleted',
			'lang_text' => 'User Openid deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '386',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Sorry, you registered through OpenID account. So you should have atleast one OpenID account for login',
			'lang_text' => 'Sorry, you registered through OpenID account. So you should have atleast one OpenID account for login',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '387',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Profile',
			'lang_text' => 'Edit Profile',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '388',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Enter PayPal verification email and name associated with your PayPal',
			'lang_text' => 'Enter PayPal verification email and name associated with your PayPal',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '389',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Profile has been updated',
			'lang_text' => 'User Profile has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '390',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Profile could not be updated. Please, try again.',
			'lang_text' => 'User Profile could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '391',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User View deleted',
			'lang_text' => 'User View deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '392',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have reached maximum limit for failed login attempts. Please try again after a few minutes.',
			'lang_text' => 'You have reached maximum limit for failed login attempts. Please try again after a few minutes.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '393',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Registered through OpenID ',
			'lang_text' => ' - Registered through OpenID ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '394',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Registered through Facebook ',
			'lang_text' => ' - Registered through Facebook ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '395',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Registered through Twitter ',
			'lang_text' => ' - Registered through Twitter ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '396',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Registered through Gmail ',
			'lang_text' => ' - Registered through Gmail ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '397',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Registered through Yahoo ',
			'lang_text' => ' - Registered through Yahoo ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '398',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid User',
			'lang_text' => 'Invalid User',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '399',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The User has been saved',
			'lang_text' => 'The User has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '400',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The User could not be saved. Please, try again.',
			'lang_text' => 'The User could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '401',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Password has been reset.',
			'lang_text' => 'Password has been reset.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '402',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Password could not be reset. Please, try again.',
			'lang_text' => 'Password could not be reset. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '403',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Current password did not match. Please, try again.',
			'lang_text' => 'Current password did not match. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '404',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Top',
			'lang_text' => 'Top',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '405',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Account activated successfully.',
			'lang_text' => 'Account activated successfully.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '406',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Reset Password',
			'lang_text' => 'Reset Password',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '407',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your password has been changed successfully, Please login now',
			'lang_text' => 'Your password has been changed successfully, Please login now',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '408',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid change password request',
			'lang_text' => 'Invalid change password request',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '409',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User cannot be found in server or admin deactivated your account, please register again',
			'lang_text' => 'User cannot be found in server or admin deactivated your account, please register again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '410',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Registration',
			'lang_text' => 'User Registration',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '411',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your registration process is not completed. Please, try again.',
			'lang_text' => 'Your registration process is not completed. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '412',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have successfully registered with our site.',
			'lang_text' => 'You have successfully registered with our site.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '413',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' You have successfully registered with our site after paying only login to site.',
			'lang_text' => ' You have successfully registered with our site after paying only login to site.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '414',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have successfully registered with our site and your activation mail has been sent to your mail inbox.',
			'lang_text' => 'You have successfully registered with our site and your activation mail has been sent to your mail inbox.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '415',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'OpenID verification is completed successfully. But you have to fill the following required fields to complete our registration process.',
			'lang_text' => 'OpenID verification is completed successfully. But you have to fill the following required fields to complete our registration process.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '416',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Activate your account',
			'lang_text' => 'Activate your account',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '417',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid activation request, please register again',
			'lang_text' => 'Invalid activation request, please register again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '418',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid activation request',
			'lang_text' => 'Invalid activation request',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '419',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have successfully activated your account. But you can login after pay the membership fee.',
			'lang_text' => 'You have successfully activated your account. But you can login after pay the membership fee.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '420',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have successfully activated your account. But you can login after admin activate your account.',
			'lang_text' => 'You have successfully activated your account. But you can login after admin activate your account.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '421',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have successfully activated and logged in to your account.',
			'lang_text' => 'You have successfully activated and logged in to your account.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '422',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have successfully activated your account. Now you can login with your %s.',
			'lang_text' => 'You have successfully activated your account. Now you can login with your %s.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '423',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Activation mail has been resent.',
			'lang_text' => 'Activation mail has been resent.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '424',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'A Mail for activating your account has been sent.',
			'lang_text' => 'A Mail for activating your account has been sent.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '425',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Try some time later as mail could not be dispatched due to some error in the server',
			'lang_text' => 'Try some time later as mail could not be dispatched due to some error in the server',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '426',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Facebook Connection. Please try again',
			'lang_text' => 'Invalid Facebook Connection. Please try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '427',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Problem in Facebook connect. Please try again',
			'lang_text' => 'Problem in Facebook connect. Please try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '428',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Sorry, login failed.  Your account has been blocked',
			'lang_text' => 'Sorry, login failed.  Your account has been blocked',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '429',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' You have successfully registered with our site after paying membership fee only you can login to site.',
			'lang_text' => ' You have successfully registered with our site after paying membership fee only you can login to site.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '430',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your twitter credentials are updated',
			'lang_text' => 'Your twitter credentials are updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '431',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Forgot Password',
			'lang_text' => 'Forgot Password',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '432',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'An email has been sent with a link where you can change your password',
			'lang_text' => 'An email has been sent with a link where you can change your password',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '433',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'There is no user registered with the email %s or admin deactivated your account. If you spelled the address incorrectly or entered the wrong address, please try again.',
			'lang_text' => 'There is no user registered with the email %s or admin deactivated your account. If you spelled the address incorrectly or entered the wrong address, please try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '434',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Change Password',
			'lang_text' => 'Change Password',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '435',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your password has been changed successfully. Please login now',
			'lang_text' => 'Your password has been changed successfully. Please login now',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '436',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your password has been changed successfully',
			'lang_text' => 'Your password has been changed successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '437',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Password could not be changed',
			'lang_text' => 'Password could not be changed',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '438',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Login',
			'lang_text' => 'Login',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '439',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Sorry, login failed. Your ',
			'lang_text' => 'Sorry, login failed. Your ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '440',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' or password are incorrect',
			'lang_text' => ' or password are incorrect',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '441',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Sorry, login failed.  Your %s or password are incorrect',
			'lang_text' => 'Sorry, login failed.  Your %s or password are incorrect',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '442',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Required',
			'lang_text' => 'Required',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '443',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid OpenID entered. Please enter valid OpenID',
			'lang_text' => 'Invalid OpenID entered. Please enter valid OpenID',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '444',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You are now logged out of the site.',
			'lang_text' => 'You are now logged out of the site.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '445',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid User.',
			'lang_text' => 'Invalid User.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '446',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Email to users',
			'lang_text' => 'Email to users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '447',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Email sent successfully',
			'lang_text' => 'Email sent successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '448',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Email sent successfully. Some emails are not sent',
			'lang_text' => 'Email sent successfully. Some emails are not sent',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '449',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No email send',
			'lang_text' => 'No email send',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '450',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add New User/Admin',
			'lang_text' => 'Add New User/Admin',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '451',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User has been added',
			'lang_text' => 'User has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '452',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User could not be added. Please, try again.',
			'lang_text' => 'User could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '453',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User has neen deleted',
			'lang_text' => 'User has neen deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '454',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Diagnostics',
			'lang_text' => 'Diagnostics',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '455',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Vocabularies',
			'lang_text' => 'Vocabularies',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '456',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Vocabulary',
			'lang_text' => 'Add Vocabulary',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '457',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Vocabulary has been saved',
			'lang_text' => 'The Vocabulary has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '458',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Vocabulary could not be saved. Please, try again.',
			'lang_text' => 'The Vocabulary could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '459',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Vocabulary',
			'lang_text' => 'Edit Vocabulary',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '460',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Vocabulary',
			'lang_text' => 'Invalid Vocabulary',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '461',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Vocabulary deleted',
			'lang_text' => 'Vocabulary deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '462',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Accept',
			'lang_text' => 'Accept',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '463',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Reject',
			'lang_text' => 'Reject',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '464',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Cancel',
			'lang_text' => 'Cancel',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '465',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'has added this message',
			'lang_text' => 'has added this message',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '466',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Enter number higher than 0',
			'lang_text' => 'Enter number higher than 0',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '467',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You cannot add your own domain in redirect URL',
			'lang_text' => 'You cannot add your own domain in redirect URL',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '468',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Must be a valid URL, starting with http://',
			'lang_text' => 'Must be a valid URL, starting with http://',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '469',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Single IP or hostname',
			'lang_text' => 'Single IP or hostname',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '470',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'IP Range',
			'lang_text' => 'IP Range',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '471',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Referer block',
			'lang_text' => 'Referer block',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '472',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Permanent',
			'lang_text' => 'Permanent',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '473',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Day(s)',
			'lang_text' => 'Day(s)',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '474',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Week(s)',
			'lang_text' => 'Week(s)',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '475',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Delete',
			'lang_text' => 'Delete',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '476',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Publish',
			'lang_text' => 'Publish',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '477',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Unpublish',
			'lang_text' => 'Unpublish',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '478',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Unapproved',
			'lang_text' => 'Unapproved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '479',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Approved',
			'lang_text' => 'Approved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '480',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Must be a valid email',
			'lang_text' => 'Must be a valid email',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '481',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Please enter valid captcha',
			'lang_text' => 'Please enter valid captcha',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '482',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Give numeric format',
			'lang_text' => 'Give numeric format',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '483',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Labels already exist.',
			'lang_text' => 'Labels already exist.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '484',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Inactive',
			'lang_text' => 'Inactive',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '485',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Active',
			'lang_text' => 'Active',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '486',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Enter subject',
			'lang_text' => 'Enter subject',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '487',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Enter message',
			'lang_text' => 'Enter message',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '488',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Suspend',
			'lang_text' => 'Suspend',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '489',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Unsuspend',
			'lang_text' => 'Unsuspend',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '490',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Flag',
			'lang_text' => 'Flag',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '491',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Clear flag',
			'lang_text' => 'Clear flag',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '492',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Create Label',
			'lang_text' => 'Create Label',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '493',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Test Mode',
			'lang_text' => 'Test Mode',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '494',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Live Mode',
			'lang_text' => 'Live Mode',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '495',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Auto Approved',
			'lang_text' => 'Auto Approved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '496',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Non Auto Approved',
			'lang_text' => 'Non Auto Approved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '497',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Should be greater than 0',
			'lang_text' => 'Should be greater than 0',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '498',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Required valid amount',
			'lang_text' => 'Required valid amount',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '499',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Must be between of 3 to 30 characters',
			'lang_text' => 'Must be between of 3 to 30 characters',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '500',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Must be a valid character',
			'lang_text' => 'Must be a valid character',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '501',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Username is already exist',
			'lang_text' => 'Username is already exist',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '502',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Must be start with an alphabets',
			'lang_text' => 'Must be start with an alphabets',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '503',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Email address is already exist',
			'lang_text' => 'Email address is already exist',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '504',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Must be at least 6 characters',
			'lang_text' => 'Must be at least 6 characters',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '505',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your old password is incorrect, please try again',
			'lang_text' => 'Your old password is incorrect, please try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '506',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'New and confirm password field must match, please try again',
			'lang_text' => 'New and confirm password field must match, please try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '507',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You must agree to the terms and conditions',
			'lang_text' => 'You must agree to the terms and conditions',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '508',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Export',
			'lang_text' => 'Export',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '509',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'All Users',
			'lang_text' => 'All Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '510',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Inactive Users',
			'lang_text' => 'Inactive Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '511',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Active Users',
			'lang_text' => 'Active Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '512',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Male Users',
			'lang_text' => 'Male Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '513',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Female Users',
			'lang_text' => 'Female Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '514',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Facebook Users',
			'lang_text' => 'Facebook Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '515',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Gmail Users',
			'lang_text' => 'Gmail Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '516',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'TwitterUsers',
			'lang_text' => 'TwitterUsers',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '517',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Yahoo Users',
			'lang_text' => 'Yahoo Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '518',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'OpenID Users',
			'lang_text' => 'OpenID Users',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '519',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Given amount should lies from  %s%s to %s%s',
			'lang_text' => 'Given amount should lies from  %s%s to %s%s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '520',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Amount should be greater than minimum amount',
			'lang_text' => 'Amount should be greater than minimum amount',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '521',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Amount should be Numeric',
			'lang_text' => 'Amount should be Numeric',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '522',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'OpenID already exist',
			'lang_text' => 'OpenID already exist',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '523',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Enter valid OpenID',
			'lang_text' => 'Enter valid OpenID',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '524',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Must be a valid date',
			'lang_text' => 'Must be a valid date',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '525',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ACL Actions',
			'lang_text' => 'ACL Actions',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '526',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ACL Action',
			'lang_text' => 'ACL Action',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '527',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add ACL Action',
			'lang_text' => 'Add ACL Action',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '528',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Acl Action has been added',
			'lang_text' => 'Acl Action has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '529',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Acl Action could not be added. Please, try again.',
			'lang_text' => 'Acl Action could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '530',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Acl Action already available.',
			'lang_text' => 'Acl Action already available.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '531',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit ACL Action',
			'lang_text' => 'Edit ACL Action',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '532',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Request',
			'lang_text' => 'Invalid Request',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '533',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ACL Action has been updated',
			'lang_text' => 'ACL Action has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '534',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ACL Action could not be updated. Please, try again.',
			'lang_text' => 'ACL Action could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '535',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ACL Action deleted',
			'lang_text' => 'ACL Action deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '536',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ACL Actions generated successfully',
			'lang_text' => 'ACL Actions generated successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '537',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ACL Actions already generated.',
			'lang_text' => 'ACL Actions already generated.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '538',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Roles',
			'lang_text' => 'Roles',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '539',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Role',
			'lang_text' => 'Add Role',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '540',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' | %s',
			'lang_text' => ' | %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '541',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Role has been added',
			'lang_text' => 'Role has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '542',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Role could not be added. Please, try again.',
			'lang_text' => 'Role could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '543',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Role',
			'lang_text' => 'Edit Role',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '544',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Type has been updated',
			'lang_text' => 'User Type has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '545',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Type could not be updated. Please, try again.',
			'lang_text' => 'User Type could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '546',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User Type deleted',
			'lang_text' => 'User Type deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '547',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Permission',
			'lang_text' => 'Edit Permission',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '548',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Permission has been set successfully',
			'lang_text' => 'Permission has been set successfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '549',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You are not authorized to view this page',
			'lang_text' => 'You are not authorized to view this page',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '550',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Authorisation Required',
			'lang_text' => 'Authorisation Required',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '551',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Role is already exist',
			'lang_text' => 'Role is already exist',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '552',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add',
			'lang_text' => 'Add',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '553',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Update',
			'lang_text' => 'Update',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '554',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add New Acl Link',
			'lang_text' => 'Add New Acl Link',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '555',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Generate Actions',
			'lang_text' => 'Generate Actions',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '556',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'It will generate actions from file structure',
			'lang_text' => 'It will generate actions from file structure',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '557',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Actions',
			'lang_text' => 'Actions',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '558',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Action',
			'lang_text' => 'Action',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '559',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit',
			'lang_text' => 'Edit',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '560',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Acl Links available',
			'lang_text' => 'No Acl Links available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '561',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Delete Role',
			'lang_text' => 'Delete Role',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '562',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Move Role',
			'lang_text' => 'Move Role',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '563',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Roles Available',
			'lang_text' => 'No Roles Available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '564',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Alias',
			'lang_text' => 'Alias',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '565',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'None',
			'lang_text' => 'None',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '566',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Owner',
			'lang_text' => 'Owner',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '567',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Group',
			'lang_text' => 'Group',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '568',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Templates',
			'lang_text' => 'Contest Templates',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '569',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flags',
			'lang_text' => 'Contest Flags',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '570',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entries',
			'lang_text' => 'Entries',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '571',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Ratings',
			'lang_text' => 'Entry Ratings',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '572',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flags',
			'lang_text' => 'Entry Flags',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '573',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Downloads',
			'lang_text' => 'Entry Downloads',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '574',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Statuses',
			'lang_text' => 'Contest Statuses',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '575',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flag Categories',
			'lang_text' => 'Contest Flag Categories',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '576',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flag Categories',
			'lang_text' => 'Entry Flag Categories',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '577',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Prize Packages',
			'lang_text' => 'Prize Packages',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '578',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Days',
			'lang_text' => 'Contest Days',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '579',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Resources',
			'lang_text' => 'Resources',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '580',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Validation Rules',
			'lang_text' => 'Validation Rules',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '581',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Comments',
			'lang_text' => 'Contest Comments',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '582',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Comment',
			'lang_text' => 'Contest Comment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '583',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid contest comment',
			'lang_text' => 'Invalid contest comment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '584',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Contest Comment',
			'lang_text' => 'Add Contest Comment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '585',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest comment has been added',
			'lang_text' => 'Contest comment has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '586',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest comment could not be added. Please, try again.',
			'lang_text' => 'Contest comment could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '587',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest comment deleted',
			'lang_text' => 'Contest comment deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '588',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest comment was not deleted',
			'lang_text' => 'Contest comment was not deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '589',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest comment has been added',
			'lang_text' => 'contest comment has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '590',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest comment could not be added. Please, try again.',
			'lang_text' => 'contest comment could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '591',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Contest Comment',
			'lang_text' => 'Edit Contest Comment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '592',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest comment has been updated',
			'lang_text' => 'contest comment has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '593',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest comment could not be updated. Please, try again.',
			'lang_text' => 'contest comment could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '594',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Contest Flag Category',
			'lang_text' => 'Add Contest Flag Category',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '595',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flag Category has been added',
			'lang_text' => 'Contest Flag Category has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '596',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flag Category could not be added. Please, try again.',
			'lang_text' => 'Contest Flag Category could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '597',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Contest Flag Category',
			'lang_text' => 'Edit Contest Flag Category',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '598',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flag Category has been updated',
			'lang_text' => 'Contest Flag Category has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '599',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flag Category could not be updated. Please, try again.',
			'lang_text' => 'Contest Flag Category could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '600',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flag Category deleted',
			'lang_text' => 'Contest Flag Category deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '601',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flag has been added',
			'lang_text' => 'Contest Flag has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '602',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flag could not be added. Please, try again.',
			'lang_text' => 'Contest Flag could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '603',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have already reported this contest.',
			'lang_text' => 'You have already reported this contest.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '604',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Contest - %s',
			'lang_text' => ' - Contest - %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '605',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Flag has been deleted',
			'lang_text' => 'Contest Flag has been deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '606',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest has already added to your watch list',
			'lang_text' => 'Contest has already added to your watch list',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '607',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest has added to your watchlist',
			'lang_text' => 'Contest has added to your watchlist',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '608',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest follower has been removed.',
			'lang_text' => 'Contest follower has been removed.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '609',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest has removed from your watchlist.',
			'lang_text' => 'Contest has removed from your watchlist.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '610',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Followers',
			'lang_text' => 'Contest Followers',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '611',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Follows',
			'lang_text' => 'Contest Follows',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '612',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Contest Status',
			'lang_text' => 'Edit Contest Status',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '613',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Status has been updated',
			'lang_text' => 'Contest Status has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '614',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Status could not be updated. Please, try again.',
			'lang_text' => 'Contest Status could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '615',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Form Fields',
			'lang_text' => 'Edit Form Fields',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '616',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Contest Type id. Please, try again.',
			'lang_text' => 'Invalid Contest Type id. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '617',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Contest Template has been saved',
			'lang_text' => 'The Contest Template has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '618',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest form fields has been saved',
			'lang_text' => 'Contest form fields has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '619',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Template could not be saved. Please, try again.',
			'lang_text' => 'Contest Template could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '620',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Type could not be saved. Please, try again.',
			'lang_text' => 'Contest Type could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '621',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Form and Pricing',
			'lang_text' => 'Contest Form and Pricing',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '622',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Contest Template has been created',
			'lang_text' => 'The Contest Template has been created',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '623',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Contest Type has been created',
			'lang_text' => 'The Contest Type has been created',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '624',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Contest Template could not be created. Please, try again.',
			'lang_text' => 'The Contest Template could not be created. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '625',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Contest Type could not be created. Please, try again.',
			'lang_text' => 'The Contest Type could not be created. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '626',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add New Contest Template',
			'lang_text' => 'Add New Contest Template',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '627',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add New Contest Type',
			'lang_text' => 'Add New Contest Type',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '628',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Contest Type has been deleted',
			'lang_text' => 'The Contest Type has been deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '629',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Type - Pricing',
			'lang_text' => 'Contest Type - Pricing',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '630',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Contest type pricing has been updated',
			'lang_text' => 'The Contest type pricing has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '631',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Type - Pricing Organize',
			'lang_text' => 'Contest Type - Pricing Organize',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '632',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - In process ',
			'lang_text' => ' - In process ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '633',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Closed',
			'lang_text' => ' - Closed',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '634',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Types PricingPackages',
			'lang_text' => 'Contest Types PricingPackages',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '635',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Types Pricing Package',
			'lang_text' => 'Contest Types Pricing Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '636',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid contest types pricing package',
			'lang_text' => 'Invalid contest types pricing package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '637',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Contest Types Pricing Package',
			'lang_text' => 'Add Contest Types Pricing Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '638',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest types pricing package has been added',
			'lang_text' => 'contest types pricing package has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '639',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest types pricing package could not be added. Please, try again.',
			'lang_text' => 'contest types pricing package could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '640',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Contest Types Pricing Package',
			'lang_text' => 'Edit Contest Types Pricing Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '641',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest types pricing package has been updated',
			'lang_text' => 'contest types pricing package has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '642',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest types pricing package could not be updated. Please, try again.',
			'lang_text' => 'contest types pricing package could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '643',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contestTypesPricingPackages',
			'lang_text' => 'contestTypesPricingPackages',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '644',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest types pricing package deleted',
			'lang_text' => 'Contest types pricing package deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '645',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Types PricingRequirements',
			'lang_text' => 'Contest Types PricingRequirements',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '646',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Types Pricing Requirement',
			'lang_text' => 'Contest Types Pricing Requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '647',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid contest types pricing requirement',
			'lang_text' => 'Invalid contest types pricing requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '648',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Contest Types Pricing Requirement',
			'lang_text' => 'Add Contest Types Pricing Requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '649',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest types pricing requirement has been added',
			'lang_text' => 'contest types pricing requirement has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '650',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest types pricing requirement could not be added. Please, try again.',
			'lang_text' => 'contest types pricing requirement could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '651',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contestTypesPricingRequirements',
			'lang_text' => 'contestTypesPricingRequirements',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '652',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Contest Types Pricing Requirement',
			'lang_text' => 'Edit Contest Types Pricing Requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '653',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest types pricing requirement has been updated',
			'lang_text' => 'contest types pricing requirement has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '654',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contest types pricing requirement could not be updated. Please, try again.',
			'lang_text' => 'contest types pricing requirement could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '655',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest types pricing requirement deleted',
			'lang_text' => 'Contest types pricing requirement deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '656',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry download deleted',
			'lang_text' => 'Entry download deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '657',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Entry Flag Category',
			'lang_text' => 'Add Entry Flag Category',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '658',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flag Category has been added',
			'lang_text' => 'Entry Flag Category has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '659',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flag Category could not be added. Please, try again.',
			'lang_text' => 'Entry Flag Category could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '660',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Entry Flag Category',
			'lang_text' => 'Edit Entry Flag Category',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '661',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flag Category has been updated',
			'lang_text' => 'Entry Flag Category has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '662',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flag Category could not be updated. Please, try again.',
			'lang_text' => 'Entry Flag Category could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '663',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flag Category deleted',
			'lang_text' => 'Entry Flag Category deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '664',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flag has been added',
			'lang_text' => 'Entry Flag has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '665',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flag could not be added. Please, try again.',
			'lang_text' => 'Entry Flag could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '666',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have already reported this entry.',
			'lang_text' => 'You have already reported this entry.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '667',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You could not flag your own entry.',
			'lang_text' => 'You could not flag your own entry.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '668',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - ContestUser - %s',
			'lang_text' => ' - ContestUser - %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '669',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ContestUser Flag has been deleted',
			'lang_text' => 'ContestUser Flag has been deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '670',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Rating has been added',
			'lang_text' => 'Rating has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '671',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Rating could not be added. Please, try again',
			'lang_text' => 'Rating could not be added. Please, try again',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '672',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You have already rated this contestUser',
			'lang_text' => 'You have already rated this contestUser',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '673',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest User Ratings',
			'lang_text' => 'Contest User Ratings',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '674',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid contest user rating',
			'lang_text' => 'Invalid contest user rating',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '675',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest user rating deleted',
			'lang_text' => 'Contest user rating deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '676',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest user rating was not deleted',
			'lang_text' => 'Contest user rating was not deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '677',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest User Views',
			'lang_text' => 'Contest User Views',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '678',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest View deleted',
			'lang_text' => 'Contest View deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '679',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Contest',
			'lang_text' => 'Invalid Contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '680',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Showing Only Unrated',
			'lang_text' => 'Showing Only Unrated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '681',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Showing Only Rated',
			'lang_text' => 'Showing Only Rated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '682',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Sorted By Highest Rated',
			'lang_text' => 'Sorted By Highest Rated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '683',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Sorted By Recently Added',
			'lang_text' => 'Sorted By Recently Added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '684',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'My %s',
			'lang_text' => 'My %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '685',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'My Entries & Won Contests',
			'lang_text' => 'My Entries & Won Contests',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '686',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Participated Contests',
			'lang_text' => 'Participated Contests',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '687',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Withdrawn ',
			'lang_text' => ' - Withdrawn ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '688',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Eliminated ',
			'lang_text' => ' - Eliminated ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '689',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Won',
			'lang_text' => ' - Won',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '690',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Lost',
			'lang_text' => ' - Lost',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '691',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Change Request',
			'lang_text' => ' - Change Request',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '692',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Change Completed',
			'lang_text' => ' - Change Completed',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '693',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Completed',
			'lang_text' => ' - Completed',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '694',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Close',
			'lang_text' => ' - Close',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '695',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Entry',
			'lang_text' => ' - Entry',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '696',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Development',
			'lang_text' => ' - Development',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '697',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest User',
			'lang_text' => 'Contest User',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '698',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Its too late!!! This contest has reached its maximum allowed entry :(',
			'lang_text' => 'Its too late!!! This contest has reached its maximum allowed entry :(',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '699',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Contest Entry',
			'lang_text' => 'Add Contest Entry',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '700',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry could not be added. Please, try again.',
			'lang_text' => 'Entry could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '701',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry has been added',
			'lang_text' => 'Entry has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '702',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You\'ve succesfully sent a message to',
			'lang_text' => 'You\'ve succesfully sent a message to',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '703',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your contest entry has added succesfully',
			'lang_text' => 'Your contest entry has added succesfully',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '704',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Requested process done.',
			'lang_text' => 'Requested process done.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '705',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Problem in accepting the Request. Try again later!',
			'lang_text' => 'Problem in accepting the Request. Try again later!',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '706',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You\'ve succesfully accepted request.',
			'lang_text' => 'You\'ve succesfully accepted request.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '707',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Entries',
			'lang_text' => 'Contest Entries',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '708',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Entries - Today',
			'lang_text' => 'Contest Entries - Today',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '709',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Entries - This Week',
			'lang_text' => 'Contest Entries - This Week',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '710',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Entries - This Month',
			'lang_text' => 'Contest Entries - This Month',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '711',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Entries - Total',
			'lang_text' => 'Contest Entries - Total',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '712',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid contest user',
			'lang_text' => 'Invalid contest user',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '713',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest user deleted',
			'lang_text' => 'Contest user deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '714',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest user was not deleted',
			'lang_text' => 'Contest user was not deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '715',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked contest entries has been actived',
			'lang_text' => 'Checked contest entries has been actived',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '716',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked entries has been eliminated',
			'lang_text' => 'Checked entries has been eliminated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '717',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked entries has been withdrawn',
			'lang_text' => 'Checked entries has been withdrawn',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '718',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked entries has been deleted',
			'lang_text' => 'Checked entries has been deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '719',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Views',
			'lang_text' => 'Contest Views',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '720',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Browse Contests',
			'lang_text' => 'Browse Contests',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '721',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contests ',
			'lang_text' => 'Contests ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '722',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'My Contests',
			'lang_text' => 'My Contests',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '723',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Featured Contests',
			'lang_text' => 'Featured Contests',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '724',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Open ',
			'lang_text' => ' - Open ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '725',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - All',
			'lang_text' => ' - All',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '726',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Payment Pending ',
			'lang_text' => ' - Payment Pending ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '727',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Pending Approval ',
			'lang_text' => ' - Pending Approval ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '728',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Rejected',
			'lang_text' => ' - Rejected',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '729',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Canceled ',
			'lang_text' => ' - Canceled ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '730',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Canceled By Admin ',
			'lang_text' => ' - Canceled By Admin ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '731',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Judging ',
			'lang_text' => ' - Judging ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '732',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Winner Selected',
			'lang_text' => ' - Winner Selected',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '733',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Winner Selected By Admin ',
			'lang_text' => ' - Winner Selected By Admin ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '734',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Change Requested ',
			'lang_text' => ' - Change Requested ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '735',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Change Completed ',
			'lang_text' => ' - Change Completed ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '736',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Paid To %s',
			'lang_text' => ' - Paid To %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '737',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - Expired',
			'lang_text' => ' - Expired',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '738',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' - development',
			'lang_text' => ' - development',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '739',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Created Contests',
			'lang_text' => 'Created Contests',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '740',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest',
			'lang_text' => 'Contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '741',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid contest',
			'lang_text' => 'Invalid contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '742',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Contest',
			'lang_text' => 'Add Contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '743',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Preview Form Fields',
			'lang_text' => 'Preview Form Fields',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '744',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest has been added successfully. It will be list out after paying contest fee and admin approval.',
			'lang_text' => 'Contest has been added successfully. It will be list out after paying contest fee and admin approval.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '745',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest could not be added. Please, try again.',
			'lang_text' => 'Contest could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '746',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Packages',
			'lang_text' => 'Packages',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '747',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest prize should not be less than ',
			'lang_text' => 'Contest prize should not be less than ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '748',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your wallet has insufficient money to add this contest',
			'lang_text' => 'Your wallet has insufficient money to add this contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '749',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Thank you! Your payment was successful.',
			'lang_text' => 'Thank you! Your payment was successful.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '750',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest could not be updated. Please, try again.',
			'lang_text' => 'Contest could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '751',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Contest',
			'lang_text' => 'Edit Contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '752',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest has been updated',
			'lang_text' => 'Contest has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '753',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest deleted',
			'lang_text' => 'Contest deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '754',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest was not deleted',
			'lang_text' => 'Contest was not deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '755',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contests - Today',
			'lang_text' => 'Contests - Today',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '756',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contests - This Week',
			'lang_text' => 'Contests - This Week',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '757',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contests - This Month',
			'lang_text' => 'Contests - This Month',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '758',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contests - Total',
			'lang_text' => 'Contests - Total',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '759',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Winner has been selected for the selected contest',
			'lang_text' => 'Winner has been selected for the selected contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '760',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked contest has been opened',
			'lang_text' => 'Checked contest has been opened',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '761',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked contest has been reject',
			'lang_text' => 'Checked contest has been reject',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '762',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked contest has been canceled',
			'lang_text' => 'Checked contest has been canceled',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '763',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Checked contest has been deleted',
			'lang_text' => 'Checked contest has been deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '764',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Winner selected for the Checked contest',
			'lang_text' => 'Winner selected for the Checked contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '765',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Refund Request',
			'lang_text' => 'Refund Request',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '766',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your request for cancelation added successfully and the amount will be refunded after admin approval.',
			'lang_text' => 'Your request for cancelation added successfully and the amount will be refunded after admin approval.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '767',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Your request cannot be add. Please specif the reason for cancelation.',
			'lang_text' => 'Your request cannot be add. Please specif the reason for cancelation.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '768',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'This week',
			'lang_text' => 'This week',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '769',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'This month',
			'lang_text' => 'This month',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '770',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Total',
			'lang_text' => 'Total',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '771',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contests Pricing Requirements',
			'lang_text' => 'contests Pricing Requirements',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '772',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contests Pricing Requirement',
			'lang_text' => 'Contests Pricing Requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '773',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid contests pricing requirement',
			'lang_text' => 'Invalid contests pricing requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '774',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Contests Pricing Requirement',
			'lang_text' => 'Add Contests Pricing Requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '775',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contests pricing requirement has been added',
			'lang_text' => 'contests pricing requirement has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '776',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contests pricing requirement could not be added. Please, try again.',
			'lang_text' => 'contests pricing requirement could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '777',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contests pricing requirement deleted',
			'lang_text' => 'Contests pricing requirement deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '778',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contestsPricingRequirements',
			'lang_text' => 'contestsPricingRequirements',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '779',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Contests Pricing Requirement',
			'lang_text' => 'Edit Contests Pricing Requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '780',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contests pricing requirement has been updated',
			'lang_text' => 'contests pricing requirement has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '781',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'contests pricing requirement could not be updated. Please, try again.',
			'lang_text' => 'contests pricing requirement could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '782',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid id for FormField',
			'lang_text' => 'Invalid id for FormField',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '783',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'FormField deleted',
			'lang_text' => 'FormField deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '784',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The FormField could not be deleted. Please, try again.',
			'lang_text' => 'The FormField could not be deleted. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '785',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Contest Day',
			'lang_text' => 'Add Contest Day',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '786',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest day has been added',
			'lang_text' => 'Contest day has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '787',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest day could not be added. Please, try again.',
			'lang_text' => 'Contest day could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '788',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Contest Day',
			'lang_text' => 'Edit Contest Day',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '789',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid contest day',
			'lang_text' => 'Invalid contest day',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '790',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest day has been updated',
			'lang_text' => 'Contest day has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '791',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest day could not be updated. Please, try again.',
			'lang_text' => 'Contest day could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '792',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest day deleted',
			'lang_text' => 'Contest day deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '793',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Prize Package',
			'lang_text' => 'Add Prize Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '794',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Prize package has been added',
			'lang_text' => 'Prize package has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '795',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Prize package could not be added. Please, try again.',
			'lang_text' => 'Prize package could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '796',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Prize Package',
			'lang_text' => 'Edit Prize Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '797',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid prize package',
			'lang_text' => 'Invalid prize package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '798',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Prize package has been updated',
			'lang_text' => 'Prize package has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '799',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Prize package could not be updated. Please, try again.',
			'lang_text' => 'Prize package could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '800',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'pricing Requirements',
			'lang_text' => 'pricing Requirements',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '801',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Pricing Requirement',
			'lang_text' => 'Add Pricing Requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '802',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'pricing requirement has been added',
			'lang_text' => 'pricing requirement has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '803',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'pricing requirement could not be added. Please, try again.',
			'lang_text' => 'pricing requirement could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '804',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Pricing Requirement',
			'lang_text' => 'Edit Pricing Requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '805',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid pricing requirement',
			'lang_text' => 'Invalid pricing requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '806',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'pricing requirement has been updated',
			'lang_text' => 'pricing requirement has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '807',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'pricing requirement could not be updated. Please, try again.',
			'lang_text' => 'pricing requirement could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '808',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Pricing requirement deleted',
			'lang_text' => 'Pricing requirement deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '809',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Requirement Group',
			'lang_text' => 'Add Requirement Group',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '810',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'requirement group could not be added. Please check at least one requirement to this group.',
			'lang_text' => 'requirement group could not be added. Please check at least one requirement to this group.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '811',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'requirement group has been added',
			'lang_text' => 'requirement group has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '812',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'requirement group could not be added. Please, try again.',
			'lang_text' => 'requirement group could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '813',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Requirement Group',
			'lang_text' => 'Edit Requirement Group',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '814',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid requirement group',
			'lang_text' => 'Invalid requirement group',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '815',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'requirement group has been updated',
			'lang_text' => 'requirement group has been updated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '816',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'requirement group could not be updated. Please, try again.',
			'lang_text' => 'requirement group could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '817',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Requirement group deleted',
			'lang_text' => 'Requirement group deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '818',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Requirement Package',
			'lang_text' => 'Add Requirement Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '819',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'requirement package has been added',
			'lang_text' => 'requirement package has been added',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '820',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'requirement package could not be added. Please, try again.',
			'lang_text' => 'requirement package could not be added. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '821',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Requirement Package',
			'lang_text' => 'Edit Requirement Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '822',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid requirement package',
			'lang_text' => 'Invalid requirement package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '823',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'requirement package could not be updated. Please, try again.',
			'lang_text' => 'requirement package could not be updated. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '824',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Requirement package deleted',
			'lang_text' => 'Requirement package deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '825',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid Submission',
			'lang_text' => 'Invalid Submission',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '826',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Submissions',
			'lang_text' => 'Submissions',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '827',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid id for Submission',
			'lang_text' => 'Invalid id for Submission',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '828',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Submission deleted',
			'lang_text' => 'Submission deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '829',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The Submission could not be deleted. Please, try again.',
			'lang_text' => 'The Submission could not be deleted. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '830',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The ValidationRule has been saved',
			'lang_text' => 'The ValidationRule has been saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '831',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'The ValidationRule could not be saved. Please, try again.',
			'lang_text' => 'The ValidationRule could not be saved. Please, try again.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '832',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Validation Rule',
			'lang_text' => 'Edit Validation Rule',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '833',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Invalid ValidationRule',
			'lang_text' => 'Invalid ValidationRule',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '834',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ValidationRule deleted',
			'lang_text' => 'ValidationRule deleted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '835',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Open',
			'lang_text' => 'Open',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '836',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Judging',
			'lang_text' => 'Judging',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '837',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Winner Selected',
			'lang_text' => 'Winner Selected',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '838',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Completed',
			'lang_text' => 'Completed',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '839',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Pay to %s',
			'lang_text' => 'Pay to %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '840',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Withdrawn',
			'lang_text' => 'Withdrawn',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '841',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Eliminated',
			'lang_text' => 'Eliminated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '842',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Won',
			'lang_text' => 'Won',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '843',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You\'ve withdrawn this entry successfully.',
			'lang_text' => 'You\'ve withdrawn this entry successfully.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '844',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You\'ve eliminated this entry successfully.',
			'lang_text' => 'You\'ve eliminated this entry successfully.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '845',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You\'ve selected the winner, Proceed to activity section for your final work to be received.',
			'lang_text' => 'You\'ve selected the winner, Proceed to activity section for your final work to be received.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '846',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Error occured. Please try again later.',
			'lang_text' => 'Error occured. Please try again later.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '847',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'You\'ve approved the winner.',
			'lang_text' => 'You\'ve approved the winner.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '848',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Unable to process your request.',
			'lang_text' => 'Unable to process your request.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '849',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Please enter a valid URL.',
			'lang_text' => 'Please enter a valid URL.',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '850',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'This field cannot be left blank',
			'lang_text' => 'This field cannot be left blank',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '851',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contests / Entries',
			'lang_text' => 'Contests / Entries',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '852',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Select Range',
			'lang_text' => 'Select Range',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '853',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Submit a Comment',
			'lang_text' => 'Submit a Comment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '854',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Please Select',
			'lang_text' => 'Please Select',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '855',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'User',
			'lang_text' => 'User',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '856',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Search',
			'lang_text' => 'Search',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '857',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Select',
			'lang_text' => 'Select',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '858',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Created',
			'lang_text' => 'Created',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '859',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Comment',
			'lang_text' => 'Comment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '860',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'IP',
			'lang_text' => 'IP',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '861',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No contestComments available',
			'lang_text' => 'No contestComments available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '862',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Select:',
			'lang_text' => 'Select:',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '863',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '-- More actions --',
			'lang_text' => '-- More actions --',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '864',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '[Image: %s]',
			'lang_text' => '[Image: %s]',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '865',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Recommended',
			'lang_text' => 'Recommended',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '866',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Contest Comments available',
			'lang_text' => 'No Contest Comments available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '867',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Id',
			'lang_text' => 'Id',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '868',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Modified',
			'lang_text' => 'Modified',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '869',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Ip',
			'lang_text' => 'Ip',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '870',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Admin Suspend',
			'lang_text' => 'Admin Suspend',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '871',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Is System Flagged',
			'lang_text' => 'Is System Flagged',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '872',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Detected Suspicious Words',
			'lang_text' => 'Detected Suspicious Words',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '873',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'posted %s',
			'lang_text' => 'posted %s',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '874',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'said',
			'lang_text' => 'said',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '875',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Contest Flag Categories available',
			'lang_text' => 'No Contest Flag Categories available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '876',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Flag This Contest',
			'lang_text' => 'Flag This Contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '877',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Username',
			'lang_text' => 'Username',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '878',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Flag Category',
			'lang_text' => 'Flag Category',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '879',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Posted on',
			'lang_text' => 'Posted on',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '880',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'whois',
			'lang_text' => 'whois',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '881',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Contest Flags available',
			'lang_text' => 'No Contest Flags available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '882',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Contest Followers available',
			'lang_text' => 'No Contest Followers available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '883',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Liked Contests',
			'lang_text' => 'Liked Contests',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '884',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Title',
			'lang_text' => 'Contest Title',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '885',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Ends',
			'lang_text' => 'Ends',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '886',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Package',
			'lang_text' => 'Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '887',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Winner',
			'lang_text' => 'Winner',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '888',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Unlike',
			'lang_text' => 'Unlike',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '889',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Name',
			'lang_text' => 'Name',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '890',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Contest Statuses available',
			'lang_text' => 'No Contest Statuses available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '891',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Global',
			'lang_text' => 'Global',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '892',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Form Fields',
			'lang_text' => 'Form Fields',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '893',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Available Packages',
			'lang_text' => 'Available Packages',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '894',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contests Posted',
			'lang_text' => 'Contests Posted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '895',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entries Posted',
			'lang_text' => 'Entries Posted',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '896',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Revenue ($)',
			'lang_text' => 'Revenue ($)',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '897',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Prize / Maximum entries',
			'lang_text' => 'Prize / Maximum entries',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '898',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Pricing',
			'lang_text' => 'Pricing',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '899',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Preview',
			'lang_text' => 'Preview',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '900',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Prize',
			'lang_text' => 'Contest Prize',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '901',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Create new contest prize',
			'lang_text' => 'Create new contest prize',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '902',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '%s Commision (%%)',
			'lang_text' => '%s Commision (%%)',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '903',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Create new contest days',
			'lang_text' => 'Create new contest days',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '904',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Grouping',
			'lang_text' => 'Grouping',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '905',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Pricing Group',
			'lang_text' => 'Add Pricing Group',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '906',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Pricing Group',
			'lang_text' => 'Edit Pricing Group',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '907',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Delete Pricing Group',
			'lang_text' => 'Delete Pricing Group',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '908',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No groups available',
			'lang_text' => 'No groups available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '909',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Package',
			'lang_text' => 'Add Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '910',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'saved',
			'lang_text' => 'saved',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '911',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Edit Pricing Package',
			'lang_text' => 'Edit Pricing Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '912',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Delete Pricing Package',
			'lang_text' => 'Delete Pricing Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '913',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No packages available',
			'lang_text' => 'No packages available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '914',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No contest types available',
			'lang_text' => 'No contest types available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '915',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Types',
			'lang_text' => 'Contest Types',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '916',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'What do you want launch?',
			'lang_text' => 'What do you want launch?',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '917',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Brief',
			'lang_text' => 'Contest Brief',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '918',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Payment',
			'lang_text' => 'Payment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '919',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Types Pricing Packages',
			'lang_text' => 'Contest Types Pricing Packages',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '920',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Contest Types Pricing Packages available',
			'lang_text' => 'No Contest Types Pricing Packages available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '921',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Type',
			'lang_text' => 'Contest Type',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '922',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Pricing Package',
			'lang_text' => 'Pricing Package',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '923',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Price',
			'lang_text' => 'Price',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '924',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Contest Types Pricing Requirements',
			'lang_text' => 'Contest Types Pricing Requirements',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '925',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Contest Types Pricing Requirements available',
			'lang_text' => 'No Contest Types Pricing Requirements available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '926',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Pricing Requirement',
			'lang_text' => 'Pricing Requirement',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '927',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Downloaded Time',
			'lang_text' => 'Downloaded Time',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '928',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry',
			'lang_text' => 'Entry',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '929',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Guest',
			'lang_text' => 'Guest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '930',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'N/A',
			'lang_text' => 'N/A',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '931',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No User Views available',
			'lang_text' => 'No User Views available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '932',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Flag Count',
			'lang_text' => 'Entry Flag Count',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '933',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Entry Flag Categories available',
			'lang_text' => 'No Entry Flag Categories available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '934',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Flag This Contest Entry',
			'lang_text' => 'Flag This Contest Entry',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '935',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'ContestUser',
			'lang_text' => 'ContestUser',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '936',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Contest User Flags available',
			'lang_text' => 'No Contest User Flags available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '937',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Contest User Rating',
			'lang_text' => 'Add Contest User Rating',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '938',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Rating',
			'lang_text' => 'Rating',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '939',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No contest entries available',
			'lang_text' => 'No contest entries available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '940',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Stars',
			'lang_text' => 'Stars',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '941',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '1 star out of 5',
			'lang_text' => '1 star out of 5',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '942',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '2 star out of 5',
			'lang_text' => '2 star out of 5',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '943',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '3 star out of 5',
			'lang_text' => '3 star out of 5',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '944',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '4 star out of 5',
			'lang_text' => '4 star out of 5',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '945',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '5 star out of 5',
			'lang_text' => '5 star out of 5',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '946',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Contest User Ratings available',
			'lang_text' => 'No Contest User Ratings available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '947',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add Your Entry',
			'lang_text' => 'Add Your Entry',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '948',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Average Rating',
			'lang_text' => 'Average Rating',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '949',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Select as winner',
			'lang_text' => 'Select as winner',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '950',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Withdrawan',
			'lang_text' => 'Withdrawan',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '951',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Click to view',
			'lang_text' => 'Click to view',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '952',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Won!!!',
			'lang_text' => 'Won!!!',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '953',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Add as Favorite',
			'lang_text' => 'Add as Favorite',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '954',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Remove from Favorite',
			'lang_text' => 'Remove from Favorite',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '955',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Flag this entry',
			'lang_text' => 'Flag this entry',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '956',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Select As Winner!',
			'lang_text' => 'Select As Winner!',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '957',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Select Winner!',
			'lang_text' => 'Select Winner!',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '958',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Withdraw This Entry',
			'lang_text' => 'Withdraw This Entry',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '959',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Eliminate This Entry',
			'lang_text' => 'Eliminate This Entry',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '960',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'View:',
			'lang_text' => 'View:',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '961',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Unrated',
			'lang_text' => 'Unrated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '962',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Rated',
			'lang_text' => 'Rated',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '963',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Sort:',
			'lang_text' => 'Sort:',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '964',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'By Rating',
			'lang_text' => 'By Rating',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '965',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'By Time',
			'lang_text' => 'By Time',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '966',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No Entries Available',
			'lang_text' => 'No Entries Available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '967',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Lost',
			'lang_text' => 'Lost',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '968',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'All Entries',
			'lang_text' => 'All Entries',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '969',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry Image',
			'lang_text' => 'Entry Image',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '970',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Posted date',
			'lang_text' => 'Posted date',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '971',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'View Count',
			'lang_text' => 'View Count',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '972',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Message Count',
			'lang_text' => 'Message Count',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '973',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'proceeds through this option to post your changes',
			'lang_text' => 'proceeds through this option to post your changes',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '974',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Flag this user',
			'lang_text' => 'Flag this user',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '975',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Prev',
			'lang_text' => 'Prev',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '976',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Previous',
			'lang_text' => 'Previous',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '977',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Next',
			'lang_text' => 'Next',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '978',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Entry #',
			'lang_text' => 'Entry #',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '979',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => ' from',
			'lang_text' => ' from',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '980',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Report Abuse',
			'lang_text' => 'Report Abuse',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '981',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'View all',
			'lang_text' => 'View all',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '982',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Flip In',
			'lang_text' => 'Flip In',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '983',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Flip Out',
			'lang_text' => 'Flip Out',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '984',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Discussions',
			'lang_text' => 'Discussions',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '985',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Date',
			'lang_text' => 'Date',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '986',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Start',
			'lang_text' => 'Start',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '987',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'End',
			'lang_text' => 'End',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '988',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Prize',
			'lang_text' => 'Prize',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '989',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Site Revenue',
			'lang_text' => 'Site Revenue',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '990',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Any Time Contest',
			'lang_text' => 'Any Time Contest',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '991',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'No contests available',
			'lang_text' => 'No contests available',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '992',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Inprocess',
			'lang_text' => 'Inprocess',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '993',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Closed',
			'lang_text' => 'Closed',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '994',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Step 1. What do you want launch?',
			'lang_text' => 'Step 1. What do you want launch?',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '995',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Step 2. Contest Brief',
			'lang_text' => 'Step 2. Contest Brief',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '996',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Step 3. Payment',
			'lang_text' => 'Step 3. Payment',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '997',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Total Fee',
			'lang_text' => 'Total Fee',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '998',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'This payment transacts in ',
			'lang_text' => 'This payment transacts in ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '999',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => '. Your total charge is ',
			'lang_text' => '. Your total charge is ',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
		array(
			'id' => '1000',
			'created' => '2012-04-17 02:29:48',
			'modified' => '2012-04-17 02:29:48',
			'language_id' => '42',
			'key' => 'Select Payment Type',
			'lang_text' => 'Select Payment Type',
			'is_translated' => 0,
			'is_google_translate' => 0,
			'is_verified' => 0
		),
	);
}
