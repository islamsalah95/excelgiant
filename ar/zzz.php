<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>لوحة التحكم</title>
 <?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"../img/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>


</head>

<body>
<td><input name="sign_img1" id="sign_img1" value="" size="32" />
            <input type = "file" name="sign_img" id="sign_img" onchange="updateFileName1()" />
            <script>
                function updateFileName1() {
                    var sign_img = document.getElementById('sign_img');
                    var sign_img1 = document.getElementById('sign_img1');
                    var fileNameIndex = sign_img.value.lastIndexOf("\\");
            
                    sign_img1.value = sign_img.value.substring(fileNameIndex + 1);
                }
            </script></td>
</body>
</html>