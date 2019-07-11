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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "add_foto")) {
  $insertSQL = sprintf("INSERT INTO sm_fotos_veiculos (fotv_id_veiculo, fotv_src, fotv_link) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['id_veiculo2'], "int"),
                       GetSQLValueString($_POST['linkimagem2'], "text"),
                       GetSQLValueString($_POST['linkimagem2'], "text"));

  mysql_select_db($database_speedyam, $speedyam);
  $Result1 = mysql_query($insertSQL, $speedyam) or die(mysql_error());

  $insertGoTo = "inserir_foto.php?add=ok";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_speedyam, $speedyam);
$query_Rs_ListaVeiculos = "SELECT vei_id, vei_marca, vei_modelo FROM sm_veiculos ORDER BY vei_id ASC";
$Rs_ListaVeiculos = mysql_query($query_Rs_ListaVeiculos, $speedyam) or die(mysql_error());
$row_Rs_ListaVeiculos = mysql_fetch_assoc($Rs_ListaVeiculos);
$totalRows_Rs_ListaVeiculos = mysql_num_rows($Rs_ListaVeiculos);

$colname_Rs_VeiculoFoto = "-1";
if (isset($_GET['id_veic'])) {
  $colname_Rs_VeiculoFoto = $_GET['id_veic'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_VeiculoFoto = sprintf("SELECT vei_id, vei_marca, vei_modelo, vei_ano FROM sm_veiculos WHERE vei_id = %s", GetSQLValueString($colname_Rs_VeiculoFoto, "int"));
$Rs_VeiculoFoto = mysql_query($query_Rs_VeiculoFoto, $speedyam) or die(mysql_error());
$row_Rs_VeiculoFoto = mysql_fetch_assoc($Rs_VeiculoFoto);
$totalRows_Rs_VeiculoFoto = mysql_num_rows($Rs_VeiculoFoto);
?>
<?php 
function deletar($caminho){
	unlink(caminho);
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template-adm.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Speedy AutoMotors - Inserir Foto</title>
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
        <h1> Inserir Nova Foto para o Veiculo</h1>
            <p>&nbsp;&nbsp;&nbsp;&nbsp; Sed ornare luctus augue ac facilisis. Aliquam bibendum pharetra justo, eu   rhoncus velit posuere et. Integer sollicitudin porttitor diam, et aliquet dui   gravida pharetra. Suspendisse arcu odio, auctor eu scelerisque vitae, accumsan   volutpat lectus. Aenean eget elit dui, vel aliquet orci. Quisque scelerisque   placerat dignissim. Maecenas varius urna quis eros molestie eget gravida diam   condimentum. Aenean lacinia, magna sit amet pulvinar lacinia, purus nulla   imperdiet turpis, eu laoreet tortor urna eu ante. Etiam est purus, egestas vitae   scelerisque vel, posuere ac eros. Sed quis lorem risus. Morbi nulla tortor,   dictum eu consequat sollicitudin, tincidunt dictum tortor. Nunc consequat erat   et erat gravida lacinia.</p>
     <p>&nbsp;</p>
     <p>&nbsp;&nbsp;&nbsp;&nbsp;Aqui voce podera inserir uma nova Foto para os Veiculo ja cadastrados no site.</p>
     <p>&nbsp;</p>
     
<?php if (@$_GET['add'] == 'ok') { ?>
        <p id="se" >Sua Foto  foi inserido com susse&ccedil;o!! <br />
Para voce colocara mas  imagems para veiculo entre na pagina de novo.<a href="inserir_foto.php?id_veic=<?php echo $_GET['id_veic']; ?>"><br />
Click aqui para inserir outra Foto para esse veiculo</a></p>
        <p id="se">ou</p>
        <p id="se"><a href="inserir_foto.php">Click aqui para inserir para outro veiculo</a></p>
<?php } else { ?>
	<?php if(@$_GET[id_veic] == '') { ?>
    
       <p>&nbsp; </p>
       <p>&nbsp;&nbsp;&nbsp;&nbsp;Voce deve primeiro selecionar um veiculo para inserir suas fotos.</p>
       <p>&nbsp;</p>
        <table border="0">
           <?php do { ?>
           <tr> <td><a href="inserir_foto.php?id_veic=<?php echo $row_Rs_ListaVeiculos['vei_id']; ?>"><?php echo $row_Rs_ListaVeiculos['vei_marca']; ?> / <?php echo $row_Rs_ListaVeiculos['vei_modelo']; ?></a></td>   </tr>
            <?php } while ($row_Rs_ListaVeiculos = mysql_fetch_assoc($Rs_ListaVeiculos)); ?>
          </table>
        <p>&nbsp;</p>
    <?php } else { ?>
      <p>&nbsp;&nbsp;&nbsp;&nbsp; insira as fotos do veiculo Marca:  <strong><?php echo $row_Rs_VeiculoFoto['vei_marca']; ?></strong>&nbsp; / Modelo: <strong><?php echo $row_Rs_VeiculoFoto['vei_modelo']; ?></strong>&nbsp; / Ano: <strong><?php echo $row_Rs_VeiculoFoto['vei_ano']; ?></strong></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <form name="enviar_imagem" method="POST" enctype="multipart/form-data" id="enviar_imagem">
      <table width="442" height="129" border="0" align="center" id="upimagem">
        <tr>
          <td width="155" height="26" align="left" valign="top">Imagem a ser Enviada</td>
          <td width="273"><input name="arquivo[]" type="file" id="arquivo" size="32" /></td>
        </tr>
        <tr>
          <td height="40" align="left" valign="bottom"><input type="reset" name="button2" id="button2" value="Cancelar" /></td>
          <td align="right" valign="bottom"><input type="submit" name="enviar_foto" id="enviar_foto" value="Enviar Imagem ..." /></td>
        </tr>      <tr>
          <td height="41" colspan="2" align="center" valign="bottom" id="upimagem"><?php
//Diretório aonde ficará os arquivos
$dir = "imagens/carros/";
//Extensões permitidas
$ext = array("gif","jpg","png");
//Quant. de campos do tipo FILE
$campos = 1;

//Se for enviado
if (isset($_POST['enviar_foto'])) {

//Obtendo info. dos arquivos
$f_name = $_FILES['arquivo']['name'];
$f_tmp = $_FILES['arquivo']['tmp_name'];
$f_type = $_FILES['arquivo']['type'];

//Contar arquivos enviados
$cont=0;
//Repetindo de acordo com a quantidade de campos FILE
for($i=0;$i<$campos;$i++){
//Pegando o nome
$data = date("Y-m-d H.i");
$name = $data.$f_name[$i]; 

//Verificando se o campo contem arquivo
  if ( ($name!="") and (is_file($f_tmp[$i])) and (in_array(substr($name, -3),$ext)) ) {
    if ($cont==0) { ?>
            <input type='hidden' name='linkimagem' id='linkimagem' value='<?php echo $dir.$name ;?>'/>
            <?php echo "<br /><b>Foto a ser inserida no anuncio!!</b>";
    }
    echo "<br /><img src='../".$dir.$name."' height='200'>";
	//echo $name." - ";
	//Movendo arquivo's do upload
      $up = move_uploaded_file($f_tmp[$i], $dir.$name);
        /*/Status
        if ($up==true):
            echo  "<i>Enviado!</i>";
              $cont++;
        else:
            echo "<i>Falhou!</i>";
        endif;*/
  }
}
//echo ($cont!=0) ? "<i>Total de arquivos enviados: </i>".$cont : "Nenhum arquivo foi enviado!";
}
?>
        <input name="id_veiculo" type="hidden" id="id_veiculo" value="<?php echo $row_Rs_VeiculoFoto['vei_id']; ?>" /></td>
        </tr>  </table></form>
        <br />
	<?php  if (isset($_POST['enviar_foto'])) { ?>
        <form id="add_foto" name="add_foto" method="POST" action="<?php echo $editFormAction; ?>">
        <table id="upimagem" border="0" align="center" width="432">
             <tr>
     <td height="10" colspan="2" align="center" valign="bottom">Voce tem certeja que teseja incruir essa imagem?<br />
       <input name="id_veiculo2" type="hidden" id="id_veiculo2" value="<?php echo $row_Rs_VeiculoFoto['vei_id']; ?>" />
       <input type='hidden' name='linkimagem2' id='linkimagem2' value='<?php echo $dir.$name ;?>'/></td>
          </tr>
        <tr>
         <td height="11" align="left" valign="bottom"><input type="button" name="deletar" id="deletar" value="N&atilde;o" onclick="deletar(<?php echo $dir.$name ;?>);" /></td>
          <td height="11" align="right" valign="bottom"><input type="submit" name="enviar" id="enviar" value="Sim" /></td>
        </tr>
      </table>
        <input type="hidden" name="MM_insert" value="add_foto" />
        </form> <?php }?>
		<p>&nbsp;</p>
       <p>&nbsp;&nbsp; Imagens ja inseridar para o veiculos:<strong> <?php echo $row_Rs_VeiculoFoto['vei_marca']; ?></strong>&nbsp; / Modelo: <strong><?php echo $row_Rs_VeiculoFoto['vei_modelo']; ?></strong></p>
        <table border="0" align="center" id="upimagem">
  <tr>
    <td><iframe name="up-foto" src="upimagens.php?id_veic=<?php echo $_GET['id_veic']; ?>" frameborder=0 width="880" height="180" scrolling=auto></iframe></td>
  </tr>
</table>


        <p>
          <?php }?>
<?php }?>
     </p>
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
mysql_free_result($Rs_ListaVeiculos);

mysql_free_result($Rs_VeiculoFoto);
?>