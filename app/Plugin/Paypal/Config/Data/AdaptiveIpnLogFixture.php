<?php
/**
 * AdaptiveIpnLogFixture
 *
 */
class AdaptiveIpnLogFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'ip' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'post_variable' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'created' => '2012-03-12 10:21:07',
			'modified' => '2012-03-12 10:21:07',
			'ip' => '127.0.0.1',
			'post_variable' => '_method=POST&data[_Token][key]=c046f4c26a2fa50134b89b0244cd070ffc4f4586&data[_Token][fields]=c3e86cdfe59f52ad19b422863e0742743142eb7f%253AContest.id&data[_Token][unlocked]=Payment.connect%257CPayment.normal%257CPayment.payment_type%257CPayment.wallet&data[Contest][id]=14&data[Payment][payment_gateway_id]=2&'
		),
	);
}
