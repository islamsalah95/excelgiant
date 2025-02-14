<?php require_once('connections/connection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
    global $connection; // Use the MySQLi connection

    // Escape the value for MySQLi
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

// --- Query for 'slidat'
$query_rsslidat = "SELECT * FROM slidat ORDER BY id DESC";
$rsslidat = mysqli_query($connection, $query_rsslidat) or die(mysqli_error($connection));
$row_rsslidat = mysqli_fetch_assoc($rsslidat);
$totalRows_rsslidat = mysqli_num_rows($rsslidat);

// --- Query for 'blogs' by id (Recordset1)
$colname_Recordset1 = "1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
$query_Recordset1 = sprintf("SELECT * FROM blogs WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($connection, $query_Recordset1) or die(mysqli_error($connection));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);

// --- Query for 'blogs' by category (rssingle)
$colname_rssingle = "خدماتنا";
if (isset($_GET['category'])) {
  $colname_rssingle = $_GET['category'];
}
$query_rssingle = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id DESC", GetSQLValueString($colname_rssingle, "text"));
$rssingle = mysqli_query($connection, $query_rssingle) or die(mysqli_error($connection));
$row_rssingle = mysqli_fetch_assoc($rssingle);
$totalRows_rssingle = mysqli_num_rows($rssingle);

// --- Query for 'blogs' by category (rsgroup)
$colname_rsgroup = "اعمالنا";
if (isset($_GET['category'])) {
  $colname_rsgroup = $_GET['category'];
}
$query_rsgroup = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id DESC", GetSQLValueString($colname_rsgroup, "text"));
$rsgroup = mysqli_query($connection, $query_rsgroup) or die(mysqli_error($connection));
$row_rsgroup = mysqli_fetch_assoc($rsgroup);
$totalRows_rsgroup = mysqli_num_rows($rsgroup);

// --- Query for 'blogs' by category (rsparteners)
$colname_rsparteners = "شركاؤنا";
if (isset($_GET['category'])) {
  $colname_rsparteners = $_GET['category'];
}
$query_rsparteners = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id ASC", GetSQLValueString($colname_rsparteners, "text"));
$rsparteners = mysqli_query($connection, $query_rsparteners) or die(mysqli_error($connection));
$row_rsparteners = mysqli_fetch_assoc($rsparteners);
$totalRows_rsparteners = mysqli_num_rows($rsparteners);

// --- Query for 'blogs' by category (rscamp)
$colname_rscamp = "معسكرات";
if (isset($_GET['category'])) {
  $colname_rscamp = $_GET['category'];
}
$query_rscamp = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id DESC", GetSQLValueString($colname_rscamp, "text"));
$rscamp = mysqli_query($connection, $query_rscamp) or die(mysqli_error($connection));
$row_rscamp = mysqli_fetch_assoc($rscamp);
$totalRows_rscamp = mysqli_num_rows($rscamp);

// --- Query for 'siteinfo'
$colname_rssiteinfo = "1";
if (isset($_GET['id'])) {
  $colname_rssiteinfo = $_GET['id'];
}
$query_rssiteinfo = sprintf("SELECT * FROM siteinfo WHERE id = %s ORDER BY id DESC", GetSQLValueString($colname_rssiteinfo, "int"));
$rssiteinfo = mysqli_query($connection, $query_rssiteinfo) or die(mysqli_error($connection));
$row_rssiteinfo = mysqli_fetch_assoc($rssiteinfo);
$totalRows_rssiteinfo = mysqli_num_rows($rssiteinfo);

// --- Query for 'blogs' by category (rsaims)
$colname_rsaims = "الرؤية والرسالة";
if (isset($_GET['category'])) {
  $colname_rsaims = $_GET['category'];
}
$query_rsaims = sprintf("SELECT * FROM blogs WHERE category = %s ORDER BY id ASC", GetSQLValueString($colname_rsaims, "text"));
$rsaims = mysqli_query($connection, $query_rsaims) or die(mysqli_error($connection));
$row_rsaims = mysqli_fetch_assoc($rsaims);
$totalRows_rsaims = mysqli_num_rows($rsaims);
?>