<?php
require_once("../connection.php");
if (!isset($_COOKIE['usernameAdmin'], $_COOKIE['passwordAdmin'])) {
    header("Location:./index.php");
}

$showe = "SELECT ID,S_NAME FROM section";
$result = $conn->query($showe);
$result2 = $conn->query($showe);


$vidSQL = "SELECT ID FROM all_video";
$vidQuery = $conn->query($vidSQL);
$vidDelQuery = $conn->query($vidSQL);
$errs = array();
function addSection($conn)
{

    if (isset($_POST['sname'])) {

        $sname = $_POST['sname'];
        $isExist = "SELECT ID FROM section WHERE S_NAME = '$sname' ";
        $query = mysqli_query($conn, $isExist);

        $getLastID = "SELECT ID FROM section";
        $getLastIDQuery = mysqli_query($conn, $getLastID);
        $ID = 0;
        while ($rows = $getLastIDQuery->fetch_assoc()) {
            $ID = $rows['ID'];
        }
        $ID += 1;

        if (mysqli_num_rows($query) > 0) {

            echo (" <script> alert('ALREADY EXIST')</script> ");
        } else {
            $filelname = $_FILES['photo']['name'];
            $filesize = $_FILES['photo']['size'];
            $filetmp = $_FILES['photo']['tmp_name'];
            $fileExt = strtolower(end(explode('.', $filelname)));
            $folder = "";
            $type = ['jpg', 'png', 'jpeg'];

            if (!in_array($fileExt, $type)) {
                $error[] = "extention";
            }

            if ($filesize > 2097152) {
                $error[] = "file size";
            }

            if (empty($error)) {
                $folder = "../background/" . $sname . '/' . $filelname;
                $insertphoto = "INSERT INTO section(ID,S_NAME, IMAG) VALUES('$ID','$sname','$folder')";
                mkdir(dirname($folder), 0777);
                move_uploaded_file($filetmp, $folder);
                mysqli_query($conn, $insertphoto);
            } //نقل 


            else {
                echo "ERROR CAN NOT ADD SECTION";
                print_r($error);
                exit;
            }
        }
    } else {

        echo (" <script> alert('Account Not Found')</script> ");
    }
}

// END ADDSECTION

function addVideo($conn)
{

    if (isset($_POST['vidname'])) {


        $vname = $_POST['vidname'];
        $vnum = $_POST['vidnum'];
        $vteacher = $_POST['teacher'];
        $isExist = "SELECT ID FROM all_video WHERE v_NAME = '$vname' and TEACHER = '$vteacher' ";
        $query = mysqli_query($conn, $isExist);

        if (mysqli_num_rows($query) > 0) {

            echo (" <script> alert('THIS VIDEO Already Exist')</script> ");
        } else {
            $vtype = $_POST['coursetype'];
            $error = array();
            $filelname = $_FILES['videoo']['name'];
            $filesize = $_FILES['videoo']['size'];
            $filetmp = $_FILES['videoo']['tmp_name'];
            $fileExt = strtolower(end(explode('.', $filelname)));
            $type = ['flv', 'mp4'];

            $getSecNameQuery = "SELECT S_NAME FROM section WHERE ID = '$vtype'";
            $secName = mysqli_query($conn, $getSecNameQuery);
            $secNameResult = $secName->fetch_assoc();

            if (!in_array($fileExt, $type)) {
                $errs[] = "extention";
            }

            if ($filesize > 41943040) {
                $errs[] = "file size";
            }

            if (empty($error)) {
                $folder = "../video/" . $secNameResult['S_NAME'] . '/' . $vteacher . '/' . $filelname;
                mkdir(dirname($folder),0777,true,);
                $insertphoto = "INSERT INTO all_video(ID,V_NAME, V_NUM, `PATH`, TEACHER, `TYPE`) VALUES('$vnum','$vname','$vnum','$folder','$vteacher','$vtype')";
                move_uploaded_file($filetmp, $folder);
                mysqli_query($conn, $insertphoto);
            } //نقل 


            else {
                $errs[] = "ERROR CAN NOT ADD Video";
            }
        }
    } else {

        echo (" <script> alert('Account Not Found')</script> ");
    }
}
// END ADDVIDEO

function deleteVideo($conn)
{
    $id = $_POST['vidnum'] ?? null;
    $secName = $_POST['coursetype'];

    if (!$id) {
        echo "
        <script>
        alert('invalid video number')
        </script>
        ";
        exit;
    }
    $state = "SELECT * FROM all_video WHERE ID = $id and `TYPE` = $secName";
    $video = $conn->query($state);
    $res = $video->fetch_assoc();
    if (mysqli_num_rows($video) > 0) {

        if ($res['PATH']) {
            unlink($res['PATH']);
        }
        $Del = "DELETE FROM all_video WHERE ID = $id";
        mysqli_query($conn, $Del);
    } else {
        echo "
        <script>
        alert('invalid video Section')
        </script>
        ";
    }


    header('Refresh:0');
}

