<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="verify-v1" content="5eq5srQupEsV9vFEg4pYz/r5MHU3sLOGsFIx6O+N8YA=" />

<META NAME="AUTHOR" CONTENT="Cesar Augsuto">
<META NAME="KEYWORDS" CONTENT= "Jardinagem, plantas, pragas, jardim, mudas, plantio, poda, paisagismo, projetos, gramado, palmeiras, flores, canteiros, meio ambiente, arvores, Ppysis jardinagem, physis paisagismo, physis">
<META NAME="DESCRIPTION" CONTENT="Physis Paisagismo, empresa especializada em projetos de jardinagem e paisagismo, entre outros trabalhos relacio nados ao meio ambiente, atentendo a todas as especificações ambientas">

<link rel="shortcut icon" href= "Imagens/favicon.ico" />
<title>..:: Physis Paisagismo ::..</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body><a name="top" id="top"></a>
<table border="0" align="center">
  <tr>    <td>
  <div id="all">
    <div id="banner">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="955" height="150">
        <param name="movie" value="Imagens/banner.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <embed src="Imagens/banner.swf" quality="high" wmode="opaque" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="955" height="150"></embed>
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
            <li><a href="mudas.html">Mudas e Terra Orgânica</a></li>
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
<p id="mensagem">
<%
sch = "http://schemas.microsoft.com/cdo/configuration/"
Set cdoConfig = Server.CreateObject("CDO.Configuration")

'Variaveis
Dim meuservidorsmtp
Dim minhacontaautenticada
Dim minhasenhaparaenvio
Dim emailorigem
Dim emaildestino

'Abaixo seguem algumas definicoes de variaveis para o envio de seu formulario. Por favor preencha os campos abaixo.

meuservidorsmtp = "smtp.physisjardinagem.com.br" ' Informacoes so seu servidor SMTP
minhacontaautenticada = "mensagens@physisjardinagem.com.br" ' conta de e-mail utilizada para enviar
minhasenhaparaenvio = "45a78b" ' senha da conta de e-mail
emailorigem = Request("e-mail") ' e-mail que indica de onde partiu a mensagem
emaildestino = "fabricio@physisjardinagem.com.br" ' e-mail que vai receber as mensagens do formulario

'Fim da definição manual de parâmetros.

cdoConfig.Fields.Item(sch & "sendusing") = 2
cdoConfig.Fields.Item(sch & "smtpauthenticate") = 1
cdoConfig.Fields.Item(sch & "smtpserver") = meuservidorsmtp
cdoConfig.Fields.Item(sch & "smtpserverport") = 25
cdoConfig.Fields.Item(sch & "smtpconnectiontimeout") = 30
cdoConfig.Fields.Item(sch & "sendusername") = minhacontaautenticada
cdoConfig.Fields.Item(sch & "sendpassword") = minhasenhaparaenvio
cdoConfig.fields.update

Set cdoMessage = Server.CreateObject("CDO.Message")
Set cdoMessage.Configuration = cdoConfig

cdoMessage.From = emailorigem
cdoMessage.To = emaildestino
cdoMessage.Subject = "Mensagem do Site - " & Request("assunto")
cdoMessage.ReplyTo = Request("e-mail")

strBody = "Dados <br> <br>" & _
"<b>Nome:</b>"& Request("nome")& "<br> <br>" & _
"<b>Telefone:</b>"& Request("telefone")& "<br> <br>" & _
"<b>E-Mail:</b>"& Request("e-mail")& "<br> <br>" & _
"<b>Assunto:</b>"& Request("assunto")& "<br> <br>" & _
"<b>Mensagem:</b>"& Request("texto")

strBody = strBody & "."
cdoMessage.HTMLBody = strBody

cdoMessage.Send

Set cdoMessage = Nothing
Set cdoConfig = Nothing

response.write ("Sua mensagem foi enviada com sucesso !!")
Response.Write ("<br />")
Response.Write ("<br />")
response.Write ("Em breve estaremos respondendo seu contato")
%>
</p>     
<p>&nbsp;</p>
<p>&nbsp;</p>
<p id="mensagem"><a href="index.html">&lt;&lt; Voltar para Home</a>
        <p>&nbsp; </p>
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
</html>
