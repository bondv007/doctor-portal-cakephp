<?php
class AnswersController extends AppController
{
	public $name = 'Answers';
	
	public function beforeFilter()
    {
        parent::beforeFilter();
    } 
	public function index()
	{
		$this->_redirectGET2Named(array(
            'q'
        ));
		$this->pageTitle = __l('Answers');
		$conditions = array();
		$conditions['Answer.is_active'] = 1;
		if (isset($this->request->params['named']['q'])) {
			$conditions[] = array(
                'OR' => array(
                    array(
                        'Answer.answer LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
                )
            );
            $this->request->data['Answer']['q'] = $this->request->params['named']['q'];
            $this->pageTitle.= sprintf(__l(' - Search - %s') , $this->request->params['named']['q']);
        }
		$this->paginate = array(
                'conditions' => array(
                    $conditions,
                ) ,
                'contain' => array(
					'Question' => array(
						'fields' => array(
							'Question.id',
							'Question.slug',
							'Question.question',
						),
					)
                ) ,
                'order' => array(
                    'Answer.id' => 'desc'
                ) ,
				'fields' => array(
					'Answer.id',
					'Answer.question_id',
					'Answer.answer'
				),
                'recursive' => 1,
        );
		$this->set('answers', $this->paginate());
	}
	public function index_all()
	{
		$this->pageTitle = __l('Answers');
		$this->Answer->recursive = 0;
		$this->set('answers', $this->paginate());
	}
	public function view($id = null)
	{
		$this->pageTitle = __l('Answer');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$answer = $this->Answer->find('first', array(
			'conditions' => array(
				'Answer.id = ' => $id
			),
			'fields' => array(
				'Answer.id',
				'Answer.created',
				'Answer.modified',
				'Answer.user_id',
				'Answer.question_id',
				'Answer.answer',
				'Answer.is_active',
				'Question.id',
				'Question.created',
				'Question.user_id',
				'Question.question',
				'Question.slug',
				'Question.description',
				'Question.answer_count',
				'Question.is_active',
			),
			'recursive' => 0,
		));
		if (empty($answer)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $answer['Answer']['id'];
		$this->set('answer', $answer);
	}
	public function add($question_id = null)
	{
		$this->pageTitle = __l('Add Answer');
		if (!$question_id && empty($this->request->data)) {
            $this->Session->setFlash(__l('Invalid User', true) , 'default', array(
                'class' => 'error'
            ));
            $this->redirect(array(
				'controller' =>'users',
                'action' => 'my_answers'
            ));
        } else {
			$question = $this->Answer->Question->find('first', array(
				'conditions' => array(
					'Question.id = ' => $question_id
				),
				'fields' => array(
					'Question.question',
				),
				'recursive' => -1,
			));
		}
		if (!empty($this->request->data)) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Answer->Question->updateAll(array(
                        'Question.is_answered' => 1,
                    ) , array(
                        'Question.id' => $question_id
                ));
				$this->Session->setFlash(__l('Answer has been added successfully. It will be list out after admin approval.'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Answer could not be added. Please, try again.'), 'default', null, 'error');
			}
			if ($this->Auth->user('role_id') != ConstUserTypes::Admin) {
				$this->redirect(array(
					'controller' =>'users',
					'action' => 'my_answers'
				));
			} else {
				$this->redirect(array(
					'controller' =>'questions',
					'action' => 'index',
					'admin' => true
				));
			}	
		}
		 if (empty($this->request->data)) {
            $this->request->data['Answer']['question_id'] = $question_id;
			$this->request->data['Answer']['user_id'] = $this->Auth->user('id');	
        }
		$this->set('question',$question);
	}
	public function edit($id = null)
	{
		$this->pageTitle = __l('Edit Answer');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__l('Answer has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Answer could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->Answer->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['Answer']['id'];
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$this->set(compact('users','questions'));
	}
	public function delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->Answer->delete($id)) {
			$this->Session->setFlash(__l('Answer deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	public function admin_index() {
		$this->_redirectGET2Named(array(
            'filter_id'
        ));
		$this->pageTitle = __l('Answers');
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
                'Answer.id' => 'desc'
            ) ,
            'recursive' => 1
        );
		$this->set('answers', $this->paginate());
		$filters = $this->Answer->isFilterOptions;
        $moreActions = $this->Answer->moreActions;
        $this->set(compact('moreActions', 'filters'));
        $this->set('pending', $this->Answer->find('count', array(
            'conditions' => array(
                'Question.is_active' => 0
            )
        )));
        $this->set('approved', $this->Answer->find('count', array(
            'conditions' => array(
                'Question.is_active' => 1
            )
        )));
	}
	public function admin_add() 
	{
		/*$this->pageTitle = __l('Add Answer');
		if (!empty($this->request->data)) {
			$this->Answer->create();
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__l('Answer has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Answer could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$conditions['User.role_id'] = array(
                ConstUserTypes::Doctor,
                ConstUserTypes::Admin,
        );
		$users = $this->Answer->User->find('list', array(
				'conditions' => $conditions,
				'fields'=>array(
					'User.id',
					'User.username',
				),
		));
		$questions = $this->Answer->Question->find('list');
		$this->set(compact('users', 'questions'));*/
		$this->setAction('add');
	}
	public function admin_edit($id = null)
	{
		$this->pageTitle = __l('Edit Answer');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->Answer->save($this->request->data)) {
				$this->Session->setFlash(__l('Answer has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Answer could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->Answer->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['Answer']['answer'];
		$users = $this->Answer->User->find('list');
		$questions = $this->Answer->Question->find('list');
		$this->set(compact('users','questions'));
	}
	public function admin_delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->Answer->delete($id)) {
			$this->Session->setFlash(__l('Answer deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>