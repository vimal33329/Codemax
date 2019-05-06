<?php
$con = mysqli_connect("localhost", "root", "", "testing");

if(isset( $_POST['id'], $_POST['fna'] )){
    //getting image data
   	
   $id = mysqli_real_escape_string($con, $_POST["id"]);
   $fna = mysqli_real_escape_string($con, $_POST['fna']);
   $_FILES['fname']['name'] = basename($fna);
   $_FILES['fname']['tmp_name'] = dirname($fna);
   
   $product_image = $_FILES['fname']['name'];
   $product_image_tmp = $_FILES['fname']['tmp_name'];
   move_uploaded_file($product_image_tmp,"images/.$product_image");
   $insert_product = "insert into images (img_id,f_name) values ($id,'$product_image')";
   $run_product = mysqli_query($con,$insert_product);
   if($run_product){
   echo"Product Has been inserted";
   
   }
}
?>