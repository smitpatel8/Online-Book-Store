<?php 

include 'config.php';
session_start();
$dk=$_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == "POST"){
 $name = $_POST['name'];
 $file = $_FILES['file'];
 $price = $_POST['price'];
 $description = $_POST['description'];
 $categories =$_POST['categories'];
 $metatags = $_POST['metatags'];


  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png');
  
if(is_numeric($price) == 1){
    
  if (in_array($fileActualExt, $allowed)) {
    
    if ($fileError ===0) {
      if ($fileSize < 19000000) {
        $fileNameNew = uniqid('',true).".".$fileActualExt;
        $fileDestination = 'upload-image/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        $q = "INSERT INTO product_tabe (email,name,photo,price,description,categories,metatags) VALUES ('$dk','$name','$fileNameNew','$price','$description','$categories','$metatags')";

        $query = mysqli_query($conn,$q);
        if ($query){
        session_start();
         header("Location: display.php");
        }
        else{
          echo("error");
        }
        
      }
      else{
        echo '<script>alert("your file must be less than 2 mb")</script>';
      }
    }
    else{
      echo '<script>alert("there is some error in uploading")</script>';

    }

  }
  else{ 
      echo '<script>alert("you are not allowed to upload this type")</script>';

  }
}
else{
      echo '<script>alert("enter price in number")</script>';

}


 
}
?>



<html lang="en">
  <head>
    <!-- Required meta tags -->
    <link rel="icon" href="img/___.png2.png" type="image/gif" sizes="16x16">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/st.css">

    <title>PHP login system!</title>
  </head>
  <body>
    <div class="container">
  <form method="post" enctype="multipart/form-data">


    <label for="bookname">book name</label>
    <input type="text" id="lname" name="name" placeholder="Your book name.." required>


    <label for="price">Price</label>
    <input type="text" id="fname" name="price" placeholder="Price" required>

    <label for="Meta tags">Meta tags</label>
    <input type="text" id="fname" name="metatags" placeholder="Meta Tags" required>


    <label for="Category">Category</label>
    <select name="categories" required>
      <option>IT</option>
      <option>CS</option>
      <option>Mechanical</option>
      <option>chemical</option>
      <option>EXTC</option>
      <option>Electronics</option>
      <option>Civil</option>
    </select>

    

    <label for="subject">Description</label>
    <textarea id="subject" name="description" placeholder="Write something.." style="height:200px" required></textarea>


    



    <label for="image">Image</label>
    <input type="file" id="myFile" name="file" required/>
    <button type="submit" name="submit">SUBMIT</button>
    

  </form>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
