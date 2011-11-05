<div class="topbar">
  <div class="topbar-inner">

    <div id="" class="container">
      <a href="/" class="brand">SpareChange</a> 
      <ul class="nav">
        <?php
          
          echo '<li>';
          echo $this->Html->link('ホーム', '/');
          echo '</li>';
          

          echo '<li>';
          echo $this->Html->link('サイトについて', '/supports');
          echo '</li>';

        ?>
        <?php
          //authがある場合
          //if(isset($auth)) {
          if($this->Session->read('auth')) {
            echo '<li>';
            echo $this->Html->link('マイ情報', '/posts/user/'.h($auth['id']).'');
            echo '</li>';
            /*
              //コントローラ、アクション、セッションをチェック
              if($this->params['controller'] === 'posts'  && $this->params['action'] === 'user' && $this->params['pass'][0] == $user_info['User']['id'])
              {
                //echo "&nbsp;";
                echo '<li>';
                echo $html->link('Edit', '/users/edit/');
                echo '</li>';
              }
            */
            echo '<li>';
            echo $this->Html->link('ログアウト', '/users/logout/');
            echo '</li>';
          }
          //authなし
          else
          {
            echo '<li>';
            echo $this->Html->link('新規登録', '/users/add/');
            echo '</li>';
            echo '<li>';
            echo $this->Html->link('ログイン', '/users/login/');
            echo '</li>';
          }
        ?>
      </ul>
      <ul class="nav secondary-nav">
        <li class="">
          <?php
            echo $this->Form->create('Searchs', 
              array(
                'url'    => '/searchs/',
                'type'   => 'get',
                'class'  => 'pull-left',
              )
            );
            echo $this->Form->input('keyword', 
              array(
                'placeholder' => '検索',
                'label'       => false, 
                'div'         => false,
              )
            );
            echo $this->Form->end();
          ?>
        </li>
      </ul>
    </div>
  </div>
</div>
