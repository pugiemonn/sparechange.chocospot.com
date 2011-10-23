<section id="users-add">
  <div class="page-header">
    <h1>新規登録
      <small>
        ユーザー登録を行います。
      </small>
    </h1>
  </div>
<?php
echo $this->Form->create('User');
echo $this->Html->div(''. $this->Form->error('User.name') || isset($nameOverlap) ? "clearfix error" : "clearfix" .'', null, array());
echo $this->Form->input('name',
  array(
    'class' => 'xlarge',
    //divを非表示
    'div'   => false,
  )
);
if(isset($nameOverlap) && $nameOverlap === true)
{
  echo '<div class="error-message">名前が重複しています。</div>';
}
echo '</div>';
//User.mailと$mailOverlapのときにerrorとして表示する
echo $this->Html->div(''. $this->Form->error('User.mail') || isset($mailOverlap) ? "clearfix error" : "clearfix" .'', null, array());
echo $this->Form->input('mail', array(
  'type'  => 'text',
  //'label' => true,
  'class' => 'xlarge',
  //divを非表示
  'div'   => false,
  )
);
if(isset($mailOverlap) && $mailOverlap === true)
{
  echo '<div class="error-message">メールアドレスが重複しています。</div>';
}
echo '</div>';
echo $this->Form->input('password',
  array(
    'class' => 'xlarge',
    'div'   => array(
      'class' => 'clearfix'
    )
  )
);
echo $this->Form->end(
  array(
    'type'  => 'submit',
    'class' => 'btn primary',
    'div'   =>
      array(
        'class' => 'actions',
      )
  )
);

?>
</section>
