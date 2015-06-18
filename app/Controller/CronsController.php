<?php
class CronsController extends AppController
{
    public $name = 'Crons';
    public $components = array(
        'Cron',
    );
    public function main()
    {
        $this->Cron->main();
        $this->Session->setFlash(__l('Status updated successfully') , 'default', null, 'success');
        $this->redirect(Router::url(array(
            'controller' => 'nodes',
            'action' => 'tools',
            'admin' => true
        ) , true));
    }			public function reminder_sms() {		//Configure::write('debug', 2);		$this->loadModel('Appointment');		$smsinfo['mobile'] = 9711950715;
		$smsinfo['message'] = 'Dear vivek your appointment with Dr. abc is scheduled at '.date("F j, Y", strtotime('2015-06-16')).' 01:15 Call at 950022122 to modify or cancel booking';
$smsdata = $this->Appointment->sendSMS($smsinfo);
		echo '<pre>'; print_r($smsdata); die;		$appointments = $this->Appointment->find('all', array(									'conditions' => array(										'Appointment.appointment_status_id' => 2,										'Appointment.reminder_sms' => 1,										'Appointment.reminder_sent' => 0,										'Appointment.appointment_date' => date('Y-m-d')									)								));						if( !empty($appointments) ) {			$cur_time = time();			$valid = array();								foreach($appointments as $app){				$apptime = strtotime($app['Appointment']['appointment_time']);									$reminder_time = $apptime - ($app['Appointment']['reminder_time']*60);								$from_time = $cur_time - 598;				$to_time = $cur_time + 2;				//echo $apptime.'<br>'.$from_time.'<br>'.$to_time; die; 						if($from_time <= $reminder_time && $to_time > $reminder_time) {					$valid[] = $app;				}				//echo '<pre>'; print_r($valid); die;												if(!empty($valid)) {									$sent = array();					$i = 0;				foreach($valid as $val){					//Send SMS to Patient					$smsinfo['mobile'] = $val['Appointment']['phone'];					$smsinfo['message'] = 'Dear '.$val['User']['username'].' your appointment with Dr. '. $val['DoctorUser']['name'].' is scheduled at '.date("F j, Y", strtotime($val['Appointment']['appointment_date'])).' '.$val['Appointment']['appointment_time'].'. Call at 950022122 to modify or cancel booking';					$smsdata = $this->Appointment->sendSMS($smsinfo);										$sent[$i]['data'] = json_encode($val);					$sent[$i]['phone'] = $val['Appointment']['phone'];					$sent[$i]['sms'] = $smsinfo['message'];					$sent[$i]['created'] = date('Y-m-d H:i:s');										$this->Appointment->id = $val['Appointment']['id'];					$this->Appointment->save(array('reminder_sent' => 1));										$i++;				}												//$this->loadModel('Log');				//$this->Log->create();				//$this->Log->saveAll($sent);			}						echo 'sent'; die;						}		}		die; 			}		public function test() {		echo time(); die;	}	
}
