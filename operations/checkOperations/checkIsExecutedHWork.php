<?php
if (isset($_GET['lessonId'])) {
    $lessonVKey = $_GET['lessonId'];
    $getLessonData= $conn->query("SELECT * FROM exercises WHERE lesson_vkey='$lessonVKey' AND student_vkey='$userVKey'");
    if ($getLessonData->num_rows > 0) {
        $exerciseRow = mysqli_fetch_assoc($getLessonData);
        $exId = $exerciseRow['id'];
        $exVKey = $exerciseRow['exercise_vkey'];
        $exLessonVKey = $exerciseRow['lesson_vkey'];
        $exStudentVKey = $exerciseRow['student_vkey'];
        $exFile = decrypt($exerciseRow['exercise_file']);
        $exAssessment = $exerciseRow['exercise_assessment'];
        $exIsSubmitted = 1;
    }else{
        $exIsSubmitted = 0;
    }
}