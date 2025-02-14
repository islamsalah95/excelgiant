<?php require_once('connections/connection.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../files/index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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








$colname_Recordset1 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset1 = $_GET['username'];
}

$colname_ReHeader = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_ReHeader = $_GET['username'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_ReHeader = sprintf("SELECT * FROM sadmin WHERE username = %s", GetSQLValueString($colname_ReHeader, "text"));
$ReHeader = mysqli_query($connection,$query_ReHeader) or die(mysqli_error($connection));
$row_ReHeader = mysqli_fetch_assoc($ReHeader);
$totalRows_ReHeader = mysqli_num_rows($ReHeader);



$colname_RSusers = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSusers = $_GET['username'];
}
$colname2_RSusers = "1";
if (isset($_GET['sadmin'])) {
  $colname2_RSusers = $_GET['sadmin'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSusers = sprintf("SELECT * FROM perm WHERE username = %s AND users=%s", GetSQLValueString($colname_RSusers, "text"),GetSQLValueString($colname2_RSusers, "text"));
$RSusers = mysqli_query($connection,$query_RSusers) or die(mysqli_error($connection));
$row_RSusers = mysqli_fetch_assoc($RSusers);
$totalRows_RSusers = mysqli_num_rows($RSusers);




$colname_RSmembers = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSmembers = $_GET['username'];
}
$colname2_RSmembers = "1";
if (isset($_GET['members'])) {
  $colname2_RSmembers = $_GET['members'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSmembers = sprintf("SELECT * FROM perm WHERE username = %s AND members=%s", GetSQLValueString($colname_RSmembers, "text"),GetSQLValueString($colname2_RSmembers, "text"));
$RSmembers = mysqli_query($connection,$query_RSmembers) or die(mysqli_error($connection));
$row_RSmembers = mysqli_fetch_assoc($RSmembers);
$totalRows_RSmembers = mysqli_num_rows($RSmembers);





$colname_RSdeletedmembers = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSdeletedmembers = $_GET['username'];
}
$colname2_RSdeletedmembers = "1";
if (isset($_GET['deletedmembers'])) {
  $colname2_RSdeletedmembers = $_GET['deletedmembers'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSdeletedmembers = sprintf("SELECT * FROM perm WHERE username = %s AND deletedmembers=%s", GetSQLValueString($colname_RSdeletedmembers, "text"),GetSQLValueString($colname2_RSdeletedmembers, "text"));
$RSdeletedmembers = mysqli_query($connection,$query_RSdeletedmembers) or die(mysqli_error($connection));
$row_RSdeletedmembers = mysqli_fetch_assoc($RSdeletedmembers);
$totalRows_RSdeletedmembers = mysqli_num_rows($RSdeletedmembers);





$colname_RStowns = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RStowns = $_GET['username'];
}
$colname2_RStowns = "1";
if (isset($_GET['towns'])) {
  $colname2_RStowns = $_GET['towns'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RStowns = sprintf("SELECT * FROM perm WHERE username = %s AND towns=%s", GetSQLValueString($colname_RStowns, "text"),GetSQLValueString($colname2_RStowns, "text"));
$RStowns = mysqli_query($connection,$query_RStowns) or die(mysqli_error($connection));
$row_RStowns = mysqli_fetch_assoc($RStowns);
$totalRows_RStowns = mysqli_num_rows($RStowns);




$colname_RSreports = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSreports = $_GET['username'];
}
$colname2_RSreports = "1";
if (isset($_GET['reports'])) {
  $colname2_RSreports = $_GET['reports'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSreports = sprintf("SELECT * FROM perm WHERE username = %s AND reports=%s", GetSQLValueString($colname_RSreports, "text"),GetSQLValueString($colname2_RSreports, "text"));
$RSreports = mysqli_query($connection,$query_RSreports) or die(mysqli_error($connection));
$row_RSreports = mysqli_fetch_assoc($RSreports);
$totalRows_RSreports = mysqli_num_rows($RSreports);







$colname_RSrequests = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSrequests = $_GET['username'];
}
$colname2_RSrequests = "1";
if (isset($_GET['requests'])) {
  $colname2_RSrequests = $_GET['requests'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSrequests = sprintf("SELECT * FROM perm WHERE username = %s AND requests=%s", GetSQLValueString($colname_RSrequests, "text"),GetSQLValueString($colname2_RSrequests, "text"));
$RSrequests = mysqli_query($connection,$query_RSrequests) or die(mysqli_error($connection));
$row_RSrequests = mysqli_fetch_assoc($RSrequests);
$totalRows_RSrequests = mysqli_num_rows($RSrequests);






$colname_RScomplaints = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RScomplaints = $_GET['username'];
}
$colname2_RScomplaints = "1";
if (isset($_GET['complaints'])) {
  $colname2_RScomplaints = $_GET['complaints'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RScomplaints = sprintf("SELECT * FROM perm WHERE username = %s AND complaints=%s", GetSQLValueString($colname_RScomplaints, "text"),GetSQLValueString($colname2_RScomplaints, "text"));
$RScomplaints = mysqli_query($connection,$query_RScomplaints) or die(mysqli_error($connection));
$row_RScomplaints = mysqli_fetch_assoc($RScomplaints);
$totalRows_RScomplaints = mysqli_num_rows($RScomplaints);






$colname_RSbanks = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSbanks = $_GET['username'];
}
$colname2_RSbanks = "1";
if (isset($_GET['banks'])) {
  $colname2_RSbanks = $_GET['banks'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSbanks = sprintf("SELECT * FROM perm WHERE username = %s AND banks=%s", GetSQLValueString($colname_RSbanks, "text"),GetSQLValueString($colname2_RSbanks, "text"));
$RSbanks = mysqli_query($connection,$query_RSbanks) or die(mysqli_error($connection));
$row_RSbanks = mysqli_fetch_assoc($RSbanks);
$totalRows_RSbanks = mysqli_num_rows($RSbanks);








$colname_RSpayments = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSpayments = $_GET['username'];
}
$colname2_RSpayments = "1";
if (isset($_GET['payments'])) {
  $colname2_RSpayments = $_GET['payments'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSpayments = sprintf("SELECT * FROM perm WHERE username = %s AND payments=%s", GetSQLValueString($colname_RSpayments, "text"),GetSQLValueString($colname2_RSpayments, "text"));
$RSpayments = mysqli_query($connection,$query_RSpayments) or die(mysqli_error($connection));
$row_RSpayments = mysqli_fetch_assoc($RSpayments);
$totalRows_RSpayments = mysqli_num_rows($RSpayments);









$colname_RSmail = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSmail = $_GET['username'];
}
$colname2_RSmail = "1";
if (isset($_GET['mail'])) {
  $colname2_RSmail = $_GET['mail'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSmail = sprintf("SELECT * FROM perm WHERE username = %s AND mail=%s", GetSQLValueString($colname_RSmail, "text"),GetSQLValueString($colname2_RSmail, "text"));
$RSmail = mysqli_query($connection,$query_RSmail) or die(mysqli_error($connection));
$row_RSmail = mysqli_fetch_assoc($RSmail);
$totalRows_RSmail = mysqli_num_rows($RSmail);









$colname_RSbackup = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSbackup = $_GET['username'];
}
$colname2_RSbackup = "1";
if (isset($_GET['backup'])) {
  $colname2_RSbackup = $_GET['backup'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSbackup = sprintf("SELECT * FROM perm WHERE username = %s AND backup=%s", GetSQLValueString($colname_RSbackup, "text"),GetSQLValueString($colname2_RSbackup, "text"));
$RSbackup = mysqli_query($connection,$query_RSbackup) or die(mysqli_error($connection));
$row_RSbackup = mysqli_fetch_assoc($RSbackup);
$totalRows_RSbackup = mysqli_num_rows($RSbackup);







$colname_RSrestore = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSrestore = $_GET['username'];
}
$colname2_RSrestore = "1";
if (isset($_GET['restore'])) {
  $colname2_RSrestore = $_GET['restore'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSrestore = sprintf("SELECT * FROM perm WHERE username = %s AND restore=%s", GetSQLValueString($colname_RSrestore, "text"),GetSQLValueString($colname2_RSrestore, "text"));
$RSrestore = mysqli_query($connection,$query_RSrestore) or die(mysqli_error($connection));
$row_RSrestore = mysqli_fetch_assoc($RSrestore);
$totalRows_RSrestore = mysqli_num_rows($RSrestore);







$colname_RSsearches = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_RSsearches = $_GET['username'];
}
$colname2_RSsearches = "1";
if (isset($_GET['searches'])) {
  $colname2_RSsearches = $_GET['searches'];
}
mysqli_select_db($connection, "excelgia_mahmdata");
$query_RSsearches = sprintf("SELECT * FROM perm WHERE username = %s AND searches=%s", GetSQLValueString($colname_RSsearches, "text"),GetSQLValueString($colname2_RSsearches, "text"));
$RSsearches = mysqli_query($connection,$query_RSsearches) or die(mysqli_error($connection));
$row_RSsearches = mysqli_fetch_assoc($RSsearches);
$totalRows_RSsearches = mysqli_num_rows($RSsearches);

?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "main.php";
  $MM_redirectLoginFailed = "error.php";
  $MM_redirecttoReferrer = true;
  mysqli_select_db($connection, "excelgia_mahmdata");
  
  $LoginRS__query=sprintf("SELECT username, password FROM sadmin WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($connection,$LoginRS__query) or die(mysqli_error($connection));
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
  
  
  
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index:99;

}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
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
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>




<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.pill-nav a {
	display: block;
	color: black;
	padding: 14px;
	text-decoration: none;
	font-size: 17px;
	border-radius: 5px;
	margin-left: 0px;  
  
  
}

.pill-nav a:hover {
  background-color: #ddd;
  color: black;
}

.pill-nav a.active {
  background-color: dodgerblue;
  color: white;
}
</style>
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

#navbar {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 90px 10px;
  transition: 0.4s;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 99;
}

#navbar a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

#navbar #logo {
  font-size: 35px;
  font-weight: bold;
  transition: 0.4s;
}

#navbar a:hover {
  background-color: #ddd;
  color: black;
}

#navbar a.active {
  background-color: dodgerblue;
  color: white;
}

#navbar-right {
  float: right;
}

@media screen and (max-width: 580px) {
  #navbar {
    padding: 20px 10px !important;
  }
  #navbar a {
    float: none;
    display: block;
    text-align: left;
  }
  #navbar-right {
    float: none;
  }
}
dddd {
	font-size: 36px;
}
.w3-light-grey #myTopnav div {
	font-size: large;
}
.w3-light-grey #myTopnav div {
	font-weight: bold;
}
.w3-light-grey #myTopnav div {
	color: #FFF;
}
.w3-light-grey #myTopnav div p {
	font-size: medium;
}
.w3-light-grey .w3-content.w3-margin-top .w3-row-padding .w3-third .w3-white.w3-text-grey.w3-card-4 .w3-container p strong {
	font-size: 24px;
}
</style>

