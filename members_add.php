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
  $loginUsername = $_POST['NID'];
  $LoginRS__query = sprintf("SELECT NID FROM mwmembers WHERE NID=%s", GetSQLValueString($loginUsername, "text"));
  mysqli_select_db($connection, "excelgia_mahmdata");
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO mwmembers (id, Name, NID, Phone, Qualification, Jop, Image, NIDFront, NIDBack, Address, Type, `Position`, PositionSection, PositionUnit, Status, Charty, MemberID, Notes, create_date, update_date, create_by, update_by) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['NID'], "text"),
                       GetSQLValueString($_POST['Phone'], "text"),
                       GetSQLValueString($_POST['Qualification'], "text"),
                       GetSQLValueString($_POST['Jop'], "text"),
                       GetSQLValueString($_POST['Image1'], "text"),
                       GetSQLValueString($_POST['NIDFront1'], "text"),
                       GetSQLValueString($_POST['NIDBack1'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
                       GetSQLValueString($_POST['Type'], "text"),
                       GetSQLValueString($_POST['Position'], "text"),
                       GetSQLValueString($_POST['PositionSection'], "text"),
                       GetSQLValueString($_POST['PositionUnit'], "text"),
                       GetSQLValueString($_POST['Status'], "text"),
                       GetSQLValueString($_POST['Charty'], "text"),
                       GetSQLValueString($_POST['MemberID'], "text"),
                       GetSQLValueString($_POST['Notes'], "text"),
                       GetSQLValueString($_POST['create_date'], "text"),
                       GetSQLValueString($_POST['update_date'], "text"),
                       GetSQLValueString($_POST['create_by'], "text"),
                       GetSQLValueString($_POST['update_by'], "text"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "members_view.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
<meta name="description" content="طلب عضوية جديدة">
<meta property="og:image" content="https://excelgiants.site/lo.png" />
<meta property="twitter:image" content="https://excelgiants.site/lo.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
.button {
  background-color: #04AA6D; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #04AA6D;
}

.button1:hover {
  background-color: #04AA6D;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

</style>

    <?php
   if(isset($_FILES['Image'])){
      $errors= array();
      $file_name = $_FILES['Image']['name'];
      $file_size = $_FILES['Image']['size'];
      $file_tmp = $_FILES['Image']['tmp_name'];
      $file_type = $_FILES['Image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['Image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"photo/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<?php
   if(isset($_FILES['NIDFront'])){
      $errors= array();
      $file_name = $_FILES['NIDFront']['name'];
      $file_size = $_FILES['NIDFront']['size'];
      $file_tmp = $_FILES['NIDFront']['tmp_name'];
      $file_type = $_FILES['NIDFront']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['NIDFront']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"photo/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

    <?php
   if(isset($_FILES['NIDBack'])){
      $errors= array();
      $file_name = $_FILES['NIDBack']['name'];
      $file_size = $_FILES['NIDBack']['size'];
      $file_tmp = $_FILES['NIDBack']['tmp_name'];
      $file_type = $_FILES['NIDBack']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['NIDBack']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"photo/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>


</head>

<body>
<?php include 'modear/top.php'; ?>

<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><h2><strong>استمارة تسجيل طلب عضوية جديدة</strong></h2></td>
  </tr>
    <tr>
    <td><hr /></td>
  </tr>

<form action="<?php echo $editFormAction; ?>" method="post" enctype = "multipart/form-data" name="form1" id="form1">
  <table align="center" dir="rtl">
    <tr valign="baseline">
      <td>
        <input type="text" name="Name" value="" size="32" placeholder="الاسم:" required/>
      </td>
    </tr>
    <tr valign="baseline">
      <td>
        <input type="text" name="NID" value="" size="32" placeholder="اسم المستخدم:" />
      </td>
    </tr>
    <tr valign="baseline">
      <td><input name="Qualification" type="hidden" id="Qualification" placeholder="كلمة المرور:" value="" size="32"/></td>
    </tr>
    <tr valign="baseline">
      <td>
        <input type="text" name="Phone" value="" size="32" placeholder="رقم الموبايل:" required/>
      </td>
    </tr>
    <tr valign="baseline">
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td>
        <input type="hidden" name="Jop" value="" size="32" placeholder="الوظيفة:" />
      </td>
    </tr>
    <tr valign="baseline">
      <td><input name="Address2" type="hidden" required="required" placeholder="الدولة:" size="32"/></td>
    </tr>
    <tr valign="baseline">
      <td><input name="Address" type="text" value="" size="32" placeholder="الدولة:" /></td>
    </tr>
    <tr valign="baseline">
      <td><input type="submit" class="button button2" value="إضافة" /></td>
    </tr>
  </table>
  <input type="hidden" name="id" value="" />
  <input type="hidden" name="Type" value="" />
  <input type="hidden" name="Position" value="" />
  <input type="hidden" name="PositionSection" value="" />
  <input type="hidden" name="PositionUnit" value="" />
  <input type="hidden" name="Status" value="طلب عضوية" />
  <input type="hidden" name="Charty" value="" />
  <input type="hidden" name="MemberID" value="" />
  <input type="hidden" name="Notes" value="" />
  <input type="hidden" name="create_date" value="<?php echo date("Y.m.d"); ?>" />
  <input type="hidden" name="update_date" value="" />
  <input type="hidden" name="create_by" value="طلب من الانترنت" />
  <input type="hidden" name="update_by" value="" />
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>