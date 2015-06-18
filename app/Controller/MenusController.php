<?php
/**
 * Menus Controller
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
class MenusController extends AppController
{
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Menus';
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array(
        'Menu'
    );
    public $paginate = array(
        'limit' => 10,
    );
    public function admin_index()
    {
        $this->pageTitle = __l('Menus');
        $this->Menu->recursive = 0;
        $this->paginate['Menu']['order'] = 'Menu.id ASC';
        $this->set('menus', $this->paginate());
    }
    public function admin_add()
    {
        $this->pageTitle = __l('Add Menu');
        if (!empty($this->request->data)) {
            $this->Menu->create();
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__l('The Menu has been saved') , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('The Menu could not be saved. Please, try again.') , 'default', array(
                    'class' => 'error'
                ));
            }
        }
    }
    public function admin_edit($id = null)
    {
        $this->set('title_for_layout', __l('Edit Menu'));
        $this->pageTitle = __l('Edit Menu');
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__l('Invalid Menu') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        if (!empty($this->request->data)) {
            if ($this->Menu->save($this->request->data)) {
                $this->Session->setFlash(__l('The Menu has been saved') , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('The Menu could not be saved. Please, try again.') , 'default', array(
                    'class' => 'error'
                ));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Menu->read(null, $id);
        }
    }
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->Menu->delete($id)) {
            $this->Session->setFlash(__l('Menu deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
}
