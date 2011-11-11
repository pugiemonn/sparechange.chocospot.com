<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset('utf-8'); ?>
    <title>
        <?php //__('CakePHP: the rapid development php framework:'); ?>
        <?php echo h($title_for_layout); ?>
    </title>
    <?php
        echo $this->Html->meta('icon');
        //echo $this->Html->css(array('cake.generic', 'sparechange'));
        echo $this->Html->css(array('sparechange', 'bootstrap'));
        echo $this->Html->script(array('jquery.min.js'));
        echo $scripts_for_layout;
    ?>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2157335-16']);
  _gaq.push(['_setDomainName', '.chocospot.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<div id="">
  <?php //echo $this->Session->flash(); ?>
  <?php echo $this->element('topBar'); ?>
  <?php echo $this->element('header'); ?>
  <div class="container">
    <div id="main">
      <?php echo $content_for_layout; ?>
    </div>
    <!--
    <div id="footer" class="mini-layout">
      footer
    </div>
    -->
  </div>
        <!--
        <div id="">
            <?php echo $this->Html->link(
                    $this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
                    'http://www.cakephp.org/',
                    array('target' => '_blank', 'escape' => false)
                );
            ?>
        </div>-->
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
