<?php
session_start();

// Load Composer Autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Load configuration files
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';


// Determine the page (default to 'home')
// ... existing code to load autoloader and config files

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page === 'home') {
    include __DIR__ . '/../views/home.php';
} else if ($page === 'school_create') {
    include __DIR__ . '/../views/school_create.php';
} else if ($page === 'school_edit') {
    include __DIR__ . '/../views/school_edit.php';
} else if ($page === 'students') {
    include __DIR__ . '/../views/students.php';
} else if ($page === 'student_create') {
    include __DIR__ . '/../views/student_create.php';
} else if ($page === 'student_edit') {
    include __DIR__ . '/../views/student_edit.php';
} else {
    include __DIR__ . '/../views/404.php';
}
