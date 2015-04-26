<?php
CakePlugin::routes();
Router::parseExtensions('rss', 'csv', 'json', 'txt', 'xml');
// Basic
CmsRouter::connect('/', array(
    'controller' => 'nodes',
    'action' => 'home'
));
CmsRouter::connect('/promoted/*', array(
    'controller' => 'nodes',
    'action' => 'promoted'
));
CmsRouter::connect('/search/*', array(
    'controller' => 'nodes',
    'action' => 'search'
));
// Blog
CmsRouter::connect('/blog', array(
    'controller' => 'nodes',
    'action' => 'index',
    'type' => 'blog'
));
CmsRouter::connect('/blog/archives/*', array(
    'controller' => 'nodes',
    'action' => 'index',
    'type' => 'blog'
));
CmsRouter::connect('/blog/:slug', array(
    'controller' => 'nodes',
    'action' => 'view',
    'type' => 'blog'
));
CmsRouter::connect('/blog/term/:slug/*', array(
    'controller' => 'nodes',
    'action' => 'term',
    'type' => 'blog'
));
// Node
CmsRouter::connect('/node', array(
    'controller' => 'nodes',
    'action' => 'index',
    'type' => 'node'
));
CmsRouter::connect('/node/archives/*', array(
    'controller' => 'nodes',
    'action' => 'index',
    'type' => 'node'
));
CmsRouter::connect('/node/:slug', array(
    'controller' => 'nodes',
    'action' => 'view',
    'type' => 'node'
));
CmsRouter::connect('/node/term/:slug/*', array(
    'controller' => 'nodes',
    'action' => 'term',
    'type' => 'node'
));
//Register
Router::connect('/patient/user/register/*', array(
	'controller' => 'users',
	'action' => 'patient_register'
));
Router::connect('/doctor/user/register/*', array(
	'controller' => 'users',
	'action' => 'doctor_register'
));
// Page
CmsRouter::connect('/page/:slug', array(
    'controller' => 'nodes',
    'action' => 'view',
    'type' => 'page'
));
CmsRouter::connect('/css/*', array(
    'controller' => 'devs',
    'action' => 'asset_css'
));
CmsRouter::connect('/js/*', array(
    'controller' => 'devs',
    'action' => 'asset_js'
));
CmsRouter::connect('/img/:size/*', array(
    'controller' => 'images',
    'action' => 'view'
) , array(
    'size' => '(?:[a-zA-Z_]*)*'
));
CmsRouter::connect('/files/*', array(
    'controller' => 'images',
    'action' => 'view',
    'size' => 'original'
));
CmsRouter::connect('/img/*', array(
    'controller' => 'images',
    'action' => 'view',
    'size' => 'original'
));
CmsRouter::connect('/sitemap', array(
    'controller' => 'devs',
    'action' => 'sitemap'
));
CmsRouter::connect('/robots', array(
    'controller' => 'devs',
    'action' => 'robots'
));
CmsRouter::connect('/cron/main/*', array(
    'controller' => 'crons',
    'action' => 'main'
));
CmsRouter::connect('/contactus', array(
    'controller' => 'contacts',
    'action' => 'add'
));
CmsRouter::connect('/admin', array(
    'controller' => 'users',
    'action' => 'stats',
    'prefix' => 'admin',
    'admin' => true
));
CmsRouter::connect('/calendar/*', array(
    'controller' => 'doctor_availabilities',
    'action' => 'index',
	'type' => 'calendar',
	'show' => 'daily'
));
CmsRouter::connect('/doctors/appointment/*', array(
    'controller' => 'doctor_availabilities',
    'action' => 'index',
	'type' => 'calendar',
	'show' => 'daily'
));
CmsRouter::connect('/doctors/timeslot/*', array(
    'controller' => 'doctor_availabilities',
    'action' => 'timeslot',
	'type' => 'timeslot',
	'show' => 'monthly'
));
CmsRouter::connect('/doctors/setup_time/*', array(
    'controller' => 'doctor_availabilities',
    'action' => 'setup_time'
));
CmsRouter::connect('/directory/*', array(
    'controller' => 'users',
    'action' => 'index'
));
CmsRouter::connect('/appointments/booking/*', array(
    'controller' => 'appointments',
    'action' => 'appointment_info'
));