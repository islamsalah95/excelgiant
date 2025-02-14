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

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM category ORDER BY id ASC";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$maxRows_Recordset2 = 12;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

$colname_Recordset2 = "-1";
if (isset($_GET['category'])) {
  $colname_Recordset2 = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM products WHERE category = %s", GetSQLValueString($colname_Recordset2, "text"));
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysqli_query($connection,$query_limit_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysqli_query($connection,$query_Recordset2);
  $totalRows_Recordset2 = mysqli_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;

$colname_Recordset3 = "-1";
if (isset($_GET['category'])) {
  $colname_Recordset3 = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = sprintf("SELECT * FROM category WHERE categoryName = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset5 = "SELECT * FROM storeinfo ORDER BY id ASC";
$Recordset5 = mysqli_query($connection,$query_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

$maxRows_Recordset11 = 5;
$pageNum_Recordset11 = 0;
if (isset($_GET['pageNum_Recordset11'])) {
  $pageNum_Recordset11 = $_GET['pageNum_Recordset11'];
}
$startRow_Recordset11 = $pageNum_Recordset11 * $maxRows_Recordset11;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset11 = "SELECT * FROM oroudpro ORDER BY RAND()";
$query_limit_Recordset11 = sprintf("%s LIMIT %d, %d", $query_Recordset11, $startRow_Recordset11, $maxRows_Recordset11);
$Recordset11 = mysqli_query($connection,$query_limit_Recordset11) or die(mysqli_error($connection));
$row_Recordset11 = mysqli_fetch_assoc($Recordset11);

if (isset($_GET['totalRows_Recordset11'])) {
  $totalRows_Recordset11 = $_GET['totalRows_Recordset11'];
} else {
  $all_Recordset11 = mysqli_query($connection,$query_Recordset11);
  $totalRows_Recordset11 = mysqli_num_rows($all_Recordset11);
}
$totalPages_Recordset11 = ceil($totalRows_Recordset11/$maxRows_Recordset11)-1;

$maxRows_Recordset4 = 5;
$pageNum_Recordset4 = 0;
if (isset($_GET['pageNum_Recordset4'])) {
  $pageNum_Recordset4 = $_GET['pageNum_Recordset4'];
}
$startRow_Recordset4 = $pageNum_Recordset4 * $maxRows_Recordset4;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset4 = "SELECT * FROM oroudpro ORDER BY id DESC";
$query_limit_Recordset4 = sprintf("%s LIMIT %d, %d", $query_Recordset4, $startRow_Recordset4, $maxRows_Recordset4);
$Recordset4 = mysqli_query($connection,$query_limit_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);

if (isset($_GET['totalRows_Recordset4'])) {
  $totalRows_Recordset4 = $_GET['totalRows_Recordset4'];
} else {
  $all_Recordset4 = mysqli_query($connection,$query_Recordset4);
  $totalRows_Recordset4 = mysqli_num_rows($all_Recordset4);
}
$totalPages_Recordset4 = ceil($totalRows_Recordset4/$maxRows_Recordset4)-1;

$maxRows_Recordset6 = 10;
$pageNum_Recordset6 = 0;
if (isset($_GET['pageNum_Recordset6'])) {
  $pageNum_Recordset6 = $_GET['pageNum_Recordset6'];
}
$startRow_Recordset6 = $pageNum_Recordset6 * $maxRows_Recordset6;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset6 = "SELECT * FROM products ORDER BY RAND()";
$query_limit_Recordset6 = sprintf("%s LIMIT %d, %d", $query_Recordset6, $startRow_Recordset6, $maxRows_Recordset6);
$Recordset6 = mysqli_query($connection,$query_limit_Recordset6) or die(mysqli_error($connection));
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);

if (isset($_GET['totalRows_Recordset6'])) {
  $totalRows_Recordset6 = $_GET['totalRows_Recordset6'];
} else {
  $all_Recordset6 = mysqli_query($connection,$query_Recordset6);
  $totalRows_Recordset6 = mysqli_num_rows($all_Recordset6);
}
$totalPages_Recordset6 = ceil($totalRows_Recordset6/$maxRows_Recordset6)-1;

$queryString_Recordset2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset2") == false && 
        stristr($param, "totalRows_Recordset2") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset2 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset2 = sprintf("&totalRows_Recordset2=%d%s", $totalRows_Recordset2, $queryString_Recordset2);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $row_Recordset5['first_name']; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Primary Meta Tags -->
<title>شركة فور كي للأنظمة الأمنية وكاميرات المراقبة</title>
<meta name="title" content="شركة فور كي للأنظمة الأمنية وكاميرات المراقبة" />
<meta name="description" content="شركة فور كي للأنظمة الأمنية وكاميرات المراقبة -السويس - موبايل 66634818 - اطلب الأدوية من خلال موقعنا الالكتروني" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="https://excelgiants.site/" />
<meta property="og:title" content="شركة فور كي للأنظمة الأمنية وكاميرات المراقبة" />
<meta property="og:description" content="شركة فور كي للأنظمة الأمنية وكاميرات المراقبة -السويس - موبايل 66634818 - اطلب الأدوية من خلال موقعنا الالكتروني" />
<meta property="og:image" content="https://excelgiants.site/imageslydia.jpg" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="https://excelgiants.site/" />
<meta property="twitter:title" content="شركة فور كي للأنظمة الأمنية وكاميرات المراقبة" />
<meta property="twitter:description" content="شركة فور كي للأنظمة الأمنية وكاميرات المراقبة -السويس - موبايل 66634818 - اطلب الأدوية من خلال موقعنا الالكتروني" />
<meta property="twitter:image" content="https://excelgiants.site/imageslydia.jpg" />

<!-- Meta Tags Generated with https://metatags.io -->
<meta name="title" content="شركة فور كي للأنظمة الأمنية وكاميرات المراقبة">
<meta name="description" content="شركة فور كي للأنظمة الأمنية وكاميرات المراقبة -السويس - موبايل 66634818 - اطلب الأدوية من خلال موقعنا الالكتروني">
<meta name="keywords" content="صيدلية, مستحضرات تجميل, , شركة فور كي للأنظمة الأمنية وكاميرات المراقبة">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="Arabic">
<meta name="revisit-after" content="1 days">
<meta name="author" content="دكتور دميان مرقص 01005468353">
<meta property="og:image" content="https://excelgiants.site/logo.png" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- Topbar Start -->


<style>
.iconat-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  z-index:999;
}

.iconat-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.iconat-bar a:hover {
  background-color: #000;
}

.watsapp {
  background: #55ACEE;
  color: white;
}

.call {
  background: #4fca5d;
  color: white;
}

</style>

<div class="iconat-bar">
  <a href="tel:66634818" class="watsapp" title="اتصل بنا"><i class="fa fa-phone"></i></a> 
  <a href="https://wa.me/+96566634818" class="call" target="_new" title="راسلنا على الواتساب"><i class="fa fa-whatsapp"></i></a> 
</div>

    <div class="container-fluid">
        
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="index.php" class="text-decoration-none">
                <img src="finallogo.png" height="150"> </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="search.php" method="get">
                    <div class="input-group">
                        <input name="productName" type="text" class="form-control" id="productName" placeholder="البحث عن المنتجات">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                  </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">خدمة العملاء</p>
                <h5 class="m-0">66634818</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>الفئات</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <?php do { ?>
                    <div class="navbar-nav w-100">
                        <a href="category.php?category=<?php echo $row_Recordset1['categoryName']; ?>" class="nav-item nav-link"><?php echo $row_Recordset1['categoryName']; ?></a>
                    </div>
                      <?php } while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1)); ?>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0"> <a href="" class="text-decoration-none d-block d-lg-none"> <img src="finallogo1.png" height="100"> </a><form action="search.php" method="get">
                    <div class="input-group">
                        <input name="productName" type="text" class="form-control" id="productName" placeholder="البحث عن المنتجات">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                  </div>
                </form>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                          <a href="index.php" class="nav-item nav-link active">الرئيسية</a>
<a href="about.php" class="nav-item nav-link">تعرف علينا</a>
<a href="contact.php" class="nav-item nav-link">اتصل بنا</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="" class="btn px-0">
                                <i class="fas fa-heart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                            <a href="" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
          </div>
        </div>
    </div>
    <!-- Navbar End -->



    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">الرئيسية</a>
                    <span class="breadcrumb-item active"><?php echo $row_Recordset2['category']; ?></span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">عروض الوسيط</span></h5>
                <div class="bg-light p-4 mb-30">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" dir="rtl">
                    <?php do { ?>
                    <tr>
                      <td align="right"><a href="detailorod.php?id=<?php echo $row_Recordset11['id']; ?>"><?php echo $row_Recordset11['productName']; ?></a></td>
                      <td align="left"><img src="https://new.excelgiants.site/img/<?php echo $row_Recordset11['image']; ?>" width="100" ></td>
                    </tr>
                      <?php } while ($row_Recordset11 = mysqli_fetch_assoc($Recordset11)); ?>
                  </table>
  
                </div>
                <!-- Price End -->
                
                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">احدث العروض</span></h5>
                <div class="bg-light p-4 mb-30">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" dir="rtl">
                      <?php do { ?>
                        <tr>
                          <td align="right"><a href="detailorod.php?id=<?php echo $row_Recordset4['id']; ?>"><?php echo $row_Recordset4['productName']; ?></a></td>
                          <td align="left"><img src="https://new.excelgiants.site/img/<?php echo $row_Recordset4['image']; ?>" width="100" ></td>
                        </tr>
                        <?php } while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4)); ?>
                    </table>
              </div>
                <!-- Color End -->

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">اصناف أخرى من الوسيط</span></h5>
                <div class="bg-light p-4 mb-30">
                   <table width="100%" border="0" cellpadding="0" cellspacing="0" dir="rtl">
                     <?php do { ?>
  <tr>
    <td align="right"><a href="detail.php?id=<?php echo $row_Recordset6['id']; ?>"><?php echo $row_Recordset6['productName']; ?></a></td>
    <td align="left"><img src="https://new.excelgiants.site/img/<?php echo $row_Recordset6['image']; ?>" width="100" ></td>
  </tr>
  <?php } while ($row_Recordset6 = mysqli_fetch_assoc($Recordset6)); ?>
                   </table> 
              </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                  <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
