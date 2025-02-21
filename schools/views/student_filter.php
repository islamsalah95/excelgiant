<?php
require_once __DIR__ . '/../config/database.php';

// Check if an ID is provided
if (!isset($_GET['name'])) {
  header("Location: index.php?page=404");
  exit;
}

use App\Controller\SchoolImageController;
$controller = new SchoolImageController();
$images = $controller->getAllImages();
?>


<?php require_once __DIR__ . '/../includes/header_student.php'; ?>


<!-- Carousel Start -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
  <?php foreach ($images as $image): ?>
  <div class="carousel-item active">
      <img src="<?= BASE_URL; ?>assets/schools/<?= $image ?>" class="d-block w-100 rounded" alt="">
  </div>
  <?php endforeach; ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- Carousel End -->

<div class="container-xxl py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h1 class="text-center mb-4 text-black">
          <?= isset($_GET['name']) ? ' مدرسة ' . $_GET['name']  : date('Y'); ?>
        </h1>
        <h4 class="text-center mb-4 text-primary"><i class="fas fa-user-graduate"></i> استعلام عن نتائج الطلاب</h4>
        <form id="filterForm" class="row g-3 p-4 shadow-lg rounded bg-white border">
          <div class="col-md-5">
            <label for="filter_type" class="form-label fw-bold">البحث بواسطة</label>
            <select name="filter_type" id="filter_type" class="form-select" required>
              <option value="">اختر الخيار</option>
              <option value="national_number">الرقم القومى</option>
              <option value="seating_number">رقم الجلوس</option>
            </select>
          </div>
          <div class="col-md-5">
            <label for="filter_value" class="form-label fw-bold">الرقم</label>
            <input type="text" id="filter_value" name="filter_value" class="form-control" placeholder="أدخل الرقم" required>
          </div>
          <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> بحث</button>
          </div>
        </form>

        <div id="results" class="mt-4 row g-4">
          <!-- Filtered student results will appear here -->
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      &copy; <?= isset($_GET['name']) ? ' مدرسة ' . $_GET['name'] . ' ' . date('Y') : date('Y'); ?>
      جميع الحقوق محفوظة
    </div>


  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('body').attr('dir', 'rtl'); // Set the page direction to RTL for Arabic

    $('#filterForm').on('submit', function(e) {
      e.preventDefault();
      var filterType = $('#filter_type').val();
      var filterValue = $('#filter_value').val();

      if (!filterType || !filterValue) {
        $('#results').html('<p class="text-danger text-center fw-bold">يرجى اختيار نوع الفلتر وإدخال قيمة.</p>');
        return;
      }
      $.ajax({
        url: '<?= BASE_URL; ?>index.php?page=ajax_student_filter&filter_type=' + filterType + '&filter_value=' + filterValue + '&name=<?= $_GET['name']; ?>',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
          var html = '';

          if (response.length > 0) {
            $.each(response, function(index, student) {
              var pass = student.percentage > 50;
              var emoji = pass ? '😊' : '😢';
              var percentageColor = pass ? 'bg-success text-white' : 'bg-danger text-white';

              html += '<div class="table-responsive mb-4">';
              html += '<table class="table table-bordered text-center">';
              html += '<tbody>';

              html += '<tr><th class="table-dark">اسم الطالب</th><td>' + student.name + '</td></tr>';
              html += '<tr><th class="table-dark">المدرسة</th><td>' + student.school_name + '</td></tr>';
              html += '<tr><th class="table-dark">رقم الجلوس</th><td>' + student.seating_number + '</td></tr>';
              html += '<tr><th class="table-dark">التخصص</th><td>' + student.specialization + '</td></tr>';
              html += '<tr><th class="table-dark">الفصل الدراسي</th><td>' + student.term + '</td></tr>';
              html += '<tr><th class="table-dark">النتيجة</th><td>' + student.result + '</td></tr>';
              html += '<tr><th class="table-dark">المجموع</th><td>' + student.total_total + ' / ' + student.total_score + '</td></tr>';
              html += '<tr><th class="table-dark">النسبة المئوية</th><td class="' + percentageColor + ' fw-bold">' + student.percentage + '% ' + emoji + '</td></tr>';

              html += '</tbody>';
              html += '</table>';
              html += '</div>';
            });
          } else {
            html = '<p class="text-center text-danger fw-bold">لم يتم العثور على طلاب مطابقين للمعايير.</p>';
          }

          $('#results').html(html);
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
          $('#results').html('<p class="text-danger text-center fw-bold">حدث خطأ أثناء البحث عن الطلاب.</p>');
        }
      });

    });
  });
</script>


<style>
  /* Custom CSS for Beautiful Cards */
  .bg-success-gradient {
    background: linear-gradient(135deg, #28a745, #218838);
  }

  .bg-danger-gradient {
    background: linear-gradient(135deg, #dc3545, #c82333);
  }

  .card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
  }

  .list-group-item {
    border: none;
    background: rgba(255, 255, 255, 0.1);
    margin: 5px 0;
    border-radius: 10px;
  }
</style>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>