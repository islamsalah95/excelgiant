<?php
$restore_file  = "/home/abdul/20140306_world_copy.sql";
$server_name   = "localhost";
$username      = "root";
$password      = "";
$database_name = "libya_database";

$cmd = "mysql -h {$server_name} -u {$username} -p{$password} {$database_name} < $restore_file";
exec($cmd);

?>