<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: Servi&ccedil;os RN - Envie Seu Or&ccedil;amento ::..</title>

<style type="text/css">
#all {
	width: 530px;
	background-color: #FFF;
	border: 2px solid #fff;
}
body h1 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 24px;
	color: #f00;
	font-weight: bolder;
	text-align: center;
}
body p {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #000;
}
#orcamento table {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bolder;
	color: #000;
	border: 1px solid #FFF;
}
#orcamento table tr #foto {
	width: 190px;
	border-right-width: 1px;
	border-right-style: dashed;
	border-right-color: #CCC;
}
#orcamento table tr td {
	padding: 2px;
}
#orcamento table tr #texto {
	width: 120px;
}
</style>

<!-- INICIO DO VALIDA FORMULARIO-->
<script language = "JavaScript" >
		function enviardados(){
		
			if(document.orcamento.nome.value=="" || document.orcamento.nome.value.length < 5)
			{
			alert( "Preencha o campo NOME, com seu Nome Completo!!" );
			document.orcamento.nome.focus();
			return false;
			}
		
			if(document.orcamento.telefone.value=="" || document.orcamento.telefone.value.length < 8)
			{
			alert( "Preencha o campo TELEFONE, com o DDD e o Numero corretamente!" );
			document.orcamento.telefone.focus();
			return false;
			}
		
			if( document.orcamento.email.value=="" || document.orcamento.email.value.indexOf('@')==-1 || document.orcamento.email.value.indexOf('.')==-1 )
			{
			alert( "Preencha campo E-MAIL corretamente, Ex.:'contato@contato.com.br' !" );
			document.orcamento.email.focus();
			return false;
			}
			
			if(document.orcamento.metros.value=="" || document.orcamento.metros.value == " ")
			{
			alert( "Preencha a Quantidade de Metros Quadrados!" );
			document.orcamento.metros.focus();
			return false;
			}
				
			if (document.orcamento.obs.value=="")
			{
			alert( "Preencha o campo MENSAGEM!" );
			document.orcamento.obs.focus();
			return false;
			}
		
			if (document.orcamento.obs.value.length < 10 )
			{
			alert( "É necessario preencher o campo MENSAGEM com mais de 10 caracteres!" );
			document.orcamento.obs.focus();
			return false;
			}
				
		return true;
		}
<!--FIM DO VALIDA FORMULARIO-->
</script>
</head>

