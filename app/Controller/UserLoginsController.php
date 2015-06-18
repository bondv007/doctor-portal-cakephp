<?php
class UserLoginsController extends AppController
{
    public $name = 'UserLogins';
    public function admin_index()
    {
        $this->_redirectGET2Named(array(
            'user_id',
            'q'
        ));
        $conditions = array();
        // check the filer passed through named parameter
        if (!empty($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'day') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(UserLogin.created) <= '] = 0;
            $this->pageTitle.= __l(' - today');
        }
        if (!empty($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'week') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(UserLogin.created) <= '] = 7;
            $this->pageTitle.= __l('- in this week');
        }
        if (!empty($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'month') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(UserLogin.created) <= '] = 30;
            $this->pageTitle.= __l(' - in this month');
        }
        if (!empty($this->request->params['named']['filter_id'])) {
           if ($this->request->params['named']['filter_id'] == ConstMoreAction::Active) {
                $conditions['User.is_active'] = 1;
                $this->pageTitle.= __l(' - Active ');
            } else if ($this->request->params['named']['filter_id'] == ConstMoreAction::Facebook) {
                $conditions['User.fb_user_id !='] = 0;
                $this->pageTitle.= __l(' - Login through Facebook ');
            } else if ($this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) {
                $conditions['User.is_active'] = 0;
                $this->pageTitle.= __l(' - Inactive ');
            } else if ($this->request->params['named']['filter_id'] == ConstMoreAction::Normal) {
                $conditions['User.is_facebook_register'] = 0;
                $this->pageTitle.= __l(' - Normal Users ');
            }
            $this->request->params['named']['filter_id'] = $this->request->params['named']['filter_id'];
        }
        $this->pageTitle = __l('User Logins');
        if (!empty($this->request->params['named']['username']) || !empty($this->request->params['named']['user_id'])) {
            $userConditions = !empty($this->request->params['named']['username']) ? array(
                'User.username' => $this->request->params['named']['username']
            ) : array(
                'User.id' => $this->request->params['named']['user_id']
            );
            $user = $this->{$this->modelClass}->User->find('first', array(
                'conditions' => $userConditions,
                'fields' => array(
                    'User.id',
                    'User.username'
                ) ,
                'recursive' => -1
            ));
            if (empty($user)) {
                throw new NotFoundException(__l('Invalid request'));
            }
            $conditions['User.id'] = $this->request->data[$this->modelClass]['user_id'] = $user['User']['id'];
            $this->pageTitle.= ' - ' . $user['User']['username'];
        }
        if (!empty($this->request->params['named']['q'])) {
			$conditions[] = array(
                'OR' => array(
                    array(
                        'User.username LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
					array(
                        'Ip.ip LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
					array(
                        'UserLogin.user_agent LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
                )
            );
            $this->request->data['UserLogin']['q'] = $this->request->params['named']['q'];
            $this->pageTitle.= sprintf(__l(' - Search - %s') , $this->request->params['named']['q']);
        }
        $this->UserLogin->recursive = 0;
        $this->paginate = array(
            'conditions' => $conditions,
            'contain' => array(
                'Ip' => array(
                    'City' => array(
                        'fields' => array(
                            'City.name',
                        )
                    ) ,
                    'State' => array(
                        'fields' => array(
                            'State.name',
                        )
                    ) ,
                    'Country' => array(
                        'fields' => array(
                            'Country.name',
                            'Country.iso2',
                        )
                    ) ,
                    'Timezone' => array(
                        'fields' => array(
                            'Timezone.name',
                        )
                    ) ,
                    'fields' => array(
                        'Ip.ip',
                        'Ip.latitude',
                        'Ip.longitude',
                        'Ip.host'
                    )
                ) ,
                'User' => array(
                    'UserAvatar',
                )
            ) ,
            'order' => array(
                'UserLogin.id' => 'desc'
            ) ,
        );
        if (!empty($this->request->data['UserLogin']['q'])) {
            $this->paginate = array_merge($this->paginate, array(
                'search' => $this->request->data['UserLogin']['q']
            ));
        }
        $this->set('userLogins', $this->paginate());
        $moreActions = $this->UserLogin->moreActions;
        $this->set(compact('moreActions'));
    }
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($this->UserLogin->delete($id)) {
            $this->Session->setFlash(__l('User Login deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
            throw new NotFoundException(__l('Invalid request'));
        }
    }
}
?>