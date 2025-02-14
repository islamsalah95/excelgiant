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


// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  $MM_dupKeyRedirect="errorid.php";
  $loginUsername = $_POST['id_card'];
  $LoginRS__query = sprintf("SELECT id_card FROM members WHERE id_card=%s", GetSQLValueString($loginUsername, "int"));
  mysqli_query($connection, $query)($database_connection, $connection);
  $LoginRS=mysqli_query($connection,$LoginRS__query) or die(mysqli_error($connection));
  $loginFoundUser = mysqli_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}




// *** Redirect if username exists
$MM_flag1="MM_insert";
if (isset($_POST[$MM_flag1])) {
  $MM_dupKeyRedirect1="errorusername.php";
  $loginUsername1 = $_POST['username'];
  $LoginRS1__query1 = sprintf("SELECT username FROM members WHERE username=%s", GetSQLValueString($loginUsername1, "int"));
  mysqli_query($connection, $query)($database_connection, $connection);
  $LoginRS1=mysqli_query($connection,$LoginRS1__query1) or die(mysqli_error($connection));
  $loginFoundUser1 = mysqli_num_rows($LoginRS1);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser1){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect1,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect1 = $MM_dupKeyRedirect1 . $MM_qsChar ."requsername=".$loginUsername1;
    header ("Location: $MM_dupKeyRedirect1");
    exit;
  }
}




