<?php

include 'config.php'; 

$id = $_GET['id'];

$q = " DELETE FROM product_tabe WHERE id = $id ";

$f = mysqli_query($conn, $q);
if($f){
	header('location:masteradmin.php');
}
else{
	echo "error";
}

?>