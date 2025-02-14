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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE fani SET ServicesID=%s, ServicesTitle=%s, ServicesPrice=%s, ServicesText=%s, OrderDate=%s, OrderName=%s, OrderPhone=%s, OrderAddress=%s, OrderTown=%s, OrderArea=%s, OrderDetails=%s, image=%s, grad_img=%s, per_img=%s, OrderFDate=%s, OrderSDate=%s, OrderStatus=%s, FaniName=%s, FaniPhone=%s, FaniID=%s, FaniTakiim=%s, OrderNo=%s WHERE id=%s",
                       GetSQLValueString($_POST['ServicesID'], "text"),
                       GetSQLValueString($_POST['ServicesTitle'], "text"),
                       GetSQLValueString($_POST['ServicesPrice'], "text"),
                       GetSQLValueString($_POST['ServicesText'], "text"),
                       GetSQLValueString($_POST['OrderDate'], "text"),
                       GetSQLValueString($_POST['OrderName'], "text"),
                       GetSQLValueString($_POST['OrderPhone'], "text"),
                       GetSQLValueString($_POST['OrderAddress'], "text"),
                       GetSQLValueString($_POST['OrderTown'], "text"),
                       GetSQLValueString($_POST['OrderArea'], "text"),
                       GetSQLValueString($_POST['OrderDetails'], "text"),
                       GetSQLValueString($_POST['image1'], "text"),
                       GetSQLValueString($_POST['grad_img1'], "text"),
                       GetSQLValueString($_POST['per_img1'], "text"),
                       GetSQLValueString($_POST['OrderFDate'], "text"),
                       GetSQLValueString($_POST['OrderSDate'], "text"),
                       GetSQLValueString($_POST['OrderStatus'], "text"),
                       GetSQLValueString($_POST['FaniName'], "text"),
                       GetSQLValueString($_POST['FaniPhone'], "text"),
                       GetSQLValueString($_POST['FaniID'], "text"),
                       GetSQLValueString($_POST['FaniTakiim'], "text"),
                       GetSQLValueString($_POST['OrderNo'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "faniin.php";
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
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM fani WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة التحكم</title>
<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../img/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
    <?php
   if(isset($_FILES['per_img'])){
      $errors= array();
      $file_name = $_FILES['per_img']['name'];
      $file_size = $_FILES['per_img']['size'];
      $file_tmp = $_FILES['per_img']['tmp_name'];
      $file_type = $_FILES['per_img']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['per_img']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../img/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
    <?php
   if(isset($_FILES['grad_img'])){
      $errors= array();
      $file_name = $_FILES['grad_img']['name'];
      $file_size = $_FILES['grad_img']['size'];
      $file_tmp = $_FILES['grad_img']['tmp_name'];
      $file_type = $_FILES['grad_img']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['grad_img']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../img/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include 'header.php'; ?>
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table align="center" dir="rtl">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">الاسم:</td>
      <td><input type="text" name="OrderName" value="<?php echo htmlentities($row_Recordset1['OrderName'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم التسجيل:</td>
      <td><input type="text" name="OrderPhone" value="<?php echo htmlentities($row_Recordset1['OrderPhone'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">فترة التدريب:</td>
      <td><input type="text" name="OrderAddress" value="<?php echo htmlentities($row_Recordset1['OrderAddress'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap">عدد الساعات:</td>
      <td><input name="OrderTown" type="text" id="OrderTown" value="<?php echo htmlentities($row_Recordset1['OrderTown'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم البطاقة:</td>
      <td><input type="text" name="OrderDetails" value="<?php echo htmlentities($row_Recordset1['OrderDetails'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">صورة الشهادة:</td>
      <td><input name="image1" id="image1" value="<?php echo $row_Recordset1['image']; ?>" size="32" />
              <input type = "file" name="image" id="image" onchange="updateFileName1()" />
      <script>
                function updateFileName1() {
                    var image = document.getElementById('image');
                    var image1 = document.getElementById('image1');
                    var fileNameIndex = image.value.lastIndexOf("\\");
            
                    image1.value = image.value.substring(fileNameIndex + 1);
                }
            </script></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">صورة الشهادة:</td>
      <td>
        <input name="grad_img1" type="text" id="grad_img1" value="<?php echo $row_Recordset1['grad_img']; ?>" size="32" />
        <input type="file" name="grad_img" id="grad_img" onchange="updateFileName2()" />
        <script>

    function updateFileName2() {
        var grad_img = document.getElementById('grad_img');
        var grad_img1 = document.getElementById('grad_img1');
        var fileNameIndex = grad_img.value.lastIndexOf("\\");

        grad_img1.value = grad_img.value.substring(fileNameIndex + 1);
    }
            </script></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap">صورة شخصية:</td>
      <td>
        <input name="per_img1" type="text" id="per_img1" value="<?php echo $row_Recordset1['per_img']; ?>" size="32" />
        <input type = "file" name="per_img" id="per_img" onchange="updateFileName()" />
        <script>
                function updateFileName() {
                    var per_img = document.getElementById('per_img');
                    var per_img1 = document.getElementById('per_img1');
                    var fileNameIndex = per_img.value.lastIndexOf("\\");
            
                    per_img1.value = per_img.value.substring(fileNameIndex + 1);
                }
            </script></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">عنوان الكورس:</td>
      <td><input type="text" name="OrderSDate" value="<?php echo htmlentities($row_Recordset1['OrderSDate'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">التقدير:</td>
      <td><input name="OrderArea" type="text" id="OrderArea" value="<?php echo htmlentities($row_Recordset1['OrderArea'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">تقييم السلوك:</td>
      <td><input name="OrderStatus" type="text" id="OrderStatus" value="<?php echo htmlentities($row_Recordset1['OrderStatus'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="تعديل" /></td>
    </tr>
  </table>
  <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
  <input name="OrderDate" type="hidden" value="<?php echo date("Y-m-d"); ?>" size="32" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
