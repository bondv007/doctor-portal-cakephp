<?php
class InsuranceCompaniesController extends AppController
{
	public $name = 'InsuranceCompanies';
	
	public function beforeFilter()
    {
        parent::beforeFilter();
    }
	public function index() {
		$this->pageTitle = __l('Insurance Companies');
		$this->InsuranceCompany->recursive = 0;
		$this->set('insuranceCompanies', $this->paginate());
	}
	public function admin_index()
	{
		$this->_redirectGET2Named(array(
            'filter_id'
        ));
		$this->pageTitle = __l('Insurance Companies');
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
		$this->InsuranceCompany->recursive = -1;
		$this->paginate = array(
            'conditions' => $conditions,
            'order' => array(
                'InsuranceCompany.id' => 'asc'
            ) ,
            'recursive' => -1
        );
		$this->set('insuranceCompanies', $this->paginate());
		$filters = $this->InsuranceCompany->isFilterOptions;
        $moreActions = $this->InsuranceCompany->moreActions;
        $this->set(compact('moreActions', 'filters'));
        $this->set('pending', $this->InsuranceCompany->find('count', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 0
            )
        )));
        $this->set('approved', $this->InsuranceCompany->find('count', array(
            'conditions' => array(
                'InsuranceCompany.is_active' => 1
            )
        )));
	}
	public function admin_add()
	{
		$this->pageTitle = __l('Add Insurance Company');
		if (!empty($this->request->data)) {
			$this->InsuranceCompany->create();
			if ($this->InsuranceCompany->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Company has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Insurance Company could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$users = $this->InsuranceCompany->User->find('list');
		$users = $this->InsuranceCompany->User->find('list');
		$this->set(compact('users', 'users'));
	}
	public function admin_edit($id = null)
	{
		$this->pageTitle = __l('Edit Insurance Company');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->InsuranceCompany->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Company has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Insurance Company could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->InsuranceCompany->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['InsuranceCompany']['name'];
		$users = $this->InsuranceCompany->User->find('list');
		$users = $this->InsuranceCompany->User->find('list');
		$this->set(compact('users','users'));
	}
	public function admin_delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->InsuranceCompany->delete($id)) {
			$this->Session->setFlash(__l('Insurance Company deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>