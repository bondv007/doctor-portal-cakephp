<?php
class ClinicsController extends AppController
{
	public $name = 'Clinics';
	
	public $components = array(
        'Email',
    );
	public $uses = array(
        'Clinic',
		'CakeEmail',
		'Network/Email',
        'EmailTemplate'
    );	
	public function beforeFilter()
    {
		$this->Security->disabledFields = array(
            'City',
            'State',
            'Clinic.latitude',
            'Clinic.longitude',
            'User.id',
            'Clinic.id',
            'Clinic.address',
            'Clinic.address2',
            'Clinic.country_id',
            'Clinic.name',
            'Clinic.phone',
            'Clinic.zip'
        );
        parent::beforeFilter();
    }
	public function index() 
	{
		$this->pageTitle = __l('Clinics');
		$this->Clinic->recursive = 0;
		$this->set('clinics', $this->paginate());
	}
	public function view($slug = null)
	{
		$this->pageTitle = __l('Clinic');
		if (is_null($slug)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$clinic = $this->Clinic->find('first', array(
			'conditions' => array(
				'Clinic.slug = ' => $slug
			),
			'contain' => array(
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
			),
			'fields' => array(
				'Clinic.id',
				'Clinic.created',
				'Clinic.name',
				'Clinic.slug',
				'Clinic.description',
				'Clinic.address',
				'Clinic.address2',
				'Clinic.phone',
				'Clinic.city_id',
				'Clinic.state_id',
				'Clinic.country_id',
				'Clinic.zip',
				'Clinic.latitude',
				'Clinic.longitude',
				'Clinic.is_active',
			),
			'recursive' => 1,
		));
		if (empty($clinic)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $clinic['Clinic']['name'];
		$this->set('clinic', $clinic);
	}
	public function add()
	{
		$this->pageTitle = __l('Add Clinic');
		$temp_country_id = '';
		if (!empty($this->request->data)) {
			//state and country looking
            if (!empty($this->request->data['Clinic']['country_id'])) {
                $temp_country_id = $this->request->data['Clinic']['country_id'];
                $this->request->data['Clinic']['country_id'] = $this->Clinic->Country->findCountryIdFromIso2($this->request->data['Clinic']['country_id']);
            }
            if (!empty($this->request->data['State']['name'])) {
                $this->request->data['Clinic']['state_id'] = !empty($this->request->data['State']['id']) ? $this->request->data['State']['id'] : $this->Clinic->State->findOrSaveAndGetId($this->request->data['State']['name']);
            }
            if (!empty($this->request->data['City']['name'])) {
                $this->request->data['Clinic']['city_id'] = !empty($this->request->data['City']['id']) ? $this->request->data['City']['id'] : $this->Clinic->City->findOrSaveCityAndGetId($this->request->data['City']['name'], $this->request->data['Clinic']['state_id'], $this->request->data['Clinic']['country_id'], $this->request->data['Clinic']['latitude'], $this->request->data['Clinic']['longitude']);
            }
			$this->Clinic->create();
			$this->Clinic->set($this->request->data);
            $this->Clinic->State->set($this->request->data);
            $this->Clinic->City->set($this->request->data);
            unset($this->Clinic->City->validate['City']);
			$this->request->data['Clinic']['user_id'] = $this->Auth->user('id');
			 if ($this->Clinic->validates() &$this->Clinic->City->validates() &$this->Clinic->State->validates()) {
				if ($this->Clinic->save($this->request->data)) {
					$this->Session->setFlash(__l('Clinic has been added successfully. It will be list out after admin approval.'), 'default', null, 'success');
					$user = $this->Clinic->User->find('first', array(
						'condtions' => array(
							'User.id' => $this->Auth->user('id')
						),
						'fields' => array(
							'User.email'
						),
						'recursive' => -1,
					));
					$emailFindReplace = array(
						'##USERNAME##' => $this->Auth->user('username'),
						'##PHONE##' => $this->request->data['Clinic']['phone'],
						'##CLINIC_NAME##' => $this->request->data['Clinic']['name']
					);
					$this->Clinic->_sendEmail('Clinic Added Alert to Clinic User', $emailFindReplace,  $user['User']['email']);
					$this->redirect(array('action' => 'index'));
				} else {
					$this->request->data['Clinic']['country_id'] = $temp_country_id;
					$this->Session->setFlash(__l('Clinic could not be added. Please, try again.'), 'default', null, 'error');
				}
			} else {
                $this->request->data['Clinic']['country_id'] = $temp_country_id;
                $this->Session->setFlash(__l('Clinic could not be added. Please, try again.') , 'default', null, 'error');
            }
		}
		unset($this->Clinic->City->validate['City']);
        $countries = $this->Clinic->Country->find('list', array(
            'fields' => array(
                'Country.iso2',
                'Country.name'
            )
        ));
        $this->set(compact('countries'));
	}
	public function edit($id = null)
	{
		$this->pageTitle = __l('Edit Clinic');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->Clinic->save($this->request->data)) {
				$this->Session->setFlash(__l('Clinic has been updated'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Clinic could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->Clinic->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['Clinic']['name'];
		$cities = $this->Clinic->City->find('list');
		$states = $this->Clinic->State->find('list');
		$countries = $this->Clinic->Country->find('list');
		$this->set(compact('users','users','cities','states','countries'));
	}
	public function admin_index()
	{
		$this->_redirectGET2Named(array(
            'q',
			'filter_id'
        ));
		$this->set('title_for_layout', __l('Clinic Users', true));
		$conditions = array();
		$this->pageTitle = __l('Clinics');
        if (isset($this->request->params['named']['filter_id'])) {
            $this->request->data[$this->modelClass]['filter_id'] = $this->request->params['named']['filter_id'];
        }
        if (!empty($this->request->params['named']['filter_id'])) {
            if ($this->request->params['named']['filter_id'] == ConstMoreAction::Active) {
                $conditions['Clinic.is_active'] = 1;
                $this->pageTitle.= __l(' - Active ');
            } else if ($this->request->params['named']['filter_id'] == ConstMoreAction::Inactive) {
                $conditions['Clinic.is_active'] = 0;
                $this->pageTitle.= __l(' - Inactive ');
            }
        }
		if (isset($this->request->params['named']['q'])) {
			$conditions[] = array(
                'OR' => array(
                    array(
                        'Clinic.name LIKE ' => '%' . $this->params['named']['q'] . '%'
                    ) ,
                )
            );
            $this->request->data['Clinic']['q'] = $this->request->params['named']['q'];
            $this->pageTitle.= sprintf(__l(' - Search - %s') , $this->request->params['named']['q']);
        }		
		if ($this->RequestHandler->prefers('csv')) {
			Configure::write('debug', 0);
            $this->set('clinic', $this);
            $this->set('conditions', $conditions);
            if (isset($this->request->data['Clinic']['q'])) {
                $this->set('q', $this->request->data['Clinic']['q']);
            }
            //$this->set('contain', $contain);
		 } else {
			$this->paginate = array(
                'conditions' => array(
                    $conditions,
                ) ,
                'contain' => array(
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
					  ) 
                ) ,
                'order' => array(
                    'Clinic.id' => 'desc'
                ) ,
                'recursive' => 3,
            );
		if (!empty($this->request->params['named']['q'])) {
			$this->paginate = array_merge($this->paginate, array(
				'search' => $this->request->params['named']['q']
			));
			$this->request->data['Clinic']['q'] = $this->request->params['named']['q'];
		}
		$this->set('clinics', $this->paginate());
		 // total approved users list
		$this->set('active', $this->Clinic->find('count', array(
			'conditions' => array(
				'Clinic.is_active' => 1,
			) ,
			'recursive' => 1
		)));
		// total approved users list
		$this->set('inactive', $this->Clinic->find('count', array(
			'conditions' => array(
				'Clinic.is_active' => 0,
			) ,
			'recursive' => 1
		)));
		$moreActions = $this->Clinic->moreActions;
		$this->set(compact('moreActions'));
		}
	}
	public function my_doctors($clinic_id = null)  
	{
		$this->pageTitle = __l('My Doctors');
		if (is_null($clinic_id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$clinic_users = $this->Clinic->find('first', array(
				'conditions' => array(
					'Clinic.id' => $clinic_id
				),
				'contain' => array(
					'User' => array(
						'UserProfile' => array(
						'Specialty' => array(
                       		 'fields' => array(
                        	    'Specialty.name'
                        	)
                    	) ,	
						'fields' => array(
							'UserProfile.first_name',
							'UserProfile.last_name',
							'UserProfile.specialty_id',
							'UserProfile.phone',
							)
						) ,
						'fields' => array(
							'User.id',
							'User.created',
							'User.username',
						),
					)
				),
				'fields'=>array(
					'Clinic.name'
				),
				'recursive' => 3,
		));
		$this->set('clinic_users', $clinic_users);
	}
	public function admin_add()
	{
		$this->pageTitle = __l('Add Clinic');
		$temp_country_id = '';
        $this->Clinic->User->UserAvatar->Behaviors->attach('ImageUpload', Configure::read('avatar.file'));
		if (!empty($this->request->data)) {
			//state and country looking
            if (!empty($this->request->data['Clinic']['country_id'])) {
                $temp_country_id = $this->request->data['Clinic']['country_id'];
                $this->request->data['Clinic']['country_id'] = $this->Clinic->Country->findCountryIdFromIso2($this->request->data['Clinic']['country_id']);
            }
            if (!empty($this->request->data['State']['name'])) {
                $this->request->data['Clinic']['state_id'] = !empty($this->request->data['State']['id']) ? $this->request->data['State']['id'] : $this->Clinic->State->findOrSaveAndGetId($this->request->data['State']['name']);
            }
            if (!empty($this->request->data['City']['name'])) {
                $this->request->data['Clinic']['city_id'] = !empty($this->request->data['City']['id']) ? $this->request->data['City']['id'] : $this->Clinic->City->findOrSaveCityAndGetId($this->request->data['City']['name'], $this->request->data['Clinic']['state_id'], $this->request->data['Clinic']['country_id'], $this->request->data['Clinic']['latitude'], $this->request->data['Clinic']['longitude']);
            }
			$this->Clinic->create();
			$this->Clinic->set($this->request->data);
            $this->Clinic->User->set($this->request->data);
            $this->Clinic->State->set($this->request->data);
            $this->Clinic->City->set($this->request->data);
            unset($this->Clinic->City->validate['City']);
			 if ($this->Clinic->User->validates() &$this->Clinic->validates() &$this->Clinic->City->validates() &$this->Clinic->State->validates()) {
                if (empty($this->request->data['Clinic']['user_id'])) {
                    $this->request->data['User']['role_id'] = ConstUserTypes::Clinic;
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['passwd']);
                    if ($this->request->data['Clinic']['is_active']) {
                        $this->request->data['User']['is_email_confirmed'] = '1';
                        $this->request->data['User']['is_active'] = '1';
                    } else {
                        $this->request->data['User']['is_email_confirmed'] = '0';
                        $this->request->data['User']['is_active'] = '0';
                    }
                    if ($this->Clinic->User->save($this->request->data)) {
                        $user_id = $this->Clinic->User->getLastInsertId();
                        $this->request->data['Clinic']['user_id'] = $user_id;
                        $this->request->data['UserProfile']['user_id'] = $user_id;
                        $this->request->data['UserProfile']['address'] = $this->request->data['Clinic']['address'];
                        $this->request->data['UserProfile']['city_id'] = $this->request->data['Clinic']['city_id'];
                        $this->request->data['UserProfile']['state_id'] = $this->request->data['Clinic']['state_id'];
                        $this->request->data['UserProfile']['zip_code'] = $this->request->data['Clinic']['zip'];
                        $this->Clinic->User->UserProfile->create();
                        $this->Clinic->User->UserProfile->save($this->request->data);
                    }
                }
				if ($this->Clinic->save($this->request->data)) {
					$email = $this->EmailTemplate->selectTemplate('Admin User Add');
					$emailFindReplace = array(
						'##FROM_EMAIL##' => $this->Clinic->changeFromEmail(($email['from'] == '##FROM_EMAIL##') ? Configure::read('EmailTemplate.from_email') : $email['from']) ,
						'##USERNAME##' => $this->request->data['User']['username'],
						'##LOGINLABEL##' => ucfirst(Configure::read('user.using_to_login')) ,
						'##USEDTOLOGIN##' => $this->request->data['User'][Configure::read('user.using_to_login') ],
						'##SITE_NAME##' => Configure::read('site.name') ,
						'##PASSWORD##' => $this->request->data['User']['passwd'],
						'##SITE_LINK##' => Router::url('/', true) ,
						'##CONTACT_URL##' => Router::url(array(
							'controller' => 'contacts',
							'action' => 'add',
							'admin' => false
						) , true) ,
						'##SITE_LOGO##' => Router::url(array(
							'controller' => 'img',
							'action' => 'theme-image',
							'logo-email.png',
							'admin' => false
						) , true) ,
					);
					$this->Email->from = ($email['from'] == '##FROM_EMAIL##') ? Configure::read('EmailTemplate.from_email') : $email['from'];
					$this->Email->replyTo = ($email['reply_to'] == '##REPLY_TO_EMAIL##') ? Configure::read('EmailTemplate.reply_to_email') : $email['reply_to'];
					$this->Email->to = $this->request->data['User']['email'];
					$this->Email->subject = strtr($email['subject'], $emailFindReplace);
					$this->Email->send(strtr($email['email_content'], $emailFindReplace));
					$this->Session->setFlash(__l('Clinic has been added'), 'default', null, 'success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->request->data['Clinic']['country_id'] = $temp_country_id;
					$this->Session->setFlash(__l('Clinic could not be added. Please, try again.'), 'default', null, 'error');
				}
			} else {
                $this->request->data['Clinic']['country_id'] = $temp_country_id;
                $this->Session->setFlash(__l('Clinic could not be added. Please, try again.') , 'default', null, 'error');
            }
		}
		unset($this->Clinic->City->validate['City']);
        $countries = $this->Clinic->Country->find('list', array(
            'fields' => array(
                'Country.iso2',
                'Country.name'
            )
        ));
        $this->set(compact('countries'));
        unset($this->request->data['User']['passwd']);
        unset($this->request->data['User']['confirm_password']);
	}
	public function admin_edit($id = null)
	{
		$this->pageTitle = __l('Edit Clinic');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->Clinic->save($this->request->data)) {
				$this->Session->setFlash(__l('Clinic has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Clinic could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->Clinic->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['Clinic']['name'];
		$users = $this->Clinic->User->find('list');
		$users = $this->Clinic->User->find('list');
		$cities = $this->Clinic->City->find('list');
		$states = $this->Clinic->State->find('list');
		$countries = $this->Clinic->Country->find('list');
		$this->set(compact('users','users','cities','states','countries'));
	}
	public function admin_delete($id = null) 
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->Clinic->delete($id)) {
			$this->Session->setFlash(__l('Clinic deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>