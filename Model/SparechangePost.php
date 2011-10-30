<?php
App::uses('AppModel', 'Model');
/**
 * SparechangePost Model
 *
 */
class SparechangePost extends AppModel {

  var $name     = 'SparechangePost';
  public $order = 'SparechangePost.id DESC';  


  var $validate = array(
    'user_id' => 'notEmpty',
    'comment' => array(
      'isEmpty' => array(
        'rule'    => 'notEmpty',
        'message' => 'コメントを入力してください',
      ),
      'between' => array(
        'rule'    => array('between', 1, 140),
        'message' => '1文字以上140文字以下のコメントを入力してください',
      )
    ),
    'cost'    => array(
      'empty' => array(
        'rule'    => 'notEmpty',
        'last'   => true,
        'message' => 'このフィールドは必ず入力してください。', 
      ),
      //数値形式の判定
      'numeric' => array(
        //'rule'     => 'numeric',
        'rule'     => '/^\d+$/',
        'last'   => true,
        //'required' => true,
        'message'  => '数字をいれてください',
      ),

      //500円から10万円まで
      'range' => array(
        //'rule'    => array('custom', '/\d{3,5}/'),
        'rule' => array('range', 99.5, 100000.1),
        'message' => '100以上100000未満の自然数を半角で入力してください'
      ),

    )
  );

  public $hasMany = array(
    'SparechnageComment' => array(
      'className'  => 'SparechangeComment',
      'foreignKey' => 'sparechange_post_id',
      'limit'      => '10',
    ),
  );

  public $belongsTo = array(
    'User' => array(
      'className'  => 'User',
      'foreignKey' => 'user_id',
      'conditions' => '',
      'fields'     => '',
      'order'      => '',
    ),
  );

  //カスタムfind
  public function find($type, $options = array()) {
    switch($type) {
      case 'index':
      case 'user' :
      case 'view' :
        return parent::find('all', array_merge(
          array(
            'fields'     => array('`SparechangePost`.`id`', '`SparechangePost`.`cost`', '`SparechangePost`.`comment`', '`SparechangePost`.`user_id`', '`SparechangePost`.`created`', '`User`.`name`'),
            'joins'      => array(
              array(
                'type'       => 'LEFT',
                'table'      => '`users`',
                'alias'      => 'User',
                'conditions' => '`User`.`id`=`SparechangePost`.`user_id`',
              )
            ),
            //Limitはコントローラから渡すことにした
          ),
          $options
          )
        );
      default:
        return parent::find($type, $options);
    }
  }

  function findUserTotalAmount($id=1)
  {
    $options = array(
      'conditions' => array('`SparechangePost`.`user_id`' => $id),
      'fields'     => array(
        '`SparechangePost`.`user_id`',
        'SUM(`SparechangePost`.`cost`) AS `cost`',
      ),
      'group' => array('`SparechangePost`.`user_id`'),
    );
    return $this->find('all', $options);
  }

  function findUserPostCount($id=1)
  {
  }

}
