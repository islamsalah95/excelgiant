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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE sadmin SET first_name=%s, bname=%s, cname=%s, last_name=%s, mail=%s, username=%s, password=md5(%s), address=%s, country=%s, salary=%s, phone=%s, mobile=%s, details=%s, grad_img=%s, per_img=%s, sign_img=%s, grad_date=%s, grad_place=%s, id_card=%s, work_place=%s, create_date=%s, edit_date=%s, last_login=%s, create_by=%s, edit_by=%s, group_id=%s, active=%s, sub_syndicate=%s, job=%s, onus=%s WHERE id=%s",
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['bname'], "text"),
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($_POST['last_name'], "text"),
                       GetSQLValueString($_POST['mail'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['country'], "text"),
                       GetSQLValueString($_POST['salary'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['details'], "text"),
                       GetSQLValueString($_POST['grad_img'], "text"),
                       GetSQLValueString($_POST['per_img'], "text"),
                       GetSQLValueString($_POST['sign_img'], "text"),
                       GetSQLValueString($_POST['grad_date'], "date"),
                       GetSQLValueString($_POST['grad_place'], "text"),
                       GetSQLValueString($_POST['id_card'], "text"),
                       GetSQLValueString($_POST['work_place'], "text"),
                       GetSQLValueString($_POST['create_date'], "date"),
                       GetSQLValueString($_POST['edit_date'], "date"),
                       GetSQLValueString($_POST['last_login'], "date"),
                       GetSQLValueString($_POST['create_by'], "int"),
                       GetSQLValueString($_POST['edit_by'], "int"),
                       GetSQLValueString($_POST['group_id'], "int"),
                       GetSQLValueString($_POST['active'], "int"),
                       GetSQLValueString($_POST['sub_syndicate'], "text"),
                       GetSQLValueString($_POST['job'], "text"),
                       GetSQLValueString($_POST['onus'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "main.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['username'])) {
  $colname_Recordset1 = $_GET['username'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM sadmin WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة التحكم</title>
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>تغيير كلمة المرور</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
</table>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center" dir="rtl">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">كلمة المرور:</td>
      <td><input type="text" name="password" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="تعديل" /></td>
    </tr>
  </table>
  <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
  <input type="hidden" name="first_name" value="<?php echo htmlentities($row_Recordset1['first_name'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="bname" value="<?php echo htmlentities($row_Recordset1['bname'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="cname" value="<?php echo htmlentities($row_Recordset1['cname'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="last_name" value="<?php echo htmlentities($row_Recordset1['last_name'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="mail" value="<?php echo htmlentities($row_Recordset1['mail'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="username" value="<?php echo htmlentities($row_Recordset1['username'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="address" value="<?php echo htmlentities($row_Recordset1['address'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="country" value="<?php echo htmlentities($row_Recordset1['country'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="salary" value="<?php echo htmlentities($row_Recordset1['salary'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="phone" value="<?php echo htmlentities($row_Recordset1['phone'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="mobile" value="<?php echo htmlentities($row_Recordset1['mobile'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="details" value="<?php echo htmlentities($row_Recordset1['details'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="grad_img" value="<?php echo htmlentities($row_Recordset1['grad_img'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="per_img" value="<?php echo htmlentities($row_Recordset1['per_img'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="sign_img" value="<?php echo htmlentities($row_Recordset1['sign_img'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="grad_date" value="<?php echo htmlentities($row_Recordset1['grad_date'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="grad_place" value="<?php echo htmlentities($row_Recordset1['grad_place'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="id_card" value="<?php echo htmlentities($row_Recordset1['id_card'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="work_place" value="<?php echo htmlentities($row_Recordset1['work_place'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="create_date" value="<?php echo htmlentities($row_Recordset1['create_date'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="edit_date" value="<?php echo htmlentities($row_Recordset1['edit_date'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="last_login" value="<?php echo htmlentities($row_Recordset1['last_login'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="create_by" value="<?php echo htmlentities($row_Recordset1['create_by'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="edit_by" value="<?php echo htmlentities($row_Recordset1['edit_by'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="group_id" value="<?php echo htmlentities($row_Recordset1['group_id'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="active" value="<?php echo htmlentities($row_Recordset1['active'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="sub_syndicate" value="<?php echo htmlentities($row_Recordset1['sub_syndicate'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="job" value="<?php echo htmlentities($row_Recordset1['job'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="onus" value="<?php echo htmlentities($row_Recordset1['onus'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