<body dir="rtl" class="w3-light-grey">


<div class="topnav" id="myTopnav" style="">
  <a href="main.php" class="active"><i class="fa fa-fw fa-home"></i></a>
  <a href="account.php?username=<?php echo $_SESSION['MM_Username'] ?>"><i class="fa fa-user" aria-hidden="true"></i> حسابي </a><a href="changepassword.php?username=<?php echo $_SESSION['MM_Username'] ?>"><i class="fa fa-lock" aria-hidden="true"></i> تغيير كلمة المرور </a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onClick="myFunction()">&#9776;</a>
  <a href="<?php echo $logoutAction ?>"><i class="fa fa-sign-out"></i> خروج </a>
  <div>
    <p align="center">لوحة التحكم - مرحباً يا : <?php echo $_SESSION['MM_Username'] ?> - <strong><?php echo $row_ReHeader['first_name']; ?></strong> <strong><?php echo $row_ReHeader['bname']; ?></strong> <strong><?php echo $row_ReHeader['cname']; ?></strong> <strong><?php echo $row_ReHeader['last_name']; ?></strong></p>

  </div>
</div>





<!-- Page Container -->
<div class="w3-container w3-card w3-white w3-margin-bottom" style="background-image: linear-gradient(WHITE, WHITE,  WHITE,  WHITE,  WHITE,  WHITE, gray);">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="5" align="center"><style>
			body{
				background: linear-gradient(to bottom, #302b63, white);
				font-family:Arial;
			}
			span.reference{
				position:fixed;
				left:10px;
				bottom:10px;
				font-size:14px;
			}
			span.reference a{
				color:#aaa;
				text-transform:uppercase;
				text-decoration:none;
				text-shadow:1px 1px 1px #000;
				margin-right:30px;
			}
			span.reference a:hover{
				color:#ddd;
			}
			ul.sdt_menu{
				margin-top:10px;
			}
		</style>  <link rel="stylesheet" href="css/menu.css" type="text/css" media="screen"/>
      <!-- The JavaScript -->
      <script type="text/javascript" src="jquery.min.js"></script>
      <script type="text/javascript" src="jquery.easing.1.3.js"></script>
      <script type="text/javascript">
            $(function() {
				/**
				* for each menu element, on mouseenter, 
				* we enlarge the image, and show both sdt_active span and 
				* sdt_wrap span. If the element has a sub menu (sdt_box),
				* then we slide it - if the element is the last one in the menu
				* we slide it to the left, otherwise to the right
				*/
                $('#sdt_menu > li').bind('mouseenter',function(){
					var $elem = $(this);
					$elem.find('img')
						 .stop(true)
						 .animate({
							'width':'170px',
							'height':'170px',
							'left':'0px'
						 },400,'easeOutBack')
						 .andSelf()
						 .find('.sdt_wrap')
					     .stop(true)
						 .animate({'top':'140px'},500,'easeOutBack')
						 .andSelf()
						 .find('.sdt_active')
					     .stop(true)
						 .animate({'height':'170px'},300,function(){
						var $sub_menu = $elem.find('.sdt_box');
						if($sub_menu.length){
							var left = '170px';
							if($elem.parent().children().length == $elem.index()+1)
								left = '-170px';
							$sub_menu.show().animate({'left':left},200);
						}	
					});
				}).bind('mouseleave',function(){
					var $elem = $(this);
					var $sub_menu = $elem.find('.sdt_box');
					if($sub_menu.length)
						$sub_menu.hide().css('left','0px');
					
					$elem.find('.sdt_active')
						 .stop(true)
						 .animate({'height':'0px'},300)
						 .andSelf().find('img')
						 .stop(true)
						 .animate({
							'width':'0px',
							'height':'0px',
							'left':'85px'},400)
						 .andSelf()
						 .find('.sdt_wrap')
						 .stop(true)
						 .animate({'top':'25px'},500);
				});
            });
        </script>
      <p><img src="../img/logo.png" width="200"><br>
      </p>
      <p>&nbsp; </p></td>
  </tr>
  </table>

</div>
<!-- End Page Container -->
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
<?php
mysqli_free_result($ReHeader);
?>
