<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );
define( 'TEMPLATEPATH', dirname(__FILE__) );
require( TEMPLATEPATH.DS."suckerfish.php");
/*
-----------------------------------------
Game Vision - October 2007 Shape 5 Club Template
-----------------------------------------
Site:      www.shape5.com
Email:     contact@shape5.com
@license:  Copyrighted Commercial Software
@copyright (C) 2007 Shape 5

*/

// It is recommended that you do not edit below this line.
///////////////////////////////////////////////////////////////////////////////////////



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />

<?php


 $s5_color  = $this->params->get ("xml_s5_color"); 

 $s5_header_color = $this->params->get ("xml_s5_header_color");

 $s5_user1_color = $this->params->get ("xml_s5_user1_color");

 $s5_user2_color = $this->params->get ("xml_s5_user2_color");

 $s5_panel_color = $this->params->get ("xml_s5_panel_color");

 $s5_body_color = $this->params->get ("xml_s5_body_color");

 $s5_top_menu_color = $this->params->get ("xml_s5_top_menu_color");

 $s5_path_color = $this->params->get ("xml_s5_path_color");

 $s5_body_opacity = $this->params->get ("xml_s5_body_opacity");

 $s5_box_link = $this->params->get ("xml_s5_box_link");

 $s5_column_width = $this->params->get ("xml_s5_column_width");

 $s5_layout = $this->params->get ("xml_s5_layout");

 $s5_loader = $this->params->get ("xml_s5_loader");

 $s5_loading_text = $this->params->get ("xml_s5_loading_text");

 $s5_logo_height = $this->params->get ("xml_s5_logo_height");

 $s5_show_menu = $this->params->get ("xml_s5_show_menu");

 $s5_open_text = $this->params->get ("xml_s5_open_text");

 $s5_closed_text = $this->params->get ("xml_s5_closed_text"); 

 $s5_open_start = $this->params->get ("xml_s5_open_start");


$s5_body_width = 0;
$s5_banner_width = 0;
$s5_mainbody_width = 0;

if(!$this->countModules('left') && !$this->countModules('inset')) {
$s5_body_width = 936;
$s5_banner_width = 936;
$s5_mainbody_width = 936;
}

if($this->countModules('left') && !$this->countModules('inset')) {
$s5_body_width = 917 - $s5_column_width;
$s5_banner_width = 917 - $s5_column_width;
$s5_mainbody_width = 917 - $s5_column_width;
}

if(!$this->countModules('left') && $this->countModules('inset')) {
$s5_body_width = 936;
$s5_banner_width = 936;
$s5_mainbody_width = 722;
}

if($this->countModules('left') && $this->countModules('inset')) {
$s5_body_width = 917 - $s5_column_width;
$s5_banner_width = 917 - $s5_column_width;
$s5_mainbody_width = 913 - $s5_column_width - 210;
}   ?>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<?php
$br = strtolower($_SERVER['HTTP_USER_AGENT']); // what browser.
if(ereg("msie 6", $br)) {
$is_ie6 = "yes";
} 
else {
$is_ie6 = "no";
}
?>


<?php
$br = strtolower($_SERVER['HTTP_USER_AGENT']); // what browser.
if(ereg("msie 7", $br)) {
$is_ie7 = "yes";
} 
else {
$is_ie7 = "no";
}
?>


<meta http-equiv="Content-Type" content="text/html; <?php echo _ISO; ?>" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<link href="templates/<?php echo $this->template ?>/css/template_css.css" rel="stylesheet" type="text/css" media="screen" />

<link href="templates/<?php echo $this->template ?>/css/suckerfish.css" rel="stylesheet" type="text/css" media="screen" />

<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/lytebox.css" type="text/css" media="screen" />

<?php if ($is_ie6 == "yes") { ?>
<link href="templates/<?php echo $this->template ?>/css/ie6.css" rel="stylesheet" type="text/css" />
<?php } ?>

<?php if ($s5_show_menu == "yes") { ?>

<?php if ($is_ie6 == "yes") { ?>

<script language="javascript" type="text/javascript" src="templates/<?php echo $this->template ?>/js/s5_suckerfish.js"></script>

<?php } ?>

<?php } ?>

<script language="javascript" type="text/javascript" src="templates/<?php echo $this->template ?>/js/s5_effects.js"></script>

<script language="javascript" type="text/javascript" src="templates/<?php echo $this->template ?>/js/s5_cookies.js"></script>