$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO members (id, member_type, grad_img, per_img, aname, bname, cname, dname, grad_date, grad_place, id_card, address, work_place, mail, phone, mobile, member_activity, sub_syndicate, bank, payment_no, password, username, active, create_date, edit_date, create_by, edit_by, deleted, twon) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, md5(%s), %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
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
                       GetSQLValueString($_POST['twon'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));






  $insertGoTo = "members_view.php";
  

  
  
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
$colname_Recordset2 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset2 = $_GET['sub_syndicate'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM users WHERE sub_syndicate = %s", GetSQLValueString($colname_Recordset2, "text"));
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
$query_rsuniversity = "SELECT * FROM university ORDER BY id ASC";
$rsuniversity = mysqli_query($connection,$query_rsuniversity) or die(mysqli_error($connection));
$row_rsuniversity = mysqli_fetch_assoc($rsuniversity);
$totalRows_rsuniversity = mysqli_num_rows($rsuniversity);

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = "SELECT * FROM city";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

mysqli_query($connection, $query)($database_connection, $connection);
$query_rsanshta = "SELECT * FROM activates ORDER BY id ASC";
$rsanshta = mysqli_query($connection,$query_rsanshta) or die(mysqli_error($connection));
$row_rsanshta = mysqli_fetch_assoc($rsanshta);
$totalRows_rsanshta = mysqli_num_rows($rsanshta);

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
<title>Energy Fitness Center</title>
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
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" enctype = "multipart/form-data" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">نوع العضوية:</td>
            <td><span id="spryselect1">
              <select name="member_type">
                <option selected="selected">اختر</option>
                <option value="خاص">خاص</option>
                <option value="مميز">مميز</option>
              </select>
            <span class="selectRequiredMsg">من فضلك اختر من القائمة</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">صورة:</td>
            <td><span id="sprytextfield6">
              <input name="grad_img1" type="text" id="grad_img1" value="Egyption_ID.jpg" size="32" />
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
            <td align="right" nowrap="nowrap">صورة شخصية:</td>
            <td><span id="sprytextfield7">
              <input name="per_img1" type="text" id="per_img1" value="profile.png" size="32" />
              <span class="textfieldRequiredMsg">*</span></span>
              <input type = "file" name="per_img" id="per_img" onchange="updateFileName()" />
			<script>
                function updateFileName() {
                    var per_img = document.getElementById('per_img');
                    var per_img1 = document.getElementById('per_img1');
                    var fileNameIndex = per_img.value.lastIndexOf("\\");
            
                    per_img1.value = per_img.value.substring(fileNameIndex + 1);
                }
            </script>            </td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الاسم:</td>
            <td><span id="sprytextfield1">
              <input type="text" name="aname" value="" size="32" />
            <span class="textfieldRequiredMsg">*</span></span><span id="sprytextfield2">
              <input type="hidden" name="bname" value="" size="32" />
            <span class="textfieldRequiredMsg">*</span></span><span id="sprytextfield3">
              <input type="hidden" name="cname" value="" size="32" />
            <span class="textfieldRequiredMsg">*</span></span><span id="sprytextfield4">
              <input type="hidden" name="dname" value="" size="32" />
            <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">تاريخ العضوية:</td>
            <td><span id="sprytextfield5">
              <input type="date" name="grad_date" value="<?php echo  date("Y-m-d"); ?>" size="32" />
            <span class="textfieldRequiredMsg">*</span></span><span id="span">
              <label for="grad_place"></label>
              <input type="hidden" name="grad_place" id="grad_place" />
            <span class="selectRequiredMsg">من فضلك اختر من القائمة</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الفرع:</td>
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
            <td nowrap="nowrap" align="right">القسم:</td>
            <td><select name="twon" id="twon">
              <option value="">اختر</option>
              <?php
do {  
?>
              <option value="<?php echo $row_Recordset3['towns']?>"><?php echo $row_Recordset3['towns']?></option>
              <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الرقم القومي:</td>
            <td><input type="text" name="id_card" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">العنوان:</td>
            <td><span id="sprytextfield8">
              <input type="text" name="address" value="" size="32" />
            <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الوظيفة:</td>
            <td><span id="sprytextfield9">
              <input type="text" name="work_place" value="" size="32" />
            <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">البريد الالكتروني:</td>
            <td><span id="sprytextfield10">
            <input type="text" name="mail" value="" size="32" />
            <span class="textfieldRequiredMsg">*</span><span class="textfieldInvalidFormatMsg">ادخل البريد الالكتروني بطريقة سليمة.</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">التليفون:</td>
            <td><span id="sprytextfield11">
              <input type="text" name="phone" value="" size="32" />
            <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الموبايل:</td>
            <td><span id="sprytextfield12">
              <input type="text" name="mobile" value="" size="32" />
            <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">اسم المستخدم:</td>
            <td><input name="username" type="text" value="<?php echo date("Ymdhis"); ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">كلمة المرور:</td>
            <td><span id="sprytextfield13">
              <input type="password" name="password" id="password" value="123" size="32" />
            <span class="textfieldRequiredMsg">*</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">تأكيد كلمة المرور:</td>
            <td><span id="spryconfirm1">
              <label for="text1"></label>
              <input name="text1" type="password" id="text1" value="123" size="32" />
            <span class="confirmRequiredMsg">*</span><span class="confirmInvalidMsg">كلمة المرور والتأكيد غير متطابقين</span></span></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">التفعيل:</td>
            <td><span id="spryselect5">
              <select name="active">
                <option value="1" selected="selected">مفعل</option>
                <option value="0">غير مفعل</option>
              </select>
            <span class="selectRequiredMsg">من فضلك اختر من القائمة</span></span></td>
          </tr>
          <tr valign="baseline">
            <td colspan="2" align="right" nowrap="nowrap"><input type="hidden" name="create_date" value="<?php echo date("Y-m-d h:i:s"); ?>" size="32" />              <input type="hidden" name="edit_date" size="32" />              <input type="hidden" name="create_by" value="<?php echo $row_Recordset2['id']; ?>" size="32" />              <input type="hidden" name="edit_by" size="32" />              <input type="hidden" name="deleted" value="0" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="إضافة" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {isRequired:false});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9");
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "email", {isRequired:false});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12");
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "password", {isRequired:false});
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");

var spryselect5 = new Spry.Widget.ValidationSelect("spryselect5");
var span = new Spry.Widget.ValidationSelect("span");
</script>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($rstowns);

mysqli_free_result($rsbanks);

mysqli_free_result($rsuniversity);

mysqli_free_result($Recordset3);

mysqli_free_result($rsanshta);
?>
