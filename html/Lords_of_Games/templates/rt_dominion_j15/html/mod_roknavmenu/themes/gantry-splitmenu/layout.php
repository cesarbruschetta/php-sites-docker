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
if (!defined('SPLITMENU_TEMPLATE')) define('SPLITMENU_TEMPLATE','gantry');

global $activeid;
$activeid = $menu->getParameter('splitmenu_fusion_enable_current_id',0) == 0 ? false : true;

?>
<?php
if ( ! defined('modRokNavMenuShowItems') )
{
function showItem(&$item, &$menu) {
    
    global $activeid;
   
    //not so elegant solution to add subtext
    $item->subtext = $item->getParameter('splitmenu_item_subtext','');
    if ($item->subtext=='') $item->subtext = false;
    else $item->addLinkClass('subtext');
?>
<li <?php if($item->hasListItemClasses()) : ?>class="<?php echo $item->getListItemClasses()?>"<?php endif;?> <?php if(isset($item->css_id) && $activeid):?>id="<?php echo $item->css_id;?>"<?php endif;?>>
	<?php if ($item->type == 'menuitem') : ?>
		<a <?php if($item->hasLinkClasses()):?>class="<?php echo $item->getLinkClasses();?>"<?php endif;?> <?php if($item->hasLink()):?>href="<?php echo $item->getLink();?>"<?php endif;?> <?php if(isset($item->target)):?>target="<?php echo $item->target;?>"<?php endif;?> <?php if(isset($item->onclick)):?>onclick="<?php echo $item->onclick;?>"<?php endif;?><?php if($item->hasLinkAttribs()):?> <?php echo $item->getLinkAttribs();?><?php endif;?>>
			<span>
			<?php echo $item->title;?>
			<?php if (!empty($item->subtext)) :?>
			<em><?php echo $item->subtext; ?></em>    
			<?php endif; ?>    
			</span>
		</a>
	<?php elseif($item->type == 'separator') : ?>
		<span <?php if($item->hasLinkClasses()):?>class="<?php echo $item->getLinkClasses();?> nolink"<?php endif;?>>
		    <span>
		    <?php echo $item->title;?>
		    <?php if (!empty($item->subtext)) :?>
			<em><?php echo $item->subtext; ?></em>    
			<?php endif; ?>
		    </span>
		</span>
	<?php endif; ?>
	<?php if ($item->hasChildren()): ?>
	<ul class="level<?php echo intval($item->level)+2; ?>">
		<?php foreach ($item->getChildren() as $child) : ?>			
			<?php showItem($child, $menu); ?>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
	
</li>	
<?php
} 
define('modRokNavMenuShowItems', true);
}

if (is_array($menu->_children) && !empty($menu->_children)) {

?>
<ul class="menu<?php echo $menu->getParameter('class_sfx');?> level1" <?php if($menu->getParameter('tag_id') != null):?>id="<?php echo $menu->getParameter('tag_id');?>"<?php endif;?>>
	<?php foreach ($menu->getChildren() as $item) :  ?>
		<?php showItem($item, $menu); ?>
	<?php endforeach; ?>
</ul>
<?php
}
?>