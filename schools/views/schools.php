<?php

use App\Classes\School;

require_once __DIR__ . '/../config/database.php';

$bj = new School($pdo);

$schools = $bj->getAll();
?>
<?php require_once __DIR__ . '/../includes/header.php'; ?>
<div class="container-xxl py-5">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <h1 class="mb-4 text-center">قائمة المدارس</h1>
        <a href="index.php?page=school_create" class="btn btn-success mb-3">إضافة مدرسة جديدة</a>
        <table class="table table-striped text-right" dir="rtl">
          <thead class="table-dark">
            <tr>
              <th>المعرف</th>
              <th>الاسم</th>
              <th>العنوان</th>
              <th>رقم الهاتف</th>
              <th>الإجراءات</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($schools as $school): ?>
              <tr>
                <td><?= $school['id']; ?></td>
                <td><?= htmlspecialchars($school['name']); ?></td>
                <td><?= htmlspecialchars($school['address']); ?></td>
                <td><?= htmlspecialchars($school['phone']); ?></td>
                <td>
                  <a href="index.php?page=school_edit&id=<?= $school['id']; ?>" class="btn btn-primary btn-sm">تعديل</a>
                  <a href="index.php?page=school_delete&id=<?= $school['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد؟');">حذف</a>
                  <a href="index.php?page=students&id=<?= $school['id']; ?>" class="btn btn-success btn-sm">عرض</a>
                  <a href="index.php?page=import_excel&id=<?= $school['id']; ?>" class="btn btn-warning btn-sm">استيراد</a>
                  <a href="index.php?page=export_excel_process&id=<?= $school['id']; ?>" class="btn btn-warning btn-sm">تصدير</a>
                  <a href="index.php?page=student_filter&name=<?= $school['name']; ?>" class="btn btn-warning btn-sm">تصفية</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
