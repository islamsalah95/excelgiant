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






$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE modear SET member_type=%s, grad_img=%s, per_img=%s, first_name=%s, bname=%s, cname=%s, last_name=%s, grad_date=%s, grad_place=%s, id_card=%s, address=%s, work_place=%s, mail=%s, phone=%s, mobile=%s, member_activity=%s, sub_syndicate=%s, bank=%s, payment_no=%s, password=%s, username=%s, active=%s, create_date=%s, edit_date=%s, create_by=%s, edit_by=%s, deleted=%s WHERE id=%s",
                       GetSQLValueString($_POST['member_type'], "text"),
                       GetSQLValueString($_POST['grad_img'], "text"),
                       GetSQLValueString($_POST['per_img'], "text"),
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['bname'], "text"),
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($_POST['last_name'], "text"),
                       GetSQLValueString($_POST['grad_date'], "date"),
                       GetSQLValueString($_POST['grad_place'], "text"),
                       GetSQLValueString($_POST['id_card'], "int"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['work_place'], "text"),
                       GetSQLValueString($_POST['mail'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['member_activity'], "text"),
                       GetSQLValueString($_POST['sub_syndicate'], "int"),
                       GetSQLValueString($_POST['bank'], "int"),
                       GetSQLValueString($_POST['payment_no'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['active'], "int"),
                       GetSQLValueString($_POST['create_date'], "date"),
                       GetSQLValueString($_POST['edit_date'], "date"),
                       GetSQLValueString($_POST['create_by'], "int"),
                       GetSQLValueString($_POST['edit_by'], "int"),
                       GetSQLValueString($_POST['deleted'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "account.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}





$colname_Recordset1 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset1 = $_GET['username'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM modear WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);



mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordsettowns = "SELECT * FROM towns";
$Recordsettowns = mysqli_query($connection,$query_Recordsettowns) or die(mysqli_error($connection));
$row_Recordsettowns = mysqli_fetch_assoc($Recordsettowns);
$totalRows_Recordsettowns = mysqli_num_rows($Recordsettowns);





mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordsetbanks = "SELECT * FROM banks";
$Recordsetbanks = mysqli_query($connection,$query_Recordsetbanks) or die(mysqli_error($connection));
$row_Recordsetbanks = mysqli_fetch_assoc($Recordsetbanks);
$totalRows_Recordsetbanks = mysqli_num_rows($Recordsetbanks);
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
</style>

</head>
<body dir="rtl" class="w3-light-grey">
<?php include 'header.php'; ?>

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;" dir="rtl">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img src="../photo/<?php echo $row_Recordset1['per_img']; ?>" style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
          
          </div>
        </div>
        <div class="w3-container">
          <p align="center">مرحباً يا : <?php echo $_SESSION['MM_Username'] ?><br>
  <strong><?php echo $row_Recordset1['first_name']; ?></strong> <strong><?php echo $row_Recordset1['bname']; ?></strong> <strong><?php echo $row_Recordset1['cname']; ?></strong> <strong><?php echo $row_Recordset1['last_name']; ?></strong></p>
          <hr>
          <br>
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"></h2>
        <div class="w3-container">
          <table width="100%" align="center" cellpadding="4" cellspacing="4">
            <tr>
              <td align="center" bgcolor="#CCFFFF"><h2>حسابي</h2></td>
            </tr>
          </table>
          <br>
          
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="text" name="first_name" value="<?php echo htmlentities($row_Recordset1['first_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">الاسم:</td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="hidden" name="bname" value="<?php echo htmlentities($row_Recordset1['bname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="hidden" name="cname" value="<?php echo htmlentities($row_Recordset1['cname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="hidden" name="last_name" value="<?php echo htmlentities($row_Recordset1['last_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">&nbsp;</td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="center" nowrap="nowrap"><img src="../photo/<?php echo $row_Recordset1['grad_img']; ?>" alt="" height="220"></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="date" name="grad_date" value="<?php echo htmlentities($row_Recordset1['grad_date'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">سنة التخرج:</td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><select name="grad_place" id="grad_place">
        <?php
do {  
?>
        <option value="<?php echo $row_Recordsettowns['id']?>"<?php if (!(strcmp($row_Recordsettowns['id'], $row_Recordset1['grad_place']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordsettowns['name']?></option>
        <?php
} while ($row_Recordsettowns = mysqli_fetch_assoc($Recordsettowns));
  $rows = mysqli_num_rows($Recordsettowns);
  if($rows > 0) {
      mysql_data_seek($Recordsettowns, 0);
	  $row_Recordsettowns = mysqli_fetch_assoc($Recordsettowns);
  }
?>
      </select></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الباقة:</td>
      <td><label for="grad_place"></label>
        <input type="hidden" name="grad_img" value="<?php echo htmlentities($row_Recordset1['grad_img'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
        <input type="hidden" name="per_img" value="<?php echo htmlentities($row_Recordset1['per_img'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="text" name="id_card" value="<?php echo htmlentities($row_Recordset1['id_card'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">الرقم القومي:</td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="text" name="address" value="<?php echo htmlentities($row_Recordset1['address'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">العنوان:</td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="text" name="work_place" value="<?php echo htmlentities($row_Recordset1['work_place'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">الصفة:</td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="text" name="mail" value="<?php echo htmlentities($row_Recordset1['mail'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">البريد الالكتروني:</td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="text" name="phone" value="<?php echo htmlentities($row_Recordset1['phone'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">رقم التليفون:</td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="text" name="mobile" value="<?php echo htmlentities($row_Recordset1['mobile'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap">رقم الموبايل:</td>
      </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="text" name="payment_no" value="<?php echo htmlentities($row_Recordset1['payment_no'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><input type="hidden" name="username" value="<?php echo htmlentities($row_Recordset1['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
        <input type="hidden" name="password" value="<?php echo htmlentities($row_Recordset1['password'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
        <input type="hidden" name="deleted" value="<?php echo htmlentities($row_Recordset1['deleted'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
        <input type="hidden" name="edit_by" value="<?php echo htmlentities($row_Recordset1['edit_by'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
        <input type="hidden" name="create_by" value="<?php echo htmlentities($row_Recordset1['create_by'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
        <input type="hidden" name="edit_date" value="<?php echo htmlentities($row_Recordset1['edit_date'], ENT_COMPAT, 'utf-8'); ?>" size="32" />        <input type="hidden" name="create_date" value="<?php echo htmlentities($row_Recordset1['create_date'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
  </table>
  <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
</form>
<p>&nbsp;</p>

        </div>
      </div>

      <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>
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
?>
