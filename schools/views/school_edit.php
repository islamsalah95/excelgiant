<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

use App\Classes\School;

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Get school ID securely
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
  header("Location: index.php?page=home");
  exit;
}

// Initialize School object and fetch school data
$schoolObj = new School($pdo);
$school = $schoolObj->get($id);

if (!$school) {
  header("Location: index.php?page=home");
  exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
  $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT));

  // Ensure fields are not empty
  if (!empty($name) && !empty($address) && !empty($phone)) {
    $result = $schoolObj->update($id, $name, $address, $phone);
    if ($result) {
      // Set success message
      $successMessage = "تم تعديل بيانات الطالب بنجاح!";
      header("Location: index.php?page=school_edit&id=" . $_GET['id']);
      exit;
    } else {
      $error = "Failed to update school details. Please try again.";
    }
  } else {
    $error = "All fields are required!";
  }
}
?>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container-xxl py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="mb-4 text-center"><i class="fas fa-school"></i> تعديل بيانات المدرسة</h1>

        <?php if (!empty($error)): ?>
          <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>


        <?php if (!empty($successMessage)): ?>
          <div class="alert alert-success text-center" role="alert">
            <i class="fas fa-check-circle"></i> <?= $successMessage ?>
          </div>
        <?php endif; ?>

        <form method="post" action="index.php?page=school_edit&id=<?= $id ?>" class="p-4 shadow rounded bg-light">
          <div class="mb-3">
            <label for="name" class="form-label"><i class="fas fa-building"></i> اسم المدرسة:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($school['name']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label"><i class="fas fa-map-marker-alt"></i> العنوان:</label>
            <textarea class="form-control" name="address" id="address" rows="3" required><?= htmlspecialchars($school['address']) ?></textarea>
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label"><i class="fas fa-phone"></i> رقم الهاتف:</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?= htmlspecialchars($school['phone']) ?>" required>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> تحديث البيانات</button>
            <a href="index.php?page=home" class="btn btn-secondary ms-3"><i class="fas fa-arrow-left"></i> العودة للرئيسية</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>