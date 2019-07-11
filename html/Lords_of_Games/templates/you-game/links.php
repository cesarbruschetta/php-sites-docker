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

function getYJLINKS(){
echo '<div id="yjcp">';
echo 'Copyright &copy; 2009 <a href="sobre.html" target="popupwindow" onclick="window.open("sobre.html", "popupwindow", "scrollbars=yes,width=590,height=360");return true">Cesar Augusto</a> - Todos os direitos reservados';
//<!-- Start 1FreeCounter.com code -->
echo '  <script language="JavaScript">';
echo '  var data = "&r=" + escape(document.referrer)';
echo '	+ "&n=" + escape(navigator.userAgent)';
echo '	+ "&p=" + escape(navigator.userAgent)';
echo '	+ "&g=" + escape(document.location.href);';

echo '  if (navigator.userAgent.substring(0,1)>"3")';
echo '    data = data + "&sd=" + screen.colorDepth ';
echo '	+ "&sw=" + escape(screen.width+"x"+screen.height);';

echo '  document.write("<a href="http://www.1freecounter.com/stats.php?i=50672" target=\"_blank\" >");';
echo '  document.write("<img alt="Free Counter" border=0 hspace=0 "+"vspace=0 src="http://www.1freecounter.com/counter.php?i=50672" + data + "">");';
echo '  document.write("</a>");';
echo '  </script>';
//<!-- End 1FreeCounter.com code -->

echo '</div>';
echo '<div id="validators">';
echo'<a href="index.php?format=feed&amp;type=rss" title="Our RSS feed" >RSS</a>|';
echo'<a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank" title="CSS Validity">CSS Valid</a>|';
//echo'<a href="http://validator.w3.org/check/referer" target="_blank" title="XHTML Validity">XHTML Valid</a>|';
echo'<a href="http://validator.w3.org/check/referer" target="_blank" title="CSS Validity">&nbsp;XHTML Valid&nbsp;</a>|';
echo'<a href="#color">&nbsp;Go to Top</a>';
echo '</div>';
}
?>
