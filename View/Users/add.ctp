<section id="users-add">
  <div class="page-header">
    <h1>新規登録
      <small>
        会員登録すると情報を投稿できます。<br />会員登録をすると<a href="http://chocospot.com/" target="_blank">chocospot.com</a>内の全てのサービスで利用可能なIDが発行されます。
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
echo $this->Form->submit('新規登録',
  array(
    //'type'  => 'submit',
    'class' => 'btn success',
    'div'   =>
      array(
        'class' => 'actions',
      )
  )
);
echo $this->Form->end();

?>
</section>
