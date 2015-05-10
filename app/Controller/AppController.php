<?php
App::uses('Controller', 'Controller');
/**
 * Application controller
 *
 * This file is the base controller of all other controllers
 *
 * PHP version 5
 *
 * @category Controllers
 * @package  Cms
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.cms.org
 */
class AppController extends Controller
{
    /**
     * Components
     *
     * @var array
     * @access public
     */
    public $components = array(
        'Cms',
        'Security',
        'Auth',
        'Cookie',
        'Session',
        'XAjax',
        'RequestHandler',
        //'DebugKit.Toolbar',
    );
    /**
     * Helpers
     *
     * @var array
     * @access public
     */
    public $helpers = array(
        'Html',
        'Form',
        'Javascript',
        'Session',
        'Text',
        'Js',
        'Time',
        'Layout',
        'Auth',
    );
    /**
     * Models
     *
     * @var array
     * @access public
     */
    public $uses = array(
        'Block',
        'Link',
        'Setting',
        'Node',
    );
    /**
     * Pagination
     */
    public $paginate = array(
        'limit' => 10,
    );
    /**
     * Cache pagination results
     *
     * @var boolean
     * @access public
     */
    public $usePaginationCache = true;
    /**
     * View
     *
     * @var string
     * @access public
     */
    public $viewClass = 'Theme';
    /**
     * Theme
     *
     * @var string
     * @access public
     */
    public $theme;
    /**
     * Constructor
     *
     * @access public
     */
    public function __construct($request = null, $response = null)
    {
        Cms::applyHookProperties('Hook.controller_properties');
        parent::__construct($request, $response);
        if ($this->name == 'CakeError') {
            $this->_set(Router::getPaths());
            $this->request->params = Router::getParams();
            $this->constructClasses();
            $this->startupProcess();
        }
		// affiliate type write cache
        $this->_cacheWriteAffiliateType();
		// For iPhone App code -->
        $this->_affiliate_referral();
    }
    function beforeRender()
    {		
        $this->set('meta_for_layout', Configure::read('meta'));		
        parent::beforeRender();		
    }
    /**
     * beforeFilter
     *
     * @return void
     */
    public function beforeFilter()
    {		
        parent::beforeFilter();
        $cur_page = $this->request->params['controller'] . '/' . $this->request->params['action'];
        // check site is under maintenance mode or not. admin can set in settings page and then we will display maintenance message, but admin side will work.
        $maintenance_exception_array = array(
            'devs/asset_js',
            'devs/asset_css',
            'devs/robots',
            'devs/sitemap',
        );
        if (Configure::read('site.maintenance_mode') && $this->Auth->user('role_id') != ConstUserTypes::Admin && empty($this->request->params['prefix']) && !in_array($cur_page, $maintenance_exception_array)) {
            throw new MaintenanceModeException(__l('Maintenance Mode'));
        }		
        $this->_checkAuth();		
        //Fix to upload the file through the flash multiple uploader
        if ((isset($_SERVER['HTTP_USER_AGENT']) && ((strtolower($_SERVER['HTTP_USER_AGENT']) == 'shockwave flash') || (strpos(strtolower($_SERVER['HTTP_USER_AGENT']) , 'adobe flash player') !== false))) && isset($this->request->params['pass'][0]) and ($this->action == 'flashupload')) {
            $this->Session->id($this->request->params['pass'][0]);
        }		
        $this->Security->blackHoleCallback = '__securityError';
        if (Configure::read('site.theme') && !isset($this->request->params['admin'])) {
            $this->theme = Configure::read('site.theme');
        }
        if (isset($this->request->params['locale'])) {
            Configure::write('Config.language', $this->request->params['locale']);
        }
        $this->layout = 'default';
        if ($this->Auth->user('role_id') == ConstUserTypes::Admin && (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin')) {
            $this->layout = 'admin';
        }
        if (Configure::read('site.maintenance_mode') && !$this->Auth->user('role_id')) {
            $this->layout = 'maintenance';
        }
        if ($this->Auth->user('fb_user_id') || (!$this->Auth->user() && Configure::read('facebook.is_enabled_facebook_connect'))) {
            App::import('Vendor', 'facebook/facebook');
            // Prevent the 'Undefined index: facebook_config' notice from being thrown.
            $GLOBALS['facebook_config']['debug'] = NULL;
            // Create a Facebook client API object.
            $this->facebook = new Facebook(array(
                'appId' => Configure::read('facebook.fb_api_key') ,
                'secret' => Configure::read('facebook.fb_secrect_key') ,
                'cookie' => true
            ));
        }
    }
	 public function _checkAuth()
    {		
        $this->Auth->autoRedirect = false;
        $this->Auth->authenticate = array(
			'Form' => array(
				'scope' => array(
					'User.is_active' => 1,
					'User.is_email_confirmed' => 1
				)
			)
		);
		$this->Auth->loginError = __l(sprintf('Sorry, login failed.  Either your %s or password are incorrect or admin deactivated your account.', Configure::read('user.using_to_login')));
        $exception_array = Configure::read('site.exception_array');
        $cur_page = $this->request->params['controller'] . '/' . $this->request->params['action'];
        if (!in_array($cur_page, $exception_array) && $this->request->params['action'] != 'flashupload') {			
            if (!$this->Auth->user('id')) {	
                // check cookie is present and it will auto login to account when session expires
                $cookie_hash = $this->Cookie->read('User.cookie_hash');
                if (!empty($cookie_hash)) {
                    if (is_integer($this->cookieTerm) || is_numeric($this->cookieTerm)) {
                        $expires = time() +intval($this->cookieTerm);
                    } else {
                        $expires = strtotime($this->cookieTerm, time());
                    }
                    App::uses('User', 'Model');
                    $user_model_obj = new User();
                    $this->request->data = $user_model_obj->find('first', array(
                        'conditions' => array(
                            'User.cookie_hash =' => md5($cookie_hash) ,
                            'User.cookie_time_modified <= ' => date('Y-m-d h:i:s', $expires) ,
                        ) ,
                        'fields' => array(
                            'User.' . Configure::read('user.using_to_login') ,
                            'User.password'
                        ) ,
                        'recursive' => -1
                    ));
                    // auto login if cookie is present
                    if ($this->Auth->login($this->request->data)) {
                        $user_model_obj->UserLogin->insertUserLogin($this->Auth->user('id'));
                        $this->redirect(Router::url('/', true) . $this->request->url);
                    }
                }				
                $this->Session->setFlash(__l('Authorisation Required'));
                $is_admin = false;				
                if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') {					
                    $is_admin = true;
                }				
               $this->redirect(array(
                    'controller' => 'users',
                    'action' => 'login',
                    'admin' => $is_admin,
                    '?f=' . $this->request->url
                ));				
            }			
            if (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin' && $this->Auth->user('role_id') != ConstUserTypes::Admin) {				
                $this->redirect('/');
            }			
        } else {			
            $this->Auth->allow('*');
        }
    }
    /**
     * blackHoleCallback for SecurityComponent
     *
     * @return void
     */
    public function __securityError($type)
    {
        switch ($type) {
            case 'auth':
                break;

            case 'csrf':
                break;

            case 'get':
                break;

            case 'post':
                break;

            case 'put':
                break;

            case 'delete':
                break;

            default:
                break;
        }
        $this->set(compact('type'));
        $this->render('../Errors/security');
    }
    function _redirectGET2Named($whitelist_param_names = null)
    {
        $query_strings = array();
        if (is_array($whitelist_param_names)) {
            foreach($whitelist_param_names as $param_name) {
                if (isset($this->request->query[$param_name])) { // querystring
                    $query_strings[$param_name] = $this->request->query[$param_name];
                }
            }
        } else {
            $query_strings = $this->request->query;
            unset($query_strings['url']); // Can't use ?url=foo

        }
        if (!empty($query_strings)) {
            $query_strings = array_merge($this->request->params['named'], $query_strings);
            $this->redirect($query_strings, null, true);
        }
    }
	function _redirectPOST2Named($paramNames = array())
    {
        //redirect the URL with query string to namedArg like URL structure...
        $query_strings = array();
        foreach($paramNames as $paramName) {
            if (!empty($this->request->data[$paramName])) { //via GET query string
				 $query_strings[$paramName] = $this->request->data[Inflector::camelize(Inflector::singularize($this->request->params->controller))][$paramName];
            }
        }
        if (!empty($query_strings)) {
            // preserve other named params
            $query_strings = array_merge($this->request->params['named'], $query_strings);
            $this->redirect($query_strings, null, true);
        }
    }
    public function admin_update()
    {
        if (!empty($this->request->data[$this->modelClass])) {
            $r = $this->request->data[$this->modelClass]['r'];
            $actionid = $this->request->data[$this->modelClass]['more_action_id'];
            unset($this->request->data[$this->modelClass]['r']);
            unset($this->request->data[$this->modelClass]['more_action_id']);
            $ids = array();
            foreach($this->request->data[$this->modelClass] as $id => $is_checked) {
                if ($is_checked['id']) {
                    $ids[] = $id;
                }
            }
            if ($actionid && !empty($ids)) {
                switch ($actionid) {
                    case ConstMoreAction::Inactive:
                        $field_name = 'is_active';
                        if (isset($this->{$this->modelClass}->_schema['is_approved'])) {
                            $field_name = 'is_approved';
                        }
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.' . $field_name => 0
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been inactivated') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Active:
                        $field_name = 'is_active';
                        if (isset($this->{$this->modelClass}->_schema['is_approved'])) {
                            $field_name = 'is_approved';
                        }
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.' . $field_name => 1
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been activated') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Delete:
                        $this->{$this->modelClass}->deleteAll(array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been deleted') , 'default', null, 'success');
                        break;
                    case ConstMoreAction::Suspend:
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.admin_suspend' => 1
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been suspended') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Unsuspend:
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.admin_suspend' => 0
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been unsuspended') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Flagged:
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.is_system_flagged' => 1
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been flagged') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Unflagged:
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.is_system_flagged' => 0
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been unflagged') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Disapproved:
                        $field_name = 'is_approved';
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.' . $field_name => 0
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been disapproved') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Approved:
                        $field_name = 'is_approved';
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.' . $field_name => 1
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been approved') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Unpublish:
                        $field_name = 'status';
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.' . $field_name => 0
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been unpublished') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Publish:
                        $field_name = 'status';
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.' . $field_name => 1
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been published') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Unpromote:
                        $field_name = 'promote';
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.' . $field_name => 0
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been promoted') , 'default', null, 'success');
                        break;

                    case ConstMoreAction::Promote:
                        $field_name = 'promote';
                        $this->{$this->modelClass}->updateAll(array(
                            $this->modelClass . '.' . $field_name => 1
                        ) , array(
                            $this->modelClass . '.id' => $ids
                        ));
                        $this->Session->setFlash(__l('Checked records has been un promoted') , 'default', null, 'success');
                        break;
                    case ConstMoreAction::Export:
                            $user_ids = implode(',', $ids);
                            $hash = $this->User->getUserIdHash($user_ids);
                            $_SESSION['user_export'][$hash] = $ids;
                            $this->Session->setFlash(__l('Checked records has been exported') , 'default', null, 'success');
                            $this->redirect(array(
                                'controller' => 'users',
                                'action' => 'export',
                                'ext' => 'csv',
                                $hash,
                                'admin' => true
                            ) , true);
                          break;
                }
            }
        }
        $this->redirect(Router::url('/', true) . $r);
    }
    public function admin_update_status($id = null)
    {
           if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
            if (!empty($this->request->params['named']['status']) && ($this->request->params['named']['status'] == 'active')) {
            $field_name = 'is_active';
            if (isset($this->{$this->modelClass}->_schema['is_approved'])) {
                $field_name = 'is_approved';
            } elseif ($this->request->params['controller'] == 'blocks'||$this->request->params['controller'] == 'nodes'||$this->request->params['controller'] == 'links') {
                $field_name = 'status';
            }
            $this->{$this->modelClass}->updateAll(array(
                $this->modelClass . '.' . $field_name => 1
            ) , array(
                $this->modelClass . '.id' => $id
            ));
            $this->Session->setFlash(__l($this->modelClass . ' has been activated') , 'default', null, 'success');
        } elseif (!empty($this->request->params['named']['status']) && ($this->request->params['named']['status'] == 'approved')) {
            $field_name = 'is_approved';
            $this->{$this->modelClass}->updateAll(array(
                $this->modelClass . '.' . $field_name => 1
            ) , array(
                $this->modelClass . '.id' => $id
            ));
            $this->Session->setFlash(__l($this->modelClass . ' has been approved') , 'default', null, 'success');
        } elseif (!empty($this->request->params['named']['status']) && ($this->request->params['named']['status'] == 'inactive')) {
             $field_name = 'is_active';
            if (isset($this->{$this->modelClass}->_schema['is_approved'])) {
                $field_name = 'is_approved';
            } elseif ($this->request->params['controller'] == 'blocks'||$this->request->params['controller'] == 'nodes'||$this->request->params['controller'] == 'links') {
                $field_name = 'status';
            }
            $this->{$this->modelClass}->updateAll(array(
                $this->modelClass . '.' . $field_name => 0
            ) , array(
                $this->modelClass . '.id' => $id
            ));
            $this->Session->setFlash(__l($this->modelClass . ' has been inactivated') , 'default', null, 'success');
        } elseif (!empty($this->request->params['named']['status']) && ($this->request->params['named']['status'] == 'disapproved')) {
            $field_name = 'is_approved';
            $this->{$this->modelClass}->updateAll(array(
                $this->modelClass . '.' . $field_name => 0
            ) , array(
                $this->modelClass . '.id' => $id
            ));
            $this->Session->setFlash(__l($this->modelClass . ' has been disapproved') , 'default', null, 'success');
        } elseif (!empty($this->request->params['named']['status']) && ($this->request->params['named']['status'] == 'flag')) {
            $this->{$this->modelClass}->updateAll(array(
                $this->modelClass . '.is_system_flagged' => 1
            ) , array(
                $this->modelClass . '.id' => $id
            ));
            $this->Session->setFlash(__l($this->modelClass . ' has been flagged') , 'default', null, 'success');
        } elseif (!empty($this->request->params['named']['status']) && ($this->request->params['named']['status'] == 'unflag')) {
            $this->{$this->modelClass}->updateAll(array(
                $this->modelClass . '.is_system_flagged' => 0
            ) , array(
                $this->modelClass . '.id' => $id
            ));
            $this->Session->setFlash(__l($this->modelClass . ' has been unflagged') , 'default', null, 'success');
        } elseif (!empty($this->request->params['named']['status']) && ($this->request->params['named']['status'] == 'suspend')) {
            $this->{$this->modelClass}->updateAll(array(
                $this->modelClass . '.admin_suspend' => 1
            ) , array(
                $this->modelClass . '.id' => $id
            ));
            $this->Session->setFlash(__l($this->modelClass . ' has been suspended') , 'default', null, 'success');
        } elseif (!empty($this->request->params['named']['status']) && ($this->request->params['named']['status'] == 'unsuspend')) {
            $this->{$this->modelClass}->updateAll(array(
                $this->modelClass . '.admin_suspend' => 0
            ) , array(
                $this->modelClass . '.id' => $id
            ));
            $this->Session->setFlash(__l($this->modelClass . ' has been unsuspended') , 'default', null, 'success');
        }
      
       if(!empty($this->request->params['named']['type'])&& $this->request->params['named']['type']=='templates'){
         $this->redirect(Router::url(array(
            'controller' => $this->request->controller,
            'action' => 'index',
            'type'=>'templates'
        ) , true));
       }elseif(!empty($this->request->params['controller'])&&($this->request->params['controller']=='links')&& $this->request->params['action']=='admin_update_status')
       {
      $this->redirect(Router::url(array(
            'controller' => $this->request->controller,
            'action' => 'index',
             $this->request->params['named']['menu_id']
        ) , true));
       }else{
           $this->redirect(Router::url(array(
            'controller' => $this->request->controller,
            'action' => 'index',
                   ) , true));
         }
      
    }
    public function isAutoSuspendEnabled($model)
    {
        if (Configure::read('suspicious_detector.is_enabled') && Configure::read('suspicious_detector.auto_suspend_' . $model . '_on_system_flag')) {
            return 1;
        } else {
            return 0;
        }
    }
    public function show_captcha()
    {
        include_once VENDORS . DS . 'securimage' . DS . 'securimage.php';
        $img = new securimage();
        $img->show(); // alternate use:  $img->show('/path/to/background.jpg');
        $this->autoRender = false;
    }
    public function captcha_play($session_var = null)
    {
        include_once VENDORS . DS . 'securimage' . DS . 'securimage.php';
        $img = new Securimage();
        $img->session_var = $session_var;
        $this->disableCache();
        $this->RequestHandler->respondAs('mp3', array(
            'attachment' => 'captcha.mp3'
        ));
        $img->audio_format = 'mp3';
        echo $img->getAudibleCode('mp3');
    }
    public function autocomplete($param_encode = null, $param_hash = null)
    {
        $modelClass = Inflector::singularize($this->name);
        $conditions = false;
        if (isset($this->{$modelClass}->_schema['is_active'])) {
            $conditions['is_active'] = '1';
        }
        $this->XAjax->autocomplete($param_encode, $param_hash, $conditions);
    }
	// affiliate type write in cache file: cake_affiliate_type_affiliate_model
    function _cacheWriteAffiliateType()
    {
        $affiliate_model = Cache::read('affiliate_model', 'affiliatetype');
        if (empty($affiliate_model) and $affiliate_model === false) {
            $this->loadModel('AffiliateType');
            $affiliateType = $this->AffiliateType->find('list', array(
                'conditions' => array(
                    'AffiliateType.is_active' => 1
                ) ,
                'fields' => array(
                    'AffiliateType.model_name',
                    'AffiliateType.id'
                ) ,
                'recursive' => -1
            ));
            foreach($affiliateType as $key => $value) {
                $splited = explode(',', $key);
                if (count($splited) > 1) {
                    unset($affiliateType[$key]);
                    $affiliate_type_id = $value;
                    foreach($splited as $key => $value) {
                        $affiliateType[$value] = $affiliate_type_id;
                    }
                }
            }
            Cache::write('affiliate_model', $affiliateType, 'affiliatetype');
            $affiliate_model = Cache::read('affiliate_model', 'affiliatetype');
        }
    }
    function _affiliate_referral()
    {
        if (!empty($this->request->params['named']['r'])) {
            $this->loadModel('User');
            $referrer = array();
            $user = $this->User->find('first', array(
                'conditions' => array(
                    'User.username' => $this->request->params['named']['r'],
                ) ,
                'fields' => array(
                    'User.username',
                    'User.id'
                ) ,
                'recursive' => -1
            ));
            if (!empty($user)) {
                // not check for particular url or page, so that set in refer_id in common, future apply for specific url
                $referrer['refer_id'] = $user['User']['id'];
                if (!empty($this->request->params['controller']) && $this->request->params['controller'] == 'users') {
                    $referrer['refer_id'] = $user['User']['id'];
                    $referrer['type'] = 'user';
                    $referrer['slug'] = '';
                }
                $this->Cookie->delete('referrer');
                $this->Cookie->write('referrer', $referrer, false, sprintf('+%s hours', Configure::read('affiliate.referral_cookie_expire_time')));
                unset($this->request->params['named']['r']);
                $params = '';
                foreach($this->request->params['pass'] as $value) {
                    $params.= $value . '/';
                }
                foreach($this->request->params['named'] as $key => $value) {
                    $params.= $key . ':' . $value . '/';
                }
                $this->redirect(array(
                    'controller' => $this->request->params['controller'],
                    'action' => $this->request->params['action'],
                    $params
                ));
            }
        }
    }
}