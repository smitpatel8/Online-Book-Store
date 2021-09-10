


<?php

include 'config.php'; 

$id = $_GET['id'];

  $q = " update product_tabe set verify=1 where id=$id  ";


$f = mysqli_query($conn, $q);
if($f){
  header('location:masteradmin.php');
}
else{
  echo "error";
}

?>