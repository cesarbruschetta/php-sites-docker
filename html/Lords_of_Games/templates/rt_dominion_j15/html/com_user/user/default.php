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
defined('_JEXEC') or die('Restricted access');
?>

<div class="rt-joomla <?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<div class="module-full"><div class="module-surround"><div class="module-tm"><div class="module-l"><div class="module-r"><div class="module-bm"><div class="module-tl"><div class="module-tr"><div class="module-bl"><div class="module-br">
	<div class="user">
		<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="rt-pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>
		<p>
			<?php echo nl2br($this->escape($this->params->get('welcome_desc', JText::_( 'WELCOME_DESC' )))); ?>
		</p>
	</div>
	<div class="clear"></div>
	</div></div></div></div></div></div></div></div></div></div>
</div>