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
  $updateSQL = sprintf("UPDATE mostakhdem SET name=%s, email=%s, contactno=%s, password=%s, shippingAddress=%s, shippingState=%s, shippingCity=%s, shippingPincode=%s, billingAddress=%s, billingState=%s, billingCity=%s, billingPincode=%s, regDate=%s, updationDate=%s WHERE id=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['contactno'], "int"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['shippingAddress'], "text"),
                       GetSQLValueString($_POST['shippingState'], "text"),
                       GetSQLValueString($_POST['shippingCity'], "text"),
                       GetSQLValueString($_POST['shippingPincode'], "int"),
                       GetSQLValueString($_POST['billingAddress'], "text"),
                       GetSQLValueString($_POST['billingState'], "text"),
                       GetSQLValueString($_POST['billingCity'], "text"),
                       GetSQLValueString($_POST['billingPincode'], "int"),
                       GetSQLValueString($_POST['regDate'], "date"),
                       GetSQLValueString($_POST['updationDate'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "most_view.php";
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
$query_Recordset1 = sprintf("SELECT * FROM mostakhdem WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
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
    <td align="center"><h2><strong>المستخدمين</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الاسم:</td>
            <td><input type="text" name="name" value="<?php echo htmlentities($row_Recordset1['name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">البريد الالكتروني:</td>
            <td><input type="text" name="email" value="<?php echo htmlentities($row_Recordset1['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">رقم الاتصال:</td>
            <td><input type="text" name="contactno" value="<?php echo htmlentities($row_Recordset1['contactno'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">كلمة المرور:</td>
            <td><input type="text" name="password" value="<?php echo htmlentities($row_Recordset1['password'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">العنوان:</td>
            <td><input type="text" name="shippingAddress" value="<?php echo htmlentities($row_Recordset1['shippingAddress'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المدينة:</td>
            <td><input type="text" name="shippingCity" value="<?php echo htmlentities($row_Recordset1['shippingCity'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الرقم البريدي:</td>
            <td><input type="text" name="shippingPincode" value="<?php echo htmlentities($row_Recordset1['shippingPincode'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="تعديل" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
        <input type="hidden" name="shippingState" value="<?php echo htmlentities($row_Recordset1['shippingState'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="billingAddress" value="<?php echo htmlentities($row_Recordset1['billingAddress'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="billingState" value="<?php echo htmlentities($row_Recordset1['billingState'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="billingCity" value="<?php echo htmlentities($row_Recordset1['billingCity'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="billingPincode" value="<?php echo htmlentities($row_Recordset1['billingPincode'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="regDate" value="<?php echo htmlentities($row_Recordset1['regDate'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="updationDate" value="<?php echo htmlentities($row_Recordset1['updationDate'], ENT_COMPAT, 'utf-8'); ?>" />
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
