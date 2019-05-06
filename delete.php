<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM user WHERE id = '".$_POST["id"]."'";
 $query2 = "DELETE FROM images WHERE img_id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query) && mysqli_query($connect, $query2) )
 {
  echo 'Data Deleted';
 }
}
?>