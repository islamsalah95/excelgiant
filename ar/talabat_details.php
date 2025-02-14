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
  $updateSQL = sprintf("UPDATE request SET OrderStatus=%s, FaniName=%s, FaniPhone=%s, FaniID=%s WHERE id=%s",
                       GetSQLValueString($_POST['OrderStatus'], "text"),
                       GetSQLValueString($_POST['FaniName'], "text"),
                       GetSQLValueString($_POST['FaniPhone'], "text"),
                       GetSQLValueString($_POST['FaniID'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "talabat.php";
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
$colname_Recordset1 = "-1";
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM sadmin WHERE username = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$maxRows_DetailRS1 = 50;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_DetailRS1 = sprintf("SELECT * FROM request WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_DetailRS1, "int"));
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

$colname_Recordset2 = "-1";
if (isset($_GET['category'])) {
  $colname_Recordset2 = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM fani WHERE OrderSDate = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
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
  mysqli_select_db($connection, "excelgia_mahmdata");
  
  $LoginRS__query=sprintf("SELECT username, password FROM sadmin WHERE username=%s AND password=%s",
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
<title>لوحة التحكم</title>
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
.ff {
	font-weight: bold;
}
</style>
</head>
<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center" valign="top"><h2><strong></strong></h2>
      <table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
        <tr>
          <td colspan="2" align="center"><h2><strong>طلبات المراسلة</strong></h2></td>
        </tr>
        <tr>
          <td colspan="2"><hr /></td>
        </tr>
        <tr>
          <td width="50%" valign="top"><table id="myTable" width="95%" border="1" align="center" dir="rtl">
            <tr>
              <th colspan="2" align="center"><h2><strong>تفاصيل الطلب</strong></h2></th>
              </tr>
            <tr>
              <td><h3>#</h3></td>
              <td><h3><?php echo $row_DetailRS1['id']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>عنوان المنشور</h3></td>
              <td><h3><?php echo $row_DetailRS1['ServicesTitle']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>ملخص المنشور</h3></td>
              <td><h3><?php echo $row_DetailRS1['ServicesPrice']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>تفاصيل المنشور</h3></td>
              <td><h3><?php echo $row_DetailRS1['ServicesText']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>تاريخ تسجيل الطلب</h3></td>
              <td><h3><?php echo $row_DetailRS1['OrderDate']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>اسم متدرب المنشور</h3></td>
              <td><h3><?php echo $row_DetailRS1['OrderName']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>رقم تليفون متدرب المنشور</h3></td>
              <td><h3><?php echo $row_DetailRS1['OrderPhone']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>العنوان</h3></td>
              <td><h3><?php echo $row_DetailRS1['OrderAddress']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>المدينة</h3></td>
              <td><h3><?php echo $row_DetailRS1['OrderTown']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>المنطقة</h3></td>
              <td><h3><?php echo $row_DetailRS1['OrderArea']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>تفاصيل اخرى للطلب</h3></td>
              <td><h3><?php echo $row_DetailRS1['OrderDetails']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>صورة</h3></td>
              <td><h3><img src="../img/<?php echo $row_DetailRS1['image']; ?>" width="300" /></h3></td>
            </tr>
            <tr>
              <td><h3>تاريخ التنفيذ</h3></td>
              <td><h3><?php echo $row_DetailRS1['OrderFDate']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>تاريخ بديل للتنفيذ</h3></td>
              <td><h3><?php echo $row_DetailRS1['OrderSDate']; ?></h3></td>
            </tr>
            <tr>
              <td><h3>رقم الطلب</h3></td>
              <td><h3><strong><?php echo $row_DetailRS1['OrderNo']; ?></strong></h3></td>
            </tr>
            <tr>
              <td colspan="2">
                <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                <table align="center">
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right"><h3>حالة الطلب:</h3></td>
                      <td><h3>
                        <select name="OrderStatus">
                          <option value="طلب لم يؤكد " <?php if (!(strcmp("طلب لم يؤكد ", htmlentities($row_DetailRS1['OrderStatus'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>طلب لم يؤكد</option>
                          <option value="تم تأكيد الطلب" <?php if (!(strcmp("تم تأكيد الطلب", htmlentities($row_DetailRS1['OrderStatus'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>تم تأكيد الطلب</option>
                          <option value="جاري تنفيذ الطلب" <?php if (!(strcmp("جاري تنفيذ الطلب", htmlentities($row_DetailRS1['OrderStatus'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>جاري تنفيذ الطلب</option>
                          <option value="تم الانتهاء من الطلب" <?php if (!(strcmp("تم الانتهاء من الطلب", htmlentities($row_DetailRS1['OrderStatus'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>تم الانتهاء من الطلب</option>
                        </select>
                      </h3></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right"><h3>اسم المدرس:</h3></td>
                      <td><h3>
                        <input type="text" name="FaniName" value="<?php echo htmlentities($row_DetailRS1['FaniName'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                      </h3></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right"><h3>رقم التليفون:</h3></td>
                      <td><h3>
                        <input type="text" name="FaniPhone" value="<?php echo htmlentities($row_DetailRS1['FaniPhone'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                      </h3></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right"><h3>كود المدرس:</h3></td>
                      <td><h3>
                        <input type="text" name="FaniID" value="<?php echo htmlentities($row_DetailRS1['FaniID'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
                      </h3></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right"><h3>&nbsp;</h3></td>
                      <td><h3>
                        <input type="submit" value="حفظ" />
                      </h3></td>
                    </tr>
                  </table>
                  <h3>
                    <input type="hidden" name="MM_update" value="form1" />
                    <input type="hidden" name="id" value="<?php echo $row_DetailRS1['id']; ?>" />
                  </h3>
                </form>
                <h3>&nbsp;</h3></td>
              </tr>
          </table></td>
          <td width="50%" valign="top"><table id="myTable" width="95%" border="1" align="center" dir="rtl">
            <tr>
              <th align="center"><h2>المدرسين المقترحين لهذه المنشور</h2></th>
            </tr>
            <tr>
              <td><?php do { ?>
                  <table id="myTable" width="95%" border="1" align="center" dir="rtl">
                    <tr>
                      <th height="4" colspan="2" align="center">&nbsp;</th>
                      </tr>
                    <tr>
                      <td width="79%" height="6" align="center"><strong><?php echo $row_Recordset2['OrderName']; ?></strong></td>
                      <td width="21%" rowspan="4" align="center"><img src="../img/<?php echo $row_Recordset2['image']; ?>" height="120" /></td>
                      </tr>
                    <tr>
                      <td height="13" align="center"><?php echo $row_Recordset2['OrderPhone']; ?></td>
                      </tr>
                    <tr>
                      <td height="29" align="center"><p><?php echo $row_Recordset2['OrderAddress']; ?><br />
                        <?php echo $row_Recordset2['OrderTown']; ?><br />
                        <?php echo $row_Recordset2['OrderArea']; ?></p></td>
                      </tr>
                    <tr>
                      <td height="60" align="center"><?php echo $row_Recordset2['OrderDetails']; ?></td>
                      </tr>
                  </table>
                  <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); ?></td>
            </tr>
          </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($DetailRS1);

mysqli_free_result($Recordset2);
?>