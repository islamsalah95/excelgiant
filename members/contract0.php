<?php 
//***************
//  Ajax DataGrid
//***************
require_once('dwzGrid/AjaxDataGrid.php'); 
?><?php require_once('connections/connection.php'); ?>
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

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = "SELECT * FROM contract ORDER BY id DESC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?><?php
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
$dwzGrid_1->SetMainPar("1500|_@_|600|_@_|redmond|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|false|_@_|true|_@_|false|_@_|false|_@_|false|_@_|true|_@_|true|_@_|true|_@_|40|_@_|10,15,20,25,40|_@_|العقود|_@_|Form|_@_|ar|_@_|utf-8;65001;Unicode (UTF-8)|_@_|like|_@_|date|_@_||_@_|true|_@_|Required|_@_|Max length must be {1}|_@_|Text format|_@_|Date format|_@_|Min value must be {1}|_@_|Max value must be {1}|_@_|Not the first item|_@_|false|_@_||_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|,|_@_|No|_@_|false|_@_|root|_@_|row|_@_|Nodes|_@_|false|_@_|None;12;#000000;false;false;false;#FFFFFF|_@_|None;12;#000000;false;false;false;#FFFFFF;0;#000000;0,3|_@_|A4;L;25;25;25;25;false;Center;1|_@_|No|_@_||_@_||_@_||_@_|#000000|_@_|0.6|_@_|10|_@_|350|_@_|_s|_@_|false|_@_|None|_@_|<b>{0} - {1} Item(s)</b>|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|ASC|_@_|false|_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|true|_@_|true|_@_|false|_@_|0|_@_|false|_@_|false|_@_||_@_|true");
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
</head>

<body>
<?php
//******************************
// Ajax DataGrid
//******************************
$dwzGrid_1->CreateGrid();
//******************************
// Ajax DataGrid
//******************************
?></body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
