<?php
/* SVN: $Id: config.php 91 2008-07-08 13:13:19Z rajesh_04ag02 $ */
/**
 * Custom configurations
 */
if (!defined('DEBUG')) {
    define('DEBUG', 0);
    // permanent cache re1ated settings
    define('PERMANENT_CACHE_CHECK', (!empty($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR'] != '127.0.0.1') ? false : false);
    // site default language
    define('PERMANENT_CACHE_DEFAULT_LANGUAGE', 'en');
    // cookie variable name for site language
    define('PERMANENT_CACHE_COOKIE', 'user_language');
    // salt used in setcookie
    define('PERMANENT_CACHE_GZIP_SALT', 'e9a556134534545ab47c6c81c14f06c0b8sdfsdf');
    // sub admin is available in site or not
    define('PERMANENT_CACHE_HAVE_SUB_ADMIN', false);
    // Enable support for HTML5 History/State API
    // By enabling this, users will not see full page load
    define('IS_ENABLE_HTML5_HISTORY_API', false);
    // Force hashbang based URL for all browsers
    // When this is disabled, browsers that don't support History API (IE, etc) alone will use hashbang based URL. When enabled, all browsers--including links in Google search results will use hashbang based URL (similar to new Twitter).
    define('IS_ENABLE_HASHBANG_URL', false);
    $_is_hashbang_supported_bot = (!empty($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot') !== false);
    define('IS_HASHBANG_SUPPORTED_BOT', $_is_hashbang_supported_bot);
}
$config['debug'] = DEBUG;
$config['site']['license_key'] = 'enter you license here';
$config['site']['is_admin_settings_enabled'] = true;
// site actions that needs random attack protection...
$config['site']['_hashSecuredActions'] = array(
    'edit',
    'delete',
    'update',
    'download',
    'v',
    'reply',
    'request_refund',
	'my_account',
);
$config['photo']['file'] = array(
    'allowedMime' => array(
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    ) ,
    'allowedExt' => array(
        'jpg',
        'jpeg',
        'gif',
        'png'
    ) ,
    'allowedSize' => '5',
    'allowedSizeUnits' => 'MB',
    'allowEmpty' => false
);
$config['avatar']['file'] = array(
    'allowedMime' => array(
        'image/jpeg',
        'image/jpg',
        'image/gif',
        'image/png'
    ) ,
    'allowedExt' => array(
        'jpg',
        'jpeg',
        'gif',
        'png'
    ) ,
    'allowedSize' => '5',
    'allowedSizeUnits' => 'MB',
    'allowEmpty' => true
);
$config['WaterMark']['is_handle_aspect'] = 1;
$config['WaterMark']['is_not_allow_resize_beyond_original_size'] = 1;
$config['thumb_size.doctor_small_thumb']['width'] = 74;
$config['thumb_size.doctor_small_thumb']['height'] = 85;
$config['thumb_size.big_thumb']['width'] = 210;
$config['thumb_size.big_thumb']['height'] = 210;

// CDN...
$config['cdn']['images'] = null; // 'http://images.localhost/';
$config['cdn']['css'] = null; // 'http://static.localhost/';
/*
date_default_timezone_set('Asia/Calcutta');

Configure::write('Config.language', 'spa');
setlocale (LC_TIME, 'es');
*/
/*
** to do move to settings table
*/
if (method_exists('CmsHook', 'setExceptionUrl')) {
    CmsHook::setExceptionUrl(array(
        'nodes/home',
        'nodes/view',
        'nodes/term',
        'nodes/search',
        'users/register',
		'users/patient_register',
		'users/doctor_register',
        'users/login',
		'users/login_user',
		'users/enter_mobile_number',
		'users/verify_mobile_number',
        'users/logout',
        'users/reset',
        'users/forgot_password',
        'users/openid',
        'users/oauth_callback',
        'users/activation',
        'users/resend_activation',
        'users/view',
        'users/oauth_facebook',
		'users/confirmation',
		'users/index',
		'users/search',
		'users/detail_view',
		'users/select_insurance_plans',
		'users/select_specialty_diseases',
		'users/marker',
		'users/doctor_slots',
		'answers/index',
		'answers/index_all',
		'answers/view',
		'questions/view',
		'questions/index',
		'cities/view',
		'languages/index',
		'languages/change_language',
		'specialties/index',
		'specialty_diseases/update_diseases',
        'images/view',
        'contacts/view',
        'users/admin_login',
        'users/admin_logout',
        'devs/asset_css',
        'devs/asset_js',
        'crons/main',
        'contacts/add',
        'contacts/show_captcha',
        'payments/membership_pay_now',
        'payments/get_gateways',
		'appointments/appointment_info',
		'appointments/patient_info',
		'doctor_availabilities/doctor_calender',
		'user_reviews/patient_reviews'
    ));
}
