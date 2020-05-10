<html> 
<head> 
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">     
</head>

<body>
<?php

$password=$_GET["password"];
$email=$_GET["email"];

$mysqli = mysqli_connect("localhost", "alisher", "password", "grain2gain"); #choose database
if($mysqli === false){ #Check Connection
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

$emailcheck= "SELECT birthday, username, email, password, profilepicture, COUNT(*) FROM userinfo WHERE email = '$email'";
    if($result= mysqli_query($mysqli, $emailcheck)){
      while($row = mysqli_fetch_assoc($result)) {
        if ($row['COUNT(*)'] == 0) {
          print_r($row['COUNT(*)']);
          header("Location: /phpproject/taken-email.php");  
          exit; 
        }
        else {
          if(password_verify($_GET["password"], $row['password'])){ 
            session_start();
            $_SESSION['username']= $row['username'];
            $_SESSION['email']= $email;
            $_SESSION['birthday']= $row['birhday'];
            $_SESSION['profilepicture']= $row['profilepicture'];
            header("Location: /phpproject/introduction.php");  
            exit;
          }
          else {
            header("Location: /phpproject/tryagainhome.php");  
            exit; 
          }
          
        }
      }
    }    
?>

</body>

</html> 
