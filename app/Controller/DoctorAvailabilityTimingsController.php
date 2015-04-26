<?php
class DoctorAvailabilityTimingsController extends AppController {

	public $name = 'DoctorAvailabilityTimings';
	
	public $helpers = array(
        'Calendar'
    );
	public function beforeFilter()
    {
        parent::beforeFilter();
    }
	public function edit($id = null)
	{
		$this->pageTitle = __l('Edit Doctor Availability');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if (empty($this->request->data['DoctorAvailability']['is_with_assistant'])) {
				unset($this->request->data['DoctorAvailability']['assistant_info']);
			}
			if ($this->DoctorAvailability->save($this->request->data)) {
					$this->Session->setFlash(__l('Doctor Availability has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Doctor Availability could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->DoctorAvailabilityTiming->read(null, $id);
			$settimings = explode(',',$this->request->data['DoctorAvailabilityTiming']['timings']);
			$this->set(compact('settimings'));
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$timeslots = $this->DoctorAvailabilityTiming->getTimeSlots();
		$this->set(compact('timeslots'));
	}
	public function delete($id = null)
	{
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->DoctorAvailabilityTiming->delete($id)) {
			$this->Session->setFlash(__l('Doctor Availability timings deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->redirect(array(
			'controller' => 'doctor_availabilities',
			'action' => 'setup_time'
		));
	}
	
}
