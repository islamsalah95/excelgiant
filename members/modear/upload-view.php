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

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM users WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset2 = $_GET['username'];
}
$colname_Recordset2 = "-1";
if (isset($_GET['create_by'])) {
  $colname_Recordset2 = $_GET['create_by'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM complaints WHERE create_by = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['create_by'])) {
  $colname_Recordset3 = $_GET['create_by'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = sprintf("SELECT * FROM images WHERE memper = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);
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
  
  $LoginRS__query=sprintf("SELECT username, password FROM users WHERE username=%s AND password=%s",
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
<!DOCTYPE html>
<html>
<head>
<title>اكسيل للحلول البرمجية</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
  
  
  
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index:99;

}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>




<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.pill-nav a {
	display: block;
	color: black;
	padding: 14px;
	text-decoration: none;
	font-size: 17px;
	border-radius: 5px;
	margin-left: 0px;  
  
  
}

.pill-nav a:hover {
  background-color: #ddd;
  color: black;
}

.pill-nav a.active {
  background-color: dodgerblue;
  color: white;
}
</style>
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

#navbar {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 90px 10px;
  transition: 0.4s;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 99;
}

#navbar a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

#navbar #logo {
  font-size: 35px;
  font-weight: bold;
  transition: 0.4s;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: dodgerblue;
  color: white;
}

#navbar-right {
  float: right;
}

@media screen and (max-width: 580px) {
  #navbar {
    padding: 20px 10px !important;
  }
  #navbar a {
    float: none;
    display: block;
    text-align: left;
  }
  #navbar-right {
    float: none;
  }
}
dddd {
	font-size: 36px;
}
.w3-light-grey #myTopnav div {
	font-size: large;
}
.w3-light-grey #myTopnav div {
	font-weight: bold;
}
.w3-light-grey #myTopnav div {
	color: #FFF;
}
.w3-light-grey #myTopnav div p {
	font-size: medium;
}
.w3-light-grey .w3-content.w3-margin-top .w3-row-padding .w3-third .w3-white.w3-text-grey.w3-card-4 .w3-container p strong {
	font-size: 24px;
}
.w3-light-grey .w3-content.w3-margin-top .w3-row-padding .w3-twothird .w3-container.w3-card.w3-white.w3-margin-bottom .w3-container table tr td table tr td {
	font-weight: bold;
}
</style>

</head>
<body dir="rtl" class="w3-light-grey">


<div class="topnav" id="myTopnav" style="">
  <a href="main.php" class="active"><i class="fa fa-fw fa-home"></i></a>
  <a href="account.php?username=<?php echo $_SESSION['MM_Username'] ?>"><i class="fa fa-user" aria-hidden="true"></i> حسابي </a><a href="changepassword.php?username=<?php echo $_SESSION['MM_Username'] ?>"><i class="fa fa-lock" aria-hidden="true"></i> تغيير كلمة المرور </a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  <div>
    <p align="center">اكسيل للحلول البرمجية</p>
  </div>
</div>





<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;" dir="rtl">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="/users/photo/<?php echo $row_Recordset1['per_img']; ?>" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
          
          </div>
        </div>
        <div class="w3-container">
          <p align="center">مرحباً يا : <?php echo $_SESSION['MM_Username'] ?><br>
  <strong></strong> <strong><?php echo $row_Recordset1['first_name']; ?></strong> <strong><?php echo $row_Recordset1['bname']; ?></strong> <strong><?php echo $row_Recordset1['cname']; ?></strong> <strong><?php echo $row_Recordset1['last_name']; ?></strong>&nbsp; <a href="<?php echo $logoutAction ?>"><i class="fa fa-sign-out" style="font-size:36px"></i></a></p>
          <hr>
          <table width="80%" border="0" align="center">
  <tr>
    <td><div class="pill-nav">
            <div align="right"><a href="requestes.php?create_by=<?php echo $row_Recordset1['id'] ?>"><i class="fa fa-file" aria-hidden="true"></i> تقديم طلب</a></div>
            <div align="right"><a href="complaints.php?create_by=<?php echo $row_Recordset1['id'] ?>"><i class="fa fa-send" aria-hidden="true"></i> تقديم شكوى</a></div>
            <div align="right"><a href="upload.php?create_by=<?php echo $row_Recordset1['id'] ?>"><i class="fa fa-upload" aria-hidden="true"></i> رفع المستنددات</a></div>
    </div></td>
  </tr>
</table>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"></h2>
        <div class="w3-container"><br>
          <table width="100%" cellpadding="4" cellspacing="4">
            <tr>
              <td align="center" bgcolor="#CCFFFF"><h1>عرض المستندات</h1></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="4" cellpadding="4">
            <tr>
              <td align="center" valign="top"><table width="100" height="75" border="0" cellpadding="4" cellspacing="4" >
                <tr>
                  <?php
$Recordset3_endRow = 0;
$Recordset3_columns = 3; // number of columns
$Recordset3_hloopRow1 = 0; // first row flag
do {
    if($Recordset3_endRow == 0  && $Recordset3_hloopRow1++ != 0) echo "<tr>";
   ?>
                  <td align="center" valign="top"><img src="<?php echo $row_Recordset3['file_name']; ?>" width="100" height="200"></td>
                  <?php  $Recordset3_endRow++;
if($Recordset3_endRow >= $Recordset3_columns) {
  ?>
                  </tr>
                <?php
 $Recordset3_endRow = 0;
  }
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
if($Recordset3_endRow != 0) {
while ($Recordset3_endRow < $Recordset3_columns) {
    echo("<td>&nbsp;</td>");
    $Recordset3_endRow++;
}
echo("</tr>");
}?>
              </table></td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </div>
      </div>

      <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>جميع الحقوق محفوظة لاكسيل للحلول البرمجية 2022</p>
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p>&nbsp;</p>
</footer>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);
?>
