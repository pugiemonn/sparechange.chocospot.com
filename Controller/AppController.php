<?php
App::uses('AppController', 'Controller');
/**
 * App Controller
 *
 * @property App $App
 */
class AppController extends Controller {

  var $needAuth = false;

  function beforeFilter()
  {
    //セッションから取り出したログイン情報をセット
    $auth = $this->Session->read('auth');
    $this->set("auth", $auth);

    //ログインされていない場合はログイン画面へ転送
    if($this->needAuth)
    {
      if(empty($auth))
      {
        $this->redirect("/users/login");
        return;
      }
    }
  }  

  function checkSession()
  {
    if (!$this->Session->check('auth'))
    {
      $this->redirect('/users/login');
      exit();
    }
  }


}
