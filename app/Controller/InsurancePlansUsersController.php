<?php
class InsurancePlansUsersController extends AppController {

	var $name = 'InsurancePlansUsers';

	function index() {
		$this->pageTitle = __l('Insurance Plans Users');
		$this->InsurancePlansUser->recursive = 0;
		$this->set('insurancePlansUsers', $this->paginate());
	}

	function view($id = null) {
		$this->pageTitle = __l('Insurance Plans User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$insurancePlansUser = $this->InsurancePlansUser->find('first', array(
			'conditions' => array(
				'InsurancePlansUser.id = ' => $id
			),
			'fields' => array(
				'InsurancePlansUser.id',
				'InsurancePlansUser.insurance_plan_id',
				'InsurancePlansUser.user_id',
				'InsurancePlan.id',
				'InsurancePlan.created',
				'InsurancePlan.modified',
				'InsurancePlan.name',
				'InsurancePlan.slug',
				'InsurancePlan.insurance_company_id',
				'InsurancePlan.user_count',
				'InsurancePlan.is_active',
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
		if (empty($insurancePlansUser)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $insurancePlansUser['InsurancePlansUser']['id'];
		$this->set('insurancePlansUser', $insurancePlansUser);
	}

	function add() {
		$this->pageTitle = __l('Add Insurance Plans User');
		if (!empty($this->request->data)) {
			$this->InsurancePlansUser->create();
			if ($this->InsurancePlansUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Plans User has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Insurance Plans User could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$insurancePlans = $this->InsurancePlansUser->InsurancePlan->find('list');
		$users = $this->InsurancePlansUser->User->find('list');
		$this->set(compact('insurancePlans', 'users'));
	}

	function edit($id = null) {
		$this->pageTitle = __l('Edit Insurance Plans User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->InsurancePlansUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Plans User has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Insurance Plans User could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->InsurancePlansUser->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['InsurancePlansUser']['id'];
		$insurancePlans = $this->InsurancePlansUser->InsurancePlan->find('list');
		$users = $this->InsurancePlansUser->User->find('list');
		$this->set(compact('insurancePlans','users'));
	}

	function delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->InsurancePlansUser->delete($id)) {
			$this->Session->setFlash(__l('Insurance Plans User deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}


	function admin_index() {
		$this->pageTitle = __l('Insurance Plans Users');
		$this->InsurancePlansUser->recursive = 0;
		$this->set('insurancePlansUsers', $this->paginate());
	}

	function admin_view($id = null) {
		$this->pageTitle = __l('Insurance Plans User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$insurancePlansUser = $this->InsurancePlansUser->find('first', array(
			'conditions' => array(
				'InsurancePlansUser.id = ' => $id
			),
			'fields' => array(
				'InsurancePlansUser.id',
				'InsurancePlansUser.insurance_plan_id',
				'InsurancePlansUser.user_id',
				'InsurancePlan.id',
				'InsurancePlan.created',
				'InsurancePlan.modified',
				'InsurancePlan.name',
				'InsurancePlan.slug',
				'InsurancePlan.insurance_company_id',
				'InsurancePlan.user_count',
				'InsurancePlan.is_active',
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
		if (empty($insurancePlansUser)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $insurancePlansUser['InsurancePlansUser']['id'];
		$this->set('insurancePlansUser', $insurancePlansUser);
	}

	function admin_add() {
		$this->pageTitle = __l('Add Insurance Plans User');
		if (!empty($this->request->data)) {
			$this->InsurancePlansUser->create();
			if ($this->InsurancePlansUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Plans User has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Insurance Plans User could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$insurancePlans = $this->InsurancePlansUser->InsurancePlan->find('list');
		$users = $this->InsurancePlansUser->User->find('list');
		$this->set(compact('insurancePlans', 'users'));
	}

	function admin_edit($id = null) {
		$this->pageTitle = __l('Edit Insurance Plans User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->InsurancePlansUser->save($this->request->data)) {
				$this->Session->setFlash(__l('Insurance Plans User has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Insurance Plans User could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->InsurancePlansUser->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['InsurancePlansUser']['id'];
		$insurancePlans = $this->InsurancePlansUser->InsurancePlan->find('list');
		$users = $this->InsurancePlansUser->User->find('list');
		$this->set(compact('insurancePlans','users'));
	}

	function admin_delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->InsurancePlansUser->delete($id)) {
			$this->Session->setFlash(__l('Insurance Plans User deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>