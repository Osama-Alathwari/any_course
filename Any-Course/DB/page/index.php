<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Any Course</title>
    <!-- Normalize -->
    <link rel="stylesheet" href="../../CSS/normalize.css">
    <!-- Font Awesom -->
    <link rel="stylesheet" href="../../CSS/all.min.css">
    <!-- CSS Styling -->
    <link rel="stylesheet" href="../../CSS/any-course.css">
</head>

<body>
    <!-- Start Header -->
    <div class="header" id="header">
        <div class="container">
            <a href="#" class="logo">Any Course</a>
            <ul class="main-nav">
                <?php if (!(isset($_COOKIE['usernameAdmin'], $_COOKIE['passwordAdmin']) || isset($_COOKIE['usernameUser'], $_COOKIE['passwordUser']))) {
                    echo "
                    <li><a href='./login.php'>تسجيل الدخول</a></li>
                    <li><a href='./signup.php'  >انشاء حساب</a></li>
                    ";
                } else {
                    echo "
                    <li><a href='../logout.php'>تسجيل الخروج</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- End Header -->

    <!-- Strat Section -->
    <div class="section">
        <div class="container">
            <div class="text">
                <h1>مرحبا بك في منصه Any Course</h1>
                <p>منصه عربيه تهمتم بجمع افضل الكرسات العربيه لتعلم لغات البرمجه</p>
            </div>
            <div class="image">
                <img src="../imgs/work-steps.png" alt="">
            </div>
            <?php if (!(isset($_COOKIE['usernameAdmin'], $_COOKIE['passwordAdmin']) || isset($_COOKIE['usernameUser'], $_COOKIE['passwordUser']))) {
                echo "<a href='./login.php' class='go-to'>";
            } else {
                echo "<a href='./section.php' class='go-to'>";
            }
            ?>
            <i class="fas fa-angle-double-right fa-2x"></i>
            </a>

        </div>
    </div>
    <!-- End Section -->
</body>

</html>