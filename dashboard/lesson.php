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
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1"/>
    <link rel="stylesheet" href="../mdb/css/mdb.min.css"/>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/private.css">
    <link rel="stylesheet" href="../bootstrap/icons/bootstrap-icons.css">
</head>
<body style="background-color: #eff2f5!important;">

<?php
if (isset($responseMsg)) {
    ?>
    <div id="responseMessageWrapper">
        <span id="responseMessage"><?php echo $responseMsg; ?></span>
    </div>
    <?php
}
include_once('../header.php');
?>

<div class="container margin-from-header">

    <p class="errorFromBackEnd"><?php if (isset($errorMsg)) {
            echo $errorMsg;
        } ?></p>
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
                    include_once "../operations/checkOperations/checkIsExecutedHWork.php";

                    $lessonTitle = decrypt($row['lesson_title']);
                    $lessonDesc = decrypt($row['lesson_description']);
                    $lessonType = $row['lesson_type'];
                    $lessonLink = decrypt($row['live_lesson_link']);
                    $lessonStartTime = decrypt($row['lesson_start_time']);
                    $teacherVKey = $row['teacher_vkey'];
                    $lessonTask = $row['lesson_task'];
                    $lessonVideoLink = $row['lesson_video_link'];

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
                            <h4 class="lesson-title">
                                <?php
                                echo $lessonTitle;
                                if ($userVKey == $teacherVKey && strlen($lessonTask) < 2 && strlen($lessonVideoLink) < 2) {
                                    ?>
                                    <span class="edit-button" data-mdb-toggle="modal"
                                          data-mdb-target="#completeLessonEdit">Edit</span>
                                    <?php
                                } elseif ($exIsSubmitted == 0 && ($getUserType == 1 || $getUserType == 3) && strlen($lessonTask) > 2 && strlen($lessonVideoLink) > 2) {
                                    ?>
                                    <span class="edit-button" data-mdb-toggle="modal"
                                          data-mdb-target="#addHomework">Add homework</span>
                                    <?php
                                } ?>
                            </h4>
                            <div class="lesson-page-desc">
                                <p class="lesson-start-time">
                                    Date: <?php echo substr($lessonStartTime, 0, 10); ?> <br>
                                    Starts at: <?php echo substr($lessonStartTime, 11, 6); ?>
                                </p>
                                <p class="lesson-description"><?php echo $lessonDesc ?></p>
                                <div class="lesson-teacher-wrapper">
                                    <p class="lesson-teacher">
                                        Teacher: <br>
                                        <b>
                                            <?php echo $teacherFullName; ?>
                                        </b>
                                    </p>
                                </div>
                                <div class="lesson-web-link-wrapper lw">
                                    <p class="lesson-link-label">Lesson link</p>
                                    <a href="<?php echo $lessonLink; ?>" target="_blank"><?php echo $lessonLink; ?></a>
                                </div>
                                <?php
                                if (strlen($lessonTask) > 2 && strlen($lessonVideoLink) > 2) {
                                    $lessonTaskDecr = decrypt($lessonTask);
                                    $lessonVideoLinkDecr = decrypt($lessonVideoLink);
                                    ?>
                                    <div class="lesson-task-link-wrapper lw">
                                        <p class="lesson-task-label">Lesson task</p>
                                        <a href="/uploads/<?php echo $lessonTaskDecr; ?>" download>
                                            Download a file
                                        </a>
                                    </div>
                                    <div class="lesson-video-link-wrapper lw">
                                        <p class="lesson-video-label">Lesson video link</p>
                                        <a href="<?php echo $lessonVideoLinkDecr; ?>"
                                           target="_blank"><?php echo $lessonVideoLinkDecr; ?></a>
                                    </div>
                                    <?php
                                }
                                if (isset($exIsSubmitted) && $exIsSubmitted == 1 && ($getUserType == 1 || $getUserType == 3)) {
                                    if ($exAssessment == null) {
                                        $convertedExAssessment = "Exercise under review";
                                    }elseif ($exAssessment >= 0 && $exAssessment <= 5) {
                                        $convertedExAssessment = "Assessment of the assignment: " . $exAssessment;
                                    }
                                    ?>
                                    <div class="lesson-my-work lw">
                                        <p class="lesson-video-label">Submitted exercise</p>
                                        <h6>
                                            <?php echo $convertedExAssessment;?>
                                        </h6>
                                        <a href="/uploads/homeworks/<?php echo $exFile; ?>" download>
                                            Download a file
                                        </a>

                                    </div>
                                    <?php
                                }
                                ?>
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
<?php
if (isset($teacherVKey) && $userVKey == $teacherVKey && strlen($lessonTask) < 2 && strlen($lessonVideoLink) < 2) {
    include_once "addLessonTask.html";
} elseif (isset($exIsSubmitted) && strlen($lessonTask) > 2 && strlen($lessonVideoLink) > 2 && $exIsSubmitted == 0 && ($getUserType == 1 || $getUserType == 3)) {
    include_once "addHomework.html";
}
?>

<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../js/private.js"></script>
<script src="../js/api.js"></script>
<script src="../mdb/js/mdb.min.js"></script>
<?php
if (isset($responseMsg)) {
    ?>
    <script>
        let responseWrapper = document.getElementById('responseMessageWrapper');
        let responseText = document.getElementById('responseMessage');
        setTimeout(function () {
                window.location = window.location.href;
        }, 1500);
    </script>
    <?php
}
?>

</body>
</html>
