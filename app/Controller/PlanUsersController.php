<?php
class PlanUsersController extends AppController {

	public $name = 'PlanUsers';

	public function index()
	{
		$this->pageTitle = __l('Plan Users');
		$this->PlanUser->recursive = 0;
		$this->set('planUsers', $this->paginate());
	}
	public function admin_index()
	{
		$this->pageTitle = __l('Plan Users');
		$this->_redirectGET2Named(array(
            'q'
        ));
		$conditions = array();
		$this->paginate = array(
                'contain' => array(
					'Plan' => array(
						'fields' => array(
							'Plan.name',								
						) 
					) ,
					'User' => array(
						'fields' => array(
							'User.username',								
						) 
					) ,
                ) ,
                'order' => array(
                    'PlanUser.id' => 'desc'
                ) ,
                'recursive' => 1,
         ); 
		$this->set('planUsers', $this->paginate());
		$moreActions = $this->PlanUser->moreActions;
		$this->set(compact('moreActions'));
	}
	public function admin_view($id = null)
	{
		$this->pageTitle = __l('Plan User');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$planUser = $this->PlanUser->find('first', array(
			'conditions' => array(
				'PlanUser.id = ' => $id
			),
			'fields' => array(
				'PlanUser.id',
				'PlanUser.created',
				'PlanUser.modified',
				'PlanUser.user_id',
				'PlanUser.plan_id',
				'PlanUser.expiry_date',
				'PlanUser.duration',
				'PlanUser.status',
			),
			'recursive' => 0,
		));
		if (empty($planUser)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $planUser['PlanUser']['id'];
		$this->set('planUser', $planUser);
	}
	public function admin_delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->PlanUser->delete($id)) {
			$this->Session->setFlash(__l('Plan User deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}

}
?>