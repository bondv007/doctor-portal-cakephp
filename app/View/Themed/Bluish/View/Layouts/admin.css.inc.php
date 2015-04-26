<?php
$css_files = array(
	CSS . 'reset.css',
	CSS . '960_24_fluid.css',
	APP . 'View' . DS . 'Themed' . DS . 'Bluish' . DS . 'webroot' . DS . 'css' . DS . 'common.css',
	CSS . 'star.rating.css',
	CSS . 'flag.css',
  	APP . 'View' . DS . 'Themed' . DS . 'Bluish' . DS . 'webroot' . DS . 'css' . DS . 'jquery-ui-1.7.1.custom.css',
    APP . 'View' . DS . 'Themed' . DS . 'Bluish' . DS . 'webroot' . DS . 'css' . DS . 'admin.css',
);
$css_files = Set::merge($css_files, Configure::read('site.admin.css_files')); ?>