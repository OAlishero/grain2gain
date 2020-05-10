<html>
<head> 
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">     
</head>
<body>
<?php 
session_start();
error_reporting(E_ALL ^ E_NOTICE);  
$mysqli = mysqli_connect("localhost", "alisher", "password", "Users"); #choose database
if($mysqli === false){ #Check Connection
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

// $sql = "SELECT * FROM Username WHERE email = $email123";
// if($result = mysqli_query($mysqli, $sql)){
//     while($row = mysqli_fetch_array($result)){
//     $username=$row['username'];
//     // $email=$row['email'];
//     $dob=$row['birthday'];
//     }  
// }
?>



<div class="topnav">
  <div class="logo">
    <img src="cropped_grain2gain.png" alt="Grain 2 Gain">
  </div> 
  <a href="/phpproject/home.php">Home</a>
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

<div class="bodyimage">
  <img src="grain2gain(1).png" alt="Grain 2 Gain" > 
</div>

<h1> WELCOME <?php print_r($_SESSION['username']); ?></h1> 
<div class="intro"> 
  <div class= "title">
    Prehistory 
    <div class= "maininfo">
        <pre>
        The earliest known tool for use in computation was the abacus,<br> developed in the period between 2700–2300 BCE in Sumer.[3] The Sumerians'<br> abacus consisted of a table of successive columns which <br>delimited the successive orders of magnitude of their sexagesimal <br>number system.[4]:11 Its original style of usage was by lines drawn in <br>sand with pebbles .[citation needed] Abaci of a more modern design are <br>still used as calculation tools today, such as the Chinese abacus.[5]  <br>In the 5th century BC in ancient India, the grammarian Pāṇini <br>formulated the grammar of Sanskrit in 3959 rules known as the <br>Ashtadhyayi which was highly systematized and technical. Panini used <br>metarules, transformations and recursions.[6]  The Antikythera <br>mechanism is believed to be an early mechanical analog computer.[7] It <br>was designed to calculate astronomical positions. It was discovered in <br>1901 in the Antikythera wreck off the Greek island of Antikythera, <br>between Kythera and Crete, and has been dated to circa 100 <br>BC.[citation needed]  Mechanical analog computer devices appeared <br>again a thousand years later in the medieval Islamic world and were <br>developed by Muslim astronomers, such as the mechanical geared <br>astrolabe by Abū Rayhān al-Bīrūnī,[8] and the torquetum by Jabir ibn <br>Aflah.[9] According to Simon Singh, Muslim mathematicians also made <br>important advances in cryptography, such as the development of <br>cryptanalysis and frequency analysis by Alkindus.
        </pre>
    
    </div>
  </div>
</div> 


<?php mysqli_close($mysqli); ?>
</body>
</html> 

