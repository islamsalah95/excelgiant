<?php
require_once __DIR__ . '/../config/database.php';
use App\Classes\Student;

$id = $_GET['id'];
$studentObj = new Student($pdo);
$studentObj->delete($id);
header("Location: index.php?page=home");
exit;
