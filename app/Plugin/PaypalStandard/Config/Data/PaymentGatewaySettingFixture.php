<?php
/**
 * PaymentGatewaySettingFixture
 *
 */
class PaymentGatewaySettingFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'payment_gateway_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20),
		'key' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 256, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'options' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'comment' => 'Its only use, when we select type = select. Here we can give otpions value', 'charset' => 'utf8'),
		'test_mode_value' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'live_mode_value' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'id' => '11',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'payment_gateway_id' => '3',
			'key' => 'is_enable_for_signup',
			'type' => 'checkbox',
			'options' => '',
			'test_mode_value' => '0',
			'live_mode_value' => '0',
			'description' => 'Enable/Disable the current payment option for signup.'
		),
		array(
			'id' => '12',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'payment_gateway_id' => '3',
			'key' => 'is_enable_for_contest_listing',
			'type' => 'checkbox',
			'options' => '',
			'test_mode_value' => '0',
			'live_mode_value' => '0',
			'description' => ''
		),
		array(
			'id' => '13',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'payment_gateway_id' => '3',
			'key' => 'is_enable_for_add_to_wallet',
			'type' => 'checkbox',
			'options' => '',
			'test_mode_value' => '0',
			'live_mode_value' => '0',
			'description' => ''
		),
		array(
			'id' => '14',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'payment_gateway_id' => '3',
			'key' => 'payee_account',
			'type' => 'text',
			'options' => '',
			'test_mode_value' => 'fivult_1286256894_biz@gmail.com',
			'live_mode_value' => 'fivult_1286256894_biz@gmail.com',
			'description' => 'PayPal merchant account email'
		),
	);
}
