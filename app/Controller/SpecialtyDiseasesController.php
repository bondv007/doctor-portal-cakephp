<?php
class SpecialtyDiseasesController extends AppController
{
	public $name = 'SpecialtyDiseases';

	public function beforeFilter()
    {
        parent::beforeFilter();
    }
	public function index()
	{
		$this->pageTitle = __l('Specialty Diseases');
		$this->SpecialtyDisease->recursive = 0;
		$this->set('specialtyDiseases', $this->paginate());
	}
	public function view($slug = null)
	{
		$this->pageTitle = __l('Specialty Disease');
		if (is_null($slug)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$specialtyDisease = $this->SpecialtyDisease->find('first', array(
			'conditions' => array(
				'SpecialtyDisease.slug = ' => $slug
			),
			'fields' => array(
				'SpecialtyDisease.id',
				'SpecialtyDisease.created',
				'SpecialtyDisease.modified',
				'SpecialtyDisease.user_id',
				'SpecialtyDisease.specialty_id',
				'SpecialtyDisease.name',
				'SpecialtyDisease.slug',
				'SpecialtyDisease.user_count',
				'SpecialtyDisease.is_active',
				'User.id',
				'User.username',
				'User.email',
				'Specialty.id',
				'Specialty.created',
				'Specialty.user_id',
				'Specialty.name',
				'Specialty.slug',
				'Specialty.speciality_disease_count',
				'Specialty.user_count',
				'Specialty.is_active',
			),
			'recursive' => 0,
		));
		if (empty($specialtyDisease)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $specialtyDisease['SpecialtyDisease']['name'];
		$this->set('specialtyDisease', $specialtyDisease);
	}
	public function admin_index() 
	{
		$this->_redirectGET2Named(array(
            'filter_id'
        ));
		$this->pageTitle = __l('Specialty Diseases');
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
		if (!empty($this->request->params['named']['specialty'])) {
            $conditions = array(
                'SpecialtyDisease.specialty_id' => $this->request->params['named']['specialty']
            );
        }
		$this->paginate = array(
            'conditions' => $conditions,
            'order' => array(
                'SpecialtyDisease.id' => 'desc'
            ) ,
            'recursive' => 1
        );
		$this->set('specialtyDiseases', $this->paginate());
		$filters = $this->SpecialtyDisease->isFilterOptions;
        $moreActions = $this->SpecialtyDisease->moreActions;
        $this->set(compact('moreActions', 'filters'));
        $this->set('pending', $this->SpecialtyDisease->find('count', array(
            'conditions' => array(
                'SpecialtyDisease.is_active' => 0
            )
        )));
        $this->set('approved', $this->SpecialtyDisease->find('count', array(
            'conditions' => array(
                'SpecialtyDisease.is_active' => 1
            )
        )));
	}
	public function admin_add()
	{
		$this->pageTitle = __l('Add Specialty Disease');
		if (!empty($this->request->data)) {
			$this->SpecialtyDisease->create();
			if ($this->SpecialtyDisease->save($this->request->data)) {
				$this->Session->setFlash(__l('Specialty Disease has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Specialty Disease could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$users = $this->SpecialtyDisease->User->find('list');
		$users = $this->SpecialtyDisease->User->find('list');
		$specialties = $this->SpecialtyDisease->Specialty->find('list');
		$this->set(compact('users', 'users', 'specialties'));
	}
	public function admin_edit($id = null)
	{
		$this->pageTitle = __l('Edit Specialty Disease');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->SpecialtyDisease->save($this->request->data)) {
				$this->Session->setFlash(__l('Specialty Disease has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Specialty Disease could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->SpecialtyDisease->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['SpecialtyDisease']['name'];
		$users = $this->SpecialtyDisease->User->find('list');
		$users = $this->SpecialtyDisease->User->find('list');
		$specialties = $this->SpecialtyDisease->Specialty->find('list');
		$this->set(compact('users','users','specialties'));
	}
	public function admin_delete($id = null) 
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->SpecialtyDisease->delete($id)) {
			$this->Session->setFlash(__l('Specialty Disease deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	public function admin_update_diseases($specialty_id = null)
	{
		if (is_null($specialty_id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$specialty_diseases = $this->SpecialtyDisease->find('list', array(
            'conditions' => array(
				'SpecialtyDisease.is_active' => 1,
				'SpecialtyDisease.specialty_id' => $specialty_id
            	)
	       	));
		$this->set(compact('specialty_diseases'));
	}


}
?>