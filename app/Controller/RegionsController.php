<?php
/**
 * Regions Controller
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
class RegionsController extends AppController
{
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Regions';
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array(
        'Region'
    );
    public $paginate = array(
        'limit' => 10,
    );
    public function admin_index()
    {
        $this->set('title_for_layout', __l('Region'));
        $this->Region->recursive = 0;
        $this->paginate['Region']['order'] = 'Region.title ASC';
        $this->set('regions', $this->paginate());
    }
    public function admin_add()
    {
        $this->set('title_for_layout', __l('Add Region'));
        if (!empty($this->request->data)) {
            $this->Region->create();
            if ($this->Region->save($this->request->data)) {
                $this->Session->setFlash(__l('The Region has been saved') , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('The Region could not be saved. Please, try again.') , 'default', array(
                    'class' => 'error'
                ));
            }
        }
    }
    public function admin_edit($id = null)
    {
        $this->set('title_for_layout', __l('Edit Region'));
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__l('Invalid Region') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        if (!empty($this->request->data)) {
            if ($this->Region->save($this->request->data)) {
                $this->Session->setFlash(__l('The Region has been saved') , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('The Region could not be saved. Please, try again.') , 'default', array(
                    'class' => 'error'
                ));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Region->read(null, $id);
        }
    }
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->Region->delete($id)) {
            $this->Session->setFlash(__l('Region deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
}
