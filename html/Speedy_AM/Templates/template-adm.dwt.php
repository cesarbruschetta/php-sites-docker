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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Speedy AutoMotors - </title>
<!-- TemplateEndEditable -->
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
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
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
    <div id="conteudo"><!-- TemplateBeginEditable name="Conteudo" -->
      <p>&nbsp;</p>
    <!-- TemplateEndEditable -->
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
</html>