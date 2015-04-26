<?php
class PlansController extends AppController {

	public $name = 'Plans';

	public function index()
	{
		$this->pageTitle = __l('Upgrade Your Plan');
		$plans = $this->Plan->find('all', array(
            'conditions' => array(
                'Plan.is_active =' => 1
            ) ,
            'recursive' => - 1
        ));
		$current_plan = $this->Plan->PlanUser->find('first', array(
            'conditions' => array(
                'PlanUser.user_id =' => $this->Auth->user('id')
            ) ,
			'contain' => array(
				'Plan'
			),
            'recursive' =>  1
        ));
		$this->set(compact('plans', 'current_plan'));
	}

	function view($slug = null) {
		$this->pageTitle = __l('Plan');
		if (is_null($slug)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$plan = $this->Plan->find('first', array(
			'conditions' => array(
				'Plan.slug = ' => $slug
			),
			'fields' => array(
				'Plan.id',
				'Plan.created',
				'Plan.modified',
				'Plan.name',
				'Plan.slug',
				'Plan.plan_user_count',
				'Plan.amount',
				'Plan.duration',
				'Plan.is_active',
			),
			'recursive' => -1,
		));
		if (empty($plan)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $plan['Plan']['name'];
		$this->set('plan', $plan);
	}

	function add() {
		$this->pageTitle = __l('Add Plan');
		if (!empty($this->request->data)) {
			$this->Plan->create();
			if ($this->Plan->save($this->request->data)) {
				$this->Session->setFlash(__l('Plan has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Plan could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
	}

	function edit($id = null) {
		$this->pageTitle = __l('Edit Plan');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->Plan->save($this->request->data)) {
				$this->Session->setFlash(__l('Plan has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Plan could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->Plan->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['Plan']['name'];
	}

	function delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->Plan->del($id)) {
			$this->Session->setFlash(__l('Plan deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	public function admin_index()
	{
		$this->_redirectGET2Named(array(
            'filter_id'
        ));
		$this->pageTitle = __l('Plans');
		$conditions = array();
        if (isset($this->request->params['named']['filter_id'])) {
            $this->request->data[$this->modelClass]['filter_id'] = $this->request->params['named']['filter_id'];
        }
        if (!empty($this->request->data[$this->modelClass]['filter_id'])) {
            if ($this->request->data[$this->modelClass]['filter_id'] == ConstMoreAction::Active) {
                $conditions[$this->modelClass . '.is_active'] = 1;
                $this->pageTitle.= __l(' - Approved');
            } else if ($this->request->data[$this->modelClass]['filter_id'] == ConstMoreAction::Inactive) {
                $conditions[$this->modelClass . '.is_active'] = 0;
                $this->pageTitle.= __l(' - Unapproved');
            }
            $this->request->params['named']['filter_id'] = $this->request->data[$this->modelClass]['filter_id'];
        }
		$this->paginate = array(
            'conditions' => $conditions,
            'order' => array(
                'Plan.id' => 'asc'
            ) ,
            'recursive' => 1
        );
		$this->set('plans', $this->paginate());
		$filters = $this->Plan->isFilterOptions;
        $moreActions = $this->Plan->moreActions;
        $this->set(compact('moreActions', 'filters'));
        $this->set('pending', $this->Plan->find('count', array(
            'conditions' => array(
                'Plan.is_active' => 0
            )
        )));
        $this->set('approved', $this->Plan->find('count', array(
            'conditions' => array(
                'Plan.is_active' => 1
            )
        )));
	}

	function admin_view($slug = null) {
		$this->pageTitle = __l('Plan');
		if (is_null($slug)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$plan = $this->Plan->find('first', array(
			'conditions' => array(
				'Plan.slug = ' => $slug
			),
			'fields' => array(
				'Plan.id',
				'Plan.created',
				'Plan.modified',
				'Plan.name',
				'Plan.slug',
				'Plan.plan_user_count',
				'Plan.amount',
				'Plan.duration',
				'Plan.is_active',
			),
			'recursive' => -1,
		));
		if (empty($plan)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $plan['Plan']['name'];
		$this->set('plan', $plan);
	}

	function admin_add() {
		$this->pageTitle = __l('Add Plan');
		if (!empty($this->request->data)) {
			$this->Plan->create();
			if ($this->Plan->save($this->request->data)) {
				$this->Session->setFlash(__l('Plan has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Plan could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
	}

	function admin_edit($id = null) {
		$this->pageTitle = __l('Edit Plan');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->Plan->save($this->request->data)) {
				$this->Session->setFlash(__l('Plan has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Plan could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->Plan->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['Plan']['name'];
	}

	function admin_delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->Plan->del($id)) {
			$this->Session->setFlash(__l('Plan deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	function update_plans()
    {
       if (!empty($this->request->data)) {
            if (!empty($this->request->data['Plan']['id'])) {
                $user_id = $this->Auth->user('id');
				$plan_id = $this->request->data['Plan']['id'];
                $this->redirect(array(
                                 'controller' => 'payments',
                                 'action' => 'upgrade_plan_pay_now',
                                $user_id,
								$plan_id 
                ));
	        }
		 }	
	 }
}
?>