<?php require_once('connections/connection.php'); ?>
<?php
// Initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF'] . "?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .= "&" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) && ($_GET['doLogout'] == "true")){
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
    global $connection;
    // (Optional) For PHP < 6
    if (PHP_VERSION < 6) {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }
    // Use MySQLi's real escape string
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
$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
$query_Recordset1 = sprintf("SELECT * FROM towns WHERE id = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection, $query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

// Query Recordset2
$colname_Recordset2 = "-1";
if (isset($_GET['create_date'])) {
  $colname_Recordset2 = $_GET['create_date'];
}
$colname2_Recordset2 = "-1";
if (isset($_GET['id'])) {
  $colname2_Recordset2 = $_GET['id'];
}
$query_Recordset2 = sprintf("SELECT * FROM towns WHERE create_date = %s AND id = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset2, "date"), GetSQLValueString($colname2_Recordset2, "int"));
$Recordset2 = mysqli_query($connection, $query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

// Query Recordset3
$colname_Recordset3 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset3 = $_GET['id'];
}
$query_Recordset3 = sprintf("SELECT * FROM towns WHERE id = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset3, "int"));
$Recordset3 = mysqli_query($connection, $query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);
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
      <h2><strong>اهلا بك يا <?php echo $_SESSION['MM_Username'] ?? ''; ?> في موقع اكسيل للحلول البرمجية</strong>
      <a href="<?php echo $logoutAction; ?>"><i class="fa fa-sign-out" aria-hidden="true"></i></a></h2>
    </td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td align="center"><h1>تحميل البرامج</h1></td>
  </tr>
  <tr>
    <td align="center">&nbsp;
      <table width="80%" border="1" cellpadding="0" cellspacing="0">
        <?php do { ?>
          <tr bgcolor="#117D43">
            <th nowrap="nowrap" bgcolor="#1FA465">#</th>
            <th nowrap="nowrap" bgcolor="#1FA465">اسم البرنامج</th>
            <th nowrap="nowrap" bgcolor="#1FA465">الاصدار</th>
          </tr>
          <tr>
            <td width="50" align="center"><?php echo $row_Recordset1['id'] ?? ''; ?></td>
            <td width="40%" align="center"><?php echo $row_Recordset1['name'] ?? ''; ?></td>
            <td align="center"><?php echo $row_Recordset1['syndadmin'] ?? ''; ?></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><?php echo $row_Recordset1['address'] ?? ''; ?><br /></td>
          </tr>
        <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
      </table>
    </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">
      <form id="form1" name="form1" method="get" action="">
        <input name="id" type="hidden" id="id" value="<?php echo $row_Recordset3['id'] ?? ''; ?>" />
        <label for="create_date">كود التحميل:</label>
        <input type="text" name="create_date" id="create_date" />
        <input type="submit" name="button" id="button" value="موافق" />
      </form>
    </td>
  </tr>
  <tr>
    <td align="center">
      <?php if ($totalRows_Recordset2 == 0) { ?>
      <table width="250" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center">ادخل كود التحميل لتحميل البرنامج</td>
        </tr>
      </table>
      <?php } ?>
    </td>
  </tr>
  <tr>
    <td align="center">
      <?php if ($totalRows_Recordset2 > 0) { ?>
      <table width="250" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td height="50" align="center" bgcolor="#1FA465">
            <h1><a href="<?php echo $row_Recordset2['syndadminjop'] ?? '#'; ?>" target="_new">تحميل</a></h1>
          </td>
        </tr>
      </table>
      <?php } ?>
    </td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
mysqli_free_result($Recordset2);
mysqli_free_result($Recordset3);
?>
