<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @module Phoca - Google AdSense Easy
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */
defined('_JEXEC') or die('Restricted access');// no direct access

$adsense_code		= trim( $params->get( 'adsense_code' ) );
$ip_block_list		= trim( $params->get( 'ip_block_list' ) );
$alternate_content	= trim( $params->get( 'alternate_content' ) );
$module_css_style	= trim( $params->get( 'module_css_style' ) );
$ip_array 			= explode( ';', $ip_block_list );
$ipa 				= 1;//display
foreach ($ip_array as $value)	{if ($_SERVER["REMOTE_ADDR"] == trim($value)) {$ipa = 0;}}
if ($module_css_style)			{echo '<div style="'.$module_css_style.'">';}
if ($ipa == 1)					{echo $adsense_code;}
else							{echo $alternate_content;}
if ($module_css_style)			{echo '</div>';}
?>