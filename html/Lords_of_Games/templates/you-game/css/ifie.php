<?php header("Content-type: text/css"); ?>
<?php
$template_path = dirname( dirname( $_SERVER['REQUEST_URI'] ) );
?>
html .png,
div .png,
div.arrow,.yjsquare h3,.componentheading_frontpage {
azimuth: expression(
this.pngSet?this.pngSet=true:(this.nodeName == "IMG" && this.src.toLowerCase().indexOf('.png')>-1?(this.runtimeStyle.backgroundImage = "none",
this.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + this.src + "', sizingMethod='image')",
this.src = "<?php echo $template_path; ?>/images/blank.gif"):(this.origBg = this.origBg? this.origBg :this.currentStyle.backgroundImage.toString().replace('url("','').replace('")',''),
this.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + this.origBg + "', sizingMethod='crop')",
this.runtimeStyle.backgroundImage = "none")),this.pngSet=true
);
}

#horiznav a {line-height: 37px;_line-height: 37px;_margin-left:0px;_float:left;}
#horiznav li:hover,#horiznav li.sfHover,#horiznav {_position:relative;z-index:10000;}
#horiznav li ul {_top:37px;_position:absolute;margin:0px 0 0 0px;}
#horiznav li li:hover ul,
#horiznav li.sfHover ul,
#horiznav li li.sfHover ul,
#horiznav li li li.sfHover ul
,#horiznav li li li li.sfHover ul {_left:0;}
#horiznav li ul ul {_margin: -37px 0 0 170px;}
#horiznav ul ul a {width: 170px;}
#horiznav ul li li {position:relative;margin:0 0px 0 0;}
.readon{
width:90px;
}