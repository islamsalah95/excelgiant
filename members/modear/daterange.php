<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../modear.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
<?php include 'header.php'; ?>
<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">تقرير انتهاء الصلاحية لتاريخ محدد</h3>
		<hr style="border-top:1px dotted #000;"/>
		<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="ltr">
  <tr>
    <td><form class="form-inline" method="POST" action="">
			<label>Date:</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1"/>
			<label>To</label>
			<input type="date" class="form-control" placeholder="End"  name="date2"/>
			<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> <a href="daterange.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
		</form></td>
  </tr>
</table>

		<br /><br />
		<div class="table-responsive">	
			<table dir="rtl" class="table table-bordered">
				<thead class="alert-info">
					<tr align="center">
						<th>اسم العضو</th>
						<th>رقم العضوية</th>
						<th>تاريخ انتهاء الصلاحية</th>
						<th>الموظف المسئول</th>
						<th>رقم السند</th>
						<th>نوع الخدمة</th>
					</tr>
				</thead>
				<tbody>
					<?php include'range.php'?>	
				</tbody>
			</table>
		</div>	
	</div>
</body>
</html>