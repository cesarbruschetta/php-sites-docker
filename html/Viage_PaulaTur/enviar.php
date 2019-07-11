<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: PaulaTur Trans. e Tur. ::..</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>

<meta name="verify-v1" content="uz0JRtI+o+2EIkB7n4sp76v/L/RPdl/rpptVrhWuDbA=" > <!-- Meta Google-->
<META NAME="AUTHOR" CONTENT="Cesar Augsuto">
<META NAME="KEYWORDS" CONTENT= "paula tur, paulatur, paula regina, fretamento, escurções, viagem, onibus, vam, micro, locação, passeio, onibus em santo andre, são paulo">
<META NAME="DESCRIPTION" CONTENT="PaulaTur, empresa especializada em locação ou fretamento de onibus, micros, vams para todos os destinos do Estado de São Paulo e do Brasil!!!">

<link rel="shortcut icon" href= "imagens/favicon.ico" />

</head>
<body>
<a name="top" id="top"></a>
<table width="770" border="0" align="center">
  <tr><td>
  <div id="all">
  <div id="banner">
    <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="770" height="150">
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
  <div id="conteudo">
  <table> <tr>
  <td id="menu" valign="top" ><object id="FlashID2" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="200" height="220">
    <param name="movie" value="imagens/menu.swf" />
    <param name="quality" value="high" />
    <param name="wmode" value="opaque" />
    <param name="swfversion" value="6.0.65.0" />
    <!-- Esta tag param solicita que os usuários com o Flash Player 6.0 r65 e versões posteriores baixem a versão mais recente do Flash Player. Exclua-o se você não deseja que os usuários vejam o prompt. -->
    <param name="expressinstall" value="Scripts/expressInstall.swf" />
    <!-- A tag object a seguir aplica-se a navegadores que não sejam o IE. Portanto, oculte-a do IE usando o IECC. -->
    <!--[if !IE]>-->
    <object type="application/x-shockwave-flash" data="imagens/menu.swf" width="200" height="220">
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
  </object></td>
  <td id="conteudo_1" valign="top" ><h1>Contate-nos</h1>
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
$mail->AddAddress("viagepaulatur@uol.com.br","Paula Tur");
$mail->Subject = "Menssagem do Site - ".$_POST['assunto'];
$mail->Body = "<b>Nome:</b> ".$_POST['nome']." <br /><br />
               <b>Telefone:</b> ".$_POST['telefone']." <br /><br />
			   <b>E-mail:</b> ".$_POST['email']." <br /><br />
               <b>Assunto:</b> ".$_POST['assunto']." <br /><br />
			   <b>Opções de departamento:</b> ".$_POST['depar']." <br /><br />
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

<p id="envio"><a href="index.html">&lt;&lt; Voltar para Home</a> </p>
<p id="topo"><a href="#top" >Topo /\</a></p></td>
  </tr>
  </table> </div> 
  <div id="rodape">
    <p><strong>
      <br />
      <br />
      Paula Regina Trans. e Loc. de Ve&iacute;culos Ltda</strong>.<br />
      Rua Coimbra, 567<br />
      Vila Pires - Santo Andr&eacute; - SP <br />
      Telefones (11)   4453-5295 - (11)4452-1940</p>
  </div>
  </div>
  </td>  </tr>
</table>
<p id="sobre">&copy; 2009 <a href="sobre.html" target="popupwindow" onclick='window.open("sobre.html", "popupwindow", "scrollbars=yes,width=590,height=360");return true'>Cesar Augusto</a> - Todos os direitos reservados</p>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID2");
//-->
</script>
</body>
</html>
