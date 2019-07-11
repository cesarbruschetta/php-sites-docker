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


# EDITING NOTES :   ALL CODE BLOCKS ARE COMENTED , ALL PHP CONDITIONS BEFOR AND AFTER THE 
#  COMMENT ARE TO BE MOVED WITH THE BLOCK IF YOU ARE EDITING LAYOUTS
#  CSS MAIN LAYOUT IS IN LAYOUT.CSS  STARTING WITH 
# WIDTHS OF THE CODEBLOCKS ARE IN SETTINGS.PHP NAMED SAME AS DIVS USED
defined( '_JEXEC' ) or die( 'Restricted access' );
define( 'TEMPLATEPATH', dirname(__FILE__) );
require( TEMPLATEPATH.DS."settings.php");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>

<link href="<?php echo $yj_site ?>/css/template.<?php echo $cssextens; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $yj_site ?>/css/<?php echo $css_file; ?>.<?php echo $cssextens; ?>" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="<?php echo $yj_site ?>/favicon.ico" />
<?php require( TEMPLATEPATH.DS."head.php");?>





<body id="color">
    <div id="comlogin">
	<jdoc:include type="message" />
	<jdoc:include type="component" />
    </div>
</body>
</html>
