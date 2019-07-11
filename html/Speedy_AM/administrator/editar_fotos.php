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

$maxRows_Rs_Lista_Fotos = 10;
$pageNum_Rs_Lista_Fotos = 0;
if (isset($_GET['pageNum_Rs_Lista_Fotos'])) {
  $pageNum_Rs_Lista_Fotos = $_GET['pageNum_Rs_Lista_Fotos'];
}
$startRow_Rs_Lista_Fotos = $pageNum_Rs_Lista_Fotos * $maxRows_Rs_Lista_Fotos;

mysql_select_db($database_speedyam, $speedyam);
$query_Rs_Lista_Fotos = "SELECT * FROM sm_fotos_veiculos WHERE fotv_id_veiculo = '".@$_GET['id_veic']."' ORDER BY fotv_id ASC";
$query_limit_Rs_Lista_Fotos = sprintf("%s LIMIT %d, %d", $query_Rs_Lista_Fotos, $startRow_Rs_Lista_Fotos, $maxRows_Rs_Lista_Fotos);
$Rs_Lista_Fotos = mysql_query($query_limit_Rs_Lista_Fotos, $speedyam) or die(mysql_error());
$row_Rs_Lista_Fotos = mysql_fetch_assoc($Rs_Lista_Fotos);

if (isset($_GET['totalRows_Rs_Lista_Fotos'])) {
  $totalRows_Rs_Lista_Fotos = $_GET['totalRows_Rs_Lista_Fotos'];
} else {
  $all_Rs_Lista_Fotos = mysql_query($query_Rs_Lista_Fotos);
  $totalRows_Rs_Lista_Fotos = mysql_num_rows($all_Rs_Lista_Fotos);
}
$totalPages_Rs_Lista_Fotos = ceil($totalRows_Rs_Lista_Fotos/$maxRows_Rs_Lista_Fotos)-1;

mysql_select_db($database_speedyam, $speedyam);
$query_Rs_ListaVeiculos = "SELECT * FROM sm_veiculos ORDER BY vei_id ASC";
$Rs_ListaVeiculos = mysql_query($query_Rs_ListaVeiculos, $speedyam) or die(mysql_error());
$row_Rs_ListaVeiculos = mysql_fetch_assoc($Rs_ListaVeiculos);
$totalRows_Rs_ListaVeiculos = mysql_num_rows($Rs_ListaVeiculos);

$colname_Rs_VeiculoSelecao = "-1";
if (isset($_GET['id_veic'])) {
  $colname_Rs_VeiculoSelecao = $_GET['id_veic'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_VeiculoSelecao = sprintf("SELECT vei_id, vei_marca, vei_modelo, vei_ano FROM sm_veiculos WHERE vei_id = %s", GetSQLValueString($colname_Rs_VeiculoSelecao, "int"));
$Rs_VeiculoSelecao = mysql_query($query_Rs_VeiculoSelecao, $speedyam) or die(mysql_error());
$row_Rs_VeiculoSelecao = mysql_fetch_assoc($Rs_VeiculoSelecao);
$totalRows_Rs_VeiculoSelecao = mysql_num_rows($Rs_VeiculoSelecao);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template-adm.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Speedy AutoMotors - Editar Fotos</title>
<script type="text/javascript" src="../thickbox/jquery-latest.js"></script>
<script type="text/javascript" src="../thickbox/thickbox.js"></script>
<link rel="stylesheet" href="../thickbox/thickbox.css" type="text/css" media="screen" />
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
      <h1>Editar ou Excluir Fotos do Veiculos</h1>
      <p>Sed ornare luctus augue ac facilisis. Aliquam bibendum pharetra justo, eu   rhoncus velit posuere et. Integer sollicitudin porttitor diam, et aliquet dui   gravida pharetra. Suspendisse arcu odio, auctor eu scelerisque vitae, accumsan   volutpat lectus. Aenean eget elit dui, vel aliquet orci. Quisque scelerisque   placerat dignissim. Maecenas varius urna quis eros molestie eget gravida diam   condimentum. Aenean lacinia, magna sit amet pulvinar lacinia, purus nulla   imperdiet turpis, eu laoreet tortor urna eu ante. Etiam est purus, egestas vitae   scelerisque vel, posuere ac eros. Sed quis lorem risus. Morbi nulla tortor,   dictum eu consequat sollicitudin, tincidunt dictum tortor. Nunc consequat erat   et erat gravida lacinia. </p>
      <p>&nbsp;</p>
      <p>&nbsp;&nbsp;&nbsp;Aqui voce podera Editar  uma  Foto para os Veiculo ja cadastrados no site.</p>
      <p>
        <?php if(@$_GET[id_veic] == '') { ?>
      </p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;Voce deve primeiro selecionar um veiculo para inserir suas fotos.</p>
	<table id="Paginas" border="0">
	  	<tr>
		<?php do { ?>
		 <th><a href="editar_fotos.php?id_veic=<?php echo $row_Rs_ListaVeiculos['vei_id']; ?>"><?php echo $row_Rs_ListaVeiculos['vei_marca']; ?> / <?php echo $row_Rs_ListaVeiculos['vei_modelo']; ?></a></th>  
	    <?php $row_Rs_ListaVeiculos = mysql_fetch_assoc($Rs_ListaVeiculos); 
		if (!isset($crialinha)) {
        	$crialinha = 1;
		}
		if(isset($row_Rs_ListaVeiculos) && is_array($row_Rs_ListaVeiculos) && $crialinha++ % 6==0) {
		echo "</tr><tr>";
		}
		} while ($row_Rs_ListaVeiculos);
		
		?>
	   </tr></table>
      <p>&nbsp;</p>
      <?php } else { ?>
      <p> <a href="editar_fotos.php"><< Aterra veiculo selecionado</a></p>
      <p>&nbsp;&nbsp;&nbsp;&nbsp; Edite  as fotos do veiculo Marca:  <strong><?php echo $row_Rs_VeiculoSelecao['vei_marca']; ?></strong>&nbsp; / Modelo: <strong><?php echo $row_Rs_VeiculoSelecao['vei_modelo']; ?></strong>&nbsp; / Ano: <strong><?php echo $row_Rs_VeiculoSelecao['vei_ano']; ?></strong></p
      >
      <p>&nbsp;</p>
      <table width="349" border="0" align="center" id="Paginas">
        <tr>
          <th width="160">ID</th>
          <th width="126">Fotos Cadastradas</th>
          <th colspan="2">Op&ccedil;&atilde;o</th>
          </tr>
        <?php do { ?>
          <tr valign="top">
            <td height="104"><?php echo $row_Rs_Lista_Fotos['fotv_id']; ?></td>
            <td><img src="../<?php echo $row_Rs_Lista_Fotos['fotv_src']; ?>" height="100" width="100"  /></td>
            <td width="26">&nbsp;</td>
            <td width="19" align="center"><a href="excluir_fot.php?id=<?php echo $row_Rs_Lista_Fotos['fotv_id']; ?>&amp;KeepThis=true&amp;TB_iframe=true&amp;height=200&amp;width=400" class="thickbox" ><img src="../imagens/b_drop.png" alt="Excluir Foto" width="16" height="16" border="0" title="Excluir Foto"/></a></td>
            </tr>
          <?php } while ($row_Rs_Lista_Fotos = mysql_fetch_assoc($Rs_Lista_Fotos)); ?>
      </table>
      <?php }?>
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
mysql_free_result($Rs_Lista_Fotos);

mysql_free_result($Rs_ListaVeiculos);

mysql_free_result($Rs_VeiculoSelecao);
?>
