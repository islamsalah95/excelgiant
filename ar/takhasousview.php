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
$query_Recordset1 = "SELECT * FROM takhasousat ORDER BY id ASC";
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

<table align="center" cellpadding="5" cellspacing="5" dir="rtl">
  <tr>
    <td align="left"><a href="takhasousadd.php">إضافة</a></td>
  </tr>
  <tr>
    <td><table border="1" align="center" dir="rtl">
      <tr>
        <th width="50" align="center" bgcolor="#CCCCCC">#</th>
        <th align="center" bgcolor="#CCCCCC">عنوان عنوان الكورس</th>
        <th width="50" align="center" bgcolor="#CCCCCC">تعديل</th>
        <th width="50" align="center" bgcolor="#CCCCCC">حذف</th>
      </tr>
      <?php do { ?>
      <tr>
        <td width="50"><?php echo $row_Recordset1['id']; ?></td>
        <td><?php echo $row_Recordset1['title']; ?></td>
        <td width="50" align="center"><a href="takhasousedit.php?id=<?php echo $row_Recordset1['id']; ?>">تعديل</a></td>
        <td width="50" align="center"><a href="takhasousdelete.php?id=<?php echo $row_Recordset1['id']; ?>">حذف</a></td>
      </tr>
      <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="left"><a href="takhasousadd.php">إضافة</a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
