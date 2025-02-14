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

$colname_Recordset1 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset1 = $_GET['sub_syndicate'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM members WHERE sub_syndicate = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = "SELECT * FROM towns";
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = "SELECT * FROM members";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset4 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset4 = sprintf("SELECT * FROM members WHERE id = %s", GetSQLValueString($colname_Recordset4, "int"));
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);
 
if(isset($_POST['submit'])){
    $to = "info@libyanpharmacists.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $subject = "رسالة من لوحة التحكم";
    $subject2 = "رسالة من لوحة التحكم";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "رسالة من لوحة التحكم" . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "تم ارسال الرسائل بنجاح " . $first_name . " ";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة التحكم</title>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

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
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>القائمة البريدية</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;
      <form action="" method="get" name="form1" id="form1">
        <table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" dir="rtl">
          <tr>
            <td><table width="500" border="0" align="center" cellpadding="4" cellspacing="4" dir="rtl">
              <tr>
                <td width="200"><h3><strong>عضو محدد</strong></h3></td>
                <td width="300"><select style="width:100%" name="id" id="id">
                  <option value="">اختر</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Recordset3['id']?>"><?php echo $row_Recordset3['aname']?> <?php echo $row_Recordset3['bname']?> <?php echo $row_Recordset3['cname']?> <?php echo $row_Recordset3['dname']?></option>
                  <?php
} while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3));
  $rows = mysqli_num_rows($Recordset3);
  if($rows > 0) {
      mysql_data_seek($Recordset3, 0);
	  $row_Recordset3 = mysqli_fetch_assoc($Recordset3);
  }
?>
                </select></td>
                <td width="100" rowspan="2" align="center" valign="middle"><input type="submit" name="button" id="button" value="موافق" /></td>
              </tr>
              <tr>
                <td width="200"><h3><strong>نقابة فرعية</strong></h3></td>
                <td width="300"><select style="width:100%" name="sub_syndicate" id="sub_syndicate">
                  <option value="">اختر</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Recordset2['id']?>"><?php echo $row_Recordset2['name']?></option>
                  <?php
} while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
  $rows = mysqli_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
  }
?>
                </select></td>
                </tr>
            </table></td>
          </tr>
        </table>
    </form></td>
  </tr>
  <tr>
    <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><hr /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="90%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><form action="" method="post">
            <input name="last_name" type="hidden" value=" " />
            <input name="first_name" type="hidden" value="العضو الفاضل" />
          <table width="100%" border="0" cellpadding="4" cellspacing="4" dir="rtl">
            <tr>
              <td><h3><strong>البريد الالكتروني:</strong></h3></td>
            </tr>
            <tr>
              <td><input style="width:100%" name="email" type="text" value="<?php do { ?><?php echo $row_Recordset1['mail']; ?>,<?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?><?php echo $row_Recordset4['mail']; ?>" /></td>
            </tr>
            <tr>
              <td><h3><strong>نص الرسالة:</strong></h3></td>
            </tr>
            <tr>
              <td><textarea style="width:100%" rows="10" name="message" cols="30"></textarea>    <script>
            CKEDITOR.replace( 'message' );
    </script>
</td>
            </tr>
            <tr>
              <td><input type="submit" name="submit" value="ارسال" /></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p></p>
<p>&nbsp;</p>
</body>
</html><?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);
?>
