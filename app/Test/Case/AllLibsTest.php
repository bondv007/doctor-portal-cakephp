<?php
class AllLibsTest extends PHPUnit_Framework_TestSuite {

	public static function suite() {
		$suite = new CakeTestSuite('All lib tests');
		$path = APP . 'Test' .DS. 'Case' .DS. 'Lib' .DS;
		$suite->addTestDirectory($path);
		return $suite;
	}
}