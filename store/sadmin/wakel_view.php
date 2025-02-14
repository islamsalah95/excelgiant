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
$query_Recordset1 = "SELECT * FROM agents ORDER BY id DESC";
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
    <td align="center"><h2><strong>الوكلاء</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><table width="200" border="1" align="left">
      <tr>
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="wakel_add.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
      <table  id="myTable" border="1" align="center">
        <tr bgcolor="#CCCCCC">
          <th nowrap="nowrap"><strong>#</strong></th>
          <th nowrap="nowrap"><strong>الاسم</strong></th>
          <th nowrap="nowrap"><strong>البريد الالكتروني</strong></th>
          <th nowrap="nowrap"><strong>رقم الاتصال</strong></th>
          <th nowrap="nowrap"><strong>العنوان</strong></th>
          <th nowrap="nowrap"><strong>المدينة</strong></th>
          <th nowrap="nowrap"><strong>الرقم البريدي</strong></th>
          <th nowrap="nowrap"><strong>تاريخ التسجيل</strong></th>
          <th width="50" nowrap="nowrap">تعديل</th>
          <th width="50" nowrap="nowrap"><strong>حذف</strong></th>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['id']; ?></td>
            <td><?php echo $row_Recordset1['name']; ?></td>
            <td><?php echo $row_Recordset1['email']; ?></td>
            <td><?php echo $row_Recordset1['contactno']; ?></td>
            <td><?php echo $row_Recordset1['shippingAddress']; ?></td>
            <td><?php echo $row_Recordset1['shippingCity']; ?></td>
            <td><?php echo $row_Recordset1['shippingPincode']; ?></td>
            <td><?php echo $row_Recordset1['regDate']; ?></td>
            <td width="50" align="center"><a href="wakel_edit.php?id=<?php echo $row_Recordset1['id']; ?>">تعديل</a></td>
            <td width="50" align="center"><a href="wakel_delete.php?id=<?php echo $row_Recordset1['id']; ?>">حذف</a></td>
          </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td><table width="200" border="1" align="left">
      <tr>
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="wakel_add.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
