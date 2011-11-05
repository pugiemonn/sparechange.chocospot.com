<?php
App::uses('AppController', 'Controller');
/**
 * Supports Controller
 *
 * @property Support $Support
 */
class SupportsController extends AppController {

  public function beforeFilter()
  {
    parent::beforeFilter();
    $auth = $this->Session->read('auth');
    $this->set("auth", $auth);
  }

  public function index()
  {
  }
}
