<?php
App::uses('Passport', 'Model');

/**
 * Passport Test Case
 *
 */
class PassportTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.passport',
		'app.user',
		'app.nice',
		'app.kintore',
		'app.category',
		'app.comment',
		'app.favorite'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Passport = ClassRegistry::init('Passport');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Passport);

		parent::tearDown();
	}

}
