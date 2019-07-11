<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>..:: Servi&ccedil;os RN - Envie Seu Or&ccedil;amento ::..</title>
<style type="text/css">
<!--
body table {
	background-color: #FFF;
	width: 550px;
	height: 360px;
}
body h1 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 24px;
	color: #f00;
	font-weight: bolder;
	text-align: center;
}
body table tr td p {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 14px;
	color: #000;
}
#orcamento table {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
#orcamento table tr td {
	padding: 2px;
}
-->
</style>
</head>

<body>
<table width="450" border="0" align="center">
  <tr align="center">
    <td>
<h1>Or&ccedil;amento</h1>
<p><br />
  Obrigado pelo contato<br />
  <br />
</p>

<p>    <?php 
require_once("phpmailer/class.phpmailer.php");
//*$dados = $_REQUEST['fale'];

$mail = new PHPMailer();
$mail->IsMail(true);
$mail->IsHTML(true);
$mail->From = $_POST['email'];
$mail->FromName = $_POST['nome'];
$mail->AddAddress("cesarbruschetta@uol.com.br","Serviços RN");
$mail->Subject = "Pedido de Orçamento";
$mail->Body = "<b>Nome:</b> ".$_POST['nome']." <br /><br />
               <b>Telefone:</b> ".$_POST['telefone']." <br /><br />
			   <b>E-mail:</b> ".$_POST['email']." <br /><br />
               <b>Metros Quatrados</b> ".$_POST['metros']." <br /><br />
			   <b>Materias desejado</b> ".$_POST['produto']." <br /><br />
			   <b>Mensagem:</b> ".$_POST['obs'];
if($mail->Send())
{    echo "Seu Orçamento foi enviada com sucesso !!! ";
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
<p>Click no "X" abaixo para Fechar a Janela</p>
<br /> </td>
	</tr>
    </table>
</body>
</html>