<?php
if (!(isset($_COOKIE['usernameAdmin'], $_COOKIE['passwordAdmin']) || isset($_COOKIE['usernameUser'], $_COOKIE['passwordUser']))) {
    header("Location:./index.php");
}
require_once("../connection.php");
$show = "SELECT * FROM section";
$result = $conn->query($show);
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Section</title>
    <link rel="stylesheet" href="../../CSS/section.css" />
    <link rel="stylesheet" href="../../CSS/any-course.css">

</head>

<body>
    <!-- Start Header -->
    <div class="header">
        <div class="container">
            <a href="./index.php" class="logo">Any Course</a>

            <ul class="main-nav">
                <li><a href='../logout.php'>تسجيل الخروج</a></li>

            </ul>
        </div>
    </div>
    <!-- End Header -->
    <h1 class="main-title">الاقسام</h1>
    <!--قسم html-->

    <form action="CPage.php" method="post">
        <div class="all">
            <?php

            if ($result->num_rows) {
                while ($rows = $result->fetch_assoc()) {
                    $PH = $rows['IMAG'];
                    $NA = $rows['S_NAME'];

                    echo "
                    <div class='html'>
                    
                    <div class='h-2'>
                    <h2>ابدأ المشاهدة</h2>
                    </div>
                    
                    <div class='img'>
                    
                    <input type='submit' type='hidden' name='pageName' value='$NA'>
                    <img src='$PH' type='submit' name='pageName' value='$NA'/>
                        
                    </div>
            
                    <div class='h-1'>
                        <h1>$NA</h1>
                    </div>

                </div>";
                }
            } ?>

        </div>
    </form>
</body>

</html>