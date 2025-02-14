<?php require_once('../connections/connection.php'); ?>
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
$query_Recordset1 = "SELECT * FROM message ORDER BY id DESC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['userId'])) {
  $colname_Recordset2 = $_GET['userId'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM orders WHERE userId = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['email'])) {
  $colname_Recordset3 = $_GET['email'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = sprintf("SELECT * FROM agents WHERE email = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset4 = "SELECT * FROM agents";
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset5 = "SELECT * FROM products";
$Recordset5 = mysqli_query($connection,$query_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WASET الوسيط - متجر الوكلاء</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #333;
}
body,td,th {
	color: #FFF;
}
select {
  -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: '';
}
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body text="#FFFFFF" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="00" dir="rtl">
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
    <td height="50" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="00" dir="rtl">
      <tr>
        <td height="40" align="center"><strong>طلبات سحب البونص</strong></td>
      </tr>
      <tr>
        <td><form id="form1" name="form1" method="get" action="">
          <table border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
              <td><label for="userId"></label>
                <select name="userId" id="userId">
                  <?php
do {  
?>
                  <option value="<?php echo $row_Recordset3['id']?>"><?php echo $row_Recordset3['email']?></option>
                  <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
                </select></td>
              <td><input type="submit" name="button" id="button" value="عرض" /></td>
            </tr>
          </table>
          
        </form></td>
      </tr>
      <tr>
        <td><?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>
        <form id="form2" name="form1" method="post" action="">
  <table class="table table-striped" width="90%" border="0" align="center" cellpadding="2" cellspacing="2">
    <tr align="center" bgcolor="#000000">
      <th><strong>#</strong></th>
      <th><strong>رقم الوكيل</strong></th>
      <th><strong>اسم الوكيل</strong></th>
      <th><strong>البريد الالكتروني</strong></th>
      <th><strong>رقم المنتج</strong></th>
      <th>اسم المنتج</th>
      <th>سعر المنتج</th>
      <th>البونص</th>
      <th><strong>الكمية</strong></th>
      <th><strong>تاريخ الطلب</strong></th>
      <th><strong>طريقة الدفع</strong></th>
      <th><strong>حالة الطلب</strong></th>
    </tr>
    <?php do { ?>
      <tr align="center">
        <td><?php echo $row_Recordset2['id']; ?></td>
        <td><?php echo $row_Recordset2['userId']; ?></td>
        <td><label for="select"></label>
          <select name="select" id="select" >
            <?php
do {  
?>
            <option value="<?php echo $row_Recordset4['id']?>"<?php if (!(strcmp($row_Recordset4['id'], $row_Recordset2['userId']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset4['name']?></option>
            <?php
} while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysql_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
  }
?>
          </select></td>
        <td><select name="select2" id="select2" >
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset4['id']?>"<?php if (!(strcmp($row_Recordset4['id'], $row_Recordset2['userId']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset4['email']?></option>
          <?php
} while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysql_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
  }
?>
        </select></td>
        <td><?php echo $row_Recordset2['productId']; ?></td>
        <td><select name="select3" id="select3" >
          <?php
do {  
?>
         <option value="<?php echo $row_Recordset5['id']?>"<?php if (!(strcmp($row_Recordset5['id'], $row_Recordset2['productId']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset5['productName']?></option>
          <?php
} while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
  $rows = mysqli_num_rows($Recordset5);
  if($rows > 0) {
      mysql_data_seek($Recordset5, 0);
	  $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
  }
?>
        </select></td>
        <td><select class="select" name="select5" id="select5" >
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset5['id']?>"<?php if (!(strcmp($row_Recordset5['id'], $row_Recordset2['productId']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset5['productPrice']?></option>
          <?php
} while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
  $rows = mysqli_num_rows($Recordset5);
  if($rows > 0) {
      mysql_data_seek($Recordset5, 0);
	  $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
  }
?>
        </select></td>
        <td class="precio"><select name="select4" id="select4" >
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset5['id']?>"<?php if (!(strcmp($row_Recordset5['id'], $row_Recordset2['productId']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset5['productPriceBeforeDiscount']?></option>
          <?php
} while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
  $rows = mysqli_num_rows($Recordset5);
  if($rows > 0) {
      mysql_data_seek($Recordset5, 0);
	  $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
  }
?>

        </select></td>
        <td><?php echo $row_Recordset2['quantity']; ?></td>
        <td><?php echo $row_Recordset2['orderDate']; ?></td>
        <td><?php echo $row_Recordset2['paymentMethod']; ?></td>
        <td><?php echo $row_Recordset2['orderStatus']; ?></td>
      </tr>
      <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); ?>
  </table>
        </form>
  <?php } // Show if recordset not empty ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" valign="top">&nbsp;</td>
  </tr>
</table>
<br>
<script>
$(document).ready(function() {

  $('.table').each(function() {
    var sum = 0
    $(this).find('tr').each(function() {



      $(this).find('.precio').each(function() {
        var precio = $(this).text();
        if (!isNaN(precio) && precio.length !== 0) {
          sum += parseFloat(precio);
        }
      });

      $('.total_prt', this).html(sum);
    });
  })

});
</script>
 

</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);
?>
