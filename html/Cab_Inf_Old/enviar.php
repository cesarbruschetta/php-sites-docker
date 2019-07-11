<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: Cab Inform&aacute;tica ::..</title>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="estilo.css" rel="stylesheet" type="text/css" />

<META NAME="AUTHOR" CONTENT="Cesar Augusto">

<meta name="description" content="Trabalhamos com serviços especializados na areas de TI, com consertos de PC, montagems de PC, criação e hospedagem de sites, configuração de rede, e-mail marketing, entre outros serviçoes." />

<meta name="keywords" content="Cab, informatica, cab informatica, TI, Serviços, sites, servidor, Active Directory, email, marcketing, Newsletter, computadores, hardware, sottware, windows, linux, conserto de computadores, montagem de computadores, configuração de computadores, rede, wi-fi, wireless, configuração de servidores, montagem de servidores, criação de sites, webpages, atualização de sites, hospedagem, registro de domineos, envio de e-mail, criação de e-mal marketing, em santo andre, abc, grande são paulo, são paulo" />

<meta name="google-site-verification" content="d1THKUU6R5l-jOdKrpYoJ6Dc51TcuyIFx-qykKq5Ov8" />

<link rel="shortcut icon" href= "images/favicon.ico" />

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>
<body>
<a name="top" id="top"></a>
<table  border="0" align="center" >
  <tr>
    <td><div id="all">
      <div id="cabecalho">&nbsp; &nbsp;</div>
      <div id="banner">
        <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="770" height="150">
          <param name="movie" value="images/banner.swf" />
          <param name="quality" value="high" />
          <param name="wmode" value="opaque" />
          <param name="swfversion" value="6.0.65.0" />
          <!-- Esta tag param solicita que os usuários com o Flash Player 6.0 r65 e versões posteriores baixem a versão mais recente do Flash Player. Exclua-o se você não deseja que os usuários vejam o prompt. -->
          <param name="expressinstall" value="Scripts/expressInstall.swf" />
          <!-- A tag object a seguir aplica-se a navegadores que não sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
          <!--[if !IE]>-->
          <object type="application/x-shockwave-flash" data="images/banner.swf" width="770" height="150">
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
      <!-- end of banner wrapper -->
      <div id="templatemo_menu_wrapper">
        <div id="templatemo_menu">
          <ul>
            <li><a href="index.html"><span></span>Home</a></li>
            <li><a href="quem_somos.html"><span></span>Quem Somos</a></li>
            <li><a href="nossos_servicos.html"><span></span>Nossos Servi&ccedil;os</a></li>
            <li><a href="contato.html"><span></span>Contate-nos</a></li>
          </ul>
        </div>
        <!-- end of menu -->
      </div>
      <!-- end of menu wrapper -->
      <div id="conteudo_all">
        <h1>Contate-nos</h1>
        <div id="conteudo">
        <p id="envio">Obrigado pelo contato.<br />
          <br />
        </p>
        <p id="envio">
          <?php 
require_once("phpmailer/class.phpmailer.php");
//*$dados = $_REQUEST['fale'];

$mail = new PHPMailer();
$mail->IsMail(true);
$mail->IsHTML(true);
$mail->From = $_POST['email'];
$mail->FromName = $_POST['nome'];
$mail->AddAddress("cesarbruschetta@uol.com.br","Cab Informatica");
$mail->Subject = "Menssagem do Site - ".$_POST['assunto'];
$mail->Body = "<b>Nome:</b> ".$_POST['nome']." <br /><br />
               <b>Telefone:</b> ".$_POST['telefone']." <br /><br />
			   <b>E-mail:</b> ".$_POST['email']." <br /><br />
               <b>Assunto:</b> ".$_POST['assunto']." <br /><br />
			   <b>Mensagem:</b> ".$_POST['mensagem'];
if($mail->Send())
{    echo "Sua mensagem foi enviada com sucesso !!! ";
	 echo "<br />";
	 echo "<br />";
	 echo "Em breve estaremos respondendo seu contato";
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
         <p id="topo"><a href="#top">Topo /\</a><br />  </p>
        </div>
      </div>
      <div id="rodape">
        <div id="rodape_texto"> Copyright &copy; 2009 <strong><a href="http://www.cesarbruschetta.com.br">Cab Inform&aacute;tica</a></strong> | 
          Designed by <a href="http://www.cesarbruschetta.com.br">Cesar Augustos</a></div>
        </div>
    </div>
</td>
  </tr>
</table>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>