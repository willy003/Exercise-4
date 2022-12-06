<?php
require 'connect.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($con, "SELECT * FROM register WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1 class="hey">Welcome!</h1>
    <a id="out" href="logout.php">Logout</a>
  </body>
</html>