<body>
<table width="524" border="0" align="center" id="all">
  <tr>
    <td width="514" height="320">
        <h1>Or&ccedil;amento</h1>

      <p>Envie seu or&ccedil;amento que em breve responderemos suia solicita&ccedil;&atilde;o</p>
        <form id="orcamento" name="orcamento" method="post" action="envia_orcamento.php"  onSubmit="return enviardados()">
            <table width="519" border="0">
                <tr>
                <td  id="foto" width="203" rowspan="6" align="center" valign="middle">
   	<?php
	//LINK DAS IMAGENS
				 switch($_GET['id']){
			// MOUDURAS de GESSO
				//LINHA CLEAN
					case 200:
					echo '<img src="imagens/gesso/molduras/clean/200[1].jpg"/>';
					$produto = "moldura 200";
					break;
					case 201:
					echo '<img src="imagens/gesso/molduras/clean/201[1].jpg"/>';
					$produto = "moldura 201";
					break;
					case 202:
					echo '<img src="imagens/gesso/molduras/clean/202[1].jpg"/>';
					$produto = "moldura 202";
					break;
					case 203:
					echo '<img src="imagens/gesso/molduras/clean/203[1].jpg"/>';
					$produto = "moldura 203";
					break;
					case 204:
					echo '<img src="imagens/gesso/molduras/clean/204[1].jpg"/>';
					$produto = "moldura 204";
					case 100:
					echo '<img src="imagens/gesso/molduras/clean/acabamento_forro_suspenso[1].jpg"/>';
					$produto = "Moldura de Apoio para Dilatação de Forro em todos os modelos, no tamanho PP";
					break;
					case 1001:
					echo '<img src="imagens/gesso/molduras/clean/junta_dilatacao_pp[1].jpg"/>';
					$produto = "Junta de Dilatação Macho/Femea para Forro tipo Suspenso";
					break;
					case 1002:
					echo '<img src="imagens/gesso/molduras/clean/junta_macho_femea[1].jpg"/>';
					$produto = "Acabamento para Forro Tipo Suspenso não Dilatado (cadeirinha)";
					break;
				
				//LINHA DECORADA
					case 101:
					echo '<img src="imagens/gesso/molduras/decoradas/101[1].jpg" />';
					$produto = "moldura 101";
					break;
					case 102:
					echo '<img src="imagens/gesso/molduras/decoradas/102[1].jpg" />';
					$produto = "moldura 102";
					break;
					case 103:
					echo '<img src="imagens/gesso/molduras/decoradas/103[1].jpg"/>';
					$produto = "moldura 103";
					break;
					case 104:
					echo '<img src="imagens/gesso/molduras/decoradas/104[1].jpg"/>';
					$produto = "moldura 104";
					break;
					case 105:
					echo '<img src="imagens/gesso/molduras/decoradas/105[1].jpg"/>';
					$produto = "moldura 105";
					break;
					case 107:
					echo '<img src="imagens/gesso/molduras/decoradas/107[1].jpg" />';
					$produto = "moldura 107";
					break;
					case 112:
					echo '<img src="imagens/gesso/molduras/decoradas/112[1].jpg"/>';
					$produto = "moldura 112";
					break;
					case 13:
					echo '<img src="imagens/gesso/molduras/decoradas/13[1].jpg"/>';
					$produto = "moldura 13";
					break;
					case 14:
					echo '<img src="imagens/gesso/molduras/decoradas/14[1].jpg"/>';
					$produto = "moldura 14";
					break;
					case 1:
					echo '<img src="imagens/gesso/molduras/decoradas/1[1].jpg"/>';
					$produto = "moldura 1";
					break;
					case 3: 
					echo '<img src="imagens/gesso/molduras/decoradas/3[1].jpg" />';
					$produto = "moldura 3";
					break;
					case 4:
					echo '<img src="imagens/gesso/molduras/decoradas/4[1].jpg" />';
					$produto = "moldura 4";
					break;
					case 57:
					echo '<img src="imagens/gesso/molduras/decoradas/57[1].jpg" />';
					$produto = "moldura 57";
					break;
					case 58:
					echo '<img src="imagens/gesso/molduras/decoradas/58[1].jpg" />';
					$produto = "moldura 58";
					break;
					case 5:
					echo '<img src="imagens/gesso/molduras/decoradas/5[1].jpg"/>';
					$produto = "moldura 5";
					break;
					case 67:
					echo '<img src="imagens/gesso/molduras/decoradas/67[1].jpg" />';
					$produto = "moldura 67";
					break;
					case 6:
					echo '<img src="imagens/gesso/molduras/decoradas/6[1].jpg"/>';
					$produto = "moldura 6";
					break;
					case 13:
					echo '<img src="imagens/gesso/molduras/decoradas/13[1].jpg"/>';
					$produto = "moldura 13";
					break;
					case 14:
					echo '<img src="imagens/gesso/molduras/decoradas/14[1].jpg" />';
					$produto = "moldura 14";
					break;
					case 106:
					echo '<img src="imagens/gesso/molduras/decoradas/106[1].jpg"/>';
					$produto = "moldura 106";
					break;
					case 2:
					echo '<img src="imagens/gesso/molduras/decoradas/2[6].jpg" />';
					$produto = "moldura 2";
					break;
					case 65:
					echo '<img src="imagens/gesso/molduras/decoradas/65[1].jpg" />';
					$produto = "moldura 65";
					break;
				
				//Linha Lisa
					case 10:
					echo '<img src="imagens/gesso/molduras/lisa/10[1].jpg"/>';
					$produto = "moldura 10";
					break;
					case 11:
					echo '<img src="imagens/gesso/molduras/lisa/11[1].jpg"/>';
					$produto = "moldura 11";
					break;
					case 12:
					echo '<img src="imagens/gesso/molduras/lisa/12[1].jpg" />';
					$produto = "moldura 12";
					break;
					case 130:
					echo '<img src="imagens/gesso/molduras/lisa/130[1].jpg" />';
					$produto = "moldura 130";
					break;
					case 19:
					echo '<img src="imagens/gesso/molduras/lisa/19[1].jpg" />';
					$produto = "moldura 19";
					break;
					case 22:
					echo '<img src="imagens/gesso/molduras/lisa/22[1].jpg"/>';
					$produto = "moldura 22";
					break;
					case 29:
					echo '<img src="imagens/gesso/molduras/lisa/29[1].jpg" />';
					$produto = "moldura 29";
					break;
					case 59:
					echo '<img src="imagens/gesso/molduras/lisa/59[1].jpg" />';
					$produto = "moldura 59";
					break;
					case 61:
					echo '<img src="imagens/gesso/molduras/lisa/61[1].jpg" />';
					$produto = "moldura 61";
					break;
					case 63:
					echo '<img src="imagens/gesso/molduras/lisa/63[1].jpg" />';
					$produto = "moldura 63";
					break;
					case 84:
					echo '<img src="imagens/gesso/molduras/lisa/84[1].jpg" />';
					$produto = "moldura 84";
					break;
					case 89:
					echo '<img src="imagens/gesso/molduras/lisa/89[1].jpg" />';
					$produto = "moldura 89";
					break;
					case 8:
					echo '<img src="imagens/gesso/molduras/lisa/8[1].jpg"/>';
					$produto = "moldura 8";
					break;
					case 98:
					echo '<img src="imagens/gesso/molduras/lisa/98[1].jpg" />';
					$produto = "moldura 98";
					break;
					case 9:
					echo '<img src="imagens/gesso/molduras/lisa/9[1].jpg" />';
					$produto = "moldura 9";
					break;
					
				//Linha Plus
					case 7:
					echo '<img src="imagens/gesso/molduras/plus/07.jpg" />';
					$produto = "moldura 7";
					break;
					case 17:
					echo '<img src="imagens/gesso/molduras/plus/17.jpg" />';
					$produto = "moldura 17";
					break;
					case 18:
					echo '<img src="imagens/gesso/molduras/plus/18.jpg" />';
					$produto = "moldura 18";
					break;
					case 21:
					echo '<img src="imagens/gesso/molduras/plus/21.jpg" />';
					$produto = "moldura 21";
					break;
					case 23:
					echo '<img src="imagens/gesso/molduras/plus/23.jpg" />';
					$produto = "moldura 23";
					break;
					case 25:
					echo '<img src="imagens/gesso/molduras/plus/25.jpg" />';
					$produto = "moldura 25";
					break;
					case 28:
					echo '<img src="imagens/gesso/molduras/plus/28.jpg" />';
					$produto = "moldura 28";
					break;
					case 32:
					echo '<img src="imagens/gesso/molduras/plus/32.jpg"/>';
					$produto = "moldura 32";
					break;
					case 60:
					echo '<img src="imagens/gesso/molduras/plus/60.jpg" />';
					$produto = "moldura 60";
					break;
					case 83:
					echo '<img src="imagens/gesso/molduras/plus/83.jpg" />';
					$produto = "moldura 83";
					break;
					
			// CORDOES DE GESSO
				//LINHA LISA
				   	case 40:
					echo '<img src="imagens/gesso/cordoes/40[1].jpg"/>';
					$produto = "Cordão 40";
					break;
					case 38:
					echo '<img src="imagens/gesso/cordoes/38[1].jpg"/>';
					$produto = "Cordão 38";
					break;
					case 36:
					echo '<img src="imagens/gesso/cordoes/36[1].jpg"/>';
					$produto = "Cordão 36";
					break;
					case 118:
					echo '<img src="imagens/gesso/cordoes/118[1].jpg"/>';
					$produto = "Cordão 118";
					break;
					case 119:
					echo '<img src="imagens/gesso/cordoes/119[1].jpg"/>';
					$produto = "Cordão 119";
					break;
					case 34:
					echo '<img src="imagens/gesso/cordoes/34[1].jpg"/>';
					$produto = "Cordão 34";
					break;
					case 122:
					echo '<img src="imagens/gesso/cordoes/122[1].jpg"/>';
					$produto = "Cordão 122";
					break;
					case 35:
					echo '<img src="imagens/gesso/cordoes/35[1].jpg" />';
					$produto = "Cordão 35";
					break;
					case 37:
					echo '<img src="imagens/gesso/cordoes/37[1].jpg" />';
					$produto = "Cordão 37";
					break;
					case 117:
					echo '<img src="imagens/gesso/cordoes/117[1].jpg" />';
					$produto = "Cordão 117";
					break;
					case 113:
					echo '<img src="imagens/gesso/cordoes/113[1].jpg"/>';
					$produto = "Cordão 113";
					break;
					case 111:
					echo '<img src="imagens/gesso/cordoes/111[1].jpg"/>';
					$produto = "Cordão 111";
					break;
					
				//Linha Clean
					case 41:
					echo '<img src="imagens/gesso/cordoes/clean/41[1].jpg"/>';
					$produto = "Cordão 41";
					break;
					case 42:
					echo '<img src="imagens/gesso/cordoes/clean/42[1].jpg"/>';
					$produto = "Cordão 42";
					break;
					case 43:
					echo '<img src="imagens/gesso/cordoes/clean/43[1].jpg"/>';
					$produto = "Cordão 43";
					break;
					case 44:
					echo '<img src="imagens/gesso/cordoes/clean/44[1].jpg"/>';
					$produto = "Cordão 44";
					break;
					case 45:
					echo '<img src="imagens/gesso/cordoes/clean/45[1].jpg"/>';
					case 46:
					echo '<img src="imagens/gesso/cordoes/clean/46[1].jpg"/>';
					$produto = "Cordão 46";
					break;
					case 47:
					echo '<img src="imagens/gesso/cordoes/clean/47[1].jpg"/>';
					$produto = "Cordão 47";
					break;
					case 48:
					echo '<img src="imagens/gesso/cordoes/clean/48[1].jpg"/>';
					$produto = "Cordão 48";
					break;
					
			//GESSO Decorativos
				//Linha Aradelas
					case 52:
					echo '<img src="imagens/gesso/decorativo/aradelas/52[1].jpg"/>';
					$produto = "Decorativos 52";
					break;
					case 55:
					echo '<img src="imagens/gesso/decorativo/aradelas/55[1].jpg"/>';
					$produto = "Decorativos 55";
					break;
					case 56:
					echo '<img src="imagens/gesso/decorativo/aradelas/56[1].jpg"/>';
					$produto = "Decorativos 56";
					break;
					case 70:
					echo '<img src="imagens/gesso/decorativo/aradelas/70[1].jpg"/>';
					$produto = "Decorativos 70";
					break;
				
				//Linha Capteis
					case 114:
					echo '<img src="imagens/gesso/decorativo/capteis/114[1].jpg"/>';
					$produto = "Decorativos 114";
					break;
					case 121:
					echo '<img src="imagens/gesso/decorativo/capteis/121[1].jpg"/>';
					$produto = "Decorativos 121";
					break;
				
				//Linha Colunas Chapadas
					case 1003:
					echo '<img src="imagens/gesso/decorativo/coluna_chapada/base_conj[1].jpg" />';
					$produto = "Decorativos Captel de coluna para parede";
					break;
					case 1004:
					echo '<img src="imagens/gesso/decorativo/coluna_chapada/base_conj_nova[1].jpg" />';
					$produto = "Decorativos Base do Conjunto";
					break;
					case 1005:
					echo '<img src="imagens/gesso/decorativo/coluna_chapada/captel_coluna[1].jpg"/>';
					$produto = "Decorativos Captel de coluna";
					break;
					case 1006:
					echo '<img src="imagens/gesso/decorativo/coluna_chapada/corpo_conj[1].jpg"/>';
					$produto = "Decorativos Corpo do conjunto de acordo com metragem";
					break;
					
				//Linha Florões
					case 300:
					echo '<img src="imagens/gesso/decorativo/floroes/41[1].jpg"/>';
					$produto = "Decorativos 300";
					break;
					case 301:
					echo '<img src="imagens/gesso/decorativo/floroes/42[1].jpg"/>';
					$produto = "Decorativos 301";
					break;
					case 302:
					echo '<img src="imagens/gesso/decorativo/floroes/43[2].jpg"/>';
					$produto = "Decorativos 302";
					break;
					case 303:
					echo '<img src="imagens/gesso/decorativo/floroes/44[2].jpg"/>';
					$produto = "Decorativos 303";
					break;
					case 304:
					echo '<img src="imagens/gesso/decorativo/floroes/45[2].jpg"/>';
					$produto = "Decorativos 304";
					break;
					case 305:
					echo '<img src="imagens/gesso/decorativo/floroes/46[1].jpg" />';
					$produto = "Decorativos 305";
					break;
					case 306:
					echo '<img src="imagens/gesso/decorativo/floroes/69[1].jpg"/>';
					$produto = "Decorativos 306";
					break;
					case 307:
					echo '<img src="imagens/gesso/decorativo/floroes/70[2].jpg"/>';
					$produto = "Decorativos 307";
					break;
				
				//Linha Rozetas
					case 308:
					echo '<img src="imagens/gesso/decorativo/rozetas/71[1].jpg" />';
					$produto = "Decorativos 308";
					break;
					case 309:
					echo '<img src="imagens/gesso/decorativo/rozetas/72[1].jpg" />';
					$produto = "Decorativos 309";
					break;
					case 310:
					echo '<img src="imagens/gesso/decorativo/rozetas/73[1].jpg" />';
					$produto = "Decorativos 310";
					break;
					case 1008:
					echo '<img src="imagens/gesso/decorativo/rozetas/73p[1].jpg" />';
					$produto = "Decorativos 73p";
					break;
					case 311:
					echo '<img src="imagens/gesso/decorativo/rozetas/74[1].jpg" />';
					$produto = "Decorativos 311";
					break;
					case 312:
					echo '<img src="imagens/gesso/decorativo/rozetas/76[1].jpg" />';
					$produto = "Decorativos 312";
					break;
					case 313:
					echo '<img src="imagens/gesso/decorativo/rozetas/78[1].jpg" />';
					$produto = "Decorativos 313";
					break;
					
				//Linha Viguinhas Vitrais
					case 314:
					echo '<img src="imagens/gesso/decorativo/viguinhas_vitrais/90[1].jpg" />';
					$produto = "Decorativos 314";
					break;
					case 315:
					echo '<img src="imagens/gesso/decorativo/viguinhas_vitrais/91[1].jpg" />';
					$produto = "Decorativos 315";
					break;
					case 316:
					echo '<img src="imagens/gesso/decorativo/viguinhas_vitrais/95[1].jpg" />';
					$produto = "Decorativos 316";
					break;
					case 317:
					echo '<img src="imagens/gesso/decorativo/viguinhas_vitrais/96[1].jpg"/>';
					$produto = "Decorativos 317";
					break;
					case 318:
					echo '<img src="imagens/gesso/decorativo/viguinhas_vitrais/97[1].jpg" />';
					$produto = "Decorativos 318";
					break;
					case 319:
					echo '<img src="imagens/gesso/decorativo/viguinhas_vitrais/99[1].jpg" />';
					$produto = "Decorativos 319";
					break;
					
				//Linha Meia Coluna
					case 116:
					echo '<img src="imagens/gesso/decorativo/meia_coluna/116[1].jpg"/>';
					$produto = "Decorativos 116";
					break;
					case 120:
					echo '<img src="imagens/gesso/decorativo/meia_coluna/120[1].jpg" />';
					$produto = "Decorativos 120";
					break;
					case 1007:
					echo '<img src="imagens/gesso/decorativo/meia_coluna/raio01[1].jpg" />';
					$produto = "Decorativos Peças em Raio";
					break;
					
				//Linha Mão Francesa
					case 110:
					echo '<img src="imagens/gesso/decorativo/mao_francesa/110[1].jpg"/>';
					$produto = "Decorativos 110";
					break;
					
			//Vitrais em Gesso
				//Linha Vitrais
					case 250:
					echo '<img src="imagens/gesso/vitral/250[1].jpg"/>';
					$produto = "Vitrais 250";
					break;
					case 251:
					echo '<img src="imagens/gesso/vitral/251[1].jpg" />';
					$produto = "Vitrais 251";
					break;
					case 252:
					echo '<img src="imagens/gesso/vitral/252[1].jpg" />';
					$produto = "Vitrais 252";
					break;
					case 253:
					echo '<img src="imagens/gesso/vitral/253[1].jpg"/>';
					$produto = "Vitrais 253";
					break;
					case 254:
					echo '<img src="imagens/gesso/vitral/254[1].jpg" />';
					$produto = "Vitrais 254";
					break;
					case 255:
					echo '<img src="imagens/gesso/vitral/255[1].jpg"/>';
					$produto = "Vitrais 255";
					break;
					case 264:
					echo '<img src="imagens/gesso/vitral/264[1].jpg" />';
					$produto = "Vitrais 264";
					break;
					case 258:
					echo '<img src="imagens/gesso/vitral/258[1].jpg" />';
					$produto = "Vitrais 258";
					break;
					case 259:
					echo '<img src="imagens/gesso/vitral/259[1].jpg"/>';
					$produto = "Vitrais 259";
					break;
					case 260:
					echo '<img src="imagens/gesso/vitral/260[1].jpg" />';
					$produto = "Vitrais 260";
					break;
					case 261:
					echo '<img src="imagens/gesso/vitral/261[1].jpg"/>';
					$produto = "Vitrais 261";
					break;
					case 262:
					echo '<img src="imagens/gesso/vitral/262[1].jpg"/>';
					$produto = "Vitrais 262";
					break;
					case 263:
					echo '<img src="imagens/gesso/vitral/263[1].jpg" />';
					$produto = "Vitrais 263";
					break;
					case 266:
					echo '<img src="imagens/gesso/vitral/266[1].jpg"/>';
					$produto = "Vitrais 266";
					break;
					case 268:
					echo '<img src="imagens/gesso/vitral/268[1].jpg" />';
					$produto = "Vitrais 268";
					break;
					case 269:
					echo '<img src="imagens/gesso/vitral/269[1].jpg"/>';
					$produto = "Vitrais 269";
					break;
					case 270:
					echo '<img src="imagens/gesso/vitral/270[1].jpg" />';
					$produto = "Vitrais 270";
					break;
					case 271:
					echo '<img src="imagens/gesso/vitral/271[1].jpg"/>';
					$produto = "Vitrais 271";
					break;
					case 272:
					echo '<img src="imagens/gesso/vitral/272[1].jpg"/>';
					$produto = "Vitrais 272";
					break;
					case 273:
					echo '<img src="imagens/gesso/vitral/273[1].jpg"/>';
					$produto = "Vitrais 273";
					break;
					case 274:
					echo '<img src="imagens/gesso/vitral/274[1].jpg" />';
					$produto = "Vitrais 274";
					break;
					case 276:
					echo '<img src="imagens/gesso/vitral/276[1].jpg"/>';
					$produto = "Vitrais 276";
					break;
					case 277:
					echo '<img src="imagens/gesso/vitral/277[1].jpg" />';
					$produto = "Vitrais 277";
					break;
					case 275:
					echo '<img src="imagens/gesso/vitral/275[1].jpg" />';
					$produto = "Vitrais 275";
					break;
					case 282:
					echo '<img src="imagens/gesso/vitral/282[1].jpg" />';
					$produto = "Vitrais 282";
					break;
					case 284:
					echo '<img src="imagens/gesso/vitral/284[1].jpg"/>';
					$produto = "Vitrais 284";
					break;
					case 285:
					echo '<img src="imagens/gesso/vitral/285[1].jpg" />';
					$produto = "Vitrais 285";
					break;
					case 286:
					echo '<img src="imagens/gesso/vitral/286[1].jpg" />';
					$produto = "Vitrais 286";
					break;
					case 291:
					echo '<img src="imagens/gesso/vitral/291[1].jpg" />';
					$produto = "Vitrais 291";
					break;
					case 292:
					echo '<img src="imagens/gesso/vitral/292[1].jpg" />';
					$produto = "Vitrais 292";
					break;
					case 293:
					echo '<img src="imagens/gesso/vitral/293[1].jpg"/>';
					$produto = "Vitrais 293";
					break;
					case 294:
					echo '<img src="imagens/gesso/vitral/294[1].jpg" />';
					$produto = "Vitrais 294";
					break;
					case 265:
					echo '<img src="imagens/gesso/vitral/265[1].jpg"/>';
					$produto = "Vitrais 265";
					break;
					case 296:
					echo '<img src="imagens/gesso/vitral/296[1].jpg" />';
					$produto = "Vitrais 296";
					break;
					case 297:
					echo '<img src="imagens/gesso/vitral/297[1].jpg"/>';
					$produto = "Vitrais 297";
					break;
					case 267:
					echo '<img src="imagens/gesso/vitral/267[1].jpg" />';
					$produto = "Vitrais 267";
					break;
					case 275:
					echo '<img src="imagens/gesso/vitral/275[1].jpg"/>';
					$produto = "Vitrais 275";
					break;
					case 287:
					echo '<img src="imagens/gesso/vitral/287[1].jpg"/>';
					$produto = "Vitrais 287";
					break;
					case 295:
					echo '<img src="imagens/gesso/vitral/295[1].jpg" />';
					$produto = "Vitrais 295";
					break;
    				}
	// FIM DO LINK DAS IMAGENS
	
	?>
                </td>
                <td align="right" id="texto">Nome:</td>
                <td colspan="2"><label>
                  <input name="nome" type="text" id="nome" size="30" />
                </label></td>
              </tr>
              <tr>
              <td align="right" id="texto">Telefone</td>
                <td colspan="2"><label>
                  <input name="telefone" type="text" id="telefone" size="30" />
                </label></td>
              </tr>
              <tr>
              <td align="right" id="texto">E-mail</td>
                <td colspan="2"><label>
                  <input name="email" type="text" id="email" size="30" />
                </label></td>
              </tr>
              <tr>
              <td align="right" id="texto">Metros Quatrados</td>
                <td colspan="2"><label>
                  <input name="metros" type="text" id="metros" size="30" />
                </label></td>
              </tr>
              <tr>
              <td id="texto" align="right" valign="top">Obs.:</td>
                <td colspan="2"><textarea name="obs" cols="23" rows="5" id="obs"></textarea>
                <input name="produto" type="hidden" id="produto" value="<?php echo $produto ?>"/></td>
              </tr>
              <tr>
                <td width="122" align="left"><label>
                  <input type="reset" name="limpar" id="limpar" value="Limpar" />
                </label></td>
                <td width="178" align="right">
                <!--<a href="envia_orcamento.php" class="lightwindow_action" params="lightwindow_form=orcamento" rel="submitForm">
                <button>Envia Or&ccedil;amento</button></a> -->
                  <input type="submit" name="Enviar Orçamento" id="orcamento" value="Enviar Or&ccedil;amento"/>
                </td>
              </tr>
              </table>
      </form>
</td>
  </tr>
</table>
</body>
</html>
