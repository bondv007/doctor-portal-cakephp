<?php
class SpecialtiesUsersController extends AppController {

	var $name = 'SpecialtiesUsers';

	function index() {
		$this->pageTitle = __l('Specialties Users');
		$this->SpecialtiesUser->recursive = 0;
		$this->set('specialtiesUsers', $this->paginate());
	}

	function view($id = null) {
		$this->pageTitle = __l('Specialties User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$specialtiesUser = $this->SpecialtiesUser->find('first', array(
			'conditions' => array(
				'SpecialtiesUser.id = ' => $id
			),
			'fields' => array(
				'SpecialtiesUser.id',
				'SpecialtiesUser.user_id',
				'SpecialtiesUser.specialty_id',
				'User.id',
				'User.created',
				'User.modified',
				'User.role_id',
				'User.username',
				'User.email',
				'User.password',
				'User.fb_user_id',
				'User.fb_access_token',
				'User.twitter_user_id',
				'User.twitter_access_key',
				'User.twitter_access_token',
				'User.user_openid_count',
				'User.user_login_count',
				'User.user_view_count',
				'User.photo_count',
				'User.photo_album_count',
				'User.photo_total_ratings',
				'User.photo_rating_count',
				'User.photo_favorite_count',
				'User.photo_upload_quota',
				'User.video_count',
				'User.video_view_count',
				'User.video_comment_count',
				'User.video_rating_count',
				'User.video_total_ratings',
				'User.video_favorite_count',
				'User.video_download_count',
				'User.video_flag_count',
				'User.video_upload_quota',
				'User.forum_count',
				'User.cookie_hash',
				'User.cookie_time_modified',
				'User.is_openid_register',
				'User.is_facebook_register',
				'User.is_twitter_register',
				'User.is_gmail_register',
				'User.is_yahoo_register',
				'User.is_agree_terms_conditions',
				'User.is_active',
				'User.is_email_confirmed',
				'User.signup_ip_id',
				'User.last_login_ip_id',
				'User.last_logged_in_time',
				'Specialty.id',
				'Specialty.created',
				'Specialty.modified',
				'Specialty.user_id',
				'Specialty.name',
				'Specialty.slug',
				'Specialty.speciality_disease_count',
				'Specialty.user_count',
				'Specialty.is_active',
			),
			'recursive' => 0,
		));
		if (empty($specialtiesUser)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $specialtiesUser['SpecialtiesUser']['id'];
		$this->set('specialtiesUser', $specialtiesUser);
	}

	function add() {
		$this->pageTitle = __l('Add Specialties User');
		if (!empty($this->request->data)) {
			$this->SpecialtiesUser->create();
			if ($this->SpecialtiesUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Specialties User has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Specialties User could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$users = $this->SpecialtiesUser->User->find('list');
		$specialties = $this->SpecialtiesUser->Specialty->find('list');
		$this->set(compact('users', 'specialties'));
	}

	function edit($id = null) {
		$this->pageTitle = __l('Edit Specialties User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->SpecialtiesUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Specialties User has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Specialties User could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->SpecialtiesUser->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['SpecialtiesUser']['id'];
		$users = $this->SpecialtiesUser->User->find('list');
		$specialties = $this->SpecialtiesUser->Specialty->find('list');
		$this->set(compact('users','specialties'));
	}

	function delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->SpecialtiesUser->delete($id)) {
			$this->Session->setFlash(__l('Specialties User deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}


	function admin_index() {
		$this->pageTitle = __l('Specialties Users');
		$this->SpecialtiesUser->recursive = 0;
		$this->set('specialtiesUsers', $this->paginate());
	}

	function admin_view($id = null) {
		$this->pageTitle = __l('Specialties User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$specialtiesUser = $this->SpecialtiesUser->find('first', array(
			'conditions' => array(
				'SpecialtiesUser.id = ' => $id
			),
			'fields' => array(
				'SpecialtiesUser.id',
				'SpecialtiesUser.user_id',
				'SpecialtiesUser.specialty_id',
				'User.id',
				'User.created',
				'User.modified',
				'User.role_id',
				'User.username',
				'User.email',
				'User.password',
				'User.fb_user_id',
				'User.fb_access_token',
				'User.twitter_user_id',
				'User.twitter_access_key',
				'User.twitter_access_token',
				'User.user_openid_count',
				'User.user_login_count',
				'User.user_view_count',
				'User.photo_count',
				'User.photo_album_count',
				'User.photo_total_ratings',
				'User.photo_rating_count',
				'User.photo_favorite_count',
				'User.photo_upload_quota',
				'User.video_count',
				'User.video_view_count',
				'User.video_comment_count',
				'User.video_rating_count',
				'User.video_total_ratings',
				'User.video_favorite_count',
				'User.video_download_count',
				'User.video_flag_count',
				'User.video_upload_quota',
				'User.forum_count',
				'User.cookie_hash',
				'User.cookie_time_modified',
				'User.is_openid_register',
				'User.is_facebook_register',
				'User.is_twitter_register',
				'User.is_gmail_register',
				'User.is_yahoo_register',
				'User.is_agree_terms_conditions',
				'User.is_active',
				'User.is_email_confirmed',
				'User.signup_ip_id',
				'User.last_login_ip_id',
				'User.last_logged_in_time',
				'Specialty.id',
				'Specialty.created',
				'Specialty.modified',
				'Specialty.user_id',
				'Specialty.name',
				'Specialty.slug',
				'Specialty.speciality_disease_count',
				'Specialty.user_count',
				'Specialty.is_active',
			),
			'recursive' => 0,
		));
		if (empty($specialtiesUser)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $specialtiesUser['SpecialtiesUser']['id'];
		$this->set('specialtiesUser', $specialtiesUser);
	}

	function admin_add() {
		$this->pageTitle = __l('Add Specialties User');
		if (!empty($this->request->data)) {
			$this->SpecialtiesUser->create();
			if ($this->SpecialtiesUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Specialties User has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Specialties User could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$users = $this->SpecialtiesUser->User->find('list');
		$specialties = $this->SpecialtiesUser->Specialty->find('list');
		$this->set(compact('users', 'specialties'));
	}

	function admin_edit($id = null) {
		$this->pageTitle = __l('Edit Specialties User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->SpecialtiesUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Specialties User has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Specialties User could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->SpecialtiesUser->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['SpecialtiesUser']['id'];
		$users = $this->SpecialtiesUser->User->find('list');
		$specialties = $this->SpecialtiesUser->Specialty->find('list');
		$this->set(compact('users','specialties'));
	}

	function admin_delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->SpecialtiesUser->delete($id)) {
			$this->Session->setFlash(__l('Specialties User deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
}
?>