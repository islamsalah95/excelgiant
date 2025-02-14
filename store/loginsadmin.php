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
  $MM_redirectLoginSuccess = "sadmin/main.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = true;
  mysqli_select_db($connection, "excelgia_mahmdata");
  
  $LoginRS__query=sprintf("SELECT username, password FROM sadmin WHERE username=%s AND password=md5(%s)",
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
    header("Location: " . $MM_redirectLoginSuccess,  '_blank' );
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
<title>لوحة التحكم</title>
<link href="files/style.css" rel="stylesheet" type="text/css" />
    <meta property="og:image" content="https://excelgiants.site/img/logo.png">

</head>

<body>
<table width="200" border="0" align="center" dir="rtl">
  <tr>
    <td><form id="form1" name="form1" method="POST" target="_parent action="<?php echo $loginFormAction; ?>">
      <table width="200" border="0">
        <tr>
          <td align="center"><img src="img/logo.png" width="150" /></td>
        </tr>
        <tr>
          <td align="center"><h1> دخول لوحة التحكم</h1></td>
        </tr>
        <tr>
          <td><label for="username"></label>
            <input type="text" name="username" id="username" /></td>
        </tr>
        <tr>
          <td><label for="password"></label>
            <input type="password" name="password" id="password" /></td>
        </tr>
        <tr>
          <td><input type="submit" name="button" id="button" value="دخول" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>