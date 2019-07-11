<?php
/**
* @version $Id: mod_suckermenu.php,v 107 2005/04/11 wdg Exp $
* @package Mambo
* @copyright 2005 asystance VOF
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
*/

/** ensure this file is being included by a parent file */
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

if (!defined( '_MOS_SUCKERMENU_MODULE' )) {

	/** ensure that functions are declared only once */
	define( '_MOS_SUCKERMENU_MODULE', 1 );

	function mosShowHFMenu2( &$params) {
		global $database, $my, $cur_template, $Itemid;
		global $mosConfig_absolute_path, $mosConfig_shownoauth;
		
		if ($mosConfig_shownoauth) {
			$sql = "SELECT m.* FROM #__menu AS m"
			. "\nWHERE menutype='". $params->get( 'menutype' ) ."' AND published='1'"
			. "\nORDER BY parent,ordering";
		} else {
			$sql = "SELECT m.* FROM #__menu AS m"
			. "\nWHERE menutype='". $params->get( 'menutype' ) ."' AND published='1' AND access <= '$my->gid'"
			. "\nORDER BY parent,ordering";
		}

		$database->setQuery( $sql );
		$rows = $database->loadObjectList( 'id' );

	
		$menuclass = 'mainlevel'. $params->get( 'class_sfx' );
		$indents = array(
			array( '<ul id="navlist">', "\t<li>" , '</li>', '</ul>' ),
			array( "\t\t<ul>", "\t\t\t<li>" , '</li>', "\t\t</ul>" ),
			array( "\t\t<ul>", "\t\t\t<li>" , '</li>', "\t\t</ul>" ),
			array( "\t\t\t<ul>", "\t\t\t\t<li>" , '</li>', "\t\t\t</ul>" ),
			array( "\t\t\t\t<ul>", "\t\t\t\t\t<li>" , '</li>', "\t\t\t\t</ul>" ),
			array( "\t\t\t\t\t<ul>", "\t\t\t\t\t\t<li>" , '</li>', "\t\t\t\t\t</ul>" ),
		);

		// establish the hierarchy of the menu
		$children = array();
		// first pass - collect children
		foreach ($rows as $v ) {
			$pt = $v->parent;
			$list = @$children[$pt] ? $children[$pt] : array();
			array_push( $list, $v );
			$children[$pt] = $list;
		}

		$open = array( $Itemid );
		$count = 20; // maximum levels - to prevent runaway loop
		$id = $Itemid;
		while (--$count) {
			if (isset($rows[$id]) && $rows[$id]->parent > 0) {
				$id = $rows[$id]->parent;
				$open[] = $id;
			} else {
				break;
			}
		}
		mosRecurseVIMenu2( 0, 0, $children, $open, $indents, $params, $rows );
	}

/* Utility function to recursively work through a vertically indented hierarchial menu */
	function mosRecurseVIMenu2( $id, $level, &$children, &$open, &$indents, &$params, $rows ) {
		global $Itemid;
		if (@$children[$id]) {

			$n = min( $level, count( $indents )-1 );

			echo "\n".$indents[$n][0]; //starting <ul>
			$iCnt = count($children[$id]);	//hack
			$i = 0;
			foreach ($children[$id] as $row) {
				$i++;
				if ($i == $iCnt) {
					$s = $indents[$n][1];
					//echo "\n".$s;
					echo "\n".str_replace('<li>','<li class="lastitem">',$indents[$n][1]);
				} else {
					echo "\n".$indents[$n][1]; //<li>
				}

				//WD make parent and all children active to indicate path
				if( array_search( $row->id, $open)===false) {
					$active = false;
				} else {
					$active = true;
				}
				echo mosGetMenuLink2( $row, $level, $params, $active, $rows); //the actual link <a href...>
				mosRecurseVIMenu2( $row->id, $level+1, $children, $open, $indents, $params, $rows );
				echo $indents[$n][2]; //closing </li>
			}
			echo "\n".$indents[$n][3]; // closing </ul>
		}
	}

/* Utility function for writing a menu link	*/
	function mosGetMenuLink2( $mitem, $level=0, &$params, $active, $rows ) {
		global $Itemid, $mosConfig_live_site, $mainframe;
		$txt = '';

		switch ($mitem->type) {
			case 'separator':
				break;
			case 'component_item_link':
				break;
			case 'content_item_link':
				$temp = split("&task=view&id=", $mitem->link);
				$mitem->link .= '&Itemid='. $mainframe->getItemid($temp[1]);
				break;
			case 'url':
				if ( eregi( 'index.php\?', $mitem->link ) ) {
					if ( !eregi( 'Itemid=', $mitem->link ) ) {
						$mitem->link .= '&Itemid='. $mitem->id;
					}
				}
				break;
			case 'content_typed':
				break;
			default:
				$mitem->link .= '&Itemid='. $mitem->id;
				break;
		}

		//WD New active menu highlighting
		$id = '';
		if( $active) {
			$id = ' id="active'. $level.$params->get( 'class_sfx' ).'"';
		}

		$mitem->link = ampReplace( $mitem->link );
		$mitem->name = ampReplace( $mitem->name ); //WD

		if ( strcasecmp( substr( $mitem->link,0,4 ), 'http' ) ) {
			$mitem->link = sefRelToAbs( $mitem->link );
		}

		//Check if this item has children
		$haschild = "";
		foreach ($rows as $duh) {
			if($duh->parent==$mitem->id && $level > 0){
				$haschild = "parent";
			}
		}
		
		// Give main and sub menus different classes
		// $menuclass = 'main'. $haschild . $params->get( 'class_sfx' );
		// if ($level > 0) {
		// 	$menuclass = 'sub'. $haschild . $params->get( 'class_sfx');
		// }
		
		$menuclass = $haschild . $params->get( 'class_sfx');
		if ($menuclass) {
			$menuclass = ' class="'.$menuclass.'"';
		}
		switch ($mitem->browserNav) {
			// cases are slightly different
			case 1:
			// open in a new window
			$txt = '<a href="'. $mitem->link .'" target="_blank"'. $menuclass . $id .'>'.$mitem->name .'</a>';
			break;

			case 2:
			// open in a popup window
			$txt = "<a href=\"#\" onclick=\"javascript: window.open('". $mitem->link ."', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"$menuclass\" ". $id .">". $mitem->name ."</a>\n";
			break;

			case 3:
			// don't link it
			//WD $txt = '<span class="'. $menuclass .'" '. $id .'>'. $mitem->name .'</span>'; changed span to divs for stupid ie
			$txt = '<div>'.$mitem->name.'</div>';
			break;

			default:	// formerly case 2
			// open in parent window


            if ($level == 0 && $id != ' id="active0"') {
            $txt = '<a class="main" href="'. $mitem->link .'"'. $menuclass .
$id .'>'. $mitem->name

.'</a>';
                   }


            else if ($id == ' id="active0"') {
            $txt = '<a class="active" href="'. $mitem->link .'"'. $menuclass .
$id .'>'. $mitem->name

.'</a>';
                   }

                else if ($haschild == "parent") {
                $txt = '<a class="parent" href="'. $mitem->link .'"'. $menuclass . $id
.'>'. $mitem->name

.'</a>';
                   }

                else if ($haschild != "parent") {
                $txt = '<a class="sub" href="'. $mitem->link .'"'. $menuclass . $id
.'>'. $mitem->name

.'</a>';
                   }

                        break;
                }

		if ( $params->get( 'menu_images' ) ) {
			$menu_params = new stdClass();
			$menu_params =& new mosParameters( $mitem->params );
			$menu_image = $menu_params->def( 'menu_image', -1 );
			if ( ( $menu_image <> '-1' ) && $menu_image ) {
				$image = '<img src="'. $mosConfig_live_site .'/images/stories/'. $menu_image .'" border="0" alt="'. $mitem->name .'"/>';
				if ( $params->get( 'menu_images_align' ) ) {
					$txt = $txt .' '. $image;
				} else {
					$txt = $image .' '. $txt;
				}
			}
		}

		return $txt;
	}
}

$params->def( 'menutype', 'mainmenu' );

?>
