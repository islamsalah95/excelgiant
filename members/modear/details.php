<?php require_once('connections/connection.php'); ?><?php
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

$maxRows_DetailRS1 = 50;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_DetailRS1 = sprintf("SELECT * FROM sandat WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysqli_query($connection,$query_limit_DetailRS1) or die(mysqli_error($connection));
$row_DetailRS1 = mysqli_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysqli_query($connection,$query_DetailRS1);
  $totalRows_DetailRS1 = mysqli_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
</head>

<body>
<?php include 'header.php'; ?>
<table border="1" align="center">
  <tr>
    <td>رقم السند</td>
    <td><?php echo $row_DetailRS1['id']; ?></td>
  </tr>
  <tr>
    <td>اسم العضو</td>
    <td><?php echo $row_DetailRS1['adwname']; ?></td>
  </tr>
  <tr>
    <td>رقم العضوية</td>
    <td><?php echo $row_DetailRS1['adwid']; ?></td>
  </tr>
  <tr>
    <td>الوحدة الحزبية  التابع لها</td>
    <td><?php echo $row_DetailRS1['nekaba']; ?></td>
  </tr>
  <tr>
    <td>الخدمة المطلوبة</td>
    <td><?php echo $row_DetailRS1['service']; ?></td>
  </tr>
  <tr>
    <td>المبلغ</td>
    <td><?php echo $row_DetailRS1['mablagh']; ?></td>
  </tr>
  <tr>
    <td>طريقة السداد</td>
    <td><?php echo $row_DetailRS1['paymethod']; ?></td>
  </tr>
  <tr>
    <td>اسم الموظف</td>
    <td><?php echo $row_DetailRS1['mowazaf']; ?></td>
  </tr>
  <tr>
    <td>تاريخ السداد</td>
    <td><?php echo $row_DetailRS1['sanddate']; ?></td>
  </tr>
  <tr>
    <td>ملاحظات</td>
    <td><?php echo $row_DetailRS1['notes']; ?></td>
  </tr>
</table>
</body>
</html><?php
mysqli_free_result($DetailRS1);
?>