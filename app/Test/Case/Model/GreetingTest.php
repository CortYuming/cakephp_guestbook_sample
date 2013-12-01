<?php
App::uses('Greeting', 'Model');

/**
 * Greeting Test Case
 *
 */
class GreetingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.greeting'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Greeting = ClassRegistry::init('Greeting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Greeting);

		parent::tearDown();
	}

}
