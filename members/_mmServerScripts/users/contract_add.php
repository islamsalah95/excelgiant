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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO contract (id, ElFara, ElKesm, Elbaka, elbakatitle, tamrinatedafia, Elmodareb, Elodw, TafeelDate, MowazafName, Total, khasm, Madfoaa, Bakey, Notes, tarekh) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['ElFara'], "text"),
                       GetSQLValueString($_POST['ElKesm'], "text"),
                       GetSQLValueString($_POST['Elbaka'], "text"),
                       GetSQLValueString($_POST['elbakatitle'], "text"),
					   GetSQLValueString($_POST['tamrinatedafia'], "text"),
                       GetSQLValueString($_POST['Elmodareb'], "text"),
                       GetSQLValueString($_POST['Elodw'], "text"),
                       GetSQLValueString($_POST['TafeelDate'], "text"),
                       GetSQLValueString($_POST['MowazafName'], "text"),
                       GetSQLValueString($_POST['Total'], "text"),
                       GetSQLValueString($_POST['khasm'], "text"),
                       GetSQLValueString($_POST['Madfoaa'], "text"),
                       GetSQLValueString($_POST['Bakey'], "text"),
                       GetSQLValueString($_POST['Notes'], "text"),
                       GetSQLValueString($_POST['tarekh'], "text"));

  mysqli_query($connection, $query)($database_connection, $connection);
  $Result1 = mysqli_query($connection,$insertSQL) or die(mysqli_error($connection));

  $insertGoTo = "main.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
if (!isset($_SESSION)) {
  session_start();
}

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElFara = "SELECT * FROM towns";
$RSElFara = mysqli_query($connection,$query_RSElFara) or die(mysqli_error($connection));
$row_RSElFara = mysqli_fetch_assoc($RSElFara);
$totalRows_RSElFara = mysqli_num_rows($RSElFara);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElKesm = "SELECT * FROM banks";
$RSElKesm = mysqli_query($connection,$query_RSElKesm) or die(mysqli_error($connection));
$row_RSElKesm = mysqli_fetch_assoc($RSElKesm);
$totalRows_RSElKesm = mysqli_num_rows($RSElKesm);

