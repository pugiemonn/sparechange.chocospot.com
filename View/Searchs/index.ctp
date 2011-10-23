<section class="searchs-index">
  <div class="page-header">
    <h1>検索
      <small>
        <?php echo h($this->params['url']['keyword']); ?>の検索結果 
      </small>
    </h1>
  </div>
  <ul class="breadcrumb">
    <li><a href="/">ホーム</a> <span class="divider">></span></li>
    <li class="active">検索：<?php echo h($this->params['url']['keyword']); ?></li>
  </ul>
  <ul class="tabs">
    <li class="active"><a href="/">投稿一覧</a></li>
    <li class="active"><a href="/users/">新着ユーザー</a></li>
  </ul>
  <ul>
    <li>
      <?php echo $this->Html->link("欲しい額を投稿する", "/posts/add", array('class' => 'btn primary'));?>
    </li>
  </ul>
  <br />
  <?php
  if(count($search_lists) > 0)
  {
    //検索結果がある場合
    foreach ($search_lists as $post)
    {
  ?>
  <div class="posts">
    <div class="postBox">
      <div class="postCost">
        <p><?php echo h(number_format($post['SparechangePost']['cost'])); ?><span>円</span></p>
        <p class="kaomoji">( ﾟдﾟ)ﾎｽｨ…</p>
      </div>
      <div class="postText">
        <ul>
          <li>
            <?php echo $this->Html->link("".h($post['User']['name'])."", "/posts/user/".$post['SparechangePost']['user_id'].""); ?>
          </li>
        </ul>
        <p><?php echo h($post['SparechangePost']['comment']); ?></p>
        <ul>
          <!--
          <li>
            <a href="#">コメントする</a>
          </li>
          -->
          <li>
            <?php echo $this->Html->link("".h($post['SparechangePost']['created'])."", "/posts/view/".$post['SparechangePost']['id'].""); ?>
          </li>
        </ul>
      </div>
    </div>
    <br class="clear" />
  </div>
  <?php
    }
  }
  else
  {
    //検索結果が無い場合
    echo $this->Html->div('alert-message block-message info', null, array());
    echo $this->Html->tag('p');
    echo $this->Html->tag('strong','データは見つかりませんでした');
    echo $this->Html->tag('/p');
    echo $this->Html->tag('/div');
  }
  ?>
</section>
