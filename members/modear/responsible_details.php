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
  
  $LoginRS__query=sprintf("SELECT username, password FROM responsible WHERE username=%s AND password=%s",
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

$maxRows_Recordset1 = 50;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset1 = $_GET['sub_syndicate'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM members WHERE sub_syndicate = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset1, "int"));
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

$colname_Recordset2 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset2 = $_GET['username'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM responsible WHERE username = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_DetailRS1 = sprintf("SELECT * FROM responsible WHERE id = %s", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysqli_query($connection,$query_limit_DetailRS1) or die(mysqli_error($connection));
$row_DetailRS1 = mysqli_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysqli_query($connection,$query_DetailRS1);
  $totalRows_DetailRS1 = mysqli_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;

mysqli_query($connection, $query)($database_connection, $connection);
$query_rstowns = "SELECT * FROM towns ORDER BY id ASC";
$rstowns = mysqli_query($connection,$query_rstowns) or die(mysqli_error($connection));
$row_rstowns = mysqli_fetch_assoc($rstowns);
$totalRows_rstowns = mysqli_num_rows($rstowns);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsbanks = "SELECT * FROM banks";
$rsbanks = mysqli_query($connection,$query_rsbanks) or die(mysqli_error($connection));
$row_rsbanks = mysqli_fetch_assoc($rsbanks);
$totalRows_rsbanks = mysqli_num_rows($rsbanks);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsusers = "SELECT * FROM responsible";
$rsusers = mysqli_query($connection,$query_rsusers) or die(mysqli_error($connection));
$row_rsusers = mysqli_fetch_assoc($rsusers);
$totalRows_rsusers = mysqli_num_rows($rsusers);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = "SELECT * FROM systemgroups";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_ReHeadera = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_ReHeadera = $_GET['username'];
}

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
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>المسئولين</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="80%" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <th width="13%" nowrap="nowrap" bgcolor="#7470B3">الاسم</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['first_name']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الاسم الثاني</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['bname']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الاسم الثالث</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['cname']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الاسم الرابع</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['last_name']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">اسم المسئول</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['username']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">صورة شخصية</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<strong><img src="../photo/<?php echo $row_DetailRS1['per_img']; ?>" alt="" width="150" /></strong></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">العنوان</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['address']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">صورة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<strong><img src="../photo/<?php echo $row_DetailRS1['grad_img']; ?>" alt="" width="250" /></strong></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">صورة البطاقة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<strong><img src="../photo/<?php echo $row_DetailRS1['sign_img']; ?>" alt="" width="250" /></strong></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الرقم القومي</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['id_card']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الراتب</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['salary']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">البريد الالكتروني</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['mail']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">التليفون</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['phone']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الموبايل</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['mobile']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الصفة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['job']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الوحدة الحزبية</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
          <select name="sub_syndicate" id="sub_syndicate">
            <option value="" <?php if (!(strcmp("", $row_DetailRS1['sub_syndicate']))) {echo "selected=\"selected\"";} ?>></option>
            <?php
do {  
?>
            <option value="<?php echo $row_rstowns['id']?>"<?php if (!(strcmp($row_rstowns['id'], $row_DetailRS1['sub_syndicate']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rstowns['name']?></option>
            <?php
} while ($row_rstowns = mysqli_fetch_assoc($rstowns));
  $rows = mysqli_num_rows($rstowns);
  if($rows > 0) {
      mysql_data_seek($rstowns, 0);
	  $row_rstowns = mysqli_fetch_assoc($rstowns);
  }
?>
          </select></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">التكليف</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<strong><img src="<?php echo $row_DetailRS1['onus']; ?>" alt="" width="100" /></strong></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">التفعيل</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
          <select name="active4" id="active4">
            <option value="1" <?php if (!(strcmp(1, $row_DetailRS1['active']))) {echo "selected=\"selected\"";} ?>>مفعل</option>
            <option value="0" <?php if (!(strcmp(0, $row_DetailRS1['active']))) {echo "selected=\"selected\"";} ?>>غير مفعل</option>
          </select></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">تاريخ الانشاء</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['create_date']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">تاريخ التعديل</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['edit_date']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">انشئ بواسطة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
          <?php echo $row_DetailRS1['create_by']; ?><label for="select2"></label></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">التعديل بواسطة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
          <?php echo $row_DetailRS1['edit_by']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">ملاحظات</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['details']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">&nbsp;</th>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($DetailRS1);

mysqli_free_result($rstowns);

mysqli_free_result($rsbanks);

mysqli_free_result($rsusers);

mysqli_free_result($Recordset3);
?>
