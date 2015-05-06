<?php
/**
 * Nodes Controller
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
class NodesController extends AppController
{
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Nodes';
    /**
     * Components
     *
     * @var array
     * @access public
     */
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array(
        'Node',
		'City',
		'Specialty',
		'InsuranceCompany'
    );
    /** Default pagination config
     */
    public $paginate = array(
        'limit' => 10,
    );
    public function beforeFilter()
    {
        parent::beforeFilter();		
        if (isset($this->request->params['slug'])) {
            $this->request->params['named']['slug'] = $this->request->params['slug'];
        }
        if (isset($this->request->params['type'])) {
            $this->request->params['named']['type'] = $this->request->params['type'];
        }
    }
    public function admin_index()
    {
        $this->pageTitle = __l('Content');
        $this->Node->recursive = 0;
        $this->paginate['Node']['order'] = 'Node.created DESC';
        $this->paginate['Node']['conditions'] = array();
        $types = $this->Node->Taxonomy->Vocabulary->Type->find('all');
        $typeAliases = Set::extract('/Type/alias', $types);
        $this->paginate['Node']['conditions']['Node.type'] = $typeAliases;
        if (isset($this->request->params['named']['filter'])) {
            $filters = $this->Cms->extractFilter();
            foreach($filters AS $filterKey => $filterValue) {
                if (strpos($filterKey, '.') === false) {
                    $filterKey = 'Node.' . $filterKey;
                }
                $this->paginate['Node']['conditions'][$filterKey] = $filterValue;
            }
            $this->set('filters', $filters);
        }
        if (isset($this->request->params['named']['q'])) {
            App::uses('Sanitize', 'Utility');
            $q = Sanitize::clean($this->request->params['named']['q']);
            $this->paginate['Node']['conditions']['OR'] = array(
                'Node.title LIKE' => '%' . $q . '%',
                'Node.excerpt LIKE' => '%' . $q . '%',
                'Node.body LIKE' => '%' . $q . '%',
                'Node.terms LIKE' => '%"' . $q . '"%',
            );
        }
        $nodes = $this->paginate('Node');
        $moreActions = $this->Node->moreActions;
        $this->set(compact('moreActions'));
        $this->set(compact('nodes', 'types', 'typeAliases'));
        if (isset($this->request->params['named']['links'])) {
            $this->layout = 'ajax';
            $this->render('admin_links');
        }
    }
    public function admin_create()
    {
        $this->pageTitle = __l('Create content');
        $types = $this->Node->Taxonomy->Vocabulary->Type->find('all', array(
            'order' => array(
                'Type.alias' => 'ASC',
            ) ,
        ));
        $this->set(compact('types'));
    }
    public function admin_add($typeAlias = 'node')
    {
        $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias($typeAlias);
        if (!isset($type['Type']['alias'])) {
            $this->Session->setFlash(__l('Content type does not exist.'));
            $this->redirect(array(
                'action' => 'create'
            ));
        }
        $this->pageTitle.= sprintf(__l('Create content: %s') , $type['Type']['title']);
        $this->Node->type = $type['Type']['alias'];
        $this->Node->Behaviors->attach('Tree', array(
            'scope' => array(
                'Node.type' => $this->Node->type,
            ) ,
        ));
        if (!empty($this->request->data)) {
            if (isset($this->request->data['TaxonomyData'])) {
                $this->request->data['Taxonomy'] = array(
                    'Taxonomy' => array() ,
                );
                foreach($this->request->data['TaxonomyData'] AS $vocabularyId => $taxonomyIds) {
                    if (is_array($taxonomyIds)) {
                        $this->request->data['Taxonomy']['Taxonomy'] = array_merge($this->request->data['Taxonomy']['Taxonomy'], $taxonomyIds);
                    }
                }
            }
            $this->Node->create();
            $this->request->data['Node']['path'] = $this->Cms->getRelativePath(array(
                'admin' => false,
                'controller' => 'nodes',
                'action' => 'view',
                'type' => $this->Node->type,
                'slug' => $this->request->data['Node']['slug'],
            ));
            if ($this->Node->saveWithMeta($this->request->data)) {
                $this->Session->setFlash(sprintf(__l('%s has been saved') , $type['Type']['title']) , 'default', array(
                    'class' => 'success'
                ));
                if (isset($this->request->data['apply'])) {
                    $this->redirect(array(
                        'action' => 'edit',
                        $this->Node->id
                    ));
                } else {
                    $this->redirect(array(
                        'action' => 'index'
                    ));
                }
            } else {
                $this->Session->setFlash(sprintf(__l('%s could not be saved. Please, try again.') , $type['Type']['title']) , 'default', array(
                    'class' => 'error'
                ));
            }
        } else {
            $this->request->data['Node']['user_id'] = $this->Session->read('Auth.User.id');
        }
        $nodes = $this->Node->generateTreeList();
        $users = $this->Node->User->find('list');
        $vocabularies = Set::combine($type['Vocabulary'], '{n}.id', '{n}');
        $taxonomy = array();
        foreach($type['Vocabulary'] AS $vocabulary) {
            $vocabularyId = $vocabulary['id'];
            $taxonomy[$vocabularyId] = $this->Node->Taxonomy->getTree($vocabulary['alias'], array(
                'taxonomyId' => true
            ));
        }
        $this->set(compact('typeAlias', 'type', 'nodes', 'roles', 'vocabularies', 'taxonomy', 'users'));
    }
    public function admin_edit($id = null)
    {
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__l('Invalid content') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        $this->pageTitle = __l('Edit Node');
        $this->Node->id = $id;
        $typeAlias = $this->Node->field('type');
        $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias($typeAlias);
        /* if (!isset($type['Type']['alias'])) {
            $this->Session->setFlash(__l('Content type does not exist.') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'create'
            ));
        } */
        $this->set('title_for_layout', sprintf(__l('Edit content: %s') , $type['Type']['title']));
        $this->Node->type = $type['Type']['alias'];
        $this->Node->Behaviors->attach('Tree', array(
            'scope' => array(
                'Node.type' => $this->Node->type
            )
        ));
        if (!empty($this->request->data)) {
            if (isset($this->request->data['TaxonomyData'])) {
                $this->request->data['Taxonomy'] = array(
                    'Taxonomy' => array() ,
                );
                foreach($this->request->data['TaxonomyData'] AS $vocabularyId => $taxonomyIds) {
                    if (is_array($taxonomyIds)) {
                        $this->request->data['Taxonomy']['Taxonomy'] = array_merge($this->request->data['Taxonomy']['Taxonomy'], $taxonomyIds);
                    }
                }
            }
            $this->request->data['Node']['path'] = $this->Cms->getRelativePath(array(
                'admin' => false,
                'controller' => 'nodes',
                'action' => 'view',
                'type' => $this->Node->type,
                'slug' => $this->request->data['Node']['slug'],
            ));
            if ($this->Node->saveWithMeta($this->request->data)) {
                $this->Session->setFlash(sprintf(__l('%s has been saved') , $type['Type']['title']) , 'default', array(
                    'class' => 'success'
                ));
                if (isset($this->request->data['apply'])) {
                    $this->redirect(array(
                        'action' => 'edit',
                        $this->Node->id
                    ));
                } else {
                    $this->redirect(array(
                        'action' => 'index'
                    ));
                }
            } else {
                $this->Session->setFlash(sprintf(__l('%s could not be saved. Please, try again.') , $type['Type']['title']) , 'default', array(
                    'class' => 'error'
                ));
            }
        }
        if (empty($this->request->data)) {
            $data = $this->Node->read(null, $id);
            $this->request->data = $data;
        }
        $nodes = $this->Node->generateTreeList();
        $users = $this->Node->User->find('list');
        $vocabularies = Set::combine($type['Vocabulary'], '{n}.id', '{n}');
        $taxonomy = array();
        foreach($type['Vocabulary'] AS $vocabulary) {
            $vocabularyId = $vocabulary['id'];
            $taxonomy[$vocabularyId] = $this->Node->Taxonomy->getTree($vocabulary['alias'], array(
                'taxonomyId' => true
            ));
        }
        $this->set(compact('typeAlias', 'type', 'nodes', 'roles', 'vocabularies', 'taxonomy', 'users'));
    }
    public function admin_update_paths()
    {
        $types = $this->Node->Taxonomy->Vocabulary->Type->find('list', array(
            'fields' => array(
                'Type.id',
                'Type.alias',
            ) ,
        ));
        $typesAlias = array_values($types);
        $nodes = $this->Node->find('all', array(
            'conditions' => array(
                'Node.type' => $typesAlias,
            ) ,
            'fields' => array(
                'Node.id',
                'Node.slug',
                'Node.type',
                'Node.path',
            ) ,
            'recursive' => '-1',
        ));
        foreach($nodes AS $node) {
            $node['Node']['path'] = $this->Cms->getRelativePath(array(
                'admin' => false,
                'controller' => 'nodes',
                'action' => 'view',
                'type' => $node['Node']['type'],
                'slug' => $node['Node']['slug'],
            ));
            $this->Node->id = false;
            $this->Node->save($node);
        }
        $this->Session->setFlash(__l('Paths updated.') , 'default', array(
            'class' => 'success'
        ));
        $this->redirect(array(
            'action' => 'index'
        ));
    }
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->Node->delete($id)) {
            $this->Session->setFlash(__l('Node deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
    public function admin_delete_meta($id = null)
    {
        $success = false;
        if ($id != null && $this->Node->Meta->delete($id)) {
            $success = true;
        }
        $this->set(compact('success'));
    }
    public function admin_add_meta()
    {
        $this->layout = 'ajax';
    }
    public function admin_process()
    {
        $action = $this->request->data['Node']['action'];
        $ids = array();
        foreach($this->request->data['Node'] AS $id => $value) {
            if ($id != 'action' && $value['id'] == 1) {
                $ids[] = $id;
            }
        }
        if (count($ids) == 0 || $action == null) {
            $this->Session->setFlash(__l('No items selected.') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        if ($action == 'delete' && $this->Node->deleteAll(array(
            'Node.id' => $ids
        ) , true, true)) {
            $this->Session->setFlash(__l('Nodes deleted.') , 'default', array(
                'class' => 'success'
            ));
        } elseif ($action == 'publish' && $this->Node->updateAll(array(
            'Node.status' => 1
        ) , array(
            'Node.id' => $ids
        ))) {
            $this->Session->setFlash(__l('Nodes published') , 'default', array(
                'class' => 'success'
            ));
        } elseif ($action == 'unpublish' && $this->Node->updateAll(array(
            'Node.status' => 0
        ) , array(
            'Node.id' => $ids
        ))) {
            $this->Session->setFlash(__l('Nodes unpublished') , 'default', array(
                'class' => 'success'
            ));
        } elseif ($action == 'promote' && $this->Node->updateAll(array(
            'Node.promote' => 1
        ) , array(
            'Node.id' => $ids
        ))) {
            $this->Session->setFlash(__l('Nodes promoted') , 'default', array(
                'class' => 'success'
            ));
        } elseif ($action == 'unpromote' && $this->Node->updateAll(array(
            'Node.promote' => 0
        ) , array(
            'Node.id' => $ids
        ))) {
            $this->Session->setFlash(__l('Nodes unpromoted') , 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__l('An error occurred.') , 'default', array(
                'class' => 'error'
            ));
        }
        $this->redirect(array(
            'action' => 'index'
        ));
    }
    public function index()
    {
        if (!isset($this->request->params['named']['type'])) {
            $this->request->params['named']['type'] = 'node';
        }
        $this->paginate['Node']['order'] = 'Node.created DESC';
        $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
        $this->paginate['Node']['conditions'] = array(
            'Node.status' => 1,
        );
        $this->paginate['Node']['contain'] = array(
            'Meta',
            'Taxonomy' => array(
                'Term',
                'Vocabulary',
            ) ,
            'User',
        );
        if (isset($this->request->params['named']['type'])) {
            $type = $this->Node->Taxonomy->Vocabulary->Type->find('first', array(
                'conditions' => array(
                    'Type.alias' => $this->request->params['named']['type'],
                ) ,
                'cache' => array(
                    'name' => 'type_' . $this->request->params['named']['type'],
                    'config' => 'nodes_index',
                ) ,
            ));
            if (!isset($type['Type']['id'])) {
                $this->Session->setFlash(__l('Invalid content type.') , 'default', array(
                    'class' => 'error'
                ));
                $this->redirect('/');
            }
            if (isset($type['Params']['nodes_per_page'])) {
                $this->paginate['Node']['limit'] = $type['Params']['nodes_per_page'];
            }
            $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
            $this->set('title_for_layout', $type['Type']['title']);
        }
        if ($this->usePaginationCache) {
            $cacheNamePrefix = 'nodes_index_' . $this->Cms->roleId . '_' . Configure::read('Config.language');
            if (isset($type)) {
                $cacheNamePrefix.= '_' . $type['Type']['alias'];
            }
            $this->paginate['page'] = isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1;
            $cacheName = $cacheNamePrefix . '_' . $this->request->params['named']['type'] . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'];
            $cacheNamePaging = $cacheNamePrefix . '_' . $this->request->params['named']['type'] . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'] . '_paging';
            $cacheConfig = 'nodes_index';
            $nodes = Cache::read($cacheName, $cacheConfig);
            if (!$nodes) {
                $nodes = $this->paginate('Node');
                Cache::write($cacheName, $nodes, $cacheConfig);
                Cache::write($cacheNamePaging, $this->request->params['paging'], $cacheConfig);
            } else {
                $paging = Cache::read($cacheNamePaging, $cacheConfig);
                $this->request->params['paging'] = $paging;
                $this->helpers[] = 'Paginator';
            }
        } else {
            $nodes = $this->paginate('Node');
        }
        $this->set(compact('type', 'nodes'));
        $this->_viewFallback(array(
            'index_' . $type['Type']['alias'],
        ));
    }
    public function term()
    {
        $term = $this->Node->Taxonomy->Term->find('first', array(
            'conditions' => array(
                'Term.slug' => $this->request->params['named']['slug'],
            ) ,
            'cache' => array(
                'name' => 'term_' . $this->request->params['named']['slug'],
                'config' => 'nodes_term',
            ) ,
        ));
        if (!isset($term['Term']['id'])) {
            $this->Session->setFlash(__l('Invalid Term.') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect('/');
        }
        if (!isset($this->request->params['named']['type'])) {
            $this->request->params['named']['type'] = 'node';
        }
        $this->paginate['Node']['order'] = 'Node.created DESC';
        $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
        $this->paginate['Node']['conditions'] = array(
            'Node.status' => 1,
            'Node.terms LIKE' => '%"' . $this->request->params['named']['slug'] . '"%',
        );
        $this->paginate['Node']['contain'] = array(
            'Meta',
            'Taxonomy' => array(
                'Term',
                'Vocabulary',
            ) ,
            'User',
        );
        if (isset($this->request->params['named']['type'])) {
            $type = $this->Node->Taxonomy->Vocabulary->Type->find('first', array(
                'conditions' => array(
                    'Type.alias' => $this->request->params['named']['type'],
                ) ,
                'cache' => array(
                    'name' => 'type_' . $this->request->params['named']['type'],
                    'config' => 'nodes_term',
                ) ,
            ));
            if (!isset($type['Type']['id'])) {
                $this->Session->setFlash(__l('Invalid content type.') , 'default', array(
                    'class' => 'error'
                ));
                $this->redirect('/');
            }
            if (isset($type['Params']['nodes_per_page'])) {
                $this->paginate['Node']['limit'] = $type['Params']['nodes_per_page'];
            }
            $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
            $this->set('title_for_layout', $term['Term']['title']);
        }
        if ($this->usePaginationCache) {
            $cacheNamePrefix = 'nodes_term_' . $this->Cms->roleId . '_' . $this->request->params['named']['slug'] . '_' . Configure::read('Config.language');
            if (isset($type)) {
                $cacheNamePrefix.= '_' . $type['Type']['alias'];
            }
            $this->paginate['page'] = isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1;
            $cacheName = $cacheNamePrefix . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'];
            $cacheNamePaging = $cacheNamePrefix . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'] . '_paging';
            $cacheConfig = 'nodes_term';
            $nodes = Cache::read($cacheName, $cacheConfig);
            if (!$nodes) {
                $nodes = $this->paginate('Node');
                Cache::write($cacheName, $nodes, $cacheConfig);
                Cache::write($cacheNamePaging, $this->request->params['paging'], $cacheConfig);
            } else {
                $paging = Cache::read($cacheNamePaging, $cacheConfig);
                $this->request->params['paging'] = $paging;
                $this->helpers[] = 'Paginator';
            }
        } else {
            $nodes = $this->paginate('Node');
        }
        $this->set(compact('term', 'type', 'nodes'));
        $this->_viewFallback(array(
            'term_' . $term['Term']['id'],
            'term_' . $type['Type']['alias'],
        ));
    }
    public function promoted()
    {
        $this->set('title_for_layout', __l('Nodes'));
        $this->paginate['Node']['order'] = 'Node.created DESC';
        $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
        $this->paginate['Node']['conditions'] = array(
            'Node.status' => 1,
            'Node.promote' => 1,
        );
        $this->paginate['Node']['contain'] = array(
            'Meta',
            'Taxonomy' => array(
                'Term',
                'Vocabulary',
            ) ,
            'User',
        );
        if (isset($this->request->params['named']['type'])) {
            $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias($this->request->params['named']['type']);
            if (!isset($type['Type']['id'])) {
                $this->Session->setFlash(__l('Invalid content type.') , 'default', array(
                    'class' => 'error'
                ));
                $this->redirect('/');
            }
            if (isset($type['Params']['nodes_per_page'])) {
                $this->paginate['Node']['limit'] = $type['Params']['nodes_per_page'];
            }
            $this->paginate['Node']['conditions']['Node.type'] = $type['Type']['alias'];
            $this->set('title_for_layout', $type['Type']['title']);
            $this->set(compact('type'));
        }
        if ($this->usePaginationCache) {
            $cacheNamePrefix = 'nodes_promoted_' . $this->Cms->roleId . '_' . Configure::read('Config.language');
            if (isset($type)) {
                $cacheNamePrefix.= '_' . $type['Type']['alias'];
            }
            $this->paginate['page'] = isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1;
            $cacheName = $cacheNamePrefix . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'];
            $cacheNamePaging = $cacheNamePrefix . '_' . $this->paginate['page'] . '_' . $this->paginate['Node']['limit'] . '_paging';
            $cacheConfig = 'nodes_promoted';
            $nodes = Cache::read($cacheName, $cacheConfig);
            if (!$nodes) {
                $nodes = $this->paginate('Node');
                Cache::write($cacheName, $nodes, $cacheConfig);
                Cache::write($cacheNamePaging, $this->request->params['paging'], $cacheConfig);
            } else {
                $paging = Cache::read($cacheNamePaging, $cacheConfig);
                $this->request->params['paging'] = $paging;
                $this->helpers[] = 'Paginator';
            }
        } else {
            $nodes = $this->paginate('Node');
        }
        $this->set(compact('nodes'));
    }
    public function search($typeAlias = null)
    {
        if (!isset($this->request->params['named']['q'])) {
            $this->redirect('/');
        }
        App::uses('Sanitize', 'Utility');
        $q = Sanitize::clean($this->request->params['named']['q']);
        $this->paginate['Node']['order'] = 'Node.created DESC';
        $this->paginate['Node']['limit'] = Configure::read('Reading.nodes_per_page');
        $this->paginate['Node']['conditions'] = array(
            'Node.status' => 1,
            'AND' => array(
                array(
                    'OR' => array(
                        'Node.title LIKE' => '%' . $q . '%',
                        'Node.excerpt LIKE' => '%' . $q . '%',
                        'Node.body LIKE' => '%' . $q . '%',
                        'Node.terms LIKE' => '%"' . $q . '"%',
                    ) ,
                ) ,
                array(
                    'OR' => array(
                        'Node.visibility_roles' => '',
                        'Node.visibility_roles LIKE' => '%"' . $this->Cms->roleId . '"%',
                    ) ,
                ) ,
            ) ,
        );
        $this->paginate['Node']['contain'] = array(
            'Meta',
            'Taxonomy' => array(
                'Term',
                'Vocabulary',
            ) ,
            'User',
        );
        if ($typeAlias) {
            $type = $this->Node->Taxonomy->Vocabulary->Type->findByAlias($typeAlias);
            if (!isset($type['Type']['id'])) {
                $this->Session->setFlash(__l('Invalid content type.') , 'default', array(
                    'class' => 'error'
                ));
                $this->redirect('/');
            }
            if (isset($type['Params']['nodes_per_page'])) {
                $this->paginate['Node']['limit'] = $type['Params']['nodes_per_page'];
            }
            $this->paginate['Node']['conditions']['Node.type'] = $typeAlias;
        }
        $nodes = $this->paginate('Node');
        $this->set('title_for_layout', sprintf(__l('Search Results: %s') , $q));
        $this->set(compact('q', 'nodes'));
        if ($typeAlias) {
            $this->_viewFallback(array(
                'search_' . $typeAlias,
            ));
        }
    }
    public function view($id = null)
    {
             if (isset($this->request->params['named']['slug']) && isset($this->request->params['named']['type'])) {
            $this->Node->type = $this->request->params['named']['type'];
            $type = $this->Node->Taxonomy->Vocabulary->Type->find('first', array(
                'conditions' => array(
                    'Type.alias' => $this->Node->type,
                ) ,
                'cache' => array(
                    'name' => 'type_' . $this->Node->type,
                    'config' => 'nodes_view',
                ) ,
            ));
              $node = $this->Node->find('first', array(
                'conditions' => array(
                    'Node.slug' => $this->request->params['named']['slug'],
                    'Node.type' => $this->request->params['named']['type'],
                    'Node.status' => 1,
                ) ,
                'contain' => array(
                    'Meta',
                    'Taxonomy' => array(
                        'Term',
                        'Vocabulary',
                    ) ,
                    'User',
                ) ,
                'cache' => array(
                    'name' => 'node_' . $this->Cms->roleId . '_' . $this->request->params['named']['type'] . '_' . $this->request->params['named']['slug'],
                    'config' => 'nodes_view',
                )
            ));
             } elseif ($id == null) {
               $this->Session->setFlash(__l('Invalid content') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect('/');
        } else {
            $node = $this->Node->find('first', array(
                'conditions' => array(
                    'Node.id' => $id,
                    'Node.status' => 1,
                ) ,
                'contain' => array(
                    'Meta',
                    'Taxonomy' => array(
                        'Term',
                        'Vocabulary',
                    ) ,
                    'User',
                ) ,
                'cache' => array(
                    'name' => 'node_' . $this->Cms->roleId . '_' . $id,
                    'config' => 'nodes_view',
                ) ,
            ));
            $this->Node->type = $node['Node']['type'];
            $type = $this->Node->Taxonomy->Vocabulary->Type->find('first', array(
                'conditions' => array(
                    'Type.alias' => $this->Node->type,
                ) ,
                'cache' => array(
                    'name' => 'type_' . $this->Node->type,
                    'config' => 'nodes_view',
                ) ,
            ));
            }
        if (!isset($node['Node']['id'])) {
           $this->Session->setFlash(__l('Invalid content') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect('/');
        }
        if ($node['Node']['comment_count'] > 0) {
            $comments = $this->Node->Comment->find('threaded', array(
                'conditions' => array(
                    'Comment.node_id' => $node['Node']['id'],
                    'Comment.status' => 1,
                ) ,
                'contain' => array(
                    'User',
                ) ,
                'cache' => array(
                    'name' => 'comment_node_' . $node['Node']['id'],
                    'config' => 'nodes_view',
                ) ,
            ));
        } else {
            $comments = array();
        }
        $this->pageTitle = $node['Node']['title'];
        //$this->set('title_for_layout', $node['Node']['title']);
        $this->set(compact('node', 'type', 'comments'));
        $this->_viewFallback(array(
            'view_' . $node['Node']['id'],
            'view_' . $type['Type']['alias'],
        ));
    }
    protected function _viewFallback($views)
    {
        if (is_string($views)) {
            $views = array(
                $views
            );
        }
        if ($this->theme) {
            foreach($views AS $view) {
                $viewPath = APP . 'View' . DS . 'Themed' . DS . $this->theme . DS . $this->name . DS . $view . $this->ext;
                if (file_exists($viewPath)) {
                    return $this->render($view);
                }
            }
        }
    }
    public function admin_tools()
    {
        $this->pageTitle = __l('Tools');
    }
    public function home()
    {		
        $this->pageTitle = __l('Home');
		$cities = $this->City->find('list', array(
            'conditions' => array(
                'City.is_approved' => 1
            ),
			'recursive' => '-1'
        ));
		$specialties = $this->Specialty->find('list', array(
            'conditions' => array(
                'Specialty.is_active' => 1
            ),
			'recursive' => '-1'
        ));				
		$insurance_companies = $this->InsuranceCompany->find('list', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 1
            ),
			'recursive' => '-1'
        ));
		$drop_cities = $this->City->find('all', array(
            'conditions' => array(
                'City.is_approved' => 1
            ),
			'recursive' => '1'
        ));
		$drop_specialties = $this->Specialty->find('all', array(
            'conditions' => array(
                'Specialty.is_active' => 1
            ),
			'recursive' => '-1'
        ));				$this->loadModel('Clinic');		$drop_hospitals = $this->Clinic->find('list', array(            'conditions' => array(                'Clinic.is_active' => 1            ),			'recursive' => '-1'        ));				$drop_insurance_companies = $insurance_companies;
		/*$drop_insurance_companies = $this->InsuranceCompany->find('all', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 1
            ),
			'recursive' => '-1'
        ));*/
		$search_options = $this->InsuranceCompany->searchOptions;
		$insurances = $search_options + $insurance_companies;
		$this->set(compact('cities', 'specialties','insurance_companies','insurances','drop_cities','drop_specialties','drop_insurance_companies','drop_hospitals'));		
    }		
}
