<?php require_once('connections/connection.php'); ?>
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
	
  $logoutGoTo = "../loginadmin.php";
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
    // Besides being logged in, you may restrict access to only certain sadmin based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain sadmin based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../loginadmin.php";
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

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = "SELECT * FROM mwmembers ORDER BY id ASC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
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


<table width="100%" border="0" cellpadding="6" cellspacing="6" dir="rtl">
  <tr>
    <td align="center"><h2><strong>طباعة الكشوف</strong></h2></td>
  </tr>
  <tr>
    <td>
      <table border="1" cellpadding="0" cellspacing="0">
        <tr align="center" bgcolor="#7470B3">
          <th><strong>#</strong></th>
          <th><strong>الاسم</strong></th>
          <th><strong>الرقم القومي</strong></th>
          <th><strong>الموبايل</strong></th>
          <th><strong>المؤهل</strong></th>
          <th><strong>الوظيفة</strong></th>
          <th colspan="2"><strong>العنوان</strong></th>
          <th><strong>نوع العضوية</strong></th>
          <th><strong>المنصب</strong></th>
          <th><strong>المنصب التنظيمي</strong></th>
          <th><strong>الوحدة الحزبية</strong></th>
          <th><strong>الحالة</strong></th>
          <th align="center">اشتراك العضوية</th>
          <th align="center">الاشتراك التنظيمي</th>
          <th><strong>رقم العضوية</strong></th>
          <th>كارنية عضوية</th>
          <th>كارنية تنظيمي</th>
        </tr>
        <?php do { ?>
          <tr align="center" bgcolor="#FFFFFF">
            <td><?php echo $row_Recordset1['id']; ?></td>
            <td align="right"><?php echo $row_Recordset1['Name']; ?></td>
            <td><?php echo $row_Recordset1['NID']; ?></td>
            <td><?php echo $row_Recordset1['Phone']; ?></td>
            <td><?php echo $row_Recordset1['Qualification']; ?></td>
            <td><?php echo $row_Recordset1['Jop']; ?></td>
            <td><?php echo $row_Recordset1['fixdaddress']; ?></td>
            <td><?php echo $row_Recordset1['Address']; ?></td>
            <td><?php echo $row_Recordset1['Type']; ?></td>
            <td><?php echo $row_Recordset1['Position']; ?></td>
            <td><?php echo $row_Recordset1['PositionSection']; ?></td>
            <td><?php echo $row_Recordset1['PositionUnit']; ?></td>
            <td><?php echo $row_Recordset1['Status']; ?></td>
            <td><?php echo $row_Recordset1['SadedOdwia']; ?></td>
            <td><?php echo $row_Recordset1['SadedTanzimi']; ?></td>
            <td><?php echo $row_Recordset1['MemberID']; ?></td>
            <td><?php echo $row_Recordset1['card1']; ?></td>
            <td><?php echo $row_Recordset1['card2']; ?></td>
          </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="center">&nbsp;<?php echo $totalRows_Recordset1 ?></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset1);
?>
