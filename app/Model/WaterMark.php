<?php
App::import('Model', 'Attachment');
class WaterMark extends Attachment
{
    public $name = 'WaterMark';
    var $useTable = 'attachments';
    public $actsAs = array(
        'Inheritable' => array(
            'inheritanceField' => 'class',
            'fieldAlias' => 'WaterMark'
        )
    );
}
?>