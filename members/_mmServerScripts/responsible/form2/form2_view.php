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

$maxRows_Recordset1 = 50;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "إفادة بمدة الخبرة العملية";
if (isset($_GET['form_type'])) {
  $colname_Recordset1 = $_GET['form_type'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM form1 WHERE form_type = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset1, "text"));
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
</head>

<body>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>نموذج إفادة بمدة الخبرة العملية </strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" align="center" bgcolor="#CCFFAA"><a href="form2add.php">إضافة</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="95%" border="1" align="center" dir="rtl">
      <tr align="center" bgcolor="#CCCCCC">
        <td><strong>#</strong></td>
        <td><strong>رقم القيد</strong></td>
        <td>&nbsp;</td>
        <td><strong>اسم العضو</strong></td>
        <td><strong>الفرع</strong></td>
        <td><strong>تاريخ الطباعة</strong></td>
        <td><strong>بواسطة</strong></td>
        <td><strong>رقم سند الدفع</strong></td>
        <td width="50" align="center">طباعة</td>
        <td width="50" align="center">حذف</td>
      </tr>
      <?php do { ?>
      <tr>
        <td><?php echo $row_Recordset1['id']; ?></td>
        <td><?php echo $row_Recordset1['nekaba']; ?></td>
        <td><?php echo $row_Recordset1['nekaba_name']; ?></td>
        <td><?php echo $row_Recordset1['saidly_name']; ?></td>
        <td><?php echo $row_Recordset1['nakeb_name']; ?></td>
        <td><?php echo $row_Recordset1['print_date']; ?></td>
        <td><?php echo $row_Recordset1['print_by']; ?></td>
        <td><?php echo $row_Recordset1['sanad_id']; ?></td>
        <td width="50" align="center"><a href="form2_print.php?id=<?php echo $row_Recordset1['id']; ?>">طباعة</a></td>
        <td width="50" align="center">حذف</td>
      </tr>
      <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="center">&nbsp;
      
Records <?php echo ($startRow_Recordset1 + 1) ?> to <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> of <?php echo $totalRows_Recordset1 ?><table border="0" align="center" dir="ltr">
        <tr>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="../First.gif" /></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="../Previous.gif" /></a>
              <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="../Next.gif" /></a>
              <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="../Last.gif" /></a>
              <?php } // Show if not last page ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" align="center" bgcolor="#CCFFAA"><a href="form2add.php">إضافة</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
