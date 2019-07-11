<?php // $Id: page.tpl.php,v 1.1.2.1 2009/06/22 04:36:03 agileware Exp $ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $language->language; ?>" xml:lang="<?php echo $language->language; ?>">

  <head>
    <title><?php if (isset($head_title )) echo $head_title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <?php echo $head; ?>
    <?php echo $styles ?>
    <?php echo $scripts ?>
    <!--[if IE 6]><link rel="stylesheet" href="<?php echo $base_path . $directory; ?>/style.ie6.css" type="text/css" /><![endif]-->  
    <!--[if IE 7]><link rel="stylesheet" href="<?php echo $base_path . $directory; ?>/style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
  </head>

  <body>
    <div class="PageBackgroundGradient"></div>
    <div class="Main">
      <div class="Sheet">
        <div class="Sheet-cc"></div>
        <div class="Sheet-body">

          <div class="Header"><object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="920" 

height="200">
                  <param name="movie" value="themes/wilderness/images/banner.swf" />
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="6.0.65.0" />
                  <!-- Esta tag param solicita que os usu�rios com o Flash Player 6.0 r65 e 

vers�es posteriores baixem a vers�o mais recente do Flash Player. Exclua-o se voc� n�o deseja 

que os usu�rios vejam o prompt. -->
                  <param name="expressinstall" value="Scripts/expressInstall.swf" />
                  <!-- A tag object a seguir aplica-se a navegadores que n�o sejam o IE. 

Portanto, oculte-a do IE usando o IECC. -->
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" 

data="themes/wilderness/images/banner.swf" width="920" height="200">
                    <!--<![endif]-->
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="6.0.65.0" />
                    <param name="expressinstall" value="Scripts/expressInstall.swf" />
                    <!-- O navegador exibe o seguinte conte�do alternativo para usu�rios que 

tenham o Flash Player 6.0 e vers�es anteriores. -->
                    <div>
                      <h4>O conte&uacute;do desta p&aacute;gina requer uma vers&atilde;o mais 

recente do Adobe Flash Player.</h4>
                      <p><a href="http://www.adobe.com/go/getflashplayer"><img 

src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter 

Adobe Flash player" /></a></p>
                    </div>
                    <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
              </object>
            <div class="Header-jpeg"></div>
            <div class="logo">
              <?php if ($logo): ?>
                <a href="<?php echo $base_path ?>" title="<?php echo t('Home') ?>"><img src="<?php echo $logo ?>" alt="<?php echo t('Home') ?>" /></a>
              <?php endif; ?>
            </div>
          </div>

          <?php if ($navigation): ?>
            <div class="nav">
              <div class="l"></div>
              <div class="r"></div>
              <?php echo $navigation; ?>
            </div>
          <?php endif; ?>

          <div class="contentLayout">
            <?php if ($left) echo '<div class="sidebar1">' . $left . "</div>";
                  else if ($sidebar_left) echo '<div class="sidebar1">' . $sidebar_left . "</div>"; ?>
            <div class="<?php $l = NULL; if ($left) $l = 'left'; else if ($sidebar_left) $l = 'sidebar_left';
                              $r = NULL; if ($right) $r = 'right'; else if ($sidebar_right) $r = 'sidebar_right';
                              echo artxGetContentCellStyle($l, $r, $content); ?>">
              <div class="Post">
                <div class="Post-body">
                  <div class="Post-inner">
                    <div class="PostContent">
                      <?php if ($breadcrumb): echo theme('breadcrumb', $breadcrumb); endif; ?>
                      <?php if ($tabs): echo '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
                      <?php if ($title): echo '<h2 class="PostHeaderIcon-wrapper'. ($tabs ? ' with-tabs' : '') .'">'. $title .'</h2>'; endif; ?>
                      <?php if ($tabs): echo $tabs . '</div>'; endif; ?>
                      <?php if ($tabs2): echo '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
                      <?php if ($mission): echo '<div id="mission">' . $mission . '</div>'; endif; ?>
                      <?php if ($help): echo $help; endif; ?>
                      <?php if ($show_messages && $messages): echo $messages; endif; ?>
                      <?php echo art_content_replace($content); ?>
                    </div>
                    <div class="cleared"></div>
                  </div>
                </div>
              </div>
            </div>
            <?php if ($right) echo '<div class="sidebar2">' . $right . "</div>";
                  else if ($sidebar_right) echo '<div class="sidebar2">' . $sidebar_right . "</div>"; ?>
          </div>
          <div class="cleared"></div>

          <div class="Footer">
            <div class="Footer-inner">
              <a href="<?php $feedsUrls = array_keys(drupal_add_feed()); if (isset($feedsUrls[0]) && strlen($feedsUrls[0]) > 0) echo $feedsUrls[0]; ?>" class="rss-tag-icon" title="RSS"></a>
              <div class="Footer-text">
                <?php if ($footer) echo $footer; ?>
              </div>
            </div>
            <div class="Footer-background"></div>
          </div>

        </div>
      </div>
      <div class="cleared"></div>
      <p class="page-footer"><?php echo $footer_message; ?></p>
    </div>

    <?php print $closure; ?>
  </body>

</html>