<?php
include_once("../operations/privateOperatins.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../mdb/css/mdb.min.css"/>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/private.css">
    <link rel="stylesheet" href="../bootstrap/icons/bootstrap-icons.css">
</head>
<body style="background-color: #eff2f5!important;">
<?php
include_once('../header.php');
?>
<div class="container margin-from-header">

    <div class="row lesson-wrapper p-3">
        <?php
        $notFound = '<div class="notFoundWrapper"><img src="../img/404.png" alt="Page not found"></div>';
        $titleNotFound = '<title>Page not found || YouCan</title>';
        if (isset($_GET['lessonId']) && $_GET['lessonId'] != null) {
            $lessonId = $_GET['lessonId'];
            if (strlen($lessonId) > 6) {
                $getLessonQ = "SELECT * FROM lessons WHERE  lesson_vkey ='$lessonId' LIMIT 1";
                $requestResult = $conn->query($getLessonQ);

                if ($requestResult->num_rows > 0) {
                    $row = mysqli_fetch_assoc($requestResult);

                    $lessonTitle = decrypt($row['lesson_title']);
                    $lessonDesc = decrypt($row['lesson_description']);
                    $lessonType = $row['lesson_type'];
                    $lessonLink = decrypt($row['live_lesson_link']);
                    $lessonStartTime = decrypt($row['lesson_start_time']);
                    $teacherVKey = $row['teacher_vkey'];

                    $getTeacherDataQ = "SELECT * FROM users WHERE  vkey ='$teacherVKey' LIMIT 1";
                    $teacherRequestResult = $conn->query($getTeacherDataQ);

                    if ($teacherRequestResult->num_rows > 0) {
                        $tRow = mysqli_fetch_assoc($teacherRequestResult);

                        $teacherFName = decrypt($tRow['first_name']);
                        $teacherLName = decrypt($tRow['last_name']);
                        $teacherLName = decrypt($tRow['last_name']);
                        $teacherFullName = $teacherFName . ' ' . $teacherLName;

                        echo '<title>' . $lessonTitle . ' || YouCan</title>';
                        ?>
                        <div class="lesson-attributes">
                            <h4 class="lesson-title"><?php echo $lessonTitle; ?></h4>
                            <div class="lesson-page-desc">
                                <p class="lesson-start-time">
                                    Date: <?php echo substr($lessonStartTime, 0, 10); ?> <br>
                                    Starts at: <?php echo substr($lessonStartTime, 11, 6); ?>
                                </p>
                                <p class="lesson-description"><?php echo $lessonDesc?></p>
                                <div class="lesson-teacher-wrapper">
                                    <p class="lesson-teacher">
                                        Teacher: <br>
                                        <b><?php echo $teacherFullName;?></b>
                                    </p>
                                </div>
                                <div class="lesson-web-link-wrapper">
                                    <p class="lesson-link-label">Lesson link</p>
                                    <a href="<?php echo $lessonLink; ?>" target="_blank"><?php echo $lessonLink; ?></a>
                                </div>
                            </div>

                        </div>
                    <?php } else {
                        echo $titleNotFound;
                        echo $notFound;
                    }


                } else {
                    echo $titleNotFound;
                    echo $notFound;
                }
            } else {
                echo $titleNotFound;
                echo $notFound;
            }
        } else {
            echo $titleNotFound;
            echo $notFound;
        }
        ?>

    </div>
</div>

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../js/private.js"></script>
<script src="../js/api.js"></script>
<script src="../mdb/js/mdb.min.js"></script>
</body>
</html>
