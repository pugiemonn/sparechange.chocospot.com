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
  //echo $this->Html->link("test", "/");
?>
