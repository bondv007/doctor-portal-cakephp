<?php
class UserRatingsController extends AppController {

	var $name = 'UserRatings';

	function index() {
		$this->pageTitle = __l('User Ratings');
		$this->UserRating->recursive = 0;
		$this->set('userRatings', $this->paginate());
	}

	function view($id = null) {
		$this->pageTitle = __l('User Rating');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$userRating = $this->UserRating->find('first', array(
			'conditions' => array(
				'UserRating.id = ' => $id
			),
			'fields' => array(
				'UserRating.id',
				'UserRating.created',
				'UserRating.modified',
				'UserRating.user_review_id',
				'UserRating.user_rating_category_id',
				'UserRating.rating',
				'UserRating.ip_id',
				'UserReview.id',
				'UserReview.created',
				'UserReview.modified',
				'UserReview.user_id',
				'UserReview.review',
				'UserReview.user_rating_count',
				'UserReview.bedside_avg_rating',
				'UserReview.timing_avg_rating',
				'UserReview.overall_avg_rating',
				'UserReview.ip_id',
				'UserReview.is_active',
				'UserRatingCategory.id',
				'UserRatingCategory.created',
				'UserRatingCategory.modified',
				'UserRatingCategory.name',
				'UserRatingCategory.user_rating_count',
				'UserRatingCategory.is_active',
				'Ip.id',
				'Ip.created',
				'Ip.modified',
				'Ip.ip',
				'Ip.city_id',
				'Ip.state_id',
				'Ip.country_id',
				'Ip.timezone_id',
				'Ip.latitude',
				'Ip.longitude',
			),
			'recursive' => 0,
		));
		if (empty($userRating)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $userRating['UserRating']['id'];
		$this->set('userRating', $userRating);
	}

	function add() {
		$this->pageTitle = __l('Add User Rating');
		if (!empty($this->request->data)) {
			$this->UserRating->create();
			if ($this->UserRating->save($this->request->data)) {
				$this->Session->setFlash(__l('User Rating has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('User Rating could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$userReviews = $this->UserRating->UserReview->find('list');
		$userRatingCategories = $this->UserRating->UserRatingCategory->find('list');
		$ips = $this->UserRating->Ip->find('list');
		$this->set(compact('userReviews', 'userRatingCategories', 'ips'));
	}

	function edit($id = null) {
		$this->pageTitle = __l('Edit User Rating');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->UserRating->save($this->request->data)) {
				$this->Session->setFlash(__l('User Rating has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('User Rating could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->UserRating->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['UserRating']['id'];
		$userReviews = $this->UserRating->UserReview->find('list');
		$userRatingCategories = $this->UserRating->UserRatingCategory->find('list');
		$ips = $this->UserRating->Ip->find('list');
		$this->set(compact('userReviews','userRatingCategories','ips'));
	}

	function delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->UserRating->delete($id)) {
			$this->Session->setFlash(__l('User Rating deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}


	function admin_index() {
		$this->pageTitle = __l('User Ratings');
		$this->UserRating->recursive = 0;
		$this->set('userRatings', $this->paginate());
	}

	function admin_view($id = null) {
		$this->pageTitle = __l('User Rating');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$userRating = $this->UserRating->find('first', array(
			'conditions' => array(
				'UserRating.id = ' => $id
			),
			'fields' => array(
				'UserRating.id',
				'UserRating.created',
				'UserRating.modified',
				'UserRating.user_review_id',
				'UserRating.user_rating_category_id',
				'UserRating.rating',
				'UserRating.ip_id',
				'UserReview.id',
				'UserReview.created',
				'UserReview.modified',
				'UserReview.user_id',
				'UserReview.review',
				'UserReview.user_rating_count',
				'UserReview.bedside_avg_rating',
				'UserReview.timing_avg_rating',
				'UserReview.overall_avg_rating',
				'UserReview.ip_id',
				'UserReview.is_active',
				'UserRatingCategory.id',
				'UserRatingCategory.created',
				'UserRatingCategory.modified',
				'UserRatingCategory.name',
				'UserRatingCategory.user_rating_count',
				'UserRatingCategory.is_active',
				'Ip.id',
				'Ip.created',
				'Ip.modified',
				'Ip.ip',
				'Ip.city_id',
				'Ip.state_id',
				'Ip.country_id',
				'Ip.timezone_id',
				'Ip.latitude',
				'Ip.longitude',
			),
			'recursive' => 0,
		));
		if (empty($userRating)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $userRating['UserRating']['id'];
		$this->set('userRating', $userRating);
	}

	function admin_add() {
		$this->pageTitle = __l('Add User Rating');
		if (!empty($this->request->data)) {
			$this->UserRating->create();
			if ($this->UserRating->save($this->request->data)) {
				$this->Session->setFlash(__l('User Rating has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('User Rating could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$userReviews = $this->UserRating->UserReview->find('list');
		$userRatingCategories = $this->UserRating->UserRatingCategory->find('list');
		$ips = $this->UserRating->Ip->find('list');
		$this->set(compact('userReviews', 'userRatingCategories', 'ips'));
	}

	function admin_edit($id = null) {
		$this->pageTitle = __l('Edit User Rating');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->UserRating->save($this->request->data)) {
				$this->Session->setFlash(__l('User Rating has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('User Rating could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->UserRating->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['UserRating']['id'];
		$userReviews = $this->UserRating->UserReview->find('list');
		$userRatingCategories = $this->UserRating->UserRatingCategory->find('list');
		$ips = $this->UserRating->Ip->find('list');
		$this->set(compact('userReviews','userRatingCategories','ips'));
	}

	function admin_delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->UserRating->delete($id)) {
			$this->Session->setFlash(__l('User Rating deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}			public function add_ratings() {							}

}
?>