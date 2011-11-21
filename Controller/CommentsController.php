<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 */
class CommentsController extends AppController {

  protected $_types = array(
    'index' => array('index', array('limit' => '20')),//index
  );
  
  var $uses = array('SparechangeComment', 'SparechangePost');
  var $components = array('Auth', 'Security');
  //public $helpers = array('Module');


  function beforeFilter() {
    $this->Auth->allow('*');
    $this->Auth->deny('add', 'add_post');

    $this->Security->requireAuth('add', 'add_post');

    //セッションから取り出したログイン情報をセット
    $auth = $this->Session->read('auth');
    $this->set("auth", $auth);
    parent::beforeFilter();
  }


  //新着コメントがある投稿を表示する
  public function index()
  {
    //アクション名を取得
    //コメント付き投稿の一覧
    $post_list = $this->SparechangeComment->find("all");
    //pr($post_list);
    $this->set('title_for_layout', SpareChangeTitle);
    $this->set(compact('post_list'));
  }

  //JSからgetで呼ぶ
  //
  public function add()
  {
    $auth_data = $this->Session->read("auth");
    $this->set('auth_data', $auth_data);
    $this->set('title_for_layout', '欲しい額を投稿 | '.SpareChangeTitle);

    //書き込み
    //
    if(empty($this->data))
    {
      //pr($this->request);
      $this->layout = '';
      if($this->request->params['named']['user_id'] == $auth_data['id'])
      {
        $data = array(
          //'user_id'             => ''.$this->request['data']['Comment']['user_id'].'',
          'user_id'             => ''.$this->request->params['named']['user_id'].'',
          'sparechange_post_id' => ''.$this->request->params['named']['sparechange_post_id'].'',
          'comment'             => ''.urldecode($this->request->params['named']['comment']).'',
        );
        //validateチェックをする前にセットする
        //
        $this->SparechangeComment->set($data);
        if(!$this->SparechangeComment->validates())
        {
          //validateでエラーがある場合
          $this->render('comment_error');
          //ddecho "入力エラーがあります";
          //exit("aaa:");
          return;
        }

        if($this->SparechangeComment->save($data, false))
        {   
          //レイアウトだけ出力しないでビューだけを読み込む
          //
          $this->set('comment', $this->SparechangeComment->find('first'));
          //$this->render(false);
          $this->render('comment');
          //投稿したらリダイレクトします
        }
      }
    }      
  }

  //ポストで投稿できる
  public function add_post()
  {
    //$this->checkSession();
    $auth_data = $this->Session->read("auth");
    $this->set('auth_data', $auth_data);
    $this->set('title_for_layout', '欲しい額を投稿 | '.SpareChangeTitle);
    //pr($this->request);
    //書き込み
    if(!empty($this->data))
    {
      //pr($this->request);
      if($this->request['data']['Comment']['user_id'] == $auth_data['id'])
      {
        $data = array(
          'user_id'             => ''.$this->request['data']['Comment']['user_id'].'',
          'sparechange_post_id' => ''.$this->request['data']['Comment']['sparechange_post_id'].'',
          'comment'             => ''.$this->request['data']['Comment']['comment'].'',
        );
        //pr($data);
        //$this->_hoge();
        $this->SparechangeComment->set($data);
        //モデル名が違うから指定しないといけない?
        if($this->SparechangeComment->save($data, false))
        {   
          //投稿したらリダイレクトします
          $this->redirect("/posts/view/".$this->request['data']['Comment']['sparechange_post_id']);
          //$this->flash("投稿しました", "/posts/view/".$this->request['data']['Comment']['sparechange_post_id']);
        }
      }
    }      
  }

/* private method を設定する */
}
