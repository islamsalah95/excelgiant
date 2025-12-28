<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing store/connections/connection.php...\n";
// We need to simulate being in the root or just include the file. 
// If we include 'store/connections/connection.php' from root, the relative path '../../global_config.php' inside it will be relative to the *file*, not the execution script. 
// So it should work fine.

require_once 'store/connections/connection.php';

if (isset($connection) && $connection instanceof mysqli) {
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error() . "\n";
        exit(1);
    } else {
        echo "Success: Connected to " . $database . " on " . $hostname . "\n";
    }
} else {
    echo "Error: \$connection variable not found or invalid.\n";
    exit(1);
}
?>
