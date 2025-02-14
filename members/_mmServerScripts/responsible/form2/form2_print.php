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
$query_Recordset1 = sprintf("SELECT * FROM form1 WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset1, "int"));
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
</head>

<body>
<table width="95%" border="0" align="center" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h1><strong>نموذج إفادة بمدة الخبرة العملية </strong></h1></td>
  </tr>
  <tr>
    <td><table width="100%" align="center">
      <tr>
        <td width="30%" align="left"><h3>للعمل</h3></td>
        <td width="50%"><table width="80%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center"><h3><?php echo $row_Recordset1['text1']; ?></h3></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%">
      <tr align="center" valign="middle">
        <td width="100"><img src="https://chart.googleapis.com/chart?chs=300x300&amp;cht=qr&amp;chl=https://sport-tower.com&amp;icon=" alt="Energy Fitness Center" width="130" height="130" title="Energy Fitness Center"%2F&choe=UTF-8&quot; /></td>
        <td align="right" valign="top"><h3><?php echo $row_Recordset1['text2']; ?></h3></td>
        <td width="100"><img src="photo/<?php echo $row_Recordset1['per_img']; ?>" width="100" height="130" /></td>
      </tr>
      <tr>
        <td colspan="3"><table width="90%" align="center">
          <tr>
            <td align="right"><h3><span dir="rtl">عليه يؤذن للعضو&nbsp;: <?php echo $row_Recordset1['saidly_name']; ?></span></h3></td>
            </tr>
          <tr>
            <td align="right"><h3><span dir="rtl">بمزاولة مهنة الصيدلة&nbsp;<strong>بوظيفة : </strong></span><?php echo $row_Recordset1['job_name']; ?> بـ <?php echo $row_Recordset1['activity_name']; ?></h3></td>
            </tr>
        </table></td>
        </tr>
      <tr>
        <td colspan="3"><table width="100%" align="center">
          <tr>
            <td width="30%" align="left"><h3>الكائنة: </h3></td>
            <td width="50%"><table width="80%" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center"><h3><?php echo $row_Recordset1['text3']; ?></h3></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="3"><h3 dir="rtl">وينتهي  صلاحيته بتاريخ : <?php echo $row_Recordset1['exp_date']; ?> &nbsp;- وأن رقم قيده بالفرع العامة  للصيادلة :&nbsp;<strong><?php echo $row_Recordset1['nekaba']; ?></strong></h3></td>
      </tr>
      <tr>
        <td colspan="3"><ul>
          <li>
            <h3><span dir="rtl"> </span><strong>يلغى في  حالة مخالفة القوانين والنظام الأساسي للفرع</strong></h3>
          </li>
        </ul></td>
      </tr>
      <tr>
        <td colspan="3"><table width="400" align="left" cellpadding="0" cellspacing="0" dir="rtl">
          <tr>
            <td><h3><strong>يعتمد،</strong></h3></td>
          </tr>
          <tr>
            <td align="center"><h3>الفرع </h3></td>
          </tr>
          <tr>
            <td align="center"><h3><?php echo $row_Recordset1['nakeb_name']; ?></h3></td>
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
