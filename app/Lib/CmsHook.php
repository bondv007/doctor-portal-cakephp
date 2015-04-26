<?php

class CmsHook
{
    public function setExceptionUrl($exception)
    {
        Configure::write('site.exception_array', Set::merge(Configure::read('site.exception_array') , $exception));
    }
    public function setCssFile($cssFiles, $layout = 'default')
    {
        Configure::write('site.' . $layout . '.css_files', Set::merge(Configure::read('site.' . $layout . '.css_files') , $cssFiles));
    }
    public function setJsFile($jsFiles, $layout = 'default')
    {
        Configure::write('site.' . $layout . '.js_files', Set::merge(Configure::read('site.' . $layout . '.js_files') , $jsFiles));
    }
}
