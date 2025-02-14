<?php require_once('../connections/connection.php'); ?>
<?php
// Updated GetSQLValueString function using MySQLi
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
    global $connection; // Use the MySQLi connection

    // For PHP < 6 (not really needed nowadays)
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

// Initialize the session if not already started
if (!isset($_SESSION)) {
  session_start();
}

// Set up logout action
$logoutAction = $_SERVER['PHP_SELF'] . "?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")) {
  $logoutAction .= "&" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_GET['doLogout'])) && ($_GET['doLogout'] == "true")) {
  // Clear session variables to fully log out
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

// Save the referring URL if provided
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

// Process login if the form is submitted
if (isset($_POST['username'])) {
  $loginUsername = $_POST['username'];
  $password = $_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "view.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = true;
  
  // No need for mysql_select_db() since connection file already selects the DB.
  $LoginRS__query = sprintf(
    "SELECT email, password FROM agents WHERE email=%s AND password=md5(%s)",
    GetSQLValueString($loginUsername, "text"),
    GetSQLValueString($password, "text")
  );
  
  $LoginRS = mysqli_query($connection, $LoginRS__query) or die(mysqli_error($connection));
  $loginFoundUser = mysqli_num_rows($LoginRS);
  
  if ($loginFoundUser) {
    $loginStrGroup = "";
    if (PHP_VERSION >= 5.1) {
      session_regenerate_id(true);
    } else {
      session_regenerate_id();
    }
    // Set session variables
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;
    
    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];
    }
    header("Location: " . $MM_redirectLoginSuccess);
  } else {
    header("Location: " . $MM_redirectLoginFailed);
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>WASET الوسيط - متجر الوكلاء</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <table width="400" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
    <tr>
      <td>
        <form id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
          <table width="400" border="0" cellspacing="4" cellpadding="4">
            <tr>
              <td height="40" align="center"><img src="googlevsprivacy.gif" width="350" /></td>
            </tr>
            <tr>
              <td height="40" align="center" bgcolor="#CCCCCC"><strong>تسجيل الدخول</strong></td>
            </tr>
            <tr>
              <td align="center">
                <input type="text" name="username" id="username" placeholder="اسم المستخدم" required />
              </td>
            </tr>
            <tr>
              <td align="center">
                <input type="password" name="password" id="password" placeholder="كلمة المرور" required />
              </td>
            </tr>
            <tr>
              <td align="center">
                <input type="submit" name="button" id="button" value="دخول" />
              </td>
            </tr>
          </table>
        </form>
      </td>
    </tr>
  </table>
</body>
</html>
