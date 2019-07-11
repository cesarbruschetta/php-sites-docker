<?php
/**
 * @package     gantry
 * @subpackage  html
 * @version		2.0 January 1, 2010
 * @author		RocketTheme http://www.rockettheme.com
 * @copyright 	Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */

defined('JPATH_BASE') or die();

function modLayout_basic($content, $gridCount, $prefixCount=0, $extraClass='') {
    $output = '';
    $output .= $content;
    return $output;
}

function modLayout_standard($content, $gridCount, $prefixCount=0, $extraClass='') {

    $prefixClass = '';

    if ($prefixCount !=0) {
        $prefixClass = " rt-prefix-".$prefixCount;
    }

    ob_start();
    // XHTML LAYOUT
    ?>
    <div class="rt-grid-<?php echo $gridCount.$prefixClass.$extraClass; ?>">
        <?php echo $content;  ?>
    </div>
    <?php

    return ob_get_clean();
}

function modLayout_sidebar($content, $position, $gridCount, $pushPull='') {

    ob_start();
    // XHTML LAYOUT
    ?>
				<div class="rt-grid-<?php echo $gridCount;?> <?php echo $pushPull; ?>">
					<div id="rt-<?php echo $position; ?>">
						<?php echo $content; ?>
					</div>
				</div>

    <?php

    return ob_get_clean();
}

function docLayout_body($classes, $id = null) {
	
	ob_start();
	//XHTML LAYOUT
	?><?php if(null != $id):?>id="<?php echo $id;?>"<?php endif;?> <?php if(strlen($classes) > 0):?>class="<?php echo $classes; ?>"<?php endif;?><?php
	return ob_get_clean();
}


function bodyLayout_mainbody($schema,$pushPull,$classKey,$sidebars = '', $contentTop = null, $contentBottom = null) {
	global $gantry;
	
	// logic to determine if the component should be displayed
	$display_component = !($gantry->get("component-enabled",true)==false && JRequest::getVar('view') == 'frontpage');
	
    ob_start();    
    // XHTML LAYOUT
    ?>          <div id="rt-main" class="<?php echo $classKey; ?>">
					<div class="rt-container">
	                    <div class="rt-grid-<?php echo $schema['mb']; ?> <?php echo $pushPull[0]; ?>">
                            <?php if (isset($contentTop)) : ?>
                            <div id="rt-content-top">
                                <?php echo $contentTop; ?>
                            </div>
                            <?php endif; ?>
                            <?php if ($display_component) : ?>
							<div class="rt-block">
                            	<div id="rt-mainbody">
                                	<jdoc:include type="component" />
                            	</div>
							</div>
							<?php endif; ?>
                            <?php if (isset($contentBottom)) : ?>
                            <div id="rt-content-bottom">
                                <?php echo $contentBottom; ?>
                            </div>
                            <?php endif; ?>
	                    </div>
	                    <?php echo $sidebars; ?>
	                    <div class="clear"></div>
					</div>
                </div>
    <?php

    return ob_get_clean();
}

function bodyLayout_debugmainbody($counter, $schema,$pushPull,$classKey,$content,$sidebars = '') {

    ob_start();
    // XHTML LAYOUT
    ?>          <div id="rt-main" class="<?php echo $classKey; ?>">
                    <span class="status">(<?php echo $counter; ?>) <?php echo $classKey; ?></span>
                    <div class="rt-grid-<?php echo $schema['mb']; ?> <?php echo $pushPull[0]; ?>">
                        <div class="rt-block">
                            <div id="rt-mainbody">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                    <?php echo $sidebars; ?>
                    <div class="clear"></div>
                </div>
    <?php

    return ob_get_clean();
}