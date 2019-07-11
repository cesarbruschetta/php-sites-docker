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
defined( '_JEXEC' ) or die( 'Restricted index access' ); ?>
<script type="text/javascript">
window.addEvent('domready', function() {
new SmoothScroll({duration: 1000});	
});
</script>

<!--[if IE 6]>
<link href="<?php echo $yj_site ?>/css/ifie.php" rel="stylesheet" type="text/css" />
<style type="text/css">
#horiznav_d ul li ul{
width:<?php echo $css_width; ?>;
}
</style>
<![endif]-->

<!--[if lte IE 7]>
<style type="text/css">
.poll input {
margin:5px 0;
}
</style>
<![endif]-->


<!--[if lte IE 8]>
<style type="text/css">
.button,.validate {
padding:4px 0 5px 0;
}
.yjsquare,
.yjsquare_yj1,
.yjsquare_yj2{
margin: 10px 0 15px 0px!Important;
}
.search_blank .inputbox_blank,
.search .inputbox{
padding:0;
}
</style>


<![endif]-->
<?php if ( $menustyle == 1 || $menustyle == 2 || $menustyle == 5) {?>
<!--[if lte IE 8]>
		<script type="text/javascript">
		sfHover = function() {
			var sfEls = document.getElementById("horiznav").getElementsByTagName("LI");
			for (var i=0; i<sfEls.length; i++) {
				sfEls[i].onmouseover=function() {
					this.className+=" sfHover";
				}
				sfEls[i].onmouseout=function() {
					this.className=this.className.replace(new RegExp(" sfHover\\b"), "");
				}
			}
		}
		if (window.attachEvent) window.attachEvent("onload", sfHover);
		</script>
<![endif]-->
<?php }?>
 <?php if ( $menustyle == 3 || $menustyle == 4) {?>

<!--[if lte IE 8]>
		<script type="text/javascript">
		sfHover = function() {
			var sfEls = document.getElementById("horiznav_d").getElementsByTagName("LI");
			for (var i=0; i<sfEls.length; i++) {
				sfEls[i].onmouseover=function() {
					this.className+=" sfHover";
				}
				sfEls[i].onmouseout=function() {
					this.className=this.className.replace(new RegExp(" sfHover\\b"), "");
				}
			}
		}
		if (window.attachEvent) window.attachEvent("onload", sfHover);
		</script>
<![endif]-->
<?php }?>
<?php if ( $menustyle == 2 ) {
echo '<script type="text/javascript" src="'.$yj_site.'/src/mouseover.js"></script>';
}?>
<?php if ( $menustyle == 4) {
echo '<script type="text/javascript" src="'.$yj_site.'/src/mouseover_d.js"></script>';
}?>
<?php if ( $menustyle == 3 || $menustyle == 4) {
echo '<script type="text/javascript" src="'.$yj_site.'/src/dropd.js"></script>';
}?>