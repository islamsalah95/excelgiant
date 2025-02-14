<?php require_once('connections/connection.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
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
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM form2 WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset1, "int"));
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
.khalfia {
	background-image: url(back.jpg);
	background-repeat: no-repeat;
	background-position: center top;
}
</style>
<style>
h1 {
  color: black;
  font-size: 30px;
   line-height: 4pt;
}
h2 {
  color: black;
  font-size: 20px;
   line-height: 4pt;
}
p {
	color: black;
	font-family: arial;
	font-size: 18px;
	 line-height: 19pt;
}
div {
	color: black;
	font-family: arial;
	font-size: 14px;
	line-height: 14pt;
	text-align: justify;
}
</style>
</head>

<body leftmargin="00" topmargin="0" marginwidth="0" marginheight="0">
<table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="1090" valign="top" class="khalfia"><table width="620" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
      <tr>
        <td height="220" align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><h1><strong> <?php echo $row_Recordset1['form_type']; ?></strong></h1></td>
      </tr>
      <tr>
        <td><table width="100%" align="center" cellpadding="2" cellspacing="2">
          <tr>
            <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center"><p><strong><?php echo $row_Recordset1['text1']; ?></strong></p></td>
                </tr>
          </table></td>
            </tr>
        </table></td>
      </tr>
      <tr valign="top">
        <td><table width="100%" border="0" cellpadding="2" cellspacing="2">
          <tr align="center" valign="top">
            <td width="100"><table width="130" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td height="130"><strong><img src="https://chart.googleapis.com/chart?chs=300x300&amp;cht=qr&amp;chl=https://sport-tower.com/sadmin/validationm.php?id=<?php echo $row_Recordset1['id']; ?>&amp;icon=" alt="Energy Fitness Center" width="130" height="130" border="0" title="Energy Fitness Center"%2F&choe=UTF-8&quot; /></strong></td>
              </tr>
            </table></td>
            <td align="right"><table width="100%" border="0" cellspacing="4" cellpadding="4">
              <tr>
                <td><div><strong><?php echo $row_Recordset1['text2']; ?></strong></div></td>
              </tr>
            </table></td>
            <td width="130"><table width="130" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td height="130" align="center" valign="middle"><strong><img src="../photo/<?php echo $row_Recordset1['per_img']; ?>" alt="" width="100" height="100" /></strong></td>
              </tr>
            </table></td>
          </tr>
          <tr align="center" valign="top">
            <td colspan="2" align="right"><table border="0" cellspacing="4" cellpadding="4">
              <tr>
                <td align="right" nowrap="nowrap"><strong>عليه يؤذن للعضو:</strong></td>
                <td align="right" nowrap="nowrap"><strong style="font-size:19px"><?php echo $row_Recordset1['saidly_name']; ?></strong></td>
                <td align="right" nowrap="nowrap"><strong>رقم العضوية:</strong></td>
                <td align="right" nowrap="nowrap"><strong><strong style="font-size:19px"><?php echo $row_Recordset1['saydly_id']; ?></strong></strong></td>
              </tr>
              <tr>
                <td align="right" nowrap="nowrap"><strong>صاحب ترخيص:</strong></td>
                <td colspan="3" align="right"><strong style="font-size:19px"><?php echo $row_Recordset1['job_name']; ?></strong></td>
                </tr>
              <tr>
                <td align="right" nowrap="nowrap"><strong>بتوظيف السيد: &nbsp;</strong></td>
                <td align="right" nowrap="nowrap"><strong style="font-size:19px"><?php echo $row_Recordset1['mowazafname']; ?></strong></td>
                <td align="right" nowrap="nowrap"><strong>رقم تسلسل: &nbsp;</strong></td>
                <td align="right" nowrap="nowrap"><strong style="font-size:19px"><?php echo $row_Recordset1['id']; ?></strong></td>
              </tr>
              <tr>
                <td align="right" nowrap="nowrap"><strong>ومؤهله: &nbsp;</strong></td>
                <td align="right" nowrap="nowrap"><strong style="font-size:19px"><?php echo $row_Recordset1['mowazafstudy']; ?></strong></td>
                <td align="right" nowrap="nowrap"><strong>لمزاولة مهنة: </strong></td>
                <td align="right" nowrap="nowrap"><strong style="font-size:19px"><?php echo $row_Recordset1['mowazafjob']; ?></strong></td>
              </tr>
            </table></td>
            <td><table width="130" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td height="130" align="center" valign="middle"><strong><img src="../photo/<?php echo $row_Recordset1['mowazafpic']; ?>" alt="" width="100" height="100" /></strong></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td colspan="3" valign="top"><p>للعمل تحت اشرافه وينتهي  صلاحيته بتاريخ : <strong><?php echo $row_Recordset1['mowazafexdate']; ?> </strong> <strong>، وقد تم دفع الرسوم بسند رقم <?php echo $row_Recordset1['mowazafesal']; ?>.<br />
                *  يلغى في  حالة مخالفة القوانين والنظام الأساسي للفرع </strong></p>
              <table width="300" align="left" cellpadding="0" cellspacing="0" dir="rtl">
                <tr>
                  <td align="center"><p><strong> يعتمد،<br />
                    رئيس اللجنة التسييرية للفرع العامة للصيادلة<br />
                    <br />
                    <?php echo $row_Recordset1['nakeb_name']; ?> <br />
                    </strong></p></td>
                  </tr>
              </table>
              <p align="center" dir="rtl">&nbsp;</p></td>
          </tr>
          <tr>
            <td colspan="3" valign="top">حرر بواسطة: <?php echo $row_Recordset1['print_by']; ?></td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
