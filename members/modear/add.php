<?php require_once('connections/connection.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO mwmembers (id, Name, NID, Phone, Qualification, Jop, Image, NIDFront, NIDBack, Address, Type, `Position`, PositionSection, PositionUnit, Status, Charty, MemberID, Notes, create_date, update_date, create_by, update_by) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['NID'], "text"),
                       GetSQLValueString($_POST['Phone'], "text"),
                       GetSQLValueString($_POST['Qualification'], "text"),
                       GetSQLValueString($_POST['Jop'], "text"),
                       GetSQLValueString($_POST['Image'], "text"),
                       GetSQLValueString($_POST['NIDFront'], "text"),
                       GetSQLValueString($_POST['NIDBack'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
                       GetSQLValueString($_POST['Type'], "text"),
                       GetSQLValueString($_POST['Position'], "text"),
                       GetSQLValueString($_POST['PositionSection'], "text"),
                       GetSQLValueString($_POST['PositionUnit'], "text"),
                       GetSQLValueString($_POST['Status'], "text"),
                       GetSQLValueString($_POST['Charty'], "text"),
                       GetSQLValueString($_POST['MemberID'], "text"),
                       GetSQLValueString($_POST['Notes'], "text"),
                       GetSQLValueString($_POST['create_date'], "text"),
                       GetSQLValueString($_POST['update_date'], "text"),
                       GetSQLValueString($_POST['create_by'], "text"),
                       GetSQLValueString($_POST['update_by'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM mwmembers WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
</head>

<body>
<?php include 'header.php'; ?>

<table width="100%" border="0" cellpadding="6" cellspacing="6" dir="rtl">
  <tr>
    <td align="center"><h2><strong>الأعضاء</strong></h2></td>
  </tr>
  <tr>
    <td align="center">&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الاسم:</td>
            <td><input type="text" name="Name" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الرقم القومي:</td>
            <td><input type="text" name="NID" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">رقم الموبايل:</td>
            <td><input type="text" name="Phone" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المؤهل:</td>
            <td><input type="text" name="Qualification" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الوظيفة:</td>
            <td><input type="text" name="Jop" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">العنوان:</td>
            <td><input type="text" name="Address" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">النوع:</td>
            <td><input type="text" name="Type" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المنصب:</td>
            <td><input type="text" name="Position" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المنصب التنظيمي:</td>
            <td><input type="text" name="PositionSection" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الوحدة الحزبية:</td>
            <td><input type="text" name="PositionUnit" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الحالة:</td>
            <td><input type="text" name="Status" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">رقم العضوية:</td>
            <td><input type="text" name="MemberID" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right"><input type="hidden" name="create_by" value="الإدارة" size="32" />
            <input type="hidden" name="update_date" size="32" />              <input name="update_by" type="hidden" size="32" />            <input type="hidden" name="create_date" value="<?php echo date("Y.m.d"); ?>" size="32" /></td>
            <td><input type="submit" value="إضافة" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
