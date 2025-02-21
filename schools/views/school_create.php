<?php
// Process the form submission
require_once __DIR__ . '/../config/database.php';
use App\Classes\School;

$successMessage = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $schoolObj = new School($pdo);
    $schoolObj->create($_POST['name'], $_POST['address'], $_POST['phone']);
    $successMessage = "تمت إضافة المدرسة بنجاح!";
}
?>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container-xxl py-5">
  <div class="container">

    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="mb-4 text-center"><i class="fas fa-school"></i> إضافة مدرسة</h1>

        <!-- Success Message -->
        <?php if ($successMessage): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <?= $successMessage ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <form method="post" action="index.php?page=school_create" class="p-4 shadow rounded bg-light">
          <div class="mb-3">
            <label for="name" class="form-label"><i class="fas fa-building"></i> اسم المدرسة:</label>
            <input type="text" class="form-control" name="name" id="name" required placeholder="أدخل اسم المدرسة">
          </div>

          <div class="mb-3">
            <label for="address" class="form-label"><i class="fas fa-map-marker-alt"></i> العنوان:</label>
            <textarea class="form-control" name="address" id="address" rows="3" required placeholder="أدخل عنوان المدرسة"></textarea>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label"><i class="fas fa-phone"></i> الهاتف:</label>
            <input type="text" class="form-control" name="phone" id="phone" required placeholder="أدخل رقم الهاتف">
          </div>

          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> إضافة المدرسة</button>
            <a href="index.php?page=home" class="btn btn-secondary ms-3"><i class="fas fa-arrow-left"></i> العودة للرئيسية</a>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
