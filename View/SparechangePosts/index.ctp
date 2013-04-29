<section class="posts-index">
  <div class="page-header">
    <h1>投稿一覧
      <small>
        お金を欲しがっている投稿の一覧です。
      </small>
    </h1>
  </div>
  <ul class="tabs">
    <li class="active"><a href="/">投稿一覧</a></li>
    <li><a href="/users/">新着ユーザー</a></li>
  </ul>
  <br class="clear" />
  <ul>
    <li>
      <?php echo $this->Html->link("欲しい額を投稿する", "/posts/add", array('class' => 'btn primary'));?>
    </li>
  </ul>
  <br />
  <div>
    <div class="main-content">
      <?php
        foreach($post_list as $post) {
        //foreach($data as $post) {
      ?>
      <div class="posts">
        <div class="postBox">
          <div class="postCost">
<!--
            <p><?php echo h(number_format($post['SparechangePost']['cost'])); ?><span>円</span></p>
            <p class="kaomoji">( ﾟдﾟ)ﾎｽｨ…</p>
-->
            <p><a href="<?php echo '/posts/view/'.$post['SparechangePost']['id']; ?>" class="amount-of-money-this-person-needs"><?php echo h(number_format($post['SparechangePost']['cost'])); ?><span>円</span><br /><span class="kaomoji" style="font-size:16px;">( ﾟдﾟ)ﾎｽｨ…</span></a></p>
          </div>
          <div class="postText">
            <ul>
              <li>
                <?php echo $this->Html->link("".h($post['User']['name'])."", "/posts/user/".$post['SparechangePost']['user_id'].""); ?>
              </li>
            </ul>
            <p><?php echo h($post['SparechangePost']['comment']); ?></p>
            <ul>
              <li>
                <?php echo h($post['SparechangePost']['created']); ?>
              </li>
              <li>
                <?php echo $this->Html->link('コメント('.count($post['SparechnageComment']).')', '/posts/view/'.$post['SparechangePost']['id'], ''); ?>
              </li>
            </ul>
          </div>
        </div>
        <br class="clear" />
      </div>
      <?php
        }
        unset($post_list);
        unset($post);
      ?>
      <div class="pagination">
        <ul>
          <?php
            echo $this->Paginator->prev('← '.__('前', true), array('class'=>'prev', 'tag' => 'li'), "← 前", array('class'=>'prev disabled', 'tag' => 'li'));
            
            echo $this->Paginator->numbers(
              array(
                'separator' => false,
                'class'     => '',
                'tag'       => 'li',
              ) 
            );
            
            //echo $this->Paginator->next(__('次', true).' →', array('class'=>'next', 'tag' => 'li'), "次 →", array('class'=>'next disabled', 'tag' => 'li'));
                //echo $this->Paginator->next();
                //echo $this->Paginator->numbers(true);
                //echo $data->Paginator->counter();
          ?>
        </ul>
      </div>
    </div>
    <!-- 右カラム -->
    <div class="dashboard">
      <div class="alert-message block-message info">
        <script type="text/javascript"><!--
          google_ad_client = "ca-pub-7988499766243110";
          /* chocospotレクタングル */
          google_ad_slot = "9761195105";
          google_ad_width = 300;
          google_ad_height = 250;
          //-->
        </script>
        <script type="text/javascript"
          src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
      </div>
      <div>
        <h3>開発ブログ</h3>
        <?php foreach($blogs as $blog) { ?>
          <div>
            <p><?php echo $this->Html->link(h($blog['Blog']['title']), 'http://www.chocospot.com/blogs/articles/'.h($blog['Blog']['id'])); ?></p>
            <p><?php echo h($blog['Blog']['created']) ?></p>
          </div>
        <?php } ?>
        <p class="text-right"><a href="http://www.chocospot.com/blogs/">>> もっとみる</a></p>
      </div>
    </div>
    <!-- /右カラム -->
  </div>
</section>
