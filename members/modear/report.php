<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
$('#example').dataTable( {
 "aProcessing": true,
 "aServerSide": true,
"ajax": "server-response.php",
} );
} );

</script>
</head>

<body class="dt-example">

<table width="100%" cellspacing="0" dir="rtl" class="display" id="example">
<thead>
<tr>
<th>رقم السند</th>
<th align="center"><strong>اسم العضو</strong></th>
<th align="center"><strong>رقم العضوية</strong></th>
<th align="center"><strong>الوحدة الحزبية التابع لها</strong></th>
<th align="center"><strong>الخدمة المطلوبة</strong></th>
<th align="center"><strong>المبلغ المدفوع</strong></th>
<th align="center"><strong>طريقة السداد</strong></th>
<th align="center"><strong>اسم المسئول</strong></th>
<th align="center"><strong>تاريخ السداد</strong></th>
<th>ملاحظات</th>
</tr>
</thead>

</table>


</body>
</html>