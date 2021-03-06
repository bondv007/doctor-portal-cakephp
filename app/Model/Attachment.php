<?php
class Attachment extends AppModel
{
    public $name = 'Attachment';
    public $actsAs = array(
        'ImageUpload' => array(
            'allowedMime' => '*',
            'allowedExt' => '*'
        )
    );
    public function __construct($id = false, $table = null, $ds = null)
    {
        parent::__construct($id, $table, $ds);
    }
}
?>