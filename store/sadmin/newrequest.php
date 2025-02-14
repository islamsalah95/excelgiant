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
$query_Recordset1 = "SELECT * FROM newrequest ORDER BY id ASC";
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
<table border="1" align="center" dir="rtl">
  <tr align="center" bgcolor="#CCCCCC">
    <th>اسم المشترك رباعي</th>
    <th>الرقم القومي</th>
    <th>المؤهل</th>
    <th>المحافظة</th>
    <th>العنوان</th>
    <th>الجنس</th>
    <th>الدورة التدريبية</th>
    <th>نوع التدريب</th>
    <th>رقم الموبايل</th>
    <th>تاريخ التقديم</th>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['sname']; ?></td>
      <td><?php echo $row_Recordset1['pphone']; ?></td>
      <td><?php echo $row_Recordset1['dob']; ?></td>
      <td><?php echo $row_Recordset1['age']; ?></td>
      <td><?php echo $row_Recordset1['address']; ?></td>
      <td><?php echo $row_Recordset1['type']; ?></td>
      <td><?php echo $row_Recordset1['score']; ?></td>
      <td><?php echo $row_Recordset1['stydytype']; ?></td>
      <td><?php echo $row_Recordset1['sphone']; ?></td>
      <td><?php echo $row_Recordset1['curentdate']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
