<?php
class CalendarHelper extends Helper
{
    var $month_list = array(
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
    var $day_list = array(
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday'
    );
    var $helpers = array(
        'Html',
        'Form'
    );
    /**
     * Perpares a list of GET params that are tacked on to next/prev. links.
     * @retunr string - urlencoded GET params.
     */
    function getParams()
    {
        $params = array();
        foreach($this->params['url'] as $key => $val) if ($key != 'url') $params[] = urlencode($key) . '=' . urlencode($val);
        return (count($params) > 0 ? '?' . join('&', $params) : '');
    }
    /**
     * Generates a Calendar for the specified by the month and year params and populates it with the content of the data array
     *
     * @param $year string
     * @param $month string
     * @param $data array
     * @param $base_url
     * @return string - HTML code to display calendar in view
     *
     */
	function month($year = '', $month = '', $day = '', $data = '')
    {
        $str = '';
        $day = 1;
        $today = 0;
        if ($year == '' || $month == '') { // just use current yeear & month
            $year = date('Y');
            $month = date('m');
        }
        $flag = 0;
        for ($i = 0; $i < 12; $i++) {
            if (strtolower($month) == $this->month_list[$i]) {
                if (intval($year) != 0) {
                    $flag = 1;
                    $month_num = $i+1;
                    break;
                }
            }
        }
        if ($flag == 0) {
            $year = date('Y');
            $month = date('F');
            $month_num = date('m');
        }
        $next_year = $year;
        $prev_year = $year;
        $next_month = intval($month_num) +1;
        $prev_month = intval($month_num) -1;
        if ($next_month == 13) {
            $next_month = 'january';
            $next_year = intval($year) +1;
        } else {
            $next_month = $this->month_list[$next_month-1];
        }
        if ($prev_month == 0) {
            $prev_month = 'december';
            $prev_year = intval($year) -1;
        } else {
            $prev_month = $this->month_list[$prev_month-1];
        }
        if ($year == date('Y') && strtolower($month) == strtolower(date('F'))) {
            // set the flag that shows todays date but only in the current month - not past or future...
            $today = date('j');
        }
		
        $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
        $first_day_in_month = date('D', mktime(0, 0, 0, $month_num, 1, $year));

        $str.= '<div class="appdoc-title-block a1">';
        $str.= $this->Html->link(__l('prev') , array(
            'controller' => 'doctor_availabilities',
            'action' => 'index',
            $prev_year,
            $prev_month,
            'type' => 'calendar',
			'show' => 'monthly',
            $this->getParams()
        ), array('class' => 'prev'));
        $str.= ucfirst($month).$year;
        $str.= $this->Html->link(__l('next') , array(
            'controller' => 'doctor_availabilities',
            'action' => 'index',
            $next_year,
            $next_month,
            'type' => 'calendar',
			'show' => 'monthly',
            $this->getParams()
        ), array('class' => 'next'));
        $str.= '</div>';
		$str.= '<table width="100%" cellpadding="0" cellspacing="1" border="0" class="calendar">';
		$first_day = date('D', mktime(0, 0, 0, $month_num, 1, $year));
		$day_of_week = date('D', mktime(0, 0, 0, $month_num, 1, $year));
		switch($day_of_week)
		{
			case "Mon": $blank = 0; break;
			case "Tue": $blank = 1; break;
			case "Wed": $blank = 2; break;
			case "Thu": $blank = 3; break;
			case "Fri": $blank = 4; break;
			case "Sat": $blank = 5; break;
			case "Sun": $blank = 6; break;
		}
		$days_in_week = array(
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
			'Sunday'
		);
		$days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
		$str.= '<tr>';
		foreach($days_in_week as $dy){
			if($dy==$days_in_week[0]||$dy==$days_in_week[6]){
				$str.= '<th class="cell-header">'.$dy.'</th>';
			}else{
				$str.= '<th class="cell-header">'.$dy.'</th>';
			}
		}
		$str.= '</tr>';
		$day_count = 1;
		$str.= '<tr>';
		//blank days
		while ( $blank > 0 ) {
			$str.= '<td class="date-blank">&nbsp;</td>';
			$blank = $blank-1;
			$day_count++;
		}
		//sets the first day of the month to 1
		$day_num = 1;
		//count up the days, untill we've done all of them in the month
		while ( $day_num <= $days_in_month )
		{
			$current_month_day = date('Y-m-d',strtotime($year.'-'.$month_num.'-'.$day_num));
			$appointment_timings = $this->getAppointTimings($current_month_day,$data);
			$str.= '<td class="date"><span class="monthly-date">'.$this->content_in_cell($day_num,$month,$year).'</span><div class="app-fixed-block">';
			if(!empty($appointment_timings)) {
			$str.= '<div class="app-inner-block">';
				foreach($appointment_timings as $times) { 
					$appointment_info = $this->getAppointmentDetails($current_month_day,$times,$data);
					if(!empty($appointment_info)) {
						$patient_name = ucfirst($appointment_info['first_name']. ' '. $appointment_info['last_name']);
						$user_url = $this->Html->link(__l($patient_name) , array(
							'controller' => 'appointments',
							'action' => 'view',
							$appointment_info['appointment_id']
	       				 ));
						$str.= '<p>' .$user_url .'</p>';
					} else {
						$str.= '<p>'. $times .'</p>';
					}
				}
			$str.= '</div>';
			} else {
				$str.= __l('');
			}
			$str.= '</div></td>';
			$day_num++;
			$day_count++;
		//Make sure we start a new row every week
			if ($day_count > 7)
			{
				$str.= "</tr><tr>";
				$day_count = 1;
			}
		}
		//Finaly we finish out the table with some blank details if needed
		while ( $day_count >1 && $day_count <=7 )
		{
			$str.= "<td>&nbsp; </td>";
			$day_count++;
		}
		$str.= '</thead>';
        $str.= '</table>';
        return $str;
    }	 
    /**
     * Generates a Calendar for the week specified by the day, month and year params and populates it with the content of the data array
     *
     * @param $year string
     * @param $month string
     * @param $day string
     * @param $data array[day][hour] // @changed this array format to array[day-hour]
     * @param $base_url
     * @return string - HTML code to display calendar in view
     *
     */
    function week($year = '', $month = '', $day = '', $data = '', $base_url = '', $min_hour = 9, $max_hour = 18)
    {
        $str = '';
        $today = 0;
        if ($year == '' || $month == '') { // just use current yeear & month
            $year = date('Y');
            $month = date('F');
            $day = date('d');
            $month_num = date('m');
        }
        $flag = 0;
        for ($i = 0; $i < 12; $i++) {
            if (strtolower($month) == $this->month_list[$i]) {
                if (intval($year) != 0) {
                    $flag = 1;
                    $month_num = $i+1;
                    break;
                }
            }
        }
        if ($flag == 1) {
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
            if ($day <= 0 || $day > $days_in_month) {
                $flag = 0;
            }
        }
        if ($flag == 0) {
            $year = date('Y');
            $month = date('F');
            $month_num = date('m');
            $day = date('d');
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
        }
        $next_year = $year;
        $prev_year = $year;
        $next_month = intval($month_num);
        $prev_month = intval($month_num);
        $next_week = intval($day) +7;
        $prev_week = intval($day) -7;
        if ($next_week > $days_in_month) {
            $next_week = $next_week-$days_in_month;
            $next_month++;
        }
        if ($prev_week <= 0) {
            $prev_month--;
            $prev_week = date('t', mktime(0, 0, 0, $prev_month, $year)) +$prev_week;
        }
        $next_month_num = null;
        if ($next_month == 13) {
            $next_month_num = 1;
            $next_month = 'january';
            $next_year = intval($year) +1;
        } else {
            $next_month_num = $next_month;
            $next_month = $this->month_list[$next_month-1];
        }
        $prev_month_num = null;
        if ($prev_month == 0) {
            $prev_month_num = 12;
            $prev_month = 'december';
            $prev_year = intval($year) -1;
        } else {
            $prev_month_num = $prev_month;
            $prev_month = $this->month_list[$prev_month-1];
        }
        if ($year == date('Y') && strtolower($month) == strtolower(date('F'))) {
            // set the flag that shows todays date but only in the current month - not past or future...
            $today = date('j');
        }
        //count back day until its monday
        while (date('D', mktime(0, 0, 0, $month_num, $day, $year)) != 'Mon') {
            $day--;
            $new_date = strtotime($year . '-' . $month_num . '-' . $day);
            list($year, $month_num, $day) = explode('-', date('Y-m-d', $new_date));
        }
        $week_arr = explode('-', date('Y-m-d'));
        while (date('D', mktime(0, 0, 0, $week_arr[1], $week_arr[2], $week_arr[0])) != 'Mon') {
            $week_arr[2]--;
        }
        $this_week = $week_arr[0] . '-' . $week_arr[1] . '-' . $week_arr[2];
        $current_week = date('Y-m-d', strtotime($year . '-' . $month_num . '-' . $day));
        if ($this_week == $current_week) {
            $title = __l('Current Week');
        } else {
            $from_date_format = 'F jS';
            if (date('Y', strtotime(date($current_week))) != date('Y')) {
                $from_date_format = 'F jS Y';
            }
            $from_date = date($from_date_format, strtotime(date($current_week)));
            $end_week = date('Y-m-d', strtotime(date($year . '-' . $month_num . '-' . $day) . '+6 days'));
            $end_date = date('F jS Y', strtotime(date($end_week)));
            $title = sprintf(__l('From %s to %s') , $from_date, $end_date);
        }
        $str.= '<div class="appdoc-title-block a2">';
        $str.= $this->Html->link(__l('Prev Week') , array(
            'controller' => 'doctor_availabilities',
            'action' => 'index',
            $prev_year,
            $prev_month,
            $prev_week,
            'type' => 'calendar',
            'show' => 'weekly',
            $this->getParams()
        ), array('class' => 'prev'));
        $str.= $title;
        $str.= $this->Html->link(__l('Next Week') , array(
            'controller' => 'doctor_availabilities',
            'action' => 'index',
            $next_year,
            $next_month,
            $next_week,
            'type' => 'calendar',
            'show' => 'weekly',
            $this->getParams()
        ), array('class' => 'next'));
        $str.= '</div>';
		$str.= '<table width="100%" cellpadding="0" cellspacing="1" border="0" class="calendar">';
        $str.= '<tr>';
        for ($i = 0; $i < 7; $i++) {
            $offset = 0;
            if ($day+$i > $days_in_month) {
                $offset = $days_in_month;
            } else if ($day+$i < 1) {
                $offset = -date('t', mktime(1, 1, 1, $prev_month_num, 1, $prev_year));
            }
            $str.= '<th class="cell-header"><span class="day">' . ($day+$i-$offset) .'</span>' . $this->day_list[$i] .   '</th>';
        }
        $str.= '</tr>';
        $str.= '</thead>';
        $str.= '<tbody>';
        $str.= '<tr>';
		for ($i = 0; $i < 7; $i++) {
			$offset = 0;
			if ($day+$i > $days_in_month) {
				$offset = $days_in_month;
			} else if ($day+$i < 1) {
				$offset = -date('t', mktime(1, 1, 1, $prev_month_num, 1, $prev_year));
			}
			if($day+$i-$offset == 1) {
				$month_num = $month_num + 1;
				if($month_num >= 13) {
					$month_num = 1;
					$year = $next_year;
				}
			} 
		$current_month_day = date('Y-m-d',strtotime($year.'-'.$month_num.'-'.($day+$i-$offset)));
		$set_timings = $this->getAppointTimings($current_month_day,$data);
		if(!empty($set_timings)) {
			$str.= '<td><div class="app-fixed-block"><div class="app-inner-block">';
			foreach($set_timings as $times) { 
				$appointment_info = $this->getAppointmentDetails($current_month_day,$times,$data);
				if(!empty($appointment_info)) {
					$patient_name = ucfirst($appointment_info['first_name']. ' '. $appointment_info['last_name']);
					$user_url = $this->Html->link(__l($patient_name) , array(
						'controller' => 'appointments',
						'action' => 'view',
						$appointment_info['appointment_id']
	        		));
					$str.= '<p>' .$user_url .'</p>';
				} else {
					$str.= '<p>' .$times .'</p>';
				} 
			}	
			$str.= '</div></div></td>';
			} else {
				$str.= '<td>' . __l('') . '</td>';
			} 
        }
		$str.= '</tr>';	
        $str.= '</tbody>';
        $str.= '</table>';

        return $str;
    }
	function doctor_profile_calendar($year = '', $month = '', $day = '', $data = '', $user_id = '',$clinic_id='', $min_hour = 9, $max_hour = 18)
    {
		$str = '';
        $today = 0;
        if ($year == '' || $month == '') { // just use current yeear & month
            $year = date('Y');
            $month = date('F');
            $day = date('d');
            $month_num = date('m');
        }
        $flag = 0;
        for ($i = 0; $i < 12; $i++) {
            if (strtolower($month) == $this->month_list[$i]) {
                if (intval($year) != 0) {
                    $flag = 1;
                    $month_num = $i+1;
                    break;
                }
            }
        }
        if ($flag == 1) {
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
            if ($day <= 0 || $day > $days_in_month) {
                $flag = 0;
            }
        }
        if ($flag == 0) {
            $year = date('Y');
            $month = date('F');
            $month_num = date('m');
            $day = date('d');
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
        }
        $next_year = $year;
        $prev_year = $year;
        $next_month = intval($month_num);
        $prev_month = intval($month_num);
        $next_week = intval($day) +7;
        $prev_week = intval($day) -7;
        if ($next_week > $days_in_month) {
            $next_week = $next_week-$days_in_month;
            $next_month++;
        }
        if ($prev_week <= 0) {
            $prev_month--;
            $prev_week = date('t', mktime(0, 0, 0, $prev_month, $year)) +$prev_week;
        }
        $next_month_num = null;
        if ($next_month == 13) {
            $next_month_num = 1;
            $next_month = 'january';
            $next_year = intval($year) +1;
        } else {
            $next_month_num = $next_month;
            $next_month = $this->month_list[$next_month-1];
        }
        $prev_month_num = null;
        if ($prev_month == 0) {
            $prev_month_num = 12;
            $prev_month = 'december';
            $prev_year = intval($year) -1;
        } else {
            $prev_month_num = $prev_month;
            $prev_month = $this->month_list[$prev_month-1];
        }
        if ($year == date('Y') && strtolower($month) == strtolower(date('F'))) {
            // set the flag that shows todays date but only in the current month - not past or future...
            $today = date('j');
        }
        //count back day until its monday
        while (date('D', mktime(0, 0, 0, $month_num, $day, $year)) != 'Mon') {
            $day--;
            $new_date = strtotime($year . '-' . $month_num . '-' . $day);
            list($year, $month_num, $day) = explode('-', date('Y-m-d', $new_date));
        }
        $week_arr = explode('-', date('Y-m-d'));
        while (date('D', mktime(0, 0, 0, $week_arr[1], $week_arr[2], $week_arr[0])) != 'Mon') {
            $week_arr[2]--;
        }
        $this_week = $week_arr[0] . '-' . $week_arr[1] . '-' . $week_arr[2];
        $current_week = date('Y-m-d', strtotime($year . '-' . $month_num . '-' . $day));
        if ($this_week == $current_week) {
            $title = __l('Current Week');
        } else {
            $from_date_format = 'F jS';
            if (date('Y', strtotime(date($current_week))) != date('Y')) {
                $from_date_format = 'F jS Y';
            }
            $from_date = date($from_date_format, strtotime(date($current_week)));
            $end_week = date('Y-m-d', strtotime(date($year . '-' . $month_num . '-' . $day) . '+6 days'));
            $end_date = date('F jS Y', strtotime(date($end_week)));
            $title = sprintf(__l('From %s to %s') , $from_date, $end_date);
        }
        $str.= $this->Form->create('Todo', array(
            'class' => 'normal'
        ));



        $str.= '<div class="appdoc-title-block a3">';
        $prev_url = Router::url(array(
            'controller' => 'doctor_availabilities',
            'action' => 'index',
            $prev_year,
            $prev_month,
            $prev_week,
            'type' => 'doctor-profile',
            'show' => 'weekly',
			'user_id' => $user_id,
			'clinic_id'=>$clinic_id,
            $this->getParams()
        ) , true);
 	    $str.= "<span class='prev {\"url\":\"$prev_url\"} js-calender-prev'>";
        $str.= 'Prev';
        $str.= '</span>';
		$str.= $title ;
        $next_url = Router::url(array(
            'controller' => 'doctor_availabilities',
            'action' => 'index',
            $next_year,
            $next_month,
            $next_week,
            'type' => 'doctor-profile',
            'show' => 'weekly',
			'user_id' => $user_id,
			'clinic_id'=>$clinic_id,
            $this->getParams()
        ) , true);
        $str.= "<span class='next {\"url\":\"$next_url\"} js-calender-next'>";
        $str.= 'Next';
        $str.= '</span>';
        $str.= '</div>';


        $str.= '<table width="100%" cellpadding="0" cellspacing="1" border="0" class="docapp-calendar">';
        $str.= '<thead>';
        $str.= '<tr>';
		//$day = $today;
		$j= 0 ;
        for ($i = 0; $i < 7; $i++) {
			$class = null;
			if ($j++ % 2 == 0) {
				$class = "altcol";
			}
            $offset = 0;
            if ($day+$i > $days_in_month) {
                $offset = $days_in_month;
            } else if ($day+$i < 1) {
                $offset = -date('t', mktime(1, 1, 1, $prev_month_num, 1, $prev_year));
            }
			$str.= '<th class="'.$class.'">' . $this->day_list[$i];
			if ($day+$i > $days_in_month) {
			$str.= '<span>' . $next_month_num .'-'. ($day+$i-$offset) .'-'.date('y', strtotime($year)).'</span></th>';
            }
			else
			{
			$str.= '<span>' . $month_num .'-'. ($day+$i-$offset) .'-'.date('y', strtotime($year)).'</span></th>';
			}
        }
        $str.= '</tr>';
        $str.= '</thead>';
        $str.= '<tbody>';
        $str.= '<tr>';
		$k= 0 ;
		for ($i = 0; $i < 7; $i++) {
			$class = null;
			if ($k++ % 2 == 0) {
				$class = "altcol";
			}
			$offset = 0;
			if ($day+$i > $days_in_month) {
				$offset = $days_in_month;
			} else if ($day+$i < 1) {
				$offset = -date('t', mktime(1, 1, 1, $prev_month_num, 1, $prev_year));
			}
			if($day+$i-$offset == 1) {
				$month_num = $month_num ;

				if($month_num >= 13) {
					$month_num = 1;
					$year = $next_year;
				}

			} 
		$current_month_day = date('Y-m-d',strtotime($year.'-'.$month_num.'-'.($day+$i-$offset)));
		$set_timings = $this->getAppointTimings($current_month_day,$data);
		if(!empty($set_timings)) {
			$str.= '<td class="'.$class.'">';
			foreach($set_timings as $times) { 
				$timing_id = $this->getAppointTimingsID($current_month_day,$data);
				$appointment_url = $this->Html->link($times , array(
						'controller' => 'appointments',
						'action' => 'booking',
						'doctor' => $user_id,
						'timing_id' => $timing_id,
						'date' => $current_month_day,
						'time' => $times
        		));

				$appointment_info = $this->getAppointmentDetails($current_month_day,$times,$data);
				if(!empty($appointment_info)) {
					$appointment_url = '<center><font color=red>'.$times.'</font></center>';
				}

				$str.= '<p>' .$appointment_url.'</p>';
			}	
		$str.= '</td>';
			} else {
				$str.= '<td class="'.$class.'">&nbsp;</td>';
			} 
        }
		$str.= '</tr>';	
        $str.= '</tbody>';
        $str.= '</table>';
        
        $str.= $this->Form->end();
        return $str;
    }
	
	function doctor_search_calendar($year = '', $month = '', $day = '', $data = '')
    {
		$str = '';
        $today = 0;
        if ($year == '' || $month == '') { // just use current yeear & month
            $year = date('Y');
            $month = date('F');
            $day = date('d');
			$search_day = date('d');
            $month_num = date('m');
        }
        $flag = 0;
        for ($i = 0; $i < 12; $i++) {
            if (strtolower($month) == $this->month_list[$i]) {
                if (intval($year) != 0) {
                    $flag = 1;
                    $month_num = $i+1;
                    break;
                }
            }
        }
        if ($flag == 1) {
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
            if ($day <= 0 || $day > $days_in_month) {
                $flag = 0;
            }
        }
        if ($flag == 0) {
            $year = date('Y');
            $month = date('F');
            $month_num = date('m');
            $day = date('d');
			$search_day = date('d');
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
        }
        $next_year = $year;
        $prev_year = $year;
        $next_month = intval($month_num);
        $prev_month = intval($month_num);
        $next_week = intval($day) +7;
        $prev_week = intval($day) -7;
        if ($next_week > $days_in_month) {
            $next_week = $next_week-$days_in_month;
            $next_month++;
        }
        if ($prev_week <= 0) {
            $prev_month--;
            $prev_week = date('t', mktime(0, 0, 0, $prev_month, $year)) +$prev_week;
        }
        $next_month_num = null;
        if ($next_month == 13) {
            $next_month_num = 1;
            $next_month = 'january';
            $next_year = intval($year) +1;
        } else {
            $next_month_num = $next_month;
            $next_month = $this->month_list[$next_month-1];
        }
        $prev_month_num = null;
        if ($prev_month == 0) {
            $prev_month_num = 12;
            $prev_month = 'december';
            $prev_year = intval($year) -1;
        } else {
            $prev_month_num = $prev_month;
            $prev_month = $this->month_list[$prev_month-1];
        }
        if ($year == date('Y') && strtolower($month) == strtolower(date('F'))) {
            // set the flag that shows todays date but only in the current month - not past or future...
            $today = date('j');
        }
        //count back day until its monday
        while (date('D', mktime(0, 0, 0, $month_num, $day, $year)) != 'Mon') {
            $day--;
			$search_day--; 
            $new_date = strtotime($year . '-' . $month_num . '-' . $day);
            list($year, $month_num, $day) = explode('-', date('Y-m-d', $new_date));
        }
        $week_arr = explode('-', date('Y-m-d'));
        while (date('D', mktime(0, 0, 0, $week_arr[1], $week_arr[2], $week_arr[0])) != 'Mon') {
            $week_arr[2]--;
        }
        $this_week = $week_arr[0] . '-' . $week_arr[1] . '-' . $week_arr[2];
        $current_week = date('Y-m-d', strtotime($year . '-' . $month_num . '-' . $day));
        if ($this_week == $current_week) {
            $title = __l('Current Week');
        } else {
            $from_date_format = 'F jS';
            if (date('Y', strtotime(date($current_week))) != date('Y')) {
                $from_date_format = 'F jS Y';
            }
            $from_date = date($from_date_format, strtotime(date($current_week)));
            $end_week = date('Y-m-d', strtotime(date($year . '-' . $month_num . '-' . $day) . '+6 days'));
            $end_date = date('F jS Y', strtotime(date($end_week)));
            $title = sprintf(__l('From %s to %s') , $from_date, $end_date);
        }
        $str.= '<div class="week-slider-block clearfix">';
		$str.= '<div class="week-slider grid_right">';
		$prev_url = Router::url(array(
            'controller' => 'users',
            'action' => 'search',
            $prev_year,
            $prev_month,
            $prev_week,
			'type' => 'search-calendar',
            $this->getParams()
        ) , true);
		$next_url = Router::url(array(
            'controller' => 'users',
            'action' => 'search',
            $next_year,
            $next_month,
            $next_week,
			'type' => 'search-calendar',
            $this->getParams()
        ) , true);
		$str.= "<a class='left-arrow {\"url\":\"$prev_url\"} js-search-calender-prev'>";
        $str.= '</a>';
		$str.= '<ul class="day-list">';
		$j= 0 ;
        for ($i = 0; $i < 7; $i++) {
		$str.= '<li>';
			$class = null;
			if ($j++ % 2 == 0) {
				$class = "altcol";
			}
            $offset = 0;
            if ($day+$i > $days_in_month) {
                $offset = $days_in_month;
            } else if ($day+$i < 1) {
                $offset = -date('t', mktime(1, 1, 1, $prev_month_num, 1, $prev_year));
            }
			if($day+$i-$offset == 1) {
				$month_num = $month_num + 1;
				if($month_num >= 13) {
					$month_num = 1;
					$year = $next_year;
				}
			}
			$str.= '<h5>' . $this->day_list[$i] . '</h5>';
			$str.= '<span>' . $month_num .'-'. ($day+$i-$offset) .'-'.date('y', strtotime($year)).'</span>';
			$str.= '</li>';	
        }
        $str.= "<a class='right-arrow {\"url\":\"$next_url\"} js-search-calender-next'>";
        $str.= '</a>';
        $str.= '</div>';	
		$str.= '</div>';

		$search_month_num = date('m');
		$str.= '<ol class="doctor-list">';
			if(!empty($data)) {
		       foreach($data as $user) {

			   	$str.= '<li class="clearfix">';
					$str.= '<div class="appointment-time">';
			        	$str.= '<ul class="week-list">';
				$k= 0 ;
				for ($i = 0; $i < 7; $i++) {
					$class = null;
					if ($k++ % 2 == 0) {
						$class = "altcol";
					}
				$search_offset = 0;
				if ($search_day+$i > $days_in_month) {
					$search_offset = $days_in_month;
				} else if ($day+$i < 1) {
					$search_offset = -date('t', mktime(1, 1, 1, $prev_month_num, 1, $prev_year));
				}
				if($day+$i-$search_offset == 1) {
					$search_month_num = $search_month_num + 1;
					if($search_month_num >= 13) {
						$search_month_num = 1;
						$year = $next_year;
					}
				} 
			$daysinday =  strtolower($this->day_list[$i]);
			$current_month_day = date('Y-m-d',strtotime($year.'-'.$search_month_num.'-'.($search_day+$i-$search_offset)));	
			$set_timings = $this->getSearchDoctorAppointTimings($current_month_day,$user);
			$user_id = $user['User']['id'];
			$timing_id = $this->getAppointSearchTimingsID($current_month_day,$user);
			$str.= '<li class="'.$daysinday.'-list">';
				$str.= '<ul class="appointment-list">';
					if(!empty($set_timings)) {
					   foreach($set_timings as $times) { 
						$appointment_url = $this->Html->link(__l($times) , array(
							'controller' => 'appointments',
							'action' => 'booking',
							'doctor' => $user_id,
							'timing_id' => $timing_id,
							'date' => $current_month_day,
							'time' => $times
						));
						      $str.= '<li>'.$appointment_url.'</li>';
						}
					 } else {
							$str.= '<li>&nbsp;</li>';
					}
							$str.= '</ul>';
					     $str.= '</li>';
		  		  }
				   $str.= '</ul>';
       			$str.= '</div>';
			$str.= '</li>';
			} //end foreach for data
		}// end if for data
		$str.= '</ol>';
	    return $str;
    }
    /**
     * Generates a Calendar for the daily specified by the day, month and year params and populates it with the content of the data array
     *
     * @param $year string
     * @param $month string
     * @param $day string
     * @param $data array[day][hour] // @changed this array format to array[day-hour]
     * @param $base_url
     * @return string - HTML code to display calendar in view
     *
     */
    function daily($year = '', $month = '', $day = '', $data = '', $base_url = '', $min_hour = 0, $max_hour = 24)
    {
        $str = '';
        $today = 0;
        if ($year == '' || $month == '') { // just use current yeear & month
            $year = date('Y');
            $month = date('F');
            $day = date('d');
            $month_num = date('m');
        }
        $flag = 0;
        for ($i = 0; $i < 12; $i++) {
            if (strtolower($month) == $this->month_list[$i]) {
                if (intval($year) != 0) {
                    $flag = 1;
                    $month_num = $i+1;
                    break;
                }
            }
        }
        if ($flag == 1) {
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
            if ($day <= 0 || $day > $days_in_month) {
                $flag = 0;
            }
        }
        if ($flag == 0) {
            $year = date('Y');
            $month = date('F');
            $month_num = date('m');
            $day = date('d');
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
        }
        $next_year = $year;
        $prev_year = $year;
        $next_month = intval($month_num);
        $prev_month = intval($month_num);
        $next_day = intval($day) +1;
        $prev_day = intval($day) -1;
        if ($next_day > $days_in_month) {
            $next_day = $next_day-$days_in_month;
            $next_month++;
        }
        if ($prev_day <= 0) {
            $prev_month--;
            $prev_day = date('t', mktime(0, 0, 0, $prev_month, $year)) +$prev_day;
        }
        $next_month_num = null;
        if ($next_month == 13) {
            $next_month_num = 1;
            $next_month = 'january';
            $next_year = intval($year) +1;
        } else {
            $next_month_num = $next_month;
            $next_month = $this->month_list[$next_month-1];
        }
        $prev_month_num = null;
        if ($prev_month == 0) {
            $prev_month_num = 12;
            $prev_month = 'december';
            $prev_year = intval($year) -1;
        } else {
            $prev_month_num = $prev_month;
            $prev_month = $this->month_list[$prev_month-1];
        }
        if ($year == date('Y') && strtolower($month) == strtolower(date('F'))) {
            // set the flag that shows todays date but only in the current month - not past or future...
            $today = date('j');
        }
        if ($today == $day) {
            $title = __l('Today');
        } else {
            $title = date('F jS Y', strtotime(date($year . '-' . $month_num . '-' . $day)));
			
        }
        $str.= '<div class="appdoc-title-block a4">';
        $str.= $this->Html->link(__l('Prev Day') , array(
            'controller' => 'doctor_availabilities',
            'action' => 'index',
            $prev_year,
            $prev_month,
            $prev_day,
            'type' => 'calendar',
            'show' => 'daily',
            $this->getParams()
        ), array('class' => 'prev'));
        $str.= $title;
        $str.= $this->Html->link(__l('Next Day') , array(
            'controller' => 'doctor_availabilities',
            'action' => 'index',
            $next_year,
            $next_month,
            $next_day,
            'type' => 'calendar',
            'show' => 'daily',
            $this->getParams()
        ), array('class' => 'next'));
        $str.= '</div>';
        $str.= '<table width="100%" cellpadding="0" cellspacing="1" border="0" class="calendar">';
        $str.= '<tbody>';
		$current_month_day = date('Y-m-d',strtotime($year.'-'.$month_num.'-'.$day));
		$appointment_timings = $this->getAppointTimings($current_month_day,$data);
		if(!empty($appointment_timings)) {	 
			foreach($appointment_timings as $times) { 
		$str.= '<tr class="time-cell">';
		$str.= '<td>';
		$str.= '<div class="daily-cell-number date-content">' . $times;
		$str.= '</div>';
		$str.= '</td>';
		$appointment_info = $this->getAppointmentDetails($current_month_day,$times,$data);
		$str.= '<td colspan="2" style="vertical-align:middle;">';
		if(!empty($appointment_info)) {
			$patient_name = ucfirst($appointment_info['first_name']. ' '. $appointment_info['last_name']);
			$user_url = $this->Html->link(__l($patient_name) , array(
				'controller' => 'appointments',
				'action' => 'view',
				$appointment_info['appointment_id']
	        ));
			$str.= '<div class="daily-cell-number date-content">' . $user_url .'</div>';
		}  
		$str.= '</td>';
		$str.= '</tr>'; 	
			}
		} else {
			$str.= '<tr>';
			$str.= '<td colspan="3" style="vertical-align:middle;">' . __l('No available time') . '</td>';
			$str.= '</tr>';
		}
        $str.= '</tbody>';
        $str.= '</table>';

        return $str;
    }
	function timeslot($year = null, $month = null, $day = '', $data = '')
	{
		//day string
		$days_in_week = array(
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
			'Sunday'
		);
		
		//This gets today's date
		$date =time () ;
		//month, and year in seperate variables
		//use current month and year if they are not set
		 $str = '';
        if ($year == '' || $month == '' || $day == '') { // just use current yeear & month
            $year = date('Y');
            $month = date('m');
            $day = date('d');
        }
        $flag = 0;
        for ($i = 0; $i < 12; $i++) {
            if (strtolower($month) == $this->month_list[$i]) {
                if (intval($year) != 0) {
                    $flag = 1;
                    $month = $i+1;
                    break;
                }
            }
        }
		if ($flag == 1) {
            $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
            if ($day <= 0 || $day > $days_in_month) {
                $flag = 0;
            }
        }
        if ($flag == 0) {
            $year = date('Y');
            $month = date('m');
        }
		//Here we generate the first day of the month
		//date("Y-m-d", mktime(0, 0, 0, date("m"), 1, date("Y")));
        //$first_day_in_month1 = date('D', mktime(0, 0, 0, $month, 1, $year));
		//echo  date('D', mktime(0, 0, 0, $month, 1, $year));
		$first_day = date('D', mktime(0, 0, 0, $month, 1, $year));
		//$first_day = date("m/d/Y", mktime(0, 0, 0, $month.'/01/'.$year.' 00:00:00'));
		//This gets us the month name
		//$title = date('F', $first_day) ;
		//Here we find out what day of the week the first day of the month falls on
		//echo $day_of_week = date('D', $first_day) ;
		$day_of_week = date('D', mktime(0, 0, 0, $month, 1, $year));
		//Once we know what day of the week it falls on, we know how many blank days occure before it. If the first day of the week is a Sunday then it would be zero
		switch($day_of_week)
		{
			case "Mon": $blank = 0; break;
			case "Tue": $blank = 1; break;
			case "Wed": $blank = 2; break;
			case "Thu": $blank = 3; break;
			case "Fri": $blank = 4; break;
			case "Sat": $blank = 5; break;
			case "Sun": $blank = 6; break;
		}
		//how many days are in the current month
		$days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));

