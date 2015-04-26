<?php
/**
 * PaymentGatewayFixture
 *
 */
class PaymentGatewayFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'display_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'gateway_fees' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '10,2'),
		'transaction_count' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 20),
		'payment_gateway_setting_count' => array('type' => 'integer', 'null' => true, 'default' => '0', 'length' => 20),
		'is_test_mode' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
		'is_active' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'is_mass_pay_enabled' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
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
			'id' => '3',
			'created' => NULL,
			'modified' => NULL,
			'name' => 'PayPal Standard',
			'display_name' => 'PayPal Standard',
			'description' => 'PayPal is an electronic money service which allows you to make payment to anyone online. ',
			'gateway_fees' => NULL,
			'transaction_count' => '0',
			'payment_gateway_setting_count' => '0',
			'is_test_mode' => 0,
			'is_active' => 0,
			'is_mass_pay_enabled' => 0
		),
	);
}
