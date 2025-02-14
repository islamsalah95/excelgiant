<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
// $hostname_connection = "localhost";
// $database_connection = "excelgia_mahmdata";
// $username_connection = "excelgia_mahmuser";
// $password_connection = "MztdYLMq]p1L";
// $connection = mysql_pconnect($hostname_connection, $username_connection, $password_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
// mysql_set_charset("UTF8", $connection);




$hostname = "localhost";
$username = "root";
$password = "";
$database = "excelgia_mahmdata";

// Use a persistent MySQLi connection (by prepending "p:" to the hostname)
$connection = mysqli_connect("p:" . $hostname, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($connection, "utf8");
?>
