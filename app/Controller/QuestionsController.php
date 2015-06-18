<?php
class QuestionsController extends AppController
{
	public $name = 'Questions';
	
	public function beforeFilter()
    {
        parent::beforeFilter();
		$this->Security->enabled = false;
    }
	public function index() 
	{
		$this->_redirectGET2Named(array(
            'q'
        ));
		$this->pageTitle = __l('Questions');
		$conditions = array();
		$specity_slug = '';
		$conditions['Question.is_active'] = 1;
		if (isset($this->request->params['named']['q'])) {
			$conditions[] = array(
                'OR' => array(
                    array(
                        'Question.question LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
                )
            );
            $this->request->data['Question']['q'] = $this->request->params['named']['q'];
            $this->pageTitle.= sprintf(__l(' - Search - %s') , $this->request->params['named']['q']);
        }
		if(!empty($this->request->params['pass'][0])) {
			$specity_slug = $this->request->params['pass'][0];
			$groupby = '';
			$specialties = $this->Question->Specialty->find('all', array(
				'conditions' => array(
					'Specialty.slug = ' => $specity_slug
				),
				'fields' => array(
					'Specialty.id',
				),
				'recursive' => -1,
			));
			$specialty_ids = array();
			foreach($specialties as $specialty) {
				$specialty_ids[] = $specialty['Specialty']['id'];
			}
			$conditions['Question.specialty_id'] = $specialty_ids;			
		} else {
			$groupby = array(
				'Question.specialty_id'
			);
		}
		$this->paginate = array(
                'conditions' => array(
                    $conditions,
                ) ,
                'contain' => array(
					'Specialty' => array(
						'fields' => array(
							'Specialty.id',
							'Specialty.name',
							'Specialty.slug',
						),
					)
                ) ,
				'group' => $groupby,
                'order' => array(
                    'Question.id' => 'desc'
                ) ,
				'fields' => array(
					'Question.id',
					'Question.slug',
					'Question.question',
					'Question.description'
				),
                'recursive' => 1,
        );
		$this->set('specity_slug', $specity_slug);
		$this->set('questions', $this->paginate());
	}
	public function view($slug = null)
	{
		$this->pageTitle = __l('Question');
		if (is_null($slug)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$question = $this->Question->find('first', array(
			'conditions' => array(
				'Question.slug = ' => $slug
			),
			'contain' => array(
				'Answer' => array(
					'fields' => array(
						'Answer.answer'
					),
				),
				'Specialty' => array(
					'fields' => array(
						'Specialty.id',
						'Specialty.name',
						'Specialty.slug',
					),
				)
			),	
			'fields' => array(
				'Question.id',
				'Question.specialty_id',
				'Question.slug',
				'Question.question',
				'Question.description'
			),
			'recursive' => 1,
		));
		if (empty($question)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		//Related questions
		$related_questions = $this->Question->find('all', array(
			'conditions' => array(
				'Question.specialty_id = ' => $question['Question']['specialty_id'],
				'Question.slug != ' => $slug
			),
			'fields' => array(
				'Question.id',
				'Question.slug',
				'Question.question',
				'Question.description'
			),
			'recursive' => -1,
		));
		$this->pageTitle .= ' - ' . $question['Question']['slug'];
		$this->set('question', $question);
		$this->set('related_questions', $related_questions);
	}
	public function add()
	{
		$this->pageTitle = __l('Ask a Question - It\'s free');
		if (!empty($this->request->data)) {
			$this->request->data['Question']['user_id'] = $this->Auth->user('id');
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__l('Question has been added successfully. It will be list out after admin approval.'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Question could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$specialties = $this->Question->Specialty->find('list');
		$this->set(compact('specialties'));
	}
	public function edit($id = null)
	{
		$this->pageTitle = __l('Edit Question');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__l('Question has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Question could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->Question->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['Question']['id'];
		$users = $this->Question->User->find('list');
		$this->set(compact('users'));
	}
	public function delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->Question->delete($id)) {
			$this->Session->setFlash(__l('Question deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	public function admin_index()
	{
		$this->_redirectGET2Named(array(
            'filter_id'
        ));
		$this->pageTitle = __l('Questions');
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
                'contain' => array(
					'User' => array(
						'fields' => array(
							'User.username',								
						) 
					) ,
					'Answer' => array(
						'fields' => array(
							'Answer.answer',								
						) 
					) ,
					'Specialty' => array(
                        'fields' => array(
                            'Specialty.name'
                        )
                    ) ,
                ) ,
                'order' => array(
                    'Question.id' => 'desc'
                ) ,
                'recursive' => 1,
        );
		$this->set('questions', $this->paginate());
		$filters = $this->Question->isFilterOptions;
        $moreActions = $this->Question->moreActions;
        $this->set(compact('moreActions', 'filters'));
        $this->set('pending', $this->Question->find('count', array(
            'conditions' => array(
                'Question.is_active' => 0
            )
        )));
        $this->set('approved', $this->Question->find('count', array(
            'conditions' => array(
                'Question.is_active' => 1
            )
        )));
	}
	public function admin_add()
	{
		$this->pageTitle = __l('Add Question');
		if (!empty($this->request->data)) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__l('Question has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Question could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$conditions['User.role_id'] = array(
                ConstUserTypes::User,
                ConstUserTypes::Admin,
        );
		$users = $this->Question->User->find('list', array(
				'conditions' => $conditions,
				'fields'=>array(
					'User.id',
					'User.username',
				),
			));
		$specialties = $this->Question->Specialty->find('list');
		$this->set(compact('users','specialties'));
	}
	public function admin_edit($id = null)
	{
		$this->pageTitle = __l('Edit Question');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__l('Question has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Question could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->Question->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['Question']['question'];
		$users = $this->Question->User->find('list');
		$this->set(compact('users'));
	}
	public function admin_delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->Question->delete($id)) {
			$this->Session->setFlash(__l('Question deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	
}
?>