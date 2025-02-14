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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO agents (id, name, email, contactno, password, shippingAddress, shippingState, shippingCity, shippingPincode, billingAddress, billingState, billingCity, billingPincode, regDate, updationDate) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
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
                       GetSQLValueString($_POST['updationDate'], "text"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "wakel_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
    <td align="center"><h2><strong>الوكلاء</strong></h2></td>
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
            <td><input type="text" name="name" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">البريد الالكتروني:</td>
            <td><input type="text" name="email" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">رقم الاتصال:</td>
            <td><input type="text" name="contactno" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">كلمة المرور:</td>
            <td><input type="text" name="password" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">العنوان:</td>
            <td><input type="text" name="shippingAddress" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المدينة:</td>
            <td><input type="text" name="shippingCity" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الرقم البريدي:</td>
            <td><input type="text" name="shippingPincode" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="إضافة" /></td>
          </tr>
        </table>
        <input type="hidden" name="shippingState" value="" size="32" />
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="billingAddress" value="" />
        <input type="hidden" name="billingState" value="" />
        <input type="hidden" name="billingCity" value="" />
        <input type="hidden" name="billingPincode" value="" />
        <input type="hidden" name="regDate" value="" />
        <input type="hidden" name="updationDate" value="" />
        <input type="hidden" name="MM_insert" value="form1" />
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