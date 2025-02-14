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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO city (id, sybsub_syndicate, sub_syndicateid, towns) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['sybsub_syndicate'], "text"),
                       GetSQLValueString($_POST['sub_syndicateid'], "int"),
                       GetSQLValueString($_POST['towns'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = "SELECT * FROM towns ORDER BY name ASC";
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

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = "SELECT * FROM city ORDER BY id DESC";
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['sub_syndicateid'])) {
  $colname_Recordset3 = $_GET['sub_syndicateid'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = sprintf("SELECT * FROM towns WHERE id = %s", GetSQLValueString($colname_Recordset3, "int"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_GET['sub_syndicateid'])) {
  $colname_Recordset4 = $_GET['sub_syndicateid'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset4 = sprintf("SELECT * FROM city WHERE sub_syndicateid = %s", GetSQLValueString($colname_Recordset4, "int"));
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset5 = "SELECT * FROM towns ORDER BY name ASC";
$Recordset5 = mysqli_query($connection,$query_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
</head>

<body>
<?php include 'header.php'; ?>

<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>الاقسام التابعة للفرع</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><form id="form1" name="form1" method="get" action="">
      <table width="200" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td><label for="sub_syndicateid"></label>
            <select name="sub_syndicateid" id="sub_syndicateid">
              <option value="">اختر من القائمة</option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset5['id']?>"><?php echo $row_Recordset5['name']?></option>
              <?php
} while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
  $rows = mysqli_num_rows($Recordset5);
  if($rows > 0) {
      mysql_data_seek($Recordset5, 0);
	  $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
  }
?>
            </select></td>
          <td><input type="submit" name="button" id="button" value="موافق" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الوحدة الحزبية:</td>
            <td><input type="text" name="sybsub_syndicate" value="<?php echo $row_Recordset3['name']; ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">العمل العام:</td>
            <td><input type="text" name="towns" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="إضافة" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="sub_syndicateid" value="<?php echo $row_Recordset3['id']; ?>" />
        <input type="hidden" name="MM_insert" value="form2" />
      </form></td>
  </tr>
  <tr>
    <td>&nbsp;
      <table align="center">
          <tr>
        <?php do { ?>
            <td> <h2>- <?php echo $row_Recordset4['towns']; ?></h2></td>
          <?php } while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4)); ?>
          </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);
?>
