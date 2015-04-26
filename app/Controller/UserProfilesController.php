<?php
class UserProfilesController extends AppController
{
    public $name = 'UserProfiles';
    public $uses = array(
        'UserProfile',
        'Attachment',
    );
    public $components = array(
        'Email'
    );
    public function beforeFilter()
    {
        $this->Security->disabledFields = array(
            'UserProfile',
            'Attachment.filename',
            'City',
            'State',
            'City.id',
            'State.id'
        );
        parent::beforeFilter();
    }
    public function edit($user_id = null)
    {
        $this->pageTitle = __l('Edit Profile');
        $this->UserProfile->User->UserAvatar->Behaviors->attach('ImageUpload', Configure::read('avatar.file'));
        if (!empty($this->request->data)) {
            if (empty($this->request->data['User']['id'])) {
                $this->request->data['User']['id'] = $this->Auth->user('id');
            }
            $user = $this->UserProfile->User->find('first', array(
                'conditions' => array(
                    'User.id' => $this->request->data['User']['id']
                ) ,
                'contain' => array(
                    'UserProfile' => array(
                        'fields' => array(
                            'UserProfile.id',
                            'UserProfile.paypal_account'
                        )
                    ) ,
                    'UserAvatar' => array(
                        'fields' => array(
                            'UserAvatar.id',
                            'UserAvatar.filename',
                            'UserAvatar.dir',
                            'UserAvatar.width',
                            'UserAvatar.height'
                        )
                    )
                ) ,
                'recursive' => 0
            ));
            if (!empty($user)) {
                $this->request->data['UserProfile']['id'] = $user['UserProfile']['id'];
                if (!empty($user['UserAvatar']['id'])) {
                    $this->request->data['UserAvatar']['id'] = $user['UserAvatar']['id'];
                }
            }
            $this->request->data['UserProfile']['user_id'] = $this->request->data['User']['id'];
            if (!empty($this->request->data['UserAvatar']['filename']['name'])) {
                $this->request->data['UserAvatar']['filename']['type'] = get_mime($this->request->data['UserAvatar']['filename']['tmp_name']);
            }
            if (!empty($this->request->data['UserAvatar']['filename']['name']) || (!Configure::read('avatar.file.allowEmpty') && empty($this->request->data['UserAvatar']['id']))) {
                $this->UserProfile->User->UserAvatar->set($this->request->data);
            }
			if($this->Auth->user('role_id') == ConstUserTypes::User) {
				unset($this->request->data['UserProfile']['State']);
				unset($this->request->data['UserProfile']['City']);
			} else {
				unset($this->request->data['UserProfile']['cell_number']);
			}
            $this->UserProfile->set($this->request->data);
            $this->UserProfile->User->set($this->request->data);
            $this->UserProfile->State->set($this->request->data);
            $this->UserProfile->City->set($this->request->data);
				if ($this->UserProfile->User->validates() &$this->UserProfile->validates() &$this->UserProfile->City->validates() &$this->UserProfile->State->validates()) {
					 if($this->Auth->user('role_id') != ConstUserTypes::User) {
						$this->request->data['UserProfile']['city_id'] = !empty($this->request->data['City']['id']) ? $this->request->data['City']['id'] : $this->UserProfile->City->findOrSaveAndGetId($this->request->data['City']['name']);
						$this->request->data['UserProfile']['state_id'] = !empty($this->request->data['State']['id']) ? $this->request->data['State']['id'] : $this->UserProfile->State->findOrSaveAndGetId($this->request->data['State']['name']);
					}	
					if ($this->UserProfile->save($this->request->data)) {
						$this->UserProfile->User->save($this->request->data['User']);
						$this->Session->setFlash(__l('User Profile has been updated') , 'default', null, 'success');
						if ($this->Auth->user('role_id') == ConstUserTypes::Admin AND $this->Auth->user('id') != $this->request->data['User']['id'] AND Configure::read('user.is_mail_to_user_for_profile_edit')) {
							// Send mail to user to activate the account and send account details
							$emailFindReplace = array(
								'##USERNAME##' => $user['User']['username'],
							);
							$this->UserProfile->_sendEmail('Admin User Edit', $emailFindReplace, $user['User']['email']);
						}
					}
				} else {
					$this->Session->setFlash(__l('User Profile could not be updated. Please, try again.') , 'default', null, 'error');
				}
		    
            $user = $this->UserProfile->User->find('first', array(
                'conditions' => array(
                    'User.id' => $this->request->data['User']['id']
                ) ,
                'contain' => array(
                    'UserProfile' => array(
                        'fields' => array(
                            'UserProfile.id'
                        )
                    ) ,
                    'UserAvatar' => array(
                        'fields' => array(
                            'UserAvatar.id',
                            'UserAvatar.filename',
                            'UserAvatar.dir',
                            'UserAvatar.width',
                            'UserAvatar.height'
                        )
                    )
                ) ,
                'recursive' => 0
            ));
            if (!empty($user['User'])) {
                unset($user['UserProfile']);
                $this->request->data['User'] = array_merge($user['User'], $this->request->data['User']);
                $this->request->data['UserAvatar'] = $user['UserAvatar'];
            }
			//Setting ajax layout when submitting through iframe with jquery ajax form plugin
            if (!empty($this->request->params['form']['is_iframe_submit'])) {
                $this->layout = 'ajax';
            }
        } else {
            if ($this->Auth->user('role_id') != ConstUserTypes::Admin || empty($user_id)) {
                $user_id = $this->Auth->user('id');
            }
            $this->request->data = $this->UserProfile->User->find('first', array(
                'conditions' => array(
                    'User.id' => $user_id
                ) ,
                'contain' => array(
					'UserAvatar' => array(
                        'fields' => array(
                            'UserAvatar.id',
                            'UserAvatar.dir',
                            'UserAvatar.filename',
                            'UserAvatar.width',
                            'UserAvatar.height'
                        )
                    ) ,
                    'UserProfile' => array(
                        'City' => array(
                            'fields' => array(
                                'City.name'
                            )
                        ) ,
                        'State' => array(
                            'fields' => array(
                                'State.name'
                            )
                        )
                    )
                ) ,
                'recursive' => 2
            ));
            if (!empty($this->request->data['UserProfile']['City'])) {
                $this->request->data['City']['name'] = $this->request->data['UserProfile']['City']['name'];
            }
            if (!empty($this->request->data['UserProfile']['State']['name'])) {
                $this->request->data['State']['name'] = $this->request->data['UserProfile']['State']['name'];
            }
        }
        $this->pageTitle.= ' - ' . $this->request->data['User']['username'];
        $genders = $this->UserProfile->Gender->find('list');
        $countries = $this->UserProfile->Country->find('list');
        $languages = $this->UserProfile->Language->find('list', array(
            'conditions' => array(
                'Language.is_active' => 1
            )
        ));
		$specialties = $this->UserProfile->User->Specialty->find('list');
		$filter = array(
            '1' => __l('Cell') ,
            '2' => __l('Home') ,
            '3' => __l('Work') ,
         );
		$this->set('filter', $filter);
        $this->set(compact('genders', 'countries', 'languages','specialties'));
    }
    public function admin_edit($id = null)
    {
        if (is_null($id) && empty($this->request->data)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        $this->setAction('edit', $id);
    }
	public function my_account($user_id = null)
    {
        if (is_null($user_id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        $this->set('user_id', $user_id);
    }
}
?>