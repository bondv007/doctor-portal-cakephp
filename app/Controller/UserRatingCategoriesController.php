<?php
class UserRatingCategoriesController extends AppController
{
	public $name = 'UserRatingCategories';
	public function beforeFilter()
    {
        parent::beforeFilter();
    }
	public function admin_index()
	{
		$this->_redirectGET2Named(array(
            'filter_id'
        ));
		$this->pageTitle = __l('User Rating Categories');
		$conditions = array();
        if (isset($this->request->params['named']['filter_id'])) {
            $this->request->data[$this->modelClass]['filter_id'] = $this->request->params['named']['filter_id'];
        }
        if (!empty($this->request->data[$this->modelClass]['filter_id'])) {
            if ($this->request->data[$this->modelClass]['filter_id'] == ConstMoreAction::Active) {
                $conditions[$this->modelClass . '.is_active'] = 1;
                $this->pageTitle.= __l(' - Approved');
            } else if ($this->request->data[$this->modelClass]['filter_id'] == ConstMoreAction::Inactive) {
                $conditions[$this->modelClass . '.is_active'] = 0;
                $this->pageTitle.= __l(' - Unapproved');
            }
            $this->request->params['named']['filter_id'] = $this->request->data[$this->modelClass]['filter_id'];
        }
		$this->UserRatingCategory->recursive = -1;
		$this->paginate = array(
            'conditions' => $conditions,
            'order' => array(
                'UserRatingCategory.id' => 'desc'
            ) ,
            'recursive' => -1
        );
		$this->set('userRatingCategories', $this->paginate());
		$filters = $this->UserRatingCategory->isFilterOptions;
        $moreActions = $this->UserRatingCategory->moreActions;
        $this->set(compact('moreActions', 'filters'));
        $this->set('pending', $this->UserRatingCategory->find('count', array(
            'conditions' => array(
                'UserRatingCategory.is_active' => 0
            )
        )));
        $this->set('approved', $this->UserRatingCategory->find('count', array(
            'conditions' => array(
                'UserRatingCategory.is_active' => 1
            )
        )));
	}
	public function admin_add()
	{
		$this->pageTitle = __l('Add User Rating Category');
		if (!empty($this->request->data)) {
			$this->UserRatingCategory->create();
			if ($this->UserRatingCategory->save($this->request->data)) {
				$this->Session->setFlash(__l('User Rating Category has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('User Rating Category could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
	}
	public function admin_edit($id = null)
	{
		$this->pageTitle = __l('Edit User Rating Category');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->UserRatingCategory->save($this->request->data)) {
				$this->Session->setFlash(__l('User Rating Category has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('User Rating Category could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->UserRatingCategory->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['UserRatingCategory']['name'];
	}
	public function admin_delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->UserRatingCategory->delete($id)) {
			$this->Session->setFlash(__l('User Rating Category deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>