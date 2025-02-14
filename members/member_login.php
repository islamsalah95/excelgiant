<?php require_once('connections/connection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
    global $connection; // Use the MySQLi connection

    // (Optional) For PHP < 6
    if (PHP_VERSION < 6) {
      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }

    // Use MySQLi's real escape string function
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
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername = $_POST['username'];
  $password = $_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "mempers_page.php";
  $MM_redirectLoginFailed = "error_mempers.php";
  $MM_redirecttoReferrer = true;

  // The connection file already selects the database; remove mysqli_query($connection, $query)() call.
  $LoginRS__query = sprintf(
    "SELECT NID, Qualification FROM mwmembers WHERE NID=%s AND Qualification=%s",
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
    // Declare session variables
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
  <title>اكسيل للحلول البرمجية</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
    a:link, a:visited, a:hover, a:active {
      text-decoration: none;
    }
  </style>
  <style>
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
  </style>
</head>
<body>
  <table width="200" border="0" align="center" dir="rtl">
    <tr>
      <td>
        <form action="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST" target="_parent">
          <table width="200" border="0">
            <tr>
              <td align="center"><img src="lo.png" alt="" width="150"/></td>
            </tr>
            <tr>
              <td align="center"><h1> دخول الأعضاء</h1></td>
            </tr>
            <tr>
              <td>
                <input type="text" name="username" id="username" placeholder="اسم المستخدم:" required/>
              </td>
            </tr>
            <tr>
              <td>
                <input type="password" name="password" id="password" placeholder="كلمة المرور:" required />
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
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <strong><a href="members_add.php">
          <button class="button">تسجيل عضو جديد</button>
        </a></strong>
      </td>
    </tr>
  </table>
</body>
</html>
