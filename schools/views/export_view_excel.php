<!-- public/import_excel.php -->
<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="container mt-4">
  <h1>export excel Students from Excel</h1>

  <a  href="<?= BASE_URL; ?>index.php?page=export_excel_process&id=<?= $_GET['id']; ?>" class="btn btn-warning btn-sm">Download</a>

</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
