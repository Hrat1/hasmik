<?php
$getLessonData = $conn->query("SELECT * FROM lessons WHERE lesson_type='$userLessonType' ORDER BY id DESC");

if ($getLessonData->num_rows > 0) {
    while($row = $getLessonData->fetch_assoc()) {
        $lessonId = $row['id'];
        $lessonVKey = $row['lesson_vkey'];
        $teacherVKey = $row['teacher_vkey'];
        $lessonTitle = decrypt($row['lesson_title']);
        $lessonDesc = decrypt($row['lesson_description']);
        $lessonLiveLink = decrypt($row['live_lesson_link']);
        $lessonStartTime = decrypt($row['lesson_start_time']);

        $getTeacherData = $conn->query("SELECT * FROM users WHERE vkey='$teacherVKey' LIMIT 1");
        if ($getTeacherData->num_rows > 0) {
            $tRow = $getTeacherData->fetch_assoc();

            $teacherFullName = decrypt($tRow['first_name']) . " " . decrypt($tRow['last_name']);
        }else{
            $teacherFullName = "Teacher";
        }
        ?>
        <div id="lessonId<?php echo $lessonId?>">
            <a href="/dashboard/lesson.php?lessonId=<?php echo $lessonVKey?>" class="lesson">
                <div>
                    <h6 class="lesson-title"><?php echo $lessonTitle;?></h6>
                    <p class="lesson-desc"><?php echo $lessonDesc?></p>
                    <p class="lesson-teacher-name"><?php echo $teacherFullName;?></p>
                </div>
            </a>
        </div>
        <?php
    }
}else{
    ?>
        <div class="lessons-not-found">
            <h4>Now don't have active lessons.</h4>
        </div>
    <?php
}