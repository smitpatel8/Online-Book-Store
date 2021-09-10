<?php

require"config.php";
$email = $password = "";
$err = "";


if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password =$_POST['password'];
 
    $sql ="SELECT * FROM sellerusers WHERE email = '$email' AND password = '$password' ";
    $stmt = mysqli_query($conn, $sql);

    $d= mysqli_num_rows($stmt);
    
    if($d>=1)
    {
      session_start();
      $_SESSION['email'] = $email;
      header("Location: display.php");  
    }
    else
    {
      $err ='enter valid details';     
    }    
}    

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="img/___.png2.png" type="image/gif" sizes="16x16">
    
    <link rel="stylesheet" href="css/style6.css" />
    <title>Sign in & Sign up Form</title>
  </head>
  <body>

    <nav>
      <ul class="nav-links">
        <li><a href="about.php">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="index.php">Buy</a></li>
      </ul>
    </nav>


    <main>
      <section class="presentation">
        <div class="introduction">
          <div class="intro-text">
            <h1>The Books for the future</h1>
            <p>
              Login into your seller account to sell your books.
            </p>
          </div>
            <form action="" method="post" class="sign-in-form" >
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="email" name="email" required="enter ma" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" required="ma" />
            </div>
            <div class="bu">
            
                  <a href="sellerform.php">sign up</a>
                  <input type="submit" value="Login" class="btn solid" />
            </div>
            <div class="field_error"><p><?php echo("$err") ?></p></div>
          </form>
          
        </div>
        <div class="cover">
          <img src="img/png1.png" alt="matebook"  />
        </div>
      </section>
    </main>





    <footer align=center>
      <div class="fot" align=center>
        <br>
        <img src="img/___.png2.png" alt="soory">
        <br>
                
      </div> 
            
        <img src="img/r1.png"  width=100px>
        <br>
        <h3>Follow us</h3>
        <br>   
      <div id="bo" align="center">
                
        <a href=""><img src="img/Facebook.png"></a>
        <a href="https://www.youtube.com/channel/UCS3brcF49FE3japE2xM-8gg"><img src="img/youtube.png" width="30px" height="30px"></a>
        <a href=""><img src="img/instagram.png" width="30px" height="30px"></a>
        <a href=""><img src="img/twitter.png" width="30px" height="30px"></a>
                
      </div>
      <div id="box">
        <a href="">
          <h6 align="left">@copyright</h6>
        </a>
        <a href=""><h6 align="right">@powered by webfun</h6>
        </a>
      </div>
    </footer>

    <!-- <script src="js/app.js"></script> -->
  </body>
</html>
