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
  $updateSQL = sprintf("UPDATE sm_usuarios SET usu_nome=%s, usu_email=%s, usu_login=%s, usu_senha=%s, usu_nivel=%s, usu_status=%s WHERE usu_id=%s",
                       GetSQLValueString($_POST['usu_nome'], "text"),
                       GetSQLValueString($_POST['usu_email'], "text"),
                       GetSQLValueString($_POST['usu_login'], "text"),
                       GetSQLValueString($_POST['usu_senha'], "text"),
                       GetSQLValueString($_POST['usu_nivel'], "int"),
                       GetSQLValueString($_POST['usu_status'], "int"),
                       GetSQLValueString($_POST['usu_id'], "int"));

  mysql_select_db($database_speedyam, $speedyam);
  $Result1 = mysql_query($updateSQL, $speedyam) or die(mysql_error());

  $updateGoTo = "editar_usu.php?edit=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Rs_ListaUsuarios = "-1";
if (isset($_GET['id'])) {
  $colname_Rs_ListaUsuarios = $_GET['id'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_ListaUsuarios = sprintf("SELECT * FROM sm_usuarios WHERE usu_id = %s", GetSQLValueString($colname_Rs_ListaUsuarios, "int"));
$Rs_ListaUsuarios = mysql_query($query_Rs_ListaUsuarios, $speedyam) or die(mysql_error());
$row_Rs_ListaUsuarios = mysql_fetch_assoc($Rs_ListaUsuarios);
$totalRows_Rs_ListaUsuarios = mysql_num_rows($Rs_ListaUsuarios);

$colname_Rs_VerificaLogin = "-1";
if (isset($_POST['usu_login'])) {
  $colname_Rs_VerificaLogin = $_POST['usu_login'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_VerificaLogin = sprintf("SELECT usu_nome, usu_login FROM sm_usuarios WHERE usu_login = %s", GetSQLValueString($colname_Rs_VerificaLogin, "text"));
$Rs_VerificaLogin = mysql_query($query_Rs_VerificaLogin, $speedyam) or die(mysql_error());
$row_Rs_VerificaLogin = mysql_fetch_assoc($Rs_VerificaLogin);
$totalRows_Rs_VerificaLogin = mysql_num_rows($Rs_VerificaLogin);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Speedy AutoMotors - Editar Usuario</title>
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
</style>
<script language="javascript">
function Verificar() {
$verificar =<?php echo $row_Rs_VerificaLogin['usu_login']; ?>
	if ($verificar == '') {
	alert ("verificar vazil")	
	} else {
	alert ("verificar cheia")}	
	
}
</script>



</head>

<body>
<table width="600" border="0" align="center">
  <tr>
    <th>Aqui voce podera Editar os Dados do Usuario: <strong>(<?php echo $row_Rs_ListaUsuarios['usu_nome']; ?>)</strong></th>
  </tr>
  <tr>
    <td height="10">&nbsp;</td>
  </tr>
  <tr>
    <td><?php if (@$_GET['edit'] == 'ok' ) { ?> 
    <p id="editar"> Sua pagina foi aualizada com susse&ccedil;o </p>
      <p id="editar"><a href="#" onclick="self.parent.location=href='editar_usuarios.php'; self.parent.tb_remove();">Click aqui para fehar essa janela!!</a></p>
    <?php } else { ?>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Nome do Usuario:</td>
            <td><input type="text" name="usu_nome" value="<?php echo htmlentities($row_Rs_ListaUsuarios['usu_nome'], ENT_COMPAT, 'iso-8859-1'); ?>" size="50" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">E-mail do Usuario:</td>
            <td><input type="text" name="usu_email" value="<?php echo htmlentities($row_Rs_ListaUsuarios['usu_email'], ENT_COMPAT, 'iso-8859-1'); ?>" size="50" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Login:</td>
            <td><input type="text" name="usu_login" value="<?php echo htmlentities($row_Rs_ListaUsuarios['usu_login'], ENT_COMPAT, 'iso-8859-1'); ?>" size="20" onchange="verificar();"/></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Senha:</td>
            <td><input type="password" name="usu_senha" value="<?php echo $row_Rs_ListaUsuarios['usu_senha']; ?>" size="10" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Nivel de Acesso:</td>
            <td valign="baseline"><table width="100%">
              <tr>
                <td width="50%"><input type="radio" name="usu_nivel" value="1" <?php if (!(strcmp(htmlentities($row_Rs_ListaUsuarios['usu_nivel'], ENT_COMPAT, 'iso-8859-1'),1))) {echo "checked=\"checked\"";} ?> />
                  Usuario</td>
                  <td width="50%"><input type="radio" name="usu_nivel" value="2" <?php if (!(strcmp(htmlentities($row_Rs_ListaUsuarios['usu_nivel'], ENT_COMPAT, 'iso-8859-1'),2))) {echo "checked=\"checked\"";} ?> />
                  Administrator</td>
              </tr>
            </table></td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="top" nowrap="nowrap">Status:</td>
            <td><select name="usu_status">
              <option value="1" <?php if (!(strcmp(1, htmlentities($row_Rs_ListaUsuarios['usu_status'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>On-Line</option>
              <option value="2" <?php if (!(strcmp(2, htmlentities($row_Rs_ListaUsuarios['usu_status'], ENT_COMPAT, 'iso-8859-1')))) {echo "SELECTED";} ?>>Off-Line</option>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td colspan="2" align="left" valign="top" nowrap="nowrap">&nbsp;</td>
          </tr>
          <tr valign="baseline">
            <td align="left" valign="top" nowrap="nowrap"><input type="button" name="button" id="button" value="Cancelar" onclick="self.parent.tb_remove();" /></td>
            <td align="right"><input type="submit" value="Atualizar Usuarios" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="usu_id" value="<?php echo $row_Rs_ListaUsuarios['usu_id']; ?>" />
      </form>
      <?php } ?>
      </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Rs_ListaUsuarios);

mysql_free_result($Rs_VerificaLogin);
?>
