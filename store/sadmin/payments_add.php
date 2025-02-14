<?php require_once('../connections/connection.php'); ?>
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
  
  $LoginRS__query=sprintf("SELECT username, password FROM slidat WHERE username=%s AND password=%s",
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO payments (id, payment_type, payment_method, bank_id, bank_number, total_value, paid, member, create_date, edit_date, create_by, edit_by, payment_date, sub_syndicate) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['payment_type'], "int"),
                       GetSQLValueString($_POST['payment_method'], "text"),
                       GetSQLValueString($_POST['bank_id'], "int"),
                       GetSQLValueString($_POST['bank_number'], "text"),
                       GetSQLValueString($_POST['total_value'], "text"),
                       GetSQLValueString($_POST['paid'], "text"),
                       GetSQLValueString($_POST['member'], "int"),
                       GetSQLValueString($_POST['create_date'], "date"),
                       GetSQLValueString($_POST['edit_date'], "date"),
                       GetSQLValueString($_POST['create_by'], "int"),
                       GetSQLValueString($_POST['edit_by'], "int"),
                       GetSQLValueString($_POST['payment_date'], "date"),
                       GetSQLValueString($_POST['sub_syndicate'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "payments_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM payments WHERE sub_syndicate = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset1, "int"));
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
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM slidat WHERE username = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = "SELECT * FROM members";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset4 = "SELECT * FROM towns";
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset5 = "SELECT * FROM payments_type";
$Recordset5 = mysqli_query($connection,$query_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

$colname_Recordset6 = "-1";
if (isset($_GET['recordID'])) {
  $colname_Recordset6 = $_GET['recordID'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset6 = sprintf("SELECT * FROM payments WHERE id = %s", GetSQLValueString($colname_Recordset6, "int"));
$Recordset6 = mysqli_query($connection,$query_Recordset6) or die(mysqli_error($connection));
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysqli_num_rows($Recordset6);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsbanks = "SELECT * FROM banks";
$rsbanks = mysqli_query($connection,$query_rsbanks) or die(mysqli_error($connection));
$row_rsbanks = mysqli_fetch_assoc($rsbanks);
$totalRows_rsbanks = mysqli_num_rows($rsbanks);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsmember = "SELECT * FROM members";
$rsmember = mysqli_query($connection,$query_rsmember) or die(mysqli_error($connection));
$row_rsmember = mysqli_fetch_assoc($rsmember);
$totalRows_rsmember = mysqli_num_rows($rsmember);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsusers = "SELECT * FROM slidat";
$rsusers = mysqli_query($connection,$query_rsusers) or die(mysqli_error($connection));
$row_rsusers = mysqli_fetch_assoc($rsusers);
$totalRows_rsusers = mysqli_num_rows($rsusers);

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
</style>
</head>

<body>
<?php include 'header.php'; ?>

<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>سندات القبض</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">نوع السند</td>
            <td><select name="payment_type" id="payment_type">
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset5['id']?>"<?php if (!(strcmp($row_Recordset5['id'], $row_Recordset6['payment_type']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset5['name']?></option>
              <?php
} while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
  $rows = mysqli_num_rows($Recordset5);
  if($rows > 0) {
      mysql_data_seek($Recordset5, 0);
	  $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">طريقة الدفع:</td>
            <td><select name="payment_method" id="payment_method">
              <option value="0" <?php if (!(strcmp(0, $row_Recordset6['payment_method']))) {echo "selected=\"selected\"";} ?>>نقدي</option>
              <option value="1" <?php if (!(strcmp(1, $row_Recordset6['payment_method']))) {echo "selected=\"selected\"";} ?>>صك</option>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><select name="bank_id" id="bank_id">
              <option value="" <?php if (!(strcmp("", $row_Recordset6['bank_id']))) {echo "selected=\"selected\"";} ?>></option>
              <?php
do {  
?>
              <option value="<?php echo $row_rsbanks['id']?>"<?php if (!(strcmp($row_rsbanks['id'], $row_Recordset6['bank_id']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsbanks['name']?></option>
              <?php
} while ($row_rsbanks = mysqli_fetch_assoc($rsbanks));
  $rows = mysqli_num_rows($rsbanks);
  if($rows > 0) {
      mysql_data_seek($rsbanks, 0);
	  $row_rsbanks = mysqli_fetch_assoc($rsbanks);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">رقم الحساب:</td>
            <td><input type="text" name="bank_number" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">القيمة:</td>
            <td><input type="text" name="total_value" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المدفوع:</td>
            <td><input type="text" name="paid" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">العضو:</td>
            <td><select name="member" id="member">
              <?php
do {  
?>
              <option value="<?php echo $row_rsmember['id']?>"><?php echo $row_rsmember['aname']?> <?php echo $row_rsmember['bname']?> <?php echo $row_rsmember['cname']?> <?php echo $row_rsmember['dname']?></option>
              <?php
} while ($row_rsmember = mysqli_fetch_assoc($rsmember));
  $rows = mysqli_num_rows($rsmember);
  if($rows > 0) {
      mysql_data_seek($rsmember, 0);
	  $row_rsmember = mysqli_fetch_assoc($rsmember);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="اضافة" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="create_date" value="<?php echo date("Y-m-d h:i:s"); ?>" />
        <input type="hidden" name="edit_date" value="<?php echo date("Y-m-d h:i:s"); ?>" />
        <input type="hidden" name="create_by" value="<?php echo $row_Recordset2['id']; ?>" />
        <input type="hidden" name="edit_by" value="<?php echo $row_Recordset2['id']; ?>" />
        <input type="hidden" name="payment_date" value="<?php echo date("Y-m-d h:i:s"); ?>" />
        <input type="hidden" name="sub_syndicate" value="<?php echo $row_Recordset2['sub_syndicate']; ?>" />
        <input type="hidden" name="MM_insert" value="form1" />
      </form></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);

mysqli_free_result($Recordset6);

mysqli_free_result($rsbanks);

mysqli_free_result($rsmember);

mysqli_free_result($rsusers);
?>
