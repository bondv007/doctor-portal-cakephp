<?php
class InsurancePlansController extends AppController
{
	public $name = 'InsurancePlans';
	
	public function beforeFilter()
    {
        parent::beforeFilter();
    }
	public function index()
	{
		$this->pageTitle = __l('Insurance Plans');
		$this->InsurancePlan->recursive = 0;
		$this->set('insurancePlans', $this->paginate());
	}
	public function admin_index()
	{
		$this->_redirectGET2Named(array(
            'filter_id'
        ));
		$this->pageTitle = __l('Insurance Plans');
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
		
		if (!empty($this->request->params['named']['insurance_company'])) {
            $conditions = array(
                'InsurancePlan.insurance_company_id' => $this->request->params['named']['insurance_company']
            );
        }
		$this->paginate = array(
            'conditions' => $conditions,
            'order' => array(
                'InsurancePlan.id' => 'asc'
            ) ,
            'recursive' => 1
        );
		$this->set('insurancePlans', $this->paginate());
		$filters = $this->InsurancePlan->isFilterOptions;
        $moreActions = $this->InsurancePlan->moreActions;
        $this->set(compact('moreActions', 'filters'));
        $this->set('pending', $this->InsurancePlan->find('count', array(
            'conditions' => array(
                'InsurancePlan.is_active' => 0
            ),
        )));
        $this->set('approved', $this->InsurancePlan->find('count', array(
            'conditions' => array(
                'InsurancePlan.is_active' => 1
            )
        )));
	}
	public function admin_add()
	{
		$this->pageTitle = __l('Add Insurance Plan');
		if (!empty($this->request->data)) {
			$this->InsurancePlan->create();
			if ($this->InsurancePlan->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Plan has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Insurance Plan could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$users = $this->InsurancePlan->User->find('list');
		$insuranceCompanies = $this->InsurancePlan->InsuranceCompany->find('list');
		$this->set(compact('users', 'insuranceCompanies'));
	}
	public function admin_edit($id = null)
	{
		$this->pageTitle = __l('Edit Insurance Plan');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->InsurancePlan->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Plan has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Insurance Plan could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->InsurancePlan->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['InsurancePlan']['name'];
		$users = $this->InsurancePlan->User->find('list');
		$insuranceCompanies = $this->InsurancePlan->InsuranceCompany->find('list');
		$this->set(compact('users','insuranceCompanies'));
	}
	public function admin_delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->InsurancePlan->delete($id)) {
			$this->Session->setFlash(__l('Insurance Plan deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>