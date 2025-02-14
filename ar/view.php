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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 100;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM mwmembers ORDER BY id DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($connection,$query_limit_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysqli_query($connection,$query_Recordset1);
  $totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
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
<?php include 'header.php'; ?>

<table width="100%" border="0" cellpadding="6" cellspacing="6" dir="rtl">
  <tr>
    <td align="center"><h2><strong>الأعضاء</strong></h2></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30"><form id="form1" name="form1" method="get" action="searchnname.php">
          <table border="0" align="center" cellpadding="1" cellspacing="1">
            <tr>
              <td>&nbsp;</td>
              <td>اسم العضو</td>
              <td><input type="text" name="Name" id="Name" /></td>
              <td><input type="submit" name="button" id="button" value="بحث" /></td>
              </tr>
            </table>
        </form></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;
      <table id="myTable" border="1">
        <tr align="center" bgcolor="#7470B3">
          <th><strong>#</strong></th>
          <th><strong>الاسم</strong></th>
          <th><strong>الموبايل</strong></th>
          <th>كود الدولة</th>
          <th><strong>الدولة</strong></th>
          <th width="50"><strong>تعديل</strong></th>
          <th width="50"><strong>حذف</strong></th>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['id']; ?></td>
            <td><?php echo $row_Recordset1['Name']; ?></td>
            <td><?php echo $row_Recordset1['Phone']; ?></td>
            <td><?php echo $row_Recordset1['Jop']; ?></td>
            <td><?php echo $row_Recordset1['Address']; ?></td>
            <td width="50"><a href="edit.php?id=<?php echo $row_Recordset1['id']; ?>">تعديل</a></td>
            <td width="50"><a href="delete.php?id=<?php echo $row_Recordset1['id']; ?>">حذف</a></td>
          </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="center">
      <table width="400" border="0" cellpadding="4" cellspacing="4" dir="rtl">
        <tr bgcolor="#E3FFF8">
          <td width="100" align="center"><strong>
            <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>">أول سجل</a>
              <?php } // Show if not first page ?>
          </strong></td>
          <td width="100" align="center"><strong>
            <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>">السجل السابق</a>
              <?php } // Show if not first page ?>
          </strong></td>
          <td width="100" align="center"><strong>
            <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>">السجل التالي</a>
              <?php } // Show if not last page ?>
          </strong></td>
          <td width="100" align="center"><strong>
            <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>">آخر سجل</a>
              <?php } // Show if not last page ?>
          </strong></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><table width="100%" border="0" cellpadding="0" cellspacing="0" dir="rtl">
      <tr>
        <td align="center">&nbsp;
          سجل <?php echo ($startRow_Recordset1 + 1) ?> إلى <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> من <?php echo $totalRows_Recordset1 ?> سجل</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
