<?PHP
require_once("connection.php");


if ($conn && isset($_POST["logEmail"], $_POST["logPass"])) {
   $e = $_POST["logEmail"];
   $p = $_POST["logPass"];

   $getPassHash = "SELECT PASS FROM user WHERE EMAIL = '$e'";
   $query4 = mysqli_query($conn, $getPassHash);
   $res = $query4->fetch_assoc();

   if (password_verify($p, $res['PASS'])) {
      $isUser = "SELECT isAdmin from user WHERE EMAIL = '$e'";
      $userQuery = mysqli_query($conn, $isUser);
      $userResult = $userQuery->fetch_assoc();

      if ($userResult['isAdmin']) {
         setcookie("usernameAdmin",$e,time() + (60*60));
         setcookie("passwordAdmin",$p,time() + (60*60));
         header("Location:./page/admin.php");
      } else {
         setcookie("usernameUser",$e,time() + (60*60));
         setcookie("passwordUser",$p,time() + (60*60));
         header("Location:./page/section.php");
      }
   } else {
      header("Location:./page/signup.php");
   }
} else {
   echo (" <script> alert('Check ur Connection')</script> ");
}
