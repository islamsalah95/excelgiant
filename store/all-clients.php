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
$query_Recordset1 = "SELECT * FROM orders";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = "SELECT * FROM products";
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
$dwzGrid_1->Add("userId", "الوكيل", "100", "String", "Left", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|userId|_@_|None|_@_|", Null);
$dwzGrid_1->Add("productId", "المنتج", "100", "String", "Left", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("quantity", "الكمية", "100", "String", "Left", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->Add("orderDate", "تاريخ الطلب", "100", "Date YYYY.MM.DD", "Left", "Y", "Y", "N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|rec_placeholder|_@_|Y|_@_|None|_@_|None|_@_|", Null);
$dwzGrid_1->AddDetailPar("400|_@_|250|_@_|15|_@_|10,15,20,25,40|_@_|المنتج|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|false|_@_|false|_@_|false|_@_||_@_|connection|_@_|products|_@_|id|_@_|productId|_@_|id|_@_|undefined|_@_|true|_@_|120|_@_|500|_@_|1200|_@_|500");
$dwzGrid_1->AddDetailFields("productName|_@_|اسم المنتج|_@_|String|_@_|200|_@_|Left|_@_|Y|_@_|Y|_@_|N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|Void|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|Null|_@_|Y|_@_|None|_@_|None|_@_|_@@@@@_productPrice|_@_|السعر|_@_|Number (2 decimal)|_@_|200|_@_|Left|_@_|Y|_@_|Y|_@_|N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|Null|_@_|Y|_@_|None|_@_|None|_@_|_@@@@@_productPriceBeforeDiscount|_@_|البونص|_@_|Number (0 decimal)|_@_|100|_@_|Left|_@_|Y|_@_|Y|_@_|N|_@_|Y|_@_|50|_@_|3|_@_|TextBox|_@_||_@_||_@_||_@_||_@_||_@_||_@_|ColumnSum|_@_||_@_|false|_@_||_@_||_@_||_@_||_@_||_@_||_@_|20|_@_|12|_@_||_@_||_@_|None|_@_|Null|_@_|Y|_@_|None|_@_|None|_@_|");
$dwzGrid_1->SaveDelete();
$dwzGrid_1->SetRecordset($Recordset1);
$dwzGrid_1->SetDetailRecordset("Recordset2");
$dwzGrid_1->SetMainPar("400|_@_|250|_@_|Bootstrap|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|false|_@_|false|_@_|false|_@_|true|_@_|true|_@_|true|_@_|15|_@_|10,15,20,25,40|_@_|تقرير عن وكيل|_@_|Form|_@_|ar|_@_|utf-8;65001;Unicode (UTF-8)|_@_|like|_@_|date|_@_||_@_|true|_@_|Required|_@_|Max length must be {1}|_@_|Text format|_@_|Date format|_@_|Min value must be {1}|_@_|Max value must be {1}|_@_|Not the first item|_@_|true|_@_||_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|,|_@_|No|_@_|false|_@_|root|_@_|row|_@_|Nodes|_@_|false|_@_|None;12;#000000;false;false;false;#FFFFFF|_@_|None;12;#000000;false;false;false;#FFFFFF;0;#000000;0,3|_@_|A4;L;25;25;25;25;false;Center;1|_@_|No|_@_||_@_||_@_||_@_|#000000|_@_|0.6|_@_|10|_@_|350|_@_|_s|_@_|false|_@_|None|_@_|<b>{0} - {1} Item(s)</b>|_@_|false|_@_|false|_@_|false|_@_|false|_@_|false|_@_|ASC|_@_|false|_@_|true|_@_|1200|_@_|500|_@_|1200|_@_|500|_@_||_@_||_@_|true|_@_|true|_@_|true|_@_|0|_@_|false|_@_|true|_@_|productId|1|المنتج|_@_|true");
$dwzGrid_1->CreateData();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
//******************************
// Ajax DataGrid
//******************************
echo dwzGridGetHeadCode("", "Bootstrap", "ar");
//******************************
// Ajax DataGrid
//******************************
?><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><?php
//******************************
// Ajax DataGrid
//******************************
$dwzGrid_1->GetHeadCode();
//******************************
// Ajax DataGrid
//******************************
?>
<style type="text/css">
body,td,th {
	color: #FFF;
}
body {
	background-color: #333;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td height="40" bgcolor="#EAEAEA">&nbsp;</td>
  </tr>
  <tr>
    <td height="150" align="center" valign="middle"><a href="send.php"><img src="finallogo.png" alt="" width="200" border="0" /></a></td>
  </tr>
  <tr>
    <td height="50" valign="bottom" bgcolor="#67c3fe">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><table width="200" border="0" align="left" cellpadding="2" cellspacing="2" dir="rtl">
      <tr>
        <td>&nbsp;</td>
        <td><a href="reports.php"><img src="reports.png" alt="" height="100" border="0" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><h1 align="center"><strong>تقرير عن عمليات كافة العملاء </strong></h1></td>
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
?>
</td>
  </tr>
</table>


</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>