		echo '<div>';
		//building the table heads
		echo '<table width="100%" cellpadding="0" cellspacing="1" border="0" class="timeslot">';
		echo '<thead>';
		echo '<tr>';
		foreach($days_in_week as $dy){
			if($dy==$days_in_week[0]||$dy==$days_in_week[6]){
				echo '<th valign="middle">'.$dy.'</th>';
			}else{
				echo '<th valign="middle">'.$dy.'</th>';
			}
		}
		echo '<tr/>';
		echo '</thead>';
		//days in the week, up to 7
		$day_count = 1;
		echo '<tr>';
		//blank days
		while ( $blank > 0 ) {
			echo '<td class="date-blank">&nbsp;</td>';
			$blank = $blank-1;
			$day_count++;
		}
		//sets the first day of the month to 1
		$day_num = 1;
		//count up the days, untill we've done all of them in the month
		while ( $day_num <= $days_in_month )
		{
			$current_month_day = date('Y-m-d',strtotime($year.'-'.$month.'-'.$day_num));
			$appointment_timings = $this->getAppointTimings($current_month_day,$data);
			
			echo '<td class="date"><span class="monthly-date">'.$this->content_in_cell($day_num,$month,$year).'</span><div class="app-fixed-block">';
			if(!empty($appointment_timings)) {
    		$str.= '<div class="app-inner-block">';
				foreach($appointment_timings as $times) { 
					$appointment_info = $this->getAppointmentDetails($current_month_day,$times,$data);
					$cid='';
					$cid=$this->getAppointClinicID($current_month_day,$data);
					$bgcolor='';
					$bgcolor=$cid;
					if(!empty($appointment_info)) {
						$patient_name = ucfirst($appointment_info['first_name']. ' '. $appointment_info['last_name']);
						$user_url = $this->Html->link(__l($patient_name) , array(
							'controller' => 'appointments',
							'action' => 'view',
							$appointment_info['appointment_id']
	       				 ));
						echo '<p style="background:'.$bgcolor.'">' .$times .' - '. $user_url .'</p>';
					} else {
						echo '<p style="background:'.$bgcolor.'">'. $times .'</p>';
					}
				}
					echo '</div>';
			} else {
				echo '';
			}
			echo '</div></td>';
			$day_num++;
			$day_count++;
		//Make sure we start a new row every week
			if ($day_count > 7)
			{
				echo "</tr><tr>";
				$day_count = 1;
			}
		}
		//Finaly we finish out the table with some blank details if needed
		while ( $day_count >1 && $day_count <=7 )
		{
			echo "<td>&nbsp; </td>";
			$day_count++;
		}
		
