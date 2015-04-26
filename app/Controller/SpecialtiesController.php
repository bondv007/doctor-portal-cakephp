<?php
class SpecialtiesController extends AppController
{
	public $name = 'Specialties';
	
	public $uses = array(
        'Specialty',
        'SpecialtyDiseasesUser',
		'City',
    );
	
	public function beforeFilter()
    {
        parent::beforeFilter();
    }
	public function index()
	{
		$this->pageTitle = __l('Specialties');
		$conditions = array();
		if (!empty($this->request->params['named']['letter']) and $this->request->params['named']['letter'] != 'recent') {
            $conditions['Specialty.name like '] = $this->request->params['named']['letter'] . '%'; 
        }
		$conditions['Specialty.is_active'] = 1;
		$specialties = $this->Specialty->find('all', array(
            'conditions' =>$conditions,
            'order' => array(
                'Specialty.name' => 'asc'
            ),
			'recursive' => -1
        ));
		$cities = $this->City->find('all', array(
            'conditions' => array(
                'City.is_approved' => 1
            ),
			'contain' => array(
				'State' => array(
					'fields' => array(
						'State.code'
					)
				),
			),
			'fields'=>array(
				'City.id',
				'City.name',
				'City.slug'
			),
        ));
		$this->set(compact('specialties','cities'));
	}
	public function edit($id = null) {
		$this->pageTitle = __l('Edit Specialty');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			$this->request->data['SpecialtyDiseasesUser']['user_id'] = $this->Auth->user('id');
			if (!empty($this->request->data['Specialty']['SpecialtyDisease'])) {
				// Deleting previous inserted records //
                $this->SpecialtyDiseasesUser->deleteAll(array(
                       'SpecialtyDiseasesUser.user_id' => $this->request->data['SpecialtyDiseasesUser']['user_id']
                ));
                // Inserting new records //
                $specialtydiseasesuser = array();
				if(!empty($this->request->data['Specialty']['SpecialtyDisease']))
				{
					foreach($this->request->data['Specialty']['SpecialtyDisease'] as $key => $value)
					{
					   $this->SpecialtyDiseasesUser->create();
					   $specialtydiseasesuser['SpecialtyDiseasesUser']['user_id'] = $this->request->data['SpecialtyDiseasesUser']['user_id'];
					   $specialtydiseasesuser['SpecialtyDiseasesUser']['specialty_disease_id'] = $value;
					   $this->SpecialtyDiseasesUser->save($specialtydiseasesuser);
					}
					$this->Session->setFlash(__l('SpecialtyDisease has been updated'), 'default', null, 'success');
					$this->redirect( array(
						'controller' => 'users',
						'action' => 'manage_specialties'
					));			
				} else {	
					$this->Session->setFlash(__l('SpecialtyDisease could not updated. Please try again'), 'default', null, 'error');		
				}	
			}
		} else {
			$this->request->data = $this->Specialty->User->find('first', array(
                'conditions' => array(
                    'User.id' => $this->Auth->user('id')
                ) ,
                'contain' => array(
                    'Specialty' => array (
						'fields' => array(
							'Specialty.id',
							'Specialty.name',
						 ),
						'SpecialtyDisease' => array(
							 'fields' => array(
								'SpecialtyDisease.id',
								'SpecialtyDisease.name',
							)	
						) 	
				    )	
                ) ,
				'fields' => array(
					'User.id',
					'User.username'
				),
                'recursive' => 2
            ));
		}
		$specialty_diseases = $this->Specialty->SpecialtyDisease->find('list', array(
            'conditions' => array(
                'SpecialtyDisease.is_active' => 1,
				'SpecialtyDisease.specialty_id' => $id
            ),
			'fields'=>array(
				'SpecialtyDisease.id',
				'SpecialtyDisease.name'
			),
        ));
		$specialty = $this->Specialty->find('first', array(
			'conditions' => array(
				'Specialty.id = ' => $id
			),
			'fields' => array(
				'Specialty.id',
				'Specialty.name',
			),
			'recursive' => 0,
		));
		$this->set(compact('specialty_diseases','specialty'));
	}
	public function view($id = null)
	{
		$this->pageTitle = __l('Specialty');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$specialty = $this->Specialty->find('first', array(
			'conditions' => array(
				'Specialty.id = ' => $id
			),
			'fields' => array(
				'Specialty.id',
				'Specialty.name',
			),
			'recursive' => 0,
		));
		if (empty($specialty)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $specialty['Specialty']['name'];
		$this->set('specialty', $specialty);
	}
	public function admin_index() 
	{
		$this->_redirectGET2Named(array(
            'filter_id'
        ));
		$this->pageTitle = __l('Specialties');
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
		$this->paginate = array(
            'conditions' => $conditions,
            'order' => array(
                'Specialty.id' => 'asc'
            ) ,
            'recursive' => 1
        );
		$this->set('specialties', $this->paginate());
		$filters = $this->Specialty->isFilterOptions;
        $moreActions = $this->Specialty->moreActions;
        $this->set(compact('moreActions', 'filters'));
        $this->set('pending', $this->Specialty->find('count', array(
            'conditions' => array(
                'Specialty.is_active' => 0
            )
        )));
        $this->set('approved', $this->Specialty->find('count', array(
            'conditions' => array(
                'Specialty.is_active' => 1
            )
        )));
	}
	public function admin_add()
	{
		$this->pageTitle = __l('Add Specialty');
		if (!empty($this->request->data)) {
			$this->Specialty->create();
			if ($this->Specialty->save($this->request->data)) {
				$this->Session->setFlash(__l('Specialty has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Specialty could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$users = $this->Specialty->User->find('list');
		$users = $this->Specialty->User->find('list');
		$this->set(compact('users', 'users'));
	}
	public function admin_edit($id = null)
	{
		$this->pageTitle = __l('Edit Specialty');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->Specialty->save($this->request->data)) {
				$this->Session->setFlash(__l('Specialty has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Specialty could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->Specialty->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['Specialty']['name'];
		$users = $this->Specialty->User->find('list');
		$users = $this->Specialty->User->find('list');
		$this->set(compact('users','users'));
	}
	public function admin_delete($id = null) 
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->Specialty->delete($id)) {
			$this->Session->setFlash(__l('Specialty deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>