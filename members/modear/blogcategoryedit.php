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
  $updateSQL = sprintf("UPDATE blogs SET title=%s, image=%s, samary=%s, category=%s, topic=%s, tdate=%s, tauther=%s WHERE id=%s",
                       GetSQLValueString($_POST['title'], "text"),
                       GetSQLValueString($_POST['image1'], "text"),
                       GetSQLValueString($_POST['samary'], "text"),
                       GetSQLValueString($_POST['category'], "text"),
                       GetSQLValueString($_POST['test'], "text"),
                       GetSQLValueString($_POST['tdate'], "text"),
                       GetSQLValueString($_POST['tauther'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "blogcategoryview.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = "SELECT * FROM categoryat ORDER BY id ASC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset2 = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM blogs WHERE id = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
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
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>منشورات الموقع</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
</table>
<form action="<?php echo $editFormAction; ?>tttttt" method="post" enctype = "multipart/form-data" name="form1" id="form1">
  <table width="60%" align="center" dir="rtl">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">عنوان المقال:</td>
      <td><input type="text" name="title" value="<?php echo htmlentities($row_Recordset2['title'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">صورة المقال:</td>
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
      <td nowrap="nowrap" align="right" valign="top">ملخص المقال:</td>
      <td><textarea name="samary" cols="50" rows="5"><?php echo htmlentities($row_Recordset2['samary'], ENT_COMPAT, 'utf-8'); ?></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">فئة المقال:</td>
      <td><select name="category">
        <?php 
do {  
?>
        <option value="<?php echo $row_Recordset1['category']?>" <?php if (!(strcmp($row_Recordset1['category'], htmlentities($row_Recordset2['category'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>><?php echo $row_Recordset1['category']?></option>
        <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" valign="top">نص المقال:</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap"><?php 
include_once("fckeditor/fckeditor.php") ; 
$oFCKeditor = new FCKeditor('test') ; 
$oFCKeditor->BasePath = 'fckeditor/' ; 
$oFCKeditor->Value = $row_Recordset2['topic']; 
$oFCKeditor->Create() ; 
?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="تعديل" /></td>
    </tr>
  </table>
  <input type="hidden" name="id" value="<?php echo $row_Recordset2['id']; ?>" />
  <input type="hidden" name="tdate" value="<?php echo htmlentities($row_Recordset2['tdate'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="tauther" value="<?php echo htmlentities($row_Recordset2['tauther'], ENT_COMPAT, 'utf-8'); ?>" />
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id" value="<?php echo $row_Recordset2['id']; ?>" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);
?>
