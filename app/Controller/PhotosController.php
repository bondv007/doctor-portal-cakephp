<?php
class PhotosController extends AppController
{
    public $name = 'Photos';
    public $components = array(
        'RequestHandler'
    );
    public function beforeFilter()
    {
        $this->Security->disabledFields = array(
            'Attachment'
        );
        parent::beforeFilter();
    }
    public function index($user_id = null)
    {
		$this->pageTitle = __l('My Photos');
        $conditions = array();
        // item add sucess message
        if (!empty($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'success') {
            $this->Session->setFlash(__l('Photo has been added.') , 'default', null, 'success');
        }
		if ($this->Auth->user('id')) {
			$conditions['Photo.user_id'] = $this->Auth->user('id');
		} 
        $order['Photo.id'] = 'desc';
        $this->Photo->recursive = 0;
        $this->paginate = array(
            'conditions' => $conditions,
            'fields' => array(
                'Photo.id',
                'Photo.created',
                'Photo.title',
                'Photo.slug',
                'Attachment.id',
                'Attachment.filename',
                'Attachment.dir',
                'Attachment.width',
                'Attachment.height',
            ) ,
            'contain' => array(
                'User' => array(
                    'fields' => array(
                        'User.id',
                        'User.username',
						'User.default_thumbnail_id'
                    )
                ) ,
                'Attachment' => array(
                    'fields' => array(
                        'Attachment.id',
                        'Attachment.filename',
                        'Attachment.dir',
                        'Attachment.width',
                        'Attachment.height'
                    )
                ) 
            ) ,
            'order' => $order
        );
        $this->set('photos', $this->paginate());
    }
    public function add()
    {
		$this->loadModel('Attachment');
		$this->Photo->Behaviors->attach('ImageUpload', Configure::read('photo.file'));
		if (!empty($this->request->data)) {
			$this->request->data['Photo']['user_id'] = $this->Auth->user('id');
            $this->Photo->set($this->request->data);
            if ($this->Photo->validates()) {
                $this->Photo->create();
                $this->Photo->save($this->request->data);
                $photo_id = $this->Photo->getLastInsertId();
                $this->Photo->Attachment->create();
                if (!isset($this->request->data['Attachment']) && $this->RequestHandler->isAjax()) { // Flash Upload
                    $this->request->data['Attachment']['foreign_id'] = $photo_id;
                    $this->request->data['Attachment']['description'] = 'Photo';
                    $this->Session->write('Photo.id', $photo_id);
                    $this->XAjax->flashuploadset($this->request->data);
                } else { // Normal Upload
                    $is_form_valid = true;
                    $upload_photo_count = 0;
                    if (!empty($this->request->data['Attachment'])) {
                        for ($i = 0; $i < count($this->request->data['Attachment']); $i++) {
                            if (!empty($this->request->data['Attachment'][$i]['filename']['tmp_name'])) {
                                $upload_photo_count++;
                                $image_info = getimagesize($this->request->data['Attachment'][$i]['filename']['tmp_name']);
                                $this->request->data['Attachment']['filename'] = $this->request->data['Attachment'][$i]['filename'];
                                $this->request->data['Attachment']['filename']['type'] = $image_info['mime'];
                                $this->request->data['Attachment'][$i]['filename']['type'] = $image_info['mime'];
                                $this->Photo->Attachment->Behaviors->attach('ImageUpload', Configure::read('avatar.file'));
                                $this->Photo->Attachment->set($this->request->data);
                                if (!$this->Photo->validates() |!$this->Photo->Attachment->validates()) {
                                    $attachmentValidationError[$i] = $this->Photo->Attachment->validationErrors;
                                    $is_form_valid = false;
                                    $this->Session->setFlash(__l('Photo could not be added. Please, try again.') , 'default', null, 'error');
                                }
                            }
                        }
                    }
                    if (!$upload_photo_count) {
                        $this->Photo->validates();
                        $this->Photo->Attachment->validationErrors[0]['filename'] = __l('Required');
                        $is_form_valid = false;
                    }
                    if (!empty($attachmentValidationError)) {
                        foreach($attachmentValidationError as $key => $error) {
                            $this->Photo->Attachment->validationErrors[$key]['filename'] = $error;
                        }
                    }
                    if ($is_form_valid) {
                        $this->request->data['foreign_id'] = $this->Photo->getLastInsertId();
                        $this->request->data['Attachment']['description'] = 'Photo';
                        $this->XAjax->normalupload($this->request->data, false);
                        $this->Session->setFlash(__l('Photo has been added.') , 'default', null, 'success');
                    }
                }
                $this->Session->setFlash(__l('Photo has been added') , 'default', null, 'success');
                $this->redirect(array(
                       'action' => 'index',
                ));
            } else {
                $this->Session->setFlash(__l('Photo could not be added. Please, try again.') , 'default', null, 'error');
            }
        }  
		$this->request->data['Photo']['user_id'] = $this->Auth->user('id');
        //this is for admin_edit
        if ($this->Auth->user('role_id') == ConstUserTypes::Admin) {
            $users = $this->Photo->User->find('list');
            $this->set(compact('users'));
        }
    }
    public function edit($id = null)
    {
        $this->pageTitle = __l('Edit Travel Photos');
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if (!empty($this->request->data)) {
            $this->Photo->set($this->request->data);
            $photo = $this->Photo->find('first', array(
                'conditions' => array(
                    'Photo.id' => $id
                ) ,
                'fields' => array(
                    'Photo.title',
                    'Photo.slug',
                    'Photo.user_id',
                    'Attachment.filesize',
                ) ,
                'recursive' => 0
            ));
            if ($returned = $this->Photo->save($this->request->data)) {
                if ($this->request->data['Photo']['title'] != $photo['Photo']['title']) {
                    $photo = $this->Photo->find('first', array(
                        'conditions' => array(
                            'Photo.id' => $id
                        ) ,
                        'fields' => array(
                            'Photo.slug',
                        ) ,
                        'recursive' => -1
                    ));
                }
               $this->Session->setFlash(__l('Photo Contents has been updated'), 'default', null, 'success');
			   $this->redirect(array('action' => 'index'));
            }
        } else {
            $conditions['Photo.id'] = $id;
            //this is for admin_edit
            if ($this->Auth->user('role_id') != ConstUserTypes::Admin) {
                $conditions['Photo.user_id'] = $this->Auth->user('id');
            }
            $this->request->data = $this->Photo->find('first', array(
                'conditions' => $conditions,
                'fields' => array(
                    'Photo.id',
					'Photo.title',
                    'Photo.description',
                    'Photo.photo_album_id',
                    'Photo.slug',
                    'Photo.user_id',
                    'Attachment.id',
                    'Attachment.filename',
                    'Attachment.dir',
                    'Attachment.width',
                    'Attachment.height'
                ) ,
                'contain' => array(
                    'Attachment',
                )
            ));
            if (empty($this->request->data)) {
                throw new NotFoundException(__l('Invalid request'));
            }
        }
        //this is for admin_edit
        if ($this->Auth->user('role_id') == ConstUserTypes::Admin) {
            $users = $this->Photo->User->find('list');
            $this->set(compact('users'));
        }
        $this->pageTitle.= ' - ' . $this->request->data['Photo']['title'];
		$photoAlbums = $this->Photo->PhotoAlbum->find('list', array(
			'conditions' => array(
				'PhotoAlbum.user_id' => $this->request->data['Photo']['user_id']
			)
		));
		$this->set(compact('photoAlbums'));
    }
    public function delete($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
		$photo = $this->Photo->Attachment->find('first', array(
                        'conditions' => array(
                            'Attachment.id' => $id
                        ) ,
                        'fields' => array(
                            'Attachment.foreign_id',
                        ) 
                    ));
         if ($this->Photo->Attachment->delete($id)) {
			 $this->Photo->delete($photo['Attachment']['foreign_id']);
            $this->Session->setFlash(__l('Photo deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
           throw new NotFoundException(__l('Invalid request'));
        }
    }
    public function admin_index()
    {
        $this->_redirectGET2Named(array(
            'username',
            'q'
        ));
        $this->pageTitle = __l('Photos');
        $conditions = array();
        $this->Photo->validate = array();
        if (!empty($this->request->params['named']['username'])) {
            $conditions = array(
                'User.username' => $this->request->params['named']['username']
            );
            $this->pageTitle.= sprintf(__l(' - User - %s') , $this->request->params['named']['username']);
        }
        if (!empty($this->request->params['named']['album'])) {
            $conditions = array(
                'PhotoAlbum.slug' => $this->request->params['named']['album']
            );
            $this->pageTitle.= sprintf(__l(' - Album - %s') , $this->request->params['named']['album']);
        }
        if (!empty($this->request->params['named']['filter_id'])) {
            $this->request->data['Photo']['filter_id'] = $this->request->params['named']['filter_id'];
        }
        if (!empty($this->request->data['Photo']['filter_id'])) {
            if ($this->request->data['Photo']['filter_id'] == ConstMoreAction::Active) {
                $conditions['Photo.is_active'] = 1;
                $this->pageTitle.= __l(' - Active ');
            } elseif ($this->request->data['Photo']['filter_id'] == ConstMoreAction::Inactive) {
                $conditions['Photo.is_active'] = 0;
                $this->pageTitle.= __l(' - Inactive ');
            } elseif ($this->request->data['Photo']['filter_id'] == ConstMoreAction::Suspend) {
                $conditions['Photo.is_active'] = 1;
                $this->pageTitle.= __l(' - Suspend ');
            } elseif ($this->request->data['Photo']['filter_id'] == ConstMoreAction::Flagged) {
                $conditions['Photo.is_system_flagged'] = 1;
                $this->pageTitle.= __l(' - Flagged ');
            }
            $this->request->params['named']['filter_id'] = $this->request->data['Photo']['filter_id'];
        }
        if (!empty($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'day') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(Photo.created) <= '] = 0;
            $this->pageTitle.= __l(' - Added today');
        }
        if (!empty($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'week') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(Photo.created) <= '] = 7;
            $this->pageTitle.= __l(' - Added in this week');
        }
        if (!empty($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'month') {
            $conditions['TO_DAYS(NOW()) - TO_DAYS(Photo.created) <= '] = 30;
            $this->pageTitle.= __l(' - Added in this month');
        }
        if (!empty($this->request->params['named']['q'])) {
            $this->request->data['Photo']['q'] = $this->request->params['named']['q'];
            $this->pageTitle.= sprintf(__l(' - Search - %s') , $this->request->params['named']['q']);
        }
        if (!empty($this->request->params['named']['photo']) && $this->request->params['named']['photo'] == ConstURLFilter::Commented) {
            $this->pageTitle.= __l(' - Commented photos');
        }
        if (!empty($this->request->params['named']['photo']) && $this->request->params['named']['photo'] == ConstURLFilter::Flagged) {
            $conditions = array(
                'Photo.photo_flag_count > ' => 0
            );
            $this->pageTitle.= __l(' - Flagged photos');
        }
        $this->Photo->recursive = 0;
        $this->paginate = array(
            'conditions' => $conditions,
            'fields' => array(
                'Photo.id',
                'Photo.modified',
                'Photo.title',
                'Photo.slug',
                'Photo.user_id',
                'Photo.description',
                'Photo.is_active',
                'Attachment.id',
                'Attachment.filename',
                'Attachment.dir',
                'Attachment.width',
                'Attachment.height'
            ) ,
            'contain' => array(
                'User' => array(
                    'fields' => array(
                        'User.id',
                        'User.username',
                    )
                ) ,
                'PhotoAlbum' => array(
                    'fields' => array(
                        'PhotoAlbum.title',
                        'PhotoAlbum.slug',
                    )
                ) ,
                'Attachment' => array(
                    'fields' => array(
                        'Attachment.id',
                        'Attachment.filename',
                        'Attachment.dir',
                        'Attachment.width',
                        'Attachment.height'
                    )
                ) ,
            )
        );
        if (!empty($this->request->data['Photo']['q'])) {
            $this->paginate['search'] = $this->request->data['Photo']['q'];
        }
        $this->set('photos', $this->paginate());
        $moreActions = $this->Photo->moreActions;
        $all_conditions = array();
        
       
        $this->set(compact('moreActions'));
        $this->set('all', $this->Photo->find('count', array(
            'conditions' => $all_conditions
        )));
    }
    public function admin_add()
    {
        $this->setAction('add');
    }
   
    public function admin_edit($id = null)
    {
        if (is_null($id) && empty($this->request->data)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        $this->setAction('edit', $id);
    }
    public function admin_delete($id = null)
    {
        if (is_null($id)) {
            $this->cakeError('error404');
        }
        if ($this->Photo->delete($id)) {
            $this->Session->setFlash(__l('Photo deleted') , 'default', null, 'success');
            $this->redirect(array(
                'action' => 'index'
            ));
        } else {
           throw new NotFoundException(__l('Invalid request'));
        }
    }
    public function flashupload()
    {
		$this->Photo->Attachment->Behaviors->attach('ImageUpload', Configure::read('photo.file'));
        $this->XAjax->flashupload();
    }
    public function update()
    {
        $this->pageTitle = __l('Update photos');
        if (!empty($this->request->data)) {
            $temp_data = $this->request->data;
            $this->request->data = array();
            $this->request->data['Photo']['photo_album_id'] = $temp_data['Photo']['photo_album_id'];
            unset($temp_data['Photo']['photo_album_id']);
            foreach($temp_data['Photo'] as $photo) {
                $this->request->data['Photo']['id'] = $photo['id'];
                $this->request->data['Photo']['title'] = $photo['title'];
                $this->request->data['Photo']['description'] = $photo['description'];
                if (Configure::read('photo.is_show_adult_photo_option')) {
                    $this->request->data['Photo']['is_adult_photo'] = $photo['is_adult_photo'];
                }
                $this->request->data['Photo']['tag'] = $photo['tag'];
                $returned = $this->Photo->save($this->request->data);
                if (!empty($returned['Photo']['is_system_flagged']) && (Configure::read('suspicious_detector.auto_suspend_photo_on_system_flag'))) {
                    $this->Session->setFlash(__l('Photo has been added. But, it has been suspended based on patterns (Bad words detection) and it will not be listed.') , 'default', null, 'success');
                } else {
                    $this->Session->setFlash(__l('Photo has been added') , 'default', null, 'success');
                }
            }
            $this->redirect(array(
                'controller' => 'photos',
                'action' => 'index',
                'username' => $this->Auth->user('username')
            ));
        } else {
            $uploaded_photos = $this->Session->read('flash_uploaded.data');
            $this->Session->del('flash_uploaded');
            $this->Session->del('flashupload_data');
            if (!empty($uploaded_photos)) {
                $photos = $this->Photo->find('all', array(
                    'conditions' => array(
                        'Photo.id' => $uploaded_photos
                    ) ,
                    'contain' => array(
                        'PhotoTag',
                        'Attachment'
                    ) ,
                    'fields' => array(
                        'Photo.id',
                        'Photo.user_id',
                        'Photo.title',
                        'Photo.photo_album_id',
                        'Photo.description',
                        'Photo.is_adult_photo',
                        'Attachment.dir',
                        'Attachment.filename',
                        'Attachment.id',
                        'Attachment.mimetype',
                        'Attachment.filesize',
                        'Attachment.width',
                        'Attachment.height'
                    )
                ));
                $photos = Set::merge($photos, $this->Photo->formatTags($photos));;
                $this->set('photos', $photos);
                $filesize = 0;
                $this->request->data['Photo']['photo_album_id'] = $photos[0]['Photo']['photo_album_id'];
                foreach($photos as $photo) {
                    $this->request->data['Photo'][$photo['Photo']['id']]['id'] = $photo['Photo']['id'];
                    $this->request->data['Photo'][$photo['Photo']['id']]['title'] = $photo['Photo']['title'];
                    $this->request->data['Photo'][$photo['Photo']['id']]['description'] = $photo['Photo']['description'];
                    $this->request->data['Photo'][$photo['Photo']['id']]['tag'] = $photo['PhotoTag'];
                    if (Configure::read('photo.is_show_adult_photo_option')) {
                        $this->request->data['Photo'][$photo['Photo']['id']]['is_adult_photo'] = $photo['Photo']['is_adult_photo'];
                    }
                    $filesize+= $photo['Attachment']['filesize'];
                }
                // To update used photos size in users table
                $this->Photo->User->updateAll(array(
                    'User.photo_upload_quota' => 'photo_upload_quota + ' . $filesize
                ) , array(
                    'User.id' => $photos[0]['Photo']['user_id']
                ));
                // Condition check if photo album enabled
                if (Configure::read('photo.is_allow_photo_album')) {
                    // if admin add photos, album list belongs to selected user
                    $photoAlbums = $this->Photo->PhotoAlbum->find('list', array(
                        'conditions' => array(
                            'PhotoAlbum.user_id' => $photos[0]['Photo']['user_id']
                        )
                    ));
                    $this->set(compact('photoAlbums'));
                }
            } else {
                $this->Session->setFlash(__l('Sorry, no latest uploaded photo to update') , 'default', null, 'error');
                $this->redirect(array(
                    'controller' => 'photos',
                    'action' => 'index',
                    'username' => $this->Auth->user('username')
                ));
            }
        }
    }
	// To change approve/disapprove status by admin
    public function admin_update_status($id = null, $status = null)
    {
        if (is_null($id) || is_null($status)) {
            throw new NotFoundException(__l('Invalid request'));
        }
        if ($status == 'active') {
			$this->Photo->updateAll(array(
                    'Photo.is_active' => 0
                ) , array(
                    'Photo.id' => $id
            ));
			$this->Session->setFlash(__l('Photos has been deactivated') , 'default', null, 'success');
        }
        if ($status == 'inactive') {
            $this->Photo->updateAll(array(
                    'Photo.is_active' => 1
                ) , array(
                    'Photo.id' => $id
            ));
			$this->Session->setFlash(__l('Photos has been activated') , 'default', null, 'success');
        }
        $this->redirect(array(
            'action' => 'index'
        ));
    }
    public function admin_update()
    {
		$this->autoRender = false;
        if (!empty($this->request->data['Photo'])) {
            $r = $this->request->data[$this->modelClass]['r'];
            $actionid = $this->request->data[$this->modelClass]['more_action_id'];
            unset($this->request->data[$this->modelClass]['r']);
			unset($this->request->data[$this->modelClass]['redirect_url']);
            unset($this->request->data[$this->modelClass]['more_action_id']);
            $selectedIds = array();
            foreach($this->request->data['Photo'] as $primary_key_id => $is_checked) {
                if ($is_checked['id']) {
                    $selectedIds[] = $primary_key_id;
                }
            }
            if ($actionid && !empty($selectedIds)) {
                if ($actionid == ConstMoreAction::Delete) {
                    $this->{$this->modelClass}->deleteAll(array(
                        $this->modelClass . '.id' => $selectedIds
                    ));
                    $this->Session->setFlash(__l('Selected photos has been deleted') , 'default', null, 'success');
                } elseif ($actionid == ConstMoreAction::Active) {
                    $this->{$this->modelClass}->updateAll(array(
                        $this->modelClass . '.is_active' => 1
                    ) , array(
                        $this->modelClass . '.id' => $selectedIds
                    ));
                    $this->Session->setFlash(__l('Selected ' . $this->modelClass . ' has been activated') , 'default', null, 'success');
                } elseif ($actionid == ConstMoreAction::Inactive) {
                    $this->{$this->modelClass}->updateAll(array(
                        $this->modelClass . '.is_active' => 0
                    ) , array(
                        $this->modelClass . '.id' => $selectedIds
                    ));
                    $this->Session->setFlash(__l('Selected ' . $this->modelClass . ' has been inactive') , 'default', null, 'success');
                }
            }
        }
        if (!$this->RequestHandler->isAjax()) {
            $this->redirect(Router::url('/', true) . $r);
        } else {
            $this->redirect($r);
        }
    }
	public function set_photo($id = null)
	{
		 $this->pageTitle = __l('Set as Primary Photo');
	     if (is_null($id)) {
				throw new NotFoundException(__l('Invalid request'));
		 }
		 $this->Photo->User->updateAll(array(
				'User.default_thumbnail_id' => $id,
			) , array(
				'User.id' => $this->Auth->user('id')
		 ));
 		 $this->Session->setFlash(__l('Photo has been added for as primary photo') , 'default', null, 'success');
		 $this->redirect(array(
			'controller' => 'photos',
			'action' => 'index'
		 ));
	}
}
?>