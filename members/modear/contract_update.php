<?php require_once('connections/connection.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../modear.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE contract SET ElFara=%s, ElKesm=%s, Elbaka=%s, elbakatitle=%s, tamrinatedafia=%s, Elmodareb=%s, ElmodarebName=%s, Elodw=%s, TafeelDate=%s, MowazafName=%s, Total=%s, khasm=%s, Madfoaa=%s, Bakey=%s, Notes=%s, tarekh=%s WHERE id=%s",
                       GetSQLValueString($_POST['ElFara'], "text"),
                       GetSQLValueString($_POST['ElKesm'], "text"),
                       GetSQLValueString($_POST['Elbaka'], "text"),
                       GetSQLValueString($_POST['elbakatitle'], "text"),
                       GetSQLValueString($_POST['tamrinatedafia'], "text"),
                       GetSQLValueString($_POST['Elmodareb'], "text"),
                       GetSQLValueString($_POST['ElmodarebName'], "text"),
                       GetSQLValueString($_POST['Elodw'], "text"),
                       GetSQLValueString($_POST['TafeelDate'], "text"),
                       GetSQLValueString($_POST['MowazafName'], "text"),
                       GetSQLValueString($_POST['Total'], "text"),
                       GetSQLValueString($_POST['khasm'], "text"),
                       GetSQLValueString($_POST['Madfoaa'], "text"),
                       GetSQLValueString($_POST['Bakey'], "text"),
                       GetSQLValueString($_POST['Notes'], "text"),
                       GetSQLValueString($_POST['tarekh'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "contract_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM contract WHERE id = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset2 = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM contract WHERE id = %s ORDER BY id ASC", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElodw = "SELECT * FROM members";
$RSElodw = mysqli_query($connection,$query_RSElodw) or die(mysqli_error($connection));
$row_RSElodw = mysqli_fetch_assoc($RSElodw);
$totalRows_RSElodw = mysqli_num_rows($RSElodw);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center"><h2><strong>عقود الأعضاء</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><table width="90%" border="1" align="center" dir="rtl">
      <tr>
        <td align="center" bgcolor="#D9FFFF"><strong>رقم العقد</strong></td>
        <td align="center" bgcolor="#D9FFFF"><strong>الوحدة الحزبية</strong></td>
        <td align="center" bgcolor="#D9FFFF"><strong>القسم</strong></td>
        <td align="center" bgcolor="#D9FFFF"><strong>الباقة</strong></td>
        <td align="center" bgcolor="#D9FFFF"><strong>المدرب</strong></td>
        <td align="center" bgcolor="#D9FFFF"><strong>العضو</strong></td>
      </tr>
      <?php do { ?>
      <tr align="center">
        <td><?php echo $row_Recordset2['id']; ?></td>
        <td><?php echo $row_Recordset2['ElFara']; ?></td>
        <td><?php echo $row_Recordset2['ElKesm']; ?></td>
        <td><?php echo $row_Recordset2['Elbaka']; ?></td>
        <td><?php echo $row_Recordset2['Elmodareb']; ?></td>
        <td><select name="Elodw2" size="1">
          <?php
do {  
?>
          <option value="<?php echo $row_RSElodw['id']?>"<?php if (!(strcmp($row_RSElodw['id'], $row_Recordset2['Elodw']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RSElodw['aname']?></option>
          <?php
} while ($row_RSElodw = mysqli_fetch_assoc($RSElodw));
  $rows = mysqli_num_rows($RSElodw);
  if($rows > 0) {
      mysql_data_seek($RSElodw, 0);
	  $row_RSElodw = mysqli_fetch_assoc($RSElodw);
  }
?>
        </select></td>
      </tr>
      <?php } while ($row_RSContract = mysqli_fetch_assoc($RSContract)); ?>
    </table></td>
  </tr>
  <tr>
    <td><form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <table align="center" dir="rtl">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">المبلغ الاجمالي:</td>
          <td><input type="text" id="txt1" name="Total" value="<?php echo htmlentities($row_Recordset1['Total'], ENT_COMPAT, 'utf-8'); ?>" size="32" onkeyup="sum();"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">الخصم:</td>
          <td><input type="text" id="txt2" name="khasm" value="<?php echo htmlentities($row_Recordset1['khasm'], ENT_COMPAT, 'utf-8'); ?>" size="32" onkeyup="sum();"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">المبلغ المدفوع:</td>
          <td><input type="text" id="txt3" name="Madfoaa" value="<?php echo htmlentities($row_Recordset1['Madfoaa'], ENT_COMPAT, 'utf-8'); ?>" size="32" onkeyup="sum();"/></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">المبلغ المتبقى:</td>
          <td><input type="text" id="txt4" name="Bakey" value="<?php echo htmlentities($row_Recordset1['Bakey'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="submit" value="تعديل" /></td>
        </tr>
      </table>
      <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
      <input type="hidden" name="ElFara" value="<?php echo htmlentities($row_Recordset1['ElFara'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="ElKesm" value="<?php echo htmlentities($row_Recordset1['ElKesm'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="Elbaka" value="<?php echo htmlentities($row_Recordset1['Elbaka'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="elbakatitle" value="<?php echo htmlentities($row_Recordset1['elbakatitle'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="tamrinatedafia" value="<?php echo htmlentities($row_Recordset1['tamrinatedafia'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="Elmodareb" value="<?php echo htmlentities($row_Recordset1['Elmodareb'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="ElmodarebName" value="<?php echo htmlentities($row_Recordset1['ElmodarebName'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="Elodw" value="<?php echo htmlentities($row_Recordset1['Elodw'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="TafeelDate" value="<?php echo htmlentities($row_Recordset1['TafeelDate'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="MowazafName" value="<?php echo htmlentities($row_Recordset1['MowazafName'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="Notes" value="<?php echo htmlentities($row_Recordset1['Notes'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="tarekh" value="<?php echo htmlentities($row_Recordset1['tarekh'], ENT_COMPAT, 'utf-8'); ?>" />
      <input type="hidden" name="MM_update" value="form1" />
      <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
    </form></td>
  </tr>
</table>
<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var txtThirdNumberValue = document.getElementById('txt3').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue) - parseInt(txtThirdNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt4').value = result;
            }
        }
</script>

<script>
function sum2() {
            var kemaFirstNumberValue = document.getElementById('kema1').value;
            var kemaSecondNumberValue = document.getElementById('kema2').value;
            var result = parseInt(kemaFirstNumberValue) + parseInt(kemaSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('kema4').value = result;
            }
        }
</script>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($RSElodw);
?>
