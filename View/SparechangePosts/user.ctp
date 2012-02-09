<section class="posts-user">
  <div class="page-header">
    <h1><?php echo h($user_info['User']['name']); ?>
      <small>
        の情報です。
      </small>
      <a href="http://b.hatena.ne.jp/entry/http://sparechange.chocospot.com/posts/user/<?php echo isset($user_info['User']['id']) ? h($user_info['User']['id']) : '0' ; ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php echo h($title_for_layout); ?>" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
      <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-url="http://sparechange.chocospot.com/posts/user/<?php echo isset($user_info['User']['id']) ? h($user_info['User']['id']) : '0' ; ?>" data-text="<?php echo h($title_for_layout); ?>" data-via="" data-lang="ja">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
      <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsparechange.chocospot.com%2Fposts%2Fuser%2F<?php echo isset($user_info['User']['id']) ? h($user_info['User']['id']) : '0' ; ?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21&amp;appId=246206798731170" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
    </h1>
  </div>
<div class="profileInfo">
  <div class="profileImg">
    <img src="/img/prof.gif" alt="prof-img" width="96" height="96" />
  </div>
  <div class="profileDetails">
    <div class="profileAccount">
      <h3>口座情報
        <small>
          <?php
            if(isset($this->params['pass'][0]) && $this->params['controller'] === 'posts'  && $this->params['action'] === 'user' && $this->params['pass'][0] == $auth['id'])
            { 
              echo $this->Html->link('編集>>', '/users/edit/');
            }
          ?>
        </small>
      </h3>
      <p><?php echo h($user_info['User']['account']); ?>
    </div>
  </div>
  <br class="clear" />
</div>
<div class="row show-grid" title="Default three column layout">
  <div class="span7">
    <h3>欲しがっている金額合計</h3> 
    <span class="user-info-num"><?php echo h(number_format($user_data['amount'])); ?></span><span class="user-info-chara">円</span> 
  </div>
  <div class="span4">
    <h3>投稿数</h3>
    <span class="user-info-num"><?php echo h(number_format($user_data['count'])); ?></span><span class="user-info-chara">件</span>
  </div>
  <div class="span5">
    <h3>平均金額 </h3>
    <span class="user-info-num"><?php echo h(number_format($user_data['average'])); ?></span><span class="user-info-chara">円</span>
  </div>
</div>
<div class="btnArea">
    <?php echo $this->Html->link("欲しい額を投稿する", "/posts/add",array('class' => 'btn primary'));?>
</div>
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
?>
</section>
