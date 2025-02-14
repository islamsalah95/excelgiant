<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
<?php include 'header.php'; ?>
<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">تقرير انتهاء الصلاحية لتاريخ محدد</h3>
		<hr style="border-top:1px dotted #000;"/>
		<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="ltr">
  <tr>
    <td><form class="form-inline" method="POST" action="">
			<label>Date:</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1"/>
			<label>To</label>
			<input type="date" class="form-control" placeholder="End"  name="date2"/>
			<button class="btn btn-primary" name="search"><span class="glyphicon glyphicon-search"></span></button> <a href="daterange.php" type="button" class="btn btn-success"><span class = "glyphicon glyphicon-refresh"><span></a>
		</form></td>
  </tr>
</table>

		<br /><br />
		<div class="table-responsive">	
			<table dir="rtl" class="table table-bordered">
				<thead class="alert-info">
					<tr align="center">
						<th>اسم العضو</th>
						<th>رقم العضوية</th>
						<th>تاريخ انتهاء الصلاحية</th>
						<th>الموظف المسئول</th>
						<th>رقم السند</th>
						<th>نوع الخدمة</th>
					</tr>
				</thead>
				<tbody>
					<?php include'range.php'?>	
				</tbody>
			</table>
		</div>	
	</div>
</body>
</html>