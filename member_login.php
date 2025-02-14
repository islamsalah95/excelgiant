<?php
include_once('header.php');

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
  
  // The connection file should already have selected the database.
  // Build the query using GetSQLValueString (which should be updated to use MySQLi)
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
    
    // Declare two session variables and assign them
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
<link href="style.css" rel="stylesheet" type="text/css" />
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
<style>
.button {
  background-color: #04AA6D; /* Green */
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
	background-color: #4CAF50;
	color: black;
	border: 2px solid #04AA6D;
}

.button1:hover {
	color: #090;
}

.button2 {
	background-color: #4CAF50;
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
</head>

<body>
<table width="200" border="0" align="center" dir="rtl">
  <tr>
    <td><form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST" target="_parent action="<?php echo $loginFormAction; ?>">
      <table width="200" border="0">
        <tr>
          <td align="center"><img src="lo.png" alt="" width="150"/></td>
        </tr>
        <tr>
          <td align="center"><h1> دخول الأعضاء</h1></td>
        </tr>
        <tr>
          <td><label for="username"></label>
            <input type="text" name="username" id="username" placeholder="اسم المستخدم:" required/></td>
        </tr>
        <tr>
          <td><label for="password"></label>
            <input type="password" name="password" id="password" placeholder="كلمة المرور:" required /></td>
        </tr>
        <tr>
          <td align="center"><input type="submit" name="button" id="button" value="دخول" /></td>
        </tr>
        <tr>
          <td align="center"><a href="members_add.php">
            <button class="button button1">عضو جديد</button></a></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>