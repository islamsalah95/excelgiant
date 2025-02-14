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
$query_Recordset1 = "SELECT * FROM waorders ORDER BY id DESC";
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
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>طلبيات الوكلاء</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>
      <table id="myTable" border="1">
        <tr bgcolor="#CCCCCC">
          <th nowrap="nowrap"><strong>#</strong></th>
          <th nowrap="nowrap"><strong>الاسم</strong></th>
          <th nowrap="nowrap"><strong>القسم</strong></th>
          <th nowrap="nowrap"><strong>الفئة</strong></th>
          <th nowrap="nowrap"><strong>السعر</strong></th>
          <th nowrap="nowrap"><strong>البونص</strong></th>
          <th nowrap="nowrap"><strong>الكمية</strong></th>
          <th nowrap="nowrap"><strong>الاجمالي</strong></th>
          <th nowrap="nowrap">اجمالي البونص</th>
          <th nowrap="nowrap"><strong>تاريخ الطلب</strong></th>
          <th nowrap="nowrap"><strong>طريقة السداد</strong></th>
          <th nowrap="nowrap"><strong>حالة الطلب</strong></th>
          <th width="50" nowrap="nowrap">تحديث</th>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['id']; ?></td>
            <td><?php echo $row_Recordset1['name']; ?></td>
            <td><?php echo $row_Recordset1['productname']; ?></td>
            <td><?php echo $row_Recordset1['productcateg']; ?></td>
            <td><?php echo $row_Recordset1['productprice']; ?></td>
            <td><?php echo $row_Recordset1['productbonus']; ?></td>
            <td><?php echo $row_Recordset1['quantity']; ?></td>
            <td><?php echo $row_Recordset1['total']; ?></td>
            <td align="center"><?php echo $row_Recordset1['totalbonus']; ?></td>
            <td><?php echo $row_Recordset1['orderDate']; ?></td>
            <td><?php echo $row_Recordset1['paymentMethod']; ?></td>
            <td><?php echo $row_Recordset1['orderStatus']; ?></td>
            <td align="center"><a href="waorder_edit.php?id=<?php echo $row_Recordset1['id']; ?>">تحديث</a></td>
          </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
