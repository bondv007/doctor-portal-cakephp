<?php
/**
 * Layout Helper
 *
 * PHP version 5
 *
 * @category Helper
 * @package  Cms
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.cms.org
 */
class LayoutHelper extends AppHelper
{
    /**
     * Other helpers used by this helper
     *
     * @var array
     * @access public
     */
    public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Js',
    );
    /**
     * Current Node
     *
     * @var array
     * @access public
     */
    public $node = null;
    /**
     * Core helpers
     *
     * Extra supported callbacks, like beforeNodeInfo() and afterNodeInfo(),
     * won't be called for these helpers.
     *
     * @var array
     * @access public
     */
    public $coreHelpers = array(
        // CakePHP
        'Ajax',
        'Cache',
        'Form',
        'Html',
        'Javascript',
        'JqueryEngine',
        'Js',
        'MootoolsEngine',
        'Number',
        'Paginator',
        'PrototypeEngine',
        'Rss',
        'Session',
        'Text',
        'Time',
        'Xml',
        // Cms
        'Filemanager',
        'Image',
        'Layout',
    );
    /**
     * Javascript variables
     *
     * Shows cms.js file along with useful information like the applications's basePath, etc.
     *
     * Also merges Configure::read('Js') with the Cms js variable.
     * So you can set javascript info anywhere like Configure::write('Js.my_var', 'my value'),
     * and you can access it like 'Cms.my_var' in your javascript.
     *
     * @return string
     */
    public function js()
    {
        $cms = array();
        if (isset($this->request->params['locale'])) {
            $cms['basePath'] = Router::url('/' . $this->request->params['locale'] . '/');
        } else {
            $cms['basePath'] = Router::url('/');
        }
        $cms['params'] = array(
            'controller' => $this->request->params['controller'],
            'action' => $this->request->params['action'],
            'named' => $this->request->params['named'],
        );
        if (is_array(Configure::read('Js'))) {
            $cms = Set::merge($cms, Configure::read('Js'));
        }
        $cms['cfg'] = array(
            'path_relative' => Router::url('/') ,
            'path_absolute' => Router::url('/', true) ,
            'timezone' => date('Z') /(60*60) ,
            'date_format' => 'M d, Y',
            'today_date' => date('Y-m-d')
        );
		$lang_code = Configure::read('site.language');
		$js_trans_array = array(
            'Are you sure you want to ',
            'Please select atleast one record!',
            'Are you sure you want to do this action?',
			'Enter your email address',
			'No Date Set',
			'No Time Set',
			'Please select atleast one file',
			'more',
			'less',
			'Zip Code (or) City',
			'Doctor Name',
			'Enter doctor or practice name',
        );
		foreach($js_trans_array as $trans) {
			if (!empty($GLOBALS['_langs'][$lang_code][$trans])) {
				$cms['cfg']['lang'][$trans] = $GLOBALS['_langs'][$lang_code][$trans];
			}
		}
		/*echo '<pre>';
		print_r($cms);die;*/
        return $this->Html->scriptBlock('var cfg = ' . $this->Js->object($cms) . ';');
    }
    /**
     * Status
     *
     * instead of 0/1, show tick/cross
     *
     * @param integer $value 0 or 1
     * @return string formatted img tag
     */
    public function status($value)
    {
        if ($value == 1) {
            $output = $this->Html->image('/img/icons/tick.png');
        } else {
            $output = $this->Html->image('/img/icons/cross.png');
        }
        return $output;
    }
    /**
     * Show flash message
     *
     * @return string
     */
    public function sessionFlash()
    {
        $messages = $this->Session->read('Message');
        $output = '';
        if (is_array($messages)) {
			$output = '<div class="js-flash-message flash-message-block">';
            foreach(array_keys($messages) AS $key) {
                $output.= $this->Session->flash($key);
            }
			$output.= '</div>';
        }
        return $output;
    }
    /**
     * Meta tags
     *
     * @return string
     */
    public function meta($metaForLayout = array())
    {
        $_metaForLayout = array();
        if (is_array(Configure::read('Meta'))) {
            $_metaForLayout = Configure::read('Meta');
        }
        if (count($metaForLayout) == 0 && isset($this->_View->viewVars['node']['CustomFields']) && count($this->_View->viewVars['node']['CustomFields']) > 0) {
            $metaForLayout = array();
            foreach($this->_View->viewVars['node']['CustomFields'] AS $key => $value) {
                if (strstr($key, 'meta_')) {
                    $key = str_replace('meta_', '', $key);
                    $metaForLayout[$key] = $value;
                }
            }
        }
        $metaForLayout = array_merge($_metaForLayout, $metaForLayout);
        $output = '';
        foreach($metaForLayout AS $name => $content) {
            $output.= '<meta name="' . $name . '" content="' . $content . '" />';
        }
        return $output;
    }
    /**
     * isLoggedIn
     *
     * if User is logged in
     *
     * @return boolean
     */
    public function isLoggedIn()
    {
        if ($this->Session->check('Auth.User.id')) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Feed
     *
     * RSS feeds
     *
     * @param boolean $returnUrl if true, only the URL will be returned
     * @return string
     */
    public function feed($returnUrl = false)
    {
        if (Configure::read('Site.feed_url')) {
            $url = Configure::read('Site.feed_url');
        } else {
            /*$url = Router::url(array(
            'controller' => 'nodes',
            'action' => 'index',
            'type' => 'blog',
            'ext' => 'rss',
            ));*/
            $url = '/nodes/promoted.rss';
        }
        if ($returnUrl) {
            $output = $url;
        } else {
            $url = Router::url($url);
            $output = '<link href="' . $url . '" type="application/rss+xml" rel="alternate" title="RSS 2.0" />';
            return $output;
        }
        return $output;
    }
    /**
     * Get Role ID
     *
     * @return integer
     */
    public function getRoleId()
    {
        if ($this->isLoggedIn()) {
            $roleId = $this->Session->read('Auth.User.role_id');
        } else {
            // Public
            $roleId = 3;
        }
        return $roleId;
    }
    /**
     * Region is empty
     *
     * returns true if Region has no Blocks.
     *
     * @param string $regionAlias Region alias
     * @return boolean
     */
    public function regionIsEmpty($regionAlias)
    {
        if (isset($this->_View->viewVars['blocks_for_layout'][$regionAlias]) && count($this->_View->viewVars['blocks_for_layout'][$regionAlias]) > 0) {
            return false;
        } else {
            return true;
        }
    }
    /**
     * Show Blocks for a particular Region
     *
     * @param string $regionAlias Region alias
     * @param array $options
     * @return string
     */
    public function blocks($regionAlias, $options = array())
    {
        $output = '';
        if (!$this->regionIsEmpty($regionAlias)) {
            $blocks = $this->_View->viewVars['blocks_for_layout'][$regionAlias];
            foreach($blocks AS $block) {
                $plugin = false;
                if ($block['Block']['element'] != null) {
                    if (strstr($block['Block']['element'], '.')) {
                        $plugin_element = explode('.', $block['Block']['element']);
                        $plugin = $plugin_element[0];
                        $element = $plugin_element[1];
                    } else {
                        $element = $block['Block']['element'];
                    }
                } else {
                    $element = 'block';
                }
				$_options=array(
					'block'=>$block
				);
				$options = array_merge($_options, $options);
                if ($plugin) {
                    $blockOutput = $this->_View->element($element, $options, array(
                        'plugin' => $plugin
                    ));
                } else {
                    $blockOutput = $this->_View->element($element, $options);
                }
                $enclosure = isset($block['Params']['enclosure']) ? $block['Params']['enclosure'] === "true" : true;
                if ($element != 'block' && $enclosure) {
                    $block['Block']['body'] = $blockOutput;
                    $block['Block']['element'] = null;
                    $output.= $this->_View->element('block', array(
                        'block' => $block
                    ));
                } else {
                    $output.= $blockOutput;
                }
            }
        }
		echo $output;
        return $output;
    }
    /**
     * Show Menu by Alias
     *
     * @param string $menuAlias Menu alias
     * @param array $options (optional)
     * @return string
     */
    public function menu($menuAlias, $options = array())
    {
        $_options = array(
            'tag' => 'ul',
            'tagAttributes' => array(
                'class' => 'footer-nav'
            ) ,
            'selected' => 'selected',
            'dropdown' => false,
            'dropdownClass' => 'sf-menu',
            'element' => 'menu',
        );
        $options = array_merge($_options, $options);
        if (!isset($this->_View->viewVars['menus_for_layout'][$menuAlias])) {
            return false;
        }
        $menu = $this->_View->viewVars['menus_for_layout'][$menuAlias];
        $output = $this->_View->element($options['element'], array(
            'menu' => $menu,
            'options' => $options,
        ));
        return $output;
    }
    /**
     * Nested Links
     *
     * @param array $links model output (threaded)
     * @param array $options (optional)
     * @param integer $depth depth level
     * @return string
     */
    public function nestedLinks($links, $options = array() , $depth = 1)
    {
        $_options = array();
        $options = array_merge($_options, $options);
        $output = '';
        foreach($links AS $link) {
            $linkAttr = array(
                'id' => 'link-' . $link['Link']['id'],
                'rel' => $link['Link']['rel'],
                'target' => $link['Link']['target'],
                'title' => $link['Link']['description'],
                'class' => $link['Link']['class'],
            );
            foreach($linkAttr AS $attrKey => $attrValue) {
                if ($attrValue == null) {
                    unset($linkAttr[$attrKey]);
                }
            }
            // if link is in the format: controller:contacts/action:view
            if (strstr($link['Link']['link'], 'controller:')) {
                $link['Link']['link'] = $this->linkStringToArray($link['Link']['link']);
            }
            // Remove locale part before comparing links
            if (!empty($this->request->params['locale'])) {
                $currentUrl = substr($this->_View->request->url, strlen($this->request->params['locale']));
            } else {
                $currentUrl = $this->_View->request->url;
            }
            if (Router::url($link['Link']['link']) == Router::url('/' . $currentUrl)) {
                if (!isset($linkAttr['class'])) {
                    $linkAttr['class'] = '';
                }
                $linkAttr['class'].= ' ' . $options['selected'];
            }						if ( $link['Link']['title'] == 'Careers' || $link['Link']['title'] == 'Affiliates' ) {				$linkOutput = '<a href="javascript:void(0)">'.$link['Link']['title'].'</a>';			} else {				$linkOutput = $this->Html->link($link['Link']['title'], $link['Link']['link'], $linkAttr);			}			
            
            if (isset($link['children']) && count($link['children']) > 0) {
                $linkOutput.= $this->nestedLinks($link['children'], $options, $depth+1);
            }
            $linkOutput = $this->Html->tag('li', $linkOutput);
            $output.= $linkOutput;
        }
        if ($output != null) {
            $tagAttr = $options['tagAttributes'];
            if ($options['dropdown'] && $depth == 1) {
                $tagAttr['class'] = $options['dropdownClass'];
            }
            $output = $this->Html->tag($options['tag'], $output, $tagAttr);
        }
        return $output;
    }
    /**
     * Converts strings like controller:abc/action:xyz/ to arrays
     *
     * @param string $link link
     * @return array
     */
    public function linkStringToArray($link)
    {
        $link = explode('/', $link);
        $linkArr = array();
        foreach($link AS $linkElement) {
            if ($linkElement != null) {
                $linkElementE = explode(':', $linkElement);
                if (isset($linkElementE['1'])) {
                    $linkArr[$linkElementE['0']] = $linkElementE['1'];
                } else {
                    $linkArr[] = $linkElement;
                }
            }
        }
        if (!isset($linkArr['plugin'])) {
            $linkArr['plugin'] = false;
        }
        return $linkArr;
    }
    /**
     * Show Vocabulary by Alias
     *
     * @param string $vocabularyAlias Vocabulary alias
     * @param array $options (optional)
     * @return string
     */
    public function vocabulary($vocabularyAlias, $options = array())
    {
        $_options = array(
            'tag' => 'ul',
            'tagAttributes' => array() ,
            'type' => null,
            'link' => true,
            'controller' => 'nodes',
            'action' => 'term',
            'element' => 'vocabulary',
        );
        $options = array_merge($_options, $options);
        $output = '';
        if (isset($this->_View->viewVars['vocabularies_for_layout'][$vocabularyAlias]['threaded'])) {
            $vocabulary = $this->_View->viewVars['vocabularies_for_layout'][$vocabularyAlias];
            $output.= $this->_View->element($options['element'], array(
                'vocabulary' => $vocabulary,
                'options' => $options,
            ));
        }
        return $output;
    }
    /**
     * Nested Terms
     *
     * @param array   $terms
     * @param array   $options
     * @param integer $depth
     */
    public function nestedTerms($terms, $options, $depth = 1)
    {
        $_options = array();
        $options = array_merge($_options, $options);
        $output = '';
        foreach($terms AS $term) {
            if ($options['link']) {
                $termAttr = array(
                    'id' => 'term-' . $term['Term']['id'],
                );
                $termOutput = $this->Html->link($term['Term']['title'], array(
                    'controller' => $options['controller'],
                    'action' => $options['action'],
                    'type' => $options['type'],
                    'slug' => $term['Term']['slug'],
                ) , $termAttr);
            } else {
                $termOutput = $term['Term']['title'];
            }
            if (isset($term['children']) && count($term['children']) > 0) {
                $termOutput.= $this->nestedTerms($term['children'], $options, $depth+1);
            }
            $termOutput = $this->Html->tag('li', $termOutput);
            $output.= $termOutput;
        }
        if ($output != null) {
            $output = $this->Html->tag($options['tag'], $output, $options['tagAttributes']);
        }
        return $output;
    }
    /**
     * Show nodes list
     *
     * @param string $alias Node query alias
     * @param array $options (optional)
     * @return string
     */
    public function nodeList($alias, $options = array())
    {
        $_options = array(
            'link' => true,
            'controller' => 'nodes',
            'action' => 'view',
            'element' => 'node_list',
        );
        $options = array_merge($_options, $options);
        $output = '';
        if (isset($this->_View->viewVars['nodes_for_layout'][$alias])) {
            $nodes = $this->_View->viewVars['nodes_for_layout'][$alias];
            $output = $this->_View->element($options['element'], array(
                'alias' => $alias,
                'nodesList' => $this->_View->viewVars['nodes_for_layout'][$alias],
                'options' => $options,
            ));
        }
        return $output;
    }
    /**
     * Filter content
     *
     * Replaces bbcode-like element tags
     *
     * @param string $content content
     * @return string
     */
    public function filter($content)
    {
        $content = $this->filterElements($content);
        $content = $this->filterMenus($content);
        $content = $this->filterVocabularies($content);
        $content = $this->filterNodes($content);
        return $content;
    }
    /**
     * Filter content for elements
     *
     * Original post by Stefan Zollinger: http://bakery.cakephp.org/articles/view/element-helper
     * [element:element_name] or [e:element_name]
     *
     * @param string $content
     * @return string
     */
    public function filterElements($content)
    {
        preg_match_all('/\[(element|e):([A-Za-z0-9_\-\/]*)(.*?)\]/i', $content, $tagMatches);
        $validOptions = array(
            'plugin',
            'cache',
            'callbacks'
        );
        for ($i = 0; $i < count($tagMatches[1]); $i++) {
            $regex = '/(\S+)=[\'"]?((?:.(?![\'"]?\s+(?:\S+)=|[>\'"]))*.)[\'"]?/i';
            preg_match_all($regex, $tagMatches[3][$i], $attributes);
            $element = $tagMatches[2][$i];
            $data = $options = array();
            for ($j = 0; $j < count($attributes[0]); $j++) {
                if (in_array($attributes[1][$j], $validOptions)) {
                    $options = Set::merge($options, array(
                        $attributes[1][$j] => $attributes[2][$j]
                    ));
                } else {
                    $data[$attributes[1][$j]] = $attributes[2][$j];
                }
            }
            if (!empty($this->_View->viewVars['block'])) {
                $data['block'] = $this->_View->viewVars['block'];
            }
            $content = str_replace($tagMatches[0][$i], $this->_View->element($element, $data, $options) , $content);
        }
        return $content;
    }
    /**
     * Filter content for Menus
     *
     * Replaces [menu:menu_alias] or [m:menu_alias] with Menu list
     *
     * @param string $content
     * @return string
     */
    public function filterMenus($content)
    {
        preg_match_all('/\[(menu|m):([A-Za-z0-9_\-]*)(.*?)\]/i', $content, $tagMatches);
        for ($i = 0; $i < count($tagMatches[1]); $i++) {
            $regex = '/(\S+)=[\'"]?((?:.(?![\'"]?\s+(?:\S+)=|[>\'"]))+.)[\'"]?/i';
            preg_match_all($regex, $tagMatches[3][$i], $attributes);
            $menuAlias = $tagMatches[2][$i];
            $options = array();
            for ($j = 0; $j < count($attributes[0]); $j++) {
                $options[$attributes[1][$j]] = $attributes[2][$j];
            }
            $content = str_replace($tagMatches[0][$i], $this->menu($menuAlias, $options) , $content);
        }
        return $content;
    }
    /**
     * Filter content for Vocabularies
     *
     * Replaces [vocabulary:vocabulary_alias] or [v:vocabulary_alias] with Terms list
     *
     * @param string $content
     * @return string
     */
    public function filterVocabularies($content)
    {
        preg_match_all('/\[(vocabulary|v):([A-Za-z0-9_\-]*)(.*?)\]/i', $content, $tagMatches);
        for ($i = 0; $i < count($tagMatches[1]); $i++) {
            $regex = '/(\S+)=[\'"]?((?:.(?![\'"]?\s+(?:\S+)=|[>\'"]))+.)[\'"]?/i';
            preg_match_all($regex, $tagMatches[3][$i], $attributes);
            $vocabularyAlias = $tagMatches[2][$i];
            $options = array();
            for ($j = 0; $j < count($attributes[0]); $j++) {
                $options[$attributes[1][$j]] = $attributes[2][$j];
            }
            $content = str_replace($tagMatches[0][$i], $this->vocabulary($vocabularyAlias, $options) , $content);
        }
        return $content;
    }
    /**
     * Filter content for Nodes
     *
     * Replaces [node:unique_name_for_query] or [n:unique_name_for_query] with Nodes list
     *
     * @param string $content
     * @return string
     */
    public function filterNodes($content)
    {
        preg_match_all('/\[(node|n):([A-Za-z0-9_\-]*)(.*?)\]/i', $content, $tagMatches);
        for ($i = 0; $i < count($tagMatches[1]); $i++) {
            $regex = '/(\S+)=[\'"]?((?:.(?![\'"]?\s+(?:\S+)=|[>\'"]))+.)[\'"]?/i';
            preg_match_all($regex, $tagMatches[3][$i], $attributes);
            $alias = $tagMatches[2][$i];
            $options = array();
            for ($j = 0; $j < count($attributes[0]); $j++) {
                $options[$attributes[1][$j]] = $attributes[2][$j];
            }
            $content = str_replace($tagMatches[0][$i], $this->nodeList($alias, $options) , $content);
        }
        return $content;
    }
    /**
     * Meta field: with key/value fields
     *
     * @param string $key (optional) key
     * @param string $value (optional) value
     * @param integer $id (optional) ID of Meta
     * @param array $options (optional) options
     * @return string
     */
    public function metaField($key = '', $value = null, $id = null, $options = array())
    {
        $_options = array(
            'key' => array(
                'label' => __l('Key') ,
                'value' => $key,
            ) ,
            'value' => array(
                'label' => __l('Value') ,
                'value' => $value,
            ) ,
        );
        $options = Set::merge($_options, $options);
        $uuid = String::uuid();
        $fields = '';
        if ($id != null) {
            $fields.= $this->Form->input('Meta.' . $uuid . '.id', array(
                'type' => 'hidden',
                'value' => $id
            ));
        }
        $fields.= $this->Form->input('Meta.' . $uuid . '.key', $options['key']);
        $fields.= $this->Form->input('Meta.' . $uuid . '.value', $options['value']);
        $fields = $this->Html->tag('div', $fields, array(
            'class' => 'fields'
        ));
        $actions = $this->Html->link(__l('Remove') , '#', array(
            'class' => 'remove-meta',
            'rel' => $id
        ) , null, null, false);
        $actions = $this->Html->tag('div', $actions, array(
            'class' => 'actions'
        ));
        $output = $this->Html->tag('div', $actions . $fields, array(
            'class' => 'meta'
        ));
        return $output;
    }
    /**
     * Show links under Actions column
     *
     * @param integer $id
     * @param array $options
     * @return string
     */
    public function adminRowActions($id, $options = array())
    {
        $_options = array();
        $options = array_merge($_options, $options);
        $output = '';
        $rowActions = Configure::read('Admin.rowActions.' . Inflector::camelize($this->request->params['controller']) . '/' . $this->request->params['action']);
        if (is_array($rowActions)) {
            foreach($rowActions AS $title => $rowAction) {		
				
                if ($output != '') {
                    $output.= ' ';
                }
                $link = $this->linkStringToArray(str_replace(':id', $id, $rowAction['url']));
                $output.= $this->Html->tag('li', $this->Html->link($title, $link, $rowAction['options']));
            }
        }
        return $output;
    }
    /**
     * Show tabs
     *
     * @return string
     */
    public function adminTabs($show = null)
    {
        if (!isset($this->adminTabs)) {
            $this->adminTabs = false;
        }
        $output = '';
        $tabs = Configure::read('Admin.tabs.' . Inflector::camelize($this->request->params['controller']) . '/' . $this->request->params['action']);
        if (is_array($tabs)) {
            foreach($tabs AS $title => $tab) {
                if (!isset($tab['options']['type']) || (isset($tab['options']['type']) && (in_array($this->_View->viewVars['typeAlias'], $tab['options']['type'])))) {
                    $domId = strtolower(Inflector::singularize($this->request->params['controller'])) . '-' . strtolower($title);
                    if ($this->adminTabs) {
                        if (strstr($tab['element'], '.')) {
                            $elementE = explode('.', $tab['element']);
                            $plugin = $elementE['0'];
                            $element = $elementE['1'];
                        } else {
                            $plugin = null;
                        }
                        $output.= '<div id="' . $domId . '">';
                        $output.= $this->_View->element($element, array() , array(
                            'plugin' => $plugin,
                        ));
                        $output.= '</div>';
                    } else {
                        $output.= '<li><a href="#' . $domId . '">' . $title . '</a></li>';
                    }
                }
            }
        }
        $this->adminTabs = true;
        return $output;
    }
    /**
     * Set current Node
     *
     * @param array $node
     * @return void
     */
    public function setNode($node)
    {
        $this->node = $node;
        $this->hook('afterSetNode');
    }
    /**
     * Set value of a field
     *
     * @param string $field
     * @param string $value
     * @return void
     */
    public function setNodeField($field, $value)
    {
        $model = 'Node';
        if (strstr($field, '.')) {
            $fieldE = explode('.', $field);
            $model = $fieldE['0'];
            $field = $fieldE['1'];
        }
        $this->node[$model][$field] = $value;
    }
    /**
     * Get value of a Node field
     *
     * @param string $field
     * @return string
     */
    public function node($field = 'id')
    {
        $model = 'Node';
        if (strstr($field, '.')) {
            $fieldE = explode('.', $field);
            $model = $fieldE['0'];
            $field = $fieldE['1'];
        }
        if (isset($this->node[$model][$field])) {
            return $this->node[$model][$field];
        } else {
            return false;
        }
    }
    /**
     * Node info
     *
     * @param array $options
     * @return string
     */
    public function nodeInfo($options = array())
    {
        $_options = array(
            'element' => 'node_info',
        );
        $options = array_merge($_options, $options);
        $output = $this->hook('beforeNodeInfo');
        $output.= $this->_View->element($options['element']);
        $output.= $this->hook('afterNodeInfo');
        return $output;
    }
    /**
     * Node excerpt (summary)
     *
     * @param array $options
     * @return string
     */
    public function nodeExcerpt($options = array())
    {
        $_options = array(
            'element' => 'node_excerpt',
        );
        $options = array_merge($_options, $options);
        $output = $this->hook('beforeNodeExcerpt');
        $output.= $this->_View->element($options['element']);
        $output.= $this->hook('afterNodeExcerpt');
        return $output;
    }
    /**
     * Node body
     *
     * @param array $options
     * @return string
     */
    public function nodeBody($options = array())
    {
        $_options = array(
            'element' => 'node_body',
        );
        $options = array_merge($_options, $options);
        $output = $this->hook('beforeNodeBody');
        $output.= $this->_View->element($options['element']);
        $output.= $this->hook('afterNodeBody');
        return $output;
    }
    /**
     * Node more info
     *
     * @param array $options
     * @return string
     */
    public function nodeMoreInfo($options = array())
    {
        $_options = array(
            'element' => 'node_more_info',
        );
        $options = array_merge($_options, $options);
        $output = $this->hook('beforeNodeMoreInfo');
        $output.= $this->_View->element($options['element']);
        $output.= $this->hook('afterNodeMoreInfo');
        return $output;
    }
    /**
     * Hook
     *
     * Used for calling hook methods from other HookHelpers
     *
     * @param string $methodName
     * @return string
     */
    public function hook($methodName)
    {
        $output = '';
        foreach($this->_View->helpers AS $helper => $settings) {
            if (!is_string($helper) || in_array($helper, $this->coreHelpers)) {
                continue;
            }
            if (strstr($helper, '.')) {
                $helperE = explode('.', $helper);
                $helper = $helperE['1'];
            }
            if (isset($this->_View->{$helper}) && method_exists($this->_View->{$helper}, $methodName)) {
                $output.= $this->_View->{$helper}->$methodName();
            }
        }
        return $output;
    }
    /** Generate Admin menus added by CmsNav::add()
     *
     * @param array $menus
     * @param array $options
     * @return string menu html tags
     */
    function adminMenus($menus, $options = array())
    {
		unset($menus['cms']);
		$options = Set::merge(array(
            'children' => true,
            'htmlAttributes' => array(
                'class' => 'sf-menu',
            ) ,
        ) , $options);
        $out = null;
        $sorted = Set::sort($menus, '{[a-zA-Z _-]+}.weight', 'ASC');
        $out = '<ul class="admin-links clearfix">';
		$icon_class = '';
        foreach($sorted as $menu) {
            $controller_arr = array();
            $action_arr = array();
            $controller_arr[] = $menu['url']['controller'];
            $action_arr[] = $menu['url']['action'];
            if (!empty($menu['children'])) {
                foreach($menu['children'] as $child) {
                    if (!empty($child['url']['controller'])) {
                        $controller_arr[] = $child['url']['controller'];
                    }
                    if (!empty($child['url']['action'])) {
                        $action_arr[] = $child['url']['action'];
                    }
                }
            }
            $controller_arr = array_unique($controller_arr);
            $action_arr = array_unique($action_arr);
            if (empty($menu['htmlAttributes']['class'])) {
                $menuClass = Inflector::slug(strtolower('menu-' . $menu['title']) , '-');
                $menu['htmlAttributes'] = Set::merge(array(
                    'class' => $menuClass
                ) , $menu['htmlAttributes']);
            }
            $link = $this->Html->link($menu['title'], $menu['url'], $menu['htmlAttributes']);
            $active_class = '';
            if (!empty($menu['dashboard_action'])) {
                $active_class = (in_array($this->request->params['controller'], $controller_arr) && $this->request->params['action'] == $menu['dashboard_action']) ? 'active' : null;
				if(empty($icon_class) && !empty($active_class))
				{
					$icon_class = (in_array($this->request->params['controller'], $controller_arr) && $this->request->params['action'] == $menu['dashboard_action']) ? $menu['title'] : null;
					Configure::write('admin_heading_class', strtolower($icon_class) . '-title');
				}
            } elseif (!empty($menu['user_action'])) {
                $active_class = (in_array($this->request->params['controller'], $controller_arr) && !in_array($this->request->params['action'], $menu['user_action'])) ? 'active' : null;
				if(empty($icon_class) && !empty($active_class))
				{
					$icon_class = (in_array($this->request->params['controller'], $controller_arr) && !in_array($this->request->params['action'], $menu['user_action'])) ? $menu['title'] : null;
					Configure::write('admin_heading_class', strtolower($icon_class) . '-title');
				}
            } else {
                $active_class = (in_array($this->request->params['controller'], $controller_arr)) ? ' active' : null;
				if(empty($icon_class) && !empty($active_class))
				{
					$icon_class = (in_array($this->request->params['controller'], $controller_arr)) ? $menu['title'] : null;
					Configure::write('admin_heading_class', strtolower($icon_class) . '-title');
				}
            }
            $out.= '<li class="' . $active_class . '">';
            $out.= '<span class="amenu-left">';
            $out.= '<span class="amenu-right">';
            $out.= '<span class="menu-center ' . $menu['icon-class'] . '">';
            $out.= $menu['title'];
            $out.= '</span>';
            $out.= '</span>';
            $out.= '</span>';
			if(empty($menu['column']))
			{
				// to do instant fix
				if($menu['icon-class']=='admin-cms') {
					$out.= '<div class=" admin-cms-block">';
				}
				else{
					$out.= '<div class="admin-sub-block ">';
				}
			}
			else
			{
				$out.= '<div class=" admin-cms-block admin-sub-block2">';
			}
            $out.= '<div class="admin-top-lblock">';
            $out.= '<div class="admin-top-rblock">';
            $out.= '<div class="admin-top-cblock">';
            $out.= '</div>';
            $out.= '</div>';
            $out.= '</div>';
            $out.= '<div class="admin-sub-lblock">';
            $out.= '<div class="admin-sub-rblock">';
            $out.= '<div class="admin-sub-cblock">';
			if($menu['icon-class']=='admin-setting')
			{
				$out.= '<div class="setting-overview"><p class="grid_right">';
				$out.= $this->Html->link(__l('Settings Overview'), array('controller'=>'settings','action'=>'index'));
				$out.= '</p></div>';
			}
			if($menu['icon-class']=='admin-masters')
			{
				$out.= '<div class="page-info">';
				$out.= __l('Warning! Please edit with caution.');
				$out.= '</div>';
			}
            if (empty($menu['is_hide_title'])) {
                $out.= '<h4>' . $menu['title'] . '</h4>';
            }
			if($menu['icon-class']=='admin-cms')
			{
			
				$out.="<h3 class='contest-builder'>";
				$out.=__l('Contest Builder');
				$out.="</h3>";
				$out.="<div class='contest-builder-block'>";
				$out.="<div class='contest-cms-block'>";
				$out.=$this->Html->link(__l('Contest Form and Pricing for Types'), array('controller'=>'contest_types','action'=>'index'));
				$out.="<p class='entry-info'>";
				$out.=__l('e.g., Entry Form for logo contest, Webdesign contest, etc');
				$out.="</p>";
				$out.="</div>";
				$out.="</div>";
				$out.="<div class='themes-cms-block clearfix'>";
            	$out.="<h3 class='theme-manager grid_left'>";
				$out.=__l('Theme Manager');
				$out.="</h3>";
				$out.="<ul class='cms-left cms-link grid_left'>";
				$out.="<li>";
				$out.=$this->Html->link(__l('Themes'), array('controller'=>'extensions_themes','action'=>'index'));
				$out.="<span>";
				$out.=__l('Manage your site themes');
				$out.="</span>";
				$out.="</li>";
				$out.="</ul>";
                $out.="</div>";
				$out.="<h3 class='cms-builder'>";
				$out.=__l('CMS Builder');
				$out.="</h3>";
				$out.="<div class='cms-builder-block clearfix'>";
				$out.="<ul class='cms-left cms-link grid_left'>";

				$out.="<li>";
				$out.=$this->Html->link(__l('Contents'), array('controller'=>'nodes','action'=>'index'));
				$out.="</li>";
				$out.="<li>";
				$out.=$this->Html->link(__l('Blocks'), array('controller'=>'blocks','action'=>'index'));
				$out.="<span>";
				$out.=__l('Blocks for reusable chunks for contents');
				$out.="</span>";
				$out.="</li>";
			    $out.="</ul>";
				$out.="<ul class='cms-right cms-link grid_left'>";
				$out.="<li>";
				$out.=$this->Html->link(__l('Menus'), array('controller'=>'menus','action'=>'index'));
				$out.="<span>";
				$out.=__l('Menus for CMS contents');
				$out.="</span>";
				$out.="</li>";
				$out.="</ul>";
				$out.="</div>";
			}
			else
			{
				if (!empty($menu['children'])) 
				{
					if (!empty($menu['column']) && $menu['column'] > 1) {
						$out.= '<ul class="admin-sub-links">';
						$out.= '<li>';
						$out.= '<ul class="clearfix">';
						for ($i = 1; $i <= $menu['column']; $i++) {
							if ($i == 1) {
								$from = 0;
								$to = (!empty($menu['column_1'])) ? $menu['column_1'] : round(count($menu['children']) /$menu['column']);
								$li_class = 'admin-sub-links-left';
							} else {
								$from = $to+1;
								$to = count($menu['children']);
								$li_class = 'admin-sub-links-right';
							}
							$out.= '<li class="' . $li_class . ' grid_left">';
							$out.= '<ul>';
							$out.= $this->_getLinks($menu, $from, $to);
							$out.= '</ul>';
							$out.= '</li>';
						}
						$out.= '</ul>';
						$out.= '</li>';
						$out.= '</ul>';
					} else {
						$out.= '<ul>';
						$out.= $this->_getLinks($menu);
						$out.= '</ul>';
					}
				}
			}
            $out.= '</div>';
            $out.= '</div>';
            $out.= '</div>';
            $out.= '<div class="admin-bot-lblock">';
            $out.= '<div class="admin-bot-rblock">';
            $out.= '<div class="admin-bot-cblock">';
            $out.= '</div>';
            $out.= '</div>';
            $out.= '</div>';
            $out.= '</div>';
            $out.= '</li>';
        }
        $out.= '</ul>';

        return $out;
    }
    function _getLinks($menu, $from = 0, $to = 0)
    {
        $out = '';
        $i = 0;
        foreach($menu['children'] as $child) {
            if ((empty($from) && empty($to)) || ($i >= $from && $i <= $to)) {
				if (empty($child['htmlAttributes']['title'])) {
					$child['htmlAttributes']['title']=$child['title'];
				}
                $out.= '<li>';
                if (!empty($child['url'])) {
                    $out.= $this->Html->link($child['title'], $child['url'], $child['htmlAttributes']);
                } else {
                    $out.= '<h4>' . $child['title'] . '</h4>';
                }
                $out.= '</li>';
            }
			$i++;
        }
        return $out;
    }
}
?>