<script type="text/javascript" language="javascript" src="templates/<?php echo $this->template ?>/js/lytebox.js"></script>

<?php

$menu_name = $this->params->get ("xml_menuname");

if ($this->countModules("advert1") && $this->countModules("advert2")) { $ad1="49.9%"; }
else if (!$this->countModules("advert1") && $this->countModules("advert2")) { $ad1="100%"; }
else if ($this->countModules("advert1") && !$this->countModules("advert2")) { $ad1="100%"; }

if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6")) { $row1="210px"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6")) { $row1="285px"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6")) { $row1="285px"; }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6")) { $row1="285px"; }
else if ($this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6")) { $row1="285px"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && $this->countModules("user6")) { $row1="436px"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6")) { $row1="436px"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6")) { $row1="436px"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6")) { $row1="436px"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6")) { $row1="436px"; }
else if ($this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6")) { $row1="436px"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && $this->countModules("user6")) { $row1="100%"; }
else if (!$this->countModules("user3") && $this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6")) { $row1="100%"; }
else if (!$this->countModules("user3") && !$this->countModules("user4") && $this->countModules("user5") && !$this->countModules("user6")) { $row1="100%"; }
else if ($this->countModules("user3") && !$this->countModules("user4") && !$this->countModules("user5") && !$this->countModules("user6")) { $row1="100%"; }

if ($this->countModules("user7") && $this->countModules("user8") && $this->countModules("user9") && $this->countModules("advert3")) { $row2="210px"; }
else if (!$this->countModules("user7") && $this->countModules("user8") && $this->countModules("user9") && $this->countModules("advert3")) { $row2="285px"; }
else if ($this->countModules("user7") && !$this->countModules("user8") && $this->countModules("user9") && $this->countModules("advert3")) { $row2="285px"; }
else if ($this->countModules("user7") && $this->countModules("user8") && !$this->countModules("user9") && $this->countModules("advert3")) { $row2="285px"; }
else if ($this->countModules("user7") && $this->countModules("user8") && $this->countModules("user9") && !$this->countModules("advert3")) { $row2="285px"; }
else if (!$this->countModules("user7") && !$this->countModules("user8") && $this->countModules("user9") && $this->countModules("advert3")) { $row2="436px"; }
else if (!$this->countModules("user7") && $this->countModules("user8") && !$this->countModules("user9") && $this->countModules("advert3")) { $row2="436px"; }
else if (!$this->countModules("user7") && $this->countModules("user8") && $this->countModules("user9") && !$this->countModules("advert3")) { $row2="436px"; }
else if ($this->countModules("user7") && !$this->countModules("user8") && !$this->countModules("user9") && $this->countModules("advert3")) { $row2="436px"; }
else if ($this->countModules("user7") && !$this->countModules("user8") && $this->countModules("user9") && !$this->countModules("advert3")) { $row2="436px"; }
else if ($this->countModules("user7") && $this->countModules("user8") && !$this->countModules("user9") && !$this->countModules("advert3")) { $row2="436px"; }
else if (!$this->countModules("user7") && !$this->countModules("user8") && !$this->countModules("user9") && $this->countModules("advert3")) { $row2="100%"; }
else if (!$this->countModules("user7") && $this->countModules("user8") && !$this->countModules("user9") && !$this->countModules("advert3")) { $row2="100%"; }
else if (!$this->countModules("user7") && !$this->countModules("user8") && $this->countModules("user9") && !$this->countModules("advert3")) { $row2="100%"; }
else if ($this->countModules("user7") && !$this->countModules("user8") && !$this->countModules("user9") && !$this->countModules("advert3")) { $row2="100%"; }


?>

<?php if ( $my->id ) { initEditor(); } ?>

<style type="text/css"> 

#s5_panel_inner div.moduletable h3, #s5_panel_inner div.moduletable, #s5_panel_inner div.moduletable a {
    color:#<?php echo $s5_panel_color ?>;
}

#s5_search, #s5_search .inputbox {
    color:#<?php echo $s5_header_color ?>;
}

.bold_custom { 
    border-bottom: 1px solid #<?php echo $s5_color; ?>; 
    border-top: 1px solid #<?php echo $s5_color; ?>;
    color: #<?php echo $s5_color; ?>;
}

.doc, .exclamation, .error, .folder {
    border-bottom: solid 4px #<?php echo $s5_color; ?>;
    border-top: solid 4px #<?php echo $s5_color; ?>;
}

.custom_box {
    background:none;
    border:1px solid #<?php echo $s5_color; ?>;
    color:#<?php echo $s5_color; ?>; 
}

.custom_box_white, img.custom {
    background:none;
    border:3px solid #<?php echo $s5_color; ?>;
}

.custom_wrap {
    background:none;
    border:1px solid #<?php echo $s5_color; ?>;
}

.introletter_custom { 
    color: #<?php echo $s5_color; ?>;
}

.pathway {
    color: #<?php echo $s5_path_color; ?>;
}


#s5_column div.module-style2, #s5_inset div.module-style2, #s5_column div.module-style1, #s5_inset div.module-style1, #s5_column div.module-style6, #s5_inset div.module-style6, #s5_column div.module-style7, #s5_inset div.module-style7, #s5_column div.module-style13, #s5_inset div.module-style13, #s5_banner div.module-style1, #s5_banner div.module-style2, #s5_banner div.module-style6, #s5_banner div.module-style7, #s5_banner div.module-style13  { 
     color: #<?php echo $s5_color; ?>;
}

