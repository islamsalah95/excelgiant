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


$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM payments WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = "SELECT * FROM systemgroups";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_Recordset2 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset2 = $_GET['sub_syndicate'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM payments WHERE sub_syndicate = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);





$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE payments SET first_name=%s, bname=%s, cname=%s, last_name=%s, mail=%s, username=%s, password=%s, address=%s, country=%s, salary=%s, phone=%s, mobile=%s, details=%s, grad_img=%s, per_img=%s, sign_img=%s, grad_date=%s, grad_place=%s, id_card=%s, work_place=%s, create_date=%s, edit_date=%s, last_login=%s, create_by=%s, edit_by=%s, group_id=%s, active=%s, sub_syndicate=%s, job=%s, onus=%s WHERE id=%s",
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

  $updateGoTo = "payments_view.php?sub_syndicate=" . $row_Recordset1['sub_syndicate'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
  }
  header(sprintf("Location: %s", $updateGoTo));
}

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
    <td align="center"><h2><strong>عارض الصور</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم:</td>
            <td><input type="text" name="first_name" value="<?php echo htmlentities($row_Recordset1['first_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم الثاني:</td>
            <td><input type="text" name="bname" value="<?php echo htmlentities($row_Recordset1['bname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم الثالث:</td>
            <td><input type="text" name="cname" value="<?php echo htmlentities($row_Recordset1['cname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم الرابع:</td>
            <td><input type="text" name="last_name" value="<?php echo htmlentities($row_Recordset1['last_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">البريد الالكتروني:</td>
            <td><input type="text" name="mail" value="<?php echo htmlentities($row_Recordset1['mail'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم:</td>
            <td><input type="text" name="username" value="<?php echo htmlentities($row_Recordset1['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">كلمة المرور:</td>
            <td><input type="text" name="password" value="<?php echo htmlentities($row_Recordset1['password'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">العنوان:</td>
            <td><input type="text" name="address" value="<?php echo htmlentities($row_Recordset1['address'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الرابت:</td>
            <td><input type="text" name="salary" value="<?php echo htmlentities($row_Recordset1['salary'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الهاتف:</td>
            <td><input type="text" name="phone" value="<?php echo htmlentities($row_Recordset1['phone'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الجوال:</td>
            <td><input type="text" name="mobile" value="<?php echo htmlentities($row_Recordset1['mobile'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right" valign="top">ملاحظات:</td>
            <td><textarea name="details" cols="50" rows="5"><?php echo $row_Recordset1['details']; ?></textarea></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">صورة الصورة:</td>
            <td><input type="text" name="grad_img" value="<?php echo htmlentities($row_Recordset1['grad_img'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الصورة:</td>
            <td><input type="text" name="per_img" value="<?php echo htmlentities($row_Recordset1['per_img'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">صورة التوقيع:</td>
            <td><input type="text" name="sign_img" value="<?php echo htmlentities($row_Recordset1['sign_img'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">تاريخ التخرج:</td>
            <td><input type="text" name="grad_date" value="<?php echo htmlentities($row_Recordset1['grad_date'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الرقم الوطني:</td>
            <td><input type="text" name="id_card" value="<?php echo htmlentities($row_Recordset1['id_card'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">المجموعة:</td>
            <td><select name="group_id2">
              <option value="" <?php if (!(strcmp("", $row_Recordset1['group_id']))) {echo "selected=\"selected\"";} ?>>اختر</option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset3['id']?>"<?php if (!(strcmp($row_Recordset3['id'], $row_Recordset1['group_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset3['name']?></option>
              <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">التفعيل:</td>
            <td><select name="active">
              <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['active'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>مفعل</option>
              <option value="0" <?php if (!(strcmp(0, htmlentities($row_Recordset1['active'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>غير مفعل</option>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الوظيفة:</td>
            <td><input type="text" name="job" value="<?php echo htmlentities($row_Recordset1['job'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">التكليف:</td>
            <td><input type="text" name="onus" value="<?php echo htmlentities($row_Recordset1['onus'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right"><input name="edit_by" type="hidden" id="create_by" value="<?php echo $row_Recordset2['id']; ?>" size="32" />              <input type="hidden" name="edit_date" value="<?php echo date("Y-m-d h:i:s"); ?>" size="32" /></td>
            <td><input type="submit" value="تعديل" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
        <input type="hidden" name="country" value="<?php echo htmlentities($row_Recordset1['country'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="grad_place" value="<?php echo htmlentities($row_Recordset1['grad_place'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="work_place" value="<?php echo htmlentities($row_Recordset1['work_place'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="create_date" value="<?php echo htmlentities($row_Recordset1['create_date'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="last_login" value="<?php echo date("Y-m-d h:i:s"); ?>" />
        <input type="hidden" name="create_by" value="<?php echo htmlentities($row_Recordset1['create_by'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="sub_syndicate" value="<?php echo htmlentities($row_Recordset1['sub_syndicate'], ENT_COMPAT, 'utf-8'); ?>" />
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
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset2);
?>
