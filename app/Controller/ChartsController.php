<?php
class ChartsController extends AppController
{
    public $name = 'Charts';
    public $lastDays;
    public $lastMonths;
    public $lastYears;
    public $lastWeeks;
    public $selectRanges;
    public $lastDaysStartDate;
    public $lastMonthsStartDate;
    public $lastYearsStartDate;
    public $lastWeeksStartDate;
    public function initChart()
    {
        //# last days date settings
        $days = 6;
        $this->lastDaysStartDate = date('Y-m-d', strtotime("-$days days"));
        for ($i = $days; $i > 0; $i--) {
            $this->lastDays[] = array(
                'display' => date('D, M d', strtotime("-$i days")) ,
                'conditions' => array(
                    "DATE_FORMAT(#MODEL#.created, '%Y-%m-%d')" => date('Y-m-d', strtotime("-$i days")) ,
                )
            );
        }
        $this->lastDays[] = array(
            'display' => date('D, M d') ,
            'conditions' => array(
                "DATE_FORMAT(#MODEL#.created, '%Y-%m-%d')" => date('Y-m-d')
            )
        );
        //# last weeks date settings
        $timestamp_end = strtotime('last Saturday');
        $weeks = 3;
        $this->lastWeeksStartDate = date('Y-m-d', $timestamp_end-((($weeks*7) -1) *24*3600));
        for ($i = $weeks; $i > 0; $i--) {
            $start = $timestamp_end-((($i*7) -1) *24*3600);
            $end = $start+(6*24*3600);
            $this->lastWeeks[] = array(
                'display' => date('M d', $start) . ' - ' . date('M d', $end) ,
                'conditions' => array(
                    '#MODEL#.created >=' => date('Y-m-d', $start) ,
                    '#MODEL#.created <=' => date('Y-m-d', $end) ,
                )
            );
        }
        $this->lastWeeks[] = array(
            'display' => date('M d', $timestamp_end+24*3600) . ' - ' . date('M d') ,
            'conditions' => array(
                '#MODEL#.created >=' => date('Y-m-d', $timestamp_end+24*3600) ,
                '#MODEL#.created <=' => date('Y-m-d')
            )
        );
        //# last months date settings
        $months = 2;
        $this->lastMonthsStartDate = date('Y-m-01', strtotime("-$i months", strtotime(date("F") . "1")));
        for ($i = $months; $i > 0; $i--) {
            $this->lastMonths[] = array(
                'display' => date('M, Y', strtotime("-$i months")) ,
                'conditions' => array(
                    "DATE_FORMAT(#MODEL#.created, '%Y-%m')" => _formatDate('Y-m', date('Y-m-d', strtotime("-$i months")) , true)
                )
            );
        }
        $this->lastMonths[] = array(
            'display' => date('M, Y') ,
            'conditions' => array(
                "DATE_FORMAT(#MODEL#.created, '%Y-%m')" => _formatDate('Y-m', date('Y-m-d') , true)
            )
        );
        //# last years date settings
        $years = 2;
        $this->lastYearsStartDate = date('Y-01-01', strtotime("-$years years"));
        for ($i = $years; $i > 0; $i--) {
            $this->lastYears[] = array(
                'display' => date('Y', strtotime("-$i years")) ,
                'conditions' => array(
                    "DATE_FORMAT(#MODEL#.created, '%Y')" => _formatDate('Y', date('Y-m-d', strtotime("-$i years")) , true)
                )
            );
        }
        $this->lastYears[] = array(
            'display' => date('Y') ,
            'conditions' => array(
                "DATE_FORMAT(#MODEL#.created, '%Y')" => _formatDate('Y', date('Y-m-d') , true)
            )
        );
        $this->selectRanges = array(
            'lastDays' => __l('Last 7 days') ,
            'lastWeeks' => __l('Last 4 weeks') ,
            'lastMonths' => __l('Last 3 months') ,
            'lastYears' => __l('Last 3 years')
        );
    }  
    public function admin_chart_overview()
    {
        $this->initChart();
    }
    public function admin_chart_users()
    {
        $this->initChart();
        $this->loadModel('User');
        if (isset($this->request->params['named']['role_id'])) {
            $this->request->data['Chart']['role_id'] = $this->request->params['named']['role_id'];
        }
        if (isset($this->request->params['named']['select_range_id'])) {
            $this->request->data['Chart']['select_range_id'] = $this->request->params['named']['select_range_id'];
        }
        if (!empty($this->request->data['Chart']['is_ajax_load'])) {
            $this->request->params['named']['is_ajax_load'] = $this->request->data['Chart']['is_ajax_load'];
        }
        if (isset($this->request->data['Chart']['select_range_id'])) {
            $select_var = $this->request->data['Chart']['select_range_id'];
        } else {
            $select_var = 'lastDays';
        }
        $role_id = ConstUserTypes::User;
        $this->request->data['Chart']['select_range_id'] = $select_var;
        $this->request->data['Chart']['role_id'] = $role_id;
        $model_datas['Normal'] = array(
            'display' => __l('Normal') ,
            'conditions' => array(
                'User.is_facebook_register' => 0,
                'User.is_twitter_register' => 0,
                'User.is_openid_register' => 0,
                'User.is_gmail_register' => 0,
                'User.is_yahoo_register' => 0,
            )
        );
        $model_datas['Twitter'] = array(
            'display' => __l('Twitter') ,
            'conditions' => array(
                'User.is_twitter_register' => 1,
            ) ,
        );
        if (Configure::read('facebook.is_enabled_facebook_connect')) {
            $model_datas['Facebook'] = array(
                'display' => __l('Facebook') ,
                'conditions' => array(
                    'User.is_facebook_register' => 1,
                )
            );
        }
        if (Configure::read('user.is_enable_openid') || Configure::read('user.is_enable_gmail_openid') || Configure::read('user.is_enable_yahoo_openid')) {
            $model_datas['OpenID'] = array(
                'display' => __l('OpenID') ,
                'conditions' => array(
                    'User.is_openid_register' => 1,
                )
            );
        }
        $model_datas['Gmail'] = array(
            'display' => __l('Gmail') ,
            'conditions' => array(
                'User.is_gmail_register' => 1,
            )
        );
        $model_datas['Yahoo'] = array(
            'display' => __l('Yahoo') ,
            'conditions' => array(
                'User.is_yahoo_register' => 1,
            )
        );
        if (Configure::read('affiliate.is_enabled')) {
            $_periods['Affiliate'] = array(
                'display' => __l('Affiliate') ,
                'conditions' => array(
                    'User.is_affiliate_user' => 1,
                )
            );
        }
        $model_datas['All'] = array(
            'display' => __l('All') ,
            'conditions' => array()
        );
        $common_conditions = array(
            'User.role_id' => $role_id
        );
        $_data = $this->_setLineData($select_var, $model_datas, 'User', 'User', $common_conditions);
        $this->set('chart_data', $_data);
        $this->set('chart_periods', $model_datas);
        $this->set('selectRanges', $this->selectRanges);
        // overall pie chart
        $select_var.= 'StartDate';
        $startDate = $this->$select_var;
        $endDate = date('Y-m-d 23:59:59');
        $total_users = $this->User->find('count', array(
            'conditions' => array(
                'User.role_id' => $role_id,
                'created >=' => $startDate,
                'created <=' => $endDate
            ) ,
            'recursive' => -1
        ));
        unset($model_datas['All']);
        unset($model_datas['Affiliate']);
        $_pie_data = $chart_pie_gender_data = array();
        if (!empty($total_users)) {
            foreach($model_datas as $_period) {
                $new_conditions = array();
                $new_conditions = array_merge($_period['conditions'], array(
                    'created >=' => $startDate,
                    'created <=' => $endDate
                ));
                $new_conditions['User.role_id'] = $role_id;
                $sub_total = $this->User->find('count', array(
                    'conditions' => $new_conditions,
                    'recursive' => -1
                ));
                $_pie_data[$_period['display']] = number_format(($sub_total/$total_users) *100, 2);
            }
            // demographics
            $conditions = array(
                'User.created >=' => $startDate,
                'User.created <=' => $endDate,
                'User.role_id' => $role_id
            );
            $this->_setDemographics($total_users, $conditions);
        }
        $this->set('chart_pie_data', $_pie_data);
        $is_ajax_load = false;
        if ($this->RequestHandler->isAjax()) {
            $is_ajax_load = true;
        }
        $this->set('is_ajax_load', $is_ajax_load);
    }
    public function admin_chart_user_logins()
    {
        $this->initChart();
        $this->loadModel('UserLogin');
        if (isset($this->request->params['named']['role_id'])) {
            $this->request->data['Chart']['role_id'] = $this->request->params['named']['role_id'];
        }
        if (isset($this->request->params['named']['select_range_id'])) {
            $this->request->data['Chart']['select_range_id'] = $this->request->params['named']['select_range_id'];
        }
        if (isset($this->request->data['Chart']['is_ajax_load'])) {
            $this->request->params['named']['is_ajax_load'] = $this->request->data['Chart']['is_ajax_load'];
        }
        if (isset($this->request->data['Chart']['select_range_id'])) {
            $select_var = $this->request->data['Chart']['select_range_id'];
        } else {
            $select_var = 'lastDays';
        }
        $role_id = ConstUserTypes::User;
        $this->request->data['Chart']['select_range_id'] = $select_var;
        $this->request->data['Chart']['role_id'] = $role_id;
        $model_datas['Normal'] = array(
            'display' => __l('Normal') ,
            'conditions' => array(
                'User.is_facebook_register' => 0,
                'User.is_twitter_register' => 0,
                'User.is_openid_register' => 0,
                'User.is_gmail_register' => 0,
                'User.is_yahoo_register' => 0,
            )
        );
        $model_datas['Twitter'] = array(
            'display' => __l('Twitter') ,
            'conditions' => array(
                'User.is_twitter_register' => 1,
            ) ,
        );
        if (Configure::read('facebook.is_enabled_facebook_connect')) {
            $model_datas['Facebook'] = array(
                'display' => __l('Facebook') ,
                'conditions' => array(
                    'User.is_facebook_register' => 1,
                )
            );
        }
        if (Configure::read('user.is_enable_openid') || Configure::read('user.is_enable_gmail_openid') || Configure::read('user.is_enable_yahoo_openid')) {
            $model_datas['OpenID'] = array(
                'display' => __l('OpenID') ,
                'conditions' => array(
                    'User.is_openid_register' => 1,
                )
            );
        }
        $model_datas['Gmail'] = array(
            'display' => __l('Gmail') ,
            'conditions' => array(
                'User.is_gmail_register' => 1,
            )
        );
        $model_datas['Yahoo'] = array(
            'display' => __l('Yahoo') ,
            'conditions' => array(
                'User.is_yahoo_register' => 1,
            )
        );
        $model_datas['All'] = array(
            'display' => __l('All') ,
            'conditions' => array()
        );
        $common_conditions = array(
            'User.role_id' => $role_id
        );
        $_data = $this->_setLineData($select_var, $model_datas, 'UserLogin', 'UserLogin', $common_conditions);
        $this->set('chart_data', $_data);
        $this->set('chart_periods', $model_datas);
        $this->set('selectRanges', $this->selectRanges);
        // overall pie chart
        $select_var.= 'StartDate';
        $startDate = $this->$select_var;
        $endDate = date('Y-m-d H:i:s');
        $total_users = $this->UserLogin->find('count', array(
            'conditions' => array(
                'User.role_id' => $role_id,
                'UserLogin.created >=' => $startDate,
                'UserLogin.created <=' => $endDate,
            ) ,
            'recursive' => 0
        ));
        unset($model_datas['All']);
        $_pie_data = array();
        if (!empty($total_users)) {
            foreach($model_datas as $_period) {
                $new_conditions = array();
                $new_conditions = array_merge($_period['conditions'], array(
                    'UserLogin.created >=' => $startDate,
                    'UserLogin.created <=' => $endDate
                ));
                $new_conditions['User.role_id'] = $role_id;
                $sub_total = $this->UserLogin->find('count', array(
                    'conditions' => $new_conditions,
                    'recursive' => 0
                ));
                $_pie_data[$_period['display']] = number_format(($sub_total/$total_users) *100, 2);
            }
        }
        $this->set('chart_pie_data', $_pie_data);
        $is_ajax_load = false;
        if ($this->RequestHandler->isAjax()) {
            $is_ajax_load = true;
        }
        $this->set('is_ajax_load', $is_ajax_load);
    }
    protected function _setDemographics($total_users = null, $conditions = array())
    {
        //# genders
        $this->loadModel('User');
        $this->loadModel('Gender');
        $this->loadModel('UserProfile');
        $not_mentioned = array(
            '0' => __l('Not Mentioned')
        );
        $chart_pie_gender_data = $chart_pie_age_data = array();
        $genders = $this->Gender->find('list');
        $genders = array_merge($not_mentioned, $genders);
        foreach($genders As $gen_key => $gender) {
            $new_conditions = $conditions;
            if ($gen_key == 0) {
                $new_conditions['UserProfile.gender_id'] = NULL;
            } else {
                $new_conditions['UserProfile.gender_id'] = $gen_key;
            }
            $gender_count = $this->UserProfile->find('count', array(
                'conditions' => $new_conditions,
                'recursive' => 0
            ));
            $chart_pie_gender_data[$gender] = number_format(($gender_count/$total_users) *100, 2);
        }
        //# age calculation
        $user_ages = array(
            '1' => __l('18 - 34 Yrs') ,
            '2' => __l('35 - 44 Yrs') ,
            '3' => __l('45 - 54 Yrs') ,
            '4' => __l('55+ Yrs')
        );
        $user_ages = array_merge($not_mentioned, $user_ages);
        foreach($user_ages As $age_key => $user_ages) {
            $new_conditions = $conditions;
            if ($age_key == 1) {
                $new_conditions['Year(Now()) - Year(UserProfile.dob) >= '] = 18;
                $new_conditions['Year(Now()) - Year(UserProfile.dob) <= '] = 34;
            } elseif ($age_key == 2) {
                $new_conditions['Year(Now()) - Year(UserProfile.dob) >= '] = 35;
                $new_conditions['Year(Now()) - Year(UserProfile.dob) <= '] = 44;
            } elseif ($age_key == 3) {
                $new_conditions['Year(Now()) - Year(UserProfile.dob) >= '] = 45;
                $new_conditions['Year(Now()) - Year(UserProfile.dob) <= '] = 54;
            } elseif ($age_key == 4) {
                $new_conditions['Year(Now()) - Year(UserProfile.dob) >= '] = 55;
            } elseif ($age_key == 0) {
                $new_conditions['UserProfile.dob'] = NULL;
            }
            $age_count = $this->User->UserProfile->find('count', array(
                'conditions' => $new_conditions,
                'recursive' => 0
            ));
            $chart_pie_age_data[$user_ages] = number_format(($age_count/$total_users) *100, 2);
        }
    }
    protected function _setLineData($select_var, $model_datas, $models, $model = '', $common_conditions = array())
    {
        if (is_array($models)) {
            foreach($models as $m) {
                $this->loadModel($m);
            }
        } else {
            $this->loadModel($models);
            $model = $models;
        }
        $_data = array();
        foreach($this->$select_var as $val) {
            foreach($model_datas as $model_data) {
                $new_conditions = array();
                foreach($val['conditions'] as $key => $v) {
                    $key = str_replace('#MODEL#', $model, $key);
                    $new_conditions[$key] = $v;
                }
                $new_conditions = array_merge($new_conditions, $model_data['conditions']);
                $new_conditions = array_merge($new_conditions, $common_conditions);
                if (isset($model_data['model'])) {
                    $modelClass = $model_data['model'];
                } else {
                    $modelClass = $model;
                }
                $_data[$val['display']][] = $this->{$modelClass}->find('count', array(
                    'conditions' => $new_conditions,
                    'recursive' => 0
                ));
            }
        }
        return $_data;
    }
    public function admin_chart_stats()
    {
    }
}
