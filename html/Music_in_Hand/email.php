<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Music In Hand</title>
</head>
<body>
<?

$nome = $_POST["nome"];
$email   = $_POST["email"];
$estilo   = $_POST["estilo"];
$banda   = $_POST["banda"];
$mensagem  = $_POST["mensagem"];

// Verifica se O Campo nome tá preenchido
if (empty($nome)){
// HTML que aparecera o ERRO
        ?>
		<script language="JavaScript">alert('Campo Nome em branco!, Preencha-o corretamente!');
        location.href='contato.html';
        </script>;
		<?
}
// Verifica o Campo E-mail Tá preenchido
elseif (empty($email)){
// HTML que aparecera o ERRO
        ?>
		<script language="JavaScript">alert('Campo E-mail em branco!, Preencha-o corretamente!');
		location.href='contato.html';
        </script>;
		<?
}
// Verifoca Se o E-mail Contem @
elseif (!(strpos($email,"@")) OR strpos($email,"@") !=strrpos($email,"@")) {
// HTML que aparecera o ERRO
        ?>
		<script language="JavaScript">alert('Campo E-mail em branco!, Preencha-o corretamente!');
        location.href='contato.html';
        </script>;
		<?
}
// Verifica se o Campo Está Preenchido
elseif (empty($estilo)){
// HTML que aparecera o ERRO
        ?>
<script language="JavaScript">alert('Campo Estilo em branco!, Preencha-o corretamente!');
        location.href='contato.html';
        </script>;
		<?
}
// Verifica se o Campo Está Preenchido
elseif (empty($banda)){
// HTML que aparecera o ERRO
        ?>
		<script language="JavaScript">alert('Campo Banda em branco!, Preencha-o corretamente!');
        location.href='contato.html';
        </script>;
		<?
}
// Verifica se o Campo Mensagem tá preenchido
elseif (empty($mensagem)){
// HTML que aparecera o ERRO
        ?>
		<script language="JavaScript">alert('Campo Menssagem em branco!, Preencha-o corretamente!');
        location.href='contato.html';
        </script>;
		<?
};

</body>
</html>