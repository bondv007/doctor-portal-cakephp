 <?php
	$foldertype = isset($folder_type) ? $folder_type : '';
	$compose = ( isset($this->request->params['action']) and ($this->request->params['action'] =='compose')) ? 'compose' : '';
	$contacts = ( isset($this->request->params['action']) and ($this->request->params['action'] =='contacts')) ? 'contacts' : '';
	$settings = ( isset($this->request->params['action']) and ($this->request->params['action'] =='settings')) ? 'settings' : '';
	echo $this->requestAction(array('controller'=>'messages','action'=>'left_sidebar'), array('return', 'folder_type'  => $foldertype, 'contacts' => $contacts,'compose' => $compose, 'settings' => $settings));
//	?>