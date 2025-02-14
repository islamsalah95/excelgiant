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

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO contract (id, ElFara, ElKesm, Elbaka, Elmodareb, Elodw, TafeelDate, MowazafName, Total, Madfoaa, Bakey, Notes) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['ElFara'], "text"),
                       GetSQLValueString($_POST['ElKesm'], "text"),
                       GetSQLValueString($_POST['Elbaka'], "text"),
                       GetSQLValueString($_POST['Elmodareb'], "text"),
                       GetSQLValueString($_POST['Elodw'], "text"),
                       GetSQLValueString($_POST['TafeelDate'], "text"),
                       GetSQLValueString($_POST['MowazafName'], "text"),
                       GetSQLValueString($_POST['Total'], "text"),
                       GetSQLValueString($_POST['Madfoaa'], "text"),
                       GetSQLValueString($_POST['Bakey'], "text"),
                       GetSQLValueString($_POST['Notes'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "contract_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElbaka = "SELECT * FROM university";
$RSElbaka = mysqli_query($connection,$query_RSElbaka) or die(mysqli_error($connection));
$row_RSElbaka = mysqli_fetch_assoc($RSElbaka);
$totalRows_RSElbaka = mysqli_num_rows($RSElbaka);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElmodareb = "SELECT * FROM trainers";
$RSElmodareb = mysqli_query($connection,$query_RSElmodareb) or die(mysqli_error($connection));
$row_RSElmodareb = mysqli_fetch_assoc($RSElmodareb);
$totalRows_RSElmodareb = mysqli_num_rows($RSElmodareb);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElodw = "SELECT * FROM members";
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

$maxRows_RSContract = 50;
$pageNum_RSContract = 0;
if (isset($_GET['pageNum_RSContract'])) {
  $pageNum_RSContract = $_GET['pageNum_RSContract'];
}
$startRow_RSContract = $pageNum_RSContract * $maxRows_RSContract;

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSContract = "SELECT * FROM contract ORDER BY id DESC";
$query_limit_RSContract = sprintf("%s LIMIT %d, %d", $query_RSContract, $startRow_RSContract, $maxRows_RSContract);
$RSContract = mysqli_query($connection,$query_limit_RSContract) or die(mysqli_error($connection));
$row_RSContract = mysqli_fetch_assoc($RSContract);

if (isset($_GET['totalRows_RSContract'])) {
  $totalRows_RSContract = $_GET['totalRows_RSContract'];
} else {
  $all_RSContract = mysqli_query($connection,$query_RSContract);
  $totalRows_RSContract = mysqli_num_rows($all_RSContract);
}
$totalPages_RSContract = ceil($totalRows_RSContract/$maxRows_RSContract)-1;

$queryString_RSContract = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RSContract") == false && 
        stristr($param, "totalRows_RSContract") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RSContract = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RSContract = sprintf("&totalRows_RSContract=%d%s", $totalRows_RSContract, $queryString_RSContract);
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
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center"><h2><strong>عقود الأعضاء</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><table width="100" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td align="center" bgcolor="#D9FFFF"><a href="contract_add.php"><strong>إضافة</strong></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="90%" border="1" align="center" dir="rtl">
        <tr>
          <td align="center" bgcolor="#D9FFFF"><strong>رقم العقد</strong></td>
          <td align="center" bgcolor="#D9FFFF"><strong>الوحدة الحزبية</strong></td>
          <td align="center" bgcolor="#D9FFFF"><strong>القسم</strong></td>
          <td align="center" bgcolor="#D9FFFF"><strong>الباقة</strong></td>
          <td align="center" bgcolor="#D9FFFF"><strong>المدرب</strong></td>
          <td align="center" bgcolor="#D9FFFF"><strong>العضو</strong></td>
          <td align="center" bgcolor="#D9FFFF"><strong>تاريخ التعاقد</strong></td>
          <td width="50" align="center" bgcolor="#D9FFFF"><strong>طباعة</strong></td>
          <td width="50" align="center" bgcolor="#D9FFFF"><strong>تعديل</strong></td>
          <td width="50" align="center" bgcolor="#D9FFFF"><strong>ترقية</strong></td>
          <td width="50" align="center" bgcolor="#D9FFFF"><strong>حذف</strong></td>
        </tr>
        <?php do { ?>
          <tr align="center">
            <td><?php echo $row_RSContract['id']; ?></td>
            <td><?php echo $row_RSContract['ElFara']; ?></td>
            <td><?php echo $row_RSContract['ElKesm']; ?></td>
            <td><?php echo $row_RSContract['Elbaka']; ?></td>
            <td><?php echo $row_RSContract['Elmodareb']; ?></td>
            <td><select name="Elodw" size="1">
              <?php
do {  
?>
              <option value="<?php echo $row_RSElodw['id']?>"<?php if (!(strcmp($row_RSElodw['id'], $row_RSContract['Elodw']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RSElodw['aname']?> <?php echo $row_RSElodw['bname']?> <?php echo $row_RSElodw['cname']?><?php echo $row_RSElodw['dname']?></option>
              <?php
} while ($row_RSElodw = mysqli_fetch_assoc($RSElodw));
  $rows = mysqli_num_rows($RSElodw);
  if($rows > 0) {
      mysql_data_seek($RSElodw, 0);
	  $row_RSElodw = mysqli_fetch_assoc($RSElodw);
  }
?>
            </select></td>
            <td><?php echo $row_RSContract['TafeelDate']; ?></td>
            <td width="50"><a href="contract_print.php?Contractid=<?php echo $row_RSContract['id']; ?>&amp;ElFaraid=<?php echo $row_RSContract['ElFara']; ?>&amp;ElKesmid=<?php echo $row_RSContract['ElKesm']; ?>&amp;Elbakaid=<?php echo $row_RSContract['Elbaka']; ?>&amp;Elmodarebid=<?php echo $row_RSContract['Elmodareb']; ?>&amp;Elodwid=<?php echo $row_RSContract['Elodw']; ?>" target="_new">طباعة</a></td>
            <td width="50"><a href="contract_update.php?id=<?php echo $row_RSContract['id']; ?>">تعديل</a></td>
            <td width="50"><a href="contract_upgrade.php?id=<?php echo $row_RSContract['id']; ?>">ترقية</a></td>
            <td width="50"><a href="contract_delete.php?id=<?php echo $row_RSContract['id']; ?>">حذف</a></td>
          </tr>
          <?php } while ($row_RSContract = mysqli_fetch_assoc($RSContract)); ?>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;
      <table width="500" border="0" align="center" cellpadding="6" cellspacing="6" dir="rtl">
        <tr align="center" bgcolor="#66FFFF">
          <td width="25%"><?php if ($pageNum_RSContract > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_RSContract=%d%s", $currentPage, 0, $queryString_RSContract); ?>">&lt;&lt; أول صفحة</a>
            <?php } // Show if not first page ?></td>
          <td width="25%"><?php if ($pageNum_RSContract > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_RSContract=%d%s", $currentPage, max(0, $pageNum_RSContract - 1), $queryString_RSContract); ?>">&lt; الصفحة السابقة</a>
            <?php } // Show if not first page ?></td>
          <td width="25%"><?php if ($pageNum_RSContract < $totalPages_RSContract) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_RSContract=%d%s", $currentPage, min($totalPages_RSContract, $pageNum_RSContract + 1), $queryString_RSContract); ?>">الصفحة التالية &gt;</a>
            <?php } // Show if not last page ?></td>
          <td width="25%"><?php if ($pageNum_RSContract < $totalPages_RSContract) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_RSContract=%d%s", $currentPage, $totalPages_RSContract, $queryString_RSContract); ?>">آخر صفحة &gt;&gt;</a>
            <?php } // Show if not last page ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="50%" border="0" align="center" cellpadding="0" cellspacing="00" dir="rtl">
      <tr>
        <td align="center"><h3>عقود<?php echo ($startRow_RSContract + 1) ?> إلى <?php echo min($startRow_RSContract + $maxRows_RSContract, $totalRows_RSContract) ?> من <?php echo $totalRows_RSContract ?></h3></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100" border="0" align="left" cellpadding="2" cellspacing="2">
      <tr>
        <td align="center" bgcolor="#D9FFFF"><a href="contract_add.php"><strong>إضافة</strong></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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
