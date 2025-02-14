<?php require_once('connections/connection.php'); ?>
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
mysqli_query($connection, $query)($database_connection, $connection);
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
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM users WHERE username = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = "SELECT * FROM members";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset4 = "SELECT * FROM towns";
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset5 = "SELECT * FROM payments_type";
$Recordset5 = mysqli_query($connection,$query_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

$colname_Recordset6 = "-1";
if (isset($_GET['recordID'])) {
  $colname_Recordset6 = $_GET['recordID'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset6 = sprintf("SELECT * FROM payments WHERE id = %s", GetSQLValueString($colname_Recordset6, "int"));
$Recordset6 = mysqli_query($connection,$query_Recordset6) or die(mysqli_error($connection));
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysqli_num_rows($Recordset6);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsbanks = "SELECT * FROM banks";
$rsbanks = mysqli_query($connection,$query_rsbanks) or die(mysqli_error($connection));
$row_rsbanks = mysqli_fetch_assoc($rsbanks);
$totalRows_rsbanks = mysqli_num_rows($rsbanks);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsmember = "SELECT * FROM members";
$rsmember = mysqli_query($connection,$query_rsmember) or die(mysqli_error($connection));
$row_rsmember = mysqli_fetch_assoc($rsmember);
$totalRows_rsmember = mysqli_num_rows($rsmember);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsusers = "SELECT * FROM users";
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
<title>Energy Fitness Center</title>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="80%" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <th width="13%" nowrap="nowrap" bgcolor="#7470B3">رقم السند</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_Recordset6['id']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">نوع السند</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<select name="select3" id="select3">
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
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">طريقة الدفع</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<select name="select4" id="select4">
          <option value="0" <?php if (!(strcmp(0, $row_Recordset6['payment_method']))) {echo "selected=\"selected\"";} ?>>نقدي</option>
          <option value="1" <?php if (!(strcmp(1, $row_Recordset6['payment_method']))) {echo "selected=\"selected\"";} ?>>صك</option>
        </select></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">اسم البنك</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<select name="select5" id="select5">
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
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">رقم الحساب</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_Recordset6['bank_number']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">القيمة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_Recordset6['total_value']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">المدفوع</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_Recordset6['paid']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">العضو</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<select name="select6" id="select6">
          <?php
do {  
?>
          <option value="<?php echo $row_rsmember['id']?>"<?php if (!(strcmp($row_rsmember['id'], $row_Recordset6['member']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsmember['aname']?> <?php echo $row_rsmember['bname']?> <?php echo $row_rsmember['cname']?> <?php echo $row_rsmember['dname']?></option>
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
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">المسئول</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<select name="select7" id="select7">
          <?php
do {  
?>
          <option value="<?php echo $row_rsusers['id']?>"<?php if (!(strcmp($row_rsusers['id'], $row_Recordset6['create_by']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsusers['first_name']?> <?php echo $row_rsusers['last_name']?></option>
          <?php
} while ($row_rsusers = mysqli_fetch_assoc($rsusers));
  $rows = mysqli_num_rows($rsusers);
  if($rows > 0) {
      mysql_data_seek($rsusers, 0);
	  $row_rsusers = mysqli_fetch_assoc($rsusers);
  }
?>
        </select></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">تاريخ السند</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_Recordset6['create_date']; ?></td>
      </tr>
    </table></td>
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

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);

mysqli_free_result($Recordset6);

mysqli_free_result($rsbanks);

mysqli_free_result($rsmember);

mysqli_free_result($rsusers);
?>
