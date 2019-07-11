<?php require_once('../Connections/speedyam.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Rs_fotos = "-1";
if (isset($_GET['id_veic'])) {
  $colname_Rs_fotos = $_GET['id_veic'];
}
mysql_select_db($database_speedyam, $speedyam);
$query_Rs_fotos = sprintf("SELECT fotv_id, fotv_id_veiculo, fotv_src FROM sm_fotos_veiculos WHERE fotv_id_veiculo = %s ORDER BY fotv_id ASC", GetSQLValueString($colname_Rs_fotos, "int"));
$Rs_fotos = mysql_query($query_Rs_fotos, $speedyam) or die(mysql_error());
$row_Rs_fotos = mysql_fetch_assoc($Rs_fotos);
$totalRows_Rs_fotos = mysql_num_rows($Rs_fotos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Upload de Imagens</title>
</head>

<body>
<table width="870" border="0" align="center">
	<tr>  <td align="center" valign="middle">
   <?php
   if (($row_Rs_fotos == 0)) { 
	echo " &nbsp;&nbsp;" ;
   } else { 
   do { ?>
	    <img src=../"<?php echo $row_Rs_fotos['fotv_src']; ?>" height="150" width="150" />
    <?php } while ($row_Rs_fotos = mysql_fetch_assoc($Rs_fotos)); } ?>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Rs_fotos);
?>
</body>
</html>