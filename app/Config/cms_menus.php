<?php
CmsNav::add('users', array(
    'title' => __l('Users') ,
	'is_hide_title' => 1,
    'column' => 2,
    'column_1' => 11,
    'url' => array(
        'admin' => true,
        'controller' => 'users',
        'action' => 'index',
    ) ,
    'user_action' => array(
        'admin_stats',
        'admin_logs'
    ) ,
    'icon-class' => 'admin-users',
    'weight' => 20,
    'children' => array(
         'Users' => array(
            'title' => __l('Users') ,
            'url' => '',
            'weight' => 15,
        ) ,
		'users' => array(
            'title' => __l('Users') ,
            'url' => array(
                'admin' => true,
                'controller' => 'users',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
		'User Plans' => array(
            'title' => __l('User Plans') ,
            'url' => '',
            'weight' => 15,
        ) ,
		'plans' => array(
            'title' => __l('Plans') ,
            'url' => array(
                'admin' => true,
                'controller' => 'plans',
                'action' => 'index',
            ) ,
            'weight' => 30,
        ) ,
        'Plan Users' => array(
            'title' => __l('Plan Users') ,
            'url' => array(
                'admin' => true,
                'controller' => 'plan_users',
                'action' => 'index',
            ) ,
            'weight' => 30,
        ) ,
		'Educations' => array(
            'title' => __l('Educations') ,
            'url' => '',
            'weight' => 15,
        ) ,
        'user_educations' => array(
            'title' => __l('User Educations') ,
            'url' => array(
                'admin' => true,
                'controller' => 'user_educations',
                'action' => 'index',
            ) ,
            'weight' => 20,
        ) ,
		'Reviews & Rating' => array(
            'title' => __l('Reviews & Rating') ,
            'url' => '',
            'weight' => 15,
        ) ,
        'user_reviews' => array(
            'title' => __l('User Reviews') ,
            'url' => array(
                'admin' => true,
                'controller' => 'user_reviews',
                'action' => 'index',
            ) ,
            'weight' => 30,
        ) ,
		'Insurance Companies' => array(
            'title' => __l('Insurance Companies') ,
            'url' => '',
            'weight' => 15,
        ) ,
		'insurance_companies' => array(
            'title' => __l('Insurance Companies') ,
            'url' => array(
                'admin' => true,
                'controller' => 'insurance_companies',
                'action' => 'index',
            ) ,
            'weight' => 30,
        ) ,
        'insurance_plans' => array(
            'title' => __l('Insurance Plans') ,
            'url' => array(
                'admin' => true,
                'controller' => 'insurance_plans',
                'action' => 'index',
            ) ,
            'weight' => 30,
        ) ,
		'Q & A' => array(
            'title' => __l('Q & A') ,
            'url' => '',
            'weight' => 15,
        ) ,
        'questions' => array(
            'title' => __l('Questions') ,
            'url' => array(
                'admin' => true,
                'controller' => 'questions',
                'action' => 'index',
            ) ,
            'weight' => 20,
        ) ,
        'answers' => array(
            'title' => __l('Answers') ,
            'url' => array(
                'admin' => true,
                'controller' => 'answers',
                'action' => 'index',
            ) ,
            'weight' => 30,
        ) ,
		'Activities' => array(
            'title' => __l('Activities') ,
            'url' => '',
            'weight' => 15,
        ) ,
        'user_logins' => array(
            'title' => __l('User Logins') ,
            'url' => array(
                'admin' => true,
                'controller' => 'user_logins',
                'action' => 'index',
            ) ,
            'weight' => 20,
        ) ,
        'user_views' => array(
            'title' => __l('User Views') ,
            'url' => array(
                'admin' => true,
                'controller' => 'user_views',
                'action' => 'index',
            ) ,
            'weight' => 30,
        ) ,
    ) ,
));
CmsNav::add('clinics', array(
    'title' => __l('Clinics') ,
    'url' => array(
        'admin' => true,
        'controller' => 'clinics',
        'action' => 'index',
    ) ,
    'icon-class' => 'admin-clinic',
    'weight' => 20,
    'children' => array(
        'clinics' => array(
            'title' => __l('Clinics') ,
            'url' => array(
                'admin' => true,
                'controller' => 'clinics',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
		'Add Clinic' => array(
            'title' => __l('Add Clinic') ,
            'url' => array(
                'admin' => true,
                'controller' => 'clinics',
                'action' => 'add',
            ) ,
            'weight' => 20,
        ) ,
    ) ,
));
CmsNav::add('Specialties', array(
    'title' => __l('Specialties') ,
    'url' => array(
        'admin' => true,
        'controller' => 'specialties',
        'action' => 'index',
    ) ,
    'icon-class' => 'admin-specialtity',
    'weight' => 20,
    'children' => array(
        'clinics' => array(
            'title' => __l('Doctor Specialties') ,
            'url' => array(
                'admin' => true,
                'controller' => 'specialties',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
		'Add Specialty' => array(
            'title' => __l('Add Specialty') ,
            'url' => array(
                'admin' => true,
                'controller' => 'specialties',
                'action' => 'add',
            ) ,
            'weight' => 20,
        ) ,
        'Diseases' => array(
            'title' => __l('Diseases') ,
            'url' => '',
            'weight' => 15,
        ) ,
        'Specialty Diseases' => array(
            'title' => __l('Specialty Diseases') ,
            'url' => array(
                'admin' => true,
                'controller' => 'specialty_diseases',
                'action' => 'index',
            ) ,
            'weight' => 20,
        ) ,
		'Add Specialty Disease' => array(
            'title' => __l('Add Specialty Disease') ,
            'url' => array(
                'admin' => true,
                'controller' => 'specialty_diseases',
                'action' => 'add',
            ) ,
            'weight' => 20,
        ) ,
    ) ,
));
CmsNav::add('Appointments', array(
    'title' => __l('Appointments') ,
    'url' => array(
        'admin' => true,
        'controller' => 'appointments',
        'action' => 'index',
    ) ,
    'icon-class' => 'admin-appointment',
    'weight' => 20,
    'children' => array(
        'Appointments' => array(
            'title' => __l('Appointments') ,
            'url' => array(
                'admin' => true,
                'controller' => 'appointments',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
    ) ,
));
/*CmsNav::add('affiliates', array(
    'title' => __l('Affiliates') ,
    'url' => array(
        'admin' => true,
        'controller' => 'affiliates',
        'action' => 'index',
    ) ,
    'icon-class' => 'admin-clinic',
    'weight' => 20,
    'children' => array(
        'affiliates' => array(
            'title' => __l('Affiliates') ,
            'url' => array(
                'admin' => true,
                'controller' => 'affiliates',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
		'requests' => array(
            'title' => __l('Requests') ,
            'url' => array(
                'admin' => true,
                'controller' => 'affiliate_requests',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
		'Commission Settings' => array(
            'title' => __l('Commission Settings') ,
            'url' => array(
                'admin' => true,
                'controller' => 'affiliate_types',
                'action' => 'edit',
            ) ,
            'weight' => 20,
        ) ,
    ) ,
));*/
App::import('Model', 'SettingCategory');
$SettingCategory = new SettingCategory();
$setting_categories_ids = array();
$settingCategories = $SettingCategory->find('all', array(
    'conditions' => array(
        'SettingCategory.parent_id' => 0,
        'NOT' => array(
            'SettingCategory.id' => $setting_categories_ids
        )
    ) ,
	'order' => array(
		'SettingCategory.id' => 'asc'
	),
    'recursive' => -1
));
$tmp_settings = array();
$i = 0;
foreach($settingCategories as $settingCategory) {
	if($settingCategory['SettingCategory']['name'] != 'CDN') {
		$i = $i+10;
		$tmp_settings[$settingCategory['SettingCategory']['name']] = array(
			'title' => $settingCategory['SettingCategory']['name'],
			'url' => array(
				'admin' => true,
				'controller' => 'settings',
				'action' => 'edit',
				$settingCategory['SettingCategory']['id'],
			) ,
			'weight' => $i,
		);
	}	
}
CmsNav::add('settings', array(
    'title' => __l('Settings') ,
    'column_1' => 6,
    'url' => array(
        'admin' => true,
        'controller' => 'settings',
        'action' => 'prefix',
        'Site',
    ) ,
    'column' => 2,
    'icon-class' => 'admin-setting',
    'weight' => 100,
    'children' => $tmp_settings,
));
/*CmsNav::add('payment', array(
    'title' => __l('Payments') ,
    'show_title' => 1,
    'icon-class' => 'admin-payment',
    'url' => array(
        'admin' => true,
        'controller' => 'transactions',
        'action' => 'index',
    ) ,
    'weight' => 50,
    'children' => array(
        'Transactions' => array(
            'title' => __l('Transactions') ,
            'url' => array(
                'admin' => true,
                'controller' => 'transactions',
                'action' => 'index',
            ) ,
            'weight' => 10,
        ) ,
        'Payment Gateways' => array(
            'title' => __l('Payment Gateways') ,
            'url' => array(
                'admin' => true,
                'controller' => 'payment_gateways',
                'action' => 'index',
            ) ,
            'htmlAttributes' => array(
                'class' => 'payment-gateway'
            ) ,
            'weight' => 20,
        ) ,
    )
));
CmsNav::add('cms', array(
    'title' => __l('Site Builder') ,
    'url' => array(
        'admin' => true,
        'controller' => 'nodes',
        'action' => 'index',
    ) ,
    'is_hide_title' => 1,
    'icon-class' => 'admin-cms',
    'weight' => 80,
	'children' => array(
		'Extension Themes' => array(
            'url' => array(
                'admin' => true,
                'controller' => 'extensions_themes',
                'action' => 'index',
            ) ,
        ) ,
		'Blocks' => array(
            'url' => array(
                'admin' => true,
                'controller' => 'blocks',
                'action' => 'index',
            ) ,
        ) ,
		'Menus' => array(
            'url' => array(
                'admin' => true,
                'controller' => 'menus',
                'action' => 'index',
            ) ,
        ) ,
		'File Managers' => array(
            'url' => array(
                'admin' => true,
                'controller' => 'filemanagers',
                'action' => 'index',
            ) ,
        ) ,
	)
));*/
CmsNav::add('masters', array(
    'title' => __l('Masters') ,
    'is_hide_title' => 1,
    'column' => 2,
    'column_1' => 9,
    'url' => array(
        'admin' => true,
        'controller' => 'email_templates',
        'action' => 'index',
    ) ,
    'icon-class' => 'admin-masters',
	'weight' => 110,
    'children' => array(
        'Regional' => array(
            'title' => __l('Regional') ,
            'url' => '',
            'weight' => 10,
        ) ,
        'Banned Ips' => array(
            'title' => __l('Banned Ips') ,
            'url' => array(
                'admin' => true,
                'controller' => 'banned_ips',
                'action' => 'index',
            ) ,
            'weight' => 20,
        ) ,
        'Cities' => array(
            'title' => __l('Cities') ,
            'url' => array(
                'admin' => true,
                'controller' => 'cities',
                'action' => 'index',
            ) ,
            'weight' => 30,
        ) ,
        'Countries' => array(
            'title' => __l('Countries') ,
            'url' => array(
                'admin' => true,
                'controller' => 'countries',
                'action' => 'index',
            ) ,
            'weight' => 40,
        ) ,
        'States' => array(
            'title' => __l('States') ,
            'url' => array(
                'admin' => true,
                'controller' => 'states',
                'action' => 'index',
            ) ,
            'weight' => 50,
        ) ,
        'Email' => array(
            'title' => __l('Email') ,
            'url' => '',
            'weight' => 130,
        ) ,
        'Email Templates' => array(
            'title' => __l('Email Templates') ,
            'url' => array(
                'admin' => true,
                'controller' => 'email_templates',
                'action' => 'index',
            ) ,
            'weight' => 140,
        ) ,
        'Others' => array(
            'title' => __l('Others') ,
            'url' => '',
            'weight' => 230,
        ) ,
        'IPs' => array(
            'title' => __l('IPs') ,
            'url' => array(
                'admin' => true,
                'controller' => 'ips',
                'action' => 'index',
            ) ,
            'weight' => 250,
        ) ,
        'Transaction Types' => array(
            'title' => __l('Transaction Types') ,
            'url' => array(
                'admin' => true,
                'controller' => 'transaction_types',
                'action' => 'index',
            ) ,
            'weight' => 260,
        ) ,
		'Static Pages' => array(
            'title' => __l('Static Pages') ,
            'url' => '',
            'weight' => 10,
        ) ,
		'Menus' => array(
			'title' => __l('Menus') ,
            'url' => array(
                'admin' => true,
                'controller' => 'menus',
                'action' => 'index',
            ) ,
			'weight' => 20,
        ) ,
		'Nodes' => array(
			'title' => __l('Nodes') ,
            'url' => array(
                'admin' => true,
                'controller' => 'nodes',
                'action' => 'index',
            ) ,
			'weight' => 30,
        ) ,
    )
));