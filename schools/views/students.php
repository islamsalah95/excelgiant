<?php
require_once __DIR__ . '/../config/database.php';
use App\Classes\Student;

$studentObj = new Student($pdo);

$schoolId = $_GET['id'];

$students = $studentObj->getAll($schoolId);
?>
<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container-xxl py-5">
  <div class="container" dir="rtl">

    <div class="row">
      <div class="col-md-12">
        <h1 class="mb-4 text-center">قائمة الطلاب</h1>
        <a href="index.php?page=student_create" class="btn btn-success mb-3">إضافة طالب جديد</a>
        <table class="table table-striped text-end">
          <thead class="table-dark">
            <tr>
              <th>الاسم</th>
              <th>المدرسة</th>
              <th>رقم الجلوس</th>
              <th>الرقم القومى</th>
              
              <th>الصف</th>
              <th>التخصص</th>
              <th>الترم</th>

              <th>المجموع الكلى</th>
              <th>مجموع الدرجات</th>

              <th>النتيجة</th>
              <th>النسبة المئوية</th>
              <th>الإجراءات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
              <td><?= htmlspecialchars($student['name']); ?></td>
              <td><?= htmlspecialchars($student['school_name']); ?></td>
              <td><?= htmlspecialchars($student['seating_number']); ?></td>
              <td><?= htmlspecialchars($student['national_number']); ?></td>
              <td><?= htmlspecialchars($student['graid']); ?></td>
              <td><?= htmlspecialchars($student['specialization']); ?></td>
              <td><?= htmlspecialchars($student['term']); ?></td>
              
              <td><?= htmlspecialchars($student['total_total']); ?></td>
              <td><?= htmlspecialchars($student['total_score']); ?></td>

              <td><?= htmlspecialchars($student['result']); ?></td>
              <td><?= htmlspecialchars($student['percentage']); ?>%</td>
              <td>
                <div class="d-flex flex-wrap gap-2">
                  <a href="index.php?page=student_edit&id=<?= $student['id']; ?>" class="btn btn-primary btn-sm">تعديل</a>
                  <a href="index.php?page=student_delete&id=<?= $student['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟');">حذف</a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <a href="index.php?page=home" class="btn btn-secondary">العودة إلى الرئيسية</a>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
