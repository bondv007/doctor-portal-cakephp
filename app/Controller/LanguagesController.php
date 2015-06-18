<?php
class LanguagesController extends AppController
{
    public $name = 'Languages';
	public $uses = array(
        'Language',
        'Specialty',
		'City',
    );
   	public function index()
    {
        $this->pageTitle = __l('Find Doctors by Language ');
		$conditions = array();
		if (!empty($this->request->params['named']['letter']) and $this->request->params['named']['letter'] != 'recent') {
            $conditions['Language.name like '] = $this->request->params['named']['letter'] . '%'; 
        }
		$conditions['Language.is_active'] = 1;
		$languages = $this->Language->find('all', array(
            'conditions' =>$conditions,
            'order' => array(
                'Language.name' => 'asc'
            )
        ));
		$specialties = $this->Specialty->find('all', array(
            'conditions' => array(
                'Specialty.is_active' => 1
            ),
			'limit' => 9,
			'fields'=>array(
				'Specialty.id',
				'Specialty.name',
				'Specialty.slug'
			),
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
		$this->set(compact('languages','specialties','cities'));
	}	
    public function admin_index()
    {
        $this->disableCache();
        $param_string = "";
        $this->pageTitle = __l('Languages');
        $conditions = array();
        if (!empty($this->request->data['Language']['filter_id'])) {
            $this->request->params['named']['filter_id'] = $this->request->data['Language']['filter_id'];
        }
        if (!empty($this->request->data['Language']['q'])) {
            $this->request->params['named']['q'] = $this->request->data['Language']['q'];
        }
        $param_string.= !empty($this->request->params['named']['filter_id']) ? '/filter_id:' . $this->request->params['named']['filter_id'] : $param_string;
        if (isset($this->request->params['named']['q']) && !empty($this->request->params['named']['q'])) {
            $this->request->data['Language']['q'] = $this->request->params['named']['q'];
            $this->pageTitle.= sprintf(__l(' - Search - %s') , $this->request->params['named']['q']);
            $param_string = '/q:' . $this->request->params['named']['q'];
        }
        if (!empty($this->request->params['named']['filter_id'])) {
            if ($this->request->params['named']['filter_id'] == ConstMoreAction::Active) {
                $conditions['Language.is_active'] = 1;
                $this->pageTitle.= __l(' - Active ');
            } else if ($this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) {
                $conditions['Language.is_active'] = 0;
                $this->pageTitle.= __l(' - Inactive ');
            }
        }
        $this->Language->recursive = -1;
        $this->paginate = array(
            'conditions' => $conditions,
            'order' => array(
                'Language.name' => 'asc'
            )
        );
        if (!empty($this->request->params['named']['q'])) {
            $this->paginate = array_merge($this->paginate, array(
                'search' => $this->request->params['named']['q']
            ));
        }
        $this->set('param_string', $param_string);
        $this->set('languages', $this->paginate());
        $this->set('pending', $this->Language->find('count', array(
            'conditions' => array(
                'Language.is_active = ' => 0
            )
        )));
        $this->set('approved', $this->Language->find('count', array(
            'conditions' => array(
                'Language.is_active = ' => 1
            )
        )));
        $moreActions = $this->Language->moreActions;
        $this->set(compact('moreActions'));
        $this->set('pageTitle', $this->pageTitle);
    }
    public function admin_add()
    {
        $this->pageTitle = __l('Add Language');
        $this->Language->create();
        if (!empty($this->request->data)) {
            if ($this->Language->save($this->request->data)) {
                $this->Session->setFlash(__l('Language has been added') , 'default', null, 'success');
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('Language could not be added. Please, try again.') , 'default', null, 'error');
            }
        }
        $this->set('pageTitle', $this->pageTitle);
    }
    public function admin_edit($id = null)
    {
        $this->pageTitle = __l('Edit Language');
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if (!empty($this->request->data)) {
            if ($this->Language->save($this->request->data)) {
                $this->Session->setFlash(__l('Language  has been updated') , 'default', null, 'success');
                $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__l('Language  could not be updated. Please, try again.') , 'default', null, 'error');
            }
        } else {
            $this->request->data = $this->Language->read(null, $id);
            if (empty($this->request->data)) {
                throw new NotFoundException(__l('Invalid request'));
            }
        }
        $this->pageTitle.= ' - ' . $this->request->data['Language']['name'];
        $this->set('pageTitle', $this->pageTitle);
    }
    public function change_language()
    {
        if (!empty($this->request->data)) {
            if ($this->Auth->user('id')) {
                $this->Cookie->write('user_language', $this->request->data['Language']['language_id'], false);
            } else {
                $this->Cookie->write('user_language', $this->request->data['Language']['language_id'], false, time() +60*60*4);
            }
            $this->redirect(Router::url('/', true) . $this->request->data['Language']['r']);
        } else {
            $this->redirect(Router::url('/', true) . $this->request->params['named']['city']);
        }
    }
}
?>