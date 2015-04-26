<?php
$js_files = array(
	JS . 'libs/jquery.js',
	JS . 'libs/jquery.form.js',
	JS . 'libs/highcharts.js',
	JS . 'libs/jquery.truncate-2.3.js',
	JS . 'libs/jquery.metadata.js',
	JS . 'libs/jquery.cookie.js',
	JS . 'libs/jquery.flash.js',
	JS . 'libs/jquery-ui-1.8.18.custom.min.js',
	JS . 'libs/jquery.overlabel.js',
	JS . 'libs/jquery.lazyload.min.js',
	JS . 'libs/jquery.countdown.js',
	JS . 'libs/jquery.ui.timepicker.js',
	JS . 'libs/date.format.js',
	JS . 'libs/jquery.fuploader.js',
    JS . 'libs/jquery.uploader.js',
	JS . 'libs/jquery.blockUI.js',
	JS . 'libs/jquery.easytabs.js',
	JS . 'libs/jquery.hashchange.min.js',
	JS . 'libs/jquery.colorbox.js',
	JS . 'libs/jquery.chosen.js',
	JS . 'libs/AC_RunActiveContent.js',
	JS . 'libs/jquery.autogeocomplete.js',
	JS . 'libs/jquery.galleryview-3.0.js',
	JS . 'libs/jquery.easing.1.3.js',
	JS . 'libs/jquery.timers-1.2.js',
	JS . 'libs/jquery.ui.stars.js',
	JS . 'libs/jquery.lightbox-0.5.js',
	JS . 'common.js',
);
$js_files = Set::merge($js_files, Configure::read('site.default.js_files'));