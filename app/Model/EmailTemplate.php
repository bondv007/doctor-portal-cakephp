<?php
class EmailTemplate extends AppModel
{
    public $name = 'EmailTemplate';
    public $displayField = 'name';
    public function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
        $this->validate = array(
            'from' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
            ) ,
            'subject' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
            ) ,
            'email_content' => array(
                'rule' => 'notempty',
                'allowEmpty' => false,
                'message' => __l('Required')
            )
        );
    }
    public function selectTemplate($tempName)
    {
        $emailTemplate = $this->find('first', array(
            'conditions' => array(
                'EmailTemplate.name' => $tempName
            ) ,
            'recursive' => -1
        ));
        $resultArray = array();
		foreach($emailTemplate['EmailTemplate'] as $key => $value) {
			$resultArray[$key] = $value;
		}
        return $resultArray;
    }
}
?>