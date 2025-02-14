<?php require_once('../connections/connection.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO form1 (id, per_img, form_type, text1, text2, saidly_name, job_name, activity_name, text3, exp_date, nekaba, nekaba_name, nakeb_name, print_date, print_by, sanad_id, other) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['per_img'], "text"),
                       GetSQLValueString($_POST['form_type'], "text"),
                       GetSQLValueString($_POST['text1'], "text"),
                       GetSQLValueString($_POST['text2'], "text"),
                       GetSQLValueString($_POST['saidly_name'], "text"),
                       GetSQLValueString($_POST['job_name'], "text"),
                       GetSQLValueString($_POST['activity_name'], "text"),
                       GetSQLValueString($_POST['text3'], "text"),
                       GetSQLValueString($_POST['exp_date'], "date"),
                       GetSQLValueString($_POST['nekaba'], "text"),
                       GetSQLValueString($_POST['nekaba_name'], "text"),
                       GetSQLValueString($_POST['nakeb_name'], "text"),
                       GetSQLValueString($_POST['print_date'], "date"),
                       GetSQLValueString($_POST['print_by'], "text"),
                       GetSQLValueString($_POST['sanad_id'], "text"),
                       GetSQLValueString($_POST['other'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "form2_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_RSMemper = "-1";
if (isset($_GET['id'])) {
  $colname_RSMemper = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSMemper = sprintf("SELECT * FROM members WHERE id = %s", GetSQLValueString($colname_RSMemper, "int"));
$RSMemper = mysqli_query($connection,$query_RSMemper) or die(mysqli_error($connection));
$row_RSMemper = mysqli_fetch_assoc($RSMemper);
$totalRows_RSMemper = mysqli_num_rows($RSMemper);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSUsers = "SELECT * FROM users";
$RSUsers = mysqli_query($connection,$query_RSUsers) or die(mysqli_error($connection));
$row_RSUsers = mysqli_fetch_assoc($RSUsers);
$totalRows_RSUsers = mysqli_num_rows($RSUsers);
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

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSnamesall = "SELECT * FROM members ORDER BY aname ASC";
$RSnamesall = mysqli_query($connection,$query_RSnamesall) or die(mysqli_error($connection));
$row_RSnamesall = mysqli_fetch_assoc($RSnamesall);
$totalRows_RSnamesall = mysqli_num_rows($RSnamesall);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rstowns = "SELECT * FROM towns";
$rstowns = mysqli_query($connection,$query_rstowns) or die(mysqli_error($connection));
$row_rstowns = mysqli_fetch_assoc($rstowns);
$totalRows_rstowns = mysqli_num_rows($rstowns);
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
  $MM_redirectLoginSuccess = "../main.php";
  $MM_redirectLoginFailed = "../error.php";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Energy Fitness Center</title>
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>نموذج إفادة بمدة الخبرة العملية </strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><form id="form2" name="form2" method="get" action="">
      <table align="center" cellpadding="4" cellspacing="4">
        <tr>
          <td>اسم العضو</td>
          <td><label for="id"></label>
            <select name="id" id="id">
              <?php
do {  
?>
              <option value="<?php echo $row_RSnamesall['id']?>"><?php echo $row_RSnamesall['aname']?> <?php echo $row_RSnamesall['bname']?> <?php echo $row_RSnamesall['cname']?> <?php echo $row_RSnamesall['dname']?></option>
              <?php
} while ($row_RSnamesall = mysqli_fetch_assoc($RSnamesall));
  $rows = mysqli_num_rows($RSnamesall);
  if($rows > 0) {
      mysql_data_seek($RSnamesall, 0);
	  $row_RSnamesall = mysqli_fetch_assoc($RSnamesall);
  }
?>
            </select></td>
          <td><input type="submit" name="button" id="button" value="عرض" /></td>
        </tr>
      </table>
      <hr />
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <?php if ($totalRows_RSMemper > 0) { // Show if recordset not empty ?>
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">نوع النموذج:</td>
      <td colspan="2"><input type="text" name="form_type" value="إفادة بمدة الخبرة العملية" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">لمزاولة مهنة:</td>
      <td colspan="2"><textarea name="text1" cols="60" rows="5"></textarea></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><input name="nekaba_name" type="hidden" id="nekaba_name" value="<?php echo $row_RSMemper['sub_syndicate']; ?>" />
        <input type="hidden" name="exp_date" value="<?php echo date("Y-m-d"); ?>" size="32" />
        <input name="job_name" type="hidden" value="<?php echo $row_RSMemper['member_activity']; ?>" size="32" />        <input type="hidden" name="activity_name" value="<?php echo $row_RSMemper['work_place']; ?>" size="32" /></td>
      <td colspan="2"><textarea name="text2" cols="60" rows="5">بالاشارة الى المادة 14 من القانون رقم 23 لسنة 1428 ميلادية بشأن الفروع و الاتحادات و الروابط المهنية و الى المادة رقم 14 و 16 من الائحة التنفيذية له و الى المادة الثانية من القرار رقم 644 لسنة 2010 بشأن شروط اصدار تراخيص مزاولة الانشطة الاقتصادية الواردة بالقانون التجاري رقم 23 لسنة 2010 م و الى القرار رقم 167 لسنة 2006 بشأن تنظيم تجارة الادوية و الى النظام الاساسي للفرع بشأن شروط مزاولة مهنة الصيدلة و بعد مراجعة ملف العضو
      </textarea></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الصورة الشخصية:</td>
      <td><input name="per_img" type="text" id="per_img" value="<?php echo $row_RSMemper['per_img']; ?>" size="32" /></td>
      <td rowspan="2" align="center" valign="top"><img src="photo/<?php echo $row_RSMemper['per_img']; ?>" width="70" height="100" /></td>
      </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap"><span dir="rtl">نفيدكم بأن العضو</span>:</td>
      <td><input type="text" name="saidly_name" value="<?php echo $row_RSMemper['aname']; ?> <?php echo $row_RSMemper['bname']; ?> <?php echo $row_RSMemper['cname']; ?> <?php echo $row_RSMemper['dname']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span dir="rtl">أن مدة خبرته في ممارسة مهنة </span>:</td>
      <td colspan="2"><textarea name="text3" cols="60" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span dir="rtl">وأن رقم قيده بالفرع العامة للصيادلة </span>:</td>
      <td colspan="2"><input type="text" name="nekaba" value="<?php echo $row_RSMemper['id']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">مدير الفرع:</td>
      <td colspan="2"><input type="text" name="nakeb_name" value="<?php echo $row_RSUsers['first_name']; ?> <?php echo $row_RSUsers['bname']; ?> <?php echo $row_RSUsers['cname']; ?> <?php echo $row_RSUsers['last_name']; ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">تاريخ الاصدار:</td>
      <td colspan="2"><input name="print_date" type="text" value="<?php echo date("Y-m-d h:i:s"); ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">بواسطة:</td>
      <td colspan="2"><input type="text" name="print_by" value="<?php echo $_SESSION['MM_Username'] ?>" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم سند السداد:</td>
      <td colspan="2"><input type="text" name="sanad_id" value="" size="32" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ملاحظات:</td>
      <td colspan="2"><textarea name="other" cols="60" rows="5"></textarea></td>
      </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td colspan="2"><input type="submit" value="حفظ" /></td>
      </tr>
  </table>
  <?php } // Show if recordset not empty ?>
<input type="hidden" name="id" value="" />
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($RSMemper);

mysqli_free_result($RSUsers);

mysqli_free_result($RSnamesall);

mysqli_free_result($rstowns);
?>
