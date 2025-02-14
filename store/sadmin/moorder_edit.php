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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE moorders SET name=%s, productname=%s, productcateg=%s, productprice=%s, productbonus=%s, quantity=%s, total=%s, totalbonus=%s, orderDate=%s, paymentMethod=%s, orderStatus=%s WHERE id=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['productname'], "text"),
                       GetSQLValueString($_POST['productcateg'], "text"),
                       GetSQLValueString($_POST['productprice'], "text"),
                       GetSQLValueString($_POST['productbonus'], "text"),
                       GetSQLValueString($_POST['quantity'], "int"),
                       GetSQLValueString($_POST['total'], "text"),
                       GetSQLValueString($_POST['totalbonus'], "text"),
                       GetSQLValueString($_POST['orderDate'], "date"),
                       GetSQLValueString($_POST['paymentMethod'], "text"),
                       GetSQLValueString($_POST['orderStatus'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "moorder_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM moorders WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>طلبيات المستخدمين</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الاسم:</td>
            <td><input type="text" name="name" value="<?php echo htmlentities($row_Recordset1['name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">القسم:</td>
            <td><input type="text" name="productname" value="<?php echo htmlentities($row_Recordset1['productname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الفئة:</td>
            <td><input type="text" name="productcateg" value="<?php echo htmlentities($row_Recordset1['productcateg'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">السعر:</td>
            <td><input type="text" name="productprice" value="<?php echo htmlentities($row_Recordset1['productprice'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">البونص:</td>
            <td><input type="text" name="productbonus" value="<?php echo htmlentities($row_Recordset1['productbonus'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الكمية:</td>
            <td><input type="text" name="quantity" value="<?php echo htmlentities($row_Recordset1['quantity'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الاجمالي:</td>
            <td><input type="text" name="total" value="<?php echo htmlentities($row_Recordset1['total'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">اجمالي البونص:</td>
            <td><input type="text" name="totalbonus" value="<?php echo htmlentities($row_Recordset1['totalbonus'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">طريقة السداد:</td>
            <td><input type="text" name="paymentMethod" value="<?php echo htmlentities($row_Recordset1['paymentMethod'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">حالة الطلب:</td>
            <td><select name="orderStatus">
              <option value="قيد المراجعة" <?php if (!(strcmp("قيد المراجعة", htmlentities($row_Recordset1['orderStatus'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>قيد المراجعة</option>
              <option value="تم الشحن" <?php if (!(strcmp("تم الشحن", htmlentities($row_Recordset1['orderStatus'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>تم الشحن</option>
              <option value="تم التسليم" <?php if (!(strcmp("تم التسليم", htmlentities($row_Recordset1['orderStatus'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>تم التسليم</option>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="تحديث" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
        <input type="hidden" name="orderDate" value="<?php echo htmlentities($row_Recordset1['orderDate'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
      </form>
    <p>&nbsp;</p></td>
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
