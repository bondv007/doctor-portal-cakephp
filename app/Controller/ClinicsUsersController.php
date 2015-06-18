<?php
class ClinicsUsersController extends AppController {

	var $name = 'ClinicsUsers';

	function index() {
		$this->pageTitle = __l('Clinics Users');
		$this->ClinicsUser->recursive = 0;
		$this->set('clinicsUsers', $this->paginate());
	}

	function view($id = null) {
		$this->pageTitle = __l('Clinics User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$clinicsUser = $this->ClinicsUser->find('first', array(
			'conditions' => array(
				'ClinicsUser.id = ' => $id
			),
			'fields' => array(
				'ClinicsUser.id',
				'ClinicsUser.clinic_id',
				'ClinicsUser.user_id',
				'Clinic.id',
				'Clinic.created',
				'Clinic.modified',
				'Clinic.name',
				'Clinic.user_id',
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
				'Clinic.user_count',
				'Clinic.is_active',
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
			),
			'recursive' => 0,
		));
		if (empty($clinicsUser)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $clinicsUser['ClinicsUser']['id'];
		$this->set('clinicsUser', $clinicsUser);
	}

	function add() {
		$this->pageTitle = __l('Add Clinics User');
		if (!empty($this->request->data)) {
			$this->ClinicsUser->create();
			if ($this->ClinicsUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Clinics User has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Clinics User could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$clinics = $this->ClinicsUser->Clinic->find('list');
		$users = $this->ClinicsUser->User->find('list');
		$this->set(compact('clinics', 'users'));
	}

	function edit($id = null) {
		$this->pageTitle = __l('Edit Clinics User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->ClinicsUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Clinics User has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Clinics User could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->ClinicsUser->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['ClinicsUser']['id'];
		$clinics = $this->ClinicsUser->Clinic->find('list');
		$users = $this->ClinicsUser->User->find('list');
		$this->set(compact('clinics','users'));
	}

	function delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->ClinicsUser->delete($id)) {
			$this->Session->setFlash(__l('Clinics User deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}


	function admin_index() {
		$this->pageTitle = __l('Clinics Users');
		$this->ClinicsUser->recursive = 0;
		$this->set('clinicsUsers', $this->paginate());
	}

	function admin_view($id = null) {
		$this->pageTitle = __l('Clinics User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$clinicsUser = $this->ClinicsUser->find('first', array(
			'conditions' => array(
				'ClinicsUser.id = ' => $id
			),
			'fields' => array(
				'ClinicsUser.id',
				'ClinicsUser.clinic_id',
				'ClinicsUser.user_id',
				'Clinic.id',
				'Clinic.created',
				'Clinic.modified',
				'Clinic.name',
				'Clinic.user_id',
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
				'Clinic.user_count',
				'Clinic.is_active',
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
			),
			'recursive' => 0,
		));
		if (empty($clinicsUser)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $clinicsUser['ClinicsUser']['id'];
		$this->set('clinicsUser', $clinicsUser);
	}

	function admin_add() {
		$this->pageTitle = __l('Add Clinics User');
		if (!empty($this->request->data)) {
			$this->ClinicsUser->create();
			if ($this->ClinicsUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Clinics User has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Clinics User could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$clinics = $this->ClinicsUser->Clinic->find('list');
		$users = $this->ClinicsUser->User->find('list');
		$this->set(compact('clinics', 'users'));
	}

	function admin_edit($id = null) {
		$this->pageTitle = __l('Edit Clinics User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->ClinicsUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Clinics User has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Clinics User could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->ClinicsUser->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['ClinicsUser']['id'];
		$clinics = $this->ClinicsUser->Clinic->find('list');
		$users = $this->ClinicsUser->User->find('list');
		$this->set(compact('clinics','users'));
	}

	function admin_delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->ClinicsUser->delete($id)) {
			$this->Session->setFlash(__l('Clinics User deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>