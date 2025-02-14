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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO blogs (id, title, image, samary, category, topic, tdate, tauther, malaf) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['image1'], "text"),
                       GetSQLValueString($_POST['samary'], "text"),
                       GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString($_POST['test'], "text"),
                       GetSQLValueString($_POST['tdate'], "text"),
                       GetSQLValueString($_POST['tauther'], "text"),
					   GetSQLValueString($_POST['malaf1'], "text"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "blogcategoryview.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
	
	
  }
  
  header(sprintf("Location: %s", $insertGoTo));
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM categoryat ORDER BY id ASC";
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
   if(isset($_FILES['malaf'])){
      $errors= array();
      $file_name = $_FILES['malaf']['name'];
      $file_size = $_FILES['malaf']['size'];
      $file_tmp = $_FILES['malaf']['tmp_name'];
      $file_type = $_FILES['malaf']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['malaf']['name'])));
      
      $extensions= array("pdf","PDF");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a PDF or pdf file.";
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
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
    <tr>
      <td align="center"><h2><strong>منشورات الموقع</strong></h2></td>
    </tr>
    <tr>
      <td><hr /></td>
    </tr>
  </table>
  <table width="60%" align="center" dir="rtl">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">عنوان المنشور:</td>
      <td><input type="text" name="title" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">صورة المنشور:</td>
      <td><input name="image1" id="image1" value="" size="32" />
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
      <td nowrap="nowrap" align="right">الملخص:</td>
      <td><textarea name="samary" id="samary" cols="45" rows="5"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">فئة المنشور:</td>
      <td><select name="category">
        <?php
do {  
?>
        <option value="<?php echo $row_Recordset1['category']?>"><?php echo $row_Recordset1['category']?></option>
        <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
  $rows = mysqli_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  }
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">نص المنشور:</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><?php 
include_once("fckeditor/fckeditor.php") ; 
$oFCKeditor = new FCKeditor('test') ; 
$oFCKeditor->BasePath = 'fckeditor/' ; 

$oFCKeditor->Create() ; 
?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">ملف</td>
      <td><input name="malaf1" id="malaf1" value="" size="32" />
              <input type = "file" name="malaf" id="malaf" onchange="updateFileName2()" />
      <script>
                function updateFileName2() {
                    var malaf = document.getElementById('malaf');
                    var malaf1 = document.getElementById('malaf1');
                    var fileNameIndex = malaf.value.lastIndexOf("\\");
            
                    malaf1.value = malaf.value.substring(fileNameIndex + 1);
                }
            </script></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="إضافة" /></td>
    </tr>
  </table>
  <input type="hidden" name="id" value="" />
  <input name="tdate" type="hidden" value="<?php echo date("Y-m-d"); ?>" />
  <input type="hidden" name="tauther" value="<?php echo $_SESSION['MM_Username'] ?>" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
