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
|| #################################################################### ||
\*======================================================================*/
defined( '_JEXEC' ) or die( 'Restricted index access' );
$yj_site = JURI::base()."templates/".$this->template;
$yj_base = JURI::base();

require( TEMPLATEPATH.DS."links.php");


$default_color = $this->params->get("defaultcolor", "blue"); // set the default spiderman | venom | acreed | hulk
$default_font  = $this->params->get("fontsize", "medium"); // SMALL | MEDIUM | BIG
$default_width = $this->params->get("sitewidth", "wide"); // WIDE | NARROW  


// SUCKERFISH  MENU SWITCH // 
$menu_name = $this->params->get("menuName", "mainmenu");// mainmenu by default, can be any Joomla! menu name

//MENU STYLE SWITCH//
$menustyle = $this->params->get("menustyle", "2");  //  1 = Standard Dropdown (Suckerfish)  | 2  = SMooth Dropdown | 3 = Dropline Menu | 4 = SmoothDropline menu |  5  = Split Menu 



// USE SERVER SIDE SCRIPT AND CSS COMPRESSION FOR FASTER PAGE LOAD 
// mod_gzip module  MUST BE ENABELED IN PHP.INI
// IF YOU ARE NOT SUER WHAT THIS IS LEAVE THIS SETTING 0
$compress = $this->params->get("compress", "0");	 // 1 = TURN COMPRESSION ON  |  0 = TURN COMPRESSION OFF 
// SEO SECTION //
$seo                    = $this->params->get ("seo", "Joomla 1.5 Template By Youjoomla.com");                      # JUST FOLOW THE TEXT
$tags                   = $this->params->get ("tags", "Joomla Templates by Youjoomla, Joomla Template Club, Youjoomla");# JUST FOLOW THE TEXT
$ie6notice  = $this->params->get("ie6notice", "0"); // 1 = ON | 0 = OFF   
// ADVISE VISITORS THAT THIR JAVASCRIPT IS DISABLED
$nonscript  = $this->params->get("nonscript", "0"); // 1 = ON | 0 = OFF 
#DO NOT EDIT BELOW THIS LINE//////////////////////////////////////////////////////////////////////////


require( TEMPLATEPATH.DS."styleswitcher.php");



//START COLLAPSING THAT MODULE:)
$left = $this->countModules( 'left' );
$right = $this->countModules( 'right' );
if ( $left  &&  $right  ) {
	
	$leftblock  = '30%';
	$midblock = '40%';
	$rightblock  = '30%';
	$wrap    = 'wrap';
    $insidewrap='insidewrap';
	
	}elseif ( $left) {
	$midblock = '68%';
	$leftblock  = '32%';
	$wrap    = 'wrapblank';
	$insidewrap='insidewrapblank';
	
	}elseif ( $right) {
	$midblock = '68%';
	$rightblock  = '32%';
	$wrap    = 'wrap';
	$insidewrap='insidewrapblank';

	} else {
    $midblock = '100%';
	$wrap    = 'wrapblank';
	$insidewrap='insidewrapblank';
	}

//START COLLAPSING TOP:)
$tops = 0;
if ($this->countModules('user1')) $tops++;
if ($this->countModules('user2')) $tops++;
if ( $tops == 2 ) {
	$topswidth = '50%';
} else if ($tops == 1) {
	$topswidth = '100%';
}
$bottoms = 0;
if ($this->countModules('user3')) $bottoms++;
if ($this->countModules('user4')) $bottoms++;
if ( $bottoms == 2 ) {
	$bottomswidth = '50%';
} else if ($bottoms == 1) {
	$bottomswidth = '100%';
}
//START COLLAPSING TOP:)
$bottom = 0;
if ($this->countModules('user5')) $bottom++;
if ($this->countModules('user6')) $bottom++;
if ($this->countModules('user7')) $bottom++;
if ( $bottom == 3 ) {
	$bottomwidth = '33.3%';}
elseif ( $bottom == 2 ) {
	$bottomwidth = '50%';
} else if ($bottom == 1) {
	$bottomwidth = '100%';
}

// -- figure out what URL to use for prefix
// -- Loop through existing prefix to get all of the variables
$my_vars = $_GET;
$my_url = "";
if(!empty($my_vars)) {
// -- Loop through the vars that are passed and make sure they are not any of the reserved ones
foreach($my_vars as $col => $val) {
if($col != "change_font" && $col != "change_width" && $col != "change_css" && $col != "change_menu") {
$my_url .= $col ."=".$val . "&amp;";
}
}
$my_request = $_SERVER["PHP_SELF"]."?".substr($my_url, 0, -5)."&amp;"; // -- Add some more
}else{
$my_request = $_SERVER["PHP_SELF"]."?"; // -- All alone
}
function getCurrentURL(){
$cururl = JRequest::getURI();
if(($pos = strpos($cururl, "index.php"))!== false){
$cururl = substr($cururl,$pos);
}
$cururl = JRoute::_($cururl);
$cururl = ampReplace($cururl);
return $cururl;
}

if ($compress == 1){
$jsextens ='php';
$cssextens ='php';
}else{
$jsextens ='js';
$cssextens ='css';
}
	$document	= &JFactory::getDocument();
	$renderer	= $document->loadRenderer( 'module' );
	$options	 = array( 'style' => "raw" );
	$module	 = JModuleHelper::getModule( 'mod_mainmenu' );
	$topmenu = false; $subnav = false; $sidenav = false;
	if ($menustyle == 1 or $menustyle== 2) :
		$module->params	= "menutype=$menu_name\nshowAllChildren=1\nclass_sfx=nav";
		$topmenu = $renderer->render( $module, $options );
		$menuclass = 'horiznav';
		$topmenuclass ='top_menu';
	elseif ($menustyle== 3 or $menustyle== 4) :
		$module->params	= "menutype=$menu_name\nshowAllChildren=1\nclass_sfx=navd";
		$topmenu = $renderer->render( $module, $options );
		$menuclass = 'horiznav_d';
		$topmenuclass ='top_menu_d';
		
		
		elseif ($menustyle == 5) :
		$module->params	= "menutype=$menu_name\nstartLevel=0\nendLevel=1\nclass_sfx=split";
		$topmenu = $renderer->render( $module, $options );
		$menuclass = 'horiznav';
		$topmenuclass ='top_menu';
		
	endif;



?>