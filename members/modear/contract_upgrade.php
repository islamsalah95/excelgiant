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
$query_Recordset1 = sprintf("SELECT * FROM contract WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElmodareb = "SELECT * FROM trainers";
$RSElmodareb = mysqli_query($connection,$query_RSElmodareb) or die(mysqli_error($connection));
$row_RSElmodareb = mysqli_fetch_assoc($RSElmodareb);
$totalRows_RSElmodareb = mysqli_num_rows($RSElmodareb);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = "SELECT * FROM towns";
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = "SELECT * FROM banks";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset4 = "SELECT * FROM university";
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$colname_Recordset5 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset5 = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset5 = sprintf("SELECT * FROM contract WHERE id = %s", GetSQLValueString($colname_Recordset5, "int"));
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

<table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center"><h2><strong>ترقية عقود الأعضاء</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
        <table align="center" dir="rtl">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الوحدة الحزبية:</td>
            <td><select name="ElFara" id="ElFara">
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset2['name']?>"<?php if (!(strcmp($row_Recordset2['name'], $row_Recordset1['ElFara']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset2['name']?></option>
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
            <td nowrap="nowrap" align="right">العمل العام:</td>
            <td><select name="ElKesm" id="ElKesm">
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset3['name']?>"<?php if (!(strcmp($row_Recordset3['name'], $row_Recordset1['ElKesm']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset3['name']?></option>
              <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">رقم الباقة:</td>
            <td><select name="Elbaka" id="Elbaka" style="width: 300px";>
              <option value="" <?php if (!(strcmp("", $row_Recordset1['Elbaka']))) {echo "selected=\"selected\"";} ?>></option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset4['id']?>-<?php echo $row_Recordset5['tarekh']?>"<?php if (!(strcmp($row_Recordset4['id'], $row_Recordset1['Elbaka']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset4['name']?></option>
              <?php
} while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysql_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">عنوان الباقة:</td>
            <td><select name="elbakatitle" id="elbakatitle" style="width: 300px"; >
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset4['name']?>"<?php if (!(strcmp($row_Recordset4['name'], $row_Recordset1['elbakatitle']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset4['name']?></option>
              <?php
} while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysql_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">عدد التمرينات :</td>
            <td><input type="text" name="tamrinatedafia" value="<?php echo htmlentities($row_Recordset1['tamrinatedafia'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المدرب:</td>
            <td><select name="Elmodareb" id="Elmodareb" style="width: 200px";>
              <?php
do {  
?>
              <option value="<?php echo $row_RSElmodareb['username']?>"<?php if (!(strcmp($row_RSElmodareb['username'], $row_Recordset1['Elmodareb']))) {echo "selected=\"selected\"";} ?>><?php echo $row_RSElmodareb['username']?></option>
              <?php
} while ($row_RSElmodareb = mysqli_fetch_assoc($RSElmodareb));
  $rows = mysqli_num_rows($RSElmodareb);
  if($rows > 0) {
      mysql_data_seek($RSElmodareb, 0);
	  $row_RSElmodareb = mysqli_fetch_assoc($RSElmodareb);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">رقم العضو:</td>
            <td><input type="text" name="Elodw" value="<?php echo htmlentities($row_Recordset1['Elodw'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الاجمالي:</td>
            <td><input type="text" name="Total" value="<?php echo htmlentities($row_Recordset1['Total'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الخصم:</td>
            <td><input type="text" name="khasm" value="<?php echo htmlentities($row_Recordset1['khasm'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المدفوع:</td>
            <td><input type="text" name="Madfoaa" value="<?php echo htmlentities($row_Recordset1['Madfoaa'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الباقي:</td>
            <td><input type="text" name="Bakey" value="<?php echo htmlentities($row_Recordset1['Bakey'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">ملاحظات:</td>
            <td><textarea name="Notes" cols="32" rows="5"><?php echo htmlentities($row_Recordset1['Notes'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right"><input name="tarekh" type="hidden" value="<?php echo htmlentities($row_Recordset1['tarekh'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
              <input type="hidden" name="MowazafName" value="<?php echo htmlentities($row_Recordset1['MowazafName'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
            <input type="hidden" name="TafeelDate" value="<?php echo htmlentities($row_Recordset1['TafeelDate'], ENT_COMPAT, 'utf-8'); ?>" size="32" />              <input type="hidden" name="ElmodarebName" value="<?php echo htmlentities($row_Recordset1['ElmodarebName'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
            <td><input type="submit" value="تعديل" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($RSElmodareb);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);
?>
