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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO sm_mensagens (men_nome, men_telefone, men_email, men_assunto, men_mensagem, men_data) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['men_nome'], "text"),
                       GetSQLValueString($_POST['men_telefone'], "text"),
                       GetSQLValueString($_POST['men_email'], "text"),
                       GetSQLValueString($_POST['men_assunto'], "text"),
                       GetSQLValueString($_POST['men_mensagem'], "text"),
                       GetSQLValueString($_POST['men_data'], "date"));

  mysql_select_db($database_speedyam, $speedyam);
  $Result1 = mysql_query($insertSQL, $speedyam) or die(mysql_error());

  $insertGoTo = "contato.php?add=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_speedyam, $speedyam);
$query_Rs_menu = "SELECT pag_conteudo FROM sm_paginas WHERE pag_id = 2";
$Rs_menu = mysql_query($query_Rs_menu, $speedyam) or die(mysql_error());
$row_Rs_menu = mysql_fetch_assoc($Rs_menu);
$totalRows_Rs_menu = mysql_num_rows($Rs_menu);
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
    <!-- Esta tag param solicita que os usuários com o Flash Player 6.0 r65 e versões posteriores baixem a versão mais recente do Flash Player. Exclua-o se você não deseja que os usuários vejam o prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- A tag object a seguir aplica-se a navegadores que não sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="imagens/banner.swf" width="955" height="200">
      <!--<![endif]-->
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- O navegador exibe o seguinte conteúdo alternativo para usuários que tenham o Flash Player 6.0 e versões anteriores. -->
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
        <h1>Contate-nos</h1>
<p> &nbsp;&nbsp;Cras auctor tincidunt lectus vitae eleifend. Sed tellus nulla, facilisis in   tincidunt rutrum, molestie nec nunc. Mauris at augue nibh, quis egestas leo. Sed   a dui purus, eget rhoncus nunc. Sed leo urna, sollicitudin sit amet faucibus a,   viverra sit amet ipsum. Proin vel ligula ac libero vehicula pellentesque. Sed   nec nibh enim, dictum facilisis orci. Cum sociis natoque penatibus et magnis dis   parturient montes, nascetur ridiculus mus.</p>
<p>&nbsp;</p>
<p><br />
</p>
 <?php if (@$_GET['add'] == 'ok') { ?>
        <p id="se" >Obrugado pelo seu Contato!!! </p>
        <p >Em Breve estaremos respondendo sua Duvida ou Sugest&atilde;o !!!<br />
        <a href="Index.php">  Click aqui paraVoltar a pagina Inicial</a></p>
<?php } else { ?>   
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">Nome:</td>
      <td><input type="text" name="men_nome" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">Telefone:</td>
      <td><input type="text" name="men_telefone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">E-mail:</td>
      <td><input type="text" name="men_email" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">Assunto:</td>
      <td><input type="text" name="men_assunto" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" valign="top" nowrap="nowrap">Mensagem:</td>
      <td><textarea name="men_mensagem" cols="32" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td align="left" valign="top" nowrap="nowrap"><input type="reset" name="button" id="button" value="Limpar" /></td>
      <td align="right"><input type="submit" value="Inserir registro" /></td>
    </tr>
  </table>
  <input type="hidden" name="men_data" value="<?php echo date("Y/m/d H:i"); ?>" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
<?php } ?>
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
?>
