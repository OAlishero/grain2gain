<html> 
<head> 
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">     
</head>

<body>
<?php
session_start();
session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>