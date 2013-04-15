<?php
App::uses('Nice', 'Model');

/**
 * Nice Test Case
 *
 */
class NiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nice',
		'app.kintore',
		'app.category',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nice = ClassRegistry::init('Nice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nice);

		parent::tearDown();
	}

}
