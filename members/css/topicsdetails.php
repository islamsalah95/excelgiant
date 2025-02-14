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

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM blogs WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$maxRows_Recordset2 = 5;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

$colname_Recordset2 = "-1";
if (isset($_GET['category'])) {
  $colname_Recordset2 = $_GET['category'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM blogs WHERE category = %s", GetSQLValueString($colname_Recordset2, "text"));
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

mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = "SELECT * FROM categoryat ORDER BY id ASC";
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>اكسيل للحلول البرمجية</title>
	<link rel="stylesheet" href="fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/templatemo-xtra-blog.css" rel="stylesheet">
<!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
<style type="text/css">
#aaa {	color: #FFF;
}
</style>
</head>
<body>
	<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
              <div>
                <div align="center"><img src="lo.png" alt="" width="150"></div>
              </div>
              <p align="center" id="aaa"><strong>اكسيل للحلول البرمجية</strong></p>
            </div>
            <nav class="tm-nav" id="tm-nav">            
                <ul>
                    <li class="tm-nav-item active"><a href="index.php" class="tm-nav-link">
                        <i class="fas fa-home"></i>
                        الرئيسية
                  </a></li>
                    <li class="tm-nav-item "><a href="post.php" class="tm-nav-link">
                        <i class="fas fa-pen"></i>
                        تسجيل الدخول
                  </a></li>
                    <li class="tm-nav-item"><a href="about.html" class="tm-nav-link">
                        <i class="fas fa-users"></i>
                        عن الوحدة الحزبية
                  </a></li>
                    <li class="tm-nav-item"><a href="contact.html" class="tm-nav-link">
                        <i class="far fa-comments"></i>
                        اتصل بنا
                  </a></li>
                </ul>
            </nav>
            <div class="tm-mb-65">
                <a href="https://facebook.com" class="tm-social-link">
                    <i class="fab fa-facebook tm-social-icon"></i>
                </a>
                <a href="https://twitter.com" class="tm-social-link">
                    <i class="fab fa-twitter tm-social-icon"></i>
                </a>
                <a href="https://instagram.com" class="tm-social-link">
                    <i class="fab fa-instagram tm-social-icon"></i>
                </a>
                <a href="https://linkedin.com" class="tm-social-link">
                    <i class="fab fa-linkedin tm-social-icon"></i>
                </a>
            </div>
            <p class="tm-mb-80 pr-5 text-white">
                Xtra Blog is a multi-purpose HTML template from TemplateMo website. Left side is a sticky menu bar. Right side content will scroll up and down.
            </p>
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
                        <div class="mb-4">
                            <img src="img/<?php echo $row_Recordset1['image']; ?>">
                          <h2 class="pt-2 tm-color-primary tm-post-title"><?php echo $row_Recordset1['title']; ?></h2>
                            <p class="tm-mb-40"><?php echo $row_Recordset1['tdate']; ?> posted by <?php echo $row_Recordset1['tauther']; ?></p>
                            <p>
                                <?php echo $row_Recordset1['topic']; ?>
                            </p>
                            <span class="d-block text-right tm-color-primary"><?php echo $row_Recordset1['category']; ?></span>
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 tm-aside-col">
                  <div class="tm-post-sidebar">
                        <hr class="mb-3 tm-hr-primary">
                        <h2 class="mb-4 tm-post-title tm-color-primary">الموضوعات الرئيسية</h2>
                        <ul class="tm-mb-75 pl-5 tm-category-list">
                            <?php do { ?>
                            <li><a href="categoryat.php?category=<?php echo $row_Recordset3['category']; ?>" class="tm-color-primary"><?php echo $row_Recordset3['category']; ?></a></li>
                              <?php } while ($row_Recordset3 = mysqli_fetch_assoc($Recordset3)); ?>
                        </ul>
                        <hr class="mb-3 tm-hr-primary">
                    <h2 class="tm-mb-40 tm-post-title tm-color-primary">مقالات مرتبطة</h2>
                      <?php do { ?>
                      <a href="topicsdetails.php?id=<?php echo $row_Recordset2['id']; ?>&category=<?php echo $row_Recordset2['category']; ?>" class="d-block tm-mb-40">
                          <figure>
                            <img src="img/<?php echo $row_Recordset2['image']; ?>" alt="Image" class="mb-3 img-fluid">
                            <figcaption class="tm-color-primary"><?php echo $row_Recordset2['title']; ?></figcaption>
                            </figure>
                        </a>
                        <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); ?>
                  </div>                    
                </aside>
            </div>
            <footer class="row tm-row">
              <div class="col-md-6 col-12 tm-color-gray tm-copyright"> Copyright 2022 <span class="text-center">اكسيل للحلول البرمجية</span>. </div>
            </footer>
        </main>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);
?>
