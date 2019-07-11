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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE sm_veiculos SET vei_marca=%s, vei_modelo=%s, vei_ano=%s, vei_km=%s, vei_descricao=%s WHERE vei_id=%s",
                       GetSQLValueString($_POST['vei_marca'], "text"),
                       GetSQLValueString($_POST['vei_modelo'], "text"),
                       GetSQLValueString($_POST['vei_ano'], "text"),
                       GetSQLValueString($_POST['vei_km'], "text"),
                       GetSQLValueString($_POST['vei_descricao'], "text"),
                       GetSQLValueString($_POST['vei_id'], "int"));

  mysql_select_db($database_speedyam, $speedyam);
  $Result1 = mysql_query($updateSQL, $speedyam) or die(mysql_error());

  $updateGoTo = "editar_veic.php?edit=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Rs_VeiculoEditar = "-1";
if (isset($_GET['id'])) {
  $colname_Rs_VeiculoEditar = $_GET['id'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_VeiculoEditar = sprintf("SELECT * FROM sm_veiculos WHERE vei_id = %s", GetSQLValueString($colname_Rs_VeiculoEditar, "int"));
$Rs_VeiculoEditar = mysql_query($query_Rs_VeiculoEditar, $speedyam) or die(mysql_error());
$row_Rs_VeiculoEditar = mysql_fetch_assoc($Rs_VeiculoEditar);
$totalRows_Rs_VeiculoEditar = mysql_num_rows($Rs_VeiculoEditar);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Speedy AutoMotors -  Editar Veiculo</title>
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
#form1 table tr #fck {
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
    <th height="30" align="center">Aqui voce podera Editar o Veiculo: <strong>(<?php echo $row_Rs_VeiculoEditar['vei_marca']; ?> / <?php echo $row_Rs_VeiculoEditar['vei_modelo']; ?>)</strong></th>
  </tr>
  <tr>
    <td><?php
	if (@$_GET['edit'] == 'ok' ) { ?> 
    <p id="editar"> Seu Veiculo foi aualizada com susse&ccedil;o<br />
      <br />
    </p>
      <p id="editar"><a href="#" onclick="self.parent.location=href='editar_veiculos.php'; self.parent.tb_remove();">Click aqui para fehar essa janela!!</a></p>
        <?php } else { ?>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Marca do Veiculo:</td>
            <td><input type="text" name="vei_marca" value="<?php echo htmlentities($row_Rs_VeiculoEditar['vei_marca'], ENT_COMPAT, 'iso-8859-1'); ?>" size="50" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Modelo do Veiculo:</td>
            <td><input type="text" name="vei_modelo" value="<?php echo htmlentities($row_Rs_VeiculoEditar['vei_modelo'], ENT_COMPAT, 'iso-8859-1'); ?>" size="50" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Ano de Fabricação:</td>
            <td><input type="text" name="vei_ano" value="<?php echo htmlentities($row_Rs_VeiculoEditar['vei_ano'], ENT_COMPAT, 'iso-8859-1'); ?>" size="16" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Km:</td>
            <td><input type="text" name="vei_km" value="<?php echo htmlentities($row_Rs_VeiculoEditar['vei_km'], ENT_COMPAT, 'iso-8859-1'); ?>" size="20" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Descricao do veiculo:</td>
            <td id="fck">
            <?php
$valor = $row_Rs_VeiculoEditar['vei_descricao'];

include("../fckeditor/fckeditor_php4.php") ;
// Automatically calculates the editor base path based on the _samples directory.
// This is usefull only for these samples. A real application should use something like this:
// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.

$oFCKeditor = new FCKeditor('vei_descricao') ;
$oFCKeditor->BasePath	= '../fckeditor/' ;
$oFCKeditor->Value		= "{$valor}" ;
$oFCKeditor->Create() ;
?></td>
          </tr>

          <tr valign="baseline">
            <td align="left" valign="bottom" nowrap="nowrap"><input type="button" name="button" id="button" value="Cancelar" onclick="self.parent.tb_remove();"/></td>
            <td height="40" align="right" valign="bottom"><input type="submit" value="Atualizar Veiculo" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="vei_id" value="<?php echo $row_Rs_VeiculoEditar['vei_id']; ?>" />
      </form>
      <?php } ?>
    </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Rs_VeiculoEditar);
?>
