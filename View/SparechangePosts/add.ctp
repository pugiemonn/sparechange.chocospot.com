<section class="posts-user">
  <div class="page-header">
    <h1>投稿
      <small>
        欲しい金額と使い道を投稿します。
      </small>
    </h1>
  </div>
<?php
echo $this->Form->create('Post', 
  array(
/*
    'controller' => 'sparechage_posts',
    'action'     => 'add',
*/
  )
);
//echo $form->select('user_id', array('1' => 1), 1);
echo $this->Form->hidden('user_id', array('value' => ''.$auth_data["id"].''));
echo $this->Html->div(''. $this->Form->error('SparechangePost.cost') ? "clearfix error" : "clearfix" .'', null, array());
echo $this->Form->input('cost', 
  array(
    'label' => '金額(100~10万円)',
    'div'   => false,
  )
);
echo $this->Form->error('SparechangePost.cost',
  array(
  //  'div' => array(
  //    'class' => 'error',
  //  )
  )
);
echo '</div>';
echo $this->Html->div(''. $this->Form->error('SparechangePost.comment') ? "clearfix error" : "clearfix" .'', null, array());
echo $this->Form->input('comment', 
  array(
    'label' => 'お金の使い道',
    'class' => 'span10',
    'div'   => false,
  )
);
echo $this->Form->error('SparechangePost.comment');
echo '</div>';
echo $this->Html->tag('div', null,
  array(
    'class' => 'actions', 
  )
);
echo $this->Form->submit('投稿',
  array(
    'class' => 'btn primary',
    'div'   => false,
  )
);
echo '&nbsp;';
/*
echo $form->button('キャンセル',
  array(
    'type'  => 'reset',
    'class' => 'btn',
    'div'   => false,
  )
);
*/
echo "</div>";
echo $this->Form->end();
?>
</section>
