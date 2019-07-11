<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_speedyam = $_ENV['MYSQL_HOST'];
$database_speedyam = "cesarbru_bd_speedy_am";
$username_speedyam = $_ENV['MYSQL_USER'];
$password_speedyam = $_ENV['MYSQL_PASS'];
$speedyam = mysql_pconnect($hostname_speedyam, $username_speedyam, $password_speedyam) or trigger_error(mysql_error(),E_USER_ERROR); 
?>


