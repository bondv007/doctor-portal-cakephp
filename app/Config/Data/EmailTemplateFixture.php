<?php
/**
 * EmailTemplateFixture
 *
 */
class EmailTemplateFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'from' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'reply_to' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 150, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'subject' => array('type' => 'string', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email_content' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'email_variables' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1000, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'modified' => '2012-04-20 13:33:52',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'Forgot Password',
			'description' => 'we will send this mail, when
user submit the forgot password form.',
			'subject' => 'Forgot password',
			'email_content' => 'Hi ##USERNAME##,

A password reset request has been made for your user account at ##SITE_NAME##.

If you made this request, please click on
the following link:

##RESET_URL##

If you did not request this action and feel this is in error, please contact us.

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'USERNAME,RESET_URL,SITE_NAME'
		),
		array(
			'id' => '2',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:34:15',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'Activation Request',
			'description' => 'we will send this mail,
when user registering an account he/she will get an activation
request.',
			'subject' => 'Please activate your ##SITE_NAME## account',
			'email_content' => 'Hi ##USERNAME##,

Your account has been created. Please visit the following URL to activate your account.
##ACTIVATION_URL##

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'SITE_NAME,USERNAME,ACTIVATION_URL'
		),
		array(
			'id' => '3',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:34:40',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'New User Join',
			'description' => 'we will
send this mail to admin, when a new user registered in the site.',
			'subject' => 'New user joined in ##SITE_NAME## account',
			'email_content' => 'Hi,

A new user named "##USERNAME##" has joined in ##SITE_NAME## account.

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'SITE_NAME,USERNAME'
		),
		array(
			'id' => '4',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:34:58',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'Welcome Email',
			'description' => 'we will send this mail, when
user register in this site and get activate.',
			'subject' => 'Welcome to ##SITE_NAME##',
			'email_content' => 'Hi ##USERNAME##,

We wish to say a quick hello and thanks for registering at ##SITE_NAME##.

If you did not request this account and feel this is in error, please contact us at ##CONTACT_MAIL##

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'SITE_NAME, USERNAME, SUPPORT_EMAIL'
		),
		array(
			'id' => '5',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:35:54',
			'from' => '##FIRST_NAME####LAST_NAME## <##FROM_EMAIL##>',
			'reply_to' => '##FROM_EMAIL##',
			'name' => 'Contact Us',
			'description' => 'We will send this mail to admin, when user submit any
contact form.',
			'subject' => '[##SITE_NAME##] ##SUBJECT##',
			'email_content' => '##MESSAGE##

----------------------------------------------------
Telephone  : ##TELEPHONE##
IP             : ##IP##, ##SITE_ADDR##
Whois       : http://whois.sc/##IP##
URL          : ##FROM_URL##
----------------------------------------------------

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'FROM_URL, IP, TELEPHONE, MESSAGE, SITE_NAME, SUBJECT, FROM_EMAIL, LAST_NAME, FIRST_NAME'
		),
		array(
			'id' => '6',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:36:23',
			'from' => '"##SITE_NAME## (auto response)" ##NO_REPLY_EMAIL##',
			'reply_to' => '',
			'name' => 'Contact Us Auto Reply',
			'description' => 'we
will send this mail ti user, when user submit the contact us form.',
			'subject' => '[##SITE_NAME##] RE: ##SUBJECT##',
			'email_content' => 'Dear ##FIRST_NAME####LAST_NAME##,

Thanks for contacting us. We\'ll get back to you shortly.

Please do not reply to this automated response. If you have not contacted us and if you feel this is an error, please contact us through our site ##CONTACT_URL##

Thanks,
##SITE_NAME##
##SITE_URL##

------ On
##POST_DATE## you wrote from ##IP##
-----

##MESSAGE##

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'MESSAGE, POST_DATE, SITE_NAME, CONTACT_URL, FIRST_NAME, LAST_NAME, SUBJECT, SITE_URL'
		),
		array(
			'id' => '7',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:36:52',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'Membership Fee',
			'description' => 'Pay Membership Fee',
			'subject' => '[##SITE_NAME##] Pay Membership Fee',
			'email_content' => 'Dear ##USERNAME##,

You have successfully registered with our site ##SITE_NAME##. Please pay your membership fee for activate your account.

##MEMBERSHIP_URL##.

Note: If you paid membership fee then please ignore this email. Thanks for signup with us.

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'USERNAME,MEMBERSHIP_URL,SITE_NAME,SITE_URL'
		),
		array(
			'id' => '8',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:37:16',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'New Message',
			'description' => 'we will send this mail, when a
user get new message',
			'subject' => '##USERNAME## sent you a message on ##SITE_NAME##...',
			'email_content' => '##USERNAME## sent you a message.

--------------------
##MESSAGE##
--------------------

To reply to this message, follow the link
below:
##MESSAGE_LINK##

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'USERNAME,MESSAGE,MESSAGE_LINK,SITE_NAME'
		),
		array(
			'id' => '9',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:37:36',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'Admin User Add',
			'description' => 'we will send this mail to
user, when a admin add a new user.',
			'subject' => 'Welcome to ##SITE_NAME##',
			'email_content' => 'Hi ##USERNAME##,

##SITE_NAME## team added you as a user in ##SITE_NAME##.

Your account details.
##LOGINLABEL##:##USEDTOLOGIN##
Password:##PASSWORD##

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'SITE_NAME,USERNAME,PASSWORD, LOGINLABEL, USEDTOLOGIN'
		),
		array(
			'id' => '10',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:37:47',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'Admin User Active ',
			'description' => 'We will send this mail to
user, when user active   
by administator.',
			'subject' => 'Your ##SITE_NAME## account has been activated',
			'email_content' => 'Hi ##USERNAME##,

Your account has been activated.

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'SITE_NAME,USERNAME'
		),
		array(
			'id' => '11',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:38:01',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'Admin User Deactivate',
			'description' => 'We will send this mail
to user, when user deactive by administator.',
			'subject' => 'Your ##SITE_NAME## account has been deactivated',
			'email_content' => 'Hi ##USERNAME##,

Your ##SITE_NAME## account has been deactivated.

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'SITE_NAME,USERNAME'
		),
		array(
			'id' => '12',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:38:11',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'Admin User Delete',
			'description' => 'We will send this mail to
user, when user delete by administrator.',
			'subject' => 'Your ##SITE_NAME## account has been removed',
			'email_content' => 'Hi ##USERNAME##,

Your ##SITE_NAME## account has been removed.

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'SITE_NAME,USERNAME'
		),
		array(
			'id' => '13',
			'created' => '0000-00-00 00:00:00',
			'modified' => '2012-04-20 13:38:23',
			'from' => '##FROM_EMAIL##',
			'reply_to' => '##REPLY_TO_EMAIL##',
			'name' => 'Admin Change Password',
			'description' => 'we will send this mail
to user, when admin change user\'s password.',
			'subject' => 'Password changed',
			'email_content' => 'Hi ##USERNAME##,

Admin reset your password for your  ##SITE_NAME## account.

Your new password:
##PASSWORD##

Thanks,
##SITE_NAME##
##SITE_URL##',
			'email_variables' => 'SITE_NAME,PASSWORD,USERNAME'
		),
	);
}
