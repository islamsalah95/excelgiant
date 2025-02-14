<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اكسيل للحلول البرمجية</title>
<script src="SpryAssets/SpryValidationConfirm.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0" dir="rtl">
  <tr>
    <td align="center"><img src="logo.png" width="200" /></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center"><table width="300" border="2" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><form id="form1" name="form1" method="post" action="">
          <table width="300" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="center"><h1>كود التحقق</h1></td>
            </tr>
            <tr>
              <td align="center">من فضلك أدخل كود التحقق<br />
                لدخول صفحة التحميل</td>
            </tr>
            <tr>
              <td align="center"><label for="textfield"></label>
                <br />
                <input name="textfield" type="hidden" id="textfield" value="<?php echo date("dym")?><?php echo date('z')?>" />
                <label for="textfield2"></label>
                <span id="spryconfirm1">
                  <input type="text" name="textfield2" id="textfield2" />
                  <br />
                  <span class="confirmRequiredMsg">من فضلك ادخل كود التحقق</span><span class="confirmInvalidMsg">عفوأ .. كود التحقق غير صحيح</span></span><br />
                <input type="submit" name="button" id="button" value="موافق" /></td>
</tr>
            <tr>
              <td align="center">&nbsp;</td>
            </tr>
            <tr>
              <td></td>
            </tr>
            <tr> </tr>
          </table>
          </form></td>
      </tr>
    </table></td>
  </tr>
</table>
<script type="text/javascript">
var spryconfirm1 = new Spry.Widget.ValidationConfirm("spryconfirm1", "textfield");
</script>
</body>
</html>