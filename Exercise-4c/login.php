<?php
require 'connect.php';
if(!empty($_SESSION["id"])){
    header("Location: home.php");
}
if (isset($_POST["submit"])) {
    $Username = $_POST["Username"];
    $password = $_POST["password"];
    $result = mysqli_query($con, "SELECT * FROM register WHERE Username = '$Username'");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $verify = password_verify($password, $row['password']);
        if ($verify == 1) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: home.php");
        } else {
            header("location: error.php");
            //echo
            //"<script> alert('Incorrect Password'); </script>";
        }
    } else {
        header("location: error1.php");
        //echo
        //"<script> alert('User not registered'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="jat">
    <h1>LOG IN</h1>
        <form action="" method="post" autocomplete="off">
            <label for="Username">Username</label>
            <input id="name1" type="text" name="Username" placeholder="Enter your valid username"/>
            <br><br>
            <div><label for="password">Password</label>
            <input id="pass2" type="password" name="password" placeholder="Enter your valid password"/></div>
            <br><br>
            <div class="login"><button type="submit" name="submit">Login</button></div>
            <div class="login1"><a id="to" href="Registration.php">Registration</a></div>
        </form>
    </div>
</body>
</html>