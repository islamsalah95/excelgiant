<?php require_once('./connections/connection.php'); ?>
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

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM blogs ORDER BY id DESC";
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

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = "SELECT * FROM categoryat ORDER BY id ASC";
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

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
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>منشورات الموقع</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td><p id="text"></p>
          <button id="searchBtn">بحث</button>
          <script type="text/javascript">
    const searchBtn = document.getElementById("searchBtn");

    searchBtn.addEventListener("click", function () {
      const search = prompt("اكتب النص المطلوب البحث عنه");
      const searchResult = window.find(search);
    });
      </script></td>
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="blogcategoryadd.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="95%" border="1" align="center" id="myTable">
        <tr>
          <th align="center" bgcolor="#7470b3">#</th>
          <th align="center" bgcolor="#7470b3">عنوان المنشور</th>
          <th align="center" bgcolor="#7470b3">صورة المنشور</th>
          <th align="center" bgcolor="#7470b3">ملخص المنشور</th>
          <th align="center" bgcolor="#7470b3">فئة المنشور</th>
          <th align="center" bgcolor="#7470b3">تاريخ النشر</th>
          <th width="70" align="center" bgcolor="#7470b3">الملف</th>
          <th align="center" bgcolor="#7470b3">بواسطة</th>
          <td width="50" align="center" bgcolor="#7470b3"><strong>تعديل</strong></td>
          <td width="50" align="center" bgcolor="#7470b3"><strong>حذف</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td align="center"><?php echo $row_Recordset1['id']; ?></td>
            <td align="center"><?php echo $row_Recordset1['title']; ?></td>
            <td align="center"><img src="../img/<?php echo $row_Recordset1['image']; ?>" height="50" /></td>
            <td width="300" align="center"><?php echo $row_Recordset1['samary']; ?></td>
            <td align="center"><p><?php echo $row_Recordset1['category']; ?></p></td>
            <td align="center"><?php echo $row_Recordset1['tdate']; ?></td>
            <td align="center"><a href="../img/<?php echo $row_Recordset1['malaf']; ?>" target="_new"><img src="../down.png" alt="" height="50" border="0" /></a></td>
            <td align="center"><?php echo $row_Recordset1['tauther']; ?></td>
            <td width="50" align="center"><a href="blogcategoryedit.php?id=<?php echo $row_Recordset1['id']; ?>" target="_new"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
            <td width="50" align="center"><a href="blogcategorydelete.php?id=<?php echo $row_Recordset1['id']; ?>" target="_new"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="center">
      <p>Records <?php echo ($startRow_Recordset1 + 1) ?> to <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> of <?php echo $totalRows_Recordset1 ?>&nbsp;    </p>
    <table border="0" dir="ltr">
      <tr>
        <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="First.gif" /></a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Previous.gif" /></a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Next.gif" /></a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Last.gif" /></a>
            <?php } // Show if not last page ?></td>
      </tr>
  </table>
    </p></td>
  </tr>
  <tr>
    <td><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="blogcategoryadd.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>
