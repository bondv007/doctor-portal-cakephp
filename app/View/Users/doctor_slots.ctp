<div class="js-search-calendar-response">
<?php 
		$day_list = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
		$month_list = array('january','february','march','april','may','june','july','august','september','october','november','december');
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
            if (strtolower($month) == $month_list[$i]) {
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
            $next_month = $month_list[$next_month-1];
        }
        $prev_month_num = null;
        if ($prev_month == 0) {
            $prev_month_num = 12;
            $prev_month = 'december';
            $prev_year = intval($year) -1;
        } else {
            $prev_month_num = $prev_month;
            $prev_month = $month_list[$prev_month-1];
        }
        if ($year == date('Y') && strtolower($month) == strtolower(date('F'))) {
            // set the flag that shows todays date but only in the current month - not past or future...
            $today = date('j');
        }
		if(empty($search_day)) {
			$search_day = $day;
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
		$prev_url = Router::url(array(
            'controller' => 'users',
            'action' => 'doctor_slots',
            $prev_year,
            $prev_month,
            $prev_week,
			'users' =>$userids
        ) , true);
		$next_url = Router::url(array(
            'controller' => 'users',
            'action' => 'doctor_slots',
            $next_year,
            $next_month,
            $next_week,
			'users' =>$userids
        ) , true);
?>
	

 <div class="week-slider-block clearfix">
          <div class="week-slider grid_right">
			<?php echo $this->Html->link(__l('left arrow'), $prev_url, array('class'=>'left-arrow js-search-calender-prev','title' => __l('left arrow')));?>
            <ul class="day-list">
			<?php 
				$j= 0;	
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
					if($day+$i-$offset == 1) {
						$month_num = $month_num + 1;
						if($month_num >= 13) {
							$month_num = 1;
							$year = $next_year;
						}
					}
				?>
              <li>
                <h5><?php echo __l($day_list[$i]);?></h5>
                <span><?php echo $month_num .'-'. ($day+$i-$offset) .'-'.date('y', strtotime($year));?></span>
			  </li>
			  
			  <?php } ?>
            </ul>
			<?php echo $this->Html->link(__l('right arrow'), $next_url, array('class'=>'right-arrow js-search-calender-next','title' => __l('right arrow')));?>
		 </div>
        </div>
		<?php 
			$search_month_num = date('m');
		?>
		<ol class="doctor-list">
         <?php	 if(!empty($users)) {
		      		foreach($users as $user) {
						?>
		  <li class="clearfix">
		    <div class="appointment-time">
              <ul class="week-list">
			  <?php 
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
			$daysinday =  strtolower($day_list[$i]);
			$current_month_day = date('Y-m-d',strtotime($year.'-'.$search_month_num.'-'.($search_day+$i-$search_offset)));	
			$set_timings = $this->Html->getDoctorSlots($current_month_day, $user);
			$user_id = $user['User']['id'];
			$timing_id = $this->Html->getAppointSearchTimingsID($current_month_day,$user);
			?>
              <li class="<?php echo $daysinday;?>-list">
              <ul class="appointment-list">
			  <?php 
			  	if(!empty($set_timings)) {
					   foreach($set_timings as $times) { 
					   	$appointment_info = $this->Html->getAlreadyExistAppointmentDetails($current_month_day,$times,$user['User']['id']);
						if(empty($appointment_info)) {
						$appointment_url = $this->Html->link(__l($times) , array(
							'controller' => 'appointments',
							'action' => 'booking',
							'doctor' => $user_id,
							'timing_id' => $timing_id,
							'date' => $current_month_day,
							'time' => $times
						));
				?>		
                	<li><?php echo $appointment_url;?></li>
					<?php }  ?>
				<?php 
					}
					 } else {?>
							<li>&nbsp;</li>
					<?php 		
					}
				?>	
              </ul>
              </li>
			  <?php }
			  
			  ?>
              </ul>
            </div>

          </li>
		  <?php
		  	 
		  		}
		  	}  
		  ?>
        </ol>
      </div>