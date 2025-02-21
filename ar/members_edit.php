<?php require_once('./connections/connection.php'); ?>
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














$colname_Recordset4 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset4 = $_GET['username'];
}
$colname_Recordset4 = "-1";
if (isset($_GET['usern'])) {
  $colname_Recordset4 = $_GET['usern'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset4 = sprintf("SELECT * FROM users WHERE username = %s", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);
  
  
  


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
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM members WHERE sub_syndicate = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset1, "int"));
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
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM users WHERE username = %s", GetSQLValueString($colname_Recordset2, "text"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rstowns = "SELECT * FROM towns";
$rstowns = mysqli_query($connection,$query_rstowns) or die(mysqli_error($connection));
$row_rstowns = mysqli_fetch_assoc($rstowns);
$totalRows_rstowns = mysqli_num_rows($rstowns);

$colname_Recordset3 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset3 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = sprintf("SELECT * FROM members WHERE id = %s", GetSQLValueString($colname_Recordset3, "int"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsbanks = "SELECT * FROM banks";
$rsbanks = mysqli_query($connection,$query_rsbanks) or die(mysqli_error($connection));
$row_rsbanks = mysqli_fetch_assoc($rsbanks);
$totalRows_rsbanks = mysqli_num_rows($rsbanks);



$colname_Recordset5 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset5 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset5 = sprintf("SELECT * FROM members WHERE id = %s", GetSQLValueString($colname_Recordset5, "int"));
$Recordset5 = mysqli_query($connection,$query_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset6 = "SELECT * FROM city";
$Recordset6 = mysqli_query($connection,$query_Recordset6) or die(mysqli_error($connection));
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysqli_num_rows($Recordset6);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset7 = "SELECT * FROM university";
$Recordset7 = mysqli_query($connection,$query_Recordset7) or die(mysqli_error($connection));
$row_Recordset7 = mysqli_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysqli_num_rows($Recordset7);

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








$dimyan = $row_Recordset5['sub_syndicate'];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE members SET member_type=%s, grad_img=%s, per_img=%s, aname=%s, bname=%s, cname=%s, dname=%s, grad_date=%s, grad_place=%s, id_card=%s, address=%s, work_place=%s, mail=%s, phone=%s, mobile=%s, member_activity=%s, sub_syndicate=%s, bank=%s, payment_no=%s, password=md5(%s), username=%s, active=%s, create_date=%s, edit_date=%s, create_by=%s, edit_by=%s, deleted=%s, twon=%s WHERE id=%s",
                       GetSQLValueString($_POST['member_type'], "text"),
                       GetSQLValueString($_POST['grad_img1'], "text"),
                       GetSQLValueString($_POST['per_img1'], "text"),
                       GetSQLValueString($_POST['aname'], "text"),
                       GetSQLValueString($_POST['bname'], "text"),
                       GetSQLValueString($_POST['cname'], "text"),
                       GetSQLValueString($_POST['dname'], "text"),
                       GetSQLValueString($_POST['grad_date'], "date"),
                       GetSQLValueString($_POST['grad_place'], "text"),
                       GetSQLValueString($_POST['id_card'], "int"),
                       GetSQLValueString($_POST['address'], "text"),
                       GetSQLValueString($_POST['work_place'], "text"),
                       GetSQLValueString($_POST['mail'], "text"),
                       GetSQLValueString($_POST['phone'], "text"),
                       GetSQLValueString($_POST['mobile'], "text"),
                       GetSQLValueString($_POST['member_activity'], "text"),
                       GetSQLValueString($_POST['sub_syndicate'], "int"),
                       GetSQLValueString($_POST['bank'], "int"),
                       GetSQLValueString($_POST['payment_no'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['active'], "int"),
                       GetSQLValueString($_POST['create_date'], "date"),
                       GetSQLValueString($_POST['edit_date'], "date"),
                       GetSQLValueString($_POST['create_by'], "int"),
                       GetSQLValueString($_POST['edit_by'], "int"),
                       GetSQLValueString($_POST['deleted'], "int"),
                       GetSQLValueString($_POST['twon'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$updateSQL) or die(mysqli_error($connection));
 
  $updateGoTo = "members_view.php?sub_syndicate=". $dimyan . "";
  $dimyan="sub_syndicate=";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
  }
  header(sprintf("Location: %s", $updateGoTo , $dimyan));
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة التحكم</title>
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
<script src="../SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>الأعضاء</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>tttttt" method="post" enctype = "multipart/form-data" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">نوع العضوية:</td>
            <td><select name="member_type">
              <option selected="selected" value="" <?php if (!(strcmp("", $row_Recordset3['member_type']))) {echo "selected=\"selected\"";} ?>>اختر</option>
              <option value="خاص" <?php if (!(strcmp("خاص", $row_Recordset3['member_type']))) {echo "selected=\"selected\"";} ?>>خاص</option>
              <option value="حكومي" <?php if (!(strcmp("حكومي", $row_Recordset3['member_type']))) {echo "selected=\"selected\"";} ?>>حكومي</option>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الصورة:</td>
            <td><span id="sprytextfield6">
              <input name="grad_img1" type="text" id="grad_img1" value="<?php echo $row_Recordset3['grad_img']; ?>" size="32" />
              <span class="textfieldRequiredMsg">*</span></span>
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
            <td align="right" nowrap="nowrap">الصورة:</td>
            <td><span id="sprytextfield7">
              <input name="per_img1" type="text" id="per_img1" value="<?php echo $row_Recordset3['per_img']; ?>" size="32" />
              <span class="textfieldRequiredMsg">*</span></span>
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
            <td align="right" nowrap="nowrap">الاسم:</td>
            <td><input type="text" name="aname" value="<?php echo htmlentities($row_Recordset3['aname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم الثاني:</td>
            <td><input type="text" name="bname" value="<?php echo htmlentities($row_Recordset3['bname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم الثالث:</td>
            <td><input type="text" name="cname" value="<?php echo htmlentities($row_Recordset3['cname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم الرابع:</td>
            <td><input type="text" name="dname" value="<?php echo htmlentities($row_Recordset3['dname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">تاريخ التخرج:</td>
            <td><input type="text" name="grad_date" value="<?php echo htmlentities($row_Recordset3['grad_date'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">جهة التخرج:</td>
            <td><select name="grad_place" id="grad_place">
              <option value="" <?php if (!(strcmp("", $row_Recordset3['grad_place']))) {echo "selected=\"selected\"";} ?>>اختر</option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset7['id']?>"<?php if (!(strcmp($row_Recordset7['id'], $row_Recordset3['grad_place']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset7['name']?></option>
              <?php
} while ($row_Recordset7 = mysqli_fetch_assoc($Recordset7));
  $rows = mysqli_num_rows($Recordset7);
  if($rows > 0) {
      mysql_data_seek($Recordset7, 0);
	  $row_Recordset7 = mysqli_fetch_assoc($Recordset7);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">النقابة الفرعية:</td>
            <td><label for="sub_syndicate"></label>
              <select name="sub_syndicate" id="sub_syndicate">
                <?php
do {  
?>
                <option value="<?php echo $row_rstowns['id']?>"<?php if (!(strcmp($row_rstowns['id'], $row_Recordset3['sub_syndicate']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rstowns['name']?></option>
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
            <td nowrap="nowrap" align="right">المدينة:</td>
            <td><select name="twon" id="twon">
              <option value="" <?php if (!(strcmp("", $row_Recordset3['twon']))) {echo "selected=\"selected\"";} ?>>اختر</option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset6['towns']?>"<?php if (!(strcmp($row_Recordset6['towns'], $row_Recordset3['twon']))) {echo "selected=\"selected\"";} ?>><?php echo $row_Recordset6['towns']?></option>
              <?php
} while ($row_Recordset6 = mysqli_fetch_assoc($Recordset6));
  $rows = mysqli_num_rows($Recordset6);
  if($rows > 0) {
      mysql_data_seek($Recordset6, 0);
	  $row_Recordset6 = mysqli_fetch_assoc($Recordset6);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الرقم الوطني:</td>
            <td><input type="text" name="id_card" value="<?php echo htmlentities($row_Recordset3['id_card'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">العنوان:</td>
            <td><input type="text" name="address" value="<?php echo htmlentities($row_Recordset3['address'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">مكان العمل:</td>
            <td><input type="text" name="work_place" value="<?php echo htmlentities($row_Recordset3['work_place'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">البريد الالكتروني:</td>
            <td><input type="text" name="mail" value="<?php echo htmlentities($row_Recordset3['mail'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الهاتف:</td>
            <td><input type="text" name="phone" value="<?php echo htmlentities($row_Recordset3['phone'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الجوال:</td>
            <td><input type="text" name="mobile" value="<?php echo htmlentities($row_Recordset3['mobile'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">نوع النشاط:</td>
            <td><select name="member_activity" id="member_activity">
              <option value="صيدلية" <?php if (!(strcmp("صيدلية", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>صيدلية</option>
              <option value="شركة أدوية" <?php if (!(strcmp("شركة أدوية", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>شركة أدوية</option>
              <option value="صيدلي صناعي" <?php if (!(strcmp("صيدلي صناعي", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>صيدلي صناعي</option>
              <option value="إعلام دوائي" <?php if (!(strcmp("إعلام دوائي", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>إعلام دوائي</option>
              <option value="صيدلية خاصة" <?php if (!(strcmp("صيدلية خاصة", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>صيدلية خاصة</option>
              <option value="مستشفى" <?php if (!(strcmp("مستشفى", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>مستشفى</option>
              <option value="صيدلية عامة" <?php if (!(strcmp("صيدلية عامة", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>صيدلية عامة</option>
              <option value="مخازن" <?php if (!(strcmp("مخازن", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>مخازن</option>
              <option value="إداري" <?php if (!(strcmp("إداري", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>إداري</option>
              <option value="رقابة وتفتيش" <?php if (!(strcmp("رقابة وتفتيش", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>رقابة وتفتيش</option>
              <option value="مركز بحوث طبية" <?php if (!(strcmp("مركز بحوث طبية", $row_Recordset3['member_activity']))) {echo "selected=\"selected\"";} ?>>مركز بحوث طبية</option>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><select name="bank">
              <option value=""  <?php if (!(strcmp("", $row_Recordset3['bank']))) {echo "selected=\"selected\"";} ?>>اختر</option>
              <?php
do {  
?>
              <option value="<?php echo $row_rsbanks['id']?>"<?php if (!(strcmp($row_rsbanks['id'], $row_Recordset3['bank']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsbanks['name']?></option>
              <?php
} while ($row_rsbanks = mysqli_fetch_assoc($rsbanks));
  $rows = mysqli_num_rows($rsbanks);
  if($rows > 0) {
      mysql_data_seek($rsbanks, 0);
	  $row_rsbanks = mysqli_fetch_assoc($rsbanks);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">رقم الايداع المصرفي:</td>
            <td><input type="text" name="payment_no" value="<?php echo htmlentities($row_Recordset3['payment_no'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">كلمة المرور:</td>
            <td><input type="text" name="password" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم:</td>
            <td><input name="username" type="text" value="<?php echo htmlentities($row_Recordset3['username'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">التفعيل:</td>
            <td><select name="active" id="active">
              <option value="1" <?php if (!(strcmp(1, $row_Recordset3['active']))) {echo "selected=\"selected\"";} ?>>مفعل</option>
              <option value="0" <?php if (!(strcmp(0, $row_Recordset3['active']))) {echo "selected=\"selected\"";} ?>>غير مفعل</option>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right"><?php echo $dimyan; ?></td>
            <td><input type="submit" value="تعديل" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $row_Recordset3['id']; ?>" />
        <input type="hidden" name="create_date" value="<?php echo htmlentities($row_Recordset3['create_date'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="edit_date" value="<?php echo date("Y-m-d h:i:s"); ?>" />
        <input type="hidden" name="create_by" value="<?php echo htmlentities($row_Recordset3['create_by'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="edit_by" value="<?php echo htmlentities($row_Recordset4['id']); ?>" />
        <input type="hidden" name="deleted" value="<?php echo htmlentities($row_Recordset3['deleted'], ENT_COMPAT, 'utf-8'); ?>" />
        <input type="hidden" name="MM_update" value="form1" />
        <input type="hidden" name="id" value="<?php echo $row_Recordset3['id']; ?>" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
</script>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($rstowns);

mysqli_free_result($Recordset3);

mysqli_free_result($rsbanks);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);

mysqli_free_result($Recordset6);

mysqli_free_result($Recordset7);
?>
