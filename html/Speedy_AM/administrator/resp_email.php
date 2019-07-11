<?php require_once('../Connections/speedyam.php'); ?>
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

$colname_RS_ListaMensagens = "-1";
if (isset($_GET['id'])) {
  $colname_RS_ListaMensagens = $_GET['id'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_RS_ListaMensagens = sprintf("SELECT * FROM sm_mensagens WHERE men_id = %s", GetSQLValueString($colname_RS_ListaMensagens, "int"));
$RS_ListaMensagens = mysql_query($query_RS_ListaMensagens, $speedyam) or die(mysql_error());
$row_RS_ListaMensagens = mysql_fetch_assoc($RS_ListaMensagens);
$totalRows_RS_ListaMensagens = mysql_num_rows($RS_ListaMensagens);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Speedy AutoMotors -  Responder Mensagem</title>
<style type="text/css">
<!--
body table tr th {
	font-size: 16px;
	color: #00F;
	font-family: Verdana, Geneva, sans-serif;
	padding: 5px;
}
#Mensagem tr td{
	border: 2px dashed #06F;
	padding: 5px;
}
-->
</style>
</head>

<body>
<form id="Resposta" name="Resposta" method="post" action="enviar_resp.php">
<table width="640" border="0" align="center">
  <tr>
    <td colspan="2" align="center">Aqui voce esta Respondendo a mensagem do <strong><?php echo $row_RS_ListaMensagens['men_nome']; ?></strong>, com o assunto <strong><?php echo $row_RS_ListaMensagens['men_assunto']; ?></strong></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="2" align="center"><p><strong>Resposta da Mensagem</strong></p>
      <p>&nbsp;</p></th>
  </tr>
  <tr>
    <td colspan="2">
    
    <table width="460" border="0" align="center" id="Mensagem">
      <tr>
        <td width="91" valign="top">Nome: <strong></strong></td>
        <td width="359"><input name="nome" type="text" id="nome" size="50" /></td>
      </tr>
      <tr>
        <td valign="top">Telefone:</td>
        <td><input name="telefone" type="text" id="telefone" size="50" /></td>
      </tr>
      <tr>
        <td valign="top">Assunto: <strong></strong></td>
        <td><input name="assunto" type="text" id="assunto" size="50" /></td>
      </tr>
      <tr>
        <td valign="top"><p>Mensagem:</p></td>
        <td><textarea name="texto" cols="38" rows="10" id="texto"></textarea>

	    </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><p>
      <input name="email_resp" type="hidden" id="email_resp" value="<?php echo $row_RS_ListaMensagens['men_id']; ?>" />
      <input name="email_from" type="hidden" id="email_from" value="speedyautomotors@bol.com.br" />
    </p>
      <p>
        <input name="nome_resp" type="hidden" id="nome_resp" value="<?php echo $row_RS_ListaMensagens['men_nome']; ?>" />
      </p></td>
  </tr>
  
    <tr>
      <td width="50%"><input type="button" name="button" id="button" value="Fechar Janela" onclick="self.parent.tb_remove();"/></td>
      <td width="50%" align="right"><label>
        <input type="submit" name="enviar" id="enviar" value="Enviar Responta"/>
      </label></td>
    </tr>
  
</table>
</form>
</body>
</html>
<?php
mysql_free_result($RS_ListaMensagens);
?>
