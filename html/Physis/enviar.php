<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="verify-v1" content="5eq5srQupEsV9vFEg4pYz/r5MHU3sLOGsFIx6O+N8YA=" />

<META NAME="AUTHOR" CONTENT="Cesar Augsuto">
<META NAME="KEYWORDS" CONTENT= "Jardinagem, plantas, pragas, jardim, mudas, plantio, poda, paisagismo, projetos, gramado, palmeiras, flores, canteiros, meio ambiente, arvores, Ppysis jardinagem, physis paisagismo, physis">
<META NAME="DESCRIPTION" CONTENT="Physis Paisagismo, empresa especializada em projetos de jardinagem e paisagismo, entre outros trabalhos relacio nados ao meio ambiente, atentendo a todas as especifica��es ambientas">

<link rel="shortcut icon" href= "Imagens/favicon.ico" />
<title>..:: Physis Paisagismo ::..</title>
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>
<a name="top" id="top"></a>
<table border="0" align="center">
  <tr>    <td>
  <div id="all">
  
  <div id="banner">    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="955" height="150">
      <param name="movie" value="Imagens/banner.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <!-- Esta tag param solicita que os usu�rios com o Flash Player 6.0 r65 e vers�es posteriores baixem a vers�o mais recente do Flash Player. Exclua-o se voc� n�o deseja que os usu�rios vejam o prompt. -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- A tag object a seguir aplica-se a navegadores que n�o sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="Imagens/banner.swf" width="955" height="150">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- O navegador exibe o seguinte conte�do alternativo para usu�rios que tenham o Flash Player 6.0 e vers�es anteriores. -->
        <div>
          <h4>O conte&uacute;do desta p&aacute;gina requer uma vers&atilde;o mais recente do Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obter Adobe Flash player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>  
    </div>
  <div id="conteudo">
  <table border="0">
  <tr>
    <td valign="top" id="menu">
      <ul id="MenuBar1" class="MenuBarVertical">
        <li><a href="index.html">Home</a>          </li>
        <li><a href="quem_somos.html">Quem Somos</a></li>
        <li><a href="#" class="MenuBarItemSubmenu">Nossos Produtos</a>
          <ul>
            <li><a href="moveis.html">Moveis Ecologicos</a></li>
            <li><a href="vasos.html">Artigos de Jardinagem</a></li>
            <li><a href="mudas.html">Mudas e Terra Org�nica</a></li>
          </ul>
        </li>
        <li><a href="#" class="MenuBarItemSubmenu">Dept Paisagismo</a>
          <ul>
            <li><a href="paisagismo.html">O que &eacute; ?</a></li>
            <li><a href="fotos_paisa.html">Fotos</a></li>
            </ul>
        </li>
        <li><a href="#" class="MenuBarItemSubmenu">Dept Jardinagem</a>
          <ul>
            <li><a href="jardinagem.html">O que &eacute; ?</a></li>
            <li><a href="fotos_jard.html">Fotos</a></li>
          </ul>
        </li>
        <li><a href="#" class="MenuBarItemSubmenu">Dept. Ambiental</a>
          <ul>
			<li><a href="ambiental.html">O que &eacute; ?</a></li>
			<li><a href="fotos_ambi.html">Fotos</a></li>
          </ul>
        </li>
        <li><a href="clientes.html">Clientes</a></li>
<li><a href="contato.html">Contato</a></li>
<li><a href="links_inter.html">Links Interessantes</a></li>
      </ul></td>
    <td valign="top" id="conteudo_1"><h1>Contate - nos</h1>
      <p id="mensagem">Obrigado pelo contato.</p>
      <p>&nbsp;</p>
<p id="mensagem">      <?php 
require_once("phpmailer/class.phpmailer.php");
//$dados = $_REQUEST['fale'];
$mail = new PHPMailer();
$mail->IsMail(true);
$mail->IsHTML(true);
$mail->From = $_POST['e-mail'];
$mail->FromName = $_POST['nome'];
$mail->AddAddress("fabricio@physisjardinagem.com.br","Physis Paisagismo");
$mail->Subject = "Menssagem do Site - ".$_POST['assunto'];
$mail->Body = "<b>Nome:</b> ".$_POST['nome']." <br /><br />
               <b>Telefone:</b> ".$_POST['telefone']." <br /><br />
               <b>E-mail:</b> ".$_POST['e-mail']." <br /><br />
			   <b>Mensagem:</b> ".$_POST['texto'];
if($mail->Send())
{    echo "Sua mensagem foi enviada com sucesso em breve estaremos respondendo seu contato";
	echo '<br />';
}
else
{    echo "Erro ao enviar e-mail, tente novamente mais tarde.";
}
?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p id="mensagem"><a href="index.html">&lt;&lt; Voltar para Home</a>
<p>&nbsp;</p>
    </td>
  </tr>
</table>

  <div id="rodape">
    <p><strong>Physis Paisagismo e Jardinagem </strong><br />
      Rua Alameda Francisco Alves, 09 - Loja 01 <br />
      Bairro Jardim - Santo Andr&eacute; - SP <br />
      Telefones (11)   2534-3475 - (11)7647-3127 - (11)9340&ndash;8200 </p>
</div>
  
  </div>
  </div>
  </td>  </tr>
</table>
<p id="sobre">&copy; 2009 <a href="sobre.html" target="popupwindow" onclick='window.open("sobre.html", "popupwindow", "scrollbars=yes,width=590,height=360");return true'>Cesar Augusto</a> - Todos os direitos reservados</p>
<script type="text/javascript">

<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
<script type="text/javascript">
<!-- 
swfobject.registerObject("FlashID");
//-->
</script>
</html>
