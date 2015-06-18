<?php
class UserEducationsController extends AppController {

	public $name = 'UserEducations';
	public $components = array(
        'RequestHandler'
    );
    public function beforeFilter()
    {
        parent::beforeFilter();
    }
	public function index()
	{
		$this->pageTitle = __l('My Educations');
		if($this->Auth->user('id')) {
			$conditions['UserEducation.user_id'] = $this->Auth->user('id');
		} 
		$this->paginate = array(
            'conditions' => $conditions,
            'fields' => array(
                'UserEducation.id',
                'UserEducation.education',
                'UserEducation.location',
                'UserEducation.organization',
				'UserEducation.date',
            ) ,
            'recursive' => -1
        );
		$this->set('userEducations', $this->paginate());
	}
	public function add()
	{
		$this->pageTitle = __l('Add User Education');
		if (!empty($this->request->data)) {
			$this->request->data['UserEducation']['user_id'] = $this->Auth->user('id');
			$this->UserEducation->create();
			if ($this->UserEducation->save($this->request->data)) {
				$this->Session->setFlash(__l('Education has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Education could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$users = $this->UserEducation->User->find('list');
		$this->set(compact('users'));
	}
	public function edit($id = null) 
	{
		$this->pageTitle = __l('Update My Education');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->UserEducation->save($this->request->data)) {
				$this->Session->setFlash(__l('Education has been updated'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Education could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->UserEducation->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->set(compact('users'));
	}
	public function delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->UserEducation->delete($id)) {
			$this->Session->setFlash(__l('Education deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	public function admin_index()
	{
		$this->_redirectGET2Named(array(
            'q'
        ));
		$this->pageTitle = __l('User Educations');
		$conditions = array();
        if (!empty($this->request->params['named']['category'])) {
            $userEducation = $this->{$this->modelClass}->UserEducation->find('first', array(
                'conditions' => array(
                    'UserEducation.id' => $this->request->params['named']['category']
                ) ,
                'fields' => array(
                    'UserEducation.id',
                    'UserEducation.name'
                ) ,
                'recursive' => -1
            ));
            if (empty($userEducation)) {
                throw new NotFoundException(__l('Invalid request'));
            }
            $conditions['UserEducation.id'] = $userEducation['UserEducation']['id'];
            $this->pageTitle.= sprintf(__l(' - Education - %s') , $userEducation['UserEducation']['name']);
        }
		if (!empty($this->request->params['named']['user'])) {
            $user = $this->{$this->modelClass}->User->find('first', array(
                'conditions' => array(
                    'User.username' => $this->request->params['named']['user']
                ) ,
                'fields' => array(
                    'User.id',
                ) ,
                'recursive' => -1
            ));
            if (empty($user)) {
                throw new NotFoundException(__l('Invalid request'));
            }
            $conditions['User.id'] = $user['User']['id'];
            $this->pageTitle.= sprintf(__l(' - User - %s') , $user['User']['title']);
        }
        if (!empty($this->request->params['named']['username'])) {
            $user = $this->{$this->modelClass}->User->find('first', array(
                'conditions' => array(
                    'User.username' => $this->request->params['named']['username']
                ) ,
                'fields' => array(
                    'User.id',
                    'User.username'
                ) ,
                'recursive' => -1
            ));
            if (empty($user)) {
                throw new NotFoundException(__l('Invalid request'));
            }
            $conditions['User.id'] = $user['User']['id'];
            $this->pageTitle.= sprintf(__l(' - User - %s') , $user['User']['username']);
        }
		$this->UserEducation->recursive = 0;
		$this->paginate = array(
            'conditions' => $conditions,
            'contain' => array(
                'User' => array(
                    'fields' => array(
                        'User.username'
                    )
                ) ,
            ) ,
            'order' => array(
                'UserEducation.id' => 'desc'
            )
        );
		$this->set('userEducations', $this->paginate());
		$moreActions = $this->UserEducation->moreActions;
		$this->set(compact('moreActions'));
	}
	public function admin_delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->UserEducation->delete($id)) {
			$this->Session->setFlash(__l('User Education deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>