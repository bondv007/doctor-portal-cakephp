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
			'id' => '1',
			'created' => '2010-05-10 11:01:23',
			'modified' => '2010-05-14 13:05:28',
			'payment_gateway_id' => '1',
			'key' => 'payee_account',
			'type' => 'text',
			'options' => '',
			'test_mode_value' => 'fivult_1286256894_biz@gmail.com',
			'live_mode_value' => 'fivult_1286256894_biz@gmail.com',
			'description' => 'PayPal merchant account email'
		),
		array(
			'id' => '2',
			'created' => '2010-07-15 12:21:33',
			'modified' => '2010-07-15 12:21:33',
			'payment_gateway_id' => '1',
			'key' => 'adaptive_API_AppID',
			'type' => 'text',
			'options' => '',
			'test_mode_value' => 'APP-80W284485P519543T',
			'live_mode_value' => 'APP-80W284485P519543T',
			'description' => ''
		),
		array(
			'id' => '3',
			'created' => '2010-07-15 12:20:23',
			'modified' => '2010-07-15 12:20:23',
			'payment_gateway_id' => '1',
			'key' => 'adaptive_API_Signature',
			'type' => 'text',
			'options' => '',
			'test_mode_value' => 'ANgb92k0vEv.ipPykPk1BD8jS5GtAdHsMnvLNeBMEAZDtFHmfCMV4fMA',
			'live_mode_value' => 'ANgb92k0vEv.ipPykPk1BD8jS5GtAdHsMnvLNeBMEAZDtFHmfCMV4fMA',
			'description' => ''
		),
		array(
			'id' => '4',
			'created' => '2010-07-15 12:21:33',
			'modified' => '2010-07-15 12:21:33',
			'payment_gateway_id' => '1',
			'key' => 'adaptive_API_Password',
			'type' => 'text',
			'options' => '',
			'test_mode_value' => 'CENY57NXUHHXD2PB',
			'live_mode_value' => 'CENY57NXUHHXD2PB',
			'description' => ''
		),
		array(
			'id' => '5',
			'created' => '2010-07-15 12:21:33',
			'modified' => '2010-07-15 12:21:33',
			'payment_gateway_id' => '1',
			'key' => 'adaptive_API_UserName',
			'type' => 'text',
			'options' => '',
			'test_mode_value' => 'fivult_1286256894_biz_api1.gmail.com',
			'live_mode_value' => 'fivult_1286256894_biz_api1.gmail.com',
			'description' => ''
		),
		array(
			'id' => '6',
			'created' => '2010-10-18 18:52:07',
			'modified' => '2010-10-18 18:52:09',
			'payment_gateway_id' => '1',
			'key' => 'MRB_ID',
			'type' => 'text',
			'options' => '',
			'test_mode_value' => 'M264XXWYC7T7N',
			'live_mode_value' => 'M264XXWYC7T7N',
			'description' => 'Merchant Referral Bonus ID'
		),
		array(
			'id' => '7',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'payment_gateway_id' => '1',
			'key' => 'is_enable_for_add_to_wallet',
			'type' => 'checkbox',
			'options' => '',
			'test_mode_value' => '0',
			'live_mode_value' => '0',
			'description' => ''
		),
		array(
			'id' => '8',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'payment_gateway_id' => '1',
			'key' => 'is_enable_for_contest_listing',
			'type' => 'checkbox',
			'options' => '',
			'test_mode_value' => '0',
			'live_mode_value' => '0',
			'description' => ''
		),
		array(
			'id' => '9',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'payment_gateway_id' => '1',
			'key' => 'is_enable_for_signup',
			'type' => 'checkbox',
			'options' => '',
			'test_mode_value' => '0',
			'live_mode_value' => '0',
			'description' => 'Enable/Disable the current payment option for signup.'
		),
	);
}
