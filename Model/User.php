<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
/**
 * Display field
 *
 * @var string
 */
//  public $displayField = 'name';
  //var $name = "User";
  public $hasMany = array(
    'SparechangePost' => array(
      'className'  => 'SparechangePost',
      'foreignKey' => 'user_id',
      'limit'      => '10',
      //'foreignKey'    => 'user_id',
      //'conditions' => array('SparechangePost.id' => 'DESC'),
      //'order'      => 'SparechangePost.id DESC',
    ),
    'SparechangeComment' => array(
      'className'  => 'SparechangeComment',
      'foreignKey' => 'user_id',
      'limit'      => '10',
    ) 
  );

  var $validate = array(
    'name'     => array(
/*
      'notEmpty' => array(
        'rule'    => 'notEmpty',
        'message' => '名前を入力してください。',
      ),*/
      'alphanumeric' => array(
        'rule'     => array('custom', '/^[a-z\d]*$/i'),
 //       'required' => true,
        'message'  => '半角英数字を入力してください',
      ),
      'between' => array(
        'rule'    => array('between', 1, 15), 
        'message' => '15文字までにしてください',
      ),
    ),
    
    'mail'     => array(
      'between' => array(
        'rule'    => array('between', 5, 50), 
        'message' => '5文字から50文字までにしてください',
      ),
      'isMail' => array(
        'rule'    => 'email',
        'message' => '有効なメールアドレスを入力してください。'
      ),
    ),

    'password' => array(
      'alphanumeric' => array(
        'rule'     => array('custom', '/^[a-z\d]*$/i'),
 //       'required' => true,
        'message' => '半角英数字を入力してください'
      ),
      'between' => array(
        'rule'    => array('between', 4, 15), 
        'message' => '4文字から15文字までを入力してください',
      ),

    ),
    'account'  => array(
      'rule'    => array('between', 0, 200),
      'message' => array('文字数が多すぎます。２００以内に'),
    ),
  );

  public function find($type, $options = array()) {
    switch($type) {
      case 'add':
        //exit("aaaa");
        return parent::find('find', array_merge(
          array(
            //'fields' => array('id', 'name', 'mail'), 
          ),
          $options
          )
        );
      case 'name':
        return parent::find('count', array_merge(
          array(
            'conditions' => array(
            '`User`.`name`'     => $this->data['User']['name'],
          )
          ),
          $options
          )
        );
      case 'mail':
        return parent::find('count', array_merge(
          array(
            'conditions' => array(
            '`User`.`mail`'     => $this->data['User']['mail'],
          )
          ),
          $options
          )
        );
      default:
        //find('all', $options);みたいな呼び方するから動く気がする
        return parent::find($type, $options);
    } 
  }
}