if ($conn && isset($_POST['AddVideo'])) {

    addVideo($conn);
    header("Refresh:0");
} elseif ($conn && isset($_POST['AddSection'])) {
    addSection($conn);
    header("Refresh:0");
} elseif ($conn && isset($_POST['DeletVideo'])) {
    deleteVideo($conn);
}

// End Delete Video
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/any-course.css">
    <link rel="stylesheet" href="../../CSS/admin.css">
    <title>Dashboard</title>
</head>

<body>
    <!-- Start Header -->
    <div class="header" id="header">
        <div class="container">
            <a href="./index.php" class="logo">Any Course</a>
            <ul class="main-nav">
                <li><button onclick="shwo1();" name="addvideo">اضافة فيديو</button></li>
                <li><button onclick="shwo2();" name="addsection">اضافة قسم</button></li>
                <li><button onclick="shwo3();" name="deletvideo">حذف فيديو</button></li>
                <li><a href="../logout.php"><button>تسجيل الخروج</button></a></li>
            </ul>
        </div>
    </div>
    <!-- End Header -->
    <!-- <?php if (!empty($errs)) : ?>
        <div class="alert">
            <?php foreach ($errs as $err) : ?>
                <div> <?php echo $err ?> <br> </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?> -->

    <div class="main-section">
        <div class="right-sec">

            <div id="formAddvideo">
                <h1>إضافة فيديو : </h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label>اسم الفيديو</label>
                        <br>
                        <input type="text" name="vidname" required>
                    </div>
                    <div>
                        <label>رقم الفيديو</label><br>

                        <select name="vidnum" id="list">
                            <?php
                            if ($vidQuery->num_rows) {
                                while ($rows = $vidQuery->fetch_assoc()) {
                                    $id = $rows['ID'] + 1;
                                }
                                echo "
                                <option value=$id>$id</option>
                                ";
                            } else {
                                $id = 1;
                                echo "
                                <option value=$id>$id</option>
                                ";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>اختيار الفيديو</label><br>
                        <input type="file" name="videoo">
                    </div>
                    <div>
                        <label>اسم المدرس </label><br>
                        <input type="text" name="teacher" required>
                    </div>

                    <div>

                        <select name="coursetype" id="list">
                            <?php
                            if ($result->num_rows) {
                                while ($rows = $result->fetch_assoc()) {
                                    echo "
                            <option value=$rows[ID]>$rows[S_NAME]</option>
                            ";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div style="display: flex;">
                        <input type="submit" value="موافق" name="AddVideo">
                        <button>رجوع</button>
                    </div>

                </form>
            </div>
            <!-- ============= -->
            <div id="addsection">
                <h1>إضافة قسم : </h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="">اسم القسم</label><br>
                        <input type="text" name="sname" required>
                    </div>
                    <div>
                        <label for="">اخيار صوره</label><br>
                        <input type="file" name="photo">
                    </div>

                    <div style="display: flex; margin-top:40%; ">
                        <input type="submit" name="AddSection">
                        <button id="back">رجوع</button>
                    </div>
                </form>

            </div>
            <!-- =============== -->
            <div id="formdeletvideo">
                <h1>حذف فيديو : </h1>
                <form action="" method="post" enctype="multipart/form-data">

                    <div>
                        <label for="">رقم الفيديو</label><br>

                        <select name="vidnum" id="list">
                            <?php
                            if ($vidDelQuery->num_rows) {
                                while ($rows = $vidDelQuery->fetch_assoc()) {
                                    $id = $rows['ID'];
                                    echo "
                                <option value=$id>$id</option>
                                ";
                                }
                            } else {
                                echo "
                                <option value=0>DB is Empty</option>
                                ";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="">اسم القسم</label><br>
                        <select name="coursetype" id="list">
                            <?php
                            if ($result2->num_rows) {
                                while ($rows = $result2->fetch_assoc()) {
                                    echo "
                            <option value=$rows[ID]>$rows[S_NAME]</option>
                            ";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div style="display: flex; margin-top:40%; ">
                        <input type="submit" name="DeletVideo">
                        <button id="back">رجوع</button>
                    </div>

                </form>
            </div>

        </div>

        <div class="left-sec">
            <iframe src="section.php"></iframe>
        </div>
    </div>
    <script src="../../CSS/adminjs.js"></script>
</body>

</html>