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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 50;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM form1 ORDER BY id DESC";
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
<title>لوحة التحكم</title>
<style type="text/css">

    body {
        width: 100%;
        margin: 0;
        padding: 0;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
	width: 85mm;
	height: 55mm;
	padding: 0mm;
	background: white;
	margin-top: 0mm;
	margin-right: 0px;
	margin-bottom: 0mm;
	margin-left: 0px;
    }
    .subpage {
	height: 55mm;
	outline: 0cm #FFEAEA solid;
	padding-top: 2.5mm;
	padding-right: 0cm;
	padding-bottom: 0cm;
	padding-left: 0cm;
    }
    
    @page {
        size: CR80;
        margin: 0;
    }
    @media print {
        html, body {
        	size: CR80;
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
	        height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }

.khalfia {
	background-image: url(back.jpg);
	background-repeat: no-repeat;
	background-position: center top;
}

h1 {
  color: black;
  font-size: 25px;
   line-height: 10pt;
}
h2 {
	color: black;
	font-family:"Times New Roman", Times, serif
	font-size: 18px;
	font-weight:bolder;
	line-height: 5pt;

}
p {
	color: black;
	font-family:"Times New Roman", Times, serif
	font-size: 14px;
	font-weight:bolder;
	 line-height: 1pt;
}
div {
	color: black;
	font-family: arial;
	font-size: 15px;
	line-height: 15pt;
	text-align: justify;
}



#IDBorder {
}

td, th {
    border-left:solid black 0px;
    border-top:solid black 0px;
}

th {
    background-color: blue;
    border-top: none;
}

td:first-child, th:first-child {
     border-left: none;
}



.IDBack {
	background-image: url(id.jpg);
	background-repeat: no-repeat;
	background-position: center top;
}
</style>
</head>

<body leftmargin="00" topmargin="0" marginwidth="0" marginheight="0">

<div class="book">
        <div class="subpage">
          <table border="0" align="center" cellpadding="4" cellspacing="4" dir="rtl">
            <tr>
              <td align="center"><button onclick="history.back()">تعديل</button></td>
              <td align="center">&nbsp;</td>
              <td align="center"><a href="form4_fprint.php">
                <button>طباعة</button>
              </a></td>
            </tr>
          </table>
          <table id="IDBorder" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table border="0" align="center" cellpadding="2" cellspacing="2" dir="rtl">
                <tr bgcolor="#FFFFFF">
                  <td align="center" valign="top"><table width="308" border="0" cellspacing="0" cellpadding="0">
                    <tr valign="top">
                      <td width="227"><h2 align="center"><strong>مجلس النواب الليبي<br />
                        <br /><br />
                      </strong><strong>لوحة التحكم</strong></h2>
                        <p>د. صيدلي: <strong><?php echo $row_Recordset1['saidly_name']; ?></strong></p>
                        <p>العضوية: <strong><?php echo $row_Recordset1['activity_name']; ?></strong></p>
                        <p>النشاط: <strong><?php echo $row_Recordset1['job_name']; ?></strong></p>
                        <p>النقابة الفرعية: <strong><?php echo $row_Recordset1['nekaba_name']; ?></strong></p>
                        <p>اسم الدخول: <strong><?php echo $row_Recordset1['text3']; ?></strong></p>
                        <p>مسلسل: <strong><?php echo $row_Recordset1['nekaba']; ?></strong></p>
                        <p>انتهاء الصلاحية: <strong><?php echo $row_Recordset1['exp_date']; ?></strong></p></td>
                      <td width="80" align="center"><table width="90" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="90" align="center" valign="middle"><strong><img src="../img/<?php echo $row_Recordset1['per_img']; ?>" alt="" width="80" height="80" /></strong></td>
                        </tr>
                      </table>
                        <table width="80" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="80" align="center" valign="middle"><strong><img src="https://chart.googleapis.com/chart?chs=300x300&amp;cht=qr&amp;chl=https://libyanpharmacists.com/users/validation.php?id=<?php echo $row_Recordset1['nekaba']; ?>&amp;icon=" alt="لوحة التحكم" width="85" height="85" border="0" title="لوحة التحكم"%2F&choe=UTF-8&quot; /></strong></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>    
        <div class="subpage">
          <table width="316" border="0" align="center" cellpadding="0" cellspacing="0" class="IDBack" id="IDBorder">
            <tr>
              <td><table width="308" border="0" cellpadding="0" cellspacing="0" dir="rtl">
                <tr valign="top">
                  <td width="227" height="90" valign="top"><table width="80%" border="0" align="right" cellpadding="0" cellspacing="0" dir="rtl">
                    <tr>
                      <td height="40" align="center"><h2><strong>مجلس النواب الليبي<br />
                        <br />
                            <br />
                      </strong><strong>لوحة التحكم</strong></h2></td>
                    </tr>
                    <tr>
                      <td align="center"><strong><?php echo $row_Recordset1['saidly_name']; ?></strong></td>
                    </tr>
                    <tr>
                      <td align="center"><strong><?php echo $row_Recordset1['nekaba']; ?></strong></td>
                    </tr>
                    <tr>
                      <td align="center"><p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p>
                      <p>&nbsp;</p></td>
                    </tr>
                  </table></td>
                  <td width="80" align="center">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table>
        </div>    
</div>
</body>
</html>
<?php
mysqli_free_result($Recordset1);
?>
