<?php
require_once __DIR__ . '/../config/database.php';
use App\Classes\School;

$id = $_GET['id'];
$schoolObj = new School($pdo);
$schoolObj->delete($id);
header("Location: index.php?page=home");
exit;
