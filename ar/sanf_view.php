<?php require_once('./connections/connection.php'); ?>
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

$maxRows_Recordset1 = 100;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM products ORDER BY id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($connection,$query_limit_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysqli_query($connection,$query_Recordset1);
  $totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة التحكم</title>
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
    <td align="center"><h2><strong> الأقسام</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><table width="200" border="1" align="left">
      <tr>
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="sanf_add.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;
      <table border="1" align="center" id="myTable">
        <tr bgcolor="#CCCCCC">
          <th nowrap="nowrap"><strong>#</strong></th>
          <th nowrap="nowrap"><strong>القسم</strong></th>
          <th nowrap="nowrap"><strong>الصنف</strong></th>
          <th nowrap="nowrap"><strong>الشركة المنتجة</strong></th>
          <th nowrap="nowrap"><strong>السعر</strong></th>
          <th nowrap="nowrap"><strong>البونص</strong></th>
          <th nowrap="nowrap"><strong>مصاريف الشحن</strong></th>
          <th colspan="3" align="center" nowrap="nowrap">صور القسم</th>
          <th nowrap="nowrap"><strong>الحالة</strong></th>
          <th width="50" nowrap="nowrap"><strong>تعديل</strong></th>
          <th width="50" nowrap="nowrap"><strong>حذف</strong></th>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['id']; ?></td>
            <td><?php echo $row_Recordset1['category']; ?></td>
            <td><?php echo $row_Recordset1['productName']; ?></td>
            <td><?php echo $row_Recordset1['productCompany']; ?></td>
            <td><?php echo $row_Recordset1['productPrice']; ?></td>
            <td><?php echo $row_Recordset1['productPriceBeforeDiscount']; ?></td>
            <td><?php echo $row_Recordset1['shippingCharge']; ?></td>
            <td align="center"><img src="../img/<?php echo $row_Recordset1['image']; ?>" alt="" height="50" /></td>
            <td align="center"><img src="../img/<?php echo $row_Recordset1['photo']; ?>" alt="" height="50" /></td>
            <td align="center"><img src="../img/<?php echo $row_Recordset1['picture']; ?>" alt="" height="50" /></td>
            <td><?php echo $row_Recordset1['productAvailability']; ?></td>
            <td width="50"><a href="sanf_edit.php?id=<?php echo $row_Recordset1['id']; ?>">تعديل</a></td>
            <td width="50"><a href="sanf_delete.php?id=<?php echo $row_Recordset1['id']; ?>">حذف</a></td>
          </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td><table width="200" border="1" align="left">
      <tr>
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="sanf_add.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
