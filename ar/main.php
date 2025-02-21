<?php require_once('./connections/connection.php'); ?>

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

$colname_Recordset1 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset1 = $_GET['username'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM sadmin WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
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
    <td align="center" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" dir="rtl">
        <tr>
          <td align="center"><h2><strong>لوحة التحكم</strong></h2></td>
        </tr>
        <tr>
          <td><hr /></td>
        </tr>
        <tr>
          <td><table width="90%" border="0" align="center" cellpadding="4" cellspacing="4" dir="ltr">
            <tr>
              <td width="20%" align="center"><strong><img src="1355128673_kpresenter.png" alt="" width="100" /></strong></td>
              <td width="20%" height="125" align="center" valign="middle"><img src="emblem.png" alt="" width="100" /></td>
              <td width="20%" height="125" align="center" valign="middle"><img src="lessons.png" alt="" width="100" /></td>
            </tr>
            <tr>
              <td width="20%" align="center" valign="middle"><h2><strong><a href="users_view.php">عارض الصور</a></strong></h2></td>
              <td width="20%" height="50" align="center" valign="middle"><h2><strong><a href="blogcategoryview.php">المقالات الفرعية</a></strong></h2></td>
              <td width="20%" height="50" align="center" valign="middle" nowrap="nowrap"><h2><strong><a href="categoryview.php">الموضوعات الرئيسية</a></strong></h2></td>
            </tr>
            <tr>
              <td width="20%" align="center"><img src="info.png" alt="" height="80" /></td>
              <td width="20%" align="center" valign="middle"><img src="employe.png" alt="" height="100" /></td>
              <td width="20%" align="center" valign="middle"><img src="internet-download.png" alt="" height="128" /></td>
              </tr>
            <tr>
              <td width="20%" align="center"><h2><strong><a href="siteinfo_view.php">معلومات الموقع</a></strong></h2></td>
              <td width="20%" align="center" valign="middle"><h2 class="ff"><strong><a href="view.php">الأعضاء</a></strong></h2></td>
              <td width="20%" align="center" valign="middle"><h2 class="ff"><strong><a href="towns_view.php">تحميل البرامج</a></strong></h2></td>
            </tr>
            <tr>
              <td align="center"><img src="orowd.png" alt="" width="100" /></td>
              <td height="125" align="center"><img src="inventory-2072276-1751587.png" alt="" width="100" /></td>
              <td height="125" align="center"><img src="app.png" alt="" width="100" /></td>
            </tr>
            <tr>
              <td align="center"><h2><strong><a href="oroud_view.php">العروض</a></strong></h2></td>
              <td align="center"><h2><strong><a href="sanf_view.php">الأصناف</a></strong></h2></td>
              <td align="center"><h2><strong><a href="feaat_view.php">الأقسام</a></strong></h2></td>
            </tr>


            <tr>
              <td width="20%" align="center"><strong><img src="request.png" alt="" width="100" /></strong></td>
              <td width="20%" height="125" align="center" valign="middle"><img src="schools.webp" alt="" width="100" /></td>
              <td width="20%" height="125" align="center" valign="middle"><img src="tabels.webp" alt="" width="100" /></td>
            </tr>
            <tr>
              <td width="20%" align="center" valign="middle"><h2><strong><a  href="https://new.excelgiants.site/members/complaints_view.php">الطلبات</a></strong></h2></td>
              <td width="20%" align="center" valign="middle"><h2><strong><a  href="https://localhost/excelgiant/schools/schools/index.php?page=home">المدارس</a></strong></h2></td>
              <td width="20%" align="center" valign="middle"><h2><strong><a  href="https://localhost/excelgiant/schools/index.php?page=export_tabels">تصدير الجداول</a></strong></h2></td>
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
?>