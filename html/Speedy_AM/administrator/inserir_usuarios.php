<?php require_once('../Connections/speedyam.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "2";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php?usu=ok";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

$colname_Rs_testeUsuario = "-1";
if (isset($_POST['usu_login'])) {
  $colname_Rs_testeUsuario = $_POST['usu_login'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_testeUsuario = sprintf("SELECT usu_nome, usu_login FROM sm_usuarios WHERE usu_login = %s", GetSQLValueString($colname_Rs_testeUsuario, "text"));
$Rs_testeUsuario = mysql_query($query_Rs_testeUsuario, $speedyam) or die(mysql_error());
$row_Rs_testeUsuario = mysql_fetch_assoc($Rs_testeUsuario);
$totalRows_Rs_testeUsuario = mysql_num_rows($Rs_testeUsuario);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//Inserir usuario
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	$insertSQL = sprintf("INSERT INTO sm_usuarios (usu_nome, usu_email, usu_login, usu_senha, usu_nivel, usu_status) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['usu_nome'], "text"),
                       GetSQLValueString($_POST['usu_email'], "text"),
                       GetSQLValueString($_POST['usu_login'], "text"),
                       GetSQLValueString($_POST['usu_senha'], "text"),
                       GetSQLValueString($_POST['usu_nivel'], "int"),
                       GetSQLValueString($_POST['usu_status'], "int"));

  mysql_select_db($database_speedyam, $speedyam);
  $Result1 = mysql_query($insertSQL, $speedyam) or die(mysql_error());

  $insertGoTo = "inserir_usuarios.php?add=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template-adm.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Speedy AutoMotors - Inserir Usuario</title>

<!-- InstanceEndEditable -->
<link rel="shortcut icon" href= "../imagens/favicon.ico" />

<META NAME="AUTHOR" CONTENT="Cesar Augusto" />

<link href="../estilo-adm.css" rel="stylesheet" type="text/css" />

<!--------------------menu------------------------------------->
<link href="../menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="../js/hoverIntent.js"></script>
<script type="text/javascript" src="../js/superfish.js"></script>
<script type="text/javascript" src="../js/supersubs.js"></script>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        $("ul.sf-menu").supersubs({ 
            minWidth:    12,   // minimum width of sub-menus in em units 
            maxWidth:    27,   // maximum width of sub-menus in em units 
            extraWidth:  1     // extra width can ensure lines don't sometimes turn over 
                               // due to slight rounding differences and font-family 
        }).superfish();  // call supersubs first, then superfish, so that subs are 
                         // not display:none when measuring. Call before initialising 
                         // containing tabs for same reason. 
		
    }); 
</script>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<a name="top" id="top"></a>
<table width="0" border="0" align="center">
  <tr>    <td>
  	<div id="all">
    <div id="banner"><img src="../imagens/tmpl/banner.png" width="955" height="200" /></div>
    <div id="menu-adm">
    <div id="nav">
    <ul class="sf-menu">
    <li class="first-item"> <a href="home.php" style="border-left:none;">Home</a> </li>
    <li> <a href="#a">Administra&ccedil;&atilde;o de Conte&uacute;do</a>
      <ul>
        <li> <a href="inserir_conteudo.php">Inserir Conteúdo</a> </li>
        <li> <a href="editar_conteudo.php">Editar ou Excluir Conteúdo</a>
      </ul>
    </li>
    <li> <a href="#">Administra&ccedil;&atilde;o de Veiculos</a>
      <ul>
        <li> <a href="inserir_veiculos.php">Inserir Novos Veiculos</a> </li>
        <li> <a href="editar_veiculos.php">Editar ou Excluir Veiculos</a></li>
        <li class="current"> <a href="#">Administrar Fotos dos Veiculos</a>
      		<ul>
            <li> <a href="inserir_foto.php">Inserir Novas Fotos paras os Veiculos</a></li>
            <li> <a href="editar_fotos.php">Editar ou Excluir Foto dos Veiculos</a></li>
            </ul></li>
        </ul>
    </li>
     <li> <a href="#">Administra&ccedil;&atilde;o de Usuarios</a>
       <ul>
        <li> <a href="inserir_usuarios.php">Inserir novos usuarios</a> </li>
        <li> <a href="editar_usuarios.php">Editar ou Excluir Usuarios</a> </li>
      </ul>
    </li>
    <li> <a href="#">Administra&ccedil;&atilde;o de Mensagens</a>
       <ul>
        <li> <a href="ler_mensagens.php">Ler Mensagnes</a> </li>
        <li> <a href="enviar_email.php">Enviar E-mails</a> </li>
      </ul>
    </li>
    <li> <a href="<?php echo $logoutAction ?>">Sair / Logout</a> </li>
  </ul>
	</div></div>
    <div id="conteudo"><!-- InstanceBeginEditable name="Conteudo" -->
    <div id="conteudo">
            <h1> Inserir Novo Usuario</h1>
            <p>Sed ornare luctus augue ac facilisis. Aliquam bibendum pharetra justo, eu   rhoncus velit posuere et. Integer sollicitudin porttitor diam, et aliquet dui   gravida pharetra. Suspendisse arcu odio, auctor eu scelerisque vitae, accumsan   volutpat lectus. Aenean eget elit dui, vel aliquet orci. Quisque scelerisque   placerat dignissim. Maecenas varius urna quis eros molestie eget gravida diam   condimentum. Aenean lacinia, magna sit amet pulvinar lacinia, purus nulla   imperdiet turpis, eu laoreet tortor urna eu ante. Etiam est purus, egestas vitae   scelerisque vel, posuere ac eros. Sed quis lorem risus. Morbi nulla tortor,   dictum eu consequat sollicitudin, tincidunt dictum tortor. Nunc consequat erat   et erat gravida lacinia. </p>
  <p>&nbsp;</p>
  
            <?php if (@$_GET['add'] == 'ok') { ?>
			<p id="se">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Seu Usuario foi inserico com susse&ccedil;o, agora voce pode fazer o login com o novo usuario.</p>
			<p>&nbsp;</p>
			<p id="se"><a href="inserir_usuarios.php">Click aqui para inserir outro usuario.</a></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p> 	
            
            <?php } else { ?>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aqui voce podera inserir um novo usuario ao sistema.</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" >
              <table align="center">
                <tr valign="baseline">
                  <td align="right" valign="top" nowrap="nowrap">Nome do Usuario:</td>
                  <td><input type="text" name="usu_nome" value="" size="50" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right" valign="top" nowrap="nowrap">E-mail do usuario:</td>
                  <td><input type="text" name="usu_email" value="" size="50" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right" valign="top" nowrap="nowrap">Login:</td>
                  <td><input type="text" name="usu_login" value="" size="20" onfocus="<?php $verificar = $row_Rs_testeUsuario['usu_login']; 
				  if ($verificar == '') { echo ('verificar vazil'); } else { 	echo ('verificar cheia'); }	?>" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right" valign="top" nowrap="nowrap">Senha:</td>
                  <td><input type="password" name="usu_senha" value="" size="10" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right" valign="top" nowrap="nowrap">Nivel de acesso:</td>
                  <td valign="baseline"><table width="100%">
                    <tr>
                      <td width="50%"><input type="radio" name="usu_nivel" value="1" /> Usuario</td>
                      <td width="50%"><input type="radio" name="usu_nivel" value="2" /> Administrator</td>
                    </tr>
                    <tr>
                      
                    </tr>
                  </table></td>
                </tr>
                <tr valign="baseline">
                  <td align="right" valign="top" nowrap="nowrap">Status:</td>
                  <td><select name="usu_status">
                    <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>On-Line</option>
                    <option value="2" <?php if (!(strcmp(2, ""))) {echo "SELECTED";} ?>>Off-Line</option>
                  </select></td>
                </tr>
                <tr valign="baseline">
                  <td colspan="2" align="right" valign="top" nowrap="nowrap">&nbsp;</td>
                </tr>
                <tr valign="baseline">
                  <td align="left" valign="top" nowrap="nowrap"><input type="button" name="button" id="button" value="Cancelar" /></td>
                  <td align="right"><input type="submit" value="Inserir Usuario" /></td>
                </tr>
              </table>
              <input type="hidden" name="MM_insert" value="form1" />
            </form>
            <?php } ?>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
      <p>&nbsp;</p>
    </div>  
    <!-- InstanceEndEditable -->
      <p id="topo"><a href="#top">Topo /\</a>
</div>
    <div id="rodape">
      <p><strong><br />
        <br />
      Speedy AutoMotors</strong><br />
Av. Dom Pedro II, 2105  - Bairo Jardim<br />
Santo Andr&eacute; - SP <br />
Telefones (11) 6160-2010 - (11)8384-0777</p></div>
  	</div>

  </td>  </tr>
</table>
<p id="sobre">&copy; 2009 <a href="../sobre.html" target="popupwindow" onclick='window.open("sobre.html", "popupwindow", "scrollbars=yes,width=590,height=360");return true'>Cesar Augusto</a> - Todos os direitos reservados</p>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($Rs_testeUsuario);
?>
