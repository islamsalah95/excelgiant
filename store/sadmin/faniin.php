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
	
  $logoutGoTo = "../index.php";
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

$MM_restrictGoTo = "../index.php";
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

$colname_Recordset1 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset1 = $_GET['username'];
}
$colname_Recordset1 = "-1";
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM sadmin WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$maxRows_Recordset2 = 50;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = "SELECT * FROM fani ORDER BY id DESC";
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysqli_query($connection,$query_limit_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysqli_query($connection,$query_Recordset2);
  $totalRows_Recordset2 = mysqli_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = "SELECT * FROM categoryat ORDER BY id ASC";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$queryString_Recordset2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset2") == false && 
        stristr($param, "totalRows_Recordset2") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset2 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset2 = sprintf("&totalRows_Recordset2=%d%s", $totalRows_Recordset2, $queryString_Recordset2);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "main.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = true;
  mysqli_select_db($connection, "excelgia_mahmdata");
  
  $LoginRS__query=sprintf("SELECT username, password FROM sadmin WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($connection,$LoginRS__query) or die(mysqli_error($connection));
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
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
.ff {
	font-weight: bold;
}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center" valign="top"><h2><strong></strong></h2>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
        <tr>
          <td align="center"><h2><strong>الشهادات</strong></h2></td>
        </tr>
        <tr>
          <td><hr /></td>
        </tr>
        <tr>
          <td><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td height="30" align="center" bgcolor="#D9EAF4"><a href="addfani.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td>            <table id="myTable" width="95%" border="1" align="center" dir="rtl">
              <tr bgcolor="#7470B3">
                <th nowrap="nowrap"><strong>#</strong></th>
                <th nowrap="nowrap"><strong>تاريخ التسجيل</strong></th>
                <th nowrap="nowrap"><strong>الاسم</strong></th>
                <th nowrap="nowrap"><strong>رقم التسجيل</strong></th>
                <th nowrap="nowrap">الرقم القومي</th>
                <th nowrap="nowrap">صورة الشهادة</th>
                <th nowrap="nowrap">صورة الشهادة</th>
                <th nowrap="nowrap">صورة شخصية</th>
                <th nowrap="nowrap"><strong>فترة التدريب</strong></th>
                <th nowrap="nowrap"><strong>عنوان الكورس</strong></th>
                <th width="50" nowrap="nowrap">تعديل</th>
                <th width="50" nowrap="nowrap">حذف</th>
              </tr>
              <?php do { ?>
                <tr align="center" valign="middle">
                  <td><?php echo $row_Recordset2['id']; ?></td>
                  <td><?php echo $row_Recordset2['OrderDate']; ?></td>
                  <td><?php echo $row_Recordset2['OrderName']; ?></td>
                  <td><?php echo $row_Recordset2['OrderPhone']; ?></td>
                  <td><?php echo $row_Recordset2['OrderDetails']; ?></td>
                  <td><a href="../img/<?php echo $row_Recordset2['image']; ?>" target="_new"><img src="../img/<?php echo $row_Recordset2['image']; ?>" width="50" /></a></td>
                  <td><a href="../img/<?php echo $row_Recordset2['grad_img']; ?>" target="_new"><img src="../img/<?php echo $row_Recordset2['grad_img']; ?>" alt="" width="50" /></a></td>
                  <td><a href="../img/<?php echo $row_Recordset2['per_img']; ?>" target="_new"><img src="../img/<?php echo $row_Recordset2['per_img']; ?>" alt="" width="50" /></a></td>
                  <td><?php echo $row_Recordset2['OrderAddress']; ?><br></td>
                  <td><?php echo $row_Recordset2['OrderSDate']; ?></td>
                  <td width="50"><a href="faniinedit.php?id=<?php echo $row_Recordset2['id']; ?>">تعديل</a></td>
                  <td width="50"><a href="faniindelete.php?id=<?php echo $row_Recordset2['id']; ?>">حذف</a></td>
                </tr>
                <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); ?>
            </table>
            <br />
            <table border="0" align="center">
              <tr>
                <td><?php if ($pageNum_Recordset2 > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, 0, $queryString_Recordset2); ?>">First</a>
                    <?php } // Show if not first page ?></td>
                <td><?php if ($pageNum_Recordset2 > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, max(0, $pageNum_Recordset2 - 1), $queryString_Recordset2); ?>">Previous</a>
                    <?php } // Show if not first page ?></td>
                <td><?php if ($pageNum_Recordset2 < $totalPages_Recordset2) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, min($totalPages_Recordset2, $pageNum_Recordset2 + 1), $queryString_Recordset2); ?>">Next</a>
                    <?php } // Show if not last page ?></td>
                <td><?php if ($pageNum_Recordset2 < $totalPages_Recordset2) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, $totalPages_Recordset2, $queryString_Recordset2); ?>">Last</a>
                    <?php } // Show if not last page ?></td>
              </tr>
            </table>
Records <?php echo ($startRow_Recordset2 + 1) ?> to <?php echo min($startRow_Recordset2 + $maxRows_Recordset2, $totalRows_Recordset2) ?> of <?php echo $totalRows_Recordset2 ?></td>
        </tr>
        <tr>
          <td><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <td height="30" align="center" bgcolor="#D9EAF4"><a href="addfani.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);
?>