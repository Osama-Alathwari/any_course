<?php
require_once("../connection.php");
$pagename = $_POST['pageName'];

$secSQLQuery = "SELECT ID FROM section WHERE S_NAME = '$pagename'";
$secQuery = $conn->query($secSQLQuery);
$secResult = $secQuery->fetch_assoc();

$showe = "SELECT * FROM all_video WHERE `TYPE`= '$secResult[ID]'";
$result = $conn->query($showe);

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/master.css" />
    <link rel="stylesheet" href="../../CSS/any-course.css">
    <title><?php echo "$pagename"; ?></title>
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

    <h1 class="main-title"><?php echo "$pagename"; ?></h1>

    <div class="all">
        <?PHP

        if ($result->num_rows) {
            while ($rows = $result->fetch_assoc()) {
                $vdname = $rows['V_NAME'];
                $path = $rows['PATH'];

                echo "
                    <div class='z1'>
                        <video controls>
                            <source src='$path' type='video/mp4' />
                        </video>
                        <p class='paragraph'>$vdname</p>
                    </div>";
            }
        }
        ?>
    </div>
</body>

</html>