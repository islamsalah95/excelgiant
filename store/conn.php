<?php

//MySQLi Procedural
//$conn = mysqli_connect("localhost","root","","between");
//if (!$conn) {
//  die("Connection failed: " . mysqli_connect_error());
//}

//MySQLi Object-oriented
$conn = new mysqli("localhost","waseet_users","Vn9o,4;db7Mu","waseet_database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>