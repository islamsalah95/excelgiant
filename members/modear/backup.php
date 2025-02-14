<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<style type="text/css">
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head>

<body>
	    <?php include 'header.php'; ?>
        <table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>نسخ قاعدة البيانات</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
  <tr>
    <td align="center"><table border="0" cellspacing="4" cellpadding="4">
      <tr>
    <td align="center"><form action="database_backup.php" method="post" id="">
												<div class="form-group">
												  <input name="server" type="text" required class="form-control" id="server" placeholder="Enter Server Name EX: Localhost" autocomplete="on" value="localhost" readonly="readonly">
												</div>
												<div class="form-group">
												  <input name="username" type="text" required class="form-control" id="username" placeholder="Enter Database Username EX: root" autocomplete="on" value="root" readonly="readonly">
												</div>
												<div class="form-group">
												  <input name="password" type="password" class="form-control" id="password" placeholder="Enter Database Password" value="" readonly="readonly" >
												</div>
												<div class="form-group">
												  <input name="dbname" type="text" required class="form-control" id="dbname" placeholder="Enter Database Name" autocomplete="on" value="gym" readonly="readonly">
												</div>
												<div class="form-group text-center">
													<button type="submit" name="backupnow" class="btn btn-info btn-rounded">نسخ قاعدة البيانات</button><br />
												</div>
    </form></td>
  </tr>
</table>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
<table>
											
</body>
</html>