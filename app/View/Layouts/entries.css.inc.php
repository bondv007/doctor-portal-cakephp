<?php
$css_files = array(
	CSS . 'reset.css',
    CSS . '960_24_fluid.css',
	CSS . 'common.css',
	CSS . 'flag.css',
	CSS . 'colorbox.css',
	CSS . 'jquery-ui-1.7.1.custom.css',
	CSS . 'star.rating.css',
	CSS . 'jquery.uploader.css',
    CSS . 'style.css',
);
$css_files = Set::merge($css_files, Configure::read('site.default.css_files'));
?>