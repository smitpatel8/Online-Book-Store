<?php

$student_id = $_POST["id"];
$name = $_POST["cname"];
$file = $_POST["file"];
$price = $_POST["cprice"];
$metatags = $_POST["cmetatags"];
$description = $_POST["cdescription"];




$conn = mysqli_connect("localhost","root","","bookdatabase") or die("Connection Failed");

$sql = "UPDATE product_tabe SET name= '$name', photo = '$file',price = '$price', metatags = '$metatags', description = '$description', verify = 0 WHERE id = '$student_id'";

if(mysqli_query($conn, $sql)){
  echo 1;
}else{
  echo 0;
}

?> 
