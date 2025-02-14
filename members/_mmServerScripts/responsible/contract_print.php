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

$colname_RSElFara = "-1";
if (isset($_GET['ElFaraid'])) {
  $colname_RSElFara = $_GET['ElFaraid'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElFara = sprintf("SELECT * FROM towns WHERE id = %s", GetSQLValueString($colname_RSElFara, "int"));
$RSElFara = mysqli_query($connection,$query_RSElFara) or die(mysqli_error($connection));
$row_RSElFara = mysqli_fetch_assoc($RSElFara);
$totalRows_RSElFara = mysqli_num_rows($RSElFara);

$colname_RSElKesm = "-1";
if (isset($_GET['ElKesmid'])) {
  $colname_RSElKesm = $_GET['ElKesmid'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElKesm = sprintf("SELECT * FROM banks WHERE id = %s", GetSQLValueString($colname_RSElKesm, "int"));
$RSElKesm = mysqli_query($connection,$query_RSElKesm) or die(mysqli_error($connection));
$row_RSElKesm = mysqli_fetch_assoc($RSElKesm);
$totalRows_RSElKesm = mysqli_num_rows($RSElKesm);

$colname_RSElbaka = "-1";
if (isset($_GET['Elbakaid'])) {
  $colname_RSElbaka = $_GET['Elbakaid'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElbaka = sprintf("SELECT * FROM university WHERE id = %s", GetSQLValueString($colname_RSElbaka, "int"));
$RSElbaka = mysqli_query($connection,$query_RSElbaka) or die(mysqli_error($connection));
$row_RSElbaka = mysqli_fetch_assoc($RSElbaka);
$totalRows_RSElbaka = mysqli_num_rows($RSElbaka);

$colname_RSElmodareb = "-1";
if (isset($_GET['Elmodarebid'])) {
  $colname_RSElmodareb = $_GET['Elmodarebid'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElmodareb = sprintf("SELECT * FROM trainers WHERE id = %s", GetSQLValueString($colname_RSElmodareb, "int"));
$RSElmodareb = mysqli_query($connection,$query_RSElmodareb) or die(mysqli_error($connection));
$row_RSElmodareb = mysqli_fetch_assoc($RSElmodareb);
$totalRows_RSElmodareb = mysqli_num_rows($RSElmodareb);

$colname_RSElodw = "-1";
if (isset($_GET['Elodwid'])) {
  $colname_RSElodw = $_GET['Elodwid'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElodw = sprintf("SELECT * FROM members WHERE id = %s", GetSQLValueString($colname_RSElodw, "int"));
$RSElodw = mysqli_query($connection,$query_RSElodw) or die(mysqli_error($connection));
$row_RSElodw = mysqli_fetch_assoc($RSElodw);
$totalRows_RSElodw = mysqli_num_rows($RSElodw);

$colname_RSMasoul = "-1";
if (isset($_GET['id'])) {
  $colname_RSMasoul = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSMasoul = sprintf("SELECT * FROM responsible WHERE id = %s", GetSQLValueString($colname_RSMasoul, "int"));
$RSMasoul = mysqli_query($connection,$query_RSMasoul) or die(mysqli_error($connection));
$row_RSMasoul = mysqli_fetch_assoc($RSMasoul);
$totalRows_RSMasoul = mysqli_num_rows($RSMasoul);

$colname_RSUsers = "-1";
if (isset($_GET['id'])) {
  $colname_RSUsers = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSUsers = sprintf("SELECT * FROM users WHERE id = %s", GetSQLValueString($colname_RSUsers, "int"));
$RSUsers = mysqli_query($connection,$query_RSUsers) or die(mysqli_error($connection));
$row_RSUsers = mysqli_fetch_assoc($RSUsers);
$totalRows_RSUsers = mysqli_num_rows($RSUsers);

$colname_RSAdmin = "-1";
if (isset($_GET['id'])) {
  $colname_RSAdmin = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSAdmin = sprintf("SELECT * FROM sadmin WHERE id = %s", GetSQLValueString($colname_RSAdmin, "int"));
$RSAdmin = mysqli_query($connection,$query_RSAdmin) or die(mysqli_error($connection));
$row_RSAdmin = mysqli_fetch_assoc($RSAdmin);
$totalRows_RSAdmin = mysqli_num_rows($RSAdmin);

$colname_RSContract = "-1";
if (isset($_GET['Contractid'])) {
  $colname_RSContract = $_GET['Contractid'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSContract = sprintf("SELECT * FROM contract WHERE id = %s", GetSQLValueString($colname_RSContract, "int"));
$RSContract = mysqli_query($connection,$query_RSContract) or die(mysqli_error($connection));
$row_RSContract = mysqli_fetch_assoc($RSContract);
$totalRows_RSContract = mysqli_num_rows($RSContract);
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
  mysqli_query($connection, $query)($database_connection, $connection);
  
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
<title>Energy Fitness Center</title>
</head>

<body>
<table width="65%" border="0" align="right" cellpadding="2" cellspacing="2">
  <tr>
    <td><table width="98%" border="0" align="center" cellpadding="1" cellspacing="1" dir="rtl">
      <tr>
        <td height="33" colspan="4" align="center" valign="middle"><h3><strong>عقد اشتراك</strong></h3></td>
      </tr>
      <tr>
        <td height="33" colspan="4" align="right" valign="middle" nowrap="nowrap"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="25%"><strong>الفرع:</strong></td>
            <td width="25%"><strong><?php echo $row_RSElFara['name']; ?></strong></td>
            <td width="25%"><strong>موظف الفرع:</strong></td>
            <td width="25%"><strong><?php echo $row_RSContract['MowazafName']; ?></strong></td>
          </tr>
          <tr>
            <td width="25%"><strong>رقم العضوية:</strong></td>
            <td width="25%"><strong><?php echo $row_RSElodw['id']; ?></strong></td>
            <td width="25%"><strong>رقم العقد:</strong></td>
            <td width="25%"><strong><?php echo $row_RSContract['id']; ?></strong></td>
          </tr>
          <tr>
            <td width="25%"><strong>تاريخ الاشتراك:</strong></td>
            <td width="25%"><strong><?php echo $row_RSElodw['create_date']; ?></strong></td>
            <td width="25%"><strong>تاريخ التفعيل:</strong></td>
            <td width="25%"><strong><?php echo $row_RSContract['tarekh']; ?></strong></td>
          </tr>
        </table></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td height="33" colspan="4" align="right" valign="middle" bgcolor="#EEEEEE"><strong><img src="bp.png" alt="" width="20" />بيانات العضو</strong></td>
      </tr>
      <tr>
        <td width="25%" height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>اسم العضو: </strong></td>
        <td height="33" colspan="3" align="right" valign="middle" nowrap="nowrap"><strong><?php echo $row_RSElodw['aname']; ?> <?php echo $row_RSElodw['bname']; ?> <?php echo $row_RSElodw['cname']; ?> <?php echo $row_RSElodw['dname']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>رقم الموبايل:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSElodw['mobile']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>رقم التليفون:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSElodw['phone']; ?></strong></td>
      </tr>
      <tr bgcolor="#CCCCCC">
        <td height="33" colspan="4" align="right" valign="middle" bgcolor="#EEEEEE"><strong><img src="bp.png" alt="" width="20" />تفاصيل الباقة</strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong> القسم:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSElbaka['section']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong> الباقة:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSElbaka['name']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>اسم المدرب:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSContract['Elmodareb']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>وصف الباقة:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSElbaka['description']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>عدد التمرينات:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSContract['tamrinatedafia']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>المدة:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSElbaka['duration']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>فترة الايقاف:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSElbaka['durationstop']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>السعر:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSElbaka['price']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap">&nbsp;&nbsp;&nbsp;<strong>ملاحظات:</strong></td>
        <td height="33" colspan="3" align="right" valign="middle"><strong><?php echo $row_RSElbaka['other']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" rowspan="3" align="right" valign="middle" nowrap="nowrap">&nbsp;</td>
        <td width="25%" height="33" rowspan="3" align="right" valign="middle">&nbsp;</td>
        <td width="25%" height="33" align="right" valign="middle" nowrap="nowrap"><strong>المبلغ الاجمالي:</strong></td>
        <td width="25%" height="33" align="right" valign="middle"><strong><?php echo $row_RSElbaka['price']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap"><strong>المدفوع:</strong></td>
        <td height="33" align="right" valign="middle"><strong><?php echo $row_RSContract['Madfoaa']; ?></strong></td>
      </tr>
      <tr>
        <td height="33" align="right" valign="middle" nowrap="nowrap"><strong>المتبقى:</strong></td>
        <td height="33" align="right" valign="middle"><strong><?php echo $row_RSContract['Bakey']; ?></strong></td>
      </tr>
      <tr>
        <td align="right" valign="top" nowrap="nowrap">&nbsp;</td>
        <td align="right" valign="top">&nbsp;</td>
        <td align="right" valign="top" nowrap="nowrap">&nbsp;</td>
        <td align="right" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td align="right" valign="top" nowrap="nowrap">&nbsp;</td>
        <td align="right" valign="top">&nbsp;</td>
        <td align="right" valign="top" nowrap="nowrap">&nbsp;</td>
        <td align="right" valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($RSElFara);

mysqli_free_result($RSElKesm);

mysqli_free_result($RSElbaka);

mysqli_free_result($RSElmodareb);

mysqli_free_result($RSElodw);

mysqli_free_result($RSMasoul);

mysqli_free_result($RSUsers);

mysqli_free_result($RSAdmin);

mysqli_free_result($RSContract);
?>
