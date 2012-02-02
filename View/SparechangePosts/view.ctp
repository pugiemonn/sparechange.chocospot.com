<section class="posts-view">
  <ul class="tabs">
    <li class="active"><a href="/">投稿一覧</a></li>
    <li class="active"><a href="/users/">新着ユーザー</a></li>
  </ul>
  <br class="clear" />  
  <ul>
    <li>
      <?php //echo $this->Html->link("欲しい額を投稿する", "/posts/add", array('class' => 'btn primary'));?>
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
          <li>
          <?php //echo $this->Html->link("".h($post['SparechangePost']['created'])."", "/posts/view/".$post['SparechangePost']['id'].""); ?>
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
  <div class="posts-comment">
    <?php
      //echo $this->Form->create('Comment');
    ?>
  </div>
  <div class="comments">
<!--
    <h3>どう思いますか？</h3>
    <?php
      echo $this->Form->create('Comment',
        array(
          'url'  => '/comments/add',
          'type' => 'get',
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
          'id'    => 'comment',
          'label' => false,
          'div'   => false,
          'placeholder' => 'コメント'
        )
      );
      echo '<br />';
      echo $this->Form->button('コメントする',
        array(
          'id'    => 'submit',
          //'type'  => 'btn',
          'class' => 'btn',
          'div'   => false,
          'style' => 'margin-top:2px;',
          /*
          'div'   => array(
            'class' => ''
          ),
          */
        )
      );
      echo "&nbsp;&nbsp;";
      if(!isset($auth))
      {
        echo $this->Html->tag("span", "(コメントには".$this->Html->link('ログイン', '/users/login/')."が必要です)");
      }
      echo $this->Form->end();
    ?>
    <script type="text/javascript">
      //<![CDATA[
      $("#submit").bind("click", function (event) {
        var str = $('#comment').val();
        $('#comment').val("");
        //$.ajax({dataType:"html", success:function (data, textStatus) {$("#hoge").animate({height: "100%", opacity: "1.0"},"slow").after(data);}, sync:true, type:"get", url:"\/comments\/add\/comment:" + str + "\/user_id:<?php echo h($auth['id']); ?>\/sparechange_post_id:<?php echo h($this->request->params['pass'][0]); ?>"});
        $.ajax({dataType:"html", success:function (data, textStatus) {$("#hoge").after(data).fadeIn('slow');}, sync:true, type:"get", url:"\/comments\/add\/comment:" + str + "\/user_id:<?php echo h($auth['id']); ?>\/sparechange_post_id:<?php echo h($this->request->params['pass'][0]); ?>"});
        //alert(str + "aa");
        return false;
      });
      //]]>
    </script>  
    
   -->
    <?php
      //echo $this->Form->end();
/*
      $this->Js->get('#btn');
         $request = $this->Js->request(
          array(
            'action' => 'add_test',
            'controller' => 'comments',
            'asin'   => 'hugahuga',  
            //'asin' => ''.$result->Items->Item->ASIN.''
            #'action' => 'index',
            #'controller' => 'hoge'
          ),
          array(
            //'method' => 'get',
            'method' => 'POST',
            'sync' => true,
            'update' => '#hoge',
            //'type' => 'html',
            //'success' => "alert('get data!!!');"
          )
        );


      $this->Js->event('click',$request);
      echo $this->Js->writeBuffer();
*/
    ?>
    <div id="hoge"><!--hoge--></div>
    <?php
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
