<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/sign-up.css">
    <link rel="stylesheet" href="../../CSS/any-course.css">
    <title>Sign Up</title>
</head>

<body>
    <!-- Start Header -->
    <div class="header" id="header">
        <div class="container">
            <a href="./index.php" class="logo">Any Course</a>
            <ul class="main-nav">
                <li><a href="login.php">تسجيل الدخول</a></li>
                <li><a href="signup.php">انشاء حساب</a></li>
            </ul>
        </div>
    </div>
    <!-- End Header -->
    <div class="sign-up">
        <div class="Container">
            <h3 class="sign-up-title">انشاء حساب !</h3>
            <!-- <p>Quickly and Easy Create an Account Using the Form Below</p> -->
            <form action="../SIGNUP.PHP" method="post">
                <input type="text" name="fname" id="" placeholder=" الاسم الأول" required>
                <input type="text" name="lname" id="" placeholder=" الأسم الثاني" required>
                <input type="email" name="email" id="" placeholder=" الايميل" required>
                <input type="password" name="pass2" id="" placeholder="كلمة المرور" required>
                <input type="submit" value="انشاء">
                <a href="login.php">
                    <input type="button" value="لديك حساب سابق ؟ تسجيل الدخول">
                </a>
            </form>
        </div>
    </div>
</body>

</html>