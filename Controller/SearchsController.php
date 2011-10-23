<?php
App::uses('AppController', 'Controller');
/**
 * Searchs Controller
 *
 * @property Search $Search
 */
class SearchsController extends AppController {
  var $uses = array('SparechangePost');
  public function index() {
    if(isset($this->params['url']['keyword'])) {
      $options = array(
        'conditions' => array(
          'SparechangePost.comment LIKE' => '%'.$this->params['url']['keyword'].'%',
        ),
      );
      //indexと同じ感じで?
      $search_lists = $this->SparechangePost->find('index', $options);
    }
    else
    {
      $this->params['url']['keyword'] = "";
      $search_lists = array();
    }
    $this->set('title_for_layout', '検索 | '.SpareChangeTitle);
    $this->set(compact('search_lists'));
  }
}
