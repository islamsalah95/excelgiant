<?php
require_once __DIR__ . '/../config/database.php';
use App\Classes\Student;

// Get list of schools for dropdown
$stmt = $pdo->query("SELECT id, name FROM schools");
$schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

$successMessage = null;

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentObj = new Student($pdo);
    $studentObj->create(
        $_POST['school_id'],
        $_POST['name'],
        $_POST['seating_number'],
        $_POST['national_number'],
        $_POST['graid'],
        $_POST['specialization'],
        $_POST['term'],
        $_POST['result'],
        $_POST['total_score'],
        $_POST['total_total']
    );
    $successMessage = "تمت إضافة الطالب بنجاح!";
}
?>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container-xxl py-5">
  <div class="container">

    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="mb-4 text-center"><i class="fas fa-user-graduate"></i> إضافة طالب</h1>

        <!-- Success Message -->
        <?php if ($successMessage): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <?= $successMessage ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <form method="post" action="index.php?page=student_create" class="p-4 shadow rounded bg-light">
          
          <div class="mb-3">
            <label for="school_id" class="form-label"><i class="fas fa-school"></i> المدرسة:</label>
            <select name="school_id" id="school_id" class="form-select" required>
              <?php foreach ($schools as $school): ?>
                <option value="<?= $school['id']; ?>"><?= htmlspecialchars($school['name']); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label"><i class="fas fa-user"></i> اسم الطالب:</label>
            <input type="text" name="name" id="name" class="form-control" required placeholder="أدخل اسم الطالب">
          </div>

          <div class="mb-3">
            <label for="seating_number" class="form-label"><i class="fas fa-chair"></i> رقم الجلوس:</label>
            <input type="text" name="seating_number" id="seating_number" class="form-control" required placeholder="أدخل رقم الجلوس">
          </div>

          <div class="mb-3">
            <label for="national_number" class="form-label"><i class="fas fa-id-card"></i> الرقم القومي:</label>
            <input type="text" name="national_number" id="national_number" class="form-control" required placeholder="أدخل الرقم القومي">
          </div>

          <div class="mb-3">
            <label for="graid" class="form-label"><i class="fas fa-layer-group"></i> الصف:</label>
            <input type="text" name="graid" id="graid" class="form-control" placeholder="أدخل الصف الدراسي">
          </div>

          <div class="mb-3">
            <label for="specialization" class="form-label"><i class="fas fa-book"></i> التخصص:</label>
            <input type="text" name="specialization" id="specialization" class="form-control" placeholder="أدخل التخصص الدراسي">
          </div>

          <div class="mb-3">
            <label for="term" class="form-label"><i class="fas fa-calendar-alt"></i> الفصل الدراسي:</label>
            <input type="text" name="term" id="term" class="form-control" placeholder="أدخل الفصل الدراسي">
          </div>

          <div class="mb-3">
            <label for="result" class="form-label"><i class="fas fa-poll"></i> النتيجة:</label>
            <select name="result" id="result" class="form-select" required>
              <option value="Pass">ناجح</option>
              <option value="Fail">راسب</option>
              <option value="Second Round">دور ثانٍ</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="total_score" class="form-label"><i class="fas fa-chart-line"></i> المجموع الكلي:</label>
            <input type="number" name="total_score" id="total_score" class="form-control" required placeholder="أدخل المجموع الكلي">
          </div>

          <div class="mb-3">
            <label for="total_total" class="form-label"><i class="fas fa-calculator"></i> المجموع النهائي:</label>
            <input type="number" name="total_total" id="total_total" class="form-control" required placeholder="أدخل المجموع النهائي">
          </div>

          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> إضافة الطالب</button>
            <a href="index.php?page=students" class="btn btn-secondary ms-3"><i class="fas fa-arrow-left"></i> العودة للطلاب</a>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
