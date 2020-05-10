<?php
    
    $mysqli = mysqli_connect("localhost", "alisher", "password", "grain2gain"); #choose database 
    if($mysqli === false){ #Check Connection
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM userinfo";
    if($result = mysqli_query($mysqli, $sql)){
      if(mysqli_num_rows($result) > 0){
        echo "<table>";
          echo "<tr>";
            echo "<th>username</th>";
            echo "<th>email</th>";
            echo "<th>password</th>";
            echo "<th>birthday</th>";
        echo "</tr>";
    while($row = mysqli_fetch_array($result)){
        echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['birthday'] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
      } else{
          echo "No records matching your query were found.";
      }
    }
    else{
      echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
    }


    mysqli_close($mysqli); 




?>