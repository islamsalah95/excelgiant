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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO books (id, ServicesID, ServicesTitle, ServicesPrice, ServicesText, OrderDate, OrderName, OrderPhone, OrderAddress, OrderTown, OrderArea, OrderDetails, image, OrderFDate, OrderSDate, OrderStatus, FaniName, FaniTakiim, OrderNo) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['ServicesID'], "text"),
                       GetSQLValueString($_POST['ServicesTitle'], "text"),
                       GetSQLValueString($_POST['ServicesPrice'], "text"),
                       GetSQLValueString($_POST['ServicesText'], "text"),
                       GetSQLValueString($_POST['OrderDate'], "text"),
                       GetSQLValueString($_POST['OrderName'], "text"),
                       GetSQLValueString($_POST['OrderPhone'], "text"),
                       GetSQLValueString($_POST['OrderAddress'], "text"),
                       GetSQLValueString($_POST['OrderTown'], "text"),
                       GetSQLValueString($_POST['OrderArea'], "text"),
                       GetSQLValueString($_POST['OrderDetails'], "text"),
                       GetSQLValueString($_POST['image1'], "text"),
                       GetSQLValueString($_POST['OrderFDate'], "date"),
                       GetSQLValueString($_POST['OrderSDate'], "date"),
                       GetSQLValueString($_POST['OrderStatus'], "text"),
                       GetSQLValueString($_POST['FaniName'], "text"),
                       GetSQLValueString($_POST['FaniTakiim'], "text"),
                       GetSQLValueString($_POST['OrderNo'], "text"));

  mysqli_select_db($connection, "excelgia_mahmdata");
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "books.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_ReTopics = 10;
$pageNum_ReTopics = 0;
if (isset($_GET['pageNum_ReTopics'])) {
  $pageNum_ReTopics = $_GET['pageNum_ReTopics'];
}
$startRow_ReTopics = $pageNum_ReTopics * $maxRows_ReTopics;

