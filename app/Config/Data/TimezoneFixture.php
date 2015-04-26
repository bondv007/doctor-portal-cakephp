<?php
/**
 * TimezoneFixture
 *
 */
class TimezoneFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'gmt_offset' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'dst_offset' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'raw_offset' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 10, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'hasdst' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
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
			'id' => '1',
			'created' => '2010-05-10 20:13:09',
			'modified' => '2010-05-10 20:13:09',
			'code' => 'Pacific/Apia',
			'name' => '(GMT-11:00) Apia',
			'gmt_offset' => '-10.0',
			'dst_offset' => '-11.0',
			'raw_offset' => '-11.0',
			'hasdst' => 1
		),
		array(
			'id' => '2',
			'created' => '2010-05-10 20:13:09',
			'modified' => '2010-05-10 20:13:09',
			'code' => 'Pacific/Midway',
			'name' => '(GMT-11:00) Midway',
			'gmt_offset' => '-11.0',
			'dst_offset' => '-11.0',
			'raw_offset' => '-11.0',
			'hasdst' => 0
		),
		array(
			'id' => '3',
			'created' => '2010-05-10 20:13:09',
			'modified' => '2010-05-10 20:13:09',
			'code' => 'Pacific/Niue',
			'name' => '(GMT-11:00) Niue',
			'gmt_offset' => '-11.0',
			'dst_offset' => '-11.0',
			'raw_offset' => '-11.0',
			'hasdst' => 0
		),
		array(
			'id' => '4',
			'created' => '2010-05-10 20:13:09',
			'modified' => '2010-05-10 20:13:09',
			'code' => 'Pacific/Pago_Pago',
			'name' => '(GMT-11:00) Pago Pago',
			'gmt_offset' => '-11.0',
			'dst_offset' => '-11.0',
			'raw_offset' => '-11.0',
			'hasdst' => 0
		),
		array(
			'id' => '5',
			'created' => '2010-05-10 20:13:09',
			'modified' => '2010-05-10 20:13:09',
			'code' => 'Pacific/Fakaofo',
			'name' => '(GMT-10:00) Fakaofo',
			'gmt_offset' => '-10.0',
			'dst_offset' => '-10.0',
			'raw_offset' => '-10.0',
			'hasdst' => 0
		),
		array(
			'id' => '6',
			'created' => '2010-05-10 20:13:09',
			'modified' => '2010-05-10 20:13:09',
			'code' => 'Pacific/Honolulu',
			'name' => '(GMT-10:00) Hawaii Time',
			'gmt_offset' => '-10.0',
			'dst_offset' => '-10.0',
			'raw_offset' => '-10.0',
			'hasdst' => 0
		),
		array(
			'id' => '7',
			'created' => '2010-05-10 20:13:09',
			'modified' => '2010-05-10 20:13:09',
			'code' => 'Pacific/Johnston',
			'name' => '(GMT-10:00) Johnston',
			'gmt_offset' => '-10.0',
			'dst_offset' => '-10.0',
			'raw_offset' => '-10.0',
			'hasdst' => 0
		),
		array(
			'id' => '8',
			'created' => '2010-05-10 20:13:09',
			'modified' => '2010-05-10 20:13:09',
			'code' => 'Pacific/Rarotonga',
			'name' => '(GMT-10:00) Rarotonga',
			'gmt_offset' => '-10.0',
			'dst_offset' => '-10.0',
			'raw_offset' => '-10.0',
			'hasdst' => 0
		),
		array(
			'id' => '9',
			'created' => '2010-05-10 20:13:09',
			'modified' => '2010-05-10 20:13:09',
			'code' => 'Pacific/Tahiti',
			'name' => '(GMT-10:00) Tahiti',
			'gmt_offset' => '-10.0',
			'dst_offset' => '-10.0',
			'raw_offset' => '-10.0',
			'hasdst' => 0
		),
		array(
			'id' => '10',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'Pacific/Marquesas',
			'name' => '(GMT-09:30) Marquesas',
			'gmt_offset' => '-9.5',
			'dst_offset' => '-9.5',
			'raw_offset' => '-9.5',
			'hasdst' => 0
		),
		array(
			'id' => '11',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Anchorage',
			'name' => '(GMT-09:00) Alaska Time',
			'gmt_offset' => '-9.0',
			'dst_offset' => '-8.0',
			'raw_offset' => '-9.0',
			'hasdst' => 1
		),
		array(
			'id' => '12',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'Pacific/Gambier',
			'name' => '(GMT-09:00) Gambier',
			'gmt_offset' => '-9.0',
			'dst_offset' => '-9.0',
			'raw_offset' => '-9.0',
			'hasdst' => 0
		),
		array(
			'id' => '13',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Los_Angeles',
			'name' => '(GMT-08:00) Pacific Time',
			'gmt_offset' => '-8.0',
			'dst_offset' => '-7.0',
			'raw_offset' => '-8.0',
			'hasdst' => 1
		),
		array(
			'id' => '14',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Tijuana',
			'name' => '(GMT-08:00) Pacific Time - Tijuana',
			'gmt_offset' => '-8.0',
			'dst_offset' => '-7.0',
			'raw_offset' => '-8.0',
			'hasdst' => 1
		),
		array(
			'id' => '15',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Vancouver',
			'name' => '(GMT-08:00) Pacific Time - Vancouver',
			'gmt_offset' => '-8.0',
			'dst_offset' => '-7.0',
			'raw_offset' => '-8.0',
			'hasdst' => 1
		),
		array(
			'id' => '16',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Whitehorse',
			'name' => '(GMT-08:00) Pacific Time - Whitehorse',
			'gmt_offset' => '-8.0',
			'dst_offset' => '-7.0',
			'raw_offset' => '-8.0',
			'hasdst' => 1
		),
		array(
			'id' => '17',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'Pacific/Pitcairn',
			'name' => '(GMT-08:00) Pitcairn',
			'gmt_offset' => '-8.0',
			'dst_offset' => '-8.0',
			'raw_offset' => '-8.0',
			'hasdst' => 0
		),
		array(
			'id' => '18',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Dawson_Creek',
			'name' => '(GMT-07:00) Mountain Time - Dawson Creek',
			'gmt_offset' => '-7.0',
			'dst_offset' => '-7.0',
			'raw_offset' => '-7.0',
			'hasdst' => 0
		),
		array(
			'id' => '19',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Denver',
			'name' => '(GMT-07:00) Mountain Time (America/Denver)',
			'gmt_offset' => '-7.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-7.0',
			'hasdst' => 1
		),
		array(
			'id' => '20',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Edmonton',
			'name' => '(GMT-07:00) Mountain Time - Edmonton',
			'gmt_offset' => '-7.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-7.0',
			'hasdst' => 1
		),
		array(
			'id' => '21',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Hermosillo',
			'name' => '(GMT-07:00) Mountain Time - Hermosillo',
			'gmt_offset' => '-7.0',
			'dst_offset' => '-7.0',
			'raw_offset' => '-7.0',
			'hasdst' => 0
		),
		array(
			'id' => '22',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Mazatlan',
			'name' => '(GMT-07:00) Mountain Time - Chihuahua, Mazatlan',
			'gmt_offset' => '-7.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-7.0',
			'hasdst' => 1
		),
		array(
			'id' => '23',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Phoenix',
			'name' => '(GMT-07:00) Mountain Time - Arizona',
			'gmt_offset' => '-7.0',
			'dst_offset' => '-7.0',
			'raw_offset' => '-7.0',
			'hasdst' => 0
		),
		array(
			'id' => '24',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Yellowknife',
			'name' => '(GMT-07:00) Mountain Time - Yellowknife',
			'gmt_offset' => '-7.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-7.0',
			'hasdst' => 1
		),
		array(
			'id' => '25',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Belize',
			'name' => '(GMT-06:00) Belize',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-6.0',
			'hasdst' => 0
		),
		array(
			'id' => '26',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Chicago',
			'name' => '(GMT-06:00) Central Time',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-6.0',
			'hasdst' => 1
		),
		array(
			'id' => '27',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Costa_Rica',
			'name' => '(GMT-06:00) Costa Rica',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-6.0',
			'hasdst' => 0
		),
		array(
			'id' => '28',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/El_Salvador',
			'name' => '(GMT-06:00) El Salvador',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-6.0',
			'hasdst' => 0
		),
		array(
			'id' => '29',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Guatemala',
			'name' => '(GMT-06:00) Guatemala',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-6.0',
			'hasdst' => 0
		),
		array(
			'id' => '30',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Managua',
			'name' => '(GMT-06:00) Managua',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-6.0',
			'hasdst' => 0
		),
		array(
			'id' => '31',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Mexico_City',
			'name' => '(GMT-06:00) Central Time - Mexico City',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-6.0',
			'hasdst' => 1
		),
		array(
			'id' => '32',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Regina',
			'name' => '(GMT-06:00) Central Time - Regina',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-6.0',
			'hasdst' => 0
		),
		array(
			'id' => '33',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Tegucigalpa',
			'name' => '(GMT-06:00) Central Time (America/Tegucigalpa)',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-6.0',
			'hasdst' => 0
		),
		array(
			'id' => '34',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Winnipeg',
			'name' => '(GMT-06:00) Central Time - Winnipeg',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-6.0',
			'hasdst' => 1
		),
		array(
			'id' => '35',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'Pacific/Easter',
			'name' => '(GMT-06:00) Easter Island',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-6.0',
			'hasdst' => 1
		),
		array(
			'id' => '36',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'Pacific/Galapagos',
			'name' => '(GMT-06:00) Galapagos',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-6.0',
			'raw_offset' => '-6.0',
			'hasdst' => 0
		),
		array(
			'id' => '37',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Bogota',
			'name' => '(GMT-05:00) Bogota',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-5.0',
			'hasdst' => 0
		),
		array(
			'id' => '38',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Cayman',
			'name' => '(GMT-05:00) Cayman',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-5.0',
			'hasdst' => 1
		),
		array(
			'id' => '39',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Grand_Turk',
			'name' => '(GMT-05:00) Grand Turk',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-5.0',
			'hasdst' => 1
		),
		array(
			'id' => '40',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Guayaquil',
			'name' => '(GMT-05:00) Guayaquil',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-5.0',
			'hasdst' => 0
		),
		array(
			'id' => '41',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Havana',
			'name' => '(GMT-05:00) Havana',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-5.0',
			'hasdst' => 1
		),
		array(
			'id' => '42',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Iqaluit',
			'name' => '(GMT-05:00) Eastern Time - Iqaluit',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-5.0',
			'hasdst' => 1
		),
		array(
			'id' => '43',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Jamaica',
			'name' => '(GMT-05:00) Jamaica',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-5.0',
			'hasdst' => 0
		),
		array(
			'id' => '44',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Lima',
			'name' => '(GMT-05:00) Lima',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-5.0',
			'hasdst' => 0
		),
		array(
			'id' => '45',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Montreal',
			'name' => '(GMT-05:00) Eastern Time - Montreal',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-5.0',
			'hasdst' => 1
		),
		array(
			'id' => '46',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Nassau',
			'name' => '(GMT-05:00) Nassau',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-5.0',
			'hasdst' => 1
		),
		array(
			'id' => '47',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/New_York',
			'name' => '(GMT-05:00) Eastern Time',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-5.0',
			'hasdst' => 1
		),
		array(
			'id' => '48',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Panama',
			'name' => '(GMT-05:00) Panama',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-5.0',
			'hasdst' => 0
		),
		array(
			'id' => '49',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Port-au-Prince',
			'name' => '(GMT-05:00) Port-au-Prince',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-5.0',
			'hasdst' => 0
		),
		array(
			'id' => '50',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Toronto',
			'name' => '(GMT-05:00) Eastern Time - Toronto',
			'gmt_offset' => '-5.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-5.0',
			'hasdst' => 1
		),
		array(
			'id' => '51',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Caracas',
			'name' => '(GMT-04:30) Caracas',
			'gmt_offset' => '-4.5',
			'dst_offset' => '-4.5',
			'raw_offset' => '-4.5',
			'hasdst' => 0
		),
		array(
			'id' => '52',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Anguilla',
			'name' => '(GMT-04:00) Anguilla',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '53',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Antigua',
			'name' => '(GMT-04:00) Antigua',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '54',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Aruba',
			'name' => '(GMT-04:00) Aruba',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '55',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Asuncion',
			'name' => '(GMT-04:00) Asuncion',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 1
		),
		array(
			'id' => '56',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Barbados',
			'name' => '(GMT-04:00) Barbados',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '57',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Boa_Vista',
			'name' => '(GMT-04:00) Boa Vista',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '58',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Campo_Grande',
			'name' => '(GMT-04:00) Campo Grande',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '59',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Cuiaba',
			'name' => '(GMT-04:00) Cuiaba',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 1
		),
		array(
			'id' => '60',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Curacao',
			'name' => '(GMT-04:00) Curacao',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '61',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Dominica',
			'name' => '(GMT-04:00) Dominica',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '62',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Grenada',
			'name' => '(GMT-04:00) Grenada',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '63',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Guadeloupe',
			'name' => '(GMT-04:00) Guadeloupe',
			'gmt_offset' => '-4.0',
			'dst_offset' => '0.0',
			'raw_offset' => '-4.0',
			'hasdst' => 1
		),
		array(
			'id' => '64',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Guyana',
			'name' => '(GMT-04:00) Guyana',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '65',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Halifax',
			'name' => '(GMT-04:00) Atlantic Time - Halifax',
			'gmt_offset' => '0.0',
			'dst_offset' => '1.0',
			'raw_offset' => '0.0',
			'hasdst' => 1
		),
		array(
			'id' => '66',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/La_Paz',
			'name' => '(GMT-04:00) La Paz',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '67',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Manaus',
			'name' => '(GMT-04:00) Manaus',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '68',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Martinique',
			'name' => '(GMT-04:00) Martinique',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '69',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Montserrat',
			'name' => '(GMT-04:00) Montserrat',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '70',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Port_of_Spain',
			'name' => '(GMT-04:00) Port of Spain',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '71',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Porto_Velho',
			'name' => '(GMT-04:00) Porto Velho',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '72',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Puerto_Rico',
			'name' => '(GMT-04:00) Puerto Rico',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '73',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Rio_Branco',
			'name' => '(GMT-04:00) Rio Branco',
			'gmt_offset' => '',
			'dst_offset' => '',
			'raw_offset' => '',
			'hasdst' => 0
		),
		array(
			'id' => '74',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Santiago',
			'name' => '(GMT-04:00) Santiago',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 1
		),
		array(
			'id' => '75',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/Santo_Domingo',
			'name' => '(GMT-04:00) Santo Domingo',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '76',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/St_Kitts',
			'name' => '(GMT-04:00) St. Kitts',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '77',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/St_Lucia',
			'name' => '(GMT-04:00) St. Lucia',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '78',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/St_Thomas',
			'name' => '(GMT-04:00) St. Thomas',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '79',
			'created' => '2010-05-10 20:13:10',
			'modified' => '2010-05-10 20:13:10',
			'code' => 'America/St_Vincent',
			'name' => '(GMT-04:00) St. Vincent',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '80',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Thule',
			'name' => '(GMT-04:00) Thule',
			'gmt_offset' => '11.0',
			'dst_offset' => '10.0',
			'raw_offset' => '10.0',
			'hasdst' => 1
		),
		array(
			'id' => '81',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Tortola',
			'name' => '(GMT-04:00) Tortola',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-4.0',
			'raw_offset' => '-4.0',
			'hasdst' => 0
		),
		array(
			'id' => '82',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Antarctica/Palmer',
			'name' => '(GMT-04:00) Palmer',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '83',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Atlantic/Bermuda',
			'name' => '(GMT-04:00) Bermuda',
			'gmt_offset' => '-4.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-4.0',
			'hasdst' => 1
		),
		array(
			'id' => '84',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Atlantic/Stanley',
			'name' => '(GMT-04:00) Stanley',
			'gmt_offset' => '11.0',
			'dst_offset' => '10.0',
			'raw_offset' => '10.0',
			'hasdst' => 1
		),
		array(
			'id' => '85',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/St_Johns',
			'name' => '(GMT-03:30) Newfoundland Time - St. Johns',
			'gmt_offset' => '-3.5',
			'dst_offset' => '-2.5',
			'raw_offset' => '-3.5',
			'hasdst' => 1
		),
		array(
			'id' => '86',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Araguaina',
			'name' => '(GMT-03:00) Araguaina',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '87',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Argentina/Buenos_Aires',
			'name' => '(GMT-03:00) Buenos Aires',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '88',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Bahia',
			'name' => '(GMT-03:00) Salvador',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '89',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Belem',
			'name' => '(GMT-03:00) Belem',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '90',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Cayenne',
			'name' => '(GMT-03:00) Cayenne',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '91',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Fortaleza',
			'name' => '(GMT-03:00) Fortaleza',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '92',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Godthab',
			'name' => '(GMT-03:00) Godthab',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-2.0',
			'raw_offset' => '-3.0',
			'hasdst' => 1
		),
		array(
			'id' => '93',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Maceio',
			'name' => '(GMT-03:00) Maceio',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '94',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Miquelon',
			'name' => '(GMT-03:00) Miquelon',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-2.0',
			'raw_offset' => '-3.0',
			'hasdst' => 1
		),
		array(
			'id' => '95',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Montevideo',
			'name' => '(GMT-03:00) Montevideo',
			'gmt_offset' => '-2.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 1
		),
		array(
			'id' => '96',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Paramaribo',
			'name' => '(GMT-03:00) Paramaribo',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '97',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Recife',
			'name' => '(GMT-03:00) Recife',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '98',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Sao_Paulo',
			'name' => '(GMT-03:00) Sao Paulo',
			'gmt_offset' => '-2.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '99',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Antarctica/Rothera',
			'name' => '(GMT-03:00) Rothera',
			'gmt_offset' => '-3.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 0
		),
		array(
			'id' => '100',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Noronha',
			'name' => '(GMT-02:00) Noronha',
			'gmt_offset' => '-2.0',
			'dst_offset' => '-3.0',
			'raw_offset' => '-3.0',
			'hasdst' => 1
		),
		array(
			'id' => '101',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Atlantic/South_Georgia',
			'name' => '(GMT-02:00) South Georgia',
			'gmt_offset' => '-2.0',
			'dst_offset' => '-2.0',
			'raw_offset' => '-2.0',
			'hasdst' => 0
		),
		array(
			'id' => '102',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Scoresbysund',
			'name' => '(GMT-01:00) Scoresbysund',
			'gmt_offset' => '-1.0',
			'dst_offset' => '0.0',
			'raw_offset' => '-1.0',
			'hasdst' => 1
		),
		array(
			'id' => '103',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Atlantic/Azores',
			'name' => '(GMT-01:00) Azores',
			'gmt_offset' => '-1.0',
			'dst_offset' => '0.0',
			'raw_offset' => '-1.0',
			'hasdst' => 1
		),
		array(
			'id' => '104',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Atlantic/Cape_Verde',
			'name' => '(GMT-01:00) Cape Verde',
			'gmt_offset' => '-1.0',
			'dst_offset' => '-0.0',
			'raw_offset' => '-1.0',
			'hasdst' => 0
		),
		array(
			'id' => '105',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Abidjan',
			'name' => '(GMT+00:00) Abidjan',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '106',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Accra',
			'name' => '(GMT+00:00) Accra',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '107',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Bamako',
			'name' => '(GMT+00:00) Bamako',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '108',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Banjul',
			'name' => '(GMT+00:00) Banjul',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '109',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Bissau',
			'name' => '(GMT+00:00) Bissau',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '110',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Casablanca',
			'name' => '(GMT+00:00) Casablanca',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '111',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Conakry',
			'name' => '(GMT+00:00) Conakry',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '112',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Dakar',
			'name' => '(GMT+00:00) Dakar',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '113',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/El_Aaiun',
			'name' => '(GMT+00:00) El Aaiun',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '114',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Freetown',
			'name' => '(GMT+00:00) Freetown',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '115',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Lome',
			'name' => '(GMT+00:00) Lome',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '116',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Monrovia',
			'name' => '(GMT+00:00) Monrovia',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '117',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Nouakchott',
			'name' => '(GMT+00:00) Nouakchott',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '118',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Ouagadougou',
			'name' => '(GMT+00:00) Ouagadougou',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '119',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Sao_Tome',
			'name' => '(GMT+00:00) Sao Tome',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '120',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'America/Danmarkshavn',
			'name' => '(GMT+00:00) Danmarkshavn',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '121',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Atlantic/Canary',
			'name' => '(GMT+00:00) Canary Islands',
			'gmt_offset' => '',
			'dst_offset' => '',
			'raw_offset' => '',
			'hasdst' => 0
		),
		array(
			'id' => '122',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Atlantic/Faroe',
			'name' => '(GMT+00:00) Faeroe',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '123',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Atlantic/Reykjavik',
			'name' => '(GMT+00:00) Reykjavik',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '124',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Atlantic/St_Helena',
			'name' => '(GMT+00:00) St Helena',
			'gmt_offset' => '-1.0',
			'dst_offset' => '0.0',
			'raw_offset' => '-1.0',
			'hasdst' => 0
		),
		array(
			'id' => '125',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Etc/GMT',
			'name' => '(GMT+00:00) GMT (no daylight saving)',
			'gmt_offset' => '0.0',
			'dst_offset' => '0.0',
			'raw_offset' => '0.0',
			'hasdst' => 0
		),
		array(
			'id' => '126',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Dublin',
			'name' => '(GMT+00:00) Dublin',
			'gmt_offset' => '0.0',
			'dst_offset' => '1.0',
			'raw_offset' => '0.0',
			'hasdst' => 1
		),
		array(
			'id' => '127',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Lisbon',
			'name' => '(GMT+00:00) Lisbon',
			'gmt_offset' => '0.0',
			'dst_offset' => '1.0',
			'raw_offset' => '0.0',
			'hasdst' => 1
		),
		array(
			'id' => '128',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/London',
			'name' => '(GMT+00:00) London',
			'gmt_offset' => '0.0',
			'dst_offset' => '1.0',
			'raw_offset' => '0.0',
			'hasdst' => 1
		),
		array(
			'id' => '129',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Algiers',
			'name' => '(GMT+01:00) Algiers',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '130',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Bangui',
			'name' => '(GMT+01:00) Bangui',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '131',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Brazzaville',
			'name' => '(GMT+01:00) Brazzaville',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '132',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Ceuta',
			'name' => '(GMT+01:00) Ceuta',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '133',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Douala',
			'name' => '(GMT+01:00) Douala',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '134',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Kinshasa',
			'name' => '(GMT+01:00) Kinshasa',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '135',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Lagos',
			'name' => '(GMT+01:00) Lagos',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '136',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Libreville',
			'name' => '(GMT+01:00) Libreville',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '137',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Luanda',
			'name' => '(GMT+01:00) Luanda',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '138',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Malabo',
			'name' => '(GMT+01:00) Malabo',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '139',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Ndjamena',
			'name' => '(GMT+01:00) Ndjamena',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '140',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Niamey',
			'name' => '(GMT+01:00) Niamey',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '141',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Porto-Novo',
			'name' => '(GMT+01:00) Porto-Novo',
			'gmt_offset' => '1.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 0
		),
		array(
			'id' => '142',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Tunis',
			'name' => '(GMT+01:00) Tunis',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '143',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Windhoek',
			'name' => '(GMT+01:00) Windhoek',
			'gmt_offset' => '2.0',
			'dst_offset' => '1.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '144',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Amsterdam',
			'name' => '(GMT+01:00) Amsterdam',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '145',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Andorra',
			'name' => '(GMT+01:00) Andorra',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '146',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Belgrade',
			'name' => '(GMT+01:00) Central European Time (Europe/Belgrade)',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '147',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Berlin',
			'name' => '(GMT+01:00) Berlin',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '148',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Brussels',
			'name' => '(GMT+01:00) Brussels',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '149',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Budapest',
			'name' => '(GMT+01:00) Budapest',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '150',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Copenhagen',
			'name' => '(GMT+01:00) Copenhagen',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '151',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Gibraltar',
			'name' => '(GMT+01:00) Gibraltar',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '152',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Luxembourg',
			'name' => '(GMT+01:00) Luxembourg',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '153',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Madrid',
			'name' => '(GMT+01:00) Madrid',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '154',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Malta',
			'name' => '(GMT+01:00) Malta',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '155',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Monaco',
			'name' => '(GMT+01:00) Monaco',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '156',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Oslo',
			'name' => '(GMT+01:00) Oslo',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '157',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Paris',
			'name' => '(GMT+01:00) Paris',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '158',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Prague',
			'name' => '(GMT+01:00) Central European Time (Europe/Prague)',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '159',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Rome',
			'name' => '(GMT+01:00) Rome',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '160',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Stockholm',
			'name' => '(GMT+01:00) Stockholm',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '161',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Tirane',
			'name' => '(GMT+01:00) Tirane',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '162',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Vaduz',
			'name' => '(GMT+01:00) Vaduz',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '163',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Vienna',
			'name' => '(GMT+01:00) Vienna',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '164',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Warsaw',
			'name' => '(GMT+01:00) Warsaw',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '165',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Zurich',
			'name' => '(GMT+01:00) Zurich',
			'gmt_offset' => '1.0',
			'dst_offset' => '2.0',
			'raw_offset' => '1.0',
			'hasdst' => 1
		),
		array(
			'id' => '166',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Blantyre',
			'name' => '(GMT+02:00) Blantyre',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '167',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Bujumbura',
			'name' => '(GMT+02:00) Bujumbura',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '168',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Cairo',
			'name' => '(GMT+02:00) Cairo',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '169',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Gaborone',
			'name' => '(GMT+02:00) Gaborone',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '170',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Harare',
			'name' => '(GMT+02:00) Harare',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '171',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Johannesburg',
			'name' => '(GMT+02:00) Johannesburg',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '172',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Kigali',
			'name' => '(GMT+02:00) Kigali',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '173',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Lubumbashi',
			'name' => '(GMT+02:00) Lubumbashi',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '174',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Lusaka',
			'name' => '(GMT+02:00) Lusaka',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '175',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Maputo',
			'name' => '(GMT+02:00) Maputo',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '176',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Maseru',
			'name' => '(GMT+02:00) Maseru',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '177',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Mbabane',
			'name' => '(GMT+02:00) Mbabane',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '178',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Tripoli',
			'name' => '(GMT+02:00) Tripoli',
			'gmt_offset' => '2.0',
			'dst_offset' => '2.0',
			'raw_offset' => '2.0',
			'hasdst' => 0
		),
		array(
			'id' => '179',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Amman',
			'name' => '(GMT+02:00) Amman',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '180',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Beirut',
			'name' => '(GMT+02:00) Beirut',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '181',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Damascus',
			'name' => '(GMT+02:00) Damascus',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '182',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Gaza',
			'name' => '(GMT+02:00) Gaza',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '183',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Jerusalem',
			'name' => '(GMT+02:00) Jerusalem',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '184',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Nicosia',
			'name' => '(GMT+02:00) Nicosia',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '185',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Athens',
			'name' => '(GMT+02:00) Athens',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '186',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Bucharest',
			'name' => '(GMT+02:00) Bucharest',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '187',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Chisinau',
			'name' => '(GMT+02:00) Chisinau',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '188',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Helsinki',
			'name' => '(GMT+02:00) Helsinki',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '189',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Istanbul',
			'name' => '(GMT+02:00) Istanbul',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '190',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Kaliningrad',
			'name' => '(GMT+02:00) Moscow-01 - Kaliningrad',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '191',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Kiev',
			'name' => '(GMT+02:00) Kiev',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '192',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Minsk',
			'name' => '(GMT+02:00) Minsk',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '193',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Riga',
			'name' => '(GMT+02:00) Riga',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '194',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Sofia',
			'name' => '(GMT+02:00) Sofia',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '195',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Tallinn',
			'name' => '(GMT+02:00) Tallinn',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '196',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Vilnius',
			'name' => '(GMT+02:00) Vilnius',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '197',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Addis_Ababa',
			'name' => '(GMT+03:00) Addis Ababa',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '198',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Asmara',
			'name' => '(GMT+03:00) Asmera',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '199',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Dar_es_Salaam',
			'name' => '(GMT+03:00) Dar es Salaam',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '200',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Djibouti',
			'name' => '(GMT+03:00) Djibouti',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '201',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Kampala',
			'name' => '(GMT+03:00) Kampala',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '202',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Khartoum',
			'name' => '(GMT+03:00) Khartoum',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '203',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Mogadishu',
			'name' => '(GMT+03:00) Mogadishu',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '204',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Africa/Nairobi',
			'name' => '(GMT+03:00) Nairobi',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '205',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Antarctica/Syowa',
			'name' => '(GMT+03:00) Syowa',
			'gmt_offset' => '9.0',
			'dst_offset' => '9.0',
			'raw_offset' => '9.0',
			'hasdst' => 0
		),
		array(
			'id' => '206',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Aden',
			'name' => '(GMT+03:00) Aden',
			'gmt_offset' => '2.0',
			'dst_offset' => '3.0',
			'raw_offset' => '2.0',
			'hasdst' => 1
		),
		array(
			'id' => '207',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Baghdad',
			'name' => '(GMT+03:00) Baghdad',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '208',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Bahrain',
			'name' => '(GMT+03:00) Bahrain',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '209',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Kuwait',
			'name' => '(GMT+03:00) Kuwait',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '210',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Qatar',
			'name' => '(GMT+03:00) Qatar',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '211',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Riyadh',
			'name' => '(GMT+03:00) Riyadh',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '212',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Europe/Moscow',
			'name' => '(GMT+03:00) Moscow+00',
			'gmt_offset' => '3.0',
			'dst_offset' => '4.0',
			'raw_offset' => '3.0',
			'hasdst' => 1
		),
		array(
			'id' => '213',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Indian/Antananarivo',
			'name' => '(GMT+03:00) Antananarivo',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '214',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Indian/Comoro',
			'name' => '(GMT+03:00) Comoro',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '215',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Indian/Mayotte',
			'name' => '(GMT+03:00) Mayotte',
			'gmt_offset' => '3.0',
			'dst_offset' => '3.0',
			'raw_offset' => '3.0',
			'hasdst' => 0
		),
		array(
			'id' => '216',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Tehran',
			'name' => '(GMT+03:30) Tehran',
			'gmt_offset' => '3.5',
			'dst_offset' => '4.5',
			'raw_offset' => '3.5',
			'hasdst' => 1
		),
		array(
			'id' => '217',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Baku',
			'name' => '(GMT+04:00) Baku',
			'gmt_offset' => '4.0',
			'dst_offset' => '5.0',
			'raw_offset' => '4.0',
			'hasdst' => 1
		),
		array(
			'id' => '218',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Dubai',
			'name' => '(GMT+04:00) Dubai',
			'gmt_offset' => '4.0',
			'dst_offset' => '4.0',
			'raw_offset' => '4.0',
			'hasdst' => 0
		),
		array(
			'id' => '219',
			'created' => '2010-05-10 20:13:11',
			'modified' => '2010-05-10 20:13:11',
			'code' => 'Asia/Muscat',
			'name' => '(GMT+04:00) Muscat',
			'gmt_offset' => '4.0',
			'dst_offset' => '4.0',
			'raw_offset' => '4.0',
			'hasdst' => 0
		),
		array(
			'id' => '220',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Tbilisi',
			'name' => '(GMT+04:00) Tbilisi',
			'gmt_offset' => '4.0',
			'dst_offset' => '4.0',
			'raw_offset' => '4.0',
			'hasdst' => 0
		),
		array(
			'id' => '221',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Yerevan',
			'name' => '(GMT+04:00) Yerevan',
			'gmt_offset' => '4.0',
			'dst_offset' => '5.0',
			'raw_offset' => '4.0',
			'hasdst' => 1
		),
		array(
			'id' => '222',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Europe/Samara',
			'name' => '(GMT+04:00) Moscow+01 - Samara',
			'gmt_offset' => '4.0',
			'dst_offset' => '5.0',
			'raw_offset' => '4.0',
			'hasdst' => 1
		),
		array(
			'id' => '223',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Indian/Mahe',
			'name' => '(GMT+04:00) Mahe',
			'gmt_offset' => '4.0',
			'dst_offset' => '4.0',
			'raw_offset' => '4.0',
			'hasdst' => 0
		),
		array(
			'id' => '224',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Indian/Mauritius',
			'name' => '(GMT+04:00) Mauritius',
			'gmt_offset' => '4.0',
			'dst_offset' => '4.0',
			'raw_offset' => '4.0',
			'hasdst' => 0
		),
		array(
			'id' => '225',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Indian/Reunion',
			'name' => '(GMT+04:00) Reunion',
			'gmt_offset' => '4.0',
			'dst_offset' => '4.0',
			'raw_offset' => '4.0',
			'hasdst' => 0
		),
		array(
			'id' => '226',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Kabul',
			'name' => '(GMT+04:30) Kabul',
			'gmt_offset' => '4.5',
			'dst_offset' => '4.5',
			'raw_offset' => '4.5',
			'hasdst' => 0
		),
		array(
			'id' => '227',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Aqtau',
			'name' => '(GMT+05:00) Aqtau',
			'gmt_offset' => '5.0',
			'dst_offset' => '5.0',
			'raw_offset' => '5.0',
			'hasdst' => 0
		),
		array(
			'id' => '228',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Aqtobe',
			'name' => '(GMT+05:00) Aqtobe',
			'gmt_offset' => '5.0',
			'dst_offset' => '5.0',
			'raw_offset' => '5.0',
			'hasdst' => 0
		),
		array(
			'id' => '229',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Ashgabat',
			'name' => '(GMT+05:00) Ashgabat',
			'gmt_offset' => '5.0',
			'dst_offset' => '5.0',
			'raw_offset' => '5.0',
			'hasdst' => 0
		),
		array(
			'id' => '230',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Dushanbe',
			'name' => '(GMT+05:00) Dushanbe',
			'gmt_offset' => '5.0',
			'dst_offset' => '5.0',
			'raw_offset' => '5.0',
			'hasdst' => 0
		),
		array(
			'id' => '231',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Karachi',
			'name' => '(GMT+05:00) Karachi',
			'gmt_offset' => '5.0',
			'dst_offset' => '6.0',
			'raw_offset' => '5.0',
			'hasdst' => 1
		),
		array(
			'id' => '232',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Tashkent',
			'name' => '(GMT+05:00) Tashkent',
			'gmt_offset' => '5.0',
			'dst_offset' => '5.0',
			'raw_offset' => '5.0',
			'hasdst' => 0
		),
		array(
			'id' => '233',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Yekaterinburg',
			'name' => '(GMT+05:00) Moscow+02 - Yekaterinburg',
			'gmt_offset' => '5.0',
			'dst_offset' => '6.0',
			'raw_offset' => '5.0',
			'hasdst' => 1
		),
		array(
			'id' => '234',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Indian/Kerguelen',
			'name' => '(GMT+05:00) Kerguelen',
			'gmt_offset' => '5.0',
			'dst_offset' => '5.0',
			'raw_offset' => '5.0',
			'hasdst' => 0
		),
		array(
			'id' => '235',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Indian/Maldives',
			'name' => '(GMT+05:00) Maldives',
			'gmt_offset' => '5.0',
			'dst_offset' => '5.0',
			'raw_offset' => '5.0',
			'hasdst' => 0
		),
		array(
			'id' => '236',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Calcutta',
			'name' => '(GMT+05:30) India Standard Time',
			'gmt_offset' => '5.5',
			'dst_offset' => '5.5',
			'raw_offset' => '5.5',
			'hasdst' => 0
		),
		array(
			'id' => '237',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Colombo',
			'name' => '(GMT+05:30) Colombo',
			'gmt_offset' => '5.5',
			'dst_offset' => '5.5',
			'raw_offset' => '5.5',
			'hasdst' => 0
		),
		array(
			'id' => '238',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Katmandu',
			'name' => '(GMT+05:45) Katmandu',
			'gmt_offset' => '5.75',
			'dst_offset' => '5.75',
			'raw_offset' => '5.75',
			'hasdst' => 0
		),
		array(
			'id' => '239',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Antarctica/Mawson',
			'name' => '(GMT+06:00) Mawson',
			'gmt_offset' => '6.0',
			'dst_offset' => '6.0',
			'raw_offset' => '6.0',
			'hasdst' => 0
		),
		array(
			'id' => '240',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Antarctica/Vostok',
			'name' => '(GMT+06:00) Vostok',
			'gmt_offset' => '6.0',
			'dst_offset' => '6.0',
			'raw_offset' => '6.0',
			'hasdst' => 0
		),
		array(
			'id' => '241',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Almaty',
			'name' => '(GMT+06:00) Almaty',
			'gmt_offset' => '6.0',
			'dst_offset' => '6.0',
			'raw_offset' => '6.0',
			'hasdst' => 0
		),
		array(
			'id' => '242',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Bishkek',
			'name' => '(GMT+06:00) Bishkek',
			'gmt_offset' => '6.0',
			'dst_offset' => '6.0',
			'raw_offset' => '6.0',
			'hasdst' => 0
		),
		array(
			'id' => '243',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Dhaka',
			'name' => '(GMT+06:00) Dhaka',
			'gmt_offset' => '6.0',
			'dst_offset' => '7.0',
			'raw_offset' => '6.0',
			'hasdst' => 1
		),
		array(
			'id' => '244',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Omsk',
			'name' => '(GMT+06:00) Moscow+03 - Omsk, Novosibirsk',
			'gmt_offset' => '6.0',
			'dst_offset' => '7.0',
			'raw_offset' => '6.0',
			'hasdst' => 1
		),
		array(
			'id' => '245',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Thimphu',
			'name' => '(GMT+06:00) Thimphu',
			'gmt_offset' => '6.0',
			'dst_offset' => '6.0',
			'raw_offset' => '6.0',
			'hasdst' => 0
		),
		array(
			'id' => '246',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Indian/Chagos',
			'name' => '(GMT+06:00) Chagos',
			'gmt_offset' => '6.0',
			'dst_offset' => '6.0',
			'raw_offset' => '6.0',
			'hasdst' => 0
		),
		array(
			'id' => '247',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Rangoon',
			'name' => '(GMT+06:30) Rangoon',
			'gmt_offset' => '6.5',
			'dst_offset' => '6.5',
			'raw_offset' => '6.5',
			'hasdst' => 0
		),
		array(
			'id' => '248',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Indian/Cocos',
			'name' => '(GMT+06:30) Cocos',
			'gmt_offset' => '6.5',
			'dst_offset' => '6.5',
			'raw_offset' => '6.5',
			'hasdst' => 0
		),
		array(
			'id' => '249',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Antarctica/Davis',
			'name' => '(GMT+07:00) Davis',
			'gmt_offset' => '-8.0',
			'dst_offset' => '-7.0',
			'raw_offset' => '-8.0',
			'hasdst' => 1
		),
		array(
			'id' => '250',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Bangkok',
			'name' => '(GMT+07:00) Bangkok',
			'gmt_offset' => '7.0',
			'dst_offset' => '7.0',
			'raw_offset' => '7.0',
			'hasdst' => 0
		),
		array(
			'id' => '251',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Hovd',
			'name' => '(GMT+07:00) Hovd',
			'gmt_offset' => '7.0',
			'dst_offset' => '7.0',
			'raw_offset' => '7.0',
			'hasdst' => 0
		),
		array(
			'id' => '252',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Jakarta',
			'name' => '(GMT+07:00) Jakarta',
			'gmt_offset' => '7.0',
			'dst_offset' => '7.0',
			'raw_offset' => '7.0',
			'hasdst' => 0
		),
		array(
			'id' => '253',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Krasnoyarsk',
			'name' => '(GMT+07:00) Moscow+04 - Krasnoyarsk',
			'gmt_offset' => '7.0',
			'dst_offset' => '8.0',
			'raw_offset' => '7.0',
			'hasdst' => 1
		),
		array(
			'id' => '254',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Phnom_Penh',
			'name' => '(GMT+07:00) Phnom Penh',
			'gmt_offset' => '7.0',
			'dst_offset' => '7.0',
			'raw_offset' => '7.0',
			'hasdst' => 0
		),
		array(
			'id' => '255',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Saigon',
			'name' => '(GMT+07:00) Hanoi',
			'gmt_offset' => '7.0',
			'dst_offset' => '7.0',
			'raw_offset' => '7.0',
			'hasdst' => 0
		),
		array(
			'id' => '256',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Vientiane',
			'name' => '(GMT+07:00) Vientiane',
			'gmt_offset' => '7.0',
			'dst_offset' => '7.0',
			'raw_offset' => '7.0',
			'hasdst' => 0
		),
		array(
			'id' => '257',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Indian/Christmas',
			'name' => '(GMT+07:00) Christmas',
			'gmt_offset' => '-7.0',
			'dst_offset' => '-7.0',
			'raw_offset' => '-7.0',
			'hasdst' => 0
		),
		array(
			'id' => '258',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Antarctica/Casey',
			'name' => '(GMT+08:00) Casey',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '259',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Brunei',
			'name' => '(GMT+08:00) Brunei',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '260',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Choibalsan',
			'name' => '(GMT+08:00) Choibalsan',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '261',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Hong_Kong',
			'name' => '(GMT+08:00) Hong Kong',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '262',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Irkutsk',
			'name' => '(GMT+08:00) Moscow+05 - Irkutsk',
			'gmt_offset' => '8.0',
			'dst_offset' => '9.0',
			'raw_offset' => '8.0',
			'hasdst' => 1
		),
		array(
			'id' => '263',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Kuala_Lumpur',
			'name' => '(GMT+08:00) Kuala Lumpur',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '264',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Macau',
			'name' => '(GMT+08:00) Macau',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '265',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Makassar',
			'name' => '(GMT+08:00) Makassar',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '266',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Manila',
			'name' => '(GMT+08:00) Manila',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '267',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Shanghai',
			'name' => '(GMT+08:00) China Time - Beijing',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '268',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Singapore',
			'name' => '(GMT+08:00) Singapore',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '269',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Taipei',
			'name' => '(GMT+08:00) Taipei',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '270',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Ulaanbaatar',
			'name' => '(GMT+08:00) Ulaanbaatar',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '271',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Australia/Perth',
			'name' => '(GMT+08:00) Western Time - Perth',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '272',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Dili',
			'name' => '(GMT+09:00) Dili',
			'gmt_offset' => '8.0',
			'dst_offset' => '8.0',
			'raw_offset' => '8.0',
			'hasdst' => 0
		),
		array(
			'id' => '273',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Jayapura',
			'name' => '(GMT+09:00) Jayapura',
			'gmt_offset' => '9.0',
			'dst_offset' => '9.0',
			'raw_offset' => '9.0',
			'hasdst' => 0
		),
		array(
			'id' => '274',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Pyongyang',
			'name' => '(GMT+09:00) Pyongyang',
			'gmt_offset' => '9.0',
			'dst_offset' => '9.0',
			'raw_offset' => '9.0',
			'hasdst' => 0
		),
		array(
			'id' => '275',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Seoul',
			'name' => '(GMT+09:00) Seoul',
			'gmt_offset' => '9.0',
			'dst_offset' => '9.0',
			'raw_offset' => '9.0',
			'hasdst' => 0
		),
		array(
			'id' => '276',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Tokyo',
			'name' => '(GMT+09:00) Tokyo',
			'gmt_offset' => '9.0',
			'dst_offset' => '9.0',
			'raw_offset' => '9.0',
			'hasdst' => 0
		),
		array(
			'id' => '277',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Yakutsk',
			'name' => '(GMT+09:00) Moscow+06 - Yakutsk',
			'gmt_offset' => '9.0',
			'dst_offset' => '10.0',
			'raw_offset' => '9.0',
			'hasdst' => 1
		),
		array(
			'id' => '278',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Palau',
			'name' => '(GMT+09:00) Palau',
			'gmt_offset' => '9.0',
			'dst_offset' => '9.0',
			'raw_offset' => '9.0',
			'hasdst' => 0
		),
		array(
			'id' => '279',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Australia/Adelaide',
			'name' => '(GMT+09:30) Central Time - Adelaide',
			'gmt_offset' => '10.5',
			'dst_offset' => '9.5',
			'raw_offset' => '9.5',
			'hasdst' => 1
		),
		array(
			'id' => '280',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Australia/Darwin',
			'name' => '(GMT+09:30) Central Time - Darwin',
			'gmt_offset' => '9.5',
			'dst_offset' => '9.5',
			'raw_offset' => '9.5',
			'hasdst' => 0
		),
		array(
			'id' => '281',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Antarctica/DumontDUrville',
			'name' => '(GMT+10:00) Dumont D\'Urville',
			'gmt_offset' => '10.0',
			'dst_offset' => '10.0',
			'raw_offset' => '10.0',
			'hasdst' => 0
		),
		array(
			'id' => '282',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Vladivostok',
			'name' => '(GMT+10:00) Moscow+07 - Yuzhno-Sakhalinsk',
			'gmt_offset' => '10.0',
			'dst_offset' => '11.0',
			'raw_offset' => '10.0',
			'hasdst' => 1
		),
		array(
			'id' => '283',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Australia/Brisbane',
			'name' => '(GMT+10:00) Eastern Time - Brisbane',
			'gmt_offset' => '10.0',
			'dst_offset' => '10.0',
			'raw_offset' => '10.0',
			'hasdst' => 0
		),
		array(
			'id' => '284',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Australia/Hobart',
			'name' => '(GMT+10:00) Eastern Time - Hobart',
			'gmt_offset' => '-6.0',
			'dst_offset' => '-5.0',
			'raw_offset' => '-6.0',
			'hasdst' => 1
		),
		array(
			'id' => '285',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Australia/Sydney',
			'name' => '(GMT+10:00) Eastern Time - Melbourne, Sydney',
			'gmt_offset' => '11.0',
			'dst_offset' => '10.0',
			'raw_offset' => '10.0',
			'hasdst' => 1
		),
		array(
			'id' => '286',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Guam',
			'name' => '(GMT+10:00) Guam',
			'gmt_offset' => '10.0',
			'dst_offset' => '10.0',
			'raw_offset' => '10.0',
			'hasdst' => 0
		),
		array(
			'id' => '287',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Port_Moresby',
			'name' => '(GMT+10:00) Port Moresby',
			'gmt_offset' => '10.0',
			'dst_offset' => '10.0',
			'raw_offset' => '10.0',
			'hasdst' => 0
		),
		array(
			'id' => '288',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Saipan',
			'name' => '(GMT+10:00) Saipan',
			'gmt_offset' => '10.0',
			'dst_offset' => '10.0',
			'raw_offset' => '10.0',
			'hasdst' => 0
		),
		array(
			'id' => '289',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Truk',
			'name' => '(GMT+10:00) Truk',
			'gmt_offset' => '10.0',
			'dst_offset' => '10.0',
			'raw_offset' => '10.0',
			'hasdst' => 0
		),
		array(
			'id' => '290',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Magadan',
			'name' => '(GMT+11:00) Moscow+08 - Magadan',
			'gmt_offset' => '11.0',
			'dst_offset' => '12.0',
			'raw_offset' => '11.0',
			'hasdst' => 1
		),
		array(
			'id' => '291',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Efate',
			'name' => '(GMT+11:00) Efate',
			'gmt_offset' => '11.0',
			'dst_offset' => '11.0',
			'raw_offset' => '11.0',
			'hasdst' => 0
		),
		array(
			'id' => '292',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Guadalcanal',
			'name' => '(GMT+11:00) Guadalcanal',
			'gmt_offset' => '11.0',
			'dst_offset' => '11.0',
			'raw_offset' => '11.0',
			'hasdst' => 0
		),
		array(
			'id' => '293',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Kosrae',
			'name' => '(GMT+11:00) Kosrae',
			'gmt_offset' => '11.0',
			'dst_offset' => '11.0',
			'raw_offset' => '11.0',
			'hasdst' => 0
		),
		array(
			'id' => '294',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Noumea',
			'name' => '(GMT+11:00) Noumea',
			'gmt_offset' => '11.0',
			'dst_offset' => '11.0',
			'raw_offset' => '11.0',
			'hasdst' => 0
		),
		array(
			'id' => '295',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Ponape',
			'name' => '(GMT+11:00) Ponape',
			'gmt_offset' => '11.0',
			'dst_offset' => '11.0',
			'raw_offset' => '11.0',
			'hasdst' => 0
		),
		array(
			'id' => '296',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Norfolk',
			'name' => '(GMT+11:30) Norfolk',
			'gmt_offset' => '11.5',
			'dst_offset' => '11.5',
			'raw_offset' => '11.5',
			'hasdst' => 0
		),
		array(
			'id' => '297',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Asia/Kamchatka',
			'name' => '(GMT+12:00) Moscow+09 - Petropavlovsk-Kamchatskiy',
			'gmt_offset' => '12.0',
			'dst_offset' => '13.0',
			'raw_offset' => '12.0',
			'hasdst' => 1
		),
		array(
			'id' => '298',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Auckland',
			'name' => '(GMT+12:00) Auckland',
			'gmt_offset' => '13.0',
			'dst_offset' => '12.0',
			'raw_offset' => '12.0',
			'hasdst' => 1
		),
		array(
			'id' => '299',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Fiji',
			'name' => '(GMT+12:00) Fiji',
			'gmt_offset' => '12.0',
			'dst_offset' => '12.0',
			'raw_offset' => '12.0',
			'hasdst' => 0
		),
		array(
			'id' => '300',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Funafuti',
			'name' => '(GMT+12:00) Funafuti',
			'gmt_offset' => '12.0',
			'dst_offset' => '12.0',
			'raw_offset' => '12.0',
			'hasdst' => 0
		),
		array(
			'id' => '301',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Kwajalein',
			'name' => '(GMT+12:00) Kwajalein',
			'gmt_offset' => '12.0',
			'dst_offset' => '12.0',
			'raw_offset' => '12.0',
			'hasdst' => 0
		),
		array(
			'id' => '302',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Majuro',
			'name' => '(GMT+12:00) Majuro',
			'gmt_offset' => '12.0',
			'dst_offset' => '12.0',
			'raw_offset' => '12.0',
			'hasdst' => 0
		),
		array(
			'id' => '303',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Nauru',
			'name' => '(GMT+12:00) Nauru',
			'gmt_offset' => '12.0',
			'dst_offset' => '12.0',
			'raw_offset' => '12.0',
			'hasdst' => 0
		),
		array(
			'id' => '304',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Tarawa',
			'name' => '(GMT+12:00) Tarawa',
			'gmt_offset' => '12.0',
			'dst_offset' => '12.0',
			'raw_offset' => '12.0',
			'hasdst' => 0
		),
		array(
			'id' => '305',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Wake',
			'name' => '(GMT+12:00) Wake',
			'gmt_offset' => '12.0',
			'dst_offset' => '12.0',
			'raw_offset' => '12.0',
			'hasdst' => 0
		),
		array(
			'id' => '306',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Wallis',
			'name' => '(GMT+12:00) Wallis',
			'gmt_offset' => '12.0',
			'dst_offset' => '12.0',
			'raw_offset' => '12.0',
			'hasdst' => 0
		),
		array(
			'id' => '307',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Enderbury',
			'name' => '(GMT+13:00) Enderbury',
			'gmt_offset' => '13.0',
			'dst_offset' => '13.0',
			'raw_offset' => '13.0',
			'hasdst' => 0
		),
		array(
			'id' => '308',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Tongatapu',
			'name' => '(GMT+13:00) Tongatapu',
			'gmt_offset' => '13.0',
			'dst_offset' => '13.0',
			'raw_offset' => '13.0',
			'hasdst' => 0
		),
		array(
			'id' => '309',
			'created' => '2010-05-10 20:13:12',
			'modified' => '2010-05-10 20:13:12',
			'code' => 'Pacific/Kiritimati',
			'name' => '(GMT+14:00) Kiritimati',
			'gmt_offset' => '14.0',
			'dst_offset' => '14.0',
			'raw_offset' => '14.0',
			'hasdst' => 0
		),
	);
}
