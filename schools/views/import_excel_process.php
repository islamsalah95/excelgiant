<?php
// public/process_excel.php

// Load Composer's autoloader and database configuration.
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Increase time and memory limits (adjust as needed)
set_time_limit(300);
ini_set('memory_limit', '256M');

// Check if the file was uploaded without errors.
if (isset($_FILES['excel_file']['name']) && $_FILES['excel_file']['error'] === 0) {
    $filePath = $_FILES['excel_file']['tmp_name'];

    // Load the Excel file.
    try {
        $spreadsheet = IOFactory::load($filePath);
    } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
        die('Error loading file: ' . $e->getMessage());
    }

    // Get the active worksheet.
    $worksheet = $spreadsheet->getActiveSheet();

    // Convert the worksheet into an array.
    // Keys of the array will be the column letters (e.g., 'A', 'B', etc.)
    $rows = $worksheet->toArray(null, true, true, true);

    // Prepare SQL statements.
    // We use the unique column "national_number" to determine if a record exists.
    $insertSQL = "INSERT INTO student_schools 
        (school_id, name, seating_number, national_number, graid, specialization, term, result, total_score, total_total, percentage)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $updateSQL = "UPDATE student_schools 
        SET school_id = ?, name = ?, seating_number = ?, graid = ?, specialization = ?, term = ?, result = ?, total_score = ?, total_total = ?, percentage = ?
        WHERE national_number = ?";
    $checkSQL  = "SELECT id FROM student_schools WHERE national_number = ?";

    $insertStmt = $pdo->prepare($insertSQL);
    $updateStmt = $pdo->prepare($updateSQL);
    $checkStmt  = $pdo->prepare($checkSQL);

    $inserted = 0;
    $updated  = 0;

    // Assuming the first row is the header, start processing from row 2.
    foreach ($rows as $rowIndex => $row) {
        if ($rowIndex == 1) {
            continue; // Skip header row.
        }

        // Map Excel columns to database fields.
        // For example, assume:
        // Column A: school_id, B: name, C: seating_number, D: national_number,
        // E: graid, F: specialization, G: term, H: result, I: total_score,
        // J: total_total, K: percentage
        $school_id       = $row['A'];
        $name            = $row['B'];
        $seating_number  = $row['C'];
        $national_number = $row['D'];
        $graid           = $row['E'];
        $specialization  = $row['F'];
        $term            = $row['G'];
        $result          = $row['H'];
        $total_score     = $row['I'];
        $total_total     = $row['J'];
        $percentage      = $row['K'];

        // Check if a student with this national_number exists.
        $checkStmt->execute([$national_number]);
        $existing = $checkStmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            // Update the record.
            try {
                $updateStmt->execute([
                    $school_id, $name, $seating_number, $graid, $specialization,
                    $term, $result, $total_score, $total_total, $percentage, $national_number
                ]);
                $updated++;
            } catch (PDOException $e) {
                error_log("Update Error (row $rowIndex): " . $e->getMessage());
            }
        } else {
            // Insert new record.
            try {
                $insertStmt->execute([
                    $school_id, $name, $seating_number, $national_number,
                    $graid, $specialization, $term, $result, $total_score,
                    $total_total, $percentage
                ]);
                $inserted++;
            } catch (PDOException $e) {
                error_log("Insert Error (row $rowIndex): " . $e->getMessage());
            }
        }
    }

    echo "<p class='text-success'>Successfully imported $inserted records and updated $updated records!</p>";
} else {
    echo "<p class='text-danger'>Please upload a valid Excel file.</p>";
}
?>
