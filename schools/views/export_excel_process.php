<?php
// public/export_excel.php

// Turn off output buffering and clear previous output
if (ob_get_length()) ob_end_clean();

// Load dependencies and database connection
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Validate school ID
$schoolId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
if ($schoolId <= 0) {
    die("Invalid school ID.");
}

// Increase memory and execution limits
ini_set('memory_limit', '512M');
set_time_limit(300);

// Check actual column names
$stmt = $pdo->prepare("
    SELECT s.id, s.name, s.seating_number, s.national_number, s.graid, 
           s.specialization, s.term, s.result, s.total_score, s.total_total, 
           s.percentage, sc.name AS school_name 
    FROM student_schools s 
    JOIN schools sc ON s.school_id = sc.id 
    WHERE s.school_id = ?
");
$stmt->execute([$schoolId]);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

// If no students found, exit
if (empty($students)) {
    die("No student records found.");
}

// Create a new Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set header row
$headers = [
    'A1' => 'school_name',
    'B1' => 'name',
    'C1' => 'seating_number',
    'D1' => 'national_number',
    'E1' => 'graid',
    'F1' => 'specialization',
    'G1' => 'term',
    'H1' => 'result',
    'I1' => 'total_score',
    'J1' => 'total_total',
    'K1' => 'percentage'
];

// Apply headers
foreach ($headers as $cell => $headerText) {
    $sheet->setCellValue($cell, $headerText);
}

// Fill student data
$rowNum = 2;
foreach ($students as $student) {
    $sheet->setCellValue("A$rowNum", $student['school_name']);
    $sheet->setCellValue("B$rowNum", $student['name']);
    $sheet->setCellValue("C$rowNum", $student['seating_number']);
    $sheet->setCellValue("D$rowNum", $student['national_number']);
    $sheet->setCellValue("E$rowNum", $student['graid']);
    $sheet->setCellValue("F$rowNum", $student['specialization']);
    $sheet->setCellValue("G$rowNum", $student['term']);
    $sheet->setCellValue("H$rowNum", $student['result']);
    $sheet->setCellValue("I$rowNum", $student['total_score']);
    $sheet->setCellValue("J$rowNum", $student['total_total']);
    $sheet->setCellValue("K$rowNum", $student['percentage']);
    $rowNum++;
}

// Set headers for file download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="students.xlsx"');
header('Cache-Control: max-age=0');
header('Pragma: public');
header('Expires: 0');

// Write and output the Excel file
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
exit;
