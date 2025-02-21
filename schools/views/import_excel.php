<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load Composer's autoloader and database configuration.
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$schoolId = $_GET['id'] ?? null;
$message = '';
$error = 0;

// Increase time and memory limits
set_time_limit(300);
ini_set('memory_limit', '256M');

// Process file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['excel_file']['name']) && $_FILES['excel_file']['error'] === 0) {
    $filePath = $_FILES['excel_file']['tmp_name'];

    try {
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray(null, true, true, true);
    } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
        $message = '<p class="text-danger">خطأ في تحميل الملف: ' . $e->getMessage() . '</p>';
        $error = 1;
    }

    if (!empty($rows)) {
        $headers = array_shift($rows);
        $columnMap = [];
        foreach ($headers as $colKey => $colName) {
            if (!is_null($colName)) {
                $columnMap[strtolower(trim((string) $colName))] = $colKey;
            }
        }

        // Prepare SQL statements.
        $insertSQL = "INSERT INTO student_schools 
            (school_id, name, seating_number, national_number, graid, specialization, term, result, total_score, total_total, percentage)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $updateSQL = "UPDATE student_schools 
            SET school_id = ?, name = ?, seating_number = ?, graid = ?, specialization = ?, term = ?, result = ?, total_score = ?, total_total = ?, percentage = ?
            WHERE national_number = ?";

        $checkSQL = "SELECT id FROM student_schools WHERE national_number = ?";

        $insertStmt = $pdo->prepare($insertSQL);
        $updateStmt = $pdo->prepare($updateSQL);
        $checkStmt = $pdo->prepare($checkSQL);

        $inserted = 0;
        $updated = 0;

        foreach ($rows as $rowIndex => $row) {
            if (empty(array_filter($row))) continue;

            $school_id       = $schoolId;
            $name            = $row[$columnMap['name']] ?? '';
            $seating_number  = $row[$columnMap['seating_number']] ?? '';
            $national_number = $row[$columnMap['national_number']] ?? '';
            $graid           = $row[$columnMap['graid']] ?? '';
            $specialization  = $row[$columnMap['specialization']] ?? '';
            $term            = $row[$columnMap['term']] ?? '';
            $result          = $row[$columnMap['result']] ?? '';
            $total_score     = $row[$columnMap['total_score']] ?? '';
            $total_total     = $row[$columnMap['total_total']] ?? '';

            $percentage = (!empty($total_score) && !empty($total_total) && $total_total != 0)
                ? ($total_score / $total_total) * 100
                : 0;

            // $checkStmt->execute([$national_number]);
            // $existing = $checkStmt->fetch(PDO::FETCH_ASSOC);

            // if ($existing) {
            //     try {
            //         $updateStmt->execute([
            //             $school_id, $name, $seating_number, $graid, $specialization, $term,
            //             $result, $total_score, $total_total, $percentage, $national_number
            //         ]);
            //         $updated++;
            //     } catch (PDOException $e) {
            //         $error = 1;
            //     }
            // } else {
            //     try {
            //         $insertStmt->execute([
            //             $school_id, $name, $seating_number, $national_number, $graid, $specialization,
            //             $term, $result, $total_score, $total_total, $percentage
            //         ]);
            //         $inserted++;
            //     } catch (PDOException $e) {
            //         $error = 1;
            //     }
            // }

            $checkSQL = "SELECT id FROM student_schools WHERE seating_number = ? AND national_number = ?";
            $checkStmt = $pdo->prepare($checkSQL);

            $checkStmt->execute([$seating_number, $national_number]);
            $existing = $checkStmt->fetch(PDO::FETCH_ASSOC);

            if ($existing) {
                try {
                    $updateStmt->execute([
                        $school_id,
                        $name,
                        $seating_number,
                        $graid,
                        $specialization,
                        $term,
                        $result,
                        $total_score,
                        $total_total,
                        $percentage,
                        $seating_number,
                        $national_number
                    ]);
                    $updated++;
                } catch (PDOException $e) {
                    $error = 1;
                }
            } else {
                try {
                    $insertStmt->execute([
                        $school_id,
                        $name,
                        $seating_number,
                        $national_number,
                        $graid,
                        $specialization,
                        $term,
                        $result,
                        $total_score,
                        $total_total,
                        $percentage
                    ]);
                    $inserted++;
                } catch (PDOException $e) {
                    $error = 1;
                }
            }
        }

        if ($inserted > 0 || $updated > 0) {
            $message = "<p class='text-success'>تمت إضافة $inserted طالبًا وتحديث $updated طالبًا بنجاح!</p>";
        }

        // Prevent form resubmission on page refresh
        // header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . urlencode($schoolId) . "&success=1");
    } else {
        $message = "<p class='text-danger'>الملف المرفوع فارغ!</p>";
        $error = 1;
    }
}

// Display success message if redirected
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $message = "<p class='text-success'>تمت المعالجة بنجاح!</p>";
}

require_once __DIR__ . '/../includes/header.php';
?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center mb-4 text-primary">📄 إضافة الطلاب</h2>

                    <?php if (!empty($message)) : ?>
                        <div class="alert alert-<?php echo ($error == 1) ? 'danger' : 'success'; ?> text-center" role="alert">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="excel_file" class="form-label fw-bold">📂 اختر ملف الإكسل:</label>
                            <input type="file" name="excel_file" id="excel_file" class="form-control" accept=".xls,.xlsx" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                <i class="fas fa-upload"></i> رفع ومعالجة الملف
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php require_once __DIR__ . '/../includes/footer.php'; ?>