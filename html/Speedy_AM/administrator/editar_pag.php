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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "edit")) {
  $updateSQL = sprintf("UPDATE sm_paginas SET pag_nome=%s, pag_status=%s, pag_titulo=%s, pag_conteudo=%s WHERE pag_id=%s",
                       GetSQLValueString($_POST['pag_nome'], "text"),
                       GetSQLValueString($_POST['pag_status'], "int"),
                       GetSQLValueString($_POST['pag_titulo'], "text"),
                       GetSQLValueString($_POST['pag_conteudo'], "text"),
                       GetSQLValueString($_POST['pag_id'], "int"));

  mysql_select_db($database_speedyam, $speedyam);
  $Result1 = mysql_query($updateSQL, $speedyam) or die(mysql_error());

  $updateGoTo = "editar_pag.php?edit=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Rs_PaginaEditar = "-1";
if (isset($_GET['id'])) {
  $colname_Rs_PaginaEditar = $_GET['id'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_PaginaEditar = sprintf("SELECT pag_id, pag_nome, pag_status, pag_titulo, pag_conteudo FROM sm_paginas WHERE pag_id = %s", GetSQLValueString($colname_Rs_PaginaEditar, "int"));
$Rs_PaginaEditar = mysql_query($query_Rs_PaginaEditar, $speedyam) or die(mysql_error());
$row_Rs_PaginaEditar = mysql_fetch_assoc($Rs_PaginaEditar);
$totalRows_Rs_PaginaEditar = mysql_num_rows($Rs_PaginaEditar);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Speedy AutoMotors -  Editar Conteudo</title>
<style type="text/css">
<!--
body table tr th {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: medium;
}
#edit #form {
	border: 1px dashed #000;
}
body table tr td p {
	text-align: center;
	font-family: Georgia, "Times New Roman", Times, serif;
	font-weight: bolder;
	color: #000;
}
#edit table tr #fck {
	border: 1px solid #000;
}
#editar a {
	color: #00F;
}
-->
</style></head>

<body>
<table width="750" border="0"  align="center">
  <tr>
    <th height="30" align="center">Aqui voce podera Editar o conteudo da pagina: <strong>(<?php echo $row_Rs_PaginaEditar['pag_nome']; ?>)</strong></th>
  </tr>
  <tr>
    <td height="10">&nbsp;</td>
  </tr>
  <tr>
    <td><?php
	if (@$_GET['edit'] == 'ok' ) { ?> 
    <p id="editar"> Sua pagina foi aualizada com susse&ccedil;o </p>
      <p id="editar"><a href="#" onclick="self.parent.location=href='editar_conteudo.php'; self.parent.tb_remove();">Click aqui para fehar essa janela!!</a></p>
    <?PHP } else { ?>
    <form action="<?php echo $editFormAction; ?>" method="POST" name="edit" id="edit">
      <table  id="form" width="750" align="center">
        <tr valign="baseline">
          <td width="130" align="right" valign="top" nowrap="nowrap">Nome da Pagina:</td>
          <td width="600"><input type="text" name="pag_nome" value="<?php echo $row_Rs_PaginaEditar['pag_nome']; ?>" size="50" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right" valign="top" nowrap="nowrap">Status Da pagina:</td>
          <td><select name="pag_status">
            <option value="1" <?php if (!(strcmp(1, htmlentities($row_Rs_PaginaEditar['pag_status'], ENT_COMPAT, 'iso-8859-1')))) {echo "selected=\"selected\"";} ?>>On-Line</option>
            <option value="2" <?php if (!(strcmp(2, htmlentities($row_Rs_PaginaEditar['pag_status'], ENT_COMPAT, 'iso-8859-1')))) {echo "selected=\"selected\"";} ?>>Off-Line</option>
          </select></td>
        </tr>
        <tr valign="baseline">
          <td align="right" valign="top" nowrap="nowrap">Titulo da Pagina:</td>
          <td><input type="text" name="pag_titulo" value="<?php echo $row_Rs_PaginaEditar['pag_titulo']; ?>" size="50" /></td>
        </tr>
        <tr valign="baseline">
          <td align="right" valign="top" nowrap="nowrap">Conteudo da Pagina: </td>
          <td id="fck"><?php 

$valor = $row_Rs_PaginaEditar['pag_conteudo'];

include("../fckeditor/fckeditor.php");

// Automatically calculates the editor base path based on the _samples directory.
// This is usefull only for these samples. A real application should use something like this:
// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.

$oFCKeditor = new FCKeditor('pag_conteudo');
$oFCKeditor->BasePath	= '../fckeditor/';
$oFCKeditor->Value		= "{$valor}";
$oFCKeditor->Create() ;
?>
</td>
        </tr>
        <tr> <td height="10" colspan="2">&nbsp;</td> </tr>
        <tr valign="baseline">
          <td align="left" valign="top" nowrap="nowrap"><input type="button" name="button" id="button" value="Cancelar" onclick="self.parent.tb_remove();" /></td>
          <td align="right"><input type="submit" value="Atualizar Pagina" /></td>
        </tr>
      </table>
      <input type="hidden" name="pag_id" value="<?php echo $row_Rs_PaginaEditar['pag_id']; ?>" />
      <input type="hidden" name="MM_update" value="edit" />
    </form>
    <?php } ?>
    </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Rs_PaginaEditar);
?>
