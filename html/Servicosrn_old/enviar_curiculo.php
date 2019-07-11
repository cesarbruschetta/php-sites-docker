<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: Servi&ccedil;os RN ::..</title>

<META NAME="AUTHOR" CONTENT="Cesar Augusto">

<meta name="keywords" content="gesso, reformas, servicos, rn, sandro nagy, mouduras, cordoes, pinturas, casa, apartamentos, restauraões, portas, janelas, eletrica, hitraulica, santo andre, abc, grande abc, são paulo, " />

<meta name="description" content="Trabalhamos com todos os serviços de reformas, acabamentos em gesso, pinturas, e restaurações de portas e janelas, Fazemos orçamentos sem compromisso" />


<link rel="shortcut icon" href= "imagens/favicon.ico" />

<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

</head>

<body>
<a name="top" id="top"></a>
<table border="0" align="center">
  <tr>
    <td><div id="all">
      <div id="banner">
        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="770" height="150" id="FlashID" title="Banner">
          <param name="movie" value="imagens/BANNER.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <!-- Esta tag param solicita que os usuários com o Flash Player 6.0 r65 e versões posteriores baixem a versão mais recente do Flash Player. Exclua-o se você não deseja que os usuários vejam o prompt. -->
          <param name="expressinstall" value="Scripts/expressInstall.swf" />
          <!-- A tag object a seguir aplica-se a navegadores que não sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="imagens/BANNER.swf" width="770" height="150">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
            <param name="expressinstall" value="Scripts/expressInstall.swf" />
            <!-- O navegador exibe o seguinte conteúdo alternativo para usuários que tenham o Flash Player 6.0 e versões anteriores. -->
            <div>
              <h4>O conte&uacute;do desta p&aacute;gina requer uma vers&atilde;o mais recente do Adobe Flash Player.</h4>
              <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter Adobe Flash player" width="112" height="33" /></a></p>
            </div>
            <!--[if !IE]>-->
          </object>
          <!--<![endif]-->
        </object>
      </div>
     <div id="menu">
      <table width="770" border="0">
          <tr>
            <td>
        <ul id="barra_menu" class="MenuBarHorizontal">
          <li><a href="index.html">Home</a></li>
<li id="materiais"><a class="MenuBarItemSubmenu" href="#">Servi&ccedil;os</a>
  <ul id="materiais">
              <li id="materiais"><a href="gesso.html">Gesso</a>                </li>
              <li id="materiais"><a href="pintura.html">Pintura</a></li>
			  <li id="materiais"><a  href="restauracao.html">Restaura&ccedil;&atilde;o de Portas e Janelas</a></li>
            </ul>
          </li>
</ul>
      </td>
            <td align="center" ><a href="trabalhe.php"><img src="imagens/trabalhe.png" alt="Trabalhe Conosco" width="25" border="0" title="Trabalhe Conosco" /></a></td>
            <td align="center" ><a href="contato.html"><img src="imagens/contato.png" alt="Contate-nos" width="25" border="0" title="Contate-nos"/></a></td>
          </tr>
      </table></div>
      <div id="conteudo"> 
        <h1>Trabalhe Conosco</h1>
        <p id="envio">Obrigado pelo contato.<br />
        <p id="envio">  
		<?php
		//INICIO DO CODIGO PHP FORMULARIO DE UPLOAD
		if (isset($_FILES[arquivo])) {
			if ($_FILES[arquivo][size] > 1024 * 1024) {
				$tamanho = round(($_FILES[arquivo][size] / 1024 / 1024), 2);
				$med = "MB";
			} else if ($_FILES[arquivo][size] > 1024) {
				$tamanho = round(($_FILES[arquivo][size] / 1024), 2);
				$med = "KB";
			} else {
				$tamanho = $_FILES[arquivo][size];
				$med = "Bytes";
			}
		 
			/* Defina aqui o tamanho m&aacute;ximo do arquivo em bytes: */
			 if($_FILES[arquivo][size] > 1048576) { //Limite: 1MB
				print "<script> alert('Tamanho: $tamanho $med! Seu arquivo n&atilde;o poder&aacute; ser maior que 1MB!'); 			window.history.go(-1); </script>\n";
					exit;
				}
		 
			/* Defina aqui o diretório destino do upload */
			if (is_file($_FILES[arquivo][tmp_name])) {
				$arquivo = $_FILES[arquivo][tmp_name];
				$caminho="./curiculo/";
				$caminho=$caminho.$_POST['nome'].'_'.$_FILES[arquivo][name];
		 		
				/* Defina aqui o tipo de arquivo suportado */
				if (!(eregi(".php$", $_FILES[arquivo][name]))) {
					move_uploaded_file($arquivo,$caminho) or die("<p>Erro durante a manipula&ccedil;&atilde;o do arquivo '$arquivo'</p>".'<p><a href="'.$_SERVER["PHP_SELF"].'">Voltar</a></p>');
					
					print "Arquivo enviado com sucesso !!";
				}else {
					print "Arquivo n&atilde;o enviado!!\n";
					print "Caminho ou nome de arquivo Inv&aacute;lido!!";
				}
			}
			
		}
		
		?></p>

        <p id="envio">
          <?php 
require_once("phpmailer/class.phpmailer.php");
//*$dados = $_REQUEST['fale'];
$link = 'http://servicosrn.com.br/'.$caminho;

$mail = new PHPMailer();
$mail->IsMail(true);
$mail->IsHTML(true);
$mail->From = $_POST['email'];
$mail->FromName = $_POST['nome'];
$mail->AddAddress("cesarbruschetta@uol.com.br","Serviços RN");
$mail->Subject = "Curriculo";
$mail->Body = "<b>Nome:</b> ".$_POST['nome']." <br /><br />
               <b>Telefone:</b> ".$_POST['telefone']." <br /><br />
			   <b>E-mail:</b> ".$_POST['email']."<br /><br />
			   <b>Curriculo: <a href='$link'>Download do Arquivo</a>";
			   
if($mail->Send())
{    
	 echo "Sua mensagem foi enviada com sucesso !!!";
	 echo "<br />";
	 echo "<br />";
	 echo "Em breve estaremos Analizando seu Curriculo";
}
else
{    echo "Erro ao enviar e-mail, tente novamente mais tarde.";
}
?>
          <br />
          <br />
        </p>
        <p id="envio"><a href="index.html">&lt;&lt; Voltar para Home</a></p>
        <p>&nbsp;</p>
          <p id="topo"><a href="#top">Topo /\</a><br /> 
          </p>
</div>
      <div id="rodape">
        <p><strong>Servi&ccedil;os RN </strong><br />
          Gesso | Pintura| Eletricista | Hidraulica | Restaura&ccedil;&atilde;o de Portas e Janelas<br />
Telefones (11)   4997-4629 - (11)9465-1560</p>
      </div>
    </div></td>
  </tr>
</table>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
<p id="sobre">&copy; 2009 <a href="sobre.html" target="popupwindow" onclick='window.open("sobre.html", "popupwindow", "scrollbars=yes,width=590,height=360");return true'>Cesar Augusto</a> - Todos os direitos reservados</p>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("barra_menu", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
</html>
