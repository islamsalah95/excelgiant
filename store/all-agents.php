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
$query_Recordset1 = "SELECT * FROM orders, products WHERE order.productid = product.id; ORDER BY id DESC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = "SELECT * FROM agents ORDER BY name ASC";
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = "SELECT * FROM products";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>التقارير</title>

</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="00" dir="rtl">
  <tr>
    <td height="40" bgcolor="#EAEAEA">&nbsp;</td>
  </tr>
  <tr>
    <td height="150" align="center" valign="middle"><a href="reports.php"><img src="finallogo.png" alt="" width="200" border="0" /></a></td>
  </tr>
  <tr>
    <td height="50" valign="bottom" bgcolor="#67c3fe">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="center" valign="bottom"><h1>تقرير عن عمليات كل الوكلاء</h1></td>
  </tr>
  <tr>
    <td height="50" valign="bottom"><form id="form1" name="form1" method="get" action="">
    </form></td>
  </tr>
  <tr>
    <td height="50" valign="bottom"><?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>
  <table width="95%" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr>
      <th height="50" bgcolor="#67C3FE">#</th>
      <th height="50" bgcolor="#67C3FE">الوكيل</th>
      <th height="50" bgcolor="#67C3FE">المنتج</th>
      <th width="100" bgcolor="#67C3FE">السعر</th>
      <th width="100" bgcolor="#67C3FE">البونص</th>
      <th height="50" bgcolor="#67C3FE">الكمية</th>
      <th height="50" bgcolor="#67C3FE">التاريخ</th>
      <th height="50" bgcolor="#67C3FE">طريقة السداد</th>
      <th height="50" bgcolor="#67C3FE">الحالة</th>
      </tr>
    <?php do { ?>
      <tr align="center">
        <td height="50"><?php echo $row_Recordset1['id']; ?></td>
        <td height="50"><select name="select4" id="select4">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset2['id']?>"<?php if (!(strcmp($row_Recordset2['id'], $row_Recordset1['userId']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset2['name']?></option>
          <?php
} while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
  $rows = mysqli_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
  }
?>
        </select></td>
        <td height="50"><select name="select3" id="select3">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset3['id']?>"<?php if (!(strcmp($row_Recordset3['id'], $row_Recordset1['productId']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset3['productName']?></option>
          <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
        </select></td>
        <td width="100"><label for="textfield"></label>
          <label for="select"></label>
          <select name="select" id="select">
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset3['id']?>"<?php if (!(strcmp($row_Recordset3['id'], $row_Recordset1['productId']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset3['productPrice']?></option>
            <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
          </select></td>
        <td width="100"><select name="select2" id="select2">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset3['id']?>"<?php if (!(strcmp($row_Recordset3['id'], $row_Recordset1['productId']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset3['productPriceBeforeDiscount']?></option>
          <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
        </select></td>
        <td height="50"><?php echo $row_Recordset1['quantity']; ?></td>
        <td height="50"><?php echo $row_Recordset1['orderDate']; ?></td>
        <td height="50"><?php echo $row_Recordset1['paymentMethod']; ?></td>
        <td height="50"><?php echo $row_Recordset1['orderStatus']; ?></td>
        </tr>
      <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
  </table>
  <?php } // Show if recordset not empty ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);
?>
