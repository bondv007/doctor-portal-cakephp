<?php
/**
 * TypesVocabularyFixture
 *
 */
class TypesVocabularyFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'type_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'vocabulary_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'weight' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '31',
			'type_id' => '2',
			'vocabulary_id' => '2',
			'weight' => NULL
		),
		array(
			'id' => '30',
			'type_id' => '2',
			'vocabulary_id' => '1',
			'weight' => NULL
		),
		array(
			'id' => '25',
			'type_id' => '4',
			'vocabulary_id' => '2',
			'weight' => NULL
		),
		array(
			'id' => '24',
			'type_id' => '4',
			'vocabulary_id' => '1',
			'weight' => NULL
		),
	);
}
