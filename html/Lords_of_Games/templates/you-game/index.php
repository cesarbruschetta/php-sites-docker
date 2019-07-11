<?php
/*======================================================================*\
|| #################################################################### ||
|| # Youjoomla LLC - YJ- Licence Number 211GG766
|| # Licensed to - Ricardo Garcia Zama
|| # ---------------------------------------------------------------- # ||
|| # Copyright ©2006-2009 Youjoomla LLC. All Rights Reserved.           ||
|| # This file may not be redistributed in whole or significant part. # ||
|| # ---------------- THIS IS NOT FREE SOFTWARE ---------------- #      ||
|| # http://www.youjoomla.com | http://www.youjoomla.com/license.html # ||
|| #        http://www.youjoomla.com/copyright_removall.html          # ||
|| #################################################################### ||
\*======================================================================*/


# EDITING NOTES :   ALL CODE BLOCKS ARE COMENTED , ALL PHP CONDITIONS BEFOR AND AFTER THE 
#  COMMENT ARE TO BE MOVED WITH THE BLOCK IF YOU ARE EDITING LAYOUTS
#  CSS MAIN LAYOUT IS IN LAYOUT.CSS  STARTING WITH 
# WIDTHS OF THE CODEBLOCKS ARE IN SETTINGS.PHP NAMED SAME AS DIVS USED

defined( '_JEXEC' ) or die( 'Restricted index access' );

define( 'TEMPLATEPATH', dirname(__FILE__) );
require( TEMPLATEPATH.DS."settings.php");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<META NAME="AUTHOR" CONTENT="Cesar Augusto">

<meta name="keywords" content="Lord, lords of games, of, games, jogos, detonados, videos, noticias, news, reweas, analise, previa, downlods, xbox, ps3, ps2, wii, pc, psp, tudo sobre games, game,  vicio, iso, save, games, consoles " />

<meta name="description" content="Lords Of Games, seu mais novo site de notias, downloads, analises, e te tudo um pouco sobre jogos de pc e consoles de ultima geração!!!!" />

<meta name="google-site-verification" content="rnO9zXYsAKZF8Nae_6JQWO7O3v_JdmgYwpbzBaAw8-k" />


<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>

<link href="<?php echo $yj_site ?>/css/template.<?php echo $cssextens; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $yj_site ?>/css/<?php echo $css_file; ?>.<?php echo $cssextens; ?>" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="<?php echo $yj_site ?>/favicon.ico" />
<?php require( TEMPLATEPATH.DS."head.php");?>

</head>

<body id="color">

    <div id="fullbg">
       <div id="footer_bg">


<div id="centertop" style="font-size:<?php echo $css_font; ?>; width:<?php echo $css_width; ?>;">

<!-- notices -->
<?php if ($ie6notice == 1){ ?>
<!--[if lte IE 6]>
<p class="clip" style="text-align:center" >Hello visitor.You are using IE6 , an outdated version of Internet Explorer. Please consider upgrading. Click <a href="http://www.webstandards.org/action/previous-campaigns/buc/" target="_blank" >here</a> for more info .</p>
<![endif]-->
<?php } ?>
<?php if($nonscript == 1 ){?>
        <noscript><p class="error" style="text-align:center" >This Joomla Template is equiped with JavaScript. Your browser does not support JavaScript! Please enable it for maximum experience. Thank you.</p></noscript>
        <?php } ?>
<!--end  notices -->


<!--header-->
<div id="header"><div id="hero" class="png"></div>
<div id="logo" class="png">

<div id="tags"><h1>
<a href="index.php" title="<?php echo $tags?>"><?php echo $seo ?></a>
</h1></div><!-- end tags -->

</div><!-- end logo -->

<?php if ($this->countModules('cpanel')) {?>
<div id="<?php echo $cpanel; ?>" style="width:<?php echo $cpanelwidth; ?>;">
<jdoc:include type="modules" name="cpanel" style="raw" />
</div><!-- end banner -->
<?php } ?>

</div><!-- end header -->


<!--top menu-->
<div id="<?php echo $topmenuclass ?>" style="font-size:<?php echo $css_font; ?>;">
  <div id="<?php echo $menuclass ?>">
	<?php echo $topmenu; ?>
</div>
</div><!-- end top menu -->

</div><!-- end centartop-->


<!-- BOTTOM PART OF THE SITE LAYOUT -->
<div id="centerbottom" style="font-size:<?php echo $css_font; ?>; width:<?php echo $css_width; ?>;">
<div id="<?php echo $wrap?>">
<div id="<?php echo $insidewrap ?>">

<?php if ($this->countModules('advert1')) {?>
<!-- advert 1-->
<div id="advert1">

<jdoc:include type="modules" name="advert1" style="yjsquare" />
</div>
<!-- end advert 1--><?php } ?>


<?php if ($this->countModules('user1') || $this->countModules('user2')) {?><!-- top mods -->
<div id="topmods">
<?php if ($this->countModules('user1')) {?>
<div id="user1" style="width:<?php echo $topswidth?>;"><div class="inside"><jdoc:include type="modules" name="user1" style="yjsquare" /></div></div><?php } ?>
<?php if ($this->countModules('user2')) {?>
<div id="user2" style="width:<?php echo $topswidth?>;"><div class="inside"><jdoc:include type="modules" name="user2" style="yjsquare" /></div></div><?php } ?>
</div><!-- end top mods --><?php } ?>



