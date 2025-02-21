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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE mwmembers SET Name=%s, NID=%s, Phone=%s, Qualification=%s, Jop=%s, Image=%s, NIDFront=%s, NIDBack=%s, Address=%s, Type=%s, `Position`=%s, PositionSection=%s, PositionUnit=%s, Status=%s, Charty=%s, MemberID=%s, Notes=%s, SadedOdwia=%s, SadedTanzimi=%s, card1=%s, card2=%s, create_date=%s, update_date=%s, create_by=%s, update_by=%s WHERE id=%s",
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
                       GetSQLValueString(isset($_POST['SadedOdwia']) ? "true" : "", "defined","'مسدد العضوية'","'غير مسدد'"),
                       GetSQLValueString(isset($_POST['SadedTanzimi']) ? "true" : "", "defined","'مسدد التنظيمي'","'غير مسدد'"),
					   
                       GetSQLValueString(isset($_POST['card1']) ? "true" : "", "defined","'تم الاصدار'","'لم يتم الاصدار'"),
                       GetSQLValueString(isset($_POST['card2']) ? "true" : "", "defined","'تم الاصدار'","'لم يتم الاصدار'"),
					   
                       GetSQLValueString($_POST['create_date'], "text"),
                       GetSQLValueString($_POST['update_date'], "text"),
                       GetSQLValueString($_POST['create_by'], "text"),
                       GetSQLValueString($_POST['update_by'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "view.php";
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
            <td><input type="text" name="Name" value="<?php echo htmlentities($row_Recordset1['Name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">رقم الموبايل:</td>
            <td><input type="text" name="Phone" value="<?php echo htmlentities($row_Recordset1['Phone'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">العنوان:</td>
            <td><input type="text" name="Address" value="<?php echo htmlentities($row_Recordset1['Address'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">كلمة المرور:</td>
            <td><input name="Qualification" type="text" id="Qualification" value="<?php echo htmlentities($row_Recordset1['Qualification'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right"><input type="hidden" name="update_by" value="المدير" size="32" />
              <input type="hidden" name="create_by" value="<?php echo htmlentities($row_Recordset1['create_by'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
            <input type="hidden" name="update_date" value="<?php echo date("Y.m.d"); ?>" size="32" />              <input type="hidden" name="create_date" value="<?php echo htmlentities($row_Recordset1['create_date'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
            <td><input type="submit" value="تعديل" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