$colname_ReTopics = "-1";
if (isset($_GET['id'])) {
  $colname_ReTopics = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_ReTopics = sprintf("SELECT * FROM blogs WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_ReTopics, "int"));
$query_limit_ReTopics = sprintf("%s LIMIT %d, %d", $query_ReTopics, $startRow_ReTopics, $maxRows_ReTopics);
$ReTopics = mysqli_query($connection,$query_limit_ReTopics) or die(mysqli_error($connection));
$row_ReTopics = mysqli_fetch_assoc($ReTopics);

if (isset($_GET['totalRows_ReTopics'])) {
  $totalRows_ReTopics = $_GET['totalRows_ReTopics'];
} else {
  $all_ReTopics = mysqli_query($connection,$query_ReTopics);
  $totalRows_ReTopics = mysqli_num_rows($all_ReTopics);
}
$totalPages_ReTopics = ceil($totalRows_ReTopics/$maxRows_ReTopics)-1;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = "SELECT * FROM categoryat ORDER BY id ASC";
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['category'])) {
  $colname_Recordset3 = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = sprintf("SELECT * FROM categoryat WHERE category = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$maxRows_rsmost = 3;
$pageNum_rsmost = 0;
if (isset($_GET['pageNum_rsmost'])) {
  $pageNum_rsmost = $_GET['pageNum_rsmost'];
}
$startRow_rsmost = $pageNum_rsmost * $maxRows_rsmost;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsmost = "SELECT * FROM blogs ORDER BY id DESC";
$query_limit_rsmost = sprintf("%s LIMIT %d, %d", $query_rsmost, $startRow_rsmost, $maxRows_rsmost);
$rsmost = mysqli_query($connection,$query_limit_rsmost) or die(mysqli_error($connection));
$row_rsmost = mysqli_fetch_assoc($rsmost);

if (isset($_GET['totalRows_rsmost'])) {
  $totalRows_rsmost = $_GET['totalRows_rsmost'];
} else {
  $all_rsmost = mysqli_query($connection,$query_rsmost);
  $totalRows_rsmost = mysqli_num_rows($all_rsmost);
}
$totalPages_rsmost = ceil($totalRows_rsmost/$maxRows_rsmost)-1;

$maxRows_rsviewed = 10;
$pageNum_rsviewed = 0;
if (isset($_GET['pageNum_rsviewed'])) {
  $pageNum_rsviewed = $_GET['pageNum_rsviewed'];
}
$startRow_rsviewed = $pageNum_rsviewed * $maxRows_rsviewed;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsviewed = "SELECT * FROM blogs ORDER BY id ASC";
$query_limit_rsviewed = sprintf("%s LIMIT %d, %d", $query_rsviewed, $startRow_rsviewed, $maxRows_rsviewed);
$rsviewed = mysqli_query($connection,$query_limit_rsviewed) or die(mysqli_error($connection));
$row_rsviewed = mysqli_fetch_assoc($rsviewed);

if (isset($_GET['totalRows_rsviewed'])) {
  $totalRows_rsviewed = $_GET['totalRows_rsviewed'];
} else {
  $all_rsviewed = mysqli_query($connection,$query_rsviewed);
  $totalRows_rsviewed = mysqli_num_rows($all_rsviewed);
}
$totalPages_rsviewed = ceil($totalRows_rsviewed/$maxRows_rsviewed)-1;

$maxRows_rsrecent = 10;
$pageNum_rsrecent = 0;
if (isset($_GET['pageNum_rsrecent'])) {
  $pageNum_rsrecent = $_GET['pageNum_rsrecent'];
}
$startRow_rsrecent = $pageNum_rsrecent * $maxRows_rsrecent;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsrecent = "SELECT * FROM blogs ORDER BY id DESC";
$query_limit_rsrecent = sprintf("%s LIMIT %d, %d", $query_rsrecent, $startRow_rsrecent, $maxRows_rsrecent);
$rsrecent = mysqli_query($connection,$query_limit_rsrecent) or die(mysqli_error($connection));
$row_rsrecent = mysqli_fetch_assoc($rsrecent);

if (isset($_GET['totalRows_rsrecent'])) {
  $totalRows_rsrecent = $_GET['totalRows_rsrecent'];
} else {
  $all_rsrecent = mysqli_query($connection,$query_rsrecent);
  $totalRows_rsrecent = mysqli_num_rows($all_rsrecent);
}
$totalPages_rsrecent = ceil($totalRows_rsrecent/$maxRows_rsrecent)-1;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM categoryat ORDER BY id ASC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset4 = "SELECT * FROM categoryat ORDER BY id ASC";
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$maxRows_Recordset5 = 5;
$pageNum_Recordset5 = 0;
if (isset($_GET['pageNum_Recordset5'])) {
  $pageNum_Recordset5 = $_GET['pageNum_Recordset5'];
}
$startRow_Recordset5 = $pageNum_Recordset5 * $maxRows_Recordset5;

$colname_Recordset5 = "-1";
if (isset($_GET['category'])) {
  $colname_Recordset5 = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset5 = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset5, "text"));
$query_limit_Recordset5 = sprintf("%s LIMIT %d, %d", $query_Recordset5, $startRow_Recordset5, $maxRows_Recordset5);
$Recordset5 = mysqli_query($connection,$query_limit_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);

if (isset($_GET['totalRows_Recordset5'])) {
  $totalRows_Recordset5 = $_GET['totalRows_Recordset5'];
} else {
  $all_Recordset5 = mysqli_query($connection,$query_Recordset5);
  $totalRows_Recordset5 = mysqli_num_rows($all_Recordset5);
}
$totalPages_Recordset5 = ceil($totalRows_Recordset5/$maxRows_Recordset5)-1;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_RsInfo = "SELECT * FROM siteinfo ORDER BY id DESC";
$RsInfo = mysqli_query($connection,$query_RsInfo) or die(mysqli_error($connection));
$row_RsInfo = mysqli_fetch_assoc($RsInfo);
$totalRows_RsInfo = mysqli_num_rows($RsInfo);

$colname_Recordset6 = "-1";
if (isset($_GET['category'])) {
  $colname_Recordset6 = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset6 = sprintf("SELECT * FROM categoryat WHERE id = %s", GetSQLValueString($colname_Recordset6, "int"));
$Recordset6 = mysqli_query($connection,$query_Recordset6) or die(mysqli_error($connection));
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysqli_num_rows($Recordset6);

$colname_Recordset7 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset7 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset7 = sprintf("SELECT * FROM blogs WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_Recordset7, "int"));
$Recordset7 = mysqli_query($connection,$query_Recordset7) or die(mysqli_error($connection));
$row_Recordset7 = mysqli_fetch_assoc($Recordset7);
$totalRows_Recordset7 = mysqli_num_rows($Recordset7);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset8 = "SELECT * FROM categoryat";
$Recordset8 = mysqli_query($connection,$query_Recordset8) or die(mysqli_error($connection));
$row_Recordset8 = mysqli_fetch_assoc($Recordset8);
$totalRows_Recordset8 = mysqli_num_rows($Recordset8);

$queryString_ReTopics = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_ReTopics") == false && 
        stristr($param, "totalRows_ReTopics") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_ReTopics = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_ReTopics = sprintf("&totalRows_ReTopics=%d%s", $totalRows_ReTopics, $queryString_ReTopics);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة التحكم</title>
<style type="text/css">
.page-wrapper .body .body-wrapper .content .container.callout.standard .twelve.columns h2 {
	color: #DC4403;
}
</style>
<style>
.button-73 {
  appearance: none;
  background-color: #FFFFFF;
  border-radius: 40em;
  border-style: none;
  box-shadow: #ADCFFF 0 -12px 6px inset;
  box-sizing: border-box;
  color: #000000;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,sans-serif;
  font-size: 1.2rem;
  font-weight: 700;
  letter-spacing: -.24px;
  margin: 0;
  outline: none;
  padding: 1rem 1.3rem;
  quotes: auto;
  text-align: center;
  text-decoration: none;
  transition: all .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-73:hover {
  background-color: #FFC229;
  box-shadow: #FF6314 0 -6px 8px inset;
  transform: scale(1.125);
}

.button-73:active {
  transform: scale(1.025);
}

@media (min-width: 768px) {
  .button-73 {
    font-size: 1.5rem;
    padding: .75rem 2rem;
  }
}
.button-731 {  appearance: none;
  background-color: #FFFFFF;
  border-radius: 40em;
  border-style: none;
  box-shadow: #ADCFFF 0 -12px 6px inset;
  box-sizing: border-box;
  color: #000000;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,sans-serif;
  font-size: 1.2rem;
  font-weight: 700;
  letter-spacing: -.24px;
  margin: 0;
  outline: none;
  padding: 1rem 1.3rem;
  quotes: auto;
  text-align: center;
  text-decoration: none;
  transition: all .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
.button-731 {    font-size: 1.5rem;
    padding: .75rem 2rem;
}
.button-732 {  appearance: none;
  background-color: #FFFFFF;
  border-radius: 40em;
  border-style: none;
  box-shadow: #ADCFFF 0 -12px 6px inset;
  box-sizing: border-box;
  color: #000000;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,sans-serif;
  font-size: 1.2rem;
  font-weight: 700;
  letter-spacing: -.24px;
  margin: 0;
  outline: none;
  padding: 1rem 1.3rem;
  quotes: auto;
  text-align: center;
  text-decoration: none;
  transition: all .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}
.button-732 {    font-size: 1.5rem;
    padding: .75rem 2rem;
}
</style>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 90%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}


.containerform {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 5px;
}

.col-25 {
  float: right;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: right;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 90%;
    margin-top: 0;
  }
}
.col-251 {    width: 90%;
    margin-top: 0;
}
.col-751 {  float: right;
  width: 75%;
  margin-top: 6px;
}
.col-751 {    width: 90%;
    margin-top: 0;
}
</style>
<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("pdf","PDF");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a PDF or pdf file.";
      }
      
      if($file_size > 12097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../books/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
</head>

<body>
<?php include 'header.php'; ?>
<form id="registrationForm" novalidate="novalidate">
  <div>
                                      <div>
                                        <div>
                                          <div></div>
                                        </div>
                                      </div>
  </div>
</form>
                                </div>
                                <br />
                              <div class="containerform">
                                <form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="row">
									<div class="col-25">
        								<label for="fname">عنوان الكتاب:</label>
      								</div>
                                    <div class="col-75">
                                        <input type="text" name="OrderName" value="" size="32" required/>
                                    </div>
                                </div>
                                <div class="row">
									<div class="col-25">
        								<label for="fname">فترة التدريب:</label>
      								</div><div class="col-75">
                                        <input type="text" name="OrderAddress" value="" size="32" required/>
                                    </div>
                                </div>
                                <div class="row">
								  <div class="col-25">ملف الكتاب:</div><div class="col-75">
      								  <input name="image1" id="image1" value="" size="32" />
              <input type = "file" name="image" id="image" onchange="updateFileName1()" />
              <script>
                function updateFileName1() {
                    var image = document.getElementById('image');
                    var image1 = document.getElementById('image1');
                    var fileNameIndex = image.value.lastIndexOf("\\");
            
                    image1.value = image.value.substring(fileNameIndex + 1);
                }
            </script></div>
                                </div>    
                                <div class="row">
									<div class="col-25">
        								<label for="fname">عنوان الكورس  :</label>
      								</div>
                                    <div class="col-75">
                                      <input name="OrderSDate" type="text" required="required" value="" size="50" />
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="submit" class="button-73" value="إرسال" />
                                </div>
                                      <span class="col-751">
                                      <input type="hidden" name="OrderFDate" value="" size="32"/>
                                      </span>
                                      <input type="hidden" name="OrderStatus" value="طلب لم يؤكد" size="32" />
                                      <input type="hidden" name="ServicesPrice" value="<?php echo $row_Recordset7['samary']; ?>" size="32" />
                                      <input type="hidden" name="ServicesID" value="<?php echo $row_Recordset7['id']; ?>" size="32" />
                                      <input type="hidden" name="ServicesText" value="<?php echo $row_Recordset7['category']; ?>" size="32" />
                                      <input name="OrderDate" type="hidden" value="<?php echo date("Y-m-d"); ?>" size="32" />
                                      <input type="hidden" name="FaniName" value="" size="32" />
                                      <input type="hidden" name="FaniTakiim" value="" size="32" />
                                      <input type="hidden" name="ServicesTitle" value="<?php echo $row_Recordset7['title']; ?>" size="32" />
                                      <input type="hidden" name="OrderNo" value="<?php echo date("YmdHms"); ?>" size="32" />                                      <input type="hidden" name="id" value="" />
                                  	  <input type="hidden" name="MM_insert" value="form1" />
                                      
                                      
                                      
                                      
                                      <br />
                                      <br />
                                      <br />
                                      <br />
                                </form>
        
    <script type="text/javascript">
        $(document).ready(function() {
            $('.slidewrap2').carousel({
                slider: '.slider',
                slide: '.slide',
                slideHed: '.slidehed',
                nextSlide : '.next',
                prevSlide : '.prev',
                addPagination: false,
                addNav : false
            });
            $(window).load(function(){
                 $("a[class^='prettyPhoto']").prettyPhoto({social_tools: '' });
            });
        });
    </script>
	<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
    <script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/EmpiricalThemes.json?callback=twitterCallback2&count=2"></script>

	</div>
</body>

</html>
<?php
mysqli_free_result($ReTopics);

mysqli_free_result($Recordset5);

mysqli_free_result($RsInfo);

mysqli_free_result($Recordset6);

mysqli_free_result($Recordset7);

mysqli_free_result($Recordset8);
?>
