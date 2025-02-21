<?php
// Load required files
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Classes\Student;

// Set the header to return JSON
header('Content-Type: application/json');

// // Get POST variables
$filterType  = isset($_GET['filter_type']) ? $_GET['filter_type'] : '';
$filterValue = isset($_GET['filter_value']) ? $_GET['filter_value'] : '';
$schoolName = isset($_GET['name']) ? $_GET['name'] : '';


// Create a Student object
$studentObj = new Student($pdo);

// Use a method in your Student class to filter results
$students = $studentObj->filter($filterType, $filterValue ,$schoolName );

// Return the results as JSON
echo json_encode($students);
