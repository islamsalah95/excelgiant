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





        <!-- About Start -->
        <div class="container-xxl py-5" id="about">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3"> </h1>
                    <h1 class="mb-3">من نحن</h1>
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
        
                <!-- Category Start -->
                <div class="container-xxl py-5"  dir="ltr">
                  <div class="container">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                      <h1 class="mb-3">الرؤية والرسالة</h1>
                    </div>
                    <div class="row g-4">
                      <?php do { ?>
                      <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s"> <a class="cat-item d-block bg-light text-center rounded p-3" href="">
                        <div class="rounded p-4">
                          <div class="icon mb-3"> <img class="img-fluid" src="img/<?php echo $row_rsaims['image']; ?>" alt="Icon"> </div>
                          <h6><?php echo $row_rsaims['title']; ?></h6>
                          <span><?php echo $row_rsaims['samary']; ?></span> </div>
                      </a> </div>
                      <?php } while ($row_rsaims = mysqli_fetch_assoc($rsaims)); ?>
                    </div>
                  </div>
                </div>
                <!-- Category End -->
  <!-- Property List Start -->
  <div class="container-xxl py-5" id="single" dir="rtl">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h1 class="mb-3"> </h1>
                            <br>
                            <h1 class="mb-3">خدماتنا</h1>
                  </div>
                            
                            
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php do { ?>
                              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                  <div class="position-relative overflow-hidden"> <a href="details.php?id=<?php echo $row_rssingle['id']; ?>#about"><img width="100%" class="img-fluid" src="img/<?php echo $row_rssingle['image']; ?>" alt=""></a>
                                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?php echo $row_rssingle['category']; ?></div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?php echo $row_rssingle['tdate']; ?></div>
                                  </div>
                                  <div class="p-4 pb-0"> <a class="d-block h5 mb-2" href="details.php?id=<?php echo $row_rssingle['id']; ?>#about"><?php echo $row_rssingle['title']; ?></a>
                                    <p><?php echo $row_rssingle['samary']; ?></p>
                                  </div>
                                </div>
                              </div>
                              <?php } while ($row_rssingle = mysqli_fetch_assoc($rssingle)); ?>
<div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s"></div>
                        </div>
                    </div>
                    
                    
              </div>
            </div>
      </div>
        <!-- Property List End -->


  <!-- Call to Action Start -->
  <div class="container-xxl py-5" dir="rtl">
      <div class="container">
          <div class="bg-light rounded p-3">
              <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                  <div class="row g-5 align-items-center">
                      <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                          <img class="img-fluid rounded w-100" src="img/call-to-action.jpg" alt="">
                      </div>
                      <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                          <div class="mb-4">
                              <h1 class="mb-3">سجل عضويتك الآن</h1>
                              <p>لمزيد من المعلومات يمكنك التواصل معنا من خلال :</p>
                          </div>
                          <a href="" class="btn btn-primary py-3 px-4 me-2"> اتصل بنا <i class="fa fa-phone-alt me-2"></i> </a>
                          <a href="" class="btn btn-dark py-3 px-4"> تحديد موعد <i class="fa fa-calendar-alt me-2"></i> </a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Call to Action End -->

  <!-- Property List Start -->
  <div class="container-xxl py-5" id="group" dir="rtl">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h1 class="mb-3"> </h1>
                            <br>
                            <h1 class="mb-3">اعمالنا</h1>
                  </div>
                            
                            
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php do { ?>
                              <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                  <div class="position-relative overflow-hidden"> <a href="details.php?id=<?php echo $row_rsgroup['id']; ?>#about"><img width="100%" class="img-fluid" src="img/<?php echo $row_rsgroup['image']; ?>" alt=""></a>
                                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3"><?php echo $row_rsgroup['category']; ?></div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?php echo $row_rsgroup['tdate']; ?></div>
                                  </div>
                                  <div class="p-4 pb-0"> <a class="d-block h5 mb-2" href="details.php?id=<?php echo $row_rsgroup['id']; ?>#about"><?php echo $row_rsgroup['title']; ?></a>
                                    <p><?php echo $row_rsgroup['samary']; ?></p>
                                  </div>
                                </div>
                              </div>
                              <?php } while ($row_rsgroup = mysqli_fetch_assoc($rsgroup)); ?>
<div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s"></div>
                        </div>
                    </div>
                    
                    
              </div>
            </div>
        </div>
        <!-- Property List End -->
        
        
        

        
        
        
        

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


        <!-- Testimonial Start -->
        <div class="container-xxl py-5" id="camp" dir="ltr">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3"> </h1>
                    <h1 class="mb-3">آراء عملائنا</h1>
                    <br>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <?php do { ?>
                      <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4" dir="rtl">
                          <div class="d-flex align-items-center"> <img class="img-fluid flex-shrink-0 rounded" src="img/<?php echo $row_rscamp['image']; ?>" style="width: 45px; height: 45px;">
                            <div class="ps-3">
                              <h6 class="fw-bold mb-1">&nbsp;<?php echo $row_rscamp['category']; ?></h6>
                              <small>&nbsp;<?php echo $row_rscamp['tdate']; ?></small></div>
                          </div>
                          <h1><a href="details.php?id=<?php echo $row_rscamp['id']; ?>#about"><?php echo $row_rscamp['title']; ?></a></h1>
                          <p><?php echo $row_rscamp['samary']; ?></p>
                        </div>
                      </div>
                      <?php } while ($row_rscamp = mysqli_fetch_assoc($rscamp)); ?>
              </div>
            </div>
        </div>
        <!-- Testimonial End -->



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
