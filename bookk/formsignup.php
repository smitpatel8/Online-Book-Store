<?php

require"config.php";

$email = $password = $conf_password = $college = $college_address = "";
$email_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['conf_password'];    
    $college = $_POST['college'];
    $college_address =$_POST['college_address'];
   
    $sql = "SELECT email FROM users WHERE email = '$email'";
    $stmt = mysqli_query($conn, $sql);
    $n = mysqli_num_rows($stmt);
    if($n>0)
      {
          $email_err ="email already taken";
      }
    }

    


// Check for password

if(strlen(trim($password)) < 5){
    $password_err = "Password cannot be less than 5 characters ";
}

// Check for confirm password field
if($password != $conf_password){
    $password_err = "Passwords should match. ";
}


// If there were no errors, go ahead and insert into the database
if(empty($email_err) && empty($password_err))
{
    
     $query = "INSERT INTO users (email, password,college,college_address ) VALUES('$email','$password', '$college' ,'$college_address' )";
      
      $exec_query = mysqli_query($conn,$query);
      if($exec_query)
      {
        
        session_start();
        $_SESSION['email'] = $email;
        header("Location: inde.php");

      }
      else
      {
        echo "error";

      }
}
   




?>

<!DOCTYPE html>
<html lang="en">
	<head>
    <link rel="icon" href="img/___.png2.png" type="image/gif" sizes="16x16">
    
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link
			href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="css/style7.css" />
		<title>Landing Page</title>
	</head>
	<body>
			<nav>
      			<ul class="nav-links">
        			<li><a href="about.php">About Us</a></li>
        			<li><a href="contact.php">Contact Us</a></li>
              <li><a href="sellerlog.php">Sell</a></li>
      			</ul>
    		</nav>
		<main>
			<section class="presentation">
				<div class="introduction">
					<div class="intro-text">
						<h1>The Books for the future</h1>
						<p>
							The books are oferring at exciting
							price.
						</p>
					</div>
					
            <form action="" class="sign-up-form" method="post">
              <p>we will verify</p><br>

            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" name="email"  required />
            </div>
            <span id="sp1"></span>
           

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="password" placeholder="Password" name="password" required />
            </div>
            <span id="sp2"></span>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="conf_password" required />
            </div>
            <span id="sp3"></span>

            <div class="input-field">
              <i class="fas fa-address-book"></i>
              <input type="college" placeholder="college" name="college" required/>
            </div>
            <span id="sp4"></span>

            <div class="input-field">
              <i class="fas fa fa-map-marker"></i>
              <input type="address" placeholder="college address" name="college_address" required />              
            </div>
            <span id="sp5"></span>

            <div class="bu">

                  <a href="index.php">Login</a>
                  <input type="submit" value="Sign in" class="btn solid"  />
            </div>
            <div class="field_errors" ><p><?php echo "$email_err   $password_err"; ?></p></div><br>
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
        <a href="https://www.instagram.com/webfun_official/"><img src="img/instagram.png" width="30px" height="30px"></a>
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
	</body>
</html>
