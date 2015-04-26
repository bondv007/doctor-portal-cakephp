<?php
$css_files = array(
	CSS . 'reset.css',
	CSS . '960_24_col.css',
	APP . 'View' . DS . 'Themed' . DS . 'Bluish' . DS . 'webroot' . DS . 'css' . DS . 'common.css',
	CSS . 'flag.css',
	APP . 'View' . DS . 'Themed' . DS . 'Bluish' . DS . 'webroot' . DS . 'css' . DS . 'jquery-ui-1.7.1.custom.css',
	CSS . 'star.rating.css',
	CSS . 'jquery.uploader.css',
    APP . 'View' . DS . 'Themed' . DS . 'Bluish' . DS . 'webroot' . DS . 'css' . DS . 'style.css',
);
$css_files = Set::merge($css_files, Configure::read('site.default.css_files'));
$css_files = Set::merge($css_files, array(
	APP . 'View' . DS . 'Themed' . DS . 'Bluish' . DS . 'webroot' . DS . 'css' . DS . 'contest.css',
));
?>