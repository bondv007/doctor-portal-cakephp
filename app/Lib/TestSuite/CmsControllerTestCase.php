<?php
/**
 * CmsTestCase class
 *
 * PHP version 5
 *
 * @category TestSuite
 * @package  Cms
 * @version  1.4
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @author   Rachman Chavik <rchavik@gmail.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.cms.org
 */
class CmsControllerTestCase extends ControllerTestCase {
/**
 * setUp
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		Configure::write('Acl.database', 'test');
	}
}