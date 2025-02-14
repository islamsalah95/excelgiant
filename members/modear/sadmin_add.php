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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO sadmin (id, first_name, bname, cname, last_name, mail, username, password, address, country, salary, phone, mobile, details, grad_img, per_img, sign_img, grad_date, grad_place, id_card, work_place, create_date, edit_date, last_login, create_by, edit_by, group_id, active, sub_syndicate, job, onus) VALUES (%s, %s, %s, %s, %s, %s, %s, md5(%s), %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
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
                       GetSQLValueString($_POST['create_by'], "int"),
                       GetSQLValueString($_POST['edit_by'], "int"),
                       GetSQLValueString($_POST['group_id'], "int"),
                       GetSQLValueString($_POST['active'], "int"),
                       GetSQLValueString($_POST['sub_syndicate'], "text"),
                       GetSQLValueString($_POST['job'], "text"),
                       GetSQLValueString($_POST['onus'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "sadmin_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 50;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

$colname_Recordset1 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset1 = $_GET['sub_syndicate'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM modear WHERE sub_syndicate = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset1, "text"));
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysqli_query($connection,$query_limit_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysqli_query($connection,$query_Recordset1);
  $totalRows_Recordset1 = mysqli_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$colname_Recordset2 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset2 = $_GET['username'];
}
$colname_Recordset2 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset2 = $_GET['sub_syndicate'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM modear WHERE sub_syndicate = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rstowns = "SELECT * FROM towns";
$rstowns = mysqli_query($connection,$query_rstowns) or die(mysqli_error($connection));
$row_rstowns = mysqli_fetch_assoc($rstowns);
$totalRows_rstowns = mysqli_num_rows($rstowns);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsbanks = "SELECT * FROM banks";
$rsbanks = mysqli_query($connection,$query_rsbanks) or die(mysqli_error($connection));
$row_rsbanks = mysqli_fetch_assoc($rsbanks);
$totalRows_rsbanks = mysqli_num_rows($rsbanks);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = "SELECT * FROM systemgroups";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_ReHeadera = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_ReHeadera = $_GET['username'];
}

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
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
    <td>
      <form action="<?php echo $editFormAction; ?>" method="post" enctype = "multipart/form-data" name="form1" id="form1">
      <table align="center">
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">الاسم:</td>
          <td><input type="text" name="first_name" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"></td>
          <td><input type="hidden" name="bname" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"></td>
          <td><input type="hidden" name="cname" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input type="hidden" name="last_name" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">البريد الالكتروني:</td>
          <td><input type="text" name="mail" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">اسم المسئول:</td>
          <td><input type="text" name="username" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">كلمة المرور:</td>
          <td><input type="text" name="password" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">العنوان:</td>
          <td><input type="text" name="address" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">الراتب:</td>
          <td><input type="text" name="salary" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">التليفون:</td>
          <td><input type="text" name="phone" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">الموبايل:</td>
          <td><input type="text" name="mobile" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right" valign="top">ملاحظات:</td>
          <td><textarea name="details" cols="50" rows="5"></textarea></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">صورة الرقم القومي:</td>
          <td><input name="grad_img1" type="text" id="grad_img1" size="32" />
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
          <td><input name="per_img1" id="per_img1" value="" size="32" />
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
          <td><input name="sign_img1" id="sign_img1" value="" size="32" />
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
          <td nowrap="nowrap" align="right">الرقم القومي:</td>
          <td><input type="text" name="id_card" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">الوحدة الحزبية:</td>
          <td><label for="sub_syndicate"></label>
            <select name="sub_syndicate" id="sub_syndicate">
              <?php
do {  
?>
              <option value="<?php echo $row_rstowns['id']?>"><?php echo $row_rstowns['name']?></option>
              <?php
} while ($row_rstowns = mysqli_fetch_assoc($rstowns));
  $rows = mysqli_num_rows($rstowns);
  if($rows > 0) {
      mysql_data_seek($rstowns, 0);
	  $row_rstowns = mysqli_fetch_assoc($rstowns);
  }
?>
            </select></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">التفعيل:</td>
          <td><select name="active">
            <option value="1" <?php if (!(strcmp(1, ""))) {echo "SELECTED";} ?>>مفعل</option>
            <option value="0" <?php if (!(strcmp(0, ""))) {echo "SELECTED";} ?>>غير مفعل</option>
            </select></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">الصفة:</td>
          <td><input type="text" name="job" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">التكليف:</td>
          <td><input type="text" name="onus" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input name="create_by" type="hidden" id="create_by" value="<?php echo $_SESSION['MM_Username'] ?>" size="32" />
            <input type="hidden" name="last_login" value="<?php echo date("Y-m-d h:i:s"); ?>" size="32" />
            <input type="hidden" name="edit_date" value="" size="32" />            <input type="hidden" name="create_date" value="<?php echo date("Y-m-d h:i:s"); ?>" size="32" /></td>
          <td><?php echo $row_Recordset2['id']; ?>            <input type="submit" value="إضافة" /></td>
        </tr>
      </table>
      <input type="hidden" name="id" value="" />
      <input type="hidden" name="country" value="" />
      <input type="hidden" name="grad_place" value="" />
      <input type="hidden" name="work_place" value="" />
      <input type="hidden" name="edit_by" value="<?php echo $_SESSION['MM_Username'] ?>" />
      <input type="hidden" name="MM_insert" value="form1" />
  </form>
    <p>&nbsp;</p></td>
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

mysqli_free_result($Recordset2);

mysqli_free_result($rstowns);

mysqli_free_result($rsbanks);

mysqli_free_result($Recordset3);
?>
