<?php
require_once __DIR__ . '/../config/database.php';

use App\Controller\SchoolImageController;

$controller = new SchoolImageController();
$successMessage = null;
$errorMessage = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadResult = $controller->uploadImage($_FILES['image']);
    if ($uploadResult) {
        $successMessage = "تمت إضافة الصورة بنجاح!";
    } else {
        $errorMessage = "حدث خطأ أثناء رفع الصورة.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_image'])) {
    $imageToDelete = $_POST['delete_image'];
    if ($controller->deleteImage($imageToDelete)) {
        $successMessage = "تم حذف الصورة بنجاح!";
    } else {
        $errorMessage = "فشل في حذف الصورة!";
    }
}

$images = $controller->getAllImages();
?>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container-xxl py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h1 class="mb-4 text-center"><i class="fas fa-images"></i> إدارة صور المدارس</h1>

        <!-- رسائل النجاح أو الخطأ -->
        <?php if ($successMessage): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> <?= $successMessage ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <?php if ($errorMessage): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> <?= $errorMessage ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>

        <!-- نموذج رفع صورة جديدة -->
        <form method="post" enctype="multipart/form-data" class="p-4 shadow rounded bg-light">
          <div class="mb-3">
            <label for="image" class="form-label"><i class="fas fa-upload"></i> ارفع الصورة:</label>
            <input type="file" class="form-control" name="image" id="image" required>
          </div>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success"><i class="fas fa-plus"></i> إضافة الصورة</button>
          </div>
        </form>

        <!-- عرض الصور -->
        <?php if (!empty($images)): ?>
          <h2 class="mt-5 text-center">جميع الصور المرفوعة</h2>
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead class="table-dark">
                <tr>
                  <th>الصورة</th>
                  <th>اسم الملف</th>
                  <th>إجراء</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($images as $image): ?>
                  <tr>
                    <td><img src="<?= BASE_URL; ?>assets/schools/<?= $image ?>"  alt="School Image" width="100"></td>
                    <td><?= $image ?></td>
                    <td>
                      <form method="post">
                        <input type="hidden" name="delete_image" value="<?= $image ?>">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> حذف</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <p class="text-center text-muted">لم يتم رفع أي صور بعد.</p>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

