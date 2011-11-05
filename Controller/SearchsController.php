<?php
App::uses('AppController', 'Controller');
/**
 * Searchs Controller
 *
 * @property Search $Search
 */
class SearchsController extends AppController {
  var $uses = array('SparechangePost');

  function beforeFilter() {
    //セッションから取り出したログイン情報をセット
    $auth = $this->Session->read('auth');
    $this->set("auth", $auth);
    parent::beforeFilter();
  }

  public function index() {
    if(isset($this->request->query['keyword'])) {
      $options = array(
        'conditions' => array(
          'SparechangePost.comment LIKE' => '%'.$this->request->query['keyword'].'%',
        ),
      );
      //indexと同じ感じで?
      $search_lists = $this->SparechangePost->find('all', $options);
    }
    else
    {
      $this->request->query['keyword'] = "";
      $search_lists = array();
    }
    $this->set('title_for_layout', '検索 | '.SpareChangeTitle);
    $this->set(compact('search_lists'));
  }
}
