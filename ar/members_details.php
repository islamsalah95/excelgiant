<?php require_once('./connections/connection.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "main.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = true;
  mysqli_select_db($connection, "excelgia_mahmdata");
  
  $LoginRS__query=sprintf("SELECT username, password FROM users WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($connection,$LoginRS__query) or die(mysqli_error($connection));
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
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

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_DetailRS1 = sprintf("SELECT * FROM members  WHERE id = %s", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysqli_query($connection,$query_limit_DetailRS1) or die(mysqli_error($connection));
$row_DetailRS1 = mysqli_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysqli_query($connection,$query_DetailRS1);
  $totalRows_DetailRS1 = mysqli_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rstowns = "SELECT * FROM towns ORDER BY id ASC";
$rstowns = mysqli_query($connection,$query_rstowns) or die(mysqli_error($connection));
$row_rstowns = mysqli_fetch_assoc($rstowns);
$totalRows_rstowns = mysqli_num_rows($rstowns);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsbanks = "SELECT * FROM banks";
$rsbanks = mysqli_query($connection,$query_rsbanks) or die(mysqli_error($connection));
$row_rsbanks = mysqli_fetch_assoc($rsbanks);
$totalRows_rsbanks = mysqli_num_rows($rsbanks);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsusers = "SELECT * FROM users";
$rsusers = mysqli_query($connection,$query_rsusers) or die(mysqli_error($connection));
$row_rsusers = mysqli_fetch_assoc($rsusers);
$totalRows_rsusers = mysqli_num_rows($rsusers);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsuniversity = "SELECT * FROM university ORDER BY id ASC";
$rsuniversity = mysqli_query($connection,$query_rsuniversity) or die(mysqli_error($connection));
$row_rsuniversity = mysqli_fetch_assoc($rsuniversity);
$totalRows_rsuniversity = mysqli_num_rows($rsuniversity);

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
    <td><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td>
        <p id="text"></p>
    <button id="searchBtn">بحث</button>
  <script type="text/javascript">
    const searchBtn = document.getElementById("searchBtn");

    searchBtn.addEventListener("click", function () {
      const search = prompt("اكتب النص المطلوب البحث عنه");
      const searchResult = window.find(search);
    });
  </script></td>      
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="members_add.php?sub_syndicate=<?php echo $row_Recordset2['sub_syndicate']; ?>"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>

      </tr>
  </table></td>
  </tr>
  <tr>
    <td><table width="80%" align="center" cellpadding="2" cellspacing="2">
      <tr>
        <th width="13%" nowrap="nowrap" bgcolor="#7470B3">مسلسل</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['id']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">نوع العضوية</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['member_type']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الصورة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<strong><a href="../img/<?php echo $row_Recordset1['grad_img']; ?>" target="_new"><img src="../img/<?php echo $row_DetailRS1['grad_img']; ?>" alt="" width="250" height="250" /></a></strong></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الصورة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<strong><img src="../img/<?php echo $row_DetailRS1['per_img']; ?>" alt="" width="150" height="150" /></strong></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الاسم الاول</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['aname']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الاسم الثاني</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['bname']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الاسم الثالث</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['cname']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الاسم الرابع</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['dname']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">تاريخ التخرج</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['grad_date']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">جهة التخرج</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
<label for="grad_place"></label>
          <select name="grad_place" id="grad_place">
            <option value="" <?php if (!(strcmp("", $row_DetailRS1['grad_place']))) {echo "selected=\"selected\"";} ?>></option>
            <?php
do {  
?>
            <option value="<?php echo $row_rsuniversity['id']?>"<?php if (!(strcmp($row_rsuniversity['id'], $row_DetailRS1['grad_place']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsuniversity['name']?></option>
            <?php
} while ($row_rsuniversity = mysqli_fetch_assoc($rsuniversity));
  $rows = mysqli_num_rows($rsuniversity);
  if($rows > 0) {
      mysql_data_seek($rsuniversity, 0);
	  $row_rsuniversity = mysqli_fetch_assoc($rsuniversity);
  }
?>
          </select></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الرقم الوطني</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['id_card']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">العنوان</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['address']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">مكان العمل</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['work_place']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">البريد الالكتروني</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['mail']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الهاتف</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['phone']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الجوال</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['mobile']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">نوع النشاط</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['member_activity']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">النقابة الفرعية</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
          <select name="sub_syndicate" id="sub_syndicate">
            <option value="" <?php if (!(strcmp("", $row_DetailRS1['sub_syndicate']))) {echo "selected=\"selected\"";} ?>></option>
            <?php
do {  
?>
            <option value="<?php echo $row_rstowns['id']?>"<?php if (!(strcmp($row_rstowns['id'], $row_DetailRS1['sub_syndicate']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rstowns['name']?></option>
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
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">المدينة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['twon']; ?></td>
      </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">&nbsp;</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
          <select name="banks" id="banks">
            <option value="" <?php if (!(strcmp("", $row_DetailRS1['bank']))) {echo "selected=\"selected\"";} ?>></option>
            <?php
do {  
?>
            <option value="<?php echo $row_rsbanks['id']?>"<?php if (!(strcmp($row_rsbanks['id'], $row_DetailRS1['bank']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsbanks['name']?></option>
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
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">رقم الايداع المصرفي</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['payment_no']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">الاسم</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['username']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">التفعيل</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
          <select name="active" id="active">
            <option value="1" <?php if (!(strcmp(1, $row_DetailRS1['active']))) {echo "selected=\"selected\"";} ?>>مفعل</option>
            <option value="0" <?php if (!(strcmp(0, $row_DetailRS1['active']))) {echo "selected=\"selected\"";} ?>>غير مفعل</option>
          </select></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">تاريخ الانشاء</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['create_date']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">تاريخ التعديل</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['edit_date']; ?></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">انشئ بواسطة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
          <select name="active2" id="active2">
            <option value="" <?php if (!(strcmp("", $row_DetailRS1['create_by']))) {echo "selected=\"selected\"";} ?>></option>
            <?php
do {  
?>
            <option value="<?php echo $row_rsusers['id']?>"<?php if (!(strcmp($row_rsusers['id'], $row_DetailRS1['create_by']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsusers['first_name']?></option>
            <?php
} while ($row_rsusers = mysqli_fetch_assoc($rsusers));
  $rows = mysqli_num_rows($rsusers);
  if($rows > 0) {
      mysql_data_seek($rsusers, 0);
	  $row_rsusers = mysqli_fetch_assoc($rsusers);
  }
?>
          </select></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">التعديل بواسطة</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;
          <select name="active3" id="active3">
            <option value="" <?php if (!(strcmp("", $row_DetailRS1['edit_by']))) {echo "selected=\"selected\"";} ?>></option>
            <?php
do {  
?>
            <option value="<?php echo $row_rsusers['id']?>"<?php if (!(strcmp($row_rsusers['id'], $row_DetailRS1['edit_by']))) {echo "selected=\"selected\"";} ?>><?php echo $row_rsusers['first_name']?></option>
            <?php
} while ($row_rsusers = mysqli_fetch_assoc($rsusers));
  $rows = mysqli_num_rows($rsusers);
  if($rows > 0) {
      mysql_data_seek($rsusers, 0);
	  $row_rsusers = mysqli_fetch_assoc($rsusers);
  }
?>
          </select></td>
        </tr>
      <tr>
        <th nowrap="nowrap" bgcolor="#7470B3">محذوف</th>
        <td bgcolor="#FFFFFF">&nbsp;	&nbsp;	&nbsp;<?php echo $row_DetailRS1['deleted']; ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" align="center" bgcolor="#D9EAF4"><a href="members_add.php"><i class="fa fa-plus" aria-hidden="true"></i> إضافة </a></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($DetailRS1);

mysqli_free_result($rstowns);

mysqli_free_result($rsbanks);

mysqli_free_result($rsusers);

mysqli_free_result($rsuniversity);
?>
