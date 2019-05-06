<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE manuf SET ".$_POST["column_name"]."='".$value."' WHERE id = '".$_POST["id"]."'";
 
 $query_test = "SELECT * FROM manuf WHERE id = '$id'";
 $res = mysqli_query($connect, $query_test); 
 $resc=mysqli_num_rows($res);
 if($resc == 0 )
 {
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
  	echo "This id number '$id' is already existing ";
 }
 
 }
?>
