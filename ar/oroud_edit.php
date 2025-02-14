<?php require_once('connections/connection.php'); ?>
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
  $updateSQL = sprintf("UPDATE oroudpro SET category=%s, subCategory=%s, productName=%s, productCompany=%s, productPrice=%s, productPriceBeforeDiscount=%s, productDescription=%s, image=%s, photo=%s, picture=%s, shippingCharge=%s, productAvailability=%s, postingDate=%s, updationDate=%s WHERE id=%s",
                       GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString($_POST['subCategory'], "int"),
                       GetSQLValueString($_POST['productName'], "text"),
                       GetSQLValueString($_POST['productCompany'], "text"),
                       GetSQLValueString($_POST['productPrice'], "int"),
                       GetSQLValueString($_POST['productPriceBeforeDiscount'], "int"),
                       GetSQLValueString($_POST['productDescription'], "text"),
                       GetSQLValueString($_POST['image1'], "text"),
                       GetSQLValueString($_POST['photo1'], "text"),
                       GetSQLValueString($_POST['picture1'], "text"),
                       GetSQLValueString($_POST['shippingCharge'], "int"),
                       GetSQLValueString($_POST['productAvailability'], "text"),
                       GetSQLValueString($_POST['postingDate'], "date"),
                       GetSQLValueString($_POST['updationDate'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "oroud_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM category";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset2 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM oroudpro WHERE id = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
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
   if(isset($_FILES['photo'])){
      $errors= array();
      $file_name = $_FILES['photo']['name'];
      $file_size = $_FILES['photo']['size'];
      $file_tmp = $_FILES['photo']['tmp_name'];
      $file_type = $_FILES['photo']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));
      
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
   if(isset($_FILES['picture'])){
      $errors= array();
      $file_name = $_FILES['picture']['name'];
      $file_size = $_FILES['picture']['size'];
      $file_tmp = $_FILES['picture']['tmp_name'];
      $file_type = $_FILES['picture']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['picture']['name'])));
      
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


</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong> العروض</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" enctype = "multipart/form-data" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">العرض:</td>
            <td><input type="text" name="productName" value="<?php echo htmlentities($row_Recordset2['productName'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الشركة المنتجة:</td>
            <td><input type="text" name="productCompany" value="<?php echo htmlentities($row_Recordset2['productCompany'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">السعر:</td>
            <td><input type="text" name="productPrice" value="<?php echo htmlentities($row_Recordset2['productPrice'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">البونص:</td>
            <td><input type="text" name="productPriceBeforeDiscount" value="<?php echo htmlentities($row_Recordset2['productPriceBeforeDiscount'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right" valign="top">الوصف:</td>
            <td><textarea name="productDescription" cols="50" rows="5"><?php echo htmlentities($row_Recordset2['productDescription'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">صورة 1:</td>
            <td><input name="image1" id="image1" value="<?php echo $row_Recordset2['image']; ?>" size="32" />
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
            <td nowrap="nowrap" align="right">صورة 2:</td>
            <td><input name="photo1" id="photo1" value="<?php echo $row_Recordset2['photo']; ?>" size="32" />
              <input type = "file" name="photo" id="photo" onchange="updateFileName2()" />
            <script>
                function updateFileName2() {
                    var photo = document.getElementById('photo');
                    var photo1 = document.getElementById('photo1');
                    var fileNameIndex = image.value.lastIndexOf("\\");
            
                    photo1.value = photo.value.substring(fileNameIndex + 1);
                }
            </script></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">صورة 3:</td>
            <td><input name="picture1" id="picture1" value="<?php echo $row_Recordset2['picture']; ?>" size="32" />
              <input type = "file" name="picture" id="picture" onchange="updateFileName3()" />
            <script>
                function updateFileName3() {
                    var picture = document.getElementById('picture');
                    varpicture1 = document.getElementById('picture1');
                    var fileNameIndex = image.value.lastIndexOf("\\");
            
                    picture1.value = picture.value.substring(fileNameIndex + 1);
                }
            </script></td>
          </tr>

          <tr valign="baseline">
            <td nowrap="nowrap" align="right">مصاريف الشحن:</td>
            <td><input type="text" name="shippingCharge" value="<?php echo htmlentities($row_Recordset2['shippingCharge'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الحالة:</td>
            <td><select name="productAvailability">
              <option value="متاح" <?php if (!(strcmp("متاح", htmlentities($row_Recordset2['productAvailability'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>متاح</option>
              <option value="غير متاح" <?php if (!(strcmp("غير متاح", htmlentities($row_Recordset2['productAvailability'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>غير متاح</option>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="تعديل" /></td>
          </tr>
        </table>
        <input name="category" type="hidden" id="category" value="<?php echo $row_Recordset2['category']; ?>" />
        <input type="hidden" name="id" value="<?php echo $row_Recordset2['id']; ?>" />
        <input type="hidden" name="subCategory" value="<?php echo htmlentities($row_Recordset2['subCategory'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="postingDate" value="<?php echo htmlentities($row_Recordset2['postingDate'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="updationDate" value="<?php echo htmlentities($row_Recordset2['updationDate'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="id" value="<?php echo $row_Recordset2['id']; ?>" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>
