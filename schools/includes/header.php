<?php

use App\Middleware\AuthMiddleware; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8">
  <title>اكسيل للحلول البرمجية</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="https://localhost/excelgiant/img/logo.png" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https:/fonts.googleapis.com">
  <link rel="preconnect" href="https:/fonts.gstatic.com" crossorigin>
  <link href="https:/fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https:/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https:/cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="<?= BASE_URL; ?>assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?= BASE_URL; ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="<?= BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="<?= BASE_URL; ?>assets/css/style.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">


  <style>
    .carousel-item img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }
  </style>
</head>

<body>

<nav style="display: flex; flex-wrap: nowrap;justify-content: space-between;align-items: center;"  class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0" dir="rtl">
  <div class="container-fluid d-flex align-items-center justify-content-between">

    <!-- Logo on the Right -->
    <a href="<?= BASE_URL; ?>assets/index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h2 class="m-0 text-primary">
        <img style="width: 23%;" src="https://localhost/excelgiant/img/logo.png" alt="">
      </h2>
    </a>

    <!-- Navbar Toggle Button (For Mobile) -->
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navigation Menu on the Left -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav me-auto p-4 p-lg-0">
        <?php if (AuthMiddleware::check() == true) { ?>
          <a class="nav-item nav-link" href="<?= BASE_URL; ?>index.php?page=home">المدارس</a>
          <a class="nav-item nav-link" href="<?= BASE_URL; ?>index.php?page=school_create">إنشاء مدرسة</a>
          <a class="nav-item nav-link" href="<?= BASE_URL; ?>index.php?page=images"> إدارة صور المدارس</a>
          <a class="nav-item nav-link" href="<?= BASE_URL; ?>index.php?page=student_create">إضافة طالب</a>
          <a class="nav-item nav-link" href="<?= BASE_URL; ?>index.php?page=export_tabels">تصدير الجداول</a>

          <a class="btn btn-danger nav-item nav-link" href="<?= BASE_URL; ?>index.php?page=logout">
            <i class="fas fa-sign-out-alt"></i> تسجيل خروج
          </a>
        <?php } ?>
      </div>
    </div>

  </div>
</nav>



  <!-- Navbar End -->