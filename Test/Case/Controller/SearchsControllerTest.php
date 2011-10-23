<?php
/* Searchs Test cases generated on: 2011-10-24 06:04:42 : 1319403882*/
App::uses('SearchsController', 'Controller');

/**
 * TestSearchsController 
 *
 */
class TestSearchsController extends SearchsController {
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
 * SearchsController Test Case
 *
 */
class SearchsControllerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.search');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Searchs = new TestSearchsController();
		$this->Searchs->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Searchs);

		parent::tearDown();
	}

}
