<html>
<!-- Alisher Yokubjonov --> 
<head> 
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8"> 
</head>

<body>


    <?php 
      $_POST["password"]= password_hash($_POST["password"], PASSWORD_DEFAULT); #hash the password
      $password=$_POST["password"];
      $email=$_POST["email"];
      $firstname=" ";
      $lastname=" ";
      $username=$_POST["name"];
      $birthday=$_POST["birthday"];
      $mysqli = mysqli_connect("localhost", "alisher", "password", "grain2gain"); #choose database

      session_start(); #start session
      $_SESSION['username']= $username;
      $_SESSION['email']= $email;
      $_SESSION['birthday']= $birthday;

      $path_parts = pathinfo($_FILES["profilepicture"]["name"]);
      $_FILES["profilepicture"]["name"] = $_SESSION['username'] . "." . $path_parts['extension']; #change file name to username
      $_SESSION['profilepicture'] = "/phpproject/user_PP/" . basename($_FILES["profilepicture"]["name"]);
      $profilepicture = $_SESSION['profilepicture'];
    
    
      if($mysqli === false){ #Check Connection
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }
      $usernamescount= "SELECT username, COUNT(*) FROM userinfo WHERE username = '$username'";
      if($result= mysqli_query($mysqli, $usernamescount)){
        while($row = mysqli_fetch_assoc($result)) {
          if ($row['COUNT(*)'] > 0) {
            header("Location: /phpproject/taken-username.php");  
            exit; 
          }
          else {
            $emailcheck= "SELECT email,COUNT(*) FROM userinfo WHERE email = '$email'";
            if($result= mysqli_query($mysqli, $emailcheck)){
              while($row = mysqli_fetch_assoc($result)) {
                if ($row['COUNT(*)'] > 0) {
                  header("Location: /phpproject/taken-email.php");  
                  exit;  
                }                                                                                                                 
                else {               
                  $sql = "INSERT INTO userinfo (firstname, lastname, username, email, password, birthday, profilepicture)                           
                  VALUES ('$firstname', '$lastname', '$username', '$email', '$password', DATE '$birthday', '$profilepicture')";                     
                  if(mysqli_query($mysqli, $sql)) {                                                                                                                                                                        
                    print_r("Records inserted successfully.");                                            
                  } 
                  else {
                    print_r("ERROR: Could not able to execute $sql. " . mysqli_error($mysqli));
                  }
                }
              }
              
            }
          }
        }  
      }  
  
  #########################################################################################################################################################
  

  #########################################################################################################################################################


  #########################################################################################################################################################
  

  #########################################################################################################################################################

  $target_dir = "/opt/lampp/htdocs/phpproject/user_PP/";  
  $target_file = $target_dir . basename($_FILES["profilepicture"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  #Check if image file is an actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["profilepicture"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["profilepicture"]["size"] > 50000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded. $uploadOk == 0";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["profilepicture"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["profilepicture"]["name"]). " has been uploaded.";
          header("Location: /phpproject/introduction.php");  
          exit; 
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }

  
  #########################################################################################################################################################
  

  #########################################################################################################################################################


  #########################################################################################################################################################
  

  #########################################################################################################################################################


    ?>

</body>
</html>