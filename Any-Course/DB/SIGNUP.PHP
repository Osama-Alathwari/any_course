<?php

require_once("connection.php");

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$passw = $_POST["pass2"];
$hashedPass = password_hash($passw, PASSWORD_DEFAULT);
$isUserExist = "SELECT ID FROM user WHERE F_NAME='$fname' and L_NAME='$lname' and EMAIL='$email'and PASS='$hashedPass'";
$addUser = "INSERT INTO user(F_NAME, L_NAME, EMAIL, PASS) VALUE('$fname','$lname','$email','$hashedPass')";
if (isset($_POST["fname"], $_POST["lname"], $_POST["email"], $_POST["pass2"]) && $conn) {

   $query = mysqli_query($conn, $isUserExist);

   if (mysqli_num_rows($query) > 0) {

      echo "This email is already used";
   } else {
      $query3 = mysqli_query($conn, $addUser);
      header("location: ./page/login.php");
   }
}
