<?php
class AppointmentsController extends AppController {

	var $name = 'Appointments';
	public function beforeFilter()
    {	
        $this->Security->disabledFields = array(
            'Appointment',
        );
        parent::beforeFilter();
		
    }
	public function index()
	{
		$this->pageTitle = __l('Appointments');
		$this->Appointment->recursive = 0;
		if($this->Auth->user('role_id') ==  ConstUserTypes::Doctor) {
			$conditions['Appointment.doctor_user_id'] = $this->Auth->user('id');
		} else {
			$conditions['Appointment.user_id'] = $this->Auth->user('id');
		}
		if(!empty($this->request->params['named']['user_id'])) {
			$conditions['Appointment.user_id'] = $this->request->params['named']['user_id'];
		}
		if (!empty($this->request->params['named']['status'])) {
            switch ($this->request->params['named']['status']) {
                case 'approved':
                    unset($conditions['Appointment.appointment_status_id']);
                    $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::Approved;
                    $this->pageTitle.= __l(' - Approved ');
                    break;
				
				case 'pendingapproval':
                    unset($conditions['Appointment.appointment_status_id']);
                    $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::PendingApproval;
                    $this->pageTitle.= __l(' - Pending Approval ');
                    break;

                case 'cancelled':
                    unset($conditions['Appointment.appointment_status_id']);
                    $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::Cancelled;
                       $this->pageTitle.= __l(' - Cancelled');
                    break;
				
				case 'rejected':
                    unset($conditions['Appointment.appointment_status_id']);
                    $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::Rejected;
                       $this->pageTitle.= __l(' - Rejected');
                    break;
				
				case 'expired':
                    unset($conditions['Appointment.appointment_status_id']);
                    $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::Expired;
                       $this->pageTitle.= __l(' - Expired');
                    break;	
				
				case 'closed':
                    unset($conditions['Appointment.appointment_status_id']);
                    $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::Closed;
                       $this->pageTitle.= __l(' - Closed');
                    break;	
                case 'all':
                    unset($conditions['Appointment.appointment_status_id']);
                    $conditions['Appointment.appointment_status_id'] = array(
                        ConstAppointmentStatus::Approved,
                        ConstAppointmentStatus::PendingApproval,
                        ConstAppointmentStatus::Cancelled,
                        ConstAppointmentStatus::Rejected,
                        ConstAppointmentStatus::Expired,
                        ConstAppointmentStatus::Closed,
                    );
                    $this->pageTitle.= __l(' - All');
                    break;
            }
        }
	   if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'all') {
			$conditions['Appointment.doctor_user_id'] = $this->Auth->user('id');
	   }
	   if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'day') {
			$conditions['TO_DAYS(NOW()) - TO_DAYS(Appointment.appointment_date) <= '] = 0;
			$this->request->data['Appointment']['from_date'] = array(
				'year' => date('Y', strtotime('today')) ,
				'month' => date('m', strtotime('today')) ,
				'day' => date('d', strtotime('today'))
			);
			$this->request->data['Appointment']['to_date'] = array(
				'year' => date('Y', strtotime('today')) ,
				'month' => date('m', strtotime('today')) ,
				'day' => date('d', strtotime('today'))
			);
	   }
	   if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'week') {
			$conditions['TO_DAYS(NOW()) - TO_DAYS(Appointment.appointment_date) <= '] = 7;
			$this->request->data['Appointment']['from_date'] = array(
				'year' => date('Y', strtotime('last week')) ,
				'month' => date('m', strtotime('last week')) ,
				'day' => date('d', strtotime('last week'))
			);
			$this->request->data['Appointment']['to_date'] = array(
				'year' => date('Y', strtotime('this week')) ,
				'month' => date('m', strtotime('this week')) ,
				'day' => date('d', strtotime('this week'))
			);
	   }
	   if (isset($this->request->params['named']['stat']) && $this->request->params['named']['stat'] == 'month') {
			$conditions['TO_DAYS(NOW()) - TO_DAYS(Appointment.appointment_date) <= '] = 30;
			$this->request->data['Appointment']['from_date'] = array(
				'year' => date('Y', (strtotime('last month', strtotime(date('m/01/y'))))) ,
				'month' => date('m', (strtotime('last month', strtotime(date('m/01/y'))))) ,
				'day' => date('d', (strtotime('last month', strtotime(date('m/01/y')))))
			);
			$this->request->data['Appointment']['to_date'] = array(
				'year' => date('Y', (strtotime('this month', strtotime(date('m/01/y'))))) ,
				'month' => date('m', (strtotime('this month', strtotime(date('m/01/y'))))) ,
				'day' => date('d', (strtotime('this month', strtotime(date('m/01/y')))))
			);
	   }
	   $this->paginate = array(
            'conditions' => $conditions,
            'contain' => array(
				'User' => array(
					'fields' => array(
						'User.id',
						'User.username'
					)	
				),
				'DoctorUser' => array(
					'fields' => array(
						'DoctorUser.id',
						'DoctorUser.username'
					)	
				),
				'AppointmentStatus' => array(
					'fields' => array(
						'AppointmentStatus.id',
						'AppointmentStatus.name'
					)	
				),
			),
			'order' => array(
                'Appointment.id' => 'desc'
            ) ,
            'recursive' => 1
        );
		$this->set('appointments', $this->paginate());
		$from = $this->Appointment->find('first', array(
            'conditions' => $conditions,
            'fields' => array(
                'Appointment.appointment_date'
            ) ,
            'limit' => 1,
            'recursive' => -1
        ));
        $to = $this->Appointment->find('first', array(
            'conditions' => $conditions,
            'fields' => array(
                'Appointment.appointment_date'
            ) ,
            'limit' => 1,
            'order' => array(
                'Appointment.id desc'
            ) ,
            'recursive' => -1
        ));
        $this->set('duration_from', $from['Appointment']['appointment_date']);
        $this->set('duration_to', $to['Appointment']['appointment_date']);
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
		if($this->Auth->user('role_id') ==  ConstUserTypes::Doctor || $this->Auth->user('role_id') ==  ConstUserTypes::Clinic) {
			if (!isset($this->request->params['named']['stat'])) {
				$this->request->params['named']['stat'] = 'all';
			}
			if($this->Auth->user('role_id') ==  ConstUserTypes::Doctor) {
				$this->render('index_doctor_appointments');
				$this->autoRender = false;
			} else {
				App::import('Model', 'Clinic');
	            $this->Clinic = new Clinic;
				$clinic = $this->Clinic->find('first', array(
				'conditions' => array(
					'Clinic.id' => $this->request->params['named']['clinic_id']
				),
				'contain' => array(
					'User' => array(
						'conditions' => array(
							'User.id' => $this->request->params['named']['user_id']
						),
						'UserProfile' => array(
							'fields' => array(
								'UserProfile.first_name',
								'UserProfile.last_name',
								)
							) ,
							'fields' => array(
								'User.username',
							),
						)
					),
					'fields'=>array(
						'Clinic.name'
					),
					'recursive' => 3,
				));
				$this->set('user_id', $this->request->params['named']['user_id']);
				$this->set('clinic', $clinic);
				$this->render('index_clinic_appointments');
			}	
	  	} 
	}
	public function browse()
    {
        $this->pageTitle = __l('Browse Appointments');
    }
	public function view($id = null) {
		$this->pageTitle = __l('Appointment');
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$appointment = $this->Appointment->find('first', array(
			'conditions' => array(
				'Appointment.id = ' => $id
			),
			'contain' => array(
				'User' => array(
					'fields' => array(
						'User.id',
						'User.email',
						'User.username'
					)	
				),
				'Gender' => array(
					'fields' => array(
						'Gender.name'
					 )
				) ,
				'GuestGender' => array(
					 'fields' => array(
					    'Gender.name'
					 )
				) ,
				'SpecialtyDisease' => array(
					 'fields' => array(
					    'SpecialtyDisease.name'
					 )
				) ,
				'InsuranceCompany' => array(
					 'fields' => array(
					    'InsuranceCompany.name'
					 )
				) ,
				'DoctorUser' => array(
					'fields' => array(
						'DoctorUser.id',
						'DoctorUser.username'
					)	
				),
				'AppointmentStatus' => array(
					'fields' => array(
						'AppointmentStatus.id',
						'AppointmentStatus.name'
					)	
				),
			),
			'recursive' => 0,
		));
		if (empty($appointment)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->pageTitle .= ' - ' . $appointment['Appointment']['appointment_date']. ' - ' .$appointment['Appointment']['appointment_time'] ;
		$this->set('appointment', $appointment);
	}
	public function add()
	{	
		$this->pageTitle = __l('Book Your Appointment');
		if (!empty($this->request->data)) {
			$user = $this->Session->read('user');
			 $this->request->data['Appointment']['user_id'] = $this->request->data['Appointment']['patient_id'];
			
			
			if(!empty($user)) {
				if($this->Session->check('appointment_date'))
					$this->request->data['Appointment']['appointment_date'] = $this->Session->read('appointment_date');
				if($this->Session->check('appointment_time'))
					$this->request->data['Appointment']['appointment_time'] = $this->Session->read('appointment_time');
				if($this->Session->check('appointment_time_id'))
					$this->request->data['Appointment']['doctor_availability_timing_id'] = $this->Session->read('appointment_time_id');
				$this->request->data['Appointment']['doctor_user_id'] = $user['Doctor']['User']['id'];
				$this->request->data['Appointment']['user_id'] = $this->Auth->user('id');
			
			}	
			if(empty($this->request->data['Appointment']['is_guest_appointment']))
			{
				unset($this->request->data['Appointment']['guest_first_name']);
				unset($this->request->data['Appointment']['guest_last_name']);
				unset($this->request->data['Appointment']['guest_email']);
				unset($this->request->data['Appointment']['guest_dob']);
				//unset($this->request->data['Appointment']['dob']);
				unset($this->request->data['Appointment']['guest_gender_id']);
			} else {
				unset($this->request->data['Appointment']['guest_dob']);
				//unset($this->request->data['Appointment']['dob']);
			}
			
			//for admin notification
			$this->request->data['Appointment']['is_admin_notification'] = 1;
			
			$this->Appointment->create();
			
			if ($this->Appointment->save($this->request->data)) {
				
				$this->redirect(array(
						'controller' => 'appointments',
						'action' => 'booking_info',
						'appointment' => $this->Appointment->getLastInsertId()
           		));
			}
		}
	}
	public function appointment_info()
	{  
		$this->pageTitle = __l('Book Your Appointment');
		$user_info = $this->Session->read('user');
		if($this->Auth->user('role_id') == ConstUserTypes::Doctor) {
			$this->Session->setFlash(__l('Doctor will not able to schedule an appointment.'), 'default', null, 'error');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->request->params['named']['doctor']))  
		{
			if(!empty($user_info)) {
				 $this->Session->delete('user_info');
			}
			// User Specialty dieases and Insurances
			$doctor_user_id = $this->request->params['named']['doctor'];
			$specialtyDiseasesUsers = $this->Appointment->SpecialtyDisease->SpecialtyDiseasesUser->find('all', array(
				'conditions' => array(
					'SpecialtyDiseasesUser.user_id' => $doctor_user_id,
				) ,
				'recursive' => -1
       		));
			$user_specialty_ids = array();
			foreach($specialtyDiseasesUsers as $specialtyDiseasesUser) {
				$user_specialty_ids[] = $specialtyDiseasesUser['SpecialtyDiseasesUser']['specialty_disease_id'];
			}
			$conditions['SpecialtyDisease.id'] = $user_specialty_ids;
			$conditions['SpecialtyDisease.is_active'] = 1;
			$specialtyDiseases = $this->Appointment->SpecialtyDisease->find('list', array(
				'conditions' =>$conditions,
				'order' => array(
					'SpecialtyDisease.name' => 'asc'
				 ),
				'recursive' => -1
       		));
			if(empty($specialtyDiseases)) {
				$doctor_specialty = $this->Appointment->User->UserProfile->find('first', array(
					'conditions' =>array(
						'UserProfile.user_id' => $doctor_user_id
					),
					'fields'=>array(
						'UserProfile.specialty_id',
					),
				));	
				$specialty_conditions['SpecialtyDisease.specialty_id'] = $doctor_specialty['UserProfile']['specialty_id'];
				$specialtyDiseases = $this->Appointment->SpecialtyDisease->find('list', array(
					'conditions' =>$specialty_conditions,
					'order' => array(
						'SpecialtyDisease.name' => 'asc'
					 ),
					'recursive' => -1
       			));
			}
			App::import('Model', 'InsuranceCompany');
	  		$this->InsuranceCompany = new InsuranceCompany();
			$insurance_companies = $this->InsuranceCompany->find('list', array(
				'conditions' => array(
					'InsuranceCompany.is_active' => 1
									)
	        ));
			$search_options = $this->InsuranceCompany->searchOptions;
			$insurances = array_merge($search_options,$insurance_companies); 
			//Get Patient and Doctor Details
			$user_id = $this->Auth->user('id');
			$user = $this->Appointment->getDoctorAndPatientInfo($user_id,$doctor_user_id);
		}
		if (!empty($this->request->params['named']['date']) and !empty($this->request->params['named']['time']) and !empty($this->request->params['named']['timing_id']))  
		{
			$appointment_date = $this->request->params['named']['date'];	
			$appointment_time = $this->request->params['named']['time'];
			if(strtotime($appointment_date) < strtotime(date("Y-m-d"))){
				$this->Session->setFlash(__l('You are attempting to schedule an appointment in the past.'), 'default', null, 'error');
				$this->redirect(array('action' => 'browse'));
			}
			$this->loadModel('DoctorHoliday');
			$isHoliday=$this->DoctorHoliday->findByDoctorUidAndHolidayDate($doctor_user_id,$this->request->params['named']['date']);
			if($isHoliday){
				$this->Session->setFlash(__l('Doctor is on holiday on this date, kindly choose another date.'), 'default', null, 'error');
				$this->redirect(array('action' => 'browse'));
			}
			$is_already_booked = $this->_getAppointmentTime($appointment_date,$appointment_time);
			if(!empty($is_already_booked)) {
				$this->Session->setFlash(__l('You are attempting to schedule an appointment is already booked by someone in this time.'), 'default', null, 'error');
				$this->redirect(array('action' => 'browse'));
			}
			$user['Patient']['Appointment']['appointment_date'] = $appointment_date;
			$user['Patient']['Appointment']['appointment_time'] = $appointment_time;
			$user['Patient']['Appointment']['appointment_time_id'] = $this->request->params['named']['timing_id'];				 
			$this->set('appointment_date',$appointment_date); 
			$this->set('appointment_time',$appointment_time); 	
			
			
			$this->Session->write('appointment_time', $appointment_time);
			$this->Session->write('appointment_date', $appointment_date);
			$this->Session->write('appointment_time_id', $user['Patient']['Appointment']['appointment_time_id']);
		}
		$this->Session->write('user', $user); 
		$this->set('user',$user);
		$this->set(compact('specialtyDiseases','insurances'));
	}
	public function patient_info()
	{
		$this->pageTitle = __l('Patient Info');
		if (!empty($this->request->data)) {
			if(empty($this->request->data['Appointment']['is_seen_before'])) {
				$this->request->data['Appointment']['is_seen_before'] = 0;
			}
			$this->request->data['Appointment']['user_id'] = $this->Auth->user('id');
			$conditions['SpecialtyDisease.id'] = $this->request->data['Appointment']['SpecialtyDisease'];
			$specialtyDiseaseName = $this->Appointment->SpecialtyDisease->find('first', array(
				'conditions' =>$conditions,
				'fields' => array(
					'SpecialtyDisease.id',
					'SpecialtyDisease.name',
				),
				'recursive' => -1
       		));
			$genders = $this->Appointment->Gender->find('list');
			$this->set('genders', $genders);
			$this->set('data', $this->request->data);
			$user = $this->Session->read('user');
			$user['Patient']['Appointment']['disease'] = $specialtyDiseaseName['SpecialtyDisease']['name'];
			$this->set('user', $user);
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	public function booking_info()
	{
		$this->pageTitle = __l('Details');
		if (!empty($this->request->params['named']['appointment'])) {
			$appointment_id = $this->request->params['named']['appointment'];
		} else if(!empty($this->request->data['Appointment']['appointment_id'])) {
			$appointment_id = $this->request->data['Appointment']['appointment_id'];
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
		$this->set('appointment_id', $appointment_id);	
		$user = $this->Session->read('user');
		
		$this->loadModel('UserProfile');
		$user_profile = $this->UserProfile->findByUserId($user['Patient']['User']['id']);
		//echo '<pre>'; print_r($user_profile); die;
		$this->set('user_profile', $user_profile);
		
		if(!empty($user)) {
			$this->set('user', $user);
		} else {
			$this->Session->setFlash(__l('Your appointment has been session out. Please try again.'), 'default', null, 'success');
			$this->redirect(array(
					'action' => 'index'
           	));
		}
		if (!empty($this->request->data)) {
			
			if(!empty($this->request->data['Appointment']['appointment_id'])) {
				$this->Appointment->updateAll(array(
						'Appointment.phone' => '\'' . $this->request->data['Appointment']['phone'] . '\'',
						'Appointment.patient_note' => '\'' . $this->request->data['Appointment']['patient_note'] . '\'',
						'Appointment.reminder_sms' => $this->request->data['Appointment']['reminder_sms'],
						'Appointment.reminder_time' => $this->request->data['Appointment']['reminder_time']
					) , array(
						'Appointment.id' => $appointment_id
				));
					//header("location:http://hempmedic.com");
				$this->Session->setFlash(__l('Appointment has been added successfully.'), 'default', null, 'success');
				/*
				$this->redirect(array(
							'controller' => 'appointments',
							'action' => 'confirm',
							'appointment' => $appointment_id
				));
				*/
				//Take doctor userid from Appointment table
				$appointment = $this->Appointment->find('first', array(
					'conditions' => array(
						'Appointment.id = ' => $appointment_id
					),
					'contain' => array(
						'User' => array(
							'UserProfile' => array(
							    'fields' => array(
									'UserProfile.phone',
								)
							) ,
							'fields' => array(
								'User.username',
							)
						),
						'DoctorUser' => array(
							'UserProfile' => array(
								'fields' => array(
									'UserProfile.phone',
									)
								) ,
							'fields' => array(
								'DoctorUser.username',
							)
						),
					),
					'recursive' => 2,
		    	));

				$doctor_mobile = $appointment['DoctorUser']['UserProfile']['phone'];
				$patient_mobile = $appointment['User']['UserProfile']['phone'];
				
				$smsinfo = array();
				$sms = array();
				//Send SMS to Patient
				if($patient_mobile){
				$smsinfo['mobile'] = $patient_mobile;
				$smsinfo['message'] = 'Dear '.$appointment['User']['username'].'your appointment with Dr. '. $user['Doctor']['UserProfile']['first_name'].' '.$user['Doctor']['UserProfile']['last_name'].' is booked at '.date("F j, Y", strtotime($user['Patient']['Appointment']['appointment_date'])).' at '.$user['Doctor']['UserProfile']['address'].' Call at 950022122 to modify or cancel booking';
				$smsdata = $this->Appointment->sendSMS($smsinfo);
				
				}
				//Send SMS to Doctor
				if($doctor_mobile){
				$sms['mobile'] = $doctor_mobile;
				$sms['message'] = 'Dear '.$appointment['DoctorUser']['username'].', Patient '.$appointment['User']['username'].' requesting your appointment at '.date("F j, Y", strtotime($user['Patient']['Appointment']['appointment_date'])).' '.$user['Patient']['Appointment']['appointment_time'].'. Please check with your appointment schedule and confirmation your appointment.';
				$smsdoctordata = $this->Appointment->sendSMS($sms);    //commented by naveen because it is showing curl error.
				//$this->log($smsdoctordata);
				}
				//Email send for Patients and Doctors
				$emailFindReplace = array(
					'##USERNAME##' => $user['Patient']['User']['username'],
					'##DOCTOR_USERNAME##' => 'Dr. '. $user['Doctor']['UserProfile']['first_name'].' '.$user['Doctor']['UserProfile']['last_name'],
					'##APPOINTMENT_DATE_TIME##'=> date("F j, Y", strtotime($user['Patient']['Appointment']['appointment_date'])).' at '. $user['Patient']['Appointment']['appointment_time'],
					'##ADDRESS##' => $user['Doctor']['UserProfile']['address'].','.$user['Doctor']['UserProfile']['City']['name'].','.$user['Doctor']['UserProfile']['State']['code'].' '.$user['Doctor']['UserProfile']['zip_code'],
					'##CONTACT_NO##'=>'9580022122',
					'##VIEW_APPOINTMENTS##' => Router::url(array(
						'controller' => 'appointments',
						'action' => 'browse',
						'admin' => false
					) , true)
				);
				$emailFindReplace1 = array(
					'##USERNAME##' => $user['Doctor']['User']['username'],
					'##PATIENT_USERNAME##' => 'Dr. '. $user['Patient']['UserProfile']['first_name'].' '.$user['Patient']['UserProfile']['last_name'],
					'##APPOINTMENT_DATE_TIME##'=> date("F j, Y", strtotime($user['Patient']['Appointment']['appointment_date'])).' at '. $user['Patient']['Appointment']['appointment_time'],
					'##ADDRESS##' => $user['Doctor']['UserProfile']['address'].','.$user['Doctor']['UserProfile']['City']['name'].','.$user['Doctor']['UserProfile']['State']['code'].' '.$user['Doctor']['UserProfile']['zip_code'],
					'##CONTACT_NO##'=>'9580022122',
					'##VIEW_APPOINTMENTS##' => Router::url(array(
						'controller' => 'appointments',
						'action' => 'browse',
						'admin' => false
					) , true)
				);
				
				$this->Appointment->_sendEmail('New Appointment Request', $emailFindReplace,  $this->Auth->user('email'));
				$this->Appointment->_sendEmail('New Appointment Requested form patient', $emailFindReplace1,  $user['Doctor']['User']['email']);
				
				$this->redirect(array(
							'controller' => 'appointments',
							'action' => 'confirm',
							'appointment' => $appointment_id
				));
			} else {
				$this->Session->setFlash(__l('Appointment could not updated. Please try again'), 'default', null, 'error');	
				$this->redirect(array(
					'action' => 'index'
           		));	
			}	
		}
	}
	public function confirm()
	{
		$this->pageTitle = __l('Finished');	
		$user = $this->Session->read('user');
		if (!empty($this->request->params['named']['appointment']) and !empty($user)) {
			$appointment = $this->Appointment->find('first', array(
				'conditions' => array(
					'Appointment.id = ' => $this->request->params['named']['appointment']
				),
				'contain' => array(
					'User' => array(
						'fields' => array(
							'User.email'
						)
					),
					'Gender' => array(
							'fields' => array(
								'Gender.name'
							)
					) ,
				),
				'recursive' => 0,
		    ));
			$this->set(compact('user','appointment'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}		
	}
	public function update_status($id = null)
    {
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid request'));
        }
		$user = $this->Appointment->getAppointmentInfo($id);
		$emailFindReplace = array(
					'##USERNAME##' => $user['User']['username'],
					'##PATIENT_NAME##' => $user['User']['UserProfile']['first_name'].' '.$user['User']['UserProfile']['last_name'],
					'##PATIENT_EMAIL##' => $user['User']['email'],
					'##PATIENT_PHONE##' => $user['User']['UserProfile']['cell_number'],
					'##DOCTOR_USERNAME##' => 'Dr. '. $user['DoctorUser']['UserProfile']['first_name'].' '.$user['DoctorUser']['UserProfile']['last_name'],
					'##APPOINTMENT_DATE_TIME##'=> date("F j, Y", strtotime($user['Appointment']['appointment_date'])).' at '. $user['Appointment']['appointment_time'],
					'##ADDRESS##' => $user['DoctorUser']['UserProfile']['address'].','.$user['DoctorUser']['UserProfile']['City']['name'].','.$user['DoctorUser']['UserProfile']['State']['code'].' '.$user['DoctorUser']['UserProfile']['zip_code'],
					'##VIEW_APPOINTMENTS##' => Router::url(array(
						'controller' => 'appointments',
						'action' => 'browse',
						'admin' => false
					) , true)
		);
		$status = $this->request->params['named']['status'];
		$smsinfo = array();
        if ($status == 'approve') {
			$this->Appointment->updateAll(array(
                    'Appointment.appointment_status_id' => ConstAppointmentStatus::Approved
                ) , array(
                    'Appointment.id' => $id
            ));
			//header("location:http://hempmedic.com/appointments/index/status:all");
			
			//Send SMS to Patient
			$smsinfo['mobile'] = $user['User']['UserProfile']['phone'];
			$smsinfo['message'] = 'Dear '.$user['User']['username'].', we have approved your appointment requesting on '.date("F j, Y", strtotime($user['Appointment']['appointment_date'])).' at '. $user['Appointment']['appointment_time'].' Thanks, '. $user['DoctorUser']['UserProfile']['first_name'].' '.$user['DoctorUser']['UserProfile']['last_name'];
			$smsdata = $this->Appointment->sendSMS($smsinfo);	
			$this->Appointment->_sendEmail('Appointment Approved Alert To Patient', $emailFindReplace,  $user['User']['email']);

			$this->Session->setFlash(__l('Appointment has been approved') , 'default', null, 'success');
			$this->redirect(array(
							'controller' => 'appointments',
							'action' => 'index',
				));

        }
        if ($status == 'decline') {
            $this->Appointment->updateAll(array(
                    'Appointment.appointment_status_id' => ConstAppointmentStatus::Rejected
                ) , array(
                    'Appointment.id' => $id
            ));
			
			//Send SMS to Patient
			$smsinfo['mobile'] = $user['User']['UserProfile']['phone'];
			$smsinfo['message'] = 'Dear '.$user['User']['username'].', We have declined your appointment requesting on '.date("F j, Y", strtotime($user['Appointment']['appointment_date'])).' at '. $user['Appointment']['appointment_time'].' Thanks, '. $user['DoctorUser']['UserProfile']['first_name'].' '.$user['DoctorUser']['UserProfile']['last_name'];
			$smsdata = $this->Appointment->sendSMS($smsinfo);	
			// Doctor decline your request
			$this->Appointment->_sendEmail('Appointment Rejected Alert To Patient', $emailFindReplace,  $user['User']['email']);

			//header("location:http://hempmedic.com/appointments/index/status:all");
			$this->Session->setFlash(__l('Appointment has been declined') , 'default', null, 'success');
			$this->redirect(array(
							'controller' => 'appointments',
							'action' => 'index',
				));
        }
		 if ($status == 'cancel') {
            $this->Appointment->updateAll(array(
                    'Appointment.appointment_status_id' => ConstAppointmentStatus::Cancelled
                ) , array(
                    'Appointment.id' => $id
            ));
			
			//Send SMS to Patient
			$smsinfo['mobile'] = $user['User']['UserProfile']['phone'];
			$smsinfo['message'] = 'Dear '.$user['User']['username'].', We have canceled your appointment requesting on '.date("F j, Y", strtotime($user['Appointment']['appointment_date'])).' at '. $user['Appointment']['appointment_time'].' Thanks, '. $user['DoctorUser']['UserProfile']['first_name'].' '.$user['DoctorUser']['UserProfile']['last_name'];
			$smsdata = $this->Appointment->sendSMS($smsinfo);	
			$this->Appointment->_sendEmail('Appointment Canceled Alert To Patient', $emailFindReplace,  $user['User']['email']);

			//header("location:http://hempmedic.com/appointments/index/status:pendingapproval");
			$this->Session->setFlash(__l('Appointment has been cancelled') , 'default', null, 'success');
			$this->redirect(array(
							'controller' => 'appointments',
							'action' => 'index',
				));
        }
		$this->log($smsdata);
        if($this->Auth->user('role_id') ==  ConstUserTypes::Doctor) {
			$this->redirect(array(
				'controller' => 'appointments',
				'action' => 'index'
			));
		} else {
			$this->redirect(array(
				'controller' => 'appointments',
				'action' => 'browse',
				'admin' => false
			));
		}
    }

	public function admin_index() {
		$this->_redirectGET2Named(array(
            'q',
			'filter_id'
        ));
		$conditions = array();
		$this->pageTitle = __l('Appointments');
		if (isset($this->request->params['named']['filter_id'])) {
            $this->request->data[$this->modelClass]['filter_id'] = $this->request->params['named']['filter_id'];
        }
		if (!empty($this->request->params['named']['filter_id'])) {
            if ($this->request->params['named']['filter_id'] == ConstAppointmentStatus::PendingApproval) {
                $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::PendingApproval;
                $this->pageTitle.= __l(' - PendingApproval ');
            } else if ($this->request->params['named']['filter_id'] == ConstAppointmentStatus::Approved) {
                $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::Approved;
                $this->pageTitle.= __l(' - Approved ');
            } else if ($this->request->params['named']['filter_id'] == ConstAppointmentStatus::Cancelled) {
                $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::Cancelled;
                $this->pageTitle.= __l(' - Cancelled ');
            } else if ($this->request->params['named']['filter_id'] == ConstAppointmentStatus::Rejected) {
                $conditions['Appointment.appointment_status_id'] = ConstAppointmentStatus::Rejected;
                $this->pageTitle.= __l(' - Rejected ');
            }
        }
		$this->paginate = array(
                'conditions' => array(
                    $conditions,
                ) ,
                'contain' => array(
					'User' => array(
						'fields' => array(
							'User.username',								
						) 
					) ,
					'DoctorUser' => array(
						'fields' => array(
							'DoctorUser.username',								
						) 
					) ,
					'SpecialtyDisease' => array(
						'fields' => array(
							'SpecialtyDisease.name',
						) 
					 ),
					 'InsuranceCompany' => array(
						'fields' => array(
							'InsuranceCompany.name',
						) 
					 ),
					 'AppointmentStatus' => array(
						'fields' => array(
							'AppointmentStatus.name',
						) 
					 )
                ) ,
                'order' => array(
                    'Appointment.id' => 'desc'
                ) ,
                'recursive' => 1,
        );
		$this->set('appointments', $this->paginate());
		// total pending approveal list
		$this->set('pending_approval', $this->Appointment->find('count', array(
			'conditions' => array(
				'Appointment.appointment_status_id' => ConstAppointmentStatus::PendingApproval,
			) ,
			'recursive' => 1
		)));
		// total approved  list
		$this->set('approved', $this->Appointment->find('count', array(
			'conditions' => array(
				'Appointment.appointment_status_id' => ConstAppointmentStatus::Approved,
			) ,
			'recursive' => 1
		)));
		// total cancelled list
		$this->set('cancelled', $this->Appointment->find('count', array(
			'conditions' => array(
				'Appointment.appointment_status_id' => ConstAppointmentStatus::Cancelled,
			) ,
			'recursive' => 1
		)));
		// total rejected list
		$this->set('rejected', $this->Appointment->find('count', array(
			'conditions' => array(
				'Appointment.appointment_status_id' => ConstAppointmentStatus::Rejected,
			) ,
			'recursive' => 1
		)));
		$moreActions = $this->Appointment->moreActions;
		$this->set(compact('moreActions'));
	}
	public function admin_add() {
		$this->pageTitle = __l('Add Appointment');
		if (!empty($this->request->data)) {
			$this->Appointment->create();
			if ($this->Appointment->save($this->request->data)) {
				$this->Session->setFlash(__l('Appointment has been added'), 'default', null, 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__l('Appointment could not be added. Please, try again.'), 'default', null, 'error');
			}
		}
		//$clinics = $this->Appointment->Clinic->find('list');
		$users = $this->Appointment->User->find('list');
		$specialties = $this->Appointment->Specialty->find('list');
		$specialtyDiseases = $this->Appointment->SpecialtyDisease->find('list');
		$this->set(compact('clinics','users', 'specialties', 'specialtyDiseases'));
	}
	public function admin_delete($id = null) {
		if (is_null($id)) {
			throw new NotFoundException(__l('Invalid request'));
		}
		if ($this->Appointment->delete($id)) {
			$this->Session->setFlash(__l('Appointment deleted'), 'default', null, 'success');
			$this->redirect(array('action' => 'index'));
		} else {
			throw new NotFoundException(__l('Invalid request'));
		}
	}
	function _getAppointmentTime($setup_date = null, $time = null)
	{
		$conditions['Appointment.appointment_date'] = $setup_date;
		$conditions['Appointment.appointment_time'] = $time;	
		$appointment = $this->Appointment->find('first', array(
            'conditions' => $conditions,
            'recursive' => -1
        ));
		return $appointment;
	}
	function test() {
		$appointment = $this->Appointment->find('first', array(
					'conditions' => array(
						'Appointment.id = ' => 3
					),
					'contain' => array(
						'User' => array(
							'UserProfile' => array(
							    'fields' => array(
									'UserProfile.phone',
								)
							) ,
							'fields' => array(
								'User.username',
							)
						),
						'DoctorUser' => array(
							'UserProfile' => array(
								'fields' => array(
									'UserProfile.phone',
									)
								) ,
							'fields' => array(
								'DoctorUser.username',
							)
						),
					),
					'recursive' => 2,
		    	));
			echo '<pre>';	
			print_r($appointment);die;
	}
}
?>