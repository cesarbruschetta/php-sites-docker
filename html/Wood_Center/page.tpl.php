<?php // $Id: page.tpl.php,v 1.1.2.1 2009/07/06 08:03:14 agileware Exp $ ?>
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
    <!--[if IE 8]><link rel="stylesheet" href="<?php echo $base_path . $directory; ?>/style.ie8.css" type="text/css" media="screen" /><![endif]-->
   <script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
   <meta name="google-site-verification" content="RJqoS1BGhUtzKP0vB8q5PLQxVajwN7sO_y1yLf0IqkI" />
   
</head>

  <body class="<?php echo $body_classes; ?>">
    <div class="PageBackgroundGlare">
      <div class="PageBackgroundGlareImage">
        <p>&nbsp;</p>
      </div>
    </div>
    <div class="Main">
      <div class="Sheet">
        <div class="Sheet-tl"></div>
        <div class="Sheet-tr"></div>
        <div class="Sheet-bl"></div>
        <div class="Sheet-br"></div>
        <div class="Sheet-tc"></div>
        <div class="Sheet-bc"></div>
        <div class="Sheet-cl"></div>
        <div class="Sheet-cr"></div>
        <div class="Sheet-cc"></div>
        <div class="Sheet-body">
          <div class="Header">
          <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="930" height="200">
                  <param name="movie" value="themes/wilderness/images/banner.swf" />
                  <param name="quality" value="high" />
                  <param name="wmode" value="opaque" />
                  <param name="swfversion" value="6.0.65.0" />
                  <!-- Esta tag param solicita que os usuários com o Flash Player 6.0 r65 e versões posteriores baixem a versão mais recente do Flash Player. Exclua-o se você não deseja que os usuários vejam o prompt. -->
                  <param name="expressinstall" value="Scripts/expressInstall.swf" />
                  <!-- A tag object a seguir aplica-se a navegadores que não sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
                  <!--[if !IE]>-->
                  <object type="application/x-shockwave-flash" data="themes/wilderness/images/banner.swf" width="930" height="200">
                    <!--<![endif]-->
                    <param name="quality" value="high" />
                    <param name="wmode" value="opaque" />
                    <param name="swfversion" value="6.0.65.0" />
                    <param name="expressinstall" value="Scripts/expressInstall.swf" />
                    <!-- O navegador exibe o seguinte conteúdo alternativo para usuários que tenham o Flash Player 6.0 e versões anteriores. -->
                    <div>
                      <h4>O conte&uacute;do desta p&aacute;gina requer uma vers&atilde;o mais recente do Adobe Flash Player.</h4>
                      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter Adobe Flash player" /></a></p>
                    </div>
                    <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
              </object>
            <div class="logo">
              <?php if ($logo): ?>
                <div id="logo">
                  <a href="<?php echo $base_path; ?>" title="<?php echo t('Home'); ?>"><img src="<?php echo $logo; ?>" alt="<?php echo t('Home'); ?>" /></a>
                </div>
                <?php endif; ?>
            </div>
            <?php if ($search_box): ?>
              <div id="search-box">
             <!-- <?php echo $search_box; ?> -->
              </div>
            <?php endif; ?>
          </div>
          <?php if (!empty($navigation)): ?>
            <div class="nav">
              <div class="l"></div>
              <div class="r"></div>
              <?php echo $navigation; ?>
            </div>
          <?php endif; ?>
          <div class="cleared"></div>
          <div class="contentLayout">
            <?php if ($left): ?>
              <div id="sidebar-left" class="sidebar">
                <?php echo $left ?>
              </div>
            <?php endif; ?>
            <div id="main">
              <div class="Post">
                <div class="Post-body">
                  <div class="Post-inner">
                    <div class="PostContent">
                      <?php if ($is_front): ?>
                        <div id="featured"></div>
                      <?php endif; ?>
                      <?php if (!empty($banner1)) echo $banner1; ?>
                      <?php if (!$is_front) echo $breadcrumb; ?>
                      <?php if (!empty($tabs)) echo $tabs . '<div class="cleared"></div>'; ?>
                      <?php if ($title): ?><h1 class="title"><?php echo $title; ?></h1><?php endif; ?>
                      <?php if (!empty($mission)) echo '<div id="mission">' . $mission . '</div>'; ?>
                      <?php if (!empty($help)) echo $help; ?>
                      <?php if (!empty($messages)) echo $messages; ?>
                      <?php echo $content; ?>
                      <?php if (!empty($content_bottom)) echo $content_bottom; ?>
                    </div>
                    <div class="cleared"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="cleared"></div>
          <div class="Footer">
            <div class="Footer-inner">
              <a href="<?php echo $base_url; ?>/rss.xml" class="rss-tag-icon" title="RSS"></a>
              <div class="Footer-text">
                <?php if (!empty($copyright)) echo $copyright; ?>
              </div>
            </div>
            <div class="Footer-background"></div>
          </div>
        </div>
      </div>
      <div class="cleared"></div>
      <p class="page-footer"><?php echo $footer_message; ?> <p id="sobre">&copy; 2009 <a href="sobre.html" target="popupwindow" onclick='window.open("sobre.html", "popupwindow", "scrollbars=yes,width=590,height=360");return true'>Cesar Augusto</a> - Todos os direitos reservados</p>
    <p id="sobre" > <!-- Start 1FreeCounter.com code -->
  
  <script language="JavaScript">
  var data = '&r=' + escape(document.referrer)
	+ '&n=' + escape(navigator.userAgent)
	+ '&p=' + escape(navigator.userAgent)
	+ '&g=' + escape(document.location.href);

  if (navigator.userAgent.substring(0,1)>'3')
    data = data + '&sd=' + screen.colorDepth 
	+ '&sw=' + escape(screen.width+'x'+screen.height);

  document.write('<a href="http://www.1freecounter.com/stats.php?i=52584" target=\"_blank\" >');
  document.write('<img alt="Free Counter" border=0 hspace=0 '+'vspace=0 src="http://www.1freecounter.com/counter.php?i=52584' + data + '">');
  document.write('</a>');
  </script>
<!-- End 1FreeCounter.com code --></p>
    </div>

    <?php echo $closure; ?>
  <script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
swfobject.registerObject("FlashID");
//-->
  </script>
  </body>
</html>