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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO form2 (id, saydly_id, per_img, form_type, text1, text2, saidly_name, job_name, activity_name, text3, exp_date, nekaba, nekaba_name, nakeb_name, print_date, print_by, sanad_id, other, sub_syndicate, sanadvalue, syndadminjop, mowazafname, mowazafpic, mowazafstudy, mowazafjob, mowazafexdate, mowazafesal, mowazafvalue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['saydly_id'], "text"),
                       GetSQLValueString($_POST['per_img'], "text"),
                       GetSQLValueString($_POST['form_type'], "text"),
                       GetSQLValueString($_POST['text1'], "text"),
                       GetSQLValueString($_POST['text2'], "text"),
                       GetSQLValueString($_POST['saidly_name'], "text"),
                       GetSQLValueString($_POST['job_name'], "text"),
                       GetSQLValueString($_POST['activity_name'], "text"),
                       GetSQLValueString($_POST['text3'], "text"),
                       GetSQLValueString($_POST['exp_date'], "text"),
                       GetSQLValueString($_POST['nekaba'], "text"),
                       GetSQLValueString($_POST['nekaba_name'], "text"),
                       GetSQLValueString($_POST['nakeb_name'], "text"),
                       GetSQLValueString($_POST['print_date'], "date"),
                       GetSQLValueString($_POST['print_by'], "text"),
                       GetSQLValueString($_POST['sanad_id'], "text"),
                       GetSQLValueString($_POST['other'], "text"),
                       GetSQLValueString($_POST['sub_syndicate'], "int"),
                       GetSQLValueString($_POST['sanadvalue'], "text"),
                       GetSQLValueString($_POST['syndadminjop'], "text"),
                       GetSQLValueString($_POST['mowazafname'], "text"),
                       GetSQLValueString($_POST['mowazafpic'], "text"),
                       GetSQLValueString($_POST['mowazafstudy'], "text"),
                       GetSQLValueString($_POST['mowazafjob'], "text"),
                       GetSQLValueString($_POST['mowazafexdate'], "text"),
                       GetSQLValueString($_POST['mowazafesal'], "text"),
                       GetSQLValueString($_POST['mowazafvalue'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "form5_print.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM form1 WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Energy Fitness Center</title>
    <?php
   if(isset($_FILES[mowazafpic1])){
      $errors= array();
      $file_name = $_FILES[mowazafpic1]['name'];
      $file_size = $_FILES[mowazafpic1]['size'];
      $file_tmp = $_FILES[mowazafpic1]['tmp_name'];
      $file_type = $_FILES[mowazafpic1]['type'];
      $file_ext=strtolower(end(explode('.',$_FILES[mowazafpic1]['name'])));
      
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
    <td align="center"><h2><strong>نموذج إذن توظيف بمنشأة صيدلانية</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="<?php echo $editFormAction; ?>" method="post" enctype = "multipart/form-data" name="form1" id="form1">
        <table align="center">
          <tr valign="baseline">
            <td colspan="2" align="right" nowrap="nowrap"><input type="hidden" name="per_img" value="<?php echo $row_Recordset1['per_img']; ?>" size="32" />              <input type="hidden" name="form_type" value="إذن توظيف بمنشأة صيدلانية" size="32" />              <input type="hidden" name="text1" value="<?php echo $row_Recordset1['text1']; ?>" size="32" />              <input type="hidden" name="text2" value="<?php echo $row_Recordset1['text2']; ?>" size="32" />              <input type="hidden" name="saidly_name" value="<?php echo $row_Recordset1['saidly_name']; ?>" size="32" />              <input type="hidden" name="job_name" value="<?php echo $row_Recordset1['job_name']; ?>" size="32" />              <input type="hidden" name="activity_name" value="<?php echo $row_Recordset1['activity_name']; ?>" size="32" />              <input type="hidden" name="text3" value="<?php echo $row_Recordset1['text3']; ?>" size="32" />              <input type="hidden" name="exp_date" value="<?php echo $row_Recordset1['exp_date']; ?>" size="32" />              <input type="hidden" name="nekaba" value="<?php echo $row_Recordset1['nekaba']; ?>" size="32" />              <input type="hidden" name="nekaba_name" value="<?php echo $row_Recordset1['nekaba_name']; ?>" size="32" />              <input type="hidden" name="nakeb_name" value="<?php echo $row_Recordset1['nakeb_name']; ?>" size="32" />              <input type="hidden" name="print_date" value="<?php echo $row_Recordset1['print_date']; ?>" size="32" />              <input type="hidden" name="print_by" value="<?php echo $row_Recordset1['print_by']; ?>" size="32" />              <input type="hidden" name="sanad_id" value="<?php echo $row_Recordset1['sanad_id']; ?>" size="32" />              <input type="hidden" name="other" value="<?php echo $row_Recordset1['other']; ?>" size="32" />              <input type="hidden" name="sub_syndicate" value="<?php echo $row_Recordset1['sub_syndicate']; ?>" size="32" />              <input type="hidden" name="sanadvalue" value="<?php echo $row_Recordset1['sanadvalue']; ?>" size="32" />              <input type="hidden" name="syndadminjop" value="<?php echo $row_Recordset1['syndadminjop']; ?>" size="32" />              <input name="saydly_id" type="hidden" id="saydly_id" value="<?php echo $row_Recordset1['nekaba']; ?>" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">اسم الموظف:</td>
            <td><input type="text" name="mowazafname" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">الصورة الشخصية:</td>
            <td><input name="mowazafpic" id="mowazafpic" value="" size="32" />
            <input type = "file" name="mowazafpic1" id="mowazafpic1" onchange="updateFileName1()" />
            <script>
                function updateFileName1() {
                    var mowazafpic1 = document.getElementById('mowazafpic1');
                    var mowazafpic = document.getElementById('mowazafpic');
                    var fileNameIndex = mowazafpic1.value.lastIndexOf("\\");
            
                    mowazafpic.value = mowazafpic1.value.substring(fileNameIndex + 1);
                }
            </script>
</td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المؤهل:</td>
            <td><input type="text" name="mowazafstudy" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">المهنة:</td>
            <td><input type="text" name="mowazafjob" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">انتهاء الصلاحية:</td>
            <td><input type="text" name="mowazafexdate" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">رقم سند السداد:</td>
            <td><input type="text" name="mowazafesal" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">قيمة سند السداد:</td>
            <td><input name="mowazafvalue" type="text" id="mowazafvalue" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td nowrap="nowrap" align="right">&nbsp;</td>
            <td><input type="submit" value="موافق" /></td>
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
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
