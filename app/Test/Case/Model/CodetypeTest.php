<?php
App::uses('Codetype', 'Model');

/**
 * Codetype Test Case
 *
 */
class CodetypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.codetype',
		'app.code'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Codetype = ClassRegistry::init('Codetype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Codetype);

		parent::tearDown();
	}

}
