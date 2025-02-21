<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

use App\Classes\Student;

// Check if an ID is provided
if (!isset($_GET['id'])) {
    header("Location: index.php?page=students");
    exit;
}

$id = $_GET['id'];
$studentObj = new Student($pdo);
$student = $studentObj->get($id);

if (!$student) {
    header("Location: index.php?page=students");
    exit;
}

// Get list of schools for the dropdown
$stmt = $pdo->query("SELECT id, name FROM schools");
$schools = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Initialize success message variable
$successMessage = "";

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $school_id = $_POST['school_id'];
    $name = $_POST['name'];
    $seating_number = $_POST['seating_number'];
    $national_number = $_POST['national_number'];
    $graid = $_POST['graid'];
    $specialization = $_POST['specialization'];
    $term = $_POST['term'];
    $result = $_POST['result'];
    $total_score = $_POST['total_score'];
    $total_total = $_POST['total_total'];
    
    // Calculate percentage
    $percentage = ($total_total > 0) ? ($total_score / $total_total) * 100 : 0;
    
    // Update the student record
    $studentObj->update($id, $school_id, $name, $seating_number, $national_number, $graid, $specialization, $term, $result, $total_score, $total_total, $percentage);

    // Set success message
    $successMessage = "تم تعديل بيانات الطالب بنجاح!";
    header("Location: index.php?page=student_edit&id=" . $_GET['id']);
     exit;

}
?>

<?php require_once __DIR__ . '/../includes/header.php'; ?>
<div class="container-xxl py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="mb-4 text-center"><i class="fas fa-user-edit"></i> تعديل بيانات الطالب</h1>

        <?php if (!empty($successMessage)): ?>
          <div class="alert alert-success text-center" role="alert">
            <i class="fas fa-check-circle"></i> <?= $successMessage ?>
          </div>
        <?php endif; ?>

        <form method="post" action="index.php?page=student_edit&id=<?= $id ?>" class="p-4 shadow rounded bg-light">
          <div class="mb-3">
            <label for="school_id" class="form-label"><i class="fas fa-school"></i> المدرسة:</label>
            <select name="school_id" id="school_id" class="form-select" required>
              <?php foreach ($schools as $schoolItem): ?>
                <option value="<?= $schoolItem['id'] ?>" <?= ($student['school_id'] == $schoolItem['id']) ? 'selected' : '' ?>>
                  <?= htmlspecialchars($schoolItem['name']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label"><i class="fas fa-user"></i> اسم الطالب:</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($student['name']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="seating_number" class="form-label"><i class="fas fa-chair"></i> رقم الجلوس:</label>
            <input type="text" name="seating_number" id="seating_number" class="form-control" value="<?= htmlspecialchars($student['seating_number']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="national_number" class="form-label"><i class="fas fa-id-card"></i> الرقم القومي:</label>
            <input type="text" name="national_number" id="national_number" class="form-control" value="<?= htmlspecialchars($student['national_number']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="graid" class="form-label"><i class="fas fa-layer-group"></i> الصف:</label>
            <input type="text" name="graid" id="graid" class="form-control" value="<?= htmlspecialchars($student['graid']) ?>">
          </div>
          <div class="mb-3">
            <label for="specialization" class="form-label"><i class="fas fa-book"></i> التخصص:</label>
            <input type="text" name="specialization" id="specialization" class="form-control" value="<?= htmlspecialchars($student['specialization']) ?>">
          </div>
          <div class="mb-3">
            <label for="term" class="form-label"><i class="fas fa-calendar-alt"></i> الفصل الدراسي:</label>
            <input type="text" name="term" id="term" class="form-control" value="<?= htmlspecialchars($student['term']) ?>">
          </div>
          <div class="mb-3">
            <label for="result" class="form-label"><i class="fas fa-poll"></i> النتيجة:</label>
            <select name="result" id="result" class="form-select" required>
              <option value="Pass" <?= ($student['result'] == 'Pass') ? 'selected' : '' ?>>ناجح</option>
              <option value="Fail" <?= ($student['result'] == 'Fail') ? 'selected' : '' ?>>راسب</option>
              <option value="Second Round" <?= ($student['result'] == 'Second Round') ? 'selected' : '' ?>>دور ثانٍ</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="total_score" class="form-label"><i class="fas fa-chart-line"></i> المجموع الكلي:</label>
            <input type="number" name="total_score" id="total_score" class="form-control" value="<?= htmlspecialchars($student['total_score']) ?>" required>
          </div>
          <div class="mb-3">
            <label for="total_total" class="form-label"><i class="fas fa-calculator"></i> المجموع النهائي:</label>
            <input type="number" name="total_total" id="total_total" class="form-control" value="<?= htmlspecialchars($student['total_total']) ?>" required>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> حفظ التعديلات</button>
            <a href="index.php?page=students" class="btn btn-secondary ms-3"><i class="fas fa-arrow-left"></i> العودة</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
