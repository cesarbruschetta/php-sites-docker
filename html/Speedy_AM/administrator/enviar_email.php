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
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

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
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template-adm.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Speedy AutoMotors - Enviar Email</title>
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
     <div id="editar">
     
       <h1>Enviar E-mail </h1>
       <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aqui voce podera enviar email para seu clientes.</p>
       <p>&nbsp;</p>
       <form id="form1" name="form1" method="post" action="enviar.php">
         <table border="0" align="center" id="stilo_email">
           <tr>
             <td width="86" align="left" valign="top">Nome</td>
             <td>               <input name="nome" type="text" id="nome" size="50" /></td>
           </tr>
           <tr>
             <td align="left" valign="top">Telefone</td>
             <td><input name="telefone" type="text" id="telefone" size="50" /></td>
           </tr>
           <tr>
             <td align="left" valign="top">E-mail</td>
             <td><input name="email" type="text" id="email" size="50" /></td>
           </tr>
           <tr>
             <td align="left" valign="top">Assunto</td>
             <td><input name="assunto" type="text" id="assunto" size="50" /></td>
           </tr>
           <tr>
             <td align="left" valign="top">Mensagem</td>
             <td><textarea name="texto" cols="38" rows="10" id="texto"></textarea></td>
           </tr>
           <tr>
             <td align="left" valign="top">&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td align="left" valign="top"><input type="reset" name="button" id="button" value="Limpar" /></td>
             <td align="right"><input type="submit" name="envair" id="envair" value="Enviar E-mail" /></td>
             </tr>
         </table>
       </form>
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