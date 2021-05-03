<?php
$getChildLessonData = $conn->query("SELECT * FROM exercises WHERE student_vkey='$getChildVKey' ORDER BY id DESC");

if ($getChildLessonData->num_rows > 0) {
    ?>
    <div class="my-child-submitted-task-list-w table-responsive mt-2">
        <table class="table table-hover">
            <thead class="">
            <tr>
                <th scope="col">Lesson</th>
                <th scope="col">Submitted Task</th>
                <th scope="col">Point</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $getChildLessonData->fetch_assoc()) {
                $lessonVKeyRow = $row['lesson_vkey'];
                $lessonAttachedFile = decrypt($row['exercise_file']);
                $lessonExPointRow = $row['exercise_assessment'];

                if ($lessonExPointRow == 0) {
                    $exPoint = "Under review";
                }else{
                    $exPoint = $lessonExPointRow;
                }

                $getLessonData = $conn->query("SELECT * FROM lessons WHERE lesson_vkey='$lessonVKeyRow' ORDER BY id DESC");

                if ($getLessonData->num_rows > 0) {
                    $lessonDataRow = mysqli_fetch_assoc($getLessonData);

                    $lessonTitle = decrypt($lessonDataRow['lesson_title']);
                }else{
                    $lessonTitle = "Title";
                }

                ?>
                <tr>
                    <td>
                        <a href="/dashboard/lesson.php?lessonId=<?php echo $lessonVKeyRow;?>"><?php echo $lessonTitle;?></a>
                    </td>
                    <td>
                        <a href="/uploads/homeworks/<?php echo $lessonAttachedFile; ?>" download>Download</a>
                    </td>
                    <td>
                        <?php echo $exPoint; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
    <?php
} else {
    ?>
    <div class="my-child-have-no-submitted-task mt-2">
        <h6>Your children have no one submitted lesson.</h6>
    </div>
    <?php
}



