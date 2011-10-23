<section class="users-edit">
  <div class="page-header">
    <h1>編集
      <small>
        口座情報を登録すれば、運よくお金が振り込まれるかもしれません。
      </small>
    </h1>
  </div>
<?php
echo $this->Form->create('User', array('action' => 'edit'));
echo $this->Form->hidden('id');
echo $this->Form->input('account', array(
    'label' => '銀行口座',
    'div'   => array(
      'class' => 'clearfix',
    ),
  )
);
echo $this->Form->submit('更新', 
  array(
    'class' => 'btn primary',
    'div'   => array(
      'class' => 'clearfix actions'
    ),
  )
);
echo $this->Form->end();
?>
</section>
