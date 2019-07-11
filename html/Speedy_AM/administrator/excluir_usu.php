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

if ((isset($_POST['usu_id'])) && ($_POST['usu_id'] != "") && (isset($_GET['id']))) {
  $deleteSQL = sprintf("DELETE FROM sm_usuarios WHERE usu_id=%s",
                       GetSQLValueString($_POST['usu_id'], "int"));

  mysql_select_db($database_speedyam, $speedyam);
  $Result1 = mysql_query($deleteSQL, $speedyam) or die(mysql_error());

  $deleteGoTo = "excluir_usu.php?del=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Rs_ExcluirUsuario = "-1";
if (isset($_GET['id'])) {
  $colname_Rs_ExcluirUsuario = $_GET['id'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_ExcluirUsuario = sprintf("SELECT usu_id, usu_nome, usu_email, usu_nivel, usu_status FROM sm_usuarios WHERE usu_id = %s", GetSQLValueString($colname_Rs_ExcluirUsuario, "int"));
$Rs_ExcluirUsuario = mysql_query($query_Rs_ExcluirUsuario, $speedyam) or die(mysql_error());
$row_Rs_ExcluirUsuario = mysql_fetch_assoc($Rs_ExcluirUsuario);
$totalRows_Rs_ExcluirUsuario = mysql_num_rows($Rs_ExcluirUsuario);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Speedy AutoMotors -  Excluir Usuario</title>
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
<table width="500" border="0" align="center">
    <?php if (@$_GET['del'] == 'ok' ) { ?>
	<tr> 	<td colspan="3" align="center"> <p> Seu Usuario Foi excluido com Susse&ccedil;o </p>
	  <p><a href="#" onclick=" self.parent.location=href='editar_usuarios.php'; self.parent.tb_remove();" >Click Aqui para fechar a janela</a></p>
      </td> </tr>
    <?Php } else {   ?>  
    <tr>
    <td height="55" colspan="3" align="center">Voce tem certeza que deseja excluir o Usuario,
      <br />
      com as informa&ccedil;&otilde;es a baixo?<br /></td>
  </tr>
  <tr>
    <td height="28" colspan="3">&nbsp;&nbsp;&nbsp;Nome do Usuario:&nbsp;&nbsp; <strong><?php echo $row_Rs_ExcluirUsuario['usu_nome']; ?></strong></td>
  </tr>
   <tr>
    <td colspan="3">&nbsp;&nbsp;&nbsp;E-mail do Usuario:&nbsp;&nbsp;&nbsp;<strong><?php echo $row_Rs_ExcluirUsuario['usu_email']; ?></strong></td>
    </tr>
  <tr>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;&nbsp;&nbsp;Nivel de acesso: <?php if ($row_Rs_ExcluirUsuario['usu_nivel'] == 1) { echo '<strong>&nbsp;&nbsp; Usuario</strong>'; } else if ($row_Rs_ExcluirUsuario['usu_nivel'] == 2) { echo '<strong>&nbsp;&nbsp; Administrador</strong>'; } ?></td>
    <td>&nbsp;&nbsp;&nbsp;Status: <?php if  ($row_Rs_ExcluirUsuario['usu_status'] == 1) { echo '<strong>&nbsp;&nbsp; On-Line </strong>'; } else if ($row_Rs_ExcluirUsuario['usu_status'] == 2) { echo '<strong>&nbsp;&nbsp; Of-Line </strong>'; } ?></td>
  </tr>
    <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td width="101"><strong>
      <input type="button" name="button" id="button" value="N&atilde;o / Cancelar" onclick="self.parent.tb_remove();" />
    </strong></td>
    <td width="112"><input name="usu_id" type="hidden" id="usu_id" value="<?php echo $row_Rs_ExcluirUsuario['usu_id']; ?>" /></td>
    <td width="173" align="right"><input type="submit" name="enviar" id="enviar" value="Sim / Excluir" /></td>
   </tr>

   <?php } ?> 
</table>
</form>
</body>
</html>
<?php
mysql_free_result($Rs_ExcluirUsuario);
?>
