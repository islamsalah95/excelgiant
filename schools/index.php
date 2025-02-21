<?php
session_start();

// Load Composer Autoload
require_once __DIR__ . '/vendor/autoload.php';

// Load Configuration
require_once __DIR__ . '/config/config.php';

use App\Middleware\AuthMiddleware;

// Routing Logic
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Define protected pages (authentication required)
$protected_pages = ['export_excel_process', 'export_excel_process', 'export_view_excel', 'import_excel_process', 'import_excel','school_create',
'school_delete','school_edit','schools','student_create','student_delete','student_edit','students','export_tabels','home','logout','images'
];
// Apply Middleware for protected pages
if (in_array($page, $protected_pages)) {
    if (AuthMiddleware::check() === false) {
        header("Location: " . Main_BASE_URL);
        exit();
    }
}

// Load the requested page or 404
$viewPath = __DIR__ . "/views/{$page}.php";
if (file_exists($viewPath)) {
    include $viewPath;
} else {
    include __DIR__ . "/views/404.php";
}
?>
