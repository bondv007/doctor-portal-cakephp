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
			'id' => '1',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '0',
			'name' => 'System',
			'description' => 'Manage site name, contact email, from email, reply to email.'
		),
		array(
			'id' => '2',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '0',
			'name' => 'Developments',
			'description' => 'Manage Maintenance mode.'
		),
		array(
			'id' => '3',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '0',
			'name' => 'SEO',
			'description' => 'Manage content, meta data and other information relevant to browsers or search engines'
		),
		array(
			'id' => '4',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '0',
			'name' => 'Regional, Currency & Language',
			'description' => 'Manage site default language, currency, date-time format'
		),
		array(
			'id' => '5',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '0',
			'name' => 'Account',
			'description' => 'Manage different type of login option such as Facebook, Twitter and OpenID'
		),
		array(
			'id' => '11',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '0',
			'name' => 'Suspicious Words Detector',
			'description' => 'Manage Suspicious word detector feature, Auto suspend contest on system flag, Auto suspend message on system flag.'
		),
		array(
			'id' => '12',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '0',
			'name' => 'Messages',
			'description' => 'Manage and configure settings such as email notification, send message option.'
		),
		array(
			'id' => '13',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '0',
			'name' => 'CDN',
			'description' => 'Manage CDN server settings which is used to store the Images, CSS and JavaScript. So all the above will be loaded from CDN server to your site.'
		),
		/*array(
			'id' => '15',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '0',
			'name' => 'Third Party API',
			'description' => 'Manage third party settings such as Facebook, Twitter, Gmail, Yahoo for authentication.'
		),*/
		array(
			'id' => '21',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '1',
			'name' => 'Site Information',
			'description' => 'Here you can modify site related settings such as site name.'
		),
		array(
			'id' => '22',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '1',
			'name' => 'E-mails',
			'description' => 'Here you can modify email related settings such as contact email, from email, reply-to email.'
		),
		array(
			'id' => '23',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '2',
			'name' => 'Server',
			'description' => 'Here you can change server settings such as maintenance mode.'
		),
		array(
			'id' => '24',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '3',
			'name' => 'Metadata',
			'description' => 'Here you can set metadata settings such as meta keyword and description.'
		),
		array(
			'id' => '25',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '3',
			'name' => 'SEO',
			'description' => 'Here you can set SEO settings such as inserting tracker code and robots.'
		),
		array(
			'id' => '26',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '4',
			'name' => 'Regional',
			'description' => 'Here you can change regional setting such as site language.'
		),
		array(
			'id' => '27',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '4',
			'name' => 'Date and Time',
			'description' => 'Here you can modify date time settings such as timezone, date time format.'
		),
		array(
			'id' => '28',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '4',
			'name' => 'Currency Settings',
			'description' => 'Here you can modify site currency settings such as currency position, default currency and conversion currency.'
		),
		array(
			'id' => '29',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '5',
			'name' => 'Logins',
			'description' => 'Here you can modify user login settings such as enabling 3rd party logins and other login options.'
		),
		array(
			'id' => '30',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '5',
			'name' => 'Account Settings',
			'description' => 'Here you can modify account settings such as admin approval, email verification, and other site account settings.'
		),
		array(
			'id' => '31',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '5',
			'name' => 'Configuration',
			'description' => 'Here you can modify option to change language for user.'
		),
		array(
			'id' => '41',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '11',
			'name' => 'Configuration',
			'description' => '<p>Here you can update the Suspicious Words Detector related settings.</p> <p>Here you can place various words, which accepts regular expressions also, to match with your terms and policies. </p> <h4>Common Regular expressions</h4> <dl class="list clearfix"> <dt>Email</dt> <dd>\\w+([-+.]\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*([,;]\\s*\\w+([-+.]\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*)*</dd> <dt>Phone Number</dt> <dd>^0[234679]{1}[\\s]{0,1}[\\-]{0,1}[\\s]{0,1}[1-9]{1}[0-9]{6}$</dd> <dt>URL</dt> <dd>((https?|ftp|gopher|telnet|file|notes|ms-help):((//)|(\\\\\\\\))+[\\w\\d:#@%/;$()~_?\\+-=\\\\\\.&]*)</dd> </dl>'
		),
		array(
			'id' => '42',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '11',
			'name' => 'Auto Suspend Module',
			'description' => 'Here you can modify auto suspend modules as contests and messages.'
		),
		array(
			'id' => '43',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '12',
			'name' => 'Configuration',
			'description' => 'Here you modify message settings such as send message options and other message related settings.'
		),
		array(
			'id' => '44',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '13',
			'name' => 'Configuration',
			'description' => ''
		),
		array(
			'id' => '45',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '14',
			'name' => 'Configuration',
			'description' => 'Here you can modify affiliate related settings such as enabling affiliate and referral expire time.'
		),
		array(
			'id' => '46',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '14',
			'name' => 'Commission',
			'description' => 'Here you can modify affiliate related commission settings such as commission holding period, commission pay type settings.'
		),
		array(
			'id' => '47',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '14',
			'name' => 'Withdrawal',
			'description' => 'Here you can modify affiliate withdrawal settings such as threshold limit, transaction fee settings.'
		),
		array(
			'id' => '48',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '15',
			'name' => 'Facebook',
			'description' => 'Facebook is used for login and posting message using its account details. For doing above, our site must be configured with existing Facebook account. '
		),
		array(
			'id' => '49',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '15',
			'name' => 'Twitter',
			'description' => 'Twitter is used for login and posting message using its account details. For doing above, our site must be configured with existing Twitter account.'
		),
		array(
			'id' => '51',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '16',
			'name' => 'Module',
			'description' => 'Here you can modify module settings such as enabling/disabling master modules settings.'
		),
		array(
			'id' => '53',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '1',
			'name' => 'Watermark',
			'description' => ''
		),
		array(
			'id' => '54',
			'created' => '0000-00-00 00:00:00',
			'modified' => '0000-00-00 00:00:00',
			'parent_id' => '1',
			'name' => 'Alternate Name',
			'description' => 'Here you can modify the alternate name for freelancer and employer. '
		),
		array(
			'id' => '55',
			'created' => '2012-04-03 15:14:55',
			'modified' => '2012-04-03 15:15:05',
			'parent_id' => '15',
			'name' => 'Thumbalizr',
			'description' => 'Register in this URL <a href="http://www.thumbalizr.com/apitools.php">http://www.thumbalizr.com/apitools.php</a> and get API key'
		),
	);
}
