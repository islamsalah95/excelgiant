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

$currentPage = $_SERVER["PHP_SELF"];

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM form1 ORDER BY id DESC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

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


//Remove Native Arrow
input::-webkit-calendar-picker-indicator {
  display: none;
}

//Add Image Arrow
input[list]{
   background:url("//www.bricklink.com/3D/down.png") no-repeat right 1px; // Adjust your needs
}


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
<link href="dddddd.css" rel="stylesheet" type="text/css" />
</head>

<body>
<section class="items">
<table id="myTable" width="85%" border="1" align="center" dir="rtl">
<thead>
  <tr bgcolor="">
    <th colspan="7" align="center" nowrap="nowrap"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="2" align="center"><h2><strong><span dir="rtl">نقابة الصيادلة ليبيا -  تقرير منتسبي نقابة الصيادلة لكافة المنشورات</span></strong></h2></td>
      </tr>
      <tr>
        <td width="50%">&nbsp;</td>
        <td width="50%"><strong>تاريخ التقرير: <?php echo date("Y-m-d"); ?></strong></td>
      </tr>
    </table></th>
    </tr>
  <tr bgcolor="#7470B3">
    <th align="center" nowrap="nowrap"><strong>اسم العضو</strong></th>
    <th width="100" align="center" nowrap="nowrap"><strong>مسلسل</strong></th>
    <th width="100" align="center" nowrap="nowrap"><strong>تاريخ المنشور</strong></th>
    <th width="100" align="center" nowrap="nowrap">الموظف المسئول</th>
    <th width="100" align="center" nowrap="nowrap"><strong>النقابة الفرعية</strong></th>
    <th width="100" align="center" nowrap="nowrap">رقم السند</th>
    <th width="100" align="center" nowrap="nowrap">نوع المنشور</th>
  </tr>
  </thead>
  <?php do { ?>
  <tr align="center">
    <td align="center" nowrap="nowrap"><?php echo $row_Recordset1['saidly_name']; ?></td>
    <td width="100" align="center" nowrap="nowrap"><?php echo $row_Recordset1['nekaba']; ?></td>
    <td width="100" align="center" nowrap="nowrap"><?php echo $row_Recordset1['print_date']; ?></td>
    <td width="100" align="center"><?php echo $row_Recordset1['print_by']; ?></td>
    <td width="100" align="center" nowrap="nowrap"><select name="sub_syndicate" id="sub_syndicate">
      <?php
do {  
?>
      <option value="<?php echo $row_rstowns['id']?>"<?php if (!(strcmp($row_rstowns['id'], $row_Recordset1['sub_syndicate']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rstowns['name']?></option>
      <?php
} while ($row_rstowns = mysqli_fetch_assoc($rstowns));
  $rows = mysqli_num_rows($rstowns);
  if($rows > 0) {
      mysql_data_seek($rstowns, 0);
	  $row_rstowns = mysqli_fetch_assoc($rstowns);
  }
?>
    </select></td>
    <td width="100" align="center" nowrap="nowrap"><?php echo $row_Recordset1['sanad_id']; ?></td>
    <td width="100" align="center" nowrap="nowrap"><?php echo $row_Recordset1['form_type']; ?></td>
  </tr>
  <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
  <tbody>
</table>
</section>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($rstowns);
?>
