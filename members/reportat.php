<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>التقرير</title>
<style>
    iframe{
        width: 100%;
        border: 0px solid #ccc;
    }
</style>
</head>

<body>
    <div id="links" class="myCustom1">
    <?php include("header.php"); ?>
    </div>
    <br />

    <iframe src="report.html" frameborder="0" id="myIframe"></iframe>
    
    <script>
    // Selecting the iframe element
    var iframe = document.getElementById("myIframe");
    
    // Adjusting the iframe height onload event
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
    }
    </script>

</body>
</html>


