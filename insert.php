<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["first_name"], $_POST["last_name"], $_POST["color"], $_POST["ma_year"], $_POST["reg_num"],$_POST["note"] ))
{
 $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);
 $last_name = mysqli_real_escape_string($connect, $_POST["last_name"]);
 $color = mysqli_real_escape_string($connect, $_POST["color"]);
 $ma_year = mysqli_real_escape_string($connect, $_POST["ma_year"]);
 $reg_num = mysqli_real_escape_string($connect, $_POST["reg_num"]);
 $note = mysqli_real_escape_string($connect, $_POST["note"]);
 $query = "INSERT INTO user(first_name, last_name, color, ma_year, reg_num, note) VALUES('$first_name','$last_name','$color','$ma_year','$reg_num','$note')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