		echo "</tr></table>";
		echo '</div>';
		echo '</div>';
	}
	
	function getAppointTimings($setup_date = '', $appointment_data = array())
	{
		$split_time = '';
		if(!empty($appointment_data)) {
			foreach($appointment_data as $timings) {
				if($timings['DoctorAvailabilityTiming']['availability_date'] == $setup_date) {
					$time_data .= $timings['DoctorAvailabilityTiming']['timings'];
					$time_data .=',';
				}
			}
		}
							$split_time = explode(',', $time_data);

		return array_filter($split_time);
	}
	
	
	
	function getSearchDoctorAppointTimings($setup_date = '', $appointment_data = array())
	{
		$split_time = '';
		if(!empty($appointment_data['DoctorAvailability']['DoctorAvailabilityTiming'])) {
			foreach($appointment_data['DoctorAvailability']['DoctorAvailabilityTiming'] as $timings) {
				if($timings['availability_date'] == $setup_date) {
					$time_data = $timings['timings'];
					$split_time = explode(',', $time_data);
				}
			}
		}
		return $split_time;
	}
	function getAppointTimingsID($setup_date = '', $appointment_data = array())
	{
		$time_id = '';
		if(!empty($appointment_data)) {
			foreach($appointment_data as $timings) {
				if($timings['DoctorAvailabilityTiming']['availability_date'] == $setup_date) {
					$time_id = $timings['DoctorAvailabilityTiming']['id'];
				}
			}
		}
		return $time_id;
	}
	function getAppointSearchTimingsID($setup_date = '', $appointment_data = array())
	{
		$time_id = '';
		if(!empty($appointment_data['DoctorAvailability']['DoctorAvailabilityTiming'])) {
			foreach($appointment_data['DoctorAvailability']['DoctorAvailabilityTiming'] as $timings) {
				if($timings['availability_date'] == $setup_date) {
					$time_id = $timings['id'];
				}
			}
		}
		return $time_id;
	}
	function getAppointClinicID($setup_date = '', $appointment_data = array())
	{
		$clinic_id = '';
		if(!empty($appointment_data)) {
			foreach($appointment_data as $timings) {
				if($timings['DoctorAvailabilityTiming']['availability_date'] == $setup_date) {
					$clinic_id = $timings['DoctorAvailabilityTiming']['clinic_id'];
				}
			}
		}
		return $clinic_id;
	}
	function getAppointmentDetails($setup_date = '', $time = '', $appointment_data = array())
	{
		$user_info = array();
		if(!empty($appointment_data)) {
			foreach($appointment_data as $app) {
				$appt_data = $app['Appointment'];
					if(!empty($appt_data)) {
						foreach($appt_data as $user) {
							if($user['appointment_date'] == $setup_date and $user['appointment_time'] == $time ) {
								$user_info['appointment_id'] = $user['id'];
								$user_info['first_name'] = $user['first_name'];
								$user_info['last_name'] = $user['last_name'];
								if(!empty($user['Appointment']['is_guest_appointment'])) {
									$user_info['first_name'] = $user['guest_first_name'];
									$user_info['last_name'] = $user['guest_last_name'];
								 }
							 }
						}		
					}
			}
		} 
		return $user_info;
	}
	
	function updateAppointTimings($setup_date = '', $appointment_data = array())
	{
		$time_data = '';
		if(!empty($appointment_data)) {
			foreach($appointment_data as $timings) {
				if($timings['DoctorAvailabilityTiming']['availability_date'] == $setup_date) {
					$time_data['id'] = $timings['DoctorAvailabilityTiming']['id'];
					$time_data['timings'] = $timings['DoctorAvailabilityTiming']['timings'];
				}
			}
		}
		return $time_data;
	}
	/*
	* set content in each cell
	* @param $day string 1,2,3 /01,02,03 both format possible
	* @param $month string 1,2,3 /01,02,03 both format possible
	* @param $year string 2010,2012,2013
	* Currently it will show a submit button for all dates ahead today
	*/
	 function content_in_cell($day,$month,$year)
	 {
	 	 return $day;
	 }
 
 	function doctor_calendar_month($year = '', $month = '', $data = '', $user_id = '', $clinic_id = '')
    {
        $str = '';
        $day = 1;
        $today = 0;
        if ($year == '' || $month == '') { // just use current yeear & month
            $year = date('Y');
            $month = date('m');
        }
        $flag = 0;
		
        for ($i = 0; $i < 12; $i++) {
            if (strtolower($month) == $this->month_list[$i]) {
                if (intval($year) != 0) {
                    $flag = 1;
                    $month_num = $i+1;
                    break;
                }
            }
        }
        if ($flag == 0) {
            $year = date('Y');
            $month = date('F');
            $month_num = date('m');
        }
        $next_year = $year;
        $prev_year = $year;
        $next_month = intval($month_num) +1;
        $prev_month = intval($month_num) -1;
        if ($next_month == 13) {
            $next_month = 'january';
            $next_year = intval($year) +1;
        } else {
            $next_month = $this->month_list[$next_month-1];
        }
        if ($prev_month == 0) {
            $prev_month = 'december';
            $prev_year = intval($year) -1;
        } else {
            $prev_month = $this->month_list[$prev_month-1];
        }
        if ($year == date('Y') && strtolower($month) == strtolower(date('F'))) {
            // set the flag that shows todays date but only in the current month - not past or future...
            $today = date('j');
        }
        $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
        $first_day_in_month = date('D', mktime(0, 0, 0, $month_num, 1, $year));
		$str.= '<div class="hasDatepicker js-calender-permonth js-calender-form-calender" id="datepicker">';
		$str.= '<div class="calendar-month">';
		$prev_url = Router::url(array(
            'controller' => 'doctor_availabilities',
            'action' => 'doctor_calender',
            'doctor',
			$user_id,$clinic_id,
            'month' => $prev_month,
            'year' => $prev_year,
        ) , true);
        $str.= "<span class='prev {\"url\":\"$prev_url\"} js-calender-prev ui-datepicker-prev ui-corner-all'>";
        $str.= 'Prev';
        $str.= '</span>';
		$str.= ' <div class="monthly-info" title="' . ucfirst($month) . '"> <span class="ui-datepicker-month">' . ucfirst(__l($month)) . '</span> <span class="ui-datepicker-year ">' . $year . '</span><div>';
		$next_url = Router::url(array(
            'controller' => 'doctor_availabilities',
            'action' => 'doctor_calender',
            'doctor',
			$user_id,$clinic_id,
            'month' => $next_month,
            'year' => $next_year
        ) , true);
        $str.= " <span class='next {\"url\":\"$next_url\"} js-calender-next ui-datepicker-next ui-corner-all'>";
        $str.= 'Next';
        $str.= '</span></div>';
        $str.= '</div></div></div>';
        
		$first_day = date('D', mktime(0, 0, 0, $month_num, 1, $year));
		$day_of_week = date('D', mktime(0, 0, 0, $month_num, 1, $year));
		switch($day_of_week)
		{
			case "Mon": $blank = 1; break;
			case "Tue": $blank = 2; break;
			case "Wed": $blank = 3; break;
			case "Thu": $blank = 4; break;
			case "Fri": $blank = 5; break;
			case "Sat": $blank = 6; break;
			case "Sun": $blank = 0; break;
		}
		$days_in_week = array(
			'Sunday',
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
		);
		$days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
		$str.= '<table class="datepicker-night-mode" width="100%">';
        $str.= '<thead>';
        $str.= '<tr>';
		 for ($i = 0; $i < 7; $i++) {
            $str.= '<th class="calendar-head">' . substr($days_in_week[$i], 0, 1) . '</th>';
        }
        $str.= '</tr>';
        $str.= '</thead>';       
		$str.= '<tbody>';
		$str.= '<tr>';
		$day_count = 1;
		//blank days
		while ( $blank > 0 ) {
			$str.= '<td class="date-blank">&nbsp;</td>';
			$blank = $blank-1;
			$day_count++;
		}
		//sets the first day of the month to 1
		$day_num = 1;
		//count up the days, untill we've done all of them in the month
		while ( $day_num <= $days_in_month )
		{
			$daily_url = $this->Html->link(__l($this->content_in_cell($day_num,$month,$year)) , array(
				'controller' => 'doctor_availabilities',
				'action' => 'index',
					$year,
					$month,
					$this->content_in_cell($day_num,$month,$year),
				'type' => 'calendar',
				'show' => 'daily',
				$this->getParams()
    	    ));
			$today = date('j');
			$class = '';
			if($day_num == $today) {
				$class = ' cal-today';
            }
			$str.= '<td class="date'.$class.'"><span>'.$daily_url.'</span></td>';
			$day_num++;
			$day_count++;
		//Make sure we start a new row every week
			if ($day_count > 7)
			{
				$str.= "</tr><tr>";
				$day_count = 1;
			}
		}
		//Finaly we finish out the table with some blank details if needed
		while ( $day_count >1 && $day_count <=7 )
		{
			$str.= "<td>&nbsp; </td>";
			$day_count++;
		}
        $str.= '</tbody>';
        $str.= '</table>';
        return $str;
    }
	function setup_time($year = '', $month = '', $day = '', $data = '', $user_id = '', $clinic_id='')
    {
        $str = '';
        $today = 0;
        if ($year == '' || $month == '') { // just use current yeear & month
            $year = date('Y');
            $month = date('F');
            $day = date('d');
            $month_num = date('m');
        }
        $flag = 0;
        for ($i = 0; $i < 12; $i++) {
            if (strtolower($month) == $this->month_list[$i]) {
                if (intval($year) != 0) {
                    $flag = 1;
                    $month_num = $i+1;
                    break;
                }
            }
        }
        if ($flag == 1) {
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
            if ($day <= 0 || $day > $days_in_month) {
                $flag = 0;
            }
        }
        if ($flag == 0) {
            $year = date('Y');
            $month = date('F');
            $month_num = date('m');
            $day = date('d');
            $days_in_month = date('t', mktime(0, 0, 0, $month_num, 1, $year));
        }
        $next_year = $year;
        $prev_year = $year;
        $next_month = intval($month_num);
        $prev_month = intval($month_num);
        $next_week = intval($day) +7;
        $prev_week = intval($day) -7;
        if ($next_week > $days_in_month) {
            $next_week = $next_week-$days_in_month;
            $next_month++;
        }
        if ($prev_week <= 0) {
            $prev_month--;
            $prev_week = date('t', mktime(0, 0, 0, $prev_month, $year)) +$prev_week;
        }
        $next_month_num = null;
        if ($next_month == 13) {
            $next_month_num = 1;
            $next_month = 'january';
            $next_year = intval($year) +1;
        } else {
            $next_month_num = $next_month;
            $next_month = $this->month_list[$next_month-1];
        }
        $prev_month_num = null;
        if ($prev_month == 0) {
            $prev_month_num = 12;
            $prev_month = 'december';
            $prev_year = intval($year) -1;
        } else {
            $prev_month_num = $prev_month;
            $prev_month = $this->month_list[$prev_month-1];
        }
        if ($year == date('Y') && strtolower($month) == strtolower(date('F'))) {
            // set the flag that shows todays date but only in the current month - not past or future...
            $today = date('j');
        }
        //count back day until its monday
        while (date('D', mktime(0, 0, 0, $month_num, $day, $year)) != 'Mon') {
            $day--;
            $new_date = strtotime($year . '-' . $month_num . '-' . $day);
            list($year, $month_num, $day) = explode('-', date('Y-m-d', $new_date));
        }
        $week_arr = explode('-', date('Y-m-d'));
        while (date('D', mktime(0, 0, 0, $week_arr[1], $week_arr[2], $week_arr[0])) != 'Mon') {
            $week_arr[2]--;
        }
        $this_week = $week_arr[0] . '-' . $week_arr[1] . '-' . $week_arr[2];
        $current_week = date('Y-m-d', strtotime($year . '-' . $month_num . '-' . $day));
		$from_date_format = 'F jS';
		if (date('Y', strtotime(date($current_week))) != date('Y')) {
			$from_date_format = 'F jS Y';
		}
		$from_date = date($from_date_format, strtotime(date($current_week)));
		$end_week = date('Y-m-d', strtotime(date($year . '-' . $month_num . '-' . $day) . '+6 days'));
		$end_date = date('F jS Y', strtotime(date($end_week)));
		$title = sprintf(__l('From %s to %s') , $from_date, $end_date);
         
        $str.= $this->Form->create('DoctorAvailability', array(
            'class' => 'normal',
			'action' => 'setup_time'
        ));
        $str.= '<table width="100%" cellpadding="0" cellspacing="0" border="0" class="app-calendar">';
        $str.= '<thead>';
		$str.= '<tr>';
        $str.= '<th colspan="2">' . $title . '</th>';
        $str.= '</tr>';
		// Get Timeslots
		$timeslots = $this->getAppointmentTimeSlots();
        for ($i = 0; $i < 7; $i++) {
            $offset = 0;
            if ($day+$i > $days_in_month) {
                $offset = $days_in_month;
            } else if ($day+$i < 1) {
                $offset = -date('t', mktime(1, 1, 1, $prev_month_num, 1, $prev_year));
            }
            $str.= '<tr>';
			$str.= '<td>' . '<span class="date-style">' . ($day+$i-$offset) . '</span>' . $this->day_list[$i] . '</td>';
			if($day+$i-$offset == 1) {
				$month_num = $month_num + 1;
				if($month_num >= 13) {
					$month_num = 1;
					$year = $next_year;
				}
				else
				{
				$month_num = $month_num - 1;

				}
			} 
			$today = date('d').'-'.date('m').'-'.date('Y');
			$current_day = ($day+$i-$offset).'-'.$month_num.'-'.$year;
			$next_day = date('d-m-Y', strtotime(date($current_day)));
			$current_month_day = date('Y-m-d',strtotime($year.'-'.$month_num.'-'.($day+$i-$offset)));
			$appointment_timings = $this->updateAppointTimings($current_month_day,$data);
			$set_timings = $this->getAppointTimings($current_month_day,$data);
			if(strtotime($today) <= strtotime($next_day)) {
					$str.= '<td>' . $this->Form->input('timings-' . ($i), array(
										'class' => 'js-choosen-select',
										'label' => false,
										'multiple' => true,
										'value' => $set_timings,
										'options' => $timeslots,
										'type' =>'select'
					)) . '</td>';
					$str.=  $this->Form->input('setup_date-'.($i), array(
										'label' => false,
										'type' => 'hidden',
										'value' => ($day+$i-$offset.'-'.$month_num.'-'.$year)
					)) ;
					
			} else {
				if(!empty($set_timings)) {
					$str.= '<td colspan="2">';
						foreach($set_timings as $times) { 
								$str.= '<span>' .$times .'</span>';
						}	
					$str.= '</td>';
				} else {
					$str.= '<td colspan="2">' . __l('No available time') . '</td>';
				}	
			}
			if(strtotime($today) <= strtotime($next_day)){	
			$str.= '<td><a class="add_btn" href="javascript:void(0)"  onclick="getTimeFields('.$i.')">Add</a></td></tr>';
			$str.='<tr id="dropDn'.$i.'" style="display:none"><td style="width:35%">Start Time<select  id="timeDDn1'.$i.'"  onchange="add_values('.$i.',this.value)"></select></td><td style="width:35%">End Time<select  id="timeDDn2'.$i.'"  onchange="add_values('.$i.',this.value)"></select></td></tr>';
			
			}
        }
     
        $str.= '</thead>';
        $str.= '</table>';
		
		$str.= '<table width="100%" cellpadding="0" cellspacing="0" border="0" class="navi-block">';
		   $str.= '<tr>';
		$str.= '<td width="50%" class="icon-pre">';
		$str.= $this->Html->link(__l('Prev Week') , array(
					'controller' => 'doctor_availabilities',
					'action' => 'setup_time',
					$prev_year,
					$prev_month,
					$prev_week,
					$user_id,
					$this->getParams(),
					'clinic_id'=>$clinic_id
				));
		$str.= '</td>';
		$str.= '<td>';
		$str.= $this->Form->submit(__l('Setup Available'));
		$str.= '</td>';
		$str.= '<td width="50%" class="icon-next">';
		$str.= $this->Html->link(__l('Next Week') , array(
					'controller' => 'doctor_availabilities',
					'action' => 'setup_time',
					$next_year,
					$next_month,
					$next_week,
					$user_id,
					$this->getParams(),
					'clinic_id'=>$clinic_id
				));		
		$str.= '</td>';
		$str.= '</tr>';
		$str.= '</table>';
		$str.=  $this->Form->input('user_id', array(
						'label' => false,
						'type' => 'hidden',
						'value' => $user_id
				)) ;	
		$str.=  $this->Form->input('clinic_id', array(
						'label' => false,
						'type' => 'hidden',
						'value' => $clinic_id
				)) ;	
        $str.= $this->Form->end();
        return $str;
    }
	
	
	
	
	function getAppointmentTimeSlots()
	{
		 $time = '00:00'; // start
		 $times = array();
		 for ($i = 0; $i <= 3600; $i++)
		 {
			 $prev = date('H:i A', strtotime($time)); // format the start time
			 $next = strtotime('+60mins', strtotime($time)); // add 30 mins
			 $time = date('h:i a', $next); // format the next time
			 $times[$prev] = $prev;
		 }
		 return $times;
	} 

	function getClinicColor($id)
	{
	if(($id%2)==0)
		{
		$color='#B5F2B6';
		}
	if(($id%3)==0)
		{
		$color='#F1EFA3';
		}
	if(($id%4)==0)
		{
		$color='#F3CCB4';
		}
	if(($id%5)==0)
		{
		$color='#B3F4DC';
		}
	if(($id%6)==0)
		{
		$color='#C2E1F8';
		}
	if(($id%7)==0)
		{
		$color='#EBD0FB';
		}
	if(($id%8)==0)
		{
		$color='#EDDEEC';
		}
	if(($id%9)==0)
		{
		$color='#F1E0DA';
		}
	if(($id%10)==0)
		{
		$color='#E8E3E6';
		}
	
	return $color;
	
	}
}
?>