<?php
/**
 * Extensions Plugins Controller
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
class ExtensionsPluginsController extends AppController
{
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'ExtensionsPlugins';
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array(
        'Setting',
        'User',
    );
    /**
     * Core plugins
     *
     * @var array
     * @access public
     */
    public $corePlugins = array(
        'Acl',
        'Extensions',
    );
    public function beforeFilter()
    {
        parent::beforeFilter();
        App::uses('File', 'Utility');
        APP::uses('Folder', 'Utility');
    }
    public function admin_index()
    {
        $this->pageTitle = __l('Plugins');
        $pluginAliases = $this->Cms->getPlugins();
        $plugins = array();
        foreach($pluginAliases AS $pluginAlias) {
            $plugins[$pluginAlias] = $this->Cms->getPluginData($pluginAlias);
        }
        $this->set('corePlugins', $this->corePlugins);
        $this->set(compact('plugins'));
    }
    public function admin_add()
    {
		$this->pageTitle = __l('Upload a new plugin');
        if (!empty($this->request->data)) {
            $file = $this->request->data['Plugin']['file'];
            unset($this->request->data['Plugin']['file']);
            // get plugin name and root
            $zip = zip_open($file['tmp_name']);
            $root = 0;
            if ($zip) {
                while ($zip_entry = zip_read($zip)) {
                    $zipEntryName = zip_entry_name($zip_entry);
                    $searches = array(
                        'Activation',
                        'AppController',
                        'AppModel',
                        'AppHelper'
                    );
                    foreach($searches AS $search) {
                        if (preg_match('/([A-Za-z0-9_]+)' . $search . '\.php/', $zipEntryName, $matches)) {
                            $plugin = $matches[1];
                            foreach(explode('/', $zipEntryName) as $folder) {
                                if (in_array($folder, array(
                                    'Config',
                                    'Controller',
                                    'Model',
                                    'View',
                                ))) {
                                    break;
                                }
                                $root++;
                            }
                            break;
                        }
                    }
                    if (!empty($plugin)) {
                        break;
                    }
                }
            }
            zip_close($zip);
            if (!$plugin) {
                $this->Session->setFlash(__l('Invalid plugin.') , 'default', null, 'error');
                $this->redirect(array(
                    'action' => 'add'
                ));
            }
            $pluginName = $plugin;
            if (is_dir(APP . 'Plugin' . DS . $pluginName)) {
                $this->Session->setFlash(__l('Plugin already exists.') , 'default', null, 'error');
                $this->redirect(array(
                    'action' => 'add'
                ));
            }
            // extract
            $zip = zip_open($file['tmp_name']);
            if ($zip) {
                // create root plugin dir
                $path = APP . 'Plugin' . DS . $pluginName . DS;
                mkdir($path);
                while ($zip_entry = zip_read($zip)) {
                    $zipEntryName = zip_entry_name($zip_entry);
                    $zipEntryNameE = array_slice(explode('/', $zipEntryName) , $root);
                    if (!empty($zipEntryNameE[count($zipEntryNameE) -1])) {
                        $path = APP . 'Plugin' . DS . $pluginName . DS . implode(DS, $zipEntryNameE);
                    } else {
                        $path = APP . 'Plugin' . DS . $pluginName . DS . implode(DS, $zipEntryNameE) . DS;
                    }
                    if (substr($path, strlen($path) -1) == DS) {
                        // create directory
                        if (!is_dir($path)) {
                            mkdir($path);
                        }
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
				CakePlugin::load($pluginName, array(
					'routes' => true
				));
				App::import('Model', 'CakeSchema', false);
				App::import('Model', 'ConnectionManager');
				$db = ConnectionManager::getDataSource('default');
				if(!$db->isConnected()) {
					$this->Session->setFlash(__l('Could not connect to database.'), 'default', array('class' => 'error'));
				} else {
					$schema = new CakeSchema(array('name' => $pluginName, 'plugin' => $pluginName, 'file' => $pluginName . '.php'));
					$schema = $schema->load();
					$appSchema = new CakeSchema(array('name' => 'App', 'file' => 'app.php'));
					$appSchema = $appSchema->load();
					$alterSchema = $schema->compare($appSchema, $schema);
					foreach($schema->tables as $table => $fields) {
						try {
							$db->execute('DESCRIBE ' . $table);
							$create = $db->alterSchema($alterSchema, $table);
						}
						catch (PDOException $e) {
							$create = $db->createSchema($schema, $table);
						}
						try {
							$db->execute($create);
						}
						catch (PDOException $e) {
							$this->Session->setFlash(sprintf(__l('Could not create table: %s'), $e->getMessage()), 'default', array('class' => 'error'));
							$this->redirect(array('action' => 'add'));
						}
					}
				}
				$path = App::pluginPath($pluginName) .DS. 'Config' .DS. 'Data' .DS;
                $dataObjects = App::objects('class', $path);
                foreach ($dataObjects as $data) {
					if (file_exists($path . $data . '.php')) {
						include($path . $data . '.php');
						$classVars = get_class_vars($data);
						$modelAlias = substr($data, 0, -7);
						$table = Inflector::tableize($modelAlias);
						$records = $classVars['records'];
						App::import('Model', 'Model', false);
						$modelObject = new Model(array(
							'name' => $modelAlias,
							'table' => $table,
							'ds' => 'default',
						));
						if (is_array($records) && count($records) > 0) {
							foreach($records as $record) {
								$modelObject->create($record);
								$modelObject->save();
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
    public function admin_delete($plugin = null)
    {
        if (!$plugin) {
            $this->Session->setFlash(__l('Invalid plugin') , 'default', null, 'error');
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        if ($this->Cms->pluginIsActive($plugin)) {
            $this->Session->setFlash(__l('You cannot delete a plugin that is currently active.') , 'default', null, 'error');
            $this->redirect(array(
                'action' => 'index'
            ));
        }
		App::import('Model', 'CakeSchema', false);
		App::import('Model', 'ConnectionManager');
		$db = ConnectionManager::getDataSource('default');
		if(!$db->isConnected()) {
			$this->Session->setFlash(__l('Could not connect to database.'), 'default', array('class' => 'error'));
		} else {
			$schema = new CakeSchema(array('name' => $plugin, 'plugin' => $plugin, 'file' => $plugin . '.php'));
			$schema = $schema->load();
			$appSchema = new CakeSchema(array('name' => 'App', 'file' => 'app.php'));
			$appSchema = $appSchema->load();
			$alterSchema = $schema->compare($schema, $appSchema);
			foreach($schema->tables as $table => $fields) {
				$create = $db->alterSchema($alterSchema, $table);
				try {
					$db->execute($create);
				}
				catch (PDOException $e) {
					$this->Session->setFlash(sprintf(__l('Could not drop table: %s'), $e->getMessage()), 'default', array('class' => 'error'));
					$this->redirect(array('action' => 'index'));
				}
			}
		}
        $folder = &new Folder;
        if ($folder->delete(APP . 'Plugin' . DS . $plugin)) {
            $this->Session->setFlash(__l('Plugin deleted successfully.') , 'default', null, 'success');
        } else {
            $this->Session->setFlash(__l('Plugin could not be deleted.') , 'default', null, 'error');
        }
        $this->redirect(array(
            'action' => 'index'
        ));
    }
    public function admin_toggle($plugin = null)
    {
        if (!$plugin) {
            $this->Session->setFlash(__l('Invalid plugin') , 'default', null, 'error');
            $this->redirect(array(
                'action' => 'index'
            ));
        }		
		$paymentGateways = array(
			'Paypal' => ConstPaymentGateways::PayPal,
			'PaypalStandard' => ConstPaymentGateways::PayPalStandard
		);		
		$this->loadModel('PaymentGateway');
        if ($this->Cms->pluginIsActive($plugin)) {
            $this->Cms->removePluginBootstrap($plugin);
			if(in_array($plugin,array_keys($paymentGateways))) {				
				//To deactivate payments
				$this->PaymentGateway->updateAll(array(
					'PaymentGateway.is_active' => 0
				) , array(
					'PaymentGateway.id' => $paymentGateways[$plugin]
				));
			}
            $this->Session->setFlash(__l('Plugin deactivated successfully.') , 'default', null, 'success');
        } else {
            $pluginData = $this->Cms->getPluginData($plugin);
            $dependencies = true;
            if (!empty($pluginData['dependencies']['plugins'])) {
                foreach($pluginData['dependencies']['plugins'] as $requiredPlugin) {
                    $requiredPlugin = ucfirst($requiredPlugin);
                    if (!CakePlugin::loaded($requiredPlugin)) {
                        $dependencies = false;
                        $missingPlugin = $requiredPlugin;
                        break;
                    }
                }
            }
            if ($dependencies) {
                $this->Cms->addPluginBootstrap($plugin);
				if(in_array($plugin,array_keys($paymentGateways))) {
					//To activate payments
					$this->PaymentGateway->updateAll(array(
						'PaymentGateway.is_active' => 1
					) , array(
						'PaymentGateway.id' => $paymentGateways[$plugin]
					));
				}
                $this->Session->setFlash(__l('Plugin activated successfully.') , 'default', null, 'success');
            } else {
                $this->Session->setFlash(__l('Plugin "%s" depends on "%s" plugin.', $plugin, $missingPlugin) , 'default', null, 'error');
            }
        }
        $this->redirect(array(
            'action' => 'index'
        ));
    }
}
?>