<?php if ($s5_body_opacity == "1") { ?>

#s5_mainbody {
     background:none;                         
     padding: 0px;
     font-size: 9pt;
}

<?php } ?>

<?php if ($s5_body_opacity == "2") { ?>

#s5_mainbody {
     background-image: url('templates/<?php echo $this->template ?>/images/s5_opac_black20.png') !important;  /* Mozilla only */
     background-color: transparent !important;           /* Mozilla only */
     padding: 0px;
     font-size: 9pt;
     background-image: none;                             /* IE only */
     background-color: #ffffff;                          /* IE only */
<?php if ($is_ie6 == "yes") { ?>
     filter:alpha(opacity=10);                           /* IE only */
<?php } ?>
}

<?php } ?>

<?php if ($s5_body_opacity == "3") { ?>

#s5_mainbody {
     background-image: url('templates/<?php echo $this->template ?>/images/s5_opac_black50.png') !important;  /* Mozilla only */
     background-color: transparent !important;           /* Mozilla only */
     padding: 0px;
     font-size: 9pt;
     background-image: none;                             /* IE only */
     background-color:#323131;                          /* IE only */
<?php if ($is_ie6 == "yes") { ?>
     filter:alpha(opacity=45);                           /* IE only */
<?php } ?>
}

<?php } ?>

<?php if ($s5_body_opacity == "4") { ?>

#s5_mainbody {
     background-image: url('templates/<?php echo $this->template ?>/images/s5_opac_black75.png') !important;  /* Mozilla only */
     background-color: transparent !important;           /* Mozilla only */
     padding: 0px;
     font-size: 9pt;
     background-image: none;                             /* IE only */
     background-color: #111111;                          /* IE only */
<?php if ($is_ie6 == "yes") { ?>
     filter:alpha(opacity=80);                           /* IE only */
<?php } ?>
}

<?php } ?>

<?php if ($s5_body_opacity == "5") { ?>

#s5_mainbody {
     background:#000000;                   
     padding: 0px;
     font-size: 9pt;
}

<?php } ?>

<?php if ($s5_body_opacity == "6") { ?>

#s5_mainbody {
     background:#666666;                   
     padding: 0px;
     font-size: 9pt;
}

<?php } ?>

<?php if ($s5_body_opacity == "7") { ?>

#s5_mainbody {
     background:#FFFFFF;                   
     padding: 0px;
     font-size: 9pt;
}

<?php } ?>


<?php if ($is_ie7 == "yes") { ?>

.button {
        border: solid 1px #999999;
        color: #000000;
	font-size:0.9em;
	margin-bottom:6px;
	margin-top:8px;
	padding:1px 3px 1px 3px;
}

<?php } ?>

<?php if ($is_ie7 == "no" && $is_ie6 == "no") { ?>

.button {
        border: solid 1px #999999;
        color: #000000;
	font-size:0.95em;
	margin-bottom:6px;
	margin-top:8px;
	padding:1px 7px 3px 5px;}

<?php } ?>


a  {
     color:#<?php echo $s5_color; ?>; 
     text-decoration: none; }

