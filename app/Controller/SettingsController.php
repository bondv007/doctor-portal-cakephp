<?php
class SettingsController extends AppController
{
    public $components = array(
        'Cookie'
    );
    public function beforeFilter()
    {
        $this->Security->disabledFields = array(
            'SiteLogo.filename',
            'Setting'
        );
        parent::beforeFilter();
    }
    public function admin_index()
    {
        $this->pageTitle = __l('Settings');
        $plugins = explode(',', Configure::read('Hook.bootstraps'));
        $setting_categories_ids = array(
            65
        );
        $conditions['SettingCategory.id <>'] = $setting_categories_ids;
        $setting_categories = $this->Setting->SettingCategory->find('all', array(
            'conditions' => array(
                'SettingCategory.parent_id' => 0,
                "NOT" => array(
                    "SettingCategory.id" => $setting_categories_ids
                )
            ) , // Images category will not showed
			'order' => array(
				'SettingCategory.id' => 'asc'
			),
            'recursive' => 0
        ));
        $this->set('setting_categories', $setting_categories);
        $this->set('pageTitle', $this->pageTitle);
    }
    public function admin_edit($category_id = 1)
    {
        $settingCategory = $this->Setting->SettingCategory->find('first', array(
            'conditions' => array(
                'SettingCategory.id = ' => $category_id
            ) ,
            'recursive' => -1
        ));
		$categoryName = $settingCategory['SettingCategory']['name'];
		$save_check_flag = 0;
        $ssl_enable = true;
        $this->disableCache();
        $this->loadModel('Attachment');		
        if (!empty($this->request->data)) {
            if (Configure::read('site.is_admin_settings_enabled')) {
                // Save settings
                if (!empty($this->request->data['Setting']['22'])) {
                    $this->Cookie->write('user_language', $this->request->data['Setting']['22']['name'], false);
                }
                $category_id = $this->request->data['Setting']['setting_category_id'];
                unset($this->request->data['Setting']['setting_category_id']);
                $validate['error'] = '';
                if (!empty($this->request->data['Setting']['158']['name'])) {
                    if (!stristr(substr($this->request->data['Setting']['158']['name'], -1, 1) , '/') === false) {
                        $validate['error'] = __l('Settings could not be updated. Please try again.');
                        $this->Setting->validationErrors['158']['name'] = __l('This is image base URL should not trailing slash');
                    }
                }
                if (!empty($this->request->data['Setting']['157']['name'])) {
                    if (stristr(substr($this->request->data['Setting']['157']['name'], -1, 1) , '/') === false) {
                        $validate['error'] = __l('Settings could not be updated. Please try again.');
                        $this->Setting->validationErrors['157']['name'] = __l('This is css base URL should have trailing slash');
                    }
                }
                if (!empty($this->request->data['Setting']['156']['name'])) {
                    if (stristr(substr($this->request->data['Setting']['156']['name'], -1, 1) , '/') === false) {
                        $validate['error'] = __l('Settings could not be updated. Please try again.');
                        $this->Setting->validationErrors['156']['name'] = __l('This is JS base URL should have trailing slash');
                    }
                }
                if (empty($validate['error'])) {
                    foreach($this->request->data['Setting'] as $id => $value) {
                        if (is_array($value['name']) and !empty($value['name']['name'])) {
                            $this->layout = 'ajax';
                            $this->Setting->WaterMark->Behaviors->attach('ImageUpload', Configure::read('avatar.file'));
                            $ini_upload_error = 1;
                            if ($value['name']['error'] == 1) {
                                $ini_upload_error = 0;
                            }
                            $this->request->data['WaterMark']['filename'] = $value['name'];
                            $this->request->data['WaterMark']['filename']['type'] = get_mime($value['name']['tmp_name']);
                            $this->request->data['WaterMark']['filename']['name'] = $value['name']['name'];
                            $this->Setting->WaterMark->set($this->request->data);
                            if ($ini_upload_error && $this->Setting->WaterMark->validates()) {
                                $settings['Setting']['value'] = $value['name']['name'];
                                $this->Setting->save($settings['Setting']);
                                $attachment = $this->Setting->WaterMark->find('first', array(
                                    'conditions' => array(
                                        'WaterMark.foreign_id' => $id,
                                        'WaterMark.class' => 'WaterMark'
                                    ) ,
                                    'recursive' => -1
                                ));
                                if (!empty($attachment['WaterMark']['id'])) {
                                    $this->request->data['WaterMark']['id'] = $attachment['WaterMark']['id'];
                                }
                                $this->Attachment->create();
                                $this->request->data['WaterMark']['class'] = 'WaterMark';
                                $this->request->data['WaterMark']['foreign_id'] = $id;
                                $this->Attachment->save($this->request->data['WaterMark']);
                                //$this->autoRender = false;
                                $save_check_flag = 1;
                            } else {
                                if (!empty($this->Setting->WaterMark->validationErrors)) {
                                    $this->Setting->validationErrors[$settings['Setting']['id']]['name'] = $this->Setting->WaterMark->validationErrors['filename'];
                                    $save_check_flag = 0;
                                }
                                if ($value['name']['error'] == 1) {
                                    $this->Setting->validationErrors[$settings['Setting']['id']]['name'] = sprintf(__l('The file uploaded is too big, only files less than %s permitted') , ini_get('upload_max_filesize'));
                                }
                                $this->Session->setFlash(__l('Watermark image is not uploaded. Please try again ') , 'default', null, 'error');
                                $this->redirect(array(
                                    'controller' => 'settings',
                                    'action' => 'edit',
                                    $category_id
                                ));
                            }
                            unset($value);
                        } else {
                            $settings['Setting']['id'] = $id;
                            if ($id == '8') { // Writing default city name in cache.
                                Cache::delete('site_paypal_conversion_currency');
                                Cache::delete('site_paypal_conversion_currency_rate');
                                Cache::delete('site_supported_currencies');
                                Cache::delete('site_authorizenet_conversion_currency');
                                Configure::write('site.currency_id', $value['name']);
                            }
                            if ($id == '23') { // Writing default city name in cache.
                                if (($default_city = Cache::read('site.default_city', 'long')) === false) {
                                    Cache::write('site.default_city', $value['name'], array(
                                        'config' => 'long'
                                    ));
                                } else {
                                    Cache::delete('site.default_city', 'long');
                                    Cache::write('site.default_city', $value['name'], array(
                                        'config' => 'long'
                                    ));
                                }
                            }
                            if ($id == '24') { // Writing city routing url in cache
                                if (($city_url = Cache::read('site.city_url', 'long')) === false) {
                                    Cache::write('site.city_url', $value['name'], array(
                                        'config' => 'long'
                                    ));
                                    Cache::write('site.city_url', $value['name'], 'long');
                                } else {
                                    Cache::delete('site.city_url', 'long');
                                    Cache::write('site.city_url', $value['name'], array(
                                        'config' => 'long'
                                    ));
                                }
                            }
                            if ($id == '9') { // Writing conversion currency details in cache
                                Cache::delete('site_paypal_conversion_currency');
                                Cache::delete('site_paypal_conversion_currency_rate');
                                Cache::delete('site_supported_currencies');
                                Cache::delete('site_authorizenet_conversion_currency');
                                Configure::write('site.paypal_currency_converted_id', $value['name']);
                            }
                            if (count($value['name']) == 1) {
                                $settings['Setting']['value'] = $value['name'];
                                $this->Setting->save($settings['Setting']);
                                $save_check_flag = 1;
                            }
                        }
                    }
                    if (!empty($save_check_flag)) {
                        $this->Session->setFlash(__l('Settings updated successfully.') , 'default', null, 'success');
                    }
                } else {
                    $this->Session->setFlash($validate['error'], 'default', null, 'error');
                }
            } else {
                $this->Session->setFlash(__l('Sorry. You Cannot Update the Settings in Demo Mode') , 'default', null, 'error');
            }
            Cache::delete('setting_key_value_pairs');
            @unlink(JS . 'default.cache.js');
            @unlink(JS . 'admin.cache.js');
            @unlink(CSS . 'admin.cache.css');
            @unlink(CSS . 'default.cache.css');
            @unlink(CSS . 'maintenance.cache.css');
            @unlink(CSS . 'entries.cache.css');
            @unlink(CSS . 'redirect.cache.css');
            @unlink(WWW_ROOT . 'index.html');
        }
        $this->request->data['Setting']['setting_category_id'] = $category_id;
        $plugins = explode(',', Configure::read('Hook.bootstraps'));
        $conditions = array();
        if ($category_id == 16) { //  module manager that
            $conditions['Setting.name'] = array(
                'affiliate.is_enabled',
            );
        } else {
            $conditions['Setting.setting_category_parent_id'] = $category_id;
        }
        if ($category_id == 4 && !isPluginEnabled('Translation')) {
            $conditions['Setting.setting_category_id !='] = 26;
        }
        if ($category_id == 5 && !isPluginEnabled('Translation')) {
            $conditions['Setting.id !='] = 92;
        }
        $settings = $this->Setting->find('all', array(
            'conditions' => $conditions,
            'order' => array(
                'Setting.setting_category_id' => 'asc',
                'Setting.order' => 'asc'
            ) ,
            'recursive' => 0
        ));
        $is_module = false;
        $active_module = true;
        if (in_array($category_id, array(
            ConstModule::Affiliate
        ))) {
            $is_module = true;
            foreach($settings as $setting) {
                if (in_array($setting['Setting']['id'], array(
                    ConstModuleEnableFields::Affiliate
                ))) {
                    $active_module = ($setting['Setting']['value']) ? true : false;
                }
            }
        }
        $this->set('active_module', $active_module);
        $this->set('is_module', $is_module);
        if ($category_id == 1) {
            $url = "https://" . $_SERVER['SERVER_NAME'];
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            if (curl_exec($ch) === false) {
                $ssl_enable = false;
            }
            // Close handle
            curl_close($ch);
        }
        $this->request->data['Setting']['setting_category_id'] = $category_id;
        $main_setting_categories = $this->Setting->SettingCategory->find('first', array(
            'conditions' => array(
                'SettingCategory.id = ' => $category_id
            ) ,
            'recursive' => -1
        ));
        $setting_categories = $this->Setting->SettingCategory->find('all', array(
            'conditions' => array(
                'SettingCategory.parent_id = ' => $category_id
            ) ,
            'recursive' => -1
        ));
        $this->set('setting_categories', $main_setting_categories);
        $this->set('setting_category_name', $main_setting_categories);
        $this->pageTitle = $main_setting_categories['SettingCategory']['name'] . __l(' Settings');
        $is_submodule = false;
        $active_submodule = true;
        foreach($setting_categories as $setting_category) {
            $this->set('is_submodule', $is_submodule);
            $this->set('active_submodule', $active_submodule);
        }
        $beyondOriginals = array();
        $aspects = array();
        foreach($settings as $setting) {
            $field_name = explode('.', $setting['Setting']['name']);
            if (isset($field_name[2])) {
                if ($field_name[2] == 'is_not_allow_resize_beyond_original_size') {
                    $beyondOriginals[$setting['Setting']['id']] = Inflector::humanize(Inflector::underscore($field_name[1]));
                    $this->request->data['Setting']['not_allow_beyond_original'][] = ($setting['Setting']['value']) ? $setting['Setting']['id'] : '';
                } else if ($field_name[2] == 'is_handle_aspect') {
                    $aspects[$setting['Setting']['id']] = Inflector::humanize(Inflector::underscore($field_name[1]));
                    $this->request->data['Setting']['allow_handle_aspect'][] = ($setting['Setting']['value']) ? $setting['Setting']['id'] : '';
                }
            }
        }
        $fb_login_url = Router::url(array(
            'controller' => 'settings',
            'action' => 'update_facebook'
        ) , true);
        $tw_login_url = Router::url(array(
            'controller' => 'settings',
            'action' => 'update_twitter'
        ) , true);
        $fs_login_url = Router::url(array(
            'controller' => 'settings',
            'action' => 'admin_update_foursquare'
        ) , true);
        if ($category_id == 7) { //  for watermark
            $attachment = $this->Setting->WaterMark->find('first', array(
                'conditions' => array(
                    'WaterMark.class' => 'WaterMark'
                ) ,
                'recursive' => -1
            ));
            $this->set('watermark_image', $attachment);
        }
        $this->set('ssl_enable', $ssl_enable);
        $this->set('fb_login_url', $fb_login_url);
        $this->set('tw_login_url', $tw_login_url);
        $this->set('fs_login_url', $fs_login_url);
        $this->set(compact('settings', 'beyondOriginals', 'aspects'));
        $this->set('pageTitle', $this->pageTitle);
    }
    public function admin_update_facebook()
    {
        $this->pageTitle = __l('Update Facebook');
        if (!empty($this->request->params['named']['city'])) {
            $get_current_city = $this->request->params['named']['city'];
        } else {
            $get_current_city = Configure::read('site.city');
        }
        $fb_return_url = Router::url(array(
            'controller' => $get_current_city,
            'action' => 'settings',
            'fb_update',
            'admin' => false
        ) , true);
        $this->Session->write('fb_return_url', $fb_return_url);
        App::import('Vendor', 'facebook/facebook');
        $this->facebook = new Facebook(array(
            'appId' => Configure::read('facebook.fb_app_id') ,
            'secret' => Configure::read('facebook.fb_secrect_key') ,
            'cookie' => true
        ));
        $fb_city_login_url = $this->facebook->getLoginUrl(array(
            'redirect_uri' => Router::url(array(
                'controller' => 'users',
                'action' => 'oauth_facebook',
                'admin' => false
            ) , true) ,
            'scope' => 'email,offline_access,publish_stream'
        ));
        $this->redirect($fb_city_login_url);
        $this->autoRender = false;
    }
    public function admin_update_twitter()
    {
        $this->pageTitle = __l('Update Twitter');
        App::import('Core', 'ComponentCollection');
        $collection = new ComponentCollection();
        App::import('Component', 'OauthConsumer');
        $this->OauthConsumer = new OauthConsumerComponent($collection);
        $twitter_return_url = Router::url(array(
            'controller' => 'users',
            'action' => 'oauth_callback',
            'admin' => false
        ) , true);
        $requestToken = $this->OauthConsumer->getRequestToken('Twitter', 'https://api.twitter.com/oauth/request_token', $twitter_return_url);
        $this->Session->write('requestToken', serialize($requestToken));
        $this->redirect('http://twitter.com/oauth/authorize?oauth_token=' . $requestToken->key);
        $this->autoRender = false;
    }
    public function admin_update_foursquare()
    {
        $foursqaure_return_url = Router::url(array(
            'controller' => 'users',
            'action' => 'fs_oauth_callback',
            'admin' => false
        ) , true);
        $client_key = Configure::read('foursquare.consumer_key');
        $client_secret = Configure::read('foursquare.consumer_secret');
        include APP . 'vendors' . DS . 'foursquare' . DS . 'FoursquareAPI.class.php';
        // Load the Foursquare API library
        $foursquare = new FoursquareAPI($client_key, $client_secret);
        $redirect_url = $foursquare->AuthenticationLink($foursqaure_return_url);
        $this->redirect($redirect_url);
        $this->autoRender = false;
    }
    public function _traverse_directory($dir, $dir_count)
    {
        $handle = opendir($dir);
        while (false !== ($readdir = readdir($handle))) {
            if ($readdir != '.' && $readdir != '..') {
                $path = $dir . '/' . $readdir;
                if (is_dir($path)) {
                    @chmod($path, 0777);
                    ++$dir_count;
                    $this->_traverse_directory($path, $dir_count);
                }
                if (is_file($path)) {
                    @chmod($path, 0777);
                    @unlink($path);
                    //so that page wouldn't hang
                    flush();
                }
            }
        }
        closedir($handle);
        @rmdir($dir);
        return true;
    }
    public function fb_update()
    {
        App::import('Vendor', 'facebook/facebook');
        $this->facebook = new Facebook(array(
            'appId' => Configure::read('facebook.fb_app_id') ,
            'secret' => Configure::read('facebook.fb_secrect_key') ,
            'cookie' => true
        ));
        if ($fb_session = $this->Session->read('fbuser')) {
            $settings = $this->Setting->find('all', array(
                'conditions' => array(
                    'Setting.name' => array(
                        'facebook.fb_access_token',
                        'facebook.fb_user_id'
                    )
                ) ,
                'fields' => array(
                    'Setting.id',
                    'Setting.name'
                ) ,
                'recursive' => -1
            ));
            foreach($settings as $setting) {
                $this->request->data['Setting']['id'] = $setting['Setting']['id'];
                if ($setting['Setting']['name'] == 'facebook.fb_user_id') {
                    $this->request->data['Setting']['value'] = $fb_session['id'];
                } elseif ($setting['Setting']['name'] == 'facebook.fb_access_token') {
                    $this->request->data['Setting']['value'] = $fb_session['access_token'];
                }
                if ($this->Setting->save($this->request->data)) {
                    $this->Session->setFlash(__l('Facebook credentials updated') , 'default', null, 'success');
                } else {
                    $this->Session->setFlash(__l('Facebook credentials could not be updated. Please, try again.') , 'default', null, 'error');
                }
            }
        }
        $this->redirect(array(
            'action' => 'index',
            'admin' => true
        ));
    }
    public function crush()
    {
        $this->autoRender = false;
        App::import('Core', 'ComponentCollection');
        $collection = new ComponentCollection();
        App::import('Component', 'cron');
        $this->Cron = new CronComponent($collection);
        $this->Cron->crushPng(APP . WEBROOT_DIR, 0);
        if (!empty($_GET['f'])) {
            $this->Session->setFlash(__l('PNG images crushed successfully') , 'default', null, 'success');
            $this->redirect(Router::url('/', true) . $_GET['f']);
        }
    }
}
?>