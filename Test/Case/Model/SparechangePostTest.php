<?php
/* SparechangePost Test cases generated on: 2011-10-21 17:32:00 : 1319185920*/
App::uses('SparechangePost', 'Model');

/**
 * SparechangePost Test Case
 *
 */
class SparechangePostTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.sparechange_post');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->SparechangePost = ClassRegistry::init('SparechangePost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->SparechangePost);

		parent::tearDown();
	}

}
