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

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM decision ORDER BY id DESC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
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
    <td align="center"><h2><strong>صيغ قرارات النماذج</strong></h2></td>
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
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="decision_add.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table id="myTable" width="95%" border="1" align="center" dir="rtl">
      <tr bgcolor="#7470B3">
        <th width="40%" nowrap="nowrap"><strong>التاريخ</strong></th>
        <th width="40%" nowrap="nowrap">نص القرار</th>
        <th width="50" align="center" nowrap="nowrap"><strong>تعديل</strong></th>
        </tr>
      <?php do { ?>
      <tr align="center">
        <td width="40%"><p><?php echo $row_Recordset1['title']; ?></p></td>
        <td width="40%" align="right"><?php echo $row_Recordset1['topic']; ?></td>
        <td width="50"><a href="decision_edit.php?id=<?php echo $row_Recordset1['id']; ?>" target="_new"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
        </tr>
      <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="center">&nbsp;
      
      Records <?php echo ($startRow_Recordset1 + 1) ?> to <?php echo min($startRow_Recordset1 + $maxRows_Recordset1, $totalRows_Recordset1) ?> of <?php echo $totalRows_Recordset1 ?>
      <table border="0" align="center" dir="ltr">
        <tr>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="First.gif" alt="" /></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Previous.gif" alt="" /></a>
          <?php } // Show if not first page ?></td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Next.gif" alt="" /></a>
          <?php } // Show if not last page ?></td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Last.gif" alt="" /></a>
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
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="decision_add.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
