<?php 
//***************
//  Ajax DataGrid
//***************
require_once('dwzGrid/AjaxDataGrid.php'); 
?><?php require_once('connections/connection.php'); ?>
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

$colname_Recordset1 = "-1";
if (isset($_GET['tarekh'])) {
  $colname_Recordset1 = $_GET['tarekh'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM contract WHERE tarekh LIKE %s ORDER BY id DESC", GetSQLValueString("%" . $colname_Recordset1 . "%", "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<?php
//******************************
// http://www.DwZone-it.com
// Ajax DataGrid
// Version 1.4.32
//******************************
$dwzGrid_1 = new dwzAjaxDataGrid();
$dwzGrid_1->Init();
$dwzGrid_1->SetInstance("1");
$dwzGrid_1->SetRootPath("");
$dwzGrid_1->SetCnString("None");
$dwzGrid_1->SetEditPar("void|_@_|void|_@_||_@_|id|_@_|ALL|_@_|false");
$dwzGrid_1->Add("ElFara", "الوحدة الحزبية", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("ElKesm", "القسم", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("Elbaka", "الباقة", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("elbakatitle", "عنوان الباقة", "150", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("Elmodareb", "المدرب", "150", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("tamrinatedafia", "التمرينات", "50", "Number (0 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("Elodw", "العضو", "150", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("MowazafName", "المسئول", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("tarekh", "التاريخ", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("Total", "الاجمالي", "50", "Number (2 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("khasm", "الخصم", "50", "Number (2 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("Madfoaa", "المدفوع", "50", "Number (2 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("Bakey", "الباقي", "50", "Number (2 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("Notes", "ملاحظات", "150", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->AddDetailPar("");
$dwzGrid_1->AddDetailFields("");
$dwzGrid_1->SaveDelete();
$dwzGrid_1->SetRecordset($Recordset1);
$dwzGrid_1->SetDetailRecordset("NULL");
$dwzGrid_1->SetMainPar("1500|_@_||_@_|redmond|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|false|_@_|true|_@_|false|_@_|false|_@_|false|_@_|true|_@_|true|_@_|true|_@_|40|_@_|10,15,20,25,40|_@_|العقود|_@_|Form|_@_|ar|_@_|utf-8;65001;Unicode (UTF-8)|_@_|like|_@_|date|_@_||_@_|true|_@_|Required|_@_|Max length must be {1}|_@_|Text format|_@_|Date format|_@_|Min value must be {1}|_@_|Max value must be {1}|_@_|Not the first item|_@_|false|_@_||_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|,|_@_|No|_@_|false|_@_|root|_@_|row|_@_|Nodes|_@_|false|_@_|None;12;#000000;false;false;false;#FFFFFF|_@_|None;12;#000000;false;false;false;#FFFFFF;0;#000000;0,3|_@_|A4;L;25;25;25;25;false;Center;1|_@_|No|_@_||_@_||_@_||_@_|#000000|_@_|0.6|_@_|10|_@_|350|_@_|_s|_@_|false|_@_|None|_@_|<b>{0} - {1} Item(s)</b>|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|ASC|_@_|false|_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|true|_@_|true|_@_|false|_@_|0|_@_|false|_@_|false|_@_||_@_|true");
$dwzGrid_1->CreateData();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
//******************************
// Ajax DataGrid
//******************************
echo dwzGridGetHeadCode("", "redmond", "ar");
//******************************
// Ajax DataGrid
//******************************
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>التقارير</title><?php
//******************************
// Ajax DataGrid
//******************************
$dwzGrid_1->GetHeadCode();
//******************************
// Ajax DataGrid
//******************************
?>
<style type="text/css">
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
</head>

<body>

<table width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center"><table width="100%" align="center" cellpadding="6" cellspacing="6">
      <tr>
        <td width="25%" align="center" bgcolor="#afd4f1"><strong><a href="contract5.php">إيرادات فترة محددة</a></strong></td>
        <td width="25%" align="center" bgcolor="#AFD4F1"><a href="contract4.php"><strong>إيرادات عام</strong></a></td>
        <td width="25%" align="center" bgcolor="#82B3D8"><strong><a href="contract2.php">إيرادات شهر</a></strong></td>
        <td width="25%" align="center" bgcolor="#afd4f1"><a href="contract3.php"><strong>إيرادات يوم</strong></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><h1>ايرادات شهر </h1></td>
  </tr>
  <tr>
    <td><form method="get">
      <table dir="rtl" border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td>شهر:</td>
          <td align="center"><label for="tarekh"></label>
            <select name="tarekh" id="tarekh">
              <option value="<?php $year = date("Y"); echo $year;  ?>-01-">يناير</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-02-">فبراير</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-03-">مارس</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-04-">ابريل</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-05-">مايو</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-06-">يونيو</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-07-">يوليو</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-08-">اغسطس</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-09-">سبتمبر</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-10-">اكتوبر</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-11-">توفمبر</option>
              <option value="<?php $year = date("Y"); echo $year;  ?>-12-">ديسمبر</option>
            </select></td>
          <td height="50"><input type="submit" value="بحث" name="submit" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<?php
//******************************
// Ajax DataGrid
//******************************
$dwzGrid_1->CreateGrid();
//******************************
// Ajax DataGrid
//******************************
?>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
