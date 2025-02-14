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
$colname_Recordset4 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset4 = $_GET['username'];
}
$colname_Recordset4 = "-1";
if (isset($_GET['usern'])) {
  $colname_Recordset4 = $_GET['usern'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset4 = sprintf("SELECT * FROM slidat WHERE username = %s", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);
  
  
  


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
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM slidat WHERE username = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rstowns = "SELECT * FROM towns";
$rstowns = mysqli_query($connection,$query_rstowns) or die(mysqli_error($connection));
$row_rstowns = mysqli_fetch_assoc($rstowns);
$totalRows_rstowns = mysqli_num_rows($rstowns);

$colname_Recordset3 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset3 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = sprintf("SELECT * FROM members WHERE id = %s", GetSQLValueString($colname_Recordset3, "int"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsbanks = "SELECT * FROM banks";
$rsbanks = mysqli_query($connection,$query_rsbanks) or die(mysqli_error($connection));
$row_rsbanks = mysqli_fetch_assoc($rsbanks);
$totalRows_rsbanks = mysqli_num_rows($rsbanks);



$colname_Recordset5 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset5 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset5 = sprintf("SELECT * FROM members WHERE id = %s", GetSQLValueString($colname_Recordset5, "int"));
$Recordset5 = mysqli_query($connection,$query_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

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








$dimyan = $row_Recordset5['sub_syndicate'];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE members SET member_type=%s, grad_img=%s, per_img=%s, aname=%s, bname=%s, cname=%s, dname=%s, grad_date=%s, grad_place=%s, id_card=%s, address=%s, work_place=%s, mail=%s, phone=%s, mobile=%s, member_activity=%s, sub_syndicate=%s, bank=%s, payment_no=%s, password=%s, username=%s, active=%s, create_date=%s, edit_date=%s, create_by=%s, edit_by=%s, deleted=%s WHERE id=%s",
                       GetSQLValueString($_POST['member_type'], "text"),
                       GetSQLValueString($_POST['grad_img'], "text"),
                       GetSQLValueString($_POST['per_img'], "text"),
                       GetSQLValueString($_POST['aname'], "text"),
                       GetSQLValueString($_POST['bname'], "text"),
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($_POST['dname'], "text"),
                       GetSQLValueString($_POST['grad_date'], "date"),
                       GetSQLValueString($_POST['grad_place'], "text"),
                       GetSQLValueString($_POST['id_card'], "int"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['work_place'], "text"),
                       GetSQLValueString($_POST['mail'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['member_activity'], "text"),
                       GetSQLValueString($_POST['sub_syndicate'], "int"),
                       GetSQLValueString($_POST['bank'], "int"),
                       GetSQLValueString($_POST['payment_no'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['active'], "int"),
                       GetSQLValueString($_POST['create_date'], "date"),
                       GetSQLValueString($_POST['edit_date'], "date"),
                       GetSQLValueString($_POST['create_by'], "int"),
                       GetSQLValueString($_POST['edit_by'], "int"),
                       GetSQLValueString($_POST['deleted'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));
 
  $updateGoTo = "members_view.php?sub_syndicate=". $dimyan . "";
  $dimyan="sub_syndicate=";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
  }
  header(sprintf("Location: %s", $updateGoTo , $dimyan));
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
</style>
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>الأعضاء</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>tttttt" method="post" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td><input name="member_type" type="hidden" id="member_type" value="<?php echo htmlentities($row_Recordset3['grad_img'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="grad_img" value="<?php echo htmlentities($row_Recordset3['grad_img'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="per_img" value="<?php echo htmlentities($row_Recordset3['per_img'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="aname" value="<?php echo htmlentities($row_Recordset3['aname'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="bname" value="<?php echo htmlentities($row_Recordset3['bname'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="cname" value="<?php echo htmlentities($row_Recordset3['cname'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="dname" value="<?php echo htmlentities($row_Recordset3['dname'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="grad_date" value="<?php echo htmlentities($row_Recordset3['grad_date'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input name="grad_place" type="hidden" id="grad_place" value="<?php echo htmlentities($row_Recordset3['grad_place']); ?>" size="32" />              <input type="hidden" name="id_card" value="<?php echo htmlentities($row_Recordset3['id_card'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="address" value="<?php echo htmlentities($row_Recordset3['address'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="work_place" value="<?php echo htmlentities($row_Recordset3['work_place'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="mail" value="<?php echo htmlentities($row_Recordset3['mail'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="phone" value="<?php echo htmlentities($row_Recordset3['phone'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="mobile" value="<?php echo htmlentities($row_Recordset3['mobile'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input name="member_activity" type="hidden" id="member_activity" value="<?php echo htmlentities($row_Recordset3['member_activity']); ?>" size="32" />              <input name="bank" type="hidden" id="bank" value="<?php echo htmlentities($row_Recordset3['bank']); ?>" size="32" />              <input type="hidden" name="payment_no" value="<?php echo htmlentities($row_Recordset3['payment_no'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="password" value="<?php echo htmlentities($row_Recordset3['password'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="username" value="<?php echo htmlentities($row_Recordset3['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input name="active" type="hidden" id="active" value="<?php echo htmlentities($row_Recordset3['active']); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td><input type="submit" value="حذف" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $row_Recordset3['id']; ?>" />
        <input type="hidden" name="sub_syndicate" value="<?php echo htmlentities($row_Recordset4['sub_syndicate']); ?>" />
        <input type="hidden" name="create_date" value="<?php echo htmlentities($row_Recordset3['create_date'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="edit_date" value="<?php echo date("Y-m-d h:i:s"); ?>" />
        <input type="hidden" name="create_by" value="<?php echo htmlentities($row_Recordset3['create_by'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="edit_by" value="<?php echo htmlentities($row_Recordset4['id']); ?>" />
        <input type="hidden" name="deleted" value="1" />
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="id" value="<?php echo $row_Recordset3['id']; ?>" />
      </form>
    <p>&nbsp;</p></td>
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

mysqli_free_result($rstowns);

mysqli_free_result($Recordset3);

mysqli_free_result($rsbanks);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);
?>
