<?php

$connect = mysqli_connect("localhost", "root", "", "testing");

if(isset($_GET["id"]))
	$ids = $_GET["id"];
{
 $query = "SELECT * FROM user WHERE id = '".$_GET["id"]."'";
 $result = mysqli_query($connect,$query);
 $output = '<div class="row">';
 while($row = mysqli_fetch_array($result))
 {
 $query2 = "SELECT * FROM images WHERE img_id = '".$_GET["id"]."'";
 $result2 = mysqli_query($connect,$query2);
 $output2 = '';
 while($row2 = mysqli_fetch_array($result2))
 {
  $output2 .= '<p><img class="btn col-md-9" src = "images/'.$row2["f_name"].'"></img></p>';		
 }	 
 	 
  $output .= '
  <div class="col-md-9">
   <br />
   <p><label>Car Name :&nbsp;</label>'.$row["first_name"].'</p>
   <p><label>Manufacture Name :&nbsp;</label>'.$row["last_name"].'</p>
   <p><label>Car Images :&nbsp;</label></p>
   '.$output2.'
  </div>
  </div>
  
  ';
 }
 echo $output;
}





?>

