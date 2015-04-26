<?php
/**
 * Extensions Locales Controller
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
class ExtensionsLocalesController extends AppController
{
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'ExtensionsLocales';
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
        APP::uses('Folder', 'Utility');
    }
    public function admin_index()
    {
        $this->set('title_for_layout', __l('Locales'));
        $folder = &new Folder;
        $folder->path = APP . 'locale';
        $content = $folder->read();
        $locales = $content['0'];
        foreach($locales as $i => $locale) {
            if (strstr($locale, '.') !== false) {
                unset($locales[$i]);
            }
        }
        $this->set(compact('content', 'locales'));
    }
    public function admin_activate($locale = null)
    {
        if ($locale == null || !is_dir(APP . 'locale' . DS . $locale)) {
            $this->Session->setFlash(__l('Locale does not exist.') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        $file = &new File(APP . 'config' . DS . 'cms_bootstrap.php', true);
        $content = $file->read();
        $content = str_replace("Configure::write('Config.language', '" . Configure::read('Site.locale') . "');", "Configure::write('Config.language', '" . $locale . "');", $content);
        if ($file->write($content)) {
            $this->Setting->write('Site.locale', $locale);
            $this->Session->setFlash(sprintf(__l("Locale '%s' set as default") , $locale) , 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__l('Could not edit cms_bootstrap.php file.') , 'default', array(
                'class' => 'error'
            ));
        }
        $this->redirect(array(
            'action' => 'index'
        ));
    }
    public function admin_add()
    {
        $this->set('title_for_layout', __l('Upload a new locale'));
        if (!empty($this->data)) {
            $file = $this->data['Locale']['file'];
            unset($this->data['Locale']['file']);
            // get locale name
            $zip = zip_open($file['tmp_name']);
            $locale = null;
            if ($zip) {
                while ($zip_entry = zip_read($zip)) {
                    $zipEntryName = zip_entry_name($zip_entry);
                    if (strstr($zipEntryName, 'LC_MESSAGES')) {
                        $zipEntryNameE = explode('/LC_MESSAGES', $zipEntryName);
                        if (isset($zipEntryNameE['0'])) {
                            $pathE = explode('/', $zipEntryNameE['0']);
                            if (isset($pathE[count($pathE) -1])) {
                                $locale = $pathE[count($pathE) -1];
                            }
                        }
                    }
                }
            }
            zip_close($zip);
            if (!$locale) {
                $this->Session->setFlash(__l('Invalid locale.') , 'default', array(
                    'class' => 'error'
                ));
                $this->redirect(array(
                    'action' => 'add'
                ));
            }
            if (is_dir(APP . 'locale' . DS . $locale)) {
                $this->Session->setFlash(__l('Locale already exists.') , 'default', array(
                    'class' => 'error'
                ));
                $this->redirect(array(
                    'action' => 'add'
                ));
            }
            // extract
            $zip = zip_open($file['tmp_name']);
            if ($zip) {
                while ($zip_entry = zip_read($zip)) {
                    $zipEntryName = zip_entry_name($zip_entry);
                    if (strstr($zipEntryName, $locale . '/')) {
                        $zipEntryNameE = explode($locale . '/', $zipEntryName);
                        if (isset($zipEntryNameE['1'])) {
                            $path = APP . 'locale' . DS . $locale . DS . str_replace('/', DS, $zipEntryNameE['1']);
                        } else {
                            $path = APP . 'locale' . DS . $locale . DS;
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
            }
            zip_close($zip);
            $this->redirect(array(
                'action' => 'index'
            ));
        }
    }
    public function admin_edit($locale = null)
    {
        $this->set('title_for_layout', sprintf(__l('Edit locale: %s') , $locale));
        if (!$locale) {
            $this->Session->setFlash(__l('Invalid locale.') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        if (!file_exists(APP . 'locale' . DS . $locale . DS . 'LC_MESSAGES' . DS . 'default.po')) {
            $this->Session->setFlash(__l('The file default.po does not exist.') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        $file = &new File(APP . 'locale' . DS . $locale . DS . 'LC_MESSAGES' . DS . 'default.po', true);
        $content = $file->read();
        if (!empty($this->data)) {
            // save
            if ($file->write($this->data['Locale']['content'])) {
                $this->Session->setFlash(__l('Locale updated successfully') , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index'
                ));
            }
        }
        $this->set(compact('locale', 'content'));
    }
    public function admin_delete($locale = null)
    {
        if (!$locale) {
            $this->Session->setFlash(__l('Invalid locale') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        $folder = &new Folder;
        if ($folder->delete(APP . 'locale' . DS . $locale)) {
            $this->Session->setFlash(__l('Locale deleted successfully.') , 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__l('Local could not be deleted.') , 'default', array(
                'class' => 'error'
            ));
        }
        $this->redirect(array(
            'action' => 'index'
        ));
    }
}
?>