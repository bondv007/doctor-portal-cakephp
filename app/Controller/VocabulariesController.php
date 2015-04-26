<?php
/**
 * Vocabularies Controller
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
class VocabulariesController extends AppController
{
    /**
     * Controller name
     *
     * @var string
     * @access public
     */
    public $name = 'Vocabularies';
    /**
     * Models used by the Controller
     *
     * @var array
     * @access public
     */
    public $uses = array(
        'Vocabulary'
    );
    public $paginate = array(
        'limit' => 10,
    );
    public function admin_index()
    {
        $this->set('title_for_layout', __l('Vocabularies'));
        $this->Vocabulary->recursive = 0;
        $this->paginate['Vocabulary']['order'] = 'Vocabulary.weight ASC';
        $this->set('vocabularies', $this->paginate());
    }
    public function admin_add()
    {
        $this->set('title_for_layout', __l('Add Vocabulary'));
        if (!empty($this->request->data)) {
            $this->Vocabulary->create();
            if ($this->Vocabulary->save($this->request->data)) {
                $this->Session->setFlash(__l('The Vocabulary has been saved') , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('The Vocabulary could not be saved. Please, try again.') , 'default', array(
                    'class' => 'error'
                ));
            }
        }
        $types = $this->Vocabulary->Type->find('list');
        $this->set(compact('types'));
    }
    public function admin_edit($id = null)
    {
        $this->set('title_for_layout', __l('Edit Vocabulary'));
        if (!$id && empty($this->request->data)) {
            $this->Session->setFlash(__l('Invalid Vocabulary') , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
                'action' => 'index'
            ));
        }
        if (!empty($this->request->data)) {
            if ($this->Vocabulary->save($this->request->data)) {
                $this->Session->setFlash(__l('The Vocabulary has been saved') , 'default', array(
                    'class' => 'success'
                ));
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('The Vocabulary could not be saved. Please, try again.') , 'default', array(
                    'class' => 'error'
                ));
            }
        }
        if (empty($this->request->data)) {
            $this->request->data = $this->Vocabulary->read(null, $id);
        }
        $types = $this->Vocabulary->Type->find('list');
        $this->set(compact('types'));
    }
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->Vocabulary->delete($id)) {
            $this->Session->setFlash(__l('Vocabulary deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
    public function admin_moveup($id, $step = 1)
    {
        if ($this->Vocabulary->moveup($id, $step)) {
            $this->Session->setFlash(__l('Moved up successfully') , 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__l('Could not move up') , 'default', array(
                'class' => 'error'
            ));
        }
        $this->redirect(array(
            'action' => 'index'
        ));
    }
    public function admin_movedown($id, $step = 1)
    {
        if ($this->Vocabulary->movedown($id, $step)) {
            $this->Session->setFlash(__l('Moved down successfully') , 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__l('Could not move down') , 'default', array(
                'class' => 'error'
            ));
        }
        $this->redirect(array(
            'action' => 'index'
        ));
    }
}
