<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["id"], $_POST["ma_name"]))
{
 $id = mysqli_real_escape_string($connect, $_POST["id"]);
 $ma_name = mysqli_real_escape_string($connect, $_POST["ma_name"]);
 $query_test = "SELECT * FROM manuf WHERE id = '$id'";
 $res = mysqli_query($connect, $query_test); 
 $resc=mysqli_num_rows($res);

 if($resc == 0 )
 { 
 $query = "INSERT INTO manuf(id, ma_name) VALUES('$id', '$ma_name')";
 if(mysqli_query($connect, $query))
 {
  echo "Data Inserted '$resc'";
 }
 }
 else{
	echo "This id number '$id' is already existing "; 
 }
	 
 }

?>