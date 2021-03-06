<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class SparechangePostsController extends AppController {

  var $uses      = array('SparechangePost', 'User', 'Blog', 'SparechangeComment');
  var $components = array('Auth', 'Security' => array('csrfExpires' => '+1 hour'));
  //var $components = array('Auth');
  //public $helpers = array('Js' => array('Jquery'));
  public $helpers = array('Js');


  protected $_types = array(
    'index' => array('index', array('limit' => '20')),//index
    'user'  => array('user', array('limit' => '20')), 
    'view'  => array('view', array('limit' => '1')),
  );

    /*
  var $paginate = array(        
    'limit' => 20,
    'order' => array(
      'SparechangePost.id' => 'asc'
    )
  );
    */

  function beforeFilter() {
    $this->Auth->allow('*');
    //$this->Auth->allow(array('*', 'test', 'readJs'));
    $this->Auth->deny('add');

    //CSRF対策
    $this->Security->requireAuth('add');

    //セッションから取り出したログイン情報をセット
    $auth = $this->Session->read('auth');
    $this->set("auth", $auth);
    parent::beforeFilter();
//    $this->Security->csrfExpires = '+1 hour';
 //   $this->Security->requirePost('readJs');
//    $this->Security->disabledFields = array('readJs');
//    $this->Security->disabledFields = 'readJs';
//      $this->Security->disabledFields[] = 'Post.name';
//    $this->Security->validatePost = '';
  }


  public function index() {
    //アクション名を取得
    $options  = $this->_types[$this->request['action']];
    //$this->set('data', $this->paginate('SparechangePost'));
    //$data = $this->paginate('SparechangePost');
    $this->paginate = array('limit' => 20);
    //$post_list = $this->paginate('SparechangePost');
    $post_list = $this->SparechangePost->find('all');
    $this->set('post_list', $post_list);
    //$post_list = $this->paginate();
    $this->set('blogs', $this->Blog->find('all', array('limit' => '3')));
    $this->set('title_for_layout', SpareChangeTitle);
  }

  public function user($id=null)
  {
    $id        = $this->request->params['id'];
    $user_data = array();
    $options   = array(
      'conditions' => array(
        'SparechangePost.user_id' => ''.$id.''
      )
    );
    //カウント数を取得
    $count     = $this->SparechangePost->find('count', $options);
    //すでに投稿がある場合
    if($count>0) {
      $amount    = $this->SparechangePost->findUserTotalAmount($id);
      //ユーザーの数値情報を作る
      $user_data['amount']  = $amount[0][0]['cost']; 
      $user_data['count']   = $count;
      $user_data['average'] = ceil($amount[0][0]['cost'] / $count); 
    }
    //投稿がまだ無い場合、または、ユーザー登録した瞬間など
    else
    {
      $user_data['amount']  = 0; 
      $user_data['count']   = 0;
      $user_data['average'] = 0; 
    }
    $options  = $this->_types[$this->request['action']];
    //投稿のidを渡す
    $options[1] = array_merge($options[1], array('conditions' => array('`SparechangePost`.`user_id`' => $id)));
    $user_info = $this->User->find('first', array('conditions' => array('`User`.`id`' => $id)));
    //投稿の取得
    $post_list = $this->SparechangePost->find("all", $options[1]);
    $this->set('auth', $this->Session->read('auth'));
    $this->set('title_for_layout', $user_info['User']['name'].'の情報 | '.SpareChangeTitle);
    $this->set(compact('post_list', 'user_data', 'user_info'));
  }

  public function add() {
    //セッションチェック
    $auth_data = $this->Session->read("auth");
    //pr($this->request);
    //echo $auth_data['id'];
    $this->set('auth_data', $auth_data);
    $this->set('title_for_layout', '欲しい額を投稿 | '.SpareChangeTitle);
    //pr($this->request->data);
    //exit("aa");
    //書き込み
    if(!empty($this->request->data))
    {
      if($this->request['data']['Post']['user_id'] == $auth_data['id'])
      {
        $data = array(
          'user_id' => ''.$this->request['data']['Post']['user_id'].'',
          'comment' => ''.$this->request['data']['Post']['comment'].'',
          'cost'    => ''.$this->request['data']['Post']['cost'].'',
        );
       
//        pr($data);
        $this->SparechangePost->set($data);
        //pr($this->SparechangePost);
        if(!$this->SparechangePost->validates())
        {
          //validateでエラーがある場合
          $this->set("cost", $this->request['data']['Post']['cost']);
          //echo "入力エラーがあります";
          return;
        }
        //モデル名が違うから指定しないといけない?
        if($this->SparechangePost->save($data, false))
        {   
          $this->redirect('/');
          //$this->flash("投稿しました", "/posts");
        }
      }
    }  
    $this->render('/SparechangePosts/add');
  }

  function delete()
  {
  }

  public function view($id=null)
  {
    $options  = $this->_types[$this->request['action']];
    //投稿のidを渡す
    $id         = $this->request->params['id'];
    $options[1] = array_merge($options[1], array('conditions' => array('`SparechangePost`.`id`' => $id)));
    //pr($this->request);
    $comment_list = $this->SparechangeComment->find("all", array('conditions' => array('`SparechangeComment`.`sparechange_post_id`' => $id)));
    $post_list    = $this->SparechangePost->find("all", $options[1]);
    //pr($post_list);
    $this->set('title_for_layout', number_format($post_list[0]['SparechangePost']['cost']).'円( ﾟдﾟ)ﾎｽｨ… | '.SpareChangeTitle);
    $this->set(compact('post_list', 'comment_list'));
  } 

  public function test($id=2)
  {
    $options  = $this->_types['view'];
    //投稿のidを渡す
    $options[1] = array_merge($options[1], array('conditions' => array('`SparechangePost`.`id`' => $id)));
    //pr($options);
    $comment_list = $this->SparechangeComment->find("all", array('conditions' => array('`SparechangeComment`.`sparechange_post_id`' => $id)));
    $post_list    = $this->SparechangePost->find("all", $options[1]);
    //pr($post_list);
    $this->set('title_for_layout', number_format($post_list[0]['SparechangePost']['cost']).'円( ﾟдﾟ)ﾎｽｨ… | '.SpareChangeTitle);
    $this->set(compact('post_list'));
    $this->set(compact('comment_list'));
  }

  public function readJs()
  {
    exit("hugahuga");
  }

}