<table width="250" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center"><img class="img-fluid w-100" src="https://new.excelgiants.site/img/<?php echo $row_Recordset3['image']; ?>" alt=""></td>
  </tr>
  <tr>
    <td align="center"><h2><?php echo $row_Recordset3['categoryName']; ?></h2></td>
  </tr>
</table>

                            
                    </div>
                    </div>
                    <?php do { ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                          <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="https://new.excelgiants.site/img/<?php echo $row_Recordset2['image']; ?>" alt="">
                            <div class="product-action">
                              <a class="btn btn-outline-dark btn-square" href="https://api.whatsapp.com/send?phone=+96566634818&text=طلب شراء صنف من شركة فور كي للأنظمة الأمنية وكاميرات المراقبة - اسم الصنف : <?php echo $row_Recordset2['productName']; ?>. السعر : <?php echo $row_Recordset2['productPrice']; ?> دينار" target="_new"><i class="fa fa-shopping-cart"></i></a>
                              
                              
                              <a class="btn btn-outline-dark btn-square" href="detail.php?id=<?php echo $row_Recordset2['id']; ?>"><i class="fa fa-eye"></i></a>
                            </div>
                          </div>
                          <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="detail.php?id=<?php echo $row_Recordset2['id']; ?>"><?php echo $row_Recordset2['productName']; ?></a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                              <h5><?php echo $row_Recordset2['productPrice']; ?></h5><h6 class="text-muted ml-2">السعر</h6> - 
                              
                            </div>
                          </div>
                      </div>
                    </div>
                      <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); ?>
