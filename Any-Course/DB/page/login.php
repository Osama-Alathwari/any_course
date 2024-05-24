<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/login.css">
    <link rel="stylesheet" href="../../CSS/any-course.css">
    <title>Login</title>
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
    <div class="login">
        <div class="Container">
            <h3 class="login-title">تسجيل الدخول</h3>
            <!-- <p>Easily Login into your Account</p> -->
            <form action="../LOGIN.PHP" method="post">
                <input type="email" name="logEmail" id="" placeholder="الأيميل" required>
                <input type="password" name="logPass" id="" placeholder="كلمة المرور" required>
                <input type="submit" value="تسجيل الدخول">
                <a href="signup.php">
                    <input type="button" value="انشاء حساب">
                </a>
            </form>
        </div>
    </div>
</body>

</html>