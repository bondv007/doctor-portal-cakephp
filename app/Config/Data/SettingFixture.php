<?php
/**
 * SettingFixture
 *
 */
class SettingFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'setting_category_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'setting_category_parent_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'value' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 8, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'options' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'label' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'order' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'setting_category_id' => array('column' => 'setting_category_id', 'unique' => 0), 'name' => array('column' => 'name', 'unique' => 0), 'setting_category_parent_id' => array('column' => 'setting_category_parent_id', 'unique' => 0)),
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
			'setting_category_id' => '21',
			'setting_category_parent_id' => '1',
			'name' => 'site.name',
			'value' => 'SER/112MED',
			'description' => 'This name will be used in all pages, emails.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Name',
			'order' => '1'
		),
		array(
			'id' => '2',
			'setting_category_id' => '22',
			'setting_category_parent_id' => '1',
			'name' => 'EmailTemplate.admin_email',
			'value' => 'productdemo.admin+contact+112med@gmail.com',
			'description' => 'This is the email address to which you will receive the mail from contact form.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Contact Email Address',
			'order' => '3'
		),
		array(
			'id' => '3',
			'setting_category_id' => '22',
			'setting_category_parent_id' => '1',
			'name' => 'EmailTemplate.from_email',
			'value' => 'productdemo.admin+noreply+112med@gmail.com',
			'description' => 'This is the email address that will appear in the "From" field of all emails sent from the site.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'From Email Address',
			'order' => '0'
		),
		array(
			'id' => '4',
			'setting_category_id' => '22',
			'setting_category_parent_id' => '1',
			'name' => 'EmailTemplate.reply_to_email',
			'value' => '',
			'description' => '"Reply-To" email header for all emails. Leave it empty to receive replies as usual (to "From" email address).',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Reply to Email Address',
			'order' => '0'
		),
		array(
			'id' => '5',
			'setting_category_id' => '54',
			'setting_category_parent_id' => '1',
			'name' => 'site.contest_holder_alternate_name',
			'value' => 'Contest Holder',
			'description' => 'Alternate name for contest holder which will be displayed throughout the site.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Contest holder Alternate Name',
			'order' => '0'
		),
		array(
			'id' => '6',
			'setting_category_id' => '54',
			'setting_category_parent_id' => '1',
			'name' => 'site.participant_alternate_name',
			'value' => 'Participant',
			'description' => 'Alternate name for participant which will be displayed throughout the site.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Participant Alternate Name',
			'order' => '0'
		),
		array(
			'id' => '16',
			'setting_category_id' => '23',
			'setting_category_parent_id' => '2',
			'name' => 'site.maintenance_mode',
			'value' => '0',
			'description' => 'On enabling this feature, only administrator can access the site (e.g., http://yourdomain.com/admin). Users will see a temporary page until you return to turn this off. (Turn this on, whenever you need to perform maintenance in the site.)',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Maintenance Mode',
			'order' => '16'
		),
		array(
			'id' => '21',
			'setting_category_id' => '24',
			'setting_category_parent_id' => '3',
			'name' => 'meta.keywords',
			'value' => 'dev1',
			'description' => 'These are the keywords used for improving search engine results of our site. (Comma separated for multiple keywords.)',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Keywords',
			'order' => '1'
		),
		array(
			'id' => '22',
			'setting_category_id' => '24',
			'setting_category_parent_id' => '3',
			'name' => 'meta.description',
			'value' => 'dev1 framework',
			'description' => 'This is the short description of your site, used by search engines on search result pages to display preview snippets for a given page.',
			'type' => 'textarea',
			'options' => NULL,
			'label' => 'Description',
			'order' => '2'
		),
		array(
			'id' => '23',
			'setting_category_id' => '25',
			'setting_category_parent_id' => '3',
			'name' => 'site.tracking_script',
			'value' => '',
			'type' => 'textarea',
			'options' => NULL,
			'label' => 'Site Tracker Code',
			'order' => '15'
		),
		array(
			'id' => '24',
			'setting_category_id' => '25',
			'setting_category_parent_id' => '3',
			'name' => 'site.robots',
			'value' => NULL,
			'description' => 'Content for robots.txt; (search engine) robots specific instructions. Refer,<a href="http://www.robotstxt.org/">http://www.robotstxt.org/</a> for syntax and usage.',
			'type' => 'textarea',
			'options' => NULL,
			'label' => 'robots.txt',
			'order' => '17'
		),
		array(
			'id' => '31',
			'setting_category_id' => '27',
			'setting_category_parent_id' => '4',
			'name' => 'site.date.format',
			'value' => '%b %d, %Y',
			'description' => 'This is the date format which is displayed in our site.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Date Format',
			'order' => '6'
		),
		array(
			'id' => '32',
			'setting_category_id' => '27',
			'setting_category_parent_id' => '4',
			'name' => 'site.datetime.format',
			'value' => '%b %d, %Y %I:%M %p',
			'description' => 'This is the date-time format which is displayed in our site.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Date-Time Format',
			'order' => '12'
		),
		array(
			'id' => '33',
			'setting_category_id' => '27',
			'setting_category_parent_id' => '4',
			'name' => 'site.time.format',
			'value' => '%I:%M %p',
			'description' => 'This is the time format which is displayed in our site.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Time Format',
			'order' => '10'
		),
		array(
			'id' => '34',
			'setting_category_id' => '27',
			'setting_category_parent_id' => '4',
			'name' => 'site.date.tooltip',
			'value' => '%b %d, %Y %I:%M %p',
			'description' => 'This is the date tooltip format which is displayed in our site.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Date Tooltip Format',
			'order' => '8'
		),
		array(
			'id' => '35',
			'setting_category_id' => '27',
			'setting_category_parent_id' => '4',
			'name' => 'site.time.tooltip',
			'value' => '%B %d, %Y (%A) %Z',
			'description' => 'This is the time tooltip format which is displayed in our site.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Time Tooltip Format',
			'order' => '11'
		),
		array(
			'id' => '36',
			'setting_category_id' => '27',
			'setting_category_parent_id' => '4',
			'name' => 'site.datetime.tooltip',
			'value' => '%B %d, %Y %I:%M:%S %p (%A) %Z',
			'description' => 'This is the date-time tooltip format which is displayed in our site.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Date-Time Tooltip Format',
			'order' => '13'
		),
		array(
			'id' => '37',
			'setting_category_id' => '26',
			'setting_category_parent_id' => '4',
			'name' => 'site.language',
			'value' => 'en',
			'description' => 'The selected language will be used as default language all over the site (also for emails)',
			'type' => 'select',
			'options' => NULL,
			'label' => 'Site Language',
			'order' => '3'
		),
		array(
			'id' => '38',
			'setting_category_id' => '28',
			'setting_category_parent_id' => '4',
			'name' => 'site.currency_symbol_place',
			'value' => 'left',
			'description' => 'The selected position will be used as default currency symbol position all over the site (also for emails)',
			'type' => 'select',
			'options' => 'left,right',
			'label' => 'Currency Symbol Position',
			'order' => '4'
		),
		array(
			'id' => '39',
			'setting_category_id' => '28',
			'setting_category_parent_id' => '4',
			'name' => 'site.currency_code',
			'value' => 'USD',
			'description' => 'The selected currency will be used as site default transaction currency. (All payments, transaction will use this currency).',
			'type' => 'select',
			'options' => 'AUD,BRL,CAD,CZK,DKK,EUR,HKD,HUF,ILS,JPY,MXN,NOK,NZD,PHP,PLN,GBP,SGD,SEK,CHF,TWD,THB,USD',
			'label' => 'Default Transaction Currency',
			'order' => '5'
		),
		array(
			'id' => '40',
			'setting_category_id' => '27',
			'setting_category_parent_id' => '4',
			'name' => 'site.datetimehighlight.tooltip',
			'value' => '%B %d, %Y %I:%M:%S %p (%A) %Z',
			'description' => 'This is the date-time-hilight tooltip format which is displayed in our site.',
			'type' => 'text',
			'options' => '',
			'label' => 'Date-Time-Hilight Tooltip Format',
			'order' => '14'
		),
		array(
			'id' => '51',
			'setting_category_id' => '29',
			'setting_category_parent_id' => '5',
			'name' => 'user.using_to_login',
			'value' => 'username',
			'description' => 'Users will be able to login with chosen login handle (username or email address) along with their password.',
			'type' => 'select',
			'options' => 'username, email',
			'label' => 'Login Handle',
			'order' => '1'
		),
		array(
			'id' => '52',
			'setting_category_id' => '30',
			'setting_category_parent_id' => '5',
			'name' => 'user.is_admin_activate_after_register',
			'value' => '0',
			'description' => 'On enabling this feature, admin need to approve each user after registration (User cannot login until admin approves)',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Administrator Approval After Registration',
			'order' => '2'
		),
		array(
			'id' => '53',
			'setting_category_id' => '30',
			'setting_category_parent_id' => '5',
			'name' => 'user.is_email_verification_for_register',
			'value' => '1',
			'description' => 'On enabling this feature, user need to verify their email address provided during registration. (User cannot login until email address is verified)',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Email Verification After Registration',
			'order' => '4'
		),
		array(
			'id' => '54',
			'setting_category_id' => '30',
			'setting_category_parent_id' => '5',
			'name' => 'user.is_auto_login_after_register',
			'value' => '1',
			'description' => 'On enabling this feature, users will be automatically logged-in after registration. (Only when "Email Verification" & "Admin Approval" is disabled)',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Auto Login After Registration',
			'order' => '5'
		),
		array(
			'id' => '55',
			'setting_category_id' => '30',
			'setting_category_parent_id' => '5',
			'name' => 'user.is_admin_mail_after_register',
			'value' => '1',
			'description' => 'On enabling this feature, notification mail will be sent to administrator on each registration.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Notify Administrator on Each Registration',
			'order' => '6'
		),
		array(
			'id' => '56',
			'setting_category_id' => '30',
			'setting_category_parent_id' => '5',
			'name' => 'user.is_welcome_mail_after_register',
			'value' => '1',
			'description' => 'On enabling this feature, users will receive a welcome mail after registration.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Sending Welcome Mail After Registration',
			'order' => '7'
		),
		array(
			'id' => '57',
			'setting_category_id' => '30',
			'setting_category_parent_id' => '5',
			'name' => 'user.is_logout_after_change_password',
			'value' => '1',
			'description' => 'On enabling this feature, users will be asked to log-in again.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Auto-Logout After Password Change',
			'order' => '8'
		),
		array(
			'id' => '58',
			'setting_category_id' => '29',
			'setting_category_parent_id' => '5',
			'name' => 'user.is_enable_openid',
			'value' => '1',
			'description' => 'On enabling this feature, users can authenticate their site account using OpenID.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable OpenID registration',
			'order' => '2'
		),
		array(
			'id' => '59',
			'setting_category_id' => '31',
			'setting_category_parent_id' => '5',
			'name' => 'user.is_allow_user_to_switch_language',
			'value' => '0',
			'description' => 'On enabling this feature, users can change site language to their choice.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable User to Switch Language',
			'order' => '14'
		),
		/*array(
			'id' => '60',
			'setting_category_id' => '29',
			'setting_category_parent_id' => '5',
			'name' => 'facebook.is_enabled_facebook_connect',
			'value' => '1',
			'description' => 'On enabling this feature, users can authenticate their site account using Facebook.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Facebook',
			'order' => '3'
		),*/
		array(
			'id' => '61',
			'setting_category_id' => '29',
			'setting_category_parent_id' => '5',
			'name' => 'twitter.is_enabled_twitter_connect',
			'value' => '1',
			'description' => 'On enabling this feature, users can authenticate their site account using Twitter.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Twitter',
			'order' => '4'
		),
		array(
			'id' => '136',
			'setting_category_id' => '41',
			'setting_category_parent_id' => '11',
			'name' => 'suspicious_detector.is_enabled',
			'value' => '1',
			'description' => 'On enabling this feature, system will check user inputs given in contests, contest comments and messages.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Suspicious Word Detector',
			'order' => '0'
		),
		array(
			'id' => '137',
			'setting_category_id' => '41',
			'setting_category_parent_id' => '11',
			'name' => 'suspicious_detector.suspiciouswords',
			'value' => 'stupid
fool
\\w+([-+.]\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*([,;]\\s*\\w+([-+.]\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*)*
^0[234679]{1}[\\s]{0,1}[\\-]{0,1}[\\s]{0,1}[1-9]{1}[0-9]{6}$',
			'description' => 'The suspicious words given will be matched with user given message and will be auto flagged if such words are found. (Note: Suspicious detection will be checked during property, request creation & send message. Detection words should be newline separated.)',
			'type' => 'textarea',
			'options' => NULL,
			'label' => 'Suspicious Words',
			'order' => '0'
		),
		array(
			'id' => '138',
			'setting_category_id' => '42',
			'setting_category_parent_id' => '11',
			'name' => 'suspicious_detector.auto_suspend_contest_on_system_flag',
			'value' => '1',
			'description' => 'Auto suspended contests will not display in site.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Auto Suspend Contest on System Flag',
			'order' => '0'
		),
		array(
			'id' => '139',
			'setting_category_id' => '42',
			'setting_category_parent_id' => '11',
			'name' => 'suspicious_detector.auto_suspend_contest_comment_on_system_flag',
			'value' => '1',
			'description' => 'Auto suspended contest comments will not display in site.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Auto Suspend Contest Comment on System Flag',
			'order' => '0'
		),
		array(
			'id' => '146',
			'setting_category_id' => '43',
			'setting_category_parent_id' => '12',
			'name' => 'messages.is_send_email_on_new_message',
			'value' => '1',
			'description' => 'On enabling this feature, users will be notified by an email for every new message.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Notify via Mail on New Message',
			'order' => '5'
		),
		array(
			'id' => '147',
			'setting_category_id' => '43',
			'setting_category_parent_id' => '12',
			'name' => 'messages.is_allow_send_messsage',
			'value' => '1',
			'description' => 'On disabling this feature, user cannot able to send message to other user in site.',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Enable Send Message Option',
			'order' => '3'
		),
		array(
			'id' => '148',
			'setting_category_id' => '43',
			'setting_category_parent_id' => '12',
			'name' => 'messages.thread_max_depth',
			'value' => '3',
			'description' => 'This is the maximum thread depth for the message',
			'type' => NULL,
			'options' => NULL,
			'label' => 'Thread Maximum Depth',
			'order' => '0'
		),
		array(
			'id' => '149',
			'setting_category_id' => '43',
			'setting_category_parent_id' => '12',
			'name' => 'messages.allow_all_users_to_comment_upto_status',
			'value' => 'Open',
			'description' => 'All user to comment up to selected level',
			'type' => 'select',
			'options' => 'Open,Judging,WinnerSelected,Completed',
			'label' => 'All user to comment up to limited level',
			'order' => '0'
		),
		array(
			'id' => '156',
			'setting_category_id' => '44',
			'setting_category_parent_id' => '13',
			'name' => 'cdn.js',
			'value' => '',
			'description' => 'This is base URL (including trailing slash) for CDN JavaScript. (e.g., http://js.yourdomain.com/)',
			'type' => 'text',
			'options' => NULL,
			'label' => 'CDN JS URL',
			'order' => '3'
		),
		array(
			'id' => '157',
			'setting_category_id' => '44',
			'setting_category_parent_id' => '13',
			'name' => 'cdn.css',
			'value' => '',
			'description' => 'This is base URL (including trailing slash) for CDN CSS. (e.g., http://css.yourdomain.com/)',
			'type' => 'text',
			'options' => NULL,
			'label' => 'CDN CSS URL',
			'order' => '2'
		),
		array(
			'id' => '158',
			'setting_category_id' => '44',
			'setting_category_parent_id' => '13',
			'name' => 'cdn.images',
			'value' => '',
			'description' => 'This is base URL (without trailing slash) for CDN images. (e.g., http://images.yourdomain.com)',
			'type' => 'text',
			'options' => NULL,
			'label' => 'CDN Image URL',
			'order' => '1'
		),
		array(
			'id' => '166',
			'setting_category_id' => '48',
			'setting_category_parent_id' => '15',
			'name' => 'facebook.fb_api_key',
			'value' => '131092380352047',
			'description' => 'This is the Facebook app key used for authentication and other Facebook related plugins support',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Application Key',
			'order' => '3'
		),
		array(
			'id' => '167',
			'setting_category_id' => '48',
			'setting_category_parent_id' => '15',
			'name' => 'facebook.fb_secrect_key',
			'value' => '71253516b24e028c16435f79e174780e',
			'description' => 'This is the Facebook secret key used for authentication and other Facebook related plugins support',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Secret Key',
			'order' => '4'
		),
		array(
			'id' => '168',
			'setting_category_id' => '49',
			'setting_category_parent_id' => '15',
			'name' => 'twitter.consumer_key',
			'value' => '0wJyGTqtaKqrhAxECYF3CQ',
			'description' => 'This is the consumer key used for authentication and posting on Twitter.',
			'type' => NULL,
			'options' => NULL,
			'label' => 'Consumer Key',
			'order' => '1'
		),
		array(
			'id' => '169',
			'setting_category_id' => '49',
			'setting_category_parent_id' => '15',
			'name' => 'twitter.consumer_secret',
			'value' => 'SInt3BYPA9oKugOajiMhXlJwzV7oYMfJyE9Znm64Mo',
			'description' => 'This is the consumer secret key used for authentication and posting on Twitter.',
			'type' => NULL,
			'options' => NULL,
			'label' => 'Consumer Secret Key',
			'order' => '2'
		),
		array(
			'id' => '170',
			'setting_category_id' => '48',
			'setting_category_parent_id' => '15',
			'name' => 'facebook.fb_app_id',
			'value' => '131092380352047',
			'description' => 'This is the application ID used in login and post.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Application ID',
			'order' => '1'
		),
		array(
			'id' => '172',
			'setting_category_id' => '49',
			'setting_category_parent_id' => '15',
			'name' => 'twitter.site_twitter_url',
			'value' => 'http://twitter.com/112med',
			'description' => 'This is the site Twitter URL used for displaying in the footer. (Replaced with city specific Twitter URL, if updated in cities)',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Twitter Account URL',
			'order' => '6'
		),
		array(
			'id' => '173',
			'setting_category_id' => '55',
			'setting_category_parent_id' => '15',
			'name' => 'thumbalizr.api_key',
			'value' => '10f120fae0432fb127374532eb875cc9',
			'description' => '',
			'type' => 'text',
			'options' => NULL,
			'label' => 'API Key',
			'order' => '0'
		),
		array(
			'id' => '174',
			'setting_category_id' => '48',
			'setting_category_parent_id' => '15',
			'name' => 'facebook.site_facebook_url',
			'value' => 'http://www.facebook.com/pages/112med/389938157697937?sk=wall',
			'description' => 'This is the site Facebook URL used displayed in the footer',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Facebook Account URL',
			'order' => '7'
		),
		array(
			'id' => '175',
			'setting_category_id' => '48',
			'setting_category_parent_id' => '15',
			'name' => 'facebook.fb_access_token',
			'value' => 'AAADwkDfjx7EBAEgmpoACd2IgiBDn9urquGtkfXoADb0OfqBKxUZCWBgSRWE4IYFhKgxrw5Y8WzBh0KKRjLCoMrM68nI3noYPQbf6B2wZDZD',
			'description' => 'This will be automatically updated when "Update Facebook Credentials" link is clicked. (Required for posting in Facebook)',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Access Token',
			'order' => '5'
		),
		array(
			'id' => '176',
			'setting_category_id' => '48',
			'setting_category_parent_id' => '15',
			'name' => 'facebook.fb_user_id',
			'value' => '100000235263789',
			'description' => 'This will be automatically updated when "Update Facebook Credentials" link is clicked. (Required for posting in Facebook)',
			'type' => 'text',
			'options' => '',
			'label' => 'User ID',
			'order' => '6'
		),
		array(
			'id' => '177',
			'setting_category_id' => '49',
			'setting_category_parent_id' => '15',
			'name' => 'twitter.site_user_access_key',
			'value' => 'BxqrMbQuAF3E3ZFlxCUKPBnCVCUjUJ3qQkyQ7RzbQ',
			'description' => 'This will be automatically updated when  "Update Twitter Credentials" link is clicked. 
(Required for posting in Twitter)',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Access Key',
			'order' => '3'
		),
		array(
			'id' => '178',
			'setting_category_id' => '49',
			'setting_category_parent_id' => '15',
			'name' => 'twitter.site_user_access_token',
			'value' => '75254727-03rz0TMFCQn669e9LDSPF3AEM7CyfuqVY14cZtcGo',
			'description' => 'This will be automatically updated when  "Update Twitter Credentials" link is clicked. 
(Required for posting in Twitter)',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Access Token',
			'order' => '4'
		),
		array(
			'id' => '179',
			'setting_category_id' => '49',
			'setting_category_parent_id' => '15',
			'name' => 'twitter.username',
			'value' => '112med',
			'description' => 'This is the Twitter username of the account has been created.',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Twitter Username',
			'order' => '5'
		),
		array(
			'id' => '180',
			'setting_category_id' => '28',
			'setting_category_parent_id' => '4',
			'name' => 'site.currency',
			'value' => '$',
			'description' => 'Currency for the site',
			'type' => 'text',
			'options' => NULL,
			'label' => 'Site Currency',
			'order' => '0'
		),
		array(
			'id' => '150',
			'setting_category_id' => '43',
			'setting_category_parent_id' => '12',
			'name' => 'message.is_send_external_message',
			'value' => '1',
			'description' => 'Allow users to receive external message. (users registered email address)',
			'type' => 'checkbox',
			'options' => NULL,
			'label' => 'Send external message',
			'order' => '2'
		),
		array(
			'id' => '151',
			'setting_category_id' => '43',
			'setting_category_parent_id' => '12',
			'name' => 'message.is_send_interal_message',
			'value' => '1',
			'description' => 'Allow users to receive internal message
(Disabling this will also disable the external message sending internally.)',
			'type' => 'checkbox',
			'options' => '',
			'label' => 'Send internal message',
			'order' => '1'
		),
		array(
			'id' => '197',
			'setting_category_id' => '15',
			'setting_category_parent_id' => '0',
			'name' => 'user.signup_fee_payer',
			'value' => 'User',
			'description' => NULL,
			'type' => 'radio',
			'options' => 'User, Site',
			'label' => 'Who will pay the membership gateway fee?',
			'order' => '2'
		),
		array(
			'id' => '196',
			'setting_category_id' => '15',
			'setting_category_parent_id' => '0',
			'name' => 'user.signup_fee',
			'value' => '10',
			'description' => 'User membership fee',
			'type' => 'text',
			'options' => NULL,
			'label' => 'User Membership Fee',
			'order' => '1'
		),
		array(
			'id' => '199',
			'setting_category_id' => '23',
			'setting_category_parent_id' => '2',
			'name' => 'site.look_up_url',
			'value' => 'http://whois.sc/',
			'description' => 'URL prefix
for whois lookup service. Will be used in whois links found in
##USER_LOGIN## pages to resolve users\' IP to where they are
from&mdash;often down to the city or neighborhood or country. This is
a security feature.',
			'type' => NULL,
			'options' => NULL,
			'label' => 'Whois Lookup URL',
			'order' => '0'
		),
		array(
			'id' => '200',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'Hook.bootstraps',
			'value' => 'Contests,Tinymce,Translation,Wallet,Withdrawals,Paypal,PaypalStandard',
			'description' => '',
			'type' => NULL,
			'options' => NULL,
			'label' => NULL,
			'order' => '0'
		),
		array(
			'id' => '201',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'site.theme',
			'value' => '',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '202',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'messages.content_length',
			'value' => '40',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '203',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'messages.page_size',
			'value' => '50',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '204',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'site.version',
			'value' => 'v1.0a1',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '205',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.big_thumb.height',
			'value' => '100',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '206',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.big_thumb.width',
			'value' => '100',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '207',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.medium_big_thumb.height',
			'value' => '121',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '208',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.medium_big_thumb.width',
			'value' => '152',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '209',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.medium_thumb.height',
			'value' => '50',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '210',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.medium_thumb.width',
			'value' => '50',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '211',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.micro_thumb.height',
			'value' => '18',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '212',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.micro_thumb.width',
			'value' => '18',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '213',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.normal_thumb.height',
			'value' => '53',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '214',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.normal_thumb.width',
			'value' => '67',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '215',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.small_big_thumb.height',
			'value' => '150',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '216',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.small_big_thumb.width',
			'value' => '150',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '217',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.small_thumb.height',
			'value' => '30',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '218',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.small_thumb.width',
			'value' => '30',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '219',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.very_big_thumb.height',
			'value' => '600',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '220',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.very_big_thumb.width',
			'value' => '600',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '224',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.slider_thumb.height',
			'value' => '80',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '225',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.slider_thumb.width',
			'value' => '80',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '226',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.entry_big_thumb.height',
			'value' => '400',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '227',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.entry_big_thumb.width',
			'value' => '350',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '228',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.participant_big_thumb.height',
			'value' => '92',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '229',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'thumb_size.participant_big_thumb.width',
			'value' => '117',
			'description' => '',
			'type' => '',
			'options' => '',
			'label' => '',
			'order' => '0'
		),
		array(
			'id' => '230',
			'setting_category_id' => '0',
			'setting_category_parent_id' => '0',
			'name' => 'ContestUser.is_handle_aspect',
			'value' => '1',
			'description' => 'Aspect ratio is allowed or not',
			'type' => 'checkbox',
			'options' => '',
			'label' => 'Handle aspect ratio?',
			'order' => '1'
		),
	);
}
