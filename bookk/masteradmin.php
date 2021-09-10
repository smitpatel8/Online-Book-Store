<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  session_start();
  session_destroy();
  header("Location: sellerlog.php");
 
}

?>

 



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & AjUD</title>
  <!-- <link rel="stylesheet" href="css/al.css"> -->
    <link rel="stylesheet" href="css/style4.css" />
    <link rel="icon" href="img/___.png2.png" type="image/gif" sizes="16x16">
    
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

	<nav>
            <ul class="nav-links">
              
              <li><form action="" method='post'>
                    <input type="submit" value="Log out" />
                  </form>
              </li>
            </ul>
        </nav>





 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Display Table Data </h1>

 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> name </th>
 <th> photo </th>
 <th> price </th>
 <th> categories </th>
 <th> Delete </th>
 <th> Update </th>

 </tr >

 <?php

 include 'config.php'; 
 $q = "select * from product_tabe where verify = 0";

 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['name'];  ?> </td>
 <td> <?php echo "<img src='upload-image/{$res["photo"]}' height='40px' width='60px'>";  ?> </td>
 <td> <?php echo $res['price'];  ?> </td>
 <td> <?php echo $res['categories'];  ?> </td>
 <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id'];
  ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-primary btn"> <a href="verify.php?id=<?php echo $res['id']; ?>" class="text-white"> verify </a> </button> </td>

 </tr>

 <?php 
 }
  ?>
 
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>
</body>
</html>