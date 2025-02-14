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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO classatattend (id, classat, Faraa, trainer) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['classat'], "text"),
                       GetSQLValueString($_POST['Faraa'], "text"),
                       GetSQLValueString($_POST['trainer'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "attend_fitness_add.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsclassat = "SELECT * FROM classat ORDER BY id ASC";
$rsclassat = mysqli_query($connection,$query_rsclassat) or die(mysqli_error($connection));
$row_rsclassat = mysqli_fetch_assoc($rsclassat);
$totalRows_rsclassat = mysqli_num_rows($rsclassat);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsfaraa = "SELECT * FROM towns ORDER BY id ASC";
$rsfaraa = mysqli_query($connection,$query_rsfaraa) or die(mysqli_error($connection));
$row_rsfaraa = mysqli_fetch_assoc($rsfaraa);
$totalRows_rsfaraa = mysqli_num_rows($rsfaraa);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = "SELECT * FROM trainers ORDER BY username ASC";
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
</head>

<body>
<?php include 'header.php'; ?>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center" dir="rtl">
    <tr valign="baseline">
      <td colspan="6" align="center" nowrap="nowrap"><h2><strong>تسجيل حضور مجوعات الفيتنس</strong></h2></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><strong>الكلاس:</strong></td>
      <td><select name="classat" id="classat">
        <option value=""> </option>
        <?php
do {  
?>
        <option value="<?php echo $row_rsclassat['name']?>"><?php echo $row_rsclassat['name']?></option>
        <?php
} while ($row_rsclassat = mysqli_fetch_assoc($rsclassat));
  $rows = mysqli_num_rows($rsclassat);
  if($rows > 0) {
      mysql_data_seek($rsclassat, 0);
	  $row_rsclassat = mysqli_fetch_assoc($rsclassat);
  }
?>
      </select></td>
      <td><strong>الوحدة الحزبية:</strong></td>
      <td><select name="Faraa" id="Faraa">
        <option value=""> </option>
        <?php
do {  
?>
        <option value="<?php echo $row_rsfaraa['name']?>"><?php echo $row_rsfaraa['name']?></option>
        <?php
} while ($row_rsfaraa = mysqli_fetch_assoc($rsfaraa));
  $rows = mysqli_num_rows($rsfaraa);
  if($rows > 0) {
      mysql_data_seek($rsfaraa, 0);
	  $row_rsfaraa = mysqli_fetch_assoc($rsfaraa);
  }
?>
      </select></td>
      <td>المدرب:</td>
      <td><select name="trainer" id="trainer">
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset2['username']?>"><?php echo $row_Recordset2['username']?></option>
        <?php
} while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
  $rows = mysqli_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" value="موافق" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="id" value="" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($rsclassat);

mysqli_free_result($rsfaraa);

mysqli_free_result($Recordset2);
?>
