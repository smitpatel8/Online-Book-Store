<?php
require "config.php";
session_start();
$id = $_GET['id'];
$sql = "SELECT * FROM product_tabe WHERE id= '$id'";
$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");

if(mysqli_num_rows($result) > 0 ){
  $res = mysqli_fetch_array($result);
  $n =  $res['name'];
  $p = $res["photo"];
  $pr = $res["price"];
  $des = $res["description"];
  $cat = $res["categories"];

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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style8.css" />
    <script type="text/javascript" src="js/k1.js"></script>
    <title>as</title>
  </head>
  <body>
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
        <!-- <li><a href="#">Services</a></li> -->
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


    <div id="content-wrapper">
        <div class="column">
            <div class="img-magnifier-container">
              <br>
              <img id="myimage" src='<?php echo "upload-image/{$res["photo"]}"; ?>' width="600" height="400" alt="Girl">
            </div>

            <script>
              /* Execute the magnify function: */
              magnify("myimage", 3);
              /* Specify the id of the image, and the strength of the magnifier glass: */
            </script>
        </div>
        <br>
        <br>
        <div class="column" align="center">
            <h1><?php echo "$n";?></h1>
            <hr>
            <h3>$<?php echo "$pr";?></h3>

            <p><?php echo "$des";?></p>
            <p><?php echo "$cat";?></p>

            
            <button class="button"><span>Buy Now</span></button>
            
    </div>
        

    </div>
    





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




  </body>
</html>
