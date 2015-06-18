<?php
class DoctorAvailabilitiesController extends AppController {

	public $name = 'DoctorAvailabilities';
	
	public $helpers = array(
        'Calendar','Js'
    );
	public function beforeFilter()
    {
        $this->Security->disabledFields = array(
            'DoctorAvailability.user_id',
            'User.username',
        );
        parent::beforeFilter();
    }
	public function index($year = null, $month = null, $day = null, $user_id = null, $clinic_id = null)
	{
		
		$this->pageTitle = __l('Doctor Availabilities');
		// calendar page appointment list
        if (!empty($this->request->params['named']['type']) && ($this->request->params['named']['type'] == 'calendar' || $this->request->params['named']['type'] == 'doctor-profile')) {
            $this->pageTitle = __l('Appointment');
            $year = $month = null;
            $data = array();
            if (!empty($this->request->params['pass']['0'])) {
                $year = $this->request->params['pass']['0'];
            }
            if (!empty($this->request->params['pass']['1'])) {
                $month = $this->request->params['pass']['1'];
            }
			if ($this->request->params['named']['show'] == 'monthly') {
				if (!empty($this->request->params['pass']['0'])) {
                	$year = $this->request->params['pass']['0'];
       		    }
            	if (!empty($this->request->params['pass']['1'])) {
                	$month = $this->request->params['pass']['1'];
	            }		
			} else {
				if ($year == '' || $month == '' || $day == '') {
					$year = date('Y');
					$monthInNumber = $month = date('m');
					$day = date('d');
				}
			}
            $flag = 0;
           $month_list = array(
                'january',
                'february',
                'march',
                'april',
                'may',
                'june',
                'july',
                'august',
                'september',
                'october',
                'november',
                'december'
            );
			 
            for ($i = 0; $i < 12; $i++) {
                if (strtolower($month) == $month_list[$i]) {
                    if (intval($year) != 0) {
                        $flag = 1;
                        $monthInNumber = $i+1;
                        break;
                    }
                }
            }
            if ($flag == 0) {
                $year = date('Y');
                $month = date('F');
                $monthInNumber = date('m');
                $day = date('d');
            }
            $this->set('year', $year);
            $this->set('month', $month);
            $this->set('day', $day);
			if(!empty($this->request->params['named']['user_id'])) {
				$this->set('user_id', $this->request->params['named']['user_id']);
				$user_id = $this->request->params['named']['user_id'];
			} else {
				$user_id = $this->Auth->user('id');
			}
			if(!empty($this->request->params['named']['clinic_id'])) {
				$this->set('clinic_id', $this->request->params['named']['clinic_id']);
				$clinic_id = $this->request->params['named']['clinic_id'];
			}
            $current_day = date('N', strtotime(date($monthInNumber . '/' . $day . '/' . $year))) -1;
            if (!empty($this->request->params['named']['show']) && $this->request->params['named']['show'] == 'weekly') {
                $current_week = date('Y-m-d', strtotime(date($monthInNumber . '/' . $day . '/' . $year) . '-' . $current_day . ' days'));
                $week_arr = explode('-', $current_week);
                $end_week = date('Y-m-d', strtotime(date($week_arr[1] . '/' . $week_arr[2] . '/' . $week_arr[0]) . '+6 days'));
            } elseif (!empty($this->request->params['named']['show']) && $this->request->params['named']['show'] == 'daily') {
                $current_day = date('Y-m-d',strtotime($year . '-' . $monthInNumber . '-' . $day));
            } else {
                $current_week = date('Y-m-d', strtotime(date($monthInNumber . '/' . $day . '/' . $year) . '-' . $current_day . ' days'));
                $week_arr = explode('-', $current_week);
                $end_week = date('Y-m-d', strtotime(date($week_arr[1] . '/' . $week_arr[2] . '/' . $week_arr[0]) . '+27 days'));
            }
            $doctorAvailability = $this->DoctorAvailability->find('first', array(
				'conditions' => array(
					'DoctorAvailability.user_id = ' => $user_id
				),
				'recursive' => 0,
			));	
			$conditions['DoctorAvailabilityTiming.doctor_availability_id'] = $doctorAvailability['DoctorAvailability']['id'];
			if(!empty($clinic_id))
			{	
			$conditions['DoctorAvailabilityTiming.clinic_id'] = $clinic_id;
			}
			$appointments = $this->DoctorAvailability->DoctorAvailabilityTiming->find('all', array(
                'conditions' => $conditions,
                'contain' => array(
					'Appointment' => array(
						'AppointmentStatus' => array(
							'fields' => array(
								'AppointmentStatus.id',
								'AppointmentStatus.name'
							)	
						),
					'fields' => array(
						'Appointment.id',
						'Appointment.user_id',
						'Appointment.doctor_user_id',
						'Appointment.appointment_date',
						'Appointment.appointment_time',
						'Appointment.first_name',
						'Appointment.last_name',
						'Appointment.is_guest_appointment',
						'Appointment.guest_first_name',
						'Appointment.guest_last_name',
						'Appointment.appointment_status_id',
						'Appointment.doctor_availability_timing_id'
					)
				   ),
				),	
				'fields' => array(
                    'DoctorAvailabilityTiming.id',
                    'DoctorAvailabilityTiming.availability_date',
                    'DoctorAvailabilityTiming.timings',
					'DoctorAvailabilityTiming.clinic_id',
                ) ,
                'recursive' => 2
       		));  
  		 	$data = array();
			$this->set('data', $appointments);
			$this->set('clinic_id', $clinic_id);
			if($this->request->params['named']['type'] == 'doctor-profile') {
				$this->set('type', $this->request->params['named']['type']);
				$this->render('doctor_calender');
			} else {
				$this->render('calendar');
			}	
        } else {
						$this->set('clinic_id', $clinic_id);

			$this->pageTitle = __l('Appointments');
			$conditions['DoctorAvailability.user_id'] = $this->Auth->user('id');
			if (isset($this->request->data['DoctorAvailability']['from_date']) and isset($this->request->data['DoctorAvailability']['to_date'])) {
				$from_date = $this->request->data['DoctorAvailability']['from_date']['year'] . '-' . $this->request->data['DoctorAvailability']['from_date']['month'] . '-' . $this->request->data['DoctorAvailability']['from_date']['day'] . ' 00:00:00';
				$to_date = $this->request->data['DoctorAvailability']['to_date']['year'] . '-' . $this->request->data['DoctorAvailability']['to_date']['month'] . '-' . $this->request->data['DoctorAvailability']['to_date']['day'] . ' 23:59:59';
 	       }
		   if (!empty($this->request->data)) {
				if ($from_date < $to_date) {
					$conditions['DoctorAvailability.created >='] = $from_date;
					$conditions['DoctorAvailability.created <='] = $to_date;
				} else {
					$this->Session->setFlash(__l('From date should greater than To date. Please, try again.') , 'default', null, 'error');
				}
           }
		  
		   if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'day') {
				$conditions['TO_DAYS(NOW()) - TO_DAYS(DoctorAvailability.created) <= '] = 0;
				$this->request->data['DoctorAvailability']['from_date'] = array(
					'year' => date('Y', strtotime('today')) ,
					'month' => date('m', strtotime('today')) ,
					'day' => date('d', strtotime('today'))
				);
				$this->request->data['DoctorAvailability']['to_date'] = array(
					'year' => date('Y', strtotime('today')) ,
					'month' => date('m', strtotime('today')) ,
					'day' => date('d', strtotime('today'))
				);
		  }
          if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'week') {
				$conditions['TO_DAYS(NOW()) - TO_DAYS(DoctorAvailability.created) <= '] = 7;
				$this->request->data['DoctorAvailability']['from_date'] = array(
					'year' => date('Y', strtotime('last week')) ,
					'month' => date('m', strtotime('last week')) ,
					'day' => date('d', strtotime('last week'))
				);
				$this->request->data['DoctorAvailability']['to_date'] = array(
					'year' => date('Y', strtotime('this week')) ,
					'month' => date('m', strtotime('this week')) ,
					'day' => date('d', strtotime('this week'))
				);
          }
          if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'month') {
				$conditions['TO_DAYS(NOW()) - TO_DAYS(DoctorAvailability.created) <= '] = 30;
				$this->request->data['DoctorAvailability']['from_date'] = array(
					'year' => date('Y', (strtotime('last month', strtotime(date('m/01/y'))))) ,
					'month' => date('m', (strtotime('last month', strtotime(date('m/01/y'))))) ,
					'day' => date('d', (strtotime('last month', strtotime(date('m/01/y')))))
				);
				$this->request->data['DoctorAvailability']['to_date'] = array(
					'year' => date('Y', (strtotime('this month', strtotime(date('m/01/y'))))) ,
					'month' => date('m', (strtotime('this month', strtotime(date('m/01/y'))))) ,
					'day' => date('d', (strtotime('this month', strtotime(date('m/01/y')))))
				);
	      }
          $this->paginate = array(
				'conditions' => $conditions,
				'contain' => array(
					'User'
				) ,
				'order' => array(
					'DoctorAvailability.id' => 'desc'
				) ,
				'recursive' => 2
         );
         $doctorAvailabilities = $this->paginate();
         $this->set('doctorAvailabilities', $doctorAvailabilities); 
		  $from = $this->DoctorAvailability->find('first', array(
            'conditions' => $conditions,
            'fields' => array(
                'DoctorAvailability.created'
            ) ,
            'limit' => 1,
            'recursive' => -1
        ));
        $to = $this->DoctorAvailability->find('first', array(
            'conditions' => $conditions,
            'fields' => array(
                'DoctorAvailability.created'
            ) ,
            'limit' => 1,
            'order' => array(
                'DoctorAvailability.id desc'
            ) ,
            'recursive' => -1
        ));
        $this->set('duration_from', $from['DoctorAvailability']['created']);
        $this->set('duration_to', $to['DoctorAvailability']['created']);
		 $filter = array(
            'all' => __l('All') ,
            'day' => __l('Today') ,
            'week' => __l('This Week') ,
            'month' => __l('This Month') ,
            'custom' => __l('Custom') ,
         );
		 if ($this->RequestHandler->isAjax()) {
            $this->set('isAjax', true);
        } else {
            $this->set('isAjax', false);
        }
		 $this->set('filter', $filter);
		}//end if
	}
	public function timeslot($year = null, $month = null, $day = null, $user_id = null, $clinic_id = null)
	{
		$this->pageTitle = __l('Timeslot');
		if(!empty($this->request->params['named']['clinic_id'])) {
				$this->set('clinic_id', $this->request->params['named']['clinic_id']);
				$clinic_id = $this->request->params['named']['clinic_id'];
			}
		// calendar page appointment list
        if ((!empty($this->request->params['named']['type']) && $this->request->params['named']['type'] == 'timeslot') || !empty($this->request->data))
		{
			$year = $month = null;
			$data = array();
			if(!empty($this->request->data)) {
				$year = $this->request->data['DoctorAvailability']['years'];
				$month = $this->request->data['DoctorAvailability']['months'];
				$select_month = $month;
				$select_year = $year;
				$this->request->params['named']['show'] = 'monthly';
			} else {
				if (!empty($this->request->params['pass']['0'])) {
					$year = $this->request->params['pass']['0'];
				}
				if (!empty($this->request->params['pass']['1'])) {
					$month = $this->request->params['pass']['1'];
				}
				if ($year == '' || $month == '' || $day == '') {
					$year = date('Y');
					$monthInNumber = $month = date('m');
				}
				$select_month = date('m');
				$select_year = date('Y');
			}
			$day = date('d');
            $flag = 0;
            $month_list = array(
                'january',
                'february',
                'march',
                'april',
                'may',
                'june',
                'july',
                'august',
                'september',
                'october',
                'november',
                'december'
            );
			$month = date("F", mktime(0, 0, 0, $month, 10));
            for ($i = 0; $i < 12; $i++) {
                if (strtolower($month) == $month_list[$i]) {
                    if (intval($year) != 0) {
                        $flag = 1;
                        $monthInNumber = $i+1;
                        break;
                    }
                }
            }
            if ($flag == 0) {
                $year = date('Y');
                $month = date('F');
                $monthInNumber = date('m');
                $day = date('d');
            }
            $this->set('year', $year);
            $this->set('month', $month);
            $this->set('day', $day);
            $current_day = date('N', strtotime(date($monthInNumber . '/' . $day . '/' . $year))) -1;
            if (!empty($this->request->params['named']['show']) && $this->request->params['named']['show'] == 'weekly') {
                $current_week = date('Y-m-d', strtotime(date($monthInNumber . '/' . $day . '/' . $year) . '-' . $current_day . ' days'));
                $week_arr = explode('-', $current_week);
                $end_week = date('Y-m-d', strtotime(date($week_arr[1] . '/' . $week_arr[2] . '/' . $week_arr[0]) . '+6 days'));
            } elseif (!empty($this->request->params['named']['show']) && $this->request->params['named']['show'] == 'daily') {
                $current_day = date('Y-m-d',strtotime($year . '-' . $monthInNumber . '-' . $day));
            } else {
                $current_week = date('Y-m-d', strtotime(date($monthInNumber . '/' . $day . '/' . $year) . '-' . $current_day . ' days'));
                $week_arr = explode('-', $current_week);
                $end_week = date('Y-m-d', strtotime(date($week_arr[1] . '/' . $week_arr[2] . '/' . $week_arr[0]) . '+27 days'));
            }
		    if(!empty($this->request->params['named']['username'])) {
				$user = $this->DoctorAvailability->User->find('first', array(
					'conditions' => array(
						'User.username = ' => $this->request->params['named']['username']
					),
					'fields' => array(
						'User.id' 
					),
					'recursive' => 0,
				));
				$user_id = $user['User']['id'];	
			} else {
				$user_id = $this->Auth->user('id');
			}
			$this->set('user_id', $user_id);
			$doctorAvailability = $this->DoctorAvailability->find('first', array(
				'conditions' => array(
					'DoctorAvailability.user_id = ' => $user_id
				),
				'recursive' => 0,
			));	
   	        $conditions['DoctorAvailabilityTiming.doctor_availability_id'] = $doctorAvailability['DoctorAvailability']['id'];
			if(!empty($clinic_id))
			{	
			$conditions['DoctorAvailabilityTiming.clinic_id'] = $clinic_id;
			}
    	    $appointments = array();
            $appointments = $this->DoctorAvailability->DoctorAvailabilityTiming->find('all', array(
                'conditions' => $conditions,
                'contain' => array(
					'Appointment' => array(
						'AppointmentStatus' => array(
							'fields' => array(
								'AppointmentStatus.id',
								'AppointmentStatus.name'
							)	
						),
					'fields' => array(
						'Appointment.id',
						'Appointment.user_id',
						'Appointment.doctor_user_id',
						'Appointment.appointment_date',
						'Appointment.appointment_time',
						'Appointment.first_name',
						'Appointment.last_name',
						'Appointment.is_guest_appointment',
						'Appointment.guest_first_name',
						'Appointment.guest_last_name',
						'Appointment.appointment_status_id',
						'Appointment.doctor_availability_timing_id'
					)
				   ),
				),	
				'fields' => array(
                    'DoctorAvailabilityTiming.id',
                    'DoctorAvailabilityTiming.availability_date',
                    'DoctorAvailabilityTiming.timings',
					'DoctorAvailabilityTiming.clinic_id',
                ) ,
                'recursive' => 2
       		)); 
			if ($this->RequestHandler->prefers('json')) {
				$this->view = 'Json';
				$this->set('json', $data);
			} else {
				$this->set('data', $appointments);
			}


		

       }
	App::import('Model', 'ClinicsUser');
		$ClinicsUser = new ClinicsUser;
		$clinicUsers = $ClinicsUser->find('all', array(
			'conditions' => array(
				'ClinicsUser.user_id' => $user_id,
			) ,
			'recursive' => -1
        ));
		$user_clinic_ids = array();
		foreach($clinicUsers as $clinicUser) {
			$user_clinic_ids[] = $clinicUser['ClinicsUser']['clinic_id'];
		}
		$conditions=array();
		$conditions['Clinic.id'] = $user_clinic_ids;
		$conditions['Clinic.is_active'] = 1;
		App::import('Model', 'Clinic');
		$Clinic = new Clinic;
		$clinics = $Clinic->find('all', array(
	            'conditions' =>$conditions,
				'fields' => array(
					'Clinic.name',
					'Clinic.id'
				),
				'order' => array(
					'Clinic.id' => 'asc'
				),
				'recursive' => -1
        ));
		$months = $this->DoctorAvailability->monthLists;
		$years = $this->DoctorAvailability->yearLists;
		$this->set('select_month', $select_month);
        $this->set('select_year', $select_year);
		$this->set(compact('months', 'years','doctorAvailability','clinics'));
		$this->DoctorAvailability->recursive = 0;
		$this->set('doctorAvailabilities', $this->paginate());
	}
	public function doctor_calender($type = null, $user_id = null, $clinic_id=null)
	{
		$day = '';
		if(!empty($user_id)) {
			$doctorAvailability = $this->DoctorAvailability->find('first', array(
					'conditions' => array(
						'DoctorAvailability.user_id = ' => $user_id
					),
					'recursive' => 0,
			));	
			$conditions['DoctorAvailabilityTiming.doctor_availability_id'] = $doctorAvailability['DoctorAvailability']['id'];
			if(!empty($clinic_id))
			{	
			$conditions['DoctorAvailabilityTiming.clinic_id'] = $clinic_id;
			}
			$appointment_timings = array();
			$appointment_timings = $this->DoctorAvailability->DoctorAvailabilityTiming->find('all', array(
				'conditions' => $conditions,
                'contain' => array(
					'Appointment' => array(
						'AppointmentStatus' => array(
							'fields' => array(
								'AppointmentStatus.id',
								'AppointmentStatus.name'
							)	
						),
					'fields' => array(
						'Appointment.id',
						'Appointment.user_id',
						'Appointment.doctor_user_id',
						'Appointment.appointment_date',
						'Appointment.appointment_time',
						'Appointment.first_name',
						'Appointment.last_name',
						'Appointment.is_guest_appointment',
						'Appointment.guest_first_name',
						'Appointment.guest_last_name',
						'Appointment.appointment_status_id',
						'Appointment.doctor_availability_timing_id'
					)
				   ),
				),	
				'fields' => array(
                    'DoctorAvailabilityTiming.id',
                    'DoctorAvailabilityTiming.availability_date',
                    'DoctorAvailabilityTiming.timings',
					'DoctorAvailabilityTiming.clinic_id',
                ) ,
                'recursive' => 2
			));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($type) && $type == 'doctor-profile') {
			 if (!empty($this->request->params['named']['day'])) {
                $day = $this->request->params['named']['day'];
            } else {
                $day = date('d');
            }
		}
		if (!empty($type) && ($type == 'doctor' || $type == 'doctor-profile')) {
			if (!empty($this->request->params['named']['month']))
			{
				$month = $this->request->params['named']['month'];
			} else {
				$month = date('m');
			}
			if (!empty($this->request->params['named']['year']))
			{
				$year = $this->request->params['named']['year'];
			} else {
				$year = date('Y');
			}
		}
		$this->set('day', $day);
		$this->set('month', $month);
		$this->set('year', $year);
		$this->set('data', $appointment_timings);
		$this->set('user_id', $user_id);
				$this->set('clinic_id', $clinic_id);	

		$this->set('type', $type);
		//echo '<pre/>'; print_r($appointment_timings); die;
		
	}
	public function setup_time($year = null, $month = null, $day = null, $data = null, $user_id = null,$clinic_id=null)
	{
		$year = $month = null;
		$data = array();
		if (!empty($this->request->params['pass']['0'])) {
			$year = $this->request->params['pass']['0'];
		}
		if (!empty($this->request->params['pass']['1'])) {
			$month = $this->request->params['pass']['1'];
		}
		if ($year == '' || $month == '' || $day == '') 
		{
			$year = date('Y');
			$monthInNumber = $month = date('m');
			$day = date('d');
		}
		$flag = 0;
		$month_list = array(
			'january',
			'february',
			'march',
			'april',
			'may',
			'june',
			'july',
			'august',
			'september',
			'october',
			'november',
			'december'
		);
		for ($i = 0; $i < 12; $i++) {
			if (strtolower($month) == $month_list[$i]) {
				if (intval($year) != 0) {
					$flag = 1;
					$monthInNumber = $i+1;
					break;
				}
			}
		}
		if ($flag == 0) {
			$year = date('Y');
			$month = date('F');
			$monthInNumber = date('m');
			$day = date('d');
		}
		$timing_value = array();
		if (!empty($this->request->params['named']['clinic_id'])) {
			$clinic_id = $this->request->params['named']['clinic_id'];
		} else if(!empty($this->request->data['DoctorAvailability']['clinic_id'])){
			$clinic_id = $this->request->data['DoctorAvailability']['clinic_id'];
		} else if(!empty($this->request->params['pass']['4'])) {
			$clinic_id = $this->request->params['pass']['4'];
		} 
		else {
			$this->Session->setFlash(__l('Please select Hospital'), 'default', null, 'success');
				$this->redirect(array(
					'controller' => 'doctors',
					'action' => 'timeslot',
				));
		}
		if (!empty($this->request->params['named']['user_id'])) {
			$user_id = $this->request->params['named']['user_id'];
		} else if(!empty($this->request->data['DoctorAvailability']['user_id'])){
			$user_id = $this->request->data['DoctorAvailability']['user_id'];
		} else if(!empty($this->request->params['pass']['3'])) {
			$user_id = $this->request->params['pass']['3'];
		} else {
			$user_id = $this->Auth->user('id');
		}
		$this->set('user_id',$user_id);
		$this->set('clinic_id',$clinic_id);
		$doctorAvailability = $this->DoctorAvailability->find('first', array(
			'conditions' => array(
				'DoctorAvailability.user_id = ' => $user_id
			),
			'recursive' => -1,
		));
		
		if(!empty($this->request->data)) {
			for ($i = 0; $i < 7; $i++) {
				if(!empty($this->request->data['DoctorAvailability']['timings-'.$i])) {
					$this->request->data['DoctorAvailabilityTimings']['setup_date'][$i] = $this->request->data['DoctorAvailability']['setup_date-'.$i];
					$timing_count = count($this->request->data['DoctorAvailability']['timings-'.$i]);
					foreach($this->request->data['DoctorAvailability']['timings-'.$i] as $timings) {
						$timing_value[] = $timings;
						$this->request->data['DoctorAvailabilityTimings']['timings'][$i] = implode(',', $timing_value);
					}
					$timing_value = '';
				}
			}
			if(!empty($this->request->data['DoctorAvailabilityTimings'])) {
				for ($i = 0; $i < 7 ; $i++) {

				   if (isset($this->request->data['DoctorAvailabilityTimings']['setup_date'][$i])) 
				   {
					   $setup_date = date('Y-m-d',strtotime($this->request->data['DoctorAvailabilityTimings']['setup_date'][$i]));
					   $doctor_availabilities_timings = $this->DoctorAvailability->DoctorAvailabilityTiming->find('first', array(
							'conditions' => array(
								'DoctorAvailabilityTiming.availability_date = ' => $setup_date,
								'DoctorAvailabilityTiming.doctor_availability_id = ' => $doctorAvailability['DoctorAvailability']['id'],
						   		'DoctorAvailabilityTiming.clinic_id = ' => $clinic_id

							),
							'recursive' => -1,
					   ));

					   if(!empty($doctor_availabilities_timings)) {
					   	   $id = $doctor_availabilities_timings['DoctorAvailabilityTiming']['id'];	
						   $this->DoctorAvailability->DoctorAvailabilityTiming->delete($id);
					   }	   
					   $this->DoctorAvailability->DoctorAvailabilityTiming->create();
					   $set_timings['DoctorAvailabilityTiming']['doctor_availability_id'] = $doctorAvailability['DoctorAvailability']['id'];
					   $set_timings['DoctorAvailabilityTiming']['availability_date'] = date('Y-m-d',strtotime($this->request->data['DoctorAvailabilityTimings']['setup_date'][$i]));
					   $set_timings['DoctorAvailabilityTiming']['timings'] = $this->request->data['DoctorAvailabilityTimings']['timings'][$i];
					   	$set_timings['DoctorAvailabilityTiming']['clinic_id'] = $clinic_id;

					   $this->DoctorAvailability->DoctorAvailabilityTiming->save($set_timings);

				   }		   
				}
				$user = $this->DoctorAvailability->User->find('first', array(
						'conditions' => array(
							'User.id = ' => $user_id
						),
						'fields' => array(
							'User.username',
						),
						'recursive' => 2,
				));
				$this->Session->setFlash(__l('Doctor Availability Setup time has been added'), 'default', null, 'success');
				$this->redirect(array(
					'controller' => 'doctors',
					'action' => 'timeslot',
					'username' => $user['User']['username']
				));
		   }					
		}
		$conditions['DoctorAvailabilityTiming.doctor_availability_id'] = $doctorAvailability['DoctorAvailability']['id'];
		$conditions['DoctorAvailabilityTiming.clinic_id'] = $clinic_id;
		$appointment_times = $this->DoctorAvailability->DoctorAvailabilityTiming->find('all', array(
                'conditions' => $conditions,
                'fields' => array(
                    'DoctorAvailabilityTiming.id',
                    'DoctorAvailabilityTiming.availability_date',
                    'DoctorAvailabilityTiming.timings',
					'DoctorAvailabilityTiming.clinic_id',
                ) ,
                'recursive' => 0
        ));  
		$this->set('doctorAvailability', $doctorAvailability);		
		$data = $this->DoctorAvailability->getTimeSlots();
		$this->set('day', $day);
		$this->set('month', $month);
		$this->set('year', $year);
		$this->set('data', $appointment_times);
		$this->loadModel('DoctorHoliday');
		$this->set('HolidayList',$this->DoctorHoliday->find('all',array('controller'=>array('DoctorHoliday.doctor_uid'=>$this->Auth->user('id')))));
	}
	function view($id = null) {
		$this->pageTitle = __l('Doctor Availability');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$doctorAvailability = $this->DoctorAvailability->find('first', array(
			'conditions' => array(
				'DoctorAvailability.id = ' => $id
			),
			'fields' => array(
				'DoctorAvailability.id',
				'DoctorAvailability.created',
				'DoctorAvailability.modified',
				'DoctorAvailability.clinic_id',
				'DoctorAvailability.user_id',
				'DoctorAvailability.appointment_date',
				'DoctorAvailability.appointment_time',
				'DoctorAvailability.is_with_assistant',
				'DoctorAvailability.assistant_info',
				'DoctorAvailability.consultation_fees',
				'DoctorAvailability.status',
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
		if (empty($doctorAvailability)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $doctorAvailability['DoctorAvailability']['id'];
		$this->set('doctorAvailability', $doctorAvailability);
	}
	public function add($user_id = null) 
	{
		$this->pageTitle = __l('Add Doctor Availability');
		if (!empty($this->request->data)) {
			if (empty($this->request->data['DoctorAvailability']['is_with_assistant'])) {
				unset($this->request->data['DoctorAvailability']['assistant_info']);
			}
			$this->DoctorAvailability->set($this->request->data);
			if ($this->DoctorAvailability->validates()) {
				$this->DoctorAvailability->create();
				if ($this->DoctorAvailability->save($this->request->data)) {
					$this->Session->setFlash(__l('Doctor Availability has been added'), 'default', null, 'success');
					$this->redirect(array(
						'controller' => 'doctors',
					'action' => 'timeslot'						
					));
					} else {
					$this->Session->setFlash(__l('Doctor Availability could not be added. Please, try again.'), 'default', null, 'error');
				}
			}
		}
		$this->request->data['DoctorAvailability']['user_id'] = $user_id;		 		
		//Check clinic is there or not for user
		$user = $this->DoctorAvailability->User->find('first', array(
				'conditions' => array(
					'User.id = ' => $user_id
				),
				'contain' => array(
					'UserProfile' => array(
						'fields' => array(
							'UserProfile.first_name',
							'UserProfile.last_name'
						),
					)
				),
				'fields' => array(
					'User.id',
					'User.username'
				),
				'recursive' => 2,
		));
		$this->set(compact('user'));
	}
	function edit($id = null) {
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
				$this->redirect(array(
					'controller' => 'doctors',
					'action' => 'timeslot'
				));
		} else {
			$this->request->data = $this->DoctorAvailability->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['DoctorAvailability']['id'];
		$users = $this->DoctorAvailability->User->find('list');
		$this->set(compact('users'));
		$this->render('edit');
	}

	function delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->DoctorAvailability->delete($id)) {
			$this->Session->setFlash(__l('Doctor Availability deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	function admin_index() {
		$this->pageTitle = __l('Doctor Availabilities');
		$this->DoctorAvailability->recursive = 0;
		$this->set('doctorAvailabilities', $this->paginate());
	}

	function admin_view($id = null) {
		$this->pageTitle = __l('Doctor Availability');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$doctorAvailability = $this->DoctorAvailability->find('first', array(
			'conditions' => array(
				'DoctorAvailability.id = ' => $id
			),
			'fields' => array(
				'DoctorAvailability.id',
				'DoctorAvailability.created',
				'DoctorAvailability.modified',
				'DoctorAvailability.clinic_id',
				'DoctorAvailability.user_id',
				'DoctorAvailability.appointment_date',
				'DoctorAvailability.appointment_time',
				'DoctorAvailability.is_with_assistant',
				'DoctorAvailability.assistant_info',
				'DoctorAvailability.consultation_fees',
				'DoctorAvailability.status',
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
		if (empty($doctorAvailability)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $doctorAvailability['DoctorAvailability']['id'];
		$this->set('doctorAvailability', $doctorAvailability);
	}

	function admin_add() {
		$this->pageTitle = __l('Add Doctor Availability');
		if (!empty($this->request->data)) {
			$this->DoctorAvailability->create();
			if ($this->DoctorAvailability->save($this->request->data)) {
				$this->Session->setFlash(__l('Doctor Availability has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Doctor Availability could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		$clinics = $this->DoctorAvailability->Clinic->find('list');
		$users = $this->DoctorAvailability->User->find('list');
		$this->set(compact('clinics', 'users'));
	}

	function admin_edit($id = null) {
		$this->pageTitle = __l('Edit Doctor Availability');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if (!empty($this->request->data)) {
			if ($this->DoctorAvailability->save($this->request->data)) {
				$this->Session->setFlash(__l('Doctor Availability has been updated'), 'default', null, 'success');
			} else {
				$this->Session->setFlash(__l('Doctor Availability could not be updated. Please, try again.'), 'default', null, 'error');
			}
		} else {
			$this->request->data = $this->DoctorAvailability->read(null, $id);
			if (empty($this->request->data)) {
				throw new NotFoundException(__l('Invalid request'));
			}
		}
		$this->pageTitle .= ' - ' . $this->request->data['DoctorAvailability']['id'];
		$clinics = $this->DoctorAvailability->Clinic->find('list');
		$users = $this->DoctorAvailability->User->find('list');
		$this->set(compact('clinics','users'));
	}

	function admin_delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->DoctorAvailability->delete($id)) {
			$this->Session->setFlash(__l('Doctor Availability deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	
	function add_holidays(){
		$this->loadModel('DoctorHoliday');
		$rs='0';
		$holidayArr=array();
		if($this->request->query['data']){
			$this->request->data=$this->request->query['data'];
			$tatalCount=count($this->request->data['DoctorHoliday']['holiday_date']);
			for($i=0; $i<$tatalCount; $i++){
				$holidayArr['DoctorHoliday']['holiday_date']=date('Y-m-d',strtotime($this->request->data['DoctorHoliday']['holiday_date'][$i]));
				$holidayArr['DoctorHoliday']['holiday_type']=$this->request->data['DoctorHoliday']['holiday_type'][$i];
				$holidayArr['DoctorHoliday']['doctor_uid']=$this->Auth->user('id');
				$holidayArr['DoctorHoliday']['date']=date('Y-m-d H:i:s');
				//
				if($this->DoctorHoliday->save($holidayArr,false)){
					$rs='1';
				}
			}
			if($rs){
				$this->Session->setFlash(__l('Holiday Added Successfully'), 'default', null, 'success');
			    $this->redirect($this->referer());
			}
		}
	}
	
	function delete_holiday($id,$uid){
		$this->loadModel('DoctorHoliday');
		if($id && $uid){
			if($uid==$this->Auth->user('id')){
				$this->DoctorHoliday->delete($id);
				$this->Session->setFlash(__l('Holiday deleted Successfully'), 'default', null, 'success');
			    $this->redirect($this->referer());
			}
			
		}
	}

}
?>