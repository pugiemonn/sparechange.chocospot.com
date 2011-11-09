<section class="posts-view">
  <ul class="tabs">
    <li class="active"><a href="/">投稿一覧</a></li>
    <li class="active"><a href="/users/">新着ユーザー</a></li>
  </ul>
  <br class="clear" />  
  <ul>
    <li>
      <?php echo $this->Html->link("欲しい額を投稿する", "/posts/add", array('class' => 'btn primary'));?>
    </li>
  </ul>
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
  <div class="posts-comment">
    <?php
      //echo $this->Form->create('Comment');
    ?>
  </div>
  <div class="comments">
    <h3>どう思いますか？</h3>
    <?php
      echo $this->Form->create('Comment',
        array(
          'url' => '/comments/add'
        )
      );
      echo $this->Form->input('user_id',
        array(
          'type'  => 'hidden',
          'value' => h($auth['id']), 
        )
      );
      echo $this->Form->input('sparechange_post_id',
        array(
          'type'  => 'hidden',
          'value' => h($this->request->params['pass'][0]), 
        )
      );
      echo $this->Form->input('comment', 
        array(
          'label' => false,
          'div'   => false,
        )
      );
      echo $this->Form->submit('コメントする',
        array(
          'class' => 'btn',
          'div'   => array(
            'class' => ''
          ),
        )
      );
      echo $this->Form->end();
    ?>
    <?php
      //foreach($post_list[0]['SparechnageComment'] as $comment)
      foreach($comment_list as $comment)
      {
    ?>
    <div class="row">
      <div class="comments-profile-img">
      <?php 
        echo $this->Html->image('/img/prof.gif', array('url' => '/posts/user/'.h($comment['User']['id']), 'class' => 'thumbnail', 'alt' => 'name', 'width' => '60', 'height' => '60'));
      ?>
      </div>
      <div class="comments-text">
        <?php //echo $this->Html->link($comment['user_id'], '/'); ?>
        <?php echo $this->Html->link(h($comment['User']['name']), '/posts/user/'.h($comment['User']['id'])); ?>
        <p><?php echo h($comment['SparechangeComment']['comment']); ?></p>
        <ul>
          <li>
            <span>2011-10-21 21:59:30</span>
          </li>
        </ul>
      </div>
      <br class="clearfix">
    </div>
    <?php
      }
    ?>
  </div>
</section>
