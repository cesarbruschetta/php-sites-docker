<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<title><?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) { single_cat_title(); echo ' - ' ; bloginfo('name'); }
 elseif (is_single() ) { single_post_title(); }
 elseif (is_page() ) { bloginfo('name'); echo ': '; single_post_title(); }
 else { wp_title('',true); } ?></title>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/script.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie6.css" type="text/css" media="screen" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" /> 

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17278922-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<META NAME="AUTHOR" CONTENT="Cesar Augusto">

<meta name="description" content="Trabalhamos com serviços especializados na areas de TI, com consertos de PC, montagems de PC, criação e hospedagem de sites, configuração de rede, e-mail marketing, entre outros serviçoes." />

<meta name="keywords" content="Cab, informatica, cab informatica, TI, Serviços, sites, servidor, Active Directory, email, marcketing, Newsletter, computadores, hardware, sottware, windows, linux, conserto de computadores, montagem de computadores, configuração de computadores, rede, wi-fi, wireless, configuração de servidores, montagem de servidores, criação de sites, webpages, atualização de sites, hospedagem, registro de domineos, envio de e-mail, criação de e-mal marketing, em santo andre, abc, grande são paulo, são paulo" />

<meta name="google-site-verification" content="d1THKUU6R5l-jOdKrpYoJ6Dc51TcuyIFx-qykKq5Ov8" />

<link rel="shortcut icon" href= "imagens/favicon.ico" />

<?php wp_head(); ?>
</head>
<body>
    <div class="PageBackgroundGradient"></div>
<div class="PageBackgroundGlare">
    <div class="PageBackgroundGlareImage"></div>
</div>
<div class="Main">
<div class="Sheet">
    <div class="Sheet-tl"></div>
    <div class="Sheet-tr"><div></div></div>
    <div class="Sheet-bl"><div></div></div>
    <div class="Sheet-br"><div></div></div>
    <div class="Sheet-tc"><div></div></div>
    <div class="Sheet-bc"><div></div></div>
    <div class="Sheet-cl"><div></div></div>
    <div class="Sheet-cr"><div></div></div>
    <div class="Sheet-cc"></div>
    <div class="Sheet-body">
<div class="Header">
    <div class="Header-jpeg">

       <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="888" height="200">
          <param name="movie" value="/Sites/Cab_Inf_New/imagens/banner.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <!-- Esta tag param solicita que os usuários com o Flash Player 6.0 r65 e versões posteriores baixem a versão mais recente do Flash Player. Exclua-o se você não deseja que os usuários vejam o prompt. -->
          <param name="expressinstall" value="/Sites/Cab_Inf_New/Scripts/expressInstall.swf" />
          <!-- A tag object a seguir aplica-se a navegadores que não sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="/Sites/Cab_Inf_New/imagens/banner.swf" width="888" height="200">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <param name="expressinstall" value="/Sites/Cab_Inf_New/Scripts/expressInstall.swf" />
            <!-- O navegador exibe o seguinte conteúdo alternativo para usuários que tenham o Flash Player 6.0 e versões anteriores. -->
            <div>
              <h4>O conte&uacute;do desta p&aacute;gina requer uma vers&atilde;o mais recente do Adobe Flash Player.</h4>
              <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter Adobe Flash player" width="112" height="33" /></a></p>
            </div>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
        </object>

    </div>
<div class="logo">
    <h1 id="name-text" class="logo-name">
       <!-- <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>--> </h1>
    <div id="slogan-text" class="logo-text">
        <?php bloginfo('description'); ?></div>
</div>

</div>
<div class="nav">
    <?php wp30_menu(); ?>
    <div class="l">
    </div>
    <div class="r">
        <div>
        </div>
    </div>
</div>
