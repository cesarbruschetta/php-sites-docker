<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: Servi&ccedil;os RN ::..</title>

<META NAME="AUTHOR" CONTENT="Cesar Augusto">

<link rel="shortcut icon" href= "imagens/favicon.ico" />

<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<!-- INICIO DO VALIDA FORMULARIO-->
<script language = "JavaScript" >
function enviardados(){

	if (document.dados.arquivo.value=="") {
		alert("Arquivo para upload não informado!")
		document.dados.arquivo.focus()
		return false
		}
	
	if(document.dados.nome.value=="" || document.dados.nome.value.length < 5)
	{
	alert( "Preencha o campo NOME, com seu Nome Completo!!" );
	document.dados.nome.focus();
	return false;
	}

	if(document.dados.telefone.value=="" || document.dados.telefone.value.length < 8)
	{
	alert( "Preencha o campo TELEFONE, com o DDD e o Numero corretamente!" );
	document.dados.telefone.focus();
	return false;
	}

	if( document.dados.email.value=="" || document.dados.email.value.indexOf('@')==-1 || document.dados.email.value.indexOf('.')==-1 )
	{
	alert( "Preencha campo E-MAIL corretamente, Ex.:'contato@contato.com.br' !" );
	document.dados.email.focus();
	return false;
	}
	
return true;
}
<!-- FIM DO VALIDA FORMULARIO-->
</script>


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
        <h1> Trabalhe Conosco</h1>
        <p>Envie seu Curiculo, para nosso departamento pessoal, que em breve retornaremos seu contato.</p>
        <form id="form1" name="dados" method="post" action="enviar_curiculo.php"  enctype="multipart/form-data" onSubmit="return enviardados();">
            <table border="0" align="center">
              <tr>
              <td> Envie seu curiculo</td>
              <td colspan="2">  <input type="file" name="arquivo" size="50"> </td>
              </tr>
              <tr>
               <td width="141">Nome</td>
              <td colspan="2"> <input name="nome" type="text" id="nome" size="50" />
              </td>
            </tr>
            <tr>
              <td>Telefone</td>
              <td colspan="2"> <input name="telefone" type="text" id="telefone" size="50" />
              </td>
            </tr>
            <tr>
              <td>E-mail</td>
              <td colspan="2"><input name="email" type="text" id="email" size="50" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td width="211"><input type="submit" name="enviar" id="enviar" value="Enviar" /></td>
              <td width="157" align="right">
                <input type="reset" name="Limpar" id="Limpar" value="Limpar" /></td>
            </tr>
          </table></form>
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
