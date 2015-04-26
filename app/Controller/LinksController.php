<?php
/**
 * Links Controller
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
class LinksController extends AppController
{
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Links';
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array(
        'Link',
        'Role',
    );
    /**
     * Menu ID
     *
     * holds the current menu ID (if any)
     *
     * @var string
     * @access public
     */
    public $menuId = '';
    public function admin_index($menuId = null)
    {
        if (!$menuId) {
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $menu = $this->Link->Menu->findById($menuId);
        if (!isset($menu['Menu']['id'])) {
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $this->pageTitle = sprintf(__l('Links: %s') , $menu['Menu']['title']);
        $this->Link->recursive = 0;
        $linksTree = $this->Link->generateTreeList(array(
            'Link.menu_id' => $menuId,
        ));
        $linksStatus = $this->Link->find('all', array(
            'conditions' => array(
                'Link.menu_id' => $menuId,
            ) ,
            'fields' => array(
                'Link.id',
                'Link.status',
                'Link.title',
                'Link.menu_id',
            ) ,
        ));
        $moreActions = $this->Link->moreActions;
        $this->set(compact('moreActions'));
        $this->set(compact('linksTree', 'linksStatus', 'menu'));
    }
    public function admin_add($menuId = null)
    {
        $this->pageTitle = __l('Add Link');
        if (!empty($this->request->data)) {
            $this->Link->create();
            $this->Link->Behaviors->attach('Tree', array(
                'scope' => array(
                    'Link.menu_id' => $this->request->data['Link']['menu_id'],
                ) ,
            ));
            if ($this->Link->save($this->request->data)) {
                $this->Session->setFlash(__l('The Link has been saved') , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index',
                    $this->request->data['Link']['menu_id']
                ));
            } else {
                $this->Session->setFlash(__l('The Link could not be saved. Please, try again.') , 'default', array(
                    'class' => 'error'
                ));
            }
        }
        $menus = $this->Link->Menu->find('list');
        $roles = $this->Role->find('list');
        $parentLinks = $this->Link->generateTreeList(array(
            'Link.menu_id' => $menuId,
        ));
        $this->set(compact('menus', 'roles', 'parentLinks', 'menuId'));
    }
    public function admin_edit($id = null)
    {
        $this->pageTitle = __l('Edit link');
        $this->set('title_for_layout', __l('Edit Link'));
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__l('Invalid Link') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        if (!empty($this->request->data)) {
            $this->Link->Behaviors->attach('Tree', array(
                'scope' => array(
                    'Link.menu_id' => $this->request->data['Link']['menu_id'],
                ) ,
            ));
            if ($this->Link->save($this->request->data)) {
                $this->Session->setFlash(__l('The Link has been saved') , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index',
                    $this->request->data['Link']['menu_id']
                ));
            } else {
                $this->Session->setFlash(__l('The Link could not be saved. Please, try again.') , 'default', array(
                    'class' => 'error'
                ));
            }
        }
        if (empty($this->request->data)) {
            $data = $this->Link->read(null, $id);
            $data['Role']['Role'] = $this->Link->decodeData($data['Link']['visibility_roles']);
            $this->request->data = $data;
        }
        $menus = $this->Link->Menu->find('list');
        $roles = $this->Role->find('list');
        $menu = $this->Link->Menu->findById($this->request->data['Link']['menu_id']);
        $parentLinks = $this->Link->generateTreeList(array(
            'Link.menu_id' => $menu['Menu']['id'],
        ));
        $menuId = $menu['Menu']['id'];
        $this->set(compact('menus', 'roles', 'parentLinks', 'menuId'));
    }
    public function admin_delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__l('Invalid id for Link') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $link = $this->Link->findById($id);
        if (!isset($link['Link']['id'])) {
            $this->Session->setFlash(__l('Invalid id for Link') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $this->Link->Behaviors->attach('Tree', array(
            'scope' => array(
                'Link.menu_id' => $link['Link']['menu_id'],
            ) ,
        ));
        if ($this->Link->delete($id)) {
            $this->Session->setFlash(__l('Link deleted') , 'default', array(
                'class' => 'success'
            ));
            $this->redirect(array(
                'action' => 'index',
                $link['Link']['menu_id'],
            ));
        }
    }
    public function admin_moveup($id, $step = 1)
    {
        $link = $this->Link->findById($id);
        if (!isset($link['Link']['id'])) {
            $this->Session->setFlash(__l('Invalid id for Link') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $this->Link->Behaviors->attach('Tree', array(
            'scope' => array(
                'Link.menu_id' => $link['Link']['menu_id'],
            ) ,
        ));
        if ($this->Link->moveUp($id, $step)) {
            $this->Session->setFlash(__l('Moved up successfully') , 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__l('Could not move up') , 'default', array(
                'class' => 'error'
            ));
        }
        $this->redirect(array(
            'action' => 'index',
            $link['Link']['menu_id'],
        ));
    }
    public function admin_movedown($id, $step = 1)
    {
        $link = $this->Link->findById($id);
        if (!isset($link['Link']['id'])) {
            $this->Session->setFlash(__l('Invalid id for Link') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $this->Link->Behaviors->attach('Tree', array(
            'scope' => array(
                'Link.menu_id' => $link['Link']['menu_id'],
            ) ,
        ));
        if ($this->Link->moveDown($id, $step)) {
            $this->Session->setFlash(__l('Moved down successfully') , 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__l('Could not move down') , 'default', array(
                'class' => 'error'
            ));
        }
        $this->redirect(array(
            'action' => 'index',
            $link['Link']['menu_id'],
        ));
    }
    public function admin_process($menuId = null)
    {
        $action = $this->request->data['Link']['action'];
        $ids = array();
        foreach($this->request->data['Link'] AS $id => $value) {
            if ($id != 'action' && $value['id'] == 1) {
                $ids[] = $id;
            }
        }
        if (count($ids) == 0 || $action == null) {
            $this->Session->setFlash(__l('No items selected.') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index',
                $menuId,
            ));
        }
        $menu = $this->Link->Menu->findById($menuId);
        if (!isset($menu['Menu']['id'])) {
            $this->redirect(array(
                'controller' => 'menus',
                'action' => 'index',
            ));
        }
        $this->Link->Behaviors->attach('Tree', array(
            'scope' => array(
                'Link.menu_id' => $menuId,
            ) ,
        ));
        if ($action == 'delete' && $this->Link->deleteAll(array(
            'Link.id' => $ids
        ) , true, true)) {
            $this->Session->setFlash(__l('Links deleted.') , 'default', array(
                'class' => 'success'
            ));
        } elseif ($action == 'publish' && $this->Link->updateAll(array(
            'Link.status' => 1
        ) , array(
            'Link.id' => $ids
        ))) {
            $this->Session->setFlash(__l('Links published') , 'default', array(
                'class' => 'success'
            ));
        } elseif ($action == 'unpublish' && $this->Link->updateAll(array(
            'Link.status' => 0
        ) , array(
            'Link.id' => $ids
        ))) {
            $this->Session->setFlash(__l('Links unpublished') , 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__l('An error occurred.') , 'default', array(
                'class' => 'error'
            ));
        }
        $this->redirect(array(
            'action' => 'index',
            $menuId,
        ));
    }
}
