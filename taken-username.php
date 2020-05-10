<html> 
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">
</head>
                                                                                                                                                                                            
<body>
<div class="topnav">
  <div class="logo">
    <img src="cropped_grain2gain.png" alt="Grain 2 Gain">
  </div> 
  <a href="/phpproject/home.php">Home</a>
  <a href="/phpproject/introduction.php">Intro</a>
  <a href="#/phpproject/contact.php">Contact</a>
  <a href="#/phpproject/about.php">About</a> 
  <div class="login-container">
    <form action=" /phpproject/login.php" method="get">
      <input type="email" placeholder="Email" name="email">
      <input type="password" id="pass" placeholder="Password" name="password">
      <button type="submit">Sign in</button>
    </form>
  </div>
</div> 

<h2> 
<div class="signup">
<form action="/phpproject/signup.php" method="post">
    <p>Sign Up</p>  <br />
    Username: <br /> <input type="text" name="name" class="inputs123" maxlength="15" required/> <br /> 
    <h3>Username already taken</h3>
    Email:<br /> <input type="email" name="email" class="inputs123" required /> <br /> 
    Password: <br /> <input type="password" id="pass" name="password" minlength="8" maxlength="25" required> <br /> 
    Date of Birth: <br /> <input type="date" id="pass" name="birthday" required> <br /> 
    Profile Picture: <br /> <input type="file" id="pass" name="profilepicture" accept="image/*"> <br />
    <input type="submit" value="Sign Up" />
</form>  
</div>
</h2>
</body> 


</html> 

