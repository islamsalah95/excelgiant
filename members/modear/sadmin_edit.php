<?php require_once('connections/connection.php'); ?>
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
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM sadmin WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = "SELECT * FROM systemgroups";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_Recordset2 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset2 = $_GET['sub_syndicate'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM sadmin WHERE sub_syndicate = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset4 = "SELECT * FROM towns";
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);





$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE sadmin SET first_name=%s, bname=%s, cname=%s, last_name=%s, mail=%s, username=%s, password=md5(%s), address=%s, country=%s, salary=%s, phone=%s, mobile=%s, details=%s, grad_img=%s, per_img=%s, sign_img=%s, grad_date=%s, grad_place=%s, id_card=%s, work_place=%s, create_date=%s, edit_date=%s, last_login=%s, create_by=%s, edit_by=%s, group_id=%s, active=%s, sub_syndicate=%s, job=%s, onus=%s WHERE id=%s",
                       GetSQLValueString($_POST['first_name'], "text"),
                       GetSQLValueString($_POST['bname'], "text"),
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($_POST['last_name'], "text"),
                       GetSQLValueString($_POST['mail'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['country'], "text"),
                       GetSQLValueString($_POST['salary'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['details'], "text"),
                       GetSQLValueString($_POST['grad_img1'], "text"),
                       GetSQLValueString($_POST['per_img1'], "text"),
                       GetSQLValueString($_POST['sign_img1'], "text"),
                       GetSQLValueString($_POST['grad_date'], "date"),
                       GetSQLValueString($_POST['grad_place'], "text"),
                       GetSQLValueString($_POST['id_card'], "text"),
                       GetSQLValueString($_POST['work_place'], "text"),
                       GetSQLValueString($_POST['create_date'], "date"),
                       GetSQLValueString($_POST['edit_date'], "date"),
                       GetSQLValueString($_POST['last_login'], "date"),
                       GetSQLValueString($_POST['create_by'], "text"),
                       GetSQLValueString($_POST['edit_by'], "text"),
                       GetSQLValueString($_POST['group_id'], "int"),
                       GetSQLValueString($_POST['active'], "int"),
                       GetSQLValueString($_POST['sub_syndicate'], "text"),
                       GetSQLValueString($_POST['job'], "text"),
                       GetSQLValueString($_POST['onus'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));

  $updateGoTo = "sadmin_view.php?sub_syndicate=" . $row_Recordset1['sub_syndicate'] . "";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
  }
  header(sprintf("Location: %s", $updateGoTo));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
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
         move_uploaded_file($file_tmp,"../photo/".$file_name);
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
         move_uploaded_file($file_tmp,"../photo/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
    <?php
   if(isset($_FILES['sign_img'])){
      $errors= array();
      $file_name = $_FILES['sign_img']['name'];
      $file_size = $_FILES['sign_img']['size'];
      $file_tmp = $_FILES['sign_img']['tmp_name'];
      $file_type = $_FILES['sign_img']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['sign_img']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../photo/".$file_name);
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
    <td align="center"><h2><strong>المسئولين</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" enctype = "multipart/form-data" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم:</td>
            <td><input type="text" name="first_name" value="<?php echo htmlentities($row_Recordset1['first_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap"></td>
            <td><input type="hidden" name="bname" value="<?php echo htmlentities($row_Recordset1['bname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap"></td>
            <td><input type="hidden" name="cname" value="<?php echo htmlentities($row_Recordset1['cname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">&nbsp;</td>
            <td><input type="hidden" name="last_name" value="<?php echo htmlentities($row_Recordset1['last_name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">البريد الالكتروني:</td>
            <td><input type="text" name="mail" value="<?php echo htmlentities($row_Recordset1['mail'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">اسم المسئول:</td>
            <td><input type="text" name="username" value="<?php echo htmlentities($row_Recordset1['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">كلمة المرور:</td>
            <td><input type="text" name="password" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">العنوان:</td>
            <td><input type="text" name="address" value="<?php echo htmlentities($row_Recordset1['address'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الراتب:</td>
            <td><input type="text" name="salary" value="<?php echo htmlentities($row_Recordset1['salary'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">التليفون:</td>
            <td><input type="text" name="phone" value="<?php echo htmlentities($row_Recordset1['phone'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الموبايل:</td>
            <td><input type="text" name="mobile" value="<?php echo htmlentities($row_Recordset1['mobile'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right" valign="top">ملاحظات:</td>
            <td><textarea name="details" cols="50" rows="5"><?php echo $row_Recordset1['details']; ?></textarea></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">صورة الرقم القومي:</td>
            <td><input name="grad_img1" type="text" id="grad_img1" value="<?php echo $row_Recordset1['grad_img']; ?>" size="32" />
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
            <td><input name="per_img1" id="per_img1" value="<?php echo $row_Recordset1['per_img']; ?>" size="32" />
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
            <td nowrap="nowrap" align="right">صورة البطاقة:</td>
            <td><input name="sign_img1" id="sign_img1" value="<?php echo $row_Recordset1['sign_img']; ?>" size="32" />
              <input type = "file" name="sign_img" id="sign_img" onchange="updateFileName1()" />
              <script>
                function updateFileName1() {
                    var sign_img = document.getElementById('sign_img');
                    var sign_img1 = document.getElementById('sign_img1');
                    var fileNameIndex = sign_img.value.lastIndexOf("\\");
            
                    sign_img1.value = sign_img.value.substring(fileNameIndex + 1);
                }
            </script></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الرقم القومي:</td>
            <td><input type="text" name="id_card" value="<?php echo htmlentities($row_Recordset1['id_card'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الوحدة الحزبية:</td>
            <td><label for="sub_syndicate"></label>
              <select name="sub_syndicate" id="sub_syndicate">
                <?php
do {  
?>
                <option value="<?php echo $row_Recordset4['id']?>"<?php if (!(strcmp($row_Recordset4['id'], $row_Recordset1['sub_syndicate']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset4['name']?></option>
                <?php
} while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysql_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">التفعيل:</td>
            <td><select name="active">
              <option value="1" <?php if (!(strcmp(1, htmlentities($row_Recordset1['active'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>مفعل</option>
              <option value="0" <?php if (!(strcmp(0, htmlentities($row_Recordset1['active'], ENT_COMPAT, 'utf-8')))) {echo "SELECTED";} ?>>غير مفعل</option>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الصفة:</td>
            <td><input type="text" name="job" value="<?php echo htmlentities($row_Recordset1['job'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">التكليف:</td>
            <td><input type="text" name="onus" value="<?php echo htmlentities($row_Recordset1['onus'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right"><input name="edit_by" type="hidden" id="create_by" value="<?php echo $row_Recordset2['id']; ?>" size="32" />              <input type="hidden" name="edit_date" value="<?php echo date("Y-m-d h:i:s"); ?>" size="32" /></td>
            <td><input type="submit" value="تعديل" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
        <input type="hidden" name="country" value="<?php echo htmlentities($row_Recordset1['country'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="grad_place" value="<?php echo htmlentities($row_Recordset1['grad_place'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="work_place" value="<?php echo htmlentities($row_Recordset1['work_place'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="create_date" value="<?php echo htmlentities($row_Recordset1['create_date'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="last_login" value="<?php echo date("Y-m-d h:i:s"); ?>" />
        <input type="hidden" name="create_by" value="<?php echo htmlentities($row_Recordset1['create_by'], ENT_COMPAT, 'utf-8'); ?>" size="32" />
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="id" value="<?php echo $row_Recordset1['id']; ?>" />
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
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset4);
?>
