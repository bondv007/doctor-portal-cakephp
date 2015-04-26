<?php

$path = '/';
$url = array('controller' => 'install');
if (file_exists(APP . 'Config' . DS.'settings.yml')) {
    if (!Configure::read('Install.secured')) {
        $path = '/*';
        $url['action'] = 'finish';
    }
}
CmsRouter::connect($path, $url);
