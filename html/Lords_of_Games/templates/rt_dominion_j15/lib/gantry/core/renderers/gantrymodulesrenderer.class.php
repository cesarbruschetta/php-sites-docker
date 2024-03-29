<?php
/**
 * @package     gantry
 * @subpackage  core.renderers
 * @version   2.0 January 1, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('GANTRY_VERSION') or die();
/**
 * @package     gantry
 * @subpackage  core.renderers
 */
class GantryModulesRenderer  {
	// wrapper for modules display
    function display($positionStub, $layout = 'standard', $chrome = 'standard', $gridsize = GRID_SYSTEM, $pattern = null) {
        global $gantry;
        
        $output = '';
		$index = 0;
        $poscount = 1;
		$positions = $gantry->getPositions($positionStub, $pattern);

		$count = $gantry->countModules($positionStub, $pattern);

        $showAllParam = $gantry->get($positionStub.'-showall');
        $showMaxParam = $gantry->get($positionStub.'-showmax');

        if ($showAllParam == 1) $count = $showMaxParam;

        // get base and override layouts.php
        require_once($gantry->templatePath.'/lib/gantry/html/layouts.php');
        
        if (file_exists($gantry->layoutPath)) require_once($gantry->layoutPath);

        //first loop through for information
        $actualPositions = array();

        foreach ($positions as $position) {

            $features = $gantry->_getFeaturesForPosition($position);
            $modules = JModuleHelper::getModules($position);

            if ($showAllParam == 0 and !count($modules) and !count($features)) continue;
            if ($showAllParam == 1 and $poscount++ > $showMaxParam) continue;

            $actualPositions[$position] = array('features'=>$features,'modules'=>$modules);

        }

        $end = end(array_keys($actualPositions));
        $start = reset(array_keys($actualPositions));
        $prefixCount = 0;
        
        // If RTL then flip the array
        if ($gantry->document->direction == 'rtl' && $gantry->get('rtl-enabled')) {
        	$actualPositions = array_reverse($actualPositions);
        }

        foreach($actualPositions as $position=>$data) {
            $contents = '';
            $extraClass = '';

            if ($position == $start) $extraClass = " rt-alpha";
            if ($position == $end) $extraClass = " rt-omega";
            if ($position == $start && $position == $end) $extraClass = " rt-alpha rt-omega";

			$features = $data['features'];
			foreach($features as $feature_name){
                $feature = $gantry->_getFeature($feature_name);
				$contents .= $feature->render($position) . "\n";
			}
			
			$modules = $data['modules'];

			if ($showAllParam == 1 and !count($modules) and !count($features)) {
                $prefixCount += $gantry->_getPositionSchema($position, $gridsize, $count, $index);

            } else {
                $contents .= '<jdoc:include type="modules" name="'.$position.'" style="'.$chrome.'" />' . "\n";

                $layoutMethod = 'modLayout_'.$layout;

                // Apply chrome and render module
                if (function_exists($layoutMethod)) {
                    $paramSchema = $gantry->_getPositionSchema($position, $gridsize, $count, $index);
                    if ($paramSchema)
                        $output .= $layoutMethod($contents, $paramSchema, $prefixCount, $extraClass);
                }
                $prefixCount = 0; // reset prefix count
            }
			$index++;
        }
		return $output;
    }
}