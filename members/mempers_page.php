<?php require_once('connections/connection.php'); ?>
<?php
// Initialize the session if not already started
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF'] . "?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")) {
  $logoutAction .= "&" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) && ($_GET['doLogout'] == "true")) {
  // Fully log out a visitor by clearing session variables
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username'], $_SESSION['MM_UserGroup'], $_SESSION['PrevUrl']);
  
  $logoutGoTo = "member_login.php";
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

// Restrict Access To Page: Grant or deny access
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  $isValid = false; 
  if (!empty($UserName)) { 
    $arrUsers = explode(",", $strUsers); 
    $arrGroups = explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "member_login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("", $MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
    $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo . $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: " . $MM_restrictGoTo);
  exit;
}
?>
<?php
// Updated GetSQLValueString function using MySQLi
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
    global $connection; // Use the MySQLi connection

    // For PHP < 6 (usually not needed)
    if (PHP_VERSION < 6) {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }
    // Escape the value using MySQLi
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
?>
<?php
// Redirect if username exists
$MM_flag = "MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect = "errorid.php";
  $loginUsername = $_POST['NID'];
  $LoginRS__query = sprintf("SELECT NID FROM mwmembers WHERE NID=%s", GetSQLValueString($loginUsername, "text"));
  $LoginRS = mysqli_query($connection, $LoginRS__query) or die(mysqli_error($connection));
  $loginFoundUser = mysqli_num_rows($LoginRS);

  if ($loginFoundUser) {
    $MM_qsChar = "?";
    if (substr_count($MM_dupKeyRedirect, "?") >= 1)
      $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar . "requsername=" . $loginUsername;
    header("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
?>
<?php
// Query Recordset1
$query_Recordset1 = "SELECT * FROM towns ORDER BY id ASC";
$Recordset1 = mysqli_query($connection, $query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>اكسيل للحلول البرمجية</title>
  <meta property="og:image" content="https://excelgiants.site/lo.png" />
  <meta property="twitter:image" content="https://excelgiants.site/lo.png" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    .button {  
      background-color: #04AA6D;
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
    .button2 {  
      background-color: white; 
      color: black; 
      border: 2px solid #008CBA;
    }
    a:link, a:visited, a:hover, a:active {
      text-decoration: none;
    }
  </style>
</head>
<body>
<?php include 'modear/top.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
      <h2>
        <strong>اهلا بك يا <?php echo $_SESSION['MM_Username'] ?? ''; ?> في موقع اكسيل للحلول البرمجية</strong>
        <a href="<?php echo $logoutAction; ?>"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
      </h2>
    </td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td align="center"><h1>تحميل البرامج</h1></td>
  </tr>
  <tr>
    <td align="center">
      <table width="80%" border="1" cellpadding="0" cellspacing="0">
        <tr bgcolor="#117D43">
          <th width="50" nowrap="nowrap" bgcolor="#1FA465">#</th>
          <th width="40%" nowrap="nowrap" bgcolor="#1FA465">اسم البرنامج</th>
          <th width="40%" nowrap="nowrap" bgcolor="#1FA465">الاصدار</th>
          <th width="100" nowrap="nowrap" bgcolor="#1FA465">تحميل</th>
        </tr>
        <?php do { ?>
          <tr>
            <td width="50" align="center"><?php echo $row_Recordset1['id'] ?? ''; ?></td>
            <td width="40%" align="center"><?php echo $row_Recordset1['name'] ?? ''; ?></td>
            <td width="40%" align="center"><?php echo $row_Recordset1['syndadmin'] ?? ''; ?></td>
            <td width="100" align="center">
              <h1>
                <a href="mempers_download.php?id=<?php echo $row_Recordset1['id'] ?? ''; ?>">
                  <i class="fa fa-download" aria-hidden="true"></i>
                </a>
              </h1>
            </td>
          </tr>
        <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
      </table>
    </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