<div class="col-12" dir="rtl">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
  <tr>
    <td align="right"> السجلات من <?php echo ($startRow_Recordset2 + 1) ?> إلى <?php echo min($startRow_Recordset2 + $maxRows_Recordset2, $totalRows_Recordset2) ?> من اجمالي <?php echo $totalRows_Recordset2 ?> سجلات
</td>
  </tr>
</table>

<nav>
<ul class="pagination justify-content-center">
              <li class="page-item active"><a class="page-link" href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, 0, $queryString_Recordset2); ?>">الأول</span></a></li>
              <li class="page-item"><a class="page-link" href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, max(0, $pageNum_Recordset2 - 1), $queryString_Recordset2); ?>">السابق</span></a></li>
              <li class="page-item"><a class="page-link" href="#"> . </a></li>
              <li class="page-item"><a class="page-link" href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, min($totalPages_Recordset2, $pageNum_Recordset2 + 1), $queryString_Recordset2); ?>">التالي</span></a></li>
              <li class="page-item active"><a class="page-link" href="<?php printf("%s?pageNum_Recordset2=%d%s", $currentPage, $totalPages_Recordset2, $queryString_Recordset2); ?>">الأخير</span></a></li>
              </ul>
                          
          </nav>
                  </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
      <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
          <h5 class="text-secondary text-uppercase mb-4"><?php echo $row_Recordset5['first_name']; ?></h5>
          <p class="mb-4"><?php echo $row_Recordset5['bname']; ?></p>
          <p class="mb-2"><i class="fas fa-map-marker-alt text-primary mr-3"></i><?php echo $row_Recordset5['work_place']; ?></p>
          <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i><?php echo $row_Recordset5['grad_place']; ?></p>
          <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i><?php echo $row_Recordset5['country']; ?></p>
        </div>
        <div class="col-lg-8 col-md-12">
          <div class="row">
            <div class="col-md-4 mb-5">
              <h5 class="text-secondary text-uppercase mb-4">روابط الموقع</h5>
              <div class="d-flex flex-column justify-content-start"> <a class="text-secondary mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>الرئيسية</a> <a class="text-secondary mb-2" href="about.php"><i class="fa fa-angle-right mr-2"></i>تعرف علينا</a> <a class="text-secondary" href="contact.php"><i class="fa fa-angle-right mr-2"></i>اتصل بنا</a> </div>
            </div>
            <div class="col-md-4 mb-5">
              <h5 class="text-secondary text-uppercase mb-4">حسابي</h5>
              <div class="d-flex flex-column justify-content-start"> <a class="text-secondary mb-2" href="login.php"><i class="fa fa-angle-right mr-2"></i>تسجيل الدخول</a> <a class="text-secondary mb-2" href="newaccount.php"><i class="fa fa-angle-right mr-2"></i>حساب جديد</a> </div>
            </div>
            <div class="col-md-4 mb-5">
              <h5 class="text-secondary text-uppercase mb-4">القائمة البريدية</h5>
              <p>للحصول على احدث عروضنا سجل بريدك الالكتروني</p>
              <form action="">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="ادخل بريدك الالكتروني">
                  <div class="input-group-append">
                    <button class="btn btn-primary">تسجيل</button>
                  </div>
                </div>
              </form>
              <h6 class="text-secondary text-uppercase mt-4 mb-3">تابعنا</h6>
              <div class="d-flex"> <a class="btn btn-primary btn-square mr-2" href="<?php echo $row_Recordset5['create_by']; ?>"><i class="fab fa-facebook-f"></i></a> <a class="btn btn-primary btn-square mr-2" href="<?php echo $row_Recordset5['edit_by']; ?>"><i class="fab fa-linkedin-in"></i></a> </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0" dir="rtl">
          <p class="mb-md-0 text-center text-md-left text-secondary"> &copy; <a class="text-primary" href="#"><?php echo $row_Recordset5['first_name']; ?></a>. جميع الحقوق محفوظة. تصميم وبرمجة <a href="https://dr-demian.com" target="_new" class="text-primary">دكتور/ دميان مرقص</a> </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right"> <img class="img-fluid" src="img/payments.png" alt=""> </div>
      </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset5);

mysqli_free_result($Recordset11);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset6);
?>
