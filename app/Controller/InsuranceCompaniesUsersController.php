<?php
class InsuranceCompaniesUsersController extends AppController {

	var $name = 'InsuranceCompaniesUsers';

	function index() {
		$this->pageTitle = __l('Insurance Companies Users');
		$this->InsuranceCompaniesUser->recursive = 0;
		$this->set('insuranceCompaniesUsers', $this->paginate());
	}

	function view($id = null) {
		$this->pageTitle = __l('Insurance Companies User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$insuranceCompaniesUser = $this->InsuranceCompaniesUser->find('first', array(
			'conditions' => array(
				'InsuranceCompaniesUser.id = ' => $id
			),
			'fields' => array(
				'InsuranceCompaniesUser.id',
				'InsuranceCompaniesUser.insurance_company_id',
				'InsuranceCompaniesUser.user_id',
				'InsuranceCompany.id',
				'InsuranceCompany.created',
				'InsuranceCompany.modified',
				'InsuranceCompany.user_id',
				'InsuranceCompany.name',
				'InsuranceCompany.description',
				'InsuranceCompany.slug',
				'InsuranceCompany.user_count',
				'InsuranceCompany.insurance_plan_count',
				'InsuranceCompany.is_active',
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
		if (empty($insuranceCompaniesUser)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $insuranceCompaniesUser['InsuranceCompaniesUser']['id'];
		$this->set('insuranceCompaniesUser', $insuranceCompaniesUser);
	}

	function add() {
		$this->pageTitle = __l('Add Insurance Companies User');
		if (!empty($this->request->data)) {
			$this->InsuranceCompaniesUser->create();
			if ($this->InsuranceCompaniesUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Companies User has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Insurance Companies User could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$insuranceCompanies = $this->InsuranceCompaniesUser->InsuranceCompany->find('list');
		$users = $this->InsuranceCompaniesUser->User->find('list');
		$this->set(compact('insuranceCompanies', 'users'));
	}

	function edit($id = null) {
		$this->pageTitle = __l('Edit Insurance Companies User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->InsuranceCompaniesUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Companies User has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Insurance Companies User could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->InsuranceCompaniesUser->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['InsuranceCompaniesUser']['id'];
		$insuranceCompanies = $this->InsuranceCompaniesUser->InsuranceCompany->find('list');
		$users = $this->InsuranceCompaniesUser->User->find('list');
		$this->set(compact('insuranceCompanies','users'));
	}

	function delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->InsuranceCompaniesUser->delete($id)) {
			$this->Session->setFlash(__l('Insurance Companies User deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}


	function admin_index() {
		$this->pageTitle = __l('Insurance Companies Users');
		$this->InsuranceCompaniesUser->recursive = 0;
		$this->set('insuranceCompaniesUsers', $this->paginate());
	}

	function admin_view($id = null) {
		$this->pageTitle = __l('Insurance Companies User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$insuranceCompaniesUser = $this->InsuranceCompaniesUser->find('first', array(
			'conditions' => array(
				'InsuranceCompaniesUser.id = ' => $id
			),
			'fields' => array(
				'InsuranceCompaniesUser.id',
				'InsuranceCompaniesUser.insurance_company_id',
				'InsuranceCompaniesUser.user_id',
				'InsuranceCompany.id',
				'InsuranceCompany.created',
				'InsuranceCompany.modified',
				'InsuranceCompany.user_id',
				'InsuranceCompany.name',
				'InsuranceCompany.description',
				'InsuranceCompany.slug',
				'InsuranceCompany.user_count',
				'InsuranceCompany.insurance_plan_count',
				'InsuranceCompany.is_active',
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
		if (empty($insuranceCompaniesUser)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $insuranceCompaniesUser['InsuranceCompaniesUser']['id'];
		$this->set('insuranceCompaniesUser', $insuranceCompaniesUser);
	}

	function admin_add() {
		$this->pageTitle = __l('Add Insurance Companies User');
		if (!empty($this->request->data)) {
			$this->InsuranceCompaniesUser->create();
			if ($this->InsuranceCompaniesUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Companies User has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Insurance Companies User could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$insuranceCompanies = $this->InsuranceCompaniesUser->InsuranceCompany->find('list');
		$users = $this->InsuranceCompaniesUser->User->find('list');
		$this->set(compact('insuranceCompanies', 'users'));
	}

	function admin_edit($id = null) {
		$this->pageTitle = __l('Edit Insurance Companies User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->InsuranceCompaniesUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Companies User has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Insurance Companies User could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->InsuranceCompaniesUser->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['InsuranceCompaniesUser']['id'];
		$insuranceCompanies = $this->InsuranceCompaniesUser->InsuranceCompany->find('list');
		$users = $this->InsuranceCompaniesUser->User->find('list');
		$this->set(compact('insuranceCompanies','users'));
	}

	function admin_delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->InsuranceCompaniesUser->delete($id)) {
			$this->Session->setFlash(__l('Insurance Companies User deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>