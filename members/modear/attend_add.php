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
  $insertSQL = sprintf("INSERT INTO attend (id, Tarekh, Faraa, `Section`, Baka, Elbaka, classat, curenttamrina, CurrentTamrina, TafeelDate, MemberName, MemberId, Trainer, ExpierDate, Notes) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['Tarekh'], "text"),
                       GetSQLValueString($_POST['Faraa'], "text"),
                       GetSQLValueString($_POST['Section'], "text"),
                       GetSQLValueString($_POST['Baka'], "text"),
                       GetSQLValueString($_POST['Elbaka'], "text"),
					   GetSQLValueString($_POST['classat'], "text"),
                       GetSQLValueString($_POST['curenttamrina'], "text"),
                       GetSQLValueString($_POST['CurrentTamrina'], "text"),
                       GetSQLValueString($_POST['TafeelDate'], "text"),
                       GetSQLValueString($_POST['MemberName'], "text"),
                       GetSQLValueString($_POST['MemberId'], "text"),
                       GetSQLValueString($_POST['Trainer'], "text"),
                       GetSQLValueString($_POST['ExpierDate'], "text"),
                       GetSQLValueString($_POST['Notes'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));
}

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElFara = "SELECT * FROM towns";
$RSElFara = mysqli_query($connection,$query_RSElFara) or die(mysqli_error($connection));
$row_RSElFara = mysqli_fetch_assoc($RSElFara);
$totalRows_RSElFara = mysqli_num_rows($RSElFara);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElKesm = "SELECT * FROM banks";
$RSElKesm = mysqli_query($connection,$query_RSElKesm) or die(mysqli_error($connection));
$row_RSElKesm = mysqli_fetch_assoc($RSElKesm);
$totalRows_RSElKesm = mysqli_num_rows($RSElKesm);

