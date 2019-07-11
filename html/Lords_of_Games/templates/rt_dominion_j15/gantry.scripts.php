<?php
/**
 * @package   Dominion Template - RocketTheme
 * @version   1.5.0 January 1, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Rockettheme Dominion Template uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );

function gantry_params_init(){
    global $gantry;

    $tpl_name = "rt-dominion";
    $jc_component_tpl_dir = JPATH_ROOT."/components/com_jcomments/tpl";
    $dominion_tpl_dir= $gantry->templatePath ."/html/com_jcomments/tpl/".$tpl_name;
    if (!file_exists($jc_component_tpl_dir."/".$tpl_name) && file_exists($jc_component_tpl_dir) && is_dir($jc_component_tpl_dir) && is_writable($jc_component_tpl_dir)){
        jimport('joomla.filesystem.folder');
        JFolder::copy($dominion_tpl_dir, $jc_component_tpl_dir."/".$tpl_name);
    }
}


