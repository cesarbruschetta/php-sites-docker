<?php require_once('Connections/speedyam.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_speedyam, $speedyam);
$query_Rs_menu = "SELECT pag_conteudo FROM sm_paginas WHERE pag_id = 2";
$Rs_menu = mysql_query($query_Rs_menu, $speedyam) or die(mysql_error());
$row_Rs_menu = mysql_fetch_assoc($Rs_menu);
$totalRows_Rs_menu = mysql_num_rows($Rs_menu);

mysql_select_db($database_speedyam, $speedyam);
$query_Rs_veiculos = "SELECT * FROM sm_veiculos ORDER BY vei_id ASC";
$Rs_veiculos = mysql_query($query_Rs_veiculos, $speedyam) or die(mysql_error());
$row_Rs_veiculos = mysql_fetch_assoc($Rs_veiculos);
$totalRows_Rs_veiculos = mysql_num_rows($Rs_veiculos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Speedy AutoMotors -</title>
<!-- InstanceEndEditable -->
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href= "imagens/favicon.ico" />

<META NAME="AUTHOR" CONTENT="Cesar Augusto" />


<!-- InstanceBeginEditable name="head" -->

<!-- InstanceEndEditable -->
</head>

<body>
<a name="top" id="top"></a>
<table border="0" align="center">
<tr><td><div id="all">
<div id="banner">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="955" height="200" id="FlashID" title="Banner">
    <param name="movie" value="imagens/banner.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="6.0.65.0" />
    <!-- Esta tag param solicita que os usu�rios com o Flash Player 6.0 r65 e vers�es posteriores baixem a vers�o mais recente do Flash Player. Exclua-o se voc� n�o deseja que os usu�rios vejam o prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- A tag object a seguir aplica-se a navegadores que n�o sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="imagens/banner.swf" width="955" height="200">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- O navegador exibe o seguinte conte�do alternativo para usu�rios que tenham o Flash Player 6.0 e vers�es anteriores. -->
      <div>
        <h4>O conte&uacute;do desta p&aacute;gina requer uma vers&atilde;o mais recente do Adobe Flash Player.</h4>
        <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter Adobe Flash player" /></a></p>
      </div>
      <!--[if !IE]-->
    </object>
    <!--<![endif]-->
  </object>
</div>
<table border="0">
  <tr valign="top">
    <td><div id="menu">
      <?php echo $row_Rs_menu['pag_conteudo']; ?>
    </div></td>  <td>
      <div id="conteudo"><!-- InstanceBeginEditable name="Conteudo-Principal" -->
        <h1>Classificados ( Nosso Carros)</h1>
        <p>&nbsp;</p>
        <p>Vestibulum mattis, nunc non volutpat consequat, est dolor mattis ipsum, id   consectetur ligula augue at ipsum. Donec pharetra lacinia massa, et blandit   sapien auctor eget. Suspendisse ligula orci, molestie facilisis auctor quis,   lacinia quis odio. Donec porttitor consectetur dolor, quis interdum metus   faucibus gravida. Aenean rhoncus nulla at tellus aliquet a bibendum nulla   cursus. Sed nibh sem, vehicula quis scelerisque non, accumsan sit amet nisl.   </p>
        <p>&nbsp;</p>
        
          <table border="0" >
          <tr>  
          <?php do { ?>
          <td id="anuncios"><p><strong><a href="anuncio.php?id=<?php echo $row_Rs_veiculos['vei_id']; ?>"><?php echo $row_Rs_veiculos['vei_marca']; ?> / <?php echo $row_Rs_veiculos['vei_modelo']; ?></a></strong></p>
              <p>&nbsp;</p>
              <p>&nbsp; </p>
            <p>Ano: <?php echo $row_Rs_veiculos['vei_ano']; ?> / Km: <?php echo $row_Rs_veiculos['vei_km']; ?></p>
            <p>&nbsp;</p>
            <p>Descri&ccedil;&atilde;o: </p></td>
        <?php $row_Rs_veiculos = mysql_fetch_assoc($Rs_veiculos); 
		if (!isset($crialinha)) {
        	$crialinha = 1;
		}
		if(isset($row_Rs_veiculos) && is_array($row_Rs_veiculos) && $crialinha++ % 3==0) {
		echo "</tr><tr>";
		}
		} while ($row_Rs_veiculos);?>
        </tr>
          </table>
                  
		<p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt orci   ipsum, sit amet tincidunt nisl. Donec egestas ultricies justo, ut sollicitudin   mauris malesuada in. Phasellus imperdiet mollis ullamcorper. Fusce lacus nisi,   ultricies sed vehicula in, sollicitudin mollis urna. Nulla diam dolor,   vestibulum sed pretium pharetra, venenatis quis magna. </p>
      <!-- InstanceEndEditable -->
      <p id="topo"><a href="#top">Topo /\</a>
</div></td>
  </tr>
</table>
<div id="rodape"> <p><strong><br />
        <br />
      Speedy AutoMotors</strong><br />
Av. Dom Pedro II, 2105  - Bairo Jardim<br />
Santo Andr&eacute; - SP <br />
Telefones (11) 6160-2010 - (11)8384-0777</p></div>

</div>
</td></tr></table>
<p id="sobre">&copy; 2009 <a href="sobre.html" target="popupwindow" onclick='window.open("sobre.html", "popupwindow", "scrollbars=yes,width=590,height=360");return true'>Cesar Augusto</a> - Todos os direitos reservados</p>
<!-- Start 1FreeCounter.com code -->
<p id="sobre">  
  <script language="JavaScript">
  var data = '&r=' + escape(document.referrer)
	+ '&n=' + escape(navigator.userAgent)
	+ '&p=' + escape(navigator.userAgent)
	+ '&g=' + escape(document.location.href);

  if (navigator.userAgent.substring(0,1)>'3')
    data = data + '&sd=' + screen.colorDepth 
	+ '&sw=' + escape(screen.width+'x'+screen.height);

  document.write('<a href="http://www.1freecounter.com/stats.php?i=55072" target=\"_blank\" >');
  document.write('<img alt="Free Counter" border=0 hspace=0 '+'vspace=0 src="http://www.1freecounter.com/counter.php?i=55072' + data + '">');
  document.write('</a>');
  </script>

<!-- End 1FreeCounter.com code --></p>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
swfobject.registerObject("FlashID");
//-->
</script>
</body>

<!-- InstanceEnd --></html>
<?php
mysql_free_result($Rs_menu);

mysql_free_result($Rs_veiculos);
?>
