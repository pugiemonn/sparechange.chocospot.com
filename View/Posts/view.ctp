  <ul>
    <li>
      <?php echo $this->Html->link("欲しい額を投稿する", "/posts/add", array('class' => 'btn primary'));?>
    </li>
  </ul>
<!--
  <br />
  <ul class="tabs">
    <li><a href="/">投稿一覧</a></li>
    <li><a href="/users/">新着ユーザー</a></li>
  </ul>-->
  <br class="clear" />
<?php
foreach($post_list as $post) {
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
?>
