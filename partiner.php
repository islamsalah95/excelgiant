<?php
include_once('header.php');
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
            <a href="about.php#about" class="nav-item nav-link">من نحن</a>
            <a href="services.php#single" class="nav-item nav-link">خدماتنا</a>
            <a href="works.php#group" class="nav-item nav-link">اعمالنا</a>
            <a href="review.php#camp" class="nav-item nav-link">آراء عملائنا</a>
            <a href="partiner.php#partener" class="nav-item nav-link">شركاؤنا</a>
            <a href="https://new.excelgiants.site/members/member_login.php" class="nav-item nav-link">تحميل البرامج</a>
            <a href="contactus.php#contact" class="nav-item nav-link">اتصل بنا</a>
          </div>
          <a href="members/member_login.php"><img src="login.png" width="50" height="50" /></a>&nbsp;&nbsp;<a href="members/members_add.php"><img src="signup.png" width="50" height="50" /></a>
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
          <a href="https://new.excelgiants.site/members/member_login.php" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">تحميل البرامج</a>
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


    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
      <div class="container">
        <div class="row g-2"></div>
      </div>
    </div>
    <!-- Search End -->





    <!-- About Start --><!-- About End -->

    <!-- Category Start --><!-- Category End -->
    <!-- Property List Start --><!-- Property List End -->


    <!-- Call to Action Start --><!-- Call to Action End -->

    <!-- Property List Start --><!-- Property List End -->









    <!-- Team Start -->
    <div class="container-xxl py-5" id="partener">
      <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
          <h1 class="mb-3"> </h1>
          <br>
          <h1 class="mb-3">شركاؤنا</h1>
        </div>
        <div class="row g-4">
          <?php do { ?>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div class="team-item rounded overflow-hidden">
                <div class="position-relative">
                  <img class="img-fluid" src="img/<?php echo $row_rsparteners['image']; ?>" alt="">
                </div>
                <div class="text-center p-4 mt-3">
                  <h5 class="fw-bold mb-0"><?php echo $row_rsparteners['title']; ?></h5>
                  <small><?php echo $row_rsparteners['samary']; ?></small>
                </div>
              </div>
            </div>
          <?php } while ($row_rsparteners = mysqli_fetch_assoc($rsparteners)); ?>
        </div>
      </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start --><!-- Testimonial End -->



    <!-- Contact Start --><!-- Contact End -->

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
              <a class="btn btn-outline-light btn-social" href="https://t.me/M_excl" target="_new"><i class="fab fa-telegram-plane"></i></a>
              <a class="btn btn-outline-light btn-social" href="https://x.com/mohsg100?t=3zbpj0-8ZuYvBRcl5qaHYg&s=08" target="_new"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-white mb-4">روابط سريعة</h5>
            <a href="about.php#about">من نحن</a><br>
            <a href="contactus.php#contact">اتصل بنا</a><br>
            <a href="services.php#single">خدماتنا</a><br>
            <a href="works.php#group">اعمالنا</a><br>
            <a href="review.php#camp">آراء عملائنا</a><br>
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
include_once('footer.php');
?>