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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO perm (id, username, sub_syndicate, users, members, deletedmembers, towns, `forms`, reports, requests, complaints, banks, payments, mail, backup, restore, searches, `add`, edit, `delete`, `view`, print) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['sub_syndicate'], "text"),
                       GetSQLValueString(isset($_POST['users']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['members']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['deletedmembers']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['towns']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['forms']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['reports']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['requests']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['complaints']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['banks']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['payments']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['mail']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['backup']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['restore']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['searches']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['add']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['edit']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['delete']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['view']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['print']) ? "true" : "", "defined","1","0"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "done.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = "SELECT * FROM responsible";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['username'])) {
  $colname_Recordset2 = $_GET['username'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM responsible WHERE username = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
</head>

<body>
<?php include 'header.php'; ?>

<table width="100%" border="0" cellpadding="4" cellspacing="4" dir="rtl">
  <tr>
    <td align="center"><h2><strong>صلاحيات المسئولين</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><form id="form1" name="form1" method="get" action="">
      <table border="0" align="center" cellpadding="4" cellspacing="4" dir="rtl">
        <tr>
          <td><label for="username"></label>
            <select name="username" id="username">
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset1['username']?>"><?php echo $row_Recordset1['first_name']?> <?php echo $row_Recordset1['bname']?> <?php echo $row_Recordset1['cname']?> <?php echo $row_Recordset1['last_name']?></option>
              <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
  $rows = mysqli_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  }
?>
            </select></td>
          <td><input type="submit" name="button" id="button" value="موافق" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;
      <?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>
        <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
          <table align="center">
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">المسئولين:
          <input name="username" type="hidden" id="username" value="<?php echo $row_Recordset2['username']; ?>" size="32" />          <input type="hidden" name="sub_syndicate" value="<?php echo $row_Recordset2['sub_syndicate']; ?>" size="32" /></td>
        <td><input type="checkbox" name="users" value="" /></td>
        <td align="right" nowrap="nowrap">الشكاوى والملاحظات:</td>
        <td><input name="complaints" type="checkbox" id="complaints" value="" /></td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">الاعضاء:</td>
        <td><input type="checkbox" name="members" value="" /></td>
        <td align="right" nowrap="nowrap">الحسابات المصرفية:</td>
        <td><input type="checkbox" name="banks" value="" /></td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">الأعضاء المحذوفة:</td>
        <td><input type="checkbox" name="deletedmembers" value="" /></td>
        <td align="right" nowrap="nowrap">سندات القبض:</td>
        <td><input type="checkbox" name="payments" value="" /></td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">الاقسام:</td>
        <td><input type="checkbox" name="towns" value="" /></td>
        <td align="right" nowrap="nowrap">القائمة البريدية:</td>
        <td><input type="checkbox" name="mail" value="" /></td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">النماذج:</td>
        <td><input type="checkbox" name="forms" value="" /></td>
        <td align="right" nowrap="nowrap">نسخ احتياطي:</td>
        <td><input type="checkbox" name="backup" value="" /></td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">التقارير:</td>
        <td><input type="checkbox" name="reports" value="" /></td>
        <td align="right" nowrap="nowrap">استعادة النسخة:</td>
        <td><input type="checkbox" name="restore" value="" /></td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">الطلبات:</td>
        <td><input name="requests" type="checkbox" id="requests" value="" /></td>
        <td align="right" nowrap="nowrap">البحث:</td>
        <td><input type="checkbox" name="searches" value="" /></td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">إضافة:</td>
        <td><input type="checkbox" name="add" value="" /></td>
        <td align="right" nowrap="nowrap">حذف:</td>
        <td><input type="checkbox" name="delete" value="" /></td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">تعديل:</td>
        <td><input type="checkbox" name="edit" value="" /></td>
        <td align="right" nowrap="nowrap">عرض:</td>
        <td><input type="checkbox" name="view" value="" /></td>
        </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">طباعة:</td>
        <td><input type="checkbox" name="print" value="" /></td>
        <td nowrap="nowrap">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td nowrap="nowrap" align="right">&nbsp;</td>
        <td colspan="2"><input type="submit" value="موافق" /></td>
        <td>&nbsp;</td>
        </tr>
      </table>
    <input type="hidden" name="id" value="" />
    <input type="hidden" name="MM_insert" value="form2" />
  </form>
  <?php } // Show if recordset not empty ?>
<p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>
