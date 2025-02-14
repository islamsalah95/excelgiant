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

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM message ORDER BY id DESC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
$query_Recordset1 = "SELECT * FROM message ORDER BY id DESC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body,td,th {
	color: #FFF;
}
body {
	background-color: #333;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td height="40" bgcolor="#EAEAEA">&nbsp;</td>
  </tr>
  <tr>
    <td height="150" align="center" valign="middle"><a href="send.php"><img src="finallogo.png" alt="" width="200" border="0" /></a></td>
  </tr>
  <tr>
    <td height="50" valign="bottom" bgcolor="#67c3fe">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><table width="200" border="0" align="left" cellpadding="2" cellspacing="2" dir="rtl">
      <tr>
        <td>&nbsp;</td>
        <td><a href="reports.php"><img src="reports.png" alt="" height="100" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><h1 align="center"><strong>تقرير عن طلبات سحب البونص</strong></h1></td>
  </tr>
  <tr>
    <td align="center"><form id="form1" name="form1" method="get" action="">
      <table border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td align="right"><input type="submit" name="button" id="button" value="موافق" /></td>
          <td><label for="subCategory"></label>
            <select name="subCategory" id="subCategory">
</select></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td align="center">&nbsp;
      <table border="1" align="center" cellpadding="2" cellspacing="2" dir="rtl">
        <tr>
          <td>id</td>
          <td>username</td>
          <td>date</td>
          <td>message</td>
          <td>replay</td>
          <td>total</td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['id']; ?></td>
            <td><?php echo $row_Recordset1['username']; ?></td>
            <td><?php echo $row_Recordset1['date']; ?></td>
            <td><?php echo $row_Recordset1['message']; ?></td>
            <td><?php echo $row_Recordset1['replay']; ?></td>
            <td><?php echo $row_Recordset1['total']; ?></td>
          </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
