<?php
/**
 * Setting Category Model
 *
 * Site settings.
 *
 */
class SettingCategory extends AppModel
{
    public $name = 'SettingCategory';
    public $displayField = 'name';
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $hasMany = array(
        'Setting' => array(
            'className' => 'Setting',
            'foreignKey' => 'setting_category_id',
            'dependent' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    public function __construct($id = false, $table = null, $ds = null) 
    {
        parent::__construct($id, $table, $ds);
    }
}