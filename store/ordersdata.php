<?php 
//******************************
// PhpAjax Bootstrap DataGrid
//******************************
require_once('dwzGrid/AjaxPhpBootGrid.php'); 
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
?><?php
//******************************
// http://www.DwZone-it.com
// PhpAjax Bootstrap DataGrid
// Version 1.4.32
//******************************
$dwzBootGrid_1 = new dwzPhpAjaxBootGrid();
$dwzBootGrid_1->Init();
$dwzBootGrid_1->SetInstance("1");
$dwzBootGrid_1->SetRootPath("");
$dwzBootGrid_1->AddField("userId", "الوكيل", "String", "200", "left", "left", "N", "N", "", "", "", "Y", "Y", "N", "", "", "N", "", "", "");
$dwzBootGrid_1->SetRecordset($Recordset1);
$dwzBootGrid_1->SetMainPar("table table-condensed table-bordered table-hover table-striped|_@_|true|_@_|10|_@_|-1,10,15,20,25,50|_@_|utf-8;65001;Unicode (UTF-8)|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_|true|_@_||_@_||_@_|true|_@_|true|_@_|true|_@_|0|_@_|1|_@_|2|_@_|3|_@_|4|_@_|All|_@_|Showing {{ctx.start}} to {{ctx.end}} of {{ctx.total}} entries|_@_|Loading...|_@_|No results found|_@_|Refresh|_@_|Search|_@_|true|_@_||_@_|true|_@_|left|_@_||_@_|");
$dwzBootGrid_1->CreateData();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title><?php
//******************************
// http://www.DwZone-it.com
// PhpAjax Bootstrap DataGrid
//******************************
$dwzBootGrid_1->GetHeadCode();
//******************************
// http://www.DwZone-it.com
// PhpAjax DataGrid
//******************************
?>
</head>

<body>
<?php
//******************************
// http://www.DwZone-it.com
// PhpAjax Bootstrap DataGrid
//******************************
$dwzBootGrid_1->CreateGrid();
//******************************
// http://www.DwZone-it.com
// PhpAjax DataGrid
//******************************
?></body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