$colname_RSElbaka = "-1";
if (isset($_GET['Elbaka'])) {
  $colname_RSElbaka = $_GET['Elbaka'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElbaka = sprintf("SELECT * FROM university WHERE id = %s", GetSQLValueString($colname_RSElbaka, "int"));
$RSElbaka = mysqli_query($connection,$query_RSElbaka) or die(mysqli_error($connection));
$row_RSElbaka = mysqli_fetch_assoc($RSElbaka);
$totalRows_RSElbaka = mysqli_num_rows($RSElbaka);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElmodareb = "SELECT * FROM trainers";
$RSElmodareb = mysqli_query($connection,$query_RSElmodareb) or die(mysqli_error($connection));
$row_RSElmodareb = mysqli_fetch_assoc($RSElmodareb);
$totalRows_RSElmodareb = mysqli_num_rows($RSElmodareb);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSElodw = "SELECT * FROM members";
$RSElodw = mysqli_query($connection,$query_RSElodw) or die(mysqli_error($connection));
$row_RSElodw = mysqli_fetch_assoc($RSElodw);
$totalRows_RSElodw = mysqli_num_rows($RSElodw);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSMasoul = "SELECT * FROM responsible";
$RSMasoul = mysqli_query($connection,$query_RSMasoul) or die(mysqli_error($connection));
$row_RSMasoul = mysqli_fetch_assoc($RSMasoul);
$totalRows_RSMasoul = mysqli_num_rows($RSMasoul);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSUsers = "SELECT * FROM users";
$RSUsers = mysqli_query($connection,$query_RSUsers) or die(mysqli_error($connection));
$row_RSUsers = mysqli_fetch_assoc($RSUsers);
$totalRows_RSUsers = mysqli_num_rows($RSUsers);

mysqli_query($connection, $query)($database_connection, $connection);
$query_RSAdmin = "SELECT * FROM sadmin";
$RSAdmin = mysqli_query($connection,$query_RSAdmin) or die(mysqli_error($connection));
$row_RSAdmin = mysqli_fetch_assoc($RSAdmin);
$totalRows_RSAdmin = mysqli_num_rows($RSAdmin);

$colname_Recordset1 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset1 = $_GET['sub_syndicate'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset1 = sprintf("SELECT * FROM university WHERE branch = %s", GetSQLValueString($colname_Recordset1, "text"));
$Recordset1 = mysqli_query($connection,$query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset2 = $_GET['sub_syndicate'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset2 = sprintf("SELECT * FROM towns WHERE id = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysqli_query($connection,$query_Recordset2) or die(mysqli_error($connection));
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$colname_Recordset3 = "-1";
if (isset($_GET['sub_syndicate'])) {
  $colname_Recordset3 = $_GET['sub_syndicate'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset3 = sprintf("SELECT * FROM towns WHERE name = %s", GetSQLValueString($colname_Recordset3, "text"));
$Recordset3 = mysqli_query($connection,$query_Recordset3) or die(mysqli_error($connection));
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);

$colname_Recordset4 = "-1";
if (isset($_GET['username'])) {
  $colname_Recordset4 = $_GET['username'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset4 = sprintf("SELECT * FROM users WHERE username = %s", GetSQLValueString($colname_Recordset4, "text"));
$Recordset4 = mysqli_query($connection,$query_Recordset4) or die(mysqli_error($connection));
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);

$colname_Recordset5 = $_SESSION['MM_Username'];
if (isset($_GET['username'])) {
  $colname_Recordset5 = $_GET['username'];
}
$colname_Recordset5 =  $_SESSION['MM_Username'] ;
if (isset($_GET['userata'])) {
  $colname_Recordset5 = $_GET['userata'];
}
mysqli_query($connection, $query)($database_connection, $connection);
$query_Recordset5 = sprintf("SELECT * FROM users WHERE username = %s", GetSQLValueString($colname_Recordset5, "text"));
$Recordset5 = mysqli_query($connection,$query_Recordset5) or die(mysqli_error($connection));
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);
?>

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
	
  $logoutGoTo = "../index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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
    // Besides being logged in, you may restrict access to only certain sadmin based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain sadmin based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../index.php";
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
  mysqli_query($connection, $query)($database_connection, $connection);
  
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Energy Fitness Center</title>
</head>

<body>
<?php include 'header.php'; ?>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="center"><h2><strong>عقود الأعضاء</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td><table width="100" align="center" dir="rtl">
      <tr bgcolor="#EEEEEE">
        <td><form id="form2" name="form2" method="get" action="">
          <table width="300" align="center" dir="rtl">
            <tr valign="baseline">
              <td align="right" nowrap="nowrap"><label for="sub_syndicate"></label>
                <select name="sub_syndicate" id="sub_syndicate" style="width: 300px" onchange="this.form.submit()";>
                  <option value="">اختر الفرع ..</option>
                  <?php
do {  
?>
                  <option value="<?php echo $row_Recordset2['name']?>"><?php echo $row_Recordset2['name']?></option>
                  <?php
} while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
  $rows = mysqli_num_rows($Recordset2);
  if($rows > 0) {
      mysql_data_seek($Recordset2, 0);
	  $row_Recordset2 = mysqli_fetch_assoc($Recordset2);
  }
?>
                </select></td>
              <td align="right" nowrap="nowrap"><select name="Elbaka" id="Elbaka" style="width: 300px"; onchange="this.form.submit()">
                <option value="">اختر الباقة ..</option>
                <?php
do {  
?>
                <option value="<?php echo $row_Recordset1['id']?>"><?php echo $row_Recordset1['name']?></option>
                <?php
} while ($row_Recordset1 = mysqli_fetch_assoc($Recordset1));
  $rows = mysqli_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
  }
?>
              </select></td>
              </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
      <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1"?sub_syndicate=<?php echo $row_RSElFara['id']; ?>>
        <table align="center" dir="rtl">
          <tr valign="baseline">
            <td width="100" align="right" nowrap="nowrap">اسم المدرب:</td>
            <td width="200"><select name="Elmodareb" style="width: 200px";>
              <?php
do {  
?>
              <option value="<?php echo $row_RSElmodareb['username']?>"><?php echo $row_RSElmodareb['username']?></option>
              <?php
} while ($row_RSElmodareb = mysqli_fetch_assoc($RSElmodareb));
  $rows = mysqli_num_rows($RSElmodareb);
  if($rows > 0) {
      mysql_data_seek($RSElmodareb, 0);
	  $row_RSElmodareb = mysqli_fetch_assoc($RSElmodareb);
  }
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td width="100" align="right" nowrap="nowrap">اسم العضو:</td>
            <td width="200"><select name="Elodw" style="width: 200px";>
              <?php 
do {  
?>
              <option value="<?php echo $row_RSElodw['id']?>" ><?php echo $row_RSElodw['aname']?> <?php echo $row_RSElodw['bname']?> <?php echo $row_RSElodw['cname']?> <?php echo $row_RSElodw['dname']?></option>
              <?php
} while ($row_RSElodw = mysqli_fetch_assoc($RSElodw));
?>
            </select></td>
          </tr>
          <tr valign="baseline">
            <td width="100" align="right" nowrap="nowrap">تاريخ التفعيل:</td>
            <td width="200"><input type="date" name="TafeelDate" value="" size="32" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">الفرع:</td>
            <td><strong><?php echo $row_RSElbaka['branch']; ?>
              <input name="ElFara" type="hidden" id="ElFara" value="<?php echo $row_RSElbaka['branch']; ?>" />
            </strong></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">القسم:</td>
            <td><strong><?php echo $row_RSElbaka['section']; ?>
              <input name="ElKesm" type="hidden" id="ElKesm" value="<?php echo $row_RSElbaka['section']; ?>" />
            </strong></td>
          </tr>
          <tr valign="baseline">
            <td width="100" align="right" nowrap="nowrap">الباقة:</td>
            <td width="200"><strong><?php echo $row_RSElbaka['name']; ?>              
              <input name="Elbaka" type="hidden" id="Elbaka" value="<?php echo $row_RSElbaka['id']; ?>" />
            </strong></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">عدد التمرينات:</td>
            <td><strong>
              <label for="textfield2"></label>
              <input name="textfield2" type="text" id="kema1" value="<?php echo $row_RSElbaka['tamrinat']; ?> " onkeyup="sum2();" />
              <label for="tamrinatedafia"></label>
            </strong></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">عدد التمرينات الاضافية:</td>
            <td><label for="textfield"></label>
              <input name="textfield" type="text" id="kema2" onkeyup="sum2();" value="0" /></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap="nowrap">عدد التمرينات النهائية:</td>
            <td><strong>
              <input name="tamrinatedafia" type="text" id="kema4" value="<?php echo $row_RSElbaka['tamrinat']; ?> " />
            </strong></td>
          </tr>
          <tr valign="baseline">
            <td width="100" align="right" nowrap="nowrap">المبلغ الاجمالي:</td>
            <td width="200"><input type="text" id="txt1" name="Total" value="<?php echo $row_RSElbaka['price']; ?>" onkeyup="sum();"/></td>
          </tr>
          <tr valign="baseline">
            <td width="100" align="right" nowrap="nowrap">المبلغ المدفوع:</td>
            <td width="200"><input type="text" id="txt2" name="Madfoaa" value="" onkeyup="sum();"/></td>
          </tr>
          <tr valign="baseline">
            <td width="100" align="right" nowrap="nowrap">الخصم:</td>
            <td width="200"><input type="text" id="txt3" name="khasm" value="0" onkeyup="sum();"/></td>
          </tr>
          <tr valign="baseline">
            <td width="100" align="right" nowrap="nowrap">المبلغ المتبقى:</td>
            <td width="200"><strong>
              <input name="elbakatitle" type="hidden" id="elbakatitle" value="<?php echo $row_RSElbaka['name']; ?>" />
            </strong>              <input type="text" id="txt4" name="Bakey" value="" /></td>
          </tr>
          <tr valign="baseline">
            <td width="100" align="right" nowrap="nowrap"><input name="Notes" type="hidden" value="" size="50" />              <input type="hidden" name="MowazafName" value="<?php echo $_SESSION['MM_Username'] ?>" size="32" /></td>
            <td width="200"><strong>
              <input name="tarekh" type="hidden" id="tarekh" value="<?php echo date("Y-m-d") ;?>" />
            </strong>              <input type="submit" value="إضافة" /></td>
          </tr>
        </table>
        <input type="hidden" name="id" value="" />
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var txtThirdNumberValue = document.getElementById('txt3').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue) - parseInt(txtThirdNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt4').value = result;
            }
        }
</script>
<script>
function sum2() {
            var kemaFirstNumberValue = document.getElementById('kema1').value;
            var kemaSecondNumberValue = document.getElementById('kema2').value;
            var result = parseInt(kemaFirstNumberValue) + parseInt(kemaSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('kema4').value = result;
            }
        }
</script>
</body>
</html>
<?php
mysqli_free_result($RSElFara);

mysqli_free_result($RSElKesm);

mysqli_free_result($RSElbaka);

mysqli_free_result($RSElmodareb);

mysqli_free_result($RSElodw);

mysqli_free_result($RSMasoul);

mysqli_free_result($RSUsers);

mysqli_free_result($RSAdmin);

mysqli_free_result($Recordset1);

mysqli_free_result($Recordset2);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);
?>
