<div id="whoSubmittedTask">
    <?php
    if (isset($_GET['whoSubmittedTask']) && $_GET['whoSubmittedTask']) {
        $lessonId = $_GET['whoSubmittedTask'];
        if (strlen($lessonId) > 6) {
            $getLessonQ = "SELECT * FROM lessons WHERE  lesson_vkey ='$lessonId' LIMIT 1";
            $requestResult = $conn->query($getLessonQ);

//            check in db have lesson with this vkey
            if ($requestResult->num_rows > 0) {
                $row = mysqli_fetch_assoc($requestResult);
                $lessonTypeRow = $row['lesson_type'];
                $lessonTeacherVkey = $row['teacher_vkey'];

                if ($lessonTypeRow == $userLessonType) {
                    if ($lessonTeacherVkey == $userVKey) {
                        $getHomeworkQ = "SELECT * FROM exercises WHERE  lesson_vkey ='$lessonId' ORDER BY exercise_assessment ASC";
                    }else{
                        $getHomeworkQ = "SELECT * FROM exercises WHERE  lesson_vkey ='$lessonId' ORDER BY exercise_assessment DESC";
                    }

                    $requestHomework = $conn->query($getHomeworkQ);
                    ?>
                    <div class="who-submitted-wrapper table-responsive">
                        <table class="table table-hover">
                            <thead class="">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Point</th>
                                <?php
                                if ($lessonTeacherVkey == $userVKey) {
                                    ?>
                                    <th scope="col">Attached file</th>
                                    <th class="col">Edit</th>
                                    <?php
                                }
                                ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($requestHomework->num_rows > 0) {

                                while ($exSubmittedStudentRow = $requestHomework->fetch_assoc()) {
                                    $studentVKeyRow = $exSubmittedStudentRow['student_vkey'];
                                    $exVKeyRow = $exSubmittedStudentRow['exercise_vkey'];
                                    $stAttachedFileRow = decrypt($exSubmittedStudentRow['exercise_file']);
                                    $stExAssessment = $exSubmittedStudentRow['exercise_assessment'];


                                    if ($lessonTeacherVkey == $userVKey && ($stExAssessment <= 0 || $stExAssessment > 5)){
                                        $exPoint = "Not tested";
                                    }elseif ($stExAssessment > 0 && $stExAssessment <= 5) {
                                        $exPoint = $stExAssessment;
                                    } else {
                                        $exPoint = "Under review";
                                    }

                                    $getStudentDataQ = "SELECT * FROM users WHERE  vkey ='$studentVKeyRow'";
                                    $studentDataReq = $conn->query($getStudentDataQ);

                                    if ($studentDataReq->num_rows > 0) {
                                        $studentDataRow = mysqli_fetch_assoc($studentDataReq);

                                        $studentFullNameRow = decrypt($studentDataRow['first_name']) . " " . decrypt($studentDataRow['last_name']);
                                        $studentUsernameRow = decrypt($studentDataRow['username']);
                                        ?>
                                        <tr class="submitted-user">
                                            <td>
                                                <?php echo $studentFullNameRow; ?>
                                            </td>
                                            <td>
                                                <?php echo $studentUsernameRow; ?>
                                            </td>
                                            <td>
                                                <?php echo $exPoint; ?>
                                            </td>
                                            <?php
                                            if ($lessonTeacherVkey == $userVKey) {
                                                ?>
                                                <td>
                                                    <a href="/uploads/homeworks/<?php echo $stAttachedFileRow; ?>"
                                                       download>Download</a>
                                                </td>
                                                <td>
                                                    <i class="bi bi-pencil edit-point" data-mdb-toggle="modal"
                                                       data-mdb-target="#changePoint"
                                                       data-mdb-username="<?php echo $studentUsernameRow;?>"
                                                       data-mdb-userid="<?php echo $exVKeyRow;?>"></i>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                        <?php
                                    }
                                }
                            } else {
                                ?>
                                <tr class="no-one-who-submitted ">
                                    <td colspan="5">No one who submitted assignment.</td>
                                </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    if ($lessonTeacherVkey == $userVKey) {
                    include_once "userTypes/teacher/changePoint.html";
                        ?>
                        <script src="../js/changePoint.js"></script>
                        <?php
                    }
                } else {
                    ?>
                    <div class="other-lesson-type">
                        <h4>This tutorial is not a <?php echo $lessonTypeToString; ?> tutorial.</h4>
                    </div>
                    <?php
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