<?php
/**
 * CountryFixture
 *
 */
class CountryFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'fips104' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'iso2' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'iso3' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 3, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'ison' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 4, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'internet' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'capital' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 25, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'map_reference' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'nationality_singular' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 35, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'nationality_plural' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 35, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'currency' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 30, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'currency_code' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 3, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'population' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 20),
		'title' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'comment' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'slug' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'key' => 'index', 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'slug' => array('column' => 'slug', 'unique' => 0)),
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
			'name' => 'Afghanistan (افغانستان)',
			'fips104' => 'AF',
			'iso2' => 'AF',
			'iso3' => 'AFG',
			'ison' => '4',
			'internet' => 'AF',
			'capital' => 'Kabul ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Afghan',
			'nationality_plural' => 'Afghans',
			'currency' => 'Afghani ',
			'currency_code' => 'AFA',
			'population' => '26813057',
			'title' => 'Afghanistan',
			'comment' => '',
			'slug' => 'afghanistan'
		),
		array(
			'id' => '2',
			'name' => 'Albania (Shqipëria)',
			'fips104' => 'AL',
			'iso2' => 'AL',
			'iso3' => 'ALB',
			'ison' => '8',
			'internet' => 'AL',
			'capital' => 'Tirana ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Albanian',
			'nationality_plural' => 'Albanians',
			'currency' => 'Lek ',
			'currency_code' => 'ALL',
			'population' => '3510484',
			'title' => 'Albania',
			'comment' => '',
			'slug' => 'albania-shqip-ria'
		),
		array(
			'id' => '3',
			'name' => 'Algeria (الجزائر)',
			'fips104' => 'AG',
			'iso2' => 'DZ',
			'iso3' => 'DZA',
			'ison' => '12',
			'internet' => 'DZ',
			'capital' => 'Algiers ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Algerian',
			'nationality_plural' => 'Algerians',
			'currency' => 'Algerian Dinar ',
			'currency_code' => 'DZD',
			'population' => '31736053',
			'title' => 'Algeria',
			'comment' => '',
			'slug' => 'algeria'
		),
		array(
			'id' => '4',
			'name' => 'American Samoa',
			'fips104' => 'AQ',
			'iso2' => 'AS',
			'iso3' => 'ASM',
			'ison' => '16',
			'internet' => 'AS',
			'capital' => 'Pago Pago ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'American Samoan',
			'nationality_plural' => 'American Samoans',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '67084',
			'title' => 'American Samoa',
			'comment' => '',
			'slug' => 'american-samoa'
		),
		array(
			'id' => '5',
			'name' => 'Andorra',
			'fips104' => 'AN',
			'iso2' => 'AD',
			'iso3' => 'AND',
			'ison' => '20',
			'internet' => 'AD',
			'capital' => 'Andorra la Vella ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Andorran',
			'nationality_plural' => 'Andorrans',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '67627',
			'title' => 'Andorra',
			'comment' => '',
			'slug' => 'andorra'
		),
		array(
			'id' => '6',
			'name' => 'Angola',
			'fips104' => 'AO',
			'iso2' => 'AO',
			'iso3' => 'AGO',
			'ison' => '24',
			'internet' => 'AO',
			'capital' => 'Luanda ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Angolan',
			'nationality_plural' => 'Angolans',
			'currency' => 'Kwanza ',
			'currency_code' => 'AOA',
			'population' => '10366031',
			'title' => 'Angola',
			'comment' => '',
			'slug' => 'angola'
		),
		array(
			'id' => '7',
			'name' => 'Anguilla',
			'fips104' => 'AV',
			'iso2' => 'AI',
			'iso3' => 'AIA',
			'ison' => '660',
			'internet' => 'AI',
			'capital' => 'The Valley ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Anguillan',
			'nationality_plural' => 'Anguillans',
			'currency' => 'East Caribbean Dollar ',
			'currency_code' => 'XCD',
			'population' => '12132',
			'title' => 'Anguilla',
			'comment' => '',
			'slug' => 'anguilla'
		),
		array(
			'id' => '8',
			'name' => 'Antarctica',
			'fips104' => 'AY',
			'iso2' => 'AQ',
			'iso3' => 'ATA',
			'ison' => '10',
			'internet' => 'AQ',
			'capital' => '',
			'map_reference' => 'Antarctic Region ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Antarctica',
			'comment' => 'ISO defines as the territory south of 60 degrees south latitude',
			'slug' => 'antarctica'
		),
		array(
			'id' => '9',
			'name' => 'Antigua and Barbuda',
			'fips104' => 'AC',
			'iso2' => 'AG',
			'iso3' => 'ATG',
			'ison' => '28',
			'internet' => 'AG',
			'capital' => 'Saint John\'s ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Antiguan and Barbudan',
			'nationality_plural' => 'Antiguans and Barbudans',
			'currency' => 'East Caribbean Dollar ',
			'currency_code' => 'XCD',
			'population' => '66970',
			'title' => 'Antigua and Barbuda',
			'comment' => '',
			'slug' => 'antigua-and-barbuda'
		),
		array(
			'id' => '10',
			'name' => 'Argentina',
			'fips104' => 'AR',
			'iso2' => 'AR',
			'iso3' => 'ARG',
			'ison' => '32',
			'internet' => 'AR',
			'capital' => 'Buenos Aires ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Argentine',
			'nationality_plural' => 'Argentines',
			'currency' => 'Argentine Peso ',
			'currency_code' => 'ARS',
			'population' => '37384816',
			'title' => 'Argentina',
			'comment' => '',
			'slug' => 'argentina'
		),
		array(
			'id' => '11',
			'name' => 'Armenia (Հայաստան)',
			'fips104' => 'AM',
			'iso2' => 'AM',
			'iso3' => 'ARM',
			'ison' => '51',
			'internet' => 'AM',
			'capital' => 'Yerevan ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Armenian',
			'nationality_plural' => 'Armenians',
			'currency' => 'Armenian Dram ',
			'currency_code' => 'AMD',
			'population' => '3336100',
			'title' => 'Armenia',
			'comment' => '',
			'slug' => 'armenia'
		),
		array(
			'id' => '12',
			'name' => 'Aruba',
			'fips104' => 'AA',
			'iso2' => 'AW',
			'iso3' => 'ABW',
			'ison' => '533',
			'internet' => 'AW',
			'capital' => 'Oranjestad ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Aruban',
			'nationality_plural' => 'Arubans',
			'currency' => 'Aruban Guilder',
			'currency_code' => 'AWG',
			'population' => '70007',
			'title' => 'Aruba',
			'comment' => '',
			'slug' => 'aruba'
		),
		array(
			'id' => '13',
			'name' => 'Ashmore and Cartier',
			'fips104' => 'AT',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Ashmore and Cartier',
			'comment' => 'ISO includes with Australia',
			'slug' => 'ashmore-and-cartier'
		),
		array(
			'id' => '14',
			'name' => 'Australia',
			'fips104' => 'AS',
			'iso2' => 'AU',
			'iso3' => 'AUS',
			'ison' => '36',
			'internet' => 'AU',
			'capital' => 'Canberra ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Australian',
			'nationality_plural' => 'Australians',
			'currency' => 'Australian dollar ',
			'currency_code' => 'AUD',
			'population' => '19357594',
			'title' => 'Australia',
			'comment' => 'ISO includes Ashmore and Cartier Islands,Coral Sea Islands',
			'slug' => 'australia'
		),
		array(
			'id' => '15',
			'name' => 'Austria (Österreich)',
			'fips104' => 'AU',
			'iso2' => 'AT',
			'iso3' => 'AUT',
			'ison' => '40',
			'internet' => 'AT',
			'capital' => 'Vienna ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Austrian',
			'nationality_plural' => 'Austrians',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '8150835',
			'title' => 'Austria',
			'comment' => '',
			'slug' => 'austria-sterreich'
		),
		array(
			'id' => '16',
			'name' => 'Azerbaijan (Azərbaycan)',
			'fips104' => 'AJ',
			'iso2' => 'AZ',
			'iso3' => 'AZE',
			'ison' => '31',
			'internet' => 'AZ',
			'capital' => 'Baku (Baki) ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Azerbaijani',
			'nationality_plural' => 'Azerbaijanis',
			'currency' => 'Azerbaijani Manat ',
			'currency_code' => 'AZM',
			'population' => '7771092',
			'title' => 'Azerbaijan',
			'comment' => '',
			'slug' => 'azerbaijan-az-rbaycan'
		),
		array(
			'id' => '17',
			'name' => 'Bahamas',
			'fips104' => 'BF',
			'iso2' => 'BS',
			'iso3' => 'BHS',
			'ison' => '44',
			'internet' => 'BS',
			'capital' => 'Nassau ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Bahamian',
			'nationality_plural' => 'Bahamians',
			'currency' => 'Bahamian Dollar ',
			'currency_code' => 'BSD',
			'population' => '297852',
			'title' => 'The Bahamas',
			'comment' => '',
			'slug' => 'bahamas'
		),
		array(
			'id' => '18',
			'name' => 'Bahrain (البحرين)',
			'fips104' => 'BA',
			'iso2' => 'BH',
			'iso3' => 'BHR',
			'ison' => '48',
			'internet' => 'BH',
			'capital' => 'Manama ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Bahraini',
			'nationality_plural' => 'Bahrainis',
			'currency' => 'Bahraini Dinar ',
			'currency_code' => 'BHD',
			'population' => '645361',
			'title' => 'Bahrain',
			'comment' => '',
			'slug' => 'bahrain'
		),
		array(
			'id' => '19',
			'name' => 'Baker Island',
			'fips104' => 'FQ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Baker Island',
			'comment' => 'ISO includes with the US Minor Outlying Islands',
			'slug' => 'baker-island'
		),
		array(
			'id' => '20',
			'name' => 'Bangladesh (বাংলাদেশ)',
			'fips104' => 'BG',
			'iso2' => 'BD',
			'iso3' => 'BGD',
			'ison' => '50',
			'internet' => 'BD',
			'capital' => 'Dhaka ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Bangladeshi',
			'nationality_plural' => 'Bangladeshis',
			'currency' => 'Taka ',
			'currency_code' => 'BDT',
			'population' => '131269860',
			'title' => 'Bangladesh',
			'comment' => '',
			'slug' => 'bangladesh'
		),
		array(
			'id' => '21',
			'name' => 'Barbados',
			'fips104' => 'BB',
			'iso2' => 'BB',
			'iso3' => 'BRB',
			'ison' => '52',
			'internet' => 'BB',
			'capital' => 'Bridgetown ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Barbadian',
			'nationality_plural' => 'Barbadians',
			'currency' => 'Barbados Dollar',
			'currency_code' => 'BBD',
			'population' => '275330',
			'title' => 'Barbados',
			'comment' => '',
			'slug' => 'barbados'
		),
		array(
			'id' => '22',
			'name' => 'Bassas da India',
			'fips104' => 'BS',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Africa ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Bassas da India',
			'comment' => 'ISO includes with the Miscellaneous (French) Indian Ocean Islands',
			'slug' => 'bassas-da-india'
		),
		array(
			'id' => '23',
			'name' => 'Belarus (Белару́сь)',
			'fips104' => 'BO',
			'iso2' => 'BY',
			'iso3' => 'BLR',
			'ison' => '112',
			'internet' => 'BY',
			'capital' => 'Minsk ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Belarusian',
			'nationality_plural' => 'Belarusians',
			'currency' => 'Belarussian Ruble',
			'currency_code' => 'BYR',
			'population' => '10350194',
			'title' => 'Belarus',
			'comment' => '',
			'slug' => 'belarus'
		),
		array(
			'id' => '24',
			'name' => 'Belgium (België)',
			'fips104' => 'BE',
			'iso2' => 'BE',
			'iso3' => 'BEL',
			'ison' => '56',
			'internet' => 'BE',
			'capital' => 'Brussels ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Belgian',
			'nationality_plural' => 'Belgians',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '10258762',
			'title' => 'Belgium',
			'comment' => '',
			'slug' => 'belgium-belgi'
		),
		array(
			'id' => '25',
			'name' => 'Belize',
			'fips104' => 'BH',
			'iso2' => 'BZ',
			'iso3' => 'BLZ',
			'ison' => '84',
			'internet' => 'BZ',
			'capital' => 'Belmopan ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Belizean',
			'nationality_plural' => 'Belizeans',
			'currency' => 'Belize Dollar',
			'currency_code' => 'BZD',
			'population' => '256062',
			'title' => 'Belize',
			'comment' => '',
			'slug' => 'belize'
		),
		array(
			'id' => '26',
			'name' => 'Benin (Bénin)',
			'fips104' => 'BN',
			'iso2' => 'BJ',
			'iso3' => 'BEN',
			'ison' => '204',
			'internet' => 'BJ',
			'capital' => 'Porto-Novo  ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Beninese',
			'nationality_plural' => 'Beninese',
			'currency' => 'CFA Franc BCEAO',
			'currency_code' => 'XOF',
			'population' => '6590782',
			'title' => 'Benin',
			'comment' => '',
			'slug' => 'benin-b-nin'
		),
		array(
			'id' => '27',
			'name' => 'Bermuda',
			'fips104' => 'BD',
			'iso2' => 'BM',
			'iso3' => 'BMU',
			'ison' => '60',
			'internet' => 'BM',
			'capital' => 'Hamilton ',
			'map_reference' => 'North America ',
			'nationality_singular' => 'Bermudian',
			'nationality_plural' => 'Bermudians',
			'currency' => 'Bermudian Dollar ',
			'currency_code' => 'BMD',
			'population' => '63503',
			'title' => 'Bermuda',
			'comment' => '',
			'slug' => 'bermuda'
		),
		array(
			'id' => '28',
			'name' => 'Bhutan (འབྲུག་ཡུལ)',
			'fips104' => 'BT',
			'iso2' => 'BT',
			'iso3' => 'BTN',
			'ison' => '64',
			'internet' => 'BT',
			'capital' => 'Thimphu ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Bhutanese',
			'nationality_plural' => 'Bhutanese',
			'currency' => 'Ngultrum',
			'currency_code' => 'BTN',
			'population' => '2049412',
			'title' => 'Bhutan',
			'comment' => '',
			'slug' => 'bhutan'
		),
		array(
			'id' => '29',
			'name' => 'Bolivia',
			'fips104' => 'BL',
			'iso2' => 'BO',
			'iso3' => 'BOL',
			'ison' => '68',
			'internet' => 'BO',
			'capital' => 'La Paz /Sucre ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Bolivian',
			'nationality_plural' => 'Bolivians',
			'currency' => 'Boliviano ',
			'currency_code' => 'BOB',
			'population' => '8300463',
			'title' => 'Bolivia',
			'comment' => '',
			'slug' => 'bolivia'
		),
		array(
			'id' => '30',
			'name' => 'Bosnia and Herzegovina (Bosna i Hercegovina)',
			'fips104' => 'BK',
			'iso2' => 'BA',
			'iso3' => 'BIH',
			'ison' => '70',
			'internet' => 'BA',
			'capital' => 'Sarajevo ',
			'map_reference' => 'Bosnia and Herzegovina, Europe ',
			'nationality_singular' => 'Bosnian and Herzegovinian',
			'nationality_plural' => 'Bosnians and Herzegovinians',
			'currency' => 'Convertible Marka',
			'currency_code' => 'BAM',
			'population' => '3922205',
			'title' => 'Bosnia and Herzegovina',
			'comment' => '',
			'slug' => 'bosnia-and-herzegovina-bosna-i-hercegovina'
		),
		array(
			'id' => '31',
			'name' => 'Botswana',
			'fips104' => 'BC',
			'iso2' => 'BW',
			'iso3' => 'BWA',
			'ison' => '72',
			'internet' => 'BW',
			'capital' => 'Gaborone ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Motswana',
			'nationality_plural' => 'Batswana',
			'currency' => 'Pula ',
			'currency_code' => 'BWP',
			'population' => '1586119',
			'title' => 'Botswana',
			'comment' => '',
			'slug' => 'botswana'
		),
		array(
			'id' => '32',
			'name' => 'Bouvet Island',
			'fips104' => 'BV',
			'iso2' => 'BV',
			'iso3' => 'BVT',
			'ison' => '74',
			'internet' => 'BV',
			'capital' => '',
			'map_reference' => 'Antarctic Region ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Norwegian Krone ',
			'currency_code' => 'NOK',
			'population' => '0',
			'title' => 'Bouvet Island',
			'comment' => '',
			'slug' => 'bouvet-island'
		),
		array(
			'id' => '33',
			'name' => 'Brazil (Brasil)',
			'fips104' => 'BR',
			'iso2' => 'BR',
			'iso3' => 'BRA',
			'ison' => '76',
			'internet' => 'BR',
			'capital' => 'Brasilia ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Brazilian',
			'nationality_plural' => 'Brazilians',
			'currency' => 'Brazilian Real ',
			'currency_code' => 'BRL',
			'population' => '174468575',
			'title' => 'Brazil',
			'comment' => '',
			'slug' => 'brazil-brasil'
		),
		array(
			'id' => '34',
			'name' => 'British Indian Ocean Territory',
			'fips104' => 'IO',
			'iso2' => 'IO',
			'iso3' => 'IOT',
			'ison' => '86',
			'internet' => 'IO',
			'capital' => '',
			'map_reference' => 'World ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '0',
			'title' => 'The British Indian Ocean Territory',
			'comment' => '',
			'slug' => 'british-indian-ocean-territory'
		),
		array(
			'id' => '35',
			'name' => 'Brunei (Brunei Darussalam)',
			'fips104' => 'BX',
			'iso2' => 'BN',
			'iso3' => 'BRN',
			'ison' => '96',
			'internet' => 'BN',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Brunei Dollar',
			'currency_code' => 'BND',
			'population' => '372361',
			'title' => 'Brunei',
			'comment' => '',
			'slug' => 'brunei-brunei-darussalam'
		),
		array(
			'id' => '36',
			'name' => 'Bulgaria (България)',
			'fips104' => 'BU',
			'iso2' => 'BG',
			'iso3' => 'BGR',
			'ison' => '100',
			'internet' => 'BG',
			'capital' => 'Sofia ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Bulgarian',
			'nationality_plural' => 'Bulgarians',
			'currency' => 'Lev ',
			'currency_code' => 'BGN',
			'population' => '7707495',
			'title' => 'Bulgaria',
			'comment' => '',
			'slug' => 'bulgaria'
		),
		array(
			'id' => '37',
			'name' => 'Burkina Faso',
			'fips104' => 'UV',
			'iso2' => 'BF',
			'iso3' => 'BFA',
			'ison' => '854',
			'internet' => 'BF',
			'capital' => 'Ouagadougou ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Burkinabe',
			'nationality_plural' => 'Burkinabe',
			'currency' => 'CFA Franc BCEAO',
			'currency_code' => 'XOF',
			'population' => '12272289',
			'title' => 'Burkina Faso',
			'comment' => '',
			'slug' => 'burkina-faso'
		),
		array(
			'id' => '38',
			'name' => 'Burundi (Uburundi)',
			'fips104' => 'BY',
			'iso2' => 'BI',
			'iso3' => 'BDI',
			'ison' => '108',
			'internet' => 'BI',
			'capital' => 'Bujumbura ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Burundi',
			'nationality_plural' => 'Burundians',
			'currency' => 'Burundi Franc ',
			'currency_code' => 'BIF',
			'population' => '6223897',
			'title' => 'Burundi',
			'comment' => '',
			'slug' => 'burundi-uburundi'
		),
		array(
			'id' => '39',
			'name' => 'Cambodia (Kampuchea)',
			'fips104' => 'CB',
			'iso2' => 'KH',
			'iso3' => 'KHM',
			'ison' => '116',
			'internet' => 'KH',
			'capital' => 'Phnom Penh ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Cambodian',
			'nationality_plural' => 'Cambodians',
			'currency' => 'Riel ',
			'currency_code' => 'KHR',
			'population' => '12491501',
			'title' => 'Cambodia',
			'comment' => '',
			'slug' => 'cambodia-kampuchea'
		),
		array(
			'id' => '40',
			'name' => 'Cameroon (Cameroun)',
			'fips104' => 'CM',
			'iso2' => 'CM',
			'iso3' => 'CMR',
			'ison' => '120',
			'internet' => 'CM',
			'capital' => 'Yaounde ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Cameroonian',
			'nationality_plural' => 'Cameroonians',
			'currency' => 'CFA Franc BEAC',
			'currency_code' => 'XAF',
			'population' => '15803220',
			'title' => 'Cameroon',
			'comment' => '',
			'slug' => 'cameroon-cameroun'
		),
		array(
			'id' => '41',
			'name' => 'Canada',
			'fips104' => 'CA',
			'iso2' => 'CA',
			'iso3' => 'CAN',
			'ison' => '124',
			'internet' => 'CA',
			'capital' => 'Ottawa ',
			'map_reference' => 'North America ',
			'nationality_singular' => 'Canadian',
			'nationality_plural' => 'Canadians',
			'currency' => 'Canadian Dollar ',
			'currency_code' => 'CAD',
			'population' => '31592805',
			'title' => 'Canada',
			'comment' => '',
			'slug' => 'canada'
		),
		array(
			'id' => '42',
			'name' => 'Cape Verde (Cabo Verde)',
			'fips104' => 'CV',
			'iso2' => 'CV',
			'iso3' => 'CPV',
			'ison' => '132',
			'internet' => 'CV',
			'capital' => 'Praia ',
			'map_reference' => 'World ',
			'nationality_singular' => 'Cape Verdean',
			'nationality_plural' => 'Cape Verdeans',
			'currency' => 'Cape Verdean Escudo ',
			'currency_code' => 'CVE',
			'population' => '405163',
			'title' => 'Cape Verde',
			'comment' => '',
			'slug' => 'cape-verde-cabo-verde'
		),
		array(
			'id' => '43',
			'name' => 'Cayman Islands',
			'fips104' => 'CJ',
			'iso2' => 'KY',
			'iso3' => 'CYM',
			'ison' => '136',
			'internet' => 'KY',
			'capital' => 'George Town ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Caymanian',
			'nationality_plural' => 'Caymanians',
			'currency' => 'Cayman Islands Dollar',
			'currency_code' => 'KYD',
			'population' => '35527',
			'title' => 'The Cayman Islands',
			'comment' => '',
			'slug' => 'cayman-islands'
		),
		array(
			'id' => '44',
			'name' => 'Central African Republic (République Centrafricain',
			'fips104' => 'CT',
			'iso2' => 'CF',
			'iso3' => 'CAF',
			'ison' => '140',
			'internet' => 'CF',
			'capital' => 'Bangui ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Central African',
			'nationality_plural' => 'Central Africans',
			'currency' => 'CFA Franc BEAC',
			'currency_code' => 'XAF',
			'population' => '3576884',
			'title' => 'The Central African Republic',
			'comment' => '',
			'slug' => 'central-african-republic-r-publique-centrafricain'
		),
		array(
			'id' => '45',
			'name' => 'Chad (Tchad)',
			'fips104' => 'CD',
			'iso2' => 'TD',
			'iso3' => 'TCD',
			'ison' => '148',
			'internet' => 'TD',
			'capital' => 'N\'Djamena ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Chadian',
			'nationality_plural' => 'Chadians',
			'currency' => 'CFA Franc BEAC',
			'currency_code' => 'XAF',
			'population' => '8707078',
			'title' => 'Chad',
			'comment' => '',
			'slug' => 'chad-tchad'
		),
		array(
			'id' => '46',
			'name' => 'Chile',
			'fips104' => 'CI',
			'iso2' => 'CL',
			'iso3' => 'CHL',
			'ison' => '152',
			'internet' => 'CL',
			'capital' => 'Santiago ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Chilean',
			'nationality_plural' => 'Chileans',
			'currency' => 'Chilean Peso ',
			'currency_code' => 'CLP',
			'population' => '15328467',
			'title' => 'Chile',
			'comment' => '',
			'slug' => 'chile'
		),
		array(
			'id' => '47',
			'name' => 'China (中国)',
			'fips104' => 'CH',
			'iso2' => 'CN',
			'iso3' => 'CHN',
			'ison' => '156',
			'internet' => 'CN',
			'capital' => 'Beijing ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Chinese',
			'nationality_plural' => 'Chinese',
			'currency' => 'Yuan Renminbi',
			'currency_code' => 'CNY',
			'population' => '1273111290',
			'title' => 'China',
			'comment' => 'see also Taiwan',
			'slug' => 'china'
		),
		array(
			'id' => '48',
			'name' => 'Christmas Island',
			'fips104' => 'KT',
			'iso2' => 'CX',
			'iso3' => 'CXR',
			'ison' => '162',
			'internet' => 'CX',
			'capital' => 'The Settlement ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Christmas Island',
			'nationality_plural' => 'Christmas Islanders',
			'currency' => 'Australian Dollar ',
			'currency_code' => 'AUD',
			'population' => '2771',
			'title' => 'Christmas Island',
			'comment' => '',
			'slug' => 'christmas-island'
		),
		array(
			'id' => '49',
			'name' => 'Clipperton Island',
			'fips104' => 'IP',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'World ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Clipperton Island',
			'comment' => 'ISO includes with French Polynesia',
			'slug' => 'clipperton-island'
		),
		array(
			'id' => '50',
			'name' => 'Cocos Islands',
			'fips104' => 'CK',
			'iso2' => 'CC',
			'iso3' => 'CCK',
			'ison' => '166',
			'internet' => 'CC',
			'capital' => 'West Island ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Cocos Islander',
			'nationality_plural' => 'Cocos Islanders',
			'currency' => 'Australian Dollar ',
			'currency_code' => 'AUD',
			'population' => '633',
			'title' => 'The Cocos Islands',
			'comment' => '',
			'slug' => 'cocos-islands'
		),
		array(
			'id' => '51',
			'name' => 'Colombia',
			'fips104' => 'CO',
			'iso2' => 'CO',
			'iso3' => 'COL',
			'ison' => '170',
			'internet' => 'CO',
			'capital' => 'Bogota ',
			'map_reference' => 'South America, Central America and the Caribbean ',
			'nationality_singular' => 'Colombian',
			'nationality_plural' => 'Colombians',
			'currency' => 'Colombian Peso ',
			'currency_code' => 'COP',
			'population' => '40349388',
			'title' => 'Colombia',
			'comment' => '',
			'slug' => 'colombia'
		),
		array(
			'id' => '52',
			'name' => 'Comoros (Comores)',
			'fips104' => 'CN',
			'iso2' => 'KM',
			'iso3' => 'COM',
			'ison' => '174',
			'internet' => 'KM',
			'capital' => 'Moroni ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Comoran',
			'nationality_plural' => 'Comorans',
			'currency' => 'Comoro Franc',
			'currency_code' => 'KMF',
			'population' => '596202',
			'title' => 'Comoros',
			'comment' => '',
			'slug' => 'comoros-comores'
		),
		array(
			'id' => '53',
			'name' => 'Congo',
			'fips104' => 'CF',
			'iso2' => 'CG',
			'iso3' => 'COG',
			'ison' => '178',
			'internet' => 'CG',
			'capital' => 'Brazzaville ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Congolese',
			'nationality_plural' => 'Congolese',
			'currency' => 'CFA Franc BEAC',
			'currency_code' => 'XAF',
			'population' => '2894336',
			'title' => 'Republic of the Congo',
			'comment' => '',
			'slug' => 'congo-1'
		),
		array(
			'id' => '54',
			'name' => 'Congo, Democratic Republic of the',
			'fips104' => 'CG',
			'iso2' => 'CD',
			'iso3' => 'COD',
			'ison' => '180',
			'internet' => 'CD',
			'capital' => 'Kinshasa ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Congolese',
			'nationality_plural' => 'Congolese',
			'currency' => 'Franc Congolais',
			'currency_code' => 'CDF',
			'population' => '53624718',
			'title' => 'Democratic Republic of the Congo',
			'comment' => 'formerly Zaire',
			'slug' => 'congo-democratic-republic-of-the'
		),
		array(
			'id' => '55',
			'name' => 'Cook Islands',
			'fips104' => 'CW',
			'iso2' => 'CK',
			'iso3' => 'COK',
			'ison' => '184',
			'internet' => 'CK',
			'capital' => 'Avarua ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Cook Islander',
			'nationality_plural' => 'Cook Islanders',
			'currency' => 'New Zealand Dollar ',
			'currency_code' => 'NZD',
			'population' => '20611',
			'title' => 'The Cook Islands',
			'comment' => '',
			'slug' => 'cook-islands'
		),
		array(
			'id' => '56',
			'name' => 'Coral Sea Islands',
			'fips104' => 'CR',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'The Coral Sea Islands',
			'comment' => 'ISO includes with Australia',
			'slug' => 'coral-sea-islands'
		),
		array(
			'id' => '57',
			'name' => 'Costa Rica',
			'fips104' => 'CS',
			'iso2' => 'CR',
			'iso3' => 'CRI',
			'ison' => '188',
			'internet' => 'CR',
			'capital' => 'San Jose ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Costa Rican',
			'nationality_plural' => 'Costa Ricans',
			'currency' => 'Costa Rican Colon',
			'currency_code' => 'CRC',
			'population' => '3773057',
			'title' => 'Costa Rica',
			'comment' => '',
			'slug' => 'costa-rica'
		),
		array(
			'id' => '58',
			'name' => 'Côte d&#39;Ivoire',
			'fips104' => 'IV',
			'iso2' => 'CI',
			'iso3' => 'CIV',
			'ison' => '384',
			'internet' => 'CI',
			'capital' => 'Yamoussoukro',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Ivorian',
			'nationality_plural' => 'Ivorians',
			'currency' => 'CFA Franc BCEAO',
			'currency_code' => 'XOF',
			'population' => '16393221',
			'title' => 'Cote d\'Ivoire',
			'comment' => '',
			'slug' => 'c-te-d-39-ivoire'
		),
		array(
			'id' => '59',
			'name' => 'Croatia (Hrvatska)',
			'fips104' => 'HR',
			'iso2' => 'HR',
			'iso3' => 'HRV',
			'ison' => '191',
			'internet' => 'HR',
			'capital' => 'Zagreb ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Croatian',
			'nationality_plural' => 'Croats',
			'currency' => 'Kuna',
			'currency_code' => 'HRK',
			'population' => '4334142',
			'title' => 'Croatia',
			'comment' => '',
			'slug' => 'croatia-hrvatska'
		),
		array(
			'id' => '60',
			'name' => 'Cuba',
			'fips104' => 'CU',
			'iso2' => 'CU',
			'iso3' => 'CUB',
			'ison' => '192',
			'internet' => 'CU',
			'capital' => 'Havana ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Cuban',
			'nationality_plural' => 'Cubans',
			'currency' => 'Cuban Peso',
			'currency_code' => 'CUP',
			'population' => '11184023',
			'title' => 'Cuba',
			'comment' => '',
			'slug' => 'cuba'
		),
		array(
			'id' => '61',
			'name' => 'Cyprus (Κυπρος)',
			'fips104' => 'CY',
			'iso2' => 'CY',
			'iso3' => 'CYP',
			'ison' => '196',
			'internet' => 'CY',
			'capital' => 'Nicosia ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Cypriot',
			'nationality_plural' => 'Cypriots',
			'currency' => 'Cyprus Pound',
			'currency_code' => 'CYP',
			'population' => '762887',
			'title' => 'Cyprus',
			'comment' => '',
			'slug' => 'cyprus'
		),
		array(
			'id' => '62',
			'name' => 'Czech Republic (Česko)',
			'fips104' => 'EZ',
			'iso2' => 'CZ',
			'iso3' => 'CZE',
			'ison' => '203',
			'internet' => 'CZ',
			'capital' => 'Prague ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Czech',
			'nationality_plural' => 'Czechs',
			'currency' => 'Czech Koruna',
			'currency_code' => 'CZK',
			'population' => '10264212',
			'title' => 'The Czech Republic',
			'comment' => '',
			'slug' => 'czech-republic-esko'
		),
		array(
			'id' => '63',
			'name' => 'Denmark (Danmark)',
			'fips104' => 'DA',
			'iso2' => 'DK',
			'iso3' => 'DNK',
			'ison' => '208',
			'internet' => 'DK',
			'capital' => 'Copenhagen ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Danish',
			'nationality_plural' => 'Danes',
			'currency' => 'Danish Krone',
			'currency_code' => 'DKK',
			'population' => '5352815',
			'title' => 'Denmark',
			'comment' => '',
			'slug' => 'denmark-danmark'
		),
		array(
			'id' => '64',
			'name' => 'Djibouti',
			'fips104' => 'DJ',
			'iso2' => 'DJ',
			'iso3' => 'DJI',
			'ison' => '262',
			'internet' => 'DJ',
			'capital' => 'Djibouti ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Djiboutian',
			'nationality_plural' => 'Djiboutians',
			'currency' => 'Djibouti Franc',
			'currency_code' => 'DJF',
			'population' => '460700',
			'title' => 'Djibouti',
			'comment' => '',
			'slug' => 'djibouti'
		),
		array(
			'id' => '65',
			'name' => 'Dominica',
			'fips104' => 'DO',
			'iso2' => 'DM',
			'iso3' => 'DMA',
			'ison' => '212',
			'internet' => 'DM',
			'capital' => 'Roseau ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Dominican',
			'nationality_plural' => 'Dominicans',
			'currency' => 'East Caribbean Dollar',
			'currency_code' => 'XCD',
			'population' => '70786',
			'title' => 'Dominica',
			'comment' => '',
			'slug' => 'dominica'
		),
		array(
			'id' => '66',
			'name' => 'Dominican Republic',
			'fips104' => 'DR',
			'iso2' => 'DO',
			'iso3' => 'DOM',
			'ison' => '214',
			'internet' => 'DO',
			'capital' => 'Santo Domingo ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Dominican',
			'nationality_plural' => 'Dominicans',
			'currency' => 'Dominican Peso',
			'currency_code' => 'DOP',
			'population' => '8581477',
			'title' => 'The Dominican Republic',
			'comment' => '',
			'slug' => 'dominican-republic'
		),
		array(
			'id' => '67',
			'name' => 'Ecuador',
			'fips104' => 'EC',
			'iso2' => 'EC',
			'iso3' => 'ECU',
			'ison' => '218',
			'internet' => 'EC',
			'capital' => 'Quito ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Ecuadorian',
			'nationality_plural' => 'Ecuadorians',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '13183978',
			'title' => 'Ecuador',
			'comment' => '',
			'slug' => 'ecuador'
		),
		array(
			'id' => '68',
			'name' => 'Egypt (مصر)',
			'fips104' => 'EG',
			'iso2' => 'EG',
			'iso3' => 'EGY',
			'ison' => '818',
			'internet' => 'EG',
			'capital' => 'Cairo ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Egyptian',
			'nationality_plural' => 'Egyptians',
			'currency' => 'Egyptian Pound ',
			'currency_code' => 'EGP',
			'population' => '69536644',
			'title' => 'Egypt',
			'comment' => '',
			'slug' => 'egypt'
		),
		array(
			'id' => '69',
			'name' => 'El Salvador',
			'fips104' => 'ES',
			'iso2' => 'SV',
			'iso3' => 'SLV',
			'ison' => '222',
			'internet' => 'SV',
			'capital' => 'San Salvador ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Salvadoran',
			'nationality_plural' => 'Salvadorans',
			'currency' => 'El Salvador Colon',
			'currency_code' => 'SVC',
			'population' => '6237662',
			'title' => 'El Salvador',
			'comment' => '',
			'slug' => 'el-salvador'
		),
		array(
			'id' => '70',
			'name' => 'Equatorial Guinea (Guinea Ecuatorial)',
			'fips104' => 'EK',
			'iso2' => 'GQ',
			'iso3' => 'GNQ',
			'ison' => '226',
			'internet' => 'GQ',
			'capital' => 'Malabo ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Equatorial Guinean',
			'nationality_plural' => 'Equatorial Guineans',
			'currency' => 'CFA Franc BEAC',
			'currency_code' => 'XAF',
			'population' => '486060',
			'title' => 'Equatorial Guinea',
			'comment' => '',
			'slug' => 'equatorial-guinea-guinea-ecuatorial'
		),
		array(
			'id' => '71',
			'name' => 'Eritrea (Ertra)',
			'fips104' => 'ER',
			'iso2' => 'ER',
			'iso3' => 'ERI',
			'ison' => '232',
			'internet' => 'ER',
			'capital' => 'Asmara ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Eritrean',
			'nationality_plural' => 'Eritreans',
			'currency' => 'Nakfa',
			'currency_code' => 'ERN',
			'population' => '4298269',
			'title' => 'Eritrea',
			'comment' => '',
			'slug' => 'eritrea-ertra'
		),
		array(
			'id' => '72',
			'name' => 'Estonia (Eesti)',
			'fips104' => 'EN',
			'iso2' => 'EE',
			'iso3' => 'EST',
			'ison' => '233',
			'internet' => 'EE',
			'capital' => 'Tallinn ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Estonian',
			'nationality_plural' => 'Estonians',
			'currency' => 'Kroon',
			'currency_code' => 'EEK',
			'population' => '1423316',
			'title' => 'Estonia',
			'comment' => '',
			'slug' => 'estonia-eesti'
		),
		array(
			'id' => '73',
			'name' => 'Ethiopia (Ityop&#39;iya)',
			'fips104' => 'ET',
			'iso2' => 'ET',
			'iso3' => 'ETH',
			'ison' => '231',
			'internet' => 'ET',
			'capital' => 'Addis Ababa ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Ethiopian',
			'nationality_plural' => 'Ethiopians',
			'currency' => 'Ethiopian Birr',
			'currency_code' => 'ETB',
			'population' => '65891874',
			'title' => 'Ethiopia',
			'comment' => '',
			'slug' => 'ethiopia-ityop-39-iya'
		),
		array(
			'id' => '74',
			'name' => 'Europa Island',
			'fips104' => 'EU',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Africa ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Europa Island',
			'comment' => 'ISO includes with the Miscellaneous (French) Indian Ocean Islands',
			'slug' => 'europa-island'
		),
		array(
			'id' => '75',
			'name' => 'Falkland Islands',
			'fips104' => 'FK',
			'iso2' => 'FK',
			'iso3' => 'FLK',
			'ison' => '238',
			'internet' => 'FK',
			'capital' => 'Stanley',
			'map_reference' => 'South America',
			'nationality_singular' => 'Falkland Island',
			'nationality_plural' => 'Falkland Islanders',
			'currency' => 'Falkland Islands Pound',
			'currency_code' => 'FKP',
			'population' => '2895',
			'title' => 'The Falkland Islands ',
			'comment' => '',
			'slug' => 'falkland-islands'
		),
		array(
			'id' => '76',
			'name' => 'Faroe Islands',
			'fips104' => 'FO',
			'iso2' => 'FO',
			'iso3' => 'FRO',
			'ison' => '234',
			'internet' => 'FO',
			'capital' => 'Torshavn ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Faroese',
			'nationality_plural' => 'Faroese',
			'currency' => 'Danish Krone ',
			'currency_code' => 'DKK',
			'population' => '45661',
			'title' => 'The Faroe Islands',
			'comment' => '',
			'slug' => 'faroe-islands'
		),
		array(
			'id' => '77',
			'name' => 'Fiji',
			'fips104' => 'FJ',
			'iso2' => 'FJ',
			'iso3' => 'FJI',
			'ison' => '242',
			'internet' => 'FJ',
			'capital' => 'Suva ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Fijian',
			'nationality_plural' => 'Fijians',
			'currency' => 'Fijian Dollar ',
			'currency_code' => 'FJD',
			'population' => '844330',
			'title' => 'Fiji',
			'comment' => '',
			'slug' => 'fiji'
		),
		array(
			'id' => '78',
			'name' => 'Finland (Suomi)',
			'fips104' => 'FI',
			'iso2' => 'FI',
			'iso3' => 'FIN',
			'ison' => '246',
			'internet' => 'FI',
			'capital' => 'Helsinki ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Finnish',
			'nationality_plural' => 'Finns',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '5175783',
			'title' => 'Finland',
			'comment' => '',
			'slug' => 'finland-suomi'
		),
		array(
			'id' => '79',
			'name' => 'France',
			'fips104' => 'FR',
			'iso2' => 'FR',
			'iso3' => 'FRA',
			'ison' => '250',
			'internet' => 'FR',
			'capital' => 'Paris ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Frenchman',
			'nationality_plural' => 'Frenchmen',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '59551227',
			'title' => 'France',
			'comment' => '',
			'slug' => 'france'
		),
		array(
			'id' => '80',
			'name' => 'France, Metropolitan',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => 'FX',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '0',
			'title' => 'Metropolitan France',
			'comment' => 'ISO limits to the European part of France, excluding French Guiana, French Polynesia, French Southern and Antarctic Lands, Guadeloupe, Martinique, Mayotte, New Caledonia, Reunion, Saint Pierre and Miquelon, Wallis and Futuna',
			'slug' => 'france-metropolitan'
		),
		array(
			'id' => '81',
			'name' => 'French Guiana',
			'fips104' => 'FG',
			'iso2' => 'GF',
			'iso3' => 'GUF',
			'ison' => '254',
			'internet' => 'GF',
			'capital' => 'Cayenne ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'French Guianese',
			'nationality_plural' => 'French Guianese',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '177562',
			'title' => 'French Guiana',
			'comment' => '',
			'slug' => 'french-guiana'
		),
		array(
			'id' => '82',
			'name' => 'French Polynesia',
			'fips104' => 'FP',
			'iso2' => 'PF',
			'iso3' => 'PYF',
			'ison' => '258',
			'internet' => 'PF',
			'capital' => 'Papeete ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'French Polynesian',
			'nationality_plural' => 'French Polynesians',
			'currency' => 'CFP Franc',
			'currency_code' => 'XPF',
			'population' => '253506',
			'title' => 'French Polynesia',
			'comment' => 'ISO includes Clipperton Island',
			'slug' => 'french-polynesia'
		),
		array(
			'id' => '83',
			'name' => 'French Southern Territories',
			'fips104' => 'FS',
			'iso2' => 'TF',
			'iso3' => 'ATF',
			'ison' => '260',
			'internet' => 'TF',
			'capital' => '',
			'map_reference' => 'Antarctic Region ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '0',
			'title' => 'The French Southern and Antarctic Lands',
			'comment' => 'FIPS 10-4 does not include the French-claimed portion of Antarctica (Terre Adelie)',
			'slug' => 'french-southern-territories'
		),
		array(
			'id' => '84',
			'name' => 'Gabon',
			'fips104' => 'GB',
			'iso2' => 'GA',
			'iso3' => 'GAB',
			'ison' => '266',
			'internet' => 'GA',
			'capital' => 'Libreville ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Gabonese',
			'nationality_plural' => 'Gabonese',
			'currency' => 'CFA Franc BEAC',
			'currency_code' => 'XAF',
			'population' => '1221175',
			'title' => 'Gabon',
			'comment' => '',
			'slug' => 'gabon'
		),
		array(
			'id' => '85',
			'name' => 'Gambia',
			'fips104' => 'GA',
			'iso2' => 'GM',
			'iso3' => 'GMB',
			'ison' => '270',
			'internet' => 'GM',
			'capital' => 'Banjul ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Gambian',
			'nationality_plural' => 'Gambians',
			'currency' => 'Dalasi',
			'currency_code' => 'GMD',
			'population' => '1411205',
			'title' => 'The Gambia',
			'comment' => '',
			'slug' => 'gambia'
		),
		array(
			'id' => '86',
			'name' => 'Gaza Strip',
			'fips104' => 'GZ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Middle East ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'New Israeli Shekel ',
			'currency_code' => 'ILS',
			'population' => '1178119',
			'title' => 'The Gaza Strip',
			'comment' => '',
			'slug' => 'gaza-strip'
		),
		array(
			'id' => '87',
			'name' => 'Georgia (საქართველო)',
			'fips104' => 'GG',
			'iso2' => 'GE',
			'iso3' => 'GEO',
			'ison' => '268',
			'internet' => 'GE',
			'capital' => 'T\'bilisi ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Georgian',
			'nationality_plural' => 'Georgians',
			'currency' => 'Lari',
			'currency_code' => 'GEL',
			'population' => '4989285',
			'title' => 'Georgia',
			'comment' => '',
			'slug' => 'georgia'
		),
		array(
			'id' => '88',
			'name' => 'Germany (Deutschland)',
			'fips104' => 'GM',
			'iso2' => 'DE',
			'iso3' => 'DEU',
			'ison' => '276',
			'internet' => 'DE',
			'capital' => 'Berlin ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'German',
			'nationality_plural' => 'Germans',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '83029536',
			'title' => 'Deutschland',
			'comment' => '',
			'slug' => 'germany-deutschland'
		),
		array(
			'id' => '89',
			'name' => 'Ghana',
			'fips104' => 'GH',
			'iso2' => 'GH',
			'iso3' => 'GHA',
			'ison' => '288',
			'internet' => 'GH',
			'capital' => 'Accra ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Ghanaian',
			'nationality_plural' => 'Ghanaians',
			'currency' => 'Cedi',
			'currency_code' => 'GHC',
			'population' => '19894014',
			'title' => 'Ghana',
			'comment' => '',
			'slug' => 'ghana'
		),
		array(
			'id' => '90',
			'name' => 'Gibraltar',
			'fips104' => 'GI',
			'iso2' => 'GI',
			'iso3' => 'GIB',
			'ison' => '292',
			'internet' => 'GI',
			'capital' => 'Gibraltar ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Gibraltar',
			'nationality_plural' => 'Gibraltarians',
			'currency' => 'Gibraltar Pound',
			'currency_code' => 'GIP',
			'population' => '27649',
			'title' => 'Gibraltar',
			'comment' => '',
			'slug' => 'gibraltar'
		),
		array(
			'id' => '91',
			'name' => 'Glorioso Islands',
			'fips104' => 'GO',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Africa ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'The Glorioso Islands',
			'comment' => 'ISO includes with the Miscellaneous (French) Indian Ocean Islands',
			'slug' => 'glorioso-islands'
		),
		array(
			'id' => '92',
			'name' => 'Greece (Ελλάς)',
			'fips104' => 'GR',
			'iso2' => 'GR',
			'iso3' => 'GRC',
			'ison' => '300',
			'internet' => 'GR',
			'capital' => 'Athens ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Greek',
			'nationality_plural' => 'Greeks',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '10623835',
			'title' => 'Greece',
			'comment' => '',
			'slug' => 'greece'
		),
		array(
			'id' => '93',
			'name' => 'Greenland',
			'fips104' => 'GL',
			'iso2' => 'GL',
			'iso3' => 'GRL',
			'ison' => '304',
			'internet' => 'GL',
			'capital' => 'Nuuk ',
			'map_reference' => 'Arctic Region ',
			'nationality_singular' => 'Greenlandic',
			'nationality_plural' => 'Greenlanders',
			'currency' => 'Danish Krone',
			'currency_code' => 'DKK',
			'population' => '56352',
			'title' => 'Greenland',
			'comment' => '',
			'slug' => 'greenland'
		),
		array(
			'id' => '94',
			'name' => 'Grenada',
			'fips104' => 'GJ',
			'iso2' => 'GD',
			'iso3' => 'GRD',
			'ison' => '308',
			'internet' => 'GD',
			'capital' => 'Saint George\'s ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Grenadian',
			'nationality_plural' => 'Grenadians',
			'currency' => 'East Caribbean Dollar',
			'currency_code' => 'XCD',
			'population' => '89227',
			'title' => 'Grenada',
			'comment' => '',
			'slug' => 'grenada'
		),
		array(
			'id' => '95',
			'name' => 'Guadeloupe',
			'fips104' => 'GP',
			'iso2' => 'GP',
			'iso3' => 'GLP',
			'ison' => '312',
			'internet' => 'GP',
			'capital' => 'Basse-Terre ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Guadeloupe',
			'nationality_plural' => 'Guadeloupians',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '431170',
			'title' => 'Guadeloupe',
			'comment' => '',
			'slug' => 'guadeloupe'
		),
		array(
			'id' => '96',
			'name' => 'Guam',
			'fips104' => 'GQ',
			'iso2' => 'GU',
			'iso3' => 'GUM',
			'ison' => '316',
			'internet' => 'GU',
			'capital' => 'Hagatna',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Guamanian',
			'nationality_plural' => 'Guamanians',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '157557',
			'title' => 'Guam',
			'comment' => '',
			'slug' => 'guam'
		),
		array(
			'id' => '97',
			'name' => 'Guatemala',
			'fips104' => 'GT',
			'iso2' => 'GT',
			'iso3' => 'GTM',
			'ison' => '320',
			'internet' => 'GT',
			'capital' => 'Guatemala ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Guatemalan',
			'nationality_plural' => 'Guatemalans',
			'currency' => 'Quetzal',
			'currency_code' => 'GTQ',
			'population' => '12974361',
			'title' => 'Guatemala',
			'comment' => '',
			'slug' => 'guatemala'
		),
		array(
			'id' => '98',
			'name' => 'Guernsey',
			'fips104' => 'GK',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => 'GG',
			'capital' => 'Saint Peter Port ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Channel Islander',
			'nationality_plural' => 'Channel Islanders',
			'currency' => 'Pound Sterling',
			'currency_code' => 'GBP',
			'population' => '64342',
			'title' => 'Guernsey',
			'comment' => 'ISO includes with the United Kingdom',
			'slug' => 'guernsey'
		),
		array(
			'id' => '99',
			'name' => 'Guinea (Guinée)',
			'fips104' => 'GV',
			'iso2' => 'GN',
			'iso3' => 'GIN',
			'ison' => '324',
			'internet' => 'GN',
			'capital' => 'Conakry ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Guinean',
			'nationality_plural' => 'Guineans',
			'currency' => 'Guinean Franc ',
			'currency_code' => 'GNF',
			'population' => '7613870',
			'title' => 'Guinea',
			'comment' => '',
			'slug' => 'guinea-guin-e'
		),
		array(
			'id' => '100',
			'name' => 'Guinea-Bissau (Guiné-Bissau)',
			'fips104' => 'PU',
			'iso2' => 'GW',
			'iso3' => 'GNB',
			'ison' => '624',
			'internet' => 'GW',
			'capital' => 'Bissau ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Guinean',
			'nationality_plural' => 'Guineans',
			'currency' => 'CFA Franc BCEAO',
			'currency_code' => 'XOF',
			'population' => '1315822',
			'title' => 'Guinea-Bissau',
			'comment' => '',
			'slug' => 'guinea-bissau-guin-bissau'
		),
		array(
			'id' => '101',
			'name' => 'Guyana',
			'fips104' => 'GY',
			'iso2' => 'GY',
			'iso3' => 'GUY',
			'ison' => '328',
			'internet' => 'GY',
			'capital' => 'Georgetown ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Guyanese',
			'nationality_plural' => 'Guyanese',
			'currency' => 'Guyana Dollar',
			'currency_code' => 'GYD',
			'population' => '697181',
			'title' => 'Guyana',
			'comment' => '',
			'slug' => 'guyana'
		),
		array(
			'id' => '102',
			'name' => 'Haiti (Haïti)',
			'fips104' => 'HA',
			'iso2' => 'HT',
			'iso3' => 'HTI',
			'ison' => '332',
			'internet' => 'HT',
			'capital' => 'Port-au-Prince ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Haitian',
			'nationality_plural' => 'Haitians',
			'currency' => 'Gourde',
			'currency_code' => 'HTG',
			'population' => '6964549',
			'title' => 'Haiti',
			'comment' => '',
			'slug' => 'haiti-ha-ti'
		),
		array(
			'id' => '103',
			'name' => 'Heard Island and McDonald Islands',
			'fips104' => 'HM',
			'iso2' => 'HM',
			'iso3' => 'HMD',
			'ison' => '334',
			'internet' => 'HM',
			'capital' => '',
			'map_reference' => 'Antarctic Region ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Australian Dollar',
			'currency_code' => 'AUD',
			'population' => '0',
			'title' => 'The Heard Island and McDonald Islands',
			'comment' => '',
			'slug' => 'heard-island-and-mcdonald-islands'
		),
		array(
			'id' => '104',
			'name' => 'Honduras',
			'fips104' => 'HO',
			'iso2' => 'HN',
			'iso3' => 'HND',
			'ison' => '340',
			'internet' => 'HN',
			'capital' => 'Tegucigalpa ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Honduran',
			'nationality_plural' => 'Hondurans',
			'currency' => 'Lempira',
			'currency_code' => 'HNL',
			'population' => '6406052',
			'title' => 'Honduras',
			'comment' => '',
			'slug' => 'honduras'
		),
		array(
			'id' => '105',
			'name' => 'Hong Kong',
			'fips104' => 'HK',
			'iso2' => 'HK',
			'iso3' => 'HKG',
			'ison' => '344',
			'internet' => 'HK',
			'capital' => '',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Hong Kong Dollar ',
			'currency_code' => 'HKD',
			'population' => '0',
			'title' => 'Xianggang ',
			'comment' => '',
			'slug' => 'hong-kong'
		),
		array(
			'id' => '106',
			'name' => 'Howland Island',
			'fips104' => 'HQ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '7210505',
			'title' => 'Howland Island',
			'comment' => 'ISO includes with the US Minor Outlying Islands',
			'slug' => 'howland-island'
		),
		array(
			'id' => '107',
			'name' => 'Hungary (Magyarország)',
			'fips104' => 'HU',
			'iso2' => 'HU',
			'iso3' => 'HUN',
			'ison' => '348',
			'internet' => 'HU',
			'capital' => 'Budapest ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Hungarian',
			'nationality_plural' => 'Hungarians',
			'currency' => 'Forint',
			'currency_code' => 'HUF',
			'population' => '10106017',
			'title' => 'Hungary',
			'comment' => '',
			'slug' => 'hungary-magyarorsz-g'
		),
		array(
			'id' => '108',
			'name' => 'Iceland (Ísland)',
			'fips104' => 'IC',
			'iso2' => 'IS',
			'iso3' => 'ISL',
			'ison' => '352',
			'internet' => 'IS',
			'capital' => 'Reykjavik ',
			'map_reference' => 'Arctic Region ',
			'nationality_singular' => 'Icelandic',
			'nationality_plural' => 'Icelanders',
			'currency' => 'Iceland Krona',
			'currency_code' => 'ISK',
			'population' => '277906',
			'title' => 'Iceland',
			'comment' => '',
			'slug' => 'iceland-sland'
		),
		array(
			'id' => '109',
			'name' => 'India',
			'fips104' => 'IN',
			'iso2' => 'IN',
			'iso3' => 'IND',
			'ison' => '356',
			'internet' => 'IN',
			'capital' => 'New Delhi ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Indian',
			'nationality_plural' => 'Indians',
			'currency' => 'Indian Rupee ',
			'currency_code' => 'INR',
			'population' => '1029991145',
			'title' => 'India',
			'comment' => '',
			'slug' => 'india'
		),
		array(
			'id' => '110',
			'name' => 'Indonesia',
			'fips104' => 'ID',
			'iso2' => 'ID',
			'iso3' => 'IDN',
			'ison' => '360',
			'internet' => 'ID',
			'capital' => 'Jakarta ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Indonesian',
			'nationality_plural' => 'Indonesians',
			'currency' => 'Rupiah',
			'currency_code' => 'IDR',
			'population' => '228437870',
			'title' => 'Indonesia',
			'comment' => '',
			'slug' => 'indonesia'
		),
		array(
			'id' => '111',
			'name' => 'Iran (ایران)',
			'fips104' => 'IR',
			'iso2' => 'IR',
			'iso3' => 'IRN',
			'ison' => '364',
			'internet' => 'IR',
			'capital' => 'Tehran ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Iranian',
			'nationality_plural' => 'Iranians',
			'currency' => 'Iranian Rial',
			'currency_code' => 'IRR',
			'population' => '66128965',
			'title' => 'Iran',
			'comment' => '',
			'slug' => 'iran'
		),
		array(
			'id' => '112',
			'name' => 'Iraq (العراق)',
			'fips104' => 'IZ',
			'iso2' => 'IQ',
			'iso3' => 'IRQ',
			'ison' => '368',
			'internet' => 'IQ',
			'capital' => 'Baghdad ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Iraqi',
			'nationality_plural' => 'Iraqis',
			'currency' => 'Iraqi Dinar',
			'currency_code' => 'IQD',
			'population' => '23331985',
			'title' => 'Iraq',
			'comment' => '',
			'slug' => 'iraq'
		),
		array(
			'id' => '113',
			'name' => 'Ireland',
			'fips104' => 'EI',
			'iso2' => 'IE',
			'iso3' => 'IRL',
			'ison' => '372',
			'internet' => 'IE',
			'capital' => 'Dublin ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Irish',
			'nationality_plural' => 'Irishmen',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '3840838',
			'title' => 'Ireland',
			'comment' => '',
			'slug' => 'ireland'
		),
		array(
			'id' => '114',
			'name' => 'Israel (ישראל)',
			'fips104' => 'IS',
			'iso2' => 'IL',
			'iso3' => 'ISR',
			'ison' => '376',
			'internet' => 'IL',
			'capital' => 'Jerusalem',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Israeli',
			'nationality_plural' => 'Israelis',
			'currency' => 'New Israeli Sheqel',
			'currency_code' => 'ILS',
			'population' => '5938093',
			'title' => 'Israel',
			'comment' => '',
			'slug' => 'israel'
		),
		array(
			'id' => '115',
			'name' => 'Italy (Italia)',
			'fips104' => 'IT',
			'iso2' => 'IT',
			'iso3' => 'ITA',
			'ison' => '380',
			'internet' => 'IT',
			'capital' => 'Rome ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Italian',
			'nationality_plural' => 'Italians',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '57679825',
			'title' => 'Italia ',
			'comment' => '',
			'slug' => 'italy-italia'
		),
		array(
			'id' => '116',
			'name' => 'Jamaica',
			'fips104' => 'JM',
			'iso2' => 'JM',
			'iso3' => 'JAM',
			'ison' => '388',
			'internet' => 'JM',
			'capital' => 'Kingston ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Jamaican',
			'nationality_plural' => 'Jamaicans',
			'currency' => 'Jamaican dollar ',
			'currency_code' => 'JMD',
			'population' => '2665636',
			'title' => 'Jamaica',
			'comment' => '',
			'slug' => 'jamaica'
		),
		array(
			'id' => '117',
			'name' => 'Jan Mayen',
			'fips104' => 'JN',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Arctic Region ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Norway Kroner',
			'currency_code' => 'NOK',
			'population' => '0',
			'title' => 'Jan Mayen',
			'comment' => 'ISO includes with Svalbard',
			'slug' => 'jan-mayen'
		),
		array(
			'id' => '118',
			'name' => 'Japan (日本)',
			'fips104' => 'JA',
			'iso2' => 'JP',
			'iso3' => 'JPN',
			'ison' => '392',
			'internet' => 'JP',
			'capital' => 'Tokyo ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Japanese',
			'nationality_plural' => 'Japanese',
			'currency' => 'Yen ',
			'currency_code' => 'JPY',
			'population' => '126771662',
			'title' => 'Japan',
			'comment' => '',
			'slug' => 'japan'
		),
		array(
			'id' => '119',
			'name' => 'Jarvis Island',
			'fips104' => 'DQ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Jarvis Island',
			'comment' => 'ISO includes with the US Minor Outlying Islands',
			'slug' => 'jarvis-island'
		),
		array(
			'id' => '120',
			'name' => 'Jersey',
			'fips104' => 'JE',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => 'JE',
			'capital' => 'Saint Helier ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Channel Islander',
			'nationality_plural' => 'Channel Islanders',
			'currency' => 'Pound Sterling',
			'currency_code' => 'GBP',
			'population' => '89361',
			'title' => 'Jersey',
			'comment' => 'ISO includes with the United Kingdom',
			'slug' => 'jersey'
		),
		array(
			'id' => '121',
			'name' => 'Johnston Atoll',
			'fips104' => 'JQ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Johnston Atoll',
			'comment' => 'ISO includes with the US Minor Outlying Islands',
			'slug' => 'johnston-atoll'
		),
		array(
			'id' => '122',
			'name' => 'Jordan (الاردن)',
			'fips104' => 'JO',
			'iso2' => 'JO',
			'iso3' => 'JOR',
			'ison' => '400',
			'internet' => 'JO',
			'capital' => 'Amman ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Jordanian',
			'nationality_plural' => 'Jordanians',
			'currency' => 'Jordanian Dinar',
			'currency_code' => 'JOD',
			'population' => '5153378',
			'title' => 'Jordan',
			'comment' => '',
			'slug' => 'jordan'
		),
		array(
			'id' => '123',
			'name' => 'Juan de Nova Island',
			'fips104' => 'JU',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Africa ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Juan de Nova Island',
			'comment' => 'ISO includes with the Miscellaneous (French) Indian Ocean Islands',
			'slug' => 'juan-de-nova-island'
		),
		array(
			'id' => '124',
			'name' => 'Kazakhstan (Қазақстан)',
			'fips104' => 'KZ',
			'iso2' => 'KZ',
			'iso3' => 'KAZ',
			'ison' => '398',
			'internet' => 'KZ',
			'capital' => 'Astana ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Kazakhstani',
			'nationality_plural' => 'Kazakhstanis',
			'currency' => 'Tenge',
			'currency_code' => 'KZT',
			'population' => '16731303',
			'title' => 'Kazakhstan',
			'comment' => '',
			'slug' => 'kazakhstan'
		),
		array(
			'id' => '125',
			'name' => 'Kenya',
			'fips104' => 'KE',
			'iso2' => 'KE',
			'iso3' => 'KEN',
			'ison' => '404',
			'internet' => 'KE',
			'capital' => 'Nairobi ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Kenyan',
			'nationality_plural' => 'Kenyans',
			'currency' => 'Kenyan shilling ',
			'currency_code' => 'KES',
			'population' => '30765916',
			'title' => 'Kenya',
			'comment' => '',
			'slug' => 'kenya'
		),
		array(
			'id' => '126',
			'name' => 'Kingman Reef',
			'fips104' => 'KQ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Kingman Reef',
			'comment' => 'ISO includes with the US Minor Outlying Islands',
			'slug' => 'kingman-reef'
		),
		array(
			'id' => '127',
			'name' => 'Kiribati',
			'fips104' => 'KR',
			'iso2' => 'KI',
			'iso3' => 'KIR',
			'ison' => '296',
			'internet' => 'KI',
			'capital' => 'Tarawa ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'I-Kiribati',
			'nationality_plural' => 'I-Kiribati',
			'currency' => 'Australian dollar ',
			'currency_code' => 'AUD',
			'population' => '94149',
			'title' => 'Kiribati',
			'comment' => '',
			'slug' => 'kiribati'
		),
		array(
			'id' => '128',
			'name' => 'Kuwait (الكويت)',
			'fips104' => 'KU',
			'iso2' => 'KW',
			'iso3' => 'KWT',
			'ison' => '414',
			'internet' => 'KW',
			'capital' => 'Kuwait ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Kuwaiti',
			'nationality_plural' => 'Kuwaitis',
			'currency' => 'Kuwaiti Dinar',
			'currency_code' => 'KWD',
			'population' => '2041961',
			'title' => 'Al Kuwayt',
			'comment' => '',
			'slug' => 'kuwait'
		),
		array(
			'id' => '129',
			'name' => 'Kyrgyzstan (Кыргызстан)',
			'fips104' => 'KG',
			'iso2' => 'KG',
			'iso3' => 'KGZ',
			'ison' => '417',
			'internet' => 'KG',
			'capital' => 'Bishkek ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Kyrgyzstani',
			'nationality_plural' => 'Kyrgyzstanis',
			'currency' => 'Som',
			'currency_code' => 'KGS',
			'population' => '4753003',
			'title' => 'Kyrgyzstan',
			'comment' => '',
			'slug' => 'kyrgyzstan'
		),
		array(
			'id' => '130',
			'name' => 'Laos (ນລາວ)',
			'fips104' => 'LA',
			'iso2' => 'LA',
			'iso3' => 'LAO',
			'ison' => '418',
			'internet' => 'LA',
			'capital' => 'Vientiane ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Lao',
			'nationality_plural' => 'Laos',
			'currency' => 'Kip',
			'currency_code' => 'LAK',
			'population' => '5635967',
			'title' => 'Laos',
			'comment' => '',
			'slug' => 'laos'
		),
		array(
			'id' => '131',
			'name' => 'Latvia (Latvija)',
			'fips104' => 'LG',
			'iso2' => 'LV',
			'iso3' => 'LVA',
			'ison' => '428',
			'internet' => 'LV',
			'capital' => 'Riga ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Latvian',
			'nationality_plural' => 'Latvians',
			'currency' => 'Latvian Lats',
			'currency_code' => 'LVL',
			'population' => '2385231',
			'title' => 'Latvia',
			'comment' => '',
			'slug' => 'latvia-latvija'
		),
		array(
			'id' => '132',
			'name' => 'Lebanon (لبنان)',
			'fips104' => 'LE',
			'iso2' => 'LB',
			'iso3' => 'LBN',
			'ison' => '422',
			'internet' => 'LB',
			'capital' => 'Beirut ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Lebanese',
			'nationality_plural' => 'Lebanese',
			'currency' => 'Lebanese Pound',
			'currency_code' => 'LBP',
			'population' => '3627774',
			'title' => 'Lebanon',
			'comment' => '',
			'slug' => 'lebanon'
		),
		array(
			'id' => '133',
			'name' => 'Lesotho',
			'fips104' => 'LT',
			'iso2' => 'LS',
			'iso3' => 'LSO',
			'ison' => '426',
			'internet' => 'LS',
			'capital' => 'Maseru ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Basotho',
			'nationality_plural' => 'Mosotho',
			'currency' => 'Loti',
			'currency_code' => 'LSL',
			'population' => '2177062',
			'title' => 'Lesotho',
			'comment' => '',
			'slug' => 'lesotho'
		),
		array(
			'id' => '134',
			'name' => 'Liberia',
			'fips104' => 'LI',
			'iso2' => 'LR',
			'iso3' => 'LBR',
			'ison' => '430',
			'internet' => 'LR',
			'capital' => 'Monrovia ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Liberian',
			'nationality_plural' => 'Liberians',
			'currency' => 'Liberian Dollar',
			'currency_code' => 'LRD',
			'population' => '3225837',
			'title' => 'Liberia',
			'comment' => '',
			'slug' => 'liberia'
		),
		array(
			'id' => '135',
			'name' => 'Libya (ليبيا)',
			'fips104' => 'LY',
			'iso2' => 'LY',
			'iso3' => 'LBY',
			'ison' => '434',
			'internet' => 'LY',
			'capital' => 'Tripoli ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Libyan',
			'nationality_plural' => 'Libyans',
			'currency' => 'Libyan Dinar',
			'currency_code' => 'LYD',
			'population' => '5240599',
			'title' => 'Libya',
			'comment' => '',
			'slug' => 'libya'
		),
		array(
			'id' => '136',
			'name' => 'Liechtenstein',
			'fips104' => 'LS',
			'iso2' => 'LI',
			'iso3' => 'LIE',
			'ison' => '438',
			'internet' => 'LI',
			'capital' => 'Vaduz ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Liechtenstein',
			'nationality_plural' => 'Liechtensteiners',
			'currency' => 'Swiss Franc',
			'currency_code' => 'CHF',
			'population' => '32528',
			'title' => 'Liechtenstein',
			'comment' => '',
			'slug' => 'liechtenstein'
		),
		array(
			'id' => '137',
			'name' => 'Lithuania (Lietuva)',
			'fips104' => 'LH',
			'iso2' => 'LT',
			'iso3' => 'LTU',
			'ison' => '440',
			'internet' => 'LT',
			'capital' => 'Vilnius ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Lithuanian',
			'nationality_plural' => 'Lithuanians',
			'currency' => 'Lithuanian Litas',
			'currency_code' => 'LTL',
			'population' => '3610535',
			'title' => 'Lithuania',
			'comment' => '',
			'slug' => 'lithuania-lietuva'
		),
		array(
			'id' => '138',
			'name' => 'Luxembourg (Lëtzebuerg)',
			'fips104' => 'LU',
			'iso2' => 'LU',
			'iso3' => 'LUX',
			'ison' => '442',
			'internet' => 'LU',
			'capital' => 'Luxembourg ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Luxembourg',
			'nationality_plural' => 'Luxembourgers',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '442972',
			'title' => 'Luxembourg',
			'comment' => '',
			'slug' => 'luxembourg-l-tzebuerg'
		),
		array(
			'id' => '139',
			'name' => 'Macao',
			'fips104' => 'MC',
			'iso2' => 'MO',
			'iso3' => 'MAC',
			'ison' => '446',
			'internet' => 'MO',
			'capital' => '',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Chinese',
			'nationality_plural' => 'Chinese',
			'currency' => 'Pataca',
			'currency_code' => 'MOP',
			'population' => '453733',
			'title' => 'Macao',
			'comment' => '',
			'slug' => 'macao'
		),
		array(
			'id' => '140',
			'name' => 'Macedonia (Македонија)',
			'fips104' => 'MK',
			'iso2' => 'MK',
			'iso3' => 'MKD',
			'ison' => '807',
			'internet' => 'MK',
			'capital' => 'Skopje ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Macedonian',
			'nationality_plural' => 'Macedonians',
			'currency' => 'Denar',
			'currency_code' => 'MKD',
			'population' => '2046209',
			'title' => 'Makedonija',
			'comment' => '',
			'slug' => 'macedonia'
		),
		array(
			'id' => '141',
			'name' => 'Madagascar (Madagasikara)',
			'fips104' => 'MA',
			'iso2' => 'MG',
			'iso3' => 'MDG',
			'ison' => '450',
			'internet' => 'MG',
			'capital' => 'Antananarivo ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Malagasy',
			'nationality_plural' => 'Malagasy',
			'currency' => 'Malagasy Franc',
			'currency_code' => 'MGF',
			'population' => '15982563',
			'title' => 'Madagascar',
			'comment' => '',
			'slug' => 'madagascar-madagasikara'
		),
		array(
			'id' => '142',
			'name' => 'Malawi',
			'fips104' => 'MI',
			'iso2' => 'MW',
			'iso3' => 'MWI',
			'ison' => '454',
			'internet' => 'MW',
			'capital' => 'Lilongwe ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Malawian',
			'nationality_plural' => 'Malawians',
			'currency' => 'Kwacha',
			'currency_code' => 'MWK',
			'population' => '10548250',
			'title' => 'Malawi',
			'comment' => '',
			'slug' => 'malawi'
		),
		array(
			'id' => '143',
			'name' => 'Malaysia',
			'fips104' => 'MY',
			'iso2' => 'MY',
			'iso3' => 'MYS',
			'ison' => '458',
			'internet' => 'MY',
			'capital' => 'Kuala Lumpur ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Malaysian',
			'nationality_plural' => 'Malaysians',
			'currency' => 'Malaysian Ringgit',
			'currency_code' => 'MYR',
			'population' => '22229040',
			'title' => 'Malaysia',
			'comment' => '',
			'slug' => 'malaysia'
		),
		array(
			'id' => '144',
			'name' => 'Maldives (ގުޖޭއްރާ ޔާއްރިހޫމްޖ)',
			'fips104' => 'MV',
			'iso2' => 'MV',
			'iso3' => 'MDV',
			'ison' => '462',
			'internet' => 'MV',
			'capital' => 'Male ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Maldivian',
			'nationality_plural' => 'Maldivians',
			'currency' => 'Rufiyaa',
			'currency_code' => 'MVR',
			'population' => '310764',
			'title' => 'Maldives',
			'comment' => '',
			'slug' => 'maldives'
		),
		array(
			'id' => '145',
			'name' => 'Mali',
			'fips104' => 'ML',
			'iso2' => 'ML',
			'iso3' => 'MLI',
			'ison' => '466',
			'internet' => 'ML',
			'capital' => 'Bamako ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Malian',
			'nationality_plural' => 'Malians',
			'currency' => 'CFA Franc BCEAO',
			'currency_code' => 'XOF',
			'population' => '11008518',
			'title' => 'Mali',
			'comment' => '',
			'slug' => 'mali'
		),
		array(
			'id' => '146',
			'name' => 'Malta',
			'fips104' => 'MT',
			'iso2' => 'MT',
			'iso3' => 'MLT',
			'ison' => '470',
			'internet' => 'MT',
			'capital' => 'Valletta ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Maltese',
			'nationality_plural' => 'Maltese',
			'currency' => 'Maltese Lira',
			'currency_code' => 'MTL',
			'population' => '394583',
			'title' => 'Malta',
			'comment' => '',
			'slug' => 'malta'
		),
		array(
			'id' => '147',
			'name' => 'Man, Isle of',
			'fips104' => 'IM',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => 'IM',
			'capital' => 'Douglas ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Manxman',
			'nationality_plural' => 'Manxmen',
			'currency' => 'Pound Sterling',
			'currency_code' => 'GBP',
			'population' => '73489',
			'title' => 'The Isle of Man',
			'comment' => 'ISO includes with the United Kingdom',
			'slug' => 'man-isle-of'
		),
		array(
			'id' => '148',
			'name' => 'Marshall Islands',
			'fips104' => 'RM',
			'iso2' => 'MH',
			'iso3' => 'MHL',
			'ison' => '584',
			'internet' => 'MH',
			'capital' => 'Majuro ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Marshallese',
			'nationality_plural' => 'Marshallese',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '70822',
			'title' => 'The Marshall Islands',
			'comment' => '',
			'slug' => 'marshall-islands'
		),
		array(
			'id' => '149',
			'name' => 'Martinique',
			'fips104' => 'MB',
			'iso2' => 'MQ',
			'iso3' => 'MTQ',
			'ison' => '474',
			'internet' => 'MQ',
			'capital' => 'Fort-de-France ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Martiniquais',
			'nationality_plural' => 'Martiniquais',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '418454',
			'title' => 'Martinique',
			'comment' => '',
			'slug' => 'martinique'
		),
		array(
			'id' => '150',
			'name' => 'Mauritania (موريتانيا)',
			'fips104' => 'MR',
			'iso2' => 'MR',
			'iso3' => 'MRT',
			'ison' => '478',
			'internet' => 'MR',
			'capital' => 'Nouakchott ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Mauritanian',
			'nationality_plural' => 'Mauritanians',
			'currency' => 'Ouguiya',
			'currency_code' => 'MRO',
			'population' => '2747312',
			'title' => 'Mauritania',
			'comment' => '',
			'slug' => 'mauritania'
		),
		array(
			'id' => '151',
			'name' => 'Mauritius',
			'fips104' => 'MP',
			'iso2' => 'MU',
			'iso3' => 'MUS',
			'ison' => '480',
			'internet' => 'MU',
			'capital' => 'Port Louis ',
			'map_reference' => 'World ',
			'nationality_singular' => 'Mauritian',
			'nationality_plural' => 'Mauritians',
			'currency' => 'Mauritius Rupee',
			'currency_code' => 'MUR',
			'population' => '1189825',
			'title' => 'Mauritius',
			'comment' => '',
			'slug' => 'mauritius'
		),
		array(
			'id' => '152',
			'name' => 'Mayotte',
			'fips104' => 'MF',
			'iso2' => 'YT',
			'iso3' => 'MYT',
			'ison' => '175',
			'internet' => 'YT',
			'capital' => 'Mamoutzou ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Mahorais',
			'nationality_plural' => 'Mahorais',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '163366',
			'title' => 'Mayotte',
			'comment' => '',
			'slug' => 'mayotte'
		),
		array(
			'id' => '153',
			'name' => 'Mexico (México)',
			'fips104' => 'MX',
			'iso2' => 'MX',
			'iso3' => 'MEX',
			'ison' => '484',
			'internet' => 'MX',
			'capital' => 'Mexico ',
			'map_reference' => 'North America ',
			'nationality_singular' => 'Mexican',
			'nationality_plural' => 'Mexicans',
			'currency' => 'Mexican Peso',
			'currency_code' => 'MXN',
			'population' => '101879171',
			'title' => 'Mexico',
			'comment' => '',
			'slug' => 'mexico-m-xico'
		),
		array(
			'id' => '154',
			'name' => 'Micronesia',
			'fips104' => 'FM',
			'iso2' => 'FM',
			'iso3' => 'FSM',
			'ison' => '583',
			'internet' => 'FM',
			'capital' => 'Palikir ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Micronesian',
			'nationality_plural' => 'Micronesians',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '134597',
			'title' => 'The Federated States of Micronesia',
			'comment' => '',
			'slug' => 'micronesia'
		),
		array(
			'id' => '155',
			'name' => 'Midway Islands',
			'fips104' => 'MQ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'United States Dollars',
			'currency_code' => 'USD',
			'population' => '0',
			'title' => 'The Midway Islands',
			'comment' => 'ISO includes with the US Minor Outlying Islands',
			'slug' => 'midway-islands'
		),
		array(
			'id' => '156',
			'name' => 'Miscellaneous (French)',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Miscellaneous (French)',
			'comment' => 'ISO includes Bassas da India, Europa Island, Glorioso Islands, Juan de Nova Island, Tromelin Island',
			'slug' => 'miscellaneous-french'
		),
		array(
			'id' => '157',
			'name' => 'Moldova',
			'fips104' => 'MD',
			'iso2' => 'MD',
			'iso3' => 'MDA',
			'ison' => '498',
			'internet' => 'MD',
			'capital' => 'Chisinau ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Moldovan',
			'nationality_plural' => 'Moldovans',
			'currency' => 'Moldovan Leu',
			'currency_code' => 'MDL',
			'population' => '4431570',
			'title' => 'Moldova',
			'comment' => '',
			'slug' => 'moldova'
		),
		array(
			'id' => '158',
			'name' => 'Monaco',
			'fips104' => 'MN',
			'iso2' => 'MC',
			'iso3' => 'MCO',
			'ison' => '492',
			'internet' => 'MC',
			'capital' => 'Monaco ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Monegasque',
			'nationality_plural' => 'Monegasques',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '31842',
			'title' => 'Monaco',
			'comment' => '',
			'slug' => 'monaco'
		),
		array(
			'id' => '159',
			'name' => 'Mongolia (Монгол Улс)',
			'fips104' => 'MG',
			'iso2' => 'MN',
			'iso3' => 'MNG',
			'ison' => '496',
			'internet' => 'MN',
			'capital' => 'Ulaanbaatar ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Mongolian',
			'nationality_plural' => 'Mongolians',
			'currency' => 'Tugrik',
			'currency_code' => 'MNT',
			'population' => '2654999',
			'title' => 'Mongolia',
			'comment' => '',
			'slug' => 'mongolia'
		),
		array(
			'id' => '160',
			'name' => 'Montenegro',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Montenegro',
			'comment' => 'now included as region within Yugoslavia',
			'slug' => 'montenegro'
		),
		array(
			'id' => '161',
			'name' => 'Montserrat',
			'fips104' => 'MH',
			'iso2' => 'MS',
			'iso3' => 'MSR',
			'ison' => '500',
			'internet' => 'MS',
			'capital' => 'Plymouth',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Montserratian',
			'nationality_plural' => 'Montserratians',
			'currency' => 'East Caribbean Dollar',
			'currency_code' => 'XCD',
			'population' => '7574',
			'title' => 'Montserrat',
			'comment' => '',
			'slug' => 'montserrat'
		),
		array(
			'id' => '162',
			'name' => 'Morocco (المغرب)',
			'fips104' => 'MO',
			'iso2' => 'MA',
			'iso3' => 'MAR',
			'ison' => '504',
			'internet' => 'MA',
			'capital' => 'Rabat ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Moroccan',
			'nationality_plural' => 'Moroccans',
			'currency' => 'Moroccan Dirham',
			'currency_code' => 'MAD',
			'population' => '30645305',
			'title' => 'Morocco',
			'comment' => '',
			'slug' => 'morocco'
		),
		array(
			'id' => '163',
			'name' => 'Mozambique (Moçambique)',
			'fips104' => 'MZ',
			'iso2' => 'MZ',
			'iso3' => 'MOZ',
			'ison' => '508',
			'internet' => 'MZ',
			'capital' => 'Maputo ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Mozambican',
			'nationality_plural' => 'Mozambicans',
			'currency' => 'Metical',
			'currency_code' => 'MZM',
			'population' => '19371057',
			'title' => 'Mozambique',
			'comment' => '',
			'slug' => 'mozambique-mo-ambique'
		),
		array(
			'id' => '164',
			'name' => 'Myanmar',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Kyat',
			'currency_code' => 'MMK',
			'population' => '0',
			'title' => 'Myanmar',
			'comment' => 'see Burma',
			'slug' => 'myanmar-1'
		),
		array(
			'id' => '165',
			'name' => 'Myanmar (Burma)',
			'fips104' => 'BM',
			'iso2' => 'MM',
			'iso3' => 'MMR',
			'ison' => '104',
			'internet' => 'MM',
			'capital' => 'Rangoon ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Burmese',
			'nationality_plural' => 'Burmese',
			'currency' => 'kyat ',
			'currency_code' => 'MMK',
			'population' => '41994678',
			'title' => 'Burma',
			'comment' => 'ISO uses the name Myanmar',
			'slug' => 'myanmar-burma'
		),
		array(
			'id' => '166',
			'name' => 'Namibia',
			'fips104' => 'WA',
			'iso2' => 'NA',
			'iso3' => 'NAM',
			'ison' => '516',
			'internet' => 'NA',
			'capital' => 'Windhoek ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Namibian',
			'nationality_plural' => 'Namibians',
			'currency' => 'Namibian Dollar ',
			'currency_code' => 'NAD',
			'population' => '1797677',
			'title' => 'Namibia',
			'comment' => '',
			'slug' => 'namibia'
		),
		array(
			'id' => '167',
			'name' => 'Nauru (Naoero)',
			'fips104' => 'NR',
			'iso2' => 'NR',
			'iso3' => 'NRU',
			'ison' => '520',
			'internet' => 'NR',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Nauruan',
			'nationality_plural' => 'Nauruans',
			'currency' => 'Australian Dollar',
			'currency_code' => 'AUD',
			'population' => '12088',
			'title' => 'Nauru',
			'comment' => '',
			'slug' => 'nauru-naoero'
		),
		array(
			'id' => '168',
			'name' => 'Navassa Island',
			'fips104' => 'BQ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Navassa Island',
			'comment' => '',
			'slug' => 'navassa-island'
		),
		array(
			'id' => '169',
			'name' => 'Nepal (नेपाल)',
			'fips104' => 'NP',
			'iso2' => 'NP',
			'iso3' => 'NPL',
			'ison' => '524',
			'internet' => 'NP',
			'capital' => 'Kathmandu ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Nepalese',
			'nationality_plural' => 'Nepalese',
			'currency' => 'Nepalese Rupee',
			'currency_code' => 'NPR',
			'population' => '25284463',
			'title' => 'Nepal',
			'comment' => '',
			'slug' => 'nepal'
		),
		array(
			'id' => '170',
			'name' => 'Netherlands (Nederland)',
			'fips104' => 'NL',
			'iso2' => 'NL',
			'iso3' => 'NLD',
			'ison' => '528',
			'internet' => 'NL',
			'capital' => 'Amsterdam ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Dutchman',
			'nationality_plural' => 'Dutchmen',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '15981472',
			'title' => 'The Netherlands',
			'comment' => '',
			'slug' => 'netherlands-nederland'
		),
		array(
			'id' => '171',
			'name' => 'Netherlands Antilles',
			'fips104' => 'NT',
			'iso2' => 'AN',
			'iso3' => 'ANT',
			'ison' => '530',
			'internet' => 'AN',
			'capital' => 'Willemstad ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Dutch Antillean',
			'nationality_plural' => 'Dutch Antilleans',
			'currency' => 'Netherlands Antillean guilder ',
			'currency_code' => 'ANG',
			'population' => '212226',
			'title' => 'The Netherlands Antilles',
			'comment' => '',
			'slug' => 'netherlands-antilles'
		),
		array(
			'id' => '172',
			'name' => 'New Caledonia',
			'fips104' => 'NC',
			'iso2' => 'NC',
			'iso3' => 'NCL',
			'ison' => '540',
			'internet' => 'NC',
			'capital' => 'Noumea ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'New Caledonian',
			'nationality_plural' => 'New Caledonians',
			'currency' => 'CFP Franc',
			'currency_code' => 'XPF',
			'population' => '204863',
			'title' => 'New Caledonia',
			'comment' => '',
			'slug' => 'new-caledonia'
		),
		array(
			'id' => '173',
			'name' => 'New Zealand',
			'fips104' => 'NZ',
			'iso2' => 'NZ',
			'iso3' => 'NZL',
			'ison' => '554',
			'internet' => 'NZ',
			'capital' => 'Wellington ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'New Zealand',
			'nationality_plural' => 'New Zealanders',
			'currency' => 'New Zealand Dollar',
			'currency_code' => 'NZD',
			'population' => '3864129',
			'title' => 'New Zealand',
			'comment' => '',
			'slug' => 'new-zealand'
		),
		array(
			'id' => '174',
			'name' => 'Nicaragua',
			'fips104' => 'NU',
			'iso2' => 'NI',
			'iso3' => 'NIC',
			'ison' => '558',
			'internet' => 'NI',
			'capital' => 'Managua ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Nicaraguan',
			'nationality_plural' => 'Nicaraguans',
			'currency' => 'Cordoba Oro',
			'currency_code' => 'NIO',
			'population' => '4918393',
			'title' => 'Nicaragua',
			'comment' => '',
			'slug' => 'nicaragua'
		),
		array(
			'id' => '175',
			'name' => 'Niger',
			'fips104' => 'NG',
			'iso2' => 'NE',
			'iso3' => 'NER',
			'ison' => '562',
			'internet' => 'NE',
			'capital' => 'Niamey ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Nigerien',
			'nationality_plural' => 'Nigeriens',
			'currency' => 'CFA Franc BCEAO',
			'currency_code' => 'XOF',
			'population' => '10355156',
			'title' => 'Niger',
			'comment' => '',
			'slug' => 'niger'
		),
		array(
			'id' => '176',
			'name' => 'Nigeria',
			'fips104' => 'NI',
			'iso2' => 'NG',
			'iso3' => 'NGA',
			'ison' => '566',
			'internet' => 'NG',
			'capital' => 'Abuja',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Nigerian',
			'nationality_plural' => 'Nigerians',
			'currency' => 'Naira',
			'currency_code' => 'NGN',
			'population' => '126635626',
			'title' => 'Nigeria',
			'comment' => '',
			'slug' => 'nigeria'
		),
		array(
			'id' => '177',
			'name' => 'Niue',
			'fips104' => 'NE',
			'iso2' => 'NU',
			'iso3' => 'NIU',
			'ison' => '570',
			'internet' => 'NU',
			'capital' => 'Alofi ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Niuean',
			'nationality_plural' => 'Niueans',
			'currency' => 'New Zealand Dollar',
			'currency_code' => 'NZD',
			'population' => '2124',
			'title' => 'Niue',
			'comment' => '',
			'slug' => 'niue'
		),
		array(
			'id' => '178',
			'name' => 'Norfolk Island',
			'fips104' => 'NF',
			'iso2' => 'NF',
			'iso3' => 'NFK',
			'ison' => '574',
			'internet' => 'NF',
			'capital' => 'Kingston ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Norfolk Islander',
			'nationality_plural' => 'Norfolk Islanders',
			'currency' => 'Australian Dollar',
			'currency_code' => 'AUD',
			'population' => '1879',
			'title' => 'Norfolk Island',
			'comment' => '',
			'slug' => 'norfolk-island'
		),
		array(
			'id' => '179',
			'name' => 'North Korea (조선)',
			'fips104' => 'KN',
			'iso2' => 'KP',
			'iso3' => 'PRK',
			'ison' => '408',
			'internet' => 'KP',
			'capital' => 'P\'yongyang ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Korean',
			'nationality_plural' => 'Koreans',
			'currency' => 'North Korean Won',
			'currency_code' => 'KPW',
			'population' => '21968228',
			'title' => 'North Korea',
			'comment' => '',
			'slug' => 'north-korea'
		),
		array(
			'id' => '180',
			'name' => 'Northern Mariana Islands',
			'fips104' => 'CQ',
			'iso2' => 'MP',
			'iso3' => 'MNP',
			'ison' => '580',
			'internet' => 'MP',
			'capital' => 'Saipan ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '74612',
			'title' => 'The Northern Mariana Islands',
			'comment' => '',
			'slug' => 'northern-mariana-islands'
		),
		array(
			'id' => '181',
			'name' => 'Norway (Norge)',
			'fips104' => 'NO',
			'iso2' => 'NO',
			'iso3' => 'NOR',
			'ison' => '578',
			'internet' => 'NO',
			'capital' => 'Oslo ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Norwegian',
			'nationality_plural' => 'Norwegians',
			'currency' => 'Norwegian Krone',
			'currency_code' => 'NOK',
			'population' => '4503440',
			'title' => 'Norway',
			'comment' => '',
			'slug' => 'norway-norge'
		),
		array(
			'id' => '182',
			'name' => 'Oman (عمان)',
			'fips104' => 'MU',
			'iso2' => 'OM',
			'iso3' => 'OMN',
			'ison' => '512',
			'internet' => 'OM',
			'capital' => 'Muscat ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Omani',
			'nationality_plural' => 'Omanis',
			'currency' => 'Rial Omani',
			'currency_code' => 'OMR',
			'population' => '2622198',
			'title' => 'Oman',
			'comment' => '',
			'slug' => 'oman'
		),
		array(
			'id' => '183',
			'name' => 'Pakistan (پاکستان)',
			'fips104' => 'PK',
			'iso2' => 'PK',
			'iso3' => 'PAK',
			'ison' => '586',
			'internet' => 'PK',
			'capital' => 'Islamabad ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Pakistani',
			'nationality_plural' => 'Pakistanis',
			'currency' => 'Pakistan Rupee',
			'currency_code' => 'PKR',
			'population' => '144616639',
			'title' => 'Pakistan',
			'comment' => '',
			'slug' => 'pakistan'
		),
		array(
			'id' => '184',
			'name' => 'Palau (Belau)',
			'fips104' => 'PS',
			'iso2' => 'PW',
			'iso3' => 'PLW',
			'ison' => '585',
			'internet' => 'PW',
			'capital' => 'Koror ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Palauan',
			'nationality_plural' => 'Palauans',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '19092',
			'title' => 'Palau',
			'comment' => '',
			'slug' => 'palau-belau'
		),
		array(
			'id' => '185',
			'name' => 'Palestinian Territories',
			'fips104' => '--',
			'iso2' => 'PS',
			'iso3' => 'PSE',
			'ison' => '275',
			'internet' => 'PS',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Palestine',
			'comment' => 'NULL',
			'slug' => 'palestinian-territories'
		),
		array(
			'id' => '186',
			'name' => 'Palmyra Atoll',
			'fips104' => 'LQ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Palmyra Atoll',
			'comment' => 'ISO includes with the US Minor Outlying Islands',
			'slug' => 'palmyra-atoll'
		),
		array(
			'id' => '187',
			'name' => 'Panama (Panamá)',
			'fips104' => 'PM',
			'iso2' => 'PA',
			'iso3' => 'PAN',
			'ison' => '591',
			'internet' => 'PA',
			'capital' => 'Panama ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Panamanian',
			'nationality_plural' => 'Panamanians',
			'currency' => 'balboa ',
			'currency_code' => 'PAB',
			'population' => '2845647',
			'title' => 'Panama',
			'comment' => '',
			'slug' => 'panama-panam'
		),
		array(
			'id' => '188',
			'name' => 'Papua New Guinea',
			'fips104' => 'PP',
			'iso2' => 'PG',
			'iso3' => 'PNG',
			'ison' => '598',
			'internet' => 'PG',
			'capital' => 'Port Moresby ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Papua New Guinean',
			'nationality_plural' => 'Papua New Guineans',
			'currency' => 'Kina',
			'currency_code' => 'PGK',
			'population' => '5049055',
			'title' => 'Papua New Guinea',
			'comment' => '',
			'slug' => 'papua-new-guinea'
		),
		array(
			'id' => '189',
			'name' => 'Paracel Islands',
			'fips104' => 'PF',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'The Paracel Islands',
			'comment' => '',
			'slug' => 'paracel-islands'
		),
		array(
			'id' => '190',
			'name' => 'Paraguay',
			'fips104' => 'PA',
			'iso2' => 'PY',
			'iso3' => 'PRY',
			'ison' => '600',
			'internet' => 'PY',
			'capital' => 'Asuncion ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Paraguayan',
			'nationality_plural' => 'Paraguayans',
			'currency' => 'Guarani',
			'currency_code' => 'PYG',
			'population' => '5734139',
			'title' => 'Paraguay',
			'comment' => '',
			'slug' => 'paraguay'
		),
		array(
			'id' => '191',
			'name' => 'Peru (Perú)',
			'fips104' => 'PE',
			'iso2' => 'PE',
			'iso3' => 'PER',
			'ison' => '604',
			'internet' => 'PE',
			'capital' => 'Lima ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Peruvian',
			'nationality_plural' => 'Peruvians',
			'currency' => 'Nuevo Sol',
			'currency_code' => 'PEN',
			'population' => '27483864',
			'title' => 'Peru',
			'comment' => '',
			'slug' => 'peru-per'
		),
		array(
			'id' => '192',
			'name' => 'Philippines (Pilipinas)',
			'fips104' => 'RP',
			'iso2' => 'PH',
			'iso3' => 'PHL',
			'ison' => '608',
			'internet' => 'PH',
			'capital' => 'Manila ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Philippine',
			'nationality_plural' => 'Filipinos',
			'currency' => 'Philippine Peso',
			'currency_code' => 'PHP',
			'population' => '82841518',
			'title' => 'The Philippines',
			'comment' => '',
			'slug' => 'philippines-pilipinas'
		),
		array(
			'id' => '193',
			'name' => 'Pitcairn',
			'fips104' => 'PC',
			'iso2' => 'PN',
			'iso3' => 'PCN',
			'ison' => '612',
			'internet' => 'PN',
			'capital' => 'Adamstown ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Pitcairn Islander',
			'nationality_plural' => 'Pitcairn Islanders',
			'currency' => 'New Zealand Dollar',
			'currency_code' => 'NZD',
			'population' => '47',
			'title' => 'The Pitcairn Islands',
			'comment' => '',
			'slug' => 'pitcairn'
		),
		array(
			'id' => '194',
			'name' => 'Poland (Polska)',
			'fips104' => 'PL',
			'iso2' => 'PL',
			'iso3' => 'POL',
			'ison' => '616',
			'internet' => 'PL',
			'capital' => 'Warsaw ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Polish',
			'nationality_plural' => 'Poles',
			'currency' => 'Zloty',
			'currency_code' => 'PLN',
			'population' => '38633912',
			'title' => 'Poland',
			'comment' => '',
			'slug' => 'poland-polska'
		),
		array(
			'id' => '195',
			'name' => 'Portugal',
			'fips104' => 'PO',
			'iso2' => 'PT',
			'iso3' => 'PRT',
			'ison' => '620',
			'internet' => 'PT',
			'capital' => 'Lisbon ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Portuguese',
			'nationality_plural' => 'Portuguese',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '10066253',
			'title' => 'Portugal',
			'comment' => '',
			'slug' => 'portugal'
		),
		array(
			'id' => '196',
			'name' => 'Puerto Rico',
			'fips104' => 'RQ',
			'iso2' => 'PR',
			'iso3' => 'PRI',
			'ison' => '630',
			'internet' => 'PR',
			'capital' => 'San Juan ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Puerto Rican',
			'nationality_plural' => 'Puerto Ricans',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '3937316',
			'title' => 'Puerto Rico',
			'comment' => '',
			'slug' => 'puerto-rico'
		),
		array(
			'id' => '197',
			'name' => 'Qatar (قطر)',
			'fips104' => 'QA',
			'iso2' => 'QA',
			'iso3' => 'QAT',
			'ison' => '634',
			'internet' => 'QA',
			'capital' => 'Doha ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Qatari',
			'nationality_plural' => 'Qataris',
			'currency' => 'Qatari Rial',
			'currency_code' => 'QAR',
			'population' => '769152',
			'title' => 'Qatar',
			'comment' => '',
			'slug' => 'qatar'
		),
		array(
			'id' => '198',
			'name' => 'Reunion',
			'fips104' => 'RE',
			'iso2' => 'RE',
			'iso3' => 'REU',
			'ison' => '638',
			'internet' => 'RE',
			'capital' => 'Saint-Denis',
			'map_reference' => 'World',
			'nationality_singular' => 'Reunionese',
			'nationality_plural' => 'Reunionese',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '732570',
			'title' => 'Réunion',
			'comment' => '',
			'slug' => 'reunion'
		),
		array(
			'id' => '199',
			'name' => 'Romania (România)',
			'fips104' => 'RO',
			'iso2' => 'RO',
			'iso3' => 'ROU',
			'ison' => '642',
			'internet' => 'RO',
			'capital' => 'Bucharest ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Romanian',
			'nationality_plural' => 'Romanians',
			'currency' => 'Leu',
			'currency_code' => 'ROL',
			'population' => '22364022',
			'title' => 'Romania',
			'comment' => '',
			'slug' => 'romania-rom-nia'
		),
		array(
			'id' => '200',
			'name' => 'Russia (Россия)',
			'fips104' => 'RS',
			'iso2' => 'RU',
			'iso3' => 'RUS',
			'ison' => '643',
			'internet' => 'RU',
			'capital' => 'Moscow ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Russian',
			'nationality_plural' => 'Russians',
			'currency' => 'Russian Ruble',
			'currency_code' => 'RUB',
			'population' => '145470197',
			'title' => 'Russia',
			'comment' => '',
			'slug' => 'russia'
		),
		array(
			'id' => '201',
			'name' => 'Rwanda',
			'fips104' => 'RW',
			'iso2' => 'RW',
			'iso3' => 'RWA',
			'ison' => '646',
			'internet' => 'RW',
			'capital' => 'Kigali ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Rwandan',
			'nationality_plural' => 'Rwandans',
			'currency' => 'Rwanda Franc',
			'currency_code' => 'RWF',
			'population' => '7312756',
			'title' => 'Rwanda',
			'comment' => '',
			'slug' => 'rwanda'
		),
		array(
			'id' => '202',
			'name' => 'Saint Helena',
			'fips104' => 'SH',
			'iso2' => 'SH',
			'iso3' => 'SHN',
			'ison' => '654',
			'internet' => 'SH',
			'capital' => 'Jamestown ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Saint Helenian',
			'nationality_plural' => 'Saint Helenians',
			'currency' => 'Saint Helenian Pound ',
			'currency_code' => 'SHP',
			'population' => '7266',
			'title' => 'Saint Helena',
			'comment' => '',
			'slug' => 'saint-helena'
		),
		array(
			'id' => '203',
			'name' => 'Saint Kitts and Nevis',
			'fips104' => 'SC',
			'iso2' => 'KN',
			'iso3' => 'KNA',
			'ison' => '659',
			'internet' => 'KN',
			'capital' => 'Basseterre ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Kittitian and Nevisian',
			'nationality_plural' => 'Kittitians and Nevisians',
			'currency' => 'East Caribbean Dollar ',
			'currency_code' => 'XCD',
			'population' => '38756',
			'title' => 'Saint Kitts and Nevis',
			'comment' => '',
			'slug' => 'saint-kitts-and-nevis'
		),
		array(
			'id' => '204',
			'name' => 'Saint Lucia',
			'fips104' => 'ST',
			'iso2' => 'LC',
			'iso3' => 'LCA',
			'ison' => '662',
			'internet' => 'LC',
			'capital' => 'Castries ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Saint Lucian',
			'nationality_plural' => 'Saint Lucians',
			'currency' => 'East Caribbean Dollar ',
			'currency_code' => 'XCD',
			'population' => '158178',
			'title' => 'Saint Lucia',
			'comment' => '',
			'slug' => 'saint-lucia'
		),
		array(
			'id' => '205',
			'name' => 'Saint Pierre and Miquelon',
			'fips104' => 'SB',
			'iso2' => 'PM',
			'iso3' => 'SPM',
			'ison' => '666',
			'internet' => 'PM',
			'capital' => 'Saint-Pierre ',
			'map_reference' => 'North America ',
			'nationality_singular' => 'Frenchman',
			'nationality_plural' => 'Frenchmen',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '6928',
			'title' => 'Saint Pierre and Miquelon',
			'comment' => '',
			'slug' => 'saint-pierre-and-miquelon'
		),
		array(
			'id' => '206',
			'name' => 'Saint Vincent and the Grenadines',
			'fips104' => 'VC',
			'iso2' => 'VC',
			'iso3' => 'VCT',
			'ison' => '670',
			'internet' => 'VC',
			'capital' => 'Kingstown ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Saint Vincentian',
			'nationality_plural' => 'Saint Vincentians',
			'currency' => 'East Caribbean Dollar ',
			'currency_code' => 'XCD',
			'population' => '115942',
			'title' => 'Saint Vincent and the Grenadines',
			'comment' => '',
			'slug' => 'saint-vincent-and-the-grenadines'
		),
		array(
			'id' => '207',
			'name' => 'Samoa',
			'fips104' => 'WS',
			'iso2' => 'WS',
			'iso3' => 'WSM',
			'ison' => '882',
			'internet' => 'WS',
			'capital' => 'Apia ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Samoan',
			'nationality_plural' => 'Samoans',
			'currency' => 'Tala',
			'currency_code' => 'WST',
			'population' => '179058',
			'title' => 'Samoa',
			'comment' => 'NULL',
			'slug' => 'samoa'
		),
		array(
			'id' => '208',
			'name' => 'San Marino',
			'fips104' => 'SM',
			'iso2' => 'SM',
			'iso3' => 'SMR',
			'ison' => '674',
			'internet' => 'SM',
			'capital' => 'San Marino ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Sammarinese',
			'nationality_plural' => 'Sammarinese',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '27336',
			'title' => 'San Marino',
			'comment' => '',
			'slug' => 'san-marino'
		),
		array(
			'id' => '209',
			'name' => 'São Tomé and Príncipe',
			'fips104' => 'TP',
			'iso2' => 'ST',
			'iso3' => 'STP',
			'ison' => '678',
			'internet' => 'ST',
			'capital' => 'Sao Tome',
			'map_reference' => 'Africa',
			'nationality_singular' => 'Sao Tomean',
			'nationality_plural' => 'Sao Tomeans',
			'currency' => 'Dobra',
			'currency_code' => 'STD',
			'population' => '165034',
			'title' => 'São Tomé and Príncipe',
			'comment' => '',
			'slug' => 's-o-tom-and-pr-ncipe'
		),
		array(
			'id' => '210',
			'name' => 'Saudi Arabia (المملكة العربية السعودية)',
			'fips104' => 'SA',
			'iso2' => 'SA',
			'iso3' => 'SAU',
			'ison' => '682',
			'internet' => 'SA',
			'capital' => 'Riyadh ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Saudi Arabian ',
			'nationality_plural' => 'Saudis',
			'currency' => 'Saudi Riyal',
			'currency_code' => 'SAR',
			'population' => '22757092',
			'title' => 'Saudi Arabia',
			'comment' => '',
			'slug' => 'saudi-arabia'
		),
		array(
			'id' => '211',
			'name' => 'Senegal (Sénégal)',
			'fips104' => 'SG',
			'iso2' => 'SN',
			'iso3' => 'SEN',
			'ison' => '686',
			'internet' => 'SN',
			'capital' => 'Dakar ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Senegalese',
			'nationality_plural' => 'Senegalese',
			'currency' => 'CFA Franc BCEAO',
			'currency_code' => 'XOF',
			'population' => '10284929',
			'title' => 'Senegal',
			'comment' => '',
			'slug' => 'senegal-s-n-gal'
		),
		array(
			'id' => '212',
			'name' => 'Serbia',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Serbia',
			'comment' => 'now included as region within Yugoslavia',
			'slug' => 'serbia'
		),
		array(
			'id' => '213',
			'name' => 'Serbia and Montenegro',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Serbia and Montenegro',
			'comment' => 'See Yugoslavia',
			'slug' => 'serbia-and-montenegro'
		),
		array(
			'id' => '214',
			'name' => 'Seychelles',
			'fips104' => 'SE',
			'iso2' => 'SC',
			'iso3' => 'SYC',
			'ison' => '690',
			'internet' => 'SC',
			'capital' => 'Victoria ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Seychellois',
			'nationality_plural' => 'Seychellois',
			'currency' => 'Seychelles Rupee',
			'currency_code' => 'SCR',
			'population' => '79715',
			'title' => 'Seychelles',
			'comment' => '',
			'slug' => 'seychelles'
		),
		array(
			'id' => '215',
			'name' => 'Sierra Leone',
			'fips104' => 'SL',
			'iso2' => 'SL',
			'iso3' => 'SLE',
			'ison' => '694',
			'internet' => 'SL',
			'capital' => 'Freetown ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Sierra Leonean',
			'nationality_plural' => 'Sierra Leoneans',
			'currency' => 'Leone',
			'currency_code' => 'SLL',
			'population' => '5426618',
			'title' => 'Sierra Leone',
			'comment' => '',
			'slug' => 'sierra-leone'
		),
		array(
			'id' => '216',
			'name' => 'Singapore (Singapura)',
			'fips104' => 'SN',
			'iso2' => 'SG',
			'iso3' => 'SGP',
			'ison' => '702',
			'internet' => 'SG',
			'capital' => 'Singapore ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Singaporeian',
			'nationality_plural' => 'Singaporeans',
			'currency' => 'Singapore Dollar',
			'currency_code' => 'SGD',
			'population' => '4300419',
			'title' => 'Singapore',
			'comment' => '',
			'slug' => 'singapore-singapura'
		),
		array(
			'id' => '217',
			'name' => 'Slovakia (Slovensko)',
			'fips104' => 'LO',
			'iso2' => 'SK',
			'iso3' => 'SVK',
			'ison' => '703',
			'internet' => 'SK',
			'capital' => 'Bratislava ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Slovakian',
			'nationality_plural' => 'Slovaks',
			'currency' => 'Slovak Koruna',
			'currency_code' => 'SKK',
			'population' => '5414937',
			'title' => 'Slovakia',
			'comment' => '',
			'slug' => 'slovakia-slovensko'
		),
		array(
			'id' => '218',
			'name' => 'Slovenia (Slovenija)',
			'fips104' => 'SI',
			'iso2' => 'SI',
			'iso3' => 'SVN',
			'ison' => '705',
			'internet' => 'SI',
			'capital' => 'Ljubljana ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Slovenian',
			'nationality_plural' => 'Slovenes',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '1930132',
			'title' => 'Slovenia',
			'comment' => '',
			'slug' => 'slovenia-slovenija'
		),
		array(
			'id' => '219',
			'name' => 'Solomon Islands',
			'fips104' => 'BP',
			'iso2' => 'SB',
			'iso3' => 'SLB',
			'ison' => '90',
			'internet' => 'SB',
			'capital' => 'Honiara ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Solomon Islander',
			'nationality_plural' => 'Solomon Islanders',
			'currency' => 'Solomon Islands Dollar',
			'currency_code' => 'SBD',
			'population' => '480442',
			'title' => 'The Solomon Islands',
			'comment' => '',
			'slug' => 'solomon-islands'
		),
		array(
			'id' => '220',
			'name' => 'Somalia (Soomaaliya)',
			'fips104' => 'SO',
			'iso2' => 'SO',
			'iso3' => 'SOM',
			'ison' => '706',
			'internet' => 'SO',
			'capital' => 'Mogadishu ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Somali',
			'nationality_plural' => 'Somalis',
			'currency' => 'Somali Shilling',
			'currency_code' => 'SOS',
			'population' => '7488773',
			'title' => 'Somalia',
			'comment' => '',
			'slug' => 'somalia-soomaaliya'
		),
		array(
			'id' => '221',
			'name' => 'South Africa',
			'fips104' => 'SF',
			'iso2' => 'ZA',
			'iso3' => 'ZAF',
			'ison' => '710',
			'internet' => 'ZA',
			'capital' => 'Pretoria',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'South African',
			'nationality_plural' => 'South Africans',
			'currency' => 'Rand',
			'currency_code' => 'ZAR',
			'population' => '43586097',
			'title' => 'South Africa',
			'comment' => '',
			'slug' => 'south-africa'
		),
		array(
			'id' => '222',
			'name' => 'South Georgia and the South Sandwich Islands',
			'fips104' => 'SX',
			'iso2' => 'GS',
			'iso3' => 'SGS',
			'ison' => '239',
			'internet' => 'GS',
			'capital' => '',
			'map_reference' => 'Antarctic Region ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Pound Sterling',
			'currency_code' => 'GBP',
			'population' => '0',
			'title' => 'The South Georgia and the South Sandwich Islands',
			'comment' => '',
			'slug' => 'south-georgia-and-the-south-sandwich-islands'
		),
		array(
			'id' => '223',
			'name' => 'South Korea (한국)',
			'fips104' => 'KS',
			'iso2' => 'KR',
			'iso3' => 'KOR',
			'ison' => '410',
			'internet' => 'KR',
			'capital' => 'Seoul ',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Korean',
			'nationality_plural' => 'Koreans',
			'currency' => 'Won',
			'currency_code' => 'KRW',
			'population' => '47904370',
			'title' => 'South Korea',
			'comment' => '',
			'slug' => 'south-korea'
		),
		array(
			'id' => '224',
			'name' => 'Spain (España)',
			'fips104' => 'SP',
			'iso2' => 'ES',
			'iso3' => 'ESP',
			'ison' => '724',
			'internet' => 'ES',
			'capital' => 'Madrid ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Spanish',
			'nationality_plural' => 'Spaniards',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '40037995',
			'title' => 'Spain',
			'comment' => '',
			'slug' => 'spain-espa-a'
		),
		array(
			'id' => '225',
			'name' => 'Spratly Islands',
			'fips104' => 'PG',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'The Spratly Islands',
			'comment' => '',
			'slug' => 'spratly-islands'
		),
		array(
			'id' => '226',
			'name' => 'Sri Lanka',
			'fips104' => 'CE',
			'iso2' => 'LK',
			'iso3' => 'LKA',
			'ison' => '144',
			'internet' => 'LK',
			'capital' => 'Colombo',
			'map_reference' => 'Asia ',
			'nationality_singular' => 'Sri Lankan',
			'nationality_plural' => 'Sri Lankans',
			'currency' => 'Sri Lanka Rupee',
			'currency_code' => 'LKR',
			'population' => '19408635',
			'title' => 'Sri Lanka',
			'comment' => '',
			'slug' => 'sri-lanka'
		),
		array(
			'id' => '227',
			'name' => 'Sudan (السودان)',
			'fips104' => 'SU',
			'iso2' => 'SD',
			'iso3' => 'SDN',
			'ison' => '736',
			'internet' => 'SD',
			'capital' => 'Khartoum ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Sudanese',
			'nationality_plural' => 'Sudanese',
			'currency' => 'Sudanese Dinar',
			'currency_code' => 'SDD',
			'population' => '36080373',
			'title' => 'Sudan',
			'comment' => '',
			'slug' => 'sudan'
		),
		array(
			'id' => '228',
			'name' => 'Suriname',
			'fips104' => 'NS',
			'iso2' => 'SR',
			'iso3' => 'SUR',
			'ison' => '740',
			'internet' => 'SR',
			'capital' => 'Paramaribo ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Surinamese',
			'nationality_plural' => 'Surinamers',
			'currency' => 'Suriname Guilder',
			'currency_code' => 'SRG',
			'population' => '433998',
			'title' => 'Suriname',
			'comment' => '',
			'slug' => 'suriname'
		),
		array(
			'id' => '229',
			'name' => 'Svalbard and Jan Mayen',
			'fips104' => 'SV',
			'iso2' => 'SJ',
			'iso3' => 'SJM',
			'ison' => '744',
			'internet' => 'SJ',
			'capital' => 'Longyearbyen ',
			'map_reference' => 'Arctic Region ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Norwegian Krone',
			'currency_code' => 'NOK',
			'population' => '2332',
			'title' => 'Svalbard',
			'comment' => 'ISO includes Jan Mayen',
			'slug' => 'svalbard-and-jan-mayen'
		),
		array(
			'id' => '230',
			'name' => 'Swaziland',
			'fips104' => 'WZ',
			'iso2' => 'SZ',
			'iso3' => 'SWZ',
			'ison' => '748',
			'internet' => 'SZ',
			'capital' => 'Mbabane ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Swazi',
			'nationality_plural' => 'Swazis',
			'currency' => 'Lilangeni',
			'currency_code' => 'SZL',
			'population' => '1104343',
			'title' => 'Swaziland',
			'comment' => '',
			'slug' => 'swaziland'
		),
		array(
			'id' => '231',
			'name' => 'Sweden (Sverige)',
			'fips104' => 'SW',
			'iso2' => 'SE',
			'iso3' => 'SWE',
			'ison' => '752',
			'internet' => 'SE',
			'capital' => 'Stockholm ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Swedish',
			'nationality_plural' => 'Swedes',
			'currency' => 'Swedish Krona',
			'currency_code' => 'SEK',
			'population' => '8875053',
			'title' => 'Sweden',
			'comment' => '',
			'slug' => 'sweden-sverige'
		),
		array(
			'id' => '232',
			'name' => 'Switzerland (Schweiz)',
			'fips104' => 'SZ',
			'iso2' => 'CH',
			'iso3' => 'CHE',
			'ison' => '756',
			'internet' => 'CH',
			'capital' => 'Bern ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Swiss',
			'nationality_plural' => 'Swiss',
			'currency' => 'Swiss Franc',
			'currency_code' => 'CHF',
			'population' => '7283274',
			'title' => 'Switzerland',
			'comment' => '',
			'slug' => 'switzerland-schweiz'
		),
		array(
			'id' => '233',
			'name' => 'Syria (سوريا)',
			'fips104' => 'SY',
			'iso2' => 'SY',
			'iso3' => 'SYR',
			'ison' => '760',
			'internet' => 'SY',
			'capital' => 'Damascus ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Syrian',
			'nationality_plural' => 'Syrians',
			'currency' => 'Syrian Pound',
			'currency_code' => 'SYP',
			'population' => '16728808',
			'title' => 'Syria',
			'comment' => '',
			'slug' => 'syria'
		),
		array(
			'id' => '234',
			'name' => 'Taiwan (台灣)',
			'fips104' => 'TW',
			'iso2' => 'TW',
			'iso3' => 'TWN',
			'ison' => '158',
			'internet' => 'TW',
			'capital' => 'Taipei ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Taiwanese',
			'nationality_plural' => 'Taiwanese',
			'currency' => 'New Taiwan Dollar',
			'currency_code' => 'TWD',
			'population' => '22370461',
			'title' => 'Taiwan',
			'comment' => '',
			'slug' => 'taiwan'
		),
		array(
			'id' => '235',
			'name' => 'Tajikistan (Тоҷикистон)',
			'fips104' => 'TI',
			'iso2' => 'TJ',
			'iso3' => 'TJK',
			'ison' => '762',
			'internet' => 'TJ',
			'capital' => 'Dushanbe ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Tajikistani',
			'nationality_plural' => 'Tajikistanis',
			'currency' => 'Somoni',
			'currency_code' => 'TJS',
			'population' => '6578681',
			'title' => 'Tajikistan',
			'comment' => '',
			'slug' => 'tajikistan'
		),
		array(
			'id' => '236',
			'name' => 'Tanzania',
			'fips104' => 'TZ',
			'iso2' => 'TZ',
			'iso3' => 'TZA',
			'ison' => '834',
			'internet' => 'TZ',
			'capital' => 'Dar es Salaam',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Tanzanian',
			'nationality_plural' => 'Tanzanians',
			'currency' => 'Tanzanian Shilling',
			'currency_code' => 'TZS',
			'population' => '36232074',
			'title' => 'Tanzania',
			'comment' => '',
			'slug' => 'tanzania'
		),
		array(
			'id' => '237',
			'name' => 'Thailand (ราชอาณาจักรไทย)',
			'fips104' => 'TH',
			'iso2' => 'TH',
			'iso3' => 'THA',
			'ison' => '764',
			'internet' => 'TH',
			'capital' => 'Bangkok ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Thai',
			'nationality_plural' => 'Thai',
			'currency' => 'Baht',
			'currency_code' => 'THB',
			'population' => '61797751',
			'title' => 'Thailand',
			'comment' => '',
			'slug' => 'thailand'
		),
		array(
			'id' => '238',
			'name' => 'Timor-Leste',
			'fips104' => 'TT',
			'iso2' => 'TL',
			'iso3' => 'TLS',
			'ison' => '626',
			'internet' => 'TP',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Timor Escudo',
			'currency_code' => 'TPE',
			'population' => '1040880',
			'title' => 'East Timor',
			'comment' => 'NULL',
			'slug' => 'timor-leste'
		),
		array(
			'id' => '239',
			'name' => 'Togo',
			'fips104' => 'TO',
			'iso2' => 'TG',
			'iso3' => 'TGO',
			'ison' => '768',
			'internet' => 'TG',
			'capital' => 'Lome ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Togolese',
			'nationality_plural' => 'Togolese',
			'currency' => 'CFA Franc BCEAO',
			'currency_code' => 'XOF',
			'population' => '5153088',
			'title' => 'Togo',
			'comment' => '',
			'slug' => 'togo'
		),
		array(
			'id' => '240',
			'name' => 'Tokelau',
			'fips104' => 'TL',
			'iso2' => 'TK',
			'iso3' => 'TKL',
			'ison' => '772',
			'internet' => 'TK',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Tokelauan',
			'nationality_plural' => 'Tokelauans',
			'currency' => 'New Zealand Dollar',
			'currency_code' => 'NZD',
			'population' => '1445',
			'title' => 'Tokelau',
			'comment' => '',
			'slug' => 'tokelau'
		),
		array(
			'id' => '241',
			'name' => 'Tonga',
			'fips104' => 'TN',
			'iso2' => 'TO',
			'iso3' => 'TON',
			'ison' => '776',
			'internet' => 'TO',
			'capital' => 'Nuku\'alofa ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Tongan',
			'nationality_plural' => 'Tongans',
			'currency' => 'Pa\'anga',
			'currency_code' => 'TOP',
			'population' => '104227',
			'title' => 'Tonga',
			'comment' => '',
			'slug' => 'tonga'
		),
		array(
			'id' => '242',
			'name' => 'Trinidad and Tobago',
			'fips104' => 'TD',
			'iso2' => 'TT',
			'iso3' => 'TTO',
			'ison' => '780',
			'internet' => 'TT',
			'capital' => 'Port-of-Spain ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Trinidadian and Tobagonian',
			'nationality_plural' => 'Trinidadians and Tobagonians',
			'currency' => 'Trinidad and Tobago Dollar',
			'currency_code' => 'TTD',
			'population' => '1169682',
			'title' => 'Trinidad and Tobago',
			'comment' => '',
			'slug' => 'trinidad-and-tobago'
		),
		array(
			'id' => '243',
			'name' => 'Tromelin Island',
			'fips104' => 'TE',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Africa ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Tromelin Island',
			'comment' => 'ISO includes with the Miscellaneous (French) Indian Ocean Islands',
			'slug' => 'tromelin-island'
		),
		array(
			'id' => '244',
			'name' => 'Tunisia (تونس)',
			'fips104' => 'TS',
			'iso2' => 'TN',
			'iso3' => 'TUN',
			'ison' => '788',
			'internet' => 'TN',
			'capital' => 'Tunis ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Tunisian',
			'nationality_plural' => 'Tunisians',
			'currency' => 'Tunisian Dinar',
			'currency_code' => 'TND',
			'population' => '9705102',
			'title' => 'Tunisia',
			'comment' => '',
			'slug' => 'tunisia'
		),
		array(
			'id' => '245',
			'name' => 'Turkey (Türkiye)',
			'fips104' => 'TU',
			'iso2' => 'TR',
			'iso3' => 'TUR',
			'ison' => '792',
			'internet' => 'TR',
			'capital' => 'Ankara ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Turkish',
			'nationality_plural' => 'Turks',
			'currency' => 'Turkish Lira',
			'currency_code' => 'TRL',
			'population' => '66493970',
			'title' => 'Turkey',
			'comment' => '',
			'slug' => 'turkey-t-rkiye'
		),
		array(
			'id' => '246',
			'name' => 'Turkmenistan (Türkmenistan)',
			'fips104' => 'TX',
			'iso2' => 'TM',
			'iso3' => 'TKM',
			'ison' => '795',
			'internet' => 'TM',
			'capital' => 'Ashgabat ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Turkmen',
			'nationality_plural' => 'Turkmens',
			'currency' => 'Manat',
			'currency_code' => 'TMM',
			'population' => '4603244',
			'title' => 'Turkmenistan',
			'comment' => '',
			'slug' => 'turkmenistan-t-rkmenistan'
		),
		array(
			'id' => '247',
			'name' => 'Turks and Caicos Islands',
			'fips104' => 'TK',
			'iso2' => 'TC',
			'iso3' => 'TCA',
			'ison' => '796',
			'internet' => 'TC',
			'capital' => 'Cockburn Town ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '18122',
			'title' => 'The Turks and Caicos Islands',
			'comment' => '',
			'slug' => 'turks-and-caicos-islands'
		),
		array(
			'id' => '248',
			'name' => 'Tuvalu',
			'fips104' => 'TV',
			'iso2' => 'TV',
			'iso3' => 'TUV',
			'ison' => '798',
			'internet' => 'TV',
			'capital' => 'Funafuti ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Tuvaluan',
			'nationality_plural' => 'Tuvaluans',
			'currency' => 'Australian Dollar',
			'currency_code' => 'AUD',
			'population' => '10991',
			'title' => 'Tuvalu',
			'comment' => '',
			'slug' => 'tuvalu'
		),
		array(
			'id' => '249',
			'name' => 'Uganda',
			'fips104' => 'UG',
			'iso2' => 'UG',
			'iso3' => 'UGA',
			'ison' => '800',
			'internet' => 'UG',
			'capital' => 'Kampala ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Ugandan',
			'nationality_plural' => 'Ugandans',
			'currency' => 'Uganda Shilling',
			'currency_code' => 'UGX',
			'population' => '23985712',
			'title' => 'Uganda',
			'comment' => '',
			'slug' => 'uganda'
		),
		array(
			'id' => '250',
			'name' => 'Ukraine (Україна)',
			'fips104' => 'UP',
			'iso2' => 'UA',
			'iso3' => 'UKR',
			'ison' => '804',
			'internet' => 'UA',
			'capital' => 'Kiev ',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Ukrainian',
			'nationality_plural' => 'Ukrainians',
			'currency' => 'Hryvnia',
			'currency_code' => 'UAH',
			'population' => '48760474',
			'title' => 'The Ukraine',
			'comment' => '',
			'slug' => 'ukraine'
		),
		array(
			'id' => '251',
			'name' => 'United Arab Emirates (الإمارات العربيّة المتّحدة)',
			'fips104' => 'AE',
			'iso2' => 'AE',
			'iso3' => 'ARE',
			'ison' => '784',
			'internet' => 'AE',
			'capital' => 'Abu Dhabi ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Emirati',
			'nationality_plural' => 'Emiratis',
			'currency' => 'UAE Dirham',
			'currency_code' => 'AED',
			'population' => '2407460',
			'title' => 'The United Arab Emirates',
			'comment' => '',
			'slug' => 'united-arab-emirates'
		),
		array(
			'id' => '252',
			'name' => 'United Kingdom',
			'fips104' => 'UK',
			'iso2' => 'GB',
			'iso3' => 'GBR',
			'ison' => '826',
			'internet' => 'UK',
			'capital' => 'London ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'British',
			'nationality_plural' => 'Britons',
			'currency' => 'Pound Sterling',
			'currency_code' => 'GBP',
			'population' => '59647790',
			'title' => 'The United Kingdom',
			'comment' => 'ISO includes Guernsey, Isle of Man, Jersey',
			'slug' => 'united-kingdom'
		),
		array(
			'id' => '253',
			'name' => 'United States',
			'fips104' => 'US',
			'iso2' => 'US',
			'iso3' => 'USA',
			'ison' => '840',
			'internet' => 'US',
			'capital' => 'Washington, DC ',
			'map_reference' => 'North America ',
			'nationality_singular' => 'American',
			'nationality_plural' => 'Americans',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '278058881',
			'title' => 'The United States',
			'comment' => '',
			'slug' => 'united-states'
		),
		array(
			'id' => '254',
			'name' => 'United States minor outlying islands',
			'fips104' => '--',
			'iso2' => 'UM',
			'iso3' => 'UMI',
			'ison' => '581',
			'internet' => 'UM',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '0',
			'title' => 'The United States Minor Outlying Islands',
			'comment' => 'ISO includes Baker Island, Howland Island, Jarvis Island, Johnston Atoll, Kingman Reef, Midway Islands, Palmyra Atoll, Wake Island',
			'slug' => 'united-states-minor-outlying-islands'
		),
		array(
			'id' => '255',
			'name' => 'Uruguay',
			'fips104' => 'UY',
			'iso2' => 'UY',
			'iso3' => 'URY',
			'ison' => '858',
			'internet' => 'UY',
			'capital' => 'Montevideo ',
			'map_reference' => 'South America ',
			'nationality_singular' => 'Uruguayan',
			'nationality_plural' => 'Uruguayans',
			'currency' => 'Peso Uruguayo',
			'currency_code' => 'UYU',
			'population' => '3360105',
			'title' => 'Uruguay',
			'comment' => '',
			'slug' => 'uruguay'
		),
		array(
			'id' => '256',
			'name' => 'Uzbekistan (O&#39;zbekiston)',
			'fips104' => 'UZ',
			'iso2' => 'UZ',
			'iso3' => 'UZB',
			'ison' => '860',
			'internet' => 'UZ',
			'capital' => 'Tashkent',
			'map_reference' => 'Commonwealth of Independent States ',
			'nationality_singular' => 'Uzbekistani',
			'nationality_plural' => 'Uzbekistanis',
			'currency' => 'Uzbekistan Sum',
			'currency_code' => 'UZS',
			'population' => '25155064',
			'title' => 'Uzbekistan',
			'comment' => '',
			'slug' => 'uzbekistan-o-39-zbekiston'
		),
		array(
			'id' => '257',
			'name' => 'Vanuatu',
			'fips104' => 'NH',
			'iso2' => 'VU',
			'iso3' => 'VUT',
			'ison' => '548',
			'internet' => 'VU',
			'capital' => 'Port-Vila ',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Ni-Vanuatu',
			'nationality_plural' => 'Ni-Vanuatu',
			'currency' => 'Vatu',
			'currency_code' => 'VUV',
			'population' => '192910',
			'title' => 'Vanuatu',
			'comment' => '',
			'slug' => 'vanuatu'
		),
		array(
			'id' => '258',
			'name' => 'Vatican City (Città del Vaticano)',
			'fips104' => 'VT',
			'iso2' => 'VA',
			'iso3' => 'VAT',
			'ison' => '336',
			'internet' => 'VA',
			'capital' => 'Vatican City ',
			'map_reference' => 'Europe ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Euro',
			'currency_code' => 'EUR',
			'population' => '890',
			'title' => 'The Vatican City',
			'comment' => '',
			'slug' => 'vatican-city-citt-del-vaticano'
		),
		array(
			'id' => '259',
			'name' => 'Venezuela',
			'fips104' => 'VE',
			'iso2' => 'VE',
			'iso3' => 'VEN',
			'ison' => '862',
			'internet' => 'VE',
			'capital' => 'Caracas ',
			'map_reference' => 'South America, Central America and the Caribbean ',
			'nationality_singular' => 'Venezuelan',
			'nationality_plural' => 'Venezuelans',
			'currency' => 'Bolivar',
			'currency_code' => 'VEB',
			'population' => '23916810',
			'title' => 'Venezuela',
			'comment' => '',
			'slug' => 'venezuela'
		),
		array(
			'id' => '260',
			'name' => 'Vietnam (Việt Nam)',
			'fips104' => 'VM',
			'iso2' => 'VN',
			'iso3' => 'VNM',
			'ison' => '704',
			'internet' => 'VN',
			'capital' => 'Hanoi ',
			'map_reference' => 'Southeast Asia ',
			'nationality_singular' => 'Vietnamese',
			'nationality_plural' => 'Vietnamese',
			'currency' => 'Dong',
			'currency_code' => 'VND',
			'population' => '79939014',
			'title' => 'Vietnam',
			'comment' => '',
			'slug' => 'vietnam-vi-t-nam'
		),
		array(
			'id' => '261',
			'name' => 'Virgin Islands (UK)',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '0',
			'title' => 'Virgin Islands (UK)',
			'comment' => 'see British Virgin Islands',
			'slug' => 'virgin-islands-uk'
		),
		array(
			'id' => '262',
			'name' => 'Virgin Islands (US)',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '0',
			'title' => 'Virgin Islands (US)',
			'comment' => 'see Virgin Islands',
			'slug' => 'virgin-islands-us'
		),
		array(
			'id' => '263',
			'name' => 'Virgin Islands, British',
			'fips104' => 'VI',
			'iso2' => 'VG',
			'iso3' => 'VGB',
			'ison' => '92',
			'internet' => 'VG',
			'capital' => 'Road Town ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'British Virgin Islander',
			'nationality_plural' => 'British Virgin Islanders',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '20812',
			'title' => 'The British Virgin Islands',
			'comment' => '',
			'slug' => 'virgin-islands-british'
		),
		array(
			'id' => '264',
			'name' => 'Virgin Islands, U.S.',
			'fips104' => 'VQ',
			'iso2' => 'VI',
			'iso3' => 'VIR',
			'ison' => '850',
			'internet' => 'VI',
			'capital' => 'Charlotte Amalie ',
			'map_reference' => 'Central America and the Caribbean ',
			'nationality_singular' => 'Virgin Islander',
			'nationality_plural' => 'Virgin Islanders',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '122211',
			'title' => 'The Virgin Islands',
			'comment' => '',
			'slug' => 'virgin-islands-u-s'
		),
		array(
			'id' => '265',
			'name' => 'Wake Island',
			'fips104' => 'WQ',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Oceania ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'US Dollar',
			'currency_code' => 'USD',
			'population' => '0',
			'title' => 'Wake Island',
			'comment' => 'ISO includes with the US Minor Outlying Islands',
			'slug' => 'wake-island'
		),
		array(
			'id' => '266',
			'name' => 'Wallis and Futuna',
			'fips104' => 'WF',
			'iso2' => 'WF',
			'iso3' => 'WLF',
			'ison' => '876',
			'internet' => 'WF',
			'capital' => 'Mata-Utu',
			'map_reference' => 'Oceania ',
			'nationality_singular' => 'Wallis and Futuna Islander',
			'nationality_plural' => 'Wallis and Futuna Islanders',
			'currency' => 'CFP Franc',
			'currency_code' => 'XPF',
			'population' => '15435',
			'title' => 'Wallis and Futuna',
			'comment' => '',
			'slug' => 'wallis-and-futuna'
		),
		array(
			'id' => '267',
			'name' => 'West Bank',
			'fips104' => 'WE',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'Middle East ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'New Israeli Shekel ',
			'currency_code' => 'ILS',
			'population' => '2090713',
			'title' => 'The West Bank',
			'comment' => '',
			'slug' => 'west-bank'
		),
		array(
			'id' => '268',
			'name' => 'Western Sahara (الصحراء الغربية)',
			'fips104' => 'WI',
			'iso2' => 'EH',
			'iso3' => 'ESH',
			'ison' => '732',
			'internet' => 'EH',
			'capital' => '',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Sahrawian',
			'nationality_plural' => 'Sahrawis',
			'currency' => 'Moroccan Dirham',
			'currency_code' => 'MAD',
			'population' => '250559',
			'title' => 'Western Sahara',
			'comment' => '',
			'slug' => 'western-sahara'
		),
		array(
			'id' => '269',
			'name' => 'Western Samoa',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => 'Tala',
			'currency_code' => 'WST',
			'population' => '0',
			'title' => 'Western Samoa',
			'comment' => 'see Samoa',
			'slug' => 'western-samoa'
		),
		array(
			'id' => '270',
			'name' => 'World',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => 'World, Time Zones ',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '1862433264',
			'title' => 'The World',
			'comment' => 'NULL',
			'slug' => 'world'
		),
		array(
			'id' => '271',
			'name' => 'Yemen (اليمن)',
			'fips104' => 'YM',
			'iso2' => 'YE',
			'iso3' => 'YEM',
			'ison' => '887',
			'internet' => 'YE',
			'capital' => 'Sanaa ',
			'map_reference' => 'Middle East ',
			'nationality_singular' => 'Yemeni',
			'nationality_plural' => 'Yemenis',
			'currency' => 'Yemeni Rial',
			'currency_code' => 'YER',
			'population' => '18078035',
			'title' => 'Yemen',
			'comment' => '',
			'slug' => 'yemen'
		),
		array(
			'id' => '272',
			'name' => 'Yugoslavia',
			'fips104' => 'YI',
			'iso2' => 'YU',
			'iso3' => 'YUG',
			'ison' => '891',
			'internet' => 'YU',
			'capital' => 'Belgrade ',
			'map_reference' => 'Europe ',
			'nationality_singular' => 'Serbian',
			'nationality_plural' => 'Serbs',
			'currency' => 'Yugoslavian Dinar ',
			'currency_code' => 'YUM',
			'population' => '10677290',
			'title' => 'Yugoslavia',
			'comment' => 'NULL',
			'slug' => 'yugoslavia'
		),
		array(
			'id' => '273',
			'name' => 'Zaire',
			'fips104' => '--',
			'iso2' => '--',
			'iso3' => '-- ',
			'ison' => '--',
			'internet' => '--',
			'capital' => '',
			'map_reference' => '',
			'nationality_singular' => '',
			'nationality_plural' => '',
			'currency' => '',
			'currency_code' => '',
			'population' => '0',
			'title' => 'Zaire',
			'comment' => 'see Democratic Republic of the Congo',
			'slug' => 'zaire'
		),
		array(
			'id' => '274',
			'name' => 'Zambia',
			'fips104' => 'ZA',
			'iso2' => 'ZM',
			'iso3' => 'ZWB',
			'ison' => '894',
			'internet' => 'ZM',
			'capital' => 'Lusaka ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Zambian',
			'nationality_plural' => 'Zambians',
			'currency' => 'Kwacha',
			'currency_code' => 'ZMK',
			'population' => '9770199',
			'title' => 'Zambia',
			'comment' => '',
			'slug' => 'zambia'
		),
		array(
			'id' => '275',
			'name' => 'Zimbabwe',
			'fips104' => 'ZI',
			'iso2' => 'ZW',
			'iso3' => 'ZWE',
			'ison' => '716',
			'internet' => 'ZW',
			'capital' => 'Harare ',
			'map_reference' => 'Africa ',
			'nationality_singular' => 'Zimbabwean',
			'nationality_plural' => 'Zimbabweans',
			'currency' => 'Zimbabwe Dollar',
			'currency_code' => 'ZWD',
			'population' => '11365366',
			'title' => 'Zimbabwe',
			'comment' => '',
			'slug' => 'zimbabwe'
		),
	);
}
