<?php
  require "config.php";

   session_start();
   if(!isset($_SESSION['email'])){
    header('location : index.php');
   }



?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  session_start();
  session_destroy();
  header("Location: index.php");
 
}
?>





<!DOCTYPE html>
<html lang="en">
  <head> 
    <link rel="icon" href="img/___.png2.png" type="image/gif" sizes="16x16">
    
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style3.css" />
    <link  rel="stylesheet" href="css/swiper.min.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/h.css"/>
    <link rel="stylesheet" href="css/style9.css">

    <script type="text/javascript" src="js/kk.js"></script>

    <title>WebFun</title> 
  </head>
  <body  onload="currentSlide(1)">
    <nav>
      <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
      <ul class="nav-links">
        <li><a href=""><img src="img/___.png2.png" alt="soory" height="50"></a></li>
        <li><a href="inde.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact us</a></li>
        <li><a href="sellerlog.php">Sell</a></li>
        <li><form action="" method='post'>
              <input type="submit" value="Log out" />
            </form>
        </li>

      </ul>
    </nav>
    <script src="js/ap.js"></script>
    <div id="mar">
      <marquee width="100%" direction = "left" height="100px"><a href="">For final year project and mini project plz contact us</a>
      </marquee>
    </div>

    <!-- -------------c-----------------ccc---------------------------------------


    <div class="slideshow-container" >

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade" >
            <!-- <div class="numbertext">1 / 3</div> -->
                  <img src="img/book1.jpg">
            <!-- <div class="text">Caption Text</div> -->
                  </div>

                  <div class="mySlides fade">
                        <!-- <div class="numbertext">2 / 3</div> -->
                              <img src="img/book2.jpg" style="width:100%">
                              <!-- <div class="text">Caption Two</div> -->
                  </div>

                  <div class="mySlides fade">
                <!-- <div class="numbertext">3 / 3</div> -->
                  <img src="img/book3.jpg" style="width:100%">
                <!-- <div class="text">Caption Three</div> -->
                         </div>

  <!-- Next and previous buttons -->
                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <br>

<!-- The dots/circles -->
            <div style="text-align:center">
                  <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
            </div>


<br>
<br>

    <!-- -------------------------------ccc--------------------------------------- -->
    <!-- product -->







    <div class="heading">
            <!-- <h1>P R O D U C T &emsp; S L I D E R &emsp; 2 </h1> -->
            <h1>BOOKS AT YOUR COLLEGE</h1>

      </div>
         <div class="carousel-wrapper">
    <div class="carousel" data-flickity>
      <?php

     
       $q = "select * from product_tabe where verify = 0";

       $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
  
      <div class="carousel-cell">
        <h3><?php echo $res['name'];  ?></h3>
        <a href="detail.php?id=<?php echo $res['id']; ?>"><img src="<?php echo "upload-image/{$res["photo"]}";  ?>" height='270px' width='164px'></a>
        <div class="line"></div>
        <div class="price">
          <span>₹<sup><?php echo $res['price'];  ?></sup></span>
        </div>
      </div>
</a>
 <?php 
 }
  ?>


    </div>
  </div>

  <script src="https://unpkg.com/flickity@2.0.11/dist/flickity.pkgd.min.js"></script>




 <div class="heading">
            <!-- <h1>P R O D U C T &emsp; S L I D E R &emsp; 2 </h1> -->
            <h1>BOOKS AT YOUR LOCATION</h1>

      </div>
         <div class="carousel-wrapper">
    <div class="carousel" data-flickity>
      <?php


     
       $q = "select * from product_tabe where verify = 0";

       $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
  
      <div class="carousel-cell">
        <h3><?php echo $res['name'];  ?></h3>
        <a href="detail.php?id=<?php echo $res['id']; ?>"><img src="<?php echo "upload-image/{$res["photo"]}";  ?>" height='270px' width='164px'></a>
        <div class="line"></div>
        <div class="price">
          <span>₹<sup><?php echo $res['price'];  ?></sup></span>
        </div>
      </div>
</a>
 <?php 
 }
  ?>


    </div>
  </div>

  <script src="https://unpkg.com/flickity@2.0.11/dist/flickity.pkgd.min.js"></script>

































    
<!-- ////////////////////////////////////////////////////////////////////////////// -->


    <footer>
		<div class="cont">
      <div class="leftfo">
        <h1></h1>
         <div class="fot" align=center>
            <br>
              <img src="img/___.png" alt="soory">
            <br>
                <img src="img/r1.png" align="center" width=100px>
            <br>
            <br>

                <h3>Follow us</h3>
          </div> 
           
          <div id="bo" align="center">
                
            <a href=""><img src="img/Facebook.png" width="30px" height="30px"></a>
            <a href="https://www.youtube.com/channel/UCS3brcF49FE3japE2xM-8gg"><img src="img/youtube.png" width="30px" height="30px"></a>
            <a href=""><img src="img/instagram.png" width="30px" height="30px"></a>
            <a href=""><img src="img/twitter.png" width="30px" height="30px"></a>
                
        </div>
      </div>

 <hr color="black">
    <div class="rightfo">
      <h1>Categories</h1>
      <br>
      <div class="content">
              <ul>
                <li><a href="">Information Technology</a></li>
                <li><a href="">Computer Science</a></li>
                <li><a href="">Electronics</a></li>
                <li><a href="">Mechanics</a></li>
                <li><a href="">Extc</a></li>


              </ul>
      </div>
    </div>

<hr color="black">
    <div class="righto">
      <h1 color="white">Contact Us</h1>
      <br>
      <div class="conten">
              <ul>
                <li><br></li>

                <li>Mob: <a>9096141591</a></li>
                <li><br></li>
                <li>Email:  <a>chetan.webfun@gmail.com</a></li>
              </ul>
      </div>
    </div>


		</div>
		<div id="box" align="center">
        	<a href="">
          		<h6>@copyright  @powered by webfun</h6>
        	</a>
    </div>
	</footer>

<!-- ////////////////////////////////////////////////////////////////////////////// -->
  </body>
</html>
