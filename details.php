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

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsslidat = "SELECT * FROM slidat ORDER BY id DESC";
$rsslidat = mysqli_query($connection,$query_rsslidat) or die(mysqli_error($connection));
$row_rsslidat = mysqli_fetch_assoc($rsslidat);
$totalRows_rsslidat = mysqli_num_rows($rsslidat);

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM blogs WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_rssingle = "خدماتنا";
if (isset($_GET['category'])) {
  $colname_rssingle = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_rssingle = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id DESC", GetSQLValueString($colname_rssingle, "text"));
$rssingle = mysqli_query($connection,$query_rssingle) or die(mysqli_error($connection));
$row_rssingle = mysqli_fetch_assoc($rssingle);
$totalRows_rssingle = mysqli_num_rows($rssingle);

$colname_rsgroup = "اعمالنا";
if (isset($_GET['category'])) {
  $colname_rsgroup = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsgroup = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id DESC", GetSQLValueString($colname_rsgroup, "text"));
$rsgroup = mysqli_query($connection,$query_rsgroup) or die(mysqli_error($connection));
$row_rsgroup = mysqli_fetch_assoc($rsgroup);
$totalRows_rsgroup = mysqli_num_rows($rsgroup);

$colname_rsparteners = "شركاؤنا";
if (isset($_GET['category'])) {
  $colname_rsparteners = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsparteners = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id ASC", GetSQLValueString($colname_rsparteners, "text"));
$rsparteners = mysqli_query($connection,$query_rsparteners) or die(mysqli_error($connection));
$row_rsparteners = mysqli_fetch_assoc($rsparteners);
$totalRows_rsparteners = mysqli_num_rows($rsparteners);

$colname_rscamp = "معسكرات";
if (isset($_GET['category'])) {
  $colname_rscamp = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_rscamp = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id DESC", GetSQLValueString($colname_rscamp, "text"));
$rscamp = mysqli_query($connection,$query_rscamp) or die(mysqli_error($connection));
$row_rscamp = mysqli_fetch_assoc($rscamp);
$totalRows_rscamp = mysqli_num_rows($rscamp);

mysqli_select_db($connection, "excelgia_mahmdata");
$query_rssiteinfo = "SELECT * FROM siteinfo ORDER BY id DESC";
$rssiteinfo = mysqli_query($connection,$query_rssiteinfo) or die(mysqli_error($connection));
$row_rssiteinfo = mysqli_fetch_assoc($rssiteinfo);
$totalRows_rssiteinfo = mysqli_num_rows($rssiteinfo);

$colname_rsaims = "الرؤية والرسالة";
if (isset($_GET['category'])) {
  $colname_rsaims = $_GET['category'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_rsaims = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id ASC", GetSQLValueString($colname_rsaims, "text"));
$rsaims = mysqli_query($connection,$query_rsaims) or die(mysqli_error($connection));
$row_rsaims = mysqli_fetch_assoc($rsaims);
$totalRows_rsaims = mysqli_num_rows($rsaims);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $row_rssiteinfo['first_name']; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
        <meta property="og:image" content="https://excelgiants.site/logo.png">

</head>

<body>
    <div class="container-xxl bg-white p-0" dir="rtl">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 80px; height: 80px;">
                    </div>
                    <h1 class="m-0 text-primary">&nbsp; <?php echo $row_rssiteinfo['first_name']; ?> </h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link">الرئيسية</a>
                        <a href="index.php#about" class="nav-item nav-link">من نحن</a>
                        <a href="index.php#single" class="nav-item nav-link">خدماتنا</a>
                        <a href="index.php#group" class="nav-item nav-link">اعمالنا</a>
                        <a href="index.php#camp" class="nav-item nav-link">آراء عملائنا</a>
                        <a href="index.php#partener" class="nav-item nav-link">شركاؤنا</a>
                        <a href="https://new.excelgiants.site/members/member_login.php" class="nav-item nav-link">تحميل البرامج</a>
                        <a href="index.php#contact" class="nav-item nav-link">اتصل بنا</a>
                    </div>
                    <a href="members/member_login.php"><img src="login.png" width="50" height="50" /></a>&nbsp;&nbsp;<a href="members/members_add.php" ><img src="signup.png" width="50" height="50" /></a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0" dir="ltr">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">

                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4"><span class="text-primary"><?php echo $row_rssiteinfo['first_name']; ?></span></h1>
                    <p><?php echo $row_rssiteinfo['bname']; ?> </p>
                    <a href="index.php#contact" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">اشترك الآن</a>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <?php do { ?>
                          <div class="owl-carousel-item"> <img class="img-fluid" src="img/<?php echo $row_rsslidat['grad_img']; ?>" alt=""> </div>
                          <?php } while ($row_rsslidat = mysqli_fetch_assoc($rsslidat)); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->


        <!-- Search Start --><!-- Search End -->





        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3"> </h1>
                    <h1 class="mb-3">&nbsp; </h1>
                    <h1 class="mb-3"> </h1>
                    <br>
                </div>

                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="img/<?php echo $row_Recordset1['image']; ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" dir="rtl" data-wow-delay="0.5s">
                        <h1 class="mb-4"><?php echo $row_Recordset1['title']; ?></h1>
                        <p class="mb-4"><?php echo $row_Recordset1['topic']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        
                <!-- Category Start --><!-- Category End -->
  <!-- Property List Start --><!-- Property List End -->


  <!-- Call to Action Start --><!-- Call to Action End -->

  <!-- Property List Start --><!-- Property List End -->
        
        
        

        
        
        
        

        <!-- Team Start --><!-- Team End -->


        <!-- Testimonial Start --><!-- Testimonial End -->



        <!-- Contact Start -->
        <div class="container-xxl py-5" id="contact">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3"> </h1>
                    <br>
                    <h1 class="mb-3"></h1>
                    <h1 class="mb-3">اتصل بنا</h1>

<br>                </div>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4" dir="ltr">
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="bg-light rounded p-3">
                                    <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                        <div class="icon me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-map-marker-alt text-primary"></i>
                                        </div>
                                        <span><?php echo $row_rssiteinfo['work_place']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="bg-light rounded p-3">
                                    <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                        <div class="icon me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-envelope-open text-primary"></i>
                                        </div>
                                        <span><?php echo $row_rssiteinfo['grad_place']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="bg-light rounded p-3">
                                    <div class="d-flex align-items-center bg-white rounded p-3" style="border: 1px dashed rgba(0, 185, 142, .3)">
                                        <div class="icon me-3" style="width: 45px; height: 45px;">
                                            <i class="fa fa-phone-alt text-primary"></i>
                                        </div>
                                        <span><?php echo $row_rssiteinfo['country']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <iframe class="position-relative rounded w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe>
                    </div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <p class="mb-4">لمزيد من المعلومات والتواصل معنا يرجى ملئ الاستمارة التالية:</a>.</p>
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" placeholder="الاسم بالكامل">
                                            <label for="name">الاسم بالكامل</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" placeholder="البريد الالكتروني">
                                            <label for="email">البريد الالكتروني</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="subject" placeholder="موضوع الرسالة">
                                            <label for="subject">موضوع الرسالة</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="نص الرسالة" id="message" style="height: 150px"></textarea>
                                            <label for="message">نص الرسالة</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">ارسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                  <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">تواصل معنا</h5>
                        <p class="mb-2"> <i class="fa fa-map-marker-alt me-3"></i>&nbsp;&nbsp;<?php echo $row_rssiteinfo['work_place']; ?></p>
                        <p class="mb-2"> <i class="fa fa-phone-alt me-3"></i>&nbsp;&nbsp;<?php echo $row_rssiteinfo['country']; ?></p>
                        <p class="mb-2"> <i class="fa fa-envelope me-3"></i>&nbsp;&nbsp;<?php echo $row_rssiteinfo['grad_place']; ?></p>
                        <div class="d-flex pt-2">
<a class="btn btn-outline-light btn-social" href="https://www.facebook.com/groups/928715484427043?locale=ar_AR" target="_new"><i class="fab fa-facebook-f"></i></a>
<a class="btn btn-outline-light btn-social" href="https://wa.me/201149220950" target="_new"><i class="fab fa-whatsapp"></i></a>
<a class="btn btn-outline-light btn-social" href="https://www.youtube.com/channel/UC9-IfV_c0OS8y_oPyvZ30Bw" target="_new"><i class="fab fa-youtube"></i></a>
<a class="btn btn-outline-light btn-social" href="https://t.me/M_excl" target="_new"><i class="fab fa-telegram-plane" ></i></a>
<a class="btn btn-outline-light btn-social" href="https://x.com/mohsg100?t=3zbpj0-8ZuYvBRcl5qaHYg&s=08" target="_new"><i class="fab fa-twitter" ></i></a>


                        </div>
                  </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">روابط سريعة</h5>
                          <a href="index.php#about">من نحن</a><br>
                          <a href="index.php#contact">اتصل بنا</a><br>
                          <a href="index.php#single">خدماتنا</a><br>
                          <a href="index.php#group">اعمالنا</a><br>
                          <a href="index.php#camp">آراء عملائنا</a><br>
                    </div>
                  <div class="col-lg-3 col-md-6">
                      <h5 class="text-white mb-4"><?php echo $row_rssiteinfo['first_name']; ?></h5>
                        <div class="row g-2 pt-2">
                          <p><?php echo $row_rssiteinfo['edit_date']; ?></p>
                        </div>
                  </div>
                    <div class="col-lg-3 col-md-6" dir="rtl">
                        <h5 class="text-white mb-4">القائمة البريدية</h5>
                        <p>اشترك الان في قائمتنا البريدية من خلال تسجيل بريدك الالكتروني ليصلك أحدث أخبارانا </p>
                        <div class="position-relative mx-auto" style="max-width: 400px;" dir="ltr">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="البريد الالكتروني">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">اشترك الآن</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright" dir="ltr">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
							Designed By <a href="https://dr-demian.com" target="_new" class="border-bottom">Dr. Demian Morcos</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end" dir="rtl">
                            <div class="footer-menu">
                            &copy; <a class="border-bottom" href="#"><?php echo $row_rssiteinfo['first_name']; ?></a>, جميع الحقوق محفوظة 
                            </div>
                        </div>
                    </div>
                </div>
          </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php
mysqli_free_result($rsslidat);

mysqli_free_result($Recordset1);

mysqli_free_result($rssingle);

mysqli_free_result($rsgroup);

mysqli_free_result($rsparteners);

mysqli_free_result($rscamp);

mysqli_free_result($rssiteinfo);

mysqli_free_result($rsaims);
?>
