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

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = "SELECT * FROM siteinfo";
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = "SELECT * FROM categoryat ORDER BY id ASC";
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$maxRows_Recordset3 = 10;
$pageNum_Recordset3 = 0;
if (isset($_GET['pageNum_Recordset3'])) {
  $pageNum_Recordset3 = $_GET['pageNum_Recordset3'];
}
$startRow_Recordset3 = $pageNum_Recordset3 * $maxRows_Recordset3;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = "SELECT * FROM blogs ORDER BY id ASC";
$query_limit_Recordset3 = sprintf("%s LIMIT %d, %d", $query_Recordset3, $startRow_Recordset3, $maxRows_Recordset3);
$Recordset3 = mysqli_query($connection,$query_limit_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);

if (isset($_GET['totalRows_Recordset3'])) {
  $totalRows_Recordset3 = $_GET['totalRows_Recordset3'];
} else {
  $all_Recordset3 = mysqli_query($connection,$query_Recordset3);
  $totalRows_Recordset3 = mysqli_num_rows($all_Recordset3);
}
$totalPages_Recordset3 = ceil($totalRows_Recordset3/$maxRows_Recordset3)-1;

$maxRows_Recordset4 = 10;
$pageNum_Recordset4 = 0;
if (isset($_GET['pageNum_Recordset4'])) {
  $pageNum_Recordset4 = $_GET['pageNum_Recordset4'];
}
$startRow_Recordset4 = $pageNum_Recordset4 * $maxRows_Recordset4;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset4 = "SELECT * FROM blogs ORDER BY id DESC";
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

$maxRows_Recordset5 = 10;
$pageNum_Recordset5 = 0;
if (isset($_GET['pageNum_Recordset5'])) {
  $pageNum_Recordset5 = $_GET['pageNum_Recordset5'];
}
$startRow_Recordset5 = $pageNum_Recordset5 * $maxRows_Recordset5;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset5 = "SELECT * FROM blogs ORDER BY id DESC";
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

$colname_Recordset6 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset6 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset6 = sprintf("SELECT * FROM blogs WHERE id = %s", GetSQLValueString($colname_Recordset6, "int"));
$Recordset6 = mysqli_query($connection,$query_Recordset6) or die(mysqli_error($connection));
$row_Recordset6 = mysqli_fetch_assoc($Recordset6);
$totalRows_Recordset6 = mysqli_num_rows($Recordset6);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $row_Recordset1['first_name']; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="<?php echo $row_Recordset1['bname']; ?>" name="keywords">
    <meta content="<?php echo $row_Recordset1['edit_date']; ?>" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
        <meta property="og:image" content="https://excelgiants.site/img/<?php echo $row_Recordset1['grad_img']; ?>">

</head>

<body>
    <!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
</div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block" >
        <div class="row gx-0" >
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><?php echo $row_Recordset1['work_place']; ?> <i class="fa fa-map-marker-alt me-2"></i></small>
                    <small class="me-3 text-light"><?php echo $row_Recordset1['country']; ?> <i class="fa fa-phone-alt me-2"></i></small>
                    <small class="text-light"><?php echo $row_Recordset1['grad_place']; ?> <i class="fa fa-envelope-open me-2"></i></small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?php echo $row_Recordset1['create_by']; ?>"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="<?php echo $row_Recordset1['edit_by']; ?>"><i class="fab fa-linkedin-in fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0" dir="rtl">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <img src="img/<?php echo $row_Recordset1['grad_img']; ?>" height="70"><div></div>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
	overflow: hidden;
	background-color: #E3FCFF;
	opacity: 0.5;
	direction:rtl
}

.topnav a {
	float: right;
	display: block;
	color: #000000;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
	font-size: 17px;
	font-weight: bold;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
</style>


<div class="topnav" id="myTopnav">
  <a href="#"></a>  <a href="academy.php">الوسيط اكاديمي</a>
  
  <a href="contact.php">اتصل بنا</a>
  <a href="javascript:void(0);" class="icon" onClick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
          </nav><div></div>
      <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn"><?php echo $row_Recordset1['first_name']; ?></h1>
                    <a href="" class="h5 text-white"><?php echo $row_Recordset1['bname']; ?></a>
                </div>
            </div>
        </div>
</div>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->
<style>
.blue {
    background: #eef9ff;
}

.news {
       width: 90%x;
    margin: 20px auto;
    overflow: hidden;
    border-radius: 4px;
    padding: 1px;
    -webkit-user-select: none;
}

.news span {
    float: left;
    color: #fff;
    padding: 9px;
    position: relative;
    top: 1%;
    box-shadow: inset 0 -15px 30px rgba(0,0,0,0.4);
    font: 16px 'Raleway', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -webkit-user-select: none;
    cursor: pointer;
}

.text1{

	box-shadow:none !important;
    width: 95%;
}
</style>
<table border="0" align="center" cellpadding="0" cellspacing="00">
  <tr>
    <td><div class="news blue">
<span class="text1" ><marquee behavior="scroll" direction="right" onmouseover="this.stop();" onmouseout="this.start();">
<?php do { ?>
  ** <a href="details.php?id=<?php echo $row_Recordset5['id']; ?>"><?php echo $row_Recordset5['title']; ?> </a>
  <?php } while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5)); ?>
</marquee></span>
</div></td>
  </tr>
