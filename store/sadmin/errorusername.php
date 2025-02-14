<?php require_once('../connections/connection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
 global $connection;  // Make sure $connection is defined
$theValue = mysqli_real_escape_string($connection, $theValue);

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

$colname_Recordset1 = "-1";
if (isset($_GET['requsername'])) {
  $colname_Recordset1 = $_GET['requsername'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM members WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة التحكم</title>
</head>

<body>
<?php include 'header.php'; ?>

<table width="100%" border="0" align="center" cellpadding="4" cellspacing="4" dir="rtl">
  <tr>
    <td align="center"><img src="error.png" width="81" height="81" /></td>
  </tr>
  <tr>
    <td align="center"><h2>عفوا... اسم المستخدم مسجل بالفعل خاص بالعضو</h2></td>
  </tr>
  <tr>
    <td align="center"> <h1><strong><?php echo $row_Recordset1['aname']; ?>  <?php echo $row_Recordset1['bname']; ?>  <?php echo $row_Recordset1['bname']; ?>  <?php echo $row_Recordset1['dname']; ?> </strong></h1></td>
  </tr>
  <tr>
    <td align="center"><h2>يرجى ادخال اسم مستخدم جديد غير مسجل مسبقا </h2></td>
  </tr>
  <tr>
    <td align="center"><button onclick="history.back()">عودة</button></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
