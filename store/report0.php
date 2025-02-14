<?php 
//***************
//  Ajax DataGrid
//***************
require_once('dwzGrid/AjaxDataGrid.php'); 
?><?php require_once('../connections/connection.php'); ?>
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
$query_Recordset1 = "SELECT * FROM orders ORDER BY id DESC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = "SELECT * FROM products ORDER BY id DESC";
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
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
$dwzGrid_1->Add("userId", "الوكيل", "100", "String", "Left", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("productId", "المنتج", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("quantity", "الكمية", "100", "Number (0 decimal)", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("orderDate", "التاريخ", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("paymentMethod", "طريقة السداد", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("orderStatus", "حالة الطلب", "100", "String", "Center", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->AddDetailPar("1200|_@_||_@_|40|_@_|10,15,20,25,40|_@_|تفاصيل|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|false|_@_|true|_@_|true|_@_|false|_@_|false|_@_|false|_@_||_@_|connection|_@_|products|_@_|id|_@_|productId|_@_|id|_@_|undefined|_@_|false|_@_||_@_||_@_||_@_|");
$dwzGrid_1->AddDetailFields("category|_@_|الفئة|_@_|String|_@_|100|_@_|Center|_@_|Y|_@_|Y|_@_|N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|Null|_@_|Y|_@_|None|_@_|None|_@_|_@@@@@_subCategory|_@_|الفئة الفرعية|_@_|String|_@_|100|_@_|Center|_@_|Y|_@_|Y|_@_|N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|Null|_@_|Y|_@_|None|_@_|None|_@_|_@@@@@_productName|_@_|القسم|_@_|String|_@_|150|_@_|Center|_@_|Y|_@_|Y|_@_|N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|Null|_@_|Y|_@_|None|_@_|None|_@_|_@@@@@_productCompany|_@_|الشركة المنتجة|_@_|String|_@_|100|_@_|Center|_@_|Y|_@_|Y|_@_|N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|Null|_@_|Y|_@_|None|_@_|None|_@_|_@@@@@_productPrice|_@_|السعر|_@_|Number (2 decimal)|_@_|100|_@_|Center|_@_|Y|_@_|Y|_@_|N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|Null|_@_|Y|_@_|None|_@_|None|_@_|_@@@@@_productPriceBeforeDiscount|_@_|البونص|_@_|Number (2 decimal)|_@_|100|_@_|Center|_@_|Y|_@_|Y|_@_|N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|true|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|Null|_@_|Y|_@_|None|_@_|None|_@_|");
$dwzGrid_1->SaveDelete();
$dwzGrid_1->SetRecordset($Recordset1);
$dwzGrid_1->SetDetailRecordset("Recordset2");
$dwzGrid_1->SetMainPar("1200|_@_||_@_|redmond|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|false|_@_|true|_@_|false|_@_|false|_@_|false|_@_|true|_@_|true|_@_|true|_@_|40|_@_|10,15,20,25,40|_@_|الأوردرات|_@_|Form|_@_|ar|_@_|utf-8;65001;Unicode (UTF-8)|_@_|like|_@_|date|_@_||_@_|true|_@_|Required|_@_|Max length must be {1}|_@_|Text format|_@_|Date format|_@_|Min value must be {1}|_@_|Max value must be {1}|_@_|Not the first item|_@_|false|_@_||_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|,|_@_|No|_@_|false|_@_|root|_@_|row|_@_|Nodes|_@_|false|_@_|None;12;#000000;false;false;false;#FFFFFF|_@_|None;12;#000000;false;false;false;#FFFFFF;0;#000000;0,3|_@_|A4;L;25;25;25;25;false;Center;1|_@_|No|_@_||_@_||_@_||_@_|#000000|_@_|0.6|_@_|10|_@_|350|_@_|_s|_@_|true|_@_|productId|_@_|<b>{0} - {1} Item(s)</b>|_@_|true|_@_|true|_@_|false|_@_|false|_@_|true|_@_|DESC|_@_|true|_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|true|_@_|true|_@_|false|_@_|0|_@_|true|_@_|true|_@_|productId|3|المنتج تجربة|_@_|true");
$dwzGrid_1->CreateData();
?><?php
//******************************
// http://www.DwZone-it.com
// Ajax TreeGrid
// Version 1.4.32
//******************************
$dwzTree_2 = new dwzAjaxDataGrid();
$dwzTree_2->Init();
$dwzTree_2->SetTreeGrid("true");
$dwzTree_2->SetInstance("2");
$dwzTree_2->Add("productId", "المنتج", "100", "String", "Center", "Y", "Y", "N|_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_||_@_|Y", Null);
$dwzTree_2->SetRootPath("");
$dwzTree_2->SetRecordset($Recordset1);
$dwzTree_2->SetUniqueColKey("id");
$dwzTree_2->SetParentColKey("productId");
$dwzTree_2->SetMainPar("400|_@_||_@_|redmond|_@_|false|_@_|true|_@_|false|_@_|true|_@_|true|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|0|_@_||_@_||_@_||_@_|en|_@_|utf-8;65001;Unicode (UTF-8)|_@_||_@_||_@_||_@_|true|_@_|ui-icon-circlesmall-plus|_@_|ui-icon-circlesmall-minus|_@_|ui-icon-document|_@_||_@_||_@_||_@_||_@_|false|_@_|");
$dwzTree_2->CreateData();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
//******************************
// Ajax DataGrid
//******************************
echo dwzGridGetHeadCode("", "redmond", "en");
//******************************
// Ajax DataGrid
//******************************
?><?php
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
// Ajax TreeGrid
//******************************
$dwzTree_2->GetHeadCode();
//******************************
// Ajax TreeGrid
//******************************
?>
</head>

<body>
<table dir="rtl" width="100%" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;<?php
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
    <td>&nbsp;<?php
//******************************
// Ajax TreeGrid
//******************************
$dwzTree_2->CreateGrid();
//******************************
// Ajax TreeGrid
//******************************
?></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>