</table>



    <!-- Blog Start -->
    
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8" dir="rtl">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="Client.jpg" alt="">
                      <h1 class="mb-4">عملائنا</h1>
                        <p>"حفاظاً منا علي خصوصية عملائنا (شركاء النجاح) فإننا سوف نذكر النشاطات ولكننا لن نستطيع ذكر اسماء شركائنا في النجاح"                          </p>
                        <p>- مجال تصنيع وتجارة الاعلاف</p>
                        <p> - مجال تصنيع وتجارة الاخشاب                          </p>
                        <p>- مجال تصنيع وتششكيل المعادن وتجارتها                          </p>
                        <p>- ورش الحدادة وتصنيع الكريتال                          </p>
                        <p>- تجارة السجاد والمفروشات
                          -تجارة النجف والانتيكات والهدايا</p>
                        <p> - تصنيع وتجارة الحلويات                          </p>
                        <p>- تجارة المواد الغذائية                          </p>
                        <p>- تجارة الملابس                          </p>
                        <p>- الاستيراد والتصدير                          </p>
                        <p>- المطابع وتجارة مستلزمات الطباعة                          </p>
                        <p>- شركات البرمجة وتصميم المواقع وتجارة الحاسب والتجارة الإلكترونية                          </p>
                        <p>- تجارة اطباق الفويل والفوم                          </p>
                        <p>- الصيدليات وتجارة الادوية والاكسسوارات والقيمة المضافة عليها                          </p>
                        <p>- تجارة قطع غيار التكاتك والموتوسيكلات                          </p>
                        <p>- تصنيع وتجارة الزجاج
                          - الاستثمار العقاري                          </p>
                        <p>- السمسرة العقارية</p>
                        <p>- مطاعم ماكولات وفطائر وبيتزا</p>
                  </div>
                    <!-- Blog Detail End -->
    

                    <!-- Comment List Start --><!-- Comment List End -->
    
                    <!-- Comment Form Start --><!-- Comment Form End -->
                </div>
                <!-- Blog list End -->
    
                <!-- Sidebar Start -->
              <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <form action="search.php" method="get">
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="input-group" dir="rtl">
                            <input name="title" type="text" class="form-control p-3" placeholder="كلمات البحث">
                            <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
</div>
                    </div>
                    </form>
                    
                    <!-- Search Form End -->
    
                    <!-- Category Start -->
                    <div class="mb-5 wow slideInUp" dir="rtl" data-wow-delay="0.1s">
                        
                        <div class="link-animated d-flex flex-column justify-content-start" dir="rtl">
                            <?php do { ?>
                            <a class="h5 fw-semi-bold bg-light rounded py-2 px-3 mb-2" href="category.php?category=<?php echo $row_Recordset2['category']; ?>"<?php echo $row_Recordset2['category']; ?>><i class="bi bi-arrow-right me-2"></i><?php echo $row_Recordset2['category']; ?></a>
                              <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); ?>
                        </div>
                    </div>
                    <!-- Category End -->
    
                    <!-- Recent Post Start -->
                <div class="mb-5 wow slideInUp" dir="rtl" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">أحدث الموضوعات</h3>
                        </div>
                        <?php do { ?>
                        <div style="width:100%; background-color:#eef9ff">
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="img/<?php echo $row_Recordset4['image']; ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="details.php?id=<?php echo $row_Recordset4['id']; ?>" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"><?php echo $row_Recordset4['title']; ?>
                            </a>
                          </div>
                        </div>
                          <?php } while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4)); ?>
                  </div>
                    <!-- Recent Post End -->
    
                    <!-- Image Start --><!-- Image End -->
    
                    <!-- Tags Start --><!-- Tags End -->
    
                  <!-- Plain Text Start --><!-- Plain Text End -->
                </div>
                <!-- Sidebar End -->
            </div>
  </div>
</div>
    <!-- Blog End -->


    <!-- Vendor Start -->
    
    <!-- Vendor End -->
    

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" dir="rtl" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.php" class="navbar-brand">
                        <img src="img/<?php echo $row_Recordset1['grad_img']; ?>" width="70%"></img>
                            <p class="m-0 text-white" style="font-size:26px; font-weight:bold"><?php echo $row_Recordset1['first_name']; ?></p>
                            <p class="m-0 text-white"><?php echo $row_Recordset1['bname']; ?></p>
                        </a>
                        <p class="mt-3 mb-4"><?php echo $row_Recordset1['edit_date']; ?></p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">تواصل معنا</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0"><?php echo $row_Recordset1['work_place']; ?></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0"><?php echo $row_Recordset1['country']; ?></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0"><?php echo $row_Recordset1['grad_place']; ?></p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="<?php echo $row_Recordset1['create_by']; ?>"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="<?php echo $row_Recordset1['edit_by']; ?>"><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4" align="center">
                                <h3 align="center" class="text-light mb-0">روابط سريعة</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="index.php"><i class="bi bi-arrow-right text-primary me-2"></i>الرئيسية</a>
                                <a class="text-light mb-2" href="clients.php"><i class="bi bi-arrow-right text-primary me-2"></i>عملائنا</a>
                                <a href="https://excelgiants.site/others/tax/index.html" target="_new" class="text-light mb-2"><i class="bi bi-arrow-right text-primary me-2"></i>احسب ضريبتك</a>
                                <a class="text-light" href="contact.php"><i class="bi bi-arrow-right text-primary me-2"></i>اتصل بنا</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;" dir="rtl">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="#"><?php echo $row_Recordset1['first_name']; ?></a>  جميع الحقوق محفوظة 
						
						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						تصميم وبرمجة  <a class="text-white border-bottom" href="https://dr-demian.com">Dr. Demain Morcos</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);

mysqli_free_result($Recordset6);
?>
