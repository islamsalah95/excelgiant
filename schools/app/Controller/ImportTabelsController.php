<?php
namespace App\Controller;

use PDO;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ImportTabelsController {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function export($table) {
        // Validate table name
        $allowedTables = ['mwmembers', 'complaints']; // Add more tables if needed
        if (!in_array($table, $allowedTables)) {
            throw new \Exception("Invalid table name.");
        }

        // Fetch column names
        $stmt = $this->pdo->prepare("DESCRIBE $table");
        $stmt->execute();
        $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($columns)) {
            throw new \Exception("No columns found for the table.");
        }

        $columnNames = array_column($columns, 'Field'); // Extract column names

        // Fetch table data
        $stmt = $this->pdo->prepare("SELECT * FROM $table");
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (empty($records)) {
            throw new \Exception("No records found in the table.");
        }

        // Create Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header row dynamically
        $sheet->fromArray($columnNames, NULL, 'A1');

        // Fill table data
        $rowNum = 2;
        foreach ($records as $record) {
            $sheet->fromArray(array_values($record), NULL, "A$rowNum");
            $rowNum++;
        }

        // Ensure headers are sent correctly
        if (!headers_sent()) {
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $table . '.xlsx"');
            header('Cache-Control: max-age=0');
            header('Pragma: public');
            header('Expires: 0');

            // Write and output the Excel file
            $writer = new Xlsx($spreadsheet);
            $writer->save('php://output');
            exit;
        } else {
            throw new \Exception("Headers already sent. Cannot export file.");
        }
    }
}