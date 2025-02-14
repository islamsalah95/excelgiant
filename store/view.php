<?php require_once('../connections/connection.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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
  $insertSQL = sprintf("INSERT INTO message (id, username, `date`, message, replay) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['date'], "text"),
                       GetSQLValueString($_POST['message'], "text"),
                       GetSQLValueString($_POST['replay'], "text"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));
}

$colname_Recordset1 = $_SESSION['MM_Username'];
if (isset($_GET['email'])) {
  $colname_Recordset1 = $_GET['email'];
}
$colname_Recordset1 = "-1";

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM agents WHERE email = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset2 = $_GET['username'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM message WHERE username = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);


$colname_Recordset3 = $_SESSION['MM_Username'];
if (isset($_GET['email'])) {
  $colname_Recordset3 = $_GET['email'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = sprintf("SELECT * FROM agents WHERE email = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WASET الوسيط - متجر الوكلاء</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.headtitel {
	color: #666666;
	font-weight: bold;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="00" dir="rtl">
  <tr>
    <td height="40" colspan="3" bgcolor="#EAEAEA">&nbsp;</td>
  </tr>
  <tr>
    <td valign="middle">&nbsp;</td>
    <td width="250" align="center" valign="middle"><img src="finallogo.png" alt="" width="200" /></td>
    <td width="100" height="150" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" colspan="3" valign="bottom" bgcolor="#67c3fe">&nbsp;</td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
  <tr>
    <td align="center"></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center" dir="rtl">
          <tr valign="baseline">
            <td height="40" colspan="2" align="center" valign="top" nowrap="nowrap"><strong>طلب سحب البونص</strong></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right" valign="top">رسالة:</td>
            <td><textarea name="message" cols="50" rows="5"></textarea></td>
          </tr>
          <tr valign="baseline">
            <td colspan="2" align="right" nowrap="nowrap"><input type="submit" value="إرسال" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="username" value="<?php echo $_SESSION['MM_Username'] ?>" />
        <input type="hidden" name="date" value="<?php echo date("Y/m/d"); ?>" />
        <input type="hidden" name="replay" value="" />
        <input type="hidden" name="MM_insert" value="form1" />
    </form></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td height="40"><h2><strong>&nbsp;&nbsp;&nbsp;الطلبات السابقة</strong></h2></td>
  </tr>
  <tr>
    <td>
      <table width="90%" border="1" align="center" dir="rtl">
        <tr align="center" bgcolor="#CCCCCC">
          <td><strong>#</strong></td>
          <td><strong>اسم الوكيل</strong></td>
          <td width="100"><strong>التاريخ</strong></td>
          <td><strong>الرسالة</strong></td>
          <td><strong>رد الإدارة</strong></td>
          <td><strong>اجمالي البونص</strong></td>
        </tr>
        <?php do { ?>
          <tr align="center">
            <td><?php echo $row_Recordset2['id']; ?></td>
            <td><?php echo $row_Recordset2['username']; ?></td>
            <td width="100"><?php echo $row_Recordset2['date']; ?></td>
            <td><?php echo $row_Recordset2['message']; ?></td>
            <td><?php echo $row_Recordset2['replay']; ?></td>
            <td><?php echo $row_Recordset2['total']; ?></td>
          </tr>
          <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); ?>
    </table></td>
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

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);
?>