$colname_RSElbaka = "-1";
if (isset($_GET['Elbaka'])) {
  $colname_RSElbaka = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElbaka = sprintf("SELECT * FROM university WHERE id = %s", GetSQLValueString($colname_RSElbaka, "int"));
$RSElbaka = mysqli_query($connection,$query_RSElbaka) or die(mysqli_error($connection));
$row_RSElbaka = mysqli_fetch_assoc($RSElbaka);
$totalRows_RSElbaka = mysqli_num_rows($RSElbaka);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElmodareb = "SELECT * FROM trainers";
$RSElmodareb = mysqli_query($connection,$query_RSElmodareb) or die(mysqli_error($connection));
$row_RSElmodareb = mysqli_fetch_assoc($RSElmodareb);
$totalRows_RSElmodareb = mysqli_num_rows($RSElmodareb);

$colname_RSElodw = "-1";
if (isset($_GET['Elodw'])) {
  $colname_RSElodw = $_GET['Elodw'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElodw = sprintf("SELECT * FROM members WHERE id = %s", GetSQLValueString($colname_RSElodw, "int"));
$RSElodw = mysqli_query($connection,$query_RSElodw) or die(mysqli_error($connection));
$row_RSElodw = mysqli_fetch_assoc($RSElodw);
$totalRows_RSElodw = mysqli_num_rows($RSElodw);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSMasoul = "SELECT * FROM responsible";
$RSMasoul = mysqli_query($connection,$query_RSMasoul) or die(mysqli_error($connection));
$row_RSMasoul = mysqli_fetch_assoc($RSMasoul);
$totalRows_RSMasoul = mysqli_num_rows($RSMasoul);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSUsers = "SELECT * FROM users";
$RSUsers = mysqli_query($connection,$query_RSUsers) or die(mysqli_error($connection));
$row_RSUsers = mysqli_fetch_assoc($RSUsers);
$totalRows_RSUsers = mysqli_num_rows($RSUsers);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSAdmin = "SELECT * FROM modear";
$RSAdmin = mysqli_query($connection,$query_RSAdmin) or die(mysqli_error($connection));
$row_RSAdmin = mysqli_fetch_assoc($RSAdmin);
$totalRows_RSAdmin = mysqli_num_rows($RSAdmin);

$colname_Recordset1 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset1 = $_GET['Elodw'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM contract WHERE Elodw = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset2 = $_GET['Elodw'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM contract WHERE Elodw = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset3 = $_GET['Elodw'];
}
$colname2_Recordset3 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname2_Recordset3 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = sprintf("SELECT * FROM contract WHERE Elodw = %s AND Elbaka = %s", GetSQLValueString($colname_Recordset3, "text"),GetSQLValueString($colname2_Recordset3, "text"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset4 = $_GET['Elodw'];
}
$colname2_Recordset4 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname2_Recordset4 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset4 = sprintf("SELECT * FROM contract WHERE Elodw = %s AND Elbaka = %s", GetSQLValueString($colname_Recordset4, "text"),GetSQLValueString($colname2_Recordset4, "text"));
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$colname_Recordset5 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname_Recordset5 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset5 = sprintf("SELECT * FROM university WHERE id = %s", GetSQLValueString($colname_Recordset5, "int"));
$Recordset5 = mysqli_query($connection,$query_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

$colname_Recordset6 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset6 = $_GET['Elodw'];
}
$colname2_Recordset6 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname2_Recordset6 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset6 = sprintf("SELECT * FROM attend WHERE MemberId = %s AND Elbaka = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset6, "text"),GetSQLValueString($colname2_Recordset6, "text"));
$Recordset6 = mysqli_query($connection,$query_Recordset6) or die(mysqli_error($connection));
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysqli_num_rows($Recordset6);

$colname_Recordset7 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname_Recordset7 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset7 = sprintf("SELECT * FROM attend WHERE Baka = %s", GetSQLValueString($colname_Recordset7, "text"));
$Recordset7 = mysqli_query($connection,$query_Recordset7) or die(mysqli_error($connection));
$row_Recordset7 = mysqli_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysqli_num_rows($Recordset7);

$colname_Recordset8 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset8 = $_GET['Elodw'];
}
$colname2_Recordset8 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname2_Recordset8 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset8 = sprintf("SELECT * FROM contract WHERE Elodw = %s AND Elbaka = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset8, "text"),GetSQLValueString($colname2_Recordset8, "text"));
$Recordset8 = mysqli_query($connection,$query_Recordset8) or die(mysqli_error($connection));
$row_Recordset8 = mysqli_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysqli_num_rows($Recordset8);

$colname_Recordset9 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset9 = $_GET['Elodw'];
}
$colname2_Recordset9 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname2_Recordset9 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset9 = sprintf("SELECT * FROM contract WHERE Elodw = %s AND Elbaka = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset9, "text"),GetSQLValueString($colname2_Recordset9, "text"));
$Recordset9 = mysqli_query($connection,$query_Recordset9) or die(mysqli_error($connection));
$row_Recordset9 = mysqli_fetch_assoc($Recordset9);
$totalRows_Recordset9 = mysqli_num_rows($Recordset9);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsclassat = "SELECT * FROM classat ORDER BY id ASC";
$rsclassat = mysqli_query($connection,$query_rsclassat) or die(mysqli_error($connection));
$row_rsclassat = mysqli_fetch_assoc($rsclassat);
$totalRows_rsclassat = mysqli_num_rows($rsclassat);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset10 = "SELECT * FROM towns ORDER BY id ASC";
$Recordset10 = mysqli_query($connection,$query_Recordset10) or die(mysqli_error($connection));
$row_Recordset10 = mysqli_fetch_assoc($Recordset10);
$totalRows_Recordset10 = mysqli_num_rows($Recordset10);

$colname_Recordset11 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset11 = $_GET['Elodw'];
}
$colname2_Recordset11 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname2_Recordset11 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset11 = sprintf("SELECT * FROM attend WHERE MemberId = %s AND Elbaka = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset11, "text"),GetSQLValueString($colname2_Recordset11, "text"));
$Recordset11 = mysqli_query($connection,$query_Recordset11) or die(mysqli_error($connection));
$row_Recordset11 = mysqli_fetch_assoc($Recordset11);
$totalRows_Recordset11 = mysqli_num_rows($Recordset11);

$colname_Recordset12 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset12 = $_GET['Elodw'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset12 = sprintf("SELECT * FROM contract WHERE Elodw = %s", GetSQLValueString($colname_Recordset12, "text"));
$Recordset12 = mysqli_query($connection,$query_Recordset12) or die(mysqli_error($connection));
$row_Recordset12 = mysqli_fetch_assoc($Recordset12);
$totalRows_Recordset12 = mysqli_num_rows($Recordset12);

$colname_Recordset13 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset13 = $_GET['Elodw'];
}
$colname2_Recordset13 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname2_Recordset13 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset13 = sprintf("SELECT * FROM attend WHERE MemberId = %s AND Elbaka = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset13, "text"),GetSQLValueString($colname2_Recordset13, "text"));
$Recordset13 = mysqli_query($connection,$query_Recordset13) or die(mysqli_error($connection));
$row_Recordset13 = mysqli_fetch_assoc($Recordset13);
$totalRows_Recordset13 = mysqli_num_rows($Recordset13);

$colname_Recordset8 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset8 = $_GET['Elodw'];
}
$colname2_Recordset8 = "-1";
if (isset($_GET['Elbaka'])) {
  $colname2_Recordset8 = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset8 = sprintf("SELECT SUM(curenttamrina)  FROM attend  WHERE MemberId = %s AND Elbaka = %s ORDER BY id ASC" , GetSQLValueString($colname_Recordset8, "text"),GetSQLValueString($colname2_Recordset8, "text"));
$Recordset8 = mysqli_query($connection,$query_Recordset8) or die(mysqli_error($connection));
$row_Recordset8 = mysqli_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysqli_num_rows($Recordset8);
 
?>
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
  
  $LoginRS__query=sprintf("SELECT username, password FROM modear WHERE username=%s AND password=%s",
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

$Tamrina = $row_Recordset8['SUM(curenttamrina)'];
$Tamrinat = $row_Recordset9['tamrinatedafia'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
</style>
<style>
#table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#table td, #table th {
  border: 1px solid #ddd;
  padding: 8px;
}

#table tr:nth-child(even){background-color: #f2f2f2;}

#table tr:hover {background-color: #ddd;}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #04AA6D;
  color: white;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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


                                                    
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center"><h2><strong>تسجيل حضور الأعضاء</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><table width="100" align="center" dir="rtl">
      <tr>
        <td><table width="300" align="center" dir="ltr">
          <tr valign="baseline">
            <td align="right" nowrap="nowrap"><form id="form3" name="form3" method="get" action="">
              <label for="Elodw"></label>
              <select name="Elbaka" id="Elbaka" style="width: 300px"; onchange="this.form.submit()">
                <option value="">اختر الباقة ..</option>
                <?php
do {  
?>
                <option value="<?php echo $row_Recordset1['Elbaka']?>"><?php echo $row_Recordset1['elbakatitle']?> - <?php echo $row_Recordset1['tarekh']?></option>
                <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
  $rows = mysqli_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  }
?>
              </select>
<input name="Elodw" type="text" id="Elodw" placeholder="رقم العضو" onchange="this.form.submit()" value="<?php echo $row_Recordset2['Elodw']; ?>" onsubmit="return false;"/>
            </form></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="90%" align="center" dir="rtl">
      <tr>
        <td bgcolor="#9DBFD4">
          <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
            <table width="100%" align="center">
              <tr valign="baseline">
                <td colspan="2" align="right" nowrap="nowrap"><table width="100%" border="1">
                  <tr>
                    <td><table width="100%" align="center">
                      <tr>
                        <td width="95%" colspan="2"><table width="100%">
                          <tr align="center">
                            <td colspan="7" align="center"><h3><strong><?php echo $row_RSElodw['aname']; ?> <?php echo $row_RSElodw['bname']; ?> <?php echo $row_RSElodw['cname']; ?> <?php echo $row_RSElodw['dname']; ?></strong></h3></td>
                          </tr>
                          <tr align="right">
                            <td align="center" bgcolor="#EEEEEE"><strong>الباقة</strong></td>
                            <td align="center" bgcolor="#EEEEEE"><strong>القسم</strong></td>
                            <td align="center" bgcolor="#EEEEEE"><strong>الوحدة الحزبية</strong></td>
                            <td align="center" bgcolor="#EEEEEE"><strong>عدد التمرينات</strong></td>
                            <td align="center" nowrap="nowrap" bgcolor="#EEEEEE"><strong>عدد التمرينات الاضافية</strong></td>
                            <td align="center" bgcolor="#EEEEEE"><strong>المدة</strong></td>
                            <td align="center" bgcolor="#EEEEEE"><strong>المبلغ المتبقي</strong></td>
                            </tr>
                          <tr align="right">
                            <td align="center"><strong><?php echo $row_Recordset5['name']; ?></strong></td>
                            <td align="center"><strong><?php echo $row_Recordset5['section']; ?></strong></td>
                            <td align="center"><strong><?php echo $row_Recordset5['branch']; ?></strong></td>
                            <td align="center"><strong><?php echo $row_Recordset5['tamrinat']; ?></strong></td>
                            <td align="center"><strong><?php echo $row_Recordset9['tamrinatedafia']; ?></strong></td>
                            <td align="center"><?php echo $row_Recordset5['duration']; ?></td>
                            <td align="center"><strong style="color:#F00"><?php echo $row_Recordset3['Bakey']; ?></strong></td>
                            </tr>
                        </table></td>
                        <td rowspan="3" align="center"><input type="submit"  id="Button" class="w3-btn w3-blue" value="حضور" /></td>
                      </tr>
                      <tr>
                        <td width="50%" align="center"><strong>الكلاس</strong></td>
                        <td width="50%" align="center"><strong>الوحدة الحزبية</strong></td>
                        </tr>
                      <tr>
                        <td width="50%" align="center"><label for="Faraa"></label>
                          <select name="classat" id="classat">
                            <option value=""> </option>
                            <?php
do {  
?>
                            <option value="<?php echo $row_rsclassat['syndadmin']?>"><?php echo $row_rsclassat['name']?></option>
                            <?php
} while ($row_rsclassat = mysqli_fetch_assoc($rsclassat));
  $rows = mysqli_num_rows($rsclassat);
  if($rows > 0) {
      mysql_data_seek($rsclassat, 0);
	  $row_rsclassat = mysqli_fetch_assoc($rsclassat);
  }
?>
                          </select></td>
                        <td width="50%" align="center"><label for="Faraa"></label>
                          <?php $row_Recordset3['ElFara'] ?>
                            <select name="Faraa" id="Faraa">
                              <option value="" <?php if (!(strcmp("", $row_Recordset5['branch']))) {echo "selected=\"selected\"";} ?>> </option>
                              <?php
do {  
?>
                              <option value="<?php echo $row_Recordset10['name']?>"<?php if (!(strcmp($row_Recordset10['name'], $row_Recordset5['branch']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset10['name']?></option>
                              <?php
} while ($row_Recordset10 = mysqli_fetch_assoc($Recordset10));
  $rows = mysqli_num_rows($Recordset10);
  if($rows > 0) {
      mysql_data_seek($Recordset10, 0);
	  $row_Recordset10 = mysqli_fetch_assoc($Recordset10);
  }
?>
                          </select></td>
                        </tr>
                    </table></td>
                  </tr>
                </table></td>
                </tr>
              <tr valign="baseline">
                <td colspan="2" align="right" nowrap="nowrap"><h3>
                  <strong>
                 <?php 
settype($variableX, "integer");
   $variable = $variableX;

$date=date_create($row_Recordset11['Tarekh']);
date_add($date,date_interval_create_from_date_string($row_Recordset5['duration']));  
?>
                    <input name="Notes" type="hidden" value="" size="32" />
                    التمرينات السابقة:  <?php echo $row_Recordset8['SUM(curenttamrina)']; ?> تمرينة من اجمالي  <?php echo $row_Recordset9['tamrinatedafia']; ?>  تمرينة 
                    <input name="Elbaka" type="hidden" id="Elbaka" value="<?php echo $row_Recordset3['Elbaka']?>" />
                    <input type="hidden" name="Trainer" value="<?php echo $row_Recordset3['Elmodareb']; ?>" size="32" />
                    <input type="hidden" name="curenttamrina" value="1" size="32" />
                    <input type="hidden" name="CurrentTamrina" value="<?php echo $row_Recordset5['tamrinat']; ?>" size="32" />
                    <input type="hidden" name="MemberId" value="<?php echo $row_Recordset3['Elodw']; ?>" size="32" />
                    <input type="hidden" name="MemberName" value="<?php echo $row_RSElodw['aname']; ?> <?php echo $row_RSElodw['bname']; ?> <?php echo $row_RSElodw['cname']; ?> <?php echo $row_RSElodw['dname']; ?>" size="32" />
                    <input type="hidden" name="Tarekh" value="<?php echo date("Y-m-d") ;?>" size="32" />
                    <input type="hidden" name="Section" value="<?php echo $row_Recordset3['ElKesm']; ?>" size="32" />                  
                    <input type="hidden" name="Baka" value="<?php echo $row_Recordset3['elbakatitle']; ?>" size="32" />
                    <input type="hidden" name="TafeelDate" value="" size="32" />                  
                    <input type="hidden" name="ExpierDate" value="
<?php
$tare1=date_format($date,"Y-m-d");

$tare2=$row_Recordset13['ExpierDate'];

	if ($tare1 > $tare2)
		echo date_format($date,"Y-m-d");
	else
		echo $row_Recordset13['ExpierDate'];
?>
					" size="32" />
                  </strong></h3></td>
              </tr>
              <tr valign="baseline">
                <td colspan="2" align="center" nowrap="nowrap"><?php if ($totalRows_Recordset6 > 0) { // Show if recordset not empty ?>
  <table id="table">
    <tr>
      <th align="center" bgcolor="#EEEEEE"><strong>تاريخ التفعيل</strong></th>
      <th align="center" bgcolor="#EEEEEE">تاريخ الانتهاء</th>
      <th align="center" bgcolor="#EEEEEE">الكلاس</th>
      <th align="center" bgcolor="#EEEEEE">المدرب</th>
      <th align="center" bgcolor="#EEEEEE"><strong>عدد التمرينات</strong></th>
      <th align="center" bgcolor="#EEEEEE">الوحدة الحزبية</th>
      <th align="center" bgcolor="#EEEEEE"><strong>التمرينة</strong></th>
      <th align="center" bgcolor="#EEEEEE"><strong>اسم العضو</strong></th>
      <th align="center" bgcolor="#EEEEEE"><strong>رقم العضو</strong></th>
      <th align="center" bgcolor="#EEEEEE">حذف</th>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset6['Tarekh']; ?></td>
        <td><?php echo $row_Recordset6['ExpierDate']; ?></td>
        <td><select name="classat2" id="classat2">
          <option value="" <?php if (!(strcmp("", $row_Recordset6['classat']))) {echo "selected=\"selected\"";} ?>> </option>
          <?php
do {  
?>
          <option value="<?php echo $row_rsclassat['syndadmin']?>"<?php if (!(strcmp($row_rsclassat['syndadmin'], $row_Recordset6['classat']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsclassat['name']?></option>
          <?php
} while ($row_rsclassat = mysqli_fetch_assoc($rsclassat));
  $rows = mysqli_num_rows($rsclassat);
  if($rows > 0) {
      mysql_data_seek($rsclassat, 0);
	  $row_rsclassat = mysqli_fetch_assoc($rsclassat);
  }
?>
        </select></td>
        <td><?php echo $row_Recordset6['Trainer']; ?><?php echo $row_Recordset6['classat']; ?></td>
        <td><?php echo $row_Recordset6['CurrentTamrina']; ?></td>
        <td><?php echo $row_Recordset6['Faraa']; ?></td>
        <td><?php echo $row_Recordset6['curenttamrina']; ?></td>
        <td><?php echo $row_Recordset6['MemberName']; ?></td>
        <td><?php echo $row_Recordset6['MemberId']; ?></td>
        <td align="center"><a href="attend_del.php?id=<?php echo $row_Recordset6['id']; ?>"><strong>حذف</strong></a></td>
      </tr>
      <?php } while ($row_Recordset6 = mysqli_fetch_assoc($Recordset6)); ?>
  </table>
  <?php } // Show if recordset not empty ?></td>
              </tr>
              <tr valign="baseline">
                <td colspan="2" align="center" nowrap="nowrap"><?php if ($totalRows_Recordset6 == 0) { // Show if recordset empty ?>
                    <table width="400" border="0" cellspacing="2" cellpadding="2">
                      <tr>
                        <td align="center">  <script>
        function enableButton() {
            document.getElementById("Button").disabled = false;
        }
    </script>
                          <input type="button" id="button1" value="تسجيل الحضور لأول مرة" onclick="enableButton()"  /></td>
                      </tr>
                    </table>
                    
                    <?php } // Show if recordset empty ?></td>
              </tr>
              </table>
            <input type="hidden" name="id" value="" />
            <input type="hidden" name="MM_insert" value="form1" />
													
                                                    
                                                    
                                                    
                                                    
                                                    

          </form></td>
      </tr>
      <tr>
        <td bgcolor="#9DBFD4"><table width="600" border="1" align="center">
          <tr>
            <th width="300" align="center" bgcolor="#EEEEEE"><strong>تاريخ التفعيل</strong></th>
            <th width="300" align="center" bgcolor="#EEEEEE">تاريخ الانتهاء</th>
            </tr>
          <tr>
            <td width="300" align="center"><?php echo $row_Recordset13['Tarekh']; ?></td>
            <td width="300" align="center"><?php echo $row_Recordset13['ExpierDate']; ?></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr align="center">
    <td><h3>
      <strong>
  <?php
$aFew = $row_Recordset8['SUM(curenttamrina)'];
$some = $row_Recordset9['tamrinatedafia'];
settype($aFew, "integer");
settype($some, "integer");
if($some == $aFew ){
	echo " عدد تمريناتك " .$aFew. " مساوي لعدد التمرينات بالعقد " .$some;
	echo '<script> document.getElementById("Button").disabled = true;</script>';

}
else
	echo " عدد تمريناتك " .$aFew. " لا يساوي عدد التمرينات بالعقد " .$some;

?>
  <br />
<?php 
$variableX = $_POST['edafy'];
settype($variableX, "integer");
   $variable = $variableX;

$date=date_create($row_Recordset11['Tarekh']);
date_add($date,date_interval_create_from_date_string($row_Recordset5['duration']));
echo "تاريخ تفعيل الباقة هو: ";
echo $row_Recordset11['Tarekh']; 
echo "<br>";
echo " تاريخ انتهاء الباقة هو: ";
echo date_format($date,"Y-m-d");
echo "<br>";
echo " تاريخ الانتهاء بعد مدة الاضافة ";
// Use date_add() function to add date object
//date_add($date, date_interval_create_from_date_string("$variable days"));
 $date = date_create($row_Recordset13['ExpierDate']);
// Display the added date
//echo date_format($date, "Y-m-d");
echo $row_Recordset13['ExpierDate'];

"<br />";

       $expiry_date = date_format($date,"Y-m-d");
       $today =  date("Y-m-d"); 
       $exp = date('Y-m-d',strtotime($expiry_date));
       $expDate =  date_create($exp);
       $todayDate = date_create($today);
       $diff =  date_diff($todayDate, $expDate);
       if($diff->format("%R%a")>0){
             echo " أثناء مدة الاشتراك .. مسموح بالدخول، "; 
			 echo "<br>";
			 echo " الايام المتبقية بالباقة هي ".$diff->format("%R%a يوم");
			 echo "<br>";
       }else{
		   echo "<br>";
           echo " خارج مدة الاشتراك .. غير مسموح بالدخول، ";
		   echo "<br>";
		    echo " الايام التي مرت على انتهاء الباقة هي ".$diff->format("%R%a يوم");
			echo '<script> document.getElementById("Button").disabled = true;</script>';
			echo "<br>";

       }

?>
      </strong></h3></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>












        <script>
            
            var table = document.getElementById("table"), sumVal = 0;
            
            for(var i = 1; i < table.rows.length; i++)
            {
                sumVal = sumVal + parseInt(table.rows[i].cells[2].innerHTML);
            }
            
            document.getElementById("val").innerHTML = "" + sumVal;
            console.log(sumVal);
        </script>
              
        



<script>
function myFunction() {
  document.getElementById("mySubmit").disabled = true;
}
</script>
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

mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);

mysqli_free_result($Recordset6);

mysqli_free_result($Recordset7);

mysqli_free_result($Recordset8);

mysqli_free_result($Recordset9);

mysqli_free_result($rsclassat);

mysqli_free_result($Recordset10);

mysqli_free_result($Recordset11);

mysqli_free_result($Recordset12);

mysqli_free_result($Recordset13);
?>
