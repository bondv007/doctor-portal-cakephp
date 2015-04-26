<?php
$css_files = array(
	CSS . 'reset.css',
	CSS . '960_24_fluid.css',
    CSS . 'common.css',
    CSS . 'colorbox.css',
	CSS . 'jquery-ui-1.7.1.custom.css',
	CSS . 'star.rating.css',
	CSS . 'flag.css',
    CSS . 'admin.css',
    
);
$css_files = Set::merge($css_files, Configure::read('site.admin.css_files')); ?>