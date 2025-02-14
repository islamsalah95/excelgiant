<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة التحكم</title>
</head>

<body>
<?php include 'header.php'; ?>

<table width="100%" border="0" cellpadding="2" cellspacing="2" dir="rtl">
  <tr>
    <td align="center"><h2><strong>البحث</strong></h2></td>
  </tr>
  <tr>
    <td><hr /></td>
  </tr>
</table>
<table border="0" align="center" cellpadding="4" cellspacing="4" dir="ltr">
  <tr bgcolor="#FFFFFF">
    <td rowspan="4" align="right" valign="top"><form id="form1" name="form1" method="get" action="serch_viewand.php">
      <table width="90" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td><table align="center" dir="rtl">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">رقم العضو:</td>
              <td><input type="text" name="id" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">نوع العضوية:</td>
              <td><select name="member_type">
                <option value=" " selected="selected"></option>
                <option value="خاص">خاص</option>
                <option value="حكومي">حكومي</option>
              </select></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الاسم:</td>
              <td><input type="text" name="aname" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الاسم الثاني:</td>
              <td><input type="text" name="bname" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الاسم الثالث:</td>
              <td><input type="text" name="cname" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الاسم الرابع:</td>
              <td><input type="text" name="dname" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الرقم الوطني:</td>
              <td><input type="text" name="id_card" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">نوع النشاط:</td>
              <td><select name="member_activity">
                <option value="صيدلية">صيدلية</option>
                <option value="شركة أدوية">شركة أدوية</option>
                <option value="صيدلي صناعي">صيدلي صناعي</option>
                <option value="إعلام دوائي">إعلام دوائي</option>
                <option value="صيدلية خاصة">صيدلية خاصة</option>
                <option value="مستشفى">مستشفى</option>
                <option value="صيدلية عامة">صيدلية عامة</option>
                <option value="مخازن">مخازن</option>
                <option value="إداري">إداري</option>
                <option value="رقابة وتفتيش">رقابة وتفتيش</option>
                <option value="مركز بحوث طبية">مركز بحوث طبية</option>
              </select></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="بحث" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
    <td align="right"><form id="form3" name="form1" method="get" action="serch_view.php">
      <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td align="right"><table align="center" dir="rtl">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">نوع العضوية:</td>
              <td><select name="member_type" id="member_type">
                <option value=" " selected="selected"></option>
                <option value="خاص">خاص</option>
                <option value="حكومي">حكومي</option>
                </select></td>
              </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="بحث" /></td>
              </tr>
            </table></td>
          </tr>
        </table>
    </form></td>
    <td align="right"><form id="form2" name="form1" method="get" action="serch_view.php">
      <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td><table align="center" dir="rtl">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">رقم العضو:</td>
              <td><input name="id" type="text" id="id" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="بحث" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><form id="form9" name="form1" method="get" action="serch_view.php">
      <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td><table align="center" dir="rtl">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">نوع النشاط:</td>
              <td><select name="member_activity" id="member_activity">
                <option value="صيدلية">صيدلية</option>
                <option value="شركة أدوية">شركة أدوية</option>
                <option value="صيدلي صناعي">صيدلي صناعي</option>
                <option value="إعلام دوائي">إعلام دوائي</option>
                <option value="صيدلية خاصة">صيدلية خاصة</option>
                <option value="مستشفى">مستشفى</option>
                <option value="صيدلية عامة">صيدلية عامة</option>
                <option value="مخازن">مخازن</option>
                <option value="إداري">إداري</option>
                <option value="رقابة وتفتيش">رقابة وتفتيش</option>
                <option value="مركز بحوث طبية">مركز بحوث طبية</option>
                </select></td>
              </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="بحث" /></td>
              </tr>
            </table></td>
          </tr>
        </table>
    </form></td>
    <td align="right" bgcolor="#FFFFFF"><form id="form8" name="form1" method="get" action="serch_view.php">
      <table border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td><table align="center" dir="rtl">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الرقم الوطني:</td>
              <td><input name="id_card" type="text" id="id_card" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="بحث" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><form id="form5" name="form1" method="get" action="serch_view.php">
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td><table align="left" dir="rtl">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الاسم الثاني:</td>
              <td><input name="bname" type="text" id="bname" value="" size="32" /></td>
              </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="بحث" /></td>
              </tr>
            </table></td>
          </tr>
        </table>
    </form></td>
    <td align="right" bgcolor="#FFFFFF"><form id="form4" name="form1" method="get" action="serch_view.php">
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td><table align="center" dir="rtl">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الاسم:</td>
              <td><input name="aname" type="text" id="aname" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="بحث" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><form id="form7" name="form1" method="get" action="serch_view.php">
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td><table align="left" dir="rtl">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الاسم الرابع:</td>
              <td><input name="dname" type="text" id="dname" value="" size="32" /></td>
              </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="بحث" /></td>
              </tr>
            </table></td>
          </tr>
        </table>
    </form></td>
    <td align="right" bgcolor="#FFFFFF"><form id="form6" name="form1" method="get" action="serch_view.php">
      <table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td><table align="left" dir="rtl">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">الاسم الثالث:</td>
              <td><input name="cname" type="text" id="cname" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td><input type="submit" value="بحث" /></td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>