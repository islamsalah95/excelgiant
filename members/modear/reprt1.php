<?php require_once('connections/connection.php'); ?>
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

$MM_restrictGoTo = "../modear.php";
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
$query_Recordset1 = "SELECT * FROM attend ORDER BY id DESC";
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

<table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center"><h2><strong>تقرير</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      <table width="98%" border="1" align="center" dir="rtl">
        <tr>
          <th align="center" bgcolor="#D9FFFF"><strong>#</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>تاريخ التمرينة</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>الوحدة الحزبية</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>القسم</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>الباقة</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>الباقة</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>الكلاس</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>عدد التمرينات</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>اجمالي التمرينات</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>تاريخ التفعيل</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>اسم العضو</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>رقم العضو</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>المدرب</strong></th>
          <th align="center" bgcolor="#D9FFFF"><strong>ملاحظات</strong></th>
        </tr>
        <?php do { ?>
          <tr align="center" bgcolor="#FFFFFF">
            <td nowrap="nowrap"><?php echo $row_Recordset1['id']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['Tarekh']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['Faraa']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['Section']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['Baka']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['Elbaka']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['classat']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['curenttamrina']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['CurrentTamrina']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['TafeelDate']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['MemberName']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['MemberId']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['Trainer']; ?></td>
            <td nowrap="nowrap"><?php echo $row_Recordset1['Notes']; ?></td>
          </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
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
?>
