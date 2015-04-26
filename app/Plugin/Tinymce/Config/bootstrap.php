<?php
/**
 * Configuration
 */
Configure::write('Tinymce.actions', array(
    'Nodes/admin_add' => array(
        array(
            'elements' => 'NodeBody',
        ) ,
    ) ,
    'Nodes/admin_edit' => array(
        array(
            'elements' => 'NodeBody',
        ) ,
    ) ,
    'Translate/admin_edit' => array(
        array(
            'elements' => 'NodeBody',
        ) ,
    ) ,
));
/**
 * Hook helper
 */
foreach(Configure::read('Tinymce.actions') AS $action => $settings) {
    $actionE = explode('/', $action);
    Cms::hookHelper($actionE['0'], 'Tinymce.Tinymce');
}
Cms::hookHelper('Attachments', 'Tinymce.Tinymce');
?>