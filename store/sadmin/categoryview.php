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

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM categoryat ORDER BY id DESC";
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
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="categoryadd.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table id="myTable" border="1" align="center">
        <tr>
          <th bgcolor="#7470B3">#</th>
          <th bgcolor="#7470B3">الفئة</th>
          <th align="center" bgcolor="#7470b3">صورة المنشور</th>
          <td width="50" align="center" bgcolor="#7470b3"><strong>تعديل</strong></td>
          <td width="50" align="center" bgcolor="#7470b3"><strong>حذف</strong></td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['id']; ?></td>
            <td><?php echo $row_Recordset1['category']; ?></td>
            <td align="center"><img src="../img/<?php echo $row_Recordset1['image']; ?>" alt="" height="50" /></td>
            <td width="50" align="center"><a href="categoryedit.php?id=<?php echo $row_Recordset1['id']; ?>" target="_new"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
            <td width="50" align="center"><a href="categorydel.php?id=<?php echo $row_Recordset1['id']; ?>" target="_new"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          </tr>
          <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="categoryadd.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
