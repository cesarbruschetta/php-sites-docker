<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Speedy AutoMotors -  Enviar Responta</title>
<style type="text/css">
<!--
body table tr th {
	font-size: 16px;
	color: #00F;
	font-family: Verdana, Geneva, sans-serif;
	padding: 5px;
}
#Mensagem tr td{
	border: 2px dashed #06F;
	padding: 5px;
}
body table tr td a {
	font-family: Verdana, Geneva, sans-serif;
	color: #06F;
	font-weight: bolder;
	margin: 5px;
}
-->
</style>
</head>

<body>
<table width="640" border="0" align="center">
  <tr>
    <th>Enviando Resposta da Mensagem</th>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php 
require_once("../phpmailer/class.phpmailer.php");
//*$dados = $_REQUEST['fale'];

$mail = new PHPMailer();
$mail->IsMail(true);
$mail->IsHTML(true);
$mail->From = $_POST['email_from'];
$mail->FromName = $_POST['nome'];
$mail->AddAddress = $_POST['email_resp'];
$mail->Subject = "Resposta da Menssagem - ".$_POST['assunto'];
$mail->Body = "<b>Nome do Atendente:</b> ".$_POST['nome']." <br /><br />
               <b>Telefone para contato :</b> ".$_POST['telefone']." <br /><br />
			   <b>Assunto:</b> ".$_POST['assunto']." <br /><br />
			   <b>Mensagem:</b> ".$_POST['texto'];
if($mail->Send()) { ?>

	  <p>Sua mensagem foi enviada com sucesso !!!<br />
	    <br />
Para responde outra mensagem click no link abaixo!!</p>	  <?php
}
else
{    echo "Erro ao enviar e-mail, tente novamente mais tarde.";
}
?></td>
  </tr>
  <tr>
    <td align="center"><a href="#" onclick="self.parent.tb_remove();">&lt;&lt; Voltar pagina de Mensagens</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>