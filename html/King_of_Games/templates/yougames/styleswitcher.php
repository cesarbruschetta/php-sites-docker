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
if(!isset($_SESSION))
{
session_start();
} 

//if (!isset($_SESSION[$mystyles ])) {
//        session_start();
//        } 
$mystyles = array();


$mystyles['blue']['file'] = "spiderman";
$mystyles['venom']['file'] = "venom";
$mystyles['acreed']['file'] = "acreed";
$mystyles['hulk']['file'] = "hulk"; 

if (isset($_GET['change_css']) && $_GET['change_css'] != "") {
    $_SESSION['css'] = $_GET['change_css'];
} else {
    $_SESSION['css'] = (!isset($_SESSION['css'])) ? $default_color : $_SESSION['css'];
}
switch ($_SESSION['css']) {
    case "spiderman":
    $css_file = "spiderman";
    break;
    case "venom":
    $css_file = "venom";
    break;
	case "acreed":
    $css_file = "acreed";
    break;
	case "hulk":
    $css_file = "hulk";
    break;
	default:
    $css_file = "spiderman";

}




//FONT SWITCH

$myfont = array();


$myfont['small']['file'] = "9px";
$myfont['medium']['file'] = "12px";
$myfont['large']['file'] = "16px"; // default


$myfont['small']['label'] = '<img src="templates/'.$this->template.'/images/small.gif" alt="Small" title="Small" />&nbsp;';
$myfont['medium']['label'] = '<img src="templates/'.$this->template.'/images/medium.gif" alt="Medium" title="Medium" />&nbsp;';

$myfont['large']['label'] = '<img src="templates/'.$this->template.'/images/large.gif" alt="Large" title="Large" />&nbsp;';



if (isset($_GET['change_font']) && $_GET['change_font'] != "") {
    $_SESSION['font'] = $_GET['change_font'];
} else {
    $_SESSION['font'] = (!isset($_SESSION['font'])) ? $default_font : $_SESSION['font'];
}
switch ($_SESSION['font']) {
    case "small":
    $css_font = "9px";
    break;
    case "medium":
    $css_font = "12px";
    break;
	case "large":
    $css_font = "16px";
    break;
    default:
    $css_font = "12px";
}

//WIDTH SWITCH


$mywidth = array();

$mywidth['narrow']['file'] = "776px";
$mywidth['wide']['file'] = "930px";

$mywidth['narrow']['label'] = '<img src="templates/'.$this->template.'/images/narrow.gif" alt="Narrow" title="Narrow" />&nbsp;';
$mywidth['wide']['label'] = '<img src="templates/'.$this->template.'/images/wide.gif" alt="Wide" title="Wide" />&nbsp;';


if (isset($_GET['change_width']) && $_GET['change_width'] != "") {
    $_SESSION['width'] = $_GET['change_width'];
} else {
    $_SESSION['width'] = (!isset($_SESSION['width'])) ? $default_width : $_SESSION['width'];
}
switch ($_SESSION['width']) {
    case "wide":
    $css_width = "930px";
	$cpanelwidth="555px";
	$cpanel = "cpanel_w";
    break;
    case "narrow":
    $css_width = "776px";
	$cpanelwidth="401px";
	$cpanel = "cpanel_n";
    break;
	default:
    $css_width = "1000px";
	$cpanelwidth="555px";
	$cpanel = "cpanel_w";

}

// MENU
$mymenu = array();

$mymenu['dropdown']['file'] = 1;
$mymenu['sdropdown']['file'] = 2;
$mymenu['dropline']['file'] = 3;
$mymenu['sdropline']['file'] = 4;
$mymenu['split']['file'] = 5;


if (isset($_GET['change_menu']) && $_GET['change_menu'] != "") {
    $_SESSION['yjmenu'] = $_GET['change_menu'];
} else {
    $_SESSION['yjmenu'] = (!isset($_SESSION['yjmenu'])) ? $menustyle : $_SESSION['yjmenu'];
}
switch ($_SESSION['yjmenu']) {
    case "dropdown":
    $menustyle = 1;
	break;
    case "sdropdown":
    $menustyle = 2;
    break;
    case "dropline":
    $menustyle = 3;
    break;
    case "sdropline":
    $menustyle = 4;
    break;
    case "split":
    $menustyle = 5;
    break;
    default:
    $menustyle = 3;
}
?>