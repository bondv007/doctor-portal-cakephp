<?php
$i = 0;
do {
    $user->paginate = array(
        'conditions' => $conditions,
        'offset' => $i,
		'order' => array(
			'User.id' => 'desc'
		) ,
        'recursive' => -1
    );		
    if(!empty($q)){
        $user->paginate['search'] = $q;
    }
    $Users = $user->paginate();	
    if (!empty($Users)) {
        $data = array();
        foreach($Users as $key => $User) {
	        $data[]['User'] = array(
            __l('Username') => $User['User']['username'],
            __l('Email') => $User['User']['email'],            
            __l('Login count') => $User['User']['user_login_count']
          	);
			if (isPluginEnabled('Contests')) {
				$contest = array(
					 __l('Created Contests') => $User['User']['contest_count'],					
					 __l('Entries Posted') => $User['User']['contest_user_count'],
					 __l('Earned Amount') => $User['User']['participant_total_earned_amount'],
				);
				$data[$key]['User'] = array_merge($data[$key]['User'], $contest);
			}
			if (isPluginEnabled('Wallet')) {
				$wallet= array (
					 __l('Available Balance') => $User['User']['available_wallet_amount']
				);
				$data[$key]['User'] = array_merge($data[$key]['User'], $wallet);
			}
        }
        if (!$i) {
            $this->Csv->addGrid($data);
        } else {
            $this->Csv->addGrid($data, false);
        }
    }
    $i+= 20;
}
while (empty($Users));
echo $this->Csv->render(true);
?>