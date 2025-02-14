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

$colname_Recordset1 = "23";
if (isset($_GET['tobicscategory_id'])) {
  $colname_Recordset1 = $_GET['tobicscategory_id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset1 = sprintf("SELECT * FROM tobicscategory WHERE tobicscategory_id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "22";
if (isset($_GET['tobicscategory_id'])) {
  $colname_Recordset2 = $_GET['tobicscategory_id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset2 = sprintf("SELECT * FROM tobicscategory WHERE tobicscategory_id = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$colname_Recordset3 = "24";
if (isset($_GET['tobicscategory_id'])) {
  $colname_Recordset3 = $_GET['tobicscategory_id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset3 = sprintf("SELECT * FROM tobicscategory WHERE tobicscategory_id = %s", GetSQLValueString($colname_Recordset3, "int"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_Recordset4 = "25";
if (isset($_GET['tobicscategory_id'])) {
  $colname_Recordset4 = $_GET['tobicscategory_id'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset4 = sprintf("SELECT * FROM tobicscategory WHERE tobicscategory_id = %s", GetSQLValueString($colname_Recordset4, "int"));
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$maxRows_Recordset5 = 10;
$pageNum_Recordset5 = 0;
if (isset($_GET['pageNum_Recordset5'])) {
  $pageNum_Recordset5 = $_GET['pageNum_Recordset5'];
}
$startRow_Recordset5 = $pageNum_Recordset5 * $maxRows_Recordset5;

mysqli_select_db($connection, "excelgia_mahmdata");
$query_Recordset5 = "SELECT * FROM advertize ORDER BY id DESC";
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
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23856632-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23856632-1');
</script><!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo1-135x128-68-122x116_2.jpg" type="image/x-icon">
  <meta name="description" content="موقع الاستاذ الدكتور نبيل جاد عزمي 
Professor Nabil Gad Azmy Website">
  <title>Prof Nabil Azmy Website موقع الاستاذ الدكتور نبيل عزمي</title>
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/gallery/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
<link href="xx.css" rel="stylesheet" type="text/css">
<style type="text/css">
#footer1-g .container .footer-lower table tr td .mbr-text.mbr-fonts-style.display-7 {
	color: #FFF;
}
</style>
</head>
<body>
		<link rel="stylesheet" type="text/css" href="css/stylescroll.css" media="screen"/>
    <style>
        a.back{
            background:transparent url(codrops_back.png) no-repeat top left;
            position:absolute;
            top:5px;
            right:5px;
            width:165px;
            height:25px;
        }
    </style>
<!-- Google Analytics -->
<meta name="google-site-verification" content="uRDBRqXLQv7HfmuA_WvCoqAwZj6VKmEHx91cL-67wp0" />
<!-- /Google Analytics -->


  <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                         <img src="assets/images/logo1-135x128-68-122x116_2.jpg" alt="Nabil Azmy.Com" title="Prof Nabil Gad Azmy Website" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-4" href="index.php">prof-nabilazmy.com</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><style>
.dropbtn {
  background-color: #149dcc;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  width: 160px;

}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {
	background-color: #0d6786;
}
</style>
<div class="dropdown" style="float:right;">
  <button class="dropbtn">السيرة الذاتية</button>
  <div class="dropdown-content">
    <a href="https://prof-nabilazmy.com/content1.php?id=1">السيرة الذاتية الشخصية</a>
    <a href="https://prof-nabilazmy.com/content1.php?id=2">المؤهلات العلمية</a>
    <a href="https://prof-nabilazmy.com/content1.php?id=3">التدرج الأكاديمي</a>
    <a href="https://prof-nabilazmy.com/scinfificcv.php">السيرة الذاتية العلمية</a>
  </div>
</div>
<br>
<div class="dropdown" style="float:right;">
  <button class="dropbtn">الأنشطة العلمية</button>
  <div class="dropdown-content">
    <a href="https://prof-nabilazmy.com/work.php">النشر والتأليف</a>
    <a href="https://prof-nabilazmy.com/publishing1.php">البحوث المنشورة</a>
    <a href="https://prof-nabilazmy.com/rasael.php">الرسائل العلمية</a>
    <a href="https://prof-nabilazmy.com/tahkim.php">التحكيم العلمي</a>
  </div>
</div>
<br>
<div class="dropdown" style="float:right;">
  <button class="dropbtn">الخدمات البحثية</button>
  <div class="dropdown-content">
    <a href="https://prof-nabilazmy.com/rasert.php">تحكيم أدوات البحث</a>
    <a href="https://prof-nabilazmy.com/analysis/main.php">تحليل بحوث التفاعل</a>
    <a href="https://prof-nabilazmy.com/dwria/dwria.php">مجلة بحوث التفاعل</a>
    <a href="https://prof-nabilazmy.com/database.php">قاعدة البيانات التربوية</a>
  </div>
</div>
</ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-7" href="lights.php">انارات
                    </a><br>jsjs</div>
        </div>
    </nav>
</section>

<section class="engine"><a href="https://mobiri.se/w">html5 templates</a></section><section class="features15 cid-qW5GvLxfKC" data-bg-video="https://www.youtube.com/watch?v=ugwKALG6uGA" id="features15-13">

    

    
    <div class="container">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-5"><div><strong>موقع الأستاذ الدكتور نبيل جاد عزمي</strong></div><div><strong>Prof. Dr. Nabil Gad Azmy Website</strong></div></h2>
        

        <div class="media-container-row container pt-5 mt-2">

            <div class="col-12 col-md-6 mb-4">
                <div class="card flip-card p-5 align-center">
                    <div class="card-front card_cont">
                        <img src="assets/images/4554643645-e768726e07-o-2000x1333-12-1200x800_2.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card_back card_cont">
                        <h4 class="card-title display-5 py-2 mbr-fonts-style"><strong></strong><strong><?php echo $row_Recordset1['tobicscategory_discription']; ?></strong></h4>
                        <p class="mbr-text mbr-fonts-style display-5"><a href="AbotmeA.htm" class="text-secondary"><strong>الموقع العربي</strong></a></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4">
                
                <div class="card flip-card p-5 align-center">
                    <div class="card-front card_cont">
                        <img src="assets/images/p-0006-2000x1247-57-2000x1247-0-2000x1247-12-1400x873-6-1200x748_2.jpg" alt="Mobirise" title="">
                    </div>
                    <div class="card_back card_cont">
                        <h4 class="card-title py-2 mbr-fonts-style display-5"><?php echo $row_Recordset2['tobicscategory_discription']; ?></h4>
                        <p class="mbr-text mbr-fonts-style display-5"><a href="AbotmeE.htm" class="text-secondary"><strong>English</strong> <strong>Site</strong></a></p>
                    </div>
                </div>
            </div>
            
            

            
        </div>
</div></section>

<section class="testimonials3 cid-qVOJs0OCVh" id="testimonials3-5">

    

    
<table width="98%" border="0" align="center" cellpadding="4" cellspacing="4">
                  <tr>
                    <td height="40px" valign="middle" bgcolor="#3366CC"><marquee onMouseOver="stop" width="100%" direction="right" >
                      <?php do { ?>
                      *<a class="navbar-caption text-white display-4" href="newsview.php?id=<?php echo $row_Recordset5['id']; ?>"><strong><?php echo $row_Recordset5['title']; ?></strong></a>*
                        <?php } while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5)); ?>
                    </marquee></td>
                  </tr>
                  <tr>
                    <td height="40px" valign="middle">&nbsp;</td>
    </tr>
                </table>
    <div class="container">
        <div class="media-container-row">
            <div class="media-content px-3 align-self-center mbr-white py-2">
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center" valign="top"><h2><strong>موقع الأستاذ الدكتور نبيل جاد عزمي</strong></h2></td>
                  </tr>
                <tr>
                  <td align="center" valign="top"><h2><strong>Prof. Dr. Nabil Gad Azmy Website</strong></h2></td>
                </tr>
                  <tr>
                    <td width="84%" align="center" valign="top"><?php echo $row_Recordset3['tobicscategory_discription']; ?><?php echo $row_Recordset4['tobicscategory_discription']; ?></td>
                  </tr>
                </table>
          </div>
      </div>
  </div>
</section>

<section class="features8 cid-qVZr9Fu7jA mbr-parallax-background" id="features8-k">

    

    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(35, 35, 35);">
    </div>

    <div class="container">
        <div class="media-container-row">

            <div class="card  col-12 col-md-6 col-lg-4">
                <div class="card-img">
                    <span class="mbr-iconfont mbri-link"></span>
                </div>
                <div class="card-box align-center">
                    <h4 class="card-title mbr-fonts-style display-7">
                        الخدمات البحثية</h4>
                    <p class="mbr-text mbr-fonts-style display-7"><a href="rasert.php" class="text-success">تحكيم أدوات البحث
</a><br><a href="hmm.php" class="text-success">تحليل بحوث التفاعل
</a><br><a href="https://prof-nabilazmy.com/dwria/dwria.php" class="text-success">مجلة بحوث التفاعل
</a><br><a href="database.php" class="text-success">قاعدة البيانات التربوية 
</a><br><a href="#" class="text-success"> 
</a><br></p>
                    <div class="mbr-section-btn text-center"></div>
                </div>
            </div>

            <div class="card  col-12 col-md-6 col-lg-4">
                <div class="card-img">
                    <span class="mbr-iconfont mbri-play"></span>
                </div>
                <div class="card-box align-center">
                    <h4 class="card-title mbr-fonts-style display-7">الأنشطة العلمية</h4>
                    <p class="mbr-text mbr-fonts-style display-7"><a href="work.php" class="text-success">النشر والتأليف
</a><br><a href="publishing1.php" class="text-success">البحوث المنشورة
</a><br><a href="rasael.php" class="text-success">الرسائل العلمية
</a><br><a href="tahkim.php" class="text-success">التحكيم العلمي
</a><br></p>
                    <div class="mbr-section-btn text-center"></div>
                </div>
            </div>

            <div class="card  col-12 col-md-6 col-lg-4">
                <div class="card-img">
                    <span class="mbr-iconfont mbri-browse"></span>
                </div>
                <div class="card-box align-center">
                    <h4 class="card-title mbr-fonts-style display-7">السيرة الذاتية</h4>
                    <p class="mbr-text mbr-fonts-style display-7"><a href="content1.php?id=1" class="text-success">السيرة الذاتية الشخصية
</a><br><a href="content1.php?id=2" class="text-success">المؤهلات العلمية
</a><br><a href="content1.php?id=3" class="text-success">التدرج الأكاديمي
</a><br>
<a href="scinfificcv.php" class="text-success">السيرة الذاتية العلمية 
</a><br>
                    <div class="mbr-section-btn text-center"></div>
                </div>
            </div>

            
        </div>
    </div>
</section>

<section class="mbr-gallery mbr-slider-carousel cid-qVOFssCdRz" id="gallery3-4">

    

    <div>
        <div><!-- Filter --><!-- Gallery --><div class="mbr-gallery-row"><div class="mbr-gallery-layout-default"><div><div><div class="mbr-gallery-item mbr-gallery-item--p0" data-video-url="false" data-tags="Awesome">
          
<div href="#lb-gallery3-4" data-slide-to="0" data-toggle="modal"> <a href="gallery.php"><img src="assets/images/1-2000x800-54-2000x800-800x320.jpg" alt="" title=""></a><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"> </span></div></div><div class="mbr-gallery-item mbr-gallery-item--p0" data-video-url="false" data-tags="Responsive">

<div href="#lb-gallery3-4" data-slide-to="1" data-toggle="modal"> <a href="gallery.php"><img src="assets/images/2-2000x800-73-2000x800-800x320.jpg" alt="" title=""></a><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"> </span></div></div>




<div class="mbr-gallery-item mbr-gallery-item--p0" data-video-url="false" data-tags="Creative">
<div href="#lb-gallery3-4" data-slide-to="2" data-toggle="modal"> <a href="gallery.php"><img src="assets/images/4-2000x800-20-2000x800-800x320.jpg" alt="" title=""></a><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"> </span></div></div>


<div class="mbr-gallery-item mbr-gallery-item--p0" data-video-url="false" data-tags="Animated">
                <div href="#lb-gallery3-4" data-slide-to="3" data-toggle="modal"> <a href="gallery.php"><img src="assets/images/3-2000x800-31-2000x800-800x320.jpg" alt="" title=""></a><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"> </span></div></div>



<div class="mbr-gallery-item mbr-gallery-item--p0" data-video-url="false" data-tags="Awesome">
                  <div href="#lb-gallery3-4" data-slide-to="4" data-toggle="modal"> <a href="gallery.php"><img src="assets/images/6-2000x800-89-2000x800-800x320.jpg" alt="" title=""></a><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"> </span></div></div>



<div class="mbr-gallery-item mbr-gallery-item--p0" data-video-url="false" data-tags="Awesome">
                    <div href="#lb-gallery3-4" data-slide-to="5" data-toggle="modal"> <a href="gallery.php"><img src="assets/images/2000x800-24-2000x800-7-2000x800-800x320.jpg" alt="" title=""></a><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"> </span></div></div><div class="mbr-gallery-item mbr-gallery-item--p0" data-video-url="false" data-tags="Animated">



<div href="#lb-gallery3-4" data-slide-to="6" data-toggle="modal"> <a href="gallery.php"><img src="assets/images/img-3506-2000x800-25-2000x800-800x320.jpg" alt="" title=""></a><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"> </span></div></div>




<div class="mbr-gallery-item mbr-gallery-item--p0" data-video-url="false" data-tags="Awesome">
                        <div href="#lb-gallery3-4" data-slide-to="7" data-toggle="modal"> <a href="gallery.php"><img src="assets/images/5-2000x800-16-2000x800-800x320.jpg" alt="" title=""></a><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"> </span></div></div></div></div>


<div class="clearfix"></div></div></div><!-- Lightbox --><div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery3-4"><div class="modal-dialog"><div class="modal-content"><div class="modal-body"><div class="carousel-inner"><div class="carousel-item"> <a href="gallery.php"><img src="assets/images/1-2000x800-54-2000x800-800x320.jpg" alt="" title=""></a></div><div class="carousel-item"> <a href="gallery.php"><img src="assets/images/2-2000x800-73-2000x800-800x320.jpg" alt="" title=""></a></div><div class="carousel-item"> <a href="gallery.php"><img src="assets/images/4-2000x800-20-2000x800-800x320.jpg" alt="" title=""></a></div><div class="carousel-item"> <a href="gallery.php"><img src="assets/images/3-2000x800-31-2000x800-800x320.jpg" alt="" title=""></a></div><div class="carousel-item"> <a href="gallery.php"><img src="assets/images/6-2000x800-89-2000x800-800x320.jpg" alt="" title=""></a></div><div class="carousel-item"> <a href="gallery.php"><img src="assets/images/2000x800-24-2000x800-7-2000x800-800x320.jpg" alt="" title=""></a></div><div class="carousel-item"> <a href="gallery.php"><img src="assets/images/img-3506-2000x800-25-2000x800-800x320.jpg" alt="" title=""></a></div><div class="carousel-item active"> <a href="gallery.php"><img src="assets/images/5-2000x800-16-2000x800-800x320.jpg" alt="" title=""></a></div></div>

<a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="index.php#lb-gallery3-4">
<span class="mbri-left mbr-iconfont" aria-hidden="true"></span>
<span class="sr-only">Previous</span></a>
<a class="carousel-control carousel-control-next" role="button" data-slide="next" href="index.php#lb-gallery3-4">
<span class="mbri-right mbr-iconfont" aria-hidden="true"></span>
<span class="sr-only">Next</span></a><a class="close" href="index.php#" role="button" data-dismiss="modal">
<span class="sr-only">Close</span></a></div></div></div></div></div>
    </div>
<div class="mbr-section-btn text-center"><a href="gallery.php" class="btn btn-secondary display-4">
                            ألبوم الصور</a></div>
</section>

<section class="cid-qVP6c6IqfR" id="social-buttons2-a">

    

    

    <div class="container">
        <div class="media-container-row">
            <div class="col-md-8 align-center">
                <h2 class="pb-3 mbr-fonts-style display-5">
                FOLLOW US ON</h2>
                <div class="social-list pl-0 mb-0">
                    <a href="https://www.researchgate.net/profile/Nabil_Azmy/" target="_blank"><span class="mbr-iconfont mbr-iconfont-social socicon-researchgate socicon" style="color: rgb(249, 242, 149); font-size: 38px;"></span> </a>
                    <a href="https://scholar.google.com/" target="_blank"><span class="mbr-iconfont mbr-iconfont-social socicon-google-scholar socicon" style="color: rgb(249, 242, 149); font-size: 32px;"></span></a>
                    <a href="https://twitter.com/ProfAzmy?s=08" target="_blank"><span class="mbr-iconfont mbr-iconfont-social socicon-twitter socicon" style="color: rgb(249, 242, 149); font-size: 32px;"></span> </a>
                    <a href="https://www.facebook.com/nabil.g.azmy" target="_blank"><span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon" style="color: rgb(249, 242, 149); font-size: 32px;"></span> </a>
                    <a href="https://www.linkedin.com/in/prof-dr-nabil-gad-azmy-a72b3436" target="_blank"><span class="mbr-iconfont mbr-iconfont-social socicon-linkedin socicon" style="color: rgb(249, 242, 149); font-size: 32px;"></span> </a>
                </div>
                <div>
                  <h2>عدد الزائرين</h2>
                </div>


<center><a href="https://livetrafficfeed.com/flag-counter" data-row="9" data-col="3" data-code="0" data-flag="1" data-bg="ffffff" data-text="000000" data-root="1" id="LTF_flags_href">Flag Counter</a><script type="text/javascript" src="//cdn.livetrafficfeed.com/static/flag-counter/live.v2.js"></script><noscript><a href="https://livetrafficfeed.com/flag-counter">Flag Counter</a></noscript></center>


          </div>
        </div>
    </div>
</section>


        <script>
function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /*loop through a collection of all HTML elements:*/
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /*remove the attribute, and call this function once more:*/
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }      
      xhttp.open("GET", file, true);
      xhttp.send();
      /*exit the function:*/
      return;
    }
  }
};
</script>


<div w3-include-html="footer.php"></div> 

<script>
includeHTML();
</script>

    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/mbr-flip-card/mbr-flip-card.js"></script>
  <script src="assets/ytplayer/jquery.mb.ytplayer.min.js"></script>
  <script src="assets/vimeoplayer/jquery.mb.vimeo_player.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/masonry/masonry.pkgd.min.js"></script>
  <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/sociallikes/social-likes.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/bootstrapcarouselswipe/bootstrap-carousel-swipe.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/slidervideo/script.js"></script>
  <script src="assets/gallery/player.min.js"></script>
  <script src="assets/gallery/script.js"></script>
  
  <script>
  (function() {
    var cx = '017990005647804038335:u3pmwcgootm';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);
?>
