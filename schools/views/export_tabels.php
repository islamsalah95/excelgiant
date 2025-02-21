<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php'; // Ensure dependencies are loaded

use App\Controller\ImportTabelsController;

// Handle export first before outputting HTML
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['filter_type']) || empty($_POST['filter_type'])) {
        echo 'Invalid table name.';
        exit;
    }

    $table = $_POST['filter_type'];

    try {
        $exporter = new ImportTabelsController($pdo);
        $exporter->export($table); // This function will send headers & exit
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

// HTML starts only after handling the export logic
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
            <h1 class="text-center mb-4 text-primary"><i class="fas fa-file-export"></i> استيراد الجداول </h1>
            <form method="post" action="" id="filterForm" class="row g-3 p-4 shadow-lg rounded bg-white border">
                    <div class="col-md-10">
                        <label for="filter_type" class="form-label fw-bold">اختر جدول</label>
                        <select name="filter_type" id="filter_type" class="form-select" required>
                            <option value="">اختر الخيار</option>
                            <option value="mwmembers">الاعضاء</option>
                            <option value="complaints">الطلبات</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> استيراد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>