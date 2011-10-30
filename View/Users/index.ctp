<section class="posts-index">
  <div class="page-header">
    <h1>新着ユーザー
      <small>
        新しく登録したユーザーの一覧です。
      </small>
    </h1>
  </div>
  <ul class="tabs">
    <li><a href="/">投稿一覧</a></li>
    <li class="active"><a href="/users/">新着ユーザー</a></li>
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
      foreach($users as $user)
      {
      ?>
      <div class="userBox">
        <div class="userImg">
          <img src="/img/prof.gif" alt="prof-img" width="72" height="72" />      
        </div>
        <div class="userName">
          <?php
            echo $this->Html->link("".h($user['User']['name'])."", "/posts/user/".$user['User']['id']."");
          ?>
        </div>
      </div>
        <br class="clear" />
      <?php
      }
      ?>
    </div>
    <div class="dashboard">
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
  </div>
  <?php
  //echo $paginator->numbers();
  //pr($paginator);
  ?>
</section>