a:hover, a:focus  {
     color:#<?php echo $s5_color; ?>;
     text-decoration: underline }

 h1  { font-size:1.1em; color:#<?php echo $s5_color; ?>; font-family:Arial, Helvetica;}
 h2  { font-size:1.1em; color:#<?php echo $s5_color; ?>; font-family:Arial, Helvetica; font-weight:bold;}
 h3  { font-size:1.0em; color:#<?php echo $s5_color; ?>; font-family:Arial, Helvetica;}
 h4  { font-size:1.0em; color:#<?php echo $s5_color; ?>; font-family:Arial, Helvetica;font-weight:normal;}
 h5  { font-size:0.9em; color:#<?php echo $s5_color; ?>; font-family:Arial, Helvetica;}

.button {
    background: #<?php echo $s5_color; ?>;
    color:#000000; }

table.blog .contentheading, a.contentpagetitle, .contentheading {
     color:  #<?php echo $s5_color; ?>; }

a.contentpagetitle:hover,
a.contentpagetitle:active,
a.contentpagetitle:focus  {
     color:  #<?php echo $s5_color; ?>; }

.modifydate, .createdate, .content_rating {
	color: #<?php echo $s5_color; ?>; }

.sectiontableheader  {
	color: #<?php echo $s5_color; ?>; }

.componentheading  {
	color: #<?php echo $s5_color; ?>; }

#s5_open {
     color: #ffffff; }

#s5_open:hover {
     color: #<?php echo $s5_color; ?>; }

#s5_closed {
     color: #ffffff; }

#s5_closed:hover {
     color: #<?php echo $s5_color; ?>; }

#s5_box_button, #s5_box_button:hover {
     color: #<?php echo $s5_color; ?>; }

#popup_div {
     background: #<?php echo $s5_color; ?> url('templates/<?php echo $this->template ?>/images/s5_popupbg.gif') repeat scroll 0%; }

#s5_user1 div.moduletable, #s5_user1 div.moduletable a {
     color:#<?php echo $s5_user1_color; ?>; 
	 font-size: 9pt; }

#s5_user2 div.moduletable, #s5_user2 div.moduletable a, #s5_user2 div.moduletable h3 {
     color:#<?php echo $s5_user2_color; ?>; }

#s5_banner {
     border-bottom: solid 1px #<?php echo $s5_color; ?>; }

#s5_mainbody {
     border-top: solid 1px #<?php echo $s5_color; ?>;
     color:#<?php echo $s5_body_color; ?>; }

#s5_mainbody a {
     color:#<?php echo $s5_body_color; ?>; }

#s5_mainbody h3 {
     color:#<?php echo $s5_color; ?>; }

#s5_row1_top, #s5_row2_top {
     background: #<?php echo $s5_color; ?> url('templates/<?php echo $this->template ?>/images/s5_bot_tops.gif') no-repeat; }

#s5_footer_top {
     background: #<?php echo $s5_color; ?> url('templates/<?php echo $this->template ?>/images/s5_footer_top.gif') no-repeat; }

#s5_topleft a.mainlevel-top, #s5_topleft {
     color:#<?php echo $s5_top_menu_color; ?>;}

#s5_column div.moduletable {
     border-top: solid 1px #<?php echo $s5_color ?>; }

#s5_bannertop, #s5_panel_bottom {
     border-bottom: solid 1px #<?php echo $s5_color ?>; }

#s5_panel {
     border-top: solid 1px #<?php echo $s5_color ?>; }

#s5_navv ul li li a {
     border-left: solid 1px #<?php echo $s5_color; ?>; }


</style> 

</head>


<body<?php if ($s5_loader == "yes") { ?> onload="loaded('s5_loader')"<?php } ?>>

<script type="text/javascript">

window.scroll(0,0);

</script>

<div id="s5_outer">
<div id="s5_outer_inner">
     <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="935" height="204">
       <param name="movie" value="/images/banners/Banner.swf" />
       <param name="quality" value="high" />
       <param name="wmode" value="opaque" />
       <param name="swfversion" value="6.0.65.0" />
       <!-- Esta tag param solicita que os usuários com o Flash Player 6.0 r65 e versões posteriores baixem a versão mais recente do Flash Player. Exclua-o se você não deseja que os usuários vejam o prompt. -->
       <param name="expressinstall" value="Scripts/expressInstall.swf" />
       <!-- A tag object a seguir aplica-se a navegadores que não sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
       <!--[if !IE]>-->
       <object type="application/x-shockwave-flash" data="/images/banners/Banner.swf" width="935" height="204">
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
     <?php if($this->countModules('toolbar')) { ?>

     <div id="s5_box_button" onclick="<?php if ($is_ie6 == "yes") { ?>ie_popup_fix();<?php } ?>shiftOpacity3('popup_div');shiftOpacity2('popup_outer');show_popup()">
          <?php echo $s5_box_link ?>
     </div>
   
     <?php } ?>

<?php if($this->countModules('header')) { ?>

<div id="s5_search"><jdoc:include type="modules" name="header" style="xhtml" /></div>

<?php } ?>

     <?php if($this->countModules('top')) { ?>

     <div id="s5_topleft" style="<?php if($this->countModules('header')) { ?>width:400px<?php } ?><?php if(!$this->countModules('header')) { ?>width:700px<?php } ?>"><jdoc:include type="modules" name="top2" style="xhtml" />

     </div>

     <?php } ?>
     
          <div class="clr"></div>

     <?php if ($s5_show_menu == "yes") { ?>

     <div id="s5_mainmenu">
          <div id="s5_navv"><?php mosShowListMenu($menu_name);	?></div>        
     </div>

     <?php } ?>

          <div class="clr"></div>
<?php if($this->countModules('user1')) { ?>
     <div id="s5_user1"><jdoc:include type="modules" name="user1" style="xhtml" />
     </div> 
<?php } ?>

<?php if ($this->countModules("breadcrumbs")) { ?>                    
     <div id="s5_pathway" style="<?php if ($s5_layout == "1") { ?>float:right<?php } ?><?php if ($s5_layout == "2") { ?>float:left<?php } ?>"><jdoc:include type="modules" name="breadcrumbs" style="xhtml" /></div>
<?php } ?>
     <div id="s5_body_wrap">
     <div id="s5_body" style="width:<?php echo $s5_body_width ?>px; <?php if ($s5_layout == "1") { ?>float:left<?php } ?><?php if ($s5_layout == "2") { ?>float:right<?php } ?>">
          <div id="s5_logo" style="width:<?php echo $s5_body_width ?>px; height:<?php echo $s5_logo_height ?>px"><a href="index.php"><img border="0" alt="" src="templates/<?php echo $this->template ?>/images/blank.gif" width="<?php echo $s5_body_width ?>px" height="<?php echo $s5_logo_height ?>px"></img></a>
          </div>
     <?php if($this->countModules('banner')) { ?>
          <div id="s5_bannertop" style="width:<?php echo $s5_body_width ?>px;">
          </div>
          <div id="s5_banner" style="width:<?php echo $s5_banner_width ?>px;">
               <div id="s5_banner_inner">
               <jdoc:include type="modules" name="top" style="rounded" />
               </div>
          </div>
     <?php } ?>
          <div id="s5_user2"><jdoc:include type="modules" name="user2" style="rounded" />
          </div>
          <div id="s5_binner">

<?php if($this->countModules('advert1') || $this->countModules('advert2')) { ?>

     <form name="s5_panelform" action="" id="panelform">

          <input type="hidden" id="panel_holder" name="panel_holder" value=""></input>

          <script type="text/javascript">

               load_valuepanel();

          </script>

     </form>

               <div id="s5_panel_button" onclick="panel()">
                    <div id="s5_open"<?php if ($s5_open_start == "yes") { ?> style="display:none;"<?php } ?>><?php echo $s5_open_text; ?></div>

                    <div id="s5_closed"<?php if ($s5_open_start == "no") { ?> style="display:none;"<?php } ?>><?php echo $s5_closed_text; ?></div>
               </div>

               <div id="s5_panel">

                    <div id="s5_panel_inner">

               <div id="s5_panel_top"></div>

          <?php if ($this->countModules("advert1")) { ?><div style="width:<?php echo $ad1; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="advert1" style="xhtml" /></div></div><?php } ?>

          <?php if ($this->countModules("advert2")) { ?><div style="width:<?php echo $ad1; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="advert2" style="xhtml" /></div></div><?php } ?>

          <div class="clr"></div>

               <div id="s5_panel_bottom"></div>

                    </div>

               </div>

<?php } ?>

          <div class="clr"></div>

               <div id="s5_mainbody" style="width:<?php echo $s5_mainbody_width ?>px">
                    <div id="s5_mainbody_inner">
                    <jdoc:include type="component" />
                    </div>
               </div>
               </div>
     <?php if($this->countModules('inset')) { ?>

          <div id="s5_inset">
               <div id="s5_inset_inner">
	       <jdoc:include type="modules" name="inset" style="rounded" />
               </div>
          </div>

     <?php } ?>
     </div>
     <?php if($this->countModules('left')) { ?>
          <div id="s5_columntop" style="width:<?php echo $s5_column_width ?>px; <?php if ($s5_layout == "1") { ?>float:right<?php } ?><?php if ($s5_layout == "2") { ?>float:left<?php } ?>">
          </div>

     <div id="s5_column" style="width:<?php echo $s5_column_width ?>px; <?php if ($s5_layout == "1") { ?>float:right<?php } ?><?php if ($s5_layout == "2") { ?>float:left<?php } ?>">
          <div id="s5_column_inner">
          <jdoc:include type="modules" name="left" style="rounded" />
          </div>
     </div>

          <div class="clr"></div>

     <?php } ?>
          <div class="clr"></div>

<div id="s5_bottomspacermin" style="height:0px; background:none"></div>

<div id="s5_bottomspacer" style="height:32px; background:none"></div>

<div id="s5_minheight" style="height:0px; background:none"></div>

<?php if($this->countModules('user3') || $this->countModules('user4') || $this->countModules('user5') || $this->countModules('user6')) { ?> 

     <div id="s5_row1_top">
     </div>
     <div id="s5_row1">
                 
          <?php if ($this->countModules("user3")) { ?><div class="rowpadding2" style="width:<?php echo $row1; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="user3" style="xhtml" /></div></div><?php } ?>

          <?php if ($this->countModules("user4")) { ?><div class="rowpadding2" style="width:<?php echo $row1; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="user4" style="xhtml" /></div></div><?php } ?>

          <?php if ($this->countModules("user5")) { ?><div class="rowpadding2" style="width:<?php echo $row1; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="user5" style="xhtml" /></div></div><?php } ?>

          <?php if ($this->countModules("user6")) { ?><div class="rowpadding2" style="width:<?php echo $row1; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="user6" style="xhtml" /></div></div><?php } ?>

<div class="clr"></div>

     </div>

     <div id="s5_row1_bottom">
     </div>

<?php } ?>  

<?php if($this->countModules('user7') || $this->countModules('user8') || $this->countModules('user9') || $this->countModules('advert3')) { ?> 

     <div id="s5_row2_top">
     </div>
     <div id="s5_row2">
                 
          <?php if ($this->countModules("user7")) { ?><div class="rowpadding2" style="width:<?php echo $row2; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="user7" style="xhtml" /></div></div><?php } ?>

          <?php if ($this->countModules("user8")) { ?><div class="rowpadding2" style="width:<?php echo $row2; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="user8" style="xhtml" /></div></div><?php } ?>

          <?php if ($this->countModules("user9")) { ?><div class="rowpadding2" style="width:<?php echo $row2; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="user9" style="xhtml" /></div></div><?php } ?>

          <?php if ($this->countModules("advert3")) { ?><div class="rowpadding2" style="width:<?php echo $row2; ?>; float: left;"><div class="rowpadding"><jdoc:include type="modules" name="advert3" style="xhtml" /></div></div><?php } ?>

<div class="clr"></div>

     </div>

     <div id="s5_row2_bottom">
     </div>

<?php  }?>  

     <div id="s5_footer_top">
     </div>

<div class="clr"></div>

     <div id="s5_footer">

     <div id="s5_row3">
                 
          <div  id="s5_logofooter" style="width:271px;> <p font color="ffffff">&copy; 2009 <a href="sobre.html" target="popupwindow" onclick='window.open("sobre.html", "popupwindow", "scrollbars=yes,width=590,height=360");return true'>Cesar Augusto</a> - Todos os direitos reservados</p> <br /><br />

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

</div>

         <div id="s5_icon" style="width:271px; float: left;"><jdoc:include type="modules" name="icon" style="xhtml" /></div>

<div class="clr"></div>

<?php if($this->countModules('bottom')) { ?><div id="s5_bottom"><jdoc:include type="modules" name="bottom" style="xhtml" /></div><?php } ?>

</div>

</div>
     </div>

     </div>

<div style="height:50px"></div>

</div>

<?php if($this->countModules('toolbar')) { ?>


<div onclick="shiftOpacity3('popup_div');shiftOpacity2('popup_outer')" id="popup_outer" style="display:none;background:#000000; opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?> height: 0px; z-index:1; 

<?php if ($is_ie6 == "yes") { ?>
position:absolute; 
<?php } ?>

<?php if ($is_ie6 == "no") { ?>
position:fixed; 
<?php } ?>
width: 100%; margin: 0px; padding: 0px; left: 0px; top:0px"></div>

<div id="popup_div" style="display:none;height:0px; top: 50%; opacity:.0; <?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>filter: alpha(opacity=0); -moz-opacity: 0;<?php } ?> width: 340px; z-index:2; left: 50%; margin-left:-168px; margin-top:-175px; 


<?php if ($is_ie6 == "yes" || $is_ie7 == "yes") { ?>
position:absolute; 
<?php } ?>

<?php if ($is_ie6 == "no" && $is_ie7 == "no") { ?>
position:fixed; 
<?php } ?>"><div id="close_popup_div" style="cursor:pointer; padding-bottom:18px; color:#dedede; font-size:10pt" onclick="shiftOpacity3('popup_div');shiftOpacity2('popup_outer')">Close</div><div style="height:317px; margin-top:-7px; margin-bottom:-7px; margin-right:-9px; margin-left:-9px; padding:8px; overflow:auto"><jdoc:include type="modules" name="toolbar" style="xhtml" /></div></div>
<?php } ?>

<?php if ($s5_loader == "yes") { ?>
<div id="s5_loader" style="<?php if ($is_ie6 == "yes") { ?>position:absolute<?php } ?><?php if ($is_ie6 == "no") { ?>position:fixed<?php } ?>">
<script type="text/javascript">
loader('s5_loader');
</script>
     <div style="margin-left: auto; margin-right: auto; width: 200px; padding-top: 200px; color:#ffffff"><div style="text-align:center"><font face="Arial" style="font-size: 8pt" color="#FFFFFF"><?php echo $s5_loading_text ?></font></div>
     <br /><div style="text-align:center"><img border="0" src="templates/<?php echo $this->template ?>/images/loader.gif" alt="" width="32" height="32"></img></div>
     </div>
</div>
<?php } ?>

<script type="text/javascript">

if (document.getElementById("s5_inset")) {
document.getElementById("s5_binner").style.width = <?php echo $s5_body_width ?> - 214 + "px";
}
else {
document.getElementById("s5_binner").style.width = <?php echo $s5_body_width ?> + "px";
}

if (document.getElementById("s5_body")) {
var bodyheight = document.getElementById("s5_body").offsetHeight;
}
if (document.getElementById("s5_column")) {
var columnheight = document.getElementById("s5_column").offsetHeight;
}

if (document.getElementById("s5_loader")) {
document.getElementById("s5_loader").style.height = document.getElementById("s5_outer_inner").offsetHeight +'px';
}


<?php if($this->countModules('advert1') || $this->countModules('advert2')) { ?>

var panelholder = document.getElementById("s5_panel_inner").offsetHeight;

<?php if ($s5_open_start == "yes") { ?>

     if (document.getElementById("panel_holder").value == "" || document.getElementById("panel_holder").value == " " || document.getElementById("panel_holder").value == "undefined") {

          panel();
     }

<?php } ?>

     if (document.getElementById("panel_holder").value == "1") {

          document.getElementById("s5_panel").style.height = panelholder +'px';
          panelclick = 1;
     }

     if (document.getElementById("panel_holder").value == "2") {

          document.getElementById("s5_panel").style.height = 0 +'px';
          panelclick = 0;
          document.getElementById("s5_open").style.display = 'block'; 
          document.getElementById("s5_closed").style.display = 'none'; 
     }

<?php } ?>

var divbody = 0;
var divinset = 0;
var divcolumn = 0; 

if (document.getElementById("s5_column_inner")) {
checkcolumn = document.getElementById("s5_column").offsetHeight + document.getElementById("s5_column").offsetTop;
divcolumn = 1;
}

if (document.getElementById("s5_mainbody_inner")) {
checkbody = document.getElementById("s5_mainbody").offsetHeight + document.getElementById("s5_mainbody").offsetTop;
divbody = 1;
}

if (document.getElementById("s5_inset_inner")) {
checkinset = document.getElementById("s5_inset").offsetHeight + document.getElementById("s5_inset").offsetTop;
divinset = 1;
}

var checkcolumn = 0;
var checkbody = 0;
var checkinset = 0;
var bodybottomspacer = 0;

window.setTimeout('setdivs()',500);

</script>

</body>

</html>