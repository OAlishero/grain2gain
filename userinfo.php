<html>
<?php

if (empty($_GET)) {
    $user_username=$_POST['username']
    $user_dob=$_POST['birthday']
    $user_email=$_POST['email']
    header("Location: /phpproject/intro.php");  
    exit;
}
else {
    $user_email=$_GET['email']
    $usernamescount= "SELECT * FROM Username WHERE email = '$user_email'";
    if($result= mysqli_query($mysqli, $usernamescount)){
        while($row = mysqli_fetch_assoc($result)) {
            $user_dob=$row['birthday']
            $user_username=$row['username']
    }      
    header("Location: /phpproject/intro.php");  
    exit;
}

?>

</html>