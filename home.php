<html> 
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" href="/opt/lampp/htdocs/favicon.ico" type="image/ico">
  <meta charset="UTF-8">
</head>
                                                                                                                                                                                            
<body>
<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);  
$mysqli = mysqli_connect("localhost", "alisher", "password", "Users"); #choose database
if($mysqli === false){ #Check Connection
  die("ERROR: Could not connect. " . mysqli_connect_error());
}?>
<div class="topnav">
  <div class="logo">
    <img src="cropped_grain2gain.png" alt="Grain 2 Gain">
  </div> 
  <a href=c>Home</a>
  <a href="/phpproject/introduction.php">Intro</a>
  <a href="#/phpproject/contact.php">Contact</a>
  <a href="#/phpproject/about.php">About</a>
  <?php  
  if (!$_SESSION['username']){?> 
    <div class="login-container">
      <form action=" /phpproject/login.php" method="get">
        <input type="email" placeholder="Email" name="email">
        <input type="password" id="pass" placeholder="Password" name="password">
        <button type="submit">Sign in</button>
      </form>
    </div> 
    <?php } 
  else {?> 
    <div class="loggedin">
      <p>
        <div class="dropdown">
          <button class="dropbtn"><?php echo $_SESSION["username"];?></button>
          <div class="dropdown-content">
            <a href="/phpproject/logout.php">Log out</a>
            <a href="#">Link 2</a>
          </div>
        </div>
      </p>
      <img src="<?php echo $_SESSION['profilepicture'];?>" alt="Smiley face" height="40" width="40"> 
    </div> 
  <?php } ?> 
</div> 

<h2> 
<div class="signup">
<form action="/phpproject/signup.php" method="post" enctype="multipart/form-data">
    <p>Sign Up</p>  <br />
    Username: <br /> <input type="text" name="name" class="inputs123" maxlength="15" required/> <br /> 
    Email:<br /> <input type="email" name="email" class="inputs123" required /> <br /> 
    Password: <br /> <input type="password" id="pass" name="password" minlength="8" maxlength="25" required> <br /> 
    Date of Birth: <br /> <input type="date" id="pass" name="birthday" required> <br /> 
    Profile Picture: <br /> <input type="file" id="profilepicture" name="profilepicture" accept="image/*"> <br />
    <input type="submit" value="Sign Up" name="submit">
</form>  
</div>
</h2>
</body> 


</html> 

