<?php
/**
 * Extensions Themes Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Cms
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.cms.org
 */
class ExtensionsThemesController extends AppController
{
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'ExtensionsThemes';
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array(
        'Setting',
        'User'
    );
    public function beforeFilter()
    {
        parent::beforeFilter();
        App::uses('File', 'Utility');
        App::uses('Folder', 'Utility');
    }
    public function admin_index()
    {
        $this->pageTitle = __l('Themes');
        $themes = $this->Cms->getThemes();
        $themesData = array();
        $themesData[] = $this->Cms->getThemeData();
        foreach($themes AS $theme) {
            $themesData[$theme] = $this->Cms->getThemeData($theme);
        }
        $currentTheme = $this->Cms->getThemeData(Configure::read('site.theme'));
        $this->set(compact('themes', 'themesData', 'currentTheme'));
    }
    public function admin_activate($alias = null)
    {
        if ($alias == 'default') {
            $alias = null;
        }
        $siteTheme = $this->Setting->findByName('site.theme');
        $siteTheme['Setting']['value'] = $alias;
        $this->Setting->save($siteTheme);
        $this->Session->setFlash(__l('Theme activated successfully.') , 'default', null, 'success');
		@unlink(JS . 'default.cache.js');
		@unlink(JS . 'admin.cache.js');
		@unlink(CSS . 'admin.cache.css');
		@unlink(CSS . 'default.cache.css');
		@unlink(CSS . 'maintenance.cache.css');
		@unlink(CSS . 'entries.cache.css');
		@unlink(CSS . 'redirect.cache.css');
		@unlink(WWW_ROOT . 'index.html');
        $this->redirect(array(
            'action' => 'index'
        ));
    }
    public function admin_add()
    {
        $this->pageTitle = __l('Upload a new theme');
        if (!empty($this->data)) {
            $file = $this->data['Theme']['file'];
            unset($this->data['Theme']['file']);
            // get Theme YML and alias
            $ymlContent = '';
            $zip = zip_open($file['tmp_name']);
            if ($zip) {
                while ($zip_entry = zip_read($zip)) {
                    $zipEntryName = zip_entry_name($zip_entry);
                    if (strstr($zipEntryName, 'theme.yml') && zip_entry_open($zip, $zip_entry, "r")) {
                        $ymlContent = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                        $zipEntryNameE = explode('/', $zipEntryName);
                        if (isset($zipEntryNameE['0'])) {
                            $themeAlias = $zipEntryNameE[count($zipEntryNameE) -3];
                        }
                    }
                }
                zip_close($zip);
            }
            if ($ymlContent == '') {
                $this->Session->setFlash(__l('Invalid YML file') , 'default', null, 'error');
                $this->redirect(array(
                    'action' => 'index'
                ));
            }
            // check if alias already exists
            if (!isset($themeAlias)) {
                $this->Session->setFlash(__l('Invalid zip archive.') , 'default', null, 'error');
                $this->redirect(array(
                    'action' => 'index'
                ));
            }
            if (is_dir(APP . 'View' . DS . 'Themed' . DS . $themeAlias) || is_dir(APP . 'webroot' . DS . 'theme' . DS . $themeAlias)) {
                $this->Session->setFlash(__l('Directory with theme alias already exists.') , 'default', null, 'error');
                $this->redirect(array(
                    'action' => 'add'
                ));
            }
            // extract it
            $zip = zip_open($file['tmp_name']);
            if ($zip) {
                while ($zip_entry = zip_read($zip)) {
                    $zipEntryName = zip_entry_name($zip_entry);
                    if (strstr($zipEntryName, $themeAlias . '/')) {
                        $zipEntryNameE = explode($themeAlias . '/', $zipEntryName);
                        if (isset($zipEntryNameE['1'])) {
                            $path = APP . 'View' . DS . 'Themed' . DS . $themeAlias . DS . str_replace('/', DS, $zipEntryNameE['1']);
                        } else {
                            $path = APP . 'Views' . DS . 'Themed' . DS . $themeAlias . DS;
                        }
                        if (substr($path, strlen($path) -1) == DS) {
                            // create directory
                            mkdir($path);
                        } else {
                            // create file
                            if (zip_entry_open($zip, $zip_entry, 'r')) {
                                $fileContent = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
                                touch($path);
                                $fh = fopen($path, 'w');
                                fwrite($fh, $fileContent);
                                fclose($fh);
                                zip_entry_close($zip_entry);
                            }
                        }
                    }
                }
                zip_close($zip);
                $this->Session->setFlash(__l('Theme uploaded successfully') , 'default', null, 'success');
                $this->redirect(array(
                    'action' => 'index'
                ));
            }
        }
    }
    public function admin_editor()
    {
        $this->set('title_for_layout', __l('Theme Editor'));
    }
    public function admin_save()
    {
    }
    public function admin_delete($alias = null)
    {
        if ($alias == null) {
            $this->Session->setFlash(__l('Invalid Theme') , 'default', null, 'error');
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        if ($alias == 'default') {
            $this->Session->setFlash(__l('Default theme cannot be deleted') , 'default', null, 'error');
            $this->redirect(array(
                'action' => 'index'
            ));
        } elseif ($alias == Configure::read('site.theme')) {
            $this->Session->setFlash(__l('You cannot delete a theme that is currently active') , 'default', null, 'error');
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        $paths = array(
            APP . 'webroot' . DS . 'theme' . DS . $alias . DS,
            APP . 'View' . DS . 'Themed' . DS . $alias . DS,
        );
        $error = 0;
        $folder = &new Folder;
        foreach($paths AS $path) {
            if (is_dir($path)) {
                if (!$folder->delete($path)) {
                    $error = 1;
                }
            }
        }
        if ($error == 1) {
            $this->Session->setFlash(__l('Theme could not be deleted. Please try again.') , 'default', null, 'error');
        } else {
            $this->Session->setFlash(__l('Theme deleted successfully') , 'default', null, 'success');
        }
        $this->redirect(array(
            'action' => 'index'
        ));
    }
}
?>