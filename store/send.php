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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WASET الوسيط - متجر الوكلاء</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #333;
}
body,td,th {
	color: #FFF;
}
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body text="#FFFFFF" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="00" dir="rtl">
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
    <td height="50" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="00" dir="rtl">
      <tr>
        <td height="40" align="center"><table width="200" border="0" align="center" cellpadding="2" cellspacing="2" dir="rtl">
          <tr>
            <td align="center"><a href="reports.php"><img src="reports.png" alt="" height="100" border="0" /></a></td>
          </tr>
          <tr>
            <td align="center"><h1>التقارير</h1></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="40" align="center"><strong>طلبات سحب البونص</strong></td>
      </tr>
      <tr>
        <td>
          <table width="90%" border="1" align="center">
            <tr align="center">
              <td bgcolor="#000000"><strong>#</strong></td>
              <td bgcolor="#000000"><strong>اسم الوكيل</strong></td>
              <td bgcolor="#000000"><strong>التاريخ</strong></td>
              <td bgcolor="#000000"><strong>الرسالة</strong></td>
              <td bgcolor="#000000"><strong>رد الإدارة</strong></td>
              <td bgcolor="#000000"><strong>اجمالي البونص</strong></td>
              <td width="50" bgcolor="#000000"><strong>تعديل</strong></td>
              </tr>
            <?php do { ?>
              <tr align="center">
                <td><?php echo $row_Recordset1['id']; ?></td>
                <td><a href="wakeelorders.php?email=<?php echo $row_Recordset1['username']; ?>"><?php echo $row_Recordset1['username']; ?></a></td>
                <td><?php echo $row_Recordset1['date']; ?></td>
                <td><?php echo $row_Recordset1['message']; ?></td>
                <td><?php echo $row_Recordset1['replay']; ?></td>
                <td><?php echo $row_Recordset1['total']; ?></td>
                <td width="50"><a href="view-details.php?id=<?php echo $row_Recordset1['id']; ?>">تعديل</a></td>
                </tr>
              <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
