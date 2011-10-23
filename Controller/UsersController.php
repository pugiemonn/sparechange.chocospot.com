<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property 'Security'Component $'Security'
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
  public $components = array('Security');

  public function index()
  {
    //$this->set('users', $this->paginate());
    $options = array(
      //'conditons' =>
      'fields' => array(
        'User.id',
        'User.name',
      ),
      'order' => array(
        'User.id' => 'desc'
      ),
      'limit'  => '20',
    );
    $this->set('users', $this->User->find('all', $options));
    $this->set('title_for_layout', '新着ユーザー | '.SpareChangeTitle);
    $this->data = $this->paginate('User');
    //$this->render('/Users/index');
  } 

  public function login()
  {
    $this->set('title_for_layout', 'ログイン | '.SpareChangeTitle);
    $this->set("login_error", false); //初期表示時はエラー無しとする    
    //これを入れないと/user/loginを見に行く
    $this->render("/Users/login");
  }

  public function login_cmp()
  {
    $data = array(
        'mail'     => $this->data['User']['mail'],
        'password' => $this->data['User']['password']
      );
    $this->set('title_for_layout', 'ログイン | '.SpareChangeTitle);
    //validateするために値をセットする
    $this->User->set($data);
    if(!$this->User->validates()) {
      //値がおかしかった場合はリダイレクト
      $this->render('/Users/login');
      return ;
    }

    $conditions = array(
      'conditions' => array(
        'User.mail'     => $this->data['User']['mail'],
        'User.password' => Security::hash(SALT.$this->data['User']['password'])
      )
    );
    //exit("aa");
    //ここでログインできるかを判定している
    $data = $this->User->find('all', $conditions);
    //データがあるかをチェックする
    if(count($data) == 0)
    {
      $this->set('login_error', true);
      $this->render('/Users/login');
      return;
    }
    //セッションにログイン情報を挿入する
    $this->Session->write('auth', $data[0]['User']);
    //pr($this->Session->read('auth'));
    //
    $this->flash('ログイン成功', '/posts/user/'.$data[0]['User']['id']);
  }

  public function logout()
  {
    $this->Session->delete("auth");
    $this->flash("さようなら", "/");
  }


  public function add() {
    $this->set('title_for_layout', 'ユーザー登録 | '.SpareChangeTitle);
    if(!empty($this->request->data)) {
      //モデルにdataをセット
      $this->User->set($this->request->data);
      //入力チェック
      if(!$this->User->validates())
      {
        //入力に不備が合った場合の処理
        $this->render('/Users/add');
        return;
      }
      //アクションを判定する
      $options = $this->_types[$this->request->params['action']];

      //名前が登録されているかをチェックする 
      $count = $this->User->find('name', array());
      if($count >= 1)
      {
        //名前が重複している
        $this->set('nameOverlap', true); 
        $this->render('/Users/add');
        return ;
      }

      //メールアドレスが登録されているかをチェックする
      $count = $this->User->find('mail', array());
      if($count >= 1)
      {
        //メールアドレスが重複している
        $this->set('mailOverlap', true); 
        $this->render('/Users/add');
        return ;
      }

      //パスワードのハッシュ化
      $this->request->data['User']['password'] = SALT.$this->request->data['User']['password'];
      $this->request->data['User']['password'] = Security::hash($this->request->data['User']['password']);
      //pr($this->request->data);
      //exit("aa");
      //ユーザーデータの書き込み
      if($this->User->save($this->request->data, array('validate' => false)))
      {
        $options = array(
          'conditions' => array(
            'User.mail'     => $this->request->data['User']['mail'],
            'User.password' => $this->request->data['User']['password'],
          ),
        );
        //登録されたデータを取得
        $user_data  = $this->User->find('first', $options);
        //セッションへ書き込み
        $this->Session->write('auth', $user_data['User']);
        //ユーザーのページへリダイレクト
        $this->flash('ユーザー登録が完了しました。', '/posts/user/'.$user_data['User']['id']);
        //returnと書くといいですね。
        return ;
      }
    }
    $this->render('/Users/add');
  }

  public function edit($id=null)
  {
    //セッションチェック
    $this->checkSession();
    //セッションデータを読み込み
    $user_data = $this->Session->read('auth');
    //pr($user_data); 
    if(empty($this->data))
    {
      //フォームから入力が無い場合
      $this->User->id = $user_data['id'];
      $this->data = $this->User->read();
    }
    //口座情報を書き込み
    else
    {
      $this->User->set($this->data);
      //バリデーション
      if(!$this->User->validates())
      {
        return ;
      }
      //保存      
      if($this->User->save($this->data['User']))
      {
        $this->flash('更新されました', '/posts/user/'.$user_data['id']);
        return;
      }
    } 
    $this->render('/Users/edit');  
  }

  function delete()
  {
  }

}
