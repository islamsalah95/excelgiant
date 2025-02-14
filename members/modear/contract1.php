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
if (isset($_GET['Elodw'])) {
  $colname_Recordset1 = $_GET['Elodw'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM contract WHERE Elodw = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset2 = $_GET['Elodw'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM members WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset3 = $_GET['Elodw'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = sprintf("SELECT * FROM attend WHERE MemberId = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_GET['Elodw'])) {
  $colname_Recordset4 = $_GET['Elodw'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset4 = sprintf("SELECT * FROM contract WHERE Elodw = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);
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
$dwzGrid_1->Add("tamrinatedafia", "التمرينات", "50", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
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
?><?php
//******************************
// http://www.DwZone-it.com
// Ajax DataGrid
// Version 1.4.32
//******************************
$dwzGrid_2 = new dwzAjaxDataGrid();
$dwzGrid_2->Init();
$dwzGrid_2->SetInstance("2");
$dwzGrid_2->SetRootPath("");
$dwzGrid_2->SetCnString("None");
$dwzGrid_2->SetEditPar("void|_@_|void|_@_||_@_|id|_@_|ALL|_@_|false");
$dwzGrid_2->Add("Faraa", "الوحدة الحزبية", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("Section", "القسم", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("Baka", "الباقة", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("classat", "الكلاسات", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("Trainer", "المدرب", "150", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("curenttamrina", "التمرينة الحالية", "100", "Number (0 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("CurrentTamrina", "اجمالي التمرينات", "100", "Number (0 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("MemberName", "اسم العضو", "150", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("MemberId", "رقم العضو", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("Tarekh", "تاريخ التفعيل", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("ExpierDate", "تاريخ الانتهاء", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->Add("Notes", "ملاحظات", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_2->AddDetailPar("");
$dwzGrid_2->AddDetailFields("");
$dwzGrid_2->SaveDelete();
$dwzGrid_2->SetRecordset($Recordset3);
$dwzGrid_2->SetDetailRecordset("NULL");
$dwzGrid_2->SetMainPar("1200|_@_||_@_|redmond|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|false|_@_|true|_@_|false|_@_|false|_@_|false|_@_|true|_@_|true|_@_|true|_@_|40|_@_|10,15,20,25,40|_@_|الحضور|_@_|Form|_@_|ar|_@_|utf-8;65001;Unicode (UTF-8)|_@_|like|_@_|date|_@_||_@_|true|_@_|Required|_@_|Max length must be {1}|_@_|Text format|_@_|Date format|_@_|Min value must be {1}|_@_|Max value must be {1}|_@_|Not the first item|_@_|false|_@_||_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|,|_@_|No|_@_|false|_@_|root|_@_|row|_@_|Nodes|_@_|false|_@_|None;12;#000000;false;false;false;#FFFFFF|_@_|None;12;#000000;false;false;false;#FFFFFF;0;#000000;0,3|_@_|A4;L;25;25;25;25;false;Center;1|_@_|No|_@_||_@_||_@_||_@_|#000000|_@_|0.6|_@_|10|_@_|350|_@_|_s|_@_|false|_@_|None|_@_|<b>{0} - {1} Item(s)</b>|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|ASC|_@_|false|_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|true|_@_|true|_@_|false|_@_|0|_@_|false|_@_|false|_@_||_@_|true");
$dwzGrid_2->CreateData();
?><?php
//******************************
// http://www.DwZone-it.com
// Ajax DataGrid
// Version 1.4.32
//******************************
$dwzGrid_3 = new dwzAjaxDataGrid();
$dwzGrid_3->Init();
$dwzGrid_3->SetInstance("3");
$dwzGrid_3->SetRootPath("");
$dwzGrid_3->SetCnString("None");
$dwzGrid_3->SetEditPar("void|_@_|void|_@_||_@_|id|_@_|ALL|_@_|false");
$dwzGrid_3->Add("ElFara", "الوحدة الحزبية", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("ElKesm", "القسم", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("Elbaka", "الباقة", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("elbakatitle", "اسم الباقة", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("tamrinatedafia", "التمرينات", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("Elmodareb", "المدرب", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("Elodw", "العضو", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("MowazafName", "الموظف المسئول", "150", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("Total", "الاجمالي", "100", "Number (2 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("khasm", "الخصم", "100", "Number (2 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("Madfoaa", "المدفووع", "100", "Number (2 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("Bakey", "الباقي", "150", "Number (2 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->Add("tarekh", "تاريخ التعاقد", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_3->AddDetailPar("");
$dwzGrid_3->AddDetailFields("");
$dwzGrid_3->SaveDelete();
$dwzGrid_3->SetRecordset($Recordset4);
$dwzGrid_3->SetDetailRecordset("NULL");
$dwzGrid_3->SetMainPar("1200|_@_||_@_|redmond|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|false|_@_|true|_@_|false|_@_|false|_@_|false|_@_|true|_@_|true|_@_|true|_@_|40|_@_|10,15,20,25,40|_@_|العقود|_@_|Form|_@_|ar|_@_|utf-8;65001;Unicode (UTF-8)|_@_|like|_@_|date|_@_||_@_|true|_@_|Required|_@_|Max length must be {1}|_@_|Text format|_@_|Date format|_@_|Min value must be {1}|_@_|Max value must be {1}|_@_|Not the first item|_@_|false|_@_||_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|,|_@_|No|_@_|false|_@_|root|_@_|row|_@_|Nodes|_@_|false|_@_|None;12;#000000;false;false;false;#FFFFFF|_@_|None;12;#000000;false;false;false;#FFFFFF;0;#000000;0,3|_@_|A4;L;25;25;25;25;false;Center;1|_@_|No|_@_||_@_||_@_||_@_|#000000|_@_|0.6|_@_|10|_@_|350|_@_|_s|_@_|false|_@_|None|_@_|<b>{0} - {1} Item(s)</b>|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|ASC|_@_|false|_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|true|_@_|true|_@_|false|_@_|0|_@_|false|_@_|false|_@_||_@_|true");
$dwzGrid_3->CreateData();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style> 
input[type=text] {
  width: 100%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('../searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
</style>
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
?><?php
//******************************
// Ajax DataGrid
//******************************
$dwzGrid_2->GetHeadCode();
//******************************
// Ajax DataGrid
//******************************
?><?php
//******************************
// Ajax DataGrid
//******************************
$dwzGrid_3->GetHeadCode();
//******************************
// Ajax DataGrid
//******************************
?>
</head>

<body>

<table dir="rtl" width="100%" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center"><h1>تقرير بيانات عضو</h1></td>
  </tr>
  <tr>
    <td align="center"><form id="form1" name="form1" method="get" action="">
      <table dir="rtl" cellspacing="2" cellpadding="2">
        <tr>
          <td align="right"><input type="text" name="Elodw" id="Elodw" placeholder="رقم العضو"/></td>
          <td><label for="Elodw"></label>
            <input class="button button2" type="submit" name="button" id="button" value="عرض" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td align="center">&nbsp;
      <table border="1" cellpadding="2" cellspacing="2">
        <tr align="center" bgcolor="#5c9ccc">
          <th width="100" bgcolor="#5c9ccc"><strong>نوع العضوية</strong></th>
          <th width="200"><strong>الاسم</strong></th>
          <th width="100"><strong>تاريخ الميلاد</strong></th>
          <th><strong>الرقم القومي</strong></th>
          <th><strong>العنوان</strong></th>
          <th><strong>الصفة</strong></th>
          <th><strong>البريد الالكتروني</strong></th>
          <th><strong>تليفون</strong></th>
          <th><strong>موبايل</strong></th>
        </tr>
        <?php do { ?>
          <tr align="center">
            <td><?php echo $row_Recordset2['member_type']; ?></td>
            <td><?php echo $row_Recordset2['aname']; ?></td>
            <td><?php echo $row_Recordset2['grad_date']; ?></td>
            <td><?php echo $row_Recordset2['id_card']; ?></td>
            <td><?php echo $row_Recordset2['address']; ?></td>
            <td><?php echo $row_Recordset2['work_place']; ?></td>
            <td><?php echo $row_Recordset2['mail']; ?></td>
            <td><?php echo $row_Recordset2['phone']; ?></td>
            <td><?php echo $row_Recordset2['mobile']; ?></td>
          </tr>
          <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); ?>
    </table></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><?php
//******************************
// Ajax DataGrid
//******************************
$dwzGrid_1->CreateGrid();
//******************************
// Ajax DataGrid
//******************************
?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;<?php
//******************************
// Ajax DataGrid
//******************************
$dwzGrid_3->CreateGrid();
//******************************
// Ajax DataGrid
//******************************
?></td>
  </tr>
  <tr>
    <td align="center"><?php
//******************************
// Ajax DataGrid
//******************************
$dwzGrid_2->CreateGrid();
//******************************
// Ajax DataGrid
//******************************
?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);
?>
