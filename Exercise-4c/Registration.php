<?php
require 'connect.php';
if(!empty($_SESSION["id"])){
  header("Location: home.php");
}
if(isset($_POST["submit"])){
  $Username = $_POST["Username"];
  $password = $_POST["password"];
  $hash=password_hash($password, PASSWORD_DEFAULT);
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($con, "SELECT * FROM register WHERE Username = '$Username'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('E-mail is already taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $hash=password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO register VALUES('','$Username','$hash')";
      mysqli_query($con, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('passwords do not match'); </script>";
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="user">
       <h1>Registration Form</h1>
        <form action="" method="POST" autocomplete="off">
            <label for="Username">E-mail</label>
            <input id="name" type="text" name="Username" placeholder="Enter your valid e-mail"/>
            <br><br>
            <div><label for="password">Password</label>
            <input id="pass" type="password" name="password" minlength="6" placeholder="Enter your valid password" /></div>
            <br><br>
            <div><label for="confirmpassword">Confirm-Password</label>
            <input id="pass1" type="password" name="confirmpassword" placeholder="Re-enter your valid password"/></div>
            <br><br>
            <div><button type="submit" name="submit">Register</button></div>
        </form>
        <div class="log"><a id="in" href="login.php">Login</a><div>
    </div>
</body>
</html>