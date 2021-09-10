<?php

require"config.php";

$email = $password = "";
$err = "";


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $sql ="SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $stmt = mysqli_query($conn, $sql);

    $d= mysqli_num_rows($stmt);
    
    if($d>0)
    {
      session_start();
      $_SESSION['email'] = $email;
      header("Location: inde.php");  
    }
    else
    {
      $err ='enter valid details';     
    }    
}    

?>