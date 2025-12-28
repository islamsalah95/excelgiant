<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing connections/connection.php...\n";
require_once 'connections/connection.php';

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
