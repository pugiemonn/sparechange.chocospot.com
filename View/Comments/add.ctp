<section class="posts-user">
  <div class="page-header">
    <h1>コメント
      <small>
        コメントを投稿します。
      </small>
    </h1>
  </div>
<?php
echo $this->Form->create('SparechangeComment');
echo $this->Form->hidden('user_id', array('value' => '2'));
echo $this->Form->hidden('sparechange_post_id', array('value' => '77'));
/*
echo $this->Html->div(''. $this->Form->error('SparechangeComment.cost') ? "clearfix error" : "clearfix" .'', null, array());
echo $this->Form->input('cost', 
  array(
    'label' => '金額(300~10万円)',
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
*/
echo $this->Html->div(''. $this->Form->error('SparechangeComment.comment') ? "clearfix error" : "clearfix" .'', null, array());
echo $this->Form->input('comment', 
  array(
    'label' => 'コメント',
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
