<?php
$css_files = array(
	CSS . 'reset.css',
	CSS . '960_24_col.css',
	CSS . 'common.css',
	CSS	. 'calendar.css',
	CSS . 'flag.css',
	CSS . 'colorbox.css',
	CSS . 'jquery-ui-1.7.1.custom.css',
	CSS . 'jquery.chosen.css',
	CSS . 'star.rating.css',
	CSS . 'jquery.uploader.css',
	CSS . 'jquery.galleryview-3.0.css',
	CSS . 'jquery.lightbox-0.5.css',
    CSS . 'style.css',
);
$css_files = Set::merge($css_files, Configure::read('site.default.css_files'));
?>