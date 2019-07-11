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

if ((isset($_POST['fot_id'])) && ($_POST['fot_id'] != "") && (isset($_GET['id']))) {
  $deleteSQL = sprintf("DELETE FROM sm_fotos_veiculos WHERE fotv_id=%s",
                       GetSQLValueString($_POST['fot_id'], "int"));

  mysql_select_db($database_speedyam, $speedyam);
  $Result1 = mysql_query($deleteSQL, $speedyam) or die(mysql_error());

  $deleteGoTo = "excluir_pag.php?del=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_Rs_ExcluirFoto = "-1";
if (isset($_GET['id'])) {
  $colname_Rs_ExcluirFoto = $_GET['id'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_ExcluirFoto = sprintf("SELECT * FROM sm_fotos_veiculos WHERE fotv_id = %s", GetSQLValueString($colname_Rs_ExcluirFoto, "int"));
$Rs_ExcluirFoto = mysql_query($query_Rs_ExcluirFoto, $speedyam) or die(mysql_error());
$row_Rs_ExcluirFoto = mysql_fetch_assoc($Rs_ExcluirFoto);
$totalRows_Rs_ExcluirFoto = mysql_num_rows($Rs_ExcluirFoto);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Speedy AutoMotors -  Excluir Conteudo</title>
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
	<tr> 	<td colspan="3" align="center"> <p> Sua Foto Foi excluida com Susse&ccedil;o </p>
	  <p><a href="#" onclick="self.parent.location=href='editar_fotos.php'; self.parent.tb_remove();" >Click Aqui para fechar a janela</a></p>
      </td> </tr>
    <?Php } else {   ?>  
    <tr>
    <td height="64" colspan="3" align="center">Voce tem certeza que deseja excluir a Foto,
      <br />
      com as informa&ccedil;&otilde;es a baixo?<br /></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;&nbsp;ID Da Foto:&nbsp;&nbsp;&nbsp; <strong><?php echo $row_Rs_ExcluirFoto['fotv_id']; ?></strong></td>
  </tr>
   <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="3">&nbsp;&nbsp;&nbsp;ID Do Veiculo: &nbsp;&nbsp;&nbsp;<strong><?php echo $row_Rs_ExcluirFoto['fotv_id_veiculo']; ?></strong></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="99"><strong>
      <input type="button" name="button" id="button" value="N&atilde;o / Cancelar" onclick="self.parent.tb_remove();" />
    </strong></td>
    <td width="131"><input name="fot_id" type="hidden" id="fot_id" value="<?php echo $row_Rs_ExcluirFoto['fotv_id']; ?>" /></td>
    <td width="156" align="right"><input type="submit" name="enviar" id="enviar" value="Sim / Excluir" /></td>
   </tr>
   <?php } ?> 
</table>
</form>
</body>
</html>
<?php
mysql_free_result($Rs_ExcluirFoto);
?>
