<?php
/* Supports Test cases generated on: 2011-10-21 18:53:14 : 1319190794*/
App::uses('SupportsController', 'Controller');

/**
 * TestSupportsController 
 *
 */
class TestSupportsController extends SupportsController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * SupportsController Test Case
 *
 */
class SupportsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.support');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Supports = new TestSupportsController();
		$this->Supports->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Supports);

		parent::tearDown();
	}

}
