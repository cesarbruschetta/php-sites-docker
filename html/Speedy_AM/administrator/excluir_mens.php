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

if ((isset($_POST['men_id'])) && ($_POST['men_id'] != "") && (isset($_GET['id']))) {
  $deleteSQL = sprintf("DELETE FROM sm_mensagens WHERE men_id=%s",
                       GetSQLValueString($_POST['men_id'], "int"));

  mysql_select_db($database_speedyam, $speedyam);
  $Result1 = mysql_query($deleteSQL, $speedyam) or die(mysql_error());

  $deleteGoTo = "excluir_mens.php?del=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Rs_ExcluirMensagem = "-1";
if (isset($_GET['id'])) {
  $colname_Rs_ExcluirMensagem = $_GET['id'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_ExcluirMensagem = sprintf("SELECT men_id, men_nome, men_assunto, men_data FROM sm_mensagens WHERE men_id = %s", GetSQLValueString($colname_Rs_ExcluirMensagem, "int"));
$Rs_ExcluirMensagem = mysql_query($query_Rs_ExcluirMensagem, $speedyam) or die(mysql_error());
$row_Rs_ExcluirMensagem = mysql_fetch_assoc($Rs_ExcluirMensagem);
$totalRows_Rs_ExcluirMensagem = mysql_num_rows($Rs_ExcluirMensagem);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Speedy AutoMotors -  Excluir Mensagem</title>
<style type="text/css">
<!--
#excluir table tr td p {
	font-weight: bolder;
	color: #000;
}
#excluir table tr td p a{
	font-weight: bolder;
	color: #00F;
}
-->
</style></head>

<body>
<form id="excluir" name="excluir" method="post" action="">
<table width="400" border="0" align="center">
    <?php if (@$_GET['del'] == 'ok' ) { ?>
	<tr> 	<td colspan="3" align="center"> <p> Sua Mensagem Foi excluida com Susse&ccedil;o </p>
	  <p><a href="#" onclick="self.parent.location=href='ler_mensagens.php'; self.parent.tb_remove();" >Click Aqui para fechar a janela</a></p>
      </td> </tr>
    <?Php } else {   ?>  
    <tr>
    <td height="64" colspan="3" align="center">Voce tem certeza que deseja excluir a Mensagem,
      <br />
      com as informa&ccedil;&otilde;es a baixo?<br /></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;&nbsp;Nome do Contato:&nbsp;&nbsp;&nbsp; <strong><?php echo $row_Rs_ExcluirMensagem['men_nome']; ?></strong></td>
  </tr>
   <tr>
    <td colspan="3">&nbsp;&nbsp;Assunto da Mensagem:&nbsp;&nbsp;&nbsp;<strong><?php echo $row_Rs_ExcluirMensagem['men_assunto']; ?></strong></td>
    </tr>
  <tr>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;&nbsp;Data Da Mensagem:&nbsp;&nbsp;&nbsp;<?php echo date('d/m/Y', strtotime($row_Rs_ExcluirMensagem['men_data']));  ?></td>
  </tr>
  <tr>
    <td width="99"><strong>
      <input type="button" name="button" id="button" value="N&atilde;o / Cancelar" onclick="self.parent.tb_remove();" />
    </strong></td>
    <td width="131"><input name="men_id" type="hidden" id="men_id" value="<?php echo $row_Rs_ExcluirMensagem['men_id']; ?>" /></td>
    <td width="156" align="right"><input type="submit" name="enviar" id="enviar" value="Sim / Excluir" /></td>
   </tr>
   <?php } ?> 
</table>
</form>
</body>
</html>
<?php
mysql_free_result($Rs_ExcluirMensagem);
?>