<!-- pathway -->

<?php if ($this->countModules('breadcrumb')) { ?> 
<div id="pathway">
You are here:&nbsp;&nbsp;<jdoc:include type="modules" name="breadcrumb" /></div>
<?php } ?>

<!-- end pathway -->



<!--MAIN LAYOUT HOLDER -->
<div id="holder">

<!-- messages -->
<jdoc:include type="message" />
<!-- end messages -->





<?php if ($this->countModules('left')) { ?>
<!-- left block -->
<div id="leftblock" style="width:<?php echo $leftblock ?>;">
<div class="inside">
<jdoc:include type="modules" name="left" style="yjsquare" />
</div>
</div>
<!-- end left block -->
<?php } ?>




<!-- MID BLOCK WITH TOP AND BOTTOM MODULE POSITION -->
<div id="midblock" style="width:<?php echo $midblock ?>;">
<div class="insidem">

<?php if ($this->countModules('top')) { ?>
<!-- top module-->
<div id="topmodule">
<jdoc:include type="modules" name="top" style="yjsquare" /> 
</div>
<!-- end top module-->
<?php } ?>

<!-- component -->
<jdoc:include type="component"  />
<!-- end component -->


<?php if ($this->countModules('bottom')) { ?>
<!-- bottom module position -->
<div id="bottommodule">
<jdoc:include type="modules" name="bottom" style="yjsquare" />
</div>
<!-- end module position -->
<?php } ?>


<?php if ($this->countModules('user3') || $this->countModules('user4')) {?><!-- user 3 4 -->
<div id="botmods">
<?php if ($this->countModules('user3')) {?>
<div id="user3" style="width:<?php echo $bottomswidth?>;"><div class="inside"><jdoc:include type="modules" name="user3" style="yjsquare" /></div></div><?php } ?>
<?php if ($this->countModules('user4')) {?>
<div id="user4" style="width:<?php echo $bottomswidth?>;"><div class="inside1"><jdoc:include type="modules" name="user4" style="yjsquare" /></div></div><?php } ?>
</div><!-- end user 3 4--><?php } ?>




</div><!-- end mid block insidem class -->
</div><!-- end mid block div -->
<!-- END MID BLOCK -->






<?php if ($this->countModules('right')) { ?>
<!-- right block -->
<div id="rightblock" style="width:<?php echo $rightblock ?>;">
<div class="inside">
<jdoc:include type="modules" name="right" style="yjsquare" />
</div>
</div>
<!-- end right block -->
<?php } ?>



</div><!-- end holder div -->
<!-- END BOTTOM PART OF THE SITE LAYOUT -->


<?php if ($this->countModules('user5') || $this->countModules('user6') || $this->countModules('user7')) {?><!-- user 5 6 7-->
<div id="bottom">
<?php if ($this->countModules('user5')) {?>
<div id="user5" style="width:<?php echo $bottomwidth?>;"><div class="inside1"><jdoc:include type="modules" name="user5" style="yjsquare" /></div></div><?php } ?>
<?php if ($this->countModules('user6')) {?>
<div id="user6" style="width:<?php echo $bottomwidth?>;"><div class="inside1"><jdoc:include type="modules" name="user6" style="yjsquare" /></div></div><?php } ?>
<?php if ($this->countModules('user7')) {?>
<div id="user7" style="width:<?php echo $bottomwidth?>;"><div class="inside1"><jdoc:include type="modules" name="user7" style="yjsquare" /></div></div><?php } ?>
</div><!-- end user 3 4--><?php } ?>




</div><!-- end of insidewrap-->
</div> <!--end of wrap-->
</div><!-- end centerbottom-->
</div><!-- end full bg -->

<!-- footer -->

<div id="footer"  style="font-size:<?php echo $css_font; ?>; width:<?php echo $css_width; ?>;">
<div id="youjoomla">

<?php if ($this->countModules('footer')) { ?>
<div id="footmod">
<jdoc:include type="modules" name="footer" style="raw" />
</div><?php } ?>

<?php
# FOR YOUJOOMLA LLC COPYRIGHT REMOVAL VISIT THIS PAGE 
# http://www.youjoomla.com/copyright_removall.html
?>
<div id="cp">
<?php echo getYJLINKS()  ?>
</div>

</div>
</div>

<!-- end footer -->

       
</div><!-- end footer bg -->
<div align="center">
<!-- Start 1FreeCounter.com code -->
    <script language="JavaScript">
  var data = '&r=' + escape(document.referrer)
	+ '&n=' + escape(navigator.userAgent)
	+ '&p=' + escape(navigator.userAgent)
	+ '&g=' + escape(document.location.href);

  if (navigator.userAgent.substring(0,1)>'3')
    data = data + '&sd=' + screen.colorDepth 
	+ '&sw=' + escape(screen.width+'x'+screen.height);

  document.write('<a href="http://www.1freecounter.com/stats.php?i=50672" target=\"_blank\" >');
  document.write('<img alt="Free Counter" border=0 hspace=0 '+'vspace=0 src="http://www.1freecounter.com/counter.php?i=50672' + data + '">');
  document.write('</a>');
  </script>
<!-- End 1FreeCounter.com code -->
<div>
</body>
</html>

