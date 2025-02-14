<?php
   if(isset($_FILES['per_img'])){
      $errors= array();
      $file_name = $_FILES['per_img']['name'];
      $file_size = $_FILES['per_img']['size'];
      $file_tmp = $_FILES['per_img']['tmp_name'];
      $file_type = $_FILES['per_img']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['per_img']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "per_img" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['per_img']['name'];  ?>
            <li>File size: <?php echo $_FILES['per_img']['size'];  ?>
            <li>File type: <?php echo $_FILES['per_img']['type'] ?>
         </ul>
			
      </form>
      
   </body>
